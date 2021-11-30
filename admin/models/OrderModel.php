<?php
    class OrderModel extends DB {
        function GetAll(){
            $sqr = "SELECT dh.*,m.fullname FROM `donhang` as dh, member as m where m.id = dh.member_id ORDER BY ngay DESC";
            $rows = mysqli_query($this->con, $sqr);
            $mang = array();
            while ($row = mysqli_fetch_array($rows)){
                $mang[] = $row;
            }
            return json_encode($mang);
        }
        function GetDSDHhome(){
            $sqr = "SELECT dh.*,m.fullname FROM `donhang` as dh, member as m where tinhtrang not in ('Xử lý','Đã hủy') and m.id = dh.member_id ORDER BY ngay DESC";
            $rows = mysqli_query($this->con, $sqr);
            $mang = array();
            while ($row = mysqli_fetch_array($rows)){
                $mang[] = $row;
            }
            return json_encode($mang);
        }
        function GetDSDH(){
            $sqr = "SELECT dh.*,m.fullname FROM `donhang` as dh, member as m where tinhtrang='Đã giao' and m.id = dh.member_id ORDER BY ngay DESC";
            $rows = mysqli_query($this->con, $sqr);
            $mang = array();
            while ($row = mysqli_fetch_array($rows)){
                $mang[] = $row;
            }
            return json_encode($mang);
        }
        function GetDSDHDG(){
            $sqr = "SELECT dh.*,m.fullname FROM `donhang` as dh, member as m where tinhtrang='Đang giao' and m.id = dh.member_id ORDER BY ngay DESC";
            $rows = mysqli_query($this->con, $sqr);
            $mang = array();
            while ($row = mysqli_fetch_array($rows)){
                $mang[] = $row;
            }
            return json_encode($mang);
        }
        function GetDSDHXN(){
            $sqr = "SELECT dh.*,m.fullname FROM `donhang` as dh, member as m where tinhtrang='Đã xác nhận' and m.id = dh.member_id ORDER BY ngay DESC";
            $rows = mysqli_query($this->con, $sqr);
            $mang = array();
            while ($row = mysqli_fetch_array($rows)){
                $mang[] = $row;
            }
            return json_encode($mang);
        }
        function GetDSDHXL(){
            $sqr = "SELECT dh.*,m.fullname FROM `donhang` as dh, member as m where tinhtrang='Xử lý' and m.id = dh.member_id ORDER BY ngay DESC";
            $rows = mysqli_query($this->con, $sqr);
            $mang = array();
            while ($row = mysqli_fetch_array($rows)){
                $mang[] = $row;
            }
            return json_encode($mang);
        }
        function GetDSDHHUY(){
            $sqr = "SELECT dh.*,m.fullname FROM `donhang` as dh, member as m where tinhtrang='Đã hủy' and m.id = dh.member_id ORDER BY ngay DESC";
            $rows = mysqli_query($this->con, $sqr);
            $mang = array();
            while ($row = mysqli_fetch_array($rows)){
                $mang[] = $row;
            }
            return json_encode($mang);
        }
        function GetDTDH($m){
            $sqr = "SELECT sum(tongtien) as danhthu FROM `donhang` where MONTH(ngay)=$m and tinhtrang not in ('Xử lý','Đã hủy')";
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
        public function DonNhapCTId($iddh){
            $qr = "SELECT ct.*,sp.tensp,sp.hinhanh FROM `donnhapchitiet` as ct,sanpham as sp WHERE donnhap_id='$iddh' and ct.sanpham_id=sp.id";
            $rows = mysqli_query($this->con, $qr);
            $mang = array();
            while ($row = mysqli_fetch_array($rows)){
                $mang[] = $row;
            }
            return json_encode($mang);
        }
        public function GetDonNhap($iddh){
            $qr = "SELECT * FROM `donnhap` WHERE id='$iddh'";
            $rows = mysqli_query($this->con, $qr);
            $mang = array();
            while ($row = mysqli_fetch_array($rows)){
                $mang[] = $row;
            }
            return json_encode($mang);
        }
        public function GetDN($iddh){
            $qr = "SELECT dn.*,ad.fullname FROM `donnhap` as dn, admin as ad WHERE dn.id='$iddh' and dn.admin_id = ad.id";
            $rows = mysqli_query($this->con, $qr);
            $mang = array();
            while ($row = mysqli_fetch_array($rows)){
                $mang[] = $row;
            }
            return json_encode($mang);
        }
        public function InsertDonNhap($iddh,$idadmin,$ngay){
            $sqr = "INSERT INTO `donnhap`(`id`, `admin_id`, `ngaynhap`, `tongtien`, `ghichu`) VALUES ('$iddh','$idadmin','$ngay','0','')";
            $result = false;
            if(mysqli_query ($this->con, $sqr)){
                $result = true;
            }
            return json_encode($result);
        }
        function AddChiTiet($iddh,$idsp,$dongia,$soluong,$thanhtien){
            $sqr = "INSERT INTO `donnhapchitiet`(`donnhap_id`, `sanpham_id`, `dongia`, `soluong`, `thanhtien`) VALUES ('$iddh','$idsp','$dongia','$soluong','$thanhtien')";
            $result = false;
            if(mysqli_query ($this->con, $sqr)){
                $result = true;
            }
            return json_encode($result);
        }
        public function UpDonNhap($iddh,$tongtien){
            $sqr = "UPDATE `donnhap` SET `tongtien`='$tongtien',`tinhtrang`='1' WHERE id=$iddh";
            $result = false;
            if(mysqli_query ($this->con, $sqr)){
                $result = true;
            }
            return json_encode($result);
        }
        public function KTCTId($iddh,$idsp){
            $qr = "SELECT * FROM `donnhapchitiet`  WHERE donnhap_id='$iddh' and sanpham_id=$idsp";
            $rows = mysqli_query($this->con, $qr);
            $mang = array();
            while ($row = mysqli_fetch_array($rows)){
                $mang[] = $row;
            }
            return json_encode($mang);
        }
        public function GetDNDESC(){
            $qr = "SELECT dn.*,ad.fullname,SUM(ct.soluong) as soluongnhap FROM `donnhap` as dn, admin as ad, donnhapchitiet as ct WHERE dn.admin_id = ad.id and dn.tinhtrang='1' and dn.id = ct.donnhap_id GROUP BY ct.donnhap_id ORDER BY ngaynhap DESC ";
            $rows = mysqli_query($this->con, $qr);
            $mang = array();
            while ($row = mysqli_fetch_array($rows)){
                $mang[] = $row;
            }
            return json_encode($mang);
        }
        public function DelDonNhap($iddh){
            $sqr = "DELETE FROM `donnhap` WHERE id=$iddh";
            $result = false;
            if(mysqli_query ($this->con, $sqr)){
                $result = true;
            }
            return json_encode($result);
        }
        public function DelDonNhapCT($iddh){
            $sqr = "DELETE FROM `donnhapchitiet` WHERE donnhap_id=$iddh";
            $result = false;
            if(mysqli_query ($this->con, $sqr)){
                $result = true;
            }
            return json_encode($result);
        }
        public function DelDetailIm($idsp,$iddh){
            $sqr = "DELETE FROM `donnhapchitiet` WHERE donnhap_id=$iddh and sanpham_id = $idsp";
            $result = false;
            if(mysqli_query ($this->con, $sqr)){
                $result = true;
            }
            return json_encode($result);
        }
        public function GetThongKe(){
            $qr = "SELECT * FROM `thongkeban`";
            $rows = mysqli_query($this->con, $qr);
            $mang = array();
            while ($row = mysqli_fetch_array($rows)){
                $mang[] = $row;
            }
            return json_encode($mang);
        }
        public function GetFilterThongKe($bd,$kt){
            $qr = "SELECT * FROM `thongkeban` WHERE ngay BETWEEN '$bd' and '$kt'";
            $rows = mysqli_query($this->con, $qr);
            $mang = array();
            while ($row = mysqli_fetch_array($rows)){
                $mang[] = $row;
            }
            return json_encode($mang);
        }
        public function GetDNFilter($bd,$kt){
            $qr = "SELECT dn.*,ad.fullname,SUM(ct.soluong) as soluongnhap FROM `donnhap` as dn, admin as ad, donnhapchitiet as ct WHERE dn.admin_id = ad.id and dn.tinhtrang='1' and dn.id = ct.donnhap_id and date(ngaynhap) BETWEEN '$bd' and '$kt'  GROUP BY ct.donnhap_id ORDER BY ngaynhap DESC ";
            $rows = mysqli_query($this->con, $qr);
            $mang = array();
            while ($row = mysqli_fetch_array($rows)){
                $mang[] = $row;
            }
            return json_encode($mang);
        }
        function GetAllFilter($bd,$kt){
            $sqr = "SELECT dh.*,m.fullname FROM `donhang` as dh, member as m where m.id = dh.member_id and date(ngay) BETWEEN '$bd' and '$kt' ORDER BY ngay DESC";
            $rows = mysqli_query($this->con, $sqr);
            $mang = array();
            while ($row = mysqli_fetch_array($rows)){
                $mang[] = $row;
            }
            return json_encode($mang);
        }
    }
?>