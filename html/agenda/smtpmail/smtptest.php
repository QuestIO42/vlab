<?php
//send SMTP mail
function sendSmtpMail($from,$recipients,$subject,$message) {
	global $set;
	
	$smtpServer = ($set['smtpSsl'] ? 'ssl://' : '').strtolower($set['smtpServer']);
	preg_match('~^(?:https?://)?([^?/]+)(?:/|\?|$)~',$set['calendarUrl'],$matches);
	$smtpClient = $matches[1]; //bare client URL
	$toArray = explode(';', $recipients);
	$errMsg = '';
	$hits = array();
	$toString = '';
	foreach($toArray as $k => $v) {
		if (preg_match("~^([^<>@]*?)<?([^\s<>]*@[^\s<>]*)>?$~i",trim($v),$hits)) {
			$toArray[$k] = '<'.$hits[2].'>';
			$toString .= $hits[1].'<'.$hits[2].'>, ';
		} else {
			$errMsg .= "error in 'recipients' field<br>"; break;
		}
	}
	$toString = rtrim($toString,' ,');
	$hits = array();
	if (preg_match("~^([^<>@]*?)<?([^\s<>]*@[^\s<>]*)>?$~i",trim($from),$hits)) {
		$fromL = $hits[1].'<'.$hits[2].'>';
		$fromS = '<'.$hits[2].'>';
	} else {
		$errMsg .= "error in 'from' field<br>";
	}
	if ($errMsg) {	return $errMsg; }
	
	$headers = "MIME-Version: 1.0\r\nContent-type: text/html; charset=utf-8";

	$cmdArray = array(); //keyword, data, expected return code
	$cmdArray[] = array ('Connect','','220');
	$cmdArray[] = array ('EHLO','EHLO '.$smtpClient,'250');
	if ($set['smtpAuth']) {
		$cmdArray[] = array ('AUTH LOGIN','AUTH LOGIN','334');
		$cmdArray[] = array ('User',base64_encode($set['smtpUser']),'334');
		$cmdArray[] = array ('Password',base64_encode($set['smtpPass']),'235');
	}
	$cmdArray[] = array ('MAIL FROM','MAIL FROM: '.$fromS,'250');
	foreach ($toArray as $email) { $cmdArray[] = array ('RCPT TO','RCPT TO: '.$email,'250'); }
	$cmdArray[] = array ('DATA','DATA','354');
	$cmdArray[] = array ('DATA string',"$headers\r\nFrom: $fromL\r\nTo: $toString\r\nSubject: $subject\r\nReply-To: $fromS\r\n\r\n$message\r\n.",'250');
	$cmdArray[] = array ('QUIT','QUIT','221');

	if (!($socket = @fsockopen($smtpServer,$set['smtpPort'],$errNo,$errStr,20))) { //connect to socket
		return "Could not connect to SMTP server '{$smtpServer}' port '{$set['smtpPort']}' ($errNo - $errStr)<br>";
	}
	echo "<p class='center'><b>C: From Client to SMTP server, S: Reply from SMTP server</b></p><br>";
	echo "<b>C: Connect to socket (Server: {$smtpServer} Port: {$set['smtpPort']})</b>";
	foreach ($cmdArray as $cmdData) {
		if ($cmdData[0] != 'Connect') {
			fwrite($socket,$cmdData[1]."\r\n");
			echo '<b>C: '.preg_replace('~\r\n~','<br>',htmlspecialchars($cmdData[1])).'</b>';
		}
		echo " (Expected reply: {$cmdData[2]})<br>\n";
		do { //ignore reply codes followed by a hyphen
			if (!($serverReply = fgets($socket, 256))) { return "No SMTP server reply code<br>"; }
			echo 'S: '.$serverReply."<br>\n";
		} while (substr($serverReply, 3, 1) != ' ');
		if (substr($serverReply, 0, 3) != $cmdData[2]) { return "{$cmdData[0]}: SMTP server reply: {$serverReply}<br>"; }
	}
	fclose($socket);
	return '';
}

//load config data and db toolbox
require_once './lcconfig.php';
require_once './common/toolboxd.php'; //get toolbox

//set error reporting
error_reporting(E_ALL); //errors, warnings and notices - test
ini_set('display_errors',1); ini_set('log_errors',1); //test

//get smtp settings from db
$calID = $dbDef;
$dbH = dbConnect($calID,0); //connect to db
if ($dbH === false) { exit('Error: Could not connect to database database. Check database credentials.'); }
if (!isset($set)) { $set = getSettings(); } //get settings from db
if (!$set['smtpServer'] or !$set['smtpPort'] or !$set['smtpUser'] or !$set['smtpPass']) { exit('Error: SMTP settings on the admin\'s Settings page missing.'); }

