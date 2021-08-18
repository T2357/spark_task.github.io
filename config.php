<?php
$servername = "localhost";
$username = "root";
$password = "12345678";
$db_name = "bank_spark";
// Create connection
$con = mysqli_connect($servername, $username, $password, $db_name);

if($con){
  ;
}else {
  echo "no connection";
}
?>
