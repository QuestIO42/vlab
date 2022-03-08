<?php
/*
= LuxCal add/edit event page =

This file is part of the LuxCal Web Calendar.
Copyright 2009-2020 LuxSoft - www.LuxSoft.eu
License https://www.gnu.org/licenses/gpl.html GPL version 3

The LuxCal Web Calendar is distributed WITHOUT ANY WARRANTY.
*/
?>

<?php
function notEmlNow(&$evt,$addrList,$what) { //notify added/edited/deleted event by email
	global $xx, $set, $nal, $apd, $tit, $cid, $sda, $eda, $sti, $eti, $r_t, $uid, $repTxt;
	
	//get category data
	$stH = stPrep("SELECT `name`,`approve`,`color`,`bgColor`,`checkBx`,`checkLb`,`checkMk` FROM `categories` WHERE `ID` = ?");
	stExec($stH,array($cid));
	$row = $stH->fetch(PDO::FETCH_ASSOC);
	$stH = null;
	
	//compose email message
	switch ($what) {
		case 'add': $noteText = $xx['evt_event_added']; break;
		case 'upd': $noteText = $xx['evt_event_edited']; break;
		case 'del': $noteText = $xx['evt_event_deleted']; break;
		case 'apd': $noteText = $xx['evt_event_approved'];
	}
	$dateTime = makeFullDT(false,$sda,$eda,$sti,$eti).($r_t ? " ({$repTxt})" : ''); //add full date/time and repeat text (display values)
	$evD = DDtoID($sda);
	$status = '';
	if (!$eda and !$r_t) { //no multi-day and not repeating
		if ($row['checkBx']) { $status .= $row['checkLb'].': '.(strpos($evt['chd'], $evD) ? $row['checkMk'] : '- -'); }
	}
	$subject = "{$noteText}: {$tit}";
	$catColor = ($row['color'] ? "color:{$row['color']};" : "").($row['bgColor'] ? "background-color:{$row['bgColor']};" : "");
	$eStyle = $catColor ? " style=\"{$catColor}\"" : "";
	$eBoxStyle = ' style="padding-left:5px;'.(($row['approve'] and !$apd) ? ' border-left:2px solid #ff0000;' : '').'"';
	$fields = '12378'.($set['xField1Rights'] == 1 ? '4' : '').($set['xField2Rights'] == 1 ? '5' : ''); //add xFields
	$evtText = makeE($evt,$set['evtTemplGen'],'td','',$fields);
	$msgBody = "
<h5>{$noteText}:</h5>
<br>
<table{$eBoxStyle}>
	<tr><td>{$xx['evt_title']}:</td><td><b><span{$eStyle}>{$tit}</span></b></td></tr>
	".($status ? "<tr><td>{$xx['evt_status']}:</td><td>{$status}</td></tr>" : '')."
	<tr><td>{$xx['evt_date_time']}:</td><td>{$dateTime}</td></tr>
	{$evtText}
</table>
";
	$sender = $set['notSenderEml'] ? $uid : 0;
	sendEml($subject,$msgBody,$addrList,0,$sender,$evD); //send email notification
}

function notSmsNow($addrList,$evtID) { //notify event now by SMS
	global $set, $tit, $ven, $uid, $sda, $eda, $sti, $eti;
	
	$dateTime = makeFullDT(false,$sda,$eda,$sti,$eti); //get full date/time (display values)
	$smsMsg = $dateTime.': '.$tit; //SMS message
	if ($ven) { $smsMsg .= "\n{$ven}"; }
	$sender = $set['notSenderSms'] ? $uid : 0;
	sendSms($smsMsg,$addrList,$sender,$evtID); //send SMS notification
}

//get input params
$eid = isset($_REQUEST['eid']) ? $_REQUEST['eid'] : 0;
$evD = isset($_REQUEST['evD']) ? $_REQUEST['evD'] : '';
$evTs = isset($_REQUEST['evTs']) ? $_REQUEST['evTs'] : '';
$evTe = isset($_REQUEST['evTe']) ? $_REQUEST['evTe'] : '';
$catID = isset($_REQUEST['catID']) ? $_REQUEST['catID'] : '';

