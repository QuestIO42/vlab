<?php
/*
= LuxCal group management page =

This file is part of the LuxCal Web Calendar.
Copyright 2009-2020 LuxSoft - www.LuxSoft.eu
License https://www.gnu.org/licenses/gpl.html GPL version 3

The LuxCal Web Calendar is distributed WITHOUT ANY WARRANTY.
*/

//sanity check
if (empty($lcV) or
		(isset($_REQUEST['gid']) and !preg_match('%^\d{1,4}$%', $_REQUEST['gid'])) or
		(!empty($mode) and !preg_match('%^(add|edit)$%', $mode))
	) { exit('not permitted ('.substr(basename(__FILE__),0,-4).')'); }

//initialize
$adminLang = (file_exists("./lang/ai-{$opt['cL']}.php")) ? $opt['cL'] : "english";
require "./lang/ai-{$adminLang}.php";
if (!isset($mode)) { $mode = ''; }

$group = array();
$group['id'] = isset($_REQUEST["gid"]) ? $_REQUEST["gid"] : 0;
$group['name'] = isset($_POST["name"]) ? trim($_POST["name"]) : '';
$group['privs'] = isset($_POST["privs"]) ? $_POST["privs"] : 0;
$group['vCatIDs'] = isset($_POST["vCats"]) ? $_POST["vCats"] : array('0');
$group['eCatIDs'] = isset($_POST["eCats"]) ? $_POST["eCats"] : array('0');
$group['rEvts'] = isset($_POST["rEvts"]) ? $_POST["rEvts"] : 0;
$group['mEvts'] = isset($_POST["mEvts"]) ? $_POST["mEvts"] : 0;
$group['pEvts'] = isset($_POST["pEvts"]) ? $_POST["pEvts"] : 0;
$group['upload'] = isset($_POST["upload"]) ? $_POST["upload"] : 0;
$group['sndSms'] = isset($_POST["sndSms"]) ? $_POST["sndSms"] : 0;
$group['tnPrivs'] = isset($_POST["tnPrivs"]) ? $_POST["tnPrivs"] : '00';
$group['color'] = (isset($_POST['color']) and $_POST['color'] != '#FFFFFF') ? $_POST['color'] : '';

function showGroups() {
	global $ax, $usr;

	//get category names
	$catArray = array(0 => $ax['grp_all_cats']);
	$stH = dbQuery("SELECT `ID`,`name` FROM `categories` WHERE `status` >= 0");
	while ($row = $stH->fetch(PDO::FETCH_ASSOC)) {
		$catArray[$row['ID']] = $row['name'];
	}
	//display group list
	echo "<fieldset><legend>{$ax['grp_list_of_groups']}</legend>\n";
	$stH = dbQuery("SELECT * FROM `groups` WHERE `status` >= 0 ORDER BY CASE WHEN `ID` <= 2 THEN `ID` ELSE `name` END");
	$rows = $stH->fetchAll(PDO::FETCH_ASSOC);
	echo "<table class='list'>
<tr>\n<th>&nbsp;{$ax['id']}&nbsp;</th><th>{$ax['grp_name']}</th><th>{$ax['grp_priv']}</th><th>{$ax['grp_categories']}<br>{$ax['grp_view']}</th><th>{$ax['grp_categories']}<br>{$ax['grp_add']}</th><th>{$ax['grp_rep_events']}</th><th>{$ax['grp_m-d_events']}</th><th>{$ax['grp_priv_events']}</th><th>{$ax['grp_upload_files']}</th><th>{$ax['grp_send_sms']}</th><th>{$ax['grp_tnail_privs']}</th><td colspan='2'></td></tr>\n";
	foreach ($rows as $group) {
		$style = $group['color'] ? " style='background-color:{$group['color']};'" : '';
		echo "<tr>\n<td>{$group['ID']}</td><td{$style}><b>{$group['name']}</b></td>";
		echo "<td>{$ax['grp_priv'.$group['privs']]}</td>";
		echo "<td>";
		if ($group['privs'] > 0) {
			$catIDs = explode(',',$group['vCatIDs']);
			foreach ($catIDs as $id) {
				if (isset($catArray[$id])) { echo $catArray[$id].'<br>'; }
			}
		}
		echo '</td>';
		echo "<td>";
		if ($group['privs'] > 1) {
			$catIDs = explode(',',$group['eCatIDs']);
			foreach ($catIDs as $id) {
				if (isset($catArray[$id])) { echo $catArray[$id].'<br>'; }
			}
		}
		echo "</td>\n";
		$noYes = array($ax['no'], $ax['yes']);
		echo "<td>{$noYes[$group['rEvents']]}</td>
<td>{$noYes[$group['mEvents']]}</td>
<td>{$noYes[$group['pEvents']]}</td>
<td>{$noYes[$group['upload']]}</td>
<td>{$noYes[$group['sendSms']]}</td>
<td>{$ax["grp_tn_privs".$group['tnPrivs']]}</td>
";
		echo ($usr['privs'] == 9 or $group['privs'] < 9) ? "<td><button type='button' onclick=\"index({mode:'edit',gid:{$group['ID']}});\">{$ax['grp_edit']}</button></td>" : '<td></td>';
		echo ($group['ID'] > 2) ? "<td><button type='button' onclick=\"delConfirm('grp',{$group['ID']},'{$ax['grp_delete']} {$group['name']}');\">{$ax['grp_delete']}</button></td>" : '<td></td>';
		echo "</tr>\n";
	}
	echo "</table>\n";
	echo "</fieldset>
<button type='button' onclick=\"index({mode:'add'});\">{$ax['grp_add_group']}</button><pre>  </pre>
<button type='button' onclick=\"index({cP:82});\">{$ax['grp_go_to_users']}</button>\n";
}

