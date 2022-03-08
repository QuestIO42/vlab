<?php
/*
= Header for the LuxCal calendar pages =

This file is part of the LuxCal Web Calendar.
Copyright 2009-2020 LuxSoft - www.LuxSoft.eu
License https://www.gnu.org/licenses/gpl.html GPL version 3

The LuxCal Web Calendar is distributed WITHOUT ANY WARRANTY.
*/

//sanity check
if (empty($lcV)) { exit('not permitted ('.substr(basename(__FILE__),0,-4).')'); } //launch via script only

//functions
function headerRss() {
	global $set, $usr, $cF;

	$httpX = (!empty($_SERVER['HTTPS']) and $_SERVER['HTTPS'] != 'off') ? 'https' : 'http'; 
	if ($usr['privs'] > 0 and $set['rssFeed']) {
		echo "<link rel='alternate' type='application/rss+xml' title='LuxCal RSS Feed' href='{$httpX}://{$_SERVER['SERVER_NAME']}".rtrim(dirname($_SERVER["PHP_SELF"]),'/')."/rssfeed.php{$cF}'>\n";
	}
}

function topBar() {
	global $xx, $hdrType, $set, $usr, $today;

	if (!isset($set['logoPath'])) { $set['logoPath'] = ''; } //needed for a smooth upgrade
	$x = $hdrType == 'x' ? 'S' : 'L' ; //narrow or wide display
	$topL =	"<span class='barL{$x}'>{$set['calendarTitle']}</span>";
	if ($usr['ID'] > 1) {
		$topR = "<span class='barR{$x} navLink' onclick=\"showUm('usrMenu');\">{$usr['name']} &#9660;</span>";
	} else {
		$topR = "<span class='barR{$x} navLink' onclick=\"index({cP:20});\">{$xx['log_in']}</span>";
	}
	$left = '';
	if ($hdrType != 'x' and $set['logoPath']) { //wide display and logo
		$left = "<img class='logo' src='./{$set['logoPath']}' alt='logo'>"; //show logo
		if ($set['backLinkUrl']) { //make logo back link
			$left = "<a href='{$set['backLinkUrl']}' title='{$xx['hdr_button_back']}'>{$left}</a>";
		}
	}
	$topC = "<span class='noPrint navLink' onclick=\"index({cD:'{$today}'});\">".makeD($today,5)."</span>";
	echo "{$left}\n<div class='topBar'>\n<h1>{$topL}{$topC}{$topR}</h1>\n</div>\n";
}

