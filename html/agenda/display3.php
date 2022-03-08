<?php
/* LuxCal display3 © 2009-2020 LuxSoft www.LuxSoft.eu*/$LDV='2020-03-30';
/*
This file is part of the LuxCal Calendar and is distributed WITHOUT ANY 
WARRANTY. See the GNU General Public License for details.

============================== MUST READ ================================
This display must be run from the calendar's root folder!
= SEE THE display.txt FILE FOR A DETAILED DESCRIPTION AND INSTRUCTIONS =
=========================================================================

/*------------------ start of default settings section ----------------*/

//SET START AND END DATE (see display.txt for details)
$fromDate = "DAY"; //from date
$tillDate = "MONTH+1"; //till date

//GENERAL SETTINGS (see display.txt for details)
$calID = "mycal"; //calendar to use (ID of the calendar. Blank (""): the default calendar) 
$calName = "My Mobile Calendar"; //calendar header text. Asterisk ("*"): calendar title, blank (""): no header
$login = 1; //show user name and login button in right upper corner (0: no, 1: yes)
$logMsg = "No account yet: contact the administrator"; //message shown at the top of the log in page
$sortD = 0; //event sorting on dates; 0: ascending, 1: descending
$maxDays = 0; //max. number of days to show; 0: no maximum
$futEvts = 0; //show ongoing and future events only (0: no, 1: yes). Note: This setting overrules the "from date" and sets it to "DAY"
$evtHead = '#t #e'; //event head template (#e: event title, #c: event title - category color, #u: event title - owner group color, #o: event owner, #a: age, #/: new line)
$evtBody = '123'; //event fields to show (list of numbers: 1: venue, 2: category, 3: description, . . . for more see Settings page - Event templates)
$evtWin = 1; //on click open event window (0: no, 1: yes). If the user has post rights, the event add/edit window will open, otherwise the event report window will open
$recOnce = 0; //for recurring events, show only one (the next) occurrence (0: all, 1: next only)
$mulOnce = 0; //for multi-day events, show only one (the next) occurrence (0: all, 1: next only)
$maxImgH = 80; //maximum height of images (in pixels)
$noEvents = "No events"; //message shown when no upcoming events
$icon = "lcal.png"; //path to a favicon shown in the browser tab for the display. Only applicable if the display is shown in its own browser tab

//EVENT FILTERS
$users = "0"; //events of users (event owners) to show (comma separated list of user IDs; 0: all users, the text "own": own events only).
$groups = "0"; //events of users (event owners) in certain groups to show (comma separated list of group IDs; 0: all groups, the text "own": events of users in own group only).
$cats = "0"; //events in categories to show (comma separated list of cat IDs; 0: all categories).
$scats = "0"; //events in subcategories to show (comma separated list of subcat IDs; possible values is 1, 2, 3 and 4; 0: all subcats).
$venue = ""; //show only events with case-insensitive text string present in venue. Blank (""): no filter 

//MARGINS/BORDERS in pixels
$MOUTR = "0"; //container outer margin
$MINNR = "5"; //container inner margin
$WBORD = "2"; //container border width
$RBORD = "8"; //container border corner radius
$MDATE = "0px 0px 0px 0px"; //date margins - top right bottom left
$MEVNT = "0px 0px 10px 0px"; //event margins - top right bottom left
$MTITL = "0px 0px 0px 0px"; //title margins - top right bottom left
$MBODY = "0px 0px 0px 10px"; //body margins - top right bottom left

//DATE FORMAT
$dFormat = "w, M d"; //W: Monday, w: Mon, d: 21, M: January, m: Jan, /: new line

//DISPLAY COLORS
$BGENL = "#111111"; //general background color
$CBORD = "#CF0209"; //container border color
$CHEAD = "#FFFFFF"; //header text color
$CDATE = "#FFFFFF"; //calendar date text color
$BDATE = "#202020"; //calendar date background color
$CTIME = "#F08080"; //event time color
$BTIME = "#111111"; //calendar time background color
$CTITL = "#AAAAAA"; //event title color
$BTITL = "#111111"; //event title background color
$CEVNT = "#909000"; //event description color
$BEVNT = "#111111"; //event background color
$CLINK = "#BBFFBB"; //URL link color

