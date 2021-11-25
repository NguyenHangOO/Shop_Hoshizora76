<style>
    .tt{color:gray;}#tbh{text-align:right;	}
    h3{background-color:#D3D3D3	;padding-left:70px;padding-top:10px;padding-bottom:10px;}
    #back{cursor: pointer;margin-right:10px;text-decoration: none;}
</style>
<div id="content-wrapper">
      <div class="mui--appbar-height"></div>
      <div class="mui-container-fluid">
      <?php  
            $row = json_decode($data["SPID"],true);
            $row2 = json_decode($data["CTSPID"],true);
            foreach($row as list("id"=>$id,"hinhanh"=>$hinhanh,"tensp"=>$tensp,"soluong"=>$slg,"giagoc"=>$giagoc,
            "giaban"=>$giaban,"luotmua"=>$luotmua,"luotxem"=>$luotxem,"ttban"=>$trangthai,"mota"=>$mota,"tendm"=>$tendm)){
        ?> 
        <h3><a class="fas fa-arrow-circle-left" id="back" title="Back" onclick="return history.back();"></a> Chi tiết sản phẩm > <?php echo $tensp; ?></h3>
        <div class="mui-row">
            <div class="mui-col-lg-5">
                    <br/>
                    <div class="mui-row">
                    <div class="mui-col-lg-8 mui-col-lg-offset-2 mui-col-sm-8 mui-col-sm-offset-2">
                        <img src="<?php echo $hinhanh; ?>" alt="" style="width:90%;height:270px;">
                    </div> 
                </div>
            </div>
            <div class="mui-col-lg-7">
                <div class="mui-row">
                    <h4 class="mui-col-sm-12">Thông tin chi tiết</h4>
                </div>
                <div class="mui-row">
                    <div class="mui-col-sm-3" id="tbh">
                        <span class="tt">Danh mục:</span>
                    </div>
                    <div class="mui-col-sm-9">
                        <span ><?php echo $tendm; ?></span>
                    </div>
                </div>
                <div class="mui-row">
                    <div class="mui-col-sm-3" id="tbh">
                        <span class="tt">Số lượng tồn:</span>
                    </div>
                    <div class="mui-col-sm-9">
                        <span ><?php echo $slg; ?></span>
                    </div>
                </div>
                <div class="mui-row">
                    <div class="mui-col-sm-3" id="tbh">
                        <span class="tt">Giá gốc:</span>
                    </div>
                    <div class="mui-col-sm-9">
                        <span ><?php echo number_format($giagoc); ?>đ</span>
                    </div>
                </div>
                <div class="mui-row">
                    <div class="mui-col-sm-3" id="tbh">
                        <span class="tt">Giá bán:</span>
                    </div>
                    <div class="mui-col-sm-9">
                        <span ><?php echo number_format($giaban); ?>đ</span>
                    </div>
                </div>
                <div class="mui-row">
                    <div class="mui-col-sm-3" id="tbh">
                        <span class="tt">Đã bán:</span>
                    </div>
                    <div class="mui-col-sm-9">
                        <span ><?php echo $luotmua; ?></span>
                    </div>
                </div>
                <div class="mui-row">
                    <div class="mui-col-sm-3" id="tbh">
                        <span class="tt">Lượt xem:</span>
                    </div>
                    <div class="mui-col-sm-9">
                        <span ><?php echo $luotxem; ?></span>
                    </div>
                </div>
                <div class="mui-row">
                    <div class="mui-col-sm-3" id="tbh">
                        <span class="tt">Trạng thái:</span>
                    </div>
                    <div class="mui-col-sm-9">
                        <?php if($trangthai==1){ ?>
                            <span >Đang kinh doanh</span>
                        <?php }else { ?>
                            <span >Ngừng kinh doanh</span>
                        <?php } ?>
                    </div>
                </div>
                <?php } ?>
                <?php  foreach($row2 as list("thuonghieu"=>$thuonghieu,"xuatxu"=>$xuatxu,
                "chatlieu"=>$chatlieu,"kieudang"=>$kieudang,"baohanh"=>$baohanh)){ ?>
                <div class="mui-row">
                    <div class="mui-col-sm-3" id="tbh">
                        <span class="tt">Thương hiệu:</span>
                    </div>
                    <div class="mui-col-sm-9">
                        <span ><?php echo $thuonghieu; ?></span>
                    </div>
                </div>
                <div class="mui-row">
                    <div class="mui-col-sm-3" id="tbh">
                        <span class="tt">Xuất xứ:</span>
                    </div>
                    <div class="mui-col-sm-9">
                        <span ><?php echo $xuatxu; ?></span>
                    </div>
                </div>
                <div class="mui-row">
                    <div class="mui-col-sm-3" id="tbh">
                        <span class="tt">Chất liệu:</span>
                    </div>
                    <div class="mui-col-sm-9">
                        <span ><?php echo $chatlieu; ?></span>
                    </div>
                </div>
                <div class="mui-row">
                    <div class="mui-col-sm-3" id="tbh">
                        <span class="tt">Kiểu dáng:</span>
                    </div>
                    <div class="mui-col-sm-9">
                        <span ><?php echo $kieudang; ?></span>
                    </div>
                </div>
                <div class="mui-row">
                    <div class="mui-col-sm-3" id="tbh">
                        <span class="tt">Bảo hành:</span>
                    </div>
                    <div class="mui-col-sm-9">
                        <span ><?php echo $baohanh; ?></span>
                    </div>
                </div>
                <?php } ?>
                <?php 
                    $row3 = json_decode($data["DGSP"],true);
                    foreach($row3 as list("dtb"=>$dtb)){
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
                <div class="mui-row">
                    <div class="mui-col-sm-3" id="tbh">
                        <span class="tt">Điểm đánh giá:</span>
                    </div>
                    <div class="mui-col-sm-9">
                        <span ><?php echo $dg; ?></span>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
        <?php foreach($row as list("mota"=>$mota)){ ?>
        <div class="mui-row">
            <div class="mui-col-lg-10 mui-col-lg-offset-1">
                <h2>Mô tả</h2>
            </div>
        </div>
        <div class="mui-row">
            <div class="mui-col-lg-8 mui-col-lg-offset-2">
                <p style="text-align: justify;"><?php echo $mota; ?></p>
            </div>
        </div>
        <?php } ?>
      </div>
</div>