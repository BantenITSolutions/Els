<?php
include "../connect.php";
$pass=md5($_POST[passwordadmin]);
$user=$_POST[usernameadmin];
$login=sprintf("SELECT * FROM admin_list WHERE username='$user' AND password='$pass'", mysql_real_escape_string($user), mysql_real_escape_string($pass));
$cek_lagi=mysql_query($login);
$ketemu=mysql_num_rows($cek_lagi);
$r=mysql_fetch_array($cek_lagi);
session_start();
// Apabila username dan password ditemukan
if(!empty($_POST['kode'])){
		if($_POST['kode']==$_SESSION['captcha_session']){
if ($ketemu > 0){
  session_register("namaadmin");
  session_register("passwordadmin");

  $_SESSION[namaadmin] = $r[username];
  $_SESSION[passwordadmin] = $r[password];
  header('location:../els-admin/editor-root/home');
}
else{
  header('location:../els-admin');
}
}else{
echo "<meta http-equiv='refresh' content='0; url=../els-admin'>";
		}
	}else{
echo "<meta http-equiv='refresh' content='0; url=../els-admin'>";
	}
?>
