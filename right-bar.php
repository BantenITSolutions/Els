<?php
//form login
$counter=mysql_query("select * from page_counter");
while($lihat = mysql_fetch_array($counter)){
mysql_query("UPDATE page_counter SET counter=$lihat[counter]+1"); 
}
  if(empty($_SESSION[namamember]) and empty($_SESSION[passmember])){
echo"<span class='rightbartitle'>Login Form Member</span><br>";
echo"<form method='post' action='login.php'>";
echo"<table width='260px' style='border: 1pt ridge #A3D331;' cellpadding='1' cellspacing='1'><tr><td></td></tr>";
echo"<tr><td width='80px' valign='middle' align='top'>Username</td><td>:</td><td><input type='text' class='textfiledform' name='usernamemember'></td></tr>";
echo"<tr><td width='80px' valign='middle' align='top'>Password</td><td>:</td><td><input type='password' class='textfiledform' name='passwordmember'></td></tr>";
echo"<tr><td width='80px' valign='middle' align='top'></td><td></td><td><input type='submit' class='textfiledform' value='Log In'><input type='reset' class='textfiledform' value='Hapus'></td></tr>";
echo"<tr><td width='80px' valign='middle' align='center' colspan='3' bgcolor='#BDEA5B'>Belum Punya Account? <a href='register-member-els.html'>Daftar Disini</a></td></tr>";
echo"</table>";
echo"</form><br>";
//forgot password
echo"<span class='rightbartitle'>Forgot Password</span><br>";
echo"<form method=POST action='lupa-password.html'>";
echo"<table width='260' border='0' cellpadding='1' cellspacing='1' style='border: 1pt ridge #A3D331;'>";
echo"<tr><td width='80px' valign='middle' align='top'>Email Anda</td><td>:</td><td><input type='text' class='textfiledform' name='emailmember'></td></tr>";
echo"<tr><td width='80px' valign='middle' align='top'></td><td></td><td><input type='submit' class='textfiledform' value='Kirim Password'></td></tr>";
echo"<tr><td width='80px' valign='middle' align='center' colspan='3' bgcolor='#BDEA5B'>Password akan terkirim ke email anda</td></tr>";
echo"</table><br>";
echo"</form>";
} else {
$query_member=mysql_query("select * from member where username='$_SESSION[namamember]'");
while($tm=mysql_fetch_array($query_member)){
$id_member=$tm[id_member];
}
$query_noti=mysql_query("select * from noti where id_member_terkait='$id_member'");
$jml_noti=mysql_num_rows($query_noti);
if($jml_noti >= 1){
$jml_noti_tmpl="<blink><strong>$jml_noti Notifications</strong></blink>";
} else {
$jml_noti_tmpl="Notifications";
}

$query_member=mysql_query("select * from member where username='$_SESSION[namamember]'");
while($tm=mysql_fetch_array($query_member)){
$id_member=$tm[id_member];
echo"<span class='rightbartitle'>Welcome As Member On ELS</span><br>";
echo"<table width='260px' border='0' style='border: 1pt ridge #A3D331;' cellpadding='1' cellspacing='1'><tr><td></td></tr>";
echo"<tr><td width='90px' valign='middle' align='center' rowspan='5'><img src='member/$tm[foto_kecil]' width='85' class='image'></td><td valign='middle' align='center' height='25'><strong>$tm[nama_member]</strong><br>How are you today???</td></tr>";
echo"<tr><td align='center'><a href='member-everydaylikesunday-2009$tm[id_member]-9002.html'><div class='menu-button'>Lihat Profil</div></a></td></tr>";
echo"<tr><td align='center'><a href='edit-profil-member.html'><div class='menu-button'>Edit Profil</div></a></td></tr>";
echo"<tr><td align='center'><a href='koleksi-foto-member-$tm[id_member].html'><div class='menu-button'>Koleksi Foto</div></a></td></tr>";
echo"<tr><td align='center'><a href='koleksi-art-work-$tm[id_member].html'><div class='menu-button'>Koleksi Art Work</div></a></td></tr>";
echo"<tr><td align='center' colspan='2'><a href='lihat-notifications-$id_member.html'><div class='menu-button'>$jml_noti_tmpl</div></a></td></tr>";
echo"<tr><td width='80px' valign='middle' align='center' colspan='3' bgcolor='#BDEA5B'>Sudah selesai??? Ingat <a href='logout.html'>Logout</a></td></tr>";
echo"</table><br>";
}
}
//cari artikel
echo"<span class='rightbartitle'>Search Article or News</span><br>";
echo"<form method=POST action='hasil-pencarian.html'>";
echo"<table width='260' border='0' cellpadding='1' cellspacing='1' style='border: 1pt ridge #A3D331;'>";
echo"<tr>";
echo"<td><input name='kata' type='text' size='30' class='textfiledform'/><input type='submit' value='Search' class='textfiledform'/><br>Other search engine : <a href='http://www.google.com' target='_blank'>Google</a> | <a href='http://www.bing.com' target='_blank'>Bing</a> | <a href='http://www.yahoo.com' target='_blank'>Yahoo</a></td>";
echo"</tr>";
echo"</table><br>";
echo"</form>";
//popular member
echo"<span class='rightbartitle'>Popular Member of Today</span><br>";
					$no=1;
					$query2=mysql_query("select * from member order by RAND() limit 2");
					echo"<table width='260' border='0' cellpadding='1' cellspacing='1' style='border: 1pt ridge #A3D331;'>";
					while($row=mysql_fetch_array($query2)){
					echo"<tr><td height='5'></td></tr>";
					echo"<tr><td width='2'></td><td width='75' valign='top' align='center'><a href=member-everydaylikesunday-2009$row[id_member]-9002.html><img src='member/$row[foto_kecil]' width='70px' class='image'></a></td><td valign='top' 		align='left'><table border='0' cellpadding='0' cellspacing='0'><tr><td width='50' valign='top' laign='left'><strong>Nama</strong></td><td valign='top' laign='left'width='6'>: </td><td valign='top' laign='left'>$row[nama_member]</td></tr>";
					echo"<tr><td width='50' valign='top' laign='left'><strong>Alamat</strong></td><td valign='top' laign='left'width='6'>: </td><td valign='top' laign='left'>$row[alamat_member]</td></tr>";
					echo"<tr><td width='50' valign='top' laign='left'><strong>Hobi</strong></td><td valign='top' laign='left'width='6'>: </td><td valign='top' laign='left'>$row[hobi_member]</td></tr>";
					echo"</table></td></tr>";
					}
					echo"<tr><td colspan='3' valign='middle' align='center' height='20' bgcolor='#BDEA5B'><a href='member-els.html'>Lihat Member Yang Lain</a></td></tr>";					
					echo"</table><br>";
