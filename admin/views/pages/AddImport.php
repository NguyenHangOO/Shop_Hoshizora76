<style>
    #ten{color:gray;}#tt{text-align:right;}#right{text-align:right;}img{width:80px;height:75px;}
    #myBtn{background-color:green;color:white;}#hidden{display:none;}
    #thongtin{padding-top:5px;padding-bottom: 5PX;border:1px solid gray; border-radius:3px;}
    #close{float:right;cursor: pointer;}
</style>
<div id="content-wrapper">
      <div class="mui--appbar-height"></div>
      <div class="mui-container-fluid">
        <br> 
        <div class="mui-row">
            <div class="mui-col-sm-10 mui-col-lg-offset-1">
                <span style="font-size:22px;">THÔNG TIN ĐƠN NHẬP</span><br>
                <?php 
                    if(isset($data["tontai"])){ ?>
                    <div class="tbloi" id="tbtontai">
                        <i class="fas fa-exclamation-circle"></i> <span >Sản phẩm đã có trong đơn nhập</span>
                        <span id="close" onclick="var hidden = document.getElementById('tbtontai');hidden.style.display = 'none';"><i class="fas fa-times"></i></span>
                    </div>  
                <?php } ?>
                <a class="mui-btn mui-btn--small" id="myBtn"><i class="fas fa-plus"></i>Sản phẩm</a>
                <div class="mui-row" id="thongtin">
                    <div class="mui-col-xs-12">
                        <div class="mui-row">
                            <div class="mui-col-xs-4" id="right">
                                <div class="mui-row">
                                    <div class="mui-col-xs-5">
                                        <span class="ten">Mã đơn:</span>
                                    </div>
                                    <div class="mui-col-xs-7" style="text-align:left;">
                                        <span><?php echo  $_SESSION['iddh']; ?></span>
                                    </div>
                                </div>
                            </div>
                            <div class="mui-col-xs-4 mui-col-xs-offset-4" id="right">
                                <div class="mui-row">
                                    <div class="mui-col-xs-5">
                                        <span class="ten">Ngày lập:</span>
                                    </div>
                                    <div class="mui-col-xs-7" style="text-align:left;">
                                        <span><?php echo  $_SESSION['ngay']; ?></span>
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
                                        <span><?php echo  $_SESSION['nameadmin']; ?></span>
                                    </div>
                                </div>
                            </div>
                            <div class="mui-col-xs-4 mui-col-xs-offset-4" id="right">
                                <div class="mui-row">
                                    <div class="mui-col-xs-5">
                                        <span class="ten">Tình trạng:</span>
                                    </div>
                                    <div class="mui-col-xs-7" style="text-align:left;">
                                        <span>Chưa lưu</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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
                            <span class="htlb">Thành tiền: </span><span style="color:red;"><?php echo number_format($thanhtien)?>đ</span><br>
                            <a href="admin.php?url=Order/DelDetailIm/<?php echo $spid; ?>/<?php echo $_SESSION['iddh'];?>" title="Xóa" style="color:red;text-decoration: none;"onclick="return confirm('Bạn có chắc xóa không?')"><i class="fas fa-trash"></i>&nbsp;Xóa</a>
                            <br>
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
                <span>Tổng tiền: </span><span style="color:red;font-size:18px;"><?php echo number_format($tongtien) ?>đ</span>
            </div>
        </div>
        <div class="row"style="margin-top:20px;">
            <div class="mui-col-lg-4 mui-col-lg-offset-8 mui-col-sm-5 mui-col-sm-offset-5">
                <a href="admin.php?url=Order/SaveImport/<?php echo $_SESSION['iddh'];?>/<?php echo $tongtien; ?>" class="mui-btn mui-btn--raised mui-btn--primary" >Lưu</a>
                <a href="admin.php?url=Order/DelImport/<?php echo $_SESSION['iddh'];?>" class="mui-btn mui-btn--raised mui-btn--danger" onclick="return confirm('Bạn có chắc muốn hủy đơn này?')" >Hủy</a>
            </div>
        </div>
            <div id="myModal" class="modal">
                <!-- Nội dung -->
                <div class="modal-content">
                    <span class="close">&times;</span>
                    <form class="mui-form" action="admin.php?url=Order/AddSPDonHang" method="post">
                        <legend>Thêm sản phẩm cho đơn nhập</legend>
                        <div class="mui-select">
                            <select name="idsp">
                                <option value="">Chọn sản phẩm</option>
                                <?php 
                                    $row= json_decode($data["DSSP"],true);
                                    foreach ($row as list("id"=>$id,"tensp"=>$tensp,"giagoc"=>$giagoc)){
                                ?>
                                <option value="<?php echo $id; ?>,<?php echo $giagoc; ?>"><?php echo $tensp; ?></option>
                                <?php } ?>
                            </select>
                            <label>Chọn sản phẩm</label>
                        </div>
                        <div class="mui-textfield mui-textfield--float-label">
                            <input type="number" name="soluong" min="1" value="1">
                            <label>Số lượng</label>
                        </div>
                        <button type="submit" name="btnaddsp" class="mui-btn mui-btn--raised mui-btn--accent">Thêm</button>
                    </form>
                </div>
            </div>
      </div>
</div>