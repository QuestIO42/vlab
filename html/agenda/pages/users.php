<?php
/*
= LuxCal user management page =

This file is part of the LuxCal Web Calendar.
Copyright 2009-2020 LuxSoft - www.LuxSoft.eu
License https://www.gnu.org/licenses/gpl.html GPL version 3

The LuxCal Web Calendar is distributed WITHOUT ANY WARRANTY.
*/

//sanity check
if (empty($lcV) or
		(isset($_REQUEST['uid']) and !preg_match('%^\d{1,5}$%',$_REQUEST['uid'])) or
		(isset($_POST['delExe']) and !preg_match('%^\w$%',$_POST['delExe'])) or
		(!empty($mode) and !preg_match('%^(add|edit)$%',$mode))
	) { exit('not permitted ('.substr(basename(__FILE__),0,-4).')'); }

//initialize
$adminLang = (file_exists("./lang/ai-{$opt['cL']}.php")) ? $opt['cL'] : "english";
require "./lang/ai-{$adminLang}.php";
if (!isset($mode)) { $mode = ''; }

$user = array();
$user['id'] = isset($_REQUEST['uid']) ? $_REQUEST['uid'] : 0;
$user['name'] = isset($_POST['uName']) ? trim($_POST['uName']) : '';
$user['mail'] = isset($_POST['email']) ? trim($_POST['email']) : '';
$user['phone'] = isset($_POST['phone']) ? str_replace(array(' ','-','/','\\','(',')'),'',$_POST['phone']) : '';
$user['usrNr'] = isset($_POST['usrNr']) ? trim($_POST['usrNr']) : '';
$user['lang'] = isset($_POST['lang']) ? $_POST['lang'] : $set['language'];
$user['pword'] = isset($_POST['pword']) ? $_POST['pword'] : '';
$user['newPw'] = isset($_POST['newPw']) ? $_POST['newPw'] : '';
$user['grpID'] = isset($_POST['grpID']) ? $_POST['grpID'] : $set['selfRegGrp'];

function showUsers() {
	global $ax, $usr;

	echo "<fieldset><legend>{$ax['usr_list_of_users']}</legend>\n";
	$stH = stPrep("SELECT u.`ID`, u.`name`, u.`email`, u.`phone`, u.`number`, u.`language`, u.`login0`, u.`login1`, u.`loginCnt`, g.`name` AS gname, g.`color` FROM `users` AS u INNER JOIN `groups` AS g ON g.`ID` = u.`groupID` WHERE u.`status` >= 0 ORDER BY CASE WHEN u.`ID` <= 2 THEN u.`ID` ELSE u.`name` END");
	stExec($stH,null);
	$rows = $stH->fetchAll(PDO::FETCH_ASSOC);
	echo "<table class='list'>
<tr>\n<th>&nbsp;{$ax['id']}&nbsp;</th><th>{$ax['usr_name']}</th><th>{$ax['usr_email']}</th><th>{$ax['usr_phone_br']}</th><th>{$ax['usr_number_br']}</th><th>{$ax['usr_language']}</th><th>{$ax['usr_group']}</th><th>{$ax['usr_login_0']}</th><th>{$ax['usr_login_1']}</th><th>{$ax['usr_login_cnt']}</th><td colspan='2'></td></tr>\n";
	foreach ($rows as $user) {
		$firstLoginD = ($user['login0'] != '9999-00-00') ? IDtoDD($user['login0']) : '';
		$lastLoginD = ($user['login1'] != '9999-00-00') ? IDtoDD($user['login1']) : '';
		$style = $user['color'] ? " style='background-color:{$user['color']};'" : '';
		echo "<tr><td>{$user['ID']}</td><td><b>{$user['name']}</b></td><td>{$user['email']}</td><td>{$user['phone']}</td><td>{$user['number']}</td><td>".ucfirst($user['language'])."</td>";
		echo "<td{$style}>{$user['gname']}</td><td>{$firstLoginD}</td><td>{$lastLoginD}</td><td>{$user['loginCnt']}</td>";
		echo ($usr['privs'] == 9 or $user['ID'] != 2) ? "<td><button type='button' onclick=\"index({mode:'edit',uid:{$user['ID']}});\">{$ax['usr_edit']}</button></td>" : '<td></td>';
		echo ($user['ID'] > 2 and $user['ID'] != $usr['ID']) ? "<td><button type='button' onclick=\"delConfirm('usr',{$user['ID']},'{$ax['usr_delete']} {$user['name']}');\">{$ax['usr_delete']}</button></td>" : '<td></td>';
		echo "</tr>\n";
	}
	echo "</table>\n";
	echo "</fieldset>
<button type='button' onclick=\"index({mode:'add'});\">{$ax['usr_add']}</button><pre> </pre>
<button type='button' onclick=\"index({cP:83});\">{$ax['usr_go_to_groups']}</button>\n";
}

