<?php
/*
= month view of events =

This file is part of the LuxCal Web Calendar.
Copyright 2009-2020 LuxSoft - www.LuxSoft.eu
License https://www.gnu.org/licenses/gpl.html GPL version 3

The LuxCal Web Calendar is distributed WITHOUT ANY WARRANTY.
*/

function showEvents($date) {
	global $xx, $evtList, $usr, $set, $eDetails, $rxIMGTags;

	foreach ($evtList[$date] as $evt) {
		$chBox = $evt['cbx'] ? checkBox($evt,$date) : '';
		$popAttr = makePopAttrib($evt,$date,$set['showImgInMV']);
		$eStyle = colorStyle($evt); //get event colors
		$eStyle = $eStyle ? " style=\"{$eStyle}\"" : '';
		$toAppr = ($evt['app'] and !$evt['apd']) ? ' toAppr' : '';
		$click = ($evt['mayE'] ? 'editE' : 'showE')."({$evt['eid']},'{$date}')";
		$onClick = ($eDetails or $evt['mayE']) ? "class='evtTitle point' onclick=\"{$click}; event.stopPropagation();\"" : "class='evtTitle arrow'";
		$title = $evt['mayE'] ? $xx['vws_edit_event'] : ($eDetails ? $xx['vws_see_event'] : '');
		$event = makeHead($evt,$set['evtHeadM'],$date);
		echo "<div class='event{$toAppr}'{$eStyle}>{$chBox}\n";
		echo "<span {$onClick}{$popAttr} title=\"{$title}\">{$event}</span>\n";
		if ($set['showImgInMV']) {
			$xfText = ($usr['privs'] >= $set['xField1Rights'] ? $evt['xf1'] : '').($usr['privs'] >= $set['xField2Rights'] ? $evt['xf2'] : '');
			if (preg_match_all($rxIMGTags,$evt['des'].$xfText,$imgs, PREG_SET_ORDER)) {
				foreach ($imgs as $img) { echo $img[0]; }
			}
		}
		echo "</div>\n";
	}
}

