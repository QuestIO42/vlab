<?php
/*
= LuxCal configuration =
*/
$lcV="4.7.9M"; //LuxCal version
$dbType="MySQL"; //db type (MySQL or SQLite)

$dbHost=$_ENV["MYSQL_HOST"];
$dbUnam=$_ENV["MYSQL_USER"]; 
$dbPwrd=$_ENV["MYSQL_PASSWORD"];
$dbName=$_ENV["MYSQL_DATABASE"];

$dbDef="mycal"; //default calendar (db name)
$dbSel=1; //selectable in Options panel
$crHost=0; //0:local, 1:remote, 2:remote+IP address
$crIpAd=""; //IP address of remote cron service
?>