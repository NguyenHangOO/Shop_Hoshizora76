<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOSHIZORA76</title>
    <base href="/">
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
				<input type="email" name="email" id="email" required>
				<label>Email</label>
                <div id="messageem" style="font-size:12px; text-align: left; margin-left:3px;"></div>
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
            <div class="sigin">
                Do you already have an account? <a href="./Register/Sigin" style="text-decoration: none;">Sigin</a>
            </div>
        </form>
        <?php if(isset($data["epass"])) { ?>
            <h4 style="color:red"> *Mật khẩu không khớp</h4>
        <?php } ?>
        <?php if(isset($data["result"])) { ?>
            <?php
                 if($data["result"]== "true"){
                    echo "<h4 style=\"color:green\">Đăng ký thành công</h4>";
                 }
                 else {echo "<h4 style=\"color:red\">Đăng ký thất bại</h4>";}
            ?>
        <?php } ?>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" ></script>
    <script src="./public/js/register.js" ></script>
    <script>
        $(document).ready(function(){
            $("#email").keyup(function(){
                var uem = $(this).val();
                $.post("./Ajax/checkEmail",{em:uem}, function(data){
                    $("#messageem").html(data);
                });
            });
        });
    </script>	
</body>
</html>