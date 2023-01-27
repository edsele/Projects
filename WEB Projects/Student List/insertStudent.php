<?php
include("connection.php");



  $fname = $_POST['fname'];
  $lname = $_POST['lname'];
  $SNumber = $_POST['SNumber'];
  $SEmail = $_POST['SEmail'];
  $cname = $_POST['company'];
  $dname = $_POST['departments'];
  $sname = $_POST['sname'];
  $gender = $_POST['gender'];


  $id = "SELECT CompanyName from company where id = '$cname' ";
  $q = mysqli_query($conn, $id);
  $n = mysqli_fetch_assoc($q);
  $cid = $n['CompanyName'];

  $id2 = "SELECT DepartmentName from departments where id = '$dname' ";
  $q2 = mysqli_query($conn, $id2);
  $n2 = mysqli_fetch_assoc($q2);
  $did = $n2['DepartmentName'];




$query = "INSERT INTO students (FirstName, LastName, StudentCellphone, StudentEmail, Company, Department, Semester, Gender) VALUES ('$fname', '$lname', '$SNumber', '$SEmail', '$cid', '$did', '$sname', '$gender')";
$data = mysqli_query($conn, $query);

if ($data) {
  echo "<script>alert('Data Updated')</script>";
  header("Location: HomePage.php?submit=success");
}else {
  echo "Error email already exists!";

}


 ?>