function sideMenu($groups) { //make hamburger menu
	global $xx, $set, $usr, $opt, $today, $nowTS;
	
	echo "<div class='menu sideMenu noPrint' id='sideMenu'>";
	echo "<h5 class='inline noWrap'>&nbsp;{$xx['hdr_side_menu']}</h5><span class='closeX' onclick=\"showSm('sideMenu');\">&nbsp;&#10060;&nbsp;</span>\n";
	//display menu
	echo "<div class='smGroup'>\n"; //fixed group
	echo "<p title='{$xx['hdr_user_guide']}' onclick=\"help({$opt['cP']}); showSm('sideMenu');\">{$xx['hdr_button_help']}</p>\n";
	echo "<p title='{$xx['hdr_print_page']}' onclick=\"printNice(); showSm('sideMenu');\">{$xx['hdr_button_print']}</p>\n";
	if (strpos($groups,'gen')) {
		echo "<p title='{$xx['hdr_dload_pdf']}' onclick=\"showX('pdfPop',true);  showSm('sideMenu');\">{$xx['hdr_button_pdf']}</p>\n";
	}
	echo "</div>\n";
	if (strpos($groups,'gen')) {
		echo "<div class='smGroup'>\n"; //general group
		echo "<p title='{$xx['hdr_search']}' onclick=\"index({cP:22});\">{$xx['hdr_button_search']}</p>\n";
		if ($usr['tnPrivs'] > '00') {
			echo "<p title='{$xx['hdr_tnails']}' onclick=\"index({cP:24});\">{$xx['hdr_button_tnails']}</p>\n";
		}
		if ($set['contButton']) {
			echo "<p title='{$xx['hdr_contact']}' onclick=\"index({cP:23});\">{$xx['hdr_button_contact']}</p>\n";
		}
		echo "</div>\n";
	}
	if (strpos($groups,'adm') and $usr['privs'] >= 4) {
		echo "<div class='smGroup'>\n"; //manager group
		echo "<p onclick=\"index({cP:81});\">{$xx['hdr_categories']}</p>\n";
		echo "<p onclick=\"index({cP:82});\">{$xx['hdr_users']}</p>\n";
		echo "<p onclick=\"index({cP:83});\">{$xx['hdr_groups']}</p>\n";
		echo "<p onclick=\"index({cP:85});\">{$xx['hdr_import_usr']}</p>\n";
		echo "<p onclick=\"index({cP:86});\">{$xx['hdr_export_usr']}</p>\n";
		echo "</div>\n";
	}
	if (strpos($groups,'adm') and $usr['privs'] == 9) {
		echo "<div class='smGroup'>\n"; //admin group
		echo "<p onclick=\"index({cP:80});\">{$xx['hdr_settings']}</p>\n";
		echo "<p onclick=\"index({cP:84});\">{$xx['hdr_database']}</p>\n";
		echo "<p onclick=\"index({cP:87});\">{$xx['hdr_import_ics']}</p>\n";
		echo "<p onclick=\"index({cP:88});\">{$xx['hdr_export_ics']}</p>\n";
		echo "<p onclick=\"index({cP:89});\">{$xx['hdr_import_csv']}</p>\n";
//		echo "<p onclick=\"index({cP:90});\">{$xx['hdr_clean_up']}</p>\n";
		echo "<p onclick=\"styleWin(99); showSm('sideMenu');\">{$xx['hdr_styling']}</p>\n";
		echo "</div>\n";
	}
	if (strpos($groups,'lst')) {
		echo "<div class='smGroup'>\n"; //list group
		if ($usr['privs'] >= 4) {
			echo "<p title='{$xx['hdr_toap_list']}' onclick=\"showL('toapBar',1); showSm('sideMenu');\">{$xx['hdr_button_toap']}</p>\n";
		}
		echo "<p title='{$xx['hdr_todo_list']}' onclick=\"showL('todoBar',1); showSm('sideMenu');\">{$xx['hdr_button_todo']}</p>\n";
		echo "<p title='{$xx['hdr_upco_list']}' onclick=\"showL('upcoBar',1); showSm('sideMenu');\">{$xx['hdr_button_upco']}</p>\n";
		echo "</div>\n";
	}
	echo "</div>\n";
}

function pdfDialog() {
	global $xx, $set, $usr, $opt, $today, $nowTS;
	
	$pdfJson = json_encode(array('uID' => $usr['ID'], 'users' => implode(',',$opt['cU']), 'groups' => implode(',',$opt['cG']), 'cats' => implode(',',$opt['cC']))); //json encode object
	echo "<div id='pdfPop'>
<div class='dialogBox floatC'>
<fieldset>\n<legend>PDF - {$xx['title_upcoming']}</legend>
<form action='pdfs/pdf.php' method='post'>
<input type='hidden' name='pdfJson' value='{$pdfJson}'>
<input type='radio' id='pdf1' name='pdf' value='1' checked><label for='pdf1'>A4</label>&nbsp;&nbsp;
<input type='radio' id='pdf2' name='pdf' value='2'><label for='pdf2'>A5</label><br><br>
{$xx['from']}: <input type='text' name='fDate' id='fDate' value=".IDtoDD($today)." size='10'>
<span class='dtPick' onclick=\"dPicker(1,'','fDate'); return false;\">&#x1F4C5;</span>&nbsp;&nbsp;
{$xx['to']}: <input type='text' name='tDate' id='tDate' value=".IDtoDD(date('Y-m-d',$nowTS + ($set['lookaheadDays'] * 86400)))." size='10'>
<span class='dtPick' onclick=\"dPicker(1,'','tDate'); return false;\">&#x1F4C5;</span>
<br><br>
<button type='submit' class='bold' onclick=\"showX('pdfPop',false);\">&nbsp;OK&nbsp;</button>&nbsp;&nbsp;
<button type='button' onclick=\"showX('pdfPop',false);\">Cancel</button>
</form></fieldset></div></div>";
}

function calButton () {
	global $xx, $usr;

	if ($usr['privs'] > 0) { //view rights
		echo "<button type='button' title='{$xx['hdr_back_to_cal']}' onclick=\"index({cP:0});\">{$xx['hdr_calendar']}</button>\n";
	}
}

