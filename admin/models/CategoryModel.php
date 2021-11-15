<?php
    class CategoryModel extends DB {
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
    }
?>