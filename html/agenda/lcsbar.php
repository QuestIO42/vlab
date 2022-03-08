<?php
/*
= LuxCal stand-alone sidebar - upcoming events =

This file is part of the LuxCal Web Calendar.
Copyright 2009-2020 LuxSoft - www.LuxSoft.eu
License https://www.gnu.org/licenses/gpl.html GPL version 3


used settings:
 database credentials
 timeZone
 language
 sideBarDays
 popFieldsSbar
 xField1Rights
 xField2Rights
 showLinkInSB
*/

//display todo list function
if (!function_exists('displayTD')) {
function displayTD(&$evtList) {
	global $evtList, $set, $xx, $sbCalUrl, $rxULink;

	foreach($evtList as $date => &$events) {
		echo "<div class='ssb_date'>".makeD($date,5)."</div>\n";
		foreach ($events as $evt) {
			$evtTime = ($evt['ald'] ? $xx['vws_all_day'] : ITtoDT($evt['sti'])).($evt['eti'] ? ' - '.ITtoDT($evt['eti']) : '');
			if ($set['popFieldsSbar']) {
				$fields = '123678'.($set['xField1Rights'] == 1 ? '4' : '').($set['xField2Rights'] == 1 ? '5' : ''); //exclude xFields
				$popText = makeE($evt,$set['popFieldsSbar'],'br',"<br>",$fields);
				$popText = htmlspecialchars(addslashes($popText));
				$popClass = ($evt['mde'] or $evt['r_t']) ? 'ssb_repeat' : 'ssb_normal';
				$popAttr = " onmouseover=\"pop(this,'{$popText}','{$popClass}',50)\"";
			} else {
				$popAttr = '';
			}
		$eStyle = colorStyle($evt); //get event colors
		$eStyle = $eStyle ? " style=\"{$eStyle}\"" : '';
			if (empty($sbCalUrl)) {
				$eTitle = $evt['tit'];
			} else {
				$jumpD = (strpos($sbCalUrl,'?') ? '&amp;' : '?')."cD={$evt['sda']}";
				$eTitle = "<a href='{$sbCalUrl}{$jumpD}' target='fullcal'>{$evt['tit']}</a>";
			}
			$chBox = '';
			if ($evt['cbx']) {
				$chBox .= strpos($evt['chd'], $date) ? $evt['cmk'] : '&#x2610;';
				$calDir = trim(substr(__DIR__, strlen($_SERVER['DOCUMENT_ROOT'])),'\\/').'/';
				$cBoxAtt = $set['details4All'] == 1 ? "class='ssb_chkBox ssb_floatL ssb_point' onclick=\"checkE(this,{$evt['eid']},'{$date}',0);\"" : "class='ssb_chkBox ssb_floatL ssb_arrow'";
				$chBox = "<span title='{$evt['clb']}' {$cBoxAtt}>{$chBox}</span>";
			}
			echo "<div class='ssb_event'>
				<div class='ssb_evtTime'>{$evtTime}</div>\n{$chBox}\n<div class='ssb_evtTitle'{$eStyle}{$popAttr}>{$eTitle}</div>
				</div>\n";
		}
	}
}
}

//display upcoming events function
if (!function_exists('displayUE')) {
function displayUE(&$evtList) {
	global $evtList, $set, $xx, $sbRec1x, $sbMaxNbr, $sbCalUrl, $rxULink;
	
	$evtDone = array();
	$lastDate = '';
	foreach($evtList as $date => &$events) {
		foreach ($events as $evt) {
			if (($evt['mde'] or ($evt['r_t'] and $sbRec1x)) and in_array($evt['eid'],$evtDone)) { continue; } //mde or recurring event already processed
			$evtDone[] = $evt['eid'];
			$evtDate = $evt['mde'] ? makeD($evt['sda'],5)." - ".makeD($evt['eda'],5) : makeD($date,5);
			$evtTime = $evt['ald'] ? $xx['vws_all_day'] : ITtoDT($evt['sti']).($evt['eti'] ? ' - '.ITtoDT($evt['eti']) : '');
			if ($set['popFieldsSbar']) {
				$fields = '1238'.($set['xField1Rights'] == 1 ? '4' : '').($set['xField2Rights'] == 1 ? '5' : ''); //exclude xField 1
				$popText = makeE($evt,$set['popFieldsSbar'],'br',"<br>",$fields);
				$popText = htmlspecialchars(addslashes($popText));
				$popClass = ($evt['mde'] or $evt['r_t']) ? 'ssb_repeat' : 'ssb_normal';
				$popAttr = " onmouseover=\"pop(this,'{$popText}','{$popClass}',50)\"";
			} else {
				$popAttr = '';
			}
			$eStyle = colorStyle($evt); //get event colors
			$eStyle = $eStyle ? " style='{$eStyle}'" : '';
			if (empty($sbCalUrl)) {
				$eTitle = $evt['tit'];
			} else {
				$jumpD = (strpos($sbCalUrl,'?') ? '&amp;' : '?')."cD={$evt['sda']}";
				$eTitle = "<a href='{$sbCalUrl}{$jumpD}' target='luxcal'>{$evt['tit']}</a>";
			}
			if ($lastDate != $evtDate) {
				echo "<div class='ssb_date'>{$evtDate}</div>\n";
				$lastDate = $evtDate;
			}
			echo "<div class='ssb_event ssb_arrow'>
				<div class='ssb_evtTime'>{$evtTime}</div>\n<div class='ssb_evtTitle'{$eStyle}{$popAttr}>{$eTitle}</div>
				</div>\n";
			if ($set['showLinkInSB'] and preg_match_all($rxULink,$evt['des'], $urls, PREG_SET_ORDER)) { //display URL links
				echo "<div class='ssb_evtUrl'{$eStyle}>";
				foreach ($urls as $url) { echo "{$url[0]}<br>"; }
				echo "</div>\n";
			}
			if (--$sbMaxNbr < 1) { break 2; }
		}
	}
}
}

