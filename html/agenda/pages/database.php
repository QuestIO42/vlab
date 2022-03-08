<?php
/*
= LuxCal database management page =

This file is part of the LuxCal Web Calendar.
Copyright 2009-2020 LuxSoft - www.LuxSoft.eu
License https://www.gnu.org/licenses/gpl.html GPL version 3

The LuxCal Web Calendar is distributed WITHOUT ANY WARRANTY.
*/

//sanity check
if (empty($lcV)) { exit('not permitted ('.substr(basename(__FILE__),0,-4).')'); } //launch via script only

//initialize
$adminLang = (file_exists("./lang/ai-{$opt['cL']}.php")) ? $opt['cL'] : "english";
require "./lang/ai-{$adminLang}.php";
require './common/toolboxx.php'; //admin tools

function mdbForm() {
	global $formCal, $ax, $compact, $backup, $restore, $events, $delEvt, $fromD, $tillD;
	
	$comChecked = $compact > 0 ? " checked" : '';
	$bacChecked = $backup > 0 ? " checked" : '';
	$resChecked = $restore > 0 ? " checked" : '';
	$evtChecked = $events > 0 ? " checked" : '';
	$delChecked = $delEvt > 0 ? " checked" : '';
	$undChecked = !$delEvt > 0 ? " checked" : '';
	echo "<form action='index.php' method='post' enctype='multipart/form-data'>
{$formCal}
<input type='hidden' name='MAX_FILE_SIZE' value='2050000'>
<fieldset>\n
<legend>{$ax['mdb_dbm_functions']}</legend>\n
<br><input type='checkbox' id='com' name='compact' value='yes'{$comChecked}><label for='com'> {$ax['mdb_compact']}</label><br>
<br><input type='checkbox' id='bac' name='backup' value='yes'{$bacChecked}><label for='bac'> {$ax['mdb_backup']}</label><br>
<br><input type='checkbox' id='res' name='restore' value='yes'{$resChecked}><label for='res'> {$ax['mdb_restore']}</label><pre>  </pre>
<label>{$ax['iex_file']}:</label> <input type='file' name='fName'><br>
<br><input type='checkbox' id='evt' name='events' value='yes'{$evtChecked}><label for='evt'> {$ax['mdb_events']}</label>:<pre>  </pre>
<input type='radio' id='del' name='delEvt' value='1'{$delChecked}><label for='del'> {$ax['mdb_delete']}</label><pre>  </pre>
<input type='radio' id='und' name='delEvt' value='0'{$undChecked}><label for='und'> {$ax['mdb_undelete']}</label>\n<br>
<pre>   </pre>{$ax['mdb_between_dates']}: <input type='text' name='fromD' id='fromD' value='".IDtoDD($fromD)."' size='8'>
<span class='dtPick' title=\"{$ax['iex_select_start_date']}\" onclick=\"dPicker(1,'','fromD');return false;\">&#x1F4C5;</span> &#8211;
<input type='text' name='tillD' id='tillD' value='".IDtoDD($tillD)."' size='8'>
<span class='dtPick' title=\"{$ax['iex_select_end_date']}\" onclick=\"dPicker(1,'','tillD');return false;\">&#x1F4C5;</span>
</fieldset>\n
<button type='submit' name='exe' value='y'>{$ax['mdb_start']}</button>\n
</form>\n";
}

