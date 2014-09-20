<?
include('../../connect.php');
include('../../include/fungsi_indotgl.php');
include('../../include/class_paging.php');
include('../../include/library.php');
include('functions.php');

//---------------------------------------------------------------------MODUL HOME----------------------------------------------------------------------

//HOME.........
if ($_GET[module]=='home'){
echo"<div id='judul'>Home - Root Level</div><br>";
echo"Selamat datang <strong>$_SESSION[namaadmin]</strong>, di sistem Admin / Root website Everyday Like Sunday.";
echo"<br>Privasi tertinggi untuk memodifikasi dan memonitor website Everyday Like Sunday.";
}
//---------------------------------------------------------------------MODUL LOGOUT----------------------------------------------------------------------
//MODUL LOGOUT ADMIN.........
else if($_GET[module]=='logoutadmin'){
  session_start();
  unset($_SESSION[namaadmin],$_SESSION[passwordadmin]);
  echo "<center>Anda telah sukses keluar sistem <b>[LOGOUT]</b><br>Terima kasih atas kunjungan dan partisipasi Anda dalam website <strong>Everyday Like Sunday</strong>!!!<br>Regards <strong>Gede Suma Wijaya</strong> | ELS Developer</center>";
    echo "<meta http-equiv='refresh' content='3; url=../index.php'>";
}
//---------------------------------------------------------------------MODUL UPDATE STATUS----------------------------------------------------------------------
//MODUL UPDATE STATUS.....
else if($_GET[module]=='statusupdate'){
  $p      = new Paging;
  $batas  = 6;
  $posisi = $p->cariPosisi($batas);
$q = mysql_query("SELECT * FROM demo_twitter_timeline ORDER BY ID DESC LIMIT $posisi,$batas");
$timeline='';
while($row=mysql_fetch_assoc($q))
{
	$timeline.=formatTweet($row['id'],$row['tweet'],$row['dt'],$row['id_member'],$row['nama_pengirim'],$row['foto_pengirim']);
}
echo"<div id='judul'>List Status Member</div><br>
<ul class='statuses'>$timeline</ul><br>";
  $jmldata     = mysql_num_rows(mysql_query("SELECT * FROM demo_twitter_timeline"));
  $jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
  $linkHalaman = $p->navHalaman2($_GET[halaman], $jmlhalaman);

  echo "<table align='center' border='0'><tr><td align='center'>$linkHalaman</td></tr></table><br />";
}
//---------------------------------------------------------------------MODUL BERITA----------------------------------------------------------------------
//MODUL DAFTAR BERITA....
else if($_GET[module]=='daftarberita'){
  $p      = new Paging;
  $batas  = 10;
  $posisi = $p->cariPosisi($batas);
  $no=$posisi+1;
$berita=mysql_query("select * from berita order by id_berita DESC LIMIT $posisi,$batas");
$jml=mysql_num_rows(mysql_query("select * from berita"));
echo"<div id='judul'>List Berita</div><br>";
echo"<table border='1' width='100%'>";
echo"<tr bgcolor='#ACD843'><td width='10'>No</td><td width='350' align='center'>Judul Berita</td><td align='center'>Tanggal Posting</td><td align='center'>Action</td></tr>";
while($lsbrt=mysql_fetch_array($berita)){
echo"<tr><td width='10'>$no</td><td width='350'>$lsbrt[judul]</td><td width='100'>$lsbrt[tanggal]</td><td align='center'><a href='edit-berita-$lsbrt[id_berita].html'>Edit</a> | <a href='delete-berita-$lsbrt[id_berita].html' onClick=\"return confirm('Anda yakin ingin menghapus berita ini???')\">Delete</a></td></tr>";
$no++;
}
echo"<tr><td colspan='4' align='center'><a href='tambah-berita.html'><div class='menu-button'>Tambah Berita</div></a>Jumlah Berita : <strong>$jml</strong></td></tr>";
echo"</table>";

  $jmldata     = mysql_num_rows(mysql_query("SELECT * FROM berita"));
  $jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
  $linkHalaman = $p->navHalaman2($_GET[halaman], $jmlhalaman);

  echo "<table align='center' border='0'><tr><td align='center'>$linkHalaman</td></tr></table><br />";
}
//MODUL EDIT BERITA....
else if($_GET[module]=='editberita'){
    $edit = mysql_query("SELECT * FROM berita WHERE id_berita='$_GET[id]'");
    $r    = mysql_fetch_array($edit);

    echo "<div id='judul'>Edit Berita</div>
          <form method=POST enctype='multipart/form-data' action='update-berita-$r[id_berita].html'>
          <input type=hidden name=id value=$r[id_berita]>
          <table border='1'>
          <tr><td width=70>Judul</td>     <td> : <input type=text name='judul' size=90 value='$r[judul]'></td></tr>
          <tr><td>Kategori</td>  <td> : <select name='kategori'>";
 
          $tampil=mysql_query("SELECT * FROM kategori ORDER BY nama_kategori");
          if ($r[id_kategori]==0){
            echo "<option value=0 selected>- Pilih Kategori -</option>";
          }   

          while($w=mysql_fetch_array($tampil)){
            if ($r[id_kategori]==$w[id_kategori]){
              echo "<option value=$w[id_kategori] selected>$w[nama_kategori]</option>";
            }
            else{
              echo "<option value=$w[id_kategori]>$w[nama_kategori]</option>";
            }
          }
    echo "</select></td></tr>
          <tr><td>Isi Berita</td>   <td> <textarea name='isi_berita' style='width: 500px; height: 350px;'>$r[isi_berita]</textarea></td></tr>
          <tr><td>Gambar</td>       <td> :  
          <img src='../../foto_berita/$r[gambar]' width='150'></td></tr>
          <tr><td>Ganti Gbr</td>    <td> : <input type=file name='foto' size=30> *)</td></tr>
          <tr><td colspan=2>*) Apabila gambar tidak diubah, dikosongkan saja.</td></tr>";

    $d = GetCheckboxes('tag', 'tag_seo', 'nama_tag', $r[tag]);

    echo "<tr><td>Tag (Label)</td><td> $d </td></tr>";
 
    echo  "<tr><td colspan=2><input type=submit value=Update>
                            <input type=button value=Batal onclick=self.history.back()></td></tr>
         </table></form>";
}
//MODUL UPDATE BERITA....
else if($_GET[module]=='updateberita'){
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
$lokasi_file    = $_FILES['foto']['tmp_name'];
$judul_seo      = seo_title($_POST['judul']);
$tag=implode(',',$_POST[tag_seo]);
if (empty($lokasi_file)){
    mysql_query("UPDATE berita SET judul       = '$_POST[judul]',
                                   judul_seo   = '$judul_seo', 
                                   id_kategori = '$_POST[kategori]',
                                   tag         = '$tag',
                                   isi_berita  = '$_POST[isi_berita]'  
                             WHERE id_berita   = '$_POST[id]'");
							 echo "<meta http-equiv='refresh' content='0; url=berita-list.html'>";
  }
  else{
        if(is_uploaded_file($_FILES['foto']['tmp_name'])){
          if (isset ($_FILES['foto'])){
              $imagename = stripslashes($_FILES['foto']['name']);
              $source = $_FILES['foto']['tmp_name'];
              $target = "../../foto_berita/".$imagename;
              move_uploaded_file($source, $target);
 
              $imagepath = $imagename;
              $save = "../../foto_berita/" . $imagename; //This is the new file you saving
              $file = "../../foto_berita/" . $imagepath; //This is the original file
 
              list($width, $height) = getimagesize($file) ; 
 
              $modwidth = 200; 
 
              $diff = $width / $modwidth;
 
              $modheight = $height / $diff; 
              $tn = imagecreatetruecolor($modwidth, $modheight) ; 
              $image = imagecreatefromjpeg($file) ; 
              imagecopyresampled($tn, $image, 0, 0, 0, 0, $modwidth, $modheight, $width, $height) ; 
 
              imagejpeg($tn, $save, 100) ;              
          }
		 //query SQL
		  mysql_query("UPDATE berita SET judul       = '$_POST[judul]',
                                   judul_seo   = '$judul_seo', 
                                   id_kategori = '$_POST[kategori]',
                                   tag         = '$tag',
                                   isi_berita  = '$_POST[isi_berita]',
                                   gambar      = '$imagename'   
                             WHERE id_berita   = '$_POST[id]'");
							echo "<meta http-equiv='refresh' content='0; url=berita-list.html'>";
		  }
	}
}
//MODUL DELETE BERITA....
else if($_GET[module]=='deleteberita'){  
mysql_query("DELETE FROM berita WHERE id_berita='$_GET[id]'");
echo "<meta http-equiv='refresh' content='0; url=berita-list.html'>";
}
//MODUL TAMBAH BERITA....
else if($_GET[module]=='tambahberita'){ 
echo "<div id='judul'>Tambah Berita</div>
          <form method=POST action='input-berita.html'>
          <table border='1'>
          <tr><td width=70>Judul</td>     <td> : <input type=text name='judul' size=90></td></tr>
          <tr><td>Kategori</td>  <td> : 
          <select name='kategori'>
            <option value=0 selected>- Pilih Kategori -</option>";
            $tampil=mysql_query("SELECT * FROM kategori ORDER BY nama_kategori");
            while($r=mysql_fetch_array($tampil)){
              echo "<option value=$r[id_kategori]>$r[nama_kategori]</option>";
            }
    echo "</select></td></tr>
          <tr><td>Isi Berita</td>  <td> <textarea name='isi_berita' style='width: 500px; height: 350px;'></textarea></td></tr>
          <tr><td>Gambar</td>      <td> : <input type=file name='foto' size=40> 
                                          <br>Tipe gambar harus JPG/JPEG dan ukuran lebar maks: 400 px</td></tr>";

    $tag = mysql_query("SELECT * FROM tag ORDER BY tag_seo");
    echo "<tr><td>Tag (Label)</td><td> ";
    while ($t=mysql_fetch_array($tag)){
      echo "<input type=checkbox value='$t[tag_seo]' name=tag_seo[]>$t[nama_tag] ";
    }
    
    echo "</td></tr>
          <tr><td colspan=2><input type=submit value=Simpan>
                            <input type=button value=Batal onclick=self.history.back()></td></tr>
          </table></form>";
}
//MODUL INPUT BERITA...... 
else if($_GET[module]=='inputberita'){
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
$lokasi_file    = $_FILES['foto']['tmp_name'];
$judul_seo      = seo_title($_POST['judul']);
$tag=implode(',',$_POST[tag_seo]);
if (empty($lokasi_file)){
     $query=mysql_query("INSERT INTO berita(id_kategori,judul,judul_seo,isi_berita,tanggal,jam,tag)  VALUES('$_POST[kategori]','$_POST[judul]','$judul_seo','$_POST[isi_berita]','$tgl_sekarang','$jam_sekarang','$tag')");
								   echo "<meta http-equiv='refresh' content='0; url=berita-list.html'>";
  }
  else{
        if(is_uploaded_file($_FILES['foto']['tmp_name'])){
          if (isset ($_FILES['foto'])){
              $imagename = stripslashes($_FILES['foto']['name']);
              $source = $_FILES['foto']['tmp_name'];
              $target = "../../foto_berita/".$imagename;
              move_uploaded_file($source, $target);
 
              $imagepath = $imagename;
              $save = "../../foto_berita/" . $imagename; //This is the new file you saving
              $file = "../../foto_berita/" . $imagepath; //This is the original file
 
              list($width, $height) = getimagesize($file) ; 
 
              $modwidth = 200; 
 
              $diff = $width / $modwidth;
 
              $modheight = $height / $diff; 
              $tn = imagecreatetruecolor($modwidth, $modheight) ; 
              $image = imagecreatefromjpeg($file) ; 
              imagecopyresampled($tn, $image, 0, 0, 0, 0, $modwidth, $modheight, $width, $height) ; 
 
              imagejpeg($tn, $save, 100) ;              
          }
		 //query SQL
		       $query=mysql_query("INSERT INTO berita(id_kategori,judul,judul_seo,isi_berita,tanggal,jam,gambar,tag)  VALUES('$_POST[kategori]','$_POST[judul]','$judul_seo','$_POST[isi_berita]','$tgl_sekarang','$jam_sekarang','$imagename','$tag')");
								   echo "<meta http-equiv='refresh' content='0; url=berita-list.html'>";
	}
	}
}
//---------------------------------------------------------------------MODUL MEMBER----------------------------------------------------------------------
//MODUL LIST MEMBER...... 
else if($_GET[module]=='daftarmember'){
  $p      = new Paging;
  $batas  = 15;
  $posisi = $p->cariPosisi($batas);
  $i=0;
  $kolom = 5;
$query_sql=mysql_query("select * from member order by id_member DESC LIMIT $posisi,$batas");
echo"<table align='center' width='500' border='1'>";
while($mbr=mysql_fetch_array($query_sql)){
if ($i >= $kolom){
    echo "</tr><tr>";
      $i = 0;
  }
  $i++;
  echo "<td align='center' width='130'><div class='pic'>
  <a href=../../member-everydaylikesunday-2009$mbr[id_member]-9002.html><img src='../../member/$mbr[foto_kecil]' class='image' width='80' height='80'></a>
  <a href='delete-member-$mbr[id_member].html' onClick=\"return confirm('Anda yakin ingin menghapus member ini???')\">Delete</a>
    </div></td>";
}
echo"</table>";
  $jmldata     = mysql_num_rows(mysql_query("select * from member"));
  $jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
  $linkHalaman = $p->navHalaman2($_GET[halaman], $jmlhalaman);
    echo "<table align='center' width='100%'><tr><td align='center'>Jumlah Member Saat ini : <b>$jmldata Member Aktif</b></td></tr></table>
	<table align='center'><tr><td align='center'>$linkHalaman </td></tr></table>";
}
//MODUL DELETE MEMBER...... 
else if($_GET[module]=='deletemember'){
mysql_query("DELETE FROM member WHERE id_member='$_GET[id]'");
echo "<meta http-equiv='refresh' content='0; url=list-member.html'>";
}

//----------------------------------------------------------------------MODUL TAG---------------------------------------------------------------------
//MODUL TAG BERITA...... 
else if($_GET[module]=='tagberita'){
  $p      = new Paging;
  $batas  = 10;
  $posisi = $p->cariPosisi($batas);
  $no=$posisi+1;
  $jmldata     = mysql_num_rows(mysql_query("select * from tag"));
echo "<div id='judul'>Tag Berita</div>
          <table border='1'>
          <tr bgcolor='#ACD843' align='center'><td>No</td><td>Nama Tag</td><td>Action</td></tr>"; 
    $tampil=mysql_query("SELECT * FROM tag ORDER BY id_tag DESC LIMIT $posisi,$batas");
    while ($r=mysql_fetch_array($tampil)){
       echo "<tr><td>$no</td>
             <td>$r[nama_tag]</td>
             <td><a href='edit-tag-$r[id_tag].html'>Edit</a> | 
	               <a href='delete-tag-$r[id_tag].html' onClick=\"return confirm('Anda yakin ingin menghapus tag ini???')\">Hapus</a>
             </td></tr>";
      $no++;
    }
	echo"<tr><td colspan='4' align='center'><a href='tambah-tag.html'><div class='menu-button'>Tambah Tag</div></a>Jumlah Tag : <strong>$jmldata</strong></td></tr>";
    echo "</table>";
  $jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
  $linkHalaman = $p->navHalaman2($_GET[halaman], $jmlhalaman);
	echo"<table align='center'><tr><td align='center'>$linkHalaman </td></tr></table>";
}
//MODUL EDIT TAG......
else if($_GET[module]=='edittag'){
$edit=mysql_query("SELECT * FROM tag WHERE id_tag='$_GET[id]'");
    $r=mysql_fetch_array($edit);

    echo "<div id='judul'>Edit Tag</div>
          <form method=POST action='update-tag.html'>
          <input type=hidden name=id value='$r[id_tag]'>
          <table>
          <tr><td>Nama Tag</td><td> : <input type=text name='nama_tag' value='$r[nama_tag]'></td></tr>
          <tr><td colspan=2><input type=submit value=Update>
                            <input type=button value=Batal onclick=self.history.back()></td></tr>
          </table></form>";
		  }
//MODUL DELETE TAG......
else if($_GET[module]=='deletetag'){
mysql_query("DELETE FROM tag WHERE id_tag='$_GET[id]'");
echo "<meta http-equiv='refresh' content='0; url=tag-berita.html'>";
}
//MODUL TAMBAH TAG......
else if($_GET[module]=='tambahtag'){
echo "<div id='judul'>Tambah Tag</div>
          <form method=POST action='input-tag.html'>
          <table>
          <tr><td>Nama Tag</td><td> : <input type=text name='nama_tag'></td></tr>
          <tr><td colspan=2><input type=submit name=submit value=Simpan>
                            <input type=button value=Batal onclick=self.history.back()></td></tr>
          </table></form>";
}
//MODUL INPUT TAG......
else if($_GET[module]=='inputtag'){
$tag_seo = seo_title($_POST['nama_tag']);
mysql_query("INSERT INTO tag(nama_tag,tag_seo) VALUES('$_POST[nama_tag]','$tag_seo')");
echo "<meta http-equiv='refresh' content='0; url=tag-berita.html'>";
}
//MODUL UPDATE TAG......
else if($_GET[module]=='updatetag'){
  $tag_seo = seo_title($_POST['nama_tag']);
  mysql_query("UPDATE tag SET nama_tag = '$_POST[nama_tag]', tag_seo='$tag_seo' WHERE id_tag = '$_POST[id]'");
  echo "<meta http-equiv='refresh' content='0; url=tag-berita.html'>";
  }
?>