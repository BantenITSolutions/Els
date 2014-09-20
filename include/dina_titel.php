<?php
$sql = mysql_query("select judul from berita where id_berita='$_GET[id]'");
$j   = mysql_fetch_array($sql);
$sql2 = mysql_query("select judul from tutorial_trik where id_berita='$_GET[id]'");
$j2   = mysql_fetch_array($sql2);

if ($_GET[module]=='detailberita' AND ISSET($_GET[id])){
		echo " $j[judul] On Everyday Like Sunday [ 3.MM.1 Official Website ]";
}
else if ($_GET[module]=='detailtutorial' AND ISSET($_GET[id])){
echo " $j2[judul] On Everyday Like Sunday [ 3.MM.1 Official Website ]";
}
else{
		echo "On Everyday Like Sunday [ 3.MM.1 Official Website ]";
}
?>
