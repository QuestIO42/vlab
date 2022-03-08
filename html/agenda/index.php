<?php
/*
= LuxCal index =

This file is part of the LuxCal Web Calendar.
Copyright 2009-2020 LuxSoft - www.LuxSoft.eu
License https://www.gnu.org/licenses/gpl.html GPL version 3

The LuxCal Web Calendar is distributed without any warranty.
*/

//page definitions
$pages = array ( //page, header, no hdr, xs hdr, footer, xs ftr, title, includes (r:retrieve, m:messaging), spec. attributes
//calendar views
 1 => array ('views/year.php','f','0','x','f','0','','r',''),
 2 => array ('views/month.php','f','0','x','f','0','','r','fm'),
 3 => array ('views/month.php','f','0','x','f','0','','r','wm'),
 4 => array ('views/week.php','f','0','x','f','0','','r','fw'),
 5 => array ('views/week.php','f','0','x','f','0','','r','ww'),
 6 => array ('views/day.php','f','0','x','f','0','','r',''),
 7 => array ('views/upcoming.php','f','0','x','f','0','upcoming','r',''),
 8 => array ('views/changes.php','f','0','x','f','0','changes','r',''),
 9 => array ('views/matrixc.php','f','0','x','f','0','','r',''),
10 => array ('views/matrixu.php','f','0','x','f','0','','r',''),
11 => array ('views/gantt.php','f','0','x','f','0','','r',''),
//support pages
20 => array ('pages/login.php','l','l','l','f','0','log_in','m',''),
21 => array ('pages/account.php','l','l','l','f','0','profile','',''),
22 => array ('pages/search.php','a','a','a','f','0','search','r',''),
23 => array ('pages/contact.php','a','a','a','f','0','contact','m',''),
24 => array ('pages/thumbnails.php','a','a','a','f','0','thumbnails','',''),
//small pop-up windows
30 => array ('pages/event.php','e','e','e','0','0','event','rm',''),
32 => array ('pages/eventreport.php','e','e','e','0','0','event','r',''),
39 => array ('pages/help.php','h','h','h','0','0','user_guide','',''),
//admin pages
80 => array ('pages/settings.php','a','a','a','f','0','settings','m',''),
81 => array ('pages/categories.php','a','a','a','f','0','edit_cats','',''),
82 => array ('pages/users.php','a','a','a','f','0','edit_users','',''),
83 => array ('pages/groups.php','a','a','a','f','0','edit_groups','',''),
84 => array ('pages/database.php','a','a','a','f','0','manage_db','',''),
85 => array ('pages/importUsr.php','a','a','a','f','0','usr_import','',''),
86 => array ('pages/exportUsr.php','a','a','a','f','0','usr_export','',''),
87 => array ('pages/importIcs.php','a','a','a','f','0','ics_import','',''),
88 => array ('pages/exportIcs.php','a','a','a','f','0','ics_export','r',''),
89 => array ('pages/importEvt.php','a','a','a','f','0','evt_import','',''),
//90 => array ('pages/cleanup.php','a','a','a','f','0','clean_up','',''),
99 => array ('pages/styling.php','s','s','s','0','0','ui_styling','','')
);

//get toolboxes
require './common/toolboxd.php'; //database tools + LCV
require './common/toolbox.php'; //general tools

//set error reporting
//error_reporting(E_ERROR); //errors only
//ini_set('display_errors',0); ini_set('log_errors',1); //no error display
error_reporting(E_ALL); //errors, warnings and notices - test
ini_set('display_errors',1); ini_set('log_errors',1); //test

//proxies: don't cache
header("Cache-control:private");

//load config data
if (!file_exists('./lcconfig.php')) {//no current config data
	$inorup = !file_exists('./lcaldbc.dat') ? 'install' : 'upgrade'; //old config data?
	header("Location: {$inorup}".substr(str_replace('.','',LCV),0,3).".php"); exit();
}
require './lcconfig.php';
if (isset($lcc)) { $lcV = $lcc; unset($lcc); } //<V4

if (empty($_POST) and substr(LCV,0,6) != $lcV) { //external hit and LCV not current: upgrade
	header("Location: upgrade".substr(str_replace('.','',LCV),0,3).".php"); exit();
}

