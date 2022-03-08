<?php
/* =========== LuxCal - PDF Print Events ===========*/ $LDV='2020-01-20';
/*Copyright 2009-2020 LuxSoft www.LuxSoft.eu
/*
This file is part of the LuxCal Calendar and is distributed WITHOUT ANY 
WARRANTY. See the GNU General Public License for details.

============================== MUST READ ================================
==== SEE THE pdf.txt FILE FOR A DETAILED DESCRIPTION AND INSTRUCTIONS ===
=========================================================================

/*------------------ start of default settings section ----------------*/

//GENERAL SETTINGS (see pdf.txt for details)
$calID = "mycal"; //calendar to use (ID of the calendar. Blank (""): the default calendar) 
$pageHdr = "#c - Upcoming Events"; //page header text (#c: calendar title)
$pageFtr = "#p>page #n>#d #u"; //page footer template (#p: period, #n: page number, #d: date/time printed, u: user name (if logged in), >: tab left > center > right)
$sortD = 0; //event sorting on dates; 0: ascending, 1: descending
$maxDays = 0; //max. number of days to show; 0: no maximum
$evtHead = '#e'; //event head template (#e: event title, #c: event title - category color, #u: event title - owner group color, #o: event owner, #/: new line)
$evtBody = '12345678'; //event fields to show (list of numbers: 1: venue, 2: category, 3: description, . . . for more see pdf.txt)
$hdStyle = 'B'; //event head style ('' (empty): none, 'B': bold, 'I': italic, 'U': underline)

//DATE FORMATS
$mFormat = "M y"; //month format (M: January, m: Jan, y:2020). Blank (""): No month/year line
$dFormat = "W d"; //day format (W: Monday, w: Mon, d: 21, M: January, m: Jan)

//PRINT COLORS
$cHEAD = "#606060"; //header text color
$bHEAD = "#90FFFF"; //header background color
$cMOYE = "#606060"; //month/year text color
$bMOYE = "#90FFFF"; //month/year background color
$cDATE = "#5862BA"; //day text color
$bDATE = "#E0E0E0"; //day background color

/*----------------- end of default settings section -------------------*/

function printEvents($date) { //print events to pdf
	global $pdf, $evtList, $xx, $evtHead, $evtBody, $hdStyle;

	foreach ($evtList[$date] as $evt) {
		switch ($evt['mde']) { //multi-day event?
			case 0: $evtT = $evt['ald'] ? $xx['vws_all_day'] : ITtoDT($evt['sti']).($evt['eti'] ? ' - '.ITtoDT($evt['eti']) : ''); break; //no
			case 1: $evtT = ($evt['sti'] != '00:00' and $evt['sti'] != '') ? $xx['from']." ".ITtoDT($evt['sti']) : $xx['vws_all_day']; break; //first
			case 2: $evtT = $xx['vws_all_day']; break; //in between
			case 3: $evtT = ($evt['eti'] < '23:59' and $evt['eti'] != '') ? $xx['until']." ".ITtoDT($evt['eti']) : $xx['vws_all_day']; //last
		}
		if (strpos($evtHead,'#c') !== false) { //category color
			$color = $evt['cco'] ? $evt['cco'] : '#505050';
			$bgrnd = $evt['cbg'] ? $evt['cbg'] : '#FFFFFF';
		} elseif (strpos($evtHead,'#u') !== false) { //user color
			$color = '#505050';
			$bgrnd = $evt['uco'] ? $evt['uco'] : '#FFFFFF';
		} else { //no color
			$color = '#505050';
			$bgrnd = '#FFFFFF';
		}
		$keys = array('#e', '#c', '#u', '#o', '#/'); //possible template keys
		$subs = array($evt['tit'], $evt['tit'], $evt['tit'], $evt['una'], "\n"); //substitutes
		$title = html_entity_decode(str_replace($keys,$subs,$evtHead),ENT_QUOTES);
		$body = $evtBody ? html_entity_decode(makeE($evt,$evtBody,'br',"<br>"),ENT_QUOTES) : '';
		$pdf->PrintEvent($evtT,$title,$body,strtoupper($hdStyle),$color,$bgrnd);
	}
}

function makeMoye($date) { //format dates
	global $months, $months_m, $mFormat;

	$y = intval(substr($date, 0, 4));
	$m = intval(substr($date, 5, 2));
	$d = ltrim(substr($date, 8, 2),"0");
	$nMoye = '';
	$dElms = array('M' => $months[$m - 1], 'm' => $months_m[$m - 1], 'y' => $y); //possible date elements
	foreach(str_split($mFormat) as $c) {
		$nMoye .= !empty($dElms[$c]) ? $dElms[$c] : $c;
	}
	return strtoupper($nMoye);
}

function makeDay($date) { //format dates
	global $months, $months_m, $wkDays, $wkDays_l, $dFormat;

	$m = intval(substr($date, 5, 2));
	$d = ltrim(substr($date, 8, 2),"0");
	$n = date("N", strtotime($date));
	$nDay = '';
	$dElms = array('W' => $wkDays[$n], 'w' => $wkDays_l[$n], 'M' => $months[$m - 1], 'm' => $months_m[$m - 1], 'd' => $d); //possible date elements
	foreach(str_split($dFormat) as $c) {
		$nDay .= !empty($dElms[$c]) ? $dElms[$c] : $c;
	}
	return $nDay;
}

