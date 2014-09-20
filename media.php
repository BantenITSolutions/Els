<?php
session_start();
$_SESSION['username'] = "$_SESSION[namamember]" // Must be already set
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="robots" content="index, follow">
<meta name="description" content="<?php include "include/dina_meta1.php"; ?>">
<meta name="keywords" content="<?php include "include/dina_meta2.php"; ?>">
<meta http-equiv="Copyright" content="Every Day Like Sunday, Gede Suma Wijaya, Smkn 1 Denpasar">
<meta name="author" content="Gede Suma Wijaya, Edi Gunawan, Everyday Like Sunday, Smkn 1 Denpasar">
<meta http-equiv="imagetoolbar" content="no">
<meta name="language" content="Indonesia English">
<meta name="revisit-after" content="7">
<meta name="webcrawlers" content="all">
<meta name="rating" content="general">
<meta name="spiders" content="all">
<title><?php include('connect.php'); include('include/dina_titel.php'); ?></title>
<link rel="shortcut icon" href="image/icon.png" />
<link type="text/css" rel="stylesheet" media="all" href="css/chat.css" />
<link type="text/css" rel="stylesheet" media="all" href="css/screen.css" />
<script type="text/javascript" src="js/dropdowntabs.js"></script>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/script.js"></script>
<script type="text/javascript" src="js/chat.js"></script>
		<?php 
			if(!empty($_COOKIE['style'])) $style = $_COOKIE['style'];
			else $style = 'night';
		?>
		<link id="stylesheet" type="text/css" href="css/<?php echo $style ?>.css" rel="stylesheet" />
		<script type="text/javascript" src="js/jquery2.js"></script>
		<script type="text/javascript" src="js/styleswitcher.jquery.js"></script>
</head>
<body onLoad="goforit()">

<body>
<div id="wrapper">
<div id="menuutama">
<div class="logo"><a href="home"><img src="image/logo.jpg" border="0" /></a></div>
<div class="menu" id="nav"><?php include('include/menu.php'); ?></div>
</div>
<div id="content">
<div id="kiri">
<?php
include('module.php');
?>
</div>
<div id="kanan">
<?php
include('right-bar.php');
?>
</div>
</div>
<div id="footer"><a href="home">HOME</a> | <a href="about-els.html">ABOUT US</a> | <a href="semua-berita-teknologi-informasi.html">NEWS</a> | <a href="member-els.html">MEMBER</a> | <a href="member-els.html">GALLERY</a> | <a href="#">ART WORK</a> | <a href="forum-everydaylikesunday.html">FORUM</a> | <a href="#">TUTORIAL &amp; TRIK</a>| <a href="guestbook-everydaylikesunday.html">GUESTBOOK</a><br /> 
<br />
COPYRIGHT &copy; <a href="http://www.everydaylikesunday.co.cc" target="_blank">EVERYDAY LIKE SUNDAY</a>. ALL RIGHT RESERVED @ 2009 -
<?php
$tanggal=date(Y);
echo"$tanggal";
?>
.
THIS WEBSITE DEDICATED FOR 3 MULTIMEDIA 1 CLASS [2008|2009] <br />
AS CONNECTION AFTER US PASSED FROM SMKN 1 DENPASAR
DESIGN AND PROGRAM BY GEDE SUMA WIJAYA. ANY COMMENTS ABOUT THIS WEBSITE,<br /> 
PLEASE SEND MAIL TO <a href="mailto:go_blind_boys@yahoo.com">GO_BLIND_BOYS@YAHOO.COM
</a>OR LEAVE COMMENT ON <a href="guestbook-everydaylikesunday.html">GUESTBOOK</a> MENU </div>
<div id="menubawah">
<div class="clock">
Selamat Datang Broww...!!!! Di Website <a href="http://www.everydaylikesunday.co.cc" target="_blank">Everyday Like Sunday</a>, Tempat Nongkronya Anak-Anak 3.MM.1 Angkatan 2006-2009...!!!! Just Enjoy In This Site.........!!!<br />
<strong>[ </strong><script language="javascript" src="js/clock.js" type="text/javascript"></script><span id="clock"></span><strong> ] </strong><?php
?> <?php $ip = $_SERVER['REMOTE_ADDR'];
$counter=mysql_query("select * from page_counter");
while($lihat = mysql_fetch_array($counter)){
echo"<font color='white'> -- <strong>[</strong> IP. Anda <i>$ip</i> <strong>]</strong> -- <strong>[</strong> Website Ini Dikunjungi Sebanyak : <b><blink>$lihat[counter] kali</blink></b> <strong>]</strong> </font>";
}
?></div>
</div>
</div>
</body>
</html>
