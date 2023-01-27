<?php
  include("connection.php");

  $SEmail = $_GET['SEmail'];
  $fname = $_GET['fname'];
  $lname = $_GET['lname'];
  $company = $_GET['company'];
  $dname = $_GET['dname'];

  $query = "DELETE FROM students WHERE StudentEmail = '$SEmail' and FirstName = '$fname' and LastName = '$lname' and Company = '$company' and Department = '$dname'";

$data = mysqli_query($conn, $query);

if($data){
  echo "<font color = 'green'> Student Deleted From Database";
  header("Location: HomePage.php?submit=success");
}
else{
  echo "<font color = 'red'> Unable to  Delete Student From Database";;
}

 ?>
