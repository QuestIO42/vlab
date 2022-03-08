<?php
/*
= Change Calendar Settings page =

This file is part of the LuxCal Web Calendar.
Copyright 2009-2020 LuxSoft - www.LuxSoft.eu
License https://www.gnu.org/licenses/gpl.html GPL version 3

The LuxCal Web Calendar is distributed WITHOUT ANY WARRANTY.
*/

//sanity check
if (empty($lcV)) { exit('not permitted ('.substr(basename(__FILE__),0,-4).')'); } //launch via script only

//initialize
$adminLang = (file_exists("./lang/ai-{$opt['cL']}.php")) ? $opt['cL'] : "english";
require "./lang/ai-{$adminLang}.php";
require './common/toolboxx.php'; //admin tools
$msg = "";

if ($usr['privs'] != 9) { //no admin
	echo "<p class='error'>{$ax['no_way']}</p>\n"; exit;
}

function buttonsValid($buttons,$range) {
	global $pSet;

	if (empty($buttons)) { return true; }
	foreach (explode(',',$buttons) as $buttonNr) {
		if (substr_count($buttons.',',$buttonNr.',') > 1 or strpos($range.',',$buttonNr.',') === false) { return false; }
	}
	return true;
}

function fieldsValid($fields,$range) {
	if (empty($fields)) { return false; }
	foreach (str_split($fields) as $fieldNr) {
		if (substr_count($range,$fieldNr) != 1) { return false; }
	}
	return true;
}

//set lcconfig params
$calMenu = isset($_POST['calMenu']) ? $_POST['calMenu'] : 0; //calendar menu in Opt panel
$cronHost = isset($_POST['cronHost']) ? $_POST['cronHost'] : $crHost; //cron service host
$cronIpAd = isset($_POST['cronIpAd']) ? $_POST['cronIpAd'] : $crIpAd; //cron service Ip address

if (isset($_POST["save"])) { //get posted settings
	foreach ($defSet as $key => $void) {
		if (!isset($_POST['pSet'][$key])) {
			$pSet[$key] = 0; //set unchecked check box to unchecked
		} else {
			$pSet[$key] = is_int($defSet[$key][0]) ? intval($_POST['pSet'][$key]) : trim($_POST['pSet'][$key]); //make int-strings integers
		}
	}
} else { //get current settings
	foreach ($defSet as $key => $value) {
		$pSet[$key] = isset($set[$key]) ? $set[$key] : $value[0];
	}
}
if (isset($_POST["mail"]) and $pSet['calendarEmail']) { //send test mail
	$msgBody = "<p>{$ax['set_mail_sent_from']}.</p>";
	$recipient = sendEml($ax['set_test_mail'],$msgBody,$pSet['calendarEmail'],1,0,0);
	$msg .= $recipient ? $ax['set_mail_sent_to'].' '.$recipient : $ax['set_mail_failed'].": ".$pSet['calendarEmail'];	
}

//preprocessing - comma separate {old versions didn't use comma separators)
$pSet['viewsPublic'] = preg_replace('%(\d)(?!0|1|,|$)%',"$1,",trim($pSet['viewsPublic'],' ,'));
$pSet['viewsLogged'] = preg_replace('%(\d)(?!0|1|,|$)%',"$1,",trim($pSet['viewsLogged'],' ,'));
$pSet['viewButsPub'] = preg_replace('%(\d)(?!0|1|,|$)%',"$1,",trim($pSet['viewButsPub'],' ,'));
$pSet['viewButsLog'] = preg_replace('%(\d)(?!0|1|,|$)%',"$1,",trim($pSet['viewButsLog'],' ,'));
$pSet['chgRecipList'] = trim(preg_replace("%[\s\\\\<>]%",'',$pSet['chgRecipList']),' ,;.');
$pSet['smsCountry'] = ltrim($pSet['smsCountry'],'+0');

$eClass = 'warning';
$errors = array_fill(0,59,''); $e = 0; //init

