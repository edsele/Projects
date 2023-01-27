<?php
  include("connection.php");

  $sname = $_GET['sname'];

  $query = "DELETE FROM semesters WHERE Semesters = '$sname'";

$data = mysqli_query($conn, $query);

if($data){
  echo "<font color = 'green'> Company Deleted From Database";
  header("Location: Semesters.php?submit=success");
}
else{
  echo "<font color = 'red'> Unable to  Delete Company From Database";;
}

 ?>
