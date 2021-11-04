<style>
    #sp-c{
        position: unset; background: white;max-width: 195px;
    }
    @media screen and (max-width: 480px) {
        #sp480{
            margin-left:-20px;margin-right:-37px;
        }}
    @media screen and (max-width: 380px) {
        #sp-c{
            max-width: 100%;
        }
	}
</style>
<div class="container">
    <div id="sp-highlights">
        <?php
            $row= json_decode($data["tenlid"],true);
            foreach ($row as list("tenloai"=>$tenloai)){?>
        <div id="highlights-t"><h4 style="color: blue;"> <?php echo $tenloai ;?></h4></div>
        <?php }?>
        <div class="row" id="sp480">
        <?php
            $row= json_decode($data["dmlid"],true);
            foreach ($row as list("id"=>$id,"dtb"=>$dtb,"hinhanh"=>$hinhanh,"tensp"=>$tensp,"giaban"=>$giaban,"luotmua"=>$luotmua,"soluong"=>$soluong)){
                if($dtb>=4.6)
					$dg = '<i class="fas fa-star" id="s1"></i><i class="fas fa-star"id="s1"></i><i class="fas fa-star"id="s1"></i><i class="fas fa-star"id="s1"></i><i class="fas fa-star"id="s1"></i>';
				else if ($dtb>=4.35)
				    $dg = '<i class="fas fa-star" id="s1"></i><i class="fas fa-star"id="s1"></i><i class="fas fa-star"id="s1"></i><i class="fas fa-star"id="s1"></i><i class="fas fa-star-half-alt"id="s1"></i>';
				else if ($dtb>=3.6)
					$dg = '<i class="fas fa-star" id="s1"></i><i class="fas fa-star"id="s1"></i><i class="fas fa-star"id="s1"></i><i class="fas fa-star"id="s1"></i><i class="fas fa-star"></i>';
				else if ($dtb>=3.35)
					$dg = '<i class="fas fa-star" id="s1"></i><i class="fas fa-star"id="s1"></i><i class="fas fa-star"id="s1"></i><i class="fas fa-star-half-alt"id="s1"></i><i class="fas fa-star"></i>';
				else if ($dtb>=2.6)
					$dg = '<i class="fas fa-star" id="s1"></i><i class="fas fa-star"id="s1"></i><i class="fas fa-star"id="s1"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>';
				else if ($dtb>=2.35)
					$dg = '<i class="fas fa-star" id="s1"></i><i class="fas fa-star"id="s1"></i><i class="fas fa-star-half-alt"id="s1"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>';
				else if ($dtb>=1.6)
					$dg = '<i class="fas fa-star" id="s1"></i><i class="fas fa-star"id="s1"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>';
				else if ($dtb>=1.35)
					$dg = '<i class="fas fa-star" id="s1"></i><i class="fas fa-star-half-alt"id="s1"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>';
				else if ($dtb>=1)	
					$dg = '<i class="fas fa-star" id="s1"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star></i>';
				else
					$dg = '<i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>';
            ?>	
            <div class="col m-3 text-center rounded " id="sp-c" style="border:1px solid #2690f3;">
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
        <?php }?>	
        </div>
    </div>
   
    <div id="sp-highlights">
        <h4 style="margin-top:20px">Các mặt hàng đề xuất </h4>
        <div class="row" id="sp480">
        <?php
            $row= json_decode($data["dsspdm"],true);
            foreach ($row as list("id"=>$id,"dtb"=>$dtb,"hinhanh"=>$hinhanh,"tensp"=>$tensp,"giaban"=>$giaban,"luotmua"=>$luotmua,"soluong"=>$soluong)){
                if($dtb>=4.6)
					$dg = '<i class="fas fa-star" id="s1"></i><i class="fas fa-star"id="s1"></i><i class="fas fa-star"id="s1"></i><i class="fas fa-star"id="s1"></i><i class="fas fa-star"id="s1"></i>';
				else if ($dtb>=4.35)
				    $dg = '<i class="fas fa-star" id="s1"></i><i class="fas fa-star"id="s1"></i><i class="fas fa-star"id="s1"></i><i class="fas fa-star"id="s1"></i><i class="fas fa-star-half-alt"id="s1"></i>';
				else if ($dtb>=3.6)
					$dg = '<i class="fas fa-star" id="s1"></i><i class="fas fa-star"id="s1"></i><i class="fas fa-star"id="s1"></i><i class="fas fa-star"id="s1"></i><i class="fas fa-star"></i>';
				else if ($dtb>=3.35)
					$dg = '<i class="fas fa-star" id="s1"></i><i class="fas fa-star"id="s1"></i><i class="fas fa-star"id="s1"></i><i class="fas fa-star-half-alt"id="s1"></i><i class="fas fa-star"></i>';
				else if ($dtb>=2.6)
					$dg = '<i class="fas fa-star" id="s1"></i><i class="fas fa-star"id="s1"></i><i class="fas fa-star"id="s1"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>';
				else if ($dtb>=2.35)
					$dg = '<i class="fas fa-star" id="s1"></i><i class="fas fa-star"id="s1"></i><i class="fas fa-star-half-alt"id="s1"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>';
				else if ($dtb>=1.6)
					$dg = '<i class="fas fa-star" id="s1"></i><i class="fas fa-star"id="s1"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>';
				else if ($dtb>=1.35)
					$dg = '<i class="fas fa-star" id="s1"></i><i class="fas fa-star-half-alt"id="s1"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>';
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
        <?php }?>	
        </div>
    </div>
</div>