//polling
echo"<span class='rightbartitle'>Polling Of This Month</span><br>";
echo "<form method=POST action='hasil-poling.html'>";
echo"<table border='0' width='260' style='border: 1pt ridge #A3D331; 'cellpadding='1' cellspacing='1'><tr><td>";
$query_polling=mysql_query("select * from pertanyaan_polling where aktif='Y'");
	while($tnypoll=mysql_fetch_array($query_polling)){
echo "<b>$tnypoll[pertanyaan_polling]</b> <p>";
$poling=mysql_query("SELECT * FROM poling WHERE aktif='Y'");
}
while ($p=mysql_fetch_array($poling)){
  echo "<input type=radio name=pilihan value='$p[id_poling]' />$p[pilihan]<br />";
}
echo"</td></tr><tr><td bgcolor='#BDEA5B' align='center'>";
echo "<input type=submit value=Vote class='textfiledform'/>&nbsp;&nbsp;<input type='submit' value='Hasil Polling' class='textfiledform'/>
      </form>";
	  echo"</td></tr></table><br>";


//Shoutbox
echo"<span class='rightbartitle'>Mini Shout-Box & Contact</span><br>";
echo"<table border='0' width='260' style='border: 1pt ridge #A3D331; 'cellpadding='1' cellspacing='1'><tr><td align='center' valign='top'>";
echo"<iframe title='sumawijaya' src='http://www4.shoutmix.com/?sumawijaya' width='250' height='250' frameborder='0' scrolling='auto'>
<a href='http://www4.shoutmix.com/?sumawijaya'>View shoutbox</a>
</iframe>";
	  echo"</td></tr></table><br>";
	  
//Iklan & promosi
echo"<span class='rightbartitle'>Advertise & Promotion</span><br>";
echo"<table border='0' width='260' style='border: 1pt ridge #A3D331; 'cellpadding='1' cellspacing='1'><tr><td align='center' valign='top'>";
echo"<iframe title='sumawijaya' src='http://www4.shoutmix.com/?sumawijaya' width='250' height='250' frameborder='0' scrolling='auto'>
<a href='http://www4.shoutmix.com/?sumawijaya'>View shoutbox</a>
</iframe>";
	  echo"</td></tr></table>";
?>