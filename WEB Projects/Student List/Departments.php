<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Departments</title>
    <link rel="stylesheet" type="text/css" href="Departments.css">

    <style>
    </style>

  </head>
  <body>

    <div class="navigation">
      <ul>
        <li class="list">
          <b></b>
          <b></b>
          <a href="HomePage.php">
            <span class="icon"><ion-icon name="home-outline"></ion-icon></span>
            <span class="title">Home</span>
          </a>
        </li>
        <li class="list">
          <b></b>
          <b></b>
          <a href="Companies.php">
            <span class="icon"><ion-icon name="folder-outline"></ion-icon></span>
            <span class="title">Companies</span>
          </a>
        </li>

        <li class="list active">
          <b></b>
          <b></b>
          <a href="Departments.php">
            <span class="icon"><ion-icon name="business-outline"></ion-icon></span>
            <span class="title">Departments</span>
          </a>
        </li>

        <li class="list">
          <b></b>
          <b></b>
          <a href="AddCompany.php">
            <span class="icon"><ion-icon name="add-circle-outline"></ion-icon></span>
            <span class="title">Add Company</span>
          </a>
        </li>


        <li class="list">
          <b></b>
          <b></b>
          <a href="AddDepartment.php">
            <span class="icon"><ion-icon name="medkit-outline"></ion-icon></span>
            <span class="title">Add Department</span>
          </a>
        </li>


        <li class="list">
          <a href="AddStudent.php">
            <span class="icon"><ion-icon name="person-add-outline"></ion-icon></span>
            <span class="title">Add Student</span>
          </a>
        </li>

        <li class="list">
          <a href="Semesters.php">
            <span class="icon"><ion-icon name="calendar-outline"></ion-icon></span>
            <span class="title">Semesters</span>
          </a>
        </li>

        <li class="list">
          <a href="AddSemesters.php">
            <span class="icon"><ion-icon name="duplicate-outline"></ion-icon></span>
            <span class="title">Add Semester</span>
          </a>
        </li>

        <li class="list">
          <a href="Report.php">
            <span class="icon"><ion-icon name="file-tray-full-outline"></ion-icon></span>
            <span class="title">Report</span>
          </a>
        </li>
        <li class="list">
          <a href="Setup.php">
            <span class="icon"><ion-icon name="cog-outline"></ion-icon></span>
            <span class="title">Setup</span>
          </a>
        </li>



      </ul>
    </div>


    <p> Departments </p>






    <table>

    <thead>
      <tr>
        <th>Department Name</th>
        <th>Company</th>
        <th>Department Manager</th>
        <th>Department Manager Phone</th>
        <th>Status</th>
        <th>Operations</th>
      </tr>
    </thead>

<?php

include("connection.php");



$sql = "SELECT * FROM departments ORDER BY Company";
$result = mysqli_query($conn, $sql);

while ($rows = mysqli_fetch_array($result)) {
  ?>

  <tbody>
    <tr>
      <td><?php echo $rows['DepartmentName']; ?></td>
      <td><?php echo $rows['Company']; ?></td>
      <td><?php echo $rows['DepartmentManager']; ?></td>
      <td><?php echo $rows['DepartmentManagerPhone']; ?></td>
      <td><?php

          if ($rows['status']==1) {
            echo '<a href = "status.php?id='.$rows['id'].'&status=0" class = "enabled">Enabled</a>';
          }else {
            echo '<a href = "status.php?id='.$rows['id'].'&status=1" class = "delete">Disabled</a>';
          }


       ?></td>

       <td><?php echo '<a href = "UpdateDepartment.php?dname='.$rows['DepartmentName'].'& cname='.$rows['Company'].'&  dmanager='.$rows['DepartmentManager'].'& dmphone='.$rows['DepartmentManagerPhone'].'" class = "edit"> More/Edit </a>'?></td>


      <td><?php echo '<a href = "DeleteDepartment.php?dname='.$rows['DepartmentName'].'& cname='.$rows['Company'].'" class = "delete">Delete</a>' ?></td>

    </tr>
  </tbody>





<?php

} ?>




<tr>
<td></td>
<td></td>
<td><a class="add" href="AddDepartment.php">Add Department</td>
</tr>








    </table>

    <div class="toggle">
    <ion-icon name="menu-outline" class="open"></ion-icon>
    <ion-icon name="close-outline" class="close"></ion-icon>
    </div>

    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

    <script>

    let menuToggle = document.querySelector('.toggle');
    let navigation = document.querySelector('.navigation');
    menuToggle.onclick = function(){
      menuToggle.classList.toggle('active');
      navigation.classList.toggle('active');
    }


    // add active class in selected list item
      let list = document.querySelectorAll('.list');
      for (let i = 0; i<list.length; i++){
        list[i].onclick = function(){
          let j = 0;
          while(j < list.length){
            list[j++].className = 'list';
          }
          list[i].className = 'list active';
        }
      }
    </script>
  </body>
</html>
