<?php
echo '<html>
<head>
<link rel="stylesheet" type="text/css" href="includes/login.css"/>
<link href="includes./login.js" rel="stylesheet">
<script src="http://code.jquery.com/jquery-2.1.4.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="includes/login.js"></script>
</head>
<body>
<div class="container">
	<div class="row">

<!-- Mixins-->
<!-- Pen Title-->
<div class="pen-title">
  <h1></h1>
</div>
<div class="container">
  <div class="card"></div>
  <div class="card">
    <h1 class="title">Prisijungimas</h1>
    <form method="POST" action="success.php">
      <div class="input-container">
        <input type="text" name="username" required="required"/>
        <label for="Username">Prisijungimo vardas</label>
        <div class="bar"></div>
      </div>
      <div class="input-container">
        <input type="password" name="password" required="required"/>
        <label for="Password">Slaptažodis</label>
        <div class="bar"></div>
      </div>
      <div class="button-container">
        <button  name="loggin" "type="submit"><span>Prisijungti</span></button>
      </div>
      <div class="footer"><a href="#">Užmiršote slaptažodį?</a></div>
    </form>
  </div>

</body>
</html>';
?>