function editGroup(&$group) {
	global $formCal, $ax, $usr, $mode;

	echo "<form action='index.php' method='post'>
{$formCal}
<fieldset>\n";
	if ($mode != 'add') {
		$stH = stPrep("SELECT * FROM `groups` WHERE `ID` = ?");
		stExec($stH,array($group['id']));
		$row = $stH->fetch(PDO::FETCH_ASSOC);
		$stH = null;
		if ($row and !isset($_POST['name'])) {
			$group['name'] = $row['name'];
			$group['privs'] = $row['privs'];
			$group['vCatIDs'] = explode(',',$row['vCatIDs']);
			$group['eCatIDs'] = explode(',',$row['eCatIDs']);
			$group['rEvts'] = $row['rEvents'];
			$group['mEvts'] = $row['mEvents'];
			$group['pEvts'] = $row['pEvents'];
			$group['upload'] = $row['upload'];
			$group['sndSms'] = $row['sendSms'];
			$group['tnPrivs'] = $row['tnPrivs'];
			$group['color'] = $row['color'];
		}
		echo "<legend>{$ax['grp_edit_group']}</legend>\n";
	} else {
		echo "<legend>{$ax['grp_add_group']}</legend>\n";
		$pwNote = ':';
	}
	$style = ($group['color'] ? " style='background-color:{$group['color']};'" : '');
	echo "<input type='hidden' name='gid' id='gid' value='{$group['id']}'>
<input type='hidden' name='mode' id='mode' value=\"{$mode}\">";
	echo "<table class='list'>\n";
	if ($mode != 'add') { echo "<tr><td>{$ax['id']}:</td><td colspan='3'>&nbsp;{$group['id']}</td></tr>\n"; }
	echo "<tr><td>{$ax['grp_name']}:</td><td colspan='3'><input type='text' id='name' name='name' size='30' value='{$group['name']}'{$style}></td></tr>\n";
	echo "<tr><td>{$ax['grp_background']}:</td><td colspan='3'><input type='text' id='color' name='color' title='{$ax['grp_select_color']}' class=\"jscolor {onFineChange:'update(this,\'name\',\'\')',styleElement:null}\" value='{$group['color']}' size='6' maxlength='10'></td></tr>\n";
	echo "<tr><td>{$ax['grp_priv']}:</td>";
	if (isset($row) and $row['ID'] == 2) {
		echo "<td colspan='3'><input type='hidden' name='privs' id='privs' value='{$group['privs']}'>{$ax['grp_priv9']}</td></tr>\n";
	} else {
		echo "<td colspan='3'><select name='privs'>
<option value='0'".($group['privs'] == 0 ? ' selected' : '').">{$ax['grp_priv0']}</option>
<option value='1'".($group['privs'] == 1 ? ' selected' : '').">{$ax['grp_priv1']}</option>
<option value='2'".($group['privs'] == 2 ? ' selected' : '').">{$ax['grp_priv2']}</option>
<option value='3'".($group['privs'] == 3 ? ' selected' : '').">{$ax['grp_priv3']}</option>
<option value='4'".($group['privs'] == 4 ? ' selected' : '').">{$ax['grp_priv4']}</option>\n";
			if ($usr['privs'] == 9) { //admin
				echo "<option value='9'".($group['privs'] == 9 ? ' selected' : '').">{$ax['grp_priv9']}</option>\n";
			}
		echo "</select></td></tr>\n";
	}
	$stH = dbQuery("SELECT `ID`,`name` FROM `categories` WHERE `status` >= 0 ORDER BY `sequence`");
	$cats = $stH->fetchAll(PDO::FETCH_ASSOC);
	echo "<tr class='low'><td>{$ax['grp_categories']}:</td><td>{$ax['grp_view']}</td><td>{$ax['grp_add']}</td><td class='takeRest'></td></tr>\n";
	$checked = in_array('0',$group['vCatIDs']) ? " checked" : '';
	echo "<tr class='low'><td>({$ax['grp_sub_to_rights']})</td><td><input type='checkbox' id='vCats0' name='vCats[]' value='0' onclick=\"check0('vCats');\"{$checked}></td>";
	$checked = in_array('0',$group['eCatIDs']) ? " checked" : '';
	echo "<td><input type='checkbox' id='eCats0' name='eCats[]' value='0' onclick=\"check0('eCats','vCats');\"{$checked}></td>";
	echo "<td>{$ax['grp_all_cats']}</td></tr>\n";
	foreach ($cats as $cat) {
		$checked = in_array(strval($cat['ID']),$group['vCatIDs']) ? " checked" : '';
		echo "<tr><td></td><td><input type='checkbox' name='vCats[]' value='{$cat['ID']}' onclick=\"checkGvN('vCats','eCats');\"{$checked}></td>";
		$checked = in_array(strval($cat['ID']),$group['eCatIDs']) ? " checked" : '';
		echo "<td><input type='checkbox' name='eCats[]' value='{$cat['ID']}' onclick=\"checkGaN('eCats','vCats');\"{$checked}></td>";
		echo "<td>{$cat['name']}</td></tr>\n";
	}
	echo "<tr><td><label for='rEvts'>{$ax['grp_may_post_revents']}</label>:</td><td colspan='3'><input type='checkbox' name='rEvts' id='rEvts' value='1'".($group['rEvts'] ? " checked" : '')."></td></tr>\n";
	echo "<tr><td><label for='mEvts'>{$ax['grp_may_post_mevents']}</label>:</td><td colspan='3'><input type='checkbox' name='mEvts' id='mEvts' value='1'".($group['mEvts'] ? " checked" : '')."></td></tr>\n";
	echo "<tr><td><label for='pEvts'>{$ax['grp_may_post_pevents']}</label>:</td><td colspan='3'><input type='checkbox' name='pEvts' id='pEvts' value='1'".($group['pEvts'] ? " checked" : '')."></td></tr>\n";
	echo "<tr><td><label for='upload'>{$ax['grp_may_upload_files']}</label>:</td><td colspan='3'><input type='checkbox' name='upload' id='upload' value='1'".($group['upload'] ? " checked" : '')."></td></tr>\n";
	echo "<tr><td><label for='sndSms'>{$ax['grp_may_send_sms']}</label>:</td><td colspan='3'><input type='checkbox' name='sndSms' id='sndSms' value='1'".($group['sndSms'] ? " checked" : '')."></td></tr>\n";
	echo "<tr><td>{$ax['grp_tn_privs']}:</td>";
	echo "<td colspan='3'><select name='tnPrivs'>
<option value='00'".($group['tnPrivs'] == '00' ? ' selected' : '').">{$ax['grp_tn_privs00']}</option>
<option value='20'".($group['tnPrivs'] == '20' ? ' selected' : '').">{$ax['grp_tn_privs20']}</option>
<option value='11'".($group['tnPrivs'] == '11' ? ' selected' : '').">{$ax['grp_tn_privs11']}</option>
<option value='21'".($group['tnPrivs'] == '21' ? ' selected' : '').">{$ax['grp_tn_privs21']}</option>
<option value='22'".($group['tnPrivs'] == '22' ? ' selected' : '').">{$ax['grp_tn_privs22']}</option>
</select></td></tr>\n";
	echo "</table>
</fieldset>\n";
	if ($mode == 'add') {
		echo "<button type='submit' name='addExe' value='y'>{$ax['grp_add_group']}</button>";
	} else {
		echo "<button type='submit' name='updExe' value='y'>{$ax['grp_upd_group']}</button>";
	}
	echo "<pre>  </pre><button type='submit' name='back' value='y'>{$ax['back']}</button>
</form>\n";
}

