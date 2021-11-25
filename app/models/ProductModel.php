<?php
    class ProductModel extends DB {
        
        public function GetSPPT($trang){
            $form = ($trang - 1)*20;
            $qr = "SELECT sp.id,sp.tensp,sp.giaban,sp.luotmua,sp.hinhanh,sanpham_id, AVG(dg.diem) as dtb,sp.soluong FROM `sanpham` as sp ,danhgia dg WHERE sp.id=sanpham_id and dg.diem not in(-1) and ttban='1' GROUP BY sanpham_id ORDER BY sp.id DESC LIMIT $form,20" ;
            $rows = mysqli_query($this->con, $qr);
            $mang = array();
            while ($row = mysqli_fetch_array($rows)){
                $mang[] = $row;
            }
            return json_encode($mang);
        }
        public function GetSP(){
            $qr = "SELECT sp.id,sp.tensp,sp.giaban,sp.luotmua,sp.hinhanh,sanpham_id, AVG(dg.diem) as dtb,sp.soluong FROM `sanpham` as sp ,danhgia dg WHERE sp.id=sanpham_id and dg.diem not in(-1) and ttban='1' GROUP BY sanpham_id" ;
            $rows = mysqli_query($this->con, $qr);
            $mang = array();
            while ($row = mysqli_fetch_array($rows)){
                $mang[] = $row;
            }
            return json_encode($mang);
        }
        public function Get5SP(){
            $qr = "SELECT id,tensp,giaban,hinhanh,soluong FROM `sanpham` where ttban='1' ORDER BY luotxem DESC LIMIT 5";
            $rows = mysqli_query($this->con, $qr);
            $mang = array();
            while ($row = mysqli_fetch_array($rows)){
                $mang[] = $row;
            }
            return json_encode($mang);
        }
        public function Get5SPBC(){
            $qr = "SELECT id,tensp,giaban,hinhanh,soluong FROM `sanpham` where ttban='1' ORDER BY luotmua DESC LIMIT 5";
            $rows = mysqli_query($this->con, $qr);
            $mang = array();
            while ($row = mysqli_fetch_array($rows)){
                $mang[] = $row;
            }
            return json_encode($mang);
        }
        public function Get20SP(){
            $qr = "SELECT sp.id,sp.tensp,sp.giaban,sp.luotmua,sp.hinhanh,sanpham_id, AVG(dg.diem) as dtb,sp.soluong FROM `sanpham` as sp ,danhgia dg WHERE sp.id=sanpham_id and dg.diem not in(-1) and ttban='1' GROUP BY sanpham_id ORDER BY RAND() LIMIT 20";
            $rows = mysqli_query($this->con, $qr);
            $mang = array();
            while ($row = mysqli_fetch_array($rows)){
                $mang[] = $row;
            }
            return json_encode($mang);
        }
        public function Get20SP2($id){
            $qr = "SELECT sp.id,sp.tensp,sp.giaban,sp.luotmua,sp.hinhanh,sanpham_id, AVG(dg.diem) as dtb,sp.soluong FROM `sanpham` as sp ,danhgia dg WHERE sp.id=sanpham_id and dg.diem not in(-1) and danhmuc_id not in($id) and ttban='1' GROUP BY sanpham_id ORDER BY RAND() LIMIT 20";
            $rows = mysqli_query($this->con, $qr);
            $mang = array();
            while ($row = mysqli_fetch_array($rows)){
                $mang[] = $row;
            }
            return json_encode($mang);
        }
        public function Get20SPID($id){
            $qr = "SELECT sp.id,sp.tensp,sp.giaban,sp.luotmua,sp.hinhanh,sanpham_id, AVG(dg.diem) as dtb,sp.soluong FROM `sanpham` as sp ,danhgia dg WHERE sp.id=sanpham_id and dg.diem not in(-1) and sp.id not in($id) and ttban='1' GROUP BY sanpham_id ORDER BY RAND() LIMIT 20";
            $rows = mysqli_query($this->con, $qr);
            $mang = array();
            while ($row = mysqli_fetch_array($rows)){
                $mang[] = $row;
            }
            return json_encode($mang);
        }
        public function GetSpTheoDM($id){
            $qr = "SELECT sp.id,sp.tensp,sp.giaban,sp.luotmua,sp.hinhanh,sanpham_id, AVG(dg.diem) as dtb,sp.soluong FROM `sanpham` as sp ,danhgia dg WHERE sp.id=sanpham_id and dg.diem not in(-1) and danhmuc_id=$id and ttban='1' GROUP BY sanpham_id ";
            $rows = mysqli_query($this->con, $qr);
            $mang = array();
            while ($row = mysqli_fetch_array($rows)){
                $mang[] = $row;
            }
            return json_encode($mang);
        }
        public function GetSpTheoDM2($id,$lid){
            if($id==3){
                $qr = "SELECT sp.id,sp.tensp,sp.giaban,sp.luotmua,sp.hinhanh,sanpham_id, AVG(dg.diem) as dtb,sp.soluong FROM `sanpham` as sp ,danhgia dg WHERE sp.id=sanpham_id and ttban='1' and dg.diem not in(-1) and danhmuc_id=$id and (loai1_id not in($lid) or loai1_id is null) GROUP BY sanpham_id ";
                $rows = mysqli_query($this->con, $qr);
                $mang = array();
                while ($row = mysqli_fetch_array($rows)){
                    $mang[] = $row;
                }
                return json_encode($mang);
            } else if($id==4){
                $qr = "SELECT sp.id,sp.tensp,sp.giaban,sp.luotmua,sp.hinhanh,sanpham_id, AVG(dg.diem) as dtb,sp.soluong FROM `sanpham` as sp ,danhgia dg WHERE sp.id=sanpham_id and ttban='1' and dg.diem not in(-1) and danhmuc_id=$id and (loai3_id not in($lid) or loai3_id is null) GROUP BY sanpham_id ";
                $rows = mysqli_query($this->con, $qr);
                $mang = array();
                while ($row = mysqli_fetch_array($rows)){
                    $mang[] = $row;
                }
                return json_encode($mang);
            }
        }
        public function GetSpTheoDM1id($id,$lid){
            if($id==3){
                $qr = "SELECT sp.id,sp.tensp,sp.giaban,sp.luotmua,sp.hinhanh,sanpham_id, AVG(dg.diem) as dtb,sp.soluong FROM `sanpham` as sp ,danhgia dg WHERE sp.id=sanpham_id and ttban='1' and dg.diem not in(-1) and loai1_id=$lid GROUP BY sanpham_id ";
                $rows = mysqli_query($this->con, $qr);
                $mang = array();
                while ($row = mysqli_fetch_array($rows)){
                    $mang[] = $row;
                }
                return json_encode($mang);
            }
            else if($id==4){
                $qr = "SELECT sp.id,sp.tensp,sp.giaban,sp.luotmua,sp.hinhanh,sanpham_id, AVG(dg.diem) as dtb,sp.soluong FROM `sanpham` as sp ,danhgia dg WHERE sp.id=sanpham_id and ttban='1' and dg.diem not in(-1) and loai3_id=$lid GROUP BY sanpham_id ";
                $rows = mysqli_query($this->con, $qr);
                $mang = array();
                while ($row = mysqli_fetch_array($rows)){
                    $mang[] = $row;
                }
                return json_encode($mang);
            }
            else {
                $lid=1;
                $qr = "SELECT sp.id,sp.tensp,sp.giaban,sp.luotmua,sp.hinhanh,sanpham_id, AVG(dg.diem) as dtb,sp.soluong FROM `sanpham` as sp ,danhgia dg WHERE sp.id=sanpham_id and ttban='1' and dg.diem not in(-1) and loai1_id=$lid GROUP BY sanpham_id ";
                $rows = mysqli_query($this->con, $qr);
                $mang = array();
                while ($row = mysqli_fetch_array($rows)){
                    $mang[] = $row;
                }
                return json_encode($mang);
            }
        }
        public function GetCTSPid($id){
            $qr = "SELECT sp.id,sp.luotxem,sp.tensp,sp.giaban,sp.luotmua,sp.hinhanh,mota,sanpham_id, AVG(dg.diem) as dtb,sp.soluong FROM `sanpham` as sp ,danhgia dg WHERE sp.id=sanpham_id and ttban='1' and dg.diem not in(-1) and sp.id=$id GROUP BY sanpham_id ";
            $rows = mysqli_query($this->con, $qr);
            $mang = array();
            while ($row = mysqli_fetch_array($rows)){
                $mang[] = $row;
            }
            return json_encode($mang);
        }
        public function GetTTCTSP($id){
            $qr = "SELECT sanpham_id,thuonghieu,xuatxu,chatlieu,kieudang,baohanh FROM `thongtinsp` WHERE sanpham_id=$id";
            $rows = mysqli_query($this->con, $qr);
            $mang = array();
            while ($row = mysqli_fetch_array($rows)){
                $mang[] = $row;
            }
            return json_encode($mang);
        }
        public function GetTenDM($id){
            $qr = "SELECT dm.tendm  FROM danhmuc as dm, sanpham as sp WHERE dm.id = danhmuc_id and sp.id=$id";
            $rows = mysqli_query($this->con, $qr);
            $mang = array();
            while ($row = mysqli_fetch_array($rows)){
                $mang[] = $row;
            }
            return json_encode($mang);
        }
        public function GetDanhgia($id){
            $qr = "SELECT dg.diem,dg.binhluan,dg.ngaybl,m.fullname FROM danhgia dg, member as m WHERE sanpham_id=$id and dg.diem not in(-1,0) and member_id = m.id";
            $rows = mysqli_query($this->con, $qr);
            $mang = array();
            while ($row = mysqli_fetch_array($rows)){
                $mang[] = $row;
            }
            return json_encode($mang);
        }
        public function GetDGPT($id,$trang){
            $form = ($trang - 1)*5;
            $qr = "SELECT dg.diem,dg.binhluan,dg.ngaybl,m.fullname,m.img FROM danhgia dg, member as m WHERE sanpham_id=$id and dg.diem not in(-1,0) and member_id = m.id LIMIT $form,5" ;
            $rows = mysqli_query($this->con, $qr);
            $mang = array();
            while ($row = mysqli_fetch_array($rows)){
                $mang[] = $row;
            }
            return json_encode($mang);
        }
        public function GetSpCart(){
            if (isset($_SESSION['username'])){
                $user=$_SESSION['username'];
                $qr = "SELECT sp.id,gh.id as idgh, sp.tensp,SUM(gh.soluong) as slg,sp.giaban,sp.hinhanh,sp.soluong as slgton,sp.ttban  FROM `giohang` as gh, sanpham as sp, member as m WHERE member_id= m.id and m.username='$user' and sp.id=gh.sanpham_id GROUP BY sanpham_id" ;
                $rows = mysqli_query($this->con, $qr);
                $mang = array();
                while ($row = mysqli_fetch_array($rows)){
                    $mang[] = $row;
                }
                return json_encode($mang);
            }
        }
        public function SreachPro($srch){
            $qr = "SELECT sp.id,sp.tensp,sp.giaban,sp.luotmua,sp.hinhanh,AVG(dg.diem) as dtb,sp.soluong FROM `sanpham` as sp ,danhgia dg WHERE sp.id=sanpham_id and ttban='1' and dg.diem not in(-1) and sp.tensp like '%$srch%' GROUP BY sanpham_id";
            $rows = mysqli_query($this->con, $qr);
            $mang = array();
            while ($row = mysqli_fetch_array($rows)){
                $mang[] = $row;
            }
            return json_encode($mang);
        }
        public function TangLuotXem($id){
            $qr = "UPDATE `sanpham` SET `luotxem`= luotxem+1 WHERE id=$id" ;
            $rows = mysqli_query($this->con, $qr);
        }
        public function TangLuotMua($id,$slg){
            $qr = "UPDATE `sanpham` SET `luotmua`= luotmua+$slg WHERE id=$id" ;
            $rows = mysqli_query($this->con, $qr);
        }
        public function UpSlgSp($idsp,$slgdat){
            $sqr = "UPDATE `sanpham` SET `soluong`=soluong-$slgdat WHERE id=$idsp";
            $result = false;
            if(mysqli_query ($this->con, $sqr)){
                $result = true;
            }
            return json_encode($result);
        }
        public function UpSlgHuySp($idsp,$slgdat){
            $sqr = "UPDATE `sanpham` SET `soluong`=soluong+$slgdat WHERE id=$idsp";
            $result = false;
            if(mysqli_query ($this->con, $sqr)){
                $result = true;
            }
            return json_encode($result);
        }
    }
?>