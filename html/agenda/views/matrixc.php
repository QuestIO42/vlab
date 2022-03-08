<?php
/*
= categories matrix view of events =

This file is part of the LuxCal Web Calendar.
Copyright 2009-2020 LuxSoft - www.LuxSoft.eu
License https://www.gnu.org/licenses/gpl.html GPL version 3

The LuxCal Web Calendar is distributed WITHOUT ANY WARRANTY.
*/

function showEvents($date,$cSeq) {
	global $xx, $evtList, $set, $eDetails;

	foreach ($evtList[$date] as $evt) {
		if ($evt['seq'] != $cSeq) { continue; }
		$popAttr = makePopAttrib($evt,$date);
		$bgColor = $set['eventColor'] == 1 ? $evt['cbg'] : ($set['eventColor'] == 2 ? $evt['uco'] : '#FFFFFF');
		$style = " style='background-color:{$bgColor};'";
		$class = $evt['sym'] ? 'symbol' : 'square';
		$click = ($evt['mayE'] ? 'editE' : 'showE')."({$evt['eid']},'{$date}')";
		$onClick = ($eDetails or $evt['mayE']) ? "class='{$class} point'{$style} onclick=\"{$click}; event.stopPropagation();\"" : "class='{$class} arrow'{$style}";
		$title = $evt['mayE'] ? $xx['vws_edit_event'] : ($eDetails ? $xx['vws_see_event'] : '');
		echo "<div {$onClick}{$popAttr} title=\"{$title}\">{$evt['sym']}</div>\n";
	}
}

//sanity check
if (empty($lcV)) { exit('not permitted ('.substr(basename(__FILE__),0,-4).')'); } //launch via script only

//initialize
$evtList = array();
$daysToShow = $set['XvWeeksToShow'] * 7;
$uxTime = strtotime($opt['cD'].' 12:00:00'); //Unix time of cD
$dayNr = date('w',$uxTime); //0:Su - 6:Sa

//set the start and end date of the calendar period to show
$sTime = $uxTime - ((($dayNr - $set['weekStart'] + 7 ) % 7) * 86400); //calendar start time
$sDate = date('Y-m-d',$sTime); //cal start date
$eDate = date('Y-m-d',$sTime + (($daysToShow - 1) * 86400)); //cal end date

$prevDate = date("Y-m-d",$sTime - (($daysToShow - 7) * 86400));
$nextDate = date("Y-m-d",$sTime + (($daysToShow - 7) * 86400));

//get categories

$filter = ''; //category filter
if (count($opt['cC']) > 0 and $opt['cC'][0] != 0) {
	$filter .= "`sequence` IN (".implode(",",$opt['cC']).") AND ";
}
$filter .= $usr['vCats'] != '0' ? "`ID` IN ({$usr['vCats']}) AND " : '';

