<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "demo";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if ($conn) {

//echo "Database Connected";

}else {
  echo "Connection Failed!". mysqli_connect_error();
}

 ?>
