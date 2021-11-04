<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOSHIZORA76</title>
    <base href="/CodeApp/Shop_Hoshizora76/">
    <Link rel="shortcut icon" href="./public/images/logo.png">
    <link rel="stylesheet" type="text/css" href="./public/css/signup.css">
</head>
<body>
    <div class="container">
        <header>Signup</header>
        <form action="./Register/Khachhangdk" method="POST">
            <div class="input-field">
				<input type="text" name="fullname" required>
				<label>Full name</label>
			</div>
            <div class="input-field">
				<input type="text"name="username" id="username" required>
				<label>Username</label>
                <div id="messageun" style="font-size:12px; text-align: left; margin-left:3px;"></div>
			</div>
			<div class="input-field">
				<input class="pswrd" name="password" type="password" required>
				<label>Password</label>
            </div>
            <div class="input-field">
				<input class="cfpswrd" name="cfpassword" type="password" required>
				<label>Confirm password</label>
            </div>
            <div class="input-field">
				<input type="email" name="email" required>
				<label>Email</label>
			</div>
            <div class="input-check">
            <input type="checkbox" name="yes" value="yes" checked >
				<label id="check">Tôi đồng ý với điều khoản</label>
			</div>
            <div class="button" >
                <div class="inner">
                </div>
                <button type="submit" name="btnSignup">SIGNUP</button>
            </div>
        </form>
        <?php if(isset($data["epass"])) { ?>
            <h4 style="color:red"> *Mật khẩu không khớp</h4>
        <?php } ?>
        <?php if(isset($data["result"])) { ?>
            <h4 style="color:red"><?php
                 if($data["result"]== "true"){
                    echo "Đăng ký thành công"."<a style=\"margin-left:10px;margin-bottom: 15px;\" class=\"btn btn-primary\" href=\"./Register/Sigin\">Đăng nhập</a>";
                 }
                 else {echo "Đăng ký thất bại";}
            ?></h4>
        <?php } ?>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" ></script>
    <script src="./public/js/register.js" ></script>	
</body>
</html>