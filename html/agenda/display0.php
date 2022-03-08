<?php
/* LuxCal display0 © 2009-2020 LuxSoft www.LuxSoft.eu*/$LDV='2020-03-30';
/*
This file is part of the LuxCal Calendar and is distributed WITHOUT ANY 
WARRANTY. See the GNU General Public License for details.

============================== MUST READ ================================
This display must be run from the calendar's root folder!
It is best viewed in an iframe with a reduced width (e.g. 400x400px).
= SEE THE display.txt FILE FOR A DETAILED DESCRIPTION AND INSTRUCTIONS =
=========================================================================

/*------------------ start of default settings section ----------------*/

//GENERAL SETTINGS (see display.txt for details)
$calID = "mycal"; //calendar to use (between the quotes: specify the ID of the calendar. Blank (""): the default calendar) 
$evtBody = "23"; //hover box event fields (list of numbers: 1: venue, 2: category, etc., . . . for more see Settings page - Event templates. Just "0" has a special meaning: time with title below)
$evtWin = 1; //on click open event window (0: no, 1: yes). If the user has post rights, the event add/edit window will open, otherwise the event report window will open
$ef2Jump = 1; //if URL found in extra field 2, onclick open link in new window (0: disabled, 1: enabled)
$wkDays = 1; //days of the week (0: work week, 1: full week)
$fullCal = 1; //when clicking the month in the calendar header, open full calendar (0: disabled, 1: enabled)
$target = "_blank"; //target location of the full calendar ("_blank": new page, "_parent": parent frame of the minical iframe, framename: named HTML frame)
$login = 1; //show user name and login button in right upper corner (0: no, 1: yes)
$logMsg = "No account yet: contact the administrator"; //message shown at the top of the log in page
$pdfBut = 1; //show PDF file download button in left upper corner (0: no, 1: yes)
$pdfCnf = ""; //name (without extension) of configuration file to be used when producing the PDF file; blank (""): use default)
$icon = "lcal.png"; //path to a favicon shown in the browser tab for the display. Only applicable if the display is shown in its own browser tab

//FILTERS
$users = "0"; //events of users to show (comma separated list of user IDs; 0: all users)
$groups = "0"; //events of users (event owners) in certain groups to show (comma separated list of group IDs; 0: all groups, the text "own": events of users in own group only).
$cats = "0"; //events in categories to show (comma separated list of cat IDs; 0: all categories)
$venue = ""; //case-insensitive text string to be present in venue. Blank (""): no filter 

//BACKGROUND COLORS - GENERAL
$BXXXX = "#A0B0C0"; //background body
$BBHAR = "#8090A6"; //bars, lines and headers
$BGCTH = "#C0D0F0"; //hover background todo check box

//BACKGROUND COLORS - GRID
$BGWD1 = "#FFFFEE"; //grid - weekday
$BGWE1 = "#FFFFCC"; //grid - weekend
$BGOUT = "#FEFEFE"; //grid - outside month
$BGTOD = "#EEEEFF"; //day cell today

//BACKGROUND COLORS - BOXES AND CELLS
$BHNOR = "#FFFFE0;"; //hover box normal event
$BHREP = "#FFFFE0;"; //hover box repeating event

//FONT DEFINITIONS
$FFXXX = "12px arial, sans-serif"; //base font
$MDTHD = "1.0em"; //date header
$MBUTS = "1.0em"; //buttons
$MPOPU = "1.0em"; //hover popup box
$MSMAL = "0.8em"; //small text

//TEXT COLORS
$CXXXX = "#2B3856"; //normal text
$CBHAR = "#FFFFFF"; //text in headers
$CHLIT = "#FF2222"; //text checkbox

//BORDER COLORS
$EXXXX = "#808080"; //general borders
$EHNOR = "#808080"; //hover box normal event
$EHREP = "#E00060"; //hover box repeating event
$EGTOD = "#0000FF"; //grid - day cell today

