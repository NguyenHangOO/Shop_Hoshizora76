<style>
    .address{background: white;width:100%;border-radius: 5px;margin-bottom:10px; padding:0 15px;}
    .add{background: white;width:100%;border-radius: 2px;margin-bottom:10px; padding:15px;border:dashed #c2bdbd; text-align:center;}
    .tenadd{padding-top:5px;padding-bottom:5px}
    .htlb{color:Gray;font-size:14px;}
    .htlb2{font-size:14px;}
    .macdinh{font-size: 12px;color:#009900;}
    .tennhan{font-size:18px;}
    @media screen and (max-width: 1030px) {
	#chimuc{margin-top:-20px;}
    }
    @media screen and (max-width: 480px) {
        #chimuc{display: none;}
        #ac-list li a{font-size:12px;line-height:20px;}
        }
</style>
<div id="chimuc">
    <div class="container">
        <h5>Trang chủ <i class="fas fa-chevron-right"></i> Quản lý địa chỉ</h5>
    </div>
</div>
<div id="content" class="container">	
<div id="ac">
<div id="ac-list">
    <ul>
        <?php
            $row= json_decode($data["ttuser"],true);
            foreach ($row as list("img"=>$img,"fullname"=>$username)){ ?>
            <?php 
                if($img !=""){ ?>
                    <a href="./Account/Infomation"><img id="ac-ac" src="<?php echo $img ?>"><?php echo $username ?></a>
                <?php }  else {?>
                    <a href="./Account/Infomation"><img id="ac-ac" src="./public/images/account/unnamed.png"><?php echo $username ?></a>
                <?php } ?>
        <?php } ?>
        <li><a href="./Account/Infomation"><i class="fas fa-user-alt"></i> Thông tin tài khoản</a></li>
        <li><a href="./Account/Infor_oder"><i class="fas fa-list-alt"></i></i> Quản lí đơn hàng</a></li>
        <li><a href="Account/Notification"><i class="fas fa-bell"></i> Thông báo của tôi</a></li>
        <li style="background: #CDE2CD;"><a href="./Account/ShowAddress"><i class="fas fa-address-card"></i> Sổ địa chỉ</a></li>
        <li><a href="./Account/Avartar"><i class="fas fa-user-circle"></i> Avartar</a></li>
        <li><a href="./Account/Sigout" onclick="return confirm('Bạn có chắc muốn đăng xuất?')"><i class="fas fa-sign-out-alt"></i> Đăng xuất</a></li>
    </ul>
</div>
<div id="ac-info">
    <div id="ac-info-tt"> 
        <div id="info-t" >
            <h5 style="margin-left: 20px; padding-top: 18px;">Địa chỉ của tôi</h5>
        </div>
        <div id="info-b2">
            <div class="add">
                <a href="./Account/Address/create" style="text-decoration:none;font-size:20px;"><i class="fas fa-plus"></i>&nbsp;&nbsp;Thêm địa chỉ</a>
            </div>
            <?php
            $row = json_decode($data["diachi"],true);
            foreach ($row as list("id"=>$id,"hoten"=>$hoten,"diachi"=>$diachi,"sdt"=>$sdt,"macdinh"=>$macdinh,"xa"=>$xa,"huyen"=>$huyen,"tinh"=>$tinh)){ ?>
            <?php if($macdinh==1){ ?>
            <div class="address">
                <div class="row">
                    <div class="col-10"style="position: unset;">
                        <div class="tenadd">
                            <span class="tennhan" ><?php echo $hoten; ?></span>&nbsp;&nbsp;&nbsp; <span class="macdinh"><i class="far fa-check-circle"></i> Địa chỉ mặc định</span>
                        </div>
                        <span for="" class="htlb">Địa chỉ:</span>&nbsp;<span class="htlb2"><?php echo $diachi.', '.$xa.', '.$huyen.', '.$tinh; ?></span><br/>
                        <span for="" class="htlb">Điện thoại:</span>&nbsp;<span class="htlb2"><?php echo $sdt; ?></span><br/>
                    </div>
                    <div class="col-2"style="padding:35px 0;text-align:center;position: unset;">
                        <a href="./Account/EditAddress/e5520/<?php echo $id ?>" style="text-decoration:none;"><i class="fas fa-edit"></i>Sửa</a>
                    </div>
                </div>
            </div>
            <?php } }?>
            <?php
            $row = json_decode($data["diachi"],true);
            foreach ($row as list("id"=>$id,"hoten"=>$hoten,"diachi"=>$diachi,"sdt"=>$sdt,"macdinh"=>$macdinh,"xa"=>$xa,"huyen"=>$huyen,"tinh"=>$tinh)){ ?>
            <?php if($macdinh!=1){ ?>
            <div class="address">
                <div class="row">
                    <div class="col-10"style="position: unset;">
                        <div class="tenadd">
                            <span class="tennhan" ><?php echo $hoten; ?></span>
                        </div>
                        <span for="" class="htlb">Địa chỉ:</span>&nbsp;<span class="htlb2"><?php echo $diachi.', '.$xa.', '.$huyen.', '.$tinh; ?></span><br/>
                        <span for="" class="htlb">Điện thoại:</span>&nbsp;<span class="htlb2"><?php echo $sdt; ?></span><br/>
                    </div>
                    <div class="col-2"style="padding:35px 0;text-align:center;position: unset;">
                        <a href="./Account/EditAddress/e5520/<?php echo $id ?>" style="text-decoration:none;"><i class="fas fa-edit"></i> Sửa</a> |
                        <a href="./Account/DelAddress/<?php echo $id ?>" onclick="return confirm('Bạn có chắc muốn xóa?')" style="text-decoration:none;color:red"><i class="fas fa-trash"></i> Xóa</a>
                    </div>
                </div>
            </div>
            <?php } } ?>
        </div>
    </div>
</div>
<script src="./public/js/tab.js">
