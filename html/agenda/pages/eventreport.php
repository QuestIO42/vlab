<?php
//sanity check
if (empty($lcV)) { exit('not permitted ('.substr(basename(__FILE__),0,-4).')'); } //launch via script only

$viaGet = isset($_GET['eid']) ? true : false; //stand-alone use of event report

//get input params
$eid = isset($_REQUEST['eid']) ? $_REQUEST['eid'] : 0;
$evD = isset($_POST['evD']) ? $_POST['evD'] : '';
$evDD = IDtoDD($evD); //selected date -  display format

//get event data
$stH = stPrep("
	SELECT e.*,u.`name` AS own
	FROM `events` e
	INNER JOIN `users` u ON u.`ID` = e.`userID`
	WHERE e.`ID` = ?");
stExec($stH,array($eid));
$row = $stH->fetch(PDO::FETCH_ASSOC);
$stH = null;
$adt = $row['aDateTime'];
$mdt = $row['mDateTime'][0] != '9' ? $row['mDateTime'] : "";
$edr = $row['editor'];
$tit = $row['title'];
$ven = $row['venue'];
$tx1 = str_replace('[cd]',$evDD,$row['text1']);
$tx2 = str_replace('[cd]',$evDD,$row['text2']);
$tx3 = str_replace('[cd]',$evDD,$row['text3']);
$att = $row['attach'];
$cid = $row['catID'];
$sid = $row['scatID'];
$uid = $row['userID'];
$nal = ($row['notRecip']) ? $row["notRecip"] : $usr['mail'];
$apd = $row['approved'];
$pri = $row['private'];
$sda = IDtoDD($row['sDate']);
$eda = ($row['eDate'][0] != "9") ? IDtoDD($row['eDate']) : "";
$sti = $row['sTime'];
$eti = $row['eTime'];
$r_t = $row['rType'];
$r_i = $row['rInterval'];
$r_p = $row['rPeriod'];
$r_m = $row['rMonth'];
$rul = ($row['rUntil'][0] != "9") ? $row['rUntil'] : '';
$nom = $row['notEml'] > -1 ? $row['notEml'] : '';
$nos = $row['notSms'] > -1 ? $row['notSms'] : '';
$own = $row['own'];

if ($viaGet) { //stand-alone use
	$p2 = strrpos(": {$tit}",': ') + 1;
	if (empty($_GET['k']) or $_GET['k'] != ord($tit[$p2])) {
		echo $xx['no_way']; //no or invalid key
		exit;
	}
}

//get category data
$stH = stPrep("SELECT 
	`name`,`approve`, `color`,`bgColor`,`subName1`,`subColor1`,`subBgrnd1`,`subName2`,`subColor2`,`subBgrnd2`,`subName3`,`subColor3`,`subBgrnd3`,`subName4`,`subColor4`,`subBgrnd4`
	FROM `categories`
	WHERE `ID` = ?");
stExec($stH,array($cid));
$row = $stH->fetch(PDO::FETCH_ASSOC);
$stH = null; //release statement handle
$cnm = $row['name'];
$app = $row['approve'];
if (!$sid) { //no subcat
	$snm = '';
	$cco = $row['color'];
	$cbg = $row['bgColor'];
} else {
	$snm = $row["subName{$sid}"];
	$cco = $row["subColor{$sid}"] ? $row["subColor{$sid}"] : $row['color'];
	$cbg = $row["subBgrnd{$sid}"] ? $row["subBgrnd{$sid}"] : $row['bgColor'];
}

$repTxt = repeatText($r_t,$r_i,$r_p,$r_m,$rul); //make repeat text

if ($sti == '00:00' and $eti == '23:59') {
	$ald = true;
	$sti = $eti = '';
} else {
	$ald = false;
	$sti = ITtoDT($sti);
	$eti = ($eti[0] != "9") ? ITtoDT($eti) : "";
}
if (!$eda) { $sda = IDtoDD($evD); }

if ($app and $apd) { //event approved
	echo "<div class='apdBar'>{$xx['evt_apd_locked']}</div>\n";
}

$evt = array ('ven' => $ven, 'cnm' => $cnm, 'des' => $tx1, 'xf1' => $tx2, 'xf2' => $tx3, 'att' => $att, 'snm' => $snm); //tx1 - tx3: with hyperlinks

$eColor = ($cco or $cbg) ? " style='color:{$cco}; background:{$cbg};'" : '';
echo "<div class='evtCanvas'>\n";
echo "<table class='evtForm arrow'>
<colgroup><col class='c01'><col></colgroup>
<tr><td>{$xx['evt_title']}:</td><td><span{$eColor}>{$tit}</span></td></tr>";
if ($pri) { echo "<tr><td colspan='2'>{$xx['evt_private']}</td></tr>\n"; }
echo makeE($evt,$set['evtTemplGen'],'tx',"\n",'123458');
echo "<tr><td colspan='2'><hr></td></tr>";
echo "<tr><td>{$xx['evt_date_time']}:</td><td>".makeFullDT(false,$sda,$eda,$sti,$eti)."</td></tr>\n"; //make full date (display values)
if ($r_t) {
	echo "<tr><td colspan='2'>{$repTxt}<br></td></tr>\n";
}
if (($nom != "" or $nos != "") and ($usr['privs'] > 2 or ($usr['privs'] == 2 and $uid == $usr['ID']))) { //has rights to see reminder address list
	echo "<tr><td colspan='2'><hr></td></tr>\n";
	if ($nom != "") {
		echo "<tr><td>{$xx['evt_send_eml']}:</td>\n<td>{$nom} {$xx['evt_days_before_event']}</td></tr>\n";
	}
	if ($nos != "") {
		echo "<tr><td>{$xx['evt_send_sms']}:</td>\n<td>{$nos} {$xx['evt_days_before_event']}</td></tr>\n";
	}
	echo "<tr><td colspan='2'>{$nal}</td></tr>\n";
}
if (strpos($set['evtTemplGen'],'7') !== false) {
	echo "<tr><td colspan='2'><hr></td></tr>
<tr><td>{$xx['evt_added']}:</td><td>".IDTtoDDT($adt)." {$xx['by']} {$own}";
	if ($mdt and $edr) {
		echo "</td></tr>\n<tr><td>{$xx['evt_edited']}:</td><td>".IDTtoDDT($mdt)." {$xx['by']} {$edr}";
	}
}
echo "</td></tr>\n";
echo "</table>\n";
echo "</div><br>\n";
if (!$viaGet) {
	echo "<div class='floatC noPrint'><button onClick='javascript:self.close();'>{$xx["evt_close"]}</button></div>\n";
}
?>