//FONT STYLE WEIGHT SIZE/LINE-HEIGHT FAMILY
//size and family are required; rest optional
$FBASE = "12px arial,sans-serif"; //base font
$FHEAD = "bold 1.5em arial,sans-serif"; //header font (if header specified)
$FDATE = "bold 1.2em arial,sans-serif"; //date font
$FTIME = "1.0em verdana,sans-serif"; //time font
$FETIT = "1.0em verdana,sans-serif"; //event title font
$FEVNT = "1.0em arial,sans-serif"; //event body font
$FNOEV = "1.0em arial,sans-serif"; //"No events" text

//VERTICAL SPACE in px
$HHEAD = "28"; //header height
$HBRKS = "2"; //extra space between event sections

/*------------------ end of default settings section ------------------*/

function makeEvtHead($head,$evt,$date) { //make event head
	global $xx;
	
	switch ($evt['mde']) { //multi-day event?
		case 0: $evtT = $evt['ald'] ? $xx['vws_all_day'] : ITtoDT($evt['sti']).($evt['eti'] ? ' - '.ITtoDT($evt['eti']) : ''); break; //no
		case 1: $evtT = ($evt['sti'] != '00:00' and $evt['sti'] != '') ? $xx['from']." ".ITtoDT($evt['sti']) : $xx['vws_all_day']; break; //first
		case 2: $evtT = $xx['vws_all_day']; break; //in between
		case 3: $evtT = ($evt['eti'] < '23:59' and $evt['eti'] != '') ? $xx['until']." ".ITtoDT($evt['eti']) : $xx['vws_all_day']; //last
	}
	$uStyle = $evt['uco'] ? " style='background-color:{$evt['uco']};'" : '';
	$cStyle = ($evt['cco'] ? "color:{$evt['cco']};" : '').($evt['cbg'] ? "background-color:{$evt['cbg']};" : '');
	$cStyle = !empty($cStyle) ? " style='{$cStyle}'" : '';
	$age = (isset($evt['rpt']) and $evt['rpt'] == 4 and preg_match('%(19|20)\d\d%',$evt['des'],$year)) ? strval(substr($date,0,4) - $year[0]) : '';
	if (!$age) { $head = preg_replace('~\|[^|]*#a[^|]*\|~','#a',$head); } //no age, delete section
	$keys = array('#t', '#e', '#c', '#u', '#o', '#a', '#/', '|'); //possible template keys
	$html = array("<span class='time'>{$evtT}</span>", $evt['tit'], "<span{$cStyle}>{$evt['tit']}</span>", "<span{$uStyle}>{$evt['tit']}</span>", $evt['una'], $age, "<br>", ""); //html code
	return str_replace($keys,$html,$head);
}

function showEvents($date) { //show events in calendar
	global $calID, $evtList, $evtHead, $evtBody, $usr, $futEvts, $evtWin, $rxULink, $rxIMGTags;
	
	$now = date('Y-m-dH:i');
	foreach ($evtList[$date] as $evt) {
		if ($futEvts and $evt['eti'] and $date.$evt['eti'] < $now) { continue; } //future events only
		$chBox = $evt['cbx'] ? checkBox($evt,$date) : '';
		if ($evtWin) {
			$onClick = " onclick=\"".($evt['mayE'] ? 'editE' : 'showE')."({$evt['eid']},'{$date}','{$calID}');\""; //view or post/edit 
			$cursor = 'point';
		} else {
			$onClick = '';
			$cursor = 'arrow';
		}
		echo "<div class='event'>\n";
		if (strpos($evtBody,'4') === false and preg_match($rxIMGTags,$evt['xf1'],$img)) { //image found in xf1
			$image = preg_match($rxULink,$evt['xf1'],$url) ? "<a href='{$url[1]}' target='_blank'>{$img[0]}</a>" : $img[0];
			echo "<span class='imageL'>{$image}</span>\n";
		}
		if (strpos($evtBody,'5') === false and preg_match($rxIMGTags,$evt['xf2'],$img)) { //image found in xf2
			$image = preg_match($rxULink,$evt['xf2'],$url) ? "<a href='{$url[1]}' target='_blank'>{$img[0]}</a>" : $img[0];
			echo "<span class='imageR'>{$image}</span>\n";
		}
		$eHead = makeEvtHead($evtHead,$evt,$date); //make event head
		echo "<div class='eHead'>{$chBox}<span class='{$cursor}'{$onClick}>{$eHead}</span></div>\n";
		echo "<div class='eBody'>".makeE($evt,$evtBody,'br',"<br>")."</div>\n";
		echo "</div>\n";
	}
}