function showMiniCal($tslotD) {
	global $mode, $set, $xx, $wkDays, $wkDays_s, $evtList;
	
	//compute dates
	$offM = isset($_GET['oM']) ? $_GET['oM'] : 0; //offset Month
	$timeD1 = mktime(12,0,0,date('n',$tslotD)+$offM,1,date('Y',$tslotD)); //time 1st day
	$dateD1 = date("Y-m-d", $timeD1); //date 1st day
	$curM = date("n",$timeD1);
	$curY = date("Y",$timeD1);
	$sOffset = ($set['weekStart']) ? date("N", $timeD1) - 1 : date("w", $timeD1); //offset first day
	$eOffset = date("t", $timeD1) + $sOffset; //offset last day
	$daysToShow = ($eOffset == 28) ? 28 : (($eOffset > 35) ? 42 : 35); //4, 5 or 6 weeks
	$sDate = date("Y-m-d", $timeD1 - ($sOffset * 86400)); //start date in 1st week
	$eDate = date("Y-m-d", $timeD1 + ($daysToShow - $sOffset - 1) * 86400); //end date in last week
	retrieve($sDate,$eDate,'guc'); //retrieve events

	/* display header */
	$arrowL = "<a class='arrowLink' href='".htmlentities($_SERVER['PHP_SELF']).'?oM='.($offM-1)."' title='{$xx['vws_prev_month']}'>&#9664;</a>\n";
	$arrowR = "<a class='arrowLink' href='".htmlentities($_SERVER['PHP_SELF']).'?oM='.($offM+1)."' title='{$xx['vws_next_month']}'>&#9654;</a>\n";
	echo "<h6 class='floatC'>{$arrowL}".makeD($dateD1,3)."{$arrowR}</h6>\n";

	/* display month */
	$days = ($mode == 'wm') ? $set['workWeekDays'] : '1234567'; //set days to show
	$cWidth = round(98 / strlen($days),1).'%';
	echo "<table class='grid'>
<col span='".strlen($days)."' class='dCol' style='width:{$cWidth}'>
<tr>\n";
	for ($i = 0; $i < 7; $i++) {
		$cTime = mktime(12,0,0,$curM,$i-$sOffset+1,$curY ); //current time
		if (strpos($days,date("N",$cTime)) !== false) { echo "<th>{$wkDays_s[$set['weekStart'] + $i]}</th>"; } //week days
	}
	echo "</tr>\n";
	for ($i = 0; $i < $daysToShow; $i++) {
		$cTime = mktime(12,0,0,$curM,$i-$sOffset+1,$curY ); //current time
		$cDate = date("Y-m-d", $cTime);
		if ($i%7 == 0) { //new week
			echo "<tr class='yearWeek'>\n";
		}
		$dayNr = date("N", $cTime);
		if (strpos($days,$dayNr) !== false) {
			$dow = ($i < $sOffset or $i >= $eOffset) ? 'out' : (($dayNr > 5) ? 'we0' : 'wd0');
			if ($cDate == date("Y-m-d")) { $dow .= ' today'; }
			$day = ltrim(substr($cDate, 8, 2),"0");
			echo "<td class='{$dow}'>\n<div class='dom'>{$day}</div>\n";
			if (!empty($evtList[$cDate])) {
				foreach ($evtList[$cDate] as $evt) { //show events for this date
					$popAttr = makePopAttrib($evt,$cDate);
					$bgColor = $evt['cbg'] ? " style=\"background-color:{$evt['cbg']};\"" : '';
					$class = $evt['sym'] ? ' symbol' : ' square';
					echo "<span class='arrow {$class}'{$bgColor}{$popAttr}>{$evt['sym']}</span>\n";
				}
			}
			echo "</td>\n";
		}
		if ($i%7 == 6) { echo "</tr>\n"; } //if last day of week, wrap to left
	}
	echo "<tr>\n<th class='smallHt' colspan='7'>";
	if ($offM != 0) { echo "<a class='floatC' href='".htmlentities($_SERVER['PHP_SELF'])."?oM=0' title=\"{$xx['vws_back_to_main_cal']}\">{$xx['back']}</a>"; }
	echo "</th>\n</tr>\n</table>\n";
}

/*===  main program ===*/
//sanity check
if (empty($lcV)) { exit('not permitted ('.substr(basename(__FILE__),0,-4).')'); } //launch via script only

