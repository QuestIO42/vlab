<?php
/*
= check events and delete event if expired more than $eventExp =

This file is part of the LuxCal Web Calendar.
Copyright 2009-2020 LuxSoft - www.LuxSoft.eu
License https://www.gnu.org/licenses/gpl.html GPL version 3

-------------------------------------------------------------------
 This script depends on and is executed via the file lcalcron.php.
 See lcalcron.php header for details.
-------------------------------------------------------------------


--------- THIS SCRIPT USES THE FOLLOWING CALENDAR SETTINGS --------
eventExp: Number of days after due date when event can be deleted
-------------------------------------------------------------------
*/

function cronEventChk() {
	global $set;
	
	//initialize
	$todayDT = date("Y-m-d H:i");
	$expireD = date("Y-m-d",time() - ($set['eventExp'] * 86400)); //expire date

	//delete events (set status to -1) which expired >= $set['eventExp'] days ago
	$stH = stPrep("UPDATE `events`
		SET `status` = -1, `mDateTime` = ?
		WHERE ((SELECT `repeat` FROM `categories` AS c WHERE c.`ID` = `catID`) = 0 AND `rType` = 0 AND CASE WHEN `eDate` LIKE '9%' THEN `sDate` ELSE `eDate` END <= ?) OR `rUntil` <= ?
	");
	stExec($stH,array($todayDT,$expireD,$expireD));
	$nrDeleted = $stH->rowCount();
	return $nrDeleted;
}
?>
