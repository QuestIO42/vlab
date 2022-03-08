<?php
/*
=== REGEX DEFINITIONS & TOOLBOX FUNCTIONS ===

This file is part of the LuxCal Web Calendar.
Copyright 2009-2020 LuxSoft - www.LuxSoft.eu
License https://www.gnu.org/licenses/gpl.html GPL version 3

*/

/*---------- REGEX DEFINITIONS ----------*/

$rxEmail = '~(?:^|\s|:)([^@\s]{2,40})@((?:[^@\s\.]{2,50}\.)+\w{2,6})(?:\.\s|\s|<|$)~im'; //jd@skyweb.com

$rxEmailX = '~^(?:[^<@]*<)?([^@\s]{2,40})@((?:[^@\s\.]{2,50}\.)+\w{2,6})>?$~i'; //John D. <jd@skyweb.com>

$rxEML = '~(^|\s)([^@\s]{2,40})@((?:[^@\s\[]{2,50})+)\.(\w{2,6})(?:\s*\[([^<>\[]*?)\])?(\.|\s|<|$)~im'; //jd@skyweb.com [title]

$rxELink = "~<a\s.{28,34}sml\('([^']+)','([^']+)','([^']+)',[^<>]+>([^<>]+)</a>~i"; //<a ... sml(...>...</a>

$rxULink = '~<a\s[^<>]*?href=["\'](https?://([^|<>\s]{5,}))["\'][^|<>]*?>([^|<>]*?)</a>~i'; //<a href=...>title</a>

$rxURL = '~(^|\s)(https?://)([^\s\[\<$]{5,}[^.\s\[\<$])(?:\s*\[([^<>\[]+?)\])?(\.|\s|<|$)~im'; //http://www.mysite.xxx [title]

$rxCalURL = '~^(https?://)?((?:[\w\-:]+\.)+[a-z]{2,15}(?:[/?#:][^<>\s\[]*)?|[\w\-]{2,10}host(?::[0-9]{1,3})?|(?:[0-9]{1,3}\.){3}[0-9]{1,3})(/[^<>\s\[]+)*/?$~i'; //http://XXX/mycal/calendar.php (XXX = www.mysite.xxx | ?????host:70 | ip address)

$rxPhone = '~^[+\d\s\-/()]{6,20}$~'; //+1-541-754-3010, (089) / 636-48018, etc.

$rxIMGTags = '~<img.*?/[\w\d\-]+/([^\s/]+\.(?:gif|jpg|png)).*?>~i'; // <img src=...>

$rxIMG = '~(^|\s)([^\s/]+\.(?:gif|jpg|png))(\.|\s|$)~i'; //mytnail.gif (or .jpg, or .png)

	
/*---------- TOOLBOX FUNCTIONS ----------*/

function mbtrunc($string,$length) { //multi-byte utf-8 truncate on char boundary
	if (strlen($string) <= $length) { return $string; }
	$ordNext = ord($string[$length]);
	if ($ordNext <= 127 or $ordNext >= 194) { return substr($string,0,$length); } //next byte is single byte or 1st byte of mb
	for ($i = ($length - 1); $i >= 0; $i--) {
		if (ord($string[$i]) <= 127) { return substr($string,0,$i+1); } //single byte
		if (ord($string[$i]) >= 194) { return substr($string,0,$i); } //1st byte of mb
	}
	return ''; //empty
}

function eol2txt($string) { //replace \n\r by {nl} and </tr> by </tr>\n
	return preg_replace(array("~\R~","~</tr>~"),array("{nl}","</tr>\n "),trim($string));
}

//Time formatting

function ITtoDT($time,$format = '') { //convert hh:mm(:ss) to display time
	global $set;
	if (!$time) { return ''; }
	if (!$format) { $format = $set['timeFormat']; }
	$ampm = stripos($format,'a') !== false;
	if ($ampm and substr($time,0,2) =='24') { $time = '12'.substr($time,2); }
	$phpFormat = str_replace(array('h','H','m'),array(($ampm ? 'g' : 'G'),($ampm ? 'h' : 'H'),'i'),$format);
	return date($phpFormat,strtotime($time));
}

function DTtoIT($time,$format = '') { //convert Display Time to ISO Time hh:mm
	global $set;
	$time = trim($time);
	if (!$time) { return ''; }
	if (!$format) { $format = $set['timeFormat']; }
	$ampm = stripos($format,'a') !== false;
	$regEx = $ampm ? '(0{0,1}[0-9]|1[0-2])[:.][0-5][0-9]\s*(a|A|p|P)(m|M)' : '(0{0,1}[0-9]|1[0-9]|2[0-4])[:.][0-5][0-9]([:.][0-5][0-9]){0,1}';
	if (!preg_match("%^".$regEx."$%",$time)) { return false; }
	$tStamp = strtotime($time);
	return ($tStamp < 1) ? false : date("H:i", $tStamp);
}

