<style>
    .tenadd{padding-bottom:5px;font-size:16px;}
    .htlb{color:Gray;font-size:14px;}
    .htlb2{font-size:14px;}
    .tennhan{font-size:16px;}.img{width:80px;height:75px;}
    h4{padding-left:15px;}.sp{background-color:#F5FFFA;}
    #th{
        padding-top:15px;padding-left:15px;
    }#id{color:red}#gr{color:green;text-transform: capitalize;}
    #dc{background-image: repeating-linear-gradient(45deg,#6fa6d6,#6fa6d6 33px,transparent 0,transparent 41px,#f18d9b 0,#f18d9b 74px,transparent 0,transparent 82px);
    height:4px; margin-top:15px;
    }
</style>
<div id="content-wrapper">
    <div class="mui--appbar-height"></div>
    <div class="mui-container-fluid">
        <div class="mui-row" id="th">
            <div class="mui-col-sm-8">
                <i class="fas fa-angle-left"></i>
                <span onclick="return history.back();" style="cursor: pointer; ">TRỞ LẠI</span>
            </div>
            <div class="mui-col-sm-4" id="id"style="text-align:right;">
            <?php 
            $row= json_decode($data["donhang"],true);
            foreach ($row as list("id"=>$id,"tongtien"=>$tongtien,"tinhtrang"=>$trangthai)){ ?>
                <span><?php echo $id; ?></span>
                <span>|</span>
                <span id="gr">Đơn Hàng&nbsp;<span><?php echo $trangthai; ?></span>
            <?php } ?>
            </div>
        </div>
        <div class="mui-row" id="dc"></div>
        <div class="mui-row">
            <h4>Thông tin đơn hàng</h4>
            <?php 
                $row2= json_decode($data["donhangct"],true);
                $tong=0;
                foreach ($row2 as list("tensp"=>$tensp)){
                    $tong++; }
            $row= json_decode($data["donhang"],true);
            foreach ($row as list("hoten"=>$hoten,"sdt"=>$sdt,"diachi"=>$diachi,"xa"=>$xa,"huyen"=>$huyen,"tinh"=>$tinh,"ngay"=>$ngay,"tongtien"=>$tongtien)){ ?>
            <div class="mui-col-sm-7">
                <div class="tenadd">
                    <span for="" class="htlb">Người nhận: </span> <span class="tennhan" ><?php echo $hoten ?></span>
                </div>
                <span for="" class="htlb">Số điện thoại: </span><span><?php echo $sdt; ?></span><br/>
                <span for="" class="htlb">Địa chỉ nhận: </span><span><?php echo $diachi.', '.$xa.', '.$huyen.', '.$tinh; ?></span><br/>
            </div>
            <div class="mui-col-sm-5">
                <span for="" class="htlb">Ngày đặt:</span><span><?php echo $ngay; ?></span><br/>
                <span for="" class="htlb">Tổng sản phẩm:</span><span><?php echo $tong; ?></span><br/>
                <span for="" class="htlb">Tổng tiền: </span><span style="color:red;font-size:22px;"><?php echo number_format($tongtien); ?>đ</span><br/>
            </div>
            <?php } ?>
        </div>
        <hr>
        <div class="mui-row">
            <div class="mui-col-sm-10 mui-col-lg-offset-1">
                <?php 
                $row = json_decode($data["donhangct"],true);
                foreach ($row as list("tensp"=>$tensp,"hinhanh"=>$hinhanh,"soluong"=>$soluong,"thanhtien"=>$thanhtien,"sanpham_id"=>$spid,"dongia"=>$giaban)){ ?>
                <div class="mui-row">
                    <div class="mui-col-sm-1">
                        <img src="<?php echo $hinhanh ?>" alt="" class="img">
                    </div>
                    <div class="mui-col-sm-7">
                        <span class="htlb">Tên sản phẩm: </span><span style="font-size:14px;"><?php echo $tensp ?></span><br/>
                        <span class="htlb">Số lượng đặt: </span><span style="font-size:14px;"><?php echo $soluong ?></span><br/>
                        <span class="htlb">Giá bán: </span><span style="font-size:14px;"><?php echo $giaban ?></span>
                    </div>
                    <div class="mui-col-sm-4">
                    <span class="htlb">Thành tiền: </span><span style="color:red;"><?php echo number_format($thanhtien)?></span>&nbsp;
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>