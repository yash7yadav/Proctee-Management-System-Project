<?php
include("php/config.php");
include("php/classes/Account.php");
include("php/classes/Student.php");

$student = new Student($con);
$account = new Account($con);


$proctorEmail = $_SESSION['proctor_email'];

if(isset($_POST['btn-add-proctee'])) {
  $usn = $_POST['newStudent-usn'];
  $name = $_POST['newStudent-name'];
  $sem = $_POST['newStudent-sem'];
  $phone = $_POST['newStudent-phone'];
  $address = $_POST['newStudent-address'];
  $student->insertStudent($usn,$name,$sem,$phone,$address,$proctorEmail);
}

if(isset($_GET['delete_usn'])) {
  $student->deleteStudentByUsn($_GET['delete_usn'],$proctorEmail);
}

$student_details = $student->getStudent($_SESSION['proctor_email']);
$proctor_name = $account->getProctorNameByEmailId($_SESSION['proctor_email']);

echo "<script>
      const studentDetails = $student_details;
      const proctorName = $proctor_name;
</script>";
 
?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/index.css">

    <title>Proctee Management System</title>
  </head>
  <body>
  <div class="container">
  <div class="header-container"></div>
  <div class="row card-container">
  
  </div>
  <div class="form-container">
  </div>
</div>
  
  <script src="bootstrap/js/bootstrap.min.js"></script>
  <script src="js/index.js"></script>
  </body>
</html>