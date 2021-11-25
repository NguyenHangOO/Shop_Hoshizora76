<?php
    class OrderModel extends DB {
        function GetAll(){
            $sqr = "SELECT dh.*,m.fullname FROM `donhang` as dh, member as m where m.id = dh.member_id";
            $rows = mysqli_query($this->con, $sqr);
            $mang = array();
            while ($row = mysqli_fetch_array($rows)){
                $mang[] = $row;
            }
            return json_encode($mang);
        }
        function GetDSDH(){
            $sqr = "SELECT dh.*,m.fullname FROM `donhang` as dh, member as m where tinhtrang='Đã giao' and m.id = dh.member_id";
            $rows = mysqli_query($this->con, $sqr);
            $mang = array();
            while ($row = mysqli_fetch_array($rows)){
                $mang[] = $row;
            }
            return json_encode($mang);
        }
        function GetDSDHDG(){
            $sqr = "SELECT dh.*,m.fullname FROM `donhang` as dh, member as m where tinhtrang='Đang giao' and m.id = dh.member_id";
            $rows = mysqli_query($this->con, $sqr);
            $mang = array();
            while ($row = mysqli_fetch_array($rows)){
                $mang[] = $row;
            }
            return json_encode($mang);
        }
        function GetDSDHXN(){
            $sqr = "SELECT dh.*,m.fullname FROM `donhang` as dh, member as m where tinhtrang='Đã xác nhận' and m.id = dh.member_id";
            $rows = mysqli_query($this->con, $sqr);
            $mang = array();
            while ($row = mysqli_fetch_array($rows)){
                $mang[] = $row;
            }
            return json_encode($mang);
        }
        function GetDSDHXL(){
            $sqr = "SELECT dh.*,m.fullname FROM `donhang` as dh, member as m where tinhtrang='Xử lý' and m.id = dh.member_id";
            $rows = mysqli_query($this->con, $sqr);
            $mang = array();
            while ($row = mysqli_fetch_array($rows)){
                $mang[] = $row;
            }
            return json_encode($mang);
        }
        function GetDSDHHUY(){
            $sqr = "SELECT dh.*,m.fullname FROM `donhang` as dh, member as m where tinhtrang='Đã hủy' and m.id = dh.member_id";
            $rows = mysqli_query($this->con, $sqr);
            $mang = array();
            while ($row = mysqli_fetch_array($rows)){
                $mang[] = $row;
            }
            return json_encode($mang);
        }
        function GetDTDH($m){
            $sqr = "SELECT sum(tongtien) as danhthu FROM `donhang` where MONTH(ngay)=$m and tinhtrang='Đã giao'";
            $rows = mysqli_query($this->con, $sqr);
            $mang = array();
            while ($row = mysqli_fetch_array($rows)){
                $mang[] = $row;
            }
            return json_encode($mang);
        }
        function Xylydonhang($id){
            $sqr = "UPDATE `donhang` SET `tinhtrang`='Đã xác nhận' WHERE id= $id";
            $relust = false;
            if($rows = mysqli_query($this->con, $sqr)){
                $relust = true;
            }
            return json_encode($relust);
        }
        function DangGiaodonhang($id){
            $sqr = "UPDATE `donhang` SET `tinhtrang`='Đang giao' WHERE id= $id";
            $relust = false;
            if($rows = mysqli_query($this->con, $sqr)){
                $relust = true;
            }
            return json_encode($relust);
        }
        function DaGiaodonhang($id){
            $sqr = "UPDATE `donhang` SET `tinhtrang`='Đã giao' WHERE id= $id";
            $relust = false;
            if($rows = mysqli_query($this->con, $sqr)){
                $relust = true;
            }
            return json_encode($relust);
        }
        function Huydonhang($id){
            $sqr = "UPDATE `donhang` SET `tinhtrang`='Đã hủy' WHERE id= $id";
            $relust = false;
            if($rows = mysqli_query($this->con, $sqr)){
                $relust = true;
            }
            return json_encode($relust);
        }
        function GetDONCTid($id){
            $sqr = "SELECT * FROM `donhangct` WHERE `donhang_id`=$id";
            $rows = mysqli_query($this->con, $sqr);
            $mang = array();
            while ($row = mysqli_fetch_array($rows)){
                $mang[] = $row;
            }
            return json_encode($mang);
        }
        public function DonHang($idma){
            $qr = "SELECT dh.*,dc.sdt,dc.hoten,dc.diachi,dc.xa,dc.huyen,dc.tinh FROM `donhang` as dh, diachi as dc WHERE dh.id='$idma' and dh.diachi_id=dc.id";
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
    }
?>