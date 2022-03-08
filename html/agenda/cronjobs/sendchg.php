<?php
/*
= Send email notification of calendar changes (added / edited / deleted events) =

This file is part of the LuxCal Web Calendar.
Copyright 2009-2020 LuxSoft - www.LuxSoft.eu
License https://www.gnu.org/licenses/gpl.html GPL version 3

-------------------------------------------------------------------
 This script depends on and is executed via the file lcalcron.php.
 See lcalcron.php header for details.
-------------------------------------------------------------------


--------- THIS SCRIPT USES THE FOLLOWING CALENDAR SETTINGS ----------
chgSumRecips: list with recipients of calendar changes separated by ;
chgNofDays: number of days to look back for calendar changes
calendarTitle: The calendar title is used in the notification email
calendarUrl: The calendar URL is used in the notification email
---------------------------------------------------------------------
*/

//
//compose list with changed events
//
function makeGrid(&$events) {
	global $set, $xx, $wkDays, $months;

	$changeList = '';
	foreach ($events as $evt) {
		$repTxt = repeatText($evt['r_t'],$evt['r_i'],$evt['r_p'],$evt['r_m'],$evt['r_u']); //add repeat text
		$eStyle = colorStyle($evt); //get event colors
		$eStyle = $eStyle ? " style=\"{$eStyle}\"" : '';
		$eBoxStyle = ' style="padding-left:5px;'.(($evt['app'] and !$evt['apd']) ? ' border-left:2px solid #ff0000;' : '').'"';
		$changeList .= "<table><tr><td width='100px'>";
		$changeList .= ($evt['sts'] < 0) ? $xx['chg_deleted'] : ($evt['mdt'] > $evt['adt'] ? $xx['chg_edited'] : $xx['chg_added']);
		$changeList .= "&nbsp;&nbsp;&nbsp;&nbsp;</td>\n";
		$changeList .= "<td{$eBoxStyle}>";
		$changeList .= "<span{$eStyle}><b>{$evt['tit']}</b></span><br>\n";
		$changeList .= makeFullDT(true,$evt['sda'],$evt['eda'],$evt['sti'],$evt['eti'])." "; //add full date/time
		$changeList .= repeatText($evt['r_t'],$evt['r_i'],$evt['r_p'],$evt['r_m'],$evt['r_u'])."<br>\n"; //add repeat text
		$changeList .= makeE($evt,$set['evtTemplGen'],'br',"<br>\n",'1234567');
		$changeList .= "</td></tr></table><br>\n";
	}
	return $changeList;
}

//
//main program
//

//prepare grabChanges
$usr['privs'] = 9; //include private events
$usr['vCats'] = $usr['eCats'] = '0'; //include all categories

function cronSendChg() {
	global $evtList, $set, $xx, $changes;
	
	if (empty($set['chgSumRecips'])) { //no email addresses to notify
		return "Recipients list empty!";
	}
		
	//initialize
	$sentTo = '';
	$evtList = array();
	$fromD = date("Y-m-d", mktime(12,0,0) - $set['chgNofDays'] * 86400); //start date
	$emlBody = '';

	//grab and process changed events
	grabChanges($fromD,1);

	foreach($evtList as $chDate => &$events) {
		$emlBody .= "<h5>{$xx['chg_changed_on']} ".makeD($chDate,5)."</h5>\n<br>\n";
		$emlBody .= makeGrid($events);
		$changes += count($events);
	}
	if ($changes) {
		$period = ($fromD != date('Y-m-d')) ? makeD($fromD,2)." - ".makeD(date('Y-m-d'),2) : makeD(date('Y-m-d'),2);
		$subject = "{$xx['chg_changes']}: {$period}";
		$sent = sendEml($subject,$emlBody,$set['chgSumRecips'],1,0,0);
		$sentTo = $sent ? $sent : "Sending mail failed. See logs/luxcal.log for details";
	}
	return $sentTo;
}
?>
