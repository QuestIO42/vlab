<?php
/*
======== ADMIN WORK BENCH TOOLS =========

This file is part of the LuxCal Web Calendar.
Copyright 2009-2020 LuxSoft - www.LuxSoft.eu
License https://www.gnu.org/licenses/gpl.html GPL version 3

*/
$httpX = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' ? 'https' : 'http'); //init

//default settings
$defSet = array( //name => default value, outline
	'calendarTitle' => array('LuxCal Calendar','Calendar title displayed in the top bar'),
	'calendarUrl' => array("{$httpX}://{$_SERVER['SERVER_NAME']}".rtrim(dirname($_SERVER["PHP_SELF"]),'/').'/index.php','Calendar link (URL)'),
	'backLinkUrl' => array('','Nav bar back link URL (blank: no link, url: link)'),
	'logoPath' => array('','Path/name of optional left upper corner logo image'),
	'timeZone' => array('Europe/Amsterdam','Calendar time zone'),
	'notifChange' => array(0,'Send a notification when event added/edited/deleted (0:no, 1:yes)'),
	'chgRecipList' => array('','List of notification email/SMS addresses'),
	'maxXsWidth' => array(800,'Upper limit responsive calendar mode'),
	'rssFeed' => array(1,'Display RSS feed links in footer and HTML head (0:no, 1:yes)'),
	'logWarnings' => array(1,'Log calendar warning messages (0:no, 1:yes)'),
	'logNotices' => array(0,'Log calendar notice messages (0:no, 1:yes)'),
	'logVisitors' => array(0,'Log calendar visitors data (0:no, 1:yes)'),
	'maintMode' => array(0,'Run calendar in maintenance mode (0:no, 1:yes)'),
	'contButton' => array(1,'Display Contact button in side menu (0:no, 1:yes)'),
	'viewMenu' => array(1,'Display view menu in options panel (0:no, 1:yes)'),
	'groupMenu' => array(1,'Display group filter menu in options panel (0:no, 1:yes)'),
	'userMenu' => array(1,'Display user filter menu in options panel (0:no, 1:yes)'),
	'catMenu' => array(1,'Display category filter menu in options panel(0:no, 1:yes)'),
	'langMenu' => array(0,'Display ui-language selection menu in options panel (0:no, 1:yes)'),
	'viewsPublic' => array('1,2,3,4,5,6,7,8,9,10,11','Calendar views available to the public users'),
	'viewsLogged' => array('1,2,3,4,5,6,7,8,9,10,11','Calendar views available to the logged-in users'),
	'viewButsPub' => array('','View buttons on the navbar (1:year, ... 11:gantt) - public user'),
	'viewButsLog' => array('','View buttons on the navbar (1:year, ... 11:gantt) - logged in user'),
	'defViewPubL' => array(2,'View large display at start-up (1:year, ... 8:changes) - public user'),
	'defViewPubS' => array(7,'View small display at start-up (1:year, ... 8:changes) - public user'),
	'defViewLogL' => array(2,'View large display at start-up (1:year, ... 8:changes) - logged in user'),
	'defViewLogS' => array(7,'View small display at start-up (1:year, ... 8:changes) - logged in user'),
	'language' => array('English','Default user interface language'),
	'privEvents' => array(1,'Private events (0:disabled 1:enabled, 2:default, 3:always)'),
	'aldDefault' => array(0,'All-day event default in event window (0:no 1:yes)'),
	'details4All' => array(1,'Show event details to x users (0:none, 1:all, 2:logged-in users)'),
	'evtDelButton' => array(1,'Display Delete button in Event window (0:no, 1:yes, 2:manager)'),
	'eventColor' => array(1,'Event colors (0:no color, 1:cat color, 2:user group color)'),
	'defVenue' => array('','Default venue in the venue field of the event form'),
	'xField1Label' => array('','Label optional extra event field 1'),
	'xField2Label' => array('','Label optional extra event field 2'),
	'xField1Rights' => array(1,'Extra event field 1 minimum required rights to see'),
	'xField2Rights' => array(1,'Extra event field 2 minimum required rights to see'),
	'selfReg' => array(0,'Self-registration (0:no, 1:yes)'),
	'selfRegGrp' => array(4,'Self-registration user group ID'),
	'selfRegQ' => array('','Self-registration question to answer'),
	'selfRegA' => array('','Self-registration answer to selfregQ'),
	'selfRegNot' => array(0,'User self-reg notification to admin (0:no, 1:yes)'),
	'restLastSel' => array(1,'Restore last session when user revisits calendar'),
	'cookieExp' => array(30,'Number of days before a Remember Me cookie expires'),
	'evtTemplGen' => array('12345678','Event fields and order of fields in general views'),
	'evtTemplUpc' => array('123458','Event fields and order of fields in upcoming events view'),
	'evtTemplPop' => array('123458','Event fields and order of fields in hover box'),
	'evtSorting' => array(0,'Sort events on times or cat. seq. nr (0:times, 1:cat seq nr)'),
	'yearStart' => array(0,'Start month in year view (1-12 or 0, 0:current month)'),
	'YvColsToShow' => array(3,'Number of months to show per row in year view'),
	'YvRowsToShow' => array(4,'Number of rows to show in year view'),
	'MvWeeksToShow' => array(10,'Number of weeks to show in month view'),
	'XvWeeksToShow' => array(8,'Number of weeks to show in matrix view'),
	'GvWeeksToShow' => array(8,'Number of weeks to show in gantt view'),
	'workWeekDays' => array('12345','Working days (0: su - 6: sa)'),
	'weekStart' => array(1,'First day of the week (0: su - 6: sa)'),
	'lookbackDays' => array(30,'Days to look back in the todo list'),
	'lookaheadDays' => array(14,'Days to look ahead in upcoming view, todo list and RSS feeds'),
	'dwStartHour' => array(6,'Day/week view start hour'),
	'dwEndHour' => array(18,'Day/week view end hour'),
	'dwTimeSlot' => array(30,'Day/week time slot in minutes'),
	'dwTsHeight' => array(20,'Day/week time slot height in pixels'),
	'evtHeadM' => array('#ts #e','Event fields / layout template for month view'),
	'evtHeadW' => array('#ts #e','Event fields / layout template for week and day views'),
	'ownerTitle' => array(0,'Prepend owner to event title (0:disabled 1:enabled)'),
	'spMiniCal' => array(1,'Show mini calendar in side panel (0:disabled 1:enabled)'),
	'spImages' => array(1,'Show images in side panel (0:disabled 1:enabled)'),
	'spInfoArea' => array(1,'Show info area in side panel (0:disabled 1:enabled)'),
	'showImgInMV' => array(0,'Show images in month view (0:no, 1:yes)'),
	'monthInDCell' => array(0,'Show in month view month for each day (0:no, 1:yes)'),
	'evtWinSmall' => array(0,'Show reduced Event window (0:no, 1:yes)'),
	'mapViewer' => array('https://maps.google.com/maps?q=','map viewer for the event address button'),
	'dateFormat' => array('d.m.y','Date format: yyyy-mm-dd (y:yyyy, m:mm, d:dd)'),
	'MdFormat' => array('d M','Date format: dd month (d:dd, M:month)'),
	'MdyFormat' => array('d M y','Date format: dd month yyyy (d:dd, M:month, y:yyyy)'),
	'MyFormat' => array('M y','Date format: month yyyy (M:month, y:yyyy)'),
	'DMdFormat' => array('WD d M','Date format: weekday dd month (WD:weekday d:dd, M:month)'),
	'DMdyFormat' => array('WD d M y','Date format: weekday dd month yyyy (WD:weekday d:dd, M:month, y:yyyy)'),
	'timeFormat' => array('h:m','Time format (H:hh, h:h, m:mm, a:am|pm, A:AM|PM)'),
	'weekNumber' => array(1,'Week numbers on(1) or off(0)'),
	'maxUplSize' => array(2,'Max. size of uploaded attachment and thumbnail files in MBs'),
	'attTypes' => array('.pdf,.jpg,.gif,.png,.mp4,.avi','Valid types of uploaded attachments'),
	'tnlTypes' => array('.jpg,.jpeg,.gif,.png','Valid types of uploaded thumbnails'),
	'tnlMaxW' => array('160','Max. width of uploaded thumbnails image in pixels'),
	'tnlMaxH' => array('120','Max. height of uploaded thumbnails image in pixels'),
	'tnlDelDays' => array('20','thumbnails used since last 20 days cannot be deleted'),
	'emlService' => array(1,'Mail service (0:no, 1:yes)'),
	'smsService' => array(0,'SMS service (0:no, 1:yes)'),
	'defRecips' => array('','Default recipients list for email and SMS notifications'),
	'maxEmlCc' => array(10,'Default max. number of recipients in email Cc field'),
	'notSenderEml' => array(0,'Sender of notification emails (0:calendar, 1:user)'),
	'calendarEmail' => array('calendar@email.com','Sender of email notifications'),
	'smtpServer' => array('','SMTP mail server name'),
	'smtpPort' => array(465,'SMTP port number'),
	'smtpSsl' => array(1,'Use SSL (Secure Sockets Layer) (0:no, 1:yes)'),
	'smtpAuth' => array(1,'Use SMTP authentication (0:no, 1:yes)'),
	'smtpUser' => array('','SMTP username'),
	'smtpPass' => array('','SMTP password'),
	'notSenderSms' => array(0,'Sender of notification SMSes (0:calendar, 1:user)'),
	'calendarPhone' => array('','Sender of SMS notifications'),
	'smsCarrier' => array('','SMS carrier template (# = mob. phone number)'),
	'smsCountry' => array('','SMS country code'),
	'cCodePrefix' => array(1,'Country code starts with prefix + or 00 (0:no, 1:yes)'),
	'smsSubject' => array(' ','Subject field template for SMS emails to the carrier'),
	'maxLenSms' => array(70,'Maximum length of SMS messages (bytes)'),
	'smsAddLink' => array(0,'Add event report link to SMS (0:no, 1:yes)'),
	'mailServer' => array(1,'Mail server (1:PHP mail, 2:SMTP mail)'),
	'adminCronSum' => array(1,'Send cron job summary to admin (0:no, 1:yes)'),
	'chgNofDays' => array(0,'Days to look back for calendar changes summary'),
	'chgSumRecips' => array('','Recipient list for calendar change summaries'),
	'icsExport' => array(0,'Daily export of events in iCal format (0:no 1:yes)'),
	'eventExp' => array(0,'Number of days after due when an event expires / can be deleted (0:never)'),
	'maxNoLogin' => array(0,'Number of days not logged in, before deleting user account (0:never delete)'),
	'popFieldsSbar' => array('12345','Event fields in sidebar hover box (none: no box)'),
	'showLinkInSB' => array(1,'Show URL-links in sidebar (0:no, 1:yes)'),
	'sideBarDays' => array(14,'Days to look ahead in sidebar')
);

