<?php
    class ProductModel extends DB {
        function GetDSSP(){
            $sqr = "SELECT * FROM `sanpham`";
            $rows = mysqli_query($this->con, $sqr);
            $mang = array();
            while ($row = mysqli_fetch_array($rows)){
                $mang[] = $row;
            }
            return json_encode($mang);
        }
        
    }
?>