function processFunctions() {
	global $formCal, $ax, $compact, $backup, $restore, $events, $delEvt, $fromD, $tillD;
	
	$fName = false;
	if ($compact) { compactDb(); }
	if ($backup) { $fName = backupTables(); }
	if ($restore) { restoreTables(); }
	if ($events) { delEvents($delEvt, $fromD, $tillD); }
	echo "<form action='index.php' method='post'>
{$formCal}
<input type='hidden' name='compact' id='compact' value='{$compact}'>
<input type='hidden' name='backup' id='backup' value='{$backup}'>
<input type='hidden' name='restore' id='restore' value='{$restore}'>
<input type='hidden' name='events' id='events' value='{$events}'>
<input type='hidden' name='delEvt' id='delEvt' value='{$delEvt}'>
<input type='hidden' name='fromD' id='fromD' value='".IDtoDD($fromD)."'>
<input type='hidden' name='tillD' id='tillD' value='".IDtoDD($tillD)."'>
<button type='submit' name='back' value='y'>{$ax['back']}</button>\n";
	if ($fName) {
		echo "<pre>  </pre><button type='button' onclick=\"location.href='dloader.php?ftd=./files/{$fName}'\">{$ax['iex_download_file']}</button>\n";
	}
	echo "</form>\n";
}


/* Compact database */
function compactDb() {
	global $ax, $dbType, $nowTS;
	
	echo "<fieldset><legend>{$ax['mdb_compact']}</legend>\n";
	$deleteDT = date('Y-m-d H:i', $nowTS - 86400*30); //remove if deleted more than 30 days ago
	//remove deleted events from db
	$stH = dbQuery("DELETE FROM `events` WHERE `status` = -1 and `mDateTime` <= '{$deleteDT}'");
	echo "{$ax['mdb_purge_done']}.<br>\n";		
	if ($dbType == 'SQLite') { //SQLite db
		$stH = dbQuery("VACUUM");
	} else { //MySQL db
		$stH = dbQuery('OPTIMIZE TABLE `'.implode('`,`',getTables()).'`');
	}
	if ($stH) {
		echo "{$ax['mdb_compact_done']}.<br>\n";		
	} else {
		echo "{$ax['mdb_compact_error']}.<br>\n";
	}
	echo "</fieldset>\n";
}

/* Backup db tables*/
function backupTables() {
	global $ax, $calID, $set, $lcV;
	
	echo "<fieldset><legend>{$ax['mdb_backup']}</legend>\n";
	//get table names
	$tables = getTables();
	if (empty($tables)) {
		echo "{$ax['mdb_noshow_tables']}\n";
		$result = false;
	} else {
		$sqlFile = backupDatabase($tables,true); //create backup file
		//save .sql dump file
		$fName = "./files/dump-{$calID}-{$lcV}-".date('Ymd-His').'.sql';
		echo "<br>{$ax['mdb_file_name']}: <strong>{$fName}</strong><br>\n";
		if (file_put_contents($fName, $sqlFile) !== false) {
			echo "{$ax['mdb_file_saved']}<br>\n";
			$result = basename($fName);
		} else {
			echo "<br><br><strong>{$ax['mdb_write_error']}</strong><br>\n";
			$result = false;
		}
	}
	echo "</fieldset>\n";
	return $result;
}

