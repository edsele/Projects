<?php
include("connection.php");
error_reporting(0);

$UniName = $_GET['UniName'];
$UniAddress = $_GET['UniAddress'];
$UniDepartment = $_GET['UniDepartment'];
$UniNumber = $_GET['UniNumber'];
$DirectorName = $_GET['DirectorName'];
$ProfessorName = $_GET['ProfessorName'];
$sname = $_GET['sname'];

//$result = $conn->query("SELECT * FROM setup");


$sql = "SELECT * FROM setup";
$result = mysqli_query($conn, $sql);
$setup = mysqli_fetch_all($result, MYSQLI_ASSOC);
$result2 = $conn->query("SELECT Semesters FROM semesters");







 ?>

 <!DOCTYPE html>
 <html lang="en" dir="ltr">
 <head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <title>Setup</title>
   <link rel="stylesheet" type="text/css" href="UpdateStudent.css">

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

      <li class="list">
        <b></b>
        <b></b>
        <a href="Report.php">
          <span class="icon"><ion-icon name="file-tray-full-outline"></ion-icon></span>
          <span class="title">Report</span>
        </a>
      </li>
      <li class="list active">
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
      <div class="title">Setup</div>
      <div class="content">
        <form action="" method="get">


<?php foreach ($setup as $setup) {
  // code...
} {?>

          <div class="user-details">
            <div class="input-box">
              <span class="details">University</span>
              <input type="text" value="<?php echo htmlspecialchars($setup['UniName'])  ?>" name="UniName" required>
            </div>

            <div class="input-box">
              <span class="details">Address</span>
              <input type="text" value="<?php echo htmlspecialchars($setup['UniAddress'])  ?>" name="UniAddress" required>
            </div>

            <div class="input-box">
              <span class="details">Department</span>
              <input type="text" value="<?php echo htmlspecialchars($setup['UniDepartment'])  ?>" name="UniDepartment" required>
            </div>

            <div class="input-box">
              <span class="details">Phone Number</span>
              <input type="text" value="<?php echo htmlspecialchars($setup['UniNumber'])  ?>" name="UniNumber" required>
            </div>


            <div class="input-box">
              <span class="details">Director's Name</span>
              <input type="text" value="<?php echo htmlspecialchars($setup['DirectorName'])  ?>" name="DirectorName" required>
            </div>

            <div class="input-box">
              <span class="details">Professor's Name</span>
              <input type="text" value="<?php echo htmlspecialchars($setup['ProfessorName'])  ?>" name="ProfessorName" required>
            </div>

            <div class="input-box">
              <span class="details">Current Semester</span>
              <select name =sname>

                <?php

                while ($rows = $result2->fetch_assoc()) {


                  $sname = $rows['Semesters'];
                  echo "<option value= '$sname'>$sname</option>";

                }?>
              </select>
            </div>

          </div>
<?php }?>

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

</body>
 </html>

<?php

if ($_GET['submit']) {

  $UniName = $_GET['UniName'];
  $UniAddress = $_GET['UniAddress'];
  $UniDepartment = $_GET['UniDepartment'];
  $UniNumber = $_GET['UniNumber'];
  $DirectorName = $_GET['DirectorName'];
  $ProfessorName = $_GET['ProfessorName'];
  $sname = $_GET['sname'];

  $query = "UPDATE setup SET UniName='$UniName', UniAddress='$UniAddress', UniDepartment='$UniDepartment', UniNumber='$UniNumber', DirectorName='$DirectorName', ProfessorName='$ProfessorName', CurrentSemester='$sname'";
  $data = mysqli_query($conn, $query);

  if ($data) {
    echo "<script>alert('Data Updated')</script>";
    header("Location: Setup.php?submit=success");
  }
  else {
    echo "Failed to Update Data";
  }
}


?>