//init
$nowTS = time(); //current time uts
$calPath = rtrim(dirname($_SERVER["PHP_SELF"]),'/').'/';
session_set_cookie_params(1800,$calPath); //set cookie lifetime and path
ini_set('session.cookie_lifetime', 0); //session cookie expires when logged off

//validate GET variables
if ($alert = validGetVars()) {
	require './pages/alert.php'; exit(); //alert page
}

//set calendar ID
$calID = isset($_COOKIE['LXCcid']) ? unserialize($_COOKIE['LXCcid']) : $dbDef;
if (isset($_REQUEST['cal']) and $calID != $_REQUEST['cal']) { //switching calendar
	$calID = $_REQUEST['cal'];
	$_POST = $_REQUEST = array(); //preserve selections
}
setcookie('LXCcid',serialize($calID),$nowTS+2592000,$calPath); //set calID cookie to 30 days
if (isset($_REQUEST['cal1x'])) { $calID = $_REQUEST['cal1x']; note($_REQUEST['cal1x']); } //switch calendar just once

//check if session expired
if (!empty($_POST) and empty($_COOKIE['PHPSESSID'])) { //internal hit
	note('No session cookie',true);
	$alert = "#1<br><br>#2";
	require './pages/alert.php'; exit(); //alert page
}

//connect to db
$dbH = dbConnect($calID);

//get settings from database
$set = getSettings();

//start session
session_name('PHPSESSID'); //session cookie name
session_start();
$_SESSION['rand'] = rand(20,29); //dummy - refresh session

//check for SSO (user email passed by parent)
if (!empty($_SESSION['lcUser'])) {
	$stH = stPrep("SELECT `ID` FROM `users` WHERE (`email` = ? OR `name` = ?) AND `status` >= 0");
	stExec($stH,array($_SESSION['lcUser'],$_SESSION['lcUser']));
	if ($row = $stH->fetch(PDO::FETCH_NUM)) { $_SESSION[$calID]['uid'] = $row[0]; }; //set user ID (log in)
	$stH = null; //release statement handle
	unset($_SESSION['lcUser']);
}

//validate POST variables
$srcPage = (!empty($_REQUEST['xP'])) ? $_REQUEST['xP'] : (!empty($_SESSION[$calID]['cP']) ? $_SESSION[$calID]['cP'] : 0); //source page
if ($alert = validPostVars($calID,$srcPage)) {
	require './pages/alert.php'; exit(); //alert page
}

//get user ID
if (isset($_POST['loff'])) { //log off - set public user
	$_SESSION[$calID]['uid'] = 1;
} elseif (isset($_POST["userID"])) { //from login page
	$_SESSION[$calID]['uid'] = $_POST["userID"];
} elseif (empty($_SESSION[$calID]['uid'])) { //fall back
	$_SESSION[$calID]['uid'] = isset($_COOKIE["LXCuid_{$calID}"]) ? @unserialize($_COOKIE["LXCuid_{$calID}"]) : 1;
}

//get user data & privs
$stH = stPrep("SELECT u.`ID`,u.`name`,u.`email` AS mail,u.`phone`,u.`language` AS lang,g.`privs`,g.`vCatIDs` AS vCats,g.`eCatIDs` AS eCats,g.`rEvents` AS rEvts,g.`mEvents` AS mEvts,g.`pEvents` AS pEvts,g.`upload`,g.`sendSms` AS sndSms,g.`tnPrivs` FROM `users` AS u INNER JOIN `groups` AS g ON g.`ID` = u.`groupID` WHERE u.`ID` = 1 OR u.`ID` = ? ORDER BY u.`ID` DESC"); //if userID not found, revert to public user
stExec($stH,array($_SESSION[$calID]['uid']));
$usr = $stH->fetch(PDO::FETCH_ASSOC); //user & group data
$row = $stH->fetch(PDO::FETCH_ASSOC); //public user or false (if $usr is public user)
$_SESSION[$calID]['privs'] = $usr['privs'];
$stH = null;
if (isset($_GET['pP']) and $usr['privs'] == 9) { phpinfo(); exit; } //admin - show PHP installation page
if ($row != false) { //$usr is not the public user: take care that usr has v & e rights of usr + public user
	if ($usr['vCats'] != '0' and $row['privs'] > 0) { $usr['vCats'] = $row['vCats'] == '0' ? '0' : $usr['vCats'].','.$row['vCats']; } //view categories
	if ($usr['eCats'] != '0' and $row['privs'] > 1) { $usr['eCats'] = $row['eCats'] == '0' ? '0' : $usr['eCats'].','.$row['eCats']; } //edit categories
} else { //uid not found or is public user
	$_SESSION[$calID]['uid'] = 1;
}
unset($row);