//default styles & settings
//B: background, C; color, E: border, F" font family, P: fontsize px, M; font size em
$defSaS = array( //name => default value
	'000' => 'THEME TITLE',
	'THEME' => '', //theme title
	'010' => 'GENERAL',
	'011' => 'BACKGROUND COLORS',
	'BXXXX' => '#E0E0E0', //calendar general
	'BTBAR' => '#FDFDFD', //calendar top bar
	'BBHAR' => '#96B4FF', //bar, headers & lines
	'BBUTS' => '#FFFFFF', //buttons
	'BDROP' => '#FFFFFF', //drop down menus
	'BXWIN' => '#FFFFEE', //event/help window
	'BINBX' => '#FFFFEE', //insert boxes
	'BOVBX' => '#FEFEFE', //overlay boxes
	'BFFLD' => '#FFFFFF', //form fields
	'BCONF' => '#A0D070', //confirmation msg
	'BWARN' => '#FFF0A0', //warning msg
	'BERRO' => '#F0A070', //error msg
	'BHLIT' => '#FF2222', //text highlight
	'012' => 'TEXT COLORS',
	'CXXXX' => '#2B3856', //normal text
	'CTBAR' => '#2B3856', //calendar top bar
	'CBHAR' => '#2B3856', //bars, headers & lines
	'CBUTS' => '#2B3856', //buttons
	'CDROP' => '#2B3856', //drop down menus
	'CXWIN' => '#2B3856', //event/help window
	'CINBX' => '#2B3856', //insert boxes
	'COVBX' => '#2B3856', //overlay boxes
	'CFFLD' => '#2B3856', //form fields
	'CCONF' => '#2B3856', //confirmation msg
	'CWARN' => '#2B3856', //warning msg
	'CERRO' => '#2B3856', //error msg
	'CHLIT' => '#2B3856', //text highlight
	'013' => 'BORDER COLORS',
	'EXXXX' => '#808080', //general borders
	'EOVBX' => '#96B4FF', //overlay borders
	'EBUTS' => '#0080FE', //buttons on hover borders
	'014' => 'FONT FAMILY/SIZES',
	'FFXXX' => 'arial,sans-serif', //base font family
	'PSXXX' => '12', //base font size
	'PTBAR' => '13', //top bar text
	'PPGTL' => '14', //page headers
	'PTHDL' => '13', //table headers L
	'MTHDM' => '1.0', //table headers M
	'MDTHD' => '1.0', //date headers
	'MSNHD' => '1.0', //section headers
	'MOVBX' => '1.0', //side bar, options panel
	'MFFLD' => '1.0', //form fields
	'MBUTS' => '0.9', //buttons
	'MPWIN' => '1.1', //popup window
	'MSMAL' => '0.8', //small text
	'015' => 'MISCELLANEOUS',
	'sTbSw' => 1, //top bar shadow (0:no 1:yes)
	'sCtOf' => 0, //content top in pixels

	'020' => 'GRID / VIEWS',
	'021' => 'BACKGROUND COLORS',
	'BGCTH' => '#F2F2F2', //day cell - hover
	'BGTFD' => '#96B4FF', //first day of month
	'BGWTC' => '#FFFFBB', //grid - weeknr/time column
	'BGWD1' => '#FFFFEE', //grid - weekday month 1
	'BGWD2' => '#FFFFDD', //grid - weekday month 2
	'BGWE1' => '#FFFFCC', //grid - weekend month 1
	'BGWE2' => '#FFFFBB', //grid - weekend month 2
	'BGOUT' => '#FEFEFE', //grid - outside month
	'BGTOD' => '#EEEEFF', //grid - day cell today
	'BGSEL' => '#FFEEEE', //grid - day cell selected day
	'BLINK' => '#FFFFFF', //URL & email links
	'BCHBX' => '#FFFFDD', //todo check box
	'022' => 'TEXT COLORS',
	'CGWTC' => '#666666', //cell head, times, week numbers
	'CGTFD' => '#2B3856', //1st day of month
	'CGWD1' => '#2B3856', //grid - weekday month 1
	'CGWD2' => '#2B3856', //grid - weekday month 2
	'CGWE1' => '#2B3856', //grid - weekend month 1
	'CGWE2' => '#2B3856', //grid - weekend month 2
	'CGOUT' => '#2B3856', //grid - outside month
	'CGTOD' => '#2B3856', //grid - day cell today
	'CGSEL' => '#2B3856', //grid - day cell selected day
	'CLINK' => '#C02020', //URL & email links
	'CCHBX' => '#FF0000', //todo check box
	'023' => 'BORDER COLORS',
	'EGTOD' => '#0000FF', //grid - day cell today
	'EGSEL' => '#FF0000', //grid - day cell selected day
	'024' => 'FONT SIZES',
	'MEVTI' => '1.0', //event title in views

	'030' => 'HOVER BOXES',
	'031' => 'BACKGROUND COLORS',
	'BHNOR' => '#FFFFE0', //normal event
	'BHPRI' => '#CCFFCC', //private event
	'BHREP' => '#FFFFE0', //repeating event
	'032' => 'TEXT COLORS',
	'CHNOR' => '#2B3856', //hover popup box
	'CHPRI' => '#2B3856', //hover popup box
	'CHREP' => '#2B3856', //hover popup box
	'033' => 'BORDER COLORS',
	'EHNOR' => '#808080', //normal event
	'EHPRI' => '#808080', //private event
	'EHREP' => '#E00060', //repeating event
	'034' => 'FONT SIZES',
	'MPOPU' => '1.0' //hover popup box
);

