<style>
  #ac3{background-color: #afabab;}
  #ac3 a{color:white;}
  .h2{background-color: #afabab;}
  #btnxn{border-radius:5px;padding:0 10px;}#lock{color:red} #unlock{color:green}
  #img-u{width: 40px;height:40px;border-radius:50%;}
  #td{width: 40px; text-align:center;}
  .add{background: white;width:atuo;border-radius: 2px;margin-bottom:10px; padding:15px;border:dashed #c2bdbd; text-align:center;}
  #myInput {
   font-size: 15px; 
   padding-bottom: 12px ;padding-top: 8px ;padding-left:20px;padding-right:20px; 
   border: 1px solid #ddd; 
   margin-bottom: 12px; 
   border-radius:5px;
}
</style>
<div id="content-wrapper">
      <div class="mui--appbar-height"></div>
      <div class="mui-container-fluid">
        <br> 
        <div class="mui-row">
            <h2>Quản lý tài khoản người dùng</h2>
          <div class="mui-col-sm-12  mui-col-lg-10 mui-col-lg-offset-1">
            <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names..">
            <table class="mui-table" id="tbdh">
              <thead>
                <tr>
                  <th id="td">STT</th>
                  <th >Họ tên</th>
                  <th >Username</th>
                  <th >Email</th>
                  <th id="td1">Hình</th>
                  <th id="td1">Trạng thái</th>
                  <th id="td5">Thao tác</th>
                </tr>
              </thead>
              <tbody id="myTable">
                <?php 
                  $stt=0;
                  $row= json_decode($data["DSMember"],true);
                  foreach ($row as list("id"=>$id,"username"=>$username,"fullname"=>$hoten,"img"=>$img,"trangthai"=>$trangthai,"email"=>$email)){
                      $stt++;
                ?>
                <tr id="trhorver" class="onRow">
                  <td id="td"><span><?php echo $stt; ?></span></td>
                  <td ><span><?php echo $hoten; ?></span></td>
                  <td ><span><?php echo $username; ?></span></td>
                  <td ><span><?php echo $email; ?></span></td>
                  <td id="td1">
                  <?php if($img!=""){ ?>
                      <img src="<?php echo $img; ?>" alt="" id="img-u">
                  <?php  } else { ?>
                      <img src="./public/images/account/unnamed.png" alt="" id="img-u">
                 <?php } ?>
                  </td>
                  <td id="td1">
                    <?php  
                          if($trangthai==1){
                              echo '<span id="unlock" >Kích hoạt</span>';
                          }
                          else{echo '<span id="lock" >Đang khóa</span>';}
                    ?>
                  </td>
                  <td id="td5">
                    <?php if($trangthai==1){ ?>
                      <a href="./admin.php?url=Member/LockUser/<?php echo $id; ?>" class="mui-btn mui-btn--raised mui-btn--accent mui-btn mui-btn--small" id="btnxn" title="Khóa tài khoản"><i class="fas fa-lock"></i></a>
                    <?php }  else {?>
                      <a href="./admin.php?url=Member/UnlockUser/<?php echo $id; ?>" class="mui-btn mui-btn--raised mui-btn--primary mui-btn mui-btn--small" id="btnxn" title="Mở khóa tài khoản"><i class="fas fa-unlock-alt"></i></a>
                      <!--<button class="mui-btn mui-btn--raised mui-btn--danger mui-btn mui-btn--small" id="btnxn" title="Xóa tài khoản" onclick="return confirm('Bạn có chắc muốn xóa?')"><i class="fas fa-trash"></i></button>-->
                    <?php } ?>
                  </td>
                </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
</div>
<script>
  $(document).ready(function() {
        $('#myInput').on('keyup', function(event) {
            event.preventDefault();
            /* Act on the event */
            var tukhoa = $(this).val().toLowerCase();
            $('#myTable tr').filter(function() {
              $(this).toggle($(this).text().toLowerCase().indexOf(tukhoa)>-1);
            });
        });
      });
</script>