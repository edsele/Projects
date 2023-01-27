<?php

include("connection.php");
//error_reporting(0);


$cname = $_POST['cname'];
$dname = $_POST['dname'];
$dmanager = $_POST['dmanager'];
$dmphone = $_POST['dmphone'];

$id = "SELECT id from company where CompanyName = '$cname' ";
$q = mysqli_query($conn, $id);
$n = mysqli_fetch_assoc($q);
$cid = $n['id'];


$query = "INSERT INTO departments (DepartmentName, Company, DepartmentManager, DepartmentManagerPhone, c_id, status) VALUES ('$dname', '$cname', '$dmanager', '$dmphone', '$cid', '1')";
$data = mysqli_query($conn, $query);

if ($data) {
  echo "<script>alert('Data Updated')</script>";
  header("Location: Departments.php?submit=success");
}else {

  echo "<script>alert('Failed to save data!')</script>";


}




 ?>