//when logoff and back link defined: redirect
if (isset($_POST['loff']) and $set['backLinkUrl']) {
	header("Location: {$set['backLinkUrl']}");
}

//when login: bake 0:forget, 1:remember
if (isset($_POST['bake'])) {
	setcookie("LXCuid_{$calID}",serialize($usr['ID']),$nowTS+86400*$set['cookieExp']*$_POST['bake'],$calPath); //set or refresh
}

//set time zone
date_default_timezone_set($set['timeZone']);
$today = date('Y-m-d'); //date of today

if (empty($_POST) or isset($_POST['bake'])) { //external hit or log in - update login data & load last selected options
	$stH = stPrep("UPDATE `users` SET `login0` = CASE WHEN substr(`login0`,1,1) = '9' THEN ? ELSE `login0` END, `login1` = ?, `loginCnt` = `loginCnt` + 1 WHERE `ID` = ?");
	stExec($stH,array($today,$today,$usr['ID']));
	if ($usr['ID'] > 1 and $set['restLastSel']) { loadLastSel($calID); }
}

//check for a small viewport and set default views
$winXS = (!empty($_COOKIE['LXCxs']) or isset($_GET['xs']));
$defViewLog = $winXS ? $set['defViewLogS'] : $set['defViewLogL']; //for logged users
$defViewPub = $winXS ? $set['defViewPubS'] : $set['defViewPubL']; //for public users

//set header display
if (isset($_GET['hdr'])) { $_SESSION[$calID]['hdr'] = $_GET['hdr']; }
elseif (!isset($_SESSION[$calID]['hdr'])) { $_SESSION[$calID]['hdr'] = 1; }
$cH = $_SESSION[$calID]['hdr']; //calendar header

//set language
if (isset($_REQUEST["cL"])) { $_SESSION[$calID]['cL'] = $_REQUEST['cL']; }
if (empty($_SESSION[$calID]['cL'])) { $_SESSION[$calID]['cL'] = ($usr['lang'] ? $usr['lang'] : $set['language']); }
if (!file_exists("./lang/ui-{$_SESSION[$calID]['cL']}.php")) { $_SESSION[$calID]['cL'] = 'english'; }
$opt['cL'] = strtolower($_SESSION[$calID]['cL']);

//set view restrictions
$eDetails = ($set['details4All'] == 1 or ($set['details4All'] == 2 and $usr['ID'] > 1)); //show event details
$avViews = $usr['ID'] == 1 ? $set['viewsPublic'] : $set['viewsLogged']; //available views

if (isset($_POST['loff']) or !$usr['privs']) { //logoff or no access: reset options
	$opt['cP'] = $_SESSION[$calID]['cP'] = ($usr['privs'] ? $defViewPub : 20);
	$_SESSION[$calID]['cG'] = $_SESSION[$calID]['cU'] = $_SESSION[$calID]['cC'] = $opt['cG'] = $opt['cU'] = $opt['cC']  = array(0);
	$_SESSION[$calID]['cL'] = $opt['cL'] = strtolower($set['language']);
	goto allSet;
}