function addButton() {
	global $xx, $opt, $usr;

	if ($usr['privs'] > 1) { //post rights
		$cid = (count($opt['cC']) == 1 and $opt['cC'][0] != 0) ? $opt['cC'][0] : 0;
		echo "<button type='button' title='{$xx['hdr_add_event']}' onclick=\"newE(0,{$cid});\">{$xx['hdr_button_add']}</button>\n";
	}
	unset($cid);
}

function srcButton () {
	global $xx;

	echo "<button type='button' title='{$xx['hdr_search']}' onclick=\"index({cP:22});\">&#x1f50d;</button>\n";
}

function prtButton () {
	global $xx;

	echo "<button type='button' title='{$xx['hdr_print_page']}' onclick=\"printNice();\">{$xx['hdr_button_print']}</button>\n";
}

function hlpButton($cPage) {
	global $xx;

	echo "<button type='button' title='{$xx['hdr_user_guide']}' onclick=\"help({$cPage});\">{$xx['hdr_button_help']}</button>\n";
}

function menButton() {
	global $xx;

		echo "<button type='button' title='{$xx['hdr_open_menu']}' onclick=\"showSm('sideMenu')\">&nbsp;&#9776;&nbsp;</button>\n";
}

function urlButton() {
	global $xx, $set;

	if ($set['backLinkUrl'] and !$set['logoPath']) { //if no logo, display button
		echo "<button id='urlButton' type='button' title='{$xx['hdr_button_back']}' onclick=\"location.href='{$set['backLinkUrl']}';\">{$xx['back']}</button><pre>  </pre>\n";
	}
}

function optButton() {
	global $options, $xx;

	if ($options) { //menus
		echo "<button type='button' class='optBut' id='optButton' title='{$xx['hdr_options_panel']}' onclick=\"toggleLabel('optButton','{$xx['options']}','{$xx['done']}'); showOp('optMenu','optMenu')\">{$xx['options']}</button>\n";
	}
}

function nbCenter() {
	global $options, $xx;

	echo "<div ".($options ? "class='point noPrint' onclick=\"toggleLabel('optButton','{$xx['options']}','{$xx['done']}'); showOp('optMenu','optMenu')\"" : '').">&nbsp;</div>\n";
}


function viewButtons() {
	global $xx, $set, $usr;

	$viewButtons = $usr['ID'] == 1 ? $set['viewButsPub'] : $set['viewButsLog']; //view buttons to display
	if ($viewButtons) {
		foreach (explode(',',$viewButtons) as $viewNr) {
			$label = $xx["hdr_view_{$viewNr}"];
			echo "<button type='button' title='{$xx['hdr_go_to_view']}' onclick=\"index({cP:{$viewNr}})\">{$label}</button>\n";
		}
	}
	unset($viewButtons,$label);
}

function dateForm() {
	global $formCal, $xx, $opt;

	echo "<form class='inline' id='gotoD' name='gotoD' method='post'>
{$formCal}
<input size='10' type='text' name='nD' id='nD' value='".IDtoDD($opt['cD'])."'><span class='dtPick' title='{$xx['hdr_select_date']}' onclick=\"dPicker(0,'gotoD','nD');return false;\">&#x1F4C5;</span>
</form>\n";
}

function usrMenu() { //make user menu
	global $xx;

	echo "<div class='menu usrMenu' id='usrMenu'>
<div class='umGroup'>
<p onclick=\"index({cP:0,loff:1});\">{$xx['log_out']}</p>
<p onclick=\"index({cP:21});\">{$xx['title_profile']}</p>
</div>
</div>\n";
}

