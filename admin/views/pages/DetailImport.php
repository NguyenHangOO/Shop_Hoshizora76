<style>
    #ten{color:gray;}#tt{text-align:right;}#right{text-align:right;}img{width:80px;height:75px;}
    #myBtn{background-color:green;color:white;}#hidden{display:none;}
    #thongtin{padding-top:5px;padding-bottom: 5PX;border:1px solid gray; border-radius:3px;}
    #back{cursor: pointer;margin-right:10px;text-decoration: none;font-size:25px;}
</style>
<div id="content-wrapper">
      <div class="mui--appbar-height"></div>
      <div class="mui-container-fluid">
        <br> 
        <div class="mui-row">
            <div class="mui-col-sm-10 mui-col-lg-offset-1">
                <a class="fas fa-arrow-circle-left" id="back" title="Back" onclick="return history.back();"></a>
                <span style="font-size:22px;">THÔNG TIN ĐƠN NHẬP</span><br>
                <div class="mui-row" id="thongtin">
                <?php 
                    $row = json_decode($data["donhang"],true);
                    foreach ($row as list("id"=>$iddh,"ngaynhap"=>$ngay,"tinhtrang"=>$tinhtrang,"fullname"=>$name)){ ?>
                    <div class="mui-col-xs-12">
                        <div class="mui-row">
                            <div class="mui-col-xs-4" id="right">
                                <div class="mui-row">
                                    <div class="mui-col-xs-5">
                                        <span class="ten">Mã đơn:</span>
                                    </div>
                                    <div class="mui-col-xs-7" style="text-align:left;">
                                        <span><?php echo  $iddh; ?></span>
                                    </div>
                                </div>
                            </div>
                            <div class="mui-col-xs-4 mui-col-xs-offset-4" id="right">
                                <div class="mui-row">
                                    <div class="mui-col-xs-5">
                                        <span class="ten">Ngày lập:</span>
                                    </div>
                                    <div class="mui-col-xs-7" style="text-align:left;">
                                        <span><?php echo  $ngay; ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mui-row">
                            <div class="mui-col-xs-4" id="right">
                                <div class="mui-row">
                                    <div class="mui-col-xs-5">
                                        <span class="ten">Người lập:</span>
                                    </div>
                                    <div class="mui-col-xs-7" style="text-align:left;">
                                        <span><?php echo  $name; ?></span>
                                    </div>
                                </div>
                            </div>
                            <div class="mui-col-xs-4 mui-col-xs-offset-4" id="right">
                                <div class="mui-row">
                                    <div class="mui-col-xs-5">
                                        <span class="ten">Tình trạng:</span>
                                    </div>
                                    <div class="mui-col-xs-7" style="text-align:left;">
                                    <?php if($tinhtrang==1){ ?>
                                        <span>Hoàn thành</span>
                                    <?php } else { ?>
                                        <span>Chưa lưu</span>
                                    <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
        <div class="mui-row" style="margin-top:20px;">
            <div class="mui-col-sm-10 mui-col-lg-offset-1">
                <div class="mui-row" id="thongtin">
                    <?php 
                    $row = json_decode($data["CTDH"],true);
                    foreach ($row as list("tensp"=>$tensp,"hinhanh"=>$hinhanh,"soluong"=>$soluong,"thanhtien"=>$thanhtien,"sanpham_id"=>$spid,"dongia"=>$giaban)){ ?>
                    <div class="mui-row">
                        <div class="mui-col-xs-2" style="text-align:right;">
                            <img src="<?php echo $hinhanh ?>" alt="" class="img">
                        </div>
                        <div class="mui-col-xs-7">
                            <span class="htlb">Tên sản phẩm: </span><span style="font-size:14px;"><?php echo $tensp ?></span><br/>
                            <span class="htlb">Số lượng nhập: </span><span style="font-size:14px;"><?php echo $soluong ?></span><br/>
                            <span class="htlb">Giá bán: </span><span style="font-size:14px;"><?php echo $giaban ?></span>
                        </div>
                        <div class="mui-col-xs-3">
                        <span class="htlb">Thành tiền: </span><span style="color:red;"><?php echo number_format($thanhtien)?>đ</span>&nbsp;
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
        <div class="mui-row">
            <div class="mui-col-xs-3 mui-col-xs-offset-8" style="margin-top:10px;">
                <?php 
                    $row = json_decode($data["CTDH"],true);
                    $tongtien = 0;
                    foreach ($row as list("thanhtien"=>$thanhtien)){
                        $tongtien = $tongtien + $thanhtien;
                } ?>
                <span>Tổng tiền: </span><span style="color:red;font-size:22px;"><?php echo number_format($tongtien) ?>đ</span>
            </div>
        </div>
      </div>
</div>