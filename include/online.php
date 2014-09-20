<?php
include('connect.php');
$db_table= "visits"; 
$db = mysql_connect($host,$user,$pass);
$vis_ip = ip2long($_SERVER['REMOTE_ADDR']);
$time = time();
$new_vis = 1;
$get_ip = mysql_query("SELECT * FROM ".$db_table." WHERE vis_ip=".$vis_ip." LIMIT 1");
while ($row=mysql_fetch_object($get_ip)){
mysql_query("UPDATE ".$db_table." SET vis_time='$time' WHERE vis_ip='$vis_ip'") 
or die (mysql_error());
$new_vis = 0; }
if ($new_vis == 1){
mysql_query("INSERT INTO ".$db_table." (vis_ip, vis_time) VALUES ('$vis_ip','$time')") 
or die (mysql_error());}
$tcheck = time() - (60 * 10);
$query = mysql_query("SELECT * FROM ".$db_table." WHERE vis_time > $tcheck");
$onlinenow = mysql_num_rows($query);
if($onlinenow == 1){
echo"<font color='white'><strong>[</strong> Online : <b>$onlinenow User</b> <strong>]</strong></font>";
}else{
echo"<font color='white'>Online : <b>$onlinenow User</b></font>";}
?>  