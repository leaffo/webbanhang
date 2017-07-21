<?php
/*
$dbname = 'u608891118_onlan';
$host = 'mysql.hostinger.vn';
$user = 'u608891118_onlan';
$pass='R4X9rurzPxDW';*/

$dbname = 'webbanhang';
$host = 'localhost';
$user = 'root';
$pass='';


$db = new PDO("mysql:dbname=".$dbname.";host=".$host, ''.$user, ''.$pass, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));

?>