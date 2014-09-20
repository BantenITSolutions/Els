
	<ul>
    	<li><a href="home" title="Everyday Like Sunday Multimedia SMKN 1 Denpasar">Home</a></li>
        <li><a href="about-els.html" title=" Tentang Everyday Like Sunday Multimedia SMKN 1 Denpasar">About Us</a></li>
        <li><a href="semua-berita-teknologi-informasi.html" title="Berita Teknologi Informasi dan Komunikasi">News</a></li>
        <li><a href="member-els.html" title="Anggota Everyday Like Sunday Multimedia SMKN 1 Denpasar">Member</a></li>
        <li><a href="gallery-everydaylikesunday.html" title="Galeri Everyday Like Sunday Multimedia SMKN 1 Denpasar">Gallery</a></li>
        <li><a href="art-work-everydaylikesunday.html" title="Karya Seni Everyday Like Sunday Multimedia SMKN 1 Denpasar">Art Work</a></li>
        <li><a href="forum-everydaylikesunday.html" title="Forum Everyday Like Sunday Multimedia SMKN 1 Denpasar">Forum</a></li>
        <li><a href="tutorial-dan-trik-it.html" title="Tutorial PHP, Hardware, Jaringan, Komputer, Desain Grafis">Tutorial & Trik</a></li>
        <li><a href="guestbook-everydaylikesunday.html" title="Buku Tamu Everyday Like Sunday Multimedia SMKN 1 Denpasar">Guestbook</a></li>
		<li id="day"><a href="style-switcher.php?style=day">Day</a></li>
		<li id="night"><a href="style-switcher.php?style=night">Night</a></li>
		<?php if(empty($_SESSION[namamember]) and empty($_SESSION[passmember])){
	        echo"<li><a href='#'>Login Chat</a></li>";	
} else{
$tampil_online=mysql_query("select * from member where status_member='online'");
$jml=mysql_num_rows($tampil_online);
		echo"
		<div id='moonmenu' class='halfmoon'>
<ul>
<li><a href='#' rel='dropmenu1_e'>$jml Online Chatting</a></li>
</ul>
</div>
                                           
<div id='dropmenu1_e' class='dropmenudiv_e'>";

include('connect.php');
$tampil_online=mysql_query("select * from member where status_member='online'");
$jml=mysql_num_rows($tampil_online);
while($tampil=mysql_fetch_array($tampil_online)){
session_start();
session_register("fotomember");
$_SESSION[fotomember] = $r[foto_kecil];
$kata=$tampil[username];
$idfoto=str_replace(" ","-","$kata");
echo"<a href='javascript:void(0)' onClick=\"javascript:chatWith('$idfoto')\"><img src='member/$tampil[foto_kecil]' width='15' height='15' border='1'> $tampil[nama_member]</a>";
}
echo"</div>";
		}
?>
<script type="text/javascript">
//SYNTAX: tabdropdown.init("menu_id", [integer OR "auto"])
tabdropdown.init("moonmenu", 3)
</script>
    </ul>