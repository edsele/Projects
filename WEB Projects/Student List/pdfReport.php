<?php
require('fpdf.php');
include('connection.php');

$db = new PDO('mysql:host=localhost;dbname=demo','root','');

class PDF extends FPDF{



  // Page footer
  function Footer()
  {
      // Position at 1.5 cm from bottom
      $this->SetY(-15);
      // Arial italic 8
      $this->SetFont('Arial','I',8);
      // Page number
      $this->Cell(0,10,'Page '.$this->PageNo(),0,0,'C');
  }





function Header()
{
  include('connection.php');
  $sqlHead = "SELECT * FROM setup";
  $resultHead = mysqli_query($conn, $sqlHead);

  while ($rows = mysqli_fetch_array($resultHead)) {

    $this->SetFont('Arial', 'B', 14);
    $this->Cell(300,8,$rows['UniName'],0,0,'C');
    $this->Ln();
    $this->SetFont('Times','', 12);
    $this->Cell(300,8,$rows['UniAddress'],0,0,'C');
    $this->Ln();
    $this->Cell(300,8,$rows['UniDepartment'],0,0,'C');
    $this->Ln();



  }

}

function headerTableStudents(){

  $this->SetFont('Times','B',12);
  $this->Cell(40,10,'First Name',1,0,'C');
  $this->Cell(40,10,'Last Name',1,0,'C');
  $this->Cell(60,10,'Student Email',1,0,'C');
  $this->Cell(36,10,'Company',1,0,'C');
  $this->Cell(40,10,'Department',1,0,'C');
  $this->Cell(50,10,'Semester',1,0,'C');


  $this->Ln();


}

function headerTableCompanies(){

  $this->SetFont('Times','B',12);
  $this->Cell(30,10,'Company Name',1,0,'C');
  $this->Cell(35,10,'Company Phone',1,0,'C');
  $this->Cell(60,10,'Company Address',1,0,'C');
  $this->Cell(36,10,'Company Email',1,0,'C');
  $this->Cell(40,10,'Company Manager',1,0,'C');
  $this->Cell(35,10,'Manager Cellphone',1,0,'C');
  $this->Cell(40,10,'Manager Email',1,0,'C');

  $this->Ln();


}

function viewStudents($db){

  $this->SetFont('Times','',12);
  $stmt = $db->query("SELECT * FROM students where Semester = '{$_POST['sname']}'");
  while ($data = $stmt->fetch(PDO::FETCH_OBJ)) {

    $this->Cell(40,10,$data->FirstName,1,0,'L');
    $this->Cell(40,10,$data->LastName,1,0,'L');
    $this->Cell(60,10,$data->StudentEmail,1,0,'L');
    $this->Cell(36,10,$data->Company,1,0,'L');
    $this->Cell(40,10,$data->Department,1,0,'L');
    $this->Cell(50,10,$data->Semester,1,0,'L');
    $this->Ln();

    }

  }

  function viewCompanies($db){

    $this->SetFont('Times','',12);
    $stmt = $db->query("SELECT * FROM company where CompanyName = '{$_POST['cname']}'");
    while ($data = $stmt->fetch(PDO::FETCH_OBJ)) {

      $this->Cell(30,10,$data->CompanyName,1,0,'L');
      $this->Cell(35,10,$data->CompanyCellphone,1,0,'L');
      $this->Cell(60,10,$data->CompanyAddress,1,0,'L');
      $this->Cell(36,10,$data->CompanyEmail,1,0,'L');
      $this->Cell(40,10,$data->CompanyManager,1,0,'L');
      $this->Cell(35,10,$data->ManagerCellphone,1,0,'L');
      $this->Cell(40,10,$data->ManagerEmail,1,0,'L');
      $this->Ln();

      }

    }


    function viewDepartments($db){

      $this->SetFont('Times','',12);
      $stmt = $db->query("SELECT * FROM departments where DepartmentName = '{$_POST['dname']}'");
      while ($data = $stmt->fetch(PDO::FETCH_OBJ)) {

        $this->Cell(40,10,$data->DepartmentName,1,0,'L');
        $this->Cell(40,10,$data->Company,1,0,'L');
        $this->Cell(60,10,$data->DepartmentManager,1,0,'L');
        $this->Cell(36,10,$data->DepartmentManagerPhone,1,0,'L');
        $this->Ln();

        }

      }



}



$pdf = new PDF();





$pdf->AliasNbPages();



if($_POST['sname']){
  $pdf->AddPage('L', 'A4',0);
  $pdf->headerTableStudents();
  $pdf->viewStudents($db);
  $pdf->Ln(20);
}
if($_POST['cname']){
  $pdf->AddPage('L', 'A4',0);
  $pdf->headerTableCompanies();
  $pdf->viewCompanies($db);
  $pdf->Ln(20);
}
if($_POST['dname']){
  $pdf->AddPage('L', 'A4',0);
  $pdf->viewDepartments($db);
  $pdf->Ln(20);
}


$pdf->Output();





?>
