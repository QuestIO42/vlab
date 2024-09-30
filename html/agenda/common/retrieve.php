<?php
/*
= Retrieve events from db =
Queries the database for a specified period and dumps events per day in the $evtList array
Input params:
- start date
- end date (in 2020-10-30 format)
- string with letters u and/or c (optional); if present, u includes user filter and c includes cat filter
- filter (optional) additional filter in SQL format

This file is part of the LuxCal Web Calendar.
Copyright 2009-2020 LuxSoft - www.LuxSoft.eu
License https://www.gnu.org/licenses/gpl.html GPL version 3

The LuxCal Web Calendar is distributed WITHOUT ANY WARRANTY.
*/

//sanity check
if (empty($lcV)) { exit('not permitted ('.substr(basename(__FILE__),0,-4).')'); } //launch via script only

//initialize
$evtList = array();

function sortEvts0($a,$b) { //sort event (times)
	if ($a['sort'] < $b['sort']) { return -1; } //times
	if ($a['sort'] > $b['sort']) { return 1; }
	return $a['adt'] > $b['adt'] ? -1 : 1; //date-time added (last added at top)
}

function sortEvts1($a,$b) { //sort event (cat seq nr + times)
	if ($a['seq'] < $b['seq']) { return -1; } //cat seq nr
	if ($a['seq'] > $b['seq']) { return 1; }
	if ($a['sort'] < $b['sort']) { return -1; } //times
	if ($a['sort'] > $b['sort']) { return 1; }
	return $a['adt'] > $b['adt'] ? -1 : 1; //date-time added (last added at top)
}

