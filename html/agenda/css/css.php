<?php
/*
= LuxCal style sheet =
Copyright 2009-2020 LuxSoft - www.LuxSoft.eu
*/

header('content-type:text/css');

/* ---- LOAD USER-INTERFACE THEME DEFINITIONS ---- */

//get calendar in use
$calID = $_GET['cal'];

//start session
$calPath = rtrim(substr(dirname($_SERVER["PHP_SELF"]),0,-4),'/').'/';
session_set_cookie_params(1800,$calPath); //set cookie path
session_name('PHPSESSID');
session_start();
if (!empty($_SESSION[$calID]['theme'])) { //theme file specified
	$theme = $_SESSION[$calID]['theme'];
	require "./{$theme}";
} else { //no theme specified, take theme from db
	chdir('../'); //change working directory
	require 'common/toolboxd.php'; //get database tools + LCV
	require 'lcconfig.php'; //get db credentials
	$dbH = dbConnect($calID); //connect to db
	$stH = dbQuery("SELECT `name`,`value` FROM `styles`");
	$th = array();
	while (list($name,$value) = $stH->fetch(PDO::FETCH_NUM)) {
		$th[$name] = $value;
	}
	$theme = 'db theme';
}

//preprocessing
$thHt = $th['PSXXX'] + 6; //height table headers
$buttonHt = intval(($th['MBUTS'] * $th['PSXXX']) + 8); //height buttons
$tInputHt = intval(($th['MFFLD'] * $th['PSXXX']) + 4); //height buttons
$selectHt = intval(($th['MFFLD'] * $th['PSXXX']) + 6); //height buttons
$sBoxHdTp = $th['PSXXX'] + 8; //month/week/day view scrollbox head top
$sBoxTp = $thHt + $sBoxHdTp + 4; //month/week/day view scrollbox top
$topBar = 24; //offset topbar bottom
$navBar = $th['PTBAR'] + $buttonHt + 16 + $th['sCtOf']; //offset navbar bottom
$offCal = $navBar + 2 + $th['sCtOf']; //offset calendar
$offUpc = $navBar; //offset side bar Upcoming
$offTod = $navBar + 20; //offset side bar Todo
$offToa = $navBar + 40; //offset side bar To approve

