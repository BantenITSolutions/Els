<?php
$host="localhost";
$user="root";
$pass="";
$db="els_redesign2";

mysql_connect($host,$user,$pass) or die (mysql_error());
mysql_select_db($db);
?>