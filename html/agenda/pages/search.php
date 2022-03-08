<?php
/*
= text search script =

This file is part of the LuxCal Web Calendar.
Copyright 2009-2020 LuxSoft - www.LuxSoft.eu
License https://www.gnu.org/licenses/gpl.html GPL version 3

The LuxCal Web Calendar is distributed WITHOUT ANY WARRANTY.
*/

//sanity check
if (empty($lcV)) { exit('not permitted ('.substr(basename(__FILE__),0,-4).')'); } //launch via script only

//initialize
$schText = (isset($_POST["schText"])) ? $_POST["schText"] : ""; //search text
$eF = isset($_POST['eF']) ? $_POST['eF'] : array(0); //field filter
if (isset($_POST['eF1'])) $eF[] = 1;
if (isset($_POST['eF2'])) $eF[] = 2;
if (isset($_POST['eF3'])) $eF[] = 3;
$grpName = (isset($_POST["grpName"])) ? $_POST["grpName"] : ""; //group filter
$catName = (isset($_POST["catName"])) ? $_POST["catName"] : ""; //category filter
$fromDda = (isset($_POST["fromDda"])) ? DDtoID($_POST["fromDda"]) : ""; //from event due date
$tillDda = (isset($_POST["tillDda"])) ? DDtoID($_POST["tillDda"]) : ""; //until event due date
if ($usr['privs'] < $set['xField1Rights']) { $set['evtTemplGen'] = str_replace('4','',$set['evtTemplGen']); } //exclude xField 1
if ($usr['privs'] < $set['xField2Rights']) { $set['evtTemplGen'] = str_replace('5','',$set['evtTemplGen']); } //exclude xField 2


/* functions */
function groupList($selGrp) {
	global $xx;
	
	$stH = dbQuery("SELECT `ID`,`name`,`color` FROM `groups` WHERE `status` >= 0 ORDER BY `name`");
	echo "<option value='*'>{$xx['sch_all_groups']}&nbsp;</option>\n";
	while (list($ID,$name,$color) = $stH->fetch(PDO::FETCH_NUM)) {
		$selected = ($selGrp == $name) ? ' selected' : '';
		echo "<option value='{$name}'".($color ? " style='background-color:{$color};'" : '')."{$selected}>{$name}</option>\n";
	}
}

function catList($selCat) {
	global $xx, $usr;
	
	$where = 'WHERE `status` >= 0'.($usr['vCats'] != '0' ? " AND `ID` IN ({$usr['vCats']})" : '');
	$stH = dbQuery("SELECT `ID`,`name`,`color`,`bgColor` FROM `categories` {$where} ORDER BY `sequence`");
	echo "<option value='*'>{$xx['sch_all_cats']}&nbsp;</option>\n";
	while (list($ID,$name,$color,$bgColor) = $stH->fetch(PDO::FETCH_NUM)) {
		$selected = ($selCat == $name) ? ' selected' : '';
		$catColor = ($color ? "color:{$color};" : '').($bgColor ? "background-color:{$bgColor};" : '');
		echo "<option value=\"{$name}\"".($catColor ? " style='{$catColor}'" : '')."{$selected}>{$name}</option>\n";
	}
}

