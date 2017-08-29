<?php

?>
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


  <!--  Checkbox, Radio & Switch Plugins -->
  <script src="assets/js/bootstrap-checkbox-radio-switch.js"></script>
	<!--   Core JS Files   -->
<script src="http://code.jquery.com/jquery-2.1.4.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>


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

            <ul class="nav" id="nav">
                <li>
                    <a href="page">
                        <i class="pe-7s-user"></i>
                        <p>Pagrindinis</p>
                    </a>
                </li>
                <li>
                    <a href="content/rungtynes.php">
                        <i class="pe-7s-note2"></i>
                        <p>Varžybos</p>
                    </a>
                </li>
                <li>
                    <a href="content/komanda.php">
                        <i class="pe-7s-note"></i>
                        <p>Komanda</p>
                    </a>
                </li>
                <li>
                    <a href="content/TurnyrineLentele.php">
                        <i class="pe-7s-note"></i>
                        <p>Turnyro lentelė</p>
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
              <div id="viskas">



              </div>

            </div>
						<script src="js/loader.js"></script>
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

              </html>
