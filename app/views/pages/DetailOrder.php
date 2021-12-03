<style>
    .tenadd{padding-bottom:5px;font-size:16px;}
    .htlb{color:Gray;font-size:14px;}
    .htlb2{font-size:14px;}
    .tennhan{font-size:18px;}.img{width:80px;height:75px;}
    h4{padding:15px;}.sp{background-color:#F5FFFA;}#spsc{padding-top:15px;padding-left:15px;font-size:25px;font-weight: bold;}
    #th{
        padding-top:15px;padding-left:15px;
    }#id{color:red}#gr{color:green;text-transform: capitalize;}
    #dc{background-image: repeating-linear-gradient(45deg,#6fa6d6,#6fa6d6 33px,transparent 0,transparent 41px,#f18d9b 0,#f18d9b 74px,transparent 0,transparent 82px);
    height:4px; margin-top:15px;
    }
    #tb{
        padding: 12px 23px;
        margin: 0 0 6px;
        display: flex;
        align-items: center;
        background: #fffefb;
        border: 1px solid rgba(224,168,0,.4);
        border-radius: 2px;
        box-shadow: 0 1px 1px rgb(0 0 0 / 5%);
    }
    #huy{
        padding: 15px;position: unset;
        margin-left:-10px;
    }#huyhuy{padding-left:20px;padding-right:20px;}
</style>
<div class="container bg-white ">
    <?php 
        if(isset($data['huy'])){ ?>
            <div style="padding-top:1px;">
                <div class="alert alert-success alert-dismissible fade show mb-0" role="alert" style="margin:20px;">
                    <i class="far fa-check-circle"></i> Hủy đơn thành công
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
      <?php  } ?>
    <div class="row bg-white" id="th">
        <div class="col-8"style="position: unset;">
            <i class="fas fa-angle-left"></i>
            <span onclick="return window.location='/Account/Infor_oder';" style="cursor: pointer; ">TRỞ LẠI</span>
        </div>
        <div class="col-4" id="id"style="position: unset;text-align:right;">
        <?php 
            $row= json_decode($data["donhang"],true);
            foreach ($row as list("id"=>$id,"tongtien"=>$tongtien,"tinhtrang"=>$trangthai)){ ?>
            <span><?php echo $id; ?></span>
            <span>|</span>
            <span id="gr">Đơn Hàng&nbsp;<span><?php echo $trangthai; ?></span></span>
        <?php } ?>
        </div>
    </div>
   <div class="row" id="dc"></div>
    <div class="row">
        <h4>Địa chỉ nhận hàng</h4>
        <div class="col-10"style="position: unset;">
        <?php 
            $row= json_decode($data["donhang"],true);
            foreach ($row as list("hoten"=>$hoten,"sdt"=>$sdt,"diachi"=>$diachi,"xa"=>$xa,"huyen"=>$huyen,"tinh"=>$tinh)){ ?>
            <div class="tenadd">
                <span class="tennhan" ><?php echo $hoten ?></span>
            </div>
            <span for="" class="htlb"><?php echo $sdt; ?></span><br/>
            <span for="" class="htlb"><?php echo $diachi.', '.$xa.', '.$huyen.', '.$tinh; ?></span><br/>
            <?php } ?>
        </div>
    </div>
    <div class="row sp">
        <span id="spsc">Sản phẩm</span>
        <?php 
            $row= json_decode($data["donhangct"],true);
            foreach ($row as list("tensp"=>$tensp,"hinhanh"=>$hinhanh,"soluong"=>$soluong,"thanhtien"=>$thanhtien,"sanpham_id"=>$spid)){ ?>
        <div class="col-12" style="position: unset;">
            <hr>
            <div class="row">
                <div class="col-1"style="position: unset;">
                    <img src="<?php echo $hinhanh ?>" alt="" class="img">
                </div>
                <div class="col-8"style="position: unset;">
                    <span><?php echo $tensp ?></span><br/>
                    <span class="htlb">Số lượng: </span><span style="font-size:14px;"><?php echo $soluong ?></span>
                </div>
                <div class="col-1"style="position: unset;">
                    <span style="color:red;"><?php echo number_format($thanhtien)?>đ</span>&nbsp;
                </div>
               <?php 
                    $row= json_decode($data["dgct"],true);
                    foreach ($row as list("sanpham_id"=>$idsp,"diem"=>$dtb)){
                        if($idsp==$spid){ 
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
                <div class="col-1"style="position: unset;font-size:11px;margin-left:-15px;">
                    <span style="text-transform: capitalize;">Đã đánh giá</span> <br/>
                    <span><?php echo $dg; ?></span>
                </div>
                <?php } } ?>
                <?php 
                $row= json_decode($data["donhang"],true);
                foreach ($row as list("tinhtrang"=>$trangthai)){
                    if($trangthai=='Đã giao'){ ?>
                <div class="col-1"style="position: unset;">
                    <a href="Order/DanhGia/<?php echo $id; ?>/<?php echo $spid; ?>" type="button" class="btn btn-warning" style="font-size:10px;padding:3px;" >Đánh giá</a>
                </div>
                <?php } } ?>
            </div>
        </div>
        <?php } ?>
    </div>
    <div class="row">
    <div class="col-9"></div>
        <div class="col-lg-3"style="position: unset;">
        <?php 
            $row= json_decode($data["donhang"],true);
            foreach ($row as list("id"=>$id,"tongtien"=>$tongtien,"tinhtrang"=>$trangthai)){ ?>
            <span>Tổng tiền:</span><span style="font-size:22px;color:red" id="kq" ><?php echo number_format($tongtien) ?></span><span style="font-size:22px;color:red">đ</span> &nbsp;&nbsp;
       <?php } ?>
        </div>
    </div>
    <div class="row tbh" id="tb">
        <div class="col-7"></div>
        <div class="col-5" style="text-align:right;"style="position: unset;">
            Hình thức thanh toán: Thanh toán khi nhận hàng
        </div>
    </div>
    <div style="padding-bottom:5px;"></div>
    <?php 
        $row= json_decode($data["donhang"],true);
        foreach ($row as list("id"=>$id,"tongtien"=>$tongtien,"tinhtrang"=>$trangthai)){ 
            if($trangthai=='Xử lý' || $trangthai=='Đã xác nhận'){?>
    <div class="row" >
        <div class="col-11"></div>
        <div class="col-1" id="huy">
            <a href="./Order/HuyDonMua/<?php echo $id;?>" type="button" class="btn btn-danger" id="huyhuy" onclick="return confirm('Bạn có chắc muốn hủy đơn hàng <?php echo $id ?>?')">HỦY</a>
        </div>
    </div>
    <?php  } }?>
</div>