//database table SQL definitions
$sqlTableDefs = array(
	"events" => "`ID` INTEGER PRIMARY KEY ".($dbType == 'SQLite' ? 'AUTOINCREMENT' : 'AUTO_INCREMENT').",
		`type` TINYINT NOT NULL DEFAULT 0,
		`private` TINYINT NOT NULL DEFAULT 0,
		`title` VARCHAR(255) DEFAULT NULL,
		`venue` VARCHAR(128) DEFAULT NULL,
		`text1` TEXT DEFAULT NULL,
		`text2` VARCHAR(255) DEFAULT NULL,
		`text3` VARCHAR(255) DEFAULT NULL,
		`attach` TEXT DEFAULT NULL,
		`catID` MEDIUMINT NOT NULL DEFAULT 1,
		`scatID` TINYINT NOT NULL DEFAULT 0,
		`userID` MEDIUMINT DEFAULT NULL,
		`editor` VARCHAR(48) DEFAULT NULL,
		`approved` TINYINT NOT NULL DEFAULT 0,
		`checked` TEXT DEFAULT NULL,
		`notEml` TINYINT NOT NULL DEFAULT -1,
		`notSms` TINYINT NOT NULL DEFAULT -1,
		`notRecip` VARCHAR(255) DEFAULT NULL,
		`sDate` VARCHAR(10) DEFAULT NULL,
		`eDate` VARCHAR(10) NOT NULL DEFAULT '9999-00-00',
		`xDates` TEXT DEFAULT NULL,
		`sTime` VARCHAR(5) DEFAULT NULL,
		`eTime` VARCHAR(5) NOT NULL DEFAULT '99:00',
		`rType` TINYINT NOT NULL DEFAULT 0,
		`rInterval` TINYINT NOT NULL DEFAULT 0,
		`rPeriod` TINYINT NOT NULL DEFAULT 0,
		`rMonth` TINYINT NOT NULL DEFAULT 0,
		`rUntil` VARCHAR(10) NOT NULL DEFAULT '9999-00-00',
		`aDateTime` VARCHAR(16) NOT NULL DEFAULT '9999-00-00 00:00',
		`mDateTime` VARCHAR(16) NOT NULL DEFAULT '9999-00-00 00:00',
		`status` BOOLEAN NOT NULL DEFAULT 0",
	"categories" => "`ID` INTEGER PRIMARY KEY ".($dbType == 'SQLite' ? 'AUTOINCREMENT' : 'AUTO_INCREMENT').",
		`name` VARCHAR(48) DEFAULT NULL,
		`symbol` VARCHAR(8) DEFAULT NULL,
		`sequence` TINYINT NOT NULL DEFAULT 1,
		`repeat` TINYINT NOT NULL DEFAULT 0,
		`noverlap` TINYINT NOT NULL DEFAULT 0,
		`olapGap` TINYINT NOT NULL DEFAULT 0,
		`olErrMsg` VARCHAR(56) DEFAULT NULL,
		`defSlot` SMALLINT NOT NULL DEFAULT 0,
		`fixSlot` TINYINT NOT NULL DEFAULT 0,
		`approve` TINYINT NOT NULL DEFAULT 0,
		`dayColor` TINYINT NOT NULL DEFAULT 0,
		`color` VARCHAR(8) DEFAULT NULL,
		`bgColor` VARCHAR(8) DEFAULT NULL,
		`checkBx` TINYINT NOT NULL DEFAULT 0,
		`checkLb` VARCHAR(16) NOT NULL DEFAULT 'approved',
		`checkMk` VARCHAR(8) NOT NULL DEFAULT '&#x2713;',
		`subName1` VARCHAR(20) DEFAULT NULL,
		`subColor1` VARCHAR(8) DEFAULT NULL,
		`subBgrnd1` VARCHAR(8) DEFAULT NULL,
		`subName2` VARCHAR(20) DEFAULT NULL,
		`subColor2` VARCHAR(8) DEFAULT NULL,
		`subBgrnd2` VARCHAR(8) DEFAULT NULL,
		`subName3` VARCHAR(20) DEFAULT NULL,
		`subColor3` VARCHAR(8) DEFAULT NULL,
		`subBgrnd3` VARCHAR(8) DEFAULT NULL,
		`subName4` VARCHAR(20) DEFAULT NULL,
		`subColor4` VARCHAR(8) DEFAULT NULL,
		`subBgrnd4` VARCHAR(8) DEFAULT NULL,
		`urlLink` VARCHAR(120) DEFAULT NULL,
		`status` BOOLEAN NOT NULL DEFAULT 0",
	"users" => "`ID` INTEGER PRIMARY KEY ".($dbType == 'SQLite' ? 'AUTOINCREMENT' : 'AUTO_INCREMENT').",
		`name` VARCHAR(48) DEFAULT NULL,
		`password` VARCHAR(32) DEFAULT NULL,
		`tPassword` VARCHAR(32) DEFAULT NULL,
		`email` VARCHAR(255) DEFAULT NULL,
		`phone` VARCHAR(32) DEFAULT NULL,
		`number` VARCHAR(32) DEFAULT NULL,
		`groupID` MEDIUMINT NOT NULL DEFAULT 3,
		`language` VARCHAR(24) DEFAULT '',
		`login0` VARCHAR(10) NOT NULL DEFAULT '9999-00-00',
		`login1` VARCHAR(10) NOT NULL DEFAULT '9999-00-00',
		`loginCnt` MEDIUMINT NOT NULL DEFAULT 0,
		`status` BOOLEAN NOT NULL DEFAULT 0",
	"groups" => "`ID` INTEGER PRIMARY KEY ".($dbType == 'SQLite' ? 'AUTOINCREMENT' : 'AUTO_INCREMENT').",
		`name` VARCHAR(255) DEFAULT NULL,
		`privs` TINYINT NOT NULL DEFAULT 0,
		`vCatIDs` VARCHAR(128) NOT NULL DEFAULT '0',
		`eCatIDs` VARCHAR(128) NOT NULL DEFAULT '0',
		`rEvents` TINYINT NOT NULL DEFAULT 1,
		`mEvents` TINYINT NOT NULL DEFAULT 1,
		`pEvents` TINYINT NOT NULL DEFAULT 1,
		`upload` TINYINT NOT NULL DEFAULT 0,
		`sendSms` TINYINT NOT NULL DEFAULT 0,
		`tnPrivs` VARCHAR(2) NOT NULL DEFAULT '00',
		`color` VARCHAR(8) DEFAULT NULL,
		`status` BOOLEAN NOT NULL DEFAULT 0",
	"settings" => "`name` VARCHAR(16) DEFAULT NULL,
		`value` VARCHAR(255) DEFAULT NULL,
		`outline` VARCHAR(128) DEFAULT NULL",
	"styles" => "`name` VARCHAR(8) DEFAULT NULL,
		`value` VARCHAR(255) DEFAULT NULL"
);

function createDbTable($name,$drop = 0) { //create database table
	global $sqlTableDefs, $dbType;

	if ($drop) { dbQuery("DROP TABLE IF EXISTS `{$name}`"); }
	if ($dbType == 'SQLite') { //SQLite
		dbQuery("CREATE TABLE IF NOT EXISTS `{$name}` (\n{$sqlTableDefs[rtrim($name,'X')]})");
	} else { //MySQL
		dbQuery("CREATE TABLE IF NOT EXISTS `{$name}` (\n{$sqlTableDefs[rtrim($name,'X')]}) ENGINE=InnoDB  DEFAULT CHARSET=utf8 ");
	}
}

function initCats() { //init categories table
	$stH = stPrep("REPLACE INTO `categories` (`ID`,`name`,`sequence`) VALUES (?,?,?)");
	stExec($stH,array(1,'no cat',1));
}

function initUsers($adName,$adMail,$adPwMd5) { //init users table
	$users = array(array(1,'Public Access','','',3),array(2,$adName,$adMail,$adPwMd5,2)); //public user + admin user
	dbTransaction('begin');
	$stH = stPrep("REPLACE INTO `users` (`ID`,`name`,`email`,`password`,`groupID`) VALUES (?,?,?,?,?)");
	foreach($users as $user) {
		stExec($stH,$user);
	}
	dbTransaction('commit');
}

