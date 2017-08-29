<?php
//delete komanda
include'Database.php';
//delete komanda
if(isset($_GET['del'])){
  $id = $_GET['del'];
$sql = "DELETE FROM `komanda` WHERE id=$id";
$res = mysql_query($sql) or die("error".mysql_error());
echo "<meta http-equiv='refresh' content ='0;url=adminloggin.php?page=komanda'>";
}

//delete turnyro lentele
if(isset($_GET['delt'])){
  $id = $_GET['delt'];
$sql = "DELETE FROM `turnyro_lentele` WHERE id=$id";
$res = mysql_query($sql) or die("error".mysql_error());
echo "<meta http-equiv='refresh' content ='0;url=adminloggin.php?page=lentele'>";
}
// delete varzybos
if(isset($_GET['deli'])){
  $id = $_GET['deli'];
$sql = "DELETE FROM `varzybos` WHERE id=$id";
$res = mysql_query($sql) or die("error".mysql_error());
echo "<meta http-equiv='refresh' content ='0;url=adminloggin.php?page=rungtynes'>";
}
// delete informacija
if(isset($_GET['delinfo'])){
  $id = $_GET['delinfo'];
$sql = "DELETE FROM `varzybu_vieta` WHERE id=$id";
$res = mysql_query($sql) or die("error".mysql_error());
echo "<meta http-equiv='refresh' content ='0;url=adminloggin.php?page=info'>";
}
//delete mediateka
if(isset($_GET['delm'])){
$Mediateka_id = $_GET['delm'];
$sql = "DELETE FROM `mediateka` WHERE Mediateka_id=$Mediateka_id";
$res = mysql_query($sql) or die("error".mysql_error());
echo "<meta http-equiv='refresh' content ='0;url=adminloggin.php?page=mediateka'>";
}
//delete galerija
if(isset($_GET['delga'])){
  $id = $_GET['delga'];
$sql = "DELETE FROM `galerija` WHERE id=$id";
$res = mysql_query($sql) or die("error".mysql_error());
echo "<meta http-equiv='refresh' content ='0;url=adminloggin.php?page=galerija'>";
}
//delete Media_stream
if(isset($_GET['delstr'])){
$Media_stream_id = $_GET['delstr'];
$id = $_GET['id'];
$sql = "DELETE FROM `media_stream` WHERE Media_stream_id=$Media_stream_id";
$res = mysql_query($sql) or die("error".mysql_error());
echo "<meta http-equiv='refresh' content ='0;url=media.php?media=".$id."'>";
}
//delete Media_video
if(isset($_GET['delvid'])){
$id = $_GET['id'];
$Media_video_id = $_GET['delvid'];
$sql = "DELETE FROM `media_video` WHERE Media_video_id=$Media_video_id";
$res = mysql_query($sql) or die("error".mysql_error());
echo "<meta http-equiv='refresh' content ='0;url=media.php?media=".$id."'>";
}
//delete Media_foto
if(isset($_GET['delfot'])){
$Media_foto_id = $_GET['delfot'];
$File_name = $_GET['pav'];
$id = $_GET['id'];
$sql = "DELETE FROM `media_foto` WHERE Media_foto_id=$Media_foto_id";
$res = mysql_query($sql) or die("error".mysql_error());
unlink("mediateka/Dideles/$File_name");
unlink("mediateka/Vidutines/$File_name");
unlink("mediateka/Mazos/$File_name");
echo "<meta http-equiv='refresh' content ='0;url=media.php?media=".$id."'>";
//  echo " istryne ir unlinkino";
}
?>
