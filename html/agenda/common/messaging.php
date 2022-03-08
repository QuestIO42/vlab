<?php
/*
=== MESSAGING FUNCTIONS ===

This file is part of the LuxCal Web Calendar.
Copyright 2009-2020 LuxSoft - www.LuxSoft.eu
License https://www.gnu.org/licenses/gpl.html GPL version 3

*/

//email body styles
$styles = array(
"background:#FFFFDD; color:#000099; font:12px arial, sans-serif;", //email
"background:#DDFFFF; color:#000099; font:12px arial, sans-serif;", //cronmail
"background:#EEFFEE; color:#000099; font:12px arial, sans-serif;" //contact message
);

//make message recipient list
function makeRecList($rawRecList,$messageType) {
	global $set, $rxEmailX, $rxPhone;

	$recArray = array();
	$rawRecArray = explode(';',$rawRecList);
	foreach ($rawRecArray as $recipient) { //create full recipient list
		$recipient = trim($recipient);
		if (preg_match('~^\[(.+)\]$~',$recipient,$matches)) { //file list name
			$listName = $matches[1].(strpos($matches[1],'.') ? '' : '.txt');
			if (file_exists("./reciplists/{$listName}")) { //recipients list
				$fileRecArray = file("./reciplists/{$listName}", FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES); // recipients from file
				foreach ($fileRecArray as $recipient) { //add recipients from file
					$recArray[] = trim($recipient);
				}
			}
		} else {
			$recArray[] = $recipient;
		}
	}
	array_walk($recArray,function(&$v,$k) use($rxPhone) {if (preg_match($rxPhone,rtrim($v,'$'))) $v = str_replace(array(' ','-','/','(',')'),'',$v);}); //strip phone numbers

	//now $recArray contains email addresses, phone numbers and user names

	$destArr = array();
//echo "TEST - recArray: ".implode(' - ',$recArray)."<br>"; //TEST
	switch ($messageType) {
	case 'eml': //make eml recipient list
		foreach ($recArray as $recipient) {
			if (strpos($recipient,'@',1)) { //email address
				$destArr[] = rtrim($recipient,'$');
			} elseif (ctype_digit(trim($recipient,'+$'))) { //mob. number
				if (substr($recipient,-1) != '$') { //find matching mail address
					$stH = stPrep("SELECT `email` FROM `users` WHERE `phone` LIKE ? limit 1");
					stExec($stH,array('%'.ltrim($recipient,'+0')));
					$row = $stH->fetch(PDO::FETCH_NUM);
					if ($row != false) {
						$destArr[] = $row[0];
					} else {
						logMessage('luxcal',2,"Send email. Phone number: {$recipient} - No matching email address found in the database.");
					}
				}
			} elseif (preg_match("~^[\w\-.\s\x{00C0}-\x{017F}]{2,}$~u",$recipient)) { //username
				$stH = stPrep("SELECT `email` FROM `users` WHERE `name` = ?");
				stExec($stH,array($recipient));
				$row = $stH->fetch(PDO::FETCH_NUM);
				if ($row != false) {
					$destArr[] = $row[0];
				} else {
					logMessage('luxcal',2,"Send email. User: {$recipient} - No matching email address found in the database.");
				}
			}
		}
//echo "TEST - destArr: ".implode(' - ',$destArr); //TEST
		break;
	case 'sms': //make sms recipient list
		foreach ($recArray as $recipient) {
			if (strpos($recipient,'@',1)) { //email address
				if (substr($recipient,-1) != '$') { //find matching phone number
					$stH = stPrep("SELECT `phone` FROM `users` WHERE `email` = ? limit 1");
					stExec($stH,array($recipient));
					$row = $stH->fetch(PDO::FETCH_NUM);
					if ($row != false and !empty($row[0])) { //phone number found
						$destArr[] = $row[0];
					} else {
						logMessage('luxcal',2,"Send SMS. Email address: {$recipient} - No matching phone number found in the database.");
					}
				}
			} elseif (ctype_digit(trim($recipient,'+$'))) { //mob. number
				$destArr[] = rtrim($recipient,'$');
			} elseif (preg_match("~^[\w\-.\s\x{00C0}-\x{017F}]{2,}$~u",$recipient)) { //username
				$stH = stPrep("SELECT `phone` FROM `users` WHERE `name` = ?");
				stExec($stH,array($recipient));
				$row = $stH->fetch(PDO::FETCH_NUM);
				if ($row != false and !empty($row[0])) { //phone number found
					$destArr[] = $row[0];
				} else {
					logMessage('luxcal',2,"Send SMS. User: {$recipient} - No matching phone number found in the database.");
				}
			}
		}
		array_walk($destArr,function(&$recipient,$k) use($set) { //pre-process mobile numbers
				if ($set['smsCountry'] and !preg_match('~^(\+|00)~',$recipient)) $recipient = '+'.$set['smsCountry'].ltrim($recipient,'0'); //add country code
				if (!$set['cCodePrefix']) $recipient = preg_replace('~^(\+|00)~','',$recipient); //remove prefix + or 00
				$recipient = str_replace('#',$recipient,$set['smsCarrier']);
			});
//echo "TEST - destArr: ".implode(' - ',$destArr); //TEST
		break;
	case 'wap': //make WhatsApp recipient list
		return false; //for future use
		break;
	default:
		return false; //no valid message type
	}
	return array_unique($destArr);
}