//init
$to = !empty($_POST['to']) ? htmlspecialchars($_POST['to']) : '';
$from = !empty($_POST['from']) ? htmlspecialchars($_POST['from']) : '';
$subject = !empty($_POST['subject']) ? htmlspecialchars($_POST['subject']) : '';
$message = !empty($_POST['message']) ? htmlspecialchars($_POST['message']) : '';
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>SMTP mail test page</title>
<style type="text/css">
header, footer, aside {display:block;}

* { padding:0; margin:0; }
body {font:11px arial, sans-serif; background:#E0E0E0; color:#2B3856; cursor:default;}
a {text-decoration:none; cursor:pointer;}
header {padding:0 1%;}
h3 {margin:8px 0; font-size:14pt;}
h4 {margin:6px 0; font-size:12pt;}
h5 {margin:2px 0; font-size:11pt;}
input, textarea {font:11px arial, sans-serif; width:100%;}
textarea {height:80px;}
button {margin:10px 0px 10px 0px; cursor:pointer;}
form {width:340px; border:1px solid #808080; background:#FFFFFF; padding:20px; margin:20px 0;}
table {width:100%; border-collapse:collapse;}
td {padding:5px 0px;}
div.form {position:absolute; left:50px; top:2%; width:380px; padding:10px;}
div.expl {text-align:justify;}
div.hired {position:absolute; left:50%; top:2%; padding:10px; background:#F0A070;}
ul {margin-left:20px;}
.bLine {position:absolute; left:0; bottom:50px; width:98%; text-align:center;}
.mark {color:#AA0000;}
.center {text-align:center;}
div.navBar {
	position:absolute; top:34px; left:0; right:0;
	padding:0 1%;
	background:#AAAAFF;
	text-align:right;
	border:1px #808080;
	border-style:solid none;
	line-height:20px;
	vertical-align:middle;
}
div.content {
	position:absolute; left:0; top:100px; right:0; bottom:100px;
	padding:10px;
	overflow:auto;
}
div.endBar {
	position:absolute; left:0; right:0; bottom:10px;
	padding:0 1%;
	background:#AAAAFF;
	text-align:right;
	border:1px #808080;
	border-style:solid none;
	font-size:0.8em;
}
.footLB {font:italic bold 1.1em arial,sans-serif; color:#0033FF;}
.footLR {font:italic bold 1.1em arial,sans-serif; color:#AA0066;}
</style>
</head>

<body>
<header>
<h4>LuxCal Event Calendar</h4>
</header>
<div class="navBar">Your PHP version: <?php echo PHP_VERSION; ?></div>
<div class="content">
<div class="form">
<h3>SMTP Mail Tester</h3>
<br>
<div class="expl">
<p>This script uses the SMTP settings from the administrator's Settings page of your default calendar.</p>
<p><b>Instructions:</b></p>
<ul>
<li>The SMTP Settings on the administrator's Settings page of your default calendar must be complete and correct.</li>
<li>In the "To" and "From" fields, mail addresses can be specified in either long (John Dowd &lt;j.dowd@xmail.com&gt;) or short (j.dowd@xmail.com) format.</li>
<li>In the "To" field, multiple mail addresses can be used, which must be separated by a semicolon (;).</li>
</ul>
</div>
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
<table>
<tr><td>To:</td><td> <input type='text' name='to' value='<?php echo $to ?>' /></td></tr>
<tr><td>From:</td><td> <input type='text' name='from' value='<?php echo $from ?>' /></td></tr>
<tr><td>Subject:</td><td> <input type='text' name='subject' value='<?php echo $subject ?>' /></td></tr>
<tr><td>Message:</td><td> <textarea name='message'><?php echo $message ?></textarea></td></tr>
<tr><td></td><td> <button type='submit'>&nbsp;Send&nbsp;</button></td></tr>
</table>
</form>
<div class='expl'>
<p>Complete the form and press "Send". Thereafter the results will be shown in the right half of this window. If at the bottom the text "MAIL SENT!" is displayed, the email was successfully accepted by the SMTP server for transmission. Successful reception of the email depends on the validity of the recipient mail adress(es).</p>
</div>
</div>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") { //send SMTP mail
	echo "<div class = 'hired'>\n";
	if($errMsg = sendSmtpMail(htmlspecialchars_decode($from),htmlspecialchars_decode($to),htmlspecialchars_decode($subject),htmlspecialchars_decode($message))) {
		echo "<br>".$errMsg."\n";
	} else {
		echo "<br><b>MAIL SENT!</b>\n";
	}
	echo "</div>\n";
}
?>
</div>
<div class="bLine mark"><h4>AFTER USE REMOVE THE smtptest.php FILE FROM THE SERVER!</h4></div>
<div class="endBar">
	design 2020 - powered by <a href="http://www.luxsoft.eu"><span class='footLB'>Lux</span><span class='footLR'>Soft</span></a>
</div>
<br>&nbsp;
</body>
</html>