//save and set cwd
$cwd = getcwd();
chdir(__DIR__);

//get config data
if (file_exists('./lcconfig.php')) {
	require './lcconfig.php';
} else {
	exit('No config data!');
}

require_once './common/toolbox.php'; //load tools
require_once './common/toolboxd.php'; //database tools

$calID = !empty($sbCal) ? $sbCal : $dbDef; //select calendar

$dbH = dbConnect($calID); //connect to database

if (!isset($set)) { $set = getSettings(); } //get settings from db

date_default_timezone_set($set['timeZone']); //set time zone

require_once './lang/ui-'.strtolower($set['language']).'.php'; //set language

require_once './common/retrieve.php';//get retrieve function

//process external params
if (empty($sbContent)) { $sbContent = 'upco'; }
if (empty($sbClass)) { $sbClass = 'sideBar'; }
if (empty($sbHeader)) { $sbHeader = $xx['ssb_upco_events']; }
if (empty($sbMaxNbr)) { $sbMaxNbr = 1000; }
if (empty($sbRec1x)) { $sbRec1x = 0; }
$usr['vCats'] = $usr['eCats'] = (empty($sbCats) ? '0' : $sbCats); //categories to show
$sbFilter = ($sbContent == 'todo') ? ' AND c.`checkBx` = 1' : '';
if (!empty($sbGroups)) { $sbFilter .= " AND g.`ID` IN ({$sbGroups})"; }
if (!empty($sbUsersIn)) {
	$sbFilter .= " AND e.`userID` IN ({$sbUsersIn})";
} elseif (!empty($sbUsersEx)) {
	$sbFilter .= " AND e.`userID` NOT IN ({$sbUsersEx})";
}
if ($sbFilter) { $sbFilter = substr($sbFilter,5); }

$sbsTime = time();
if (!empty($sbWeekDay) and $sbWeekDay >= 0 and $sbWeekDay < 7) { //show event on the specified weekday
	$sbTodayWD = date('w', $sbsTime); //weekday (0: Su - 6: Sa)
	$sbsTime = $sbsTime + ((($sbWeekDay-$sbTodayWD+7)%7) * 86400);
	$sbUpDays = 1;
} else {
	$sbUpDays = empty($sbUpDays) ? $set['sideBarDays'] : intval($sbUpDays);
}
$sbsDate = $sbContent == 'todo' ? date("Y-m-d",$sbsTime - (30 * 86400)) : date("Y-m-d",$sbsTime); // if ToDo start 30 days back
$sbeDate = date("Y-m-d",$sbsTime + (($sbUpDays-1) * 86400));

//display sidebar
echo "
<div class='{$sbClass}'>
<div class='ssb_header'>{$sbHeader}</div>
<div class='ssb_scrollList'>
";

retrieve($sbsDate,$sbeDate,'',$sbFilter);

if ($evtList) { //display upcoming events
	if ($sbContent == 'todo') {
		displayTD($evtList);
	} else {
		displayUE($evtList);
	}
} else {
	echo $xx['ssb_none']."\n";
}
echo "<br>\n</div>\n</div>\n";

foreach (array_keys($GLOBALS) as $k) { if (substr($k,0,2) == 'sb') unset($$k); } //unset ext params
unset($k);
chdir($cwd); //restore cwd
?>