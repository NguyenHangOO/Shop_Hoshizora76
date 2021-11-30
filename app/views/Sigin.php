<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOSHIZORA76</title>
    <base href="/CodeApp/Shop_Hoshizora76/">
    <Link rel="shortcut icon" href="public/images/logo.png">
    <link rel="stylesheet" type="text/css" href="public/css/login.css">
</head>
<body>
    <style>
        #tbb{padding-left:10px;padding-right:10px;}#hbb{font-size:18px;}
        .btn{ border: 1px solid transparent;padding:10px 15px; text-decoration: none;text-align:center}
        .btn-primary{background-color: #007bff;border-color: #007bff;color:white;}
        .btn-dark{background-color: #424242;border-color: #424242;color:white;}
        .btn-primary:hover{background-color: #9cbfe4;border-color: #9cbfe4;color:white;}
        .btn-dark:hover{background-color: #a19d9d;border-color: #a19d9d;color:white;}
    </style>
    <?php if(isset($_SESSION['iduss']) || isset($_SESSION['idadmin'])){ ?>
        <div class="container">
            <div>
                <span id="hbb">XÁC NHẬN</span>
            </div>
            <br>
            <div>
                <span id="tbb">Bạn đã đăng nhập với tài khoản <?php if(isset($_SESSION['iduss'])){echo $_SESSION['nameuss'];} else { echo $_SESSION['nameadmin']; }?>, cần đăng xuất trước khi đăng nhập người dùng khác.</span>
            </div>
            <br>
            <div >
                <div>
                    <a href="./Account/Sigout" class="btn btn-primary">Thoát</a>
                    <?php
                        if(isset($_SESSION['iduss'])){ ?>
                            <a href="./Home" class="btn btn-dark">Hủy</a>
                        <?php } else if(isset($_SESSION['idadmin'])){ ?>
                            <a href="admin.php?url=Home/" class="btn btn-dark">Hủy</a>
                     <?php   }?>
                </div>
            </div>
        </div>
    <?php }else { ?>
    <div class="container">
        <header>Sigin</header>
        <form action="./Register/Khachhangdn" method="POST">
            <div class="input-field">
				<input type="text" name="username" required>
				<label>Username/Email</label>
			</div>
			<div class="input-field">
				<input class="pswrd" name="password" type="password" required>
				<label>Password</label>
            </div>
            <!--thong bao loi-->
            <?php if(isset($data["result"])) { ?>
            <h4 style="color:red"><?php
                 if($data["result"]=="nouser"){
                    echo "Tài khoản không tồn tại";
                 }
                 else if($data["result"]=="lock") {echo "Tài khoản đang bị khóa";}
                 else { echo "Đăng nhập không thành công";}
            ?></h4>
            <?php } ?>
            <div class="button">
                <div class="inner">
                </div>
                <button type="submit" name="btnSigin" value="login">SIGIN</button>
            </div>
        </form>
        <div class="signup" style="margin-top:-10px;">
            Not a member? <a href="./Register">Signup now</a>
        </div>
        <div class="forgotpass">
            Forgot your password? <a href="./RestPassword"style="text-decoration: none;">Reset your password</a>
        </div>
    </div>
    <?php } ?>
    <div class="introduce">
        <div id="pacman" ></div>
        <div id="pacman1" ></div>
        <div id="pacman2" ></div>  
        <h1>WELCOME TO HOSHIZORA76 </h1><hr>
        <h4 >We are pleased to serve you. You already have an account please login. If not, create an account for yourself.</h4>  
    </div> 
</body>
</html>