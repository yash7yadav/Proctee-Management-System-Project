<?php
include("php/config.php");
include("php/classes/Account.php");
include("php/classes/Student.php");

$student = new Student($con);

if(isset($_POST['btn-update-student'])) {
    $name = $_POST['student-name'];
    $phone = $_POST['student-phone'];
    $sem = $_POST['student-sem'];
    $address = $_POST['student-address'];

    $usn = $_SESSION['usn'];

    $student->updateDetails($usn,$name,$sem,$phone,$address);
    $proctor_email = $_SESSION['proctor_email'];
    $studentDetail = $student->getStudentByProctor($usn,$proctor_email);
    $dependent = $_SESSION['dependent'];
    $marks = $_SESSION['marks'];
    echo "<script>
            const student = $studentDetail;
            console.log(student);
            const dependent = $dependent;
            const marks = $marks;
    </script>";
}

if(isset($_POST['btn-update-dependent'])) {
    $name = $_POST['dependent-name'];
    $phone = $_POST['dependent-phone'];
    $email = $_POST['dependent-email'];
    $address = $_POST['dependent-address'];

    $usn = $_SESSION['usn'];

    $student->updateDetailsOfDependent($usn,$name,$email,$phone,$address);
    $proctor_email = $_SESSION['proctor_email'];
    $studentDetail = $student->getStudentByProctor($usn,$proctor_email);
    $dependent = $student->getStudentDependent($usn);
    $marks = $_SESSION['marks'];
    echo "<script>
            const student = $studentDetail;
            console.log(student);
            const dependent = $dependent;
            const marks = $marks;
    </script>";
}



if(isset($_GET['student_usn']) && isset($_GET['email_id'])) {
    $usn = $_GET['student_usn'];
    $proctor_email = $_GET['email_id'];
    $dependent = $student->getStudentDependent($usn);
    $marks = $student->getMarksByUsn($usn);
    $studentDetail = $student->getStudentByProctor($usn,$proctor_email);
    echo "<script>
            const student = $studentDetail;
            const dependent = $dependent;
            const marks = $marks;
    </script>";
    $_SESSION['usn'] = $usn;
    $_SESSION['proctor_email'] = $proctor_email;
    $_SESSION['studentDetail'] = $studentDetail;
    $_SESSION['dependent'] = $dependent;
    $_SESSION['marks'] = $marks;


}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Student Details</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/studentDetail.css">

</head>
<body>
    <div class="header-container"></div>
    <div class="student-container container">
    <h1 style="font-size:30px;">
    STUDENT DETAIL
    </h1>
    
    </div>
    <div class="dependent-container container mt-4">
    <h1 style="font-size:30px;">
    PARENT DETAIL
    </h1>
    
    </div>

    <div class="marks-container container mt-4">
    <h1 style="font-size:30px;">
    MARKS DETAIL
    </h1>
    </div>

    <div class="update-student container mt-4" id="student-form">
    <h1 style="font-size:30px;">
    UPDATE STUDENT
    </h1>
    </div>

    <div class="update-dependent container mt-4" id="dependent-form">
    <h1 style="font-size:30px;">
    UPDATE PARENT
    </h1>
    </div>




<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="js/studentDetail.js"></script>
</body>
</html>