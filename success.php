<?php
if(isset($_POST['loggin'])){
session_start();
mysql_connect("localhost", "root", "");
mysql_select_db("login");
//mysql_select_db("login");
$username = $_POST['username'];
$password = $_POST['password'];
//avoid sql injection
$username= stripcslashes($username);
$password= stripcslashes($password);
$username= mysql_real_escape_string($username);
$password= mysql_real_escape_string($password);
//Query for Database
$result = mysql_query("SELECT * FROM  users WHERE username='$username' and password ='$password'")
            or die("failed".mysql_error());
$row = mysql_fetch_array($result);
if($row['username'] == $username && $row['password'] == $password){
  $_SESSION['username'] = $username;
echo "<meta http-equiv='refresh' content ='0;url=adminloggin.php?page'>";
} else{
  echo 'Nepavyko prisijungti, pakartokite';
  echo "<meta http-equiv='refresh' content ='3;url=index.php?'>";
}
}
else {
  echo " negerai";
}
 ?>
