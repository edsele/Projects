<?php

include("connection.php");



$cname = $_POST['cname'];
$ccellphone = $_POST['ccellphone'];
$caddress = $_POST['caddress'];
$cemail = $_POST['cemail'];
$cmanager = $_POST['cmanager'];
$mcellphone = $_POST['mcellphone'];
$memail = $_POST['memail'];

$query = "INSERT INTO company (CompanyName, CompanyCellphone, CompanyAddress, CompanyEmail, CompanyManager, ManagerCellphone, ManagerEmail) VALUES ('$cname', '$ccellphone', '$caddress', '$cemail', '$cmanager', '$mcellphone', '$memail')";
$data = mysqli_query($conn, $query);

if ($data) {
  echo "<script>alert('Data Updated')</script>";
  header("Location: Companies.php?submit=success");
}else {
  echo "Failed to save data!";
}




 ?>















<?php
/*
  $cname = $_POST['cname'];
  $ccellphone = $_POST['ccellphone'];
  $caddress = $_POST['caddress'];
  $cemail = $_POST['cemail'];
  $cmanager = $_POST['cmanager'];
  $mcellphone = $_POST['mcellphone'];
  $memail = $_POST['memail'];

//Database connection

  $conn = new mysqli('localhost' , 'root', '', 'demo');
  if($conn->connect_error){
    die('Connection Failed : '. $conn->connect_error);
  }else{
    $stmt = $conn -> prepare ("insert into company(CompanyName, CompanyCellphone, CompanyAddress, CompanyEmail, CompanyManager, MangerCellphone, MangerEmail) values(?,?,?,?,?,?,?)");
    $stmt->bind_param("sisssis", $cname, $ccellphone, $caddress, $cemail, $cmanager, $mcellphone, $memail);
    $stmt->execute();
  //  echo "Registration Successfull!";
    $stmt->close();

  }

*/
 ?>
