<?php
    class ProductModel extends DB {
        function GetDSSP(){
            $sqr = "SELECT id,tensp,hinhanh,giaban,giagoc,soluong FROM `sanpham`";
            $rows = mysqli_query($this->con, $sqr);
            $mang = array();
            while ($row = mysqli_fetch_array($rows)){
                $mang[] = $row;
            }
            return json_encode($mang);
        }
        
    }
?>