 <?php
/*
= LuxCal categories management page =

This file is part of the LuxCal Web Calendar.
Copyright 2009-2020 LuxSoft - www.LuxSoft.eu
License https://www.gnu.org/licenses/gpl.html GPL version 3

The LuxCal Web Calendar is distributed WITHOUT ANY WARRANTY.
*/

//sanity check
if (empty($lcV) or
		(isset($_REQUEST['cid']) and !preg_match('%^\d{1,4}$%',$_REQUEST['cid'])) or
		(!empty($mode) and !preg_match('%^(add|edit|sort)$%',$mode))
	) { exit('not permitted ('.substr(basename(__FILE__),0,-4).')'); }

//initialize
$adminLang = (file_exists("./lang/ai-{$opt['cL']}.php")) ? $opt['cL'] : "english";
require "./lang/ai-{$adminLang}.php";
if (!isset($mode)) { $mode = ''; }

$cat = array();
$cat['id'] = isset($_REQUEST['cid']) ? $_REQUEST['cid'] : 0;
$cat['name'] = isset($_POST['cname']) ? trim($_POST['cname']) : '';
$cat['color'] = isset($_POST['color']) ? $_POST['color'] : '#303030';
$cat['bgrnd'] = (isset($_POST['bgrnd']) and $_POST['bgrnd'] != '#FFFFFF') ? $_POST['bgrnd'] : ''; //white: transparent
$cat['symbl'] = isset($_POST['symbl']) ? trim($_POST['symbl']) : '';
$cat['sqnce'] = isset($_POST['sqnce']) ? $_POST['sqnce'] : 1;
$cat['rpeat'] = isset($_POST['repeat']) ? $_POST['repeat'] : 0;
$cat['nolap'] = isset($_POST['nolap']) ? $_POST['nolap'] : 0;
$cat['olGap'] = isset($_POST['olGap']) ? $_POST['olGap'] : 0;
$cat['olErr'] = isset($_POST['olErr']) ? $_POST['olErr'] : $ax['cat_ol_error_msg'];
$cat['tsHrs'] = isset($_POST['tsHrs']) ? $_POST['tsHrs'] : 0;
$cat['tsMin'] = isset($_POST['tsMin']) ? $_POST['tsMin'] : 0;
$cat['tsFix'] = isset($_POST['tsFix']) ? $_POST['tsFix'] : 0;
$cat['daybg'] = isset($_POST['daybg1']) ? 1 : 0;
$cat['daybg'] = isset($_POST['daybg2']) ? $cat['daybg'] + 2 : $cat['daybg'];
$cat['appro'] = isset($_POST['approve']) ? 1 : 0;
$cat['chBox'] = isset($_POST['chBox']) ? 1 : 0;
$cat['chLab'] = isset($_POST['chLab']) ? trim($_POST['chLab']) : '';
$cat['chMrk'] = isset($_POST['chMrk']) ? trim($_POST['chMrk']) : '&#x2713;';
$cat['subN1'] = isset($_POST['subN1']) ? trim($_POST['subN1']) : '';
$cat['subC1'] = (isset($_POST['subC1']) and $_POST['subB1'] != '#FFFFFF') ? $_POST['subC1'] : '';
$cat['subB1'] = (isset($_POST['subB1']) and $_POST['subB1'] != '#FFFFFF') ? $_POST['subB1'] : '';
$cat['subN2'] = isset($_POST['subN2']) ? trim($_POST['subN2']) : '';
$cat['subC2'] = (isset($_POST['subC2']) and $_POST['subB2'] != '#FFFFFF') ? $_POST['subC2'] : '';
$cat['subB2'] = (isset($_POST['subB2']) and $_POST['subB2'] != '#FFFFFF') ? $_POST['subB2'] : '';
$cat['subN3'] = isset($_POST['subN3']) ? trim($_POST['subN3']) : '';
$cat['subC3'] = (isset($_POST['subC3']) and $_POST['subB3'] != '#FFFFFF') ? $_POST['subC3'] : '';
$cat['subB3'] = (isset($_POST['subB3']) and $_POST['subB3'] != '#FFFFFF') ? $_POST['subB3'] : '';
$cat['subN4'] = isset($_POST['subN4']) ? trim($_POST['subN4']) : '';
$cat['subC4'] = (isset($_POST['subC4']) and $_POST['subB4'] != '#FFFFFF') ? $_POST['subC4'] : '';
$cat['subB4'] = (isset($_POST['subB4']) and $_POST['subB4'] != '#FFFFFF') ? $_POST['subB4'] : '';
$cat['urlNm'] = isset($_POST['urlNm']) ? trim($_POST['urlNm']) : '';
$cat['urlLk'] = isset($_POST['urlLk']) ? trim($_POST['urlLk']) : '';

