<?php
include("connection.php");
error_reporting(0);

$fname = $_GET['fname'];
$lname = $_GET['lname'];
$SNumber = $_GET['SNumber'];
$SEmail = $_GET['SEmail'];
$company = $_GET['company'];
$dname = $_GET['dname'];
$scomment = $_GET['scomment'];
$sname = $_GET['sname'];


$id0 = "SELECT id from students where FirstName = '$fname' and LastName = '$lname' and StudentEmail = '$SEmail' and StudentCellphone = '$SNumber' and Company = '$company' ";
$q0 = mysqli_query($conn, $id0);
$n0 = mysqli_fetch_assoc($q0);
$sid = $n0['id'];

$id2 = "SELECT comment from students where FirstName = '$fname' and LastName = '$lname' and StudentEmail = '$SEmail' and StudentCellphone = '$SNumber' ";
$q2 = mysqli_query($conn, $id2);
$n2 = mysqli_fetch_assoc($q2);
$comment = $n2['comment'];




$result1 = $conn->query("SELECT CompanyName FROM company");
$result2 = $conn->query("SELECT Semesters FROM semesters");
$result3 = $conn->query("SELECT DepartmentName FROM departments where status='1' ");
$result4 = $conn->query("SELECT Gender FROM students where FirstName = '$fname' and LastName = '$lname' and StudentEmail = '$SEmail' and StudentCellphone = '$SNumber' and Company = '$company'");



$query = "SELECT * FROM company Order by CompanyName";
  $result = $conn->query($query);

 ?>

 <!DOCTYPE html>
 <html lang="en" dir="ltr">
 <head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <title> Edit Page </title>
   <link rel="stylesheet" type="text/css" href="UpdateStudent.css">

 <style>
 </style>
</head>





<body>


  <div class="navigation">
    <ul>
      <li class="list active">
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
        <b></b>
        <b></b>
        <a href="AddStudent.php">
          <span class="icon"><ion-icon name="person-add-outline"></ion-icon></span>
          <span class="title">Add Student</span>
        </a>
      </li>

      <li class="list">
        <b></b>
        <b></b>
        <a href="Semesters.php">
          <span class="icon"><ion-icon name="calendar-outline"></ion-icon></span>
          <span class="title">Semesters</span>
        </a>
      </li>

      <li class="list">
        <b></b>
        <b></b>
        <a href="AddSemesters.php">
          <span class="icon"><ion-icon name="duplicate-outline"></ion-icon></span>
          <span class="title">Add Semester</span>
        </a>
      </li>

      <li class="list">
        <b></b>
        <b></b>
        <a href="Report.php">
          <span class="icon"><ion-icon name="file-tray-full-outline"></ion-icon></span>
          <span class="title">Report</span>
        </a>
      </li>
      <li class="list">
        <b></b>
        <b></b>
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
        <form action="" method="get">
          <div class="user-details">
            <div class="input-box">
              <span class="details">First Name</span>
              <input type="text" value="<?php echo "$fname";  ?>" name="fname" required>
            </div>
            <div class="input-box">
              <span class="details">Last Name</span>
              <input type="text" value="<?php echo "$lname";  ?>" name="lname" required>
            </div>
            <div class="input-box">
              <span class="details">Phone Number</span>
              <input type="text" value="<?php echo "$SNumber";  ?>" name="SNumber" required>
            </div>
            <div class="input-box">
              <span class="details">Student Email</span>
              <input type="text" value="<?php echo "$SEmail";  ?>" name="SEmail" required>
            </div>


              <div class="input-box">
                <span class="details">Company</span>
                <select name ="company" id="company" onchange="FetchDepartment(this.value)">

                  <option>None</option>

                  <?php



                  if ($result->num_rows > 0 ) {
              while ($row = $result->fetch_assoc()) {
              echo '<option value='.$row['id'].'>'.$row['CompanyName'].'</option>';
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
              <select name =sname>
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

          <div class="wrapper">
            <textarea name="scomment" placeholder="Comment..." ><?php echo "$comment";     ?></textarea>
          </div>

          <div class="button">
            <input type="submit" id="button" name="submit" value="Save">
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

<script>
      const textarea = document.querySelector("textarea");
      textarea.addEventListener("keyup", e =>{
        textarea.style.height = "63px";
        let scHeight = e.target.scrollHeight;
        textarea.style.height = `${scHeight}px`;
      });
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

<?php

if ($_GET['submit']) {
  $fname = $_GET['fname'];
  $lname = $_GET['lname'];
  $SNumber = $_GET['SNumber'];
  $SEmail = $_GET['SEmail'];
  $company = $_GET['company'];
  $departments = $_GET['departments'];
  $scomment = $_GET['scomment'];
  $sname = $_GET['sname'];
  $gender = $_GET['gender'];
  $scomment = $_GET['scomment'];

$id = "SELECT CompanyName from company where id = '$company' ";
$q = mysqli_query($conn, $id);
$n = mysqli_fetch_assoc($q);
$cid = $n['CompanyName'];

$id2 = "SELECT DepartmentName from departments where id = '$departments' ";
$q2 = mysqli_query($conn, $id2);
$n2 = mysqli_fetch_assoc($q2);
$did = $n2['DepartmentName'];

  $query = "UPDATE students SET FirstName='$fname', LastName='$lname', StudentCellphone='$SNumber', StudentEmail='$SEmail', Company='$cid', Department='$did', Semester='$sname', Gender='$gender', comment='$scomment'  WHERE StudentEmail='$SEmail'";
  $data = mysqli_query($conn, $query);

  if ($data) {
    //echo "<script>alert('Data Updated')</script>";


    ?>
        <script type="text/javascript">
        window.location = "HomePage.php";
        alert('Data Updated')
        </script>
        <?php
  }
  else {
    echo "Failed to Update Data";
  }
}


?>