//main function
function retrieve($start,$end,$iFilter='',$xFilter='') {
	global $usr, $set, $opt, $evtList;

	$evtList = array(); //clear event list

	//set filter
	$filter = $usr['vCats'] != '0' ? " AND c.`ID` IN ({$usr['vCats']})" : '';
	if (strpos($iFilter,'g') !== false and count($opt['cG']) > 0 and $opt['cG'][0] != 0) {
		$filter .= " AND u.`groupID` IN (".implode(",",$opt['cG']).")";
	}
	if (strpos($iFilter,'u') !== false and count($opt['cU']) > 0 and $opt['cU'][0] != 0) {
		$filter .= " AND e.`userID` IN (".implode(",",$opt['cU']).")";
	}
	if (strpos($iFilter,'c') !== false and count($opt['cC']) > 0 and $opt['cC'][0] != 0) {
		$cCList = implode(",",$opt['cC']);
		if ($opt['cC'][0] > 0) {
			$filter .= " AND c.`sequence` IN ({$cCList})";
		} else { //exclude cCs
			$filter .= " AND c.`sequence` NOT IN (".str_replace('-','',$cCList).")";
		}
	}
	if ($xFilter) { $filter .= ' AND '.$xFilter; } //add external filter
	
	//set user id
	if (empty($usr['ID'])) { $usr['ID'] = 1; } //if no UserID, set to public
	if (empty($usr['privs'])) { $usr['privs'] = 1; } //if no UserID, set to public

	/* retrieve events between $start and $end */
	$q0 =
	"SELECT
		e.`ID` AS eid,
		e.`private` AS pri,
		e.`title` AS tit,
		e.`venue` AS ven,
		e.`text1` AS des,
		e.`text2` AS xf1,
		e.`text3` AS xf2,
		e.`attach` AS att,
		e.`catID` AS cid,
		e.`scatID` AS sid,
		e.`userID` AS uid,
		e.`editor` AS edr,
		e.`approved` AS apd,
		e.`checked` AS chd,
		e.`notEml` AS nom,
		e.`notSms` AS nos,
		e.`notRecip` AS nal,
		e.`sDate` AS sda,
		e.`eDate` AS eda,
		e.`xDates` AS xda,
		e.`sTime` AS sti,
		e.`eTime` AS eti,
		e.`rType` AS r_t,
		e.`rInterval` AS r_i,
		e.`rPeriod` AS r_p,
		e.`rMonth` AS r_m,
		e.`rUntil` AS r_u,
		e.`aDateTime` AS adt,
		e.`mDateTime` AS mdt,
		c.`name` AS cnm,
		c.`symbol` AS sym,
		c.`sequence` AS seq,
		c.`repeat` AS rpt,
		c.`noverlap` AS nol,
		c.`olapGap` AS olg,
		c.`olErrMsg` AS oem,
		c.`approve` AS app,
		c.`dayColor` AS dbg,
		c.`color` AS cco,
		c.`bgColor` AS cbg,
		c.`checkBx` AS cbx,
		c.`checkLb` AS clb,
		c.`checkMk` AS cmk,
		c.`subName1` AS sn1,
		c.`subColor1` AS sc1,
		c.`subBgrnd1` AS sb1,
		c.`subName2` AS sn2,
		c.`subColor2` AS sc2,
		c.`subBgrnd2` AS sb2,
		c.`subName3` AS sn3,
		c.`subColor3` AS sc3,
		c.`subBgrnd3` AS sb3,
		c.`subName4` AS sn4,
		c.`subColor4` AS sc4,
		c.`subBgrnd4` AS sb4,
		u.`name` AS una,
		g.`color` AS uco
	FROM `events` AS e
	INNER JOIN `categories` AS c ON c.`ID` = e.`catID`
	INNER JOIN `users` AS u ON u.`ID` = e.`userID`
	INNER JOIN `groups` AS g ON g.`ID` = u.`groupID`
	WHERE e.`status` >= 0".$filter;

	//process non-recurring events
	$q1 = $q0."
		AND c.`repeat` = 0
		AND e.`rType` = 0
		AND ((e.`sDate` <= '$end') AND (CASE WHEN e.`eDate` LIKE '9%' THEN e.`sDate` ELSE e.`eDate` END >= '$start'))
	ORDER BY
		e.`sDate`";
	$stH = stPrep($q1);
	stExec($stH,array());
	while ($row = $stH->fetch(PDO::FETCH_ASSOC)) {
		if (((!$row['app'] or $row['apd'] or $usr['privs'] > 3) and !$row['pri']) or $row['uid'] == $usr['ID'] or $usr['privs'] == 9) { //private / not approved: for current user + admin
			$eEnd = ($row['eda'][0] != '9') ? $row['eda'] : $row['sda'];
			processEvent(max($start,$row['sda']), min($end,$eEnd), $row['sda'], $eEnd, $row);
		}
	}

	//process recurring events

	$q1 = $q0."
		AND (c.`repeat` > 0 OR e.`rType` > 0)
		AND e.`sDate` <= '$end'
		AND e.`rUntil` >= '$start'
	ORDER BY
		e.`sDate`";
	$stH = stPrep($q1);
	stExec($stH,array());
	while ($row = $stH->fetch(PDO::FETCH_ASSOC)) {
		if (((!$row['app'] or $row['apd'] or $usr['privs'] > 3) and !$row['pri']) or $row['uid'] == $usr['ID'] or $usr['privs'] == 9) { //private / not approved: for current user + admin
			$dUts = ($row['eda'][0] != '9') ? strtotime($row['eda']) - strtotime($row['sda']) : 0; //delta start date - end date uts
			$eStart = $row['sda'];
			if ($row['rpt'] > 0) { //cat repeat overrides
				$row['r_t'] = $row['r_i'] = 1;
				$row['r_p'] = $row['rpt'];
				$row['r_u'] = '9999-00-00';
			} elseif ($row['r_t'] == 2) {
				$nxtD = nextRdate2($eStart,$row['r_i'],$row['r_p'],$row['r_m'],0); //goto 1st occurrence of xth <dayname> in month y
				$eStart = ($nxtD < $eStart) ? nextRdate2($eStart,$row['r_i'],$row['r_p'],$row['r_m'],1) : $nxtD;
			}
			$eEnd = date("Y-m-d",strtotime($eStart.' 12:00:00') + $dUts);
			while ($eStart <= min($end, $row['r_u']) and $row['r_u'] >= $start) {
				if ($eEnd >= $start) { //hit
					processEvent(max($start,$eStart), min($end,$eEnd), $eStart, $eEnd, $row);
				}
				$eStart = $row['r_t'] == 1 ? nextRdate1($eStart,$row['r_i'],$row['r_p']) : nextRdate2($eStart,$row['r_i'],$row['r_p'],$row['r_m'],1);
				$eEnd = date("Y-m-d",strtotime($eStart.' 12:00:00') + $dUts);
			}
		}
	}
	//sort the event list per date
	ksort($evtList);
	foreach ($evtList as &$events) {
		switch ($set['evtSorting']) { //sort events per day on ...
			case '0': usort($events, 'sortEvts0'); break; //times
			case '1': usort($events, 'sortEvts1'); //cat seq. nr + times
		}
	}
}

