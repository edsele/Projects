<?php
include("connection.php");
error_reporting(0);




$cname = $_GET['cname'];
$ccellphone = $_GET['ccellphone'];
$caddress = $_GET['caddress'];
$cemail = $_GET['cemail'];
$cmanager = $_GET['cmanager'];
$mcellphone = $_GET['mcellphone'];
$memail = $_GET['memail'];

$id = "SELECT id from company where CompanyName = '$cname'  or CompanyEmail = '$cemail' or CompanyCellphone = '$ccellphone' or CompanyName = '$cname' and  CompanyEmail = '$cemail' ";
$q = mysqli_query($conn, $id);
$n = mysqli_fetch_assoc($q);
$cid = $n['id'];

$id2 = "SELECT comment from company where CompanyName = '$cname' and CompanyAddress = '$caddress' and CompanyManager = '$cmanager' and CompanyCellphone = '$ccellphone' ";
$q2 = mysqli_query($conn, $id2);
$n2 = mysqli_fetch_assoc($q2);
$comment = $n2['comment'];


 ?>

 <!DOCTYPE html>
 <html lang="en" dir="ltr">
 <head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <title> Edit Page </title>
   <link rel="stylesheet" type="text/css" href="UpdateCompany.css">

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
      <li class="list active">
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
        <a href="AddSemesters.php">
          <b></b>
          <b></b>
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
        <div class="title">Company Form</div>
        <div class="content">
          <form action="" method="get">
            <div class="user-details">

              <div class="input-box">
                <span class="details">Company Name</span>
                <input type="text" value="<?php echo "$cname";  ?>" name="cname" required>
              </div>

              <div class="input-box">
                <span class="details">Company Phone Number</span>
                <input type="text" value="<?php echo "$ccellphone";  ?>" name="ccellphone" required>
              </div>

              <div class="input-box">
                <span class="details">Company Address</span>
                <input type="text" value="<?php echo "$caddress";  ?>" name="caddress" required>
              </div>

              <div class="input-box">
                <span class="details">Company Email</span>
                <input type="text" value="<?php echo "$cemail";  ?>" name="cemail" required>
              </div>


              <div class="input-box">
                <span class="details">Company Manager</span>
                <input type="text" value="<?php echo "$cmanager";  ?>" name="cmanager" required>
              </div>


              <div class="input-box">
                <span class="details">Manager Phone Number</span>
                <input type="text" value="<?php echo "$mcellphone";  ?>" name="mcellphone" required>
              </div>

              <div class="input-box">
                <span class="details">Manager Email</span>
                <input type="text" value="<?php echo "$memail";  ?>" name="memail" required>
              </div>

            </div>






            <div class="wrapper">
              <textarea name="ccomment" placeholder="Comment..." ><?php echo "$comment";     ?></textarea>
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

</body>
 </html>

<?php


if ($_GET['submit']) {
  $cname = $_GET['cname'];
  $ccellphone = $_GET['ccellphone'];
  $caddress = $_GET['caddress'];
  $cemail = $_GET['cemail'];
  $cmanager = $_GET['cmanager'];
  $mcellphone = $_GET['mcellphone'];
  $memail = $_GET['memail'];
  $ccomment = $_GET['ccomment'];


  $query = "UPDATE company SET CompanyName='$cname', CompanyCellphone='$ccellphone', CompanyAddress='$caddress', CompanyEmail='$cemail', CompanyManager='$cmanager', ManagerCellphone='$mcellphone', ManagerEmail='$memail', comment='$ccomment'  WHERE id = '$cid'";
  $data = mysqli_query($conn, $query);



  if ($data) {
  //  echo "<script>alert('Data Updated')</script>";
    //header("Location: Companies.php?submit=success");
?>
    <script type="text/javascript">
    window.location = "Companies.php";
    alert('Data Updated')
    </script>
    <?php
  }
  else {
    echo "Failed to Update Data";
  }
}


?>