//initialize
$evtList = array(); //init
$cYear = intval(substr($opt['cD'],0,4));
$cMonth = intval(substr($opt['cD'],5,2));
$cDay = intval(substr($opt['cD'],8,2));
if ($set['MvWeeksToShow'] < 2) { //single month
	$tcDate = strtotime($opt['cD'].' 12:00:00'); //Unix time of cD
	$tfDay = mktime(12,0,0,$cMonth,1, $cYear); //Unix time of 1st day of the month
	$prevDate = date("Y-m-d",mktime(12,0,0,$cMonth-1,1,$cYear)); //1st of prev. month
	$nextDate = date("Y-m-d",mktime(12,0,0,$cMonth+1,1,$cYear)); //1st of next month

	//determine total number of days to show, start date, end date
	$sOffset = date("N",$tfDay) - $set['weekStart']; //offset first day (ISO)
	$eOffset = date("t",$tfDay) + $sOffset; //offset last day
	$totDays = ($eOffset == 28) ? 28 : (($eOffset > 35) ? 42 : 35); //4, 5 or 6 weeks

	$st = $tfDay - $sOffset * 86400; //start time
	$et = $st + ($totDays - 1) * 86400; //end time
	$sDate = date("Y-m-d",$st);
	$eDate = date("Y-m-d",$et);
	$header = '<span class="viewHdr">'.makeD($opt['cD'],3).'</span>';
} else {
	$tcDate = mktime(12,0,0,$cMonth,$cDay,$cYear); //Unix time of cD
	$jumpWeeks = $set['MvWeeksToShow'] - intval($set['MvWeeksToShow']*0.5) + 1;
	$prevDate = date("Y-m-d",$tcDate - $jumpWeeks * 604800);
	$nextDate = date("Y-m-d",$tcDate + $jumpWeeks * 604800);

	//determine total number of days to show, start date, end date
	$totDays = $set['MvWeeksToShow'] * 7; //number of weeks to show
	$sOffset = (date("w",$tcDate) - $set['weekStart'] + 7) % 7; //offset first day
	$st = $tcDate - ($sOffset + 7) * 86400; //start time (1 past week)
	$et = $st + ($totDays - 1) * 86400; //end time
	$sDate = date("Y-m-d",$st);
	$eDate = date("Y-m-d",$et);
	$header = '<span'.($winXS ? '' : ' class="viewHdr"').'>'.makeD($sDate,3).' - '.makeD($eDate,3).'</span>';
}
if (($set['spMiniCal'] or $set['spImages'] or $set['spInfoArea']) and !$winXS) { //show side panel
	echo "<div class='sPanel'>\n";
	if ($set['spMiniCal']) {
		echo "<div class='spCal'>\n";
		showMiniCal($tcDate); //this month
		echo "</div>\n";
	}
	if ($set['spImages']) {
		$files = scandir('sidepanel'); //get files from sidepanel folder
		foreach($files as $fName) {
			if (strlen($fName) > 5 and substr($fName,0,2) == date('m',$tcDate) and stripos('~.jpg.gif.png',substr($fName,-4)) ) {
				echo "<div class='spImg'>\n<img class='spImage' src='sidepanel/{$fName}' alt='decoration'>\n</div>\n";
				break;
			}
		}
	}
	if ($set['spInfoArea'] and is_file('sidepanel/info.txt')) {
		$info = file_get_contents('sidepanel/info.txt');
		if (preg_match_all('%~(?:(0?[1-9]|1[0-2])(?:\s*-\s*(0?[1-9]|1[0-2]))?)~([^~]+)%',$info,$matches,PREG_SET_ORDER)) {
			$spInfo = '';
			$cD = date('n',$tcDate); //month number
			foreach($matches as $match) {
				if ($cD == ltrim($match[1],'0') or ($match[2] and ($cD >= ltrim($match[1],'0') and $cD <= ltrim($match[2],'0')))) {
					$spInfo .= trim($match[3]).'<br><br>';
				}
			}
			if ($spInfo) {
				echo "<div class='spMsg'>\n".substr($spInfo,0,-8)."\n</div>\n";
			}
		}
	}
	echo "</div>\n";
	echo "<div class='container'>\n";
}
//display header
$dateHdr = !$cH ? $header : "<a href=\"javascript:index({cP:'up'});\">{$header}</a>";
$arrowL = "<a class='noPrint arrowLink' href=\"javascript:index({cD:'{$prevDate}'})\">&#9664;</a>";
$arrowR = "<a class='noPrint arrowLink' href=\"javascript:index({cD:'{$nextDate}'})\">&#9654;</a>";
echo "<h5 class='floatC'>{$arrowL}{$dateHdr}{$arrowR}</h5>\n";
//display days
$days = ($mode == 'fm') ? '0123456' : $set['workWeekDays']; //days to show
$cWidth = round(98 / strlen($days),1).'%';

//display day headers
echo '<div'.($winXS ? '' : ' class="scrollBoxHead"').">\n";
echo "<table class='grid'>\n";
if ($set['weekNumber']) { echo '<col class="wkCol">'; } //add week # column
echo '<col span="'.strlen($days).'" class="dCol" style="width:'.$cWidth.'">'."\n";
echo "<tr>";
if ($set['weekNumber']) { echo "<th>{$xx['vws_wk']}</th>"; } //week # hdr
for ($i = 0; $i < 7; $i++) {
	$cTime = $st + $i * 86400; //current time
	if (strpos($days,date("w",$cTime)) !== false) { echo "<th>{$wkDays[($set['weekStart'] + $i) % 7]}</th>"; } //week days
}
echo "</tr>\n</table>\n</div>\n";