if (isset($_POST["save"])) { //validate settings
	if (!$pSet['calendarTitle']) { $errors[$e] = ' class="inputError"'; } $e++;
	if (!$pSet['calendarUrl'] or !preg_match($rxCalURL,$pSet['calendarUrl'])) { $errors[$e] = " class='inputError'"; } $e++;
	if (substr($pSet['calendarUrl'],0,4) != 'http') { $pSet['calendarUrl'] = 'http://'.$pSet['calendarUrl']; }
	if (!$pSet['calendarEmail'] or !preg_match($rxEmailX, $pSet['calendarEmail'])) { $errors[$e] = " class='inputError'"; } $e++; //xxx
	if ($pSet['backLinkUrl'] and substr($pSet['backLinkUrl'],0,4) != 'http') { $pSet['backLinkUrl'] = 'http://'.$pSet['backLinkUrl']; }
	if (!$pSet['timeZone'] or !@date_default_timezone_set($pSet['timeZone'])) { $errors[$e] = " class='inputError'"; } $e++;
	if ($pSet['notifChange'] and !preg_match ('%^([^@;]+@[^@;]+?\.\w+;|\d{8,14};|\w{2,};|\[[^\]]{2,}\];)+$%',$pSet['chgRecipList'].';')) { $errors[$e] = " class='inputError'"; } $e++;
	if ($pSet['maxXsWidth'] < 400 or $pSet['maxXsWidth'] > 2000) { $errors[$e] = " class='inputError'"; } $e++;
	if (!preg_match ('%^(([1-9]|10|11),\s*)*([1-9]|10|11)$%',$pSet['viewsPublic'])) { $errors[$e] = " class='inputError'"; } $e++;
	if (!preg_match ('%^(([1-9]|10|11),\s*)*([1-9]|10|11)$%',$pSet['viewsLogged'])) { $errors[$e] = " class='inputError'"; } $e++;
	if (!buttonsValid($pSet['viewButsPub'],$pSet['viewsPublic'])) { $errors[$e] = " class='inputError'"; } $e++;
	if (!buttonsValid($pSet['viewButsLog'],$pSet['viewsLogged'])) { $errors[$e] = " class='inputError'"; } $e++;
	if (strpos($pSet['viewsPublic'].',',strval($pSet['defViewPubL']).',') === false) { $errors[$e] = " class='inputError'"; } $e++;
	if (strpos($pSet['viewsLogged'].',',strval($pSet['defViewLogL']).',') === false) { $errors[$e] = " class='inputError'"; } $e++;
	if (strpos($pSet['viewsPublic'].',',strval($pSet['defViewPubS']).',') === false) { $errors[$e] = " class='inputError'"; } $e++;
	if (strpos($pSet['viewsLogged'].',',strval($pSet['defViewLogS']).',') === false) { $errors[$e] = " class='inputError'"; } $e++;
	if ($pSet['cookieExp'] < 1 or $pSet['cookieExp'] > 365) { $errors[$e] = " class='inputError'"; } $e++;
	if (!fieldsValid($pSet['evtTemplGen'],' 12345678')) { $errors[$e] = " class='inputError'"; } $e++;
	if (!fieldsValid($pSet['evtTemplUpc'],' 12345678')) { $errors[$e] = " class='inputError'"; } $e++;
	if (!fieldsValid($pSet['evtTemplPop'],' 12345678')) { $errors[$e] = " class='inputError'"; } $e++;
	if ($pSet['yearStart'] < 0 or $pSet['yearStart'] > 12) { $errors[$e] = " class='inputError'"; } $e++;
	if ($pSet['YvRowsToShow'] < 1 or $pSet['YvRowsToShow'] > 10) { $errors[$e] = " class='inputError'"; } $e++;
	if ($pSet['YvColsToShow'] < 1 or $pSet['YvColsToShow'] > 6) { $errors[$e] = " class='inputError'"; } $e++;
	if ($pSet['MvWeeksToShow'] < 0 or $pSet['MvWeeksToShow'] > 20) { $errors[$e] = " class='inputError'"; } $e++;
	if ($pSet['XvWeeksToShow'] < 4 or $pSet['XvWeeksToShow'] > 20) { $errors[$e] = " class='inputError'"; } $e++;
	if ($pSet['GvWeeksToShow'] < 4 or $pSet['GvWeeksToShow'] > 20) { $errors[$e] = " class='inputError'"; } $e++;
	if (!preg_match("/^[0-6]{1,7}$/", $pSet['workWeekDays'])) { $errors[$e] = " class='inputError'"; } $e++;
	if ($pSet['weekStart'] < 0 or $pSet['weekStart'] > 6) { $errors[$e] = " class='inputError'"; } $e++;
	if ($pSet['lookbackDays'] < 1 or $pSet['lookbackDays'] > 365) { $errors[$e] = " class='inputError'"; } $e++;
	if ($pSet['lookaheadDays'] < 1 or $pSet['lookaheadDays'] > 365) { $errors[$e] = " class='inputError'"; } $e++;
	if ($pSet['dwStartHour'] < 0 or $pSet['dwStartHour'] > 18 or $pSet['dwStartHour'] > ($pSet['dwEndHour'] - 4)) { $errors[$e] = " class='inputError'"; } $e++;
	if ($pSet['dwEndHour'] > 24 or $pSet['dwEndHour'] < 6 or $pSet['dwStartHour'] > ($pSet['dwEndHour'] - 4)) { $errors[$e] = " class='inputError'"; } $e++;
	if ($pSet['dwTsHeight'] < 10 or $pSet['dwTsHeight'] > 60) { $errors[$e] = " class='inputError'"; } $e++;
	if ($pSet['mapViewer'] and substr($pSet['mapViewer'],0,4) != 'http') { $pSet['mapViewer'] = 'http://'.$pSet['mapViewer']; }
//the following regexs use lookahead assertion
	if (!preg_match ('%^([ymd])([^\da-zA-Z])(?!\1)([ymd])\2(?!(\1|\3))[ymd]$%',$pSet['dateFormat'])) { $errors[$e] = " class='inputError'"; } $e++;
	if (!preg_match ('%^([Md])[^\da-zA-Z]+(?!\1)[Md]$%',$pSet['MdFormat'])) { $errors[$e] = " class='inputError'"; } $e++;
	if (!preg_match ('%^([Myd])[^\da-zA-Z]+(?!\1)([Myd])[^\da-zA-Z]+(?!(\1|\2))[Myd]$%',$pSet['MdyFormat'])) { $errors[$e] = " class='inputError'"; } $e++;
	if (!preg_match ('%^([My])[^\da-zA-Z]+(?!\1)[My]$%',$pSet['MyFormat'])) { $errors[$e] = " class='inputError'"; } $e++;
	if (!preg_match ('%^(WD|[Md])[^\da-zA-Z]+(?!\1)(WD|[Md])[^\da-zA-Z]+(?!(\1|\2))(WD|[Md])$%',$pSet['DMdFormat'])) { $errors[$e] = " class='inputError'"; } $e++;
	if (!preg_match ('%^(WD|[Mdy])[^\da-zA-Z]+(?!\1)(WD|[Mdy])[^\da-zA-Z]+(?!(\1|\2))(WD|[Mdy])[^\da-zA-Z]+(?!(\1|\2\3))(WD|[Mdy])$%',$pSet['DMdyFormat'])) { $errors[$e] = " class='inputError'"; } $e++;
	if (!preg_match ('%^([Hhm])[^\da-zA-Z](?!\1)[Hhm](\s?[aA])?$%',$pSet['timeFormat'])) { $errors[$e] = " class='inputError'"; } $e++;
	if ($pSet['maxUplSize'] < 1 or $pSet['maxUplSize'] > 200) { $errors[$e] = " class='inputError'"; } $e++;
	if ($pSet['tnlMaxW'] < 10 or $pSet['tnlMaxW'] > 800) { $errors[$e] = " class='inputError'"; } $e++;
	if ($pSet['tnlMaxH'] < 10 or $pSet['tnlMaxH'] > 800) { $errors[$e] = " class='inputError'"; } $e++;
	if ($pSet['tnlDelDays'] < 0 or $pSet['tnlDelDays'] > 99) { $errors[$e] = " class='inputError'"; } $e++;
	if ($pSet['maxEmlCc'] < 5 or $pSet['maxEmlCc'] > 99) { $errors[$e] = " class='inputError'"; } $e++;
	if (!$pSet['smtpServer'] and $pSet['mailServer'] == 2) { $errors[$e] = " class='inputError'"; } $e++;
	if ($pSet['smtpPort'] < 0 or $pSet['smtpPort'] > 10025) { $errors[$e] = " class='inputError'"; } $e++; //10025 max port nr for SMTP
	if (!$pSet['smtpUser'] and $pSet['smtpAuth'] and $pSet['mailServer'] == 2) { $errors[$e] = " class='inputError'"; } $e++;
	if (!$pSet['smtpPass'] and $pSet['smtpAuth'] and $pSet['mailServer'] == 2) { $errors[$e] = " class='inputError'"; } $e++;
	if ($pSet['smsService'] and $pSet['smsSubject'] and !$pSet['calendarPhone'] and !$pSet['notSenderSms']) { $errors[$e] = " class='inputError'"; } $e++; //xxx
	if ($pSet['smsService'] and !preg_match ('%^[^#@]*#[^#@]*?@([^@\.]+?\.)+[\w]+$%',$pSet['smsCarrier'])) { $errors[$e] = " class='inputError'"; } $e++;
	if ($pSet['smsService'] and $pSet['smsCountry'] and !is_numeric($pSet['smsCountry'])) { $errors[$e] = " class='inputError'"; } $e++;
	if ($pSet['maxLenSms'] < 70 or $pSet['maxLenSms'] > 500) { $errors[$e] = " class='inputError'"; } $e++;
	if ($cronHost == 2 and !preg_match('%(?:(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.){4}%',$cronIpAd.'.')) { $errors[$e] = " class='inputError'"; } $e++;
	if ($pSet['chgNofDays'] < 0 or $pSet['chgNofDays'] > 30) { $errors[$e] = " class='inputError'"; } $e++;
	if ($pSet['chgNofDays'] and !preg_match ('%^([^@;]+@[^@;]+?\.\w+;|\d{8,14};|\w{2,};|\[[^\]]{2,}\];)+$%',$pSet['chgSumRecips'].';')) { $errors[$e] = " class='inputError'"; } $e++;
	if ($pSet['eventExp'] < 0 or $pSet['eventExp'] > 999) { $errors[$e] = " class='inputError'"; } $e++;
	if ($pSet['maxNoLogin'] < 0 or $pSet['maxNoLogin'] > 365) { $errors[$e] = " class='inputError'"; } $e++;
	if (!empty($pSet['popFieldsSbar']) and !fieldsValid($pSet['popFieldsSbar'],' 1234567')) { $errors[$e] = " class='inputError'"; } $e++;
	if ($pSet['sideBarDays'] < 1 or $pSet['sideBarDays'] > 365) { $errors[$e] = " class='inputError'"; } $e++;

	//no errors, save settings in database
	if (!in_array(" class='inputError'",$errors)) {
		if ($dbSel != $calMenu or $crHost != $cronHost or $crIpAd != $cronIpAd) {
			$dbSel = $calMenu;
			$crHost = $cronHost;
			$crIpAd = $cronIpAd;
			saveConfig(); //save config data
		}
		saveSettings($pSet);
		$msg = $ax['set_settings_saved'];
	} else { //errors found
		$msg .= $ax['set_missing_invalid'];
		$eClass = 'error';
	}
}

echo "<br><p class=\"{$eClass} noPrint\">".(($msg) ? $msg : $ax['hover_for_details'])."</p>\n<br>\n";
//display form fields
echo "<form action='index.php' method='post'>
	{$formCal}
	<button type='submit' class='center' name='save' value='y'>{$ax['set_save_settings']}</button>
	<div class='scrollBox sBoxAd' id='sBox'>
	<div class='centerBox'>";
