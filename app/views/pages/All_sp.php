		<style>
			#sp480{padding-left:10px;padding-right:10px;background: rgb(252, 208, 183); border-radius: 5px;}
			#xemthem{ margin-top:5px;}
			#sp-c{position: unset; background: white;max-width: 195px;}
			 @media screen and (max-width: 480px) {
				#sp480{margin-left:-20px;margin-right:-37px;padding-left:0px;padding-right:0px;border-radius: 0px;
				}}
			@media screen and (max-width: 380px) {
				#sp-c{max-width: 100%;}
			}
		</style>	
		<link rel="stylesheet" type="text/css" href="public/css/phantrang.css">
		<div id="content" class="container">
			<div id="">
				<div class="row" id="sp480">
				<?php
					$row= json_decode($data["dssppt"],true);
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
				<a id="xemthem"class="btn btn-info" href="/">Quay lại</a>
			</div>
			<div class="phantrang">
				<ul class="pagination modal-3">
				<li class="rounded-circle"><a href="./Home/ALL_sp/1" class="fas fa-step-backward"></a></li>
					<li class="rounded-circle"><a href="./Home/ALL_sp/<?php if($data["trang"]==1) {echo $data["trang"];} else {echo $data["trang"]-1;}?>" class="fas fa-caret-left"></a></li>
					<!--<li class="rounded-circle"> <a href="./Home/ALL_sp/1">1</a></li>-->
					<?php
					$phantrang=20;
					$row= json_decode($data["dssp"],true);
					$tongsodg=count($row);
					$trang = ceil($tongsodg / $phantrang); 
					for($i=1;$i<=$trang;$i++){
						if($data["trang"]==$i){?>
						<li class="rounded-circle" id="active"> <a href="./Home/ALL_sp/<?php echo $i ?>"><?php echo $i ?></a></li>	
					<?php }else { ?>
						<li class="rounded-circle"> <a href="./Home/ALL_sp/<?php echo $i ?>"><?php echo $i ?></a></li>
					<?php } }?>
					<li class="rounded-circle"><a href="./Home/ALL_sp/<?php if($data["trang"]<$trang) {echo $data["trang"]+1;} else {echo $data["trang"];}?>" class="fas fa-caret-right"></a></li>
					<li class="rounded-circle"><a href="./Home/ALL_sp/<?php echo $trang; ?>"><i class="fas fa-step-forward"></i></a></li>
				</ul>
			</div>
		</div>