//display calendar
echo '<div'.($winXS ? '' : " class='scrollBox sBoxMo' id='sBox'").">\n";
echo "<table class='grid'>\n";
if ($set['weekNumber']) { echo '<col class="wkCol">'; } //add week # column
echo "<col span='".strlen($days)."' class='dCol' style=\"width:{$cWidth}\">\n";

//retrieve events
retrieve($sDate,$eDate,'guc');

//build grid
for ($i = 0; $i < $totDays; $i++) {
	$cTime = $st + $i * 86400; //current time
	$cDate = date("Y-m-d",$cTime); //current date
	$curM = ltrim(substr($cDate, 5, 2),"0");
	$curD = ltrim(substr($cDate, 8, 2),"0");
	if ($i%7 == 0) { //new week
		echo '<tr class="monthWeek">';
		if ($set['weekNumber']) { //display week nr
			$weekX = $mode = 'fm' ? 4 : 5;
			echo !$cH ? "<td class='wnr'>" : "<td class='wnr hyper' onclick=\"index({cP:{$weekX},cD:'{$cDate}'});\" title=\"{$xx['vws_view_week']}\">";
			echo date("W",$cTime + 86400)."</td>\n";
		}
	}
	$dayNr = date("w",$cTime);
	if (strpos($days,$dayNr) !== false) {
		$dayBg = '';
		$curSeq = 0;
		if (!empty($evtList[$cDate])) {
			foreach ($evtList[$cDate] as $evt) { //check if day background should be set
				if (($evt['dbg'] & 2) and $evt['seq'] > $curSeq) {
					$dayBg = " style='background:{$evt['cbg']}'";
					$curSeq = $evt['seq'];
				}
			}
		}
		if ($set['MvWeeksToShow'] < 2) { //single month
			$dow = ($i < $sOffset or $i >= $eOffset) ? 'out' : ((strpos($set['workWeekDays'],$dayNr) === false) ? 'we0' : 'wd0');
		} else {
			$dow = ((strpos($set['workWeekDays'],$dayNr) === false) ? 'we' : 'wd').strval($curM%2); //alternate color per month
		}
		$day = $curD.$curM == "11" ? makeD($cDate,2) : (($i == 0 or $curD == "1") ? makeD($cDate,1) : ($set['monthInDCell'] ? makeD($cDate,1,'x3') : $curD));
		$class = ($curD == "1" or $curD.$curM == "11") ? 'dom1' : 'dom';
		if (!$cH) {
			$day = "<span class='{$class} floatR'>{$day}</span>";
		} else{
			$day = "<span class='{$class} floatR hyper' onclick=\"index({cP:6,cD:'{$cDate}'}); event.stopPropagation();\" title=\"{$xx['vws_view_day']}\">{$day}</span>";
		}
		if ($cDate == $today) {
			$dow .= ' today';
		} elseif ($cDate == $opt['nD']) {
			$dow .= ' slday';
		}
		$cid = (count($opt['cC']) == 1 and $opt['cC'][0] != 0) ? $opt['cC'][0] : 0;
		if ($set['MvWeeksToShow'] > 0 or ($i >= $sOffset and $i < $eOffset)) { //no single month or day inside
			$addNew = '';
			if ($usr['privs'] > 1) {
				$dow .= ' hyper';
				$addNew = " onclick=\"newE('{$cDate}',{$cid});\" title=\"{$xx['vws_add_event']}\"";
			}
			echo "<td class='{$dow}'{$dayBg}{$addNew}>{$day}<div>&nbsp;</div>\n";
			if (!empty($evtList[$cDate])) { showEvents($cDate); }
		} else { //one month and day outside
			echo "<td class='blank'>\n";
		}
		echo "</td>\n";
	}
	if ($i%7 == 6) { echo "</tr>\n"; } //if last day of week, wrap to left
}
echo "</table>\n</div>\n";
if (($set['spMiniCal'] or $set['spImages'] or $set['spInfoArea']) and !$winXS) { //show side panel
	echo "</div>\n";
}
?>
