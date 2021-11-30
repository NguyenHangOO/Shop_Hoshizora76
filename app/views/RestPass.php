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
    <header style="font-size:25px;">Forgot Password </header>
        <?php  if(isset($data["relust"])){
            if($data["relust"]=="yes"){ ?>
            <div>
                 <span style="color:green">Đã gửi link cập nhật mật khẩu cho bạn qua email của bạn</span>
            </div>
        <?php } else {?>
            <div>
                 <span style="color:red">! Email chưa đăng ký tài khoản</span>
            </div>
        <?php } }?> 
        <form action="./RestPassword" method="POST">
            <div class="input-field">
				<input type="email" name="email" required>
				<label>Email</label>
			</div>
            <div class="button">
                <div class="inner">
                </div>
                <button type="submit" name="btnReset">Send Mail</button>
            </div>
        </form>
        <div class="signup">
            Not a member? <a href="./Register">Signup now</a>
        </div>
        <div class="sigin">
            Do you already have an account? <a href="./Register/Sigin" style="text-decoration: none;">Sigin</a>
        </div>
    </div>
</body>
</html>