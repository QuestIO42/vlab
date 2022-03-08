<?php
/*
= LuxCal RSS feeder =

This file is part of the LuxCal Web Calendar.
Copyright 2009-2020 LuxSoft - www.LuxSoft.eu
License https://www.gnu.org/licenses/gpl.html GPL version 3

The LuxCal Web Calendar is distributed WITHOUT ANY WARRANTY.
*/
header("Content-Type: application/rss+xml; charset=utf-8");

//load toolbox
require './common/toolbox.php';
require './common/toolboxd.php'; //database tools

//load config data
require './lcconfig.php';

//get calendar
$calID = (!empty($_GET['cal']) and preg_match('~^\w{1,20}$~',$_GET['cal'])) ? $_GET['cal'] : $dbDef;

//connect to database
$dbH = dbConnect($calID);

//get settings from database
$set = getSettings();

//set time zone
date_default_timezone_set($set['timeZone']);

//get common functions
require './common/retrieve.php';

//set language
require './lang/ui-'.strtolower($set['language']).'.php';

//init
$sDate = date("Y-m-d");
$eDate = date("Y-m-d", time() + (($set['lookaheadDays']-1) * 86400));
$qMark = strpos($set['calendarUrl'],'?');
$parSep = $qMark !== false ? '&amp;' : '?'; //? or &amp;
$feedsSelf = calRootUrl().'rssfeed.php'.($qMark !== false ? substr($set['calendarUrl'],$qMark) : '');

//set user parameters
$usr['vCats'] = '0'; //view: all categories
$usr['eCats'] = ''; //edit: no categories

//set filter
$filter = '';
if (isset($_GET['cG'])) {
	$filter .= " AND g.`ID` IN (".implode(",",$_GET['cG']).")";
}
if (isset($_GET['cU'])) {
	$filter .= " AND u.`ID` IN (".implode(",",$_GET['cU']).")";
}
if (isset($_GET['cC'])) {
	$filter .= " AND c.`ID` IN (".implode(",",$_GET['cC']).")";
}
$filter = substr($filter,5);

//feed header
echo "<?xml version=\"1.0\" encoding=\"utf-8\" ?>
<rss version=\"2.0\" xmlns:atom=\"http://www.w3.org/2005/Atom\">
<channel>
	<title>{$set['calendarTitle']} - RSS feed</title>
	<link>{$set['calendarUrl']}</link>
	<description>{$xx['vws_events_for_next']} {$set['lookaheadDays']} {$xx['vws_days']}</description>
	<language>en-us</language>
	<category>Calendar events</category>
	<pubDate>".date("r")."</pubDate>
	<generator>LuxCal Web calendar</generator>
	<atom:link href=\"{$feedsSelf}\" rel=\"self\" type=\"application/rss+xml\" />\n";

//set user parameters
$usr['vCats'] = '0'; //view: all categories
$usr['eCats'] = ''; //edit: no categories

$evtList = array();
retrieve($sDate,$eDate,'',$filter);

//process events and send feeds
$evtDone = array();
if ($evtList) {
	foreach($evtList as $date => &$events) {
		foreach ($events as &$evt) {
			if (!$evt['mde'] or !in_array($evt['eid'],$evtDone)) { //!mde or mde not processed
				$evtDone[] = $evt['eid'];
				$checkBx = (strpos($evt['chd'],$date) ? $evt['cmk'] : '');
				$evtDate = $evt['mde'] ? makeD($evt['sda'],5).' - '.makeD($evt['eda'],5) : makeD($date,5);
				$evtTime = $evt['ald'] ? $xx['vws_all_day'] : ITtoDT($evt['sti']).($evt['eti'] ? ' - '.ITtoDT($evt['eti']) : '');
				$feed = "\n<item>\n";
				$feed .= "<title>{$evtDate}: {$checkBx}".htmlentities($evt['tit'])."</title>\n";
				$feed .= "<link>{$set['calendarUrl']}{$parSep}cD={$date}</link>\n";
				$feed .= "<description>\n<![CDATA[\n";
				$feed .= "{$evtTime}\n";
				if ($set['details4All'] == 1) {
					$fields = '123'.($set['xField1Rights'] == 1 ? '4' : '').($set['xField2Rights'] == 1 ? '5' : ''); //exclude xField 1
					$feed .= '<br>'.makeE($evt,$set['evtTemplGen'],'br',"<br>\n",$fields);
				}
				$feed .= "]]>\n</description>\n";
				$feed .= "<guid isPermaLink='false'>{$set['calendarUrl']}{$parSep}evt={$evt['eid']}&amp;{$date}</guid>\n";
				$feed .= "</item>\n";
				echo $feed;
			}
		}
	}
} else { //no events due
	echo "\n<item>
		<description>\n{$xx['vws_none_due_in']} {$set['lookaheadDays']} {$xx['vws_days']}\n</description>
		<guid isPermaLink='false'>{$set['calendarUrl']}</guid>
		</item>\n";
}
//feed trailer
echo "\n</channel>\n</rss>";
?>