//get number of cats
$stH = dbQuery("SELECT COUNT(*) FROM `categories` WHERE `status` >= 0");
$row = $stH->fetch(PDO::FETCH_NUM);
$stH = null;
$nrCats = $row[0];

function showCategories($bare) { //bare: no edit/add buttons
	global $ax;
	
	echo "<fieldset><legend>{$ax['cat_list']}</legend>\n";
	$stH = stPrep("SELECT * FROM `categories` WHERE `status` >= 0 ORDER BY `sequence`");
	stExec($stH,null);
	$rows = $stH->fetchAll(PDO::FETCH_ASSOC);
	echo "<table class='list'>
<tr><th>&nbsp;{$ax['cat_nr']}&nbsp;</th><th>&nbsp;{$ax['id']}&nbsp;</th><th>{$ax['cat_cat_name']}</th><th>{$ax['cat_symbol']}</th><th>{$ax['cat_repeat']}</th><th>{$ax['cat_overlap']}</th><th>{$ax['cat_duration']}</th><th>{$ax['cat_need_approval']}</th><th>{$ax['cat_day_color']}</th><th>{$ax['cat_check_mark']}</th><th>{$ax['cat_subcats']}</th>";
	if (!$bare) {
		echo "<td colspan='2'></td>";
	}
	echo "</tr>\n";
	foreach ($rows as $cat) {
		switch ($cat['repeat']) {
			case 0: $repeat = ''; break;
			case 1: $repeat = $ax['cat_every_day']; break;
			case 2: $repeat = $ax['cat_every_week']; break;
			case 3: $repeat = $ax['cat_every_month']; break;
			case 4: $repeat = $ax['cat_every_year'];
		}
		$style = ($cat['color'] ? "color:{$cat['color']};" : '').($cat['bgColor'] ? "background-color:{$cat['bgColor']};" : '');
		$style = $style ? " style='{$style}'" : '';
		echo "<tr>\n<td>{$cat['sequence']}</td><td>{$cat['ID']}</td><td{$style}>{$cat['name']}</td><td>{$cat['symbol']}</td><td>{$repeat}</td>
<td>".($cat['noverlap'] < 1 ? $ax['yes'] : $ax['no'].' ('.$cat['olapGap'].')')."</td>
<td>".($cat['defSlot'] > 0 ? substr('0'.intval($cat['defSlot'] / 60),-2).':'.substr('0'.($cat['defSlot'] % 60),-2).($cat['fixSlot'] > 0 ? ' !' : '') : '')."</td>
<td>".($cat['approve'] < 1 ? $ax['no'] : $ax['yes'])."</td>
<td>".($cat['dayColor'] < 1 ? $ax['no'] : $ax['yes'])."</td>
<td>".($cat['checkBx'] ? $cat['checkMk'].': "'.$cat['checkLb'].'"' : $ax['no'])."</td>
<td>".(($cat['subName1'] or $cat['subName2'] or $cat['subName3'] or $cat['subName4']) ? $ax['yes'] : $ax['no']).'</td>';
		if (!$bare) {
			echo "<td><button type='button' onclick=\"index({mode:'edit',cid:{$cat['ID']}});\">{$ax['cat_edit']}</button>";
		echo ($cat['ID'] > 1) ? "<td><button type='button' onclick=\"delConfirm('cat',{$cat['ID']},'{$ax['cat_delete']} {$cat['name']}');\">{$ax['cat_delete']}</button></td>" : '<td></td>';
			echo "</td>\n";
		}
		echo "</tr>\n";
	}
	echo "</table>\n";
	echo "</fieldset>\n";
	if (!$bare) {
		echo "<button type='button' onclick=\"index({mode:'add'});\">{$ax['cat_add_new']}</button>\n";
		echo "<pre> </pre><button type='button' onclick=\"index({mode:'sort'});\">{$ax['cat_sort']}</button>\n";
	}
	echo "<br><br>\n";
}