function searchForm() {
	global $formCal, $xx, $set, $schText, $eF, $grpName, $catName, $fromDda, $tillDda;
	
	echo "<form action='index.php' method='post'>
{$formCal}
<fieldset><legend>{$xx['sch_define_search']}</legend>\n
<table class='list'>\n
<tr>\n<td class='label'>{$xx['sch_search_text']}:</td>
<td><input type='text' name='schText' id='schText' value=\"{$schText}\" maxlength='50' size='30'></td>\n</tr>
<tr><td colspan='2'><hr></td></tr>
<tr>\n<td class='label'>{$xx['sch_event_fields']}:</td>
<td><input type='checkbox' id='eF0' name='eF[]' value='0' onclick=\"check0('eF');\"".(in_array(0, $eF) ? " checked" : '')."> 
<label for='eF0'>{$xx['sch_all_fields']}</label></td>\n</tr>
<tr>\n<td></td><td><input type='checkbox' id='eF1' name='eF[]' value='1' onclick=\"checkN('eF');\"".(in_array(1, $eF) ? " checked" : '')."> 
<label for='eF1'>{$xx['sch_title']}</label></td>\n</tr>\n";
	foreach (str_split($set['evtTemplGen']) as $fieldNr) {
		if (strpos('1345',$fieldNr) !== false) {
			switch ($fieldNr) {
			case '1': 
				echo "<tr>\n<td></td><td><input type='checkbox' id='eF2' name='eF[]' value='2' onclick=\"checkN('eF');\"".(in_array(2, $eF) ? " checked" : '')."> <label for='eF2'>{$xx['sch_venue']}</label></td>\n</tr>\n";
				break;
			case '3':
				echo "<tr>\n<td></td><td><input type='checkbox' id='eF3' name='eF[]' value='3' onclick=\"checkN('eF');\"".(in_array(3, $eF) ? " checked" : '')."> <label for='eF3'>{$xx['sch_description']}</label></td>\n</tr>\n";
				break;
			case '4':
				echo "<tr>\n<td></td><td><input type='checkbox' id='eF4' name='eF[]' value='4' onclick=\"checkN('eF');\"".(in_array(4, $eF) ? " checked" : '')."> <label for='eF4'>".($set['xField1Label'] ? "{$set['xField1Label']}" : $xx['sch_extra_field1'])."</label></td>\n</tr>\n";
				break;
			case '5':
				echo "<tr>\n<td></td><td><input type='checkbox' id='eF5' name='eF[]' value='5' onclick=\"checkN('eF');\"".(in_array(5, $eF) ? " checked" : '')."> <label for='eF5'>".($set['xField2Label'] ? "{$set['xField2Label']}" : $xx['sch_extra_field2'])."</label></td>\n</tr>\n";
			}
		}
	}
	echo "<tr><td class='label'>{$xx['sch_user_group']}:</td><td><select name='grpName'>\n";
	groupList($grpName);
	echo "</select></td></tr>\n";
	echo "<tr><td class='label'>{$xx['sch_event_cat']}:</td><td><select name='catName'>\n";
	catList($catName);
	echo "</select></td></tr>\n";
	echo "<tr>\n<td class='label'>{$xx['sch_occurring_between']}:</td><td>
<input type='text' name='fromDda' id='fromDda' value='".IDtoDD($fromDda)."' size='10'>
<span class='dtPick' title=\"{$xx['sch_select_start_date']}\" onclick=\"dPicker(1,'','fromDda');return false;\">&#x1F4C5;</span> &#8211;
<input type='text' name='tillDda' id='tillDda' value='".IDtoDD($tillDda)."' size='10'>
<span class='dtPick' title=\"{$xx['sch_select_end_date']}\" onclick=\"dPicker(1,'','tillDda');return false;\">&#x1F4C5;</span></td>\n</tr>
</table>\n
</fieldset>
<button type='submit' name='search' value='y'>{$xx['sch_search']}</button>\n
</form>
<div style='clear:right'></div>\n
<script>document.getElementById('schText').focus();</script>";
}

function validateForm() {
	global $xx, $schText, $fromDda, $tillDda;
	
	$schText = trim(str_replace('%', '', $schText),'&');
	if (strlen(str_replace('_', '', $schText)) < 1) { return $xx['sch_invalid_search_text']; }
	if ($fromDda === false) { return $xx['sch_bad_start_date']; }
	if ($tillDda === false) { return $xx['sch_bad_end_date']; }
	if ($fromDda and $tillDda and $fromDda > $tillDda) { return $xx['evt_end_before_start_date']; }
	return '';
}
	