function makeFDate($fromDate) { //compute from date
	global $futEvts;
	
	$fromDate = str_replace(' ','',$fromDate);
	if (preg_match('~^\d{2,4}[\./-]\d{2}[\./-]\d{2}$~i',$fromDate,$match)) { //fixed from date
		$fStamp = mktime(12,0,0,substr($fromDate,5,2),substr($fromDate,8,2),substr($fromDate,0,4)); //current Unix time
	} elseif (preg_match('~^(DAY|WEEK|MONTH|YEAR)([+-]\d{1,4})?$~i',$fromDate,$match)) { //parse from date
		$mult = !empty($match[2]) ? intval($match[2]) : 0;
		switch (strtoupper($match[1])) { //compute from date
		case 'DATE':
			break;
		case 'DAY':
			$fStamp = time() + ($mult * 86400); //time first day
			break;
		case 'WEEK':
			$fStamp = time() - ((date('w') - $set['weekStart']) * 86400) + ($mult * 604800); //time first day
			break;
		case 'MONTH':
			$fMonth = date('n') + $match[2]; //current month + offset
			$fStamp = mktime(12,0,0,$fMonth,1,date('Y')); //time first day of from month
			break;
		case 'YEAR':
			$fStamp = mktime(12,0,0,1,1,date('Y') + $mult); //time first day of from year
		}
	} else {
		echo 'Error in $fromDate'; exit;
	}
	if ($futEvts) { //future events only
		$fStamp = time(); //from date is today
	}
	return date('Y-m-d', $fStamp);
}

function makeTDate($tillDate) { //compute till date
	$tillDate = str_replace(' ','',$tillDate);
	if (preg_match('~^\d{2,4}[\./-]\d{2}[\./-]\d{2}$~i',$tillDate,$match)) { //fixed till date
		$tStamp = mktime(12,0,0,substr($tillDate,5,2),substr($tillDate,8,2),substr($tillDate,0,4)); //Unix time
	} elseif (preg_match('~^(DAY|WEEK|MONTH|YEAR)([+-]\d{1,4})?$~i',$tillDate,$match)) { //parse till date
		$mult = !empty($match[2]) ? intval($match[2]) : 0;
		switch (strtoupper($match[1])) { //compute till date
		case 'DAY':
			$tStamp = time() + ($mult * 86400); //time last day
			break;
		case 'WEEK':
			$tStamp = time() + ((6 - date('w') + $set['weekStart']) * 86400) + ($mult * 604800); //time first day
			break;
		case 'MONTH':
			$tMonth = date('n') + $match[2]; //current month + offset
			$tStamp = mktime(12,0,0,$tMonth,1,date('Y')) + ((date('t',$tMonth) - 1) * 86400); //time last day of till month
			break;
		case 'YEAR':
			$tStamp = mktime(12,0,0,1,0,date('Y') + $mult + 1); //time last day of till year (next year -1 day)
		}
	} else {
		echo 'Error in $tillDate'; exit;
	}
	return date('Y-m-d', $tStamp);
}

function makeDate($date) { //format dates
	global $months, $months_m, $wkDays, $wkDays_l, $dFormat;

	$m = intval(substr($date, 5, 2));
	$d = ltrim(substr($date, 8, 2),"0");
	$n = date("N", strtotime($date));
	$nDate = '';
	$dElms = array('W' => $wkDays[$n], 'w' => $wkDays_l[$n], 'M' => $months[$m - 1], 'm' => $months_m[$m - 1], 'd' => $d, '/' => "<br>"); //possible date elements
	foreach(str_split($dFormat) as $c) {
		$nDate .= !empty($dElms[$c]) ? $dElms[$c] : $c;
	}
	return $nDate;
}

/***** MAIN PROGRAM *****/

//error_reporting(E_ERROR); //errors only
error_reporting(E_ALL); //errors, warnings and notices - test line

