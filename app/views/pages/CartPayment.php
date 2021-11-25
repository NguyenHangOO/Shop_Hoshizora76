<style>
    .sanpham{background-color: rgb(255, 255, 255);
    border: 1px solid rgb(221, 221, 221);border-radius: 4px;box-shadow: rgb(0 0 0 / 5%) 0px 1px 1px;padding: 8px 10px;margin-bottom: 20px;}
    .nd{background-color:white;padding-top:20px;padding-left:15px;padding-right:15px;border-radius:3px;}
    .ttsp{display: flex;margin: 0px 0px 10px;border: px solid rgb(239, 239, 239);border-radius: 4px;padding: 12px;position: relative;}
    #gia{color:red}
    .btnMua{padding-left:12px;padding-right:12px;}
    .diachi{background-color: rgb(255, 255, 255);border: 1px solid rgb(221, 221, 221);border-radius: 4px;box-shadow: rgb(0 0 0 / 5%) 0px 1px 1px;}
    .htlb{color:Gray;font-size:14px;}
    .htlb2{font-size:14px;}
</style>
<div class="container">
    <div class="nd">
    <?php 
        $row= json_decode($data["diachi"],true);  if(count($row)!=0){ ?>
        <form action="./Order/ThanhToan" method="POST">
    <?php } ?>
        <div class="row">
            <div class="col-md-8"style="position:unset">
            <h5>Thông tin sản phẩm</h5>
                <div class="sanpham">
                    <?php 
                        $row= json_decode($data["spcart"],true);
                        foreach ($row as list("id"=>$id,"tensp"=>$tensp,"hinhanh"=>$img,"giaban"=>$giaban,"slg"=>$soluong,"slgton"=>$slton,"ttban"=>$ttban)){
                            if($slton<1 || $ttban == 0){

                            }else {
                    ?>
                    <div class="row ttsp"style="position:unset">
                        <div class="col-md-2"style="position:unset">
                            <span><img src="<?php echo $img; ?>" alt="" style="width:55px;height:60px;"></span>
                            <input type="hidden" name="idSP" value="<?php echo $id; ?>">
                            <input type="hidden" name="GiaSP" value="<?php echo $soluong; ?>">
                        </div>
                        <div class="col-md-8"style="position:unset">
                            <span><?php echo $tensp;?></span><br/>
                            <span style="font-size:11px;color:dark;">Số lượng: <?php echo $soluong;?></span>
                        </div>
                        <div class="col-md-2"style="position:unset;text-align:right;">
                            <span id="gia"><?php echo number_format($giaban*$soluong);?>đ</span>
                        </div>
                    </div> 
                    <?php } }?>
                </div> 
            </div>
            <div class="col-md-4" style="position:unset">
                <h5>Địa chỉ giao hàng</h5>
                <div class="diachi">
                    <div class="row ttsp" style="position:unset">
                        <?php 
                            $row= json_decode($data["diachi"],true);
                            foreach ($row as list("id"=>$iddc,"hoten"=>$hoten,"diachi"=>$diachi,"sdt"=>$sdt,"macdinh"=>$macdinh,"xa"=>$xa,"huyen"=>$huyen,"tinh"=>$tinh,"chon"=>$chon)){
                                if($chon==1){ ?>
                                    <input type="hidden" name="idDiaChi" value="<?php echo $iddc; ?>">
                                    <div class="col-lg-12"style="position:unset" >
                                        <span class="tennhan" ><?php echo $hoten; ?></span>
                                    </div>
                                    <div class="col-lg-12"style="position:unset">
                                        <span for="" class="htlb">Địa chỉ:</span>&nbsp;<span class="htlb2"><?php echo $diachi.', '.$xa.', '.$huyen.', '.$tinh; ?></span><br/>
                                    </div>
                                    <div class="col-lg-12" style="position:unset">
                                        <span for="" class="htlb">Điện thoại:</span>&nbsp;<span class="htlb2"><?php echo $sdt; ?></span><br/>
                                    </div>
                        <?php } } 
                        if(count($row)!=0){ ?>
                            <div class="col-lg-12" style="position:unset">
                                <button type="button" class="btn btn-info" style="padding:5px;font-size:14px;"data-toggle="modal" data-target="#getdiachi">Thay đổi</button>
                            </div>
                            <?php } else { ?>
                                <div class="col-lg-12"style="position:unset" >
                                    <button type="button" class="btn btn-primary" style="padding:5px;font-size:14px;"data-toggle="modal" data-target="#adddiachi">Thêm địa chỉ</button>
                                </div>   
                       <?php } ?> 
                        <!-- Modal -->
                        <div class="modal fade" id="getdiachi" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="">Chọn địa chỉ</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                            <?php
                                $row = json_decode($data["diachi"],true);
                                foreach ($row as list("id"=>$idcdc,"hoten"=>$hoten,"diachi"=>$diachi,"sdt"=>$sdt,"macdinh"=>$macdinh,"xa"=>$xa,"huyen"=>$huyen,"tinh"=>$tinh,"chon"=>$chon)){ 
                                    if($chon==1){ ?>
                                    <div class="address">
                                        <div class="row">
                                            <div class="col-10"style="position: unset;">
                                                <div class="tenadd">
                                                    <span class="tennhan" ><?php echo $hoten; ?></span>&nbsp;&nbsp;&nbsp;
                                                </div>
                                                <span for="" class="htlb">Địa chỉ:</span>&nbsp;<span class="htlb2"><?php echo $diachi.', '.$xa.', '.$huyen.', '.$tinh; ?></span><br/>
                                                <span for="" class="htlb">Điện thoại:</span>&nbsp;<span class="htlb2"><?php echo $sdt; ?></span><br/>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                  <?php  }else{ ?>
                                <div class="address">
                                    <div class="row">
                                        <div class="col-10"style="position: unset;">
                                            <div class="tenadd">
                                                <span class="tennhan" ><?php echo $hoten; ?></span>&nbsp;&nbsp;&nbsp;
                                            </div>
                                            <span for="" class="htlb">Địa chỉ:</span>&nbsp;<span class="htlb2"><?php echo $diachi.', '.$xa.', '.$huyen.', '.$tinh; ?></span><br/>
                                            <span for="" class="htlb">Điện thoại:</span>&nbsp;<span class="htlb2"><?php echo $sdt; ?></span><br/>
                                        </div>
                                        <div class="col-2"style="padding:35px 0;text-align:center;position: unset;">
                                            <a href="./Account/ChonAddress/e5520/<?php echo $idcdc ?>" type="button" class="btn btn-primary">Chọn</a>
                                        </div>
                                    </div>
                                </div>
                                
                                <?php  } } ?>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            </div>
                            </div>
                        </div>
                        </div>
                        <?php 
                            $row= json_decode($data["diachi"],true);
                            if(count($row)==0){ ?>
                                <!-- Modal Add -->
                                <div class="modal fade" id="adddiachi" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="">Thêm địa chỉ</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="./Account/AddressNow" method="POST">
                                            <div  id="ff"class="form-group">
                                                <label class="lb" for="">Họ tên:</label>
                                                <input id="f-ct" class="form-control" type="text" name="hoten" value="" required placeholder="Nhập họ tên">
                                            </div>
                                            <div class="form-group">
                                                <label class="lb" for="">Số điện thoại:</label>
                                                <input id="f-ct" class="form-control" type="text" name="sdt" value="" required placeholder="Nhập số điện thoại">
                                            </div>
                                            <div class="form-group">
                                                <label class="lb" for="">Tỉnh/Thành phố:</label>
                                                <input id="f-ct" class="form-control" type="text" name="tinh" value="" required placeholder="Nhập tỉnh/thành phố">
                                            </div>
                                            <div class="form-group">
                                                <label class="lb" for="">Quận huyện:</label>
                                                <input id="f-ct" class="form-control" type="text" name="huyen" value="" required placeholder="Nhập quận huyện">
                                            </div>
                                            <div class="form-group">
                                                <label class="lb" for="">Phường xã:</label>
                                                <input id="f-ct" class="form-control" type="text" name="xa" value="" required placeholder="Nhập phường xã">
                                            </div>
                                            <div class="form-group">
                                                <label class="lb" for="">Địa chỉ:</label>
                                                <textarea id="f-ct" class="form-control" name="diachi" value="" required placeholder="Nhập địa chỉ"></textarea>
                                            </div>
                                            <input id="btn" name="btnAddDC" class="btn btn-warning" type="submit" value="Thêm mới">
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                    </div>
                                    </div>
                                </div>
                                </div>
                           <?php } ?>
                    </div>
                </div>
            </div>
        </div>  
        <div class="row" style="margin-top:10px;">
            <div class="col-lg-8"style="position:unset">
                <h5>Hình thức thanh toán</h5>
                <div class="form-group form-check">
                    <label class="form-check-label" >
                    <input class="form-check-input" type="checkbox" checked disabled> <span>Thanh toán khi nhận hàng</span>
                    </label>
                </div>
            </div>
            <div class="col-lg-4"style="position:unset">
            <?php $row= json_decode($data["spcart"],true);
                $tongtien=0;
                foreach ($row as list("id"=>$id,"slgton"=>$slton,"slg"=>$slg,"ttban"=>$ttban,"giaban"=>$giaban)){
                        if($slton<1 || $ttban==0){}
                        else{
                            $tongtien=$tongtien + ($slg*$giaban);
                        }
                }
            ?>
            <span>Tổng tiền:</span><span style="font-size:22px;color:red" id="kq" ><?php echo number_format($tongtien) ?></span><span style="font-size:22px;color:red">đ</span> &nbsp;&nbsp;
            <input type="hidden" name="TongTien" value="<?php echo $tongtien; ?>">
            <button type="submit" class="btnMua" name="btnMuaAll" onclick="return confirm('Chấp nhận thanh toán mua hàng?')" >Thanh toán</button>
            </div>
        </div>
    </form>
    </div>
</div>