function searchText() {
	global $formCal, $xx, $set, $nowTS, $schText, $eF, $grpName, $catName, $fromDda, $tillDda;
	
	//set event filter
	$schString = str_replace('&', '%', "%{$schText}%");
	//prepare description filter
	$filter = '';
	if ($grpName != '*') { $filter .= " AND g.`name` = '".str_replace("'","''",$grpName)."'"; }
	if ($catName != '*') { $filter .= " AND c.`name` = '".str_replace("'","''",$catName)."'"; }
	$filter .= " AND (";
	if (in_array(0, $eF) or in_array(1, $eF)) { $filter .= "e.`title` LIKE '{$schString}'"; } //Title
	if (in_array(0, $eF) or in_array(2, $eF)) { $filter .= ((substr($filter, -1) == '(') ? '' : ' OR ')."e.`venue` LIKE '{$schString}'"; } //venue
	if (in_array(0, $eF) or in_array(3, $eF)) { $filter .= ((substr($filter, -1) == '(') ? '' : ' OR ')."e.`text1` LIKE '{$schString}'"; } //text field 1
	if (in_array(0, $eF) or in_array(4, $eF)) { $filter .= ((substr($filter, -1) == '(') ? '' : ' OR ')."e.`text2` LIKE '{$schString}'"; } //text field 2
	if (in_array(0, $eF) or in_array(5, $eF)) { $filter .= ((substr($filter, -1) == '(') ? '' : ' OR ')."e.`text3` LIKE '{$schString}'"; } //text field 3
	$filter = substr($filter,5).")";
	
	//set event date range
	$sDate = ($fromDda) ? $fromDda : date('Y-m-d',$nowTS-31536000); //-1 year
	$eDate = ($tillDda) ? $tillDda : date('Y-m-d',$nowTS+31536000); //+1 year

	retrieve($sDate,$eDate,'',$filter); //grab events

	//display header
	$fields = '';
	if (in_array(0, $eF) or in_array(1, $eF)) { $fields = ' + '.$xx['sch_title']; }
	foreach (str_split($set['evtTemplGen']) as $fieldNr) {
		if (strpos('1345',$fieldNr) !== false) {
			switch ($fieldNr) {
			case '1': 
				if (in_array(0, $eF) or in_array(2, $eF)) { $fields .= ' + '.$xx['sch_venue']; } break;
			case '3':
				if (in_array(0, $eF) or in_array(3, $eF)) { $fields .= ' + '.$xx['sch_description']; } break;
			case '4':
				if (in_array(0, $eF) or in_array(4, $eF)) { $fields .= ' + '.($set['xField1Label'] ? "{$set['xField1Label']}" : $xx['sch_extra_field1']); } break;
			case '5':
				if (in_array(0, $eF) or in_array(5, $eF)) { $fields .= ' + '.($set['xField2Label'] ? "{$set['xField2Label']}" : $xx['sch_extra_field2']); }
			}
		}
	}
	$fields = substr($fields,3);

	echo "<div class='subHead'>
<form id='event' name='event' method='post'>
{$formCal}
<input type='hidden' name='schText' value=\"{$schText}\">\n";
	foreach ($eF as $key => $value) { echo "<input type='hidden' name='eF[]' value=\"{$value}\">\n";	}
	echo "<input type='hidden' name='grpName' value=\"{$grpName}\">
<input type='hidden' name='catName' value=\"{$catName}\">
<input type='hidden' name='fromDda' value='".IDtoDD($fromDda)."'>
<input type='hidden' name='tillDda' value='".IDtoDD($tillDda)."'>
<button class='floatR' type='submit' name='newSearch' value='y'>{$xx['sch_new_search']}</button>
</form>
{$xx['sch_search_text']}: <b>{$schText}</b><br>
{$xx['sch_event_fields']}: <b>{$fields}</b><br>
{$xx['sch_user_group']}: <b>".($grpName != '*' ? $grpName : $xx['sch_all_groups'])."</b><br>
{$xx['sch_event_cat']}: <b>".($catName != '*' ? $catName : $xx['sch_all_cats'])."</b><br>
{$xx['sch_occurring_between']}: <b>".makeD($sDate,2)." - ".makeD($eDate,2)."</b>
</div>\n";
}

