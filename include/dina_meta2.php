<?php
include('connect.php');
$sql = mysql_query("select tag from berita where id_berita='$_GET[id]'");
$j   = mysql_fetch_array($sql);
$sql2 = mysql_query("select tag from tutorial_trik where id_berita='$_GET[id]'");
$j2   = mysql_fetch_array($sql2);

if ($_GET[module]=='detailberita' AND ISSET($_GET[id])){
		echo "$j[tag]";
}
else if ($_GET[module]=='detailtutorial' AND ISSET($_GET[id])){
echo "$j2[tag]";
}
else{
		echo "Everyday Like Sunday Multimedia SMKN 1 Denpasar, smkn 1 denpasar, tutorial php, tutorial hardware, tutorial jaringan, tutorial desain grafis, tutorial komputer, forum komunitas, jejaring sosial, komunitas smkn 1 denpasar.";
}
?>