function sortCategories() {
	$stH = dbQuery("SELECT `ID` FROM `categories` WHERE `status` >= 0 ORDER BY CASE WHEN `ID` < 2 THEN `ID` ELSE `name` END");
	$rowArray = $stH->fetchAll(PDO::FETCH_ASSOC);
	$stH = null;
	$stH = stPrep("UPDATE `categories` SET `sequence` = ? WHERE `ID` = ?");
	$count = 0;
	foreach ($rowArray as $row) {
		stExec($stH,array(++$count,$row['ID']));
	}
}

function editCategory($cat) {
	global $formCal, $ax, $mode, $nrCats;
	
	echo "<form action='index.php' method='post'>
{$formCal}
<input type='hidden' name='cid' id='cid' value='{$cat['id']}'>
<input type='hidden' name='mode' id='mode' value='{$mode}'>\n";
	echo "<fieldset>";
	if ($mode == 'edit') { //edit
		$stH = stPrep("SELECT * FROM `categories` WHERE `ID` = ? LIMIT 1");
		stExec($stH,array($cat['id']));
		$row = $stH->fetch(PDO::FETCH_ASSOC);
		$stH = null;
		if ($row and !isset($_POST['cname'])) {
			$cat['name'] = $row['name'];
			$cat['color'] = $row['color'] ? $row['color'] : '#303030';
			$cat['bgrnd'] = $row['bgColor'] ? $row['bgColor'] : '#FFFFFF';
			$cat['symbl'] = $row['symbol'];
			$cat['sqnce'] = $row['sequence'];
			$cat['rpeat'] = $row['repeat'];
			$cat['nolap'] = $row['noverlap'];
			$cat['olGap'] = $row['olapGap'];
			$cat['olErr'] = $row['olErrMsg'];
			$cat['tsHrs'] = intval($row['defSlot'] / 60);
			$cat['tsMin'] = $row['defSlot'] % 60;
			$cat['tsFix'] = $row['fixSlot'];
			$cat['appro'] = $row['approve'];
			$cat['daybg'] = $row['dayColor'];
			$cat['chBox'] = $row['checkBx'];
			$cat['chLab'] = $row['checkLb'];
			$cat['chMrk'] = $row['checkMk'];
			$cat['subN1'] = $row['subName1'];
			$cat['subC1'] = $row['subColor1'] ? $row['subColor1'] : '#303030';
			$cat['subB1'] = $row['subBgrnd1'] ? $row['subBgrnd1'] : '#FFFFFF';
			$cat['subN2'] = $row['subName2'];
			$cat['subC2'] = $row['subColor2'] ? $row['subColor2'] : '#303030';
			$cat['subB2'] = $row['subBgrnd2'] ? $row['subBgrnd2'] : '#FFFFFF';
			$cat['subN3'] = $row['subName3'];
			$cat['subC3'] = $row['subColor3'] ? $row['subColor3'] : '#303030';
			$cat['subB3'] = $row['subBgrnd3'] ? $row['subBgrnd3'] : '#FFFFFF';
			$cat['subN4'] = $row['subName4'];
			$cat['subC4'] = $row['subColor4'] ? $row['subColor4'] : '#303030';
			$cat['subB4'] = $row['subBgrnd4'] ? $row['subBgrnd4'] : '#FFFFFF';
			preg_match('~(.+)\s*\[(.*)\]~',$row['urlLink'],$matches);
			$cat['urlLk'] = !empty($matches[1]) ? $matches[1] : '';
			$cat['urlNm'] = !empty($matches[2]) ? $matches[2] : '';;
		}
		echo "<legend>{$ax['cat_edit_cat']}</legend>\n";
	} else { //add
		echo "<legend>{$ax['cat_add_new']}</legend>\n";
		$cat['sqnce'] = $nrCats + 1;
	}
	$style = ($cat['color'] ? "color:{$cat['color']};" : "").($cat['bgrnd'] ? "background-color:{$cat['bgrnd']};" : "");
	$style = $style ? " style='{$style}'" : '';
	$selected = array_fill(0,5,'');
	$selected[$cat['rpeat']] = ' selected';
	echo "<table class='list'>\n";
	if ($mode != 'add') { echo "<tr><td>{$ax['id']}:</td><td>&nbsp;{$cat['id']}</td></tr>\n"; }
	echo	"<tr><td>{$ax['cat_cat_name']}:</td><td><input type='text' id='cname' name='cname' value=\"{$cat['name']}\" size='20' maxlength='40'{$style}></td></tr>
		<tr><td>{$ax['cat_cat_color']}:</td><td>{$ax['cat_text']}: <input type='text' id='color' name='color' title=\"{$ax['cat_select_color']}\" class=\"jscolor {onFineChange:'update(this,\'\',\'cname\')',styleElement:null}\" value='{$cat['color']}' size='7' maxlength='7'>
		<pre> </pre>{$ax['cat_background']}: <input type='text' id='bgrnd' name='bgrnd' title=\"{$ax['cat_select_color']}\" class=\"jscolor {onFineChange:'update(this,\'cname\',\'\')',styleElement:null}\" value='{$cat['bgrnd']}' size='7' maxlength='7'></td></tr>
		<tr><td>{$ax['cat_symbol_repms']}:</td><td><input type='text' id='symbl' name='symbl' value=\"{$cat['symbl']}\" size='1' maxlength='1'> ({$ax['cat_symbol_eg']})</td></tr>
		<tr><td>{$ax['cat_seq_in_menu']}:</td><td><input type='text' name='sqnce' value='{$cat['sqnce']}' size='1' maxlength='2'></td></tr>
		<tr><td>{$ax['cat_repeat']}:</td>
		<td><select name='repeat'>
		<option value='0'{$selected[0]}>-</option>
		<option value='1'{$selected[1]}>{$ax['cat_every_day']}</option>
		<option value='2'{$selected[2]}>{$ax['cat_every_week']}</option>
		<option value='3'{$selected[3]}>{$ax['cat_every_month']}</option>
		<option value='4'{$selected[4]}>{$ax['cat_every_year']}</option>
		</select></td></tr>
		<tr><td>{$ax['cat_no_overlap']}<sup> *</sup>:</td><td><label for='sam'>{$ax['cat_same_category']}</label>: <input type='checkbox' name='nolap' id='sam' value='1' onclick=\"check1('nolap',this,'t');\"".($cat['nolap'] == 1 ? " checked> " : ' > ')."<pre> </pre><label for='all'>{$ax['cat_all_categories']}</label>: <input type='checkbox' name='nolap' id='all' value='2' onclick=\"check1('nolap',this,'t');\"".($cat['nolap'] == 2 ? " checked> " : ' > ')."<pre> </pre>{$ax['cat_gap']}: <input type='text' name='olGap' value='{$cat['olGap']}' size='1' maxlength='3'> (0-720 {$ax['minutes']})</td></tr>
		<tr><td>{$ax['cat_ol_error_text']}:</td><td><input type='text' name='olErr' value='{$cat['olErr']}' size='50' maxlength='80'></td></tr>
		<tr><td>{$ax['cat_event_duration']} (0: {$ax['none']}):</td><td><input type='text' name='tsHrs' value='{$cat['tsHrs']}' size='1' maxlength='2'> {$ax['hours']}<pre> </pre><input type='text' name='tsMin' value='{$cat['tsMin']}' size='1' maxlength='2'> {$ax['minutes']}<pre> </pre>
		<input type='radio' id='tsFix0' name='tsFix' value='0'".(!$cat['tsFix'] ? " checked" : '')."><label for='tsFix0'>{$ax['cat_default']}</label><pre> </pre>
		<input type='radio' id='tsFix1' name='tsFix' value='1'".($cat['tsFix'] ? " checked" : '')."><label for='tsFix1'>{$ax['cat_fixed']}</label></td></tr>
		<tr><td><label for='dbg1'>{$ax['cat_day_color1']}</label>:</td><td><input type='checkbox' name='daybg1' id='dbg1' value='1'".(($cat['daybg'] & 1) ? " checked> " : ' > ')."</td></tr>
		<tr><td><label for='dbg2'>{$ax['cat_day_color2']}</label>:</td><td><input type='checkbox' name='daybg2' id='dbg2' value='1'".(($cat['daybg'] & 2) ? " checked> " : ' > ')."</td></tr>
		<tr><td><label for='app'>{$ax['cat_approve']}</label>:</td><td><input type='checkbox' name='approve' id='app' value='1'".($cat['appro'] ? " checked> " : ' > ')."</td></tr>
		<tr><td><label for='chb'>{$ax['cat_check_mark']}</label>:</td><td><input type='checkbox' name='chBox' id='chb' value='1'".($cat['chBox'] ? " checked" : '').">
		<pre> </pre>{$ax['cat_label']}: <input type='text' name='chLab' value='{$cat['chLab']}' size='8' maxlength='20'>
		<pre> </pre>{$ax['cat_mark']}: <input type='text' name='chMrk' value='{$cat['chMrk']}' size='5' maxlength='10'></td></tr>
		<tr><td>{$ax['cat_matrix_url_link']}:</td><td>{$ax['cat_name']}: <input type='text' name='urlNm' value='{$cat['urlNm']}' size='10' maxlength='30'>
		<pre> </pre>{$ax['cat_url']}: <input type='text' name='urlLk' value='{$cat['urlLk']}' size='35' maxlength='100'></td></tr>
		<tr><td colspan='2'>{$ax['cat_subcats_opt']}:</td></tr>\n";
	for ($i = 1; $i <= 4; $i++) {
		$style = ($cat['subC'.$i] ? "color:{$cat['subC'.$i]};" : "").($cat['subB'.$i] ? "background-color:{$cat['subB'.$i]};" : "");
		$style = $style ? " style='{$style}'" : '';
		echo "<tr><td class='floatR'>{$i} - {$ax['cat_name']}: <input type='text' id='subN{$i}' name='subN{$i}' value='{$cat['subN'.$i]}' size='8' maxlength='20'{$style}></td><td>
			&nbsp;{$ax['cat_text']}: <input type='text' id='subC{$i}' name='subC{$i}' title=\"{$ax['cat_select_color']}\" class=\"jscolor {onFineChange:'update(this,\'\',\'subN{$i}\')',styleElement:null}\" value='{$cat['subC'.$i]}' size='7' maxlength='7'>
			<pre> </pre>{$ax['cat_background']}: <input type='text' id='subB{$i}' name='subB{$i}' title=\"{$ax['cat_select_color']}\" class=\"jscolor {onFineChange:'update(this,\'subN{$i}\',\'\')',styleElement:null}\" value='{$cat['subB'.$i]}' size='7' maxlength='7'></td></tr>\n";
	}
	echo "</table>
		<sup>*</sup><span class='fontS'> {$ax['cat_no_ol_note']}</span>
		</fieldset>\n";
	if ($mode == 'add') {
		echo "<button type='submit' name='addExe' value='y'>{$ax['cat_add']}</button>";
	} else {
		echo "<button type='submit' name='updExe' value='y'>{$ax['cat_save']}</button>";
	}
	echo "<pre> </pre>&nbsp;<button type='submit' name='back' value='y'>{$ax['back']}</button>
		</form><br><br><br>\n";
}