function optMenu() { //make options panel
	global $formCal, $options, $xx, $set, $calID, $usr, $opt, $avViews, $dbSel;

	if (!$options) { return; } //no menus
	
	echo "<div class='menu optMenu' id='optMenu'>
<h3 class='floatC point' onclick=\"showOp('optMenu','optMenu')\">{$xx['hdr_options_submit']}</h3>
<form name='optMenu' method='post'>\n";
	if ($dbSel and $usr['privs'] == 9) { //get calendar database IDs
		$calIDs = getCIDs(); //get all calender IDs
		if (count($calIDs) > 1) { //more than 1 calendar
			echo "<div class='option'>\n<div class='optHead'>{$xx['hdr_calendar']}</div>\n<div class='optList'>\n";
			foreach ($calIDs as $cal) {
				$checked = ($calID == $cal) ? " checked" : '';
				echo "<input type='checkbox' id='{$cal}' name='cal' value='{$cal}' onclick=\"check1('cal',this);\"{$checked}><label for='{$cal}'>".$cal."</label><br>\n";
			}
			echo "</div>\n</div>\n";
		}
	} else {
		echo "{$formCal}\n";
	}
	if ($set['viewMenu']) {
		$checkedA = array_fill(1,11,'');
		$checkedA[$opt['cP']] = " checked";
		echo "<div class='option'>\n<div class='optHead'>{$xx['hdr_view']}</div>\n<div class='optList'>";
		foreach (explode(',',$avViews) as $v) {
			$vLabel = $xx["hdr_view_{$v}"];
			echo "<input type='checkbox' id='cP{$v}' name='cP' value='{$v}' onclick=\"check1('cP',this);\"{$checkedA[$v]}><label for='cP{$v}'>{$vLabel}</label><br>\n";
		}
		echo "</div>\n</div>\n";
	}
	if ($set['groupMenu']) {
		echo "<div class='option'>\n<div class='optHead'>{$xx['hdr_groups']}</div>\n<div class='optList'>\n";
		$stH = dbQuery("SELECT `ID`,`name`,`color` FROM `groups` WHERE `status` >= 0 ORDER BY `name`");
		$checked = in_array(0, $opt['cG']) ? " checked" : '';
		echo "<input type='checkbox' id='cG0' name='cG[]' value='0' onclick=\"check0('cG');\"{$checked}><label for='cG0'>{$xx['hdr_all_groups']}</label><br>\n";
		while (list($xgID,$gName,$color) = $stH->fetch(PDO::FETCH_NUM)) {
			$checked = in_array($xgID, $opt['cG']) ? " checked" : '';
			$groupColor = ($color) ? " style='background-color:{$color};'" : '';
			echo "<input type='checkbox' id='cG{$xgID}' name='cG[]' value='{$xgID}' onclick=\"checkN('cG');\"{$checked}><label for='cG{$xgID}'{$groupColor}>{$gName}</label><br>\n";
		}
		echo "</div>\n</div>\n";
	}
	if ($set['userMenu'] and $usr['ID'] > 1) {
		echo "<div class='option'>\n<div class='optHead'>{$xx['hdr_users']}</div>\n<div class='optList'>\n";
		$stH = dbQuery("SELECT u.`ID`,u.`name`,g.`color` FROM `users` AS u INNER JOIN `groups` AS g ON g.`ID` = u.`groupID` WHERE u.`status` >= 0 ORDER BY u.`name`");
		$checked = in_array(0, $opt['cU']) ? " checked" : '';
		echo "<input type='checkbox' id='cU0' name='cU[]' value='0' onclick=\"check0('cU');\"{$checked}><label for='cU0'>{$xx['hdr_all_users']}</label><br>\n";
		while (list($xuID,$uName,$color) = $stH->fetch(PDO::FETCH_NUM)) {
			$checked = in_array($xuID, $opt['cU']) ? " checked" : '';
			$userColor = ($color) ? " style='background-color:{$color};'" : '';
			echo "<input type='checkbox' id='cU{$xuID}' name='cU[]' value='{$xuID}' onclick=\"checkN('cU');\"{$checked}><label for='cU{$xuID}'{$userColor}>{$uName}</label><br>\n";
		}
		echo "</div>\n</div>\n";
	}
	if ($set['catMenu']) {
		echo "<div class='option'>\n<div class='optHead'>{$xx['hdr_categories']}</div>\n<div class='optList'>\n";
		$where = ' WHERE `status` >= 0'.($usr['vCats'] != '0' ? " AND `ID` IN ({$usr['vCats']})" : '');
		$stH = dbQuery("SELECT `name`,`sequence`,`color`,`bgColor` FROM `categories`".$where." ORDER BY `sequence`");
		$checked = in_array(0, $opt['cC']) ? " checked" : '';
		echo "<input type='checkbox' id='cC0' name='cC[]' value='0' onclick=\"check0('cC');\"{$checked}><label for='cC0'>{$xx['hdr_all_cats']}</label><br>\n";
		while (list($cName,$xC,$color,$bgColor) = $stH->fetch(PDO::FETCH_NUM)) {
			$checked = in_array($xC, $opt['cC']) ? " checked" : '';
			$catColor = ($color ? "color:{$color};" : '').($bgColor ? "background-color:{$bgColor};" : '');
			echo "<input type='checkbox' id='cC{$xC}' name='cC[]' value='{$xC}' onclick=\"checkN('cC');\"{$checked}><label for='cC{$xC}'".($catColor ? " style=\"".$catColor."\"" : "").">{$cName}</label><br>\n";
		}
		echo "</div>\n</div>\n";
	}
	if ($set['langMenu']) {
		echo "<div class='option'>\n<div class='optHead'>{$xx['hdr_lang']}</div>\n<div class='optList'>\n";
		$files = scandir("lang/");
		foreach ($files as $file) {
			if (substr($file, 0, 3) == "ui-") {
				$lang = strtolower(substr($file,3,-4));
				$checked = ($opt['cL'] == $lang) ? " checked" : '';
				echo "<input type='checkbox' id='{$lang}' name='cL' value='{$lang}' onclick=\"check1('cL',this);\"{$checked}><label for='{$lang}'>".ucfirst($lang)."</label><br>\n";
			}
		}
		echo "</div>\n</div>\n";
	}
	echo "</form>\n</div>\n";
}