/***** MAIN PROGRAM *****/

//error_reporting(E_ERROR); //errors only
error_reporting(E_ALL); //errors, warnings and notices - test line

chdir('..'); //change to calendar root

//sanity check
if (empty($_POST)) { exit('not permitted ('.substr(basename(__FILE__),0,-4).')'); } //launch via script only

//load pdf class + possible configuration
$pdf = !empty($_POST['pdf']) ? $_POST['pdf'] : '1';
require("./pdfs/pdfclass{$pdf}.php"); //PDF class
//load required scripts
require './lcconfig.php'; //calendar config data
require './common/toolbox.php'; //tools
require './common/toolboxd.php'; //database tools
require './common/retrieve.php'; //retrieve function

if (empty($calID)) { $calID = $dbDef; } //select calendar

$dbH = dbConnect($calID); //connect to database
$set = getSettings(); //get settings from db

//get user ID and event filters
$pars = json_decode($_POST['pdfJson']);  //decode json object
$uID = !empty($pars->uID) ? $pars->uID : 1; //default: public user
$users = !empty($pars->users) ? $pars->users : '0';
$groups = !empty($pars->groups) ? $pars->groups : '0';
$cats = !empty($pars->cats) ? $pars->cats : '0';
$venue = !empty($pars->venue) ? $pars->venue : '0';
$pdfCnf = !empty($pars->pdfCnf) ? $pars->pdfCnf : '';
$fDate = DDtoID($_POST['fDate']);
$tDate = DDtoID($_POST['tDate']);
if (!$fDate) { $fDate = date('Y-m-d',time()); }
if (!$tDate) { $tDate = date('Y-m-d',time() + ($set['lookaheadDays'] * 86400)); }
//load PDF configuration
if (!empty($pdfCnf) and file_exists("./configs/{$pdfCnf}.cnf")) { //specified
	include "./configs/{$pdfCnf}.cnf";
} elseif (file_exists("./configs/".basename(__FILE__,'.php').".cnf")) { //default
	include "./configs/".basename(__FILE__,'.php').".cnf";
}

$pageHdr = str_replace('#c',$set['calendarTitle'],$pageHdr);
date_default_timezone_set($set['timeZone']); //set time zone

require './lang/ui-'.strtolower($set['language']).'.php'; //ui texts

//get user credentials
$stH = dbQuery("SELECT u.`ID`, u.`name`, g.`ID` as gID, g.`privs`, g.`vCatIDs` as vCats, g.`eCatIDs` as eCats FROM `users` AS u INNER JOIN `groups` AS g ON g.`ID` = u.`groupID` WHERE u.`ID` = {$uID}");
$usr = $stH->fetch(PDO::FETCH_ASSOC); //user & group data
$stH = null; //release statement handle!

//set filters
if ($cats) { //categories to show
	$cats = str_replace(' ','',$cats); //remove spaces
	$usr['vCats'] = ($usr['vCats'] == '0') ? $cats : implode(',',array_intersect(explode(',',$usr['vCats']),explode(',',$cats)));
}
$filter = ($users == 'own') ? " AND e.`userID` = {$uID}" : ($users ? " AND e.`userID` IN ({$users})" : '');
$filter .= ($groups == 'own') ? " AND g.`ID` = {$usr['gID']}" : ($groups ? " AND g.`ID` IN ({$groups})" : '');
if ($venue) { $filter .= " AND e.`venue` LIKE '%{$venue}%'"; }
if ($filter) { $filter = substr($filter,5); }
$evtList = array(); //init
retrieve($fDate,$tDate,'',$filter); //retrieve events
if ($sortD) { krsort ($evtList); }

//create PDF document
//header definition
$title = $pageHdr;
$logo = $set['logoPath']; //path to logo image
$link = $set['backLinkUrl']; //logo hyperlink, e.g https://www.mysite.com
//footer definition
$keys = array('#p', '#d', '#n', '#u'); //possible template keys
$repl = array($_POST['fDate'].' - '.$_POST['tDate'], IDtoDD(date('Y-m-d')).' '.ITtoDT(date('H:i')), "#", ($usr['ID'] > 1 ? $usr['name'] : '')); //replacements
$footer = str_replace($keys,$repl,$pageFtr);
//document data
$pdf->SetTitle($set['calendarTitle'].' - Upcoming Events');
$pdf->SetAuthor($set['calendarTitle']);
$pdf->SetSubject("Events: {$fDate}-{$tDate}");
//fill document
$pdf->SetAutoPageBreak(true,10);
$pdf->AddPage();

if ($evtList) { //process events
	$month = '';
	foreach ($evtList as $cDate => &$events) { //loop thru dates
		if(substr($cDate,5,2) !== $month) {
			$pdf->PrintMonth(makeMoye($cDate)); //print date
			$month = substr($cDate,5,2);
		}
		$pdf->PrintDay(makeDay($cDate)); //print date
		printEvents($cDate); //show events for this date
		if (--$maxDays == 0) { break; }
	}
}
$pdf->Output('D',"Upcoming {$fDate} - {$tDate}.pdf"); //start download dialogue
?>
