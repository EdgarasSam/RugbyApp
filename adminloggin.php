<?php
session_start();
if(isset($_SESSION['username'])){
  include('headeris.html');

  if(!isset($_GET["page"]))
  {
    require_once("adminloggin.php");
  }
  else
  {
    if($_GET["page"] == "")
    {
      require_once("main.php");
    }
    if($_GET["page"] == "rungtynes")
    {
      require_once("rungtynes.php");
    }
    if($_GET["page"] == "info")
    {
      require_once("varzybu_info.php");
    }
    if($_GET["page"] == "galerija")
    {
      require_once("galerija.php");
    }
    if($_GET["page"] == "komanda")
    {
      require_once("komanda.php");
    }
    if($_GET["page"] == "photos")
    {
      require_once("photos.php");
    }
    if($_GET["page"] == "mediateka")
    {
      require_once("mediateka.php");
    }
    if($_GET["page"] == "TurnyrineLentele")
    {
      require_once("TurnyrineLentele.php");
    }
    elseif($_GET["page"] == "logout")
    {
      session_destroy();
      echo "<meta http-equiv='refresh' content ='0;url=index.php'>";
    }
  }
  include('footeris.html');
}
else {
  echo "<h>Jums reikia prisijungti, norit pamatyti puslapio turinį :)</h>";
  echo "<meta http-equiv='refresh' content ='5;url=index.php'>";
}
?>
