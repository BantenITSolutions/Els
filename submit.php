<?php

define('INCLUDE_CHECK',1);
require "functions.php";
require "connect.php";


if(ini_get('magic_quotes_gpc'))
$_POST['inputField']=stripslashes($_POST['inputField']);
$_POST['foto_pengirim']=stripslashes($_POST['foto_pengirim']);

if(mb_strlen($_POST['inputField']) < 1 || mb_strlen($_POST['inputField'])>140)
die("0");

mysql_query("INSERT INTO demo_twitter_timeline SET id_member='".$_POST['id_member']."',tweet='".$_POST['inputField']."',dt=NOW(),nama_pengirim='".$_POST['nama_member']."',foto_pengirim='".$_POST['foto_pengirim']."'");


echo formatTweet($_POST['id'],$_POST['inputField'],time(),$_POST['id_member'],$_POST['nama_member'],$_POST['foto_pengirim']);

?>