$stH = dbQuery("SELECT `ID`,`name`,`sequence`,`color`,`bgColor`,`urlLink`
	FROM `categories`
	WHERE {$filter}`status` >= 0
	ORDER BY `sequence`");
$cats = $stH->fetchAll(PDO::FETCH_ASSOC); //2-dim array

//retrieve events
retrieve($sDate,$eDate,'guc');

//display header
$dateHdr = '<span'.($winXS ? '' : ' class="viewHdr"').'>'.makeD($sDate,3)." - ".makeD($eDate,3).'</span>';
$arrowL = "<a class='noPrint arrowLink' href=\"javascript:index({cD:'{$prevDate}'})\">&#9664;</a>";
$arrowR = "<a class='noPrint arrowLink' href=\"javascript:index({cD:'{$nextDate}'})\">&#9654;</a>";
echo "<div class='calHeadMx'>\n<h5>{$arrowL}{$dateHdr}{$arrowR}</h5>\n</div>";

//display matrix - categories
echo '<div'.($winXS ? '' : " class='scrollBox sBoxMx' id='sBox'").">\n";
echo "<div class='rowBoxMx'>\n";
echo "<table class='matrix'>\n";
echo "<tr><th class='borderR'>\n";
if (strpos($avViews,'10') !== false) {
	echo"<form method='post' action=\"javascript:index({cP:10});\">
<button type='submit' name='back' value='y'>{$xx['vws_cal_users']}</button>
</form>\n";
}
echo"</th>\n</tr>\n";
if ($set['weekNumber']) {
	echo "<tr><th class='borderR'></th></tr>\n";
}
echo "<tr><th class='borderR'>{$xx['vws_evt_cats']}</th></tr>\n";
foreach($cats as $cat) {
	$link = '';
	if ($cat['urlLink']) {
		preg_match('~(.+)\s*\[(.*)\]~',$cat['urlLink'],$matches);
		if (count($matches) == 3) {
			if (substr($matches[1],0,4) != 'http') { $matches[1] = 'http://'.$matches[1]; }
			$link = "<br><a href='{$matches[1]}' target='_blank'>{$matches[2]}</a>";
		}
	}
	$style = ($cat['color'] ? "color:{$cat['color']};" : '').($cat['bgColor'] ? "background-color:{$cat['bgColor']};" : '');
	$style = $style ? " style='{$style}'" : '';
	echo "<tr>\n<td class='rowLeft'{$style}>{$cat['sequence']} - {$cat['name']}{$link}</td>\n</tr>\n";
}
echo "</table>\n</div>\n";

//display matrix - calendar days
//calendar
echo "<div id='matrix' class='calBoxMx'>\n";
echo "<table class='matrix'>\n";
echo "<col span='{$daysToShow}'>\n";
//calendar months
echo "<tr>\n";
$cTime = $sTime;
for($i = 0; $i < $daysToShow; $i++) {
	$dx = date('j',$cTime); //day of month (1 - 31)
	$dxNext = date('j',$cTime+86400);
	$mx = date('n',$cTime); //month (1 - 12)
	if($dx == 1 or $dx == 15 or ($i == 0 and $dxNext != '1' and $dxNext != '15')) {
		echo "<th class='month'>{$months[$mx-1]}</th>\n";
	} else {
		echo "<th></th>\n";
	}
	$cTime += 86400; //+1 day
}
echo "</tr>\n";
//calendar week numbers
if ($set['weekNumber']) {
	echo "<tr>\n";
	for($i = 0; $i < $daysToShow; $i++) {
		$cTime = $sTime + $i * 86400;
		echo date('N',$cTime) == 1 ? "<th>{$xx['vws_wk']} ".date('W',$cTime)."</th>\n" : "<th></th>\n"; //day of week = Monday
	}
	echo "</tr>\n";
}
//calendar week days
echo "<tr>\n";
for($i=$set['weekStart']; $i < ($set['weekStart']+$daysToShow); $i++) {
	$cTime = $sTime + (($i - $set['weekStart']) * 86400);
	$cDate = date("Y-m-d",$cTime);
	$attrib = $cH ? " class='point' onclick=\"index({cP:6,cD:'{$cDate}'}); event.stopPropagation();\" title=\"{$xx['vws_view_day']}\"" : " class='arrow'";
	echo "<th{$attrib}>{$wkDays_l[$i%7]} ".date("j",$cTime)."</th>"; //week days
}
echo "</tr>\n";
//calendar body
foreach($cats as $cat) {
	echo "<tr>\n";
	for($i=0; $i < $daysToShow; $i++) { //number of days to show
		$cTime = $sTime + ($i * 86400);
		$cDate = date("Y-m-d",$cTime);
		$dayBg = '';
		if (!empty($evtList[$cDate])) { //check if day background should be set
			foreach ($evtList[$cDate] as $evt) {
				if ($evt['seq'] == $cat['sequence'] and ($evt['dbg'] & 1)) {
					$dayBg = " style='background:{$evt['cbg']}'";
				}
			}
		}
		$dow = strpos($set['workWeekDays'],date("w",$cTime)) === false ? 'we0' : 'wd0';
		if ($cDate == $today) {
			$dow .= ' today';
		} elseif ($cDate == $opt['nD']) {
			$dow .= ' slday';
		}
		$addNew = '';
		if ($usr['privs'] > 1 and ($usr['eCats'] == '0' or strpos($usr['eCats'],strval($cat['ID'])) !== false)) {
			$dow .= ' hyper';
			$addNew = " class='hyper' onclick=\"newE('{$cDate}',{$cat['ID']});\" title=\"{$xx['vws_add_event']}\"";
		}
		echo "<td class='{$dow}'{$dayBg}{$addNew}>\n";
		if (!empty($evtList[$cDate])) { showEvents($cDate,$cat['sequence']); }
		echo "</td>\n";
	}
	echo "</tr>\n";
}
//calendar week days
echo "<tr>\n";
for($i=$set['weekStart']; $i < ($set['weekStart']+$daysToShow); $i++) {
	$cTime = $sTime + (($i - $set['weekStart']) * 86400);
	$cDate = date("Y-m-d",$cTime);
	$attrib = $cH ? " class='point' onclick=\"index({cP:6,cD:'{$cDate}'}); event.stopPropagation();\" title=\"{$xx['vws_view_day']}\"" : " class='arrow'";
	echo "<th{$attrib}>{$wkDays_l[$i%7]} ".date("j",$cTime)."</th>"; //week days
}
echo "</tr>\n";
//calendar week numbers
if ($set['weekNumber']) {
	echo "<tr>\n";
	for($i = 0; $i < $daysToShow; $i++) {
		$cTime = $sTime + $i * 86400;
		echo date('N',$cTime) == 1 ? "<th>{$xx['vws_wk']} ".date('W',$cTime)."</th>\n" : "<th></th>\n"; //day of week = Monday
	}
	echo "</tr>\n";
}
echo "</table>\n</div>\n</div>\n";
echo "<script>window.onload = function() {document.getElementById('matrix').focus()}</script>\n";
?>