function addGroup(&$group) { //add group
	global $ax, $set, $mode;

	do {
		if ($group['color'] and !preg_match("/^#[0-9A-Fa-f]{6}$/", $group['color'])) { $msg = $ax['grp_invalid_color']; break; }
		if (!$group['name']) { $msg = $ax['grp_cred_required']; break; }
		if (!preg_match("/^[\w\s\._-]{2,}$/u", $group['name'])) { $msg = $ax['grp_name_invalid']; break; }
		$stH = stPrep("SELECT `name` FROM `groups` WHERE `name` = ? AND `status` >= 0");
		stExec($stH,array($group['name']));
		$row = $stH->fetch(PDO::FETCH_ASSOC);
		$stH = null;
		if ($row) { //name already exists
			$msg = $ax['grp_name_exists']; break;
		}
		$stH = stPrep("INSERT INTO `groups` (`name`,`privs`,`vCatIDs`,`eCatIDs`,`rEvents`,`mEvents`,`pEvents`,`upload`,`sendSms`,`tnPrivs`,`color`) VALUES (?,?,?,?,?,?,?,?,?,?,?)");
		stExec($stH,array($group['name'],$group['privs'],implode(',',$group['vCatIDs']),implode(',',$group['eCatIDs']),$group['rEvts'],$group['mEvts'],$group['pEvts'],$group['upload'],$group['sndSms'],$group['tnPrivs'],$group['color']));
		$msg = $ax['grp_added'];
		$mode = '';
	} while (false);
	return $msg;
}

