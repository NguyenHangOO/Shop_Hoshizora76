<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Hoshizora76</title>
    <base href="/CodeApp/Shop_Hoshizora76/">
	<Link rel="shortcut icon" href="public/images/logo.png">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
	<!-- MUI CSS -->
    <link rel="stylesheet" type="text/css" href="./public/css/thongbao.css">
    <link rel="stylesheet" type="text/css" href="./public/css/adminstyle.css">
    <link href="//cdn.muicss.com/mui-latest/css/mui.min.css" rel="stylesheet" type="text/css" />
    <script src="//cdn.muicss.com/mui-latest/js/mui.min.js"></script>
    <script src="//code.jquery.com/jquery-2.1.4.min.js"></script>
</head>
<body>
    <div id="sidedrawer" class="mui--no-user-select">
      <div id="sidedrawer-brand" class="mui--appbar-line-height">
        <span class="mui--text-title"><a href="/CodeApp/Shop_Hoshizora76/admin.php?url=Home"> <img id="lg" src="public/images/logo-H76.png" ></a></span>
        <span class="tenshop">Hoshizora76 | <a style="text-decoration: none;"><?php if(isset($_SESSION['useradmin'])){echo $_SESSION['useradmin'];} ?></a></span>
      </div>
      <div class="mui-divider"></div>
      <ul>
        <li><strong id="ac1"><a id="tieude" href="./admin.php?url=Home/"><i class="fas fa-home"></i>&nbsp;Trang chủ</a></strong></li>
        <li><strong id="ac2"><a id="tieude" href=""><i class="fas fa-file-invoice-dollar"></i>&nbsp;Doanh thu</a></strong></li>
        <?php 
            $row= json_decode($data["Admin"],true);
            foreach ($row as list("quyen"=>$quyen)){
              if($quyen==1) { ?>
        <li>
          <strong id="ac3"><a id="tieude"><i class="fas fa-users"></i>&nbsp;Quản lý thành viên<span class="mui-caret"></span></a></strong>
          <ul>
            <li id="hoho"><a id="tdcap2" href="./admin.php?url=Member/Manage"><i class="fas fa-user-shield"></i>&nbsp;Quản lý</a></li>
            <li id="hoho"><a id="tdcap2" href="./admin.php?url=Member/UserMH"><i class="fas fa-user"></i>&nbsp;Thành viên</a></li>
          </ul>
        </li>
        <?php } } ?>
        <li>
          <strong id="ac4"><a id="tieude"><i class="fas fa-th-list"></i>&nbsp;Quản lý danh mục<span class="mui-caret"></span></a></strong>
          <ul>
            <li id="hoho"><a id="tdcap2" href="./admin.php?url=Category/Handmade"> <i class="fab fa-canadian-maple-leaf"></i>&nbsp;Phân loại Handmade</a></li>
            <li id="hoho"><a id="tdcap2" href="./admin.php?url=Category/GiftSet"><i class="fas fa-gifts"></i>&nbsp;Phân loại Gift Set</a></li>
          </ul>
        </li>
        <li>
          <strong id="ac5"><a id="tieude" href="./admin.php?url=Product"><i class="fab fa-shopify"></i>&nbsp;Quản lý sản phẩm</a></strong>
        </li>
        <li>
          <strong id="ac6"><a id="tieude"><i class="fas fa-shipping-fast"></i>&nbsp;Quản lý đơn hàng<span class="mui-caret"></span></a></strong>
          <ul>
            <li id="hoho"><a id="tdcap2" href="./admin.php?url=Order/orImport"><i class="fas fa-sign-in-alt"></i>&nbsp;Đơn nhập</a></li>
            <li id="hoho"><a id="tdcap2" href="./admin.php?url=Order/orExport"><i class="fas fa-sign-out-alt"></i>&nbsp;Đơn xuất</a></li>
          </ul>
        </li>
      </ul>
    </div>
    <style>
      .account{width: 30px;height:30px;border-radius:50%;}
    </style>
    <header id="header">
      <div class="mui-appbar mui--appbar-line-height">
        <div class="mui-container-fluid">
          <a class="sidedrawer-toggle mui--visible-xs-inline-block mui--visible-sm-inline-block js-show-sidedrawer">☰</a>
          <a class="sidedrawer-toggle mui--hidden-xs mui--hidden-sm js-hide-sidedrawer">☰</a>
          <span class="mui--text-title mui--visible-xs-inline-block mui--visible-sm-inline-block">H76</span>
          <a class="tbh" title="Cài đặt"><i class="fas fa-cog"></i></a>
          <div class="mui-dropdown tbh" style="margin-top:8px; margin-bottom:-8px;">
            <?php 
            $row= json_decode($data["Admin"],true);
            foreach ($row as list("img"=>$img)){ if($img!=""){ ?>
                <span data-mui-toggle="dropdown" style="cursor: pointer;" title="My account"><img src="<?php echo $img; ?>" alt="" class="account"></span>
            <?php } else { ?>
                <span data-mui-toggle="dropdown" style="cursor: pointer;" title="My account"><img src="./public/images/account/unnamed.png" alt="" class="account"></span>
            <?php  } } ?>
            <ul class="mui-dropdown__menu mui-dropdown__menu--right">
              <li><a href="admin.php?url=Member/Hosocanhan"><i class="fas fa-user-edit"></i></i>&nbsp;Hồ sơ cá nhân</a></li>
              <li><a href="admin.php?url=Member/Capnhatmatkhau"><i class="fas fa-key"></i>&nbsp;Đổi mật khẩu</a></li>
              <li><a href="admin.php?url=Member/Sigout" title="Đăng xuất" onclick="return confirm('Bạn có chắc muốn đăng xuất?')"><i class="fas fa-sign-out-alt"></i> &nbsp;Đăng xuất</a></li>
            </ul>
          </div>
           <!---->
          <span class="tbh" title="Thông báo việc cần làm"><i class="fas fa-bell"></i> <sup><span id="hienthi">
          <?php 
            echo count($row= json_decode($data["DSDHXL"],true)); ?>
          </span></sup> </span>
          <!--<a  class="tbh" title="Giao diện" ><i class="far fa-moon" style="cursor: pointer;" ></i></a>-->
        </div>
      </div>
    </header>
    