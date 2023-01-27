<?php
include('connection.php');


$id=$_GET['id'];
$status=$_GET['status'];

$q = "UPDATE departments set status=$status where id=$id";

mysqli_query($conn, $q);

header('location: Departments.php');

 ?>