/* Restore db tables */
function restoreTables() {
	global $ax, $calID, $lcV, $dbType;
	
	echo "<fieldset><legend>{$ax['mdb_restore']}</legend>\n";
	do {
		if (empty($_FILES['fName']['tmp_name'])) {
			echo "{$ax['mdb_noshow_restore']}\n"; break; //abort restore
		}
		if (substr($_FILES['fName']['name'],-4) != '.sql') {
			echo "{$ax['mdb_file_not_sql']}\n"; break; //abort restore
		}
		$buFile = $_FILES['fName']['tmp_name']; //get backup file name
		//Read SQL queries from $buFile
		$sqlArray = file($buFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
		unlink($buFile);
		//check version of backup file
		foreach ($sqlArray as $qLine) { //search 1st comment block
			if ($qLine[0] != '-' or preg_match('~LuxCal version:\s*(\d.\d)~i',$qLine,$matches)) { break; }
		}
		if (!empty($matches) and $matches[1] != substr($lcV,0,3)) { //version found but not matching
			echo "<span class='hired'>{$ax['mdb_no_bup_match']}</span><br>\n"; break; //abort restore
		}
		echo "{$ax['mdb_backup_file']}: '<strong>{$_FILES['fName']['name']}</strong>'<br><br>";
		$count = importSqlFile($sqlArray); //import SQL file
		upgradeDb(); //recreate db schema
		echo "{$ax['mdb_restore_table']} 'events' - {$count['eve']} {$ax['mdb_inserted']}<br>
{$ax['mdb_restore_table']} 'users' - {$count['use']} {$ax['mdb_inserted']}<br>
{$ax['mdb_restore_table']} 'groups' - {$count['gro']} {$ax['mdb_inserted']}<br>
{$ax['mdb_restore_table']} 'categories' - {$count['cat']} {$ax['mdb_inserted']}<br>
{$ax['mdb_restore_table']} 'settings' - {$count['set']} {$ax['mdb_inserted']}<br>
{$ax['mdb_restore_table']} 'styles' - {$count['sty']} {$ax['mdb_inserted']}<br>\n";
		if ($count['cat'] > 0 and $count['use'] > 0 and $count['gro'] > 0 and $count['set'] > 0 and $count['sty'] > 0) {
			echo "<br><strong>{$ax['mdb_db_restored']}</strong><br>\n";
		}
	} while (0); //end of: restore tables
	echo "</fieldset>\n";
}

/* (Un)delete events */
function delEvents($delEvt, $fromD, $tillD) {
	global $ax;
	
	$where = $delEvt ? "WHERE `status` >= 0 " : "WHERE `status` = -1 ";
	if ($fromD) { $where .= " AND `sDate` >= '$fromD'"; }
	if ($tillD) { $where .= " AND (CASE WHEN `rType` > 0 THEN `rUntil` ELSE CASE WHEN `eDate` LIKE '9%' THEN `sDate` ELSE `eDate` END END <= '$tillD')"; }
	if ($delEvt) {
		$stH = dbQuery("UPDATE `events` SET `status` = -1, `mDateTime` = '".date("Y-m-d H:i")."' $where"); //delete
	} else {
		$stH = dbQuery("UPDATE `events` SET `status` = 0, `mDateTime` = '".date("Y-m-d H:i")."' $where"); //undelete
	}
	$nrAffected = $stH->rowCount();
	echo "<fieldset><legend>{$ax['mdb_events']}</legend>\n";
	echo ($delEvt ? $ax['mdb_deleted'] : $ax['mdb_undeleted']).": {$nrAffected}";
	echo "</fieldset>\n";
}

//init
$msg = '';
$compact = empty($_POST["compact"]) ? 0 : 1;
$backup = empty($_POST["backup"]) ? 0 : 1;
$restore = empty($_POST["restore"]) ? 0 : 1;
$events = empty($_POST["events"]) ? 0 : 1;
$delEvt = empty($_POST["delEvt"]) ? 0 : 1;
$fromD = (isset($_POST['fromD'])) ? DDtoID($_POST['fromD']) : ''; //from event date
$tillD = (isset($_POST['tillD'])) ? DDtoID($_POST['tillD']) : ''; //untill event date
if ($fromD and $tillD and $fromD > $tillD) {
	$temp = $fromD;
	$fromD = $tillD;
	$tillD = $temp;
}
$exe = !empty($_POST["exe"]) ? 1 : 0;

//control logic
if ($usr['privs'] == 9) {
	if ($exe and (!$compact and !$backup and !$restore and !$events)) { $msg = $ax['mdb_no_function_checked'];	}
	echo "<p class='error'>{$msg}</p>
		<div class='scrollBox sBoxAd'>\n";
	if (!$exe or (!$compact and !$backup and !$restore and !$events)) {
		echo "<aside class='aside'>{$ax['xpl_manage_db']}</aside>
			<div class='centerBox'>\n";
		mdbForm(); //manage db form
		echo "</div>\n";
	} else {
		echo "<div class='centerBox'>\n";
		processFunctions();
		echo "</div>\n";
	}
	echo "</div>\n";
} else {
	echo "<p class='error'>{$ax['no_way']}</p>\n";
}
?>