//serve styles
echo
"/*theme: {$theme}*/
"
.// ---- general: site ----- cursor:default;
"
* {padding:0; margin:0;}
body, select, th, td {font:{$th['PSXXX']}px {$th['FFXXX']};}
pre {display:inline;}
a, input, label, select {cursor:pointer;}
textarea {resize:vertical;}
input[type='text'], input[type='password'], textarea {font-family:inherit; font-size:{$th['MFFLD']}em; padding:0 2px; color:{$th['CFFLD']}; background:{$th['BFFLD']}; border-radius:2px; border:1px solid #666; cursor:text;}
input[type='text'], input[type='password'] {height:{$tInputHt}px; margin-right:3px;}
button {font-size:{$th['MBUTS']}em; height:{$buttonHt}px; padding:0px 2px; color:{$th['CBUTS']}; background:{$th['BBUTS']}; border-radius:2px; border:1px solid #666; cursor:pointer;}
input[type='radio'], input[type='checkbox'] {vertical-align:middle; margin-right:3px;}
input[type='file'] {font-size:{$th['MBUTS']}em; border-color:#666; color:{$th['CBUTS']}; background:{$th['BBUTS']};}
input[type='file']:hover, button:hover {border-color:{$th['EBUTS']};}
select {padding:0 2px; font-size:{$th['MFFLD']}em; height:{$selectHt}px; color:{$th['CDROP']}; background:{$th['BDROP']}; border-radius:2px; border:1px solid #666;}
select option {padding:0 2px;}
body {background:{$th['BXXXX']}; color:{$th['CXXXX']};}
th {height:{$thHt}px; color:{$th['CBHAR']}; background:{$th['BBHAR']}; cursor:default;}
td {vertical-align:top;}
a {color:{$th['CXXXX']}; text-decoration:none;}
a:hover {text-shadow:0.2em 0.3em 0.2em #F88;}
a.urlembed {font-weight:bold; text-decoration:underline;}
hr {margin:10px 0px; border:1px solid {$th['BBHAR']};}
p {text-align:justify;}
img {border-style:none;}
mark {color:{$th['BHLIT']}; font-weight:bold; text-decoration:underline;}

h1 {font:bold {$th['PTBAR']}px {$th['FFXXX']}; padding:4px 0px;".($th['sTbSw'] ? ' text-shadow:0.2em 0.3em 0.2em #888;' : '')." text-align:center;}
h2 {font:bold {$th['PPGTL']}px {$th['FFXXX']};}
h3 {font:bold {$th['PTHDL']}px {$th['FFXXX']};}
h4 {font:bold {$th['MTHDM']}em {$th['FFXXX']};}
h5 {font:bold {$th['MDTHD']}em {$th['FFXXX']};}
h6 {font:bold {$th['MSNHD']}em {$th['FFXXX']};}

ul, ol {margin:0 25px;}
li {margin:4px 0;}

.fontS {font-size:{$th['MSMAL']}em;}
.bold {font-weight:bold;}

.floatR {float:right;}
.floatL {float:left;}
.floatC {text-align:center;}
.center {display:block; margin:auto;}
.inline {display:inline;}
.clear {clear:both;}
.optBut {font-weight:bold; margin-right:10px;}

.navLink {cursor:pointer;}
.link {text-decoration:underline; color:{$th['CLINK']}; background:{$th['BLINK']};}
.butLink {border:none; color:{$th['CLINK']}; background:none; cursor:pointer; text-decoration:underline;}
.navLink:hover, .butLink:hover {text-shadow:0.2em 0.3em 0.2em #F88;}
.point {cursor:pointer;}
.arrow {cursor:default;}
.move {cursor:move;}
.hyper:hover {cursor:pointer; background:{$th['BGCTH']}; overflow:hidden;}
.select:hover {cursor:pointer; background:red;}
.pageTitle {margin:0 0 20px 5%;}
.confirm {margin:auto; width:70%; text-align:center; color:{$th['CCONF']}; background:{$th['BCONF']};}
.warning {margin:auto; width:70%; text-align:center; color:{$th['CWARN']}; background:{$th['BWARN']};}
.error {margin:auto; width:70%; text-align:center; color:{$th['CERRO']}; background:{$th['BERRO']};}
.inputWarning {background:{$th['BWARN']} !important;}
.inputError {background:{$th['BERRO']} !important;}
.hired {color:#FF0000; font-weight:bold;}
.hide, .hpot {display:none;}
.hidden {visibility:hidden;}
.noWrap {white-space:nowrap;}
.alert {position:relative; top:15%; text-align:center;}
.alert span {display:inline-block; padding:30px 60px; font-size:1.2em; background:white; border:1px solid red; border-radius:5px; box-shadow:5px 5px 5px #888;}
.bar {padding:0 20px;}
"
.// ---- common ----
"
img.logo {position:absolute; left:8px; top:5px; max-width:70px; max-height:70px; z-index:10;}
div.xPadXL {padding:0 80px;}
div.xPadXS {padding:0 10px;}
div.lPadXL {padding:0 10px 0 80px;}
div.topBar {position:relative; line-height:20px; color:{$th['CTBAR']}; background:{$th['BTBAR']};}
span.barLS {position:absolute; top:4px; left:10px;}
span.barLL {position:absolute; top:4px; left:80px;}
span.barRS {position:absolute; top:4px; right:10px;}
span.barRL {position:absolute; top:4px; right:80px;}
div.navBar {line-height:20px; color:{$th['CBHAR']}; background:{$th['BBHAR']}; border:1px solid {$th['EXXXX']}; border-style:solid none;}
div.content {position:absolute; left:0; top:{$offCal}px; right:0; bottom:30px;}
div.contentN {position:absolute; left:0; top:0; right:0; bottom:30px;}
div.contentE {padding:0 4px; font-size:{$th['MPWIN']}em;}
div.contentH {position:absolute; left:0; top:30px; right:0; bottom:5px; padding:3px 10px; font-size:{$th['MPWIN']}em; color:{$th['CXWIN']}; background:{$th['BXWIN']};}
footer {position:absolute; left:0; right:0; bottom:10px; padding:0px 10px; font-size:0.8em; color:{$th['CBHAR']}; background:{$th['BBHAR']}; border:1px solid {$th['EXXXX']}; border-style:solid none; text-align:center;}
footer a {font:1.1em arial,sans-serif; color:{$th['CBHAR']}; float:right;}
.footLS {font-style:italic; font-weight:bold}
.hitCnt {margin-right:12px;}
div#toapBar, div#todoBar, div#upcoBar {position:absolute; height:60%; width:200px; padding:4px; border:2px solid {$th['EXXXX']}; border-radius:5px; box-shadow:5px 5px 5px #888; font-size:{$th['MOVBX']}em; color:{$th['COVBX']}; background:{$th['BOVBX']}; overflow:hidden; display:none;}
div.toapBar {top:{$offToa}px; right:60px; z-index:22;}
div.todoBar {top:{$offTod}px; right:40px; z-index:21;}
div.upcoBar {top:{$offUpc}px; right:20px; z-index:20;}
div.barTop {margin-bottom:8px; padding:0 10px; line-height:20px; font-weight:bold; user-select:none; color:{$th['CBHAR']}; background:{$th['BBHAR']};}
div.barBody {position:absolute; top:60px; bottom:0px; width:96%; overflow:auto;}
div.menu {border-radius:5px; box-shadow:5px 5px 5px #888; font-size:{$th['MOVBX']}em; color:{$th['COVBX']}; background:{$th['BOVBX']}; z-index:100; overflow:hidden; transition:0.5s;}
div.usrMenu {position:absolute; top:{$topBar}px; right:80px; height:0; padding:0 4px;}
div.sideMenu {position:absolute; top:{$navBar}px; right:4px; width:0; padding:4px 0;}
div.optMenu {position:absolute; top:{$navBar}px; left:4px; height:0; padding:0 4px;}
div.option {float:left; margin:0 2px;}
div.optHead {margin:4px 0; color:{$th['CBHAR']}; background:{$th['BBHAR']};}
div.optList {max-height:206px; overflow-y:scroll;}
div.smGroup {margin:4px 0; border-top:1px solid #D0D0D0;}
div.smGroup p, div.umGroup p {padding:2px 4px; cursor:pointer; white-space:nowrap; transition:0.3s;}
div.smGroup p:hover, div.umGroup p:hover {background:#E0E0E0;}
.closeX {position:absolute; top:4px; right:4px; cursor:pointer;}
"
.// ---- all pages -----
"
.dtPick {cursor:pointer; font-size:14px;}
div.scrollBoxHead {position:absolute; left:0; top:{$sBoxHdTp}px; right:0; overflow-y:scroll;}
div.scrollBox {position:absolute; left:0; right:0; bottom:0; overflow:auto;}
div.sBoxYe {top:20px;}
div.sBoxMo, div.sBoxWe, div.sBoxDa {top:{$sBoxTp}px;}
div.sBoxUp, div.sBoxCh {top:85px;}
div.sBoxMx {top:20px;}
div.sBoxAd {top:90px;}
div.sBoxTs {top:125px;}
div.sBoxSt {top:105px;}
div.sBoxTn {top:50px;}
div.calHeadMx {margin-left:185px; text-align:center;}
div.rowBoxMx {position:absolute; left:5px; top:0; width:180px;}
div.calBoxMx {position:absolute; left:185px; top:0; right:5px; overflow-x:scroll;}
div.rowBoxGt {position:absolute; left:5px; top:0; width:360px;}
div.calBoxGt {position:absolute; left:365px; top:0; right:5px; overflow-x:scroll;}

.dialogBox {display:table; margin:0 auto; font-size:{$th['MPOPU']}em; background:{$th['BHNOR']}; padding:18px 24px; border:1px solid {$th['EHNOR']}; border-radius:5px; box-shadow:5px 5px 5px #888;}
.centerBox {display:table; margin:0 auto;}

div.conField {margin-bottom:10px;}
div.conField input, textarea {margin-top:4px; width:100%;}

table.mgrid td.holder{vertical-align:top; width:16%; padding:2px;}

table.grid {width:100%; border-collapse:collapse; table-layout:fixed;}
table.grid .wkCol {width:25px;}
table.grid .tCol {width:50px;}
table.grid .dCol {}
table.grid .dCol7 {width:14%;}
table.grid .tColBg {background:{$th['BGWTC']};}
table.grid tr.monthWeek {height:120px;}
table.grid tr.yearWeek {height:40px;}
table.grid th {border:1px solid {$th['EXXXX']}; overflow:hidden;}
table.grid th.smallHt {height:14px;}
table.grid td {border:1px solid {$th['EXXXX']}; overflow:hidden;}
table.grid td.wnr {border:none; vertical-align:middle; background:{$th['BGWTC']}; text-align:center;}

table td.we0 {color:{$th['CGWE2']}; background:{$th['BGWE2']};}
table td.we1 {color:{$th['CGWE1']}; background:{$th['BGWE1']};}
table td.wd0 {color:{$th['CGWD2']}; background:{$th['BGWD2']};}
table td.wd1 {color:{$th['CGWD1']}; background:{$th['BGWD1']};}
table td.out {color:{$th['CGOUT']}; background:{$th['BGOUT']};}
table td.blank {border:none; background:rgba(0,0,0,0);}
table td.today {border:1px solid {$th['EGTOD']}; color:{$th['CGTOD']}; background:{$th['BGTOD']};}
table td.slday {border:1px solid {$th['EGSEL']}; color:{$th['CGSEL']}; background:{$th['BGSEL']};}

table.matrix {width:100%; border-collapse:collapse; table-layout:fixed;}
table.matrix col {width:56px;}
table.matrix th {height:20px;}
table.matrix th.month {padding-left:4px; text-align:left;}
table.matrix th.borderR {border-right:1px solid {$th['EXXXX']};}
table.matrix td {height:38px; border:1px solid {$th['EXXXX']}; padding:2px; overflow:hidden;}
table.matrix td.rowLeft {overflow:hidden;}

table.ganttL {width:100%; border-collapse:collapse;}
table.ganttL th {height:20px;}
table.ganttL th.borderR {border-right:1px solid {$th['EXXXX']};}
table.ganttL td {height:22px; padding:0 5px; vertical-align:middle; border:1px solid {$th['EXXXX']}; overflow:hidden; white-space:nowrap;}
table.ganttL td:first-child {max-width:210px; overflow:hidden;}

table.gantt {width:100%; border-collapse:collapse; table-layout:fixed;}
table.gantt col {width:56px;}
table.gantt th {height:20px;}
table.gantt th.month {padding-left:4px; text-align:left;}
table.gantt td {height:22px; vertical-align:middle; border:1px solid {$th['EXXXX']}; white-space:nowrap;}
table.gantt td.msg {height:100px; vertical-align:middle; border:none; white-space:nowrap;}

table.contact {border-collapse:collapse;}
table.contact td {padding:4px 10px; vertical-align:top;}

fieldset {width:auto; margin-bottom:10px; padding:16px; border:1px solid #888888; background:{$th['BINBX']}; border-radius:5px;}
fieldset.upc {width:50%; margin:10px auto 20px auto;}
fieldset.upc-m {width:90%; margin:10px auto 20px auto;}
legend {font-weight:bold; padding:0 5px; background:{$th['BINBX']};}
"
.// -- view: all --
"
.viewHdr {display:inline-block; min-width:230px;}
.arrowLink {font:2.0em/0.6em sans-serif; padding:0 10px;}
.chkBox {color:{$th['CCHBX']}; background:{$th['BCHBX']}; padding-right:2px;}
.chkBox:hover {background:{$th['BGCTH']};}
div.container {position:absolute; left:0; top:0; right:300px; bottom:0;}
div.sPanel {position:absolute; width:292px; top:0; right:4px; bottom:0; display:flex; flex-flow:column;}
div.spCal { flex:0 1 auto;}
div.spImg { flex:0 1 auto;}
div.spMsg { flex:1 1 auto; padding:8px; overflow-y:auto; background:{$th['BINBX']}; border:1px solid {$th['EXXXX']};}
img.spImage {width:292px; border-bottom:14px solid {$th['BBHAR']};}
"
.// -- view: year/month --
"
.square {float:left; width:8px; height:8px; border:1px solid {$th['EXXXX']};}
.symbol {float:left; position:relative; font-size:10px; line-height:9px;}
.event {margin-top:2px;}
.evtTitle {font-size:{$th['MEVTI']}em;}
.dom1 {padding:0 2px; color:{$th['CGTFD']}; background:{$th['BGTFD']};}
.dom {padding:0 2px; color:{$th['CGTFD']};}
.firstDom {padding:0 2px; color:{$th['CGTFD']}; background:{$th['BGTFD']};}
.wnr {color:{$th['CGWTC']};}
.thNail {max-width:100%;}
"
.// -- view: week / day / dw_functions --
"
var {display:block; border:1px solid {$th['EXXXX']}; border-style:none none solid none;}
.day ul {margin:5px; padding:0px 15px;}
.timeFrame {position:relative;}
.times {border:1px solid {$th['EXXXX']}; border-style:none none solid none; text-align:center; color:{$th['CGWTC']};}
.dates {position:absolute; left:0px; top:0px; width:100%;}
.evtBox {position:absolute; border:1px solid {$th['EXXXX']}; z-index:1; overflow:hidden; border-radius:5px; box-shadow:10px 10px 25px grey;}
.dwEvent {padding:2px 0 0 3px;}
.dwEventNw {padding:2px 0 0 3px; white-space:nowrap;}
"
.// -- view: upcoming / changes / search / dw_functions --
"
div.subHead {width:80%; margin:20px 40px 0px 5%}
td.widthCol1 {width:120px;}
td.eBox {padding-left:5px;}
.toAppr {border-left:2px solid #ff0000;}
"
.// -- view: matrix / gantt --
"
.ganttLine {font-weight:bold;}
.ganttBar {display:inline-block; margin:2px 6px 0 0; height:10px; border:1px solid {$th['EXXXX']};}
.diamant {overflow:visible; white-space:nowrap; font-size:16px; line-height:16px; margin-right:6px;}
"
.// -- event window --
"
div.evtCanvas {padding:2px; color:{$th['CXWIN']}; background:{$th['BXWIN']}; cursor:default;}
table.evtForm {width:100%; margin:0; border-spacing:2px;}
table.evtForm td:nth-child(1) {width:100px;}
div.apdBar {text-align:center; margin:4px 0; font-weight:bold;}
div.evtExt {margin:4px 0; border-bottom:2px solid {$th['BBHAR']}; cursor:pointer;}
div.evtExt span {font-size:0.7em; background:red; border:1px solid red;}
div.repBox {position:absolute; left:40px; top:30px; padding:6px; border:1px solid {$th['EXXXX']}; border-radius:5px; box-shadow:5px 5px 5px #888; font-size:{$th['MOVBX']}em; color:{$th['COVBX']}; background:{$th['BOVBX']}; z-index:20; display:none;}
div.ewButtons {margin:6px 0;}
"
.// ---- thumbnails page ----
"
div.tnForm {width:30%; float:left; margin:0 0 6px 5%; padding:12px; border:1px solid #888888; background:{$th['BINBX']}; border-radius:5px;}
table.tnForm tr {height:20px;}
div.tnHelp {width:40%; float:right; margin:0 5% 6px 0; padding:12px; border:1px solid #888888; background:{$th['BINBX']}; border-radius:5px;}
div.tnBox {position:relative; float:left; width:100px; height:120px; margin:6px; background:{$th['BINBX']};}
div.tnBox div {position:absolute; top:0; right:0; bottom:0; left:0; cursor:pointer;}
div.tnBox input {width:1px; opacity:0; pointer-events:none;}
div.tnBox span {position:absolute; top:0; left:0; font-size:0.8em;}
div.tnBox span:hover {cursor:pointer; background:red;}
div.tnBox img {position:absolute; top:0; left:15px; max-width:80px; max-height:80px;}
div.tnBox p {position:absolute; left:0px; bottom:0px; width:95%; font-size:0.8em; text-align:center;}
"
.// ---- admin pages -----
"
table.list {border-spacing:4px; white-space:nowrap}
.pTitleAdm {margin-left:40px; font-weight:bold; font-size:{$th['PPGTL']}px;}
.takeRest {width:100%;}
.stylesL {display:inline-block; float:left; cursor:default; vertical-align:top;}
.stylesR {display:inline-block; float:right; cursor:default; vertical-align:top;}
.style {margin:6px 12px;}
.setting {cursor:default; margin-bottom:2px;}
.sLabel {display:inline-block; width:320px; text-align:right; margin-right:6px;}
.label {cursor:default; text-align:right; padding:0 6px 0 0;}
.aside {width:45%; margin:0 10px 10px 0; padding:5px; border:1px solid {$th['EXXXX']}; border-radius:5px; box-shadow:5px 5px 5px #888; font-size:{$th['MOVBX']}em; color:{$th['COVBX']}; background:{$th['BOVBX']}; float:right;}
.butHead {margin:20px auto 10px auto;}
"
.// ---- Popup Styles (toolbox.js poptext) ----
"
div#pdfPop {position:absolute; top:20%; left:0; right:0; display:none; z-index:10;}
div#htmlPop {position:absolute; font-size:{$th['MPOPU']}em ; padding:4px; border-radius:5px; box-shadow:5px 5px 5px #888; visibility:hidden; z-index:10;}
div#htmlPop img {max-width:200px; max-height:200px;}
.normal, .private, .repeat {overflow:auto; cursor:default;}
.normal {border:1px solid {$th['EHNOR']}; color:{$th['CHNOR']}; background:{$th['BHNOR']};}
.private {border:1px solid {$th['EHPRI']}; color:{$th['CHPRI']}; background:{$th['BHPRI']};}
.repeat {border:1px solid {$th['EHREP']}; color:{$th['CHREP']}; background:{$th['BHREP']};}
"
.// ---- Date Picker Styles -----
"
.dpTable {width:150px; text-align:center; color:#505050; background:{$th['BINBX']}; border:2px outset #D0D0D0;}
.dpTable th {font-size:11px; font-weight:bold; background:{$th['BBHAR']}; color:{$th['CBHAR']};}
.dpTable td {font-size:11px;}
.dpTD {border:1px solid {$th['BINBX']};}
.dpTDHover {border:1px solid #888888; cursor:pointer; color:red;}
.dpHilight {border:1px solid #888888; color:red; font-weight:bold;}
.dpTitle {font:bold 12px arial,sans-serif; color:{$th['CXXXX']};}
.dpArrow {padding:0 6px; cursor:pointer;}
.dpButton {font:bold 10px arial,sans-serif; color:{$th['CBUTS']}; background:{$th['BBUTS']}; cursor:pointer;}
"
.// ---- Time Picker Styles -----
"
.tpFrame {max-height:180px; width:165px; overflow:auto; font:10px/11px courier,monospace; text-align:center; color:#505050; border:1px solid #AAAAAA;}
.tpAM {background:#EEFFFF;}
.tpPM {background:#FFCCEE;}
.tpEM {background:#DDFFDD;}
.tpPick:hover {background:#A0A0A0; color:red; cursor:pointer;}
"
?>