$e = 0; //init errors index

//== General ==
echo "<fieldset><legend>{$ax['set_general_settings']}</legend>
	<div class='setting'><span class='sLabel' onmouseover=\"popM(this,'".htmlspecialchars($ax['versions_text'])."')\">{$ax['versions_label']}:</span>
	LuxCal {$ax['calendar']}: ".LCV." (".($dbType == 'SQLite' ? $dbDir : '')."{$calID})</div>
	<div class='setting'><span class='sLabel'></span> PHP: ".phpversion()." - <a href='index.php?pP' target='_blank'>Show info</a></div>
	<div class='setting'><span class='sLabel'></span> ".ucfirst($ax['database']).": {$dbType} V".$dbH->getAttribute(PDO::ATTR_SERVER_VERSION)."</div>
	
	<div class='setting'><span class='sLabel' onmouseover=\"popM(this,'".htmlspecialchars($ax['calTitle_text'])."')\">{$ax['calTitle_label']}:</span>
	<input type='text'{$errors[$e++]} name='pSet[calendarTitle]' size='45' value=\"{$pSet['calendarTitle']}\"></div>
	
	<div class='setting'><span class='sLabel' onmouseover=\"popM(this,'".htmlspecialchars($ax['calUrl_text'])."')\">{$ax['calUrl_label']}:</span>
	<input type='text'{$errors[$e++]} name='pSet[calendarUrl]' size='45' value=\"{$pSet['calendarUrl']}\"></div>

	<div class='setting'><span class='sLabel' onmouseover=\"popM(this,'".htmlspecialchars($ax['calEmail_text'])."')\">{$ax['calEmail_label']}:</span>
	<input type='text'{$errors[$e++]} name='pSet[calendarEmail]' size='24' value=\"{$pSet['calendarEmail']}\"> <button type='submit' name='mail' value='y'>{$ax['set_test_mail']}</button></div>

	<div class='setting'><span class='sLabel' onmouseover=\"popM(this,'".htmlspecialchars($ax['logoPath_text'])."')\">{$ax['logoPath_label']}:</span>
	<input type='text' name='pSet[logoPath]' size='45' value=\"{$pSet['logoPath']}\"></div>

	<div class='setting'><span class='sLabel' onmouseover=\"popM(this,'".htmlspecialchars($ax['backLinkUrl_text'])."')\">{$ax['backLinkUrl_label']}:</span>
	<input type='text' name='pSet[backLinkUrl]' size='45' value=\"{$pSet['backLinkUrl']}\"></div>

	<div class='setting'><span class=\"sLabel\" onmouseover=\"popM(this,'".htmlspecialchars($ax['timeZone_text'])."')\">{$ax['timeZone_label']}:</span>
	<input type='text'{$errors[$e++]} name='pSet[timeZone]' size='24' value=\"{$pSet['timeZone']}\"> {$ax['see']}: <strong>[<a href='http://us3.php.net/manual/en/timezones.php' target='_blank'>{$ax['time_zones']}</a>]</strong></div>

	<div class='setting'><span class='sLabel' onmouseover=\"popM(this,'".htmlspecialchars($ax['notifChange_text'].'<br>'.$ax['reciplist'])."')\">{$ax['notifChange_label']}:</span>
	<input type='checkbox' name='pSet[notifChange]' value='1'".($pSet['notifChange'] == 1 ? " checked" : '')."><pre> </pre>
	{$ax['chgRecipList']}: <input type='text'{$errors[$e++]} name='pSet[chgRecipList]' size='60' maxlength='255' value=\"{$pSet['chgRecipList']}\"></div>

	<div class='setting'><span class='sLabel' onmouseover=\"popM(this,'".htmlspecialchars($ax['maxXsWidth_text'])."')\">{$ax['maxXsWidth_label']}:</span>
	<input type='text'{$errors[$e++]} name='pSet[maxXsWidth]' maxlength='4' size='3' value='{$pSet['maxXsWidth']}'> pixels (400 - 2000)</div>

	<div class='setting'><span class='sLabel' onmouseover=\"popM(this,'".htmlspecialchars($ax['rssFeed_text'])."')\">{$ax['rssFeed_label']}:</span>
	<input type='checkbox' name='pSet[rssFeed]' value='1'".($pSet['rssFeed'] == 1 ? " checked" : '')."></div>

	<div class='setting'><span class='sLabel' onmouseover=\"popM(this,'".htmlspecialchars($ax['logging_text'])."')\">{$ax['logging_label']}:</span>
	<input type='checkbox' id='logw' name='pSet[logWarnings]' value='1'".($pSet['logWarnings'] ? " checked" : '')."><label for='logw'>{$ax['warnings']}</label><pre> </pre>
	<input type='checkbox' id='logn' name='pSet[logNotices]' value='1'".($pSet['logNotices'] ? " checked" : '')."><label for='logn'>{$ax['notices']}</label><pre> </pre>
	<input type='checkbox' id='logv' name='pSet[logVisitors]' value='1'".($pSet['logVisitors'] ? " checked" : '')."><label for='logv'>{$ax['visitors']}</label></div>

	<div class='setting'><span class='sLabel' onmouseover=\"popM(this,'".htmlspecialchars($ax['maintMode_text'])."')\">{$ax['maintMode_label']}:</span>
	<input type='checkbox' name='pSet[maintMode]' value='1'".($pSet['maintMode'] == 1 ? " checked" : '')."></div>
	</fieldset>\n";

//== Navigation Bar ==
echo "<fieldset><legend>{$ax['set_navbar_settings']}</legend>
	<div class='setting'><span class='sLabel' onmouseover=\"popM(this,'".htmlspecialchars($ax['contact_text'])."')\">{$ax['contact_label']}:</span>
	<input type='checkbox' id='cont' name='pSet[contButton]' value='1'".($pSet['contButton'] == 1 ? " checked" : '')."></div>

	<div class='setting'><span class='sLabel' onmouseover=\"popM(this,'".htmlspecialchars($ax['optionsPanel_text'])."')\">{$ax['optionsPanel_label']}:</span>
	<input type='checkbox' id='calm' name='calMenu' value='1'".($dbSel == 1 ? " checked" : '')."><label for='calm'>{$ax['calMenu_label']}</label><pre> </pre>
	<input type='checkbox' id='viewm' name='pSet[viewMenu]' value='1'".($pSet['viewMenu'] == 1 ? " checked" : '')."><label for='viewm'>{$ax['viewMenu_label']}</label><pre> </pre>
	<input type='checkbox' id='groupm' name='pSet[groupMenu]' value='1'".($pSet['groupMenu'] == 1 ? " checked" : '')."><label for='groupm'>{$ax['groupMenu_label']}</label><pre> </pre>
	<input type='checkbox' id='userm' name='pSet[userMenu]' value='1'".($pSet['userMenu'] == 1 ? " checked" : '')."><label for='userm'>{$ax['userMenu_label']}</label><pre> </pre>
	<input type='checkbox' id='catm' name='pSet[catMenu]' value='1'".($pSet['catMenu'] == 1 ? " checked" : '')."><label for='catm'>{$ax['catMenu_label']}</label><pre> </pre>
	<input type='checkbox' id='langm' name='pSet[langMenu]' value='1'".($pSet['langMenu'] == 1 ? " checked" : '')."><label for='langm'>{$ax['langMenu_label']}</label></div>
	
	<div class='setting'><span class='sLabel' onmouseover=\"popM(this,'".htmlspecialchars($ax['availViews_text'])."')\">{$ax['availViews_label']}:</span>
	{$ax['public']}: <input type='text'{$errors[$e++]} name='pSet[viewsPublic]' maxlength='23' size='22' value=\"{$pSet['viewsPublic']}\"><pre> </pre>{$ax['logged_in']}: <input type='text'{$errors[$e++]} name='pSet[viewsLogged]' maxlength='23' size='22' value=\"{$pSet['viewsLogged']}\"></div>
	
	<div class='setting'><span class='sLabel' onmouseover=\"popM(this,'".htmlspecialchars($ax['viewButtons_text'])."')\">{$ax['viewButtons_label']}:</span>
	{$ax['public']}: <input type='text'{$errors[$e++]} name='pSet[viewButsPub]' maxlength='23' size='22' value=\"{$pSet['viewButsPub']}\"><pre> </pre>{$ax['logged_in']}: <input type='text'{$errors[$e++]} name='pSet[viewButsLog]' maxlength='23' size='22' value=\"{$pSet['viewButsLog']}\"></div>

	<div class='setting'><span class='sLabel' onmouseover=\"popM(this,'".htmlspecialchars($ax['defaultViewL_text'])."')\">{$ax['defaultViewL_label']}:</span>
	{$ax['public']}: <select name='pSet[defViewPubL]'{$errors[$e++]}>";