//Date formatting
function IDtoDD($date,$format = '') { //convert ISO date (yyyy mm dd) to display date
	global $set;
	if (!$date) { return ''; }
	if (!$format) { $format = $set['dateFormat']; }
	return str_replace(array('y','m','d'),array(substr($date,0,4),substr($date,5,2),substr($date,8,2)),$format);
}

function IDTtoDDT($dateTime) { //convert ISO date+time (yyyy mm dd hh:mm:ss) to display date
	global $xx;
	$date = substr($dateTime,0,10);
	if (!$date) { return ''; }
	$time = substr($dateTime,11,5);
	$dD = IDtoDD($date);
	$dT = ITtoDT($time);
	return $dD.($dT ? " {$xx['at_time']} {$dT}" : '');
}

function DDtoID($date,$format = '') { //validate display date and convert to ISO date (yyyy-mm-dd)
	global $set;
	$date = trim($date);
	if (!$date) { return ''; }
	if (!$format) { $format = $set['dateFormat']; }
	$indexY = strpos($format,'y') / 2;
	$indexM = strpos($format,'m') / 2;
	$indexD = strpos($format,'d') / 2;
	$split = preg_split('%[^\d]%',$date);
	if (count($split) != 3) { return false; } //invalid date format
	if ($split[$indexY] < 1900 or $split[$indexY] > 2099) { return false; } //year out of range
	if (!checkdate(intval($split[$indexM]),intval($split[$indexD]),intval($split[$indexY]))) { return false; } //invalid date
	return $split[$indexY]."-".str_pad($split[$indexM], 2, "0", STR_PAD_LEFT)."-".str_pad($split[$indexD], 2, "0", STR_PAD_LEFT);
}

function makeD($date,$formatNr,$x3 = '') { //make long date
	global $set, $months, $months_m, $wkDays, $wkDays_l;
	$y = substr($date, 0, 4);
	$m = ltrim(substr($date, 5, 2),"0");
	$d = ltrim(substr($date, 8, 2),"0");
	if ($formatNr > 3) {
		$wdNr = date("N", mktime(12,0,0,$m,$d,$y));
		$wkDay = $x3 ? $wkDays_l[$wdNr] : $wkDays[$wdNr];
	}
	$month = $x3 ? $months_m[$m - 1] : $months[$m - 1];
	switch ($formatNr) {
	case 1: //Dec... 9 / 9 dec...
		return str_replace(array('d','M'),array($d,$month),$set['MdFormat']);
	case 2: //Dec... 9, 2020 / 9 dec... 2020
		return str_replace(array('d','y','M'),array($d,$y,$month),$set['MdyFormat']);
	case 3: //Dec... 2020 / dec... 2020
		return str_replace(array('y','M'),array($y,$month),$set['MyFormat']);
	case 4: //Mon..., Dec... 9 / mon 9 dec
		return str_replace(array('d','M','WD'),array($d,$month,$wkDay),$set['DMdFormat']);
	case 5: //Mon..., Dec... 9, 2020 / mon... 9 dec... 2020
		return str_replace(array('d','y','M','WD'),array($d,$y,$month,$wkDay),$set['DMdyFormat']);
	}
}

function makeFullDT($iso,$sda,$eda,$sti,$eti) { //make full date/time
	global $xx;
	$fullDT = $iso ? IDtoDD($sda) : $sda;
	if ($sti) { $fullDT .= " {$xx['at_time']} ".($iso ? ITtoDT($sti) : $sti); }
	if ($eda or $eti) { $fullDT .= ' -'; }
	if ($eda) { $fullDT .= ' '.($iso ? IDtoDD($eda) : $eda).($eti ? " {$xx['at_time']}" : ''); }
	if ($eti) { $fullDT .= ' '.($iso ? ITtoDT($eti) : $eti); }
	if (!$sti and !$eti) { $fullDT .= " {$xx['vws_all_day']}"; }
	return $fullDT;
}

