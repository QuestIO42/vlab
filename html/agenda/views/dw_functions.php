<?php
/*
 = General functions used by Week and Day view scripts =

This file is part of the LuxCal Web Calendar.
Copyright 2009-2020 LuxSoft - www.LuxSoft.eu
License https://www.gnu.org/licenses/gpl.html GPL version 3

The LuxCal Web Calendar is distributed WITHOUT ANY WARRANTY.
*/

//sanity check
if (empty($lcV)) { exit('not permitted ('.substr(basename(__FILE__),0,-4).')'); } //launch via script only

function showEvents($date) {
	global $usr, $evtList, $set, $winXS, $eDetails, $xx;

	$thsM = ($set['dwStartHour'] * 60); //threshold start of day in mins
	$theM = ($set['dwEndHour'] * 60); //threshold end of day in mins
	$offset = $set['dwStartHour'] ? 2 * $set['dwTimeSlot'] : $set['dwTimeSlot']; //"earlier" row
	//hereafter: M = in nbr of mins
	foreach ($evtList[$date] as $evt) {
		if ($evt['mde']) { //multi-day-event
			if ($evt['mde'] != 1) { $evt['sti'] = '00:00'; } //not the first day
			if ($evt['mde'] != 3) { $evt['eti'] = '23:59'; } //not the last day
		}
		if (($evt['sti'] == '' and $evt['eti'] == '') or $evt['ald']) { //all day (takes up 1 slot at the top)
			$st[] = 0; //start time
			$et[] = $set['dwTimeSlot']; //end time
		} else {
			$stM = substr($evt['sti'],0,2) * 60 + intval(substr($evt['sti'],3,2)); //start time
			if ($stM < $thsM) {
				$st[] = $set['dwTimeSlot']; //start time < threshold start of day in mins
			} elseif ($stM < $theM) {
				$st[] = $stM - $thsM + $offset; //start time < threshold end of day in mins
			} else {
				$st[] = $theM - $thsM + $offset; //start time >= threshold end of day in mins
			}
			if ($evt['eti'] == "" or $evt['eti'] == $evt['sti']) {
				$et[] = end($st) + $set['dwTimeSlot'];
			} else {
				$etM = substr($evt['eti'],0,2) * 60 + intval(substr($evt['eti'],3,2)); //end time in mins
				if ($etM <= $thsM) {
					$et[] = $offset; //end time <= threshold start of day in mins
				} elseif ($etM <= $theM) {
					$et[] = $etM - $thsM + $offset; //end time < threshold end of day in mins
				} else {
					$et[] = $theM - $thsM + $offset + $set['dwTimeSlot']; //end time > threshold end of day in mins
				}
			}
		}
	}
	//for day $date we now have:
	//$st: array with start time in mins for each event
	//$et: array with end time in mins for each event
	//the indexes in these arrays correspond to the indexes in $evtList
	$sEmpty[0][0] = 0;
	$eEmpty[0][0] = 1440; //24 x 60 mins
	$indent = 0;
	$column = array(); //array with column number of each event
	foreach ($st as $i => $stM) { //i: index in $evtList, stM: start time in mins
		$found = false;
		foreach ($sEmpty as $c => $ses) { //c: column nr, ses: start of empty spaces in mins
			foreach ($ses as $k => $sEtM) {
				if ($stM >= $sEtM and $et[$i] <= $eEmpty[$c][$k]) {
					$sEmpty[$c][] = $et[$i]; //end time in mins
					$eEmpty[$c][] = $eEmpty[$c][$k];
					$eEmpty[$c][$k] = $stM; //start in mins
					$sFill[$c][] = $stM;
					$eIndx[$c][] = $i;
					$column[$i] = $c;
					$found = true;
					break 2;
				}
			}
		}
		if (!$found) {
			$indent++;
			$sEmpty[$indent][0] = 0;
			$eEmpty[$indent][0] = $stM;
			$sEmpty[$indent][1] = $et[$i];
			$eEmpty[$indent][1] = 1440; //24 x 60
			$sFill[$indent][0] = $stM;
			$eIndx[$indent][0] = $i;
			$column[$i] = $indent;
		}
	}
	$cWidth = round(95 / ($indent+1),1); //width of smallest column
	foreach ($sFill as $c => $v) { //c: column nr
		$eLeft = $cWidth * $c + 0.5; //event left side in %
		foreach ($v as $k => $stM) { //event start time in mins
			$etM = $sEmpty[$c][$k + 1]; //event end time in mins
			$eHeight = $etM - $stM; //event height in mins
			$stP = round($stM * $set['dwTsHeight'] / $set['dwTimeSlot']) - 1; //scale start time in px
			$eHeight = round($eHeight * $set['dwTsHeight'] / $set['dwTimeSlot']) - 1; //scale height in px
			$i = $eIndx[$c][$k];
			$evt = $evtList[$date][$i];
			$sti = ($evt['sti']) ? ITtoDT($evt['sti']) : '';
			//widen event box if possible
			$ovlCol = $indent+1;
			foreach ($column as $iCol => $colNr) { //find next column of overlapping event
				$evtT = $evtList[$date][$iCol];
				if ($evtT['sti'] < $evt['eti'] and $evtT['eti'] > $evt['sti']) { //overlap
					if ($colNr > $column[$i] and $colNr < $ovlCol) { //column nr lower
						$ovlCol = $colNr;
					}
				}
			}
			$eWidth = ($ovlCol-$c) * $cWidth - 0.5;
			$toAppr = ($evt['app'] and !$evt['apd']) ? ' toAppr' : '';
			$popAttr = makePopAttrib($evt,$date);
			$eStyle = colorStyle($evt,'#FFFFFF'); //get event colors
			$chBox = $evt['cbx'] ? checkBox($evt,$date) : '';
			$class = ($eHeight < 21 ? 'dwEventNw' : 'dwEvent').(($eDetails or $evt['mayE']) ? ' point' : ' arrow');
			$onClick = ($eDetails or $evt['mayE']) ? " onclick=\"".($evt['mayE'] ? 'editE' : 'showE')."({$evt['eid']},'{$date}');\"" : '';
			$title = $evt['mayE'] ? $xx['vws_edit_event'] : ($eDetails ? $xx['vws_see_event'] : '');
			echo "<div class='evtBox evtTitle{$toAppr}' style='top:{$stP}px; left:{$eLeft}%; height:{$eHeight}px; width:{$eWidth}%; {$eStyle}'>\n";
			if ($stM >= $offset and $stM < ($theM-$thsM)) { //start time between upper and lower threshold
				$event = makeHead($evt,$set['evtHeadW'],$date);
			} else {
				$event = $sti.' '.$evt['tit'];
			}
			echo "<div class='{$class}'{$popAttr}{$onClick} title=\"{$title}\">{$chBox}{$event}</div>\n";
			echo "</div>\n";
		}
	}
}

