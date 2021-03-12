<?php
    include("php/config.php");
    include("php/classes/Account.php");

    $account = new Account($con);


   if(isset($_GET['logout'])) {
    echo "<script>alert('Logged out successfully')</script>";
  }
    if(isset($_POST['btn-login']))
    {
      $em = $_POST['proctor_email'];
      $pw = $_POST['proctor_password'];
      $account->login($em,$pw);
    }
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">


    <title>Proctee Management System</title>
  </head>
  <body>
    <form class="login-form" action="login.php" method="post">
  <div class="form-group">
    <h1 class="display-4">Proctee Management System</h1>
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control"  id="exampleInputEmail1" aria-describedby="emailHelp" name="proctor_email" required>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" name="proctor_password" required>
  </div>
  <div class="form-group form-check">
  </div>
  <button type="submit" class="btn btn-primary btn-login" name="btn-login">Login</button><br>
  <a href="register.php">Register as a new Proctor</a>
</form>

  </body>
</html>