//SIZES (PIXELS)
$HDCEL = "50"; //daycell height
$HWDAY = "18"; //week days height
$SQUAR = "10"; //mini-squares

/*------------------ end of default settings section ------------------*/

function showEvents($date) {
	global $calID, $evtList, $evtBody, $ef2Jump, $evtWin;

	foreach ($evtList[$date] as &$evt) {
		$time = makeHovT($evt);
		$chBox = '';
		if ($evt['cbx']) {
			$chBox .= strpos($evt['chd'], $date) ? $evt['cmk'] : '&#x2610;';
			$chBox = "<span class='chkBox'>{$chBox}</span>";
		}
		$cursor = ' arrow';
		if (strlen($evtBody) > 0) {
			$popText = "<div class='fontS'>";
			if ($evtBody == '0') {
				$popText .= "<b>".($chBox.$time ? "{$chBox}{$time}<br>" : '')."{$evt['tit']}</b>";
			} else {
				$popText .= "<b>{$chBox}{$time} {$evt['tit']}</b><br>".makeE($evt,$evtBody,'br',"<br>");
			}
			$popText = htmlspecialchars(addslashes($popText)).'</div>';
			$popClass = ($evt['mde'] or $evt['r_t']) ? 'repeat' : 'normal';
			$popAttr = " onmouseover=\"pop(this,'{$popText}','{$popClass}',30)\"";
		} else {
			$popAttr = '';
		}
		$bgColor = $evt['cbg'] ? " style=\"background-color:{$evt['cbg']};\"" : '';
		if ($ef2Jump and preg_match('%https?://[^"\'\s]+%i',$evt['xf2'],$match)) {
			$onClick = " onclick=\"newWindow('{$match[0]}'); event.stopPropagation();\""; //jump to URL in extra field 2 
			$cursor = ' point';
		} elseif ($evtWin) {
			$onClick = " onclick=\"".($evt['mayE'] ? 'editE' : 'showE')."({$evt['eid']},'{$date}','{$calID}'); event.stopPropagation();\""; //view or post/edit 
			$cursor = ' point';
		} else {
			$onClick = '';
		}
		$class = $evt['sym'] ? 'symbol' : 'square';
		echo "<span class='{$class}{$cursor}'{$bgColor}{$onClick}{$popAttr}>{$evt['sym']}</span>\n";
	}
}

/***** MAIN PROGRAM *****/

//sanity check
if (isset($_GET['oM']) and !preg_match('%^(-\d{1,2}|\d{0,2})$%', $_GET['oM'])) { exit('not permitted ('.substr(basename(__FILE__),0,-4).')'); } //invalid argument

//error_reporting(E_ERROR); //errors only
error_reporting(E_ALL); //errors, warnings and notices - test line

//load display configuration
if (!empty($_GET['cnf']) and file_exists("./configs/{$_GET['cnf']}.cnf")) { //specified
	include "./configs/{$_GET['cnf']}.cnf";
} elseif (file_exists("./configs/".basename(__FILE__,'.php').".cnf")) { //default
	include "./configs/".basename(__FILE__,'.php').".cnf";
}
require './lcconfig.php'; //calendar config data
require './common/toolbox.php'; //load tools
require './common/toolboxd.php'; //database tools
require './common/retrieve.php'; //get retrieve function

if (empty($calID)) { $calID = $dbDef; } //select calendar

$dbH = dbConnect($calID); //connect to database
$set = getSettings(); //get settings from db
date_default_timezone_set($set['timeZone']); //set time zone
header("Cache-control: private"); //proxies: don't cache

require './lang/ai-'.strtolower($set['language']).'.php'; //get ai texts

session_name('PHPSESSID'); //session cookie name
session_start(); //for security when going to full calendar

