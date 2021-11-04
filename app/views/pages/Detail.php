<style>
    .htt{width:100%;height: auto;background-color: #FFFFFF; border-radius:7px; margin-left:-15px;}
    .hth4{padding:15px;background-color: rgb(250,250,250);color:Dark Gray; border-top-left-radius: 7px;border-top-right-radius: 7px;}
    .htlb{width: 130px; text-align: left;color:Gray}
    #banchay{position: unset;background: white;border-radius: 5px;height: 1140px;}
    #ttofsp{padding-top:12px;background-color: #FFFFFF;border-radius: 5px;margin-top:5px; }
    #imgsp{width:350px;height: 350px; padding-right:30px; margin-bottom:10px}
    #sp-c{position: unset; background: white;max-width: 195px; }
    @media screen and (max-width: 480px) {
        #banchay{ display:none; }
        #imgsp{width:452px;height: 350px; padding-right:30px; margin-bottom:10px}
        .htt{ margin-left:45px;}
        #ttofsp{margin-right:-45px;}
        #sp480{ margin-left:-20px;margin-right:-37px;}
    }
</style>
<link rel="stylesheet" type="text/css" href="public/css/phantrang.css">
<div class="container" >
    <div class="row" id="ttofsp">
        <?php
            $row= json_decode($data["ctsp"],true);
            foreach ($row as list("id"=>$id,"dtb"=>$dtb,"hinhanh"=>$hinhanh,"tensp"=>$tensp,"giaban"=>$giaban,"luotmua"=>$luotmua,"luotxem"=>$luotxem,"soluong"=>$soluong)){
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
        <div class="col-sm-5" style="position: unset;">
                <img src="<?php echo $hinhanh?>" alt="" id="imgsp"> 
        </div>
        <div class="col-sm-7" style="position: unset;">
            <?php
                $row= json_decode($data["tendm"],true);
                foreach ($row as list("tendm"=>$tendm)){ ?>
                <p>
                    Loại sản phẩm > <?php echo $tendm ?>
                </p>
            <?php } ?>
            <h2><?php echo $tensp; ?></h2>
            <span><?php echo $dg; ?> | Đã bán <?php echo $luotmua; ?> &nbsp; Số lượt xem <?php echo $luotxem; ?></span><br/>
            <span style="color:red; font-size:25px"><?php echo number_format($giaban)?>đ</span><br/><br/>
            <span>Số lượng</span><br/>
            <form action="<?php echo './Order/CartID/'.$id.'' ;?>" method="POST">
                <div class="buttons_added">
                    <input class="minus is-form" type="button" value="-">
                    <input aria-label="quantity" class="input-qty" max="99" min="1" name="soluongdat" type="number" value="1">
                    <input class="plus is-form" type="button" value="+">
                </div><br/><br/>
            
            <?php if($soluong<1){ ?>
                <a class="btnhh">Hết hàng</a>
            <?php } else{ ?>
                <a style="margin-bottom: 15px;" class="btn btn-primary" href="<?php echo './Order/BuyNow/'.$id ;?>">Mua Ngay</a>
                <button style="margin-bottom: 15px;" class="btn btn-danger" data-toggle="tooltip" title="Thêm vào giỏ" type="submit" name="btnGioHang"><i class="fas fa-cart-plus"></i></button>
            <?php } ?>
            </form>
        </div>
        <?php }?>
    </div> 
    <div class="row"style="margin-top:15px">
        <div class="col-10"style="position: unset;">
            <div class="htt">
                <h4 class="hth4">Thông tin sản phẩm</h4>
                <div style="margin-left:15px">
                <?php
                    $row= json_decode($data["ttctsp"],true);
                    foreach ($row as list("sanpham_id"=>$id,"thuonghieu"=>$thuonghieu,"xuatxu"=>$xuatxu,"chatlieu"=>$chatlieu,"kieudang"=>$kieudang,"baohanh"=>$baohanh)){ ?>
                    <?php
                        $row= json_decode($data["tendm"],true);
                        foreach ($row as list("tendm"=>$tendm)){ ?>
                        <div class="form-group">
                            <label class="htlb">Danh mục</label>
                            <div><span><?php echo $tendm ?></span></div>
                        </div>
                    <?php } ?>
                    <div class="form-group">
                        <label class="htlb">Thương hiệu</label>
						<div><span><?php echo $thuonghieu ?></span></div>
                    </div>
                    <div class="form-group">
                        <label class="htlb">Xuất xứ</label>
						<div><span><?php echo $xuatxu ?></span></div>
                    </div>
                    <div class="form-group">
                        <label class="htlb"">Chất liệu</label>
						<div><span><?php echo $chatlieu ?></span></div>
                    </div>
                    <div class="form-group">
                        <label class="htlb">Bảo hành</label>
						<div><span><?php echo $baohanh ?></span></div>
                    </div>
                    <?php }?>
                </div>
            </div>
            <div class="htt">
                <h4 class="hth4">Mô tả</h4>
                <div style="padding:15px">
                <?php
                    $row= json_decode($data["ctsp"],true);
                    foreach ($row as list("mota"=>$mota)){ ?>
                    <span style="margin-left:20px;">
                        <?php echo $mota ?>
                    </span>
                <?php } ?>
                </div>
            </div>
            <div class="htt" style="margin-top:15px;">
                <h4 class="hth4">Đánh giá</h4>
                <div style="margin-left:15px;margin-right:15px;">
                    <div style="margin-top:15px;background-color: rgb(240,240,240);">
                    <?php
                        $row= json_decode($data["ctsp"],true);
                        foreach ($row as list("dtb"=>$dtb)){ 
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
                        <span style="margin-left:25px;color:red; font-size:25px;font-weight: bold;"><?php echo round($dtb, 2); ?> </span><span style="color:red">trên 5</span><br/> 
                        <span style="margin-left:20px;"><?php echo $dg; ?></span>
                        <?php } ?>
                    </div>
                    <div id="noidung">
                     <div style="margin-top:25px">
                        <?php
                            $row= json_decode($data["danhgiapt"],true);
                            foreach ($row as list("fullname"=>$fullname,"diem"=>$dtb,"binhluan"=>$binhluan,"ngaybl"=>$ngaybl)){ 
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
                            <span style="margin-left:20px;font-size:14px"><?php echo $fullname ?></span><br/>
                            <span style="margin-left:20px;font-size:10px"><?php echo $dg ?></span><br/>
                            <span style="margin-left:20px;font-size:12px"><?php echo $binhluan ?></span><br/>
                            <span style="margin-left:20px;font-size:12px"><?php echo $ngaybl ?></span>
                            <hr>
                        <?php } ?>    
                        </div>
                    </div>
                    <div class="phantrang">
                        <ul class="pagination modal-3">
                            <li class="rounded-circle"><a href="./Product/Detail/<?php echo $data["idpt"] ?>/<?php if($data["trang"]==1) {echo $data["trang"];} else {echo $data["trang"]-1;}?>" class="prev fa fa-arrow-left"></a></li>
                            <li class="rounded-circle"> <a href="./Product/Detail/<?php echo $data["idpt"] ?>/1">1</a></li>
                            <?php
                            $phantrang=5;
                            $row= json_decode($data["danhgia"],true);
                            $tongsodg=count($row);
                            $trang = ceil($tongsodg / $phantrang); 
                            for($i=2;$i<=$trang;$i++){?>
                                <li class="rounded-circle"> <a href="./Product/Detail/<?php echo $data["idpt"] ?>/<?php echo $i ?>"><?php echo $i ?></a></li>	
                            <?php }

                            ?>
                            <li class="rounded-circle"><a href="./Product/Detail/<?php echo $data["idpt"] ?>/<?php if($data["trang"]<$trang) {echo $data["trang"]+1;} else {echo $data["trang"];}?>" class="next fa fa-arrow-right"></a></li>
                        </ul>
                    </div>
                   
                </div>
            </div>

        </div>
        <div class="col-2 text-center rounded" id="banchay">
            <h5 style="margin-top:5px;">Bán chạy nhất</h5>
            <?php
			$row= json_decode($data["ds5sp"],true);
            foreach ($row as list("id"=>$id,"hinhanh"=>$hinhanh,"tensp"=>$tensp,"giaban"=>$giaban)){?>	
			<div class="text-center rounded " id="sp-c" style="width:100%;margin-bottom:5px">
				<a style="text-decoration: none;" href="<?php echo './Product/Detail/'.$id.'/1' ;?>">
					<img id="img-spn"src="<?php echo $hinhanh ;?>"> <br/>
					<span class="text-truncate"id="tensp"><?php echo $tensp ;?></span> <br/>
					<span class="dongia"><?php echo number_format($giaban)?>đ</span> <br />
				</a>
			</div>
            <hr>		
		<?php }?>	
        </div>      
    </div>
    <div id="sp-highlights">
        <h4 style="margin-top:20px">Các mặt hàng khác </h4>
        <div class="row" id="sp480">
        <?php
            $row= json_decode($data["ds20sp"],true);
            foreach ($row as list("id"=>$id,"dtb"=>$dtb,"hinhanh"=>$hinhanh,"tensp"=>$tensp,"giaban"=>$giaban,"luotmua"=>$luotmua)){
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
                    <a style="text-decoration: none;" href="<?php echo './Product/Detail/'.$id.'/1' ;?>">
                        <img id="img-sp"src="<?php echo $hinhanh ;?>"> <br />
                        <span class="text-truncate"id="tensp"><?php echo $tensp ;?></span> <br />
                        <span class="dongia"><?php echo number_format($giaban)?>đ</span> <br />
                        <span class="sp-ten2"> <?php echo $dg ?> | Đã bán <?php echo $luotmua ;?></span> <br />
                        <a style="margin-right:4px;margin-bottom: 15px;" class="btn btn-primary" href="<?php echo './Product/Detail/'.$id.'/1' ;?>">Mua Ngay</a>
                        <a style="margin-bottom: 15px;" class="btn btn-danger" href="<?php echo './Order/CartID/'.$id.'' ;?>"><i class="fas fa-cart-plus"></i></a>
                    </a>
                </div>		
            <?php }?>
        </div>
    </div>
</div>