function makeHead(&$evt,$template,$date) { //make event head for MWD views
	global $usr, $set, $xx;

	if (strpos($template,'|',1)) {
		$sections = true;
		$template = '|'.trim($template,'|').'|';
	} else {
		$sections = false;
	}
	preg_match_all('~(#ts|#tx|#e|#o|#v|#lv|#c|#lc|#a|#x1|#lx1|#x2|#lx2|#/)~i',$template,$comps); //split components
	$keys = $comps[1];
	$html = array();
	foreach($keys as $c) { //process components
		$subStr = '';
		switch ($c) {
		case '#ts':
			if ($evt['mde']) {
				$subStr = makeHovT($evt);
			} elseif ($evt['sti']) {
				$subStr = ITtoDT($evt['sti']);
			}
			break;
		case '#tx':
			if (!$evt['ald']) {
				$subStr = makeHovT($evt);
			}
			break;
		case '#e':
			$subStr = $evt['tit'];
			break;
		case '#o':
			$subStr = $evt['una'];
			break;
		case '#lv':
		case '#v':
			if ($evt['ven']) {
				if ($c[1] == 'l') { $subStr = $xx['evt_venue'].': '; }
				$subStr .= str_replace('<a ','<a onclick="event.stopPropagation();" ',makeVenue($evt['ven']));
			}
			break;
		case '#lc':
		case '#c':
			$subStr = ($c[1] == 'l' ? $xx['evt_category'].': ': '').$evt['cnm'];
			break;
		case '#a':
			$age = ($evt['rpt'] == 4 and preg_match('%\(((?:19|20)\d\d)\)%',$evt['des'],$year)) ? strval(substr($date,0,4) - $year[1]) : '';
			if ($age) { $subStr = $age; }
			break;
		case '#lx1':
		case '#x1':
			if ($usr['privs'] >= $set['xField1Rights'] and $evt['xf1']) {
				if ($c[1] == 'l') { $subStr = ($set['xField1Label'] ? $set['xField1Label'] : $xx['sch_extra_field1']).': '; }
				$subStr .= str_replace('<a ','<a onclick="event.stopPropagation();" ',$evt['xf1']);
			}
			break;
		case '#lx2':
		case '#x2':
			if ($usr['privs'] >= $set['xField2Rights'] and $evt['xf2']) {
				if ($c[1] == 'l') { $subStr = ($set['xField2Label'] ? $set['xField2Label'] : $xx['sch_extra_field2']).': '; }
				$subStr .= str_replace('<a ','<a onclick="event.stopPropagation();" ',$evt['xf2']);
			}
			break;
		case '#/':
			$subStr = '<br>';
		}
		if ($subStr or !$sections) {
			$html[] = $subStr;
		} else {
			$template = preg_replace("~(\|)[^|]*({$c})[^|]*(\|)~",'$1$2$3',$template); //component empty
			$html[] = '';
		}
	}
	$keys[] = '|'; //remove separators
	$html[] = '';
	$evtStr = str_replace($keys,$html,$template);
	return preg_replace(array("~(<br>\s*)+~","~(<br>\s*)+$~"),array('<br>',''),$evtStr); //remove empty lines
}

function makeVenue($venue) { //make venue field
	global $set, $xx;

	if ($venue) {
		if ($set['mapViewer'] and preg_match("%^([^!]*)!\s*([^!$]+)\s*(?:!\s*(.*)|$)%",$venue,$matches)) {
			$urlAddr = urlencode($matches[2]);
			$mapLink = " <a title='{$matches[2]}' href='{$set['mapViewer']}{$urlAddr}' target='_blank'><button>{$xx['vws_address']}</button></a>";
			$suffix = empty($matches[3]) ? '' : ' '.$matches[3];
			return $matches[1].$mapLink.$suffix;
		} else {
			return str_replace('!','',$venue);
		}
	}
	return '';
}

function makeHovT(&$evt) { //make hover box time
	global $xx;
	switch ($evt['mde']) { //multi-day event?
		case 0: return $evt['ald'] ? $xx['vws_all_day'] : ITtoDT($evt['sti']).($evt['eti'] ? ' - '.ITtoDT($evt['eti']) : ''); break; //no
		case 1: return (($evt['sti'] != '00:00' and $evt['sti'] != '') ? ITtoDT($evt['sti']) : '&bull;').'&middot;&middot;&middot;'; break; //first
		case 2: return '&middot;&middot;&middot;'; break; //in between
		case 3: return '&middot;&middot;&middot;'.(($evt['eti'] < '23:59' and $evt['eti'] != '') ? ITtoDT($evt['eti']) : '&bull;'); //last
	}
}

function makePopAttrib(&$evt,$date,$noImg=0) { //make hover box pop attribute
	global $set, $winXS, $eDetails;
	if (!$set['evtTemplPop']) { return ''; } //no pop fields specified in template
		$time = makeHovT($evt);
		$chBox = '';
		if ($evt['cbx']) {
			$chBox = "<span class='chkBox'>".(strpos($evt['chd'],$date) ? $evt['cmk'] : '&#x2610;')."</span>";
		}
		$popText = "<b>{$chBox} {$time}: {$evt['tix']}</b><br>";
		if ($eDetails or $evt['mayE']) {
			$popText .= makeE($evt,$set['evtTemplPop'],'br','<br>');
		}
		if ($noImg) { $popText = preg_replace('~<img.+?>~i','',$popText); } //remove images
		$popText = htmlspecialchars(addslashes($popText));
		$popClass = (($evt['mde'] or $evt['r_t']) ? 'repeat' : 'normal').($evt['pri'] ? ' private' : '');
		$appClass = ($evt['app'] and !$evt['apd']) ? " class=\'toAppr\'" : '';
		$maxChars = $winXS ? 35 : 80;
		$popAttrib = " onmouseover=\"pop(this,'<div{$appClass}>{$popText}</div>','{$popClass}',{$maxChars})\"";
		return $popAttrib;
}