function initGroups() { //init groups table
	$groups = array(array(1,'No access',0,'0',0,0,'00'),array(2,'Admin',9,'0',1,1,'22'),array(3,'Read access',1,'0',0,0,'00'),array(4,'Post Own',2,'0',0,0,'20'),array(5,'Post All',3,'0',0,0,'21'),array(6,'Manager',4,'0',1,1,'22'));
	dbTransaction('begin');
	$stH = stPrep("REPLACE INTO `groups` (`ID`,`name`,`privs`,`vCatIDs`,`upload`,`sendSms`,`tnPrivs`) VALUES (?,?,?,?,?,?,?)");
	foreach($groups as $group) {
		stExec($stH,$group);
	}
	dbTransaction('commit');
}

function initStyles($calTitle = '') { //init styles table
	global $defSaS, $set;
	
	if (!empty($set['calendarTitle'])) { $calTitle = $set['calendarTitle']; }
	dbTransaction('begin');
	$stH = stPrep("INSERT INTO `styles` (`name`,`value`) VALUES (?,?)");
	foreach($defSaS as $key => $value) {
		$dbValue = $key != 'THEME' ? $value : $calTitle;
		if ($key[0] != '0') { //skip titles
			stExec($stH,array($key,$dbValue));
		}
	}
	dbTransaction('commit');
}

function checkSettings(&$dbSet) { //check & complete calendar settings
	global $defSet;
	
	foreach($defSet as $key => $value) {
		if (!isset($dbSet[$key])) { //set not-set settings to default value
			$dbSet[$key] = $value[0];
		}
	}
	foreach($dbSet as $key => $value) {
		if (!isset($defSet[$key])) { //delete redundant settings
			unset($dbSet[$key]);
		}
	}
}

function saveSettings(&$dbSet) { //save settings to calendar
	global $defSet;
	
	dbTransaction('begin');
	$stH = stPrep("DELETE FROM `settings`"); // empty table
	stExec($stH,null);
	$stH = stPrep("REPLACE INTO `settings` VALUES (?,?,?)"); //save settings
	foreach($dbSet as $key => $value) {
		stExec($stH,array($key,$value,$defSet[$key][1]));
	}
	dbTransaction('commit');
}

function saveConfig() { //save LuxCal version and db data to lcconfig.php
	global $lcV, $dbType, $dbDef, $dbSel, $crHost, $crIpAd;

	$config = '<?php
/*
= LuxCal configuration =
*/
$lcV="'.$lcV.'"; //LuxCal version';
	if ($dbType == 'SQLite') { //SQLite
		global $dbDir;

		$config .= '
$dbType="SQLite"; //db type (MySQL or SQLite)
$dbDir="'.(isset($dbDir) ? $dbDir : 'db/').'"; //db directory';
	} else { //MySQL
		global $dbHost, $dbUnam, $dbPwrd, $dbName;

		$config .= '
$dbType="MySQL"; //db type (MySQL or SQLite)
$dbHost="'.$dbHost.'"; //MySQL server
$dbUnam="'.$dbUnam.'"; //database username
$dbPwrd="'.$dbPwrd.'"; //database password
$dbName="'.$dbName.'"; //database name';
	}
	$config .= '
$dbDef="'.(isset($dbDef) ? $dbDef : '').'"; //default calendar (db name)
$dbSel='.(isset($dbSel) ? $dbSel : 1).'; //selectable in Options panel
$crHost='.(isset($crHost) ? $crHost : 0).'; //0:local, 1:remote, 2:remote+IP address
$crIpAd="'.(isset($crIpAd) ? $crIpAd : '').'"; //IP address of remote cron service
?>';
	return file_put_contents('./lcconfig.php',$config);
}

function backupDatabase($tables,$echo) { //create a backup file of the database tables
	global $dbType, $ax, $calID, $set, $lcV;
	
	//file header
	$sqlFile = "--
-- SQL DUMP ".date('Y.m.d @ H:i')."
-- Calendar: {$set['calendarTitle']}
-- Calendar ID: {$calID}
--
-- LuxCal version: {$lcV}
-- http://www.luxsoft.eu
--\n\n";
	if ($dbType == 'MySQL') { //MySQL database
		$sqlFile .= "SET SQL_MODE = \"NO_AUTO_VALUE_ON_ZERO\";\nSET time_zone = \"+00:00\";\n\n";
	}

	//backup tables
	foreach ($tables as $table) {
		if ($echo) { echo "{$ax['mdb_backup_table']} '{$table}' - "; }
		$sqlFile .= "-- ".str_repeat("-", 56)."\n\n--\n-- Table {$table}\n--\n\n";
		$sqlFile .= "DROP TABLE IF EXISTS `{$table}`;\n\n";
		$tableSql = getTableSql($table); //get SQL code to create table
		preg_match_all("%[\n|\(][\t\s]*[`'\"]?(\w+)[`'\"\s]%",$tableSql,$colNames); //get column names
		$sqlFile .= $tableSql.";\n\n";
		$stH = dbQuery("SELECT * FROM `{$table}`");
		$rows = 0;
		while($row = $stH->fetch(PDO::FETCH_NUM)) {
			if (($rows % 150) == 0) {
				$sqlFile .= "INSERT INTO `{$table}` (`".implode('`,`',$colNames[1])."`) VALUES\n";
			}
			$sqlFile .= "("; //start row
			foreach($row as $value) {
				$sqlFile .= isset($value) ? "'".str_replace(array("'","\\"),array("''",""),$value)."'," : "'',";
			}
			$sqlFile = rtrim($sqlFile,',').")"; //end row
			$rows++;
			$sqlFile .=	($rows % 150) != 0 ? ",\n" : ";\n";
		}
		$sqlFile = rtrim($sqlFile,",;\n").";\n\n"; //end of table
		$stH = null; //release statement handle
		if ($echo) { echo "{$ax['mdb_backup_done']} ({$rows} {$ax['mdb_records']})<br>\n"; }
	}
	return str_replace("\r\n","\n",$sqlFile);
}

function importSqlFile(&$sqlArray) { //import a database backup file
	global $dbType;

	//init
	$busy = false;
	$count = array('cat' => 0, 'eve' => 0, 'use' => 0, 'gro' => 0, 'set' => 0, 'sty' => 0); //init table counters
	//start restore
	dbTransaction('begin');
	foreach ($sqlArray as $qLine) {
		$qLine = trim($qLine);
		if (!$busy) { 
			$qLine06 = substr($qLine,0,6);
			if ($qLine06 != 'CREATE' and $qLine06 != 'INSERT') { continue; } //skip line
			//begin INSERT or CREATE
			if (!preg_match('~(events|categories|users|groups|settings|styles)~',strstr($qLine,'(',true),$table)) { continue; } //find table name before first '('
			$qLine = preg_replace('~["`]?(?:\w{1,20}_)?'.$table[1].'["`]~',"`{$table[1]}`",$qLine); //strip possible calID_ 
			$curTab = substr($table[1],0,3); //current table
			if ($qLine06 == 'CREATE') { //begin CREATE
				$stH = dbQuery("DROP TABLE IF EXISTS `{$table[1]}`;\n"); //drop table before creating
			}
			$busy = true;
			$query = '';
		}
		$query .= $qLine."\n";
		if (substr($qLine,-1) == ';') { //end of SQL query -> execute
			if ($qLine06 == 'CREATE') { //CREATE query
				if ($dbType == 'SQLite') { //SQLite - solve MySQL incompatibilities
					$query = preg_replace(array('~\sAUTO_?INCREMENT~','~\)[^;\)]*;$~'),array(' AUTOINCREMENT',');'),$query); //remove directives at end of 'create table'
				} else { //MySQL - solve SQLite incompatibilities
					$query = preg_replace('~\sAUTOINCREMENT~',' AUTO_INCREMENT',$query);
				}
			} else { //INSERT query
				$query = preg_replace('~\\\\+["\']~',"''",$query); //modify escaped quotes
				$rowsStart = strpos($query,'VALUES') + 6;
				$count[$curTab] += (substr_count($query,'),',$rowsStart) + 1); //increment INSERT counter with number of rows
			}
			$stH = dbQuery($query);
			$busy = false;
		}
	}
	dbTransaction('commit');
	return $count;
}

