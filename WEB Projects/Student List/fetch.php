<?php
include("connection.php");
if(isset($_POST['request'])){


  $request = $_POST['request']

  $query = "SELECT * FROM students WHERE Semester = '$request'";
  $result = mysqli_query($conn, $query);
  $count = mysqli_num_rows($result);

?>

<table>

  <?php

    if ($count) {

  ?>

    <thead>
      <tr>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Student Cellphone</th>
        <th>Student Email</th>
        <th>Company</th>
        <th>Department</th>
        <th>Operations</th>
      </tr>





    <?php
  }else{
    echo "No Record Found!";
  }



 ?>
</thead>

<tbody>
  <?php
    while ($row = mysqli_fetch_assoc($result)) {

   ?>
   <tr>
     <td><?php echo $rows['FirstName']; ?></td>
     <td><?php echo $rows['LastName']; ?></td>
     <td><?php echo $rows['StudentCellphone']; ?></td>
     <td><?php echo $rows['StudentEmail']; ?></td>
     <td><?php echo $rows['Company']; ?></td>
     <td><?php echo $rows['Department']; ?></td>
     <td><?php echo '<a href = "UpdateStudent.php?fname='.$rows['FirstName'].'& lname='.$rows['LastName'].'&  SNumber='.$rows['StudentCellphone'].'& SEmail='.$rows['StudentEmail'].'& company='.$rows['Company'].'& dname='.$rows['Department'].'" class = "edit"> More/Edit </a>'?></td>

     <td><?php echo '<a href = "DeleteStudent.php?SEmail='.$rows['StudentEmail'].'" class = "delete">Delete</a>' ?></td>
   </tr>
 <?php
  }
  ?>






</tbody>
</table>

<?php
}?>
