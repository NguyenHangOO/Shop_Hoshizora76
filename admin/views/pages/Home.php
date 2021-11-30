<style>
  #ac1{background-color: #afabab;}#tbdh{border-top: 2px solid transparent;}
  #ac1 a{color:white;}#btnxn{padding:0 8px;}
  @media (max-width: 380px) {#tbdh{font-size:12px;}}
  @media (max-width: 330px) {#tbdh{font-size:11px;}}
</style>
<div id="content-wrapper">
      <div class="mui--appbar-height"></div>
      <div class="mui-container-fluid">
        <br> 
        <div class="mui-row" >
          <div class="mui-col-sm-6 mui-col-lg-3" id="mui">
            <div class="congviec"style="background-image: linear-gradient(#00a8c5,#ffff7e);">
              <a id="info_user">
                <i class="far fa-user-circle" id="icon_user"></i><br/>
                <?php 
                   $row= json_decode($data["DSMember"],true);
                   $tongtv=count($row);
                    echo '<span id="tongtv">'.$tongtv.'</span></br/>';
                ?>
                Thành viên
              </a>
            </div>
          </div>
          <div class="mui-col-sm-6 mui-col-lg-3" id="mui">
            <div class="congviec"style="background-image: linear-gradient(#ffe98a,#d74177);">
              <a  id="info_user">
                <i class="fas fa-shipping-fast" id="icon_user"></i><br/>
                <?php 
                   $row= json_decode($data["DSDH"],true);
                   $tongdh=count($row);
                    echo '<span id="tongtv">'.$tongdh.'</span></br/>';
                ?>
                Đơn hàng
              </a>
            </div>
          </div>
          <div class="mui-col-sm-6 mui-col-lg-3" id="mui">
            <div class="congviec"style="background-image: linear-gradient(#d585ff,#00ffee);">
              <a id="info_user">
                <i class="fas fa-dollar-sign" id="icon_user"></i><br/>
                <?php 
                   $row= json_decode($data["DSTTDH"],true);
                   foreach ($row as list("danhthu"=>$danhthu)){
                    echo '<span id="tongtv">'.number_format($danhthu).'đ</span></br/>'; }
                ?>
                Thu nhập tháng <span><?php echo $m = date("m"); ?></span>
              </a>
            </div>
          </div>
          <div class="mui-col-sm-6 mui-col-lg-3" id="mui">
            <div class="congviec"style="background-image: linear-gradient(#8e78ff,#fc7d7b);">
              <a  id="info_user">
                <i class="fab fa-shopify" id="icon_user"></i><br/>
                <?php 
                   $row= json_decode($data["DSSP"],true);
                   $tongsp=count($row);
                    echo '<span id="tongtv">'.$tongsp.'</span></br/>';
                ?>
                Sản phẩm
              </a>
            </div>
          </div>
        </div>
        <div class="mui-row">
          <h2>Công việc hôm nay</h2>
          <div class="mui-col-sm-12  mui-col-lg-8 mui-col-lg-offset-2">
            <table class="mui-table" id="tbdh">
              <thead>
                <tr id="tableth">
                  <th>Mã đơn</th>
                  <th id="td1">Người mua</th>
                  <th id="td1">Tổng tiền</th>
                  <th id="td1">Ngày đặt</th>
                  <th id="td5">Xử lý</th>
                </tr>
              </thead>
              <tbody>
                <tr id="trhorver">
                <?php 
                   $row= json_decode($data["DSDHXL"],true);
                  foreach ($row as list("id"=>$id,"ngay"=>$ngay,"fullname"=>$hoten,"tongtien"=>$tongtien,"member_id"=>$idmem)){
                  ?>
                  <td><span><?php echo $id; ?></span></td>
                  <td id="td1"><span><?php echo $hoten; ?></span></td>
                  <td id="td1"><span><?php echo number_format($tongtien); ?></span></td>
                  <td id="td1"><span><?php echo $ngay; ?></span></td>
                  <td id="td5">
                    <a href="admin.php?url=Home/Xulydonhang/<?php echo $id; ?>/<?php echo $idmem; ?>" class="mui-btn mui-btn--raised mui-btn--accent mui-btn mui-btn--small" id="btnxn" title="Xác nhận"><i class="fas fa-check"></i></a>
                    <a href="admin.php?url=Home/Huydonhang/<?php echo $id; ?>/<?php echo $idmem; ?>" class="mui-btn mui-btn--raised mui-btn--danger mui-btn mui-btn--small" title="Hủy" id="btnxn"><i class="fas fa-times-circle"onclick="return confirm('Bạn có chắc muốn hủy đơn '+<?php echo $id; ?> +'?')"></i></a>
                  </td>
                </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
</div>
