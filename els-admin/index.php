<?
session_start();
if(empty($_SESSION[namaadmin]) AND empty($_SESSION[passwordadmin])){
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>X-PANEL ADMIN || RESTRICTED AREA</title>
<link rel="shortcut icon" href="../image/icon.png" />
<link href="style.css" type="text/css" rel="stylesheet" />
</head>

<body onLoad="goforit()">
<div id="menu">
<div class="logo"><a href="../home"><img src="../image/logo.jpg" border="0" /></a></div>
<li>
<ul><strong>X-Panel Admin</strong> >> Root Level</ul>
</li>
</div>
<div id="content">
		<h2>Administrator Area</h2>
    <img src="../image/login-welcome.gif" width="97" height="105" hspace="10" align="left">

<form method="POST" action="cek-login.php">
<table width="299" border="1">
<tr><td>Username</td><td> : <input name="usernameadmin" type="text" size="35"></td></tr>
<tr><td>Password</td><td> : <input name="passwordadmin" type="password" size="35"></td></tr>
<tr><td>Captcha</td><td> &nbsp;&nbsp; <img src="../captcha.php" /></td>
<tr><td>Kode</td><td> : <input name="kode" type="text" size="35"></td>
</tr>
<tr>
  <td colspan="2"><input name="Reset" type="reset" value="Hapus" />
    <input name="submit2" type="submit" value="Login" /> 
    * Login to Access Root </td>
</tr>
</table>
</form>

<p>&nbsp;</p>
</div>
<div id="menubawah">
<div class="clock">
X-PANEL ADMIN - ADMINISTRATOR AREA -COPYRIGHT <a href="http://everydaylikesunday.co.cc" target="_blank">EVERYDAY LIKE SUNDAY</a> <? $waktu=date(Y); echo"2009 - $waktu"; ?><br />
DESIGN BY GEDE SUMA WIJAYA -|- <strong> [ </strong><script language="javascript" src="../js/clock.js" type="text/javascript"></script><span id="clock"></span><strong> ] </strong>
<?
include('../connect.php');
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
else{
header("location:editor-root/");
}
?>