function updateGroup($group) { //update group
	global $ax, $mode;

	do {
		if ($group['color'] and !preg_match("/^#[0-9A-Fa-f]{6}$/", $group['color'])) { $msg = $ax['grp_invalid_color']; break; }
		if (!preg_match("/^[\w\s\._-]{2,}$/u", $group['name'])) { $msg = $ax['grp_name_invalid']; break; }
		$stH = stPrep("UPDATE `groups` SET `name` = ?,`privs` = ?,`vCatIDs` = ?,`eCatIDs` = ?,`rEvents` = ?,`mEvents` = ?,`pEvents` = ?,`upload` = ?,`sendSms` = ?,`tnPrivs` = ?,`color` = ? WHERE `ID` = ?");
		stExec($stH,array($group['name'],$group['privs'],implode(',',$group['vCatIDs']),implode(',',$group['eCatIDs']),$group['rEvts'],$group['mEvts'],$group['pEvts'],$group['upload'],$group['sndSms'],$group['tnPrivs'],$group['color'], $group['id']));
		$msg = $ax['grp_updated'];
		$mode = '';
	} while (false);
	return $msg;
}

function deleteGroup($group) { //delete user group
	global $ax;
	
	do {
		$stH = stPrep("SELECT `name` FROM `users` WHERE `groupID` = ? AND `status` >= 0 limit 1");
		stExec($stH,array($group['id']));
		$row = $stH->fetch(PDO::FETCH_ASSOC);
		$stH = null;
		if ($row) { //group is in use
			$msg = $ax['grp_in_use'].' - '.$ax['grp_not_deleted']; break;
		}
		$stH = stPrep("UPDATE `groups` SET `status` = -1 WHERE `ID` = ?");
		stExec($stH,array($group['id']));
		$deleted = $stH->rowCount();
		if (!$deleted) { $msg = "Database Error: {$ax['grp_not_deleted']}"; break; }
		$msg = $ax['grp_deleted'];
	} while (false);
	return $msg;
}

//Control logic
if ($usr['privs'] >= 4) { //manager or admin
	$msg = '';
	if (isset($_POST['addExe'])) {
		$msg = addGroup($group);
	} elseif (isset($_POST['updExe'])) {
		$msg = updateGroup($group);
	} elseif (isset($_POST['delExe'])) {
		$msg = deleteGroup($group);
	}
	echo "<br><p class='error'>{$msg}</p>
		<div class='scrollBox sBoxAd'>
		<div class='centerBox'>\n";
	if (!$mode or isset($_POST["back"])) {
		showGroups(); //no add / no edit
	} else {
		editGroup($group); //add or edit
	}
	echo "</div>\n</div>\n";
} else {
	echo "<br><p class='error'>{$ax['no_way']}</p>\n";
}
?>
