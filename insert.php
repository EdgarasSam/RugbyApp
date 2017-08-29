<?php
include'Database.php';
//insert komanda
if(isset($_POST['komandains'])){
  $numeris =  $_POST['numeris'];
  $zaidejo_vardas = $_POST['zaidejo_vardas'];
  $zaidejo_pavarde = $_POST['zaidejo_pavarde'];
  $amzius = $_POST['amzius'];
$query = "INSERT INTO `komanda`(`numeris`,`zaidejo_vardas`, `zaidejo_pavarde`, `amzius`) VALUES ($numeris,'$zaidejo_vardas','$zaidejo_pavarde',$amzius)";
mysql_query($query);
//echo $query;
echo "<meta http-equiv='refresh' content ='0;url=adminloggin.php?page=komanda'>";
}
// turnyro_lentele insert
if(isset($_POST['turna'])){
  $komandos_pav = $_POST['komandos_pav'];
  $zaista = $_POST['zaista'];
  $laimeta = $_POST['laimeta'];
  $pralaimeta  = $_POST['pralaimeta'];
  $lygiasios  = $_POST['lygiasios'];
  $tasku_santykis  = $_POST['tasku_santykis'];
  $vieta  = $_POST['vieta'];
  $Taskai  = $_POST['Taskai'];
$query = "INSERT INTO `turnyro_lentele`(`komandos_pav`,`zaista`, `laimeta`, `pralaimeta`, `lygiasios`, `tasku_santykis`, `vieta`,`Taskai`) VALUES ('$komandos_pav',$zaista,$laimeta,$pralaimeta,$lygiasios,'$tasku_santykis',$vieta,$Taskai)";
mysql_query($query);
//echo $query;
echo "<meta http-equiv='refresh' content ='0;url=adminloggin.php?page=lentele'>";
}
//rungtyniu insert
if(isset($_POST['rungtynes'])){
  $komanda1 = $_POST['komanda1'];
  $taskai1 = $_POST['taskai1'];
  $laikas= $_POST['laikas'];
  $taskai2 = $_POST['taskai2'];
  $komanda2 = $_POST['komanda2'];
  $query = "INSERT INTO `varzybos`(`komanda1`,`taskai1`, `laikas`, `taskai2`, `komanda2`) VALUES ('$komanda1',$taskai1,'$laikas',$taskai2,'$komanda2')";
  mysql_query($query);
  //echo $query;
  //echo "Atnaujino";
  echo "<meta http-equiv='refresh' content ='0;url=adminloggin.php?page=rungtynes'>";
}
//informacijos insert
if(isset($_POST['info'])){
  $Salis = $_POST['Salis'];
  $Miestas = $_POST['Miestas'];
  $Data = $_POST['Data'];
  $Adresas = $_POST['Adresas'];
  $Kord_ilg = $_POST['Kord_ilg'];
  $Kord_plot = $_POST['Kord_plot'];
  $query = "INSERT INTO `varzybu_vieta`(`Salis`, `Miestas`, `Data`, `Adresas`, `Kord_ilg`, `Kord_plot`) VALUES ('$Salis','$Miestas','$Data','$Adresas','$Kord_ilg','$Kord_plot')";
  mysql_query($query);
  //echo $query;
  //echo "Atnaujino";
  echo "<meta http-equiv='refresh' content ='0;url=adminloggin.php?page=info'>";
}
//live rungtyniu insert
if(isset($_POST['media'])){
  $Title = $_POST['Title'];
  $query = "INSERT INTO `mediateka`(`Title`) VALUES ('$Title')";
  mysql_query($query);
  //echo $query;
  //echo "Atnaujino";
  echo "<meta http-equiv='refresh' content ='0;url=adminloggin.php?page=mediateka'>";
}
//nuotrauku talpinimas
if(isset($_POST['galerija'])){

for($i=0; $i<count($_FILES["nuotraukos"]["name"]); $i++)

{
  $imageName= $_FILES["nuotraukos"]["name"][$i];
  $imageData= $_FILES["nuotraukos"]["tmp_name"][$i];
  $imageType= $_FILES["nuotraukos"]["type"][$i];
  $pavadinimas = $_POST['pavadinimas'];
  $galerijos_id= $_POST['galerijos_id'];
  //$nuotraukos = $_POST['nuotraukos'];
  if(substr($imageType,0,5) == "image")
  {
        $query= "INSERT INTO `galerija` (`galerijos_id`,`pavadinimas`,`nuotraukos`) VALUES ($galerijos_id,'$pavadinimas','$imageData')";
        mysql_query($query);
        //echo $query;
        echo "<meta http-equiv='refresh' content ='0;url=adminloggin.php?page=galerija'>";
  }
  else {
      echo "Galima kelti tik nuotraukas";
  }
}
}
//media_video insert
if(isset($_POST['video'])){
  $id = $_GET['id'];
  $Video_url= $_POST['Video_url'];
  $Video_photo_url = $_POST['Video_photo_url'];
  $Video_title= $_POST['Video_title'];
  $Mediateka_id= $id;
  $Tipas = 'video';
  $query = "INSERT INTO `media_video`(`Video_url`,`Video_photo_url`, `Video_title`, `Mediateka_id`,`Tipas`) VALUES ('$Video_url','$Video_photo_url','$Video_title','$Mediateka_id','$Tipas')";
  mysql_query($query);
  //echo $query;
  //echo "Atnaujino";
  echo "<meta http-equiv='refresh' content ='0;url=media.php?media=".$id."'>";
}
//media_stream insert
if(isset($_POST['stream'])){
  $id = $_GET["stream"];
  $Stream_url= $_POST['Stream_url'];
  $Stream_url2 = $_POST['Stream_url2'];
  $Stream_title= $_POST['Stream_title'];
  $Mediateka_id= $id;
  $Tipas = 'stream';
  $query = "INSERT INTO `media_stream`(`Stream_url`,`Stream_url2`, `Stream_title`, `Mediateka_id`,`Tipas`) VALUES ('$Stream_url','$Stream_url2','$Stream_title','$Mediateka_id','$Tipas')";
  mysql_query($query);
  //echo $query;
  //echo "Atnaujino";
  echo "<meta http-equiv='refresh' content ='0;url=media.php?media=".$id."'>";
}
//media_fotos insert
/*if(isset($_POST['fotos']) && $_FILES['file']['name'] != ''){
  $File_dir = $_POST['File_dir'];
  $File_name= $_POST['File_name'];
  $Foto_title= $_POST['Foto_title'];
  $Mediateka_id= $_POST['Mediateka_id'];
  $query = "INSERT INTO `media_foto`(`File_dir`,`File_name`, `Foto_title`, `Mediateka_id`) VALUES ('$File_dir','$File_name','$Foto_title','$Mediateka_id')";
  mysql_query($query);
  $extension = end(explode(".", $_FILES['file']['name']));
  $allowed_type = array("jpg", "jpeg", "png", "gif");
  if(in_array($extension, $allowed_type))
  {
       $new_name = rand() . "." . $extension;
       $path = "" . $new_name;
       if(move_uploaded_file($_FILES['file']['tmp_name'], $path))
       {
            echo '
                 <div class="col-md-8">
                      <img src="'.$path.'" class="img-responsive" />
                 </div>
                 <div class="col-md-4">
                      <button type="button" data-path="'.$path.'" id="remove_button" class="btn btn-danger">x</button>
                 </div>
                  <meta http-equiv="refresh" content ="0;url=adminloggin.php?page=foto">
                 ';
       }
  }
  else
  {
       echo '<script>alert("Invalid File Formate")</script>';
  }

else
{
  echo '<script>alert("Please Select File")</script>';
}
  //echo $query;
  //echo "Atnaujino";
}*/

?>