//sanity check
if (empty($lcV) or
		(isset($action) and !preg_match('%^(add|edi|upd|del)%',$action)) or
		(isset($eid) and !preg_match('%^\d{1,8}$%',$eid)) or
		(!empty($evD) and !preg_match('%^\d{2,4}-\d{2}-\d{2,4}$%',$evD)) or
		(!empty($evTs) and !preg_match('%^\d{2}:\d{2}$%',$evTs)) or
		(!empty($evTe) and !preg_match('%^\d{2}:\d{2}$%',$evTe)) or
		(!empty($catID) and !preg_match('%^\d+$%', $catID))
	) { exit("not permitted -{$action}-(".substr(basename(__FILE__),0,-4).')'); }

//set actions & mode
$close = $exec = false;
$ediN = (isset($_POST['ediN'])) ? $_POST['ediN'] : 0; //0: not relevant, 1: occurrence, 2: series
if (!isset($_REQUEST['action'])) {
	$refresh = true;
} else {
	$refresh = false;
	$mode = substr($_REQUEST['action'],0,3); //edi, add, upd or del
	$exec = strpos($_REQUEST['action'],'exe') ? true : false;
	$close = strpos($_REQUEST['action'],'cls') ? true : false;
	if ($mode == 'edi' and is_numeric($_REQUEST['action'][3])) { $ediN = $_REQUEST['action'][3]; } //0: not relevant, 1: occurrence, 2: series
}

//init
$eMsg = $wMsg = $cMsg = '';
$todayDT = date("Y-m-d H:i");
$todayD = substr($todayDT,0,10);

