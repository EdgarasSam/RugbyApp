<?php
include'Database.php';
//insert komanda
if(isset($_POST['update'])){
  $id = (int)$_POST['id'];
  $numeris =  mysql_real_escape_string($_POST['numeris']);
  $zaidejo_vardas = mysql_real_escape_string($_POST['zaidejo_vardas']);
  $zaidejo_pavarde = mysql_real_escape_string($_POST['zaidejo_pavarde']);
  $amzius = mysql_real_escape_string($_POST['amzius']);
$query = "UPDATE `komanda` SET `numeris`=$numeris,`zaidejo_vardas`='$zaidejo_vardas',`zaidejo_pavarde`='$zaidejo_pavarde',`amzius`=$amzius WHERE `id`=$id";
mysql_query($query);
//echo $query;
echo "<meta http-equiv='refresh' content ='0;url=adminloggin.php?page=komanda'>";
}
//turnyro_lenteles update
if(isset($_POST['updatetur'])){
  $id = $_POST['id'];
  $komandos_pav = $_POST['komandos_pav'];
  $zaista = $_POST['zaista'];
  $laimeta = $_POST['laimeta'];
  $pralaimeta  = $_POST['pralaimeta'];
  $lygiasios  = $_POST['lygiasios'];
  $tasku_santykis  = $_POST['tasku_santykis'];
  $vieta  = $_POST['vieta'];
  $Taskai  = $_POST['Taskai'];
$query = "UPDATE `turnyro_lentele` SET `komandos_pav`='$komandos_pav',`zaista`=$zaista,`laimeta`=$laimeta,`pralaimeta`=$pralaimeta,`lygiasios`=$lygiasios,`tasku_santykis`='$tasku_santykis',`vieta`=$vieta,`Taskai`=$Taskai WHERE `id`=$id";
mysql_query($query);
//echo $query;
echo "<meta http-equiv='refresh' content ='0;url=adminloggin.php?page=lentele'>";
}
//rungtyniu update
if(isset($_POST['updaterung'])){
  $id = $_POST['id'];
  $komanda1 = $_POST['komanda1'];
  $taskai1 = $_POST['taskai1'];
  $laikas= $_POST['laikas'];
  $taskai2 = $_POST['taskai2'];
  $komanda2 = $_POST['komanda2'];
  $query = "UPDATE `varzybos` SET `komanda1`='$komanda1',`taskai1`=$taskai1,`laikas`='$laikas',`taskai2`=$taskai2,`komanda2`='$komanda2' WHERE `id`=$id";
  mysql_query($query);
  //echo $query;
  //echo 'Atnaujino';
  echo "<meta http-equiv='refresh' content ='0;url=adminloggin.php?page=rungtynes'>";
}

//informacijos update
//rungtyniu update
if(isset($_POST['updateinfo'])){
  $id = $_POST['id'];
  $Salis = $_POST['Salis'];
  $Miestas = $_POST['Miestas'];
  $Data = $_POST['Data'];
  $Adresas = $_POST['Adresas'];
  $Kord_ilg = $_POST['Kord_ilg'];
  $Kord_plot = $_POST['Kord_plot'];
  $query = "UPDATE `varzybu_vieta` SET `Salis`='$Salis',`Miestas`='$Miestas',`Data`='$Data',`Adresas`='$Adresas',`Kord_ilg`='$Kord_ilg',`Kord_plot`='$Kord_plot' WHERE `id`=$id";
  mysql_query($query);
  //echo $query;
  //echo 'Atnaujino';
  echo "<meta http-equiv='refresh' content ='0;url=adminloggin.php?page=info'>";
}
?>
