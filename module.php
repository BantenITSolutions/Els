<script language="javascript">
function validasi(form){
  if (form.nama_komentar.value == ""){
    alert("Anda belum mengisikan Nama.");
    form.nama_komentar.focus();
    return (false);
  }  
  if (form.isi_komentar.value == ""){
    alert("Anda belum mengisikan komentar.");
    form.isi_komentar.focus();
    return (false);
  }
  return (true);
}
</script>
<?php
include('connect.php');
include('include/fungsi_indotgl.php');
include('include/class_paging.php');
include('include/library.php');
include('functions.php');

//HOME.........
if ($_GET[module]=='home'){
$berita=mysql_query("select count(komentar.id_komentar) as jumlah, judul, judul_seo, jam, 
                       tanggal, gambar, isi_berita, berita.id_berita
                       from berita left join komentar 
                       on berita.id_berita=komentar.id_berita
                       group by berita.id_berita DESC LIMIT 3");
echo"<span class='judulhome'>Welcome On Everyday Like Sunday Official Website</span><br>";
echo"<span>Website Everydaylikesunday kini hadir dengan format baru. Dengan fitur Update Status dan Chatting website ini terlihat lebih interaktif. Join trus yaw..!!!! Untuk ELS Family 3.MM.1, sukses selalu untuk Qta semua. Dimanapun dan kapanpun Qta tetap 1 kesatuan yang utuh :D .Sudahkah kamu meng`Update Status`mu hari ini?????</span><br><br>";

//Status Update........

if(empty($_SESSION[namamember]) and empty($_SESSION[passmember])){
echo"";
} else {
$update=mysql_query("select * from member where username='$_SESSION[namamember]'");
while($nama=mysql_fetch_array($update)){
$nama_member=$nama[nama_member];
$id_member=$nama[id_member];
$foto_pengirim=$nama[foto_kecil];
}
echo"<div id='twitter-container'>
<form id='tweetForm' action='submit.php' method='post'>
<span><strong><font size='2'>Apa yang kamu pikirkan sekarang??? Let`s Share It...!!!</font></strong></span><br><br>
<div><a href='member-everydaylikesunday-2009$id_member-9002.html'><img src='member/$foto_pengirim' width='48' height='48' border='1'></a><img src='image/shout-out.png'><textarea name='inputField' id='inputField' rows='2' cols='45' class='styletextarea'></textarea></div>
<input name='submit' type='submit' value='Publish' disabled='disabled' class='submitButton inact'/>
<input type='text' name='nama_member' value='$nama_member' class='sembunyi'><input type='text' name='id_member' value='$id_member' class='sembunyi'><input type='text' name='foto_pengirim' value='$foto_pengirim' class='sembunyi'><br>
<span class='counter'>140 </span>
<span id='status'></span>
<div class='clear'></div>
</form>
</div><br>";
};
  $p      = new Paging;
  $batas  = 6;
  $posisi = $p->cariPosisi($batas);
$q = mysql_query("SELECT * FROM demo_twitter_timeline ORDER BY ID DESC LIMIT $posisi,$batas");
$maksimal=mysql_num_rows($q);
$timeline='';
while($row=mysql_fetch_assoc($q))
{
	$timeline.=formatTweet($row['id'],$row['tweet'],$row['dt'],$row['id_member'],$row['nama_pengirim'],$row['foto_pengirim']);
}

// fetch the latest tweet
$lastTweet = '';
list($lastTweet) = mysql_fetch_array(mysql_query("SELECT tweet FROM demo_twitter_timeline ORDER BY id DESC LIMIT 1"));

if(!$lastTweet) $lastTweet = "You don't have any tweets yet!";

echo"<span class='judulberita'>Status Member Hari Ini</span>
<ul class='statuses'>$timeline</ul><br>";
  $jmldata     = mysql_num_rows(mysql_query("SELECT * FROM demo_twitter_timeline"));
  $jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
  $linkHalaman = $p->navHalaman2($_GET[halaman], $jmlhalaman);

  echo "<table align='center'><tr><td align='center'>$linkHalaman</td></tr></table><br />";
  

//Tampilkan Beberapa berita terbaru.....
echo"<span class='judulhome'>Berita Tentang Teknologi Informasi & Komputer</span><br><br>";
while($t=mysql_fetch_array($berita)){
	$tgl = tgl_indo($t[tanggal]);
echo"<span class='judulberita'><a href='berita-$t[id_berita]-$t[judul_seo].html'>$t[judul]</a></span><br>";
echo"<span class='tanggalberita'>$tgl -|- $t[jam] WIB</span><br>";
    if ($t[gambar]!=''){
			echo "<span class=image><img src='foto_berita/small_$t[gambar]' width=75 border=0></span>";
		}
    // Tampilkan hanya sebagian isi berita
    $isi_berita = htmlentities(strip_tags($t[isi_berita])); // mengabaikan tag html
    $isi = substr($isi_berita,0,400); // ambil sebanyak 220 karakter
    $isi = substr($isi_berita,0,strrpos($isi," ")); // potong per spasi kalimat

    echo "$isi ... <a href=berita-$t[id_berita]-$t[judul_seo].html>Baca Selengkapnya</a> (<b>$t[jumlah] komentar</b>)
          <br /><hr color=#e0cb91 noshade=noshade />";
	
}
  // Tampilkan 5 judul berita sebelumnya 
  echo "<img src=image/berita_sebelumnya.png><br /><ul>";
  $sebelum=mysql_query("SELECT * FROM berita 
                        ORDER BY id_berita DESC LIMIT 3,10");		 
	while($s=mysql_fetch_array($sebelum)){
	   echo "<li><a href=berita-$s[id_berita]-$s[judul_seo].html>$s[judul]</a></li>";
	}
	echo "</ul>";
}


//DETAIL BERITA.......
elseif ($_GET[module]=='detailberita'){
	$detail=mysql_query("SELECT * FROM berita,kategori    
                      WHERE kategori.id_kategori=berita.id_kategori 
                      AND id_berita='$_GET[id]'");
	$d   = mysql_fetch_array($detail);
	$tgl = tgl_indo($d[tanggal]);
	$baca = $d[dibaca]+1;
	echo "<span class='judulberitabesar'>$d[judul]</span><br />
	<span class='tanggalberita'>$tgl - $d[jam] WIB</span><br />
	<span>Share this article on : " ?>
<script language="javascript">
document.write("<a href='http://twitter.com/home/?status=" + document.URL + "' target='_blank'>Twitter</a> | <a href='http://www.facebook.com/share.php?u=" + document.URL + "' target='_blank'>Facebook</a> | <a href='http://www.reddit.com/submit?url=" + document.URL + "' target='_blank'>Reddit</a> | <a href='http://digg.com/submit?url=" + document.URL + "' target='_blank'>Digg</a>");
</script>
<?php
echo"</span><br />
        Kategori: <a href=kategori-$d[id_kategori]-$d[kategori_seo].html><b>$d[nama_kategori]</b></a> 
        - Dibaca: <b>$baca</b> kali</span><br /><br />";
  // Apabila ada gambar dalam berita, tampilkan   
 	if ($d[gambar]!=''){
		echo "<span class=image><img src='foto_berita/$d[gambar]' border='0' width='200'></span>";
	}
	$isian=nl2br($d[isi_berita]);
	echo "$isian<br />";	 		  
  echo"<br><span>Share this article on : " ?>
<script language="javascript">
document.write("<a href='http://twitter.com/home/?status=" + document.URL + "' target='_blank'>Twitter</a> | <a href='http://www.facebook.com/share.php?u=" + document.URL + " ' target='_blank'>Facebook</a> | <a href='http://www.reddit.com/submit?url=" + document.URL + "' target='_blank'>Reddit</a> | <a href='http://digg.com/submit?url=" + document.URL + "' target='_blank'>Digg</a>");
</script>
<?php
echo"</span><br /><br />";
  // Tampilkan judul berita yang terkait (maks: 5) 
  echo "<img src=image/berita_terkait.png><br /><ul>";
  // pisahkan kata per kalimat lalu hitung jumlah kata
  $pisah_kata  = explode(",",$d[tag]);
  $jml_katakan = (integer)count($pisah_kata);

  $jml_kata = $jml_katakan-1; 
  $ambil_id = substr($_GET[id],0,2);

  // Looping query sebanyak jml_kata
  $cari = "SELECT * FROM berita WHERE (id_berita<'$ambil_id') and (id_berita!='$ambil_id') and (" ;
    for ($i=0; $i<=$jml_kata; $i++){
      $cari .= "tag LIKE '%$pisah_kata[$i]%'";
      if ($i < $jml_kata ){
        $cari .= " OR ";
      }
    }
   $cari .= ") ORDER BY id_berita DESC LIMIT 5";
 
  $hasil  = mysql_query($cari);
  while($h=mysql_fetch_array($hasil)){
  		echo "<li><a href=berita-$h[id_berita]-$h[judul_seo].html>$h[judul]</a></li>";
  }      
	echo "</ul>";

  // Apabila detail berita dilihat, maka tambahkan berapa kali dibacanya
  mysql_query("UPDATE berita SET dibaca=$d[dibaca]+1 
              WHERE id_berita='$_GET[id]'"); 


  // Hitung jumlah komentar
  $idnya=substr("$_GET[id]",0,2);
  $komentar = mysql_query("select count(komentar.id_komentar) as jml from komentar WHERE id_berita='$idnya' AND aktif='Y'");
  $k = mysql_fetch_array($komentar); 
  echo "<span class=judulberita><b>$k[jml]</b> Komentar untuk Artikel ini </span><br />";

  // Komentar berita
  $sql = mysql_query("SELECT * FROM komentar WHERE id_berita='$idnya' AND aktif='Y'");
	$jml = mysql_num_rows($sql);
  // Apabila sudah ada komentar, tampilkan 
  if ($jml > 0){
  echo"<table border='0' style='border: 1pt ridge #A3D331;' width='100%'>";
    while ($s = mysql_fetch_array($sql)){
      $tanggal = tgl_indo($s[tgl]);
      // Apabila ada link website diisi, tampilkan dalam bentuk link   
	  if(!empty($_SESSION[namaadmin]) AND !empty($_SESSION[passwordadmin])){
	  $dlt="<a href='delete-komentar-$s[id_komentar].html' onClick=\"return confirm('Anda yakin ingin menghapus komentar ini???')\">Delete</a>";
	  }
	  else{
	  $dlt="";
	  }
 	    if ($s[url]!=''){
        echo "<tr><td><a href='http://$s[url]' target='_blank'>$s[nama_komentar]</a> | <span class='tanggalberita'>$tanggal - $s[jam_komentar] WIB - <font color='green'>$s[ip_pengirim]</font></span> - $dlt</td></tr>";  
	    }
	    else{
        echo "<tr><td>$s[nama_komentar] | $tanggal - $s[jam_komentar] WIB</td></tr>";  
      }
      $isian=nl2br($s[isi_komentar]); // membuat paragraf pada isi komentar
	    echo "<tr><td>$isian<br><hr color=#a3d331 noshade=noshade /></td></tr>";	 		  
    }
	echo"</table><br>";
  }
  else {
  echo"<table border='0' style='border: 1pt ridge #A3D331;' width='100%'>";
	echo"<tr><td>Komentar Masih Kosong</td></tr>";	 		  
	echo"</table><br>";
  }
  
  // Form komentar
  echo "<span class='rightbartitle'><b>Beri Komentar Artikel Ini :</b></span>
        <table width=100% border='0' style='border: 1pt ridge #A3D331;'>
        <form action='simpan-komentar-berita.html' method=POST onSubmit=\"return validasi(this)\">
        <input type=hidden name=id_berita value=$idnya>
        <input type=hidden name=id value=$_GET[id]>
        <tr><td>Nama</td><td> : </td><td><input type=text name=nama_komentar size=40 class='textfiledform'></td></tr>
        <tr><td>Website</td><td> : </td><td><input type=text name=url size=40 class='textfiledform'></td></tr>
        <tr><td valign=top>Komentar</td><td valign='top'> : </td><td><textarea name='isi_komentar' style='width: 315px; height: 100px;'  class='textfiledform'></textarea></td></tr>
        <tr><td>&nbsp;</td><td></td><td><img src='captcha.php'></td></tr>
        <tr><td>&nbsp;</td><td></td><td>(Masukkan 6 kode diatas)<br /><input type=text name=kode size=6 class='textfiledform'><br /></td></tr>
        <tr><td>&nbsp;</td><td></td><td><input type=submit name=submit value=Kirim class='textfiledform'> <input type=reset name=submit value=Hapus class='textfiledform'></td></tr>
        </form></table><br />";
}

//ABOUT ELS........
elseif ($_GET[module]=='about'){
echo"<span class='judulhome'>Tentang Kami || Everyday Like Sunday || 3.MM.1 (2008/2009)</span>";
echo"<table width='100%'>";
echo"<tr><td>Kami ada karena terlahir dari benih`2 kristal design grafis, membentuk sebuah kumpulan hingga menjadi sebuah keluarga, EVERYDAY LIKE SUNDAY FAMILY. Kami terlahir dari bulir-bulir kreativitas Multimedia, membentuk sebuah bagian kehidupan dan tergabung dalam sebuah komunitas dalam dunia maya, 3.MM.1COMUNITY ON_NET.<br><br>
<span class='image'><img src='member/about-pict.jpg'></span>
 <br><br><br>Tiga tahun yang lalu, saat kita bertemu setelah terlepas dari ikatan masa kanak-kanak, untuk menghadapi kehidupan di depan yang lebih kejam. Kita pun bertemu dalam wadah dan ikatan kekeluargaan yang berlandaskan persahabatan. Entah darimana kita masing-masing berasal dengan watak dan sifat yang berbeda, kita pun menjadi sebuah keluarga. Kita mengarungi masa-masa kebersamaan selama kurang lebih 3 tahun untuk menuntut ilmu yang lebih tinggi, dengan berbagai suasana senang, sedih, bahagia, duka.<br><br>

Tak terasa, kebersamaan itu akan segera berkahir. Kita akan berpisah, untuk melanjutkan kehidupan dan menyongsong masa depan masing-masing. Walaupun begitu, bukan berarti kita akan berpisah untuk selamanya, masih ada waktu, tempat, dan dimensi yang bebeda untuk kita saling berbagi pengalaman, cerita, dan kenangan kita selama 3 tahun menuntut ilmu di SMKN 1 Denpasar.

Untuk itulah website ini dibuat, sebagai wadah berbagi, curhat, pengumuman, dan lain-lain. Janganlah kita sampai berpisah dan terpecah belah karena perbedaan tempat, persepsi, pikiran. LUPH U ALL FRIENDS....

Inilah anggota keluarga EVERYDAY LIKE SUNDAY FAMILY, maaf kalo foto yang dipasang jelek, ato kurang sesuai dengan hati teman-teman.
</td></tr>";
echo"</table>";

//Adsense disini..............
}


// MODUL SEMUA BERITA..........
elseif ($_GET[module]=='semua-berita'){
  echo "<span class=judulhome><b>Berita Tentang Teknologi Informasi & Komputer</b></span><br /><br />"; 
  $p      = new Paging;
  $batas  = 8;
  $posisi = $p->cariPosisi($batas);
  // Tampilkan semua berita
  $sql=mysql_query("select count(komentar.id_komentar) as jumlah, judul, judul_seo, jam, 
                       berita.id_berita, tanggal, gambar, isi_berita    
                       from berita left join komentar 
                       on berita.id_berita=komentar.id_berita
                       and aktif='Y' 
                       group by berita.id_berita DESC LIMIT $posisi,$batas");


  while($r=mysql_fetch_array($sql)){
	$tgl = tgl_indo($r[tanggal]);
echo"<span class='judulberita'><a href='berita-$r[id_berita]-$r[judul_seo].html'>$r[judul]</a></span><br>";
echo"<span class='tanggalberita'>$tgl -|- $r[jam] WIB</span><br>";
		echo"<span class='image'><img src='foto_berita/$r[gambar]' width='65'></span>";
      // Tampilkan hanya sebagian isi berita
	$isi_berita= htmlentities(strip_tags($r[isi_berita])); // mengabaikan tag html
    $isi = substr($isi_berita,0,400); // ambil sebanyak 220 karakter
    $isi = substr($isi_berita,0,strrpos($isi," ")); // potong per spasi kalimat

      echo "$isi ... <a href=berita-$r[id_berita]-$r[judul_seo].html>Selengkapnya</a> (<b>$r[jumlah] komentar</b>)
            <br /><hr color=#e0cb91 noshade=noshade />";
	 }
	
  $jmldata     = mysql_num_rows(mysql_query("SELECT * FROM berita"));
  $jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
  $linkHalaman = $p->navHalaman2($_GET[halaman], $jmlhalaman);

  echo "<table align='center'><tr><td align='center'>$linkHalaman </td></tr></table><br /><br />";
}


//MODUL SEMUA MEMBER........
elseif ($_GET[module]=='semua-member'){
  $p      = new Paging;
  $batas  = 5;
  $posisi = $p->cariPosisi($batas);
$query_sql=mysql_query("select * from member order by id_member DESC LIMIT $posisi,$batas");
echo"<span class='judulhome'>Member Everyday Like Sunday || 3.MM.1 (2008/2009)</span><br>";
echo"Saling berbagi dan berkomunikasi, dua hal itulah yang mengilhami kami untuk membangun dan mengembangkan website ini. Dengan bergabung di website ini, Qta dapat terus menjalin komunikasi dimanapun Qta berada, disertai fitur Chatting dan Update Status layaknya situs jejaring sosial <a href='http://www.facebook.com' target='_blank'>Facebook</a> semakin membuat Qta tetap betah untuk 'Nongkrong' di website ini :D. So...untuk temen`2 ELS yang belum register atau join di website ini, cepetan gabung yaw. Biar Qta bisa tetep saling berkomunikasi & berbagi. OK deh...klik <a href='register-member-els.html'>REGISTER</a> untuk daftar jadi member.<br><br>";
while($mbr=mysql_fetch_array($query_sql)){
echo"<table class='member-title' width='100%' height='20'><tr><td height='20'><a href=member-everydaylikesunday-2009$mbr[id_member]-9002.html>$mbr[nama_member]</a></td></tr></table>";
echo"<table width='100%' border='0' style='border: 1pt ridge #A3D331;' cellspacing='0' cellpadding='0' class='bg-member'>";
echo"<tr><td width='10'></td><td width='90' rowspan='6' valign='top' align='center'><img src='member/$mbr[foto_kecil]' class='image' width='80'></td>";
echo"<td><table border='0' width='100%'>";
echo"<tr><td width='100' valign='top'>Nama</td><td align='center' valign='top'>:</td><td valign='top'>$mbr[nama_member]</td></tr>";
echo"<tr><td width='100' valign='top'>Alamat</td><td align='center' valign='top'>:</td><td valign='top'>$mbr[alamat_member]</td></tr>";
echo"<tr><td width='100' valign='top'>Tanggal Lahir</td><td align='center' valign='top'>:</td><td valign='top'>$mbr[tanggal_lahir]</td></tr>";
echo"<tr><td width='100' valign='top'>Hobi</td><td align='center' valign='top'>:</td><td valign='top'>$mbr[hobi_member]</td></tr>";
echo"<tr><td width='100' valign='top'>Agama & Religi</td><td align='center' valign='top'>:</td><td valign='top'>$mbr[agama_member]</td></tr>";
echo"<tr><td width='100' valign='top'>Email</td><td align='center' valign='top'>:</td><td valign='top'>$mbr[email_member]</td></tr>";
echo"<tr><td width='100'><a href=member-everydaylikesunday-2009$mbr[id_member]-9002.html><img src='image/button-lihat.png' border='0'></a></td><td align='center'></td><td><a href=member-everydaylikesunday-2009$mbr[id_member]-9002.html><img src='image/button-beri-komentar.png' border='0'></a></td></tr>";
echo"</table></td>";
echo"</tr>";
echo"</table><br>";
}
  $jmldata     = mysql_num_rows(mysql_query("select * from member"));
  $jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
  $linkHalaman = $p->navHalaman2($_GET[halaman], $jmlhalaman);
    echo "<table align='center' width='100%'><tr><td align='center'>Jumlah Member Saat ini : <b>$jmldata Member Aktif</b></td></tr></table><table align='center'><tr><td align='center'>$linkHalaman </td></tr></table><br /><br />";
}


//MODUL SIMPAN KOMENTAR.....
elseif ($_GET[module]=='simpankomentar'){
session_start();
$lindungi_nama=strip_tags($_REQUEST[nama_komentar]);
$lindungi_url=strip_tags($_REQUEST[url]);
$lindungi_pesan=strip_tags($_REQUEST[isi_komentar],"<br />");
$ip = $_SERVER['REMOTE_ADDR'];

	if(!empty($_POST['kode'])){
		if($_POST['kode']==$_SESSION['captcha_session']){
    $sql = mysql_query("INSERT INTO komentar(nama_komentar,url,isi_komentar,id_berita,tgl,jam_komentar,ip_pengirim) 
                        VALUES('$lindungi_nama','$lindungi_url','$lindungi_pesan','$_POST[id_berita]','$tgl_sekarang','$jam_sekarang','$ip')");
    echo "<meta http-equiv='refresh' content='0; url=berita-$_POST[id].html'>";
		}else{
			echo "Kode yang Anda masukkan tidak cocok<br />
			      <a href=javascript:history.go(-1)><b>Ulangi Lagi</b></a>";

		}
	}else{
		echo "Anda belum memasukkan kode<br />
  	      <a href=javascript:history.go(-1)><b>Ulangi Lagi</b></a>";
	}
}


//MODUL SIMPAN KOMENTAR MEMBER.....
elseif ($_GET[module]=='simpankomentarmember'){
session_start();
$lindungi_nama=strip_tags($_REQUEST[nama_komentar]);
$lindungi_pesan=strip_tags($_REQUEST[isi_komentar],"<br />");
$ip = $_SERVER['REMOTE_ADDR'];

	if(!empty($_POST['kode'])){
		if($_POST['kode']==$_SESSION['captcha_session']){
    $sql = mysql_query("INSERT INTO komentar_member(nama_komentar,isi_komentar,id_member,tgl,jam_komentar,id_pengirim,foto_pengirim,ip_pengirim)                       VALUES('$lindungi_nama','$lindungi_pesan','$_POST[id_member]','$tgl_sekarang','$jam_sekarang','$_POST[id_pengirim]',
						'$_POST[foto_pengirim]','$ip')");

 $sqll = mysql_query("INSERT INTO noti(id_member_milik,id_member_terkait,notifications,id_pengirim,nama_pengirim,status) VALUES('$_POST[id_member]','$_POST[id_member]','<a href=member-everydaylikesunday-2009$_POST[id_pengirim]-9002.html>$lindungi_nama</a> mengomentari profil <a href=member-everydaylikesunday-2009$_POST[id_member]-9002.html#komentar>Member ini</a>','$_POST[id_pengirim]','$lindungi_nama','not')");

$noti=mysql_query("select * from komentar_member where id_member='$_POST[id_member]' and id_pengirim!='$_POST[id_pengirim]'");
while($nt=mysql_fetch_array($noti)){
$id_semua=$nt[id_pengirim];
 $sqll = mysql_query("INSERT INTO noti(id_member_milik,id_member_terkait,notifications,id_pengirim,nama_pengirim,status) VALUES('$_POST[id_member]','$id_semua','<a href=member-everydaylikesunday-2009$_POST[id_pengirim]-9002.html>$lindungi_nama</a> mengomentari profil <a href=member-everydaylikesunday-2009$_POST[id_member]-9002.html#komentar>Member ini</a>','$_POST[id_pengirim]','$lindungi_nama','not')");
}


    echo "<meta http-equiv='refresh' content='0; url=member-everydaylikesunday-2009$_POST[id]-9002.html'>";
		}else{
			echo "Kode yang Anda masukkan tidak cocok<br />
			      <a href=javascript:history.go(-1)><b>Ulangi Lagi</b></a>";

		}
	}else{
		echo "Anda belum memasukkan kode<br />
  	      <a href=javascript:history.go(-1)><b>Ulangi Lagi</b></a>";
	}
}


//MODUL SIMPAN KOMENTAR TUTORIAL.....
elseif ($_GET[module]=='simpankomentartutorial'){
session_start();
$lindungi_nama=strip_tags($_REQUEST[nama_komentar]);
$lindungi_url=strip_tags($_REQUEST[url]);
$lindungi_pesan=strip_tags($_REQUEST[isi_komentar],"<br />");
$ip = $_SERVER['REMOTE_ADDR'];

	if(!empty($_POST['kode'])){
		if($_POST['kode']==$_SESSION['captcha_session']){
    $sql = mysql_query("INSERT INTO komentar_tutorial(nama_komentar,url,isi_komentar,id_berita,tgl,jam_komentar,ip_pengirim) 
                        VALUES('$lindungi_nama','$lindungi_url','$lindungi_pesan','$_POST[id_berita]','$tgl_sekarang','$jam_sekarang','$ip')");
    echo "<meta http-equiv='refresh' content='0; url=tutorial-$_POST[id].html'>";
		}else{
			echo "Kode yang Anda masukkan tidak cocok<br />
			      <a href=javascript:history.go(-1)><b>Ulangi Lagi</b></a>";

		}
	}else{
		echo "Anda belum memasukkan kode<br />
  	      <a href=javascript:history.go(-1)><b>Ulangi Lagi</b></a>";
	}
}


//MODUL DETAIL MEMBER.......
elseif ($_GET[module]=='detailmember'){
	$detail=mysql_query("SELECT * FROM member    
                      WHERE id_member='$_GET[id]'");
$status=mysql_query("select * from demo_twitter_timeline where id_member='$_GET[id]' order by id DESC LIMIT 1");
$hitung=mysql_num_rows($status);
if($hitung > 0){
while($stus=mysql_fetch_array($status)){
$shout="<strong>$stus[tweet]</strong>";
}
} else {
$shout="<strong>Status member ini masih kosong!!!</strong>";
}
while($dtlmbr=mysql_fetch_array($detail)){
echo"<table class='member-title' width='100%' height='20'><tr><td height='20'><a href=member-everydaylikesunday-2009$dtlmbr[id_member]-9002.html>$dtlmbr[nama_member]</a></td></tr></table>";
echo"<table><tr><td width='160' align='left' valign='top'><img src='member/$dtlmbr[foto_besar]' width='150' class='image'><center><font size='1'><i>$dtlmbr[foto_besar]</i></font></center>
<table><tr><td width='70' align='center' valign='middle'><a href='member-everydaylikesunday-2009$dtlmbr[id_member]-9002.html'><div class='menu-button'>Profil</div></a></td><td width='70' align='center' valign='middle'><a href='koleksi-foto-member-$dtlmbr[id_member].html'><div class='menu-button'>Foto-Foto</div></a></td></tr><tr><td width='70' align='center' valign='middle'><a href='koleksi-art-work-$dtlmbr[id_member].html'><div class='menu-button'>Art Work</div></a></td></tr></table>
</td>";
echo"<td valign='top'><table border='0' width='100%'>";
echo"<tr><td width='100' colspan='3'>
<table border='0' cellspacing='0' cellpadding='0' ><tr><td width='20' valign='top'><img src='image/shout-out2.png' width='20'></td><td bgcolor='#A9DA38' valign='middle' align='left' class='status'>$shout</td></tr></table>
</td></tr>";
echo"<tr><td width='100' valign='top'><strong>Nama</strong></td><td align='center' width='10' valign='top'>:</td><td width='200'>$dtlmbr[nama_member]</td></tr>";
if(empty($_SESSION[namamember]) and empty($_SESSION[passmember])){
echo""; }
else{
echo"<tr><td width='100' valign='top'><strong>Username</strong></td><td align='center' valign='top'>:</td><td>$dtlmbr[username]</td></tr>";
}
echo"<tr><td width='100' valign='top'><strong>Alamat</strong></td><td align='center' valign='top'>:</td><td>$dtlmbr[alamat_member]</td></tr>";
echo"<tr><td width='100' valign='top'><strong>Tanggal Lahir</strong></td><td align='center' valign='top'>:</td><td>$dtlmbr[tanggal_lahir]</td></tr>";
echo"<tr><td width='100' valign='top'><strong>Hobi</strong></td><td align='center' valign='top'>:</td><td>$dtlmbr[hobi_member]</td></tr>";
echo"<tr><td width='100' valign='top'><strong>Agama & Religi</strong></td><td align='center' valign='top'>:</td><td>$dtlmbr[agama_member]</td></tr>";
echo"<tr><td width='100' valign='top'><strong>Email</strong></td><td align='center' valign='top'>:</td><td>$dtlmbr[email_member]</td></tr>";
echo"<tr><td width='100' valign='top'><strong>Musik</strong></td><td align='center' valign='top'>:</td><td>$dtlmbr[musik_member]</td></tr>";
echo"<tr><td width='100' valign='top'><strong>Buku Favorit</strong></td><td align='center' valign='top'>:</td><td>$dtlmbr[buku_favorit]</td></tr>";
echo"<tr><td width='100' valign='top'><strong>Film Favorit</strong></td><td align='center' valign='top'>:</td><td>$dtlmbr[film_favorit]</td></tr>";
echo"<tr><td width='100' valign='top'><strong>Pekerjaan</strong></td><td align='center' valign='top'>:</td><td>$dtlmbr[pekerjaan_member]</td></tr>";
echo"<tr><td width='100' valign='top'><strong>Tempat Kerja</strong></td><td align='center' valign='top'>:</td><td>$dtlmbr[tempat_kerja_member]</td></tr>";
echo"<tr><td width='100' valign='top'><strong>Tentang si Doi</strong></td><td align='center' valign='top'>:</td><td>$dtlmbr[about_member]</td></tr>";
echo"</table></td></tr>";
echo"</table>";
}

//Koleksi Foto.......
  $p      = new Paging;
  $batasan  = 5	;
  $posisi = $p->cariPosisi($batas);
  $idfoto=substr("$_GET[id]",0,2);
  $foto = mysql_query("select count(koleksi_foto.id_foto) as jml from koleksi_foto WHERE id_member='$idfoto'");
  $k = mysql_fetch_array($foto); 
  
  echo "<span class=judulberita><b>$k[jml]</b> Koleksi Foto Untuk Member Ini</span><br />";
  $tmpl_foto = mysql_query("SELECT * FROM koleksi_foto WHERE id_member='$idfoto' order by RAND() LIMIT $posisi,$batasan");
	$jml = mysql_num_rows($tmpl_foto);
  if ($jml > 0){
  echo"<link rel='stylesheet' type='text/css' href='css/jquery.lightbox-0.5.css' />
<script type='text/javascript' src='js/jquery.lightbox-0.5.pack.js'></script>
<script type='text/javascript' src='js/script-lightbox.js'></script>";
  	$i=0;
	$kolom = 5;
  echo"<table border='0' style='border: 1pt ridge #A3D331;' width='100%'>";
  echo"<tr>";
    while ($s = mysql_fetch_array($tmpl_foto)){
	$id_member=$s[id_member];
	  if ($i >= $kolom){
    echo "</tr><tr>";
      $i = 0;
  }
  $i++;
	echo"<td align='left' valign='middle'><div class='pic'><a href='koleksi-foto-member/$s[foto_besar]' rel='lightbox'><img src='koleksi-foto-member/$s[foto_kecil]' width='80' class='image'></a></div><br>";
	}
	echo"</td></tr></table>";
	if($k[jml] >= 5){
	echo"<table width='100%' border='0' style='border: 1pt ridge #A3D331;' cellspacing='0'><tr><td align='center' valign='middle' bgcolor='#BDEA5B'><a href='koleksi-foto-member-$id_member.html'>Lihat Koleksi Foto Yang Lainnya</a></td></tr></table>
	<br>";
	} 
	else {
 echo"<table border='0' style='border: 1pt ridge #A3D331;' width='100%'>";
	$seleksi=mysql_query("select * from member where username='$_SESSION[namamember]'");
	while($pilih=mysql_fetch_array($seleksi)){
	$id_seleksi=$pilih[id_member];
	}
		if($id_seleksi==$idfoto){
	echo"<table><tr><td>Koleksi Foto Anda Masih Sedikit<br>Upload Foto Untuk Koleksi Foto Anda Lagi???<br>";
	echo"<form method='post' action='upload-koleksi-foto.html' 'enctype='multipart/form-data'>";
	echo"<strong>Cari Foto :</strong> <input type='file' class='textfiledform' name='foto' size='40' id='foto'><br>
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type='submit' value='Upload Foto' class='textfiledform'></td><input type='hidden' value='$username' name='username'></form>
	</td></tr></table><br>";
	} else {
		echo"<table width='100%' border='0' style='border: 1pt ridge #A3D331;' cellspacing='0'><tr><td align='center' valign='middle' bgcolor='#BDEA5B'><a href='koleksi-foto-member-$id_member.html'>Lihat Koleksi Foto Yang Lainnya</a></td></tr></table>
	<br>";
	}
	}
	} else {
  echo"<table border='0' style='border: 1pt ridge #A3D331;' width='100%'>";
	$seleksi=mysql_query("select * from member where username='$_SESSION[namamember]'");
	while($pilih=mysql_fetch_array($seleksi)){
	$id_seleksi=$pilih[id_member];
	}
	
	//member lain dalam keadaan login
		if($id_seleksi==$idfoto){
	echo"<tr><td>Koleksi Foto Masih Kosong.<br>Upload Foto Untuk Koleksi Foto Anda???<br>";
	echo"<form method='post' action='upload-koleksi-foto.html' 'enctype='multipart/form-data'>";
	echo"<strong>Cari Foto :</strong> <input type='file' class='textfiledform' name='foto' size='40' id='foto'><br>
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type='submit' value='Upload Foto' class='textfiledform'></td><input type='hidden' value='$username' name='username'></form>
	</td></tr>";
	}
	else{
	echo"<tr><td>Koleksi Foto Masih Kosong.<br>";
	}
	
		 		  
	echo"</table><br>";
	}

// Hitung jumlah komentar
  $p      = new Paging;
  $batas  = 5;
  $posisi = $p->cariPosisi($batas);
  $idnya=substr("$_GET[id]",0,2);
  $komentar = mysql_query("select count(komentar_member.id_komentar) as jml from komentar_member WHERE id_member='$idnya'");
  $k = mysql_fetch_array($komentar); 
  echo "<span class=judulberita><b>$k[jml]</b> Komentar untuk Member ini</span><br />";


  // Komentar berita
  $sql = mysql_query("SELECT * FROM komentar_member WHERE id_member='$idnya' order by id_komentar DESC LIMIT $posisi,$batas");
	$jml = mysql_num_rows($sql);
  // Apabila sudah ada komentar, tampilkan 
  if ($jml > 0){
  echo"<a name='komentar' id='komentar'></a><table border='0' style='border: 1pt ridge #A3D331;' width='100%'>";
    while ($s = mysql_fetch_array($sql)){
	$id_member=$s[id_pengirim];
      $tanggal = tgl_indo($s[tgl]);
      // Apabila ada link website diisi, tampilkan dalam bentuk link   
	
        echo "<tr><td height='20' bgcolor='#BDEA5B' colspan='2'><a href=member-everydaylikesunday-2009$s[id_pengirim]-9002.html>$s[nama_komentar]</a> | <span class='tanggalberita'>$tanggal - $s[jam_komentar] WIB - <font color='green'>$s[ip_pengirim]</font></span></td></tr>";  

      $isian=nl2br($s[isi_komentar]); // membuat paragraf pada isi komentar
	  //seleksi
	  $id_look = $_GET[id];
	  $seleksi=mysql_query("select * from member where username='$_SESSION[namamember]'");
	while($pilih=mysql_fetch_array($seleksi)){
	$id_seleksi=$pilih[id_member];
	}
	//seleksi
	$twt=mysql_query("select * from komentar_member where id_member='$id_seleksi'");
	while($pltwt=mysql_fetch_array($twt)){
	$id_tweet=$pltwt[id_member];
	}
	
	  if($id_look == $id_seleksi){
	  $delete="<a href='hapus-komentar-member-$s[id_komentar].html'>Delete</a>";
	  }
	  else if($id_tweet==$id_member){
	  $delete="<a href='hapus-komentar-member-$s[id_komentar].html'>Delete</a>";
	  }
	  else {
	  $delete="";
	  }
	    echo "<tr><td valign='top'>$isian<br></td><td width='50' valign='top'><a href=member-everydaylikesunday-2009$s[id_pengirim]-9002.html><img src='member/$s[foto_pengirim]' width='45' class='image'></a><br>$delete</td></tr>";	 	
    }
	echo"</table>";
	  $jmldata     = mysql_num_rows(mysql_query("SELECT * FROM komentar_member where id_member='$_GET[id]'"));
  $jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
  $linkHalaman = $p->navHalaman2($_GET[halaman], $jmlhalaman);

  echo "<table align='center'><tr><td align='center'>$linkHalaman </td></tr></table><br /><br />";
  }
  else {
  echo"<table border='0' style='border: 1pt ridge #A3D331;' width='100%'>";
	echo"<tr><td>Komentar Masih Kosong</td></tr>";	 		  
	echo"</table><br>";
	
	//Adsense disini..............
  }
  //Autentikasi pemberian Komentar
  if(empty($_SESSION[namamember]) and empty($_SESSION[passmember])){
    echo "<span class='rightbartitle'><b>Beri Komentar Member Ini :</b></span><br>";
    echo"<table width=100% border='0' style='border: 1pt ridge #A3D331;'><tr><td>Anda Belum Login!!!<br>Belum Daftar??? Klik <a href='register-member-els.html'>REGISTER</a></td></tr></table>";
		} else{
  // Form komentar
  echo "<span class='rightbartitle'><b>Beri Komentar Member Ini :</b></span>
        <table width=100% border='0' style='border: 1pt ridge #A3D331;'>
        <form action='simpan-komentar-member.html' method=POST onSubmit=\"return validasi(this)\">";
		  $query_member_komentar=mysql_query("select * from member where username='$_SESSION[username]'");
  while($frmkmntr=mysql_fetch_array($query_member_komentar)){
  $nama_member=$frmkmntr[nama_member];
  $foto_pengirim=$frmkmntr[foto_kecil];
  $id_pengirim=$frmkmntr[id_member];
 echo"<input type='hidden' name='foto_pengirim' value='$foto_pengirim'>";
 echo"<input type='hidden' name='id_pengirim' value='$id_pengirim'>";
  }
        echo"<input type=hidden name=id_member value=$idnya>
        <input type=hidden name=id value=$_GET[id]>
        <tr><td>Nama</td><td> : </td><td><select class='textfiledform' name=nama_komentar><option>$nama_member</option></select></td></tr>
        <tr><td valign=top>Komentar</td><td valign='top'> : </td><td><textarea name='isi_komentar' style='width: 380px; height: 70px;'  class='textfiledform'></textarea></td></tr>
        <tr><td>&nbsp;</td><td></td><td><img src='captcha.php'></td></tr>
        <tr><td>&nbsp;</td><td></td><td>(Masukkan 6 kode diatas)<br /><input type=text name=kode size=6 class='textfiledform'><br /></td></tr>
        <tr><td>&nbsp;</td><td></td><td><input type=submit name=submit value=Kirim class='textfiledform'> <input type=reset name=submit value=Hapus class='textfiledform'></td></tr>
        </form></table><br />";
		}

 }
 
 
// MODUL BERITA PER KATEGORI.......
elseif ($_GET[module]=='detailkategori'){
  // Tampilkan nama kategori
  $sq = mysql_query("SELECT nama_kategori from kategori where id_kategori='$_GET[id]'");
  $n = mysql_fetch_array($sq);

  
  $p      = new Paging;
  $batas  = 7;
  $posisi = $p->cariPosisi($batas);
  
   	$sqll   = "SELECT * FROM berita WHERE id_kategori='$_GET[id]' 
            ORDER BY id_berita DESC";		
	$hasill = mysql_query($sqll);
	$jumlahh = mysql_num_rows($hasill);
  // Tampilkan daftar berita sesuai dengan kategori yang dipilih
 	$sql   = "SELECT * FROM berita WHERE id_kategori='$_GET[id]' 
            ORDER BY id_berita DESC LIMIT $posisi,$batas";		
	$hasil = mysql_query($sql);
	$jumlah = mysql_num_rows($hasil);
	echo "<span class=judul_head>Daftar Berita Dengan Kategori : <b>$n[nama_kategori]</b> Sebanyak <strong>$jumlahh</strong> Berita</span><br /><br />";
	// Apabila ditemukan berita dalam kategori
	if ($jumlah > 0){
   while($r=mysql_fetch_array($hasil)){
		$tgl = tgl_indo($r[tanggal]);
echo"<span class='judulberita'><a href='berita-$r[id_berita]-$r[judul_seo].html'>$r[judul]</a></span><br>";
echo"<span class='tanggalberita'>$tgl -|- $r[jam] WIB</span><br>";
 		// Apabila ada gambar dalam berita, tampilkan
    if ($r[gambar]!=''){
			echo "<span class=image><img src='foto_berita/small_$r[gambar]' width=75 border=0></span>";
		}
    // Tampilkan hanya sebagian isi berita
    // Tampilkan hanya sebagian isi berita
    $isi_berita = htmlentities(strip_tags($r[isi_berita])); // mengabaikan tag html
    $isi = substr($isi_berita,0,400); // ambil sebanyak 220 karakter
    $isi = substr($isi_berita,0,strrpos($isi," ")); // potong per spasi kalimat

    echo "$isi ... <a href='berita-$r[id_berita]-$r[judul_seo].html'>Baca Selengkapnya</a> (<b>$t[jumlah] komentar</b>)
          <br /><hr color=#e0cb91 noshade=noshade />";
	 }
	
  $jmldata     = mysql_num_rows(mysql_query("SELECT * FROM berita WHERE id_kategori='$_GET[id]'"));
  $jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
  $linkHalaman = $p->navHalaman2($_GET[halaman], $jmlhalaman);

    echo "<table align='center' width='100%'><tr><td align='center'>Jumlah Berita Untuk Kategori ini : <b>$jmldata Berita</b></td></tr></table><table align='center'><tr><td align='center'>$linkHalaman </td></tr></table><br /><br />";
  }
  else{
    echo "Belum ada berita pada kategori <b>$_GET[nama_kat]</b>";
  }
}


// MODUL LOGOUT.......
elseif ($_GET[module]=='logoutmember'){
$query=mysql_query("update member set status_member='offline' where username='$_SESSION[namamember]'") or die (mysql_error());
  session_start();
  session_destroy();
  echo "<center>Anda telah sukses keluar sistem <b>[LOGOUT]</b><br>Terima kasih atas kunjungan dan partisipasi Anda dalam website <strong>Everyday Like Sunday</strong>!!!<br>Regards <strong>Gede Suma Wijaya</strong> | ELS Developer</center>";
    echo "<meta http-equiv='refresh' content='3; url=home'>";
}


// MODUL HASIL PENCARIAN BERITA......
elseif ($_GET[module]=='hasilcari'){
  $p      = new Paging;
  $batas  = 10;
  $posisi = $p->cariPosisi($batas);
  echo "<span class='judulhome'><b>Hasil Pencarian Berita & Artikel</b></span><br />";
  // menghilangkan spasi di kiri dan kanannya
  $kata = trim($_POST[kata]);

  // pisahkan kata per kalimat lalu hitung jumlah kata
  $pisah_kata = explode(" ",$kata);
  $jml_katakan = (integer)count($pisah_kata);
  $jml_kata = $jml_katakan-1;

  $cari = "SELECT * FROM berita WHERE " ;
    for ($i=0; $i<=$jml_kata; $i++){
      $cari .= "isi_berita LIKE '%$pisah_kata[$i]%'";
      if ($i < $jml_kata ){
        $cari .= " OR ";
      }
    }
  $cari .= " ORDER BY id_berita DESC LIMIT 7";
  $hasil  = mysql_query($cari);
  $ketemu = mysql_num_rows($hasil);

  if ($ketemu > 0){
    echo "<p>Ditemukan <b>$ketemu</b> berita dengan kata <font style='text-decoration:underline;'><b>$kata</b></font> : </p>"; 
    while($t=mysql_fetch_array($hasil)){
  		echo "<span class=judulberita><a href=berita-$t[id_berita]-$t[judul_seo].html>$t[judul]</a></span><br />";
				echo"<span class='image'><img src='foto_berita/$t[gambar]' width='60'></span>";
      // Tampilkan hanya sebagian isi berita
	  	$isi_berita= htmlentities(strip_tags($t[isi_berita])); // mengabaikan tag html

      $isi = substr($isi_berita,0,400); // ambil sebanyak 150 karakter
      $isi = substr($isi_berita,0,strrpos($isi," ")); // potong per spasi kalimat

      echo "$isi ... <a href=berita-$t[id_berita]-$t[judul_seo].html>Selengkapnya</a>
            <br /><hr color=#e0cb91 noshade=noshade />";
    }      
				  $jmldata     = mysql_num_rows(mysql_query($cari));
  $jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
  $linkHalaman = $p->navHalaman2($_GET[halaman], $jmlhalaman);

  echo "<table align='center'><tr><td align='center'>$linkHalaman </td></tr></table><br /><br />";
  }
  else{
    echo "<br>Maaf...!!! Tidak ditemukan berita dengan kata <b>$kata</b><br>";
	echo "Silahkan cari artikel dengan keyword yang lainnya.<br>";
	echo "Atau cari di sini <strong>Other search engine</strong> : <a href='http://www.google.com' target='_blank'>Google</a> | <a href='http://www.bing.com' target='_blank'>Bing</a> | <a href='http://www.yahoo.com' target='_blank'>Yahoo</a>";
  }
}


// MODUL HASIL POLLING.........
elseif ($_GET[module]=='hasilpoling'){
   echo "<span class=judulhome><b>Hasil Poling Sementara</b></span><br />";

  $u=mysql_query("UPDATE poling SET rating=rating+1 WHERE id_poling='$_POST[pilihan]'");

  echo "<p align=justify>Terimakasih atas partisipasi Anda untuk mengikuti polling kami bulan ini. Tunggu polling-polling selanjutnya di website <a href='http://www.everydaylikesunday.co.cc' target='_blank'>Everyday Like Sunday</a> ini.<br /><br />
        Hasil poling saat ini untuk pertanyaan polling: </p><br />";
	$query_polling=mysql_query("select * from pertanyaan_polling where aktif='Y'");
	while($tnypoll=mysql_fetch_array($query_polling)){
  echo"<span class='judulberita'>$tnypoll[pertanyaan_polling]</span>";
  }
  echo "<table width=100% border='0' style='border: 1pt ridge #A3D331;padding: 10px;'>";

  $jml=mysql_query("SELECT SUM(rating) as jml_vote FROM poling WHERE aktif='Y'");
  $j=mysql_fetch_array($jml);
  
  $jml_vote=$j[jml_vote];
  
  $sql=mysql_query("SELECT * FROM poling WHERE aktif='Y'");
  
  while ($s=mysql_fetch_array($sql)){
  	
  	$prosentase = sprintf("%2.1f",(($s[rating]/$jml_vote)*100));
  	$gbr_vote   = $prosentase * 2;

    echo "<tr><td width=150>&raquo; $s[pilihan] ($s[rating]) </td><td> 
          <img src=image/blue.jpg width=$gbr_vote height=18 border=0> $prosentase % 
          </td></tr>";  
  }
  echo "</table>
        <p>Jumlah Voting Sampai Saat ini : <b>$jml_vote vote</b></p>";
}


//MODUL GALLERY.........
elseif ($_GET[module]=='galleryfoto'){
  echo"<link rel='stylesheet' type='text/css' href='css/jquery.lightbox-0.5.css' />
<script type='text/javascript' src='js/jquery.lightbox-0.5.pack.js'></script>
<script type='text/javascript' src='js/script-lightbox.js'></script>";
echo"<span class='judulhome'>Gallery Everyday Like Sunday</span>";
echo"<table border='0' cellspacing='0' cellpadding='0'>";
echo"<tr><td>Inilah tampang-tampang para penghuni dan keluarga besar <a href='http://www.everydaylikesunday.co.cc' target='_blank'>Everyday Like Sunday 2009</a>. Cupu, Jadul, Aneh, Koplar, Narsis, dan lain-lain semua jadi satu di gallery ini. Kenangan selama menuntut ilmu di <a href='http://www.smkn1dps.sch.id' target='_blank'>SMKN 1 Denpasar</a> tak akan pernah terlupakan sampai kapanpun. Suasana kekeluargaan saat manggang, tamasya bersama dan ujian ngelawar, akan menjadi suatu momen dan cerita yang indah untuk kita semua. Semangat Gotong Royong saat menempuh Ujian Nasional (:D hihihihiii...ketauan kompak`nya pas ujian) patut dibudayakan ( :D hahahahaa....). So, enjoy it`s gallery.</td></tr>";
echo"</table>";
  $p      = new Paging;
  $batas  = 32;
  $posisi = $p->cariPosisi($batas);
$query_gallery=mysql_query("select * from gallery order by id_gallery DESC LIMIT $posisi,$batas");
echo"<table align='center' width='500' border='0'>";
$i=0;
$kolom = 4;
while($glri=mysql_fetch_array($query_gallery)){
  if ($i >= $kolom){
    echo "</tr><tr>";
      $i = 0;
  }
  $i++;
  echo "<td align='center' width='130'><div class='pic'><br>
  <a href='gallery/$glri[foto_besar]' rel='lightbox'><img src='gallery/$glri[foto_kecil]' border='1' width='110'>
    <table cellspacing='0' cellpadding='0' border='0'><tr><td width='120' align='center' height='50' valign='top'>$glri[title]</td></tr></table></a></div></td>";
}
echo"</table>";
  $jmldata     = mysql_num_rows(mysql_query("SELECT * FROM gallery"));
  $jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
  $linkHalaman = $p->navHalaman2($_GET[halaman], $jmlhalaman);

  echo "<table align='center'><tr><td align='center'>$linkHalaman </td></tr></table><br /><br />";
}


//MODUL FORUM.........
elseif ($_GET[module]=='forumels'){
echo"<span class='judulhome'>Forum Everyday Like Sunday</span><br>";
echo"Forum sebagai media sharing dan berbagi, kini telah hadir di website ini. Keluarkan semua masalahmu disini, siapa tau teman yang lainnya bisa membantu. Gak usah malu, ragu, ataupun takut karena kita adalah satu kesatuan yang utuh dan kompak :D. Dengan membahasnya secara bersama, kita akan bisa mencari jalan keluarnya untuk kamu. OK...enjoy it on <a href='http://www.everydaylikesunday.co.cc' target='_blank'>Everyday Like Sunday</a><br><br>";

  $p      = new Paging;
  $batas  = 10;
  $posisi = $p->cariPosisi($batas);
$query_forum=mysql_query("select * from topik_forum order by id_topik desc limit $posisi,$batas");


while($row=mysql_fetch_array($query_forum)){
$id_topik=$row["0"];
$get_num_posts = mysql_query("select count(id_post) from topik_post where id_topik = $id_topik");
$num_posts = mysql_result($get_num_posts,0,'count(id_post)');
if(($no % 2)==0){
$warna="#CFCFCF";
} else { 
$warna="#CCCCCC";
}
echo "<span class='judulberita'><b><a href='lihat-topik-everydaylikesunday-$row[id_topik].html'>$row[judul_topik]</a></b></span>";
echo "<table align=\"center\" width='500' style='border: 1pt ridge #A3D331;' cellpadding='0' cellspacing='0' border='0'>";
echo "<tr><td width='30'></td><td width='520' height='80' valign='top' align='left'>";
echo"<br><b>$row[judul_topik]</b><br>Posted on : $row[jam] | $row[tanggal]<br>Oleh : <b>$row[pengirim]</b></td><td width='70' align='center' valign='top' bgcolor='#8AC923'><br><b>$num_posts </b>Post<br><br><br><a href='lihat-topik-everydaylikesunday-$row[id_topik].html'><div class='button-forum'>View</div></a></td></tr>";	
echo "</table><br>";
}
//Autentikasi pemberian Komentar Forum
  if(empty($_SESSION[namamember]) and empty($_SESSION[passmember])){
    echo "<span class='rightbartitle'><b>Posting Sesuatu di Forum Ini :</b></span><br>";
    echo"<table width=100% border='0' style='border: 1pt ridge #A3D331;'><tr><td>Anda Belum Login!!!<br>Belum Daftar??? Klik <a href='register-member-els.html'>REGISTER</a></td></tr></table>";
		} else{
  // Form komentar
  echo "<span class='rightbartitle'><b>Posting Sesuatu di Forum Ini :</b></span>
        <table width=100% border='0' style='border: 1pt ridge #A3D331;'>
        <form action='simpan-topik-baru.html' method=POST onSubmit=\"return validasi(this)\">";
		  $query_member_komentar=mysql_query("select * from member where username='$_SESSION[username]'");
  while($frmkmntr=mysql_fetch_array($query_member_komentar)){
  $nama_member=$frmkmntr[nama_member];
  $foto_pengirim=$frmkmntr[foto_kecil];
  $id_pengirim=$frmkmntr[id_member];
  echo"<input type='hidden' value='$id_topik' name='id_topik'>";
 echo"<input type='hidden' name='foto_pengirim' value='$foto_pengirim'>";
 echo"<input type='hidden' name='nama_member' value='$nama_member'>";
 echo"<input type='hidden' name='id_pengirim' value='$id_pengirim'>";
  }
        echo"<input type=hidden name=id_member value=$idnya>
        <input type=hidden name=id value=$_GET[id]>
        <tr><td>Nama</td><td> : </td><td><select class='textfiledform' name=nama_komentar><option>$nama_member</option></select></td></tr>
		<tr><td valign=top>Judul</td><td valign='top'> : </td><td><input type='text' name='judul_komentar' style='width: 380px;'  class='textfiledform'></td></tr>
        <tr><td valign=top>Komentar</td><td valign='top'> : </td><td><textarea name='isi_komentar' style='width: 380px; height: 70px;'  class='textfiledform'></textarea></td></tr>
        <tr><td>&nbsp;</td><td></td><td><img src='captcha.php'></td></tr>
        <tr><td>&nbsp;</td><td></td><td>(Masukkan 6 kode diatas)<br /><input type=text name=kode size=6 class='textfiledform'><br /></td></tr>
        <tr><td>&nbsp;</td><td></td><td><input type=submit name=submit value=Kirim class='textfiledform'> <input type=reset name=submit value=Hapus class='textfiledform'></td></tr>
        </form></table><br />";
		}
	$jmldata     = mysql_num_rows(mysql_query("select * from topik_forum"));
  $jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
  $linkHalaman = $p->navHalaman2($_GET[halaman], $jmlhalaman);

  echo "<table align='center'><tr><td align='center'>$linkHalaman </td></tr></table><br /><br />";

}


//MODUL DETAIL TOPIK FORUM........
elseif ($_GET[module]=='detailtopik'){
  $p      = new Paging;
  $batas  = 10;
  $posisi = $p->cariPosisi($batas);
$query=mysql_query("select * from topik_post where id_topik='$_GET[id]' and status='' order by id_post ASC limit $posisi,$batas");
$query7=mysql_query("select * from topik_forum where id_topik='$_GET[id]'");
$query_judul=mysql_query("select * from topik_post where id_topik='$_GET[id]' and status='thread'");

while($row7=mysql_fetch_array($query7)){
$id_topik=$row["id_topik"];
$id_member=$row7["id_member"];
$judul=$row7["judul_topik"];
$foto=$row7["foto_pengirim"];
$pengirim=$row7["pengirim"];
$jam=$row7["jam"];
$tanggal=$row7["tanggal"];
}
while($row=mysql_fetch_array($query_judul)){
$posting=$row["posting"];
}
//Thread Posting.....
echo"<span class='judulberita'>$judul</span><br>";
echo"<span><a href='member-everydaylikesunday-2009$id_member-9002.html'><img src='member/$foto' class='image' width='55'></a><strong>$pengirim</strong> | $jam | $tanggal | Status : <strong><em>Thread</em></strong><br>$posting</span><br><br><br>";
//Reply Posting....
while($row=mysql_fetch_array($query)){
echo"<span class='judulberita'><a href='member-everydaylikesunday-2009$row[id_member]-9002.html'>$row[pengirim_posting]</a> | <font size='1'>$row[jam_posting]-$row[tanggal_posting] | <em>$row[ip_pengirim]</em></font></span><br>";
echo"<table width=100% border='0' style='border: 1pt ridge #A3D331;'><tr class='reply-forum'><td><a href='member-everydaylikesunday-2009$row[id_member]-9002.html'><img src='member/$row[foto_pengirim]' class='image-kanan' width='50'></a>$row[posting]</td></tr></table><br>";
}
 //Autentikasi pemberian Komentar Forum
  if(empty($_SESSION[namamember]) and empty($_SESSION[passmember])){
    echo "<span class='rightbartitle'><b>Berikan Balasan Di Topik Ini :</b></span><br>";
    echo"<table width=100% border='0' style='border: 1pt ridge #A3D331;'><tr><td>Anda Belum Login!!!<br>Belum Daftar??? Klik <a href='register-member-els.html'>REGISTER</a></td></tr></table>";
		} else{
  // Form komentar
  echo "<span class='rightbartitle'><b>Berikan Balasan Di Topik Ini :</b></span>
        <table width=100% border='0' style='border: 1pt ridge #A3D331;'>
        <form action='simpan-komentar-forum.html' method=POST onSubmit=\"return validasi(this)\">";
		  $query_member_komentar=mysql_query("select * from member where username='$_SESSION[username]'");
  while($frmkmntr=mysql_fetch_array($query_member_komentar)){
  $nama_member=$frmkmntr[nama_member];
  $foto_pengirim=$frmkmntr[foto_kecil];
  $id_pengirim=$frmkmntr[id_member];
  echo"<input type='hidden' value='$id_topik' name='id_topik'>";
 echo"<input type='hidden' name='foto_pengirim' value='$foto_pengirim'>";
 echo"<input type='hidden' name='id_pengirim' value='$id_pengirim'>";
  }
        echo"<input type=hidden name=id_member value=$idnya>
        <input type=hidden name=id value=$_GET[id]>
        <tr><td>Nama</td><td> : </td><td><select class='textfiledform' name=nama_komentar><option>$nama_member</option></select></td></tr>
        <tr><td valign=top>Komentar</td><td valign='top'> : </td><td><textarea name='isi_komentar' maxlength='100' style='width: 380px; height: 70px;'  class='textfiledform'></textarea></td></tr>
        <tr><td>&nbsp;</td><td></td><td><img src='captcha.php'></td></tr>
        <tr><td>&nbsp;</td><td></td><td>(Masukkan 6 kode diatas)<br /><input type=text name=kode size=6 class='textfiledform'><br /></td></tr>
        <tr><td>&nbsp;</td><td></td><td><input type=submit name=submit value=Kirim class='textfiledform'> <input type=reset name=submit value=Hapus class='textfiledform'></td></tr>
        </form></table><br />";
		}

	$jmldata     = mysql_num_rows(mysql_query("select * from topik_post where id_topik='$_GET[id]' and status=''"));
  $jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
  $linkHalaman = $p->navHalaman2($_GET[halaman], $jmlhalaman);

  echo "<table align='center'><tr><td align='center'>$linkHalaman </td></tr></table><br /><br />";
}

//MODUL SIMPAN KOMENTAR FORUM.....
elseif ($_GET[module]=='simpankomentarforum'){
session_start();
$lindungi_nama=strip_tags($_REQUEST[nama_komentar]);
$lindungi_pesan=strip_tags($_REQUEST[isi_komentar],"<br />");
$ip = $_SERVER['REMOTE_ADDR'];

	if(!empty($_POST['kode'])){
		if($_POST['kode']==$_SESSION['captcha_session']){
    $sql = mysql_query("INSERT INTO topik_post(id_topik,id_member,posting,pengirim_posting,foto_pengirim,jam_posting,tanggal_posting,ip_pengirim) 
                        VALUES('$_POST[id]','$_POST[id_pengirim]','$lindungi_pesan','$_POST[nama_komentar]','$_POST[foto_pengirim]','$jam_sekarang','$tgl_sekarang','$ip')");

$noti=mysql_query("select * from topik_post where id_topik='$_POST[id]' and id_member!='$_POST[id_pengirim]'");
while($nt=mysql_fetch_array($noti)){
$id_semua=$nt[id_member];
 $sqll = mysql_query("INSERT INTO noti(id_member_milik,id_member_terkait,notifications,id_pengirim,nama_pengirim,status) VALUES('$_POST[id_pengirim]','$id_semua','<a href=member-everydaylikesunday-2009$_POST[id_pengirim]-9002.html>$lindungi_nama</a>  membalas postingan anda di <a href=lihat-topik-everydaylikesunday-$_POST[id].html>Topik forum ini</a>','$_POST[id_pengirim]','$lindungi_nama','not')");
}

    echo "<meta http-equiv='refresh' content='0; url=lihat-topik-everydaylikesunday-$_POST[id].html'>";
		}else{
			echo "Kode yang Anda masukkan tidak cocok<br />
			      <a href=javascript:history.go(-1)><b>Ulangi Lagi</b></a>";

		}
	}else{
		echo "Anda belum memasukkan kode<br />
  	      <a href=javascript:history.go(-1)><b>Ulangi Lagi</b></a>";
	}
}


//MODUL SIMPAN KOMENTAR FORUM.....
elseif ($_GET[module]=='simpantopikbaru'){
session_start();
$lindungi_pesan=strip_tags($_REQUEST[isi_komentar],"<br />");
$ip = $_SERVER['REMOTE_ADDR'];

	if((!$_POST[judul_komentar])){
?>
		<script>alert('TOPIK GAGAL DIKIRIM, HARAP DIISI SEMUANYA!!!!.');window.location.href='forum-everydaylikesunday.html';</script>
<?php
} else {
$query2=mysql_query("insert into topik_forum (id_member, judul_topik, pengirim, foto_pengirim, jam, tanggal) values ('$_POST[id_pengirim]', '$_POST[judul_komentar]', '$_POST[nama_member]', '$_POST[foto_pengirim]', '$jam_sekarang', '$tgl_sekarang')") or die (mysql_error());

$topic_id = mysql_insert_id();

$query=mysql_query("insert into topik_post (id_topik, id_member, posting, pengirim_posting, foto_pengirim, jam_posting, tanggal_posting, status) values ('$topic_id', '$_POST[id_pengirim]', '$_POST[isi_komentar]', '$_POST[nama_member]', '$_POST[foto_pengirim]', '$jam_sekarang', '$tgl_sekarang', 'thread')") or die (mysql_error());
 echo "<meta http-equiv='refresh' content='0; url=lihat-topik-everydaylikesunday-$topic_id.html'>";
 }
}

//MODUL GUESTBOOK.....
elseif ($_GET[module]=='guestbookels'){
echo"<span class='judulhome'>Guestbook Everyday Like Sunday</span><br>";
echo"<span>Silahkan tinggalkan kesan, pesan, kritik bahkan saran untuk kemajuan website <strong>Everyday Like Sunday</strong> ini. Dengan etika yang baik dan benar, dan yang terpenting <strong>ANTI SPAM</strong>. Anda tentunya juga benci dengan <strong>SPAM</strong> bukan??? Jika anda mengirimkan <strong>SPAM</strong>, selamanya anda tidak akan diterima di berbagai komunitas internet. Mari bersama-sama menciptakan, budaya berkomentar tanpa <strong>SPAM</strong>. OK brotha....!!!!</span><br><br>";
echo"
<script>
function textCounter(field, countfield, maxlimit) {
              if (field.value.length > maxlimit) {
              field.value = field.value.substring(0, maxlimit);
              } else {
              countfield.value = maxlimit - field.value.length;
              }
}
</script>";
echo "<span class='rightbartitle'><b>Guestbook | Contact Us</b></span>
        <table width=100% border='0' style='border: 1pt ridge #A3D331;'>
        <form action='simpan-guestbook.html' name='form1' method=POST onSubmit=\"return validasi(this)\">
        <tr><td>Nama</td><td> : </td><td><input type=text name=nama_komentar size=40 class='textfiledform'></td></tr>
        <tr><td>Email</td><td> : </td><td><input type=text name=email size=40 class='textfiledform'></td></tr>
        <tr><td valign=top>Komentar</td><td valign='top'> : </td><td><textarea name='isi_komentar' style='width: 330px; height: 100px;'  class='textfiledform' onKeyDown='textCounter(document.form1.isi_komentar,document.form1.inputcount,500);' onKeyUp='textCounter(document.form1.isi_komentar, document.form1.inputcount,500);'></textarea></td></tr>
        <tr><td>&nbsp;</td><td></td><td><img src='captcha.php'></td></tr>
        <tr><td>&nbsp;</td><td></td><td>(Masukkan 6 kode diatas)<br /><input type=text name=kode size=6 class='textfiledform'>";
?>
&nbsp;&nbsp;<input readonly type="text" name="inputcount" size="5" maxlength="4" value="" class="textfiledform">
      <script language="JavaScript">
        document.form1.inputcount.value = (500 - document.form1.isi_komentar.value.length);
          </script>
<?php
		echo"<br /></td></tr>
        <tr><td>&nbsp;</td><td></td><td><input type=submit name=submit value=Kirim class='textfiledform'> <input type=reset name=submit value=Hapus class='textfiledform'></td></tr>
        </form></table><br />";
		
		//tampilkan isi guestbook
	$p      = new Paging;
  $batas  = 10;
  $posisi = $p->cariPosisi($batas);
  echo "<span class='rightbartitle'><b>Komentar Pengunjung</b></span>";
  echo"<table border='0' style='border: 1pt ridge #A3D331;' width='100%' cellspacing='0' cellpadding='0'>";
  $query_guestbook=mysql_query("select * from guestbook order by id_guestbook DESC LIMIT $posisi,$batas");
    while ($s = mysql_fetch_array($query_guestbook)){
      $tanggal = tgl_indo($s[tanggal]);
      // Apabila ada link website diisi, tampilkan dalam bentuk link   
		echo"<tr><td colspan='5' height='10'></td></tr>";		  
        echo "<tr><td width='10'></td><td>Nama</td><td width='10' valign='top' align='center'>:</td><td> <strong>$s[nama_komentar]</strong> | <span class='tanggalberita'>$tanggal - $s[jam] WIB - <font color='red'>$s[ip_komentar]</font></span></td><td width='10'></tr>";  
echo "<tr><td width='10'></td><td width='70' valign='top'>Email</td><td width='10' valign='top' align='center'>:</td><td valign='top'><em><font color='red'><strong>$s[email_komentar]</strong></font></em><br></td><td width='10'></tr>";
      $isian=nl2br($s[isi_komentar]); // membuat paragraf pada isi komentar
	    echo "<tr><td width='10'></td><td width='70' valign='top'>Komentar</td><td width='10' valign='top' align='center'>:</td><td valign='top'>$isian<br><br></td><td width='10'></tr>";	 
		echo"<tr><td colspan='5' bgcolor='#A3D331' height='2'></td></tr>";		  
    }
	echo"</table>";
	  $jmldata     = mysql_num_rows(mysql_query("SELECT * FROM guestbook"));
  $jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
  $linkHalaman = $p->navHalaman2($_GET[halaman], $jmlhalaman);

  echo "<table align='center'><tr><td align='center'>$linkHalaman </td></tr></table><br /><br />";

}

//MODUL SIMPAN GUESTBOOK.....
elseif ($_GET[module]=='simpanguestbook'){
session_start();
$lindungi_nama=strip_tags($_REQUEST[nama_komentar]);
$lindungi_email=strip_tags($_REQUEST[email]);
$lindungi_pesan=strip_tags($_REQUEST[isi_komentar],"<br />");
$ip = $_SERVER['REMOTE_ADDR'];

	if(!empty($_POST['kode'])){
		if($_POST['kode']==$_SESSION['captcha_session']){
    $sql = mysql_query("INSERT INTO guestbook(nama_komentar,email_komentar,isi_komentar,tanggal,jam,ip_komentar) 
                        VALUES('$lindungi_nama','$lindungi_email','$lindungi_pesan','$tgl_sekarang','$jam_sekarang','$ip')");
    echo "<meta http-equiv='refresh' content='0; url=guestbook-everydaylikesunday.html'>";
		}else{
			echo "Kode yang Anda masukkan tidak cocok<br />- No <strong>SPAM</strong><br />- No Kata-Kata Kasar<br>
			      <a href=javascript:history.go(-1)><b>Ulangi Lagi</b></a>";

		}
	}else{
		echo "Anda belum memasukkan kode Captcha.<br />- No <strong>SPAM</strong><br />- No Kata-Kata Kasar<br>- No Caci Maki<br>
  	      <a href=javascript:history.go(-1)><b>Ulangi Lagi</b></a>";
	}
}


//MODUL REGISTER MEMBER.............
elseif ($_GET[module]=='registermember'){
echo"<span class='judulhome'>Register Member On Everyday Like Sunday</span><br><br>";
echo"<span>Ayo gabung di website ini, dengan menjadi member di website <strong>Everyday Like Sunday</strong>. Bebas, gratis (siapa juga yang mau bayar :D) dan terbuka untuk siapa saja. Tapi tetep inget dengan aturan nie :<br>
<strong>&deg; No Spam.</strong><br>
<strong>&deg; No Virus.</strong><br>
OK...!!!! So, daftar langsung aja. Gampang kok.....!!!
</span><br><br>";
echo"<form method='post' action='input-member-baru.html 'enctype='multipart/form-data'>";
echo"<span class='judulberita'>Informasi Profil Member</span>";
echo"<table border='0' style='border: 1pt ridge #A3D331;' width='480px'>";
echo"<tr><td width='150px' align='left'>Nama Lengkap</td><td width='5px'>:</td><td><input type='text' name='nama_member' class='textfiledform' size='40'> *</td></tr>";
echo"<tr><td width='150px' align='left'>Alamat</td><td width='5px'>:</td><td><input type='text' name='alamat_member' class='textfiledform' size='40'> *</td></tr>";
echo"<tr><td width='150px' align='left'>Email</td><td width='5px'>:</td><td><input type='text' name='email_member' class='textfiledform' size='40'> *</td></tr>";
echo"<tr><td width='150px' align='left'>Agama</td><td width='5px'>:</td><td><input type='text' name='agama_member' class='textfiledform' size='40'> *</td></tr>";
echo"<tr><td width='150px' align='left'>Hobi & Kesenangan</td><td width='5px'>:</td><td><input type='text' name='hobi_member' class='textfiledform' size='40'> *</td></tr>";
echo"<tr><td width='150px' align='left'>Tanggal Lahir</td><td width='5px'>:</td><td><input type='text' name='tanggal_lahir' class='textfiledform' size='40'> *</td></tr>";
echo"<tr><td width='150px' align='left'>Aliran Musik</td><td width='5px'>:</td><td><input type='text' name='musik_member' class='textfiledform' size='40'> *</td></tr>";
echo"<tr><td width='150px' align='left'>Buku Favorit</td><td width='5px'>:</td><td><input type='text' name='buku_favorit' class='textfiledform' size='40'> *</td></tr>";
echo"<tr><td width='150px' align='left'>Film Favorit</td><td width='5px'>:</td><td><input type='text' name='film_favorit' class='textfiledform' size='40'> *</td></tr>";
echo"<tr><td width='150px' align='left'>Pekerjaan</td><td width='5px'>:</td><td><input type='text' name='pekerjaan_member' class='textfiledform' size='40'> *</td></tr>";
echo"<tr><td width='150px' align='left'>Tempat Kerja</td><td width='5px'>:</td><td><input type='text' name='tempat_kerja_member' class='textfiledform' size='40'> *</td></tr>";
echo"<tr><td width='150px' align='left' valign='top'>Tentang Diri Anda</td><td width='5px' valign='top'>:</td><td><textarea name='about' class='textfiledform' rows='4' cols='40'></textarea> *</td></tr>";
echo"<tr><td width='150px' align='left' valign='top'>Foto Profil</td><td width='5px' valign='top'>:</td><td><input type='file' class='textfiledform' name='foto' size='40' id='foto'> **</td></tr>";
echo"</table><br>";
echo"<span class='judulberita'>Autentikasi Login Member</span>";
echo"<table border='0' style='border: 1pt ridge #A3D331;' width='480px'>";
echo"<tr><td width='150px' align='left'>Username</td><td width='5px'>:</td><td><input type='text' name='username' class='textfiledform' size='40' maxlength='10'> ***</td></tr>";
echo"<tr><td width='150px' align='left'>Password</td><td width='5px'>:</td><td><input type='password' name='password' class='textfiledform' size='40'> *</td></tr>";
echo"<tr><td>&nbsp;</td><td></td><td><img src='captcha.php'></td></tr>
        <tr><td>&nbsp;</td><td></td><td>(Masukkan 6 kode diatas)<br /><input type=text name=kode size=6 class='textfiledform'> *<br /></td></tr>";
echo"<tr><td colspan='3'>* = Wajib diisi<br>** = Gambar dengan format JPEG, GIF, PNG<br>*** = Maksimal 10 karakter, tanpa spasi, hanya huruf dan angka</td></tr>";
echo"<tr><td width='150px' align='left'></td><td width='5px'></td><td><input type='submit' value='Daftar' class='textfiledform'>
&nbsp;&nbsp;&nbsp;<input type='reset' value='Batal' class='textfiledform'></td></tr>";
echo"</table>";
echo"</form>";

//Adsense disini..............
}


//MODUL GAGAL LOGIN..........
elseif ($_GET[module]=='gagallogin'){
  echo "<center>Username atau Password yang anda masukkan <strong>SALAH</strong>...!!!!<br>
  Masukkan Username atau Password yang <strong>BENAR</strong>....!!!!<br>
  Belum punya Account....???? <a href='register-member-els.html'>Daftar Disini.....
  </center>";
}


//MODUL TAMBAH MEMBER BARU.............
elseif ($_GET[module]=='insertmemberbaru'){
if(!empty($_POST[nama_member]) and !empty($_POST[alamat_member]) and !empty($_POST[email_member]) and !empty($_POST[agama_member]) and !empty($_POST[hobi_member]) and !empty($_POST[tanggal_lahir]) and !empty($_POST[musik_member]) and !empty($_POST[buku_favorit]) and !empty($_POST[film_favorit]) and !empty($_POST[pekerjaan_member]) and !empty($_POST[tempat_kerja_member]) and !empty($_POST[about]) and !empty($_POST[username]) and !empty($_POST[password]) and !empty($_POST[kode])){
function getExtension($str) {
$i = strrpos($str,".");
if (!$i) { return ""; }
$l = strlen($str) - $i;
$ext = substr($str,$i+1,$l);
return $ext;
}
$filename = stripslashes($_FILES['foto']['name']);
$extension = getExtension($filename);
$extension = strtolower($extension);
if (($extension != "jpg") && ($extension != "jpeg") && ($extension != "png"))
{
echo"Field gambar Foto Profil belum terisi.<br>Mohon Lengkapi Kembali!!!";
echo"<a href=javascript:history.go(-1)><b>Ulangi Lagi</b></a>";
}
else{
$kata=$_POST[username];
$idfoto=str_replace(" ","-","$kata");

        if(is_uploaded_file($_FILES['foto']['tmp_name'])){
          if (isset ($_FILES['foto'])){
              $imagename = stripslashes($_FILES['foto']['name']);
              $source = $_FILES['foto']['tmp_name'];
              $target = "member/".$imagename;
              move_uploaded_file($source, $target);
 
              $imagepath = $imagename;
              $save = "member/" . $idfoto.'.'.$extension; //This is the new file you saving
              $file = "member/" . $imagepath; //This is the original file
 
              list($width, $height) = getimagesize($file) ; 
 
              $modwidth = 160; 
 
              $diff = $width / $modwidth;
 
              $modheight = $height / $diff; 
              $tn = imagecreatetruecolor($modwidth, $modheight) ; 
              $image = imagecreatefromjpeg($file) ; 
              imagecopyresampled($tn, $image, 0, 0, 0, 0, $modwidth, $modheight, $width, $height) ; 
 
              imagejpeg($tn, $save, 100) ; 
 
              $save = "member/sml_" . $idfoto.'.'.$extension; //This is the new file you saving
              $file = "member/" . $imagepath; //This is the original file
 
              list($width, $height) = getimagesize($file) ; 
 
              $modwidth = 130; 
 
              $diff = $width / $modwidth;
 
              $modheight = $height / $diff; 
              $tn = imagecreatetruecolor($modwidth, $modheight) ; 
              $image = imagecreatefromjpeg($file) ; 
              imagecopyresampled($tn, $image, 0, 0, 0, 0, $modwidth, $modheight, $width, $height) ; 
 
              imagejpeg($tn, $save, 100) ; 
			  unlink("member/$imagename");
 
          }
		  $nama_lengkap=strip_tags($_REQUEST[nama_member]);
		  $alamat_member=strip_tags($_REQUEST[alamat_member]);
		  $email_member=strip_tags($_REQUEST[email_member]);
		  $agama_member=strip_tags($_REQUEST[agama_member]);
		  $hobi_member=strip_tags($_REQUEST[hobi_member]);
		  $tanggal_lahir=strip_tags($_REQUEST[tanggal_lahir]);
		  $musik_member=strip_tags($_REQUEST[musik_member]);
		  $buku_favorit=strip_tags($_REQUEST[buku_favorit]);
		  $film_favorit=strip_tags($_REQUEST[film_favorit]);
		  $pekerjaan_member=strip_tags($_REQUEST[pekerjaan_member]);
		  $tempat_kerja_member=strip_tags($_REQUEST[tempat_kerja_member]);
		  $about=strip_tags($_REQUEST[about]);
		  $username=strip_tags($_REQUEST[username]);
		  		$pass=md5($_POST[password]);
				
				if(!empty($_POST['kode'])){
		if($_POST['kode']==$_SESSION['captcha_session']){
		$query=mysql_query("insert into member (nama_member, alamat_member, email_member, agama_member, hobi_member, tanggal_lahir, password_visible, foto_kecil, foto_besar, musik_member, buku_favorit, film_favorit, pekerjaan_member, tempat_kerja_member, about_member, username, password) values ('$nama_lengkap', '$alamat_member', '$email_member', '$agama_member', '$hobi_member', '$tanggal_lahir', '$_POST[password]', 'sml_$idfoto.$extension', '$idfoto.$extension', '$musik_member', '$buku_favorit', '$film_favorit', '$pekerjaan_member', '$tempat_kerja_member', '$about', '$username', '$pass')") or die (mysql_error());
		$id_member_pental = mysql_insert_id();
    echo "<meta http-equiv='refresh' content='0; url=member-everydaylikesunday-2009$id_member_pental-9002.html'>";
        }
		}else{
			echo "Kode yang Anda masukkan tidak cocok<br />
			      <a href=javascript:history.go(-1)><b>Ulangi Lagi</b></a>";

		}
	}else{
		echo "Anda belum memasukkan kode<br />
  	      <a href=javascript:history.go(-1)><b>Ulangi Lagi</b></a>";
	}

		}
		} else {
		?>
		<script>alert('Data yang anda masukkan belum lengkap. Mohon Lengkapi Kembali.');window.location.href='register-member-els.html';</script>
		<?php
		}

}


//MODUL EDIT PROFIL MEMBER........
elseif ($_GET[module]=='editprofil'){
  echo"<table class='member-title' width='100%' height='20'><tr><td height='20'><a href=edit-profil-member.html>Edit Profil Member</a></td></tr></table><br>";
echo"<span>Edit informasi profilmu disini untuk isi profil yang tetap Up to Date. Kalo ada kesulitan, hubungi aja adminnya, cukup dengan ninggalin pesan di <a href='http://www4.shoutmix.com' target='_blank'>Shoutbox</a> yang udah di sediain. Tapi tetep inget dengan aturan nie :<br>
<strong>&deg; No Spam.</strong><br>
<strong>&deg; No Virus.</strong><br>
OK...!!!! So, langsung diisi aja tuh field-field form yang pengen di update!!!
</span><br><br>";
$query_edit=mysql_query("select * from member where username='$_SESSION[namamember]'");
while($edit=mysql_fetch_array($query_edit)){
$username=$edit[username];
echo"<form method='post' action='update-profil-member.html 'enctype='multipart/form-data'>";
echo"<span class='judulberita'>Informasi Profil Member</span>";
echo"<table border='0' style='border: 1pt ridge #A3D331;' width='480px'>";
echo"<tr><td width='150px' align='left'>Nama Lengkap</td><td width='5px'>:</td><td><input type='text' name='nama_member' class='textfiledform' size='40' value='$edit[nama_member]'></td></tr>";
echo"<tr><td width='150px' align='left'>Alamat</td><td width='5px'>:</td><td><input type='text' name='alamat_member' class='textfiledform' size='40' value='$edit[alamat_member]'></td></tr>";
echo"<tr><td width='150px' align='left'>Email</td><td width='5px'>:</td><td><input type='text' name='email_member' class='textfiledform' size='40' value='$edit[email_member]'></td></tr>";
echo"<tr><td width='150px' align='left'>Agama</td><td width='5px'>:</td><td><input type='text' name='agama_member' class='textfiledform' size='40' value='$edit[agama_member]'></td></tr>";
echo"<tr><td width='150px' align='left'>Hobi & Kesenangan</td><td width='5px'>:</td><td><input type='text' name='hobi_member' class='textfiledform' size='40' value='$edit[hobi_member]'></td></tr>";
echo"<tr><td width='150px' align='left'>Tanggal Lahir</td><td width='5px'>:</td><td><input type='text' name='tanggal_lahir' class='textfiledform' size='40' value='$edit[tanggal_lahir]'></td></tr>";
echo"<tr><td width='150px' align='left'>Aliran Musik</td><td width='5px'>:</td><td><input type='text' name='musik_member' class='textfiledform' size='40' value='$edit[musik_member]'></td></tr>";
echo"<tr><td width='150px' align='left'>Buku Favorit</td><td width='5px'>:</td><td><input type='text' name='buku_favorit' class='textfiledform' size='40' value='$edit[buku_favorit]'></td></tr>";
echo"<tr><td width='150px' align='left'>Film Favorit</td><td width='5px'>:</td><td><input type='text' name='film_favorit' class='textfiledform' size='40' value='$edit[film_favorit]'></td></tr>";
echo"<tr><td width='150px' align='left'>Pekerjaan</td><td width='5px'>:</td><td><input type='text' name='pekerjaan_member' class='textfiledform' size='40' value='$edit[pekerjaan_member]'></td></tr>";
echo"<tr><td width='150px' align='left'>Tempat Kerja</td><td width='5px'>:</td><td><input type='text' name='tempat_kerja_member' class='textfiledform' size='40' value='$edit[tempat_kerja_member]'></td></tr>";
echo"<tr><td width='150px' align='left' valign='top'>Tentang Diri Anda</td><td width='5px' valign='top'>:</td><td><textarea name='about' class='textfiledform' rows='4' cols='40'>$edit[about_member]</textarea></td></tr>";
echo"<tr><td>&nbsp;</td><td></td><td><img src='captcha.php'></td></tr>
<tr><td valign='bottom'>Kode Captcha</td><td valign='bottom'>:</td><td valign='middle'>(Masukkan 6 kode diatas)<br /><input type=text name=kode size=6 class='textfiledform'> *<br /></td></tr>";
echo"<tr><td width='150px' align='left'></td><td width='5px'></td><td><input type='submit' value='Update Profil' class='textfiledform'></td><input type='hidden' value='$username' name='username'></tr>";
echo"</table></form><br>";

$query_edit=mysql_query("select * from member where username='$_SESSION[namamember]'");
while($edit=mysql_fetch_array($query_edit)){
$username=$edit[username];
}
echo"<form method='post' action='update-foto-profil.html' 'enctype='multipart/form-data'>";
echo"<span class='judulberita'>Edit Foto Profil Member</span>";
echo"<table border='0' style='border: 1pt ridge #A3D331;' width='480px'>";
echo"<tr><td width='150px' align='left' valign='top'>Foto Profil</td><td width='5px' valign='top'>:</td><td><input type='file' class='textfiledform' name='foto' size='40' id='foto'><br>*) Jika foto tidak diganti, dikosongkan saja.</td></tr>";
echo"<tr><td>&nbsp;</td><td></td><td>Sesuai dengan kode pada Informasi Profil Member</td></tr>
<tr><td valign='bottom'>Kode Captcha</td><td valign='bottom'>:</td><td valign='middle'>(Masukkan 6 kode diatas)<br /><input type=text name=kode size=6 class='textfiledform'> *<br /></td></tr>";
echo"<tr><td width='150px' align='left'></td><td width='5px'></td><td><input type='submit' value='Upload Foto Profil' class='textfiledform'></td><input type='hidden' value='$username' name='username'></tr>";
echo"</table></form><br>";

$query_edit=mysql_query("select * from member where username='$_SESSION[namamember]'");
while($edit=mysql_fetch_array($query_edit)){
$username=$edit[username];
echo"<form method='post' action='update-password-member.html' 'enctype='multipart/form-data'>";
echo"<span class='judulberita'>Ganti Password Member</span>";
echo"<table border='0' style='border: 1pt ridge #A3D331;' width='480px'>";
echo"<tr><td width='150px' align='left' valign='top'>Username</td><td width='5px' valign='top'>:</td><td><select class='textfiledform'><option>$edit[username]</option></select> *) Username tidak dapat diganti.</td></tr>";
echo"<tr><td width='150px' align='left' valign='top'>Password Lama</td><td width='5px' valign='top'>:</td><td><input type='password' name='password_lama' class='textfiledform' size='40'></td></tr>";
echo"<tr><td width='150px' align='left' valign='top'>Password</td><td width='5px' valign='top'>:</td><td><input type='password' name='password' class='textfiledform' size='40'><br>*) Jika password tidak diubah, dikosongkan saja.</td></tr>";
echo"<tr><td>&nbsp;</td><td></td><td>Sesuai dengan kode pada Informasi Profil Member</td></tr>
<tr><td valign='bottom'>Kode Captcha</td><td valign='bottom'>:</td><td valign='middle'>(Masukkan 6 kode diatas)<br /><input type=text name='kode' size=6 class='textfiledform'> *<br /></td></tr>";
echo"<tr><td width='150px' align='left'></td><td width='5px'></td><td><input type='submit' value='Ganti Password' class='textfiledform'></td><input type='hidden' value='$username' name='username'></tr>";
echo"</table>";
echo"</form>";
}
}
//Adsense disini.......
}


//MODUL UPDATE PROFIL MEMBER.............
elseif ($_GET[module]=='updateprofil'){
if(!empty($_POST['kode'])){
if($_POST['kode']==$_SESSION['captcha_session']){
$profil=mysql_query("select * from member where username='$_SESSION[namamember]'");
while($prfl=mysql_fetch_array($profil)){
$id_member=$prfl[id_member];
}
		  $nama_lengkap=strip_tags($_REQUEST[nama_member]);
		  $alamat_member=strip_tags($_REQUEST[alamat_member]);
		  $email_member=strip_tags($_REQUEST[email_member]);
		  $agama_member=strip_tags($_REQUEST[agama_member]);
		  $hobi_member=strip_tags($_REQUEST[hobi_member]);
		  $tanggal_lahir=strip_tags($_REQUEST[tanggal_lahir]);
		  $musik_member=strip_tags($_REQUEST[musik_member]);
		  $buku_favorit=strip_tags($_REQUEST[buku_favorit]);
		  $film_favorit=strip_tags($_REQUEST[film_favorit]);
		  $pekerjaan_member=strip_tags($_REQUEST[pekerjaan_member]);
		  $tempat_kerja_member=strip_tags($_REQUEST[tempat_kerja_member]);
		  $about=strip_tags($_REQUEST[about]);
$update=mysql_query("update member set nama_member='$nama_lengkap',
										alamat_member='$alamat_member',
										email_member='$email_member',
										agama_member='$agama_member',
										hobi_member='$hobi_member',
										tanggal_lahir='$tanggal_lahir',
										musik_member='$musik_member',
										buku_favorit='$buku_favorit',
										film_favorit='$film_favorit',
										pekerjaan_member='$pekerjaan_member',
										tempat_kerja_member='$tempat_kerja_member',
										about_member='$about'
										 where username='$_SESSION[namamember]'");
echo "<meta http-equiv='refresh' content='0; url=member-everydaylikesunday-2009$id_member-9002.html'>";
}else{
echo "Kode yang Anda masukkan tidak cocok<br /><a href=javascript:history.go(-1)><b>Ulangi Lagi</b></a>";
}
}else{
echo "Anda belum memasukkan kode<br /> <a href=javascript:history.go(-1)><b>Ulangi Lagi</b></a>";
}
}


//MODUL UPDATE PASSWORD MEMBER.............
elseif ($_GET[module]=='updatepassword'){
if(!empty($_POST['kode'])){
if($_POST['kode']==$_SESSION['captcha_session']){
$password=mysql_query("select * from member where username='$_SESSION[namamember]'");
while($pwd=mysql_fetch_array($password)){
$visible=$pwd[password_visible];
$username=$pwd[username];
$id_member=$pwd[id_member];

}
if($_POST[password_lama]==$visible){
$pass=md5($_POST[password]);
$updatee=mysql_query("update member set password='$pass', password_visible='$_POST[password]' where username='$username'");
echo "<meta http-equiv='refresh' content='0; url=member-everydaylikesunday-2009$id_member-9002.html'>";
}
else {
echo"Password lama yang anda masukkan salah...!!!!<br><a href=javascript:history.go(-1)><b>Ulangi Lagi</b></a>";
}
}else{
echo "Kode yang Anda masukkan tidak cocok<br /><a href=javascript:history.go(-1)><b>Ulangi Lagi</b></a>";
}
}else{
echo "Anda belum memasukkan kode<br /> <a href=javascript:history.go(-1)><b>Ulangi Lagi</b></a>";
}
}


//MODUL UPDATE FOTO MEMBER.............
elseif ($_GET[module]=='updatefoto'){
$tmpl_pwd=mysql_query("select * from member where username='$_SESSION[namamember]'");
while($tpl_pwd=mysql_fetch_array($tmpl_pwd)){
$username=$tpl_pwd[username];
$id_member=$tpl_pwd[id_member];
}
function getExtension($str) {
$i = strrpos($str,".");
if (!$i) { return ""; }
$l = strlen($str) - $i;
$ext = substr($str,$i+1,$l);
return $ext;
}
$filename = stripslashes($_FILES['foto']['name']);
$extension = getExtension($filename);
$extension = strtolower($extension);
if(!empty($_POST['kode'])){
if($_POST['kode']==$_SESSION['captcha_session']){
if (($extension != "jpg") && ($extension != "jpeg") && ($extension != "png"))
{
echo"Field gambar Foto Profil belum terisi.<br>Mohon Lengkapi Kembali!!!";
echo"<a href=javascript:history.go(-1)><b>Ulangi Lagi</b></a>";
}
else{
$kata=$username;
$idfoto=str_replace(" ","-","$kata");

		if(is_uploaded_file($_FILES['foto']['tmp_name'])){
          if (isset ($_FILES['foto'])){
              $imagename = stripslashes($_FILES['foto']['name']);
              $source = $_FILES['foto']['tmp_name'];
              $target = "member/".$imagename;
              move_uploaded_file($source, $target);
 
              $imagepath = $imagename;
              $save = "member/" . $idfoto.'.'.$extension; //This is the new file you saving
              $file = "member/" . $imagepath; //This is the original file
 
              list($width, $height) = getimagesize($file) ; 
 
              $modwidth = 160; 
 
              $diff = $width / $modwidth;
 
              $modheight = $height / $diff; 
              $tn = imagecreatetruecolor($modwidth, $modheight) ; 
              $image = imagecreatefromjpeg($file) ; 
              imagecopyresampled($tn, $image, 0, 0, 0, 0, $modwidth, $modheight, $width, $height) ; 
 
              imagejpeg($tn, $save, 100) ; 
 
              $save = "member/sml_" . $idfoto.'.'.$extension; //This is the new file you saving
              $file = "member/" . $imagepath; //This is the original file
 
              list($width, $height) = getimagesize($file) ; 
 
              $modwidth = 130; 
 
              $diff = $width / $modwidth;
 
              $modheight = $height / $diff; 
              $tn = imagecreatetruecolor($modwidth, $modheight) ; 
              $image = imagecreatefromjpeg($file) ; 
              imagecopyresampled($tn, $image, 0, 0, 0, 0, $modwidth, $modheight, $width, $height) ; 
 
              imagejpeg($tn, $save, 100) ; 
			  unlink("member/$imagename");
 
          }
    echo "<meta http-equiv='refresh' content='0; url=member-everydaylikesunday-2009$id_member-9002.html'>";
		  }
		  }
		  }else{
echo "Kode yang Anda masukkan tidak cocok<br /><a href=javascript:history.go(-1)><b>Ulangi Lagi</b></a>";
}
}else{
echo "Anda belum memasukkan kode<br /> <a href=javascript:history.go(-1)><b>Ulangi Lagi</b></a>";
}
}


//MODUL UPLOAD KOLEKSI FOTO MEMBER.............
elseif ($_GET[module]=='uploadkoleksifoto'){
$tmpl_pwd=mysql_query("select * from member where username='$_SESSION[namamember]'");
while($tpl_pwd=mysql_fetch_array($tmpl_pwd)){
$username=$tpl_pwd[username];
$id_member=$tpl_pwd[id_member];
}
function getExtension($str) {
$i = strrpos($str,".");
if (!$i) { return ""; }
$l = strlen($str) - $i;
$ext = substr($str,$i+1,$l);
return $ext;
}
$filename = stripslashes($_FILES['foto']['name']);
$extension = getExtension($filename);
$extension = strtolower($extension);
if (($extension != "jpg") && ($extension != "jpeg") && ($extension != "png"))
{
echo"Field gambar masih kosong....!!!!<br>Mohon Lengkapi Kembali!!!";
echo"<br><a href=javascript:history.go(-1)><b>Ulangi Lagi</b></a>";
}
else{
        if(is_uploaded_file($_FILES['foto']['tmp_name'])){
          if (isset ($_FILES['foto'])){
              $imagename = stripslashes($_FILES['foto']['name']);
              $source = $_FILES['foto']['tmp_name'];
              $target = "koleksi-foto-member/".$imagename;
              move_uploaded_file($source, $target);
 
              $imagepath = $imagename;
              $save = "koleksi-foto-member/" . $imagename; //This is the new file you saving
              $file = "koleksi-foto-member/" . $imagepath; //This is the original file
 
              list($width, $height) = getimagesize($file) ; 
 
              $modwidth = 500; 
 
              $diff = $width / $modwidth;
 
              $modheight = $height / $diff; 
              $tn = imagecreatetruecolor($modwidth, $modheight) ; 
              $image = imagecreatefromjpeg($file) ; 
              imagecopyresampled($tn, $image, 0, 0, 0, 0, $modwidth, $modheight, $width, $height) ; 
 
              imagejpeg($tn, $save, 100) ; 
 
              $save = "koleksi-foto-member/sml_" . $imagename; //This is the new file you saving
              $file = "koleksi-foto-member/" . $imagepath; //This is the original file
 
              list($width, $height) = getimagesize($file) ; 
 
              $modwidth = 90; 
 
              $diff = $width / $modwidth;
 
              $modheight = $height / $diff; 
              $tn = imagecreatetruecolor($modwidth, $modheight) ; 
              $image = imagecreatefromjpeg($file) ; 
              imagecopyresampled($tn, $image, 0, 0, 0, 0, $modwidth, $modheight, $width, $height) ; 
 
              imagejpeg($tn, $save, 100) ; 
 
          }
		  $query=mysql_query("insert into koleksi_foto (id_member,foto_kecil, foto_besar) values ('$id_member', 'sml_$imagename', '$imagename')") or die (mysql_error());
    echo "<meta http-equiv='refresh' content='0; url=member-everydaylikesunday-2009$id_member-9002.html'>";
		  }
		  }
}


//MODUL KOLEKSI FOTO MEMBER............
elseif ($_GET[module]=='koleksifoto'){
$detailmember=mysql_query("SELECT * FROM member WHERE id_member='$_GET[id]'");
while($lihat=mysql_fetch_array($detailmember)){
$id_member=$lihat[id_member];
$nama_member=$lihat[nama_member];
}
	$p      = new Paging;
  $batas  = 25	;
  $posisi = $p->cariPosisi($batas);
  $idfoto=substr("$_GET[id]",0,2);
  $foto = mysql_query("select count(koleksi_foto.id_foto) as jml from koleksi_foto WHERE id_member='$idfoto'");
  $k = mysql_fetch_array($foto); 
  
  echo"<table class='member-title' width='100%' height='20'><tr><td height='20'><a href=koleksi-foto-member-$id_member.html>Koleksi Foto $nama_member</a></td></tr></table><br>";
  echo "<span><a href=member-everydaylikesunday-2009$id_member-9002.html>Lihat Profil</a> | <a href='koleksi-foto-member-$id_member.html'>Koleksi Foto</a> | <a href='koleksi-art-work-$id_member.html'>Koleksi Art Work</a></span><br />";
  $tmpl_foto = mysql_query("SELECT * FROM koleksi_foto WHERE id_member='$idfoto' order by id_foto DESC LIMIT $posisi,$batas");
	$jml = mysql_num_rows($tmpl_foto);
  if ($jml > 0){
  echo"<link rel='stylesheet' type='text/css' href='css/jquery.lightbox-0.5.css' />
<script type='text/javascript' src='js/jquery.lightbox-0.5.pack.js'></script>
<script type='text/javascript' src='js/script-lightbox.js'></script>";
  	$i=0;
	$kolom = 5;
  echo"<table border='0' style='border: 1pt ridge #A3D331;' width='100%'>";
  echo"<tr>";
  $seleksi=mysql_query("select * from member where username='$_SESSION[namamember]'");
	while($pilih=mysql_fetch_array($seleksi)){
	$id_seleksi=$pilih[id_member];
	}
    while ($s = mysql_fetch_array($tmpl_foto)){
	$id_member=$s[id_member];
	$id_koleksi_foto=$s[id_foto];
	  if ($i >= $kolom){
    echo "</tr><tr>";
      $i = 0;
  }
  $dptid=$_GET[id];
	if($id_seleksi==$dptid){
	$dltfoto="<a href='hapus-koleksi-foto-$id_koleksi_foto.html' onClick=\"return confirm('Anda yakin ingin menghapus foto ini???')\">Delete</a>";
	}
	else if(!empty($_SESSION[namaadmin]) AND !empty($_SESSION[passwordadmin])){
	$dltfoto="<a href='hapus-koleksi-foto-$id_koleksi_foto.html' onClick=\"return confirm('Anda yakin ingin menghapus foto ini???')\">Delete [Admin]</a>";
	}
	else{
	$dltfoto="";
	}
  $i++;
	echo"<td align='center' valign='middle'><div class='pic'><a href='koleksi-foto-member/$s[foto_besar]' rel='lightbox'><img src='koleksi-foto-member/$s[foto_kecil]' width='80' class='image'></a></div>$dltfoto<br>";
	}
	echo"</td></tr></table>";
		echo"<table width='100%' border='0' style='border: 1pt ridge #A3D331;' cellspacing='0'><tr><td align='center' valign='middle' bgcolor='#BDEA5B'>$k[jml]</b> Koleksi Foto Untuk Member Ini</td></tr></table><br>";
		  $jmldata     = mysql_num_rows(mysql_query("SELECT * FROM koleksi_foto where id_member='$_GET[id]'"));
  $jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
  $linkHalaman = $p->navHalaman2($_GET[halaman], $jmlhalaman);
echo "<table align='center'><tr><td align='center'>$linkHalaman </td></tr></table>";


	
	$seleksi=mysql_query("select * from member where username='$_SESSION[namamember]'");
	while($pilih=mysql_fetch_array($seleksi)){
	$id_seleksi=$pilih[id_member];
	}
	if($id_seleksi==$idfoto){
	  echo "<span class=judulberita>Upload Koleksi Foto</span><br />";
	echo"<table width='100%' border='0' style='border: 1pt ridge #A3D331;' cellspacing='0'><tr><td>Masih Kurang Banyak Koleksi Foto Yang Anda Miliki???<br>Upload Foto Untuk Koleksi Foto Anda Lagi???<br>";
	echo"<form method='post' action='upload-koleksi-foto.html' 'enctype='multipart/form-data'>";
	echo"<strong>Cari Foto :</strong> <input type='file' class='textfiledform' name='foto' size='40' id='foto'><br>
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type='submit' value='Upload Foto' class='textfiledform'></td><input type='hidden' value='$username' name='username'></form>
	</td></tr></table><br>";
	} 
	else {
	echo"<br>";
	}
	} else {
  echo"<table border='0' style='border: 1pt ridge #A3D331;' width='100%'>";
	$seleksi=mysql_query("select * from member where username='$_SESSION[namamember]'");
	while($pilih=mysql_fetch_array($seleksi)){
	$id_seleksi=$pilih[id_member];
	}
		if($id_seleksi==$idfoto){
	echo"<tr><td>Koleksi Foto Masih Kosong.<br>Upload Foto Untuk Koleksi Foto Anda???<br>";
	echo"<form method='post' action='upload-koleksi-foto.html' 'enctype='multipart/form-data'>";
	echo"<strong>Cari Foto :</strong> <input type='file' class='textfiledform' name='foto' size='40' id='foto'><br>
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type='submit' value='Upload Foto' class='textfiledform'></td><input type='hidden' value='$username' name='username'></form>
	</td></tr>";
	}
	else{
	echo"<tr><td>Koleksi Foto Masih Kosong.</td></tr><br>";
	}		  
	echo"</table><br>";
	}
	  if(empty($_SESSION[namamember]) and empty($_SESSION[passmember])){
    echo "<span class='rightbartitle'><b>Beri Komentar Koleksi Foto Member Ini :</b></span><br>";
    echo"<table width=100% border='0' style='border: 1pt ridge #A3D331;'><tr><td>Anda Belum Login!!!<br>Untuk mengomentari koleksi foto ini, anda harus LOGIN terlebih dahulu.<br>Belum Daftar??? Klik <a href='register-member-els.html'>REGISTER</a></td></tr></table>";
		} else{
		
		// Hitung jumlah komentar koleksi foto
  $p      = new Paging;
  $batas  = 5;
  $posisi = $p->cariPosisi2($batas);
  $idnya=substr("$_GET[id]",0,2);
  $komentar = mysql_query("select count(komentar_foto.id_komentar_foto) as jml from komentar_foto WHERE id_member='$idnya'");
  $k = mysql_fetch_array($komentar); 
  echo "<br><span class=judulberita><b>$k[jml]</b> Komentar untuk Koleksi Foto Member ini</span><br />";
  
  // Komentar koleksi foto
  $sql = mysql_query("SELECT * FROM komentar_foto WHERE id_member='$idnya' order by id_komentar_foto DESC LIMIT $posisi,$batas");
	$jml = mysql_num_rows($sql);
  // Apabila sudah ada komentar, tampilkan 
  if ($jml > 0){
  echo"<table border='0' style='border: 1pt ridge #A3D331;' width='100%'>";
    while ($s = mysql_fetch_array($sql)){
	$id_member=$s[id_pengirim];
      $tanggal = tgl_indo($s[tgl]);
      // Apabila ada link website diisi, tampilkan dalam bentuk link   
        echo "<tr><td height='20' bgcolor='#BDEA5B' colspan='2'><a href=member-everydaylikesunday-2009$s[id_pengirim]-9002.html>$s[nama_komentar]</a> | <span class='tanggalberita'>$tanggal - $s[jam_komentar] WIB - <font color='green'>$s[ip_pengirim]</font></span></td></tr>";  

      $isian=nl2br($s[isi_komentar]); // membuat paragraf pada isi komentar
	  
	  $id_look = $_GET[id];
	  $seleksi=mysql_query("select * from member where username='$_SESSION[namamember]'");
	while($pilih=mysql_fetch_array($seleksi)){
	$id_seleksi=$pilih[id_member];
	}
	//seleksi
	$twt=mysql_query("select * from komentar_member where id_member='$id_seleksi'");
	while($pltwt=mysql_fetch_array($twt)){
	$id_tweet=$pltwt[id_member];
	}
	  if($id_look == $id_seleksi){
	  $delete="<a href='hapus-komentar-foto-$s[id_komentar_foto].html'>Delete</a>";
	  }
	  else if($id_tweet==$id_member){
	  $delete="<a href='hapus-komentar-foto-$s[id_komentar_foto].html'>Delete</a>";
	  }
	  else if(!empty($_SESSION[namaadmin]) AND !empty($_SESSION[passwordadmin])){
	  $delete="<a href='hapus-komentar-foto-$s[id_komentar_foto].html'>Delete [Admin]</a>";
	  }
	  else {
	  $delete="";
	  }
	  
	    echo "<tr><td valign='top'>$isian<br></td><td width='50' valign='top'><a href=member-everydaylikesunday-2009$s[id_pengirim]-9002.html><img src='member/$s[foto_pengirim]' width='45' class='image'></a><br>$delete</td></tr>";	 		  
    }
	echo"</table>";
	  $jmldata     = mysql_num_rows(mysql_query("SELECT * FROM komentar_foto where id_member='$_GET[id]'"));
  $jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
  $linkHalaman = $p->navHalaman($_GET[halaman2], $jmlhalaman);

  echo "<table align='center'><tr><td align='center'>$linkHalaman </td></tr></table><br /><br />";
  }
  else {
  echo"<table border='0' style='border: 1pt ridge #A3D331;' width='100%'>";
	echo"<tr><td>Komentar Masih Kosong</td></tr>";	 		  
	echo"</table><br>";
	}
	
  // Form komentar Koleksi Foto
  echo "<span class='rightbartitle'><b>Beri Komentar Koleksi Foto Member Ini :</b></span>
        <table width=100% border='0' style='border: 1pt ridge #A3D331;'>
        <form action='simpan-komentar-foto.html' method=POST onSubmit=\"return validasi(this)\">";
		$idnya=substr("$_GET[id]",0,2);
		  $query_member_komentar=mysql_query("select * from member where username='$_SESSION[username]'");
  while($frmkmntr=mysql_fetch_array($query_member_komentar)){
  $nama_member=$frmkmntr[nama_member];
  $foto_pengirim=$frmkmntr[foto_kecil];
  $id_pengirim=$frmkmntr[id_member];
 echo"<input type='hidden' name='foto_pengirim' value='$foto_pengirim'>";
 echo"<input type='hidden' name='id_pengirim' value='$id_pengirim'>";
  }
        echo"<input type=hidden name=id_member value=$idnya>
        <input type=hidden name=id value=$_GET[id]>
        <tr><td>Nama</td><td> : </td><td><select class='textfiledform' name=nama_komentar><option>$nama_member</option></select></td></tr>
        <tr><td valign=top>Komentar</td><td valign='top'> : </td><td><textarea name='isi_komentar' style='width: 380px; height: 70px;'  class='textfiledform'></textarea></td></tr>
        <tr><td>&nbsp;</td><td></td><td><img src='captcha.php'></td></tr>
        <tr><td>&nbsp;</td><td></td><td>(Masukkan 6 kode diatas)<br /><input type=text name=kode size=6 class='textfiledform'><br /></td></tr>
        <tr><td>&nbsp;</td><td></td><td><input type=submit name=submit value=Kirim class='textfiledform'> <input type=reset name=submit value=Hapus class='textfiledform'></td></tr>
        </form></table><br />";
		}

}


//MODUL SIMPAN KOMENTAR FOTO.....
elseif ($_GET[module]=='simpankomentarfoto'){
session_start();
$lindungi_nama=strip_tags($_REQUEST[nama_komentar]);
$lindungi_pesan=strip_tags($_REQUEST[isi_komentar],"<br />");
$ip = $_SERVER['REMOTE_ADDR'];

	if(!empty($_POST['kode'])){
		if($_POST['kode']==$_SESSION['captcha_session']){
    $sql = mysql_query("INSERT INTO komentar_foto(nama_komentar,isi_komentar,id_member,tgl,jam_komentar,id_pengirim,foto_pengirim,ip_pengirim) 
                        VALUES('$lindungi_nama','$lindungi_pesan','$_POST[id_member]','$tgl_sekarang','$jam_sekarang','$_POST[id_pengirim]',
						'$_POST[foto_pengirim]','$ip')");
						
						 $sqll = mysql_query("INSERT INTO noti(id_member_milik,id_member_terkait,notifications,id_pengirim,nama_pengirim,status) VALUES('$_POST[id_member]','$_POST[id_member]','<a href=member-everydaylikesunday-2009$_POST[id_pengirim]-9002.html>$lindungi_nama</a> mengomentari koleksi foto <a href=koleksi-foto-member-$_POST[id_member].html>Member ini</a>','$_POST[id_pengirim]','$lindungi_nama','not')");

$noti=mysql_query("select * from komentar_foto where id_member='$_POST[id_member]' and id_pengirim!='$_POST[id_pengirim]'");
while($nt=mysql_fetch_array($noti)){
$id_semua=$nt[id_pengirim];
 $sqll = mysql_query("INSERT INTO noti(id_member_milik,id_member_terkait,notifications,id_pengirim,nama_pengirim,status) VALUES('$_POST[id_member]','$id_semua','<a href=member-everydaylikesunday-2009$_POST[id_pengirim]-9002.html>$lindungi_nama</a>  mengomentari koleksi foto <a href=koleksi-foto-member-$_POST[id_member].html>Member ini</a>','$_POST[id_pengirim]','$lindungi_nama','not')");
}
    echo "<meta http-equiv='refresh' content='0; url=koleksi-foto-member-$_POST[id].html'>";
		}else{
			echo "Kode yang Anda masukkan tidak cocok<br />
			      <a href=javascript:history.go(-1)><b>Ulangi Lagi</b></a>";

		}
	}else{
		echo "Anda belum memasukkan kode<br />
  	      <a href=javascript:history.go(-1)><b>Ulangi Lagi</b></a>";
	}
}


//MODUL NOTIFICATION.....
elseif ($_GET[module]=='notification'){
	$seleksi=mysql_query("select * from member where username='$_SESSION[namamember]'");
	while($pilih=mysql_fetch_array($seleksi)){
	$id_seleksi=$pilih[id_member];
	}
if(empty($_SESSION[namamember]) and empty($_SESSION[passmember])){
echo"<strong>Anda Tidak berhak mengakses halaman ini!!!!!</strong>";
} else {
if($id_seleksi==$_GET[id]){
	$judul_noti=mysql_query("SELECT * FROM member    
                      WHERE id_member='$_GET[id]'");
					  
while($nti=mysql_fetch_array($judul_noti)){
echo"<table class='member-title' width='100%' height='20'><tr><td height='20'><a href=member-everydaylikesunday-2009$nti[id_member]-9002.html>$nti[nama_member]</a></td></tr></table>";
}
echo"<span class='judulhome'>Notification | Pemberitahuan</span><br>";
$tmpl_noti=mysql_query("select * from noti where id_member_terkait='$_GET[id]'");
$no=1;
$hitung=mysql_num_rows($tmpl_noti);
if($hitung > 0){
while($lhtnti=mysql_fetch_array($tmpl_noti)){
echo"<table border='0'><tr><td>$no . </td><td>$lhtnti[notifications]</td><td><a href='hapus-notifications-$lhtnti[id_notifications].html' onClick=\"return confirm('Anda yakin ingin menghapus Notifications ini???')\"><div class='menu-button'>DELETE</div></a></td></tr></table>";
$no++;
} 
} else {
echo"<strong>&curren;</strong> Belum ada Notification atau Pemberitahuan untuk Anda.";
}
} else {
echo"<strong>Anda Tidak berhak mengakses halaman ini!!!!!</strong>";
}
}
}


//MODUL HAPUS NOTIFICATION.....
elseif ($_GET[module]=='hapusnotification'){
$blk_noti=mysql_query("select * from member where username='$_SESSION[namamember]'");
while($dlt=mysql_fetch_array($blk_noti)){
$id_member=$dlt[id_member];
}
$query=mysql_query("delete from noti where id_notifications='$_GET[id]'") or die (mysql_error());
echo "<meta http-equiv='refresh' content='0; url=lihat-notifications-$id_member.html'>";
}

//MODUL HAPUS STATUS.....
elseif ($_GET[module]=='hapusstatus'){
if(empty($_SESSION[namamember]) and empty($_SESSION[passmember])){
echo"<strong>Anda Tidak berhak mengakses halaman ini!!!!!</strong>";
} else {
	$seleksi=mysql_query("select * from member where username='$_SESSION[namamember]'");
	while($pilih=mysql_fetch_array($seleksi)){
	$id_seleksi=$pilih[id_member];
	}
		$twt=mysql_query("select * from demo_twitter_timeline where id_member='$id_seleksi'");
	while($pltwt=mysql_fetch_array($twt)){
	$id_tweet=$pltwt[id_member];
	}
if($id_seleksi==$id_tweet){
$query=mysql_query("delete from demo_twitter_timeline where id='$_GET[id]'") or die (mysql_error());
if(empty($_SESSION[namaadmin]) AND empty($_SESSION[passwordadmin])){
echo "<meta http-equiv='refresh' content='0; url=home'>";
} else {
echo "<meta http-equiv='refresh' content='0; url=els-admin/editor-root/status-update-list.html'>";
}
} else {
echo"<strong>Anda Tidak berhak mengakses halaman ini!!!!!</strong>";
}
}
}


//MODUL HAPUS ART WORK.....
elseif ($_GET[module]=='hapusartwork'){
if(empty($_SESSION[namamember]) and empty($_SESSION[passmember])){
echo"<strong>Anda Tidak berhak mengakses halaman ini!!!!!</strong>";
} else {
	$seleksi=mysql_query("select * from member where username='$_SESSION[namamember]'");
	while($pilih=mysql_fetch_array($seleksi)){
	$id_seleksi=$pilih[id_member];
	}
		$twt=mysql_query("select * from art_work where id_member='$id_seleksi'");
	while($pltwt=mysql_fetch_array($twt)){
	$id_tweet=$pltwt[id_member];
	}
if($id_seleksi==$id_tweet){
$query=mysql_query("delete from art_work where id_art_work='$_GET[id]'") or die (mysql_error());
echo "<meta http-equiv='refresh' content='0; url=koleksi-art-work-$id_seleksi.html'>";
} else {
echo"<strong>Anda Tidak berhak mengakses halaman ini!!!!!</strong>";
}
}
}

//MODUL HAPUS KOLEKSI FOTO.....
elseif ($_GET[module]=='hapuskoleksifoto'){
if(empty($_SESSION[namamember]) and empty($_SESSION[passmember])){
echo"<strong>Anda Tidak berhak mengakses halaman ini!!!!!</strong>";
} else {
	$seleksi=mysql_query("select * from member where username='$_SESSION[namamember]'");
	while($pilih=mysql_fetch_array($seleksi)){
	$id_seleksi=$pilih[id_member];
	}
		$twt=mysql_query("select * from koleksi_foto where id_member='$id_seleksi'");
	while($pltwt=mysql_fetch_array($twt)){
	$id_tweet=$pltwt[id_member];
	}
if($id_seleksi==$id_tweet){
$query=mysql_query("delete from koleksi_foto where id_foto='$_GET[id]'") or die (mysql_error());
echo "<meta http-equiv='refresh' content='0; url=koleksi-foto-member-$id_seleksi.html'>";
} else {
echo"<strong>Anda Tidak berhak mengakses halaman ini!!!!!</strong>";
}
}
}



// MODUL TUTORIAL DAN TRIK..........
elseif ($_GET[module]=='tutorialtrik'){
  echo "<span class=judulhome><b>Tutorial & Tips Seputar Teknologi Informasi & Komputer</b></span><br /><br />"; 
  $p      = new Paging;
  $batas  = 8;
  $posisi = $p->cariPosisi($batas);
  // Tampilkan semua berita
  $sql=mysql_query("select count(komentar_tutorial.id_komentar) as jumlah, judul, judul_seo, jam, 
                       tutorial_trik.id_berita, tanggal, gambar, isi_berita    
                       from tutorial_trik left join komentar_tutorial 
                       on tutorial_trik.id_berita=komentar_tutorial.id_berita
                       and aktif='Y' 
                       group by tutorial_trik.id_berita DESC LIMIT $posisi,$batas");


  while($r=mysql_fetch_array($sql)){
	$tgl = tgl_indo($r[tanggal]);
echo"<span class='judulberita'><a href='tutorial-$r[id_berita]-$r[judul_seo].html'>$r[judul]</a></span><br>";
echo"<span class='tanggalberita'>$tgl -|- $r[jam] WIB</span><br>";
		echo"<span class='image'><img src='tutorial-trik/$r[gambar]' width='65'></span>";
      // Tampilkan hanya sebagian isi berita
	$isi_berita= htmlentities(strip_tags($r[isi_berita])); // mengabaikan tag html
    $isi = substr($isi_berita,0,400); // ambil sebanyak 220 karakter
    $isi = substr($isi_berita,0,strrpos($isi," ")); // potong per spasi kalimat

      echo "$isi ... <a href=tutorial-$r[id_berita]-$r[judul_seo].html>Selengkapnya</a> (<b>$r[jumlah] komentar</b>)
            <br /><hr color=#e0cb91 noshade=noshade />";
	 }
	
  $jmldata     = mysql_num_rows(mysql_query("SELECT * FROM tutorial_trik"));
  $jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
  $linkHalaman = $p->navHalaman2($_GET[halaman], $jmlhalaman);

  echo "<table align='center'><tr><td align='center'>$linkHalaman </td></tr></table><br /><br />";
}


//DETAIL TUTORIAL & TRIKS.......
elseif ($_GET[module]=='detailtutorial'){
	$detail=mysql_query("SELECT * FROM tutorial_trik WHERE id_berita='$_GET[id]'");
	$d   = mysql_fetch_array($detail);
	$tgl = tgl_indo($d[tanggal]);
	$baca = $d[dibaca]+1;
	echo "<span class='judulberitabesar'>$d[judul]</span><br />
	<span class='tanggalberita'>$tgl - $d[jam] WIB</span><br />
	<span>Share this article on : " ?>
<script language="javascript">
document.write("<a href='http://twitter.com/home/?status=" + document.URL + "' target='_blank'>Twitter</a> | <a href='http://www.facebook.com/share.php?u=" + document.URL + "' target='_blank'>Facebook</a> | <a href='http://www.reddit.com/submit?url=" + document.URL + "' target='_blank'>Reddit</a> | <a href='http://digg.com/submit?url=" + document.URL + "' target='_blank'>Digg</a>");
</script>
<?php
echo"</span><br />
       Posted by <em><font color='red'><strong>Admin</strong></font></em> | Dibaca Sebanyak : <b>$baca</b> kali</span><br /><br />";
  // Apabila ada gambar dalam berita, tampilkan   
 	if ($d[gambar]!=''){
		echo "<span class=image><img src='tutorial-trik/$d[gambar]' border='0' width='200'></span>";
	}
	$isian=nl2br($d[isi_berita]);
	echo "$isian<br />";	 		  
  echo"<br><span>Share this article on : " ?>
<script language="javascript">
document.write("<a href='http://twitter.com/home/?status=" + document.URL + "' target='_blank'>Twitter</a> | <a href='http://www.facebook.com/share.php?u=" + document.URL + " ' target='_blank'>Facebook</a> | <a href='http://www.reddit.com/submit?url=" + document.URL + "' target='_blank'>Reddit</a> | <a href='http://digg.com/submit?url=" + document.URL + "' target='_blank'>Digg</a>");
</script>
<?php
echo"</span><br /><br />";
  // Tampilkan judul berita yang terkait (maks: 5) 
  echo "<img src=image/berita_terkait.png><br /><ul>";
  // pisahkan kata per kalimat lalu hitung jumlah kata
  $pisah_kata  = explode(",",$d[tag]);
  $jml_katakan = (integer)count($pisah_kata);

  $jml_kata = $jml_katakan-1; 
  $ambil_id = substr($_GET[id],0,2);

  // Looping query sebanyak jml_kata
  $cari = "SELECT * FROM tutorial_trik WHERE (id_berita<'$ambil_id') and (id_berita!='$ambil_id') and (" ;
    for ($i=0; $i<=$jml_kata; $i++){
      $cari .= "tag LIKE '%$pisah_kata[$i]%'";
      if ($i < $jml_kata ){
        $cari .= " OR ";
      }
    }
   $cari .= ") ORDER BY id_berita DESC LIMIT 5";
 
  $hasil  = mysql_query($cari);
  while($h=mysql_fetch_array($hasil)){
  		echo "<li><a href=berita-$h[id_berita]-$h[judul_seo].html>$h[judul]</a></li>";
  }      
	echo "</ul>";

  // Apabila detail berita dilihat, maka tambahkan berapa kali dibacanya
  mysql_query("UPDATE tutorial_trik SET dibaca=$d[dibaca]+1 
              WHERE id_berita='$_GET[id]'"); 


  // Hitung jumlah komentar
  $idnya=substr("$_GET[id]",0,2);
  $komentar = mysql_query("select count(komentar_tutorial.id_komentar) as jml from komentar_tutorial WHERE id_berita='$idnya' AND aktif='Y'");
  $k = mysql_fetch_array($komentar); 
  echo "<span class=judulberita><b>$k[jml]</b> Komentar untuk Artikel ini </span><br />";

  // Komentar berita
  $sql = mysql_query("SELECT * FROM komentar_tutorial WHERE id_berita='$idnya' AND aktif='Y'");
	$jml = mysql_num_rows($sql);
  // Apabila sudah ada komentar, tampilkan 
  if ($jml > 0){
  echo"<table border='0' style='border: 1pt ridge #A3D331;' width='100%'>";
    while ($s = mysql_fetch_array($sql)){
      $tanggal = tgl_indo($s[tgl]);
      // Apabila ada link website diisi, tampilkan dalam bentuk link   
 	    if ($s[url]!=''){
        echo "<tr><td><a href='http://$s[url]' target='_blank'>$s[nama_komentar]</a> | <span class='tanggalberita'>$tanggal - $s[jam_komentar] WIB - <font color='green'>$s[ip_pengirim]</font></span></td></tr>";  
	    }
	    else{
        echo "<tr><td>$s[nama_komentar] | $tanggal - $s[jam_komentar] WIB</td></tr>";  
      }
      $isian=nl2br($s[isi_komentar]); // membuat paragraf pada isi komentar
	    echo "<tr><td>$isian<br><hr color=#a3d331 noshade=noshade /></td></tr>";	 		  
    }
	echo"</table><br>";
  }
  else {
  echo"<table border='0' style='border: 1pt ridge #A3D331;' width='100%'>";
	echo"<tr><td>Komentar Masih Kosong</td></tr>";	 		  
	echo"</table><br>";
  }
  
  // Form komentar
  echo "<span class='rightbartitle'><b>Beri Komentar Artikel Ini :</b></span>
        <table width=100% border='0' style='border: 1pt ridge #A3D331;'>
        <form action='simpan-komentar-tutorial.html' method=POST onSubmit=\"return validasi(this)\">
        <input type=hidden name=id_berita value=$idnya>
        <input type=hidden name=id value=$_GET[id]>
        <tr><td>Nama</td><td> : </td><td><input type=text name=nama_komentar size=40 class='textfiledform'></td></tr>
        <tr><td>Website</td><td> : </td><td><input type=text name=url size=40 class='textfiledform'></td></tr>
        <tr><td valign=top>Komentar</td><td valign='top'> : </td><td><textarea name='isi_komentar' style='width: 315px; height: 100px;'  class='textfiledform'></textarea></td></tr>
        <tr><td>&nbsp;</td><td></td><td><img src='captcha.php'></td></tr>
        <tr><td>&nbsp;</td><td></td><td>(Masukkan 6 kode diatas)<br /><input type=text name=kode size=6 class='textfiledform'><br /></td></tr>
        <tr><td>&nbsp;</td><td></td><td><input type=submit name=submit value=Kirim class='textfiledform'> <input type=reset name=submit value=Hapus class='textfiledform'></td></tr>
        </form></table><br />";
}


//SEMUA ART WORK.......
elseif ($_GET[module]=='artworkels'){
  $p      = new Paging;
  $batas  = 6;
  $posisi = $p->cariPosisi($batas);
echo"<span class='judulhome'>Art Work Everyday Like Sunday</span><br>";
echo"Akhirnya, saya dari team website Everyday Like Sunday bisa menghadirkan kembali fitur artwork, seperti situs Deviantart.com. Dimana pada fitur ini anda para member, dapat mengupload hasil karya atau art work ke dalam website ini. Walaupun tidak sesempurna website Deviantart, tapi lumayan lah untuk sekedar tempat untuk berbagi pengalaman tentang dunia desain dan teknik-tenik baru. So, enjoy it and have fun in this website!!!<br><br>";
$art_work=mysql_query("select * from member,art_work where member.id_member=art_work.id_member order by id_art_work DESC LIMIT $posisi,$batas");
  echo"<link rel='stylesheet' type='text/css' href='css/jquery.lightbox-0.5.css' />
<script type='text/javascript' src='js/jquery.lightbox-0.5.pack.js'></script>
<script type='text/javascript' src='js/script-lightbox.js'></script>";
while($art=mysql_fetch_array($art_work)){
echo"<span class='judulberita'>$art[title]</span>";
echo"<table width=100% border='0' style='border: 1pt ridge #A3D331;'><tr>";
echo"<td width='150' valign='top'><div class='pic'<a href='art-work/$art[foto_besar_art]' rel='lightbox'><img src='art-work/$art[foto_kecil_art]' class='image' width='140'></a></div></td>";
echo"<td valign='top' align='left'>
<table cellspacing='0' cellpadding='0' border='0'>";
echo"<tr bgcolor='#D7FF68'><td width='80' valign='top'><strong></strong></td><td valign='top'></td><td valign='top' height='5'></td></tr>";
echo"<tr bgcolor='#D7FF68'><td width='80' valign='top'><strong>&nbsp;&nbsp;Title</strong></td><td valign='top' width='10'>:</td><td valign='top'>$art[title]</td></tr>
<tr bgcolor='#D7FF68'><td width='80' valign='top'><strong>&nbsp;&nbsp;Art Desainer</strong></td><td valign='top'>:</td><td valign='top'><a href='member-everydaylikesunday-2009$art[id_member]-9002.html'>$art[nama_member]</a></td></tr>
<tr bgcolor='#D7FF68'><td width='80' valign='top'><strong>&nbsp;&nbsp;Comment</strong></td><td valign='top'>:</td><td valign='top'>$art[caption]<br><br></td></tr>
<tr><td width='80' valign='top' colspan='3'><img src='image/shout-out-art-work.png'></td></td></tr>
<tr><td width='80' valign='top'><img src='member/$art[foto_kecil]' class='image-kanan' width='50' height='50'></td><td valign='top'></td><td valign='top'><a href='member-everydaylikesunday-2009$art[id_member]-9002.html'>$art[nama_member]</a>`s Art Work<br>
<a href=member-everydaylikesunday-2009$art[id_member]-9002.html><img src='image/button-lihat.png' border='0'></a>
</td></tr>
</table>
</td>";
echo"</tr></table><br>";
}
$jmldata     = mysql_num_rows(mysql_query("SELECT * FROM art_work"));
  $jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
  $linkHalaman = $p->navHalaman2($_GET[halaman], $jmlhalaman);
echo "<table align='center'><tr><td align='center'>$linkHalaman </td></tr></table>";
}



//MODUL KOLEKSI ART WORK / SUB ART WORK.....
elseif ($_GET[module]=='koleksiartwork'){
$detailmember=mysql_query("SELECT * FROM member WHERE id_member='$_GET[id]'");
while($lihat=mysql_fetch_array($detailmember)){
$id_member=$lihat[id_member];
$nama_member=$lihat[nama_member];
}
	$p      = new Paging;
  $batas  = 25	;
  $posisi = $p->cariPosisi($batas);
  $idfoto=substr("$_GET[id]",0,2);
  $foto = mysql_query("select count(art_work.id_art_work) as jml from art_work WHERE id_member='$idfoto'");
  $k = mysql_fetch_array($foto); 
  
  echo"<table class='member-title' width='100%' height='20'><tr><td height='20'><a href=koleksi-foto-member-$id_member.html>Koleksi Art Work $nama_member</a></td></tr></table><br>";
  echo "<span><a href=member-everydaylikesunday-2009$id_member-9002.html>Lihat Profil</a> | <a href='koleksi-foto-member-$id_member.html'>Koleksi Foto</a> | <a href='koleksi-art-work-$id_member.html'>Koleksi Art Work</a></span><br />";
  $tmpl_foto = mysql_query("SELECT * FROM art_work WHERE id_member='$idfoto' order by id_art_work DESC LIMIT $posisi,$batas");
	$jml = mysql_num_rows($tmpl_foto);
  if ($jml > 0){
  echo"<link rel='stylesheet' type='text/css' href='css/jquery.lightbox-0.5.css' />
<script type='text/javascript' src='js/jquery.lightbox-0.5.pack.js'></script>
<script type='text/javascript' src='js/script-lightbox.js'></script>";
  	$i=0;
	$kolom = 5;
  echo"<table border='0' style='border: 1pt ridge #A3D331;' width='100%'>";
  echo"<tr>";
    while ($s = mysql_fetch_array($tmpl_foto)){
	$id_member=$s[id_member];
	  if ($i >= $kolom){
    echo "</tr><tr>";
      $i = 0;
  }
  $i++;
	echo"<td align='left' valign='middle'><div class='pic'><a href='art-work/$s[foto_besar_art]' rel='lightbox'><img src='art-work/$s[foto_kecil_art]' width='80' class='image'></a></div><a href='hapus-koleksi-art-work-$s[id_art_work].html' onClick=\"return confirm('Anda yakin ingin menghapus foto ini???')\">Delete</a><br>";
	}
	echo"</td></tr></table>";
		echo"<table width='100%' border='0' style='border: 1pt ridge #A3D331;' cellspacing='0'><tr><td align='center' valign='middle' bgcolor='#BDEA5B'>$k[jml]</b> Koleksi Art Work Untuk Member Ini</td></tr></table><br>";
		  $jmldata     = mysql_num_rows(mysql_query("SELECT * FROM art_work where id_member='$_GET[id]'"));
  $jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
  $linkHalaman = $p->navHalaman2($_GET[halaman], $jmlhalaman);
echo "<table align='center'><tr><td align='center'>$linkHalaman </td></tr></table>";


	
	$seleksi=mysql_query("select * from member where username='$_SESSION[namamember]'");
	while($pilih=mysql_fetch_array($seleksi)){
	$id_seleksi=$pilih[id_member];
	}
	if($id_seleksi==$idfoto){
	  echo "<span class=judulberita>Upload Koleksi Art Work</span><br />";
	echo"<table width='100%' border='0' style='border: 1pt ridge #A3D331;' cellspacing='0'><tr><td>Masih Kurang Banyak Koleksi Art Work Yang Anda Miliki???<br>Upload Foto Untuk Koleksi Art Work Anda Lagi???<br>";
	echo"<form method='post' action='upload-koleksi-art-work.html' 'enctype='multipart/form-data'>";
	echo"<strong>Cari Foto &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</strong> <input type='file' class='textfiledform' name='foto' size='40' id='foto'><br>";
	echo"<strong>Title &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</strong> <input type='text' class='textfiledform' name='title' size='40' id='title'><br>";
	echo"<strong>Comment &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</strong> <textarea class='textfiledform' name='caption' cols='50' id='caption'></textarea><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type='submit' value='Upload Foto' class='textfiledform'></td><input type='hidden' value='$username' name='username'></form>
	</td></tr></table><br>";
	} 
	else {
	echo"<br>";
	}
	} else {
  echo"<table border='0' style='border: 1pt ridge #A3D331;' width='100%'>";
	$seleksi=mysql_query("select * from member where username='$_SESSION[namamember]'");
	while($pilih=mysql_fetch_array($seleksi)){
	$id_seleksi=$pilih[id_member];
	}
		if($id_seleksi==$idfoto){
	echo"<tr><td>Koleksi Art Work Masih Kosong.<br>Upload Foto Untuk Koleksi Art Work Anda???<br>";
	echo"<form method='post' action='upload-koleksi-art-work.html' 'enctype='multipart/form-data'>";
	echo"<strong>Cari Foto &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</strong> <input type='file' class='textfiledform' name='foto' size='40' id='foto'><br>";
	echo"<strong>Title &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</strong> <input type='text' class='textfiledform' name='title' size='40' id='title'><br>";
	echo"<strong>Comment &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</strong> <textarea class='textfiledform' name='caption' cols='50' id='caption'></textarea><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type='submit' value='Upload Foto' class='textfiledform'></td><input type='hidden' value='$username' name='username'></form>
	</td></tr>";
	}
	else{
	echo"<tr><td>Koleksi Art Work Masih Kosong.</td></tr><br>";
	}		  
	echo"</table><br>";
	}
	  if(empty($_SESSION[namamember]) and empty($_SESSION[passmember])){
    echo "<span class='rightbartitle'><b>Beri Komentar Koleksi Foto Member Ini :</b></span><br>";
    echo"<table width=100% border='0' style='border: 1pt ridge #A3D331;'><tr><td>Anda Belum Login!!!<br>Untuk mengomentari koleksi Art Work member ini, anda harus LOGIN terlebih dahulu.<br>Belum Daftar??? Klik <a href='register-member-els.html'>REGISTER</a></td></tr></table>";
		} else{
		
		// Hitung jumlah komentar koleksi foto
  $p      = new Paging;
  $batas  = 5;
  $posisi = $p->cariPosisi2($batas);
  $idnya=substr("$_GET[id]",0,2);
  $komentar = mysql_query("select count(komentar_artwork.id_komentar_foto) as jml from komentar_artwork WHERE id_member='$idnya'");
  $k = mysql_fetch_array($komentar); 
  echo "<br><span class=judulberita><b>$k[jml]</b> Komentar untuk Koleksi Art Work Member ini</span><br />";
  
  // Komentar koleksi foto
  $sql = mysql_query("SELECT * FROM komentar_artwork WHERE id_member='$idnya' order by id_komentar_foto DESC LIMIT $posisi,$batas");
	$jml = mysql_num_rows($sql);
  // Apabila sudah ada komentar, tampilkan 
  if ($jml > 0){
  echo"<table border='0' style='border: 1pt ridge #A3D331;' width='100%'>";
    while ($s = mysql_fetch_array($sql)){
	$id_member=$s[id_pengirim];
      $tanggal = tgl_indo($s[tgl]);
      // Apabila ada link website diisi, tampilkan dalam bentuk link   
        echo "<tr><td height='20' bgcolor='#BDEA5B' colspan='2'><a href=member-everydaylikesunday-2009$s[id_pengirim]-9002.html>$s[nama_komentar]</a> | <span class='tanggalberita'>$tanggal - $s[jam_komentar] WIB - <font color='green'>$s[ip_pengirim]</font></span></td></tr>";  
	$id_look=$_GET[id];
      $isian=nl2br($s[isi_komentar]); // membuat paragraf pada isi komentar
	  if($id_look == $id_seleksi){
	  $delete="<a href='hapus-komentar-art-work-$s[id_komentar_foto].html'>Delete</a>";
	  }
	  else if($id_tweet==$id_member){
	  $delete="<a href='hapus-komentar-art-work-$s[id_komentar_foto].html'>Delete</a>";
	  }
	  else {
	  $delete="";
	  }
	  
	    echo "<tr><td valign='top'>$isian<br></td><td width='50' valign='top'><a href=member-everydaylikesunday-2009$s[id_pengirim]-9002.html><img src='member/$s[foto_pengirim]' width='45' class='image'></a><br>$delete</td></tr>";	 		  
    }
	echo"</table>";
	  $jmldata     = mysql_num_rows(mysql_query("SELECT * FROM komentar_artwork where id_member='$_GET[id]'"));
  $jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
  $linkHalaman = $p->navHalaman($_GET[halaman2], $jmlhalaman);

  echo "<table align='center'><tr><td align='center'>$linkHalaman </td></tr></table><br /><br />";
  }
  else {
  echo"<table border='0' style='border: 1pt ridge #A3D331;' width='100%'>";
	echo"<tr><td>Komentar Masih Kosong</td></tr>";	 		  
	echo"</table><br>";
	}
	
  // Form komentar Koleksi Foto
  echo "<span class='rightbartitle'><b>Beri Komentar Koleksi Art Work Member Ini :</b></span>
        <table width=100% border='0' style='border: 1pt ridge #A3D331;'>
        <form action='simpan-komentar-art-work.html' method=POST onSubmit=\"return validasi(this)\">";
		$idnya=substr("$_GET[id]",0,2);
		  $query_member_komentar=mysql_query("select * from member where username='$_SESSION[username]'");
  while($frmkmntr=mysql_fetch_array($query_member_komentar)){
  $nama_member=$frmkmntr[nama_member];
  $foto_pengirim=$frmkmntr[foto_kecil];
  $id_pengirim=$frmkmntr[id_member];
 echo"<input type='hidden' name='foto_pengirim' value='$foto_pengirim'>";
 echo"<input type='hidden' name='id_pengirim' value='$id_pengirim'>";
  }
        echo"<input type=hidden name=id_member value=$idnya>
        <input type=hidden name=id value=$_GET[id]>
        <tr><td>Nama</td><td> : </td><td><select class='textfiledform' name=nama_komentar><option>$nama_member</option></select></td></tr>
        <tr><td valign=top>Komentar</td><td valign='top'> : </td><td><textarea name='isi_komentar' style='width: 380px; height: 70px;'  class='textfiledform'></textarea></td></tr>
        <tr><td>&nbsp;</td><td></td><td><img src='captcha.php'></td></tr>
        <tr><td>&nbsp;</td><td></td><td>(Masukkan 6 kode diatas)<br /><input type=text name=kode size=6 class='textfiledform'><br /></td></tr>
        <tr><td>&nbsp;</td><td></td><td><input type=submit name=submit value=Kirim class='textfiledform'> <input type=reset name=submit value=Hapus class='textfiledform'></td></tr>
        </form></table><br />";
		}

}

//MODUL HAPUS KOMENTAR MEMBER.....
elseif ($_GET[module]=='hapuskomentarmember'){
if(empty($_SESSION[namamember]) and empty($_SESSION[passmember])){
echo"<strong>Anda Tidak berhak mengakses halaman ini!!!!!</strong>";
} else {
	$seleksi=mysql_query("select * from member where username='$_SESSION[namamember]'");
	while($pilih=mysql_fetch_array($seleksi)){
	$id_seleksi=$pilih[id_member];
	}
		$twt=mysql_query("select * from komentar_member where id_member='$id_seleksi'");
	while($pltwt=mysql_fetch_array($twt)){
	$id_tweet=$pltwt[id_member];
	}
if($id_seleksi==$id_tweet){
$query=mysql_query("delete from komentar_member where id_komentar='$_GET[id]'") or die (mysql_error());
echo "<meta http-equiv='refresh' content='0; url=member-everydaylikesunday-2009$id_tweet-9002.html'>";
} 
else {
echo"<strong>Anda Tidak berhak mengakses halaman ini!!!!!</strong>";
}
}
}

//MODUL HAPUS KOMENTAR FOTO.....
elseif ($_GET[module]=='hapuskomentarfoto'){
if(empty($_SESSION[namamember]) and empty($_SESSION[passmember])){
echo"<strong>Anda Tidak berhak mengakses halaman ini!!!!!</strong>";
} else {
	$seleksi=mysql_query("select * from member where username='$_SESSION[namamember]'");
	while($pilih=mysql_fetch_array($seleksi)){
	$id_seleksi=$pilih[id_member];
	}
		$twt=mysql_query("select * from komentar_foto where id_member='$id_seleksi'");
	while($pltwt=mysql_fetch_array($twt)){
	$id_tweet=$pltwt[id_member];
	}
if($id_seleksi==$id_tweet){
$query=mysql_query("delete from komentar_foto where id_komentar_foto='$_GET[id]'") or die (mysql_error());
echo "<meta http-equiv='refresh' content='0; url=koleksi-foto-member-$id_tweet.html'>";
} 
else {
echo"<strong>Anda Tidak berhak mengakses halaman ini!!!!!</strong>";
}
}
}


//MODUL UPLOAD ART WORK.............
elseif ($_GET[module]=='uploadartwork'){
if(!empty($_POST[title]) and !empty($_POST[caption])){
$tmpl_pwd=mysql_query("select * from member where username='$_SESSION[namamember]'");
while($tpl_pwd=mysql_fetch_array($tmpl_pwd)){
$username=$tpl_pwd[username];
$id_member=$tpl_pwd[id_member];
}
function getExtension($str) {
$i = strrpos($str,".");
if (!$i) { return ""; }
$l = strlen($str) - $i;
$ext = substr($str,$i+1,$l);
return $ext;
}
$filename = stripslashes($_FILES['foto']['name']);
$extension = getExtension($filename);
$extension = strtolower($extension);
if (($extension != "jpg") && ($extension != "jpeg") && ($extension != "png"))
{
echo"Field gambar masih kosong....!!!!<br>Mohon Lengkapi Kembali!!!";
echo"<br><a href=javascript:history.go(-1)><b>Ulangi Lagi</b></a>";
}
else{
        if(is_uploaded_file($_FILES['foto']['tmp_name'])){
          if (isset ($_FILES['foto'])){
              $imagename = stripslashes($_FILES['foto']['name']);
              $source = $_FILES['foto']['tmp_name'];
              $target = "art-work/".$imagename;
              move_uploaded_file($source, $target);
 
              $imagepath = $imagename;
              $save = "art-work/" . $imagename; //This is the new file you saving
              $file = "art-work/" . $imagepath; //This is the original file
 
              list($width, $height) = getimagesize($file) ; 
 
              $modwidth = 500; 
 
              $diff = $width / $modwidth;
 
              $modheight = $height / $diff; 
              $tn = imagecreatetruecolor($modwidth, $modheight) ; 
              $image = imagecreatefromjpeg($file) ; 
              imagecopyresampled($tn, $image, 0, 0, 0, 0, $modwidth, $modheight, $width, $height) ; 
 
              imagejpeg($tn, $save, 100) ; 
 
              $save = "art-work/sml_" . $imagename; //This is the new file you saving
              $file = "art-work/" . $imagepath; //This is the original file
 
              list($width, $height) = getimagesize($file) ; 
 
              $modwidth = 140; 
 
              $diff = $width / $modwidth;
 
              $modheight = $height / $diff; 
              $tn = imagecreatetruecolor($modwidth, $modheight) ; 
              $image = imagecreatefromjpeg($file) ; 
              imagecopyresampled($tn, $image, 0, 0, 0, 0, $modwidth, $modheight, $width, $height) ; 
 
              imagejpeg($tn, $save, 100) ; 
 
          }
		  $title=strip_tags($_REQUEST[title]);
		  $caption=strip_tags($_REQUEST[caption]);
		  $query=mysql_query("insert into art_work (id_member,foto_kecil_art, foto_besar_art, title, caption) values ('$id_member', 'sml_$imagename', '$imagename', '$title', '$caption')") or die (mysql_error());
    echo "<meta http-equiv='refresh' content='0; url=koleksi-art-work-$id_member.html'>";
		  }
		  }
		  }
		  else{
		  echo"Data Belum Lengkap!!!";
		  echo"<br>Mohon Lengkapi lagi!!!";
		  }
}


//MODUL SIMPAN KOMENTAR FOTO.....
elseif ($_GET[module]=='simpankomentarartwork'){
session_start();
$lindungi_nama=strip_tags($_REQUEST[nama_komentar]);
$lindungi_pesan=strip_tags($_REQUEST[isi_komentar],"<br />");
$ip = $_SERVER['REMOTE_ADDR'];

	if(!empty($_POST['kode'])){
		if($_POST['kode']==$_SESSION['captcha_session']){
    $sql = mysql_query("INSERT INTO komentar_artwork (nama_komentar,isi_komentar,id_member,tgl,jam_komentar,id_pengirim,foto_pengirim,ip_pengirim) 
                        VALUES('$lindungi_nama','$lindungi_pesan','$_POST[id_member]','$tgl_sekarang','$jam_sekarang','$_POST[id_pengirim]',
						'$_POST[foto_pengirim]','$ip')");
						
						 $sqll = mysql_query("INSERT INTO noti(id_member_milik,id_member_terkait,notifications,id_pengirim,nama_pengirim,status) VALUES('$_POST[id_member]','$_POST[id_member]','<a href=member-everydaylikesunday-2009$_POST[id_pengirim]-9002.html>$lindungi_nama</a> mengomentari koleksi Art Work <a href=koleksi-art-work-$_POST[id_member].html>Member ini</a>','$_POST[id_pengirim]','$lindungi_nama','not')");

$noti=mysql_query("select * from komentar_artwork where id_member='$_POST[id_member]' and id_pengirim!='$_POST[id_pengirim]'");
while($nt=mysql_fetch_array($noti)){
$id_semua=$nt[id_pengirim];
 $sqll = mysql_query("INSERT INTO noti(id_member_milik,id_member_terkait,notifications,id_pengirim,nama_pengirim,status) VALUES('$_POST[id_member]','$id_semua','<a href=member-everydaylikesunday-2009$_POST[id_pengirim]-9002.html>$lindungi_nama</a>  mengomentari koleksi Art Work <a href=koleksi-art-work-$_POST[id_member].html>Member ini</a>','$_POST[id_pengirim]','$lindungi_nama','not')");
}
    echo "<meta http-equiv='refresh' content='0; url=koleksi-art-work-$_POST[id].html'>";
		}else{
			echo "Kode yang Anda masukkan tidak cocok<br />
			      <a href=javascript:history.go(-1)><b>Ulangi Lagi</b></a>";

		}
	}else{
		echo "Anda belum memasukkan kode<br />
  	      <a href=javascript:history.go(-1)><b>Ulangi Lagi</b></a>";
	}
}


//MODUL FORGOT PASSWORD......
elseif ($_GET[module]=='lupapassword'){
$email=strip_tags($_REQUEST[emailmember]);
$cari=sprintf("select * from member where email_member='$email'", mysql_real_escape_string($email));
$cek=mysql_query($cari);
$hitung=mysql_num_rows($cek);
$tmpl=mysql_fetch_array($cek);

if($hitung > 0){
$nama_penerima=$tmpl[nama_member];
$reset=$tmpl[password_visible];
$user=$tmpl[username];
$nama_pengirim="Admin EverydayLikeSunday || Gede Suma Wijaya";
$email_tujuan=$tmpl[email_member];
$topik_email="Kehilangan Password Acoount || Everyday Like Sunday";
$link ="<a href='http://everydaylikesunday.co.cc'>Everyday Like Sunday</a>";
$buku1 = "<a href='http://maxikom.co.id/gbshow?id=133'><img src='http://maxikom.co.id/books/133.jpg' border='0'></a>";
$isi_pesan="<font face='Arial, Helvetica, sans-serif' size='2'>Haiii $nama_penerima, salam kenal aja nih.\n<br>";
$isi_pesan.="Sesuai permintaan anda untuk melakukan pengiriman ulang password akun anda pada website $link, \n<br>";
$isi_pesan.="Maka kami kirimkan password anda sesuai yang tercatat pada database kami.\n<br><br>";
$isi_pesan.="Username : $user<br>Password : $reset<br>";
$isi_pesan.="Salam Hormat\n<br><b>Gede Suma Wijaya | Admin ELS</b>\n<br>$link";
$kirim=mail($nama_penerima." <".$email_tujuan.">",$topik_email,$isi_pesan, "From: ".$nama_pengirim."\nContent-Type: text/html; charset=iso-8859-1");
if ($kirim){
echo("Password telah dikirim ke <b>$email_tujuan</b><br><br>");
echo("Silahkan Login ke email anda, untuk mendapatkan password Akun anda.");
}else{ 
echo ("Email tidak dapat dikirim...!!!<br>Mungkin terjadi kesalahan pada koneksi anda...!!!<br>Coba Ulangi Kembali...!!!");
} 
echo"<br><br>Password terkirim...!!!!";
}
else{
echo"Email tidak ditemukan";
}
}
//MODUL DELETE KOMENTAR BERITA...... 
else if($_GET[module]=='deletekomentar'){
mysql_query("DELETE FROM komentar WHERE id_komentar='$_GET[id]'");
echo "<meta http-equiv='refresh' content='0; url=semua-berita-teknologi-informasi.html'>";
}

?>