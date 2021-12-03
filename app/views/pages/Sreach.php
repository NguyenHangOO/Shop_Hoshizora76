<style>
    .tb{background-color: rgb(255, 255, 251);border: 1px solid rgb(253, 216, 53);color: rgb(223, 189, 21);
        padding: 16px 24px;display: flex;}
    .khungtb{width: 100%;padding: 16px 24px;font-size: 15px;margin-bottom: 24px;}
    #sp-c{position: unset; background: white;max-width: 192px; }
    .goiy{margin-top:30px;}
    h5{margin-top:20px; margin-left:20px;}
    #kq{background-color: rgb(255, 255, 251);border-top-left-radius:5px ;border-top-right-radius:5px ;}
    #sp480{
        background-color: rgb(255, 255, 251); border-bottom-left-radius:5px ;border-bottom-right-radius:5px ;
    }
    @media screen and (max-width: 480px) {
        #sp480{
            margin-left:-20px;margin-right:-37px;
        }
    }
</style>
<div class="container">
    <div class="khung">
        <div id="kq" class="row">
            <h5>Kết quả tìm kiếm cho '<?php echo $data["dulieu"] ?>'</h5>
        </div>
        
        <div class="row" id="sp480">
        <?php
            $row= json_decode($data["sptk"],true);
            if(count($row)>0){
                foreach ($row as list("id"=>$id,"dtb"=>$dtb,"hinhanh"=>$hinhanh,"tensp"=>$tensp,"giaban"=>$giaban,"luotmua"=>$luotmua,"soluong"=>$soluong)){
                    if($dtb>=4.6)
                        $dg = '<i class="fas fa-star" id="s1"></i><i class="fas fa-star"id="s1"></i><i class="fas fa-star"id="s1"></i><i class="fas fa-star"id="s1"></i><i class="fas fa-star"id="s1"></i>';
                    else if ($dtb>=3.6)
                        $dg = '<i class="fas fa-star" id="s1"></i><i class="fas fa-star"id="s1"></i><i class="fas fa-star"id="s1"></i><i class="fas fa-star"id="s1"></i><i class="fas fa-star"></i>';
                    else if ($dtb>=2.6)
                        $dg = '<i class="fas fa-star" id="s1"></i><i class="fas fa-star"id="s1"></i><i class="fas fa-star"id="s1"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>';
                    else if ($dtb>=1.6)
                        $dg = '<i class="fas fa-star" id="s1"></i><i class="fas fa-star"id="s1"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>';
                    else if ($dtb>=1)	
                        $dg = '<i class="fas fa-star" id="s1"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star></i>';
                    else
                        $dg = '<i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>';
                ?>	
                <div class="col m-3 text-center rounded " id="sp-c">
                    <a style="text-decoration: none;" href="<?php echo 'Product/Detail/'.$id.'/1' ;?>">
                        <img id="img-sp"src="<?php echo $hinhanh ;?>"> <br />
                        <span class="text-truncate"id="tensp"><?php echo $tensp ;?></span> <br />
                        <span class="dongia"><?php echo number_format($giaban)?>đ</span> <br />
                        <span class="sp-ten2"> <?php echo $dg ?> | Đã bán <?php echo $luotmua ;?></span> <br />
                        <?php if($soluong<1){ ?>
                            <a class="btnhh">Hết hàng</a>
                        <?php } else{ ?>
                            <a style="margin-right:4px;margin-bottom: 15px;" class="btn btn-primary" href="<?php echo './Order/BuyNow/'.$id ;?>">Mua Ngay</a>
                            <a style="margin-bottom: 15px;" class="btn btn-danger" href="<?php echo './Order/CartID/'.$id.'' ;?>"><i class="fas fa-cart-plus"></i></a>
                        <?php } ?>
                    </a>
                </div>	
            <?php  } ?>
            <?php  } else { ?>

                <dv class="khungtb">
                    <div class="tb">
                        <i class="fas fa-exclamation-circle"></i> &nbsp; Rất tiếc không tìm thấy sản phẩm phù hợp với lựa chọn của bạn.
                    </div>
                </dv> 
        <?php } ?>
        </div>	
    </div>
    <div class="goiy">
        <h3>Gợi ý sản phẩm</h3>
        <div class="row" id="sp480" style="border-top-left-radius:5px ;border-top-right-radius:5px ;">
        <?php
            $row= json_decode($data["ds20sp"],true);
                foreach ($row as list("id"=>$id,"dtb"=>$dtb,"hinhanh"=>$hinhanh,"tensp"=>$tensp,"giaban"=>$giaban,"luotmua"=>$luotmua,"soluong"=>$soluong)){
                    if($dtb>=4.6)
                        $dg = '<i class="fas fa-star" id="s1"></i><i class="fas fa-star"id="s1"></i><i class="fas fa-star"id="s1"></i><i class="fas fa-star"id="s1"></i><i class="fas fa-star"id="s1"></i>';
                    else if ($dtb>=3.6)
                        $dg = '<i class="fas fa-star" id="s1"></i><i class="fas fa-star"id="s1"></i><i class="fas fa-star"id="s1"></i><i class="fas fa-star"id="s1"></i><i class="fas fa-star"></i>';
                    else if ($dtb>=2.6)
                        $dg = '<i class="fas fa-star" id="s1"></i><i class="fas fa-star"id="s1"></i><i class="fas fa-star"id="s1"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>';
                    else if ($dtb>=1.6)
                        $dg = '<i class="fas fa-star" id="s1"></i><i class="fas fa-star"id="s1"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>';
                    else if ($dtb>=1)	
                        $dg = '<i class="fas fa-star" id="s1"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star></i>';
                    else
                        $dg = '<i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>';
                ?>	
                <div class="col m-3 text-center rounded " id="sp-c">
                    <a style="text-decoration: none;" href="<?php echo 'Product/Detail/'.$id.'/1' ;?>">
                        <img id="img-sp"src="<?php echo $hinhanh ;?>"> <br />
                        <span class="text-truncate"id="tensp"><?php echo $tensp ;?></span> <br />
                        <span class="dongia"><?php echo number_format($giaban)?>đ</span> <br />
                        <span class="sp-ten2"> <?php echo $dg ?> | Đã bán <?php echo $luotmua ;?></span> <br />
                        <?php if($soluong<1){ ?>
                            <a class="btnhh">Hết hàng</a>
                        <?php } else{ ?>
                            <a style="margin-right:4px;margin-bottom: 15px;" class="btn btn-primary" href="<?php echo './Order/BuyNow/'.$id ;?>">Mua Ngay</a>
                            <a style="margin-bottom: 15px;" class="btn btn-danger" href="<?php echo './Order/CartID/'.$id.'' ;?>"><i class="fas fa-cart-plus"></i></a>
                        <?php } ?>
                    </a>
                </div>	
        <?php  } ?>
    </div>
</div>