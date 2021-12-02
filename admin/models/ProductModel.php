<?php
    class ProductModel extends DB {
        function GetDSSP(){
            $sqr = "SELECT * FROM `sanpham` ORDER BY id DESC";
            $rows = mysqli_query($this->con, $sqr);
            $mang = array();
            while ($row = mysqli_fetch_array($rows)){
                $mang[] = $row;
            }
            return json_encode($mang);
        }
        public function UpSlgSp($idsp,$slgdat){
            $sqr = "UPDATE `sanpham` SET `soluong`=soluong+$slgdat WHERE id=$idsp";
            $result = false;
            if(mysqli_query ($this->con, $sqr)){
                $result = true;
            }
            return json_encode($result);
        }
        function GetCTSPid($id){
            $sqr = "SELECT * FROM thongtinsp where sanpham_id = $id";
            $rows = mysqli_query($this->con, $sqr);
            $mang = array();
            while ($row = mysqli_fetch_array($rows)){
                $mang[] = $row;
            }
            return json_encode($mang);
        }
        function GetSPid($id){
            $sqr = "SELECT sp.*,m.tendm,m.id as iddm FROM `sanpham`as sp, danhmuc as m where sp.id = $id and danhmuc_id = m.id";
            $rows = mysqli_query($this->con, $sqr);
            $mang = array();
            while ($row = mysqli_fetch_array($rows)){
                $mang[] = $row;
            }
            return json_encode($mang);
        }
        function GetDGSP($id){
            $sqr = "SELECT AVG(diem) as dtb FROM danhgia  WHERE sanpham_id = $id and diem not in(-1) GROUP BY sanpham_id";
            $rows = mysqli_query($this->con, $sqr);
            $mang = array();
            while ($row = mysqli_fetch_array($rows)){
                $mang[] = $row;
            }
            return json_encode($mang);
        }
        public function StopSP($id){
            $sqr = "UPDATE `sanpham` SET `ttban`=0 WHERE id=$id";
            $result = false;
            if(mysqli_query ($this->con, $sqr)){
                $result = true;
            }
            return json_encode($result);
        }
        public function StartSP($id){
            $sqr = "UPDATE `sanpham` SET `ttban`=1 WHERE id=$id";
            $result = false;
            if(mysqli_query ($this->con, $sqr)){
                $result = true;
            }
            return json_encode($result);
        }
        public function InsertSP($tensp,$giagoc,$giaban,$soluong,$image_url,$mota,$danhmuc,$loai1,$loai3){
            if($loai1 ==""){
                if($loai3==""){
                    $sqr = "INSERT INTO `sanpham`(`tensp`, `giagoc`, `giaban`, `soluong`, `hinhanh`, `mota`, `danhmuc_id`, `ttban`,`luotmua`,`luotxem`) VALUES ('$tensp','$giagoc','$giaban','$soluong','$image_url','$mota','$danhmuc','1',0,0)";
                }else {
                    $sqr = "INSERT INTO `sanpham`(`tensp`, `giagoc`, `giaban`, `soluong`, `hinhanh`, `mota`, `danhmuc_id`, `loai3_id`, `ttban`,`luotmua`,`luotxem`) VALUES ('$tensp','$giagoc','$giaban','$soluong','$image_url','$mota','$danhmuc','$loai3','1',0,0)";
                }
            }else if($loai3==""){
                $sqr = "INSERT INTO `sanpham`(`tensp`, `giagoc`, `giaban`, `soluong`, `hinhanh`, `mota`, `danhmuc_id`, `ttban`,`luotmua`,`luotxem`) VALUES ('$tensp','$giagoc','$giaban','$soluong','$image_url','$mota','$danhmuc','1',0,0)";
            }else {
                $sqr = "INSERT INTO `sanpham`(`tensp`, `giagoc`, `giaban`, `soluong`, `hinhanh`, `mota`, `danhmuc_id`, `loai1_id`, `loai3_id`, `ttban`,`luotmua`,`luotxem`) VALUES ('$tensp','$giagoc','$giaban','$soluong','$image_url','$mota','$danhmuc','$loai1','$loai3','1',0,0)";
            }
            $result = false;
            if(mysqli_query ($this->con, $sqr)){
                $result = true;
            }
            return json_encode($result);
        }
        public function InsertTTSP($idsp,$thuonghieu,$xuatxu,$chatlieu,$kieudang,$baohanh){
            $sqr = "INSERT INTO `thongtinsp`(`sanpham_id`, `thuonghieu`, `xuatxu`, `chatlieu`, `kieudang`, `baohanh`) VALUES ('$idsp','$thuonghieu','$xuatxu','$chatlieu','$kieudang','$baohanh')";
            $result = false;
            if(mysqli_query ($this->con, $sqr)){
                $result = true;
            }
            return json_encode($result);
        }
        function GetidSP($tensp){
            $sqr = "SELECT id FROM `sanpham` where tensp='$tensp'";
            $rows = mysqli_query($this->con, $sqr);
            $mang = array();
            while ($row = mysqli_fetch_array($rows)){
                $mang[] = $row;
            }
            return json_encode($mang);
        }
        public function autosp($idsp){
            $sqr = "INSERT INTO `danhgia`(`sanpham_id`, `diem`) VALUES ('$idsp','0')";
            $result = false;
            if(mysqli_query ($this->con, $sqr)){
                $result = true;
            }
            return json_encode($result);
        }
        public function UpSP($tensp,$giagoc,$giaban,$soluong,$image_url,$mota,$danhmuc,$loai1,$loai3,$id){
            if($loai1 ==""){
                if($loai3==""){
                    $sqr = "UPDATE `sanpham` SET `tensp`='$tensp',`giagoc`='$giagoc',`giaban`='$giaban',`soluong`='$soluong',`hinhanh`='$image_url',`mota`='$mota',`danhmuc_id`='$danhmuc' WHERE id = $id";
                }else {
                    $sqr = "UPDATE `sanpham` SET `tensp`='$tensp',`giagoc`='$giagoc',`giaban`='$giaban',`soluong`='$soluong',`hinhanh`='$image_url',`mota`='$mota',`danhmuc_id`='$danhmuc',`loai3_id`='$loai3' WHERE id = $id";
                }
            }else if($loai3==""){
                $sqr = "UPDATE `sanpham` SET `tensp`='$tensp',`giagoc`='$giagoc',`giaban`='$giaban',`soluong`='$soluong',`hinhanh`='$image_url',`mota`='$mota',`danhmuc_id`='$danhmuc' WHERE id = $id";
            }else {
                $sqr = "UPDATE `sanpham` SET `tensp`='$tensp',`giagoc`='$giagoc',`giaban`='$giaban',`soluong`='$soluong',`hinhanh`='$image_url',`mota`='$mota',`danhmuc_id`='$danhmuc',`loai1_id`='$loai1',`loai3_id`='$loai3' WHERE id = $id";
            }
            $result = false;
            if(mysqli_query ($this->con, $sqr)){
                $result = true;
            }
            return json_encode($result);
        }
        public function UpSPKOANH($tensp,$giagoc,$giaban,$soluong,$mota,$danhmuc,$loai1,$loai3,$id){
            if($loai1 ==""){
                if($loai3==""){
                    $sqr = "UPDATE `sanpham` SET `tensp`='$tensp',`giagoc`='$giagoc',`giaban`='$giaban',`soluong`='$soluong',`mota`='$mota',`danhmuc_id`='$danhmuc' WHERE id = $id";
                }else {
                    $sqr = "UPDATE `sanpham` SET `tensp`='$tensp',`giagoc`='$giagoc',`giaban`='$giaban',`soluong`='$soluong',`mota`='$mota',`danhmuc_id`='$danhmuc',`loai3_id`='$loai3' WHERE id = $id";
                }
            }else if($loai3==""){
                $sqr = "UPDATE `sanpham` SET `tensp`='$tensp',`giagoc`='$giagoc',`giaban`='$giaban',`soluong`='$soluong',`mota`='$mota',`danhmuc_id`='$danhmuc' WHERE id = $id";
            }else {
                $sqr = "UPDATE `sanpham` SET `tensp`='$tensp',`giagoc`='$giagoc',`giaban`='$giaban',`soluong`='$soluong',`mota`='$mota',`danhmuc_id`='$danhmuc',`loai1_id`='$loai1',`loai3_id`='$loai3' WHERE id = $id";
            }
            $result = false;
            if(mysqli_query ($this->con, $sqr)){
                $result = true;
            }
            return json_encode($result);
        }
        public function UpTTSP($id,$thuonghieu,$xuatxu,$chatlieu,$kieudang,$baohanh){
            $sqr = "UPDATE `thongtinsp` SET `thuonghieu`='$thuonghieu',`xuatxu`='$xuatxu',`chatlieu`='$chatlieu',`kieudang`='$kieudang',`baohanh`='$baohanh' WHERE sanpham_id = $id";
            $result = false;
            if(mysqli_query ($this->con, $sqr)){
                $result = true;
            }
            return json_encode($result);
        }
        public function GiamLuotMua($id,$slg){
            $qr = "UPDATE `sanpham` SET `luotmua`= luotmua-$slg WHERE id=$id" ;
            $rows = mysqli_query($this->con, $qr);
        }
    }
?>