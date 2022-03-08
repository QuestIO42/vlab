<?php
/*
= LuxCal log in / register page =

This file is part of the LuxCal Web Calendar.
Copyright 2009-2020 LuxSoft - www.LuxSoft.eu
License https://www.gnu.org/licenses/gpl.html GPL version 3

The LuxCal Web Calendar is distributed WITHOUT ANY WARRANTY.
*/

function notifyReg($uName,$eMail) { //notify a new user registration
	global $ax, $set, $today;
		
	//compose email message
	$subject = "{$ax['log_new_reg']}: {$uName}";
	$msgBody = "
<p>{$ax['log_new_reg']}:</p><br>
<table>
	<tr><td>{$ax['log_un']}:</td><td>{$uName}</td></tr>
	<tr><td>{$ax['log_em']}:</td><td>{$eMail}</td></tr>
	<tr><td>{$ax['log_date_time']}:</td><td>".IDtoDD($today)." {$ax['at_time']} ".ITtoDT(date("H:i"))."</td></tr>
</table>
";
	//send email
	$result = sendEml($subject,$msgBody,$set['calendarEmail'],1,0,0);
	return $result;
}

function loginUser(&$user,$chg) { //login user
	global $calID, $ax, $xCode, $cookie, $nowTS;
	
	$msg = '';
	do {
		if (!$user['un_em']) { $msg = $ax['log_no_un_em']; break; }
		if (!$user['pword']) { $msg = $ax['log_no_pw']; break; }
		if (!$xCode OR $xCode > $nowTS OR $xCode < $nowTS-300) { $msg = $ax['log_time_out']; break; }
		$md5Pw = md5($user['pword']);
		$stH = stPrep("SELECT u.`ID`,u.`password`,u.`tPassword`,u.`language`,g.`privs` FROM `users` AS u INNER JOIN `groups` AS g ON g.`ID` = u.`groupID` WHERE (u.`name` = ? OR `email` = ?) AND (`password` = ? OR `tPassword` = ?) AND u.`status` >= 0");
		stExec($stH,array($user['un_em'],$user['un_em'],$md5Pw,$md5Pw));
		$row = $stH->fetch(PDO::FETCH_ASSOC); //fetch user details
		$stH = null;
		if (!$row) { $msg = $ax['log_un_em_pw_invalid']; break; }
		$user['ID'] = $row['ID'];
		if (!$chg) { //login and start calendar
			if ($row['privs'] < 1) { $msg = $ax['log_no_rights']; break; }
			if ($row['tPassword']) { //temp password set
				$stH = stPrep("UPDATE `users` SET `password` = ?,`tPassword` = ? WHERE `ID` = ?");
				stExec($stH,array($md5Pw,'',$row['ID']));
			}
			$_SESSION[$calID]['cL'] = $row['language']; //set cL to user language
			echo "<script>index({userID:{$row['ID']},cP:0,bake:{$cookie}});</script>\n"; //goto default page
		}
	} while (false);
	return $msg;
}

