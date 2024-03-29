<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang quản trị Hoshizora76</title>
    <base href="/">
	<Link rel="shortcut icon" href="public/images/logo.png">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
	<!-- MUI CSS -->
    <link rel="stylesheet" type="text/css" href="./public/css/thongbao.css">
    <link rel="stylesheet" type="text/css" href="./public/css/Modal.css">
    <link rel="stylesheet" type="text/css" href="./public/css/adminstyle.css">
    <link href="//cdn.muicss.com/mui-latest/css/mui.min.css" rel="stylesheet" type="text/css" />
    <script src="//cdn.muicss.com/mui-latest/js/mui.min.js"></script>
    <script src="//code.jquery.com/jquery-2.1.4.min.js"></script>
    <script src="./public/js/pagination.js"></script>
    <script src="./public/ckeditor5/ckeditor.js"></script>
</head>
<body>
    <div id="sidedrawer" class="mui--no-user-select" style="background-color:rgb(52,58,64);color:white;">
      <div id="sidedrawer-brand" class="mui--appbar-line-height">
        <span class="mui--text-title"><a href="/admin.php?url=Home"> <img id="lg" src="public/images/logo-shop.png" ></a></span>
        <span class="tenshop">Hoshizora76 | <a style="text-decoration: none;color:white;"><?php if(isset($_SESSION['useradmin'])){echo $_SESSION['useradmin'];} ?></a></span>
      </div>
      <div class="mui-divider" style="background-color:#c2c7d0;"></div>
      <ul>
        <li><strong id="ac1"><a id="tieude" href="./admin.php?url=Home/"><i class="fas fa-home"></i>&nbsp;Trang chủ</a></strong></li>
        <li><strong id="ac2"><a id="tieude" href="./admin.php?url=Revenues"><i class="far fa-chart-bar"></i>&nbsp;Thống kê</a></strong></li>
        <?php 
            $row= json_decode($data["Admin"],true);
            foreach ($row as list("quyen"=>$quyen)){
              if($quyen==1) { ?>
        <li>
          <strong id="ac3"><a id="tieude"><i class="fas fa-users"></i>&nbsp;Quản lý thành viên<span class="mui-caret"></span></a></strong>
          <ul>
            <li id="hoho" class="h1"><a id="tdcap2" href="./admin.php?url=Member/Manage"><i class="fas fa-user-shield"></i>&nbsp;Quản lý</a></li>
            <li id="hoho" class="h2"><a id="tdcap2" href="./admin.php?url=Member/UserMH"><i class="fas fa-user"></i>&nbsp;Thành viên</a></li>
          </ul>
        </li>
        <?php } } ?>
        <li>
          <strong id="ac4"><a id="tieude"><i class="fas fa-th-list"></i>&nbsp;Quản lý danh mục<span class="mui-caret"></span></a></strong>
          <ul>
            <li id="hoho" class="h3"><a id="tdcap2" href="./admin.php?url=Category/Handmade"> <i class="fab fa-canadian-maple-leaf"></i>&nbsp;Phân loại handmade</a></li>
            <li id="hoho" class="h4"><a id="tdcap2" href="./admin.php?url=Category/GiftSet"><i class="fas fa-gifts"></i>&nbsp;Phân loại ngày lễ</a></li>
          </ul>
        </li>
        <li>
          <strong id="ac5"><a id="tieude" href="./admin.php?url=Product"><i class="fab fa-shopify"></i>&nbsp;Quản lý sản phẩm</a></strong>
        </li>
        <li>
          <strong id="ac6"><a id="tieude"><i class="fas fa-shipping-fast"></i>&nbsp;Quản lý đơn hàng<span class="mui-caret"></span></a></strong>
          <ul>
            <li id="hoho"class="h5"><a id="tdcap2" href="./admin.php?url=Order/orImport"><i class="fas fa-sign-in-alt"></i>&nbsp;Đơn nhập</a></li>
            <li id="hoho" class="h6"><a id="tdcap2" href="./admin.php?url=Order/orExport"><i class="fas fa-sign-out-alt"></i>&nbsp;Đơn xuất</a></li>
          </ul>
        </li>
      </ul>
    </div>
    <style>
      .account{width: 30px;height:30px;border-radius:50%;border:1px solid rgba(0,0,0,.5);}
      .anh{width: 70px;height: 60px;margin-right:12px;}
      .btn-reset{background-color:green;color:white;padding:2px;cursor: pointer;}
    </style>
    <header id="header">
      <div class="mui-appbar mui--appbar-line-height" style="background-color:rgb(244,246,249);">
        <div class="mui-container-fluid">
          <a class="sidedrawer-toggle mui--visible-xs-inline-block mui--visible-sm-inline-block js-show-sidedrawer"style="color:rgba(0,0,0,.5);">☰</a>
          <a class="sidedrawer-toggle mui--hidden-xs mui--hidden-sm js-hide-sidedrawer"style="color:black">☰</a>
          <span class="mui--text-title mui--visible-xs-inline-block mui--visible-sm-inline-block" style="color:rgba(0,0,0,.5);">H76</span>
          <div class="mui-dropdown tbh">
            <span data-mui-toggle="dropdown" style="cursor: pointer;" title="Cài đặt"><i class="fas fa-cog"></i></span>
            <ul class="mui-dropdown__menu mui-dropdown__menu--right">
              <li><a id="myBtn"style="cursor: pointer;"><i class="fas fa-tools"></i>&nbsp;Cấu hình trang</a></li>
            </ul>
          </div>
          <div class="mui-dropdown tbh" style="margin-top:8px; margin-bottom:-8px;">
            <?php 
            $row= json_decode($data["Admin"],true);
            foreach ($row as list("img"=>$img)){ if($img!=""){ ?>
                <span data-mui-toggle="dropdown" style="cursor: pointer;" title="My account"><img src="<?php echo $img; ?>" alt="" class="account"></span>
            <?php } else { ?>
                <span data-mui-toggle="dropdown" style="cursor: pointer;" title="My account"><img src="./public/images/unnamed.png" alt="" class="account"></span>
            <?php  } } ?>
            <ul class="mui-dropdown__menu mui-dropdown__menu--right">
              <li><a href="admin.php?url=Member/Hosocanhan"><i class="fas fa-user-edit"></i></i>&nbsp;Hồ sơ cá nhân</a></li>
              <li><a href="admin.php?url=Member/Capnhatmatkhau"><i class="fas fa-key"></i>&nbsp;Đổi mật khẩu</a></li>
              <li><a href="admin.php?url=Member/Sigout" title="Đăng xuất" onclick="return confirm('Bạn có chắc muốn đăng xuất?')"><i class="fas fa-sign-out-alt"></i> &nbsp;Đăng xuất</a></li>
            </ul>
          </div>
           <!---->
          <span class="tbh" title="Thông báo việc cần làm"><i class="far fa-bell"></i> <sup><span id="hienthi">
          <?php 
            echo count($row= json_decode($data["DSDHXL"],true)); ?>
          </span></sup> </span>
          <!--<a  class="tbh" title="Giao diện" ><i class="far fa-moon" style="cursor: pointer;" ></i></a>-->
        </div>
      </div>
    </header>
    <div id="myModal" class="modal">
        <!-- Nội dung -->
        <div class="modal-content">
            <span class="close">&times;</span>
            <form class="mui-form" action="admin.php?url=Home/ConfigDisplay" method="post" enctype="multipart/form-data">
                <legend style="font-size:25px;">Giao diện người dùng</legend>
                <?php
                    $row= json_decode($data["giaodien"],true);
                    foreach ($row as list("id"=>$id,"right-top"=>$rtop,"right-bottom"=>$rbottom,"footer"=>$footer)){?>
                <div class="mui-row">
                  <img src="<?php echo $rtop; ?>" alt="" style="width:200px;height:90px;" id="imagetop"> 
                  <img src="<?php echo $rbottom; ?>" alt="" style="width:200px;height:90px;" id="imagebottom"> 
                </div>
                <div class="mui-row" style="font-size:12px;">
                    Right-top: <input type="file" name="uploadtop" id="uploadtop" style="margin-bottom:5px;" accept="image/*"><br> 
                    Right-bottom: <input type="file" name="uploadbottom" id="uploadbottom" accept="image/*"><br>  
                </div>
                <div class="mui-row"style="margin-top:10px;text-align:left;margin-left:10px;margin-right:10px;">
                  <label for="" style="color:gray;">Banner ads (chạy quảng cáo):</label>
                </div>
                <div class="mui-row">
                  <div class="box-preview-img-an1">
                    <?php  
                        $rowhh = json_decode($data["banner"],true);
                        if(count($rowhh)>0){
                        foreach($rowhh as list("img"=>$hinhanh)){
                        ?> 
                      <img src="<?php echo $hinhanh ?>" alt="" class="anh">
                    <?php } } ?> 
                  </div>
                </div>
                <div class="mui-row">
                  <div class="box-preview-img1"></div>
                  Chọn ảnh: <input type="file" name="img_file[]" multiple="true" onchange="previewImg1(event);" id="img_file1" accept=".jpg">
                  <button type="reset" class="btn-reset">Làm mới</button>
                </div>
                <div class="mui-row" style="margin-top:10px;text-align:left;margin-left:10px;margin-right:10px;">
                  <label for="" style="color:gray;">Nội dung footer (thông tin shop):</label>
                  <textarea name="footer" id="footer" rows="10"><?php echo $footer; ?></textarea>
                  <input type="text" name="anhtrctop" value="<?php echo $rtop; ?>" style="display:none;"> 
                  <input type="text" name="anhtrcbottom" value="<?php echo $rbottom; ?>" style="display:none;">
                </div>
                <?php } ?>
                <button type="submit" name="btncapnhat" class="mui-btn mui-btn--raised mui-btn--accent">Lưu</button>
            </form>
        </div>
    </div>
    <script>
      document.getElementById("uploadtop").onchange = function () {
          var reader = new FileReader();

          reader.onload = function (e) {
              // get loaded data and render thumbnail.
              document.getElementById("imagetop").src = e.target.result;
          };

          // read the image file as a data URL.
          reader.readAsDataURL(this.files[0]);
      };
      document.getElementById("uploadbottom").onchange = function () {
          var reader = new FileReader();

          reader.onload = function (e) {
              // get loaded data and render thumbnail.
              document.getElementById("imagebottom").src = e.target.result;
          };

          // read the image file as a data URL.
          reader.readAsDataURL(this.files[0]);
      };
      ClassicEditor
        .create( document.querySelector( '#footer' ) )
        .catch( error => {
            console.error( error );
        } );
        function previewImg1(event) {
            var files = document.getElementById('img_file1').files; 
            $('.box-preview-img-an1').hide();
            $('.box-preview-img1').show();
            for (i = 0; i < files.length; i++)
            {
                $('.box-preview-img1').append('<img class="anh" src="" id="' + i +'">');
                $('.box-preview-img1 img:eq('+i+')').attr('src', URL.createObjectURL(event.target.files[i]));
            }   
        }
        $('.btn-reset').on('click', function() {
            $('.box-preview-img1').html('');
            $('.box-preview-img1').hide();
            $('.output').hide();
            $('.box-preview-img-an1').show();
        });
    </script>