foreach (explode(',',$pSet['viewsPublic']) as $v) {
		echo "<option value='{$v}'".($pSet['defViewPubL'] == "{$v}" ? ' selected' : '').">".$xx["hdr_view_{$v}"]."</option>\n";
}
echo "</select><pre> </pre>{$ax['logged_in']}: <select name='pSet[defViewLogL]'{$errors[$e++]}>";
foreach (explode(',',$pSet['viewsLogged']) as $v) {
		echo "<option value='{$v}'".($pSet['defViewLogL'] == "{$v}" ? ' selected' : '').">".$xx["hdr_view_{$v}"]."</option>\n";
}
echo "</select>
	</div>

	<div class='setting'><span class='sLabel' onmouseover=\"popM(this,'".htmlspecialchars($ax['defaultViewS_text'])."')\">{$ax['defaultViewS_label']}:</span>
	{$ax['public']}: <select name='pSet[defViewPubS]'{$errors[$e++]}>";
foreach (explode(',',$pSet['viewsPublic']) as $v) {
		echo "<option value='{$v}'".($pSet['defViewPubS'] == "{$v}" ? ' selected' : '').">".$xx["hdr_view_{$v}"]."</option>\n";
}
echo "</select><pre> </pre>{$ax['logged_in']}: <select name='pSet[defViewLogS]'{$errors[$e++]}>";
foreach (explode(',',$pSet['viewsLogged']) as $v) {
		echo "<option value='{$v}'".($pSet['defViewLogS'] == "{$v}" ? ' selected' : '').">".$xx["hdr_view_{$v}"]."</option>\n";
}
echo "</select>
	</div>

	<div class='setting'><span class='sLabel' onmouseover=\"popM(this,'".htmlspecialchars($ax['language_text'])."')\">{$ax['language_label']}:</span>
	<select name='pSet[language]'>\n";
$files = scandir("lang/");
foreach ($files as $file) {
	if (substr($file, 0, 3) == "ui-") {
		$lang = strtolower(substr($file,3,-4));
		echo "\t<option value=\"{$lang}\"".(strtolower($pSet['language']) == $lang ? ' selected' : '').">".ucfirst($lang)."</option>\n";
	}
}
echo "</select></div>
</fieldset>\n";

//== User Accounts ==
echo "<fieldset><legend>{$ax['set_user_settings']}</legend>
	<div class='setting'><span class='sLabel' onmouseover=\"popM(this,'".htmlspecialchars($ax['selfReg_text'])."')\">{$ax['selfReg_label']}:</span>
	<input type='checkbox' name='pSet[selfReg]' value='1'".($pSet['selfReg'] == 1 ? " checked" : '')."><pre> </pre><select name='pSet[selfRegGrp]'>\n";
	$stH = dbQuery("SELECT `ID`,`name`,`color` FROM `groups` WHERE `status` >= 0 ORDER BY `name`");
	while ($row = $stH->fetch(PDO::FETCH_ASSOC)) {
		if ($row['ID'] != 2) {
			$color = $row['color'] ? " style='background-color:{$row['color']};'" : '';
			$selAttr = $row['ID'] == $pSet['selfRegGrp'] ? ' selected' : '';
			echo "<option value='{$row['ID']}'{$color}{$selAttr}>{$row['name']}</option>\n";
		}
	}
	echo "</select><pre> </pre>{$ax['user_group']}</div>

	<div class='setting'><span class='sLabel' onmouseover=\"popM(this,'".htmlspecialchars($ax['selfRegQA_text'])."')\">{$ax['selfRegQA_label']}:</span>
	<input type='text' name='pSet[selfRegQ]' maxlength='50' size='45' value=\"{$pSet['selfRegQ']}\">?<pre> </pre>
	{$ax['answer']}: <input type='text' name='pSet[selfRegA]' maxlength='15' size='12' value=\"{$pSet['selfRegA']}\"></div>

	<div class='setting'><span class='sLabel' onmouseover=\"popM(this,'".htmlspecialchars($ax['selfRegNot_text'])."')\">{$ax['selfRegNot_label']}:</span>
	<input type='checkbox' name='pSet[selfRegNot]' value='1'".($pSet['selfRegNot'] == 1 ? " checked" : '')."></div>

	<div class='setting'><span class='sLabel' onmouseover=\"popM(this,'".htmlspecialchars($ax['restLastSel_text'])."')\">{$ax['restLastSel_label']}:</span>
	<input type='checkbox' name='pSet[restLastSel]' value='1'".($pSet['restLastSel'] == 1 ? " checked" : '')."></div>

	<div class='setting'><span class='sLabel' onmouseover=\"popM(this,'".htmlspecialchars($ax['cookieExp_text'])."')\">{$ax['cookieExp_label']}:</span>
	<input type='text'{$errors[$e++]} name='pSet[cookieExp]' maxlength='3' size='2' value='{$pSet['cookieExp']}'> (1 - 365)</div>
</fieldset>\n";

