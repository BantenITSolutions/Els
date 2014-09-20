<?php
include "connect.php";
$pass=md5($_POST[passwordmember]);
$user=$_POST[usernamemember];
$login=sprintf("SELECT * FROM member WHERE username='$user' AND password='$pass'", mysql_real_escape_string($user), mysql_real_escape_string($pass));
$cek_lagi=mysql_query($login);
$ketemu=mysql_num_rows($cek_lagi);
$r=mysql_fetch_array($cek_lagi);
$r[nama];
// Apabila username dan password ditemukan
if ($ketemu > 0){
  session_start();
  session_register("namamember");
  session_register("passmember");
  session_register("namatampil");

  $_SESSION[namamember] = $r[username];
  $_SESSION[passmember] = $r[password];
  $_SESSION[namatampil] = $r[nama_member];
  header('location:index.php');
}
else{
  header('location:gagal-login.html');
}
$query=mysql_query("update member set status_member='online' where username='$_SESSION[namamember]'") or die (mysql_error());
?>