function colorStyle(&$evt,$defBgd='') { //make event color style
	global $set;

	$defBgd = $defBgd ? 'background-color:'.$defBgd.';' : '';
	if ($set['eventColor'] == 1) { //cat color
		$eStyle = ($evt['cco'] ? 'color:'.$evt['cco'].';' : '').($evt['cbg'] ? 'background-color:'.$evt['cbg'].';' : $defBgd);
	} elseif ($set['eventColor'] == 2) { //group color
		$eStyle = $evt['uco'] ? 'background-color:'.$evt['uco'].';' : $defBgd;
	} else {
		$eStyle = $defBgd;
	}
	return $eStyle;
}

function checkBox(&$evt,$date,$mde='') { //make 'complete' check box
	global $usr;

	$mayCheck = ($usr['privs'] > 2 or ($usr['privs'] > 1 and $evt['uid'] == $usr['ID'])); //boolean
	$chBox = !($mde and $evt['mde']) ? (strpos($evt['chd'],$date) ? $evt['cmk'] : '&#x2610;') : '?';
	$cBoxAtt = ($mayCheck and !($mde and $evt['mde'])) ? "class='chkBox point' onclick=\"checkE(this,{$evt['eid']},'{$date}',{$usr['ID']}); event.stopPropagation();\"" : 'class="chkBox arrow" onclick="event.stopPropagation();"';
	return "<span title='{$evt['clb']}' {$cBoxAtt}>{$chBox}</span>";
}

function repeatText($type,$interval,$period,$rmonth,$until) { //make repeat text
	global $xx, $months, $wkDays;

	switch ($type) {
		case -1: $repTxt = "<b>{$xx['evt_repeat_not_supported']}</b>"; break;
		case 0: $repTxt = ''; break;
		case 1: $repTxt = $xx['evt_repeat_on'].' '.$interval.' '.$xx['evt_period1_'.$period]; break;
		case 2: $repTxt = $xx['evt_repeat_on'].' '.$xx['evt_interval2_'.$interval].' '.$wkDays[$period].' '.$xx['of'].' '.($rmonth ? $months[$rmonth-1] : $xx['evt_each_month']);
	}
	if ($type > 0 and $until and $until[0] != 9) {
		$repTxt .= " {$xx['evt_until']} ".IDtoDD($until);
	}
	return $repTxt;
}

