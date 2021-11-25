<?php
    class OrderModel extends DB { 
        function AddCart($id,$idus,$slg){
            $sqr = "INSERT INTO giohang(`sanpham_id`, `member_id`, `soluong`) VALUES ('$id','$idus','$slg')";
            $result = false;
            if(mysqli_query ($this->con, $sqr)){
                $result = true;
            }
            return json_encode($result);
        }
        function UpTCart($id,$idgh){
            $sqr = "UPDATE `giohang` SET `soluong`=soluong+1 WHERE id='$idgh' and sanpham_id='$id'";
            $result = false;
            if(mysqli_query ($this->con, $sqr)){
                $result = true;
            }
            return json_encode($result);
        }
        function UpGCart($id,$idgh){
            $sqr = "UPDATE `giohang` SET `soluong`=soluong-1 WHERE id='$idgh' and sanpham_id='$id'";
            $result = false;
            if(mysqli_query ($this->con, $sqr)){
                $result = true;
            }
            return json_encode($result);
        }
        function DelCart($id,$iduss){
            $sqr = "DELETE FROM `giohang` WHERE sanpham_id='$id' and member_id='$iduss'";
            $result = false;
            if(mysqli_query ($this->con, $sqr)){
                $result = true;
            }
            return json_encode($result);
        }
        function DelAllCart($iduss){
            $sqr = "DELETE FROM `giohang` WHERE member_id='$iduss'";
            $result = false;
            if(mysqli_query ($this->con, $sqr)){
                $result = true;
            }
            return json_encode($result);
        }
        function InDonHang($iddh,$iddc,$iduss,$ngay,$tongtien){
            $sqr = "INSERT INTO `donhang`( `id`,`member_id`, `diachi_id`, `ngay`, `tongtien`, `tinhtrang`) VALUES ('$iddh','$iduss','$iddc','$ngay','$tongtien','Xử lý')";
            $result = false;
            if(mysqli_query ($this->con, $sqr)){
                $result = true;
            }
            return json_encode($result);
        }
        function InCTDonHang($iddh,$idsp,$giasp,$slgdat,$thanhtien){
            $sqr = "INSERT INTO `donhangct`(`donhang_id`, `sanpham_id`, `dongia`, `soluong`, `thanhtien`) VALUES ('$iddh','$idsp','$giasp','$slgdat','$thanhtien')";
            $result = false;
            if(mysqli_query ($this->con, $sqr)){
                $result = true;
            }
            return json_encode($result);
        }
        public function GetDonHang($iduss){
            $qr = "SELECT * FROM `donhang` WHERE member_id=$iduss";
            $rows = mysqli_query($this->con, $qr);
            $mang = array();
            while ($row = mysqli_fetch_array($rows)){
                $mang[] = $row;
            }
            return json_encode($mang);
        }
        public function GetDonHangHuy($iduss){
            $qr = "SELECT * FROM `donhang` WHERE member_id=$iduss and tinhtrang='Đã hủy'";
            $rows = mysqli_query($this->con, $qr);
            $mang = array();
            while ($row = mysqli_fetch_array($rows)){
                $mang[] = $row;
            }
            return json_encode($mang);
        }
        public function GetDonHangXN($iduss){
            $qr = "SELECT * FROM `donhang` WHERE member_id=$iduss and tinhtrang='Đã xác nhận'";
            $rows = mysqli_query($this->con, $qr);
            $mang = array();
            while ($row = mysqli_fetch_array($rows)){
                $mang[] = $row;
            }
            return json_encode($mang);
        }
        public function GetDonHangCXN($iduss){
            $qr = "SELECT * FROM `donhang` WHERE member_id=$iduss and tinhtrang='Xử lý'";
            $rows = mysqli_query($this->con, $qr);
            $mang = array();
            while ($row = mysqli_fetch_array($rows)){
                $mang[] = $row;
            }
            return json_encode($mang);
        }
        public function GetDonHangDagGiao($iduss){
            $qr = "SELECT * FROM `donhang` WHERE member_id=$iduss and tinhtrang='Đang giao'";
            $rows = mysqli_query($this->con, $qr);
            $mang = array();
            while ($row = mysqli_fetch_array($rows)){
                $mang[] = $row;
            }
            return json_encode($mang);
        }
        public function GetDonHangDa($iduss){
            $qr = "SELECT * FROM `donhang` WHERE member_id=$iduss and tinhtrang='Đã giao'";
            $rows = mysqli_query($this->con, $qr);
            $mang = array();
            while ($row = mysqli_fetch_array($rows)){
                $mang[] = $row;
            }
            return json_encode($mang);
        }
        public function DonHang($iduss,$idma){
            $qr = "SELECT dh.*,dc.sdt,dc.hoten,dc.diachi,dc.xa,dc.huyen,dc.tinh FROM `donhang` as dh, diachi as dc WHERE dh.member_id=$iduss and dh.id='$idma' and dh.diachi_id=dc.id";
            $rows = mysqli_query($this->con, $qr);
            $mang = array();
            while ($row = mysqli_fetch_array($rows)){
                $mang[] = $row;
            }
            return json_encode($mang);
        }
        public function DonHangChiTiet($idma){
            $qr = "SELECT ct.*,sp.tensp,sp.hinhanh FROM `donhangct` as ct,sanpham as sp WHERE donhang_id='$idma' and ct.sanpham_id=sp.id";
            $rows = mysqli_query($this->con, $qr);
            $mang = array();
            while ($row = mysqli_fetch_array($rows)){
                $mang[] = $row;
            }
            return json_encode($mang);
        }
        public function DGDonHang($idma){
            $qr = "SELECT ct.sanpham_id,dg.diem FROM `donhangct` as ct,danhgia as dg WHERE ct.donhang_id='$idma' and dg.sanpham_id=ct.sanpham_id and ct.donhang_id = dg.donhang_id and diem not in(-1)";
            $rows = mysqli_query($this->con, $qr);
            $mang = array();
            while ($row = mysqli_fetch_array($rows)){
                $mang[] = $row;
            }
            return json_encode($mang);
        }
        function DanhGiaDiem($diem,$iduss,$idsp,$bl,$ngay,$idma){
           $sqr = "UPDATE `danhgia` SET `diem`='$diem',`binhluan`='$bl',`ngaybl`='$ngay' WHERE `sanpham_id`='$idsp'and `member_id`='$iduss' and `donhang_id`='$idma'";
           $result = false;
            if(mysqli_query ($this->con, $sqr)){
                $result = true;
            }
            return json_encode($result);
        }
        function DanhFrist($diem,$iduss,$idsp,$ngay,$idma){
            $sqr = "INSERT INTO `danhgia`(`sanpham_id`, `member_id`, `diem`,`ngaybl`, `donhang_id`) VALUES ('$idsp','$iduss','$diem','$ngay','$idma')";
            $result = false;
             if(mysqli_query ($this->con, $sqr)){
                 $result = true;
             }
             return json_encode($result);
         }
        function HuyDon($idma,$iduss){
            $sqr = "UPDATE `donhang` SET `tinhtrang`='Đã hủy' WHERE id=$idma and member_id=$iduss";
            $result = false;
            if(mysqli_query ($this->con, $sqr)){
                $result = true;
            }
            return json_encode($result);
        }
        public function ResetDiem($idsp){
            $qr = "UPDATE `danhgia` SET `diem`= '-1' WHERE sanpham_id=$idsp and diem=0" ;
            $rows = mysqli_query($this->con, $qr);
        }
    }