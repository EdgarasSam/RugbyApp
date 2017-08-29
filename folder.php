<?php
//delete komanda
include'Database.php';
include 'headeris.html';
//delete komanda
if(isset($_GET['fold'])){
$Media_fodo_id = $_GET['fold'];
//if(isset($_POST['submit']) && $_POST['submit']){
      $foldername = $Media_fodo_id;
      $structure = dirname(__FILE__).DIRECTORY_SEPARATOR.$foldername;

      if (!mkdir($structure, 0777, true)) {
        die('Failed to create folders...');
      }
}
//<form method="post" action="#">
//<input type="text" name="foldername">
//<input type="submit" name="submit" value="Create Folder">
//</form>
include 'footeris.html';
?>