//load display configuration
if (!empty($_GET['cnf']) and file_exists("./configs/{$_GET['cnf']}.cnf")) { //specified
	include "./configs/{$_GET['cnf']}.cnf";
} elseif (file_exists("./configs/".basename(__FILE__,'.php').".cnf")) { //default
	include "./configs/".basename(__FILE__,'.php').".cnf";
}
require './lcconfig.php'; //calendar config data
require './common/toolbox.php'; //tools
require './common/toolboxd.php'; //database tools
require './common/retrieve.php'; //retrieve function

if (empty($calID)) { $calID = $dbDef; } //select calendar

$dbH = dbConnect($calID); //connect to database
$set = getSettings(); //get settings from db
date_default_timezone_set($set['timeZone']); //set time zone
header("Cache-control: private"); //proxies: don't cache
if ($calName == '*') { $calName = $set['calendarTitle']; }

require './lang/ai-'.strtolower($set['language']).'.php'; //get ai texts

session_name('PHPSESSID'); //session cookie name
session_start();

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

	$fDate = makeFDate($fromDate); //compute from date
	$tDate = makeTDate($tillDate); //compute till date

	//set filters
	if ($cats) { //categories to show
		$cats = str_replace(' ','',$cats); //remove spaces
		$usr['vCats'] = ($usr['vCats'] == '0') ? $cats : implode(',',array_intersect(explode(',',$usr['vCats']),explode(',',$cats)));
	}
	$filter = ($users == 'own') ? " AND e.`userID` = {$uID}" : ($users ? " AND e.`userID` IN ({$users})" : '');
	$filter .= ($groups == 'own') ? " AND g.`ID` = {$usr['gID']}" : ($groups ? " AND g.`ID` IN ({$groups})" : '');
	if ($scats) { $filter .= " AND e.`scatID` IN ({$scats})"; }
	if ($venue) { $filter .= " AND e.`venue` LIKE '%{$venue}%'"; }
	if ($filter) { $filter = substr($filter,5); }

	retrieve($fDate,$tDate,'',$filter); //retrieve events
	
	if ($sortD) { krsort ($evtList); }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title><?php echo $set['calendarTitle']; ?></title>
