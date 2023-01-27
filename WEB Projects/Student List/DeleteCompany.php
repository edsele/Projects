<?php
  include("connection.php");

  $cname = $_GET['cname'];

  $query = "DELETE FROM company WHERE CompanyName = '$cname'";

$data = mysqli_query($conn, $query);

if($data){
  echo "<font color = 'green'> Company Deleted From Database";
  header("Location: Companies.php?submit=success");
}
else{
  echo "<font color = 'red'> Unable to  Delete Company From Database";;
}

 ?>
