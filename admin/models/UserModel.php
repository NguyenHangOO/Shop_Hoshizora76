<?php
    class UserModel extends DB {
        function GetAdmin($username){
            $sqr = "SELECT * FROM `admin` where username='$username'";
            $rows = mysqli_query($this->con, $sqr);
            $mang = array();
            while ($row = mysqli_fetch_array($rows)){
                $mang[] = $row;
            }
            return json_encode($mang);
        }
        function GetDSAdmin(){
            $sqr = "SELECT * FROM `admin`";
            $rows = mysqli_query($this->con, $sqr);
            $mang = array();
            while ($row = mysqli_fetch_array($rows)){
                $mang[] = $row;
            }
            return json_encode($mang);
        }
        function GetDSMember(){
            $sqr = "SELECT id,fullname,username,img,trangthai  FROM `member`";
            $rows = mysqli_query($this->con, $sqr);
            $mang = array();
            while ($row = mysqli_fetch_array($rows)){
                $mang[] = $row;
            }
            return json_encode($mang);
        }
        function LockStaff($id){
            $sqr = "UPDATE `admin` SET `trangthai`='0' WHERE id= $id";
            $relust = false;
            if($rows = mysqli_query($this->con, $sqr)){
                $relust = true;
            }
            return json_encode($relust);
        }
        function UnlockStaff($id){
            $sqr = "UPDATE `admin` SET `trangthai`='1' WHERE id= $id";
            $relust = false;
            if($rows = mysqli_query($this->con, $sqr)){
                $relust = true;
            }
            return json_encode($relust);
        }
        function LockUser($id){
            $sqr = "UPDATE `member` SET `trangthai`='0' WHERE id= $id";
            $relust = false;
            if($rows = mysqli_query($this->con, $sqr)){
                $relust = true;
            }
            return json_encode($relust);
        }
        function UnlockUser($id){
            $sqr = "UPDATE `member` SET `trangthai`='1' WHERE id= $id";
            $relust = false;
            if($rows = mysqli_query($this->con, $sqr)){
                $relust = true;
            }
            return json_encode($relust);
        }
        function Capnhatmatkhau($mkmoi,$useradmin){
            $sqr = "UPDATE `admin` SET `password`='$mkmoi' WHERE username ='$useradmin'";
            $relust = false;
            if($rows = mysqli_query($this->con, $sqr)){
                $relust = true;
            }
            return json_encode($relust);
        }
    }