<?php
/*
= view calendar changes (added / edited / deleted events) since specified date =

This file is part of the LuxCal Web Calendar.
Copyright 2009-2020 LuxSoft - www.LuxSoft.eu
License https://www.gnu.org/licenses/gpl.html GPL version 3

The LuxCal Web Calendar is distributed WITHOUT ANY WARRANTY.
*/

require './common/retrievc.php';

function showEvents(&$events,$date) {
	global $set, $eDetails, $xx;
	
	foreach ($events as $evt) {
		$repTxt = repeatText($evt['r_t'],$evt['r_i'],$evt['r_p'],$evt['r_m'],$evt['r_u']); //make repeat text
		$dateTime = makeFullDT(true,$evt['sda'],$evt['eda'],$evt['sti'],$evt['eti']); //make full date/time
		if ($repTxt) { $dateTime .= " ({$repTxt})\n"; } //add repeat text
		$eStyle = colorStyle($evt); //get event colors
		$eStyle = $eStyle ? " style='{$eStyle}'" : '';
		$toAppr = ($evt['app'] and !$evt['apd']) ? ' toAppr' : '';
		$age = ($evt['rpt'] == 4 and preg_match('%\(((?:19|20)\d\d)\)%',$evt['des'],$year)) ? ' ('.strval(substr($date,0,4) - $year[1]).')' : '';
		echo "<table>\n<tr>\n<td class='widthCol1'>".(($evt['sts'] < 0) ? $xx['chg_deleted'] : ($evt['mdt'] > $evt['adt'] ? $xx['chg_edited'] : $xx['chg_added']))."</td>\n";
		echo "<td class='eBox{$toAppr}'>{$dateTime}";
		if ($evt['sts'] >= 0 and ($eDetails or $evt['mayE'])) {
			$click = ($evt['mayE'] ? 'editE' : 'showE')."({$evt['eid']},'{$date}')";
			$title = $evt['mayE'] ? $xx['vws_edit_event'] : ($eDetails ? $xx['vws_see_event'] : '');
			echo "<div class='point evtTitle bold'{$eStyle} onclick=\"{$click};\" title=\"{$title}\">{$evt['tix']}{$age}</div>\n";
		} else {
			echo "<div class='evtTitle bold'{$eStyle}>{$evt['tix']}{$age}</div>\n";
		}
		if ($eDetails or $evt['mayE']) {
			echo makeE($evt,$set['evtTemplGen'],'bx',"<br>\n")."\n";
		}
		echo "</td>\n</tr>\n</table>\n<br>\n";
	}
}

//sanity check
if (empty($lcV)) { exit('not permitted ('.substr(basename(__FILE__),0,-4).')'); } //launch via script only

//main program
$evtList = array();
$fromD = (isset($_POST['fromD'])) ? DDtoID($_POST['fromD']) : $today;
$fromD = min($fromD,$today);

//display header
echo "<div class='subHead'>
<form id='selectD' name='selectD' method='post'>{$xx['chg_from_date']}: 
{$formCal}
<input type='text' id='fromD' name='fromD' value='".IDtoDD($fromD)."' size='10'>
<span class='dtPick noPrint' title=\"{$xx['chg_select_date']}\" onclick=\"dPicker(0,'selectD','fromD');return false;\">&#x1F4C5;</span>
</form>\n";
if ($fromD != $today) {
	echo "<br><h5>".makeD($fromD,2)." - ".makeD($today,2)."</h5>\n";
}
echo "</div>\n";

// retrieve changed events
grabChanges($fromD,0); //query db for changes

//display changes
echo "<div".($winXS ? '' : " class='scrollBox sBoxCh' id='sBox'").">\n";
$fsClass = $winXS ? 'upc-m' : 'upc';
if ($evtList) {
	foreach($evtList as $date => &$events) {
		if ($events) {
			echo "<fieldset class='{$fsClass}'>\n<legend>{$xx['chg_changed_on']} ".makeD($date,5)."</legend>\n";
			showEvents($events,$date);
			echo "</fieldset>";
		}
	}
} else {
	echo "<div class='floatC'>{$xx['chg_no_changes']}</div>\n";
}
echo "</div>\n<br>";
?>
