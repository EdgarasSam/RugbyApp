<?php
include'Database.php';

//result=komanda             result=komanda&zaidejo_id=id
if(isset($_GET["result"]) && $_GET["result"] == "komanda")
{
  if(isset($_GET["zaidejo_id"]) && $_GET["zaidejo_id"] != "")
  {
    $q = "SELECT * FROM komanda WHERE id='".$_GET["zaidejo_id"]."'";
  }
  else
  {
    $q = "SELECT * FROM komanda";
  }

  $sql = mysql_query($q);
  $id = "id";
  $numeris =  "numeris";
  $zaidejo_vardas = "zaidejo_vardas";
  $zaidejo_pavarde = "zaidejo_pavarde";
  $amzius = "amzius";
  while($rows = mysql_fetch_assoc($sql)){

        $arr_rows[] = $rows;
      }
      echo json_encode($arr_rows);
}

//result=rungtynes            result=rungtynes&varzybu_id=id
if(isset($_GET["result"]) && $_GET["result"] == "rungtynes")
{
  if(isset($_GET["varzybu_id"]) && $_GET["varzybu_id"] != "")
  {
    $q = "SELECT * FROM varzybos WHERE id='".$_GET["varzybu_id"]."'";
  }
  else
  {
    $q = "SELECT * FROM varzybos";
  }
$sql = mysql_query($q);
$id = "id";
$komanda1 =  "komanda1";
$taskai1 = "taskai1";
$laikas= "laikas";
$taskai2 = "taskai2";
$komanda2 = "komanda2";
$Salis = "Salis";
$Miestas = "Miestas";
$Data = "Data";
$Adresas = "Adresas";
$Kord_ilgis = "Kord_ilgis";
$Kord_plotis = "Kord_plotis";

while($rows = mysql_fetch_assoc($sql)){
  $arr_rows[] = $rows;
  }
  echo json_encode($arr_rows);
}
//result=lentele           result=lentele&komandos_id=id
if(isset($_GET["result"]) && $_GET["result"] == "lentele")
{
  if(isset($_GET["komandos_id"]) && $_GET["komandos_id"] != "")
  {
    $q = "SELECT * FROM turnyro_lentele WHERE id='".$_GET["komandos_id"]."'";
  }
  else
  {
    $q = "SELECT * FROM turnyro_lentele";
  }
  $sql = mysql_query($q);
$id = "id";
$komandos_pav =  "komandos_pav";
$zaista = "zaista";
$laimeta = "laimeta";
$pralaimeta  = "pralaimeta";
$lygiasios  = "lygiasios";
$tasku_santykis  = "tasku_santykis";
$vieta  = "vieta";

while($rows = mysql_fetch_assoc($sql)){
  $arr_rows[] = $rows;
  }
  echo json_encode($arr_rows);
}
//result=foto         result=foto&mediateka_id=id
if(isset($_GET["result"]) && $_GET["result"] == "foto")
{
  if(isset($_GET["Mediateka_id"]) && $_GET["Mediateka_id"] != "")
  {
    $q = "SELECT * FROM media_foto WHERE Mediateka_id='".$_GET["Mediateka_id"]."'";
  }
  else
  {
    $q = "SELECT * FROM media_foto";
  }
  $sql = mysql_query($q);
  $Media_foto_id = "Media_foto_id";
  $File_dir = "File_dir";
  $File_name = "File_name";
  $Foto_title = "Foto_title";
  $Mediateka_id = "Mediateka_id";

while($rows = mysql_fetch_assoc($sql)){
  $arr_rows[] = $rows;
  }
  echo json_encode($arr_rows);
}
//result=video        result=video&Mediateka_id=id
if(isset($_GET["result"]) && $_GET["result"] == "video")
{
  if(isset($_GET["Mediateka_id"]) && $_GET["Mediateka_id"] != "")
  {
    $q = "SELECT * FROM media_video WHERE Mediateka_id='".$_GET["Mediateka_id"]."'";
  }
  else
  {
    $q = "SELECT * FROM media_video";
  }
  $sql = mysql_query($q);
  $Media_video_id = "Media_video_id";
  $Video_url = "Video_url";
  $Video_photo_url = "Video_photo_url";
  $Video_title = "Video_title";
  $Mediateka_id = "Mediateka_id";

while($rows = mysql_fetch_assoc($sql)){
  $arr_rows[] = $rows;
  }
  echo json_encode($arr_rows);
}
//result=stream        result=stream&Mediateka_id=id
if(isset($_GET["result"]) && $_GET["result"] == "stream")
{
  if(isset($_GET["Mediateka_id"]) && $_GET["Mediateka_id"] != "")
  {
    $q = "SELECT * FROM media_stream WHERE Mediateka_id='".$_GET["Mediateka_id"]."'";
  }
  else
  {
    $q = "SELECT * FROM media_stream";
  }
  $sql = mysql_query($q);
  $Media_stream_id = "Media_stream_id";
  $Stream_url = "Stream_url";
  $Stream_url2 = "Stream_url2";
  $Stream_title = "Stream_title";
  $Mediateka_id = "Mediateka_id";

while($rows = mysql_fetch_assoc($sql)){
  $arr_rows[] = $rows;
  }
  echo json_encode($arr_rows);
}


 ?>