function editUser(&$user) {
	global $formCal, $ax, $set, $usr, $mode;

	$uid = $user['id'];
	echo "<form action='index.php' method='post'>
{$formCal}
<fieldset>";
	if ($mode != 'add' and !isset($_POST["uName"])) {
		$stH = stPrep("SELECT * FROM `users` WHERE `ID` = ?");
		stExec($stH,array($uid));
		$row = $stH->fetch(PDO::FETCH_ASSOC);
		$stH = null;
		if ($row) {
			$user['name'] = $row['name'];
			$user['mail'] = $row['email'];
			$user['phone'] = $row['phone'];
//			$user['usrNr'] = $row['number'];
			$user['lang'] = $row['language'] ? $row['language'] : $set['language'];
			$user['pword'] = $row['password'];
			$user['grpID'] = $row['groupID'];
		}
		$pwStar = '*';
		echo "<legend>{$ax['usr_edit_user']}</legend>\n";
	} else {
		$pwStar = '';
		echo "<legend>{$ax['usr_add']}</legend>\n";
	}
	echo "<input type='hidden' name='uid' id='uid' value='{$uid}'>
		<input type='hidden' name='pword' id='pword' value=\"{$user['pword']}\">
		<input type='hidden' name='mode' id='mode' value=\"{$mode}\">\n";
	echo "<table class='list'>\n";
	if ($mode != 'add') { echo "<tr><td>{$ax['id']}:</td><td>&nbsp;{$user['id']}</td></tr>\n"; }
	echo "<tr><td>{$ax['usr_name']}:</td><td><input type='text' id='uName' name='uName' size='30' value='{$user['name']}'></td></tr>\n";
	if ($uid != 1) { //not public access
		echo "<tr><td>{$ax['usr_email']}:</td><td><input type='text' name='email' size='30' value='{$user['mail']}'></td></tr>\n";
		echo "<tr><td>{$ax['usr_phone']}:</td><td><input type='text' name='phone' size='30' maxlength='14' value='{$user['phone']}'></td></tr>\n";
//		echo "<tr><td>{$ax['usr_number']}:</td><td><input type='text' name='usrNr' size='30' value='{$user['usrNr']}'></td></tr>\n";
		echo "<tr><td>{$ax['usr_ui_language']}:</td><td><select name='lang'>\n";
		$files = scandir("lang/");
		foreach ($files as $file) {
			if (substr($file,0,3) == "ui-") {
				$lang = strtolower(substr($file,3,-4));
				echo "<option value=\"{$lang}\"".(strtolower($user['lang']) == $lang ? ' selected' : '').'>'.ucfirst($lang)."</option>\n";
			}
		}
		echo "</select></td></tr>\n";
		echo "<tr><td>{$ax['usr_password']}{$pwStar}:</td><td><input type='password' name='newPw' value='' size='30'></td></tr>\n";
		if ($pwStar) { echo "<tr><td colspan='2'>*<span class='fontS'> {$ax['usr_if_changing_pw']}</span></td></tr>\n"; }
	}
	echo "<tr><td>{$ax['usr_group']}:</td>";
	if ($uid == $usr['ID'] or $uid == 2) {
		$stH = stPrep("SELECT `name`,`color` FROM `groups` WHERE `ID` = ?");
		stExec($stH,array($user['grpID']));
		$row = $stH->fetch(PDO::FETCH_ASSOC);
		$stH = null;
		$color = $row['color'] ? " style='background-color:{$row['color']};'" : '';
		echo "<td><input type='hidden' id='grpID' name='grpID' value='{$user['grpID']}'><span{$color}>{$row['name']}</span></td>\n";
	} else {
		$stH = stPrep("SELECT `ID`,`name`,`color` FROM `groups` WHERE `status` >= 0 ORDER BY `ID`");
		stExec($stH,null);
		echo "<td><select name='grpID'>\n";
		while ($row = $stH->fetch(PDO::FETCH_ASSOC)) {
			if ($usr['privs'] == 9 or $row['ID'] != 2) {
				$color = $row['color'] ? " style='background-color:{$row['color']};'" : '';
				$selected = $row['ID'] == $user['grpID'] ? ' selected' : '';
				echo "<option value='{$row['ID']}'{$color}{$selected}>{$row['name']}</option>\n";
			}
		}
		echo "</select></td></tr>\n";
	}
	echo "</table>\n</fieldset>\n";
	if ($mode == 'add') {
		echo "<button type='submit' name='addExe' value='y'>{$ax['usr_add_profile']}</button>";
	} else {
		echo "<button type='submit' name='updExe' value='y'>{$ax['usr_upd_profile']}</button>";
	}
	echo "<pre>  </pre><button type='submit' name='back' value='y'>{$ax['back']}</button>
</form>\n";
}