//get user ID
$uID = isset($_COOKIE["LXDuid_{$calID}"]) ? @unserialize($_COOKIE["LXDuid_{$calID}"]) : 1; //get user ID from cookie - default: public user
$msg = $un_em = ''; //init
if (!empty($_POST['log'])) { //log-in mode
	$un_em = !empty($_POST['un_em']) ? htmlspecialchars(stripslashes(trim($_POST['un_em']))) : '';
	$pword = !empty($_POST['pword']) ? htmlspecialchars(stripslashes(trim($_POST['pword']))) : '';
	if ($_POST['log'] == 'w') { //login form
		$msg = $logMsg;
	} elseif ($_POST['log'] == 'o') { //log out button pressed
		$uID = 1; //public user
		setcookie("LXDuid_{$calID}",serialize($uID),time()-86400); //delete remember me cookie
	} elseif ($_POST['log'] == 'i') { //logging in: validate form
		if (!$un_em) { $msg = $ax['log_no_un_em']; goto end; }
		if (!$pword) { $msg = $ax['log_no_pw']; goto end; }
		$md5Pw = md5($pword);
		$stH = stPrep("SELECT `ID` FROM `users` WHERE (`name` = ? OR `email` = ?) AND (`password` = ? OR `tPassword` = ?) AND `status` >= 0");
		stExec($stH,array($un_em,$un_em,$md5Pw,$md5Pw));
		$row = $stH->fetch(PDO::FETCH_ASSOC); //fetch user details
		$stH = null;
		if (!$row) { $msg = $ax['log_un_em_pw_invalid']; goto end; }
		$uID = $row['ID'];
		setcookie("LXDuid_{$calID}",serialize($uID),time()+86400*$set['cookieExp']); //set or refresh remember me cookie
		end: //watch out for the T-rex
	}
}
//get user credentials
$stH = dbQuery("SELECT u.`ID`, u.`name`, u.`language`, g.`ID` as gID, g.`privs`, g.`vCatIDs` as vCats, g.`eCatIDs` as eCats FROM `users` AS u INNER JOIN `groups` AS g ON g.`ID` = u.`groupID` WHERE u.`ID` = {$uID}");
$usr = $stH->fetch(PDO::FETCH_ASSOC); //user & group data
$stH = null;

require './lang/ui-'.($usr['language'] ? strtolower($usr['language']) : strtolower($set['language'])).'.php'; //get ui texts

if (!$msg and !$usr['privs']) {
	$msg = $logMsg; //login form
}