//send emails
function sendEml($subject,$msgBody,$rawRecList,$style,$senderId,$date) {
	global $styles, $set, $ax, $xx;

	//prepare email recipient list
	if (!$recipList = makeRecList($rawRecList,'eml')) {
		return $ax['mes_no_msg_no_recip']; //no recipients
	}
	//compile subject and message
	$calUrl = $date ? $set['calendarUrl'].(strpos($set['calendarUrl'],'?',6) ? '&amp;' : '?')."nD=".IDtoDD($date) : $set['calendarUrl'];
	$calLogo = $set['logoPath'] ? "<img class='logo' src='".calRootUrl()."{$set['logoPath']}' alt='calendar logo'>" : '';
	$message = "
<html>
<head>
<meta charset=\"UTF-8\">
<title>{$set['calendarTitle']} mailer</title>
<style type='text/css'>
* {padding:0; margin:0;}
body {{$styles[$style]}}
h4 {font-size:1.2em; font-weight:bold; display:inline;}
h5 {font-size:1.0em; font-weight:bold;}
button {padding:0px 2px; font-size:1.0em; color:#064070; background:#E0E0E0; border-radius:2px; border:1px solid #666; cursor:pointer;}
table {border-collapse:collapse;}
td {padding:2px 10px; vertical-align:top;}
fieldset {display:inline; margin:0 0 20px 20px; padding:20px; border:1px solid #888888; background:#FFFFFF; border-radius:5px;}
div.head {margin:20px 0 20px 20px;}
img.logo {margin-right:20px; max-width:70px; max-height:70px; vertical-align:middle;}
.bold {font-weight:bold;}
</style>
</head>
<body>
<div class='head'>
{$calLogo}
<h4>{$set['calendarTitle']} - ".IDtoDD(date("Y-m-d"))." {$xx['at_time']} ".ITtoDT(date("H:i"))."</h4>
</div>
<fieldset>{$msgBody}</fieldset>
<p><a href='{$calUrl}'>{$xx['open_calendar']}</a></p>
<br>&nbsp;
</body>
</html>
";

	if ($senderId) {//sender is user
		$stH = stPrep("SELECT `name`, `email` FROM `users` WHERE `ID` = ? limit 1");
		stExec($stH,array($senderId));
		list($name,$email) = $stH->fetch(PDO::FETCH_NUM);
		$from = "\"{$name}\" <{$email}>";
	} else { //sender is calendar
		$from = '"'.translit($set['calendarTitle'],true).'" <'.$set['calendarEmail'].'>';
	}
	$subjectX = "{$set['calendarTitle']} - {$subject}";
	$subject = '=?utf-8?B?'.base64_encode(htmlspecialchars_decode($subjectX,ENT_QUOTES)).'?='; //follow RFC 1342 for utf-8 encoding
	$curSlice = 0;
	$lenSlice = !empty($set['maxEmlCc']) ? $set['maxEmlCc'] : 10;
	while ($curSlice < count($recipList)) {
		$recipSlice = implode(', ',array_slice($recipList,$curSlice,$lenSlice)); //take a slice of length maxEmlCc
		$curSlice += $lenSlice;
		if ($set['mailServer'] <= 1) { //mail via PHP
			$headers = "MIME-Version: 1.0\nContent-type: text/html; charset=utf-8\nFrom: {$from}\nBcc: {$recipSlice}\nDate: ".date(DATE_RFC2822);
			if (!mail(null,$subject,$message,$headers)) { //send PHP mail
				logMessage('luxcal',1,"PHP EML mail to {$recipSlice} failed.");
				return false;
			}
			$mailType = 'PHP';
		} elseif ($set['mailServer'] == 2) { //mail via SMTP server
			$headers = "MIME-Version: 1.0\nContent-type: text/html; charset=utf-8\nDate: ".date(DATE_RFC2822);
			if (!smtpMail($from,$recipSlice,$subject,$message,$headers)) { // send SMTP mail
				return false;
			}
			$mailType = 'SMTP';
		}
		logMessage('luxcal',3,"{$mailType} EML mail sent . . .\n- To: {$recipSlice}\n- Headers: ".eol2txt($headers)."\n- Subject (before RFC 1342 encoding): {$subjectX} \n- Message: ".strip_tags(eol2txt(substr($msgBody,0,560))));
	}
	return '- '.str_replace("@","[at]",implode(', ',$recipList));
}

//send SMSes
function sendSms($message,$rawRecList,$senderId,$evtID) {
	global $set, $ax;

	//prepare SMS recipient list
	if (!$recipList = makeRecList($rawRecList,'sms')) { //get SMS recip list and process if not empty
		return $ax['mes_no_msg_no_recip'].'!'; //no recipients
	}
	//compile subject and message
	if ($set['smsAddLink']) {
		$p2 = strrpos($message,': ') + 3;
		$link = "\n{$set['calendarUrl']}".(strpos($set['calendarUrl'],'?',6) ? '&' : '?')."xP=32&eid={$evtID}&k=".ord($message[$p2]);
		$message = mbtrunc($message,$set['maxLenSms'] - strlen($link)).$link; //UTF: max. message length set by admin - length of link
	} else {
		$message = mbtrunc($message,$set['maxLenSms']); //UTF: max. message length set by admin
	}
	$from = $set['calendarEmail']; //sender ID SMS email
	$subjectX = $subject = ''; //default (subjectX for logging)
	if ($set['smsSubject']) {
		$fromPhone = $set['calendarPhone']; //default calendar phone nr
		if ($senderId) { //sender is user
			$stH = stPrep("SELECT `phone` FROM `users` WHERE `ID` = ? limit 1");
			stExec($stH,array($senderId));
			$row = $stH->fetch(PDO::FETCH_NUM);
			if ($row != false and !empty($row[0])) {
				$fromPhone = $row[0]; //event owner phone nr
			}
		}
		if ($set['smsCountry'] and !preg_match('%^(\+|00)%',$fromPhone[0])) { $fromPhone = '+'.$set['smsCountry'].ltrim($fromPhone,'0'); } //add country code
		if (!$set['cCodePrefix']) { $fromPhone = preg_replace('%^(\+|00)%','',$fromPhone); } //remove prefix (+ or 00)
		$subjectX = str_replace('#',$fromPhone,$set['smsSubject']); //replace # by sender ID (phone) 
		$subject = '=?utf-8?B?'.base64_encode($subjectX).'?='; //follow RFC 1342 for utf-8 encoding
	}
	$curSlice = 0;
	$lenSlice = !empty($set['maxEmlCc']) ? $set['maxEmlCc'] : 10;
	while ($curSlice < count($recipList)) {
		$recipSlice = implode(', ',array_slice($recipList,$curSlice,$lenSlice)); //take a slice of length maxEmlCc
		$curSlice += $lenSlice;
		if ($set['mailServer'] <= 1) { //mail via PHP
			$headers = "MIME-Version: 1.0\nContent-type: text/plain; charset=utf-8\nFrom: {$from}\nDate: ".date(DATE_RFC2822);
			if (!mail($recipSlice,$subject,$message,$headers)) { //SMS mail via PHP
				logMessage('luxcal',1,"PHP SMS mail to {$recipSlice} failed.");
				return false;
			}
			$mailType = 'PHP';
		} elseif ($set['mailServer'] == 2) { //SMS mail via SMTP server
			$headers = "MIME-Version: 1.0\nContent-type: text/plain; charset=utf-8\nDate: ".date(DATE_RFC2822);
			if (!smtpMail($from,$recipSlice,$subject,$message,$headers)) { // send SMTP mail
				return false;
			}
			$mailType = 'SMTP';
		}
		logMessage('luxcal',3,"{$mailType} SMS mail sent . . .\n- To: {$recipList}\n- Headers: ".eol2txt($headers)."\n- Subject (before RFC 1342 encoding): {$subjectX}\n- Message: ".strip_tags(eol2txt($message))); //TEST
	}
	return '- '.str_replace("@","[at]",implode(', ',$recipList));
}

//send SMTP mail
function smtpMail($from,$recipList,$subject,$message,$headers) {
	global $set;
	
	$smtpServer = ($set['smtpSsl'] ? 'ssl://' : '').strtolower($set['smtpServer']);
	preg_match('~^(?:https?://)?([^?/]+)(?:/|\?|$)~',$set['calendarUrl'],$matches);
	$smtpClient = $matches[1]; //bare client URL
	$toArray = explode(',', $recipList);
	$hits = array();
	$errMsg = $toString = '';
	foreach($toArray as $k => $v) {
		if (preg_match("~^([^<>@]*?)<?([^\s<>]*@[^\s<>]*)>?$~i",trim($v),$hits)) {
			$toArray[$k] = '<'.$hits[2].'>';
			$toString .= $hits[1].'<'.$hits[2].'>, ';
		} else {
			$errMsg .= "Error in 'to' field. "; break;
		}
	}
	$toString = rtrim($toString,' ,');
	$hits = array();
	if (preg_match("~^([^<>@]*?)<?([^\s<>]*@[^\s<>]*)>?$~i",trim($from),$hits)) {
		$fromS = '<'.$hits[2].'>';
	} else {
		$errMsg .= "Error in 'from' field.";
	}
	if ($errMsg) {
		logMessage('luxcal',1,"SMTP mail to {$recipList} failed.\n{$errMsg}");
		return false;
	}

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
	$cmdArray[] = array ('DATA string',"$headers\r\nFrom: $from\r\nTo: $toString\r\nSubject: $subject\r\nReply-To: $fromS\r\n\r\n$message\r\n.",'250');
	$cmdArray[] = array ('QUIT','QUIT','221');

	if (!($socket = fsockopen($smtpServer,$set['smtpPort'],$errNo,$errStr,20))) { //connect to socket
		logMessage('luxcal',1,"Could not connect to SMTP server {$smtpServer}, port {$set['smtpPort']} ({$errNo} - {$errStr})");
		return false;
	}
	foreach ($cmdArray as $cmdData) {
		if ($cmdData[0] != 'Connect') {
			fwrite($socket,$cmdData[1]."\r\n");
		}
		do { //ignore reply codes followed by a hyphen
			if (!($serverReply = fgets($socket, 256))) {
				logMessage('luxcal',1,"SMTP mail to {$recipList} failed.\nNo SMTP server reply code.");
				return false;
			}
		} while (substr($serverReply,3,1) != ' ');
		if (!(substr($serverReply,0,3) == $cmdData[2])) {
			logMessage('luxcal',1,"SMTP mail to {$recipList} failed.\n{$cmdData[0]}: SMTP server reply: {$serverReply}");
			return false;
		}
	}
	fclose($socket);
	return true;
}
?>