function addUser(&$user) { //add user account
	global $ax, $mode, $rxEmail;

	do {
		//validate input
		if (!$user['name'] or !$user['mail'] or !$user['newPw']) { $msg = $ax['usr_cred_required']; break; }
		if (!preg_match("/^[\w\s\._-]{2,}$/u", $user['name'])) { $msg = $ax['usr_un_invalid']; break; }
		if (!preg_match($rxEmail,$user['mail'])) { $msg = $ax['usr_em_invalid']; break; }
		if ($user['phone'] and !preg_match("/^\+?\d{4,19}$/",$user['phone'])) { $msg = $ax['usr_ph_invalid']; break; }
		//add to database
		$stH = stPrep("SELECT `name`,`email` FROM `users` WHERE (`name` = ? OR `email` = ?) AND `status` >= 0");
		stExec($stH,array($user['name'],$user['mail']));
		$row = $stH->fetch(PDO::FETCH_ASSOC);
		$stH = null;
		if ($row) { // name or email already exists
			$msg = $row['name'] == $user['name'] ? $ax['usr_name_exists'] : $ax['usr_email_exists'];
			break;
		}
		$password = md5($user['newPw']);
		$stH = stPrep("INSERT INTO `users` (`name`,`password`,`email`,`phone`,`number`,`groupID`,`language`) VALUES (?,?,?,?,?,?,?)");
		stExec($stH,array($user['name'],$password,$user['mail'],$user['phone'],$user['usrNr'],$user['grpID'],$user['lang']));
		$user['id'] = dbLastRowId(); //set id to new user
		$msg = $ax['usr_added'];
		$mode = '';
	} while (false);
	return $msg;
}

function updateUser(&$user) { //update user account
	global $ax, $mode, $rxEmail;

	do {
		//validate input
		if (!preg_match("/^[\w\s\._-]{2,}$/u", $user['name'])) { $msg = $ax['usr_un_invalid']; break; }
		if ($user['id'] > 1) { //not Public User
			if (!preg_match($rxEmail,$user['mail'])) { $msg = $ax['usr_em_invalid']; break; }
			if ($user['phone'] and !preg_match("/^\+?[\d]{4,19}$/",$user['phone'])) { $msg = $ax['usr_ph_invalid']; break; }
		}
		//for duplicates
		$stH = stPrep("SELECT `name`,`email` FROM `users` WHERE (`name` = ? OR `email` = ?) AND `ID` != ? AND `status` >= 0");
		stExec($stH,array($user['name'],$user['mail'],$user['id']));
		$row = $stH->fetch(PDO::FETCH_ASSOC);
		$stH = null;
		if ($row) { //name or email already exists
			$msg = $row['name'] == $user['name'] ? $ax['usr_name_exists'] : $ax['usr_email_exists'];
			break;
		}
		//update user profile
		if ($user['newPw']) { $user['pword'] = md5($user['newPw']); }
		$stH = stPrep("UPDATE `users` SET `name` = ?,`password` = ?,`email` = ?,`phone` = ?,`number` = ?,`groupID` = ?,`language` = ? WHERE `ID` = ?");
		stExec($stH,array($user['name'],$user['pword'],$user['mail'],$user['phone'],$user['usrNr'],$user['grpID'],$user['lang'], $user['id']));
		$msg = $ax['usr_updated'];
		$mode = '';
	} while (false);
	return $msg;
}

function deleteUser($user) { //delete user account
	global $ax, $usr;
	
	do {
		if ($user['id'] == $usr['ID']) { $msg = $ax['usr_cant_delete_yourself']; break; }
		$stH = stPrep("UPDATE `users` SET `status` = -1 WHERE `ID` = ?");
		stExec($stH,array($user['id']));
		$deleted = $stH->rowCount();
		if (!$deleted) { $msg = "Database Error: {$ax['usr_not_deleted']}"; break; }
		$msg = $ax['usr_deleted'];
	} while (false);
	return $msg;
}

//control logic
if ($usr['privs'] >= 4) { //manager or admin
	$msg = '';
	if (isset($_POST['addExe'])) {
		$msg = addUser($user);
	} elseif (isset($_POST['updExe'])) {
		$msg = updateUser($user);
	} elseif (isset($_POST['delExe'])) {
		$msg = deleteUser($user);
	}
	echo "<p class='error'>{$msg}</p>
		<div class='scrollBox sBoxAd'>
		<div class='centerBox'>\n";
	if (!$mode or isset($_POST['back'])) {
		showUsers(); //no add / no edit
	} else {
		editUser($user); //add or edit
	}
	echo "</div>\n</div>\n";
} else {
	echo "<p class='error'>{$ax['no_way']}</p>\n";
}
?>
