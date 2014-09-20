<?php
include('connect.php');
$sql = mysql_query("select judul from berita where id_berita='$_GET[id]'");
$j   = mysql_fetch_array($sql);
$sql2 = mysql_query("select judul from tutorial_trik where id_berita='$_GET[id]'");
$j2   = mysql_fetch_array($sql2);

if ($_GET[module]=='detailberita' AND ISSET($_GET[id])){
		echo "$j[judul]";
}
else if ($_GET[module]=='detailtutorial' AND ISSET($_GET[id])){
echo "$j2[judul]";
}
else{
		echo "Everyday Like Sunday Multimedia SMKN 1 Denpasar, komunitas jejaring sosial diantara murid Multimedia dan Smkn 1 denpasar.";
}
?>
