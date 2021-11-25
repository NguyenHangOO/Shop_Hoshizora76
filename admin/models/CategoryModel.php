<?php
    class CategoryModel extends DB {
        public function GetDM(){
            $qr = "SELECT * FROM `danhmuc` ";
            $rows = mysqli_query($this->con, $qr);
            $mang = array();
            while ($row = mysqli_fetch_array($rows)){
                $mang[] = $row;
            }
            return json_encode($mang);
        }
        public function GetDM1(){
            $qr = "SELECT * FROM `loai1` ";
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
        public function GetDM1id($id){
            $qr = "SELECT l1.tenloai,l1.id FROM `loai1` as l1, sanpham as sp where sp.id = $id and sp.loai1_id = l1.id";
            $rows = mysqli_query($this->con, $qr);
            $mang = array();
            while ($row = mysqli_fetch_array($rows)){
                $mang[] = $row;
            }
            return json_encode($mang);
        }
        public function GetDM3id($id){
            $qr = "SELECT l3.tenloai,l3.id FROM `loai3` as l3, sanpham as sp where sp.id = $id and sp.loai3_id = l3.id";
            $rows = mysqli_query($this->con, $qr);
            $mang = array();
            while ($row = mysqli_fetch_array($rows)){
                $mang[] = $row;
            }
            return json_encode($mang);
        }
        function IntLoai3($ten,$icon){
            $sqr = "INSERT INTO `loai3`(`tenloai`, `icon`) VALUES ('$ten','$icon')";
            $relust = false;
            if($rows = mysqli_query($this->con, $sqr)){
                $relust = true;
            }
            return json_encode($relust);
        }
        function UpLoai3($id,$ten,$icon){
            $sqr = "UPDATE `loai3` SET `tenloai`='$ten',`icon`='$icon' WHERE id =$id";
            $relust = false;
            if($rows = mysqli_query($this->con, $sqr)){
                $relust = true;
            }
            return json_encode($relust);
        }
        function DelLoai3($id){
            $sqr = "DELETE FROM `loai3` WHERE id =$id";
            $relust = false;
            if($rows = mysqli_query($this->con, $sqr)){
                $relust = true;
            }
            return json_encode($relust);
        }
        function IntLoai1($ten,$icon){
            $sqr = "INSERT INTO `loai1`(`tenloai`, `icon`) VALUES ('$ten','$icon')";
            $relust = false;
            if($rows = mysqli_query($this->con, $sqr)){
                $relust = true;
            }
            return json_encode($relust);
        }
        function UpLoai1($id,$ten,$icon){
            $sqr = "UPDATE `loai1` SET `tenloai`='$ten',`icon`='$icon' WHERE id =$id";
            $relust = false;
            if($rows = mysqli_query($this->con, $sqr)){
                $relust = true;
            }
            return json_encode($relust);
        }
        function DelLoai1($id){
            $sqr = "DELETE FROM `loai1` WHERE id =$id";
            $relust = false;
            if($rows = mysqli_query($this->con, $sqr)){
                $relust = true;
            }
            return json_encode($relust);
        }
    }
?>