//set current page
if (isset($_REQUEST['cP'])) {
	if ($_REQUEST['cP'] == 'up' and !empty($_SESSION[$calID]['cP'])) { //one level up
		$oneUp = array(2 => 1, 3 => 1, 4 => 2, 5 => 3, 6 => 4);
		$upPage = $_SESSION[$calID]['cP'];
		while ($upPage > 1) {
			$upPage = $oneUp[$upPage];
			if (strpos($avViews,strval($upPage)) !== false) { $_SESSION[$calID]['cP'] = $upPage; break; }
		}
	} elseif (($_REQUEST['cP'] > 10 or strpos($avViews,strval($_REQUEST['cP'])) !== false) and array_key_exists($_REQUEST['cP'],$pages)) {
		$_SESSION[$calID]['cP'] = $_REQUEST['cP'];
	} elseif ($_REQUEST['cP'] == 0) {
		$_SESSION[$calID]['cP'] = $usr['ID'] == 1 ? $defViewPub : $defViewLog;
	}
}
if (empty($_SESSION[$calID]['cP'])) { //set current page
	$_SESSION[$calID]['cP'] = $usr['ID'] > 1 ? $defViewLog : ($usr['privs'] ? $defViewPub : 20); //if no privs, force login
}
$opt['cP'] = !empty($_REQUEST['xP']) ? $_REQUEST['xP'] : $_SESSION[$calID]['cP']; //$xP: don't store in session

//set group filter
if (isset($_REQUEST['cG'])) { $_SESSION[$calID]['cG'] = $_REQUEST['cG']; }
elseif (!isset($_SESSION[$calID]['cG'])) { $_SESSION[$calID]['cG'] = array(0); }
$opt['cG'] = $_SESSION[$calID]['cG']; //current group

//set user filter
if (isset($_REQUEST['cU'])) { $_SESSION[$calID]['cU'] = $_REQUEST['cU']; }
elseif (!isset($_SESSION[$calID]['cU'])) { $_SESSION[$calID]['cU'] = array(0); }
$opt['cU'] = $_SESSION[$calID]['cU']; //current user

//set category filter
if (isset($_REQUEST['cC'])) { $_SESSION[$calID]['cC'] = $_REQUEST['cC']; }
elseif (!isset($_SESSION[$calID]['cC'])) { $_SESSION[$calID]['cC'] = array(0); }
$opt['cC'] = $_SESSION[$calID]['cC']; //current category

//save last selected cP, cG, cU, cC, cL
if ((isset($_REQUEST['cP']) or isset($_REQUEST['cG']) or isset($_REQUEST['cU']) or isset($_REQUEST['cC']) or isset($_REQUEST['cL'])) and $usr['ID'] > 1) {
	saveLastSel($calID,$calPath);
}

allSet:
$page = &$pages[$opt['cP']]; //current page

//set current date
$opt['nD'] = ''; //preset no new date
if (!empty($_REQUEST['nD'])) { $_SESSION[$calID]['cD'] = $opt['nD'] = DDtoID($_REQUEST['nD']); }
elseif (isset($_REQUEST['cD'])) { $_SESSION[$calID]['cD'] = $_REQUEST['cD']; }
if (empty($_SESSION[$calID]['cD'])) { $_SESSION[$calID]['cD'] = $today; } //empty: today
$opt['cD'] = $_SESSION[$calID]['cD']; //current date

//set rss get-method filter
$cF = "?cal={$calID}";
foreach ($opt['cG'] as $group) { if ($group) { $cF .= '&amp;cG%5B%5D='.$group; } }
foreach ($opt['cU'] as $user) { if ($user) { $cF .= '&amp;cU%5B%5D='.$user; } }
foreach ($opt['cC'] as $categ) { if ($categ) { $cF .= '&amp;cC%5B%5D='.$categ; } }

$mode = isset($_REQUEST['mode']) ? $_REQUEST['mode'] : $page[8]; //get mode

require "./lang/ui-{$opt['cL']}.php"; //retrieve language file

if (strpos($page[7],'r') !== false) { //retrieve required
	require './common/retrieve.php';
}
if (strpos($page[7],'m') !== false) { //messaging required
	require './common/messaging.php';
}

//set token for destination page
$tkn = $_SESSION["LXCtkn_{$calID}:{$opt['cP']}"] = md5(rand());
$formCal = "<input type='hidden' name='cal1x' value='{$calID}'>";

/* build calendar page */
$pageTitle = !empty($page[6]) ? $xx["title_{$page[6]}"] : '';
$hdrType = $cH < 1 ? $page[2] : ($winXS ? $page[3] : $page[1]); //set header type
$ftrType = $winXS ? $page[5] : $page[4]; //set footer type
$body = $page[0]; //body uri
unset($page,$pages);
require './common/header.php'; //header
require "./{$body}"; //body
require './common/footer.php'; //footer
?>
