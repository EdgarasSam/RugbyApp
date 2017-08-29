<?php
include 'Database.php';
require_once 'funkcijos.php';
if(isset($_POST["submit"])) {
$target_dir = "mediateka/Dideles/";
$dest = "mediateka/Mazos/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$name = basename($_FILES["fileToUpload"]["name"]);
$id = $_GET["submit"];
$File_dir = "mediateka/Dideles";
$File_name= $name;
$Foto_title= $_POST['Foto_title'];
$Mediateka_id= $id;
$Tipas = 'foto';
$query = "INSERT INTO `media_foto`(`File_dir`,`File_name`, `Foto_title`, `Mediateka_id`,`Tipas`) VALUES ('$File_dir','$File_name','$Foto_title','$Mediateka_id','$Tipas')";
mysql_query($query);
$uploadOk = 1;
$dest = "mediateka/Mazos/$name";
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
//echo $_FILES["fileToUpload"]["name"];
// Check if image file is a actual image or fake image
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
      //  echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        //echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
   echo "Atsiprašome, bet tokia nuotrauka jau yra įkelta.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 10000000) {
    //echo "Maksimalus dydis 10Mb";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "JPG" && $imageFileType != "JPEG" && $imageFileType != "jpeg" && $imageFileType != "png" && $imageFileType != "PNG") {
    echo "Galima įkelti tik JPG, JPEG nuotraukų tipus.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Atsiprašome, bet jūsų failas neįkeltas.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        //echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
        echo '<meta http-equiv="refresh" content ="0;url=media.php?media='.$id.'">';
        if ($imageFileType == "jpg" || $imageFileType == "JPG"  || $imageFileType == "jpeg"  || $imageFileType == "JPEG" )
        {
          //$image = resize_imagejpg("mediateka/Dideles/$name", 200, 200);
          $image = make_thumb("mediateka/Dideles/$name","mediateka/Mazos/$name",200);
          $image1 = make_thumb("mediateka/Dideles/$name","mediateka/Vidutines/$name",500);
          //copy($image,$dest);
          //echo "pateko i jpg";
        }

        if ($imageFileType == "gif")
        {
          $image = make_thumb("mediateka/Dideles/$name","mediateka/Mazos/$name",200);
          $image1 = make_thumb("mediateka/Dideles/$name","mediateka/Vidutines/$name",500);
          //echo "pateko i gif";
        }
        if ($imageFileType == "png")
        {
          $image = make_thumbpng("mediateka/Dideles/$name","mediateka/Mazos/$name",200);
          $image1 = make_thumbpng("mediateka/Dideles/$name","mediateka/Vidutines/$name",500);
          //echo "pateko i png";
        }

    } else {
        echo "Iškilo klaida keliant jūsų nuotrauką";
    }
}





/*<form action="uploadphoto.php" method="POST" enctype="multipart/form-data">
<tr><td>File_dir: <input type="text" class="resizedzaidejovar" size="20px" name="File_dir"></td></tr>
<tr><td>File_name: <input type="text" class="resizedzaidejovar" name="File_name"></td></tr>
<tr><td>Pavadinimas: <input type="text"class="resizedzaidejopav"  name="Foto_title"></td></tr>
<tr><td>Mediateka_id: <input type="text"  class="resizedzaidejonvar" name="Mediateka_id"></td></tr>
<input type="file" name="file" id="file" />
<span class="help-block">Galimi nuotraukų tipai - jpg, jpeg, png, gif</span>*/

 ?>
