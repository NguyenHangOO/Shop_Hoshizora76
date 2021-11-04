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
    <div class="container">
        <header>Sigin</header>
        <form action="./Register/Khachhangdn" method="POST">
            <div class="input-field">
				<input type="text" name="username" required>
				<label>Username</label>
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
        <div class="signup">
            Not a member? <a href="./Register">Signup now</a>
        </div>
    </div>
    <div class="introduce">
        <div id="pacman" ></div>
        <div id="pacman1" ></div>
        <div id="pacman2" ></div>  
        <h1>WELCOME TO HOSHIZORA76 </h1><hr>
        <h4 >We are pleased to serve you. You already have an account please login. If not, create an account for yourself.</h4>  
    </div> 
</body>
</html>