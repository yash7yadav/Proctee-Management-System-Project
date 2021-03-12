<?php
include("php/config.php");
include("php/classes/Account.php");
include("php/classes/Student.php");

$account = new Account($con);


if(isset($_POST['btn-register'])) {
    $proctor_name = $_POST['proctor_name'];
    $proctor_email = $_POST['proctor_email'];
    $proctor_phno = $_POST['proctor_phno'];
    $proctor_password = $_POST['proctor_password'];

    $account->insertProctor($proctor_name,$proctor_email,$proctor_phno,$proctor_password);



}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/login.css">

</head>
<body>
<form class="login-form" action="register.php" method="post">
<div class="form-group">
    <h1 class="display-4">REGISTER HERE</h1>
    <label for="proctor_name">Name</label>
    <input type="text" class="form-control"  id="proctor_name" aria-describedby="emailHelp" name="proctor_name" required>
  </div>

  <div class="form-group">
    <label for="proctor_email">Email address</label>
    <input type="email" class="form-control"  id="proctor_email" name="proctor_email" required>
  </div>
  <div class="form-group">
    <label for="proctor_phno">Phone Number</label>
    <input type="text" class="form-control" id="proctor_phno" name="proctor_phno" required>
  </div>
  <div class="form-group">
    <label for="proctor_password">Password</label>
    <input type="password" class="form-control" id="proctor_password" name="proctor_password" required>
  </div>
  <div class="form-group form-check">
  </div>
  <button type="submit" class="btn btn-primary btn-login" name="btn-register">Login</button>
</form>
<script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>