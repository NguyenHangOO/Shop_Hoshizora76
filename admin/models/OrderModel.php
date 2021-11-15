<?php
    class OrderModel extends DB {
        function GetAll(){
            $sqr = "SELECT dh.id,dh.ngay,m.fullname,dh.tongtien,dh.tinhtrang FROM `donhang` as dh, member as m where m.id = dh.member_id";
            $rows = mysqli_query($this->con, $sqr);
            $mang = array();
            while ($row = mysqli_fetch_array($rows)){
                $mang[] = $row;
            }
            return json_encode($mang);
        }
        function GetDSDH(){
            $sqr = "SELECT dh.id,dh.ngay,m.fullname,dh.tongtien FROM `donhang` as dh, member as m where tinhtrang='Đã giao' and m.id = dh.member_id";
            $rows = mysqli_query($this->con, $sqr);
            $mang = array();
            while ($row = mysqli_fetch_array($rows)){
                $mang[] = $row;
            }
            return json_encode($mang);
        }
        function GetDSDHDG(){
            $sqr = "SELECT dh.id,dh.ngay,m.fullname,dh.tongtien FROM `donhang` as dh, member as m where tinhtrang='Đang giao' and m.id = dh.member_id";
            $rows = mysqli_query($this->con, $sqr);
            $mang = array();
            while ($row = mysqli_fetch_array($rows)){
                $mang[] = $row;
            }
            return json_encode($mang);
        }
        function GetDSDHXN(){
            $sqr = "SELECT dh.id,dh.ngay,m.fullname,dh.tongtien FROM `donhang` as dh, member as m where tinhtrang='Đã xác nhận' and m.id = dh.member_id";
            $rows = mysqli_query($this->con, $sqr);
            $mang = array();
            while ($row = mysqli_fetch_array($rows)){
                $mang[] = $row;
            }
            return json_encode($mang);
        }
        function GetDSDHXL(){
            $sqr = "SELECT dh.id,dh.ngay,m.fullname,dh.tongtien FROM `donhang` as dh, member as m where tinhtrang='Xử lý' and m.id = dh.member_id";
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
    }
?>