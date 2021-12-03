<style>
     @media screen and (max-width: 1030px) {
	#chimuc{margin-top:-20px;}
    }
        @media screen and (max-width: 480px) {
        #chimuc{display: none;}
        #ac-list li a{font-size:12px;line-height:20px;}
        #ac-info{font-size:10px;}
        }
</style>
<div id="chimuc">
<div class="container">
    <h5>Trang chủ <i class="fas fa-chevron-right"></i> Avartar</h5>
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
                if($img !="" && file_exists($img)){ ?>
                    <a href="./Account/Infomation"><img id="ac-ac" src="<?php echo $img ?>"><?php echo $username ?></a>
                <?php }  else {?>
                    <a href="./Account/Infomation"><img id="ac-ac" src="./public/images/unnamed.png"><?php echo $username ?></a>
                <?php } ?>
        <?php } ?>
            <li><a href="./Account/Infomation"><i class="fas fa-user-alt"></i> Thông tin tài khoản</a></li>
            <li><a href="./Account/Infor_oder"><i class="fas fa-list-alt"></i></i> Quản lí đơn hàng</a></li>
            <li><a href="Account/Notification"><i class="fas fa-bell"></i> Thông báo của tôi</a></li>
            <li><a href="./Account/ShowAddress"><i class="fas fa-address-card"></i> Sổ địa chỉ</a></li>
            <li style="background: #CDE2CD;"><a href="./Account/Avartar"><i class="fas fa-user-circle"></i> Avartar</a></li>
            <li><a href="./Account/Sigout" onclick="return confirm('Bạn có chắc muốn đăng xuất?')"><i class="fas fa-sign-out-alt"></i> Đăng xuất</a></li>
        </ul>
    </div>
    <div id="ac-info">
        <div id="ac-info-tt"> 
            <div id="info-t">
                <h5 style="margin-left: 20px; padding-top: 20px;">Avartar</h5>
            </div>
            <div id="info-b">
                <form action="./Account/Avartar" enctype="multipart/form-data" method="POST" style="margin-left:20px;padding-top:20px;">
                <?php if(isset($data["result"])) { ?>
                <?php
                    if($data["result"] =="true"){
                        $error = "Cập nhật ảnh thành công";
                    }
                    else if($data["result"] =="false"){ $error = "Cập nhật ảnh không thành công";}
                    else if($data["result"] =="kieufile"){ $error = "Không phải file ảnh";}
                    else { $error = "Bạn chưa chọn ảnh";}
                ?>
                    <?php if($data["result"]=="true"){ ?>
                    <div class="alert alert-success alert-dismissible fade show mb-0" role="alert" style="margin-right:20px;">
                        <i class="far fa-check-circle"></i> <?php echo $error; ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                      <?php  } else { ?>
                        <div class="alert alert-danger alert-dismissible fade show mb-0" role="alert" style="margin-right:20px;">
                            <i class="fas fa-exclamation"></i> <?php echo $error; ?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                <?php } } ?>
                <?php
                    $row= json_decode($data["ttuser"],true);
                    foreach ($row as list("img"=>$img,"username"=>$username)){ ?>
                    <img style="height: 160px;width: 160px;margin:5px;" src="<?php echo $img ?>" id="image"> &nbsp;
                <?php } ?>
                    <br/>Chọn file ảnh: <input type="file" name="uploadFile" id="upload"><br> <br> 
                    <input class="btn btn-primary" type="submit" name="btnUpload" value="Upload">
                    <input type="text" name="anhtrc" value="<?php echo $img ?>" style="display:none;"><br>
                </form>
            </div>
        </div>	
    </div>
</div>
<script>
    document.getElementById("upload").onchange = function () {
    var reader = new FileReader();
     
    reader.onload = function (e) {
        // get loaded data and render thumbnail.
        document.getElementById("image").src = e.target.result;
    };

    // read the image file as a data URL.
    reader.readAsDataURL(this.files[0]);
};
</script>