function toapList() { //make list with events to be approved
	global $xx, $set, $opt, $usr, $evtList;
	
	echo "<div class='toapBar' id='toapBar'>
<div class='barTop move' onmousedown=\"dragMe('toapBar',event)\">{$xx['hdr_toap_list']}<span class='closeX' onclick=\"showL('toapBar',0)\">&nbsp;&#10060;&nbsp;</span></div>\n";
	$curT = strtotime($opt['cD'].' 12:00:00'); //current Unix time
	$startD = date("Y-m-d", $curT - (7 * 86400)); //current date - 1 week
	$endD = date("Y-m-d", $curT + (($set['lookaheadDays']-1) * 86400)); //current date + look ahead nr of days
	$filter = '(c.`approve` = 1 AND e.`approved` = 0)'; //events in cat to be approved but not yet approved
	retrieve($startD,$endD,'guc',$filter);

	echo '<h5 class="floatC">'.IDtoDD($startD).' - '.IDtoDD($endD)."</h5>\n";
	//display list
	echo "<div class='barBody'>\n";
	if ($evtList) {
		$evtDone = array();
		$lastDate = '';
		foreach($evtList as $date => &$events) {
			foreach ($events as $evt) {
				if (!$evt['mde'] or !in_array($evt['eid'],$evtDone)) { //!mde or mde not processed
					$evtDone[] = $evt['eid'];
					$evtDate = $evt['mde'] ? makeD($evt['sda'],5)." - ".makeD($evt['eda'],5) : makeD($date,5);
					$evtTime = $evt['ald'] ? $xx['vws_all_day'] : ITtoDT($evt['sti']).($evt['eti'] ? ' - '.ITtoDT($evt['eti']) : '');
					$onClick = " class='point' onclick=\"editE({$evt['eid']},'{$date}');\"";
					$eStyle = colorStyle($evt); //get event colors
					$eStyle = $eStyle ? " style='{$eStyle}'" : '';
					echo $lastDate != $evtDate ? "<h5>{$evtDate}</h5>\n" : '';
					echo "<p>{$evtTime}</p>\n";
					echo "<p{$onClick}{$eStyle}>&nbsp;&nbsp;{$evt['tit']}</p><br>\n";
					$lastDate = $evtDate;
				}
			}
		}
	} else {
		echo $xx['none']."\n";
	}
	echo "</div>\n</div>\n";
}