//== Events ==
echo "<fieldset><legend>{$ax['set_event_settings']}</legend>
	<div class='setting'><span class='sLabel' onmouseover=\"popM(this,'".htmlspecialchars($ax['privEvents_text'])."')\">{$ax['privEvents_label']}:</span>
	<select name='pSet[privEvents]'>
	<option value='0'".($pSet['privEvents'] == "0" ? ' selected' : '').">{$ax['disabled']}</option>
	<option value='1'".($pSet['privEvents'] == "1" ? ' selected' : '').">{$ax['enabled']}</option>
	<option value='2'".($pSet['privEvents'] == "2" ? ' selected' : '').">{$ax['default']}</option>
	<option value='3'".($pSet['privEvents'] == "3" ? ' selected' : '').">{$ax['always']}</option>
	</select></div>

	<div class='setting'><span class='sLabel' onmouseover=\"popM(this,'".htmlspecialchars($ax['aldDefault_text'])."')\">{$ax['aldDefault_label']}:</span>
	<input type='checkbox' name='pSet[aldDefault]' value='1'".($pSet['aldDefault'] == 1 ? " checked" : '')."></div>

	<div class='setting'><span class='sLabel' onmouseover=\"popM(this,'".htmlspecialchars($ax['details4All_text'])."')\">{$ax['details4All_label']}:</span>
	<input type='radio' id='d4a0' name='pSet[details4All]' value='0'".($pSet['details4All'] == 0 ? " checked" : '')."><label for='d4a0'>{$ax['disabled']}</label><pre> </pre>
	<input type='radio' id='d4a1' name='pSet[details4All]' value='1'".($pSet['details4All'] == 1 ? " checked" : '')."><label for='d4a1'>{$ax['enabled']}</label><pre> </pre>
	<input type='radio' id='d4a2' name='pSet[details4All]' value='2'".($pSet['details4All'] == 2 ? " checked" : '')."><label for='d4a2'>{$ax['logged_in_l']}</label></div>

	<div class='setting'><span class='sLabel' onmouseover=\"popM(this,'".htmlspecialchars($ax['evtDelButton_text'])."')\">{$ax['evtDelButton_label']}:</span>
	<input type='radio' id='delb0' name='pSet[evtDelButton]' value='0'".($pSet['evtDelButton'] == 0 ? " checked" : '')."><label for='delb0'>{$ax['disabled']}</label><pre> </pre>
	<input type='radio' id='delb1' name='pSet[evtDelButton]' value='1'".($pSet['evtDelButton'] == 1 ? " checked" : '')."><label for='delb1'>{$ax['enabled']}</label><pre> </pre>
	<input type='radio' id='delb2' name='pSet[evtDelButton]' value='2'".($pSet['evtDelButton'] == 2 ? " checked" : '')."><label for='delb2'>{$ax['manager_only']}</label></div>

	<div class='setting'><span class='sLabel' onmouseover=\"popM(this,'".htmlspecialchars($ax['defVenue_text'])."')\">{$ax['defVenue_label']}:</span>
	<input type='text' name='pSet[defVenue]' size='45' value=\"{$pSet['defVenue']}\"></div>
	
	<div class='setting'><span class='sLabel' onmouseover=\"popM(this,'".htmlspecialchars($ax['xFieldx_text'])."')\">{$ax['xField1_label']}:</span>
	{$ax['xField_label']}: <input type='text' name='pSet[xField1Label]' maxlength='15' size='12' value=\"{$pSet['xField1Label']}\"><pre> </pre>
	{$ax['min_rights']}: <select name='pSet[xField1Rights]'>
	<option value='1'".($pSet['xField1Rights'] == 1 ? ' selected' : '').">{$ax['grp_priv1']}</option>
	<option value='2'".($pSet['xField1Rights'] == 2 ? ' selected' : '').">{$ax['grp_priv2']}</option>
	<option value='3'".($pSet['xField1Rights'] == 3 ? ' selected' : '').">{$ax['grp_priv3']}</option>
	<option value='4'".($pSet['xField1Rights'] == 4 ? ' selected' : '').">{$ax['grp_priv4']}</option>
	<option value='9'".($pSet['xField1Rights'] == 9 ? ' selected' : '').">{$ax['grp_priv9']}</option>
	</select></div>
	
	<div class='setting'><span class='sLabel' onmouseover=\"popM(this,'".htmlspecialchars($ax['xFieldx_text'])."')\">{$ax['xField2_label']}:</span>
	{$ax['xField_label']}: <input type='text' name='pSet[xField2Label]' maxlength='15' size='12' value=\"{$pSet['xField2Label']}\"><pre> </pre>
	{$ax['min_rights']}: <select name='pSet[xField2Rights]'>
	<option value='1'".($pSet['xField2Rights'] == 1 ? ' selected' : '').">{$ax['grp_priv1']}</option>
	<option value='2'".($pSet['xField2Rights'] == 2 ? ' selected' : '').">{$ax['grp_priv2']}</option>
	<option value='3'".($pSet['xField2Rights'] == 3 ? ' selected' : '').">{$ax['grp_priv3']}</option>
	<option value='4'".($pSet['xField2Rights'] == 4 ? ' selected' : '').">{$ax['grp_priv4']}</option>
	<option value='9'".($pSet['xField2Rights'] == 9 ? ' selected' : '').">{$ax['grp_priv9']}</option>
	</select></div>
</fieldset>\n";

