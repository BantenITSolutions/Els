<?php
class Paging{
// Fungsi untuk mencek halaman dan posisi data
function cariPosisi($batas){
if(empty($_GET[halaman])){
	$posisi=0;
	$_GET[halaman]=1;
}
else{
	$posisi = ($_GET[halaman]-1) * $batas;
}
return $posisi;
}
function cariPosisi2($batas){
if(empty($_GET[halaman2])){
	$posisi=0;
	$_GET[halaman2]=1;
}
else{
	$posisi = ($_GET[halaman2]-1) * $batas;
}
return $posisi;
}

// Fungsi untuk menghitung total halaman
function jumlahHalaman($jmldata, $batas){
$jmlhalaman = ceil($jmldata/$batas);
return $jmlhalaman;
}

// Fungsi untuk link halaman 1,2,3 (untuk admin)
function navHalaman($halaman_aktif, $jmlhalaman){
$link_halaman = "";

// Link halaman 1,2,3, ...
if (($halaman_aktif-1) > 0)
{
$previous = $halaman_aktif-1;
$link_halaman .= "<a href=$_SERVER[PHP_SELF]?module=$_GET[module]&id=$_GET[id]&halaman2=$previous><div class='pagingpage'><< Previous</div></a> <div class='batas-paging'>||</div> ";
}
else {
$link_halaman .= "<div class='pagingpage-select'> << Previous </div> <div class='batas-paging'>||</div> ";
}
if ($halaman_aktif < $jmlhalaman)
{
$next=$halaman_aktif+1;
$link_halaman .= " <a href=$_SERVER[PHP_SELF]?module=$_GET[module]&id=$_GET[id]&halaman2=$next><div class='pagingpage'>Next >></div></a> ";
}
else {
$link_halaman .= "<div class='pagingpage-select'> Next >> </div>";
}
return $link_halaman;
}

// Fungsi untuk link halaman 1,2,3 (untuk pengunjung)
function navHalaman2($halaman_aktif, $jmlhalaman){
$link_halaman = "";

// Link halaman 1,2,3, ...
if (($halaman_aktif-1) > 0)
{
$previous = $halaman_aktif-1;
$link_halaman .= "<a href=$_SERVER[PHP_SELF]?module=$_GET[module]&id=$_GET[id]&halaman=$previous#status><div class='pagingpage'><< Previous</div></a> <div class='batas-paging'>||</div> ";
}
else {
$link_halaman .= "<div class='pagingpage-select'> << Previous </div> <div class='batas-paging'>||</div> ";
}
if ($halaman_aktif < $jmlhalaman)
{
$next=$halaman_aktif+1;
$link_halaman .= " <a href=$_SERVER[PHP_SELF]?module=$_GET[module]&id=$_GET[id]&halaman=$next#status><div class='pagingpage'>Next >></div></a> ";
}
else {
$link_halaman .= "<div class='pagingpage-select'> Next >> </div>";
}
return $link_halaman;
}
}
?>
