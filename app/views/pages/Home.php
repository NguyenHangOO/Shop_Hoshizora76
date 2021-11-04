<style>
	#sp-c{position: unset; background: white;max-width: 195px;}
	#sp4802{padding-left:8px;padding-right:8px;background: rgb(252, 208, 183); border-radius: 5px;}
	#xemthem{margin-top:5px;}
	.btnhh{margin-right:4px;margin-bottom: 15px;}
	@media screen and (max-width: 480px) {
			#sp480{	margin-left:-20px;margin-right:-37px;}
			#sp4802{	margin-left:-20px;margin-right:-37px;padding-left:0px;padding-right:0px;border-radius: 0px;}
	}
	@media screen and (max-width: 380px) {
			#sp-c{	max-width: 100%;}
	}
</style>
<div id="content" class="container">
	<div id="sp-promotion">
		<div id="promotion-l">
			<div class="banner">
				<img name="bannerpic" class="banner" id="apph-l" src="public/images/banner/t1.jpg">  
			</div>
		</div>
		<div id="promotion-r">
			<div id="promotion-r-tb">
				<!--https://lh3.googleusercontent.com/cnqD_S2bI63EalsLkWJzgx_QB96AJiBNL1s6-lej4nUE1eS_FOg0Qwwwtr_Z8xVhlOKlZs0MOFffwXxBnVqCEY7nnuMpBgiTwnWU0LJBsgfPXmhjqYIqmH4RLxR-c5oRKILhSY6fDQ=w2400-->
				<img id="apph-t"src="./public/images/hoshizora76-1.jpg"> <br />
			</div>
			<div id="promotion-r-tb">
				<!--https://lh3.googleusercontent.com/pWzL-rFqvAf78K3hKxdHuXhC-Kr0-QSvptXjJrYbNrfBHnrUOIRS8gXJRK1q8ZWIy52DRJOtBg73j_NF_1fwlXBZisrOouxyWE8fcZTgs1kowG-szOLiYIwrIK8sNN3MFYaPQVC2AA=w2400-->
				<img id="apph-b"src="./public/images/hoshizora76-2.jpg"> <br />
			</div>
		</div>
	</div>
		<div id="highlights-t"><h5>Sản phẩm nổi bật</h5></div>
		<div class="row" id="sp480">
		<?php
			$row= json_decode($data["ds5sp"],true);
            foreach ($row as list("id"=>$id,"hinhanh"=>$hinhanh,"tensp"=>$tensp,"giaban"=>$giaban,"soluong"=>$soluong)){?>	
			<div class="col m-3 text-center rounded " id="sp-c">
				<a style="text-decoration: none;" href="<?php echo 'Product/Detail/'.$id.'/1' ;?>">
					<img id="img-sp"src="<?php echo $hinhanh ;?>"> <br />
					<span class="text-truncate"id="tensp"><?php echo $tensp ;?></span> <br />
					<span class="dongia"><?php echo number_format($giaban)?>đ</span> <br />
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
	<div id="sp-space">
		<h5 id="hh5">Sản phẩm</h5>
	</div>
	<div id="">
		<div class="row" id="sp4802">
		<?php
			$row= json_decode($data["ds20sp"],true);
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
		<a id="xemthem"class="btn btn-info" href="./Home/All_sp/1">Xem tất cả</a>
	</div>
	<script src="public/js/time.js"></script>
	<script src="public/js/banner.js"></script>
</div>