//== Views ==
echo "<fieldset><legend>{$ax['set_view_settings']}</legend>
	<div class='setting'><span class='sLabel' onmouseover=\"popM(this,'".htmlspecialchars($ax['evtTemplate_text'].'<br>'.$ax['templFields_text'])."')\">{$ax['evtTemplate_label']}:</span>
	{$ax['evtTemplGen']}: <input type='text'{$errors[$e++]} name='pSet[evtTemplGen]' maxlength='8' size='8' value=\"{$pSet['evtTemplGen']}\"><pre> </pre>
	{$ax['evtTemplUpc']}: <input type='text'{$errors[$e++]} name='pSet[evtTemplUpc]' maxlength='8' size='8' value=\"{$pSet['evtTemplUpc']}\"><pre> </pre>
	{$ax['evtTemplPop']}: <input type='text'{$errors[$e++]} name='pSet[evtTemplPop]' maxlength='8' size='8' value=\"{$pSet['evtTemplPop']}\"></div>

	<div class='setting'><span class='sLabel' onmouseover=\"popM(this,'".htmlspecialchars($ax['sortEvents_text'])."')\">{$ax['sortEvents_label']}:</span>
	<input type='radio' id='esrt0' name='pSet[evtSorting]' value='0'".($pSet['evtSorting'] == 0 ? " checked" : '')."><label for='esrt0'>{$ax['times']}</label><pre> </pre>
	<input type='radio' id='esrt1' name='pSet[evtSorting]' value='1'".($pSet['evtSorting'] == 1 ? " checked" : '')."><label for='esrt1'>{$ax['cat_seq_nr']}</label></div>

	<div class='setting'><span class='sLabel' onmouseover=\"popM(this,'".htmlspecialchars($ax['yearStart_text'])."')\">{$ax['yearStart_label']}:</span>
	<input type='text'{$errors[$e++]} name='pSet[yearStart]' maxlength='2' size='2' value='{$pSet['yearStart']}'> (1 - 12 {$ax['or']} 0)</div>

	<div class='setting'><span class='sLabel' onmouseover=\"popM(this,'".htmlspecialchars($ax['YvRowsColumns_text'])."')\">{$ax['YvRowsColumns_label']}:</span>
	<input type='text'{$errors[$e++]} name='pSet[YvRowsToShow]' maxlength='2' size='2' value='{$pSet['YvRowsToShow']}'> {$ax['rows']} (1 - 10)<pre> </pre><input type='text'{$errors[$e++]} name='pSet[YvColsToShow]' maxlength='1' size='2' value='{$pSet['YvColsToShow']}'> {$ax['columns']} (1 - 6)</div>

	<div class='setting'><span class='sLabel' onmouseover=\"popM(this,'".htmlspecialchars($ax['MvWeeksToShow_text'])."')\">{$ax['MvWeeksToShow_label']}:</span>
	<input type='text'{$errors[$e++]} name='pSet[MvWeeksToShow]' maxlength='2' size='2' value='{$pSet['MvWeeksToShow']}'> (2 - 20 {$ax['or']} 0 {$ax['or']} 1)</div>

	<div class='setting'><span class='sLabel' onmouseover=\"popM(this,'".htmlspecialchars($ax['XvWeeksToShow_text'])."')\">{$ax['XvWeeksToShow_label']}:</span>
	<input type='text'{$errors[$e++]} name='pSet[XvWeeksToShow]' maxlength='2' size='2' value='{$pSet['XvWeeksToShow']}'> (4 - 20)</div>

	<div class='setting'><span class='sLabel' onmouseover=\"popM(this,'".htmlspecialchars($ax['GvWeeksToShow_text'])."')\">{$ax['GvWeeksToShow_label']}:</span>
	<input type='text'{$errors[$e++]} name='pSet[GvWeeksToShow]' maxlength='2' size='2' value='{$pSet['GvWeeksToShow']}'> (4 - 20)</div>

	<div class='setting'><span class='sLabel' onmouseover=\"popM(this,'".htmlspecialchars($ax['workWeekDays_text'])."')\">{$ax['workWeekDays_label']}:</span>
	<input type='text'{$errors[$e++]} name='pSet[workWeekDays]' maxlength='7' size='6' value='{$pSet['workWeekDays']}'> (0: {$wkDays_l[0]}, 1: {$wkDays_l[1]} .... 6: {$wkDays_l[6]})</div>

	<div class='setting'><span class='sLabel' onmouseover=\"popM(this,'".htmlspecialchars($ax['weekStart_text'])."')\">{$ax['weekStart_label']}:</span>
	<input type='text'{$errors[$e++]} name='pSet[weekStart]' maxlength='1' size='1' value='{$pSet['weekStart']}'> (0: {$wkDays_l[0]}, 1: {$wkDays_l[1]} .... 6: {$wkDays_l[6]})</div>

	<div class='setting'><span class='sLabel' onmouseover=\"popM(this,'".htmlspecialchars($ax['lookBackAhead_text'])."')\">{$ax['lookBackAhead_label']}:</span>
	{$ax['back']}: <input type='text'{$errors[$e++]} name='pSet[lookbackDays]' maxlength='3' size='2' value='{$pSet['lookbackDays']}'><pre> </pre>
	{$ax['ahead']}: <input type='text'{$errors[$e++]} name='pSet[lookaheadDays]' maxlength='3' size='2' value='{$pSet['lookaheadDays']}'> (1 - 365)</div>

	<div class='setting'><span class='sLabel' onmouseover=\"popM(this,'".htmlspecialchars($ax['dwStartEndHour_text'])."')\">{$ax['dwStartEndHour_label']}:</span>
	<input type='text'{$errors[$e++]} name='pSet[dwStartHour]' maxlength='2' size='2' value='{$pSet['dwStartHour']}'> (0 - 18)<pre> </pre>
	<input type='text'{$errors[$e++]} name='pSet[dwEndHour]' maxlength='2' size='2' value='{$pSet['dwEndHour']}'> (6 - 24)</div>

	<div class='setting'><span class='sLabel' onmouseover=\"popM(this,'".htmlspecialchars($ax['dwTimeSlot_text'])."')\">{$ax['dwTimeSlot_label']}:</span>
	<select name='pSet[dwTimeSlot]'>
	<option value='10'".($pSet['dwTimeSlot'] == "10" ? ' selected' : '').">10</option>
	<option value='15'".($pSet['dwTimeSlot'] == "15" ? ' selected' : '').">15</option>
	<option value='20'".($pSet['dwTimeSlot'] == "20" ? ' selected' : '').">20</option>
	<option value='30'".($pSet['dwTimeSlot'] == "30" ? ' selected' : '').">30</option>
	<option value='60'".($pSet['dwTimeSlot'] == "60" ? ' selected' : '').">60</option>
	</select> {$ax['minutes']}</div>

	<div class='setting'><span class='sLabel' onmouseover=\"popM(this,'".htmlspecialchars($ax['dwTsHeight_text'])."')\">{$ax['dwTsHeight_label']}:</span>
	<input type='text'{$errors[$e++]} name='pSet[dwTsHeight]' maxlength='2' size='2' value='{$pSet['dwTsHeight']}'> {$ax['pixels']} (10 - 60)</div>

	<div class='setting'><span class='sLabel' onmouseover=\"popM(this,'".htmlspecialchars($ax['evtHeadX_text'])."')\">{$ax['evtHeadX_label']}:</span>
	{$ax['monthView']}: <input type='text' name='pSet[evtHeadM]' maxlength='60' size='25' value=\"{$pSet['evtHeadM']}\"><pre> </pre>
	{$ax['wkdayView']}: <input type='text' name='pSet[evtHeadW]' maxlength='60' size='25' value=\"{$pSet['evtHeadW']}\"></div>

	<div class='setting'><span class='sLabel' onmouseover=\"popM(this,'".htmlspecialchars($ax['eventColor_text'])."')\">{$ax['eventColor_label']}:</span>
	<input type='radio' id='evtc0' name='pSet[eventColor]' value='0'".($pSet['eventColor'] == 0 ? " checked" : '')."><label for='evtc0'>{$ax['no_color']}</label><pre> </pre>
	<input type='radio' id='evtc1' name='pSet[eventColor]' value='1'".($pSet['eventColor'] == 1 ? " checked" : '')."><label for='evtc1'>{$ax['event_cat']}</label><pre> </pre>
	<input type='radio' id='evtc2' name='pSet[eventColor]' value='2'".($pSet['eventColor'] == 2 ? " checked" : '')."><label for='evtc2'>{$ax['user_group']}</label></div>

	<div class='setting'><span class='sLabel' onmouseover=\"popM(this,'".htmlspecialchars($ax['ownerTitle_text'])."')\">{$ax['ownerTitle_label']}:</span>
	<input type='checkbox' name='pSet[ownerTitle]' value='1'".($pSet['ownerTitle'] == 1 ? " checked" : '')."></div>

	<div class='setting'><span class='sLabel' onmouseover=\"popM(this,'".htmlspecialchars($ax['showSpanel_text'])."')\">{$ax['showSpanel_label']}:</span>
	<input type='checkbox' name='pSet[spMiniCal]' value='1'".($pSet['spMiniCal'] == 1 ? " checked" : '').">{$ax['spMiniCal']}<pre> </pre>
	<input type='checkbox' name='pSet[spImages]' value='1'".($pSet['spImages'] == 1 ? " checked" : '').">{$ax['spImages']}<pre> </pre>
	<input type='checkbox' name='pSet[spInfoArea]' value='1'".($pSet['spInfoArea'] == 1 ? " checked" : '').">{$ax['spInfoArea']}</div>

	<div class='setting'><span class='sLabel' onmouseover=\"popM(this,'".htmlspecialchars($ax['showImgInMV_text'])."')\">{$ax['showImgInMV_label']}:</span>
	<input type='checkbox' id='showimg' name='pSet[showImgInMV]' value='1'".($pSet['showImgInMV'] == 1 ? " checked" : '')."></div>

	<div class='setting'><span class='sLabel' onmouseover=\"popM(this,'".htmlspecialchars($ax['monthInDCell_text'])."')\">{$ax['monthInDCell_label']}:</span>
	<input type='checkbox' name='pSet[monthInDCell]' value='1'".($pSet['monthInDCell'] == 1 ? " checked" : '')."></div>

	<div class='setting'><span class='sLabel' onmouseover=\"popM(this,'".htmlspecialchars($ax['evtWinSmall_text'])."')\">{$ax['evtWinSmall_label']}:</span>
	<input type='checkbox' name='pSet[evtWinSmall]' value='1'".($pSet['evtWinSmall'] == 1 ? " checked" : '')."></div>

	<div class='setting'><span class='sLabel' onmouseover=\"popM(this,'".htmlspecialchars($ax['mapViewer_text'])."')\">{$ax['mapViewer_label']}:</span>
	<input type='text' name='pSet[mapViewer]' size='45' value=\"{$pSet['mapViewer']}\"></div>
</fieldset>\n";

