<style>
  #ac3{background-color: #afabab;}
  #ac3 a{color:white;}
  #qt{background-color:#ffcc33; color:white; padding:3px;border-radius:3px;font-size:12px;} #nv{background-color:green; color:white;padding:3px;border-radius:3px;font-size:12px;}
  #lock{color:red} #unlock{color:green}
  #tbdh{border-radius: 4px;}
  #btnxn{border-radius:5px;padding:0 10px;} #btncq{border-radius:5px;padding:0 8px;background-color:#FFA500;color:white;}
  .add{background: white;width:atuo;border-radius: 2px;margin-bottom:10px; padding:15px;border:dashed #c2bdbd; text-align:center;}
</style>
<div id="content-wrapper">
      <div class="mui--appbar-height"></div>
      <div class="mui-container-fluid">
        <br> 
        <div class="mui-row">
            <h2>Quản lý tài khoản</h2>
            <?php  
              $row= json_decode($data["Admin"],true);
              foreach ($row as list("quyen"=>$quyen)){
                  if($quyen==1) { ?>
                    <div class="mui-col-sm-12  mui-col-lg-10 mui-col-lg-offset-1">
                        <div class="add">
                            <a href="admin.php?url=Member/InsertManage" style="text-decoration:none;font-size:20px;"><i class="fas fa-plus"></i>&nbsp;&nbsp;Thêm mới</a>
                        </div>
                    </div>
          <?php  } }?> 
          <div class="mui-col-sm-12  mui-col-lg-10 mui-col-lg-offset-1">
            <table class="mui-table" id="tbdh">
              <thead>
                <tr>
                  <th>STT</th>
                  <th >Username</th>
                  <th >Họ tên</th>
                  <th >Email</th>
                  <th id="td1">Quyền</th>
                  <th id="td1">Trạng thái</th>
                  <th id="td5">Thao tác</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                $stt=0;
                $row= json_decode($data["DSAdmin"],true);
				        foreach ($row as list("id"=>$id,"username"=>$username,"fullname"=>$hoten,"quyen"=>$quyen,"trangthai"=>$trangthai,"email"=>$email)){
                    $stt++;
                ?>
                <tr id="trhorver">
                  <td><span><?php  echo $stt;?></span></td>
                  <td ><span><?php echo $username; ?></span></td>
                  <td ><span><?php echo $hoten; ?></span></td>
                  <td ><span><?php echo $email; ?></span></td>
                  <td id="td1">
                        <?php 
                            if($quyen==1){
                                echo '<span id="qt">Quản trị</span>';
                            }
                            else{echo '<span id="nv">Nhân viên</span>';}
                         ?>
                  </td>
                  <td id="td1">
                        <?php 
                            if($quyen!=1){ 
                              if($trangthai==1){
                                  echo '<span id="unlock" >Kích hoạt</span>';
                              }
                              else{echo '<span id="lock" >Đang khóa</span>';}
                            }
                        ?>
                  </td>
                  <?php if($quyen!=1){ 
                        if($trangthai==1)
                        {  
                            $row= json_decode($data["Admin"],true);
                            foreach ($row as list("quyen"=>$quyen)){
                                if($quyen==1) { ?>
                                    <td id="td5">
                                        <a href="./admin.php?url=Member/LockStaff/<?php echo $id; ?>" class="mui-btn mui-btn--raised mui-btn--accent mui-btn mui-btn--small" id="btnxn" title="Khóa tài khoản"><i class="fas fa-lock"></i></a>
                                        <a href="./admin.php?url=Member/GrantPermission/<?php echo $id; ?>" class="mui-btn mui-btn--raised  mui-btn mui-btn--small" id="btncq" title="Cấp quyền quản trị"><i class="fas fa-user-cog"></i></a>
                                    </td>
                        <?php  } }
                        }else {
                            $row= json_decode($data["Admin"],true);
                            foreach ($row as list("quyen"=>$quyen)){
                                if($quyen==1) { ?>
                                    <td id="td5">
                                        <a href="./admin.php?url=Member/UnlockStaff/<?php echo $id; ?>" class="mui-btn mui-btn--raised mui-btn--primary mui-btn mui-btn--small" id="btnxn" title="Mở khóa tài khoản"><i class="fas fa-unlock-alt"></i></a>
                                    </td>
                        <?php  } }
                        } ?>  
                    <?php } ?>
                </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
</div>