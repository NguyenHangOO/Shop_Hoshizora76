<?php
    class UserModel extends DB {

        function InsertMember($fullname,$username,$password,$email){
            $sqr = "INSERT INTO member(`fullname`, `username`, `password`, `email`,trangthai) VALUES ('$fullname','$username','$password','$email',1)";
            $result = false;
            if(mysqli_query ($this->con, $sqr)){
                $result = true;
            }
            return json_encode($result);
        }
        function InsertImg($image_url,$username){
            $sql="UPDATE `member` SET `img`='".$image_url."',`created`='" . date('Y-m-d H:i:s') . "' WHERE `username`='".$username."'";
            $result = false;
            $smt = mysqli_prepare($this->con, $sql);
            if (mysqli_stmt_execute($smt)) {
                $result = true;
            } 
            return json_encode($result);
        }
        function InsertAddress($hoten,$sdt,$diachi,$macdinh,$create,$xa,$huyen,$tinh,$chon){
            $sqr = "INSERT INTO diachi(`hoten`, `sdt`, `diachi`, `macdinh`, `member_id`, `xa`, `huyen`, `tinh`,`chon`) VALUES ('$hoten','$sdt','$diachi','$macdinh','$create','$xa','$huyen','$tinh','$chon')";
            $result = false;
            if(mysqli_query ($this->con, $sqr)){
                $result = true;
            }
            return json_encode($result);
        }
        function UpAddress($hoten,$sdt,$diachi,$macdinh,$xa,$huyen,$tinh,$id,$chon){
            $sqr = "UPDATE `diachi` SET `hoten`='$hoten',`diachi`='$diachi',`macdinh`='$macdinh',`chon`='$chon',`sdt`='$sdt',`xa`='$xa',`huyen`='$huyen',`tinh`='$tinh' WHERE id = $id";
            $result = false;
            if(mysqli_query ($this->con, $sqr)){
                $result = true;
            }
            return json_encode($result);
        }
        function UpMDAddress($create){
            $sqr = "UPDATE `diachi` SET `macdinh`='0',chon=0 WHERE member_id=$create";
            $result = false;
            if(mysqli_query ($this->con, $sqr)){
                $result = true;
            }
            return json_encode($result);
        }
        function UpChonAddress($create){
            $sqr = "UPDATE `diachi` SET chon='0' WHERE member_id=$create";
            $result = false;
            if(mysqli_query ($this->con, $sqr)){
                $result = true;
            }
            return json_encode($result);
        }
        function ChonAddress($create,$iddc){
            $sqr = "UPDATE `diachi` SET chon='1' WHERE member_id=$create and id=$iddc";
            $result = false;
            if(mysqli_query ($this->con, $sqr)){
                $result = true;
            }
            return json_encode($result);
        }
        function UpInfo($hoten,$email,$ngaysinh,$gioitinh,$username){
            $sqr = "UPDATE `member` SET `fullname`='$hoten', email='$email', ngaysinh='$ngaysinh',gioitinh='$gioitinh' WHERE username='$username'";
            $result = false;
            if(mysqli_query ($this->con, $sqr)){
                $result = true;
            }
            return json_encode($result);
        }
        function UpInfoPass($hoten,$email,$ngaysinh,$gioitinh,$username,$mkmoi){
            $sqr = "UPDATE `member` SET `fullname`='$hoten', email='$email', ngaysinh='$ngaysinh',gioitinh='$gioitinh',`password`='$mkmoi' WHERE username='$username'";
            $result = false;
            if(mysqli_query ($this->con, $sqr)){
                $result = true;
            }
            return json_encode($result);
        }
        public function checkUsername($un){
            $qr = "SELECT id from member where username='$un'";
            $rows = mysqli_query($this->con, $qr);
            $kq = "<span style=\"color:green\">Username hợp lệ</span>";
            if( mysqli_num_rows($rows)>0){
                $kq ="<span style=\"color:red\">Username đã tồn tại</span>";
            }
            return $kq;
        }
        public function checkEmail($em){
            $qr = "SELECT id from `member` where email='$em'";
            $rows = mysqli_query($this->con, $qr);
            $kq = "<span style=\"color:green\">Email hợp lệ</span>";
            if( mysqli_num_rows($rows)>0){
                $kq ="<span style=\"color:red\">Email đã được sử dụng</span>";
            }
            return $kq;
        }
        function GetMember($username){
            $sqr = "SELECT * FROM member where username='$username'";
            $rows = mysqli_query($this->con, $sqr);
            $mang = array();
            while ($row = mysqli_fetch_array($rows)){
                $mang[] = $row;
            }
            return json_encode($mang);
        }
        function GetMemberEmail($username){
            $sqr = "SELECT * FROM member where email='$username'";
            $rows = mysqli_query($this->con, $sqr);
            $mang = array();
            while ($row = mysqli_fetch_array($rows)){
                $mang[] = $row;
            }
            return json_encode($mang);
        }
        function GetThongBao(){
            if (isset($_SESSION['username'])){
                $username= $_SESSION['username'];
                $sqr = "SELECT tb.id FROM thongbao as tb, member as m where  member_id= m.id and m.username='$username' and tb.trangthai='Chưa xem'";
                $rows = mysqli_query($this->con, $sqr);
                $mang = array();
                while ($row = mysqli_fetch_array($rows)){
                    $mang[] = $row;
                }
                return json_encode($mang);
            }
        }
        function GetTB(){
            if (isset($_SESSION['username'])){
                $username= $_SESSION['username'];
                $sqr = "SELECT tb.id,tb.noidung,tb.ngaytb,tb.trangthai FROM thongbao as tb, member as m where  member_id= m.id and m.username='$username'ORDER BY ngaytb DESC";
                $rows = mysqli_query($this->con, $sqr);
                $mang = array();
                while ($row = mysqli_fetch_array($rows)){
                    $mang[] = $row;
                }
                return json_encode($mang);
            }
        }
        public function DocTB($id,$iduss){
            $qr = "UPDATE `thongbao` SET `trangthai`= 'Đã xem' WHERE id=$id and member_id= $iduss" ;
            $rows = mysqli_query($this->con, $qr);
        }
        public function DELTB($id,$iduss){
            $qr = "DELETE  FROM `thongbao` WHERE id=$id and member_id= $iduss " ;
            $rows = mysqli_query($this->con, $qr);
        }
        public function DELTBALL($iduss){
            $qr = "DELETE  FROM `thongbao` WHERE member_id= $iduss " ;
            $rows = mysqli_query($this->con, $qr);
        }
        function DELAddress($id){
            $qr = "DELETE  FROM `diachi` WHERE id=$id" ;
            $rows = mysqli_query($this->con, $qr);
        }
        function GetDiaChi($username){
            $sqr = "SELECT dc.* FROM diachi as dc, member as m where username='$username' and dc.member_id = m.id";
            $rows = mysqli_query($this->con, $sqr);
            $mang = array();
            while ($row = mysqli_fetch_array($rows)){
                $mang[] = $row;
            }
            return json_encode($mang);
        }
        function GetDChi($id,$iduss){
            $sqr = "SELECT * FROM diachi where id = $id and member_id=$iduss";
            $rows = mysqli_query($this->con, $sqr);
            $mang = array();
            while ($row = mysqli_fetch_array($rows)){
                $mang[] = $row;
            }
            return json_encode($mang);
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
?>