function showHours() {
	global $set, $xx;
	//build day
	$tsHeight = $set['dwTsHeight'] -1;
	echo "<div class='timeFrame'>\n";
	echo "<div class='times' style='height:{$tsHeight}px;'>{$xx['vws_all_day']}</div>\n";
	$i = $set['dwStartHour'];
	$j = 0;
	if ($set['dwStartHour']) {
		echo "<div class='times' style='height:{$tsHeight}px;'>{$xx['vws_earlier']}</div>\n";
	}
	while ($i < $set['dwEndHour']) {
		echo "<div class='times' style='height:{$tsHeight}px;'>".ITtoDT(str_pad($i,2,"0",STR_PAD_LEFT).":".str_pad($j,2,"0",STR_PAD_LEFT))."</div>\n";
		if (($j += $set['dwTimeSlot']) >= 60) {
			$i++;
			$j -= 60;
		}
	}
	if ($set['dwEndHour'] < 24) {
		echo "<div class='times' style='height:{$tsHeight}px;'>{$xx['vws_later']}</div>\n";
	}
	echo "</div>\n";
}

function showDay($cDate,$caption="") {
	global $set, $evtList;

	//build day
	$tsHeight = $set['dwTsHeight'] -1;
	echo "<div class='timeFrame'>\n";
	echo "<var style='height:{$tsHeight}px;' id='a00:00:{$cDate}'></var>\n";
	$i = $set['dwStartHour'];
	$j = 0;
	if ($set['dwStartHour']) {
		echo "<var style='height:{$tsHeight}px;' id='t00:30:{$cDate}'></var>\n";
	}
	while ($i < $set['dwEndHour']) {
		echo "<var style='height:{$tsHeight}px;' id='t".str_pad($i,2,"0",STR_PAD_LEFT).":".str_pad($j,2,"0",STR_PAD_LEFT).":{$cDate}'></var>\n";
		if (($j += $set['dwTimeSlot']) >= 60) {
			$i++;
			$j -= 60;
		}
	}
	if ($set['dwEndHour'] < 24) {
		echo "<var style='height:{$tsHeight}px;' id='t".str_pad($i,2,"0",STR_PAD_LEFT).":".str_pad($j,2,"0",STR_PAD_LEFT).":{$cDate}'></var>\n";
	}
	echo "<div class=dates>\n";
	if (!empty($evtList[$cDate])) { showEvents($cDate); }
	echo "</div>";
	echo "</div>\n";
}
?>