function validateCat(&$cat) { //add category
	global $ax, $nrCats, $rxCalURL;

	$msg = ''; //init
	do {
		if (!$cat['name']) { $msg = $ax['cat_name_missing']; break; }
		if (!ctype_digit($cat['olGap']) or $cat['olGap'] < 0 or $cat['olGap'] > 720) { $msg = $ax['cat_olgap_invalid']; break; }
		if (!ctype_digit($cat['tsHrs']) or $cat['tsHrs'] < 0 or !ctype_digit($cat['tsMin']) or $cat['tsMin'] > 59 or $cat['tsMin'] < 0) { $msg = $ax['cat_duration_invalid']; break; }
		if ($cat['chBox'] and (!$cat['chLab'] or !$cat['chMrk'])) { $msg = $ax['cat_mark_label_missing']; break; }
		if (!ctype_digit($cat['sqnce']) or $cat['sqnce'] == 0) {
			$cat['sqnce'] = 1;
		} elseif ($cat['sqnce'] > $nrCats) {
			$cat['sqnce'] = $nrCats + 1;
		}
		if ($cat['nolap'] and !$cat['olErr']) { $msg = $ax['cat_no_ol_error_msg']; break; }
		$cat['olErr'] = str_replace(';',' -',$cat['olErr']); //semicolons can cause PHP problems
		if (($cat['urlNm'] and !$cat['urlLk']) or ($cat['urlLk'] and !preg_match($rxCalURL, $cat['urlLk']))) { $msg = $ax['cat_invalid_url']; break; }
		$cat['urlNm'] = str_replace(array('[',']'),'',$cat['urlNm']);
		if ($cat['urlLk'] and empty($cat['urlNm'])) { $msg = $ax['cat_no_url_name']; break; }
		$cat['urlLN'] = $cat['urlLk'] ? "{$cat['urlLk']}[{$cat['urlNm']}]" : '';
	} while (false);
	return $msg;
}

