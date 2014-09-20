<?
session_start();
if(empty($_SESSION[namaadmin]) AND empty($_SESSION[passwordadmin])){
header("location:../");
}
else{
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>X-PANEL ADMIN || RESTRICTED AREA</title>
<link rel="shortcut icon" href="../../image/icon.png" />
<link href="../style.css" type="text/css" rel="stylesheet" />
<script type="text/javascript"  src="../../js/nicEdit.js"></script>
<script type="text/javascript">
	bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
</script>
</head>

<body onLoad="goforit()">
<div id="menu">
<div class="logo"><a href="../../home"><img src="../../image/logo.jpg" width="200" height="40" border="0" /></a></div>
<li>
<ul>X-Panel Admin >> <strong>Root Level</strong></ul>
</li>
</div>
<div id="content-admin">
<div id="kanan">
<?
include('master-menu.php');
?>
</div>
<div id="kiri">
<?
include('module.php');
?>
</div>
</div>
<div id="footer">
</div>
<div id="menubawah">
<div class="clock">
X-PANEL ADMIN - ADMINISTRATOR AREA -COPYRIGHT <a href="http://everydaylikesunday.co.cc" target="_blank">EVERYDAY LIKE SUNDAY</a> <? $waktu=date(Y); echo"2009 - $waktu"; ?><br />
DESIGN BY GEDE SUMA WIJAYA -|- <strong> [ </strong><script language="javascript" src="../../js/clock.js" type="text/javascript"></script><span id="clock"></span><strong> ] </strong>
<?
include('../../connect.php');
$ip = $_SERVER['REMOTE_ADDR'];
$counter=mysql_query("select * from page_counter");
while($lihat = mysql_fetch_array($counter)){
echo"<font color='white'> -- <strong>[</strong> IP. Anda <i>$ip</i> <strong>]</strong> -- <strong>[</strong> Counter : <b><blink>$lihat[counter] kali</blink></b> <strong>]</strong> </font>";
}
?>
</div>
</div>
</body>
</html>
<?
}
?>