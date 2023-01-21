<?php
include("Data/connection.php");

 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Add Job</title>
    <link rel="stylesheet" type="text/css" href="CSS/AddJob.css">



  </head>
  <body>


  <div class="navigation">
            <ul>
                <li class="list">
                    <b></b>
                    <b></b>
                    <a href="Main.php">
                        <span class="icon"><ion-icon name="home-outline"></ion-icon></span>
                        <span class="title">Main Page</span>
                    </a>
                    </li>
                    <li class="list active">
                    <b></b>
                    <b></b>
                    <a href="AddJob.php">
                        <span class="icon"><ion-icon name="add-circle-outline"></ion-icon></span>
                        <span class="title">Add Job</span>
                    </a>
                </li>
            </ul>
        </div>




        <div class="container">
            <div class="title">Add Job</div>
            <div class="content">
              <form action="Data/insertJob.php" method="post">
                <div class="user-details">

                  <div class="input-box">
                    <span class="details">Company Name</span>
                    <input type="text" id ="CompanyName" name="CompanyName" required>
                  </div>

                  <div class="input-box">
                    <span class="details">Job Name</span>
                    <input type="text" id ="JobName" name="JobName"  required>
                  </div>

                  <div class="input-box">
                    <span class="details">Job ID</span>
                    <input type="text" id ="JobID" name="JobID" required>
                  </div>

                  <div class="input-box">
                    <span class="details">Job Type</span>
                    <input type="text" id ="JobType" name="JobType" required>
                  </div>


                  <div class="input-box">
                    <span class="details">Job Location</span>
                    <input type="text" id ="JobLocation" name="JobLocation" required>
                  </div>


                  <div class="input-box">
                    <span class="details">Job Link</span>
                    <input type="text" id ="JobLink" name="JobLink" required>
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

  </body>
</html>