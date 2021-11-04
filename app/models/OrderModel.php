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
    }