<?php
include("connection.php");
$result1 = $conn->query("SELECT CompanyName FROM company");
$result2 = $conn->query("SELECT Semesters FROM semesters");
$result3 = $conn->query("SELECT DepartmentName FROM departments");


 ?>





<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Company Table</title>
    <link rel="stylesheet" type="text/css" href="Report.css">

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

        <li class="list active">
          <b></b>
          <b></b>
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
                <div class="title">Report Form</div>
                <div class="content">
                  <form action="pdfReport.php" method="post" target="_blank">
                    <div class="user-details">


                      <div class="input-box">
                        <span class="details">Student List (Semesters)</span>
                        <select name ="sname" id="sname">

                          <option>None</option>

                          <?php

                          while ($rows = $result2->fetch_assoc()) {

                            $sname = $rows['Semesters'];
                            echo "<option value= '$sname'>$sname</option>";

                          }

                          ?>
                        </select>
                      </div>


                      <div class="input-box">
                        <span class="details">Company List</span>
                        <select name ="cname" id="cname">

                          <option>None</option>

                          <?php

                          while ($rows = $result1->fetch_assoc()) {

                            $cname = $rows['CompanyName'];
                            echo "<option value= '$cname'>$cname</option>";

                          }

                          ?>

                        </select>
                      </div>


                      <div class="input-box">
                        <span class="details">Department List</span>
                        <select name ="dname" id="dname">

                          <option>None</option>

                          <?php

                          while ($rows = $result3->fetch_assoc()) {

                            $dname = $rows['DepartmentName'];
                            echo "<option value= '$dname'>$dname</option>";


                          }

                          ?>

                        
                        </select>
                      </div>

                    </div>



                    <div class="button">
                      <input type="submit" id="button" name="submit" value="Generate Report">
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
  </body>
</html>
