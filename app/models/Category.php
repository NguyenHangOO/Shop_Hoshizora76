<?php
    class Category extends DB {
        public function GetDM1(){
            $qr = "SELECT * FROM `loai1` ";
            //return mysqli_query($this->con, $qr);
            $rows = mysqli_query($this->con, $qr);
            $mang = array();
            while ($row = mysqli_fetch_array($rows)){
                $mang[] = $row;
            }
            return json_encode($mang);
        }
        public function GetDM3(){
            $qr = "SELECT * FROM `loai3` ";
            $rows = mysqli_query($this->con, $qr);
            $mang = array();
            while ($row = mysqli_fetch_array($rows)){
                $mang[] = $row;
            }
            return json_encode($mang);
        }
        public function GetDM1id($id,$lid){
            if($id==3){
                $qr = "SELECT tenloai FROM `loai1` where id=$lid";
                $rows = mysqli_query($this->con, $qr);
                $mang = array();
                while ($row = mysqli_fetch_array($rows)){
                    $mang[] = $row;
                }
                return json_encode($mang);
            }
            else if($id==4){
                $qr = "SELECT tenloai FROM `loai3` where id=$lid";
                $rows = mysqli_query($this->con, $qr);
                $mang = array();
                while ($row = mysqli_fetch_array($rows)){
                    $mang[] = $row;
                }
                return json_encode($mang);
            }
            else {
                $qr = "SELECT tenloai FROM `loai1` where id=1";
                $rows = mysqli_query($this->con, $qr);
                $mang = array();
                while ($row = mysqli_fetch_array($rows)){
                    $mang[] = $row;
                }
                return json_encode($mang);
            }
            
        }
        public function GetDM($id){
            $qr = "SELECT tendm FROM `danhmuc` where id=$id ";
            $rows = mysqli_query($this->con, $qr);
            $mang = array();
            while ($row = mysqli_fetch_array($rows)){
                $mang[] = $row;
            }
            return json_encode($mang);
        }
    }
?>