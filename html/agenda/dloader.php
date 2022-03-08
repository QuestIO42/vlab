<?php
/*= file downloader script =

This file is part of the LuxCal Web Calendar.
Copyright 2009-2020 LuxSoft - www.LuxSoft.eu
License https://www.gnu.org/licenses/gpl.html GPL version 3


this script tells the http server and client browser that the requested 
file is coming back as an application attachment to be saved as a file.
*/

//sanity checks
if (empty($_GET['ftd'])) { exit('no file'); }
$ext = substr($_GET['ftd'],-3);
if (!strpos('|sql|ics|csv|log|txt|pdf|jpg|gif|png|mp4|avi',$ext)) { exit('invalid file type'); } //valid file extensions
if (strpos('|sql|ics|log',$ext)) { //super-admin file extensions
	$calID = isset($_COOKIE['LXCcid']) ? unserialize($_COOKIE['LXCcid']) : ''; //get calendar ID
	if (!$calID) { exit('no cal ID'); }
	session_name('PHPSESSID'); session_start();
	if ((empty($_SESSION[$calID]['privs']) or $_SESSION[$calID]['privs'] != 9) and !file_exists('lctools.php')) { exit("you are not authorized"); } //no super-admin
}

//all seems fine
$fName = $_GET['ftd']; //file to download
$nName = empty($_GET['nwN']) ? substr(strrchr($_GET['ftd'],'/'),1) : $_GET['nwN']; //new name
if (file_exists($fName)) { //file valid
	header("Content-type: application/octet-stream");
	header("Content-Disposition: attachment; filename={$nName}");
	readfile($fName); //serve file
} else {
	echo "File not present";
}
?>
