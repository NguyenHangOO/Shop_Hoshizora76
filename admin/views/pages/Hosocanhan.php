<div id="content-wrapper">
      <div class="mui--appbar-height"></div>
      <div class="mui-container-fluid">
        <br> 
        <?php if(isset($data["Account"])){
           if($data["Account"]=="Hoso"){ ?>
               <div class="row">
                    <div class="mui-col-md-4 mui-col-md-offset-4 cp-ac">
                    <?php  
                    $row= json_decode($data["Admin"],true);
                    foreach ($row as list("username"=>$username,"fullname"=>$hoten,"email"=>$email,"img"=>$img)){ ?>
                        <form class="mui-form" action="admin.php?url=Member/Hosocanhan" enctype="multipart/form-data" method="POST">
                         <?php if(isset($data["tbc"])){ if ($data["tbc"]=="Cập nhật thành công"){ ?>
                            <div class="tbloi success" id="tbloi">
                                <i class="far fa-check-circle"></i> <span ><?php echo $data["tbc"]; ?></span>
                                <a class="close" onclick="var hidden = document.getElementById('tbloi');hidden.style.display = 'none';"><i class="fas fa-times"></i></a>
                            </div>
                           <?php  } else{ ?>
                            <div class="tbloi" id="tbloi">
                                <i class="fas fa-exclamation-circle"></i> <span ><?php echo $data["tbc"]; ?></span>
                                <a class="close" onclick="var hidden = document.getElementById('tbloi');hidden.style.display = 'none';"><i class="fas fa-times"></i></a>
                            </div>  
                            <?php } } ?>
                            <legend>Cập nhật thông tin</legend>
                            <?php if($img==""){ ?>
                                <img src="./public/images/account/unnamed.png" alt="" style="width:80px;height:80px;text-align:center;">
                           <?php  } else { ?>
                                <img src="<?php echo $img ?>" alt="" style="width:80px;height:80px;text-align:center;">
                            <?php } ?>
                            <div class="mui-textfield mui-textfield--float-label">
                                <input type="text" name="username" disabled value="<?php echo $username; ?>">
                                <label>Username</label>
                            </div>
                            <div class="mui-textfield mui-textfield--float-label">
                                <input type="text" name="hoten" value="<?php echo $hoten; ?>" required>
                                <label>Họ tên</label>
                            </div>
                            <div class="mui-textfield mui-textfield--float-label">
                                <input type="email" name="email" value="<?php echo $email; ?>" required>
                                <label>Email</label>
                            </div>
                            Chọn file ảnh: <input type="file" name="uploadFile"><br> <br> 
                            <input type="text" name="anhtrc" value="<?php echo $img ?>" style="display:none;"><br>
                            <button type="submit" name="btnUpload" class="mui-btn mui-btn--raised mui-btn--primary">Cập nhật</button>
                        </form>
                    <?php } ?>
                    </div>
               </div>
           <?php }else if($data["Account"]=="Matkhau")
           { ?>
                <div class="row">
                    <div class="mui-col-md-4 mui-col-md-offset-4 cp-ac">
                        <form class="mui-form" action="admin.php?url=Member/Capnhatmatkhau" method="POST">
                            <?php if(isset($data["tb"])){ if ($data["tb"]=="Cập nhật thành công"){ ?>
                            <div class="tbloi success" id="tbloi">
                                <i class="far fa-check-circle"></i> <span ><?php echo $data["tb"]; ?></span>
                                <a class="close" onclick="var hidden = document.getElementById('tbloi');hidden.style.display = 'none';"><i class="fas fa-times"></i></a>
                            </div>
                           <?php  } else{ ?>
                            <div class="tbloi" id="tbloi">
                                <i class="fas fa-exclamation-circle"></i> <span ><?php echo $data["tb"]; ?></span>
                                <a class="close" onclick="var hidden = document.getElementById('tbloi');hidden.style.display = 'none';"><i class="fas fa-times"></i></a>
                            </div>  
                            <?php } } ?>
                            <legend>Cập nhật mật khẩu</legend>
                            <div class="mui-textfield mui-textfield--float-label">
                                <input type="password" name="matkhaucu" required>
                                <label>Mật khẩu cũ</label>
                            </div>
                            <div class="mui-textfield mui-textfield--float-label">
                                <input type="password" name="matkhaumoi" required>
                                <label>Mật khẩu mới</label>
                            </div>
                            <div class="mui-textfield mui-textfield--float-label">
                                <input type="password" name="nhaplai" required>
                                <label>Nhập lại mật khẩu</label>
                            </div>
                            <button type="submit" name="btnMatkhau" class="mui-btn mui-btn--raised mui-btn--primary">Cập nhật</button>
                        </form>
                    </div>
               </div>
          <?php }else{
               echo '<h3>Có lỗi xảy ra! Bạn nhập không đúng địa chỉ</h3>';
           } } ?>
      </div>
</div>