function addCat(&$cat) { //add category
	global $ax, $mode, $nrCats;
	
	do {
		//validate form fields
		if ($msg = validateCat($cat)) { break; }
		//renumber sequence
		$stH = stPrep("SELECT `ID` FROM `categories` WHERE `status` >= 0 AND `sequence` >= ? ORDER BY `sequence`");
		stExec($stH,array($cat['sqnce']));
		$rowArray = $stH->fetchAll(PDO::FETCH_ASSOC);
		$stH = null;
		$stH = stPrep("UPDATE `categories` SET `sequence` = ? WHERE `ID` = ?");
		$count = $cat['sqnce'];
		foreach ($rowArray as $row) {
			stExec($stH,array(++$count,$row['ID']));
		}
		//add new category
		$stH = stPrep("INSERT INTO `categories` (`name`,`symbol`,`sequence`,`repeat`,`noverlap`,`olapGap`,`olErrMsg`,`defSlot`,`fixSlot`,`approve`,`dayColor`,`color`,`bgColor`,`checkBx`,`checkLb`,`checkMk`,`subName1`,`subColor1`,`subBgrnd1`,`subName2`,`subColor2`,`subBgrnd2`,`subName3`,`subColor3`,`subBgrnd3`,`subName4`,`subColor4`,`subBgrnd4`,`urlLink`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
		stExec($stH,array($cat['name'],$cat['symbl'],$cat['sqnce'],$cat['rpeat'],$cat['nolap'],$cat['olGap'],$cat['olErr'],(($cat['tsHrs'] * 60) + $cat['tsMin']),$cat['tsFix'],$cat['appro'],$cat['daybg'],$cat['color'],$cat['bgrnd'],$cat['chBox'],$cat['chLab'],$cat['chMrk'],$cat['subN1'],$cat['subC1'],$cat['subB1'],$cat['subN2'],$cat['subC2'],$cat['subB2'],$cat['subN3'],$cat['subC3'],$cat['subB3'],$cat['subN4'],$cat['subC4'],$cat['subB4'],$cat['urlLN']));
		$count = $stH->rowCount();
		if (!$count) { $msg = "Database Error: {$ax['cat_not_added']}"; break; }
		$msg = $ax['cat_added'];
		$mode = '';
	} while (false);
	return $msg;
}

function updateCat(&$cat) { //update category
	global $ax, $mode, $nrCats;
	
	do {
		//validate form fields
		if ($msg = validateCat($cat)) { break; }
		//update
		$stH = stPrep("UPDATE `categories` SET `name`=?,`symbol`=?,`sequence`=?,`repeat`=?,`noverlap`=?,`olapGap`=?,`olErrMsg`=?,`defSlot`=?,`fixSlot`=?,`approve`=?,`dayColor`=?,`color`=?,`bgColor`=?,`checkBx`=?,`checkLb`=?,`checkMk`=?,`subName1`=?,`subColor1`=?,`subBgrnd1`=?,`subName2`=?,`subColor2`=?,`subBgrnd2`=?,`subName3`=?,`subColor3`=?,`subBgrnd3`=?,`subName4`=?,`subColor4`=?,`subBgrnd4`=?,`urlLink`=? WHERE `ID`=?");
		stExec($stH,array($cat['name'],$cat['symbl'],$cat['sqnce'],$cat['rpeat'],$cat['nolap'],$cat['olGap'],$cat['olErr'],(($cat['tsHrs'] * 60) + $cat['tsMin']),$cat['tsFix'],$cat['appro'],$cat['daybg'],$cat['color'],$cat['bgrnd'],$cat['chBox'],$cat['chLab'],$cat['chMrk'],$cat['subN1'],$cat['subC1'],$cat['subB1'],$cat['subN2'],$cat['subC2'],$cat['subB2'],$cat['subN3'],$cat['subC3'],$cat['subB3'],$cat['subN4'],$cat['subC4'],$cat['subB4'],$cat['urlLN'],$cat['id']));
		$count = $stH->rowCount();
		if (!$count) { $msg = "Database Error: {$ax['cat_not_updated']}"; break; }
		//renumber sequence
		$stH = dbQuery("SELECT `ID` FROM `categories` WHERE `status` >= 0 ORDER BY `sequence`");
		$rowArray = $stH->fetchAll(PDO::FETCH_ASSOC);
		$stH = null;
		$stH = stPrep("UPDATE `categories` SET `sequence` = ? WHERE `ID` = ?");
		$count = 1;
		foreach ($rowArray as $row) {
			if ($row['ID'] != $cat['id']) {
				if ($count == $cat['sqnce']) { $count++; }
				stExec($stH,array($count++,$row['ID']));
			}
		}
		$msg = $ax['cat_updated'];
		$mode = '';
	} while (false);
	return $msg;
}

function deleteCat($cat) { //delete category
	global $ax;
	
	$stH = stPrep("UPDATE `categories` SET `sequence` = 0, `status` = -1 WHERE `ID` = ?");
	stExec($stH,array($cat['id']));
	$count = $stH->rowCount();
	if (!$count) {
		$msg = "Database Error: {$ax['cat_not_deleted']}";
	} else {
		$msg = $ax['cat_deleted'];
		//renumber sequence
		$stH = dbQuery("SELECT `ID` FROM `categories` WHERE `status` >= 0 ORDER BY `sequence`");
		$rowArray = $stH->fetchAll(PDO::FETCH_ASSOC);
		$stH = null;
		$stH = stPrep("UPDATE `categories` SET `sequence` = ? WHERE `ID` = ?");
		$count = 1;
		foreach ($rowArray as $row) {
			stExec($stH,array($count++,$row['ID']));
		}
	}
	return $msg;
}

//Control logic
if ($usr['privs'] >= 4) { //manager or admin
	$msg = '';
	if (isset($_POST['addExe'])) {
		$msg = addCat($cat);
	} elseif (isset($_POST['updExe'])) {
		$msg = updateCat($cat);
	} elseif (isset($_POST['delExe'])) {
		$msg = deleteCat($cat);
	}
	echo "<p class='error'>{$msg}</p>
		<div class='scrollBox sBoxAd'>
		<div class='centerBox'>\n";
	if ($mode == 'sort') {
		sortCategories(); //sort on name
	}
	if (($mode != 'add' and $mode != 'edit') or isset($_POST['back'])) {
		showCategories(false); //no add / no edit
	} else {
		editCategory($cat); //add or edit
		showCategories(true);
	}
	echo "</div>\n</div>\n";
} else {
	echo "<p class='error'>{$ax['no_way']}</p>\n";
}
?>