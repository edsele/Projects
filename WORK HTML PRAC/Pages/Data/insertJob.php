<?php

include("connection.php");

error_reporting (0);

$ID = $_POST['ID'];
$CompanyName = $_POST['CompanyName'];
$JobName = $_POST['JobName'];
$JobID = $_POST['JobID'];
$JobType = $_POST['JobType'];
$JobLocation = $_POST['JobLocation'];
$JobLink = $_POST['JobLink'];

$query = "INSERT INTO job (ID, CompanyName, JobName, JobID, JobType, JobLocation, JobLink) VALUES ('$ID', '$CompanyName', '$JobName', '$JobID', '$JobType', '$JobLocation', '$JobLink')";
$data = mysqli_query($conn, $query);

if ($data) {
  echo "<script>alert('Data Updated')</script>";
  //header("Location: Pages/Main.php?submit=success");
}else {
  echo "Failed to save data!";
}

 ?>