function todoList() { //make list with todo events
	global $xx, $set, $opt, $usr, $evtList;
	
	echo "<div class='todoBar' id='todoBar'>
<div class='barTop move' onmousedown=\"dragMe('todoBar',event)\">{$xx['hdr_todo_list']}<span class='closeX' onclick=\"showL('todoBar',0)\">&nbsp;&#10060;&nbsp;</span></div>\n";
	$curT = strtotime($opt['cD'].' 12:00:00'); //current Unix time
	$startD = date("Y-m-d", $curT - ($set['lookbackDays'] * 86400)); //current date - 1 month
	$endD = date("Y-m-d", $curT + (($set['lookaheadDays']-1) * 86400)); //current date + look ahead nr of days
	$filter = '(c.`checkBx` = 1)'; //events in cat with a check mark
	retrieve($startD,$endD,'guc',$filter);

	echo '<h5 class="floatC">'.IDtoDD($startD).' - '.IDtoDD($endD)."</h5>\n";
	//display list
	echo "<div class='barBody'>\n";
	if ($evtList) {
		foreach($evtList as $date => &$events) {
			$dShown = 0;
			foreach ($events as $evt) {
				if (strpos($evt['chd'],$date)) { continue; } //flush completed events
				if (!$dShown) {
					echo "<h5>".makeD($date,5)."</h5>\n";
					$dShown = 1;
				}
				$evtTime = $evt['ald'] ? $xx['vws_all_day'] : ITtoDT($evt['sti']).($evt['eti'] ? ' - '.ITtoDT($evt['eti']) : '');
				$mayView = ($set['details4All'] == 1 or ($set['details4All'] == 2 and $usr['ID'] > 1) or $evt['mayE']);
				$click = ($evt['mayE'] ? 'editE' : 'showE')."({$evt['eid']},'{$date}')";
				$onClick = $mayView ? " class='point' onclick=\"{$click};\"" : " class='arrow'";
				$eStyle = colorStyle($evt); //get event colors
				$eStyle = $eStyle ? " style='{$eStyle}'" : '';
				$chBox = $evt['cbx'] ? checkBox($evt,$date) : '';
				echo "<p>{$evtTime}</p>\n";
				echo "<p{$onClick}{$eStyle}>{$chBox}{$evt['tit']}</p><br>\n";
			}
		}
	} else {
		echo $xx['none']."\n";
	}
	echo "</div>\n</div>\n";
}

function upcoList() { //make list with upcoming events
	global $xx, $set, $opt, $usr, $evtList;

	echo "<div class='upcoBar' id='upcoBar'>
<div class='barTop move' onmousedown=\"dragMe('upcoBar',event)\">{$xx['hdr_upco_list']}<span class='closeX' onclick=\"showL('upcoBar',0)\">&nbsp;&#10060;&nbsp;</span></div>\n";
	$startD = $opt['cD'];
	$eTime = strtotime($startD.' 12:00:00') + (($set['lookaheadDays']-1) * 86400); //Unix time of end date
	$endD = date("Y-m-d", $eTime);
	retrieve($startD,$endD,'guc');

	echo '<h5 class="floatC">'.IDtoDD($startD).' - '.IDtoDD($endD)."</h5>\n";
	//display events
	echo "<div class='barBody'>\n";
	if ($evtList) {
		$evtDone = array();
		$lastDate = '';
		foreach($evtList as $date => &$events) {
			foreach ($events as $evt) {
				if (!$evt['mde'] or !in_array($evt['eid'],$evtDone)) { //!mde or mde not processed
					$evtDone[] = $evt['eid'];
					$evtDate = $evt['mde'] ? makeD($evt['sda'],5)." - ".makeD($evt['eda'],5) : makeD($date,5);
					$evtTime = $evt['ald'] ? $xx['vws_all_day'] : ITtoDT($evt['sti']).($evt['eti'] ? ' - '.ITtoDT($evt['eti']) : '');
					$mayView = ($set['details4All'] == 1 or ($set['details4All'] == 2 and $usr['ID'] > 1) or $evt['mayE']);
					$click = ($evt['mayE'] ? 'editE' : 'showE')."({$evt['eid']},'{$date}')";
					$onClick = $mayView ? " class='point' onclick=\"{$click};\"" : " class='arrow'";
					$eStyle = colorStyle($evt); //get event colors
					$eStyle = $eStyle ? " style='{$eStyle}'" : '';
					echo $lastDate != $evtDate ? "<h5>{$evtDate}</h5>\n" : '';
					echo "<p>{$evtTime}</p>\n";
					echo "<p{$onClick}{$eStyle}>&nbsp;&nbsp;{$evt['tit']}</p><br>\n";
					$lastDate = $evtDate;
				}
			}
		}
	} else {
		echo $xx['none']."\n";
	}
	echo "</div>\n</div>\n";
}

if (!empty($_SERVER['HTTP_USER_AGENT']) and preg_match('/(iPhone|iPad|iPod)/i',$_SERVER['HTTP_USER_AGENT'])) { //iOS - mobile safari bug fix
	echo '<meta name="viewport" content="width=device-width, initial-scale=1">
';
}

