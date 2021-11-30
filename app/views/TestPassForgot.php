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
        <?php 
            if(isset($data["relust"])){
                if($data["relust"]=="yes"){ ?>
                <div class="container" style="height:150px;">
                    <div>
                        <span style="color:green;font-size:20px;">Đã cập nhật mật khẩu thành công</span>
                    </div>
                    <div class="sigin" style="margin-top:15px;">
                        <a href="./Register/Sigin" style="text-decoration: none;background-color:red;padding:10px;color:white;">Sigin</a>
                    </div>
                </div>
               <?php }else {
                    if($data["relust"]=="not"){ ?>
                <div class="container">
                    <header style="font-size:25px;">Forgot Password </header>
                    <form action="" method="POST">
                        <div class="input-field">
                            <input class="pswrd" name="password" type="password" required>
                            <input  name="loai" type="hidden" value="<?php echo $data["loai"]?>">
                            <label>Password</label>
                        </div>
                        <div class="input-field">
                            <input class="cfpswrd" name="cfpassword" type="password" required>
                            <label>Confirm password</label>
                        </div>
                        <div class="button">
                            <div class="inner">
                            </div>
                            <button type="submit" name="btnUpReset">Cập nhật</button>
                        </div>
                    </form>
                </div>
                <?php   }else{ ?>
                <div class="container">
                    <header style="font-size:25px;">Forgot Password </header>
                    <div>
                        <span style="color:red;font-size:20px;">! Mật khẩu không khớp</span>
                    </div>
                    <form action="" method="POST">
                        <div class="input-field">
                            <input class="pswrd" name="password" type="password" required>
                            <label>Password</label>
                        </div>
                        <div class="input-field">
                            <input class="cfpswrd" name="cfpassword" type="password" required>
                            <label>Confirm password</label>
                        </div>
                        <div class="button">
                            <div class="inner">
                            </div>
                            <button type="submit" name="btnUpReset">Cập nhật</button>
                        </div>
                    </form>
                </div>
                <?php   }
                }
            }
        ?>
</body>
</html>