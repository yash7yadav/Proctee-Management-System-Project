<?php
    class Account {
        private $con;

        public function __construct($con) {
            $this->con = $con;
        }

        public function login($em,$pw) {
            $query = mysqli_query($this->con,"SELECT * FROM proctor where password='$pw' AND email_id='$em'");
            if(mysqli_num_rows($query) == 1) {
                $_SESSION['proctor_email'] = $em;
                header("Location: index.php");
            }
            else {
                echo "<script>alert('Invaid Email or Password');</script>";
            }
        }

        public function getProctorNameByEmailId($em) {
            $result = array();
            $rows = mysqli_query($this->con,"SELECT name,email_id from proctor where email_id='$em'");
            while($row = mysqli_fetch_array($rows)) {
                array_push($result,$row);
            }
            $jsonArray = json_encode($result);
            return $jsonArray;
        }

        public function insertProctor($proctor_name,$proctor_email,$proctor_phno,$proctor_password) {
            $query = mysqli_query($this->con,"Select * from proctor where name='$proctor_name'");
            if($row = mysqli_fetch_array($query)) {
                echo "<script>alert('Proctor already exists');</script>";
            }
            else {
            $rows = mysqli_query($this->con,"INSERT INTO proctor(name,pph_no,email_id,password) values('$proctor_name','$proctor_phno','$proctor_email','$proctor_password')");
            $_SESSION['proctor_email'] = $proctor_email;
            echo "INSERTED SUCESS";
            header("Location: index.php");
            }
        }


    }
?>