function showMatches($eType) { //eType (0: normal, 1: mde, 2: recurring)
	global $usr, $set, $xx, $evtList, $schText;

	//display matching events
	$match = '%('.str_replace(array('_','&'), array('.','[^<>]+?'), $schText).')(?![^<]*>)%i'; //convert to regex (?!: neg.look-ahead condition)
	$evtDone = array();
	foreach($evtList as $date => &$events) {
		foreach ($events as $evt) {
			if ($eType == 0) {
				if ($evt['mde'] or $evt['r_t']) { continue; } //mde or rec event
				$evtDate = "<a href=\"javascript:index({cP:2,cD:'{$date}'})\" title=\"{$xx['sch_calendar']}\">".makeD($date,5)."</a>";
			} elseif ($eType == 1) {
				if (!$evt['mde'] or in_array($evt['eid'],$evtDone)) { continue; } //!mde or mde processed
				$evtDate = "<a href=\"javascript:index({cP:2,cD:'{$date}'})\" title=\"{$xx['sch_calendar']}\">".makeD($evt['sda'],5)." - ".makeD($evt['eda'],5)."</a>";
			} elseif ($eType == 2) {
				if (!$evt['r_t'] or in_array($evt['eid'],$evtDone)) { continue; } //!rec or rec processed
				$evtDate = "<a href=\"javascript:index({cP:2,cD:'{$date}'})\" title=\"{$xx['sch_calendar']}\">".makeD($date,5).' - '.repeatText($evt['r_t'],$evt['r_i'],$evt['r_p'],$evt['r_m'],$evt['r_u'])."</a>";
			}
			$evtDone[] = $evt['eid'];
			$evtTime = $evt['ald'] ? $xx['vws_all_day'] : ITtoDT($evt['sti']).($evt['eti'] ? ' - '.ITtoDT($evt['eti']) : '');
			$eStyle = colorStyle($evt); //get event colors
			$eStyle = $eStyle ? " style=\"{$eStyle}\"" : '';
			$chBox = $evt['cbx'] ? checkBox($evt,$date,'?') : '';
			$toAppr = ($evt['app'] and !$evt['apd']) ? ' toAppr' : '';
			echo "<div class='hired'>{$evtDate}</div>\n";
			echo "<table>\n<tr>\n<td class='widthCol1'>{$evtTime}</td>";
			echo "<td class='eBox{$toAppr}'>";
			$eTitle = preg_replace($match, '<mark>$1</mark>',$evt['tit']);
			if ($set['details4All'] == 1 or ($set['details4All'] == 2 and $usr['ID'] > 1) or $evt['mayE']) {
				$click = ($evt['mayE'] ? 'editE' : 'showE')."({$evt['eid']},'{$date}')";
				echo "<dir class='evtTitle bold'>{$chBox}<span class='point'{$eStyle} onclick=\"{$click};\">".$eTitle."</span></dir>\n";
				echo preg_replace($match, '<mark>$1</mark>',makeE($evt,$set['evtTemplGen'],'bx',"<br>\n"))."\n";
			} else {
				echo "<dir class='evtTitle bold'>{$chBox}<span{$eStyle}>".$eTitle."</span></dir>\n";
			}
			echo "</td></tr></table><br>\n";
		}
	}
	if (empty($evtDone)) {
		echo $xx['none'];
	}
}

//control logic

$msg = ''; //init
if (isset($_POST["search"])) {
	$msg = validateForm();
}
echo "<p class='error'>{$msg}</p>\n";
if (isset($_POST["search"]) and !$msg) {
	searchText(); //search
	echo "<div class='scrollBox sBoxTs'>\n";
$fsClass = $winXS ? 'upc-m' : 'upc';
	if ($evtList) {
		echo "<fieldset class='{$fsClass}'>\n<legend>{$xx['sch_sd_events']}</legend>\n";
		showMatches(0); //show results single-day events
		echo "</fieldset>";
		echo "<fieldset class='{$fsClass}'>\n<legend>{$xx['sch_md_events']}</legend>\n";
		showMatches(1); //show results multi-day events
		echo "</fieldset>";
		echo "<fieldset class='{$fsClass}'>\n<legend>{$xx['sch_rc_events']}</legend>\n";
		showMatches(2); //show results recurring events
		echo "</fieldset>";
	} else {
		echo "<div class='floatC'>{$xx['sch_no_results']}</div>\n";
	}
	echo "</div>\n";
} else {
	echo "<div class='scrollBox sBoxTs'>
<aside class='aside'>\n{$xx['sch_instructions']}\n</aside>
<div class='centerBox'>\n";
	searchForm(); //define search
	echo "</div>\n</div>\n";
}
?>