//== Dates/Times ==
echo "<fieldset><legend>{$ax['set_dt_settings']}</legend>
	<div class='setting'><span class='sLabel' onmouseover=\"popM(this,'".htmlspecialchars($ax['dateFormat_text'])."')\">{$ax['dateFormat_label']}:</span>
	<input type='text'{$errors[$e++]} name='pSet[dateFormat]' size='4' value='{$pSet['dateFormat']}'> ({$ax['dateFormat_expl']})</div>

	<div class='setting'><span class='sLabel' onmouseover=\"popM(this,'".htmlspecialchars($ax['MdFormat_text'])."')\">{$ax['MdFormat_label']}:</span>
	<input type='text'{$errors[$e++]} name='pSet[MdFormat]' size='4' value='{$pSet['MdFormat']}'> ({$ax['MdFormat_expl']})</div>

	<div class='setting'><span class='sLabel' onmouseover=\"popM(this,'".htmlspecialchars($ax['MdyFormat_text'])."')\">{$ax['MdyFormat_label']}:</span>
	<input type='text'{$errors[$e++]} name='pSet[MdyFormat]' size='4' value='{$pSet['MdyFormat']}'> ({$ax['MdyFormat_expl']})</div>

	<div class='setting'><span class='sLabel' onmouseover=\"popM(this,'".htmlspecialchars($ax['MyFormat_text'])."')\">{$ax['MyFormat_label']}:</span>
	<input type='text'{$errors[$e++]} name='pSet[MyFormat]' size='4' value='{$pSet['MyFormat']}'> ({$ax['MyFormat_expl']})</div>

	<div class='setting'><span class='sLabel' onmouseover=\"popM(this,'".htmlspecialchars($ax['DMdFormat_text'])."')\">{$ax['DMdFormat_label']}:</span>
	<input type='text'{$errors[$e++]} name='pSet[DMdFormat]' size='7' value='{$pSet['DMdFormat']}'> ({$ax['DMdFormat_expl']})</div>

	<div class='setting'><span class='sLabel' onmouseover=\"popM(this,'".htmlspecialchars($ax['DMdyFormat_text'])."')\">{$ax['DMdyFormat_label']}:</span>
	<input type='text'{$errors[$e++]} name='pSet[DMdyFormat]' size='7' value='{$pSet['DMdyFormat']}'> ({$ax['DMdyFormat_expl']})</div>

	<div class='setting'><span class='sLabel' onmouseover=\"popM(this,'".htmlspecialchars($ax['timeFormat_text'])."')\">{$ax['timeFormat_label']}:</span>
	<input type='text'{$errors[$e++]} name='pSet[timeFormat]' size='4' value='{$pSet['timeFormat']}'> ({$ax['timeFormat_expl']})</div>

	<div class='setting'><span class='sLabel' onmouseover=\"popM(this,'".htmlspecialchars($ax['weekNumber_text'])."')\">{$ax['weekNumber_label']}:</span>
	<input type='checkbox' name='pSet[weekNumber]' value='1'".($pSet['weekNumber'] == 1 ? " checked" : '')."></div>
</fieldset>\n";

//== File Uploads ==
echo "<fieldset><legend>{$ax['set_upload_settings']}</legend>
	<div class='setting'><span class='sLabel' onmouseover=\"popM(this,'".htmlspecialchars($ax['maxUplSize_text'])."')\">{$ax['maxUplSize_label']}:</span>
	<input type='text'{$errors[$e++]} name='pSet[maxUplSize]' maxlength='3' size='4' value='{$pSet['maxUplSize']}'> {$ax['mbytes']}</div>

	<div class='setting'><span class='sLabel' onmouseover=\"popM(this,'".htmlspecialchars($ax['attTypes_text'])."')\">{$ax['attTypes_label']}:</span>
	<input type='text' name='pSet[attTypes]' maxlength='70' size='45' value=\"{$pSet['attTypes']}\"></div>

	<div class='setting'><span class='sLabel' onmouseover=\"popM(this,'".htmlspecialchars($ax['tnlTypes_text'])."')\">{$ax['tnlTypes_label']}:</span>
	<input type='text' name='pSet[tnlTypes]' maxlength='70' size='45' value=\"{$pSet['tnlTypes']}\"></div>

	<div class='setting'><span class='sLabel' onmouseover=\"popM(this,'".htmlspecialchars($ax['tnlMaxSize_text'])."')\">{$ax['tnlMaxSize_label']}:</span>
	<input type='text'{$errors[$e++]} name='pSet[tnlMaxW]' maxlength='3' size='4' value=\"{$pSet['tnlMaxW']}\">&nbsp;x&nbsp;<input type='text'{$errors[$e++]} name='pSet[tnlMaxH]' maxlength='3' size='4' value=\"{$pSet['tnlMaxH']}\"> {$ax['wxhinpx']} (10 - 800)</div>

	<div class='setting'><span class='sLabel' onmouseover=\"popM(this,'".htmlspecialchars($ax['tnlDelDays_text'])."')\">{$ax['tnlDelDays_label']}:</span>
	<input type='text'{$errors[$e++]} name='pSet[tnlDelDays]' maxlength='2' size='4' value='{$pSet['tnlDelDays']}'> {$ax['days']}</div>
</fieldset>\n";

//== Reminders ==
echo "<fieldset><legend>{$ax['set_reminder_settings']}</legend>
	<div><span class='floatL'>{$ax['general']}</span><hr class='clear'></div>
	<div class='setting'><span class='sLabel' onmouseover=\"popM(this,'".htmlspecialchars($ax['services_text'])."')\">{$ax['services_label']}:</span>
	<input type='checkbox' id='eml' name='pSet[emlService]' value='1'".($pSet['emlService'] ? " checked" : '')."><label for='eml'>{$ax['email']}</label><pre> </pre>
	<input type='checkbox' id='sms' name='pSet[smsService]' value='1'".($pSet['smsService'] ? " checked" : '')."><label for='sms'>{$ax['sms']}</label></div>

	<div class='setting'><span class='sLabel' onmouseover=\"popM(this,'".htmlspecialchars($ax['defRecips_text'].'<br>'.$ax['reciplist'])."')\">{$ax['defRecips_label']}:</span>
	<input type='text' name='pSet[defRecips]' maxlength='255' size='45' value=\"{$pSet['defRecips']}\"></div>

	<div class='setting'><span class='sLabel' onmouseover=\"popM(this,'".htmlspecialchars($ax['maxEmlCc_text'])."')\">{$ax['maxEmlCc_label']}:</span>
	<input type='text'{$errors[$e++]} name='pSet[maxEmlCc]' maxlength='2' size='2' value=\"{$pSet['maxEmlCc']}\"> (5 - 99)</div>

	<div><span class='floatL'>{$ax['email']}</span><hr class='clear'></div>
	<div class='setting'><span class='sLabel' onmouseover=\"popM(this,'".htmlspecialchars($ax['notSenderEml_text'])."')\">{$ax['notSenderEml_label']}:</span>
	<input type='radio' id='notec' name='pSet[notSenderEml]' value='0'".($pSet['notSenderEml'] == 0 ? " checked" : '')."><label for='notec'>{$ax['calendar']}</label><pre> </pre>
	<input type='radio' id='noteu' name='pSet[notSenderEml]' value='1'".($pSet['notSenderEml'] == 1 ? " checked" : '')."><label for='noteu'>{$ax['user']}</label></div>

	<div class='setting'><span class='sLabel' onmouseover=\"popM(this,'".htmlspecialchars($ax['mailServer_text'])."')\">{$ax['mailServer_label']}:</span>
	<input type='radio' id='mails1' name='pSet[mailServer]' value='1'".($pSet['mailServer'] == 1 ? " checked" : '')."><label for='mails1'>{$ax['php_mail']}</label><pre> </pre>
	<input type='radio' id='mails2' name='pSet[mailServer]' value='2'".($pSet['mailServer'] == 2 ? " checked" : '')."><label for='mails2'>{$ax['smtp_mail']}</label></div>

	<div class='setting'><span class='sLabel' onmouseover=\"popM(this,'".htmlspecialchars($ax['smtpServer_text'])."')\">{$ax['smtpServer_label']}:</span>
	<input type='text'{$errors[$e++]} name='pSet[smtpServer]' size='45' value=\"{$pSet['smtpServer']}\"></div>

	<div class='setting'><span class='sLabel' onmouseover=\"popM(this,'".htmlspecialchars($ax['smtpPort_text'])."')\">{$ax['smtpPort_label']}:</span>
	<input type='text'{$errors[$e++]} name='pSet[smtpPort]' maxlength='5' size='2' value=\"{$pSet['smtpPort']}\"></div>

	<div class='setting'><span class='sLabel' onmouseover=\"popM(this,'".htmlspecialchars($ax['smtpSsl_text'])."')\">{$ax['smtpSsl_label']}:</span>
	<input type='checkbox' name='pSet[smtpSsl]' value='1'".($pSet['smtpSsl'] ? " checked" : '')."></div>

	<div class='setting'><span class='sLabel' onmouseover=\"popM(this,'".htmlspecialchars($ax['smtpAuth_text'])."')\">{$ax['smtpAuth_label']}:</span>
	<input type='checkbox' name='pSet[smtpAuth]' value='1'".($pSet['smtpAuth'] ? " checked" : '')."><pre> </pre>{$ax['username']}: <input type='text'{$errors[$e++]} name='pSet[smtpUser]' size='16' value=\"{$pSet['smtpUser']}\"><pre> </pre>{$ax['password']}: <input type='password'{$errors[$e++]} name='pSet[smtpPass]' size='16' value=\"{$pSet['smtpPass']}\"></div>

	<div><span class='floatL'>{$ax['sms']}</span><hr class='clear'></div>
	<div class='setting'><span class='sLabel' onmouseover=\"popM(this,'".htmlspecialchars($ax['notSenderSms_text'])."')\">{$ax['notSenderSms_label']}:</span>
	<input type='radio' id='notsc' name='pSet[notSenderSms]' value='0'".($pSet['notSenderSms'] == 0 ? " checked" : '')."><label for='notsc'>{$ax['calendar']}</label><pre> </pre>
	<input type='radio' id='notsu' name='pSet[notSenderSms]' value='1'".($pSet['notSenderSms'] == 1 ? " checked" : '')."><label for='notsu'>{$ax['user']}</label></div>

	<div class='setting'><span class='sLabel' onmouseover=\"popM(this,'".htmlspecialchars($ax['calPhone_text'])."')\">{$ax['calPhone_label']}:</span>
	<input type='text'{$errors[$e++]} name='pSet[calendarPhone]' size='24' maxlength='20' value=\"{$pSet['calendarPhone']}\"></div>
	
	<div class='setting'><span class='sLabel' onmouseover=\"popM(this,'".htmlspecialchars($ax['smsCarrier_text'])."')\">{$ax['smsCarrier_label']}:</span>
	<input type='text'{$errors[$e++]} name='pSet[smsCarrier]' size='45' value=\"{$pSet['smsCarrier']}\"></div>

	<div class='setting'><span class='sLabel' onmouseover=\"popM(this,'".htmlspecialchars($ax['smsCountry_text'])."')\">{$ax['smsCountry_label']}:</span>
	<input type='text'{$errors[$e++]} name='pSet[smsCountry]' maxlength='6' size='2' value=\"{$pSet['smsCountry']}\"><pre> </pre>
	<input type='checkbox' id='pfix' name='pSet[cCodePrefix]' value='1'".($pSet['cCodePrefix'] ? " checked" : '')."><label for='pfix'>{$ax['cc_prefix']}</label></div>
	
	<div class='setting'><span class='sLabel' onmouseover=\"popM(this,'".htmlspecialchars($ax['smsSubject_text'])."')\">{$ax['smsSubject_label']}:</span>
	<input type='text' name='pSet[smsSubject]' size='45' value=\"{$pSet['smsSubject']}\"></div>

	<div class='setting'><span class='sLabel' onmouseover=\"popM(this,'".htmlspecialchars($ax['maxLenSms_text'])."')\">{$ax['maxLenSms_label']}:</span>
	<input type='text'{$errors[$e++]} name='pSet[maxLenSms]' maxlength='3' size='2' value=\"{$pSet['maxLenSms']}\"> (70 - 500 bytes)</div>

	<div class='setting'><span class='sLabel' onmouseover=\"popM(this,'".htmlspecialchars($ax['smsAddLink_text'])."')\">{$ax['smsAddLink_label']}:</span>
	<input type='checkbox' name='pSet[smsAddLink]' value='1'".($pSet['smsAddLink'] ? " checked" : '')."></div>