function registerUser(&$user) { //register user
	global $ax, $set, $rxEmail, $xCode, $nowTS;
	
	$msg = '';
	do {
		if (!$xCode OR $xCode > $nowTS OR $xCode < $nowTS-300) { $msg = $ax['log_time_out']; break; }
		if (!$user['name']) { $msg = $ax['log_no_un']; break; }
		if (!$user['email']) { $msg = $ax['log_no_em']; break; }
		if (!preg_match("/^[\w\s\._-]{2,}$/u", $user['name'])) { $msg = $ax['log_un_invalid']; break; }
		if (!preg_match($rxEmail,$user['email'])) { $msg = $ax['log_em_invalid']; break; }
		if ($user['phone'] and !preg_match("/^\+?[\d]{4,19}$/",$user['phone'])) { $msg = $ax['log_ph_invalid']; break; }
		if ($set['selfRegQ'] and $user['selfRegA'] != $set['selfRegA']) {
			$_SESSION['srCnt'] = isset($_SESSION['srCnt']) ? $_SESSION['srCnt'] + 1 : 1;
			$msg = $_SESSION['srCnt'] < 4 ? $ax['log_sra_wrong'] : $ax['log_sra_wrong_4x'];
			break;
		}
		$stH = stPrep("SELECT `name` FROM `users` WHERE `name` = ? AND `status` >= 0");
		stExec($stH,array($user['name']));
		if ($stH->fetchAll()) { $msg = $ax['log_un_exists']; break; } //un already exists
		$stH = stPrep("SELECT `email` FROM `users` WHERE `email` = ? AND `status` >= 0");
		stExec($stH,array($user['email']));
		if ($stH->fetchAll()) { $msg = $ax['log_em_exists']; break; } //em already exists
		$newPw = substr(md5($user['name'].microtime()), 0, 8);
		$stH = stPrep("INSERT INTO `users` (`name`,`password`,`email`,`phone`,`groupID`,`language`) VALUES (?,?,?,?,?,?)");
		stExec($stH,array($user['name'],md5($newPw),$user['email'],$user['phone'],$set['selfRegGrp'],$user['lang']));
		$stH = null;
		$msgBody = "
<p>{$ax['log_pw_msg']}: {$set['calendarTitle']}:</p><br>
<p>{$ax['log_un']}: <span class='bold'>{$user['name']}</span> {$ax['or']} {$ax['log_em']}: <span class='bold'>{$user['email']}</span></p>
<p>{$ax['log_pw']}: <span class='bold'>{$newPw}</span></p>
";
		$result = sendEml($ax['log_pw_subject'],$msgBody,$user['email'],1,0,0); //send email
		$user['un_em'] = $user['name']; //save for login
		if (!$result) { $msg = $ax['log_em_problem_not_sent']; }
		if ($set['selfRegNot']) {
			$result = notifyReg($user['name'],$user['email']);
			if (!$result and empty($msg)) { $msg = $ax['log_em_problem_not_noti']; }
		}
	} while (false);
	return $msg;
}

function sendNewPw($user) { //send new password
	global $ax, $set;
	
	$msg = '';
	do {
		if (!$user['un_em']) { $msg = $ax['log_no_un_em']; break; }
		$stH = stPrep("SELECT `name`,`email` FROM `users` WHERE (`name` = ? OR `email` = ?) AND `status` >= 0");
		stExec($stH,array($user['un_em'],$user['un_em']));
		$row = $stH->fetch(PDO::FETCH_ASSOC); //fetch user details
		$stH = null;
		if (!$row) { $msg = $ax['log_un_em_invalid']; break; }
		$sendto = $row['email'];
		$uname = $row['name'];
		$newPw = substr(md5($user['un_em'].microtime()),0,8);
		$cryptpw = md5($newPw);
		$stH = stPrep("UPDATE `users` SET `tPassword` = ? WHERE `name` = ? OR `email` = ?");
		stExec($stH,array(md5($newPw),$user['un_em'],$user['un_em']));
		$msgBody = "
<p>{$ax['log_pw_msg']}: {$set['calendarTitle']}:</p><br>
<p>{$ax['log_un']}: <span class='bold'>{$uname}</span> {$ax['or']} {$ax['log_em']}: <span class='bold'>{$sendto}</span></p>
<p>{$ax['log_pw']}: <span class='bold'>{$newPw}</span></p>
";
		$result = sendEml($ax['log_npw_subject'],$msgBody,$sendto,1,0,0); //send email
		if (!$result) { $msg = $ax['log_em_problem_not_sent']; }
	} while (false);
	return $msg;
}

function loginForm($user) { //login form
	global $formCal, $calID, $ax, $set, $nowTS;

	if (!empty($user['name'])) { $user['un_em'] = $user['name']; }
	echo "<form action='index.php' method='post'>
{$formCal}
<fieldset><legend>{$ax['log_log_in']}</legend>
<input type='hidden' name='xCode' value='{$nowTS}'>
{$ax['log_un_or_em']}<br><input type='text' name='un_em' id='uname' size='50' value='{$user['un_em']}'><br><br>
{$ax['log_pw']}<br><input type='password' name='pword' size='20'><br><br><br>
<button type='submit' class='bold' name='action' value='logExe'>{$ax['log_log_in']}</button>\n";
	echo "<span class='floatR'><input type='checkbox' id='cookie' name='cookie' value='1' ".(isset($_COOKIE["LXCuid_{$calID}"]) ? " checked" : '')."><label for='cookie'> {$ax['log_remember_me']}</label></span>\n";
	echo "<br><br><hr>\n";
	if ($set['selfReg'] and (!isset($_SESSION['srCnt']) or $_SESSION['srCnt'] < 4)) {
		echo "<button class='floatR butLink' type='submit' name='action' value='rgr'>{$ax['log_register']}</button><br>\n";
	}
	echo "<button class='clear floatR butLink' type='submit' name='action' value='logSpw'>{$ax['log_send_new_pw']}</button>\n";
	echo "</fieldset></form>\n";
}