//start of HTML header
$cssX = isset($_SESSION[$calID]['theme']) ? "-{$nowTS}" : ''; //?pv: force reload of styles
$version = LCV;
$cid = count($opt['cC']) == 1 ? $opt['cC'][0] : 0;
$options = (($dbSel and $usr['privs'] == 9) or $set['viewMenu'] or $set['groupMenu'] or $set['userMenu'] or $set['catMenu'] or $set['langMenu']) ? true : false; //menus
echo "<!DOCTYPE html>
<html lang=\"".ISOCODE."\">\n";
echo <<<TXT
<!--     ____   ______                                   _ __
  ____ _/ / /  / ____/ _____    ____     _____ ___ ___  (_) /___
 / __ `/ / /  /_/ __ \/ ___/  / __ `/   / ___/ __ `__ \/ / / __ \
/ /_/ / / /  / / /_/ / /     / /_/ /   (__  ) / / / / / / / /___/
\__,_/_/_/  /_/\____/_/      \__,_/   /____/_/ /_/ /_/_/_/\____/

-->
<head>
<meta charset="utf-8">
<title>{$set['calendarTitle']}</title>
<meta name="description" content="LuxCal web calendar - a LuxSoft product">
<meta name="application-name" content="LuxCal V{$version}">
<meta name="author" content="Roel Buining">
<meta name="robots" content="nofollow">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="canonical" href="{$set['calendarUrl']}">
<link rel="icon" type="image/x-icon" href="../favicon.ico">
<link rel="stylesheet" type="text/css" href="css/css.php?cal={$calID}&amp;v={$version}{$cssX}">
<script src='common/toolbox.js?v={$version}'></script>
<script>
var calID = "{$calID}", cid = {$cid}, mode = "{$mode}";
var tFormat = "{$set['timeFormat']}", dFormat = "{$set['dateFormat']}", wStart = {$set['weekStart']}, dwStartH = {$set['dwStartHour']}, dwEndH = {$set['dwEndHour']}, dwTimeSlot = {$set['dwTimeSlot']};
var dpToday = "{$xx['hdr_today']}", dpClear = "{$xx['hdr_clear']}", smlConfirm = "{$xx['vws_send_mail_to']}";
TXT;
echo "
var dpMonths = ['",implode("','",$months),"'];
var dpWkdays = ['",implode("','",$wkDays_m),"'];
cookie('LXCtkn_{$calID}:{$opt['cP']}','{$tkn}',30,'{$calPath}');\n";
if (strpos('~0fax',$hdrType)) {
	$limit = isset($set['maxXsWidth']) ? $set['maxXsWidth'] : 500;
	echo "if (winNar({$limit})) { location.reload(); }\n";
}
if (!empty($_POST)) { //internal hit
	echo "setTimeout(function() { alert(\"{$xx['alt_message#0']}\"); }, 1500000);\n"; //25 minutes
}
echo "</script>\n";
unset($version);

switch ($hdrType) { //header types - 0: no, f: full, a: admin, l: login, m: mobile, s: styling, e: event, h: help
	case '0': //no header (hdr=0)
		echo <<<TXT
</head>\n
<body>
<div class='contentN'>\n
TXT;
		if ($pageTitle) echo "<br><h2 class='pageTitle'>{$pageTitle}</h2>\n";
		break;
	case 'f': //calendar view pages
		headerRss();
		echo <<<TXT
<script async src="common/dtpicker.js"></script>
<script>window.onpageshow = function() {if (location != parent.location) showX('urlButton',false); initL(); }</script>
</head>\n
<body onload="scrollY({cP:{$opt['cP']},action:'goto'});" onunload="scrollY({cP:{$opt['cP']},action:'save'});">\n
TXT;
		topBar();
		if ($usr['privs'] > 0) { //view rights
			echo "<div class='navBar ".($set['logoPath'] ? 'lPadXL' : 'xPadXS')." noPrint'>\n";
			echo "<span class='floatR'>\n";
			addButton();
			srcButton();
			menButton();
			echo "</span>\n";
			echo "<span class='floatL'>\n";
			urlButton();
			optButton();
			viewButtons();
			dateForm();
			echo "</span>\n";
			nbCenter();
			echo "</div>\n";
			optMenu();
			usrMenu();
			sideMenu('~gen~adm~lst');
			if ($usr['privs'] >= 4) { toapList(); } //manager+ events to be approved list
			todoList(); //todo list
			upcoList(); //upcoming events list
			pdfDialog();
		} else { //display dummy navbar
			echo <<<TXT
<div class='navBar noPrint'>&nbsp;</div>\n
TXT;
		}
		echo "<div class='content'>\n";
		if ($pageTitle) echo "<br><h2 class='pageTitle'>{$pageTitle}</h2>\n";
		break;
	case 'a': //admin pages
		echo <<<TXT
<script async src="common/dtpicker.js"></script>
<script async src="common/jscolor.js"></script>
</head>\n
<body onload="scrollY({cP:{$opt['cP']},action:'goto'});" onunload="scrollY({cP:{$opt['cP']},action:'save'});">\n
TXT;
		topBar();
		echo "<div class='navBar ".($set['logoPath'] ? 'lPadXL' : 'xPadXS')." noPrint'>\n";
		echo "<span class='floatR'>\n";
		calButton();
		hlpButton($opt['cP']);
		menButton();
		echo "</span>\n";
		echo "<span class='floatL'>\n";
		optButton();
		echo "<span class='pTitleAdm'>{$pageTitle}</span>\n";
		echo "</span>\n";
		nbCenter();
		echo "</div>\n";
		optMenu();
		usrMenu();
		sideMenu('~adm');
		echo "<div class='content'>\n<br>\n";
		break;
	case 's': //styling window
		echo <<<TXT
<script async src="common/jscolor.js"></script>
</head>\n
<body>\n
TXT;
		echo "<div class='barTop floatC noPrint'>
<span class='floatL'>{$pageTitle}</span>
<span class='floatR'>\n";
		prtButton();
		hlpButton($opt['cP']);
		echo "</span>
{$set['calendarTitle']}
</div>\n";
		echo "<div class='content'>\n";
		break;
	case 'l': //log in page
		echo <<<TXT
</head>\n
<body>\n
TXT;
		topBar();
		echo "<div class='navBar ".($set['logoPath'] ? 'lPadXL' : 'xPadXS')."'>\n";
		echo "<span class='floatR'>\n";
		calButton();
		hlpButton($opt['cP']);
		menButton();
		echo "</span>\n";
		echo "<span class='pTitleAdm'>{$pageTitle}</span>\n";
		echo "</div>\n";
		usrMenu();
		sideMenu('~');
		echo "<div class='content'>\n<br>\n";
		break;
	case 'x': //calendar pages - xs display/window
		echo <<<TXT
<script async src="common/dtpicker.js"></script>
</head>\n
<body>\n
TXT;
		topBar();
		if ($usr['privs'] > 0) { //view rights
			echo "<div class='navBar noPrint'>\n";
			echo "<span class='floatR'>\n";
			addButton();
			srcButton();
			menButton();
			echo "</span>\n";
			urlButton();
			optButton();
			viewButtons();
			dateForm();
			echo "</div>\n";
			optMenu();
			usrMenu();
			sideMenu('~gen~adm');
			pdfDialog();
		} else { //display dummy navbar
			echo <<<TXT
<div class='navBar noPrint'>&nbsp;</div>\n
TXT;
		}
		echo "<div class='content'>\n";
		if ($pageTitle) echo "<br><h2 class='pageTitle'>{$pageTitle}</h2>\n";
		break;
	case 'e': //event window
		echo <<<TXT
<script async src="common/dtpicker.js"></script>
<script>
window.onload = function() {winFit();}
window.onkeyup = function (event) {if (event.keyCode==27) {window.close();}}
</script>
</head>\n
<body>\n
TXT;
		echo "<div class='barTop noPrint'>\n";
		echo "<span class='floatR'>\n";
		prtButton();
		hlpButton($opt['cP']);
		echo "</span>\n";
		$eMode = empty($mode) ? '' : ($mode[0] == 'a' ?  "- {$xx['evt_add']}" : "- {$xx['evt_edit']}");
		echo "{$pageTitle}{$eMode}\n";
		echo "</div>\n";
		echo "<div class='contentE'>\n";
		break;
	case 'h': //help window
		echo <<<TXT
</head>\n
<body>
<div class='barTop'>
<span class='floatR select' onclick="self.close();">&nbsp;&#10060;&nbsp;</span>&nbsp;
{$pageTitle}
</div>
<div class='contentH scroll'>\n
TXT;
}
unset($hdrType);
?>
