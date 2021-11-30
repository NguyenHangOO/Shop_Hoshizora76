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
    <link href="//cdn.muicss.com/mui-0.10.3/css/mui.min.css" rel="stylesheet" type="text/css" />
    <script src="//cdn.muicss.com/mui-0.10.3/js/mui.min.js"></script>
</head>
<body>
    <style>
        body{
            height: 100vh;
            align-items: center;
            text-align: center;
            font-family: sans-serif;
            justify-content: center;
            background-image: linear-gradient(#fca5f1, #b5ffff);
            background-size: cover;
            background-position: center;
         }#tbb{padding-left:10px;padding-right:10px;}#hbb{font-size:18px;}
    </style>
    <div class="mui-container">
        <div class="mui-row mui--text-center" style="margin-top: 18%;">
            <div class="mui-col-md-4 mui-col-md-offset-4">
                <div class="mui-panel" style="border-radius: 5px;">
                   <?php if(isset($_SESSION["idadmin"])){ ?>
                    <div class="mui-row">
                        <span id="hbb">XÁC NHẬN</span>
                    </div>
                    <hr>
                    <div class="mui-row">
                        <span id="tbb">Bạn đã đăng nhập với tên <?php echo $_SESSION["nameadmin"]?>, cần đăng xuất trước khi đăng nhập người dùng khác.</span>
                    </div>
                    <hr>
                    <div class="mui-row">
                        <div class="mui-col-lg-8 mui-col-lg-offset-4 mui-col-md-11 mui-col-md-offset-1">
                            <a href="./admin.php?url=Member/SigoutBack" class="mui-btn mui-btn--small mui-btn--primary">Thoát</a>
                            <a href="./admin.php?url=Home" class="mui-btn mui-btn--small mui-btn--dark">Hủy</a>
                        </div>
                    </div>
                   <?php  }else { ?>
                    <form class="mui-form" action="admin.php?url=Sigin/CheckSigin" method="POST">
                        <a style="font-size: 80px;"><i style="color: #ff4081;"class="fas fa-user-circle"></i></a>
                        <div class="mui-textfield mui-textfield--float-label mui--text-left">
                          <input type="text" name="username" required>
                          <label>Username/Email</label>
                        </div>
                        <div class="mui-textfield mui-textfield--float-label mui--text-left">
                          <input type="password" name="password" required>
                          <label>Password</label>
                        </div>
                        <?php if(isset($data["result"])) { ?>
                        <h4 style="color:red"><?php
                            if($data["result"] =="lock"){
                               echo 'Tài khoản đang bị khóa';
                            }
                            else if ($data["result"] =="NoAdmin"){
                                echo "Bạn phải không phải admin";
                            } else { echo "Đăng nhập không thành công";}
                        ?></h4>
                        <?php } ?>
                        <button type="submit" class="mui-btn mui-btn--raised mui-btn--accent" name="btnsigin" value="sigin">Sigin</button>
                    </form>
                     <?php  } ?>
                </div>
            </div>
        </div>
    </div>
</body>
</html>