function makeE(&$evt,$template,$type,$glue,$show = '12345678') { //make event body using template
	global $set, $usr, $xx;

	if ($usr['privs'] < $set['xField1Rights']) { $show = str_replace('4','',$show); } //exclude xField 1
	if ($usr['privs'] < $set['xField2Rights']) { $show = str_replace('5','',$show); } //exclude xField 2

	$eArray = array();
	if ($type[0] == 'b') { //type br
		foreach (str_split($template) as $fieldNr) {
			if (strpos($show,$fieldNr) === false) { continue; }
			switch ($fieldNr) {
			case '1': 
				if ($evt['ven']) { $eArray[] = "{$xx['evt_venue']}: ".makeVenue($evt['ven']); }
				break;
			case '2':
				$eArray[] = "{$xx['evt_category']}: {$evt['cnm']}".($evt['snm'] ? " - {$evt['snm']}" : ''); break;
			case '3':
				if ($evt['des']) { $eArray[] = $type[1] == 'x' ? hyperImg($evt['des']) : $evt['des']; } break;
			case '4':
				if ($evt['xf1']) { $eArray[] = ($set['xField1Label'] ? "{$set['xField1Label']}: " : '').($type[1] == 'x' ? hyperImg($evt['xf1']) : $evt['xf1']); } break;
			case '5':
				if ($evt['xf2']) { $eArray[] = ($set['xField2Label'] ? "{$set['xField2Label']}: " : '').($type[1] == 'x' ? hyperImg($evt['xf2']) : $evt['xf2']); } break;
			case '6':
				if ($evt['nom'] >= 0) { $eArray[] = "{$xx['vws_notify']}: {$evt['nom']} {$xx['vws_days']}"; } break;
				if ($evt['nos'] >= 0) { $eArray[] = "{$xx['vws_notify']}: {$evt['nos']} {$xx['vws_days']}"; } break;
			case '7':
				$eArray[] = "{$xx['vws_added']}: ".IDTtoDDT($evt['adt'])." ({$evt['una']})";
				if ($evt['mdt'] and $evt['edr']) { $eArray[] = "{$xx['vws_edited']}: ".IDTtoDDT($evt['mdt'])." ({$evt['edr']})"; }
				break;
			case '8':
				if ($evt['att']) {
					$attachments = array();
					foreach(explode(';',trim($evt['att'],';')) as $attachment) {
						$attachments[] = "<a title='{$xx['evt_click_to_open']}' href='".calRootUrl()."dloader.php?ftd=./attachments/".rawurlencode($attachment)."&amp;nwN=".substr($attachment,14)."'>".substr($attachment,14)."</a>";
					}
					$eArray[] = $xx['evt_attachments'].': '.implode(', ',$attachments);
				}
			}
		}
	} else { //type td
		foreach (str_split($template) as $fieldNr) {
			if (strpos($show,$fieldNr) === false) { continue; }
			switch ($fieldNr) {
			case '1':
				if ($evt['ven']) { $eArray[] = "<tr><td>{$xx['evt_venue']}:</td><td>".makeVenue($evt['ven'])."</td></tr>"; }
				break;
			case '2':
				$eArray[] = "<tr><td>{$xx['evt_category']}:</td><td>{$evt['cnm']}".($evt['snm'] ? " - {$evt['snm']}" : '')."</td></tr>"; break;
			case '3':
				if ($evt['des']) { $eArray[] = "<tr><td>{$xx['evt_description']}:</td><td>".($type[1] == 'x' ? hyperImg($evt['des']) : $evt['des'])."</td></tr>"; } break;
			case '4':
				if ($evt['xf1']) { $eArray[] = "<tr><td>".($set['xField1Label'] ? "{$set['xField1Label']}: " : '')."</td><td>".($type[1] == 'x' ? hyperImg($evt['xf1']) : $evt['xf1'])."</td></tr>"; } break;
			case '5':
				if ($evt['xf2']) { $eArray[] = "<tr><td>".($set['xField2Label'] ? "{$set['xField2Label']}: " : '')."</td><td>".($type[1] == 'x' ? hyperImg($evt['xf2']) : $evt['xf2'])."</td></tr>"; } break;
			case '6':
				if ($evt['nom'] >= 0) { $eArray[] = "<tr><td>{$xx['vws_notify']}:</td><td>{$evt['nom']} {$xx['vws_days']}</td></tr>"; } break;
				if ($evt['nos'] >= 0) { $eArray[] = "<tr><td>{$xx['vws_notify']}:</td><td>{$evt['nos']} {$xx['vws_days']}</td></tr>"; } break;
			case '7':
				$eArray[] = "<tr><td>{$xx['vws_added']}:</td><td>".IDTtoDDT($evt['adt'])." ({$evt['una']})</td></tr>";
				if ($evt['mdt'] and $evt['edr']) { $eArray[] = "<tr><td>{$xx['vws_edited']}:</td><td>".IDTtoDDT($evt['mdt'])." ({$evt['edr']})</td></tr>"; }
				break;
			case '8':
				if ($evt['att']) {
					$label = $xx['evt_attachments'].':';
					foreach(explode(';',trim($evt['att'],';')) as $attachment) {
						$eArray[] = "<tr><td>{$label}</td><td><a title='{$xx['evt_click_to_open']}' href='".calRootUrl()."dloader.php?ftd=./attachments/".rawurlencode($attachment)."&amp;nwN=".substr($attachment,14)."'>".substr($attachment,14)."</a></td></tr>";
						$label = '';
					}
				}
			}
		}
	}
	return implode($glue,$eArray);
}

