<?php
  include("connection.php");

  $dname = $_GET['dname'];
  $cname = $_GET['cname'];

  $id = "SELECT id from departments where DepartmentName = '$dname' and Company = '$cname'";
  $q = mysqli_query($conn, $id);
  $n = mysqli_fetch_assoc($q);
  $did = $n['id'];

  $query = "DELETE FROM departments WHERE DepartmentName = '$dname' and id = '$did'";

$data = mysqli_query($conn, $query);

if($data){
  echo "<font color = 'green'> Company Deleted From Database";
  header("Location: Departments.php?submit=success");
}
else{
  echo "<font color = 'red'> Unable to  Delete Company From Database";;
}

 ?>
