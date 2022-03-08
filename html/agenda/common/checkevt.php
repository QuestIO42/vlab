<?php
/*
= LuxCal Check / Uncheck Event =

This file is part of the LuxCal Web Calendar.
Copyright 2009-2020 LuxSoft - www.LuxSoft.eu
License https://www.gnu.org/licenses/gpl.html GPL version 3

*/
chdir('..'); //change to calendar root
//load config data
require './lcconfig.php';

//get input params
$evtID = $_POST['evtID'];
$evtDt = $_POST['evtDt'];
$usrID = $_POST['usrID'];

//sanity check
if (empty($lcV) or
		!preg_match('%^\d{1,8}$%', $evtID) or
		!preg_match('%^\d{2,4}-\d{2}-\d{2,4}$%', $evtDt)
	) { echo '0'; exit(); } //abort

//get calendar in use
$calID = isset($_COOKIE['LXCcid']) ? unserialize($_COOKIE['LXCcid']) : $dbDef;

//get db toolbox
require './common/toolboxd.php'; //database tools + LCV

//connect to db
$dbH = dbConnect($calID);

//get default timezone from settings
$set = getSettings();
date_default_timezone_set($set['timeZone']);

//get user name
$stH = stPrep("SELECT `name` FROM `users` WHERE `ID` = ?");
stExec($stH,array($usrID));
list($uName) = $stH->fetch(PDO::FETCH_NUM);

//get check data
$stH = stPrep("
	SELECT e.`checked`,c.`checkMk`
	FROM `events` e
	INNER JOIN `categories` c ON c.`ID` = e.`catID`
	WHERE e.`ID` = ?");
stExec($stH,array($evtID));
list($chd,$cmk) = $stH->fetch(PDO::FETCH_NUM);
$stH = null;

//set/unset checked
if (!strpos($chd,$evtDt)) { //check
	$chd .= ";{$evtDt}";
	$response = $cmk; //check mark
} else { //uncheck
	$chd = str_replace(";{$evtDt}",'',$chd);
	$response = '&#x2610;'; //ballot box
}

//update event
$stH = stPrep("UPDATE `events` SET `checked` = ?,`editor` = ?,`mDateTime` = ? WHERE `ID` = ?");
stExec($stH,array($chd,$uName,date("Y-m-d H:i"),$evtID)); //update events table

echo $response;
?>