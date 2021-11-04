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
         }
    </style>
    <div class="mui-container">
        <div class="mui-row mui--text-center" style="margin-top: 18%;">
            <div class="mui-col-md-4 mui-col-md-offset-4">
                <div class="mui-panel" style="border-radius: 5px;">
                    <form class="mui-form" action="admin.php?url=Sigin/CheckSigin" method="POST">
                        <a style="font-size: 80px;"><i style="color: #ff4081;"class="fas fa-user-circle"></i></a>
                        <div class="mui-textfield mui-textfield--float-label mui--text-left">
                          <input type="text" name="username" required>
                          <label>Username</label>
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
                </div>
            </div>
        </div>
    </div>
</body>
</html>