function registerForm($user) { //register form
	global $formCal, $set, $ax, $nowTS;

	if ($user['un_em']) {
		if (strpos($user['un_em'],'@')) {
			$user['email'] = $user['un_em'];
		} else {
			$user['name'] = $user['un_em'];
		}
	}
	echo "<form action='index.php' method='post'>
{$formCal}
<fieldset><legend>{$ax['log_register']}</legend>
<input type='hidden' name='xCode' value='{$nowTS}'>
<input type='hidden' name='un_em' value='{$user['un_em']}'>
{$ax['log_un']}<span class='hired'>*</span><br><input type='text' name='uname' id='uname' size='50' value='{$user['name']}'><br><br>
{$ax['log_em']}<span class='hired'>*</span><br><input type='text' name='email' size='50' value='{$user['email']}'><br><br>
{$ax['log_ph']}<br><input type='text' name='phone' size='50' value='{$user['phone']}'><br><br>
{$ax['log_ui_language']}<pre> </pre>
<select name='lang'>\n";
	$files = scandir("lang/");
	foreach ($files as $file) {
		if (substr($file,0,3) == "ui-") {
			$lang = strtolower(substr($file,3,-4));
			echo "<option value=\"{$lang}\"".(strtolower($user['lang']) == $lang ? ' selected' : '').'>'.ucfirst($lang)."</option>\n";
		}
	}
	echo "</select><br><br>";
if ($set['selfRegQ']) {
	echo "<span class='bold'>{$set['selfRegQ']}?</span><span class='hired'>*</span><br>
{$ax['log_answer']}: <input type='text' name='selfRegA' size='25' value='{$user['selfRegA']}'><br><br>";
}
echo "<button class='floatR button' type='submit' name='action' value='rgrExe'>{$ax['log_register']}</button>
<button type='submit' name='back' value='y'>{$ax['back']}</button>
</fieldset></form>\n";
}


//sanity check
if (empty($lcV)) { exit('not permitted ('.substr(basename(__FILE__),0,-4).')'); }

//initialize
$adminLang = (file_exists("./lang/ai-{$opt['cL']}.php")) ? $opt['cL'] : "english";
require "./lang/ai-{$adminLang}.php";
$msg = '';
$user = array();
$xCode = isset($_POST['xCode']) ? $_POST['xCode'] : '';
$user['un_em'] = isset($_POST['un_em']) ? $_POST['un_em'] : '';
$user['name'] = isset($_POST['uname']) ? $_POST['uname'] : '';
$user['pword'] = isset($_POST['pword']) ? $_POST['pword'] : '';
$user['email'] = isset($_POST['email']) ? $_POST['email'] : '';
$user['phone'] = isset($_POST['phone']) ? preg_replace("%[\s\\/-]%",'',$_POST['phone']) : '';
$user['selfRegA'] = isset($_POST['selfRegA']) ? $_POST['selfRegA'] : '';
$user['lang'] = isset($_POST['lang']) ? $_POST['lang'] : $set['language'];
$cookie = empty($_POST['cookie']) ? '0' : '1';

//control logic
$msg = '';
$class = 'error';
$action = isset($_POST['action']) ? $_POST['action'] : '';

switch ($action) {
case "logExe": //login
	$msg = loginUser($user,0);
	$action = 'back';
	break;
case "logSpw": //send new password
	$msg = sendNewPw($user);
	if (!$msg) { $msg = $ax['log_npw_sent']; $class == 'confirm'; }
	$action = 'back';
	break;
case "rgrExe": //register
	$msg = registerUser($user);
	if (!$msg) { $msg = $ax['log_registered']; $class == 'confirm'; }
	$action = (!isset($_SESSION['srCnt']) or $_SESSION['srCnt'] < 4) ? 'rgr' : 'back'; //register form or back to login form
	break;
}

//display form
echo "<p class='{$class}'>{$msg}</p><br>\n";
echo "<div class='scrollBox sBoxAd'>\n<div class='centerBox'>\n";
	if (!$action or $action == 'back') { //login form
		loginForm($user);
	} elseif ($action == 'rgr') { //register form
		registerForm($user);
	}
echo "</div>\n</div>\n";
echo '<script>$I("uname").focus();</script>'."\n";
?>