//
//Check on overlap. For recurring events look ahead $chkYears years
//
function overlap($eid,$cid,$sDate,$eDate,$sTime,$eTime,$catRpt,$catNol,$catOlg,$catOem,$r_t,$r_i,$r_p,$r_m,$r_u) { //check for no overlap
	global $evtList, $usr, $nowTS;
	
	//Number of years to look ahead for overlaps
	$chkYears = 2;
	
	//prepare overlap test
	if ($catNol == 0) { //check against all "no overlap at all"
		$filter = "(c.`noverlap` = 2)";
	} elseif ($catNol == 1) { //check against all existing "no overlap in same cat" and "no overlap at all"
		$filter = "((c.`noverlap` = 1 AND c.`ID` = $cid) OR c.`noverlap` = 2)".($eid ? " AND e.`ID` != {$eid}" : ''); //if update, exclude event self		
	} elseif ($catNol == 2) { //check against all events
		$filter = $eid ? "(e.`ID` != {$eid})" : ''; //if update, exclude event self
	}
	$usrPrivs = $usr['privs']; //set privs temporary to admin to catch all events
	$usr['privs'] = 9;
	$dUts = ($eDate[0] != '9') ? strtotime($eDate) - strtotime($sDate) : 0; //delta start date - end date uts
	if ($eTime[0] == '9') { $eTime = $sTime; } //no end time

	if ($catRpt > 0) { //cat repeat overrides
		$r_t = $r_i = 1;
		$r_p = $catRpt;
		$r_u = '9999-00-00';
	}
	if ($r_t == 2) {
		$sDate = nextRdate2($sDate,$r_i,$r_p,$r_m,0); //1st occurrence of xth <dayname> in month y
	}
	//now $sDate is the first date for $r_t = 0, 1 or 2
	$eDate = $dUts > 0 ? date("Y-m-d",strtotime($sDate) + $dUts) : $sDate;
	if (!$r_u) { $r_u = '9999-00-00'; }
	$uDate = min($r_u,date("Y-m-d",$nowTS + (32000000 * $chkYears))); //check until date ($r_u or $lookAhead years)
	$oDate = $oMsg = '';
	do {
		//retrieve 'no-overlap' events in same date/time bracket
		$sTimeNew = strtotime($sDate.' '.$sTime.':00');
		$eTimeNew = strtotime($eDate.' '.$eTime.':00');
		retrieve($sDate,$eDate,'',$filter);
		//overlap check
		foreach ($evtList as $date => $calEvts) {
			foreach ($calEvts as $evt) { //check events on this day
				if (!$evt['sti'] or $evt['mde'] >= 2) { $evt['sti'] = '00:00'; } //no sti or mde not the first day
				if (!$evt['eti'] or $evt['mde'] == 1 or $evt['mde'] == 2) { $evt['eti'] = '23:59'; } //no eti or mde not the last day
				$sTimeCal = strtotime($date.' '.$evt['sti'].':00');
				$eTimeCal = strtotime($date.' '.$evt['eti'].':00');
				if ($catNol == $evt['nol']) { //both 1 => always same cat; both 2 => same or diff cats
					$minGap = max($catOlg,$evt['olg']); //biggest gap
				} elseif ($catNol < $evt['nol']) {
					$minGap = $evt['olg']; //gap of existing event
				} else {
					$minGap = $catOlg; //gap of new event
				}
				if ($sTimeNew < ($eTimeCal + ($minGap * 60)) and ($eTimeNew + ($minGap * 60)) > $sTimeCal) { //overlap
					$oMsg = $catOem ? $catOem : $evt['oem']; //overlap error message
					$oDate = $date;
					break 3;
				}
			}
		}
		if ($r_t > 0) {
			$sDate = ($r_t == 1) ? nextRdate1($sDate,$r_i,$r_p) : nextRdate2($sDate,$r_i,$r_p,$r_m,1);
			$eDate = date("Y-m-d",strtotime($sDate) + $dUts);
		}
	} while ($r_t > 0 and $sDate < $uDate);
	$usr['privs'] = $usrPrivs; //restore privs
	return $oMsg ? IDtoDD($oDate).': '.$oMsg : '';
}

//
//Compute next event start date - repeat every xth ($rI) day, week, month or year ($rP)
//
function nextRdate1($curD, $rI, $rP) {
	$curT = strtotime($curD.' 12:00:00');
	$curDoM = date('j',$curT);
	switch ($rP) { //period
	case 1: //day
		$nUts = strtotime("+$rI days",$curT); break;
	case 2: //week
		$nUts =  strtotime("+$rI weeks",$curT); break;
	case 3: //month
		$i = 1;
		while(date('j',strtotime('+'.$i*$rI.' months',$curT)) != $curDoM) { $i++; } //deal with 31st
		$nUts =  strtotime('+'.$i*$rI.' months',$curT); break;
	case 4: //year
		$i = 1;
		while(date('j',strtotime('+'.$i*$rI.' years',$curT)) != $curDoM) { $i++; } //deal with 29/02
		$nUts =  strtotime('+'.$i*$rI.' years',$curT); break;
	}
	return date("Y-m-d",$nUts);
}