<meta name="application-name" content="LuxCal V<?php echo LCV.' Display3 V'.$LDV?>">
<meta name="author" content="Roel Buining">
<meta name="robots" content="nofollow">
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php
echo "<link rel='icon' type='image/".substr(strrchr($icon,'.'),1)."' href='{$icon}'>\n";
echo "<script src='common/toolbox.js'></script>\n";
echo "<script>var calID = '{$calID}';</script>";
$calTop = ($calName or $login) ? (int)$MOUTR + (int)$HHEAD : (int)$MOUTR;
$hdrMarginV = (int)$MOUTR + 4;
$hdrMarginH = (int)$MOUTR + (int)$MINNR + (int)$WBORD;
echo "
<style type='text/css'>
* {padding:0; margin:0;}
body {font:{$FBASE}; background: {$BGENL}; overflow:hidden; cursor:default;}
br {display:block; margin-top:{$HBRKS}px;}
a {color:{$CLINK}; text-decoration:none; cursor:pointer;}
a:hover {text-shadow: 0.2em 0.3em 0.2em {$CLINK};}
img {max-height:{$maxImgH}px;}
fieldset {display:table-cell; font-size:1.1em; padding:8px; border:1px solid {$CBORD}; background:{$BEVNT}; border-radius:5px;}
legend {font-weight:bold; padding:0 5px; color:{$CHEAD}; background:{$BEVNT};}
input[type=text], input[type=password] {font-size:1.0em; padding:0 2px; color:{$CEVNT}; background:{$BGENL}; border-radius:2px; border:1px solid #666; cursor:text; height:18px; margin-bottom:10px;}
button {font-size:0.9em; padding:1px 4px; color:{$CLINK}; background:{$BGENL}; border-radius:4px; border:1px solid {$CBORD}; cursor:pointer;}
button:hover {border:1px solid #F44;}
div.msgLine {display:table; margin:30px auto; background:#F0A070; padding:4px 10px;}
div.dialogBox {display:table; margin:0 auto; font-size:1.0em; background:{$BEVNT}; padding:12px 18px; border:1px solid {$CBORD}; border-radius:5px; box-shadow:5px 5px 5px #888;}
.bold {font-weight:bold;}
.floatC {text-align:center;}
.point {cursor:pointer;}
div.header {font:{$FHEAD}; color:{$CHEAD}; margin:{$hdrMarginV}px {$hdrMarginH}px;}
form {color:{$CHEAD};}
form.login {float:right; color:{$CHEAD}; margin-right:{$hdrMarginH}px;}
div.container {position:absolute; top:{$calTop}px; right:{$MOUTR}px; bottom:{$MOUTR}px; left:{$MOUTR}px; padding:{$MINNR}px; overflow:auto; border:{$WBORD}px solid {$CBORD}; border-radius:{$RBORD}px;}
div.date {font:{$FDATE}; color:{$CDATE}; background:{$BDATE}; padding:{$MDATE}; clear:both;}
div.event { margin:{$MEVNT}; text-align:justify; text-justify:inter-word;}
div.eHead {font:{$FETIT}; color:{$CTITL}; background:{$BTITL}; margin:{$MTITL};}
div.eBody {color:{$CEVNT}; background:{$BEVNT}; margin:{$MBODY};}
div.noEvt {text-align:center; padding:30px 0; font:{$FNOEV};}
.chkBox {padding-right:2px;}
.time {font:{$FTIME}; color:{$CTIME}; background:{$BTIME};}
.imageL {float:left; margin: 0px 10px 10px 0px;}
.imageR {float:right; margin: 0px 0px 10px 10px;}
</style>
</head>
<body>\n";
//display calendar
if ($login and !$msg) { //display login/out button
	echo "<form class='login' action='".htmlspecialchars($_SERVER["REQUEST_URI"])."' method='post'>\n";
		echo $uID == 1 ? "<button type='submit' name='log' value='w'>{$xx['log_in']}</button>" : "{$usr['name']}&nbsp;&nbsp;<button type='submit' name='log' value='o'>{$xx['log_out']}</button>\n";
	echo "</form>\n";
}
if ($calName) {
	echo "<div class=".(($evtWin and $usr['privs'] > 1) ? "'header point' onclick='newE(0,0);'" : "'header'").">{$calName}</div>\n";
}
echo "<div class='container'>\n";
if ($msg) { //login form
	echo "<div class='msgLine'>{$msg}</div>\n";
	echo "<div class='dialogBox'>\n<fieldset><legend>{$xx['log_in']}</legend>
<form action='".htmlspecialchars($_SERVER["REQUEST_URI"])."' method='post'>
{$ax['log_un_or_em']}<br><input type='text' name='un_em' size='15' value='{$un_em}'><br><br>
{$ax['log_pw']}<br><input type='password' name='pword' size='15'><br><br>
<div class='floatC'><button type='submit' class='bold' name='log' value='i'>{$xx['log_in']}</button>\n";
	if ($usr['privs']) { echo "&nbsp;&nbsp;<button type='submit' name='back'>{$xx['back']}</button>\n"; }
	echo "</div>\n</form>
	</fieldset>
	</div>\n";
} else { //show events
	$evts1x = array(); //init
	if ($evtList) {
		foreach ($evtList as $cDate => &$events) { //loop thru dates
			foreach ($events as $k => $evt) { //loop thru events
				if (($evt['r_t'] and $recOnce) or ($evt['mde'] and $mulOnce)) { //remove recurring and/or multi-day event multiples
					if (in_array($evt['eid'],$evts1x)) {
						unset($events[$k]);
					} else {
						$evts1x[] = $evt['eid'];
					}
				}
			}
			if (empty($events)) { continue; } //no events left for this date
			if ($evtWin and $usr['privs'] > 1) {
				$onclick = " onclick=\"newE('{$cDate}',0);\" title='{$xx['vws_add_event']}'";
				$cursor = ' point';
			} else {
				$onclick = $cursor = '';
			}
			echo "<div class='date{$cursor}'{$onclick}>".makeDate($cDate)."</div>\n";
			showEvents($cDate); //show events for this date
			if (--$maxDays == 0) { break; }
		}
	} else {
		echo "<div class='noEvt'>{$noEvents}</div>\n";
	}
}
echo "</div>\n";
?>
</body>
</html>
