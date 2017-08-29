<?php
include'Database.php';
if(isset($_GET['upd'])){
  $id =$_GET['upd'];
$query = "SELECT * FROM `komanda` WHERE id=$id";
$numeris =  $_GET['num'];
$zaidejo_vardas = $_GET['name'];
$zaidejo_pavarde = $_GET['pav'];
$amzius = $_GET['amz'];
$result = mysql_query($query);
if (! $result){
   throw new My_Db_Exception('Database error: ' . mysql_error());
}
  while($row = mysql_fetch_assoc($result)) {
        $numeris = $row['numeris'];
        $zaidejo_vardas = $row['zaidejo_vardas'];
        $zaidejo_pavarde = $row['zaidejo_pavarde'];
        $amzius = $row['amzius'];

    }
echo '
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="assets/img/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Vairasapp</title>

	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="style.css"/>

    <!-- Animation library for notifications   -->
    <link href="assets/css/animate.min.css" rel="stylesheet"/>

    <!--  Light Bootstrap Table core CSS    -->
    <link href="assets/css/light-bootstrap-dashboard.css" rel="stylesheet"/>


    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="http://fonts.googleapis.com/css?family=Roboto:400,700,300" rel="stylesheet" type="text/css">
    <link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />

    <!--   Core JS Files   -->
  <script src="http://code.jquery.com/jquery-2.1.4.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.min.js"></script>

  <!--  Checkbox, Radio & Switch Plugins -->
  <script src="assets/js/bootstrap-checkbox-radio-switch.js"></script>

</head>

<body>

<div class="wrapper">
    <div class="sidebar" data-color="blue" data-image="assets/img/sidebar-1.jpg">

    <!--

        Tip 1: you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple"
        Tip 2: you can also add an image using data-image tag

    -->
    <div class="sidebar-wrapper">
          <div class="logo">
            <b>Vairas RC</b>
          </div>

          <ul class="nav" id="navi">
              <li >
                  <a href="adminloggin.php?page" class="baba ASAS">
                      <i class="pe-7s-user"></i>
                      <p>Pagrindinis</p>
                  </a>
              </li>
              <li >
                  <a href="adminloggin.php?page=rungtynes">
                      <i class="pe-7s-note2"></i>
                      <p>Rungtynės</p>
                  </a>
              </li>
              <li >
                  <a href="adminloggin.php?page=info">
                      <i class="pe-7s-note2"></i>
                      <p>Rungtynių informacija</p>
                  </a>
              </li>
              <li class="active">
                  <a href="adminloggin.php?page=komanda">
                      <i class="pe-7s-note"></i>
                      <p>Žaidėjai</p>
                  </a>
              </li>
              <li>
                  <a href="adminloggin.php?page=TurnyrineLentele">
                      <i class="pe-7s-note"></i>
                      <p>Turnyro lentelė</p>
                  </a>
              </li>
              <li>
                <li >
                    <a href="adminloggin.php?page=mediateka">
                        <i class="pe-7s-note2"></i>
                        <p>Mediateka</p>
                    </a>
                </li>
                <li >
                    <a href="adminloggin.php?page=video">
                        <i class="pe-7s-note2"></i>
                        <p>Video</p>
                    </a>
                </li>
                <li >
                    <a href="adminloggin.php?page=foto">
                        <i class="pe-7s-note2"></i>
                        <p>Nuotraukos</p>
                    </a>
                </li>
                <li >
                    <a href="adminloggin.php?page=stream">
                        <i class="pe-7s-note2"></i>
                        <p>Stream</p>
                    </a>
                </li>
          </ul>
    </div>
  </div>

    <div class="main-panel">
        <nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">

                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-left">

                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="adminloggin.php?page=logout">
                                <p>Atsijungti</p>
                            </a>
                        </li>
						<li class="separator hidden-lg hidden-md"></li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="content">
            <div class="container-fluid">
<div class="content table-responsive table-full-width">
<table class="table table-hover">
<div class="row">
  <div class="col-md-12">
  <div class="col-md-3" width="5%">

  </div>
      <div class="card">
      <div class="header">
          <h4 class="title"><b>RC Vairas komandos žaidėjo koregavimas</b></h4>
      </div>
                <thead>
                  <tr>
                    <th>Žaidėjo numeris</th>
                    <th>Vardas</th>
                    <th>Pavardė</th>
                    <th>Amžius</th>
                  </tr>
                </thead>
                <tbody>
                <tr>
                <form action="update.php" method="POST">
                <td style="display:none;"><input type="hidden" value="'.$id.'" name="id"></td>
                <td><input type="number" class="resizedzaidejonr" value="'.$numeris.'" size="20px" name="numeris"></td>
                <td><input type="text" class="resizedzaidejopav" value="'.$zaidejo_vardas.'" name="zaidejo_vardas"></td>
                <td><input type="text"class="resizedzaidejopav" value="'.$zaidejo_pavarde.'" name="zaidejo_pavarde"></td>
                <td><input type="number"  class="resizedamzius"  value="'.$amzius.'" name="amzius"></td>
                <td><input type="submit" class="btn btn-primary" value="atnaujinti" name="update"></td>
                </form>
                    </tr>
                  </tbody>
              </table>
            </div>
            </div>
            </div>
          </div>
          </div>
          </div>


          <footer class="footer">
                <div class="container-fluid">

                    <p class="copyright pull-right">
                        &copy; <script>document.write(new Date().getFullYear())</script> Edgaras & Ovidijus
                    </p>
                </div>
            </footer>

            </div>
          </div>


          </body>

          </html>';
}
?>