//
//Compute next event start date - repeat on the xth ($rI) <dayname> ($rP) of month y ($rM)
//
function nextRdate2($curD, $rI, $rP, $rM, $i) { //$i=0: 1st occurrence; $i=1: next occurrence
	if ($rM) {
		$curM = $rM; //one specific month
		$curY = substr($curD,0,4)+$i+((substr($curD,5,2) <= $rM) ? 0 : 1);
	} else { //each month
		$curM = substr($curD,5,2)+$i;
		$curY = substr($curD,0,4);
	}
	$day1Ts = mktime(12,0,0,$curM,1,$curY);
	$dowDif = $rP - date('N',$day1Ts); //day of week difference
	$offset = $dowDif + 7 * $rI;
	if ($dowDif >= 0) { $offset -= 7; }
	if ($offset >= date('t',$day1Ts)) { $offset -= 7; } //'t': number of days in the month
	return date("Y-m-d",$day1Ts + (86400 * $offset));
}

//expand images to image hyperlinks
function hyperImg($text) {
	global $rxIMGTags;
	
	return preg_replace($rxIMGTags,"<a href='./thumbnails/$1' target='_blank'>$0</a>",$text);
}

//get calendar base URL (used at install)
function calBaseUrl() {
	$httpX = (!empty($_SERVER['HTTPS']) and $_SERVER['HTTPS'] != 'off') ? 'https' : 'http'; 
	$baseUrl = $httpX.'://'.$_SERVER['SERVER_NAME'];
	if ($_SERVER["SERVER_PORT"] != '80') {
		$baseUrl .= ':'.$_SERVER['SERVER_PORT'];
	}
	$baseUrl .= rtrim(dirname($_SERVER["PHP_SELF"]),'/').'/'; // add calendar directory
	return $baseUrl;
}

//get calendar root URL
function calRootUrl() {
	global $set;

	$rootUrl = strstr($set['calendarUrl'].'?','?',true);
	$rootUrl = strstr($rootUrl.'/index.php','/index.php',true);
	return rtrim($rootUrl,'/').'/';
}

//add URL, IMG and EML links
function addUrlImgEmlTags($html,$uie='xxx') {
	global $rxURL, $rxIMG, $rxEML, $xx;

	if ($uie[0] == 'x') { //create URL links
		$html = preg_replace_callback($rxURL,function ($m) { return "{$m[1]}<a class='link' href='{$m[2]}{$m[3]}' target='_blank'>".(!empty($m[4])?$m[4]:$m[3])."</a>{$m[5]}"; },$html);
	}
	if ($uie[1] == 'x') { //create image links
		$html = preg_replace_callback($rxIMG,function ($m) { return "{$m[1]}<img class='thNail' src='".calRootUrl()."thumbnails/{$m[2]}' alt='{$m[2]}'>{$m[3]}"; },$html);
	}
	if ($uie[2] == 'x') { //create email links
		$html = preg_replace_callback($rxEML,function ($m) { global $tit, $xx; return "{$m[1]}<a class='link' href='#' onclick=\"sml('{$m[2]}','{$m[3]}','{$m[4]}','[cd] - {$tit}'); return false;\">".(!empty($m[5])?$m[5]:$xx['vws_send_mail'])."</a>{$m[6]}"; },$html);
	}
	return $html;
}

//remove URL, IMG and EML links
function remUrlImgEmlTags($html,$uie='xxx') {
	global $rxULink, $rxIMGTags, $rxELink;

	if ($uie[0] == 'x') { //remove URL links
		$html = preg_replace_callback($rxULink,function ($m) { return $m[1].($m[2]!=$m[3]?" [".$m[3]."]":""); },$html);
	}
	if ($uie[1] == 'x') { //remove image links
		$html = preg_replace($rxIMGTags,"$1",$html);
	}
	if ($uie[2] == 'x') { //remove email links
		$html = preg_replace($rxELink,"$1@$2.$3 [$4]",$html);
	}
	return $html;
}

//chunk split unicode string
function chunk_split_unicode($str,$len,$eol) {
	$chunks = array_chunk(preg_split('%%u',$str,-1,PREG_SPLIT_NO_EMPTY),$len);
	$str = '';
	foreach ($chunks as $chunk) {
		$str .= implode($chunk).$eol;
	}
	return rtrim($str);
}

//transliterate text string (e.g. file name)
function translit($text,$strict=false) {
	setlocale(LC_CTYPE,'en_US');
	$transText = iconv('UTF-8','ASCII//TRANSLIT',$text);
	if ($strict) {
		return str_replace(array(' ','/','\\','?','%','*','+',':',';','{','}',"'",'"'),'_',$transText);
	} else {
		return $transText;
	}
}