//
//Process (multi-day) events and save event data
//
function processEvent($from, $till, $eStart, $eEnd, &$row) {
	global $evtList, $usr, $set;
	
	$sTs = strtotime($from.' 12:00:00');
	$eTs = strtotime($till.' 14:00:00');
	for($i=$sTs;$i<=$eTs;$i+=86400) { //increment 1 day
		$evt = array();
		$curD = date('Y-m-d', $i);
		if ($row['xda'] and strpos($row['xda'], $curD) !== false) { continue; } //exception: skip
		$curDD = IDtoDD($curD); //current display date
		$curdm = substr($curD,5);
		if ($row['eda'][0] != '9' and $row['sda'] < $row['eda']) { //multi-day event; mde -> 1:first, 2:in between ,3:last day
			$evt['mde'] = ($curdm == substr($eStart,5)) ? 1 : (($curdm == substr($eEnd,5)) ? 3 : 2);
		} else { //single day event
			$evt['mde'] = 0;
		}
		$evt['smd'] = $eStart; //for gantt chart
		$evt['emd'] = $eEnd; //for gantt chart
		$evt['sda'] = $row['sda'];
		$evt['eda'] = $row['eda'];
		if (($row['sti'] == '00:00') and ($row['eti'] == '23:59')) {
			$evt['ald'] = true;
			$evt['sti'] = $evt['eti'] = ''; //all day: start/end time = ''
		} else {
			$evt['ald'] = false;
			$evt['sti'] = $row['sti'];
			$evt['eti'] = $row['eti'][0] != '9' ? $row['eti'] : ''; //no end time = ''
		}
		$evt['r_t'] = $row['r_t'];
		$evt['r_i'] = $row['r_i'];
		$evt['r_p'] = $row['r_p'];
		$evt['r_m'] = $row['r_m'];
		$evt['r_u'] = $row['r_u'];
		$evt['nom'] = $row['nom'];
		$evt['nos'] = $row['nos'];
		$evt['nal'] = $row['nal'];
		$evt['adt'] = ($row['adt'][0] != '9') ? $row['adt'] : '';
		$evt['mdt'] = ($row['mdt'][0] != '9') ? $row['mdt'] : '';
		$evt['eid'] = $row['eid'];
		$evt['tit'] = $row['tit'];
		$evt['cid'] = $row['cid'];
		$evt['sid'] = $row['sid'];
		$evt['ven'] = $row['ven'];
		$evt['des'] = str_replace('[cd]',$curDD,$row['des']);
		$evt['xf1'] = str_replace('[cd]',$curDD,$row['xf1']);
		$evt['xf2'] = str_replace('[cd]',$curDD,$row['xf2']);
		$evt['att'] = $row['att'];
		$evt['uid'] = $row['uid'];
		$evt['edr'] = $row['edr'];
		$evt['apd'] = $row['apd'];
		$evt['pri'] = $row['pri'];
		$evt['chd'] = $row['chd'];
		$evt['cnm'] = $row['cnm'];
		$evt['sym'] = $row['sym'];
		$evt['rpt'] = $row['rpt'];
		$evt['nol'] = $row['nol'];
		$evt['olg'] = $row['olg'];
		$evt['oem'] = $row['oem'];
		$evt['app'] = $row['app'];
		$evt['seq'] = str_pad($row['seq'],2,"0",STR_PAD_LEFT);
		$evt['uco'] = $row['uco'];
		$evt['dbg'] = $row['dbg'];
		if (!$evt['sid']) { //no subcat
			$evt['snm'] = '';
			$evt['cco'] = $row['cco'];
			$evt['cbg'] = $row['cbg'];
		} else {
			$evt['snm'] = $row["sn{$evt['sid']}"];
			$evt['cco'] = $row["sc{$evt['sid']}"] ? $row["sc{$evt['sid']}"] : $row['cco'];
			$evt['cbg'] = $row["sb{$evt['sid']}"] ? $row["sb{$evt['sid']}"] : $row['cbg'];
		}
		$evt['cbx'] = $row['cbx'];
		$evt['clb'] = $row['clb'];
		$evt['cmk'] = $row['cmk'];
		$evt['una'] = $row['una'];
		$evt['tix'] = $set['ownerTitle'] ? "{$evt['una']}: {$evt['tit']}" : $evt['tit'];
		$evt['mayE'] = (($usr['eCats'] == '0' or strpos($usr['eCats'],strval($evt['cid'])) !== false) and
			($usr['privs'] > 2 or ($usr['privs'] == 2 and $row['uid'] == $usr['ID'])) and
			(!$evt['apd'] or $usr['privs'] >= 4)); //edit rights
		$evt['sort'] = $evt['mde'] <= 1 ? $evt['sti'] : ($evt['mde'] == 2 ? '' : $evt['eti']);
		$evtList[$curD][] = $evt;
	}
}
?>