$evtList = array(); //init
if (!$msg) { //read access: get events
	if ($usr['privs'] > 1) { $_SESSION[$calID]['uid'] = $uID; } //uid for index.php when editE

	//compute dates
	$offM = isset($_GET['oM']) ? $_GET['oM'] : 0; //offset Month
	$timeD1 = mktime(12,0,0,date('n')+$offM,1,date('Y')); //time 1st day
	$dateD1 = date("Y-m-d", $timeD1); //date 1st day
	$curM = date("n",$timeD1);
	$curY = date("Y",$timeD1);
	$sOffset = ($set['weekStart']) ? date("N", $timeD1) - 1 : date("w", $timeD1); //offset first day
	$eOffset = date("t", $timeD1) + $sOffset; //offset last day
	$daysToShow = ($eOffset == 28) ? 28 : (($eOffset > 35) ? 42 : 35); //4, 5 or 6 weeks
	$fDate = date("Y-m-d", $timeD1 - ($sOffset * 86400)); //start date in 1st week
	$tDate = date("Y-m-d", $timeD1 + ($daysToShow - $sOffset - 1) * 86400); //end date in last week

	//set filter and retrieve events
	if ($cats) { //categories to show
		$cats = str_replace(' ','',$cats); //remove spaces
		$usr['vCats'] = ($usr['vCats'] == '0') ? $cats : implode(',',array_intersect(explode(',',$usr['vCats']),explode(',',$cats)));
	}
	$filter = ($users == 'own') ? " AND e.`userID` = {$uID}" : ($users ? " AND e.`userID` IN ({$users})" : '');
	$filter .= ($groups == 'own') ? " AND g.`ID` = {$usr['gID']}" : ($groups ? " AND g.`ID` IN ({$groups})" : '');
	if ($venue) { $filter .= " AND e.`venue` LIKE '%{$venue}%'"; }
	if ($filter) { $filter = substr($filter,5); }
	retrieve($fDate,$tDate,'',$filter);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title><?php echo $set['calendarTitle']; ?></title>
<meta name="description" content="LuxCal mini web calendar - a LuxSoft product">
<meta name="application-name" content="LuxCal V<?php echo LCV.' Display0 V'.$LDV?>">
<meta name="author" content="Roel Buining">
<meta name="robots" content="nofollow">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="canonical" href="<?php echo $set['calendarUrl']; ?>">
<?php
echo "<link rel='icon' type='image/".substr(strrchr($icon,'.'),1)."' href='{$icon}'>\n";
echo "<script src='common/toolbox.js'></script>\n";
$calH = (5 * (int)$HDCEL) + (2 * (int)$HWDAY) + 20;
echo "<script>var calID = '{$calID}';</script>
<style type='text/css'>
* {padding:0; margin:0;}
body, td, th {font:{$FFXXX};}
body {background:{$BXXXX}; color:{$CXXXX}; overflow:hidden;}
button {font-size:{$MBUTS}; padding:0px 2px; border-radius:2px; border:1px solid #666; cursor:pointer;}
button:hover {border:1px solid #F44;}
a {color:{$CXXXX}; text-decoration:none; cursor:pointer;}
img {border-style:none;}
form {color:{$CXXXX};}

.fontS {font-size:{$MSMAL}; margin-bottom:-4px;}
.fontL {font-size:1.4em; margin:12px;}
.bold {font-weight:bold;}
.floatR {float:right;}
.floatL {float:left;}
.floatC {text-align:center;}
.point {cursor:pointer;}
.arrow {cursor:default;}
.header {position:relative; text-align:center; z-index:10;}
.dateHdr {display:inline-block; min-width:100px; font-size:{$MDTHD}; cursor:default;}
.arrLink {font-size:1.4em; padding:0 10px;}
.topButL {position:absolute; top:4px; left:6px;}
.topButR {position:absolute; top:4px; right:6px;}

fieldset {display:table-cell; font-size:1.1em; padding:8px; border:1px solid {$EXXXX}; background:{$BHNOR}; border-radius:5px;}
legend {font-weight:bold; padding:0 5px; color:{$CXXXX}; background:{$BHNOR};}
input[type=text], input[type=password] {font-size:1.0em; padding:0 2px; color:{$CXXXX}; background:{$BGOUT}; border-radius:2px; border:1px solid #666; cursor:text; height:18px; margin-bottom:10px;}
input[type='radio'] {cursor:pointer;}
label {cursor:pointer; margin:0 10px 0 4px;}
div.msgLine {display:table; margin:15px auto; background:#F0A070; padding:4px 10px;}
div#pdfPop {position:absolute; top:20%; left:0; right:0; display:none; z-index:10;}
div.container {height:{$calH}px; background:#F0F0F0;}
div.dialogBox {display:table; margin:0 auto; font-size:1.0em; background:{$BHNOR}; padding:12px 18px; border:1px solid {$EXXXX}; border-radius:5px; box-shadow:5px 5px 5px #888;}

table.grid {width:100%; border-collapse:collapse;}
table.grid .dCol {border:1px solid {$EXXXX};}
table.grid tr.miniWeek {height:{$HDCEL}px;}
table.grid th {height:{$HWDAY}px; color:{$CBHAR}; background:{$BBHAR}; overflow:hidden;}
table.grid td {border:1px solid {$EXXXX}; vertical-align:top; overflow:hidden;}
table.grid td.we0 {background:{$BGWE1};}
table.grid td.wd0 {background:{$BGWD1};}
table.grid td.out {background:{$BGOUT};}
table.grid td.today {border:1px solid {$EGTOD}; background:{$BGTOD}}

.chkBox {color:{$CHLIT}; background:#FFFFFF; padding-right:2px;}
.chkBox:hover {background:{$BGCTH};}
.square {float:left; width:{$SQUAR}px; height:{$SQUAR}px; border:1px solid {$EXXXX};}
.symbol {position:relative; top:-4px;}
.dom {text-align:right; padding-right:2px;}

#htmlPop {position:absolute; width:150px; font-size:{$MPOPU}; padding:2px 2px 6px 2px; border-radius:4px; box-shadow:4px 4px 4px #888; visibility:hidden; z-index:10;}
.normal, .repeat {overflow:auto; cursor:default;}
.normal {border:1px solid {$EHNOR}; background:{$BHNOR};}
.repeat {border:1px solid {$EHREP}; background:{$BHREP};}

.endBar {font-size:{$MSMAL}; padding:0 8px;}
.endBar a {color:{$CBHAR};}
.footLS {font-style:italic;}
</style>\n";
echo "<script src='common/toolbox.js'></script>
<script>\nvar calID = '{$calID}';";
?>

window.onload = function() {window.frameElement.style.height = document.body.scrollHeight+'px';}
function newWindow(url) { window.open(url, "_blank","toolbar=yes,scrollbars=yes,resizable=yes,top=200,left=300,width=800,height=600"); }
</script>
</head>

<body>
<?php
if ($msg) { //login form
	echo "<div class='container'><div class='header fontL'>{$xx['hdr_calendar']}</div>\n";
	echo "<div class='msgLine'>{$msg}</div>\n";
	echo "<div class='dialogBox'>\n<fieldset><legend>{$xx['log_in']}</legend>
<form action='".htmlspecialchars($_SERVER["PHP_SELF"])."' method='post'>
{$ax['log_un_or_em']}<br><input type='text' name='un_em' size='15' value='{$un_em}'><br><br>
{$ax['log_pw']}<br><input type='password' name='pword' size='15'><br><br>
<div class='floatC'><button type='submit' class='bold' name='log' value='i'>{$xx['log_in']}</button>\n";
	if ($usr['privs']) { echo "&nbsp;&nbsp;<button type='submit' name='back'>{$xx['back']}</button>\n"; }
	echo "</div>\n</form>
	</fieldset>
	</div>\n</div>\n";
} else { //calendar
	//display header
	if ($fullCal) {
		echo "<div class='floatC fontS'>{$xx['vws_click_for_full']}</div>\n";
	}
	echo "<div class='header'>\n";
	if ($login) { //show login/out button
		echo "<form class='topButR' action='".htmlspecialchars($_SERVER["PHP_SELF"])."' method='post'>\n";
		echo $uID == 1 ? "<button type='submit' name='log' value='w'>{$xx['log_in']}</button>" : "<button name='log' value='o'>{$xx['log_out']}</button>\n";
		echo "</form>\n";
	}
	if ($pdfBut) { //show PDF File button
		echo "<button class='topButL' title='{$xx['hdr_dload_pdf']}' onclick=\"showX('pdfPop',true);\">PDF</button>\n";
		//prepare PDF dialog box (hidden)
	}
	$arrowL = "<a class='arrowLink' href='".htmlentities($_SERVER['PHP_SELF']).'?oM='.($offM-1)."' title='{$xx['vws_prev_month']}'>&#9664;</a>\n";
	$arrowL = "<a class='arrLink' href='".htmlentities($_SERVER['PHP_SELF']).'?oM='.($offM-1)."' title='{$xx['vws_prev_month']}'>&#9664;</a>\n";
	$arrowR = "<a class='arrLink' href='".htmlentities($_SERVER['PHP_SELF']).'?oM='.($offM+1)."' title='{$xx['vws_next_month']}'>&#9654;</a>\n";
	if ($fullCal) {
		echo "<form target='{$target}' action='index.php' method='post'>\n";
		echo "<input type='hidden' name='winCh' value=1>
<input type='hidden' name='cal' value='{$calID}'>
<input type='hidden' name='cP' value='2'>
<input type='hidden' name='cD' value='{$dateD1}'>\n";
		$dateHdr = "<button type='submit' title=\"{$xx['vws_view_full']}\">".makeD($dateD1,3)."</button>";
		echo "{$arrowL}<span class='dateHdr'>{$dateHdr}</span>{$arrowR}\n";
		echo "</form>\n";
	} else {
		echo "{$arrowL}<span class='dateHdr'>".makeD($dateD1,3)."</span>{$arrowR}\n";
	}
	echo "</div>\n";
	if ($pdfBut) { //load PDF dialog
		$pdfJson = json_encode(array('uID' => $uID, 'users' => $users, 'groups' => $groups, 'cats' => $cats, 'venue' => $venue, 'pdfCnf' => $pdfCnf)); //json encode object
		echo "<div id='pdfPop'>
<div class='dialogBox floatC'>
<fieldset>\n<legend>PDF - {$xx['title_upcoming']}</legend>
<form action='pdfs/pdf.php' method='post'>
<input type='hidden' name='pdfJson' value='{$pdfJson}'>
<input type='radio' id='pdf1' name='pdf' value='1' checked><label for='pdf1'>A4</label>&nbsp;&nbsp;
<input type='radio' id='pdf2' name='pdf' value='2'><label for='pdf2'>A5</label><br><br>
{$xx['from']}: <input type='text' name='fDate' id='fDate' value=".IDtoDD($fDate)." size='10'>
&nbsp;&nbsp;{$xx['to']}: <input type='text' name='tDate' id='tDate' value=".IDtoDD($tDate)." size='10'>
<br><br>
<button type='submit' class='bold' onclick=\"showX('pdfPop',false);\">&nbsp;OK&nbsp;</button>&nbsp;&nbsp;
<button type='button' onclick=\"showX('pdfPop',false);\">Cancel</button>
</form></fieldset></div></div>";
	}
	//display month
	$days = $wkDays ? '1234567' : $set['workWeekDays']; //set days to show
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
			echo "<tr class='miniWeek'>\n";
		}
		$dayNr = date("N", $cTime);
		if (strpos($days,$dayNr) !== false) {
			$dow = ($i < $sOffset or $i >= $eOffset) ? 'out' : (($dayNr > 5) ? 'we0' : 'wd0');
			if ($cDate == date("Y-m-d")) { $dow .= ' today'; }
			$day = ltrim(substr($cDate, 8, 2),"0");
			$tdAttrib = ($evtWin and $usr['privs'] > 1) ? "class='point {$dow}' onclick=\"newE('{$cDate}',0); event.stopPropagation();\"" : "class='{$dow}'";
			echo "<td {$tdAttrib}>\n<div class='dom'>{$day}</div>\n";
			if (!empty($evtList[$cDate])) { showEvents($cDate); }
			echo "</td>\n";
		}
		if ($i%7 == 6) { echo "</tr>\n"; } //if last day of week, wrap to left
	}
	echo "<tr>\n<th colspan='7' class='endBar'>
<span class='floatL'><a href='rssfeed.php' title='RSS feeds' target='_blank' >RSS</a></span>
<span class='floatR'><a href='http://www.luxsoft.eu' target='_blank'><span class='footLS'>LuxSoft</span></a></span>\n";
	if ($offM != 0) { echo "<a class='floatC' href='".htmlentities($_SERVER['PHP_SELF'])."?oM=0' title=\"{$xx['vws_back_to_today']}\">{$xx['vws_today']}</a>\n"; }
	echo "</th>\n</tr>\n</table>\n";
}
?>
</body>
</html>
