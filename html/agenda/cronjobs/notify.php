<?php
/*
= check calendar database for notification messages to be sent =

This file is part of the LuxCal Web Calendar.
Copyright 2009-2020 LuxSoft - www.LuxSoft.eu
License https://www.gnu.org/licenses/gpl.html GPL version 3

-------------------------------------------------------------------
This script is executed via the file lcalcron.php. See lcalcron.php 
header for details.
-------------------------------------------------------------------

*/

function cronNotifyEml() {
	global $evtList, $set, $ax;

	//initialize
	$todayT = time()+43200; //today 12:00
	$todayD00 = date("Y-m-d", $todayT); //today
	$todayD99 = date("Y-m-d", $todayT + 8553600); //today + 99 days
	$sentTo = '';

	//set filter
	$filter = 'notEml >= 0';

	//retrieve and process events
	$usr['ID'] = 0; //all users
	$usr['privs'] = 9; //include private events
	retrieve($todayD00,$todayD99,'',$filter);

	if ($evtList) {
		foreach($evtList as $date => &$events) {
			$daysDue = round((strtotime($date.' 12:00:00') - $todayT) / 86400);
			foreach ($events as $evt) {
				if ($evt['mde'] <= 1 and //single day event or first day of multi-day event
						($daysDue == $evt['nom'] or $date == $todayD00)) { //email due
					//compose email message
					$dateTime = makeFullDT(true,$date,'',$evt['sti'],$evt['eti']);
					$status = '';
					if ($evt['cbx']) { $status .= $evt['clb'].': '.(strpos($evt['chd'], $date) ? $evt['cmk'] : '- -'); }
					$subject = ($daysDue ? "{$ax['cro_due_in']} {$daysDue} {$ax['cro_days']}" : $ax['cro_due_today']).": ".$evt['tit'];
					$eStyle = colorStyle($evt); //get event colors
					$eStyle = $eStyle ? " style=\"{$eStyle}\"" : '';
					$fields = '1238'.($set['xField1Rights'] == 1 ? '4' : '').($set['xField2Rights'] == 1 ? '5' : ''); //exclude xField 1
					$evtText = makeE($evt,$set['evtTemplGen'],'td','',$fields);
					$msgBody = "
<p>".($daysDue ? "{$ax['cro_event_due_in']} {$daysDue} {$ax['cro_days']}" : $ax['cro_event_due_today']).":</p>
<table>
	<tr><td>{$ax['cro_title']}:</td><td><b><span{$eStyle}>{$evt['tit']}</span></b></td></tr>
	".($evt['cbx'] ? "<tr><td>{$ax['cro_status']}:</td><td>{$status}</td></tr>" : '')."
	<tr><td>{$ax['cro_date_time']}:</td><td>{$dateTime}</td></tr>
	{$evtText}
</table>
";
					//send email message
					$sender = $set['notSenderEml'] ? $evt['uid'] : 0;
					$sent = sendEml($subject,$msgBody,$evt['nal'],0,$sender,$date);
					$sentTo .= $sent ? "{$sent} - {$ax['cro_subject']}: {$subject}\n" : "Sending mail failed. See logs/luxcal.log for details";
				}
			}
		}
	}
	return $sentTo;
}

function cronNotifySms() {
	global $evtList, $set, $xx, $ax;

	//initialize
	$todayT = time()+43200; //today 12:00
	$todayD00 = date("Y-m-d", $todayT); //today
	$todayD99 = date("Y-m-d", $todayT + 8553600); //today + 99 days
	$sentTo = '';

	//set filter
	$filter = 'notSms >= 0';

	//retrieve and process events
	$usr['ID'] = 0; //all users
	$usr['privs'] = 9; //include private events
	retrieve($todayD00,$todayD99,'',$filter);

	if ($evtList) {
		foreach($evtList as $date => &$events) {
			$daysDue = round((strtotime($date.' 12:00:00') - $todayT) / 86400);
			foreach ($events as $evt) {
				if ($evt['mde'] <= 1 and //single day event or first day of multi-day event
						($daysDue == $evt['nos'] or $date == $todayD00)) { //SMS due
					//compose SMS message
					$dateTime = makeFullDT(true,$date,'',$evt['sti'],$evt['eti']);
					$smsMsg = $dateTime.': '.$evt['tit'];
					if ($evt['ven']) { $smsMsg .= "\n".str_replace('!','',$evt['ven']); }
					//send SMS message
					$sender = $set['notSenderSms'] ? $evt['uid'] : 0;
					$sent = sendSms($smsMsg,$evt['nal'],$sender,$evt['eid']);
					$sentTo .= $sent ? "{$sent} - {$smsMsg}\n" : "Sending SMS mail failed. See logs/luxcal.log for details";
				}
			}
		}
	}
	return $sentTo;
}
?>