//validate GET vars
function validGetVars() {
	if (!empty($_GET)) {
		$passed = true;
		foreach ($_GET as $key => $value) { //validate GET vars
			switch ($key) {
			case 'cal': $passed = preg_match('~^\w{1,20}$~',$value); break;
			case 'cP': $passed = preg_match('~^(\d{1,2}|up)$~',$value); break;
			case 'cG': $passed = (is_array($value) and ctype_digit(implode($value))); break;
			case 'cU': $passed = (is_array($value) and ctype_digit(implode($value))); break;
			case 'cC': $passed = (is_array($value) and preg_match('~^[0-9\-]+$~',implode($value))); break;
			case 'cL': $passed = empty($value) ? true : preg_match('~^[a-zA-Z]{1,12}$~',$value); break;
			case 'cD': $passed = empty($value) ? true : preg_match('~^\d{4}-\d{2}-\d{2}$~',$value); break;
			case 'hdr': $passed = preg_match('~^(0|1|-1|-2)$~',$value); break;
			default: if (is_string($value)) $_GET[$key] = htmlspecialchars(strip_tags(trim($value)),ENT_QUOTES,'UTF-8');
			}
			if (!$passed) {
				logMessage('luxcal',2,'Access denied. Invalid GET variable ('.$key.'='.htmlspecialchars($value,ENT_QUOTES,'UTF-8').')');
				return "Invalid URL variable: {$key}";
			}
		}
	}
	return '';
}

//validate POST vars
function validPostVars($calID,$page) {
	$tknName = "LXCtkn_{$calID}:{$page}";
	if (!empty($_POST) and empty($_POST['winCh'])) {
		$error = ''; //init
		array_walk($_POST,function(&$v,$k) {if (is_string($v)) $v = strip_tags(trim($v),'<a><b><i><u><s><img><center>');}); //strip HTML tags
		if (!$page) { $error = '#1<br><br>#2'; $cause = 'unknown source page'; }			
		elseif (empty($_SESSION[$tknName])) { $error = '#1<br><br>#2'; $cause = 'no token assigned'; }
		elseif (empty($_COOKIE[$tknName])) { $error = '#1<br><br>#2'; $cause = 'no token received'; }
		elseif ($_SESSION[$tknName] != $_COOKIE[$tknName]) { $error = '#3<br><br>#2.'; $cause = 'invalid token'; }
		if ($error) {
			logMessage('luxcal',2,"Access denied. Possible spoofed form submission.\n.{$cause}\nForm input keys:\n- ".implode("\n- ",array_keys($_POST)));
			note($cause);
			return $error;
		}
	}
	//no error
	if (isset($_SESSION[$tknName])) { unset($_SESSION[$tknName]); } //delete token
	if (isset($_COOKIE[$tknName])) { setcookie($tknName,'',time()-3600); } //remove cookie
	return '';
}

//log message
function logMessage($logName,$level,$logMsg,$script='-') {
	global $set;

	$calID = !empty($GLOBALS['calID']) ? $GLOBALS['calID'].':' : '';
	$levels = array(0 => 'CRONJOB','ERROR','WARNING','NOTICE');
	if ($level < 2 or ($level == 2 and $set['logWarnings']) or ($level == 3 and $set['logNotices'])) {
		date_default_timezone_set(@date_default_timezone_get());
		if ($script == '-') { $script = $_SERVER['PHP_SELF']; }
		$intro = "\n".date('Y.m.d H:i:s')." {$calID}{$levels[$level]} Script: ".htmlentities($script);
		file_put_contents("./logs/{$logName}.log","{$intro} - {$logMsg}",FILE_APPEND);
	}
}

//show message in footer
function note($msg,$force=false) {
	global $note, $set;

	if (!empty($set['maintMode']) or $force) { //calendar runs in maintenance mode
		if (!empty($note)) { $note .= ' / '.$msg; } else { $note = $msg; }
	}
}

//save selections to cookie LXCsel_<calID>
function saveLastSel($calID,$calPath) {
	global $set, $opt, $nowTS;

	if (!empty($_SESSION)) {
		$lastSel = array('cP' => $opt['cP'],'cG' => $opt['cG'],'cU' => $opt['cU'],'cC' => $opt['cC'],'cL' => $opt['cL']);
		setcookie("LXCsel_{$calID}", serialize($lastSel), $nowTS+(86400 * $set['cookieExp']),$calPath); //keep data for 'cookieExp' days
	}
}

//load selections from cookie LXCsel_<calID>
function loadLastSel($calID) {
	$lastSel = isset($_COOKIE["LXCsel_{$calID}"]) ? @unserialize($_COOKIE["LXCsel_{$calID}"]) : false;
	if ($lastSel) {
		$_SESSION[$calID]['cP'] = $lastSel['cP'];
		$_SESSION[$calID]['cG'] = isset($lastSel['cG']) ? $lastSel['cG'] : array(0); //cG in cookie as of V4.3
		$_SESSION[$calID]['cU'] = $lastSel['cU'];
		$_SESSION[$calID]['cC'] = $lastSel['cC'];
		$_SESSION[$calID]['cL'] = $lastSel['cL'];
	}
}
?>