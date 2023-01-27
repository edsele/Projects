<?php
include("connection.php");

$result1 = $conn->query("SELECT CompanyName FROM company");
$result2 = $conn->query("SELECT Semesters FROM semesters");
$result3 = $conn->query("SELECT DepartmentName FROM departments ");




$query = "SELECT * FROM company Order by CompanyName";
  $result = $conn->query($query);



 ?>



<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Add Students</title>
    <link rel="stylesheet" type="text/css" href="AddStudent.css">

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


        <li class="list active">
          <b></b>
          <b></b>
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




            <div class="container">
                <div class="title">Student Form</div>
                <div class="content">
                  <form action="insertStudent.php" method="post">
                    <div class="user-details">

                      <div class="input-box">
                        <span class="details">First Name</span>
                        <input type="text" id ="fname" name="fname" required>
                      </div>

                      <div class="input-box">
                        <span class="details">Last Name</span>
                        <input type="text" id ="lname" name="lname"  required>
                      </div>

                      <div class="input-box">
                        <span class="details">Phone Number</span>
                        <input type="text" id ="SNumber" name="SNumber" required>
                      </div>

                      <div class="input-box">
                        <span class="details">Student Email</span>
                        <input type="email" id ="SEmail" name="SEmail" required>
                      </div>


                      <div class="input-box">
                        <span class="details">Company</span>
                        <select name ="company" id="company" onchange="FetchDepartment(this.value)">

                          <option>None</option>

                          <?php


                          if ($result->num_rows > 0 ) {
                 while ($row = $result->fetch_assoc()) {
                  echo '<option value='.$row['id']. '>'.$row['CompanyName'].'</option>';
                 }
              }

                          ?>
                        </select>
                      </div>

                      <div class="input-box">
                        <span class="details">Department</span>
                        <select name ="departments" id="departments" class="form-control">
                          <option>None</option>
                        </select>
                      </div>

                      <div class="input-box">
                        <span class="details">Semester</span>
                        <select name ="sname">
                          <?php

                          while ($rows = $result2->fetch_assoc()) {

                            $sname = $rows['Semesters'];
                            echo "<option value= '$sname'>$sname</option>";

                          }?>
                        </select>
                      </div>

                    </div>

                    <div class="gender-details">
                      <input type="radio" name="gender" value="male" id="dot-1">
                      <input type="radio" name="gender" value="female" id="dot-2">
                      <input type="radio" name="gender" value="Prefer not to say" id="dot-3">
                      <span class="gender-title">Gender</span>
                      <div class="category">
                        <label for="dot-1">
                          <span class="dot one"></span>
                          <span class="gender">Male</span>
                        </label>
                        <label for="dot-2">
                          <span class="dot two"></span>
                          <span class="gender">Female</span>
                        </label>
                        <label for="dot-3">
                          <span class="dot three"></span>
                          <span class="gender">Prefer not to say</span>
                        </label>
                      </div>
                    </div>



                    <div class="button">
                      <input type="submit" id="button" name="submit" value="Submit">
                    </div>
                  </form>
                </div>
              </div>





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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

  <script type="text/javascript">
    function FetchDepartment(id){

      $('#departments').html('');
      $.ajax({
        type:'post',
        url: 'ajaxdata.php',
        data : { company_id : id},
        success : function(data){
           $('#departments').html(data);
        }

      })
    }



  </script>


  </body>
</html>