</fieldset>\n";

//== Periodic Functions ==
echo "<fieldset><legend>{$ax['set_perfun_settings']}</legend>
	<div class='setting'><span class='sLabel' onmouseover=\"popM(this,'".htmlspecialchars($ax['cronHost_text'])."')\">{$ax['cronHost_label']}:</span>
	<input type='radio' id='cron0' name='cronHost' value='0'".($cronHost == 0 ? " checked" : '')."><label for='cron0'>{$ax['local']}</label><pre> </pre>
	<input type='radio' id='cron1' name='cronHost' value='1'".($cronHost == 1 ? " checked" : '')."><label for='cron1'>{$ax['remote']}</label><pre> </pre>
	<input type='radio' id='cron2' name='cronHost' value='2'".($cronHost == 2 ? " checked" : '')."><label for='cron2'>{$ax['ip_address']}</label>: <input type='text'{$errors[$e++]} name='cronIpAd' maxlength='15' size='12' value=\"{$cronIpAd}\"></div>

	<div class='setting'><span class='sLabel' onmouseover=\"popM(this,'".htmlspecialchars($ax['cronSummary_text'])."')\">{$ax['cronSummary_label']}:</span>
	<input type='radio' id='acs0' name='pSet[adminCronSum]' value='0'".($pSet['adminCronSum'] == 0 ? " checked" : '')."><label for='acs0'>{$ax['disabled']}</label><pre> </pre>
	<input type='radio' id='acs1' name='pSet[adminCronSum]' value='1'".($pSet['adminCronSum'] == 1 ? " checked" : '')."><label for='acs1'>{$ax['enabled']}</label></div>

	<div class='setting'><span class='sLabel' onmouseover=\"popM(this,'".htmlspecialchars($ax['chgSummary_text'].'<br>'.$ax['reciplist'])."')\">{$ax['chgSummary_label']}:</span>
	<input type='text'{$errors[$e++]} name='pSet[chgNofDays]' maxlength='2' size='2' value='{$pSet['chgNofDays']}'> {$ax['days']} (0 - 30)<pre> </pre>
	{$ax['chgRecipList']}: <input type='text'{$errors[$e++]} name='pSet[chgSumRecips]' size='45' maxlength='255' value=\"{$pSet['chgSumRecips']}\"></div>

	<div class='setting'><span class='sLabel' onmouseover=\"popM(this,'".htmlspecialchars($ax['icsExport_text'])."')\">{$ax['icsExport_label']}:</span>
	<input type='checkbox' name='pSet[icsExport]' value='1'".($pSet['icsExport'] == 1 ? " checked" : '')."></div>

	<div class='setting'><span class='sLabel' onmouseover=\"popM(this,'".htmlspecialchars($ax['eventExp_text'])."')\">{$ax['eventExp_label']}:</span>
	<input type='text'{$errors[$e++]} name='pSet[eventExp]' maxlength='3' size='2' value='{$pSet['eventExp']}'> (0 - 999)</div>

	<div class='setting'><span class='sLabel' onmouseover=\"popM(this,'".htmlspecialchars($ax['maxNoLogin_text'])."')\">{$ax['maxNoLogin_label']}:</span>
	<input type='text'{$errors[$e++]} name='pSet[maxNoLogin]' maxlength='3' size='2' value='{$pSet['maxNoLogin']}'> (0 - 365)</div>
</fieldset>\n";

//== Stand-Alone Sidebar ==
echo "<fieldset><legend>{$ax['set_sidebar_settings']}</legend>
	<div class='setting'><span class='sLabel' onmouseover=\"popM(this,'".htmlspecialchars($ax['popFieldsSbar_text'].'<br>'.$ax['templFields_text'])."')\">{$ax['popFieldsSbar_label']}:</span>
	<input type='text'{$errors[$e++]} name='pSet[popFieldsSbar]' maxlength='7' size='6' value=\"{$pSet['popFieldsSbar']}\"></div>

	<div class='setting'><span class='sLabel' onmouseover=\"popM(this,'".htmlspecialchars($ax['showLinkInSB_text'])."')\">{$ax['showLinkInSB_label']}:</span>
	<input type='checkbox' name='pSet[showLinkInSB]' value='1'".($pSet['showLinkInSB'] == 1 ? " checked" : '')."></div>

	<div class='setting'><span class='sLabel' onmouseover=\"popM(this,'".htmlspecialchars($ax['sideBarDays_text'])."')\">{$ax['sideBarDays_label']}:</span>
	<input type='text'{$errors[$e++]} name='pSet[sideBarDays]' maxlength='3' size='2' value='{$pSet['sideBarDays']}'> (1 - 365)</div>\n";
?>
</fieldset>
</div>
</div>
</form>
