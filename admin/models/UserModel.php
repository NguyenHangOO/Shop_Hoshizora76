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
        function GetAdminEmail($username){
            $sqr = "SELECT * FROM `admin` where email='$username'";
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
            $sqr = "SELECT id,fullname,username,img,trangthai,email  FROM `member`";
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
        function  GrantPermission($id){
            $sqr = "UPDATE `admin` SET `quyen`='1' WHERE id= $id";
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
        function Capnhathoso($fullname,$email,$image_url,$useradmin){
            $sqr = "UPDATE `admin` SET `fullname`='$fullname',email='$email',img='$image_url' WHERE username ='$useradmin'";
            $relust = false;
            if($rows = mysqli_query($this->con, $sqr)){
                $relust = true;
            }
            return json_encode($relust);
        }
        function Capnhathosokoanh($fullname,$email,$useradmin){
            $sqr = "UPDATE `admin` SET `fullname`='$fullname',email='$email' WHERE username ='$useradmin'";
            $relust = false;
            if($rows = mysqli_query($this->con, $sqr)){
                $relust = true;
            }
            return json_encode($relust);
        }
        function Thennhanvien($fullname,$email,$username,$pass){
            $sqr = "INSERT INTO `admin`(`username`, `password`, `fullname`, `quyen`, `email`,trangthai) VALUES ('$username','$pass','$fullname','0','$email','1')";
            $relust = false;
            if($rows = mysqli_query($this->con, $sqr)){
                $relust = true;
            }
            return json_encode($relust);
        }
        public function checkUsername($un){
            $qr = "SELECT id from `admin` where username='$un'";
            $rows = mysqli_query($this->con, $qr);
            $kq = "<span style=\"color:green\">Username hợp lệ</span>";
            if( mysqli_num_rows($rows)<=0){
                $qr = "SELECT id from `member` where username='$un'";
                $rows = mysqli_query($this->con, $qr);
                $kq = "<span style=\"color:green\">Username hợp lệ</span>";
                if( mysqli_num_rows($rows)>0){
                    $kq ="<span style=\"color:red\">Username đã tồn tại</span>";
                }
            }else {$kq ="<span style=\"color:red\">Username đã tồn tại</span>";}
            return $kq;
        }
        public function checkEmail($em){
            $qr = "SELECT id from `admin` where email='$em'";
            $rows = mysqli_query($this->con, $qr);
            $kq = "<span style=\"color:green\">Email hợp lệ</span>";
            if( mysqli_num_rows($rows)<=0){
                $qr = "SELECT id from `member` where email='$em'";
                $rows = mysqli_query($this->con, $qr);
                $kq = "<span style=\"color:green\">Email hợp lệ</span>";
                if( mysqli_num_rows($rows)>0){
                    $kq ="<span style=\"color:red\">Email đã được sử dụng</span>";
                }
            }else {$kq ="<span style=\"color:red\">Email đã được sử dụng</span>";}
            return $kq;
        }
        function ThongBao($idmem,$ngay,$nd){
            $sqr = "INSERT INTO `thongbao`(`member_id`, `noidung`, `ngaytb`, `trangthai`) VALUES ('$idmem','$nd','$ngay','Chưa xem')";
            $relust = false;
            if($rows = mysqli_query($this->con, $sqr)){
                $relust = true;
            }
            return json_encode($relust);
        }
    }