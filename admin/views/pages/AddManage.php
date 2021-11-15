<div id="content-wrapper">
      <div class="mui--appbar-height"></div>
      <div class="mui-container-fluid">
        <br> 
        <div class="row">
            <div class="mui-col-md-4 mui-col-md-offset-4 cp-ac">
                <form class="mui-form" action="admin.php?url=Member/InsertManage" method="POST">
                <?php if(isset($data["tbc2"])){ if ($data["tbc2"]=="Cập nhật thành công"){ ?>
                    <div class="tbloi success" id="tbloi">
                        <i class="far fa-check-circle"></i> <span ><?php echo $data["tbc2"]; ?></span>
                        <a class="close" onclick="var hidden = document.getElementById('tbloi');hidden.style.display = 'none';"><i class="fas fa-times"></i></a>
                    </div>
                    <?php  } else{ ?>
                    <div class="tbloi" id="tbloi">
                        <i class="fas fa-exclamation-circle"></i> <span ><?php echo $data["tbc2"]; ?></span>
                        <a class="close" onclick="var hidden = document.getElementById('tbloi');hidden.style.display = 'none';"><i class="fas fa-times"></i></a>
                    </div>  
                    <?php } } ?>
                    <legend>Thêm nhân viên</legend>
                    <div class="mui-textfield mui-textfield--float-label">
                        <input type="text" name="hoten" required>
                        <label>Họ tên</label>
                    </div>
                    <div class="mui-textfield mui-textfield--float-label">
                        <input type="text" name="username" id="username" required>
                        <label>Username</label>
                        <div id="messageun" style="font-size:12px; text-align: left; margin-left:3px;"></div>
                    </div>
                    <div class="mui-textfield mui-textfield--float-label">
                        <input type="email" name="email" id="email" required>
                        <label>Email</label>
                        <div id="messageem" style="font-size:12px; text-align: left; margin-left:3px;"></div>
                    </div>
                    <button type="submit" name="btnAddNV" class="mui-btn mui-btn--raised mui-btn--primary">Thêm mới</button>
                </form>
            </div>
        </div>
      </div>
</div>
<script>
    $(document).ready(function(){
    $("#username").keyup(function(){
        var user = $(this).val();
        $.post("./admin.php?url=Ajax/checkUsername",{un:user}, function(data){
            $("#messageun").html(data);
        });
    });
});
$(document).ready(function(){
    $("#email").keyup(function(){
        var uem = $(this).val();
        $.post("./admin.php?url=Ajax/checkEmail",{em:uem}, function(data){
            $("#messageem").html(data);
        });
    });
});
</script>