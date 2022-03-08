<?php
/*
= Retrieve changed events from db =
Queries database starting from a specified date and dumps changed events in an arrays
Input params:
- start date (in 2020-10-30 format)
- allEvents; 0: apply normal filters, 1: no filters

This file is part of the LuxCal Web Calendar.
Copyright 2009-2020 LuxSoft - www.LuxSoft.eu
License https://www.gnu.org/licenses/gpl.html GPL version 3

The LuxCal Web Calendar is distributed WITHOUT ANY WARRANTY.
*/

//sanity check
if (empty($lcV)) { exit('not permitted ('.substr(basename(__FILE__),0,-4).')'); } //launch via script only

function sortEvts2($a,$b) { //sort event (cat seq nr + times)
	if ($a['sts'] < $b['sts']) { return -1; } //status
	if ($a['sts'] > $b['sts']) { return 1; }
	if ($a['sda'] < $b['sda']) { return -1; } //start date
	if ($a['sda'] > $b['sda']) { return 1; }
	if ($a['sti'] < $b['sti']) { return -1; } //start time
	if ($a['sti'] > $b['sti']) { return 1; }
	return $a['seq'] < $b['seq'] ? -1 : 1; //cat seq nr
}

function grabChanges($sDate,$allEvents) { //query db for changes since $sDate
	global $set, $usr, $opt, $evtList;

	//set filter
	$filter = $usr['vCats'] != '0' ? " AND c.`ID` IN ({$usr['vCats']})" : '';
	if (!$allEvents) {
		if (count($opt['cG']) > 0 and $opt['cG'][0] != 0) {
			$filter .= " AND u.`groupID` IN (".implode(",",$opt['cG']).")";
		}
		if (count($opt['cU']) > 0 and $opt['cU'][0] != 0) {
			$filter .= " AND e.`userID` IN (".implode(",",$opt['cU']).")";
		}
		if (count($opt['cC']) > 0 and $opt['cC'][0] != 0) {
			$filter .= " AND c.`sequence` IN (".implode(",",$opt['cC']).")";
		}
	}
	
	//retrieve events
	$q =
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
		e.`notEml` AS nom,
		e.`notSms` AS nos,
		e.`sDate` AS sda,
		e.`eDate` AS eda,
		e.`sTime` AS sti,
		e.`eTime` AS eti,
		e.`rType` AS r_t,
		e.`rInterval` AS r_i,
		e.`rPeriod` AS r_p,
		e.`rMonth` AS r_m,
		e.`rUntil` AS r_u,
		e.`aDateTime` AS adt,
		e.`mDateTime` AS mdt,
		e.`status` AS sts,
		c.`name` AS cnm,
		c.`sequence` AS seq,
		c.`repeat` AS rpt,
		c.`approve` AS app,
		c.`dayColor` AS dbg,
		c.`color` AS cco,
		c.`bgColor` AS cbg,
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
	WHERE ((e.`aDateTime` NOT LIKE '9%' AND SUBSTR(e.`aDateTime`,1,10) >= '$sDate') OR (e.`mDateTime` NOT LIKE '9%' AND SUBSTR(e.`mDateTime`,1,10) >= '$sDate'))".$filter;
	$stH = dbQuery($q);

	//process events
	while ($row = $stH->fetch(PDO::FETCH_ASSOC)) {
		$evt = array();
		if ($allEvents or ((!$row['app'] or $row['apd'] or $usr['privs'] > 3) and !$row['pri']) or $row['uid'] == $usr['ID'] or $usr['privs'] == 9) { //private / not approved: only for current user + admin
			$curDD = IDtoDD($row['sda']); //current display date
			$evt['sda'] = $row['sda'];
			$evt['eda'] = ($row['eda'][0] != '9') ? $row['eda'] : '';
			if (($row['sti'] == '00:00') and ($row['eti'] == '23:59')) {
				$evt['ald'] = true;
				$evt['sti'] = $evt['eti'] = ''; //all day: start/end time = ""
			} else {
				$evt['ald'] = false;
				$evt['sti'] = $row['sti'];
				$evt['eti'] = ($row['eti'][0] != '9') ? $row['eti'] : ""; //no end time = ""
			}
			$evt['r_t'] = $row['r_t'];
			$evt['r_i'] = $row['r_i'];
			$evt['r_p'] = $row['r_p'];
			$evt['r_m'] = $row['r_m'];
			$evt['r_u'] = ($row['r_u'][0] != '9') ? $row['r_u'] : "";
			$evt['nom'] = $row['nom'];
			$evt['nos'] = $row['nos'];
			$evt['adt'] = $row['adt'];
			$evt['mdt'] = ($row['mdt'][0] != '9') ? $row['mdt'] : "";
			$evt['eid'] = $row['eid'];
			$evt['sts'] = $row['sts'];
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
			$evt['cnm'] = $row['cnm'];
			$evt['app'] = $row['app'];
			$evt['seq'] = str_pad($row['seq'],2,"0",STR_PAD_LEFT);
			$evt['rpt'] = $row['rpt'];
			$evt['uco'] = $row['uco'];
			$evt['dbg'] = $row['dbg'];
			$evt['cco'] = $row['cco'];
			if (!$evt['sid']) { //no subcat
				$evt['snm'] = '';
				$evt['cco'] = $row['cco'];
				$evt['cbg'] = $row['cbg'];
			} else {
				$evt['snm'] = $row["sn{$evt['sid']}"];
				$evt['cco'] = $row["sc{$evt['sid']}"] ? $row["sc{$evt['sid']}"] : $row['cco'];
				$evt['cbg'] = $row["sb{$evt['sid']}"] ? $row["sb{$evt['sid']}"] : $row['cbg'];
			}
			$evt['scl'] = $row['sc1'];
			$evt['una'] = $row['una'];
			$evt['tix'] = $set['ownerTitle'] ? "{$evt['una']}: {$evt['tit']}" : $evt['tit'];
			$evt['mayE'] = (($usr['eCats'] == '0' or strpos($usr['eCats'],strval($evt['cid'])) !== false) and ($usr['privs'] > 2 or ($usr['privs'] == 2 and $row['uid'] == $usr['ID']))); //edit rights
			$modDate = substr(max($evt['adt'],$evt['mdt']),0,10);
			$evtList[$modDate][] = $evt;
		}
	}
	ksort($evtList);
	foreach ($evtList as &$events) { //sort event list per change date
		usort($events,'sortEvts2');
	}
}
?>