//
//Upgrade the current ($calID) database from 2.7.2+ to the latest version
//
function upgradeDb() { //upgrade $calID database from 2.7.2+
	global $dbType;
	
	/* === tables pre-processing === */
	//if users.sedit: set privs to 9 for admin accounts (sedit == 1)
	$stH = dbQuery("SELECT `sedit` FROM `users` LIMIT 1",0);
	if ($stH) { //column 'sedit' present (V2.7.2)
		$stH = null;
		dbQuery("UPDATE `users` SET `privs` = 9 WHERE `sedit` = 1");
	}
	//if table groups not existing - create and populate
	$stH = dbQuery("SELECT * FROM `groups` LIMIT 1",0);
	if ($stH === false) { //table not present
		$stH = null;
		createDbTable("groups");
		initGroups();
	}
	//if table styles not existing - create and populate
	$stH = dbQuery("SELECT * FROM `styles` LIMIT 1",0);
	if ($stH === false) { //table not present
		$stH = null;
		createDbTable("styles");
		initStyles();
	} else { //table present, if empty - initialize
		$stH = dbQuery("SELECT COUNT(*) FROM `styles` LIMIT 1",0);
		$result = $stH->fetch(PDO::FETCH_NUM);
		if ($result[0] == 0) { //empty
			initStyles();
		}
	}

	//create temporary tables with new schema
	createDbTable("usersX");
	createDbTable("groupsX");
	createDbTable("categoriesX");
	createDbTable("eventsX");
	createDbTable("settingsX");
	createDbTable("stylesX");

	/* === tables version-processing === */
	dbTransaction('begin');
	do {
		//test if version < 3.1
		$stH = dbQuery("SELECT `approve` FROM `categories` LIMIT 1",0);
		if (!$stH) { //column 'approve' not present - version 2.7
			$lcVUpg = '2.7';
			dbQuery("INSERT INTO `eventsX` (`ID`,`private`,`title`,`venue`,`text1`,`catID`,`userID`,`editor`,`checked`,`notEml`,`notRecip`,`sDate`,`eDate`,`xDates`,`sTime`,`eTime`,`rType`,`rInterval`,`rPeriod`,`rMonth`,`rUntil`,`aDateTime`,`mDateTime`,`status`) 
				SELECT `event_id`,`private`,`title`,`venue`,`description`,`category_id`,`user_id`,`editor`,`checked`,`notify`,`not_mail`,`s_date`,`e_date`,`x_dates`,SUBSTRING(`s_time`,1,5),SUBSTRING(`e_time`,1,5) ,`r_type`,`r_interval`,`r_period`,`r_month`,`r_until`,`a_date`,`m_date`,`status` FROM `events`"); //copy content events table
			dbQuery("INSERT INTO `usersX` (`ID`,`name`,`password`,`tPassword`,`email`,`groupID`,`language`,`login0`,`login1`,`loginCnt`,`status`) 
				SELECT `user_id`,`user_name`,`password`,`temp_password`,`email`,`privs`,`language`,`login_0`,`login_1`,`login_cnt`,`status` FROM `users`"); //copy content users table
			dbQuery("INSERT INTO `groupsX` SELECT * FROM `groups`"); //new table, no change
			dbQuery("INSERT INTO `categoriesX` (`ID`,`name`,`sequence`,`repeat`,`color`,`bgColor`,`checkBx`,`checkLb`,`checkMk`,`status`) 
				SELECT `category_id`,`name`,`sequence`,`rpeat`,`color`,`background`,`check2`,`label2`,`mark2`,`status` FROM `categories`"); //copy content categories table
			dbQuery("INSERT INTO `settingsX` (`name`,`value`,`outline`) 
				SELECT `name`,`value`,`description` FROM `settings`"); //copy content settings table
			dbQuery("INSERT INTO `stylesX` SELECT * FROM `styles`"); //new table, no change
				break; //done
		}
		//test if version = 3.1
		$stH = dbQuery("SELECT `a_date` FROM `events` LIMIT 1",0);
		if ($stH !== false) { //column 'a_date' present - version 3.1
			$lcVUpg = '3.1';
			dbQuery("INSERT INTO `eventsX` (`ID`,`private`,`title`,`venue`,`text1`,`catID`,`userID`,`editor`,`approved`,`checked`,`notEml`,`notRecip`,`sDate`,`eDate`,`xDates`,`sTime`,`eTime`,`rType`,`rInterval`,`rPeriod`,`rMonth`,`rUntil`,`aDateTime`,`mDateTime`,`status`) 
				SELECT `event_id`,`private`,`title`,`venue`,`description`,`category_id`,`user_id`,`editor`,`approved`,`checked`,`notify`,`not_mail`,`s_date`,`e_date`,`x_dates`,SUBSTRING(`s_time`,1,5),SUBSTRING(`e_time`,1,5),`r_type`,`r_interval`,`r_period`,`r_month`,`r_until`,`a_date`,`m_date`,`status` FROM `events`"); //copy content events table
			dbQuery("INSERT INTO `usersX` (`ID`,`name`,`password`,`tPassword`,`email`,`groupID`,`language`,`login0`,`login1`,`loginCnt`,`status`) 
				SELECT `user_id`,`user_name`,`password`,`temp_password`,`email`,`privs`,`language`,`login_0`,`login_1`,`login_cnt`,`status` FROM `users`"); //copy content users table
			dbQuery("INSERT INTO `groupsX` SELECT * FROM `groups`"); //new table, no change
			dbQuery("INSERT INTO `categoriesX` (`ID`,`name`,`sequence`,`repeat`,`approve`,`color`,`bgColor`,`checkBx`,`checkLb`,`checkMk`,`status`) 
				SELECT `category_id`,`name`,`sequence`,`rpeat`,`approve`,`color`,`background`,`chbox`,`chlabel`,`chmark`,`status` FROM `categories`"); //copy content categories table
			dbQuery("INSERT INTO `settingsX` (`name`,`value`,`outline`) 
				SELECT `name`,`value`,`description` FROM `settings`"); //copy content settings table
			dbQuery("INSERT INTO `stylesX` SELECT * FROM `styles`"); //new table, no change
			break; //done
		}
		//test if version = 3.2
		$stH = dbQuery("SELECT `ID` FROM `events` LIMIT 1",0);
		if (!$stH) { //column 'ID' not present - version 3.2
			$lcVUpg = '3.2';
			dbQuery("INSERT INTO `eventsX` (`ID`,`private`,`title`,`venue`,`text1`,`text2`,`text3`,`catID`,`userID`,`editor`,`approved`,`checked`,`notEml`,`notRecip`,`sDate`,`eDate`,`xDates`,`sTime`,`eTime`,`rType`,`rInterval`,`rPeriod`,`rMonth`,`rUntil`,`aDateTime`,`mDateTime`,`status`) 
				SELECT `event_id`,`private`,`title`,`venue`,`description`,`xfield1`,`xfield2`,`category_id`,`user_id`,`editor`,`approved`,`checked`,`notify`,`not_mail`,`s_date`,`e_date`,`x_dates`,SUBSTR(`s_time`,1,5),SUBSTR(`e_time`,1,5),`r_type`,`r_interval`,`r_period`,`r_month`,`r_until`,SUBSTR(`a_datetime`,1,16),SUBSTR(`m_datetime`,1,16),`status` FROM `events`"); //copy content events table
			dbQuery("INSERT INTO `usersX` (`ID`,`name`,`password`,`tPassword`,`email`,`groupID`,`language`,`login0`,`login1`,`loginCnt`,`status`) 
				SELECT `user_id`,`user_name`,`password`,`temp_password`,`email`,`privs`,`language`,`login_0`,`login_1`,`login_cnt`,`status` FROM `users`"); //copy content users table
			dbQuery("INSERT INTO `groupsX` SELECT * FROM `groups`"); //new table, no change
			dbQuery("INSERT INTO `categoriesX` (`ID`,`name`,`sequence`,`repeat`,`approve`,`color`,`bgColor`,`checkBx`,`checkLb`,`checkMk`,`status`) 
				SELECT `category_id`,`name`,`sequence`,`rpeat`,`approve`,`color`,`background`,`chbox`,`chlabel`,`chmark`,`status` FROM `categories`"); //copy content categories table
			dbQuery("INSERT INTO `settingsX` (`name`,`value`,`outline`) 
				SELECT `name`,`value`,`description` FROM `settings`"); //copy content settings table
			dbQuery("INSERT INTO `stylesX` SELECT * FROM `styles`"); //new table, no change
			break; //done
		}
		//test if version = 4.1
		$stH = dbQuery("SELECT `dayColor` FROM `categories` LIMIT 1",0);
		if (!$stH) { //column 'dayColor' not present - version 4.1
			$lcVUpg = '4.1';
			dbQuery("INSERT INTO `eventsX` (`ID`,`private`,`title`,`venue`,`text1`,`text2`,`text3`,`catID`,`userID`,`editor`,`approved`,`checked`,`notEml`,`notRecip`,`sDate`,`eDate`,`xDates`,`sTime`,`eTime`,`rType`,`rInterval`,`rPeriod`,`rMonth`,`rUntil`,`aDateTime`,`mDateTime`,`status`) 
				SELECT `ID`,`private`,`title`,`venue`,`text1`,`text2`,`text3`,`catID`,`userID`,`editor`,`approved`,`checked`,`notify`,`notMail`,`sDate`,`eDate`,`xDates`,`sTime`,`eTime`,`rType`,`rInterval`,`rPeriod`,`rMonth`,`rUntil`,`aDateTime`,`mDateTime`,`status` FROM `events`"); //copy content events table
			dbQuery("INSERT INTO `usersX` (`ID`,`name`,`password`,`tPassword`,`email`,`groupID`,`language`,`login0`,`login1`,`loginCnt`,`status`) 
				SELECT `ID`,`name`,`password`,`tPassword`,`email`,`groupID`,`language`,`login0`,`login1`,`loginCnt`,`status` FROM `users`"); //copy content users table
			dbQuery("INSERT INTO `groupsX` (`ID`,`name`,`privs`,`vCatIDs`,`color`,`status`) 
				SELECT `ID`,`name`,`privs`,`catIDs`,`color`,`status` FROM `groups`"); //copy content groups table
			dbQuery("INSERT INTO `categoriesX` (`ID`,`name`,`sequence`,`repeat`,`approve`,`color`,`bgColor`,`checkBx`,`checkLb`,`checkMk`,`status`) 
				SELECT `ID`,`name`,`sequence`,`repeat`,`approve`,`color`,`bgColor`,`checkBx`,`checkLb`,`checkMk`,`status` FROM `categories`"); //copy content categories table
			dbQuery("INSERT INTO `settingsX` SELECT * FROM `settings`"); //copy content settings table
			dbQuery("INSERT INTO `stylesX` SELECT * FROM `styles`"); //new table, no change
			break; //done
		}
		//test if version = 4.2
		$stH = dbQuery("SELECT `noverlap` FROM `categories` LIMIT 1",0);
		if (!$stH) { //column 'overlay' not present - version 4.2
			$lcVUpg = '4.2';
			dbQuery("INSERT INTO `eventsX` (`ID`,`private`,`title`,`venue`,`text1`,`text2`,`text3`,`catID`,`userID`,`editor`,`approved`,`checked`,`notEml`,`notRecip`,`sDate`,`eDate`,`xDates`,`sTime`,`eTime`,`rType`,`rInterval`,`rPeriod`,`rMonth`,`rUntil`,`aDateTime`,`mDateTime`,`status`) 
				SELECT `ID`,`private`,`title`,`venue`,`text1`,`text2`,`text3`,`catID`,`userID`,`editor`,`approved`,`checked`,`notify`,`notMail`,`sDate`,`eDate`,`xDates`,`sTime`,`eTime`,`rType`,`rInterval`,`rPeriod`,`rMonth`,`rUntil`,`aDateTime`,`mDateTime`,`status` FROM `events`"); //copy content events table
			dbQuery("INSERT INTO `usersX` (`ID`,`name`,`password`,`tPassword`,`email`,`groupID`,`language`,`login0`,`login1`,`loginCnt`,`status`) 
				SELECT `ID`,`name`,`password`,`tPassword`,`email`,`groupID`,`language`,`login0`,`login1`,`loginCnt`,`status` FROM `users`"); //copy content users table
			dbQuery("INSERT INTO `groupsX` (`ID`,`name`,`privs`,`vCatIDs`,`color`,`status`) 
				SELECT `ID`,`name`,`privs`,`catIDs`,`color`,`status` FROM `groups`"); //copy content groups table
			dbQuery("INSERT INTO `categoriesX` (`ID`,`name`,`sequence`,`repeat`,`approve`,`dayColor`,`color`,`bgColor`,`checkBx`,`checkLb`,`checkMk`,`status`) 
				SELECT `ID`,`name`,`sequence`,`repeat`,`approve`,`dayColor`,`color`,`bgColor`,`checkBx`,`checkLb`,`checkMk`,`status` FROM `categories`"); //copy content categories table
			dbQuery("INSERT INTO `settingsX` SELECT * FROM `settings`"); //copy content settings table
			dbQuery("INSERT INTO `stylesX` SELECT * FROM `styles`"); //new table, no change
			break; //done
		}
		//test if version = 4.3
		$stH = dbQuery("SELECT `attach` FROM `events` LIMIT 1",0);
		if (!$stH) { //column 'attach' not present - version 4.3
			$lcVUpg = '4.3';
			dbQuery("INSERT INTO `eventsX` (`ID`,`private`,`title`,`venue`,`text1`,`text2`,`text3`,`catID`,`userID`,`editor`,`approved`,`checked`,`notEml`,`notRecip`,`sDate`,`eDate`,`xDates`,`sTime`,`eTime`,`rType`,`rInterval`,`rPeriod`,`rMonth`,`rUntil`,`aDateTime`,`mDateTime`,`status`) 
				SELECT `ID`,`private`,`title`,`venue`,`text1`,`text2`,`text3`,`catID`,`userID`,`editor`,`approved`,`checked`,`notify`,`notMail`,`sDate`,`eDate`,`xDates`,`sTime`,`eTime`,`rType`,`rInterval`,`rPeriod`,`rMonth`,`rUntil`,`aDateTime`,`mDateTime`,`status` FROM `events`"); //copy content events table
			dbQuery("INSERT INTO `usersX` (`ID`,`name`,`password`,`tPassword`,`email`,`groupID`,`language`,`login0`,`login1`,`loginCnt`,`status`) 
				SELECT `ID`,`name`,`password`,`tPassword`,`email`,`groupID`,`language`,`login0`,`login1`,`loginCnt`,`status` FROM `users`"); //copy content users table
			dbQuery("INSERT INTO `groupsX` (`ID`,`name`,`privs`,`vCatIDs`,`rEvents`,`mEvents`,`pEvents`,`color`,`status`) 
				SELECT `ID`,`name`,`privs`,`catIDs`,`rEvents`,`mEvents`,`pEvents`,`color`,`status` FROM `groups`"); //copy content groups table
			dbQuery("INSERT INTO `categoriesX` (`ID`,`name`,`sequence`,`repeat`,`noverlap`,`olErrMsg`,`defSlot`,`approve`,`dayColor`,`color`,`bgColor`,`checkBx`,`checkLb`,`checkMk`,`status`)
				SELECT `ID`,`name`,`sequence`,`repeat`,`noverlap`,`olErrMsg`,`defSlot`,`approve`,`dayColor`,`color`,`bgColor`,`checkBx`,`checkLb`,`checkMk`,`status` FROM `categories`"); //copy content categories table
			dbQuery("INSERT INTO `settingsX` SELECT * FROM `settings`"); //copy content settings table
			dbQuery("INSERT INTO `stylesX` SELECT * FROM `styles`"); //new table, no change
			break; //done
		}
		//test if version = 4.4
		$stH = dbQuery("SELECT `vCatIDs` FROM `groups` LIMIT 1",0);
		if (!$stH) { //column 'vCatIDs' not present - version 4.4
			$lcVUpg = '4.4';
			dbQuery("INSERT INTO `eventsX` (`ID`,`private`,`title`,`venue`,`text1`,`text2`,`text3`,`attach`,`catID`,`userID`,`editor`,`approved`,`checked`,`notEml`,`notRecip`,`sDate`,`eDate`,`xDates`,`sTime`,`eTime`,`rType`,`rInterval`,`rPeriod`,`rMonth`,`rUntil`,`aDateTime`,`mDateTime`,`status`) 
				SELECT `ID`,`private`,`title`,`venue`,`text1`,`text2`,`text3`,`attach`,`catID`,`userID`,`editor`,`approved`,`checked`,`notify`,`notMail`,`sDate`,`eDate`,`xDates`,`sTime`,`eTime`,`rType`,`rInterval`,`rPeriod`,`rMonth`,`rUntil`,`aDateTime`,`mDateTime`,`status` FROM `events`"); //copy content events table
			dbQuery("INSERT INTO `usersX` (`ID`,`name`,`password`,`tPassword`,`email`,`groupID`,`language`,`login0`,`login1`,`loginCnt`,`status`) 
				SELECT `ID`,`name`,`password`,`tPassword`,`email`,`groupID`,`language`,`login0`,`login1`,`loginCnt`,`status` FROM `users`"); //copy content users table
			dbQuery("INSERT INTO `groupsX` (`ID`,`name`,`privs`,`vCatIDs`,`rEvents`,`mEvents`,`pEvents`,`upload`,`color`,`status`) 
				SELECT `ID`,`name`,`privs`,`catIDs`,`rEvents`,`mEvents`,`pEvents`,`upload`,`color`,`status` FROM `groups`"); //copy content groups table
			dbQuery("INSERT INTO `categoriesX` (`ID`,`name`,`sequence`,`repeat`,`noverlap`,`olErrMsg`,`defSlot`,`approve`,`dayColor`,`color`,`bgColor`,`checkBx`,`checkLb`,`checkMk`,`status`)
				SELECT `ID`,`name`,`sequence`,`repeat`,`noverlap`,`olErrMsg`,`defSlot`,`approve`,`dayColor`,`color`,`bgColor`,`checkBx`,`checkLb`,`checkMk`,`status` FROM `categories`"); //copy content categories table
			dbQuery("INSERT INTO `settingsX` SELECT * FROM `settings`"); //copy content settings table
			dbQuery("INSERT INTO `stylesX` SELECT * FROM `styles`"); //new table, no change
			break; //done
		}
		//test if version = 4.5
		$stH = dbQuery("SELECT `notRecip` FROM `events` LIMIT 1",0);
		if (!$stH) { //column 'notRecip' not present - version 4.5
			$lcVUpg = '4.5';
			dbQuery("INSERT INTO `eventsX` (`ID`,`private`,`title`,`venue`,`text1`,`text2`,`text3`,`attach`,`catID`,`scatID`,`userID`,`editor`,`approved`,`checked`,`notEml`,`notRecip`,`sDate`,`eDate`,`xDates`,`sTime`,`eTime`,`rType`,`rInterval`,`rPeriod`,`rMonth`,`rUntil`,`aDateTime`,`mDateTime`,`status`) 
				SELECT `ID`,`private`,`title`,`venue`,`text1`,`text2`,`text3`,`attach`,`catID`,`scatID`,`userID`,`editor`,`approved`,`checked`,`notify`,`notMail`,`sDate`,`eDate`,`xDates`,`sTime`,`eTime`,`rType`,`rInterval`,`rPeriod`,`rMonth`,`rUntil`,`aDateTime`,`mDateTime`,`status` FROM `events`"); //copy content events table
			dbQuery("INSERT INTO `usersX` (`ID`,`name`,`password`,`tPassword`,`email`,`groupID`,`language`,`login0`,`login1`,`loginCnt`,`status`) 
				SELECT `ID`,`name`,`password`,`tPassword`,`email`,`groupID`,`language`,`login0`,`login1`,`loginCnt`,`status` FROM `users`"); //copy content users table
			dbQuery("INSERT INTO `groupsX` (`ID`,`name`,`privs`,`vCatIDs`,`eCatIDs`,`rEvents`,`mEvents`,`pEvents`,`upload`,`color`,`status`) 
				SELECT `ID`,`name`,`privs`,`vcatIDs`,`ecatIDs`,`rEvents`,`mEvents`,`pEvents`,`upload`,`color`,`status` FROM `groups`"); //copy content groups table
			dbQuery("INSERT INTO `categoriesX` (`ID`,`name`,`symbol`,`sequence`,`repeat`,`noverlap`,`olErrMsg`,`defSlot`,`approve`,`dayColor`,`color`,`bgColor`,`checkBx`,`checkLb`,`checkMk`,`subName1`,`subColor1`,`subBgrnd1`,`subName2`,`subColor2`,`subBgrnd2`,`subName3`,`subColor3`,`subBgrnd3`,`subName4`,`subColor4`,`subBgrnd4`,`urlLink`,`status`)
				SELECT `ID`,`name`,`symbol`,`sequence`,`repeat`,`noverlap`,`olErrMsg`,`defSlot`,`approve`,`dayColor`,`color`,`bgColor`,`checkBx`,`checkLb`,`checkMk`,`subName1`,`subColor1`,`subBgrnd1`,`subName2`,`subColor2`,`subBgrnd2`,`subName3`,`subColor3`,`subBgrnd3`,`subName4`,`subColor4`,`subBgrnd4`,`urlLink`,`status` FROM `categories`"); //copy content categories table
			dbQuery("INSERT INTO `settingsX` SELECT * FROM `settings`"); //no change
			dbQuery("INSERT INTO `stylesX` SELECT * FROM `styles`"); //no change
			break; //done
		}
		//test if version = 4.6
		$stH = dbQuery("SELECT `olapGap` FROM `categories` LIMIT 1",0);
		if (!$stH) { //column 'olapGap' not present - version 4.6
			$lcVUpg = '4.6';
			dbQuery("INSERT INTO `eventsX` SELECT * FROM `events`");
			dbQuery("INSERT INTO `usersX` SELECT * FROM `users`");
			dbQuery("INSERT INTO `groupsX` (`ID`,`name`,`privs`,`vCatIDs`,`eCatIDs`,`rEvents`,`mEvents`,`pEvents`,`upload`,`sendSms`,`color`,`status`) 
				SELECT `ID`,`name`,`privs`,`vcatIDs`,`ecatIDs`,`rEvents`,`mEvents`,`pEvents`,`upload`,`sendSms`,`color`,`status` FROM `groups`"); //copy content groups table
			dbQuery("INSERT INTO `categoriesX` (`ID`,`name`,`symbol`,`sequence`,`repeat`,`noverlap`,`olErrMsg`,`defSlot`,`approve`,`dayColor`,`color`,`bgColor`,`checkBx`,`checkLb`,`checkMk`,`subName1`,`subColor1`,`subBgrnd1`,`subName2`,`subColor2`,`subBgrnd2`,`subName3`,`subColor3`,`subBgrnd3`,`subName4`,`subColor4`,`subBgrnd4`,`urlLink`,`status`)
				SELECT `ID`,`name`,`symbol`,`sequence`,`repeat`,`noverlap`,`olErrMsg`,`defSlot`,`approve`,`dayColor`,`color`,`bgColor`,`checkBx`,`checkLb`,`checkMk`,`subName1`,`subColor1`,`subBgrnd1`,`subName2`,`subColor2`,`subBgrnd2`,`subName3`,`subColor3`,`subBgrnd3`,`subName4`,`subColor4`,`subBgrnd4`,`urlLink`,`status` FROM `categories`"); //copy content categories table
			dbQuery("INSERT INTO `settingsX` SELECT * FROM `settings`"); //no change
			dbQuery("INSERT INTO `stylesX` SELECT * FROM `styles`"); //no change
			break; //done
		}
		//version = current version (no changes)
		$lcVUpg = '4.7';
		dbQuery("INSERT INTO `eventsX` SELECT * FROM `events`");
		dbQuery("INSERT INTO `usersX` SELECT * FROM `users`");
		dbQuery("INSERT INTO `groupsX` SELECT * FROM `groups`");
		dbQuery("INSERT INTO `categoriesX` SELECT * FROM `categories`");
		dbQuery("INSERT INTO `settingsX` SELECT * FROM `settings`");
		dbQuery("INSERT INTO `stylesX` SELECT * FROM `styles`");
	} while (0); //end of: process calendar $calID

	/* === tables post-processing === */
	$stH = dbQuery("SELECT `privs` FROM `users` LIMIT 1",0);
	if ($stH !== false) { //privs found, table groups is new
		$stH = null;
		//convert users.groupID (old privs) to new groupID
		$groups = array(0 => 1, 9 => 2, 1 => 3, 2 => 4, 3 => 5, 4 => 6);
		$stH = dbQuery("SELECT `ID`,`groupID` FROM `usersX`"); //get groupID (old privs)
		while ($row = $stH->fetch(PDO::FETCH_ASSOC)) {
			dbQuery("UPDATE `usersX` SET `groupID` = {$groups[$row['groupID']]} WHERE `ID` = {$row['ID']}");
		}
	}
	//groups.ID and users.groupID: renumber ID starting from 1
	$stH = dbQuery("SELECT * FROM `groupsX` WHERE `ID` = 0");
	if ($row = $stH->fetch(PDO::FETCH_NUM)) { //column 'ID' = 0 exists - renumber
		$stH = dbQuery("SELECT `ID` FROM `groupsX` ORDER BY `ID` DESC"); 
		while ($row = $stH->fetch(PDO::FETCH_ASSOC)) {
			dbQuery("UPDATE `groupsX` SET `ID` = `ID` + 1 WHERE `ID` = {$row['ID']}"); //must be done in reverse order
		}
		dbQuery("UPDATE `usersX` SET `groupID` = `groupID` + 1");
	}
	//initialize groups.tnPrivs if tnPrivs of admin group is '00'
	$stH = dbQuery("SELECT * FROM `groupsX` WHERE `ID` = 2 AND `tnPrivs` = '00'");
	if ($row = $stH->fetch(PDO::FETCH_NUM)) { //admin group has no tn rights - initialize
		$groups = array(1 => '00', 2 => '22', 3 => '00', 4 => '20', 5 => '21', 6 => '22');
		$stH = dbQuery("SELECT `ID` FROM `groupsX`"); 
		while ($row = $stH->fetch(PDO::FETCH_ASSOC)) {
			if (array_key_exists($row['ID'],$groups)) {
				dbQuery("UPDATE `groupsX` SET `tnPrivs` = '{$groups[$row['ID']]}' WHERE `ID` = {$row['ID']}");
			}
		}
	}
	//correct groupIDs admin (3 -> 2) and read-access (2 -> 3)
	$stH = dbQuery("SELECT `ID`,`groupID` FROM `usersX` WHERE `ID` = 2 AND `groupID` = 3",0); //admin in group 3
	if ($row = $stH->fetch(PDO::FETCH_NUM)) {
		dbQuery("UPDATE `groupsX` SET `ID` = 100 WHERE `ID` = 2"); //park read-only
		dbQuery("UPDATE `usersX` SET `groupID` = 100 WHERE `groupID` = 2"); //idem
		dbQuery("UPDATE `groupsX` SET `ID` = 2 WHERE `ID` = 3"); //set admin to 2
		dbQuery("UPDATE `usersX` SET `groupID` = 2 WHERE `groupID` = 3"); //idem
		dbQuery("UPDATE `groupsX` SET `ID` = 3 WHERE `ID` = 100"); //set parked to 3
		dbQuery("UPDATE `usersX` SET `groupID` = 3 WHERE `groupID` = 100"); //idem
	}
	
	//blank out `language` for the Public User to force the default language from the settings
	dbQuery("UPDATE `usersX` SET `language` = '' WHERE `ID` = 1");

	//events.checked: ;dd-mm-yyyya -> ;dd-mm-yyyy and drop ;dd-mm-yyyyb
	$stH = dbQuery("SELECT `ID`,`checked` FROM `eventsX` WHERE `checked` LIKE '%a%'");
	while ($row = $stH->fetch(PDO::FETCH_ASSOC)) {
		$chBoxed = preg_replace(array('~;\d\d\d\d-\d\d-\d\db~','~(;\d\d\d\d-\d\d-\d\d)a~'),array('','$1'),$row['checked']); //drop ;dd-mm-yyyyb and trim a in ;dd-mm-yyyya
		dbQuery("UPDATE `eventsX` SET `checked`='{$chBoxed}' WHERE `ID` = {$row['ID']}");
	}
	//events.sTime/eTime: truncate time to 00:00
	$stH = dbQuery("SELECT `sTime` FROM `eventsX` LIMIT 1");
	if ($row = $stH->fetch(PDO::FETCH_NUM)) { //column 'sTime' exists
		if (strlen($row[0]) > 5) { //truncate times
			dbQuery("UPDATE `eventsX` SET `sTime` = substr(`sTime`,1,5),`eTime` = substr(`eTime`,1,5)");
		}
	}
	//events.aDateTime/mDateTime: truncate time to 00:00
	$stH = dbQuery("SELECT `aDateTime` FROM `eventsX` LIMIT 1");
	if ($row = $stH->fetch(PDO::FETCH_NUM)) { //column 'aDateTime' exists
		if (strlen($row[0]) > 16) { //truncate time
			dbQuery("UPDATE `eventsX` SET `aDateTime` = substr(`aDateTime`,1,16),`mDateTime` = substr(`mDateTime`,1,16)");
		}
		if (strlen($row[0]) < 16) { //pad to yyyy-mm-dd 00:00
			if ($dbType == 'SQLite') { //SQLite - solve MySQL incompatibilities
				dbQuery("UPDATE `eventsX` SET `aDateTime` = substr(`aDateTime`,1,10)||' 00:00',`mDateTime` = substr(`mDateTime`,1,10)||' 00:00'");
			} else {
				dbQuery("UPDATE `eventsX` SET `aDateTime` = CONCAT(substr(`aDateTime`,1,10),' 00:00'),`mDateTime` = CONCAT(substr(`mDateTime`,1,10),' 00:00')");
			}
		}
	}
	//settings.viewsPublic/viewsLogged: add ",11" (new Gantt chart view V4.7.7)
	$stH = dbQuery("SELECT `value` FROM `settingsX` WHERE `name` = 'viewsLogged'");
	if ($row = $stH->fetch(PDO::FETCH_NUM)) {
		if (!strpos($row[0],',11')) { //Gantt chart not present
			if ($dbType == 'SQLite') { //SQLite - solve MySQL incompatibilities
				dbQuery("UPDATE `settingsX` SET `value` = `value`||',11' WHERE `name` = 'viewsPublic' OR `name` = 'viewsLogged'");
			} else {
				dbQuery("UPDATE `settingsX` SET `value` = CONCAT(`value`,',11') WHERE `name` = 'viewsPublic' OR `name` = 'viewsLogged'");
			}
		}
	}
	//settings.chgEmailList: name has changed to chgRecipList (can contain more than just email addresses)
	dbQuery("UPDATE `settingsX` SET `name` = 'chgSumRecips' WHERE `name` = 'chgEmailList'");
	//settings.chgNofDays: set to 0 (disabled) if chgSumRecips is empty (needed since V4.7.7)
	$stH = dbQuery("SELECT `value` FROM `settingsX` WHERE `name` = 'chgSumRecips'");
	if ($row = $stH->fetch(PDO::FETCH_NUM)) {
		if (strlen($row[0]) < 6) { //recipients not specified
			dbQuery("UPDATE `settingsX` SET `value` = 0 WHERE `name` = 'chgNofDays'");
		}
	}
	//settings.spMiniCal/spImages/spInfoArea: don't surprise existing calendars with a side panel (V4.7.7)
	$stH = dbQuery("SELECT `value` FROM `settingsX` WHERE `name` = 'spMiniCal'");
	if (!$row = $stH->fetch(PDO::FETCH_NUM)) { //spMiniCal not existing
		$stH = stPrep("INSERT INTO `settingsX` (`name`,`value`) VALUES (?,?)");
		foreach(array('spMiniCal','spImages','spInfoArea') as $name) {
			stExec($stH,array($name,0));
		}
	}

	$stH = null; //release statement handle

	//drop original tables and rename new upgraded tables
	dbQuery("DROP TABLE `users`");
	dbQuery("ALTER TABLE `usersX` RENAME TO `users`");
	dbQuery("DROP TABLE `groups`");
	dbQuery("ALTER TABLE `groupsX` RENAME TO `groups`");
	dbQuery("DROP TABLE `categories`");
	dbQuery("ALTER TABLE `categoriesX` RENAME TO `categories`");
	dbQuery("DROP TABLE `events`");
	dbQuery("ALTER TABLE `eventsX` RENAME TO `events`");
	dbQuery("DROP TABLE `settings`");
	dbQuery("ALTER TABLE `settingsX` RENAME TO `settings`");
	dbQuery("DROP TABLE `styles`");
	dbQuery("ALTER TABLE `stylesX` RENAME TO `styles`");
	dbTransaction('commit');
	return $lcVUpg;
}
?>