<?php
include("php/config.php");
include("php/classes/Account.php");
include("php/classes/Student.php");

if(isset($_GET['logout'])) {
    session_destroy();
    header("Location: login.php?logout=1");
}




?>