//init event data
if ($mode == 'edi' and !$refresh) { //show/edit event
	$stH = stPrep("
		SELECT e.*,u.`name` AS own
		FROM `events` e
		INNER JOIN `users` u ON u.`ID` = e.`userID`
		WHERE e.`ID` = ?");
	stExec($stH,array($eid));
	$row = $stH->fetch(PDO::FETCH_ASSOC);
	$stH = null;
	//remember non-input fields
	$_SESSION['evt']['adt'] = $row['aDateTime'];
	$_SESSION['evt']['mdt'] = $row['mDateTime'][0] != '9' ? $row['mDateTime'] : '';
	$_SESSION['evt']['edr'] = $row['editor'];
	$_SESSION['evt']['own'] = $row['own'];
	$_SESSION['evt']['xda'] = $row['xDates'];
	$_SESSION['evt']['apd'] = $row['approved'];
	$_SESSION['evt']['chd'] = $row['checked'];
	//input fields
	$tit = $row['title'];
	$ven = $row['venue'];
	$tx1 = $row['text1'];
	$tx2 = $row['text2'];
	$tx3 = $row['text3'];
	$des = remUrlImgEmlTags($tx1); //remove URL, image and email tags
	$xf1 = remUrlImgEmlTags($tx2);
	$xf2 = remUrlImgEmlTags($tx3);
	list($des,$xf1,$xf2) = str_replace(array("<br>","<br />"),"\r\n",array($des,$xf1,$xf2)); //replace <br> by crlf
	$att = $row['attach'];
	$cid = $row['catID'];
	$sid = $row['scatID'];
	$uid = $row['userID'];
	$nal = ($row['notRecip']) ? $row["notRecip"] : ($set['defRecips'] ? $set['defRecips'] : $usr['mail']);
	$apd = $row['approved'];
	$pri = $row['private'];
	if ($ediN == 1) {
		$sda = IDtoDD($evD);
		$eda = "";
		$r_t = 0;
	} else {
		$sda = IDtoDD($row['sDate']);
		$eda = ($row['eDate'][0] != "9") ? IDtoDD($row['eDate']) : '';
		$r_t = $row['rType'];
	}
	$sti = ITtoDT($row['sTime']);
	$eti = ($row['eTime'][0] != "9") ? ITtoDT($row['eTime']) : '';
	$ri1 = $rp1 = 1;
	$ri2 = $rp2 = 0;
	if ($r_t == 1) {
		$ri1 = $row['rInterval'];
		$rp1 = $row['rPeriod'];
	} elseif ($r_t == 2) {
		$ri2 = $row['rInterval'];
		$rp2 = $row['rPeriod'];
	}
	$r_m = $row['rMonth'];
	$rul = ($row['rUntil'][0] != "9") ? IDtoDD($row['rUntil']) : '';
	$nom = $row['notEml'];
	$nos = $row['notSms'];
} else { //add, upd or refresh
	if ($mode == 'add') { //init (in case of clone)
		$eid = 0;
		$_SESSION['evt']['own'] = $usr['name'];
		$_SESSION['evt']['edr'] = '';
		$_SESSION['evt']['xda'] = '';
		$_SESSION['evt']['apd'] = 0;
		$_SESSION['evt']['chd'] = '';
		$_SESSION['evt']['adt'] = $todayDT;
		$_SESSION['evt']['mdt'] = '';
	} else { //upd
		$_SESSION['evt']['edr'] = $usr['name'];
		$_SESSION['evt']['mdt'] = $todayDT;
	}
	$uid = isset($_POST['uid']) ? $_POST['uid'] : (isset($_POST['oUid']) ? $_POST['oUid'] : $usr['ID']);
	$tit = isset($_POST['tit']) ? strip_tags(trim($_POST['tit']),'<b><i><u><s><center>') : '';
	$ven = isset($_POST['ven']) ? strip_tags(trim($_POST['ven']),'<b><i><u><s><center>') : $set['defVenue'];
	$des = isset($_POST['des']) ? strip_tags(trim($_POST['des']),'<a><b><i><u><s><img>') : '';
	$xf1 = isset($_POST['xf1']) ? strip_tags(trim($_POST['xf1']),'<a><b><i><u><s><img>') : '';
	$xf2 = isset($_POST['xf2']) ? strip_tags(trim($_POST['xf2']),'<a><b><i><u><s><img>') : '';
	$att = isset($_POST['att']) ? $_POST['att'] : '';
	$eCats = explode(',',$usr['eCats']);
	$cid = isset($_POST['cid']) ? $_POST['cid'] : ($eCats[0] == '0' ? 1 : intval($eCats[0]));
	$sid = isset($_POST['sid']) ? $_POST['sid'] : 0;
	$nal = isset($_POST['nal']) ? trim($_POST['nal']," ;") : ($set['defRecips'] ? $set['defRecips'] : $usr['mail']);
	$apd = !empty($_POST['apd']) ? 1 : 0;
	$pri = $set['privEvents'] == 3 ? 1 : (($set['privEvents'] == 0 or !$usr['pEvts']) ? 0 : (empty($_POST['pri']) ? 0 : 1));
	$sda = isset($_POST['sda']) ? $_POST['sda'] : '';
	$eda = isset($_POST['eda']) ? $_POST['eda'] : '';
	$sti = isset($_POST['sti']) ? $_POST['sti'] : '';
	$eti = isset($_POST['eti']) ? $_POST['eti'] : '';
	$r_t = isset($_POST['r_t']) ? $_POST['r_t'] : 0;
	$ri1 = isset($_POST['ri1']) ? $_POST['ri1'] : 1;
	$rp1 = isset($_POST['rp1']) ? $_POST['rp1'] : 1;
	$ri2 = isset($_POST['ri2']) ? $_POST['ri2'] : 0;
	$rp2 = isset($_POST['rp2']) ? $_POST['rp2'] : 0;
	$r_m = isset($_POST['rpm']) ? $_POST['rpm'] : 0;
	$rul = isset($_POST['rul']) ? $_POST['rul'] : '';
	$nom = isset($_POST['nom']) ? $_POST['nom'] : -1;
	$nos = isset($_POST['nos']) ? $_POST['nos'] : -1;

	if ($mode == "add" and !$refresh) { //add event - preset date/times if available
		if (!empty($evD) and empty($sda)) { $sda = IDtoDD($evD); }
		if (!empty($evTs)) { $sti = ITtoDT($evTs); }
		if (!empty($evTe)) { $eti = ITtoDT($evTe); }
		if (!empty($catID)) { $cid = $catID; }
	}
}
//get category data
$stH = stPrep("SELECT * FROM `categories` WHERE `ID` = ?");
stExec($stH,array($cid));
$row = $stH->fetch(PDO::FETCH_ASSOC);
$stH = null; //release statement handle
$cat = array('cnm' => $row['name'], 'rpt' => $row['repeat'], 'nol' => $row['noverlap'], 'olg' => $row['olapGap'], 'oem' => $row['olErrMsg'], 'dur' => $row['defSlot'], 'fur' => $row['fixSlot'], 'app' => $row['approve'], 'col' => $row['color'], 'bco' => $row['bgColor'], 'sub' => array(array($row['subName1'], $row['subColor1'], $row['subBgrnd1']), array($row['subName2'], $row['subColor2'], $row['subBgrnd2']), array($row['subName3'], $row['subColor3'], $row['subBgrnd3']), array($row['subName4'], $row['subColor4'], $row['subBgrnd4'])));

if ($sda == $eda) { $eda = ''; } //reset end date if not used
$nen = isset($_POST['nen']) ? ($_POST['nen'] == 'yes' ? 1 : 0) : 0; //notify Eml now
$nsn = isset($_POST['nsn']) ? ($_POST['nsn'] == 'yes' ? 1 : 0) : 0; //notify SMS now
$oUid = isset($_POST['oUid']) ? $_POST['oUid'] : $uid; //remember original user ID

//set repeat params
$r_i = $r_t == 1 ? $ri1 : ($r_t == 2 ? $ri2 : 0);
$r_p = $r_t == 1 ? $rp1 : ($r_t == 2 ? $rp2 : 0);
$repTxt = repeatText($r_t,$r_i,$r_p,$r_m,DDtoID($rul)); //make repeat text
if (!$repTxt) { $repTxt = $xx['evt_no_repeat']; }

//all day event?
$ald = (isset($_POST['ald']) or ($set['aldDefault'] and $sti == ''));
if (DTtoIT($sti) == '00:00' and DTtoIT($eti) == '23:59') { $ald = true; }
if ($ald) { $sti = $eti = ''; }

//last minute edit rights check
$mayEdit = (
	($usr['eCats'] == '0' or strpos($usr['eCats'],strval($cid)) !== false) and
	($usr['privs'] > 2 or ($usr['privs'] == 2 and $uid == $usr['ID'])) and
	(!$cat['app'] or $apd or $usr['privs'] > 3 or $uid == $usr['ID'])
	);

//execute?
if (!$mayEdit or !$exec) goto noExe; //no

//add/update event
if ($mode == "add" or $mode == "upd" or $mode == "del") {
	$from = array('&',"'",'"');
	$to = array('&amp;',"&#039;",'&quot;');
	list($tit,$ven,$des,$xf1,$xf2) = str_replace($from,$to,array($tit,$ven,$des,$xf1,$xf2));
	$tx1Html = addUrlImgEmlTags($des); //add URL, image, mailto tags
	$tx2Html = addUrlImgEmlTags($xf1);
	$tx3Html = addUrlImgEmlTags($xf2);
	list($tx1Html,$tx2Html,$tx3Html) = str_replace(array("\r\n", "\n", "\r"), "<br>", array($tx1Html,$tx2Html,$tx3Html)); //replace newline by <br>
	//prepare $evtArr for messaging
	$snm = $sid ? $cat['sub'][($sid-1)][0] : '';
	$evtArr = array ('cnm' => $cat['cnm'], 'snm' => $snm, 'ven' => $ven, 'des' => $tx1Html, 'xf1' => $tx2Html, 'xf2' => $tx3Html, 'att' => $att, 'una' => $_SESSION['evt']['own'], 'edr' => $usr['name'], 'chd' => $_SESSION['evt']['chd'], 'adt' => $_SESSION['evt']['adt'], 'mdt' => $_SESSION['evt']['mdt']); //Html: with hyperlinks
}
if ($mode == "add" or $mode == "upd") {
	//validate input fields
	do {
		if (!$tit) { $eMsg .= $xx['evt_no_title']."<br>"; break; }
		if ($sda) {
			$sDate = DDtoID($sda);
			if (!$sDate) { $eMsg .= $xx['evt_bad_date'].": ".$sda."<br>"; break; }
		} else {
			$eMsg .= $xx['evt_no_start_date']."<br>"; break;
		}
		if ($eda) {
			$eDate = DDtoID($eda);
			if (!$eDate) { $eMsg .= $xx['evt_bad_date'].": ".$eda."<br>"; break; }
			if ($eDate < $sDate) { $eMsg .= $xx['evt_end_before_start_date']."<br>"; break; }
		} else { $eDate = '9999-00-00'; }
		if ($ald) { //all day
			$sTime = '00:00';
			$eTime = '23:59';
		} else {
			if ($sti) {
				$sTime = DTtoIT($sti);
				if (!$sTime) { $eMsg .= $xx['evt_bad_time'].": ".$sti."<br>"; break; }
			} elseif ($eDate[0] != '9') {
				$sTime = '00:00';
				$sti = ITtoDT('00:00');
			} else {
				$eMsg .= $xx['evt_no_start_time']."<br>"; break;
			}
			if ($eti) { //end time specified
				$eTime = DTtoIT($eti);
				if (!$eTime) { $eMsg .= $xx['evt_bad_time'].": ".$eti."<br>"; break; }
				if (($eDate[0] == '9' or $eDate == $sDate) and $eTime < $sTime) { $eMsg .= $xx['evt_end_before_start_time']."<br>"; break; }
				if ($sTime == $eTime and $eDate[0] == '9') { $eTime = '99:00'; }
			} else { //no end time
				if ($eDate[0] != '9') { //end date specified
					$eTime = '23:59';
				} else {
					$eTime = '99:00';
				}
			}
			if ($cat['dur'] and ($cat['fur'] or (!$eti and ($eDate[0] == '9')))) { //fixed / default event duration, re-compute eDate and eTime
				$eUnixTs = strtotime($sDate.' '.$sTime.':00') + ($cat['dur'] * 60);
				$eDate = date('Y-m-d',$eUnixTs);
				if ($eDate == $sDate) { $eDate = '9999-00-00'; }
				$eTime = date('H:i',$eUnixTs);
			}
		}
		if ($sTime == '00:00' and $eTime == '23:59') { $ald = true; }
		if ($r_t > 0 and $rul) {
			$runtil = DDtoID($rul);
			if (!$runtil) {
				$eMsg .= $xx['evt_bad_rdate'].": ".$rul."<br>"; break;
			} elseif ($runtil < $sDate) {
				$eMsg .= $xx['evt_until_before_start_date']."<br>"; break;
			}
		} else {
			$runtil = "9999-00-00";
		}
		if ($nom == '' or $nom == '-' or !$set['emlService']) {
			$nom = -1;
		} elseif (!ctype_digit($nom)) {
			$eMsg .= $xx['evt_not_days_invalid']."<br>"; break;
		} elseif ($sDate < date("Y-m-d",$nowTS + 86400 * $nom)) { //$nom >= 0
			$wMsg .= $xx['evt_not_in_past']."<br>";
		}
		if ($nos == '' or $nos == '-' or !$set['smsService']) {
			$nos = -1;
		} elseif (!ctype_digit($nos)) {
			$eMsg .= $xx['evt_not_days_invalid']."<br>"; break;
		} elseif ($sDate < date("Y-m-d",$nowTS + 86400 * $nos)) { //$nos >= 0
			$wMsg .= $xx['evt_not_in_past']."<br>";
		}
		if (($nom >= 0 or $nen or $nos >= 0 or $nsn) and strlen($nal) < 2) { $eMsg .= $xx['evt_no_recip_list']."<br>"; break; }
		if (strlen($nal) > 255) { $eMsg .= $xx['evt_recip_list_too_long']."<br>"; break; }
		if (!$pri) { //overlap test
			$errMsg = overlap($eid,$cid,$sDate,$eDate,$sTime,$eTime,$cat['rpt'],$cat['nol'],$cat['olg'],$cat['oem'],$r_t,$r_i,$r_p,$r_m,DDtoID($rul)); //check for overlap (same cat and all cats)
			if ($errMsg) { $eMsg .= $errMsg."<br>"; break; }
		}
		//no errors in form fields - so continue
		
		//if file(s) uploaded, save each file and update db
		if (!empty($_FILES['uplAtt'])) {
			foreach($_FILES['uplAtt']['name'] as $k => $fName) {
				if ($fName) {
					if ($_FILES['uplAtt']['error'][$k]) { $eMsg .= "{$fName}: {$xx['evt_error_file_upload']}<br>"; continue; }
					if (!stripos(','.$set['attTypes'],substr($fName,-4))) { $eMsg .= "{$fName}: {$xx['evt_no_pdf_img_vid']}<br>"; continue; }
					if ($_FILES['uplAtt']['size'][$k] > ($set['maxUplSize'] * 1048570)) { $eMsg .= "{$fName}: {$xx['evt_upload_too_large']}<br>"; continue; }
					$fName = str_replace(' ','_',$fName); //get rid of spaces
					$tsfName = date('YmdHis').$fName; //get timestamped file name
					move_uploaded_file($_FILES['uplAtt']['tmp_name'][$k],"./attachments/{$tsfName}");
					$att .= ";".$tsfName; //add file attachments in db
				}
			}
		}
		if ($eMsg) { $close = false; } //upload problem - don't close window

		//update database
		//if owner changed, default not recipient = owner email
		if ($uid != $oUid) {
			$stH = stPrep("SELECT `email` FROM `users` WHERE `ID` = ?");
			stExec($stH,array($uid));
			$row = $stH->fetch(PDO::FETCH_ASSOC);
			$stH = null;
			if ($row) {
				$nal = $row['email'];
			}
			$oUid = $uid; //set original user ID to current user
		}

		//update tables
		if ($mode == "add") { //add new event
			$q = "INSERT INTO `events` (`private`,`title`,`venue`,`text1`,`text2`,`text3`,`attach`,`catID`,`scatID`,`userID`,`approved`,`notEml`,`notSms`,`notRecip`,`sDate`,`eDate`,`sTime`,`eTime`,`rType`,`rInterval`,`rPeriod`,`rMonth`,`rUntil`,`aDateTime`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
			$stH = stPrep($q); //add to events table
			stExec($stH,array($pri,$tit,$ven,$tx1Html,$tx2Html,$tx3Html,$att,$cid,$sid,$uid,$apd,$nom,$nos,$nal,$sDate,$eDate,$sTime,$eTime,$r_t,$r_i,$r_p,$r_m,$runtil,$todayDT));
			$stH = null;
			$eid = dbLastRowId(); //set id to new event
			$cMsg .= $xx['evt_confirm_added'];
		} else { //update event
			$adtStamp = strtotime($_SESSION['evt']['adt']);
			$modDT = ($nowTS - $adtStamp > 600) ? $todayDT : '9999-00-00 00:00'; //mod time not set if < 10 mins passed
			if ($ediN != 1) { //update the series
				$stH = stPrep("UPDATE `events`
					SET `private`=?,`title`=?,`venue`=?,`text1`=?,`text2`=?,`text3`=?,`attach`=?,`catID`=?,`scatID`=?,`userID`=?,`editor`=?,`approved`=?,`notEml`=?,`notSms`=?,`notRecip`=?,`sDate`=?,`eDate`=?,`sTime`=?,`eTime`=?,`rType`=?,`rInterval`=?,`rPeriod`=?,`rMonth`=?,`rUntil`=?, `mDateTime`=?
					WHERE `ID`=?"); //update events table
				stExec($stH,array($pri,$tit,$ven,$tx1Html,$tx2Html,$tx3Html,$att,$cid,$sid,$uid,$usr['name'],$apd,$nom,$nos,$nal,$sDate,$eDate,$sTime,$eTime,$r_t,$r_i,$r_p,$r_m,$runtil,$modDT,$eid));
				$stH = null;
				$cMsg .= $xx['evt_confirm_saved'];
			} else { //update 1 occurrence
				$_SESSION['evt']['xda'] .= ';'.$evD;
				$stH = stPrep("UPDATE `events` SET `editor`=?,`xDates`=?,`mDateTime`=? WHERE `ID`=?");
				stExec($stH,array($usr['name'],$_SESSION['evt']['xda'],$todayDT,$eid)); //exclude date from series
				$stH = stPrep("INSERT INTO `events` (`private`,`title`,`venue`,`text1`,`text2`,`text3`,`attach`,`catID`,`scatID`,`userID`,`editor`,`approved`,`notEml`,`notSms`,`notRecip`,`sDate`,`eDate`,`sTime`,`eTime`,`rType`,`rInterval`,`rPeriod`,`rMonth`,`rUntil`,`aDateTime`,`mDateTime`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)"); //add new event
				stExec($stH,array($pri,$tit,$ven,$tx1Html,$tx2Html,$tx3Html,$att,$cid,$sid,$uid,$usr['name'],$apd,$nom,$nos,$nal,$sDate,$eDate,$sTime,$eTime,$r_t,$r_i,$r_p,$r_m,$runtil,$_SESSION['evt']['adt'],$todayDT,));
				$stH = null;
				$eid = dbLastRowId(); //set id to new event
				$ediN = 0;
				$cMsg .= $xx['evt_confirm_added'];
			}
		}

		//messaging
		if ($nen or ($nom == 0 and $sDate == $todayD)) { //notify now email
			notEmlNow($evtArr,$nal,$mode);
		}
		if ($nsn or ($nos == 0 and $sDate == $todayD)) { //notify now SMS
			notSmsNow($nal,$eid);
		}
		if ($apd and !$_SESSION['evt']['apd']) { //notify approval by email
			notEmlNow($evtArr,$_SESSION['evt']['own'],'apd');
		}
		if ($set['notifChange']) { //notify changes to recip list on settings page
			notEmlNow($evtArr,$set['chgRecipList'],$mode);
		}
		
		//refresh calendar and close event box 
		echo "\n<script>done('".($close ? 'cr' : 'r')."');</script>\n"; //c: close window, r: reload calendar
		$mode = "edi"; //not closed
	} while (false);
}

//delete event
if ($mode == "del") {
	if ($ediN != 1) { //delete series
		$stH = stPrep("UPDATE `events` SET `status`=-1,`editor`=?,`mDateTime`=? WHERE `ID`=?"); //delete
		stExec($stH,array($usr['name'],$todayDT,$eid));
	} else { //delete 1 occurrence
		$_SESSION['evt']['xda'] .= ';'.$evD;
		$stH = stPrep("UPDATE `events` SET `editor`=?,`xDates`=?,`mDateTime`=? WHERE `ID`=?"); //exclude date
		stExec($stH,array($usr['name'],$_SESSION['evt']['xda'],$todayDT,$eid));
		$ediN = 0;
	}
	$cMsg = $xx['evt_confirm_deleted'];
	
	//messaging
	if ($set['notifChange']) { //notify changes to recip list on settings page
		notEmlNow($evtArr,$set['chgRecipList'],$mode);
	}

	//refresh calendar and close event box
	echo "\n<script>done('".($close ? 'cr' : 'r')."');</script>\n"; //c: close window, r: reload calendar
	$mode = "add"; //not closed
}

noExe:

if ($cat['dur']) { //default event duration
	if ($cat['fur']) { //fixed event duration
		$ald = false;
		$wMsg .= str_replace(array('$1','$2'),array(intval($cat['dur'] / 60),substr('0'.($cat['dur'] % 60),-2)),$xx['evt_fixed_duration'])."<br>";
	} else {
		$wMsg .= str_replace(array('$1','$2'),array(intval($cat['dur'] / 60),substr('0'.($cat['dur'] % 60),-2)),$xx['evt_default_duration'])."<br>";
	}
}

if ($nom == -1) { $nom = ''; }
if ($nos == -1) { $nos = ''; }

if ($eMsg) echo "<p class='error'>{$eMsg}</p>\n";
if ($wMsg) echo "<p class='warning'>{$wMsg}</p>\n";
if ($cMsg) echo "<p class='confirm'>{$cMsg}</p>\n";

if ($mayEdit) {
	if (($r_t or $eda) and !($ediN or $refresh or $eMsg or $cMsg)) {
		require './pages/eventform0.php'; //ask series or occurence
	} else {
		require './pages/eventform1.php';
	}
} else {
	echo $xx['no_way'];
}
?>
