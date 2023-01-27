<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Semesters </title>
    <link rel="stylesheet" type="text/css" href="Semesters.css">
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

      <li class="list">
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

      <li class="list active">
        <b></b>
        <b></b>
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



<p>Semester List</p>


<table>
<thead>
  <tr>
  <th>Semesters</th>
  <th>Start of Semester</th>
  <th>End of Semester</th>
  <th>Operations</th>
</tr>
</thead>


<?php
include("connection.php");

$sql = "SELECT * FROM semesters";
$result = $conn-> query($sql);

if ($result-> num_rows > 0 ){
  while ($row = $result-> fetch_assoc()){
    echo "
    <tbody>
    <tr>
    <td>". $row["Semesters"]. "</td>
    <td>". $row["StartOfSemester"]. "</td>
    <td>". $row["EndOfSemester"]. "</td>

    <td><a href = 'UpdateSemesters.php?sname=$row[Semesters]& SoS=$row[StartOfSemester]& EoS=$row[EndOfSemester]' class = edit>More/Edit</td>

    <td><a href = 'DeleteSemesters.php?sname=$row[Semesters]' onclick='return checkdelete()' class = delete>Delete</td>

    </tr>
    <tbody>";

  }



}

else {
  echo "No results found";
}

$conn-> close();

 ?>
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
