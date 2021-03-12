<?php
    class Student {
        private $con;
        private $errorArray;

        public function __construct($con) {
            $this->con = $con;
            $this->errorArray = array();
        }

        public function getStudent($em) {
            $result = array();
            $rows = mysqli_query($this->con,"SELECT * from student s,is_under i,proctor p where s.usn=i.usn and p.p_id=i.p_id and p.email_id='$em'");
            while($row = mysqli_fetch_array($rows)) {
                array_push($result,$row);
            }
            $jsonArray = json_encode($result);
            return $jsonArray;
        }

        public function getStudentByProctor($usn,$em) {
            $result = array();
            $rows = mysqli_query($this->con,"SELECT s.* from student s,proctor p,is_under i where i.usn=s.usn and p.p_id=i.p_id and i.usn='$usn' and p.email_id='$em'");
            while($row = mysqli_fetch_array($rows)) {
                array_push($result,$row);
            }
            $jsonArray = json_encode($result);
            return $jsonArray; 
        }

        public function getStudentDependent($usn) {
            $result = array();
            $rows = mysqli_query($this->con,"SELECT d.* from student s,dependent d where s.usn=d.usn and d.usn='$usn'");
            while($row = mysqli_fetch_array($rows)) {
                array_push($result,$row);
            }
            $jsonArray = json_encode($result);
            return $jsonArray; 

        }

        public function getMarksByUsn($usn) {
            $result = array();
            $rows = mysqli_query($this->con,"SELECT m.* from marks m where usn='$usn'");
            while($row = mysqli_fetch_array($rows)) {
                array_push($result,$row);
            }
            $jsonArray = json_encode($result);
            return $jsonArray;
        }

        public function updateDetails($usn,$name,$sem,$phone,$address) {
            $rows = mysqli_query($this->con,"UPDATE student set name='$name',sem='$sem',ph_no='$phone',address='$address' where usn='$usn'");
        }

        public function updateDetailsOfDependent($usn,$name,$email,$phone,$address) {
            $rows = mysqli_query($this->con,"UPDATE dependent set name='$name',d_email='$email',d_phno='$phone',address='$address' where usn='$usn'");
            if($rows) {
            }
        }

        public function deleteStudentByUsn($usn,$em) {
            //$rows = mysqli_query($this->con,"DELETE from is_under where usn='$usn' and p_id=(select p.p_id from proctor p where p.email_id='$em')");
            $rows = mysqli_query($this->con,"DELETE from student where usn='$usn'");

        }

        public function insertStudent($usn,$name,$sem,$phone,$address,$proctorEmail) {
            $proctor_query = mysqli_query($this->con,"SELECT p_id from proctor where email_id='$proctorEmail'");
            if($row = mysqli_fetch_array($proctor_query)) {
                $p_id = $row[0];
                $rows = mysqli_query($this->con,"SELECT * from student where usn='$usn'");
                if($row = mysqli_fetch_array($rows)) {
                echo "<script>alert('USN already exists');</script>";
                }
                else {
                $insert = mysqli_query($this->con,"INSERT INTO student values('$name','$usn','$sem','$address','$phone')");
                $is_under = mysqli_query($this->con,"INSERT INTO is_under values('$p_id','$usn')");
                }
            }
        }

    }
?>