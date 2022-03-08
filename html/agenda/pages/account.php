<?php
/*
= LuxCal user account data page =

This file is part of the LuxCal Web Calendar.
Copyright 2009-2020 LuxSoft - www.LuxSoft.eu
License https://www.gnu.org/licenses/gpl.html GPL version 3

The LuxCal Web Calendar is distributed WITHOUT ANY WARRANTY.
*/

//sanity check
if (empty($lcV)) { exit('not permitted ('.substr(basename(__FILE__),0,-4).')'); }

//initialize
$adminLang = (file_exists("./lang/ai-{$opt['cL']}.php")) ? $opt['cL'] : "english";
require "./lang/ai-{$adminLang}.php";
$msg = '';

$user = array();
$xCode = isset($_POST['xCode']) ? $_POST['xCode'] : '';
$user['ID'] = $usr['ID'];
$user['name'] = isset($_POST['uname']) ? $_POST['uname'] : $usr['name'];
$user['email'] = isset($_POST['email']) ? $_POST['email'] : $usr['mail'];
$user['phone'] = isset($_POST['phone']) ? preg_replace("%[\s\\/-]%",'',$_POST['phone']) : $usr['phone'];
$user['lang'] = isset($_POST['lang']) ? $_POST['lang'] : strtolower($usr['lang']);
$user['pword'] = isset($_POST['pword']) ? $_POST['pword'] : '';
$user['pword2'] = isset($_POST['pword2']) ? $_POST['pword2'] : '';

function changeUser($user) { //change user data
	global $calID, $ax, $rxEmail, $xCode, $nowTS;
	
	$msg = '';
	$lNewPw = isset($_POST["lNewPw"]) ? trim($_POST["lNewPw"]) : '';
	do {
		if (!$xCode OR $xCode > $nowTS OR $xCode < $nowTS-300) { $msg = $ax['log_time_out']; break; }
		if (!$user['name']) { $msg = $ax['log_no_un_em']; break; }
		if (!preg_match("~^[\w\s\-.]{2,}$~", $user['name'])) { $msg = $ax['log_un_invalid']; break; }
		if (!preg_match($rxEmail,$user['email'])) { $msg = $ax['log_em_invalid']; break; }
		if ($user['phone'] and !preg_match("~^\+?[\d]{4,19}$~",$user['phone'])) { $msg = $ax['log_ph_invalid']; break; }
		if ($user['pword'] != $user['pword2']) { $msg = $ax['log_pw_error']; break; }
		$stH = stPrep("SELECT `name`,`email` FROM `users` WHERE `ID` = ?");
		stExec($stH,array($user['ID']));
		$row = $stH->fetch(PDO::FETCH_NUM); //fetch user details
		$stH = null;
		if (!$row) { $msg = $ax['log_un_em_pw_invalid']; break; }
		list($name,$email) = $row;

		if ($name != $user['name']) { //username changed
			$stH = stPrep("SELECT `ID` FROM `users` WHERE `ID` != ? AND `name` = ? AND `status` >= 0");
			stExec($stH,array($user['ID'],$user['name']));
			if ($stH->fetchAll()) { $msg = $ax['log_new_un_exists']; break; } //un already exists
		}
		if ($email != $user['email']) {	//email changed	
			$stH = stPrep("SELECT `ID` FROM `users` WHERE `ID` != ? AND `email` = ? AND `status` >= 0");
			stExec($stH,array($user['ID'],$user['email']));
			if ($stH->fetchAll()) { $msg = $ax['log_new_em_exists']; break; } //em already exists
		}
		$stH = stPrep("UPDATE `users` SET `name` = ?,`email` = ?,`phone` = ?,`language` = ? WHERE `ID` = ?");
		stExec($stH,array($user['name'],$user['email'],$user['phone'],$user['lang'],$user['ID']));
		if ($user['pword']) {
			$md5Pw = md5($user['pword']);
			$stH = stPrep("UPDATE `users` SET `password` = ? WHERE `ID` = ?");
			stExec($stH,array($md5Pw,$user['ID']));
		}
		$_SESSION[$calID]['cL'] = $user['lang']; //set cL to selected language
	} while (false);
	return $msg;
}

function changeForm($user) { //change my data
	global $formCal, $ax, $nowTS;
	
	$stH = stPrep("SELECT `ID`,`name`,`email`,`phone`,`number`,`language` FROM `users` WHERE `ID` = ?");
	stExec($stH,array($user['ID']));
	$row = $stH->fetch(PDO::FETCH_ASSOC); //fetch user details
	$stH = null;
	echo "<legend>{$ax['log_change_my_data']}</legend>
<form action='index.php' method='post'>
{$formCal}
<input type='hidden' name='xCode' value='{$nowTS}'>
{$ax['log_un']}<span class='hired'>*</span><br><input type='text' name='uname' size='50' value='{$row['name']}'><br><br>
{$ax['log_em']}<span class='hired'>*</span><br><input type='text' name='email' size='50' value='{$row['email']}'><br><br>
{$ax['log_ph']}<br><input type='text' name='phone' size='50' value='{$row['phone']}'><br><br>
{$ax['log_ui_language']}<pre> </pre>
<select name='lang'>\n";
	$files = scandir("lang/");
	foreach ($files as $file) {
		if (substr($file,0,3) == "ui-") {
			$lang = strtolower(substr($file,3,-4));
			echo "<option value=\"{$lang}\"".($row['language'] == $lang ? ' selected' : '').'>'.ucfirst($lang)."</option>\n";
		}
	}
	echo "</select><br><br>
{$ax['log_new_pw']}<br><input type='password' name='pword' size='50'><br><br>
{$ax['log_con_pw']}<br><input type='password' name='pword2' size='50'><br><br>
<button class='center' type='submit' name='action' value='chgExe'>{$ax['log_save']}</button>
</form>\n";
}

//control logic
$msg = '';
$class = 'error';
$action = isset($_POST['action']) ? $_POST['action'] : '';

if ($action == "chgExe") { //change data
	$msg = changeUser($user);
	if (!$msg) { $msg = $ax['usr_updated']; $class == 'confirm';}
}

//display form
echo "<p class='{$class}'>{$msg}</p><br>\n";
echo "<div class='scrollBox sBoxAd'>\n<div class='centerBox'>\n<fieldset>\n";
changeForm($user); //change data form
echo "</fieldset>\n</div>\n</div>\n";
?>