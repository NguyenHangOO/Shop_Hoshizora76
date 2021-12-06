<style>
  #ac6{background-color: #afabab;} #ac6 a{color:white;}
  .h6{background-color: #afabab;}
  .tbdh{margin-top:20px;border-top: 2px solid gray;border-bottom: 2px solid gray; border-spacing: 0px;}
  #td6{ text-align: right;} #btnxn{border-radius:5px;padding:0 10px;background-color:green;color:white;}
  .active {color: #fff;background-color: #007bff;border-color:#007bff}
  .active a{color: #fff;}
  .pagination ul{display: flex;padding-left: 0;list-style: none;border-radius: 0.25rem;}
  .pagination ul li{padding-left:8px;padding-right:8px;padding-top:4px;padding-bottom:4px;display: list-item;text-align: -webkit-match-parent;border-radius: 0.25rem;}
  .pagination ul li a{text-decoration: none;}
  .pagination ul li:hover {
    color: #0056b3;text-decoration: none;background-color: #e9ecef;border-color: #dee2e6;}
  #btngh{border-radius:5px;padding:0 9px;background-color:#FFD700;color:white;}#btntc{border-radius:5px;padding:0 12px;}#btndel{border-radius:5px;padding:0 10px;}
  #myInput {
   font-size: 15px; 
   padding-bottom: 12px ;padding-top: 8px ;padding-left:20px;padding-right:20px;
   border: 1px solid #ddd;
   margin-top: 12px;
   border-radius:5px;
}
  .onRow{
      cursor: pointer;
    }
</style>
<div id="content-wrapper">
      <div class="mui--appbar-height"></div>
      <div class="mui-container-fluid">
        <br> 
        <div class="mui-row">
            <h2>Quản lý đơn hàng bán</h2>
          <div class="mui-col-sm-12  mui-col-lg-10 mui-col-lg-offset-1">
            <ul class="mui-tabs__bar">
              <li class="mui--is-active"><a data-mui-toggle="tab" data-mui-controls="pane-api-1">Tất cả</a></li>
              <li><a data-mui-toggle="tab" data-mui-controls="pane-api-2">Đang chờ</a></li>
              <li><a data-mui-toggle="tab" data-mui-controls="pane-api-3">Đã xác nhận</a></li>
              <li><a data-mui-toggle="tab" data-mui-controls="pane-api-4">Đang giao</a></li>
              <li><a data-mui-toggle="tab" data-mui-controls="pane-api-5">Đã giao</a></li>
              <li><a data-mui-toggle="tab" data-mui-controls="pane-api-6">Đã hủy</a></li>
            </ul>
            <div class="mui-tabs__pane mui--is-active" id="pane-api-1">
              <div class="mui-row">
                <div class="mui-col-sm-4">
                  <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names..">
                </div>
                <div class="mui-col-sm-8">
                  <form class="mui-form--inline" action="" method="POST">
                      <div class="mui-textfield">
                          <?php if(isset($data["bd"])){ ?>
                              <input type="date" name="bdngay" id="bdngay" value="<?php echo $data["bd"]; ?>">
                          <?php } else { ?>
                              <input type="date" name="bdngay" id="bdngay">
                          <?php } ?>
                          <label>Từ ngày</label>
                      </div>
                      <div class="mui-textfield">
                          <?php if(isset($data["kt"])){ ?>
                              <input type="date" name="endngay" id="endngay" value="<?php echo $data["kt"]; ?>">
                          <?php } else { ?>
                              <input type="date" name="endngay" id="endngay">
                          <?php } ?>
                          <label>Đến ngày</label>
                      </div>
                      <button class="mui-btn mui-btn--small mui-btn--primary" name="btnLoc" type="submit">Lọc</button>
                  </form>
                </div>
              </div>
              <table class="mui-table tbdh" id="tbdh1">
              <thead>
                  <tr>
                    <th>STT</th>
                    <th id="td1">Mã đơn</th>
                    <th id="td1">Ngày đặt</th>
                    <th id="td1">Người mua</th>
                    <th id="td1">Trạng thái</th>
                    <th id="td6">Tổng tiền</th>
                    <th id="td6" style="padding-right:30px;">Xử lý</th>
                  </tr>
                </thead>
                <tbody id="myTable">
                <?php 
                $stt=0;
                $row= json_decode($data["DSAll"],true);
				        foreach ($row as list("id"=>$id,"ngay"=>$ngay,"fullname"=>$name,"tongtien"=>$tongtien,"tinhtrang"=>$tinhtrang,"member_id"=>$idmem)){
                    $stt++;
                ?>
                  <tr id="trhorver" class="onRow">
                    <td><span><?php echo $stt; ?></td>
                    <td id="td1"><span><?php echo $id; ?></span></td>
                    <td id="td1"><span><?php echo $ngay; ?></span></td>
                    <td id="td1"><span><?php echo $name; ?></span></td>
                    <td id="td1"><span><?php echo $tinhtrang; ?></span></td>
                    <td id="td6"><span><?php echo number_format($tongtien); ?>đ</span></td>
                    <td id="td6">
                      <?php if($tinhtrang=="Xử lý"){ ?>
                      <a href="admin.php?url=Order/Xulydonhang/<?php echo $idmem; ?>/<?php echo $id; ?>" class="mui-btn mui-btn--raised mui-btn mui-btn--small" id="btnxn" title="Xác nhận"><i class="fas fa-check"></i></a>
                      <a href="admin.php?url=Order/Huydonhang/<?php echo $idmem; ?>/<?php echo $id; ?>" class="mui-btn mui-btn--raised mui-btn--danger mui-btn mui-btn--small" id="btndel" title="Hủy"><i class="fas fa-times-circle"></i></a>
                     <?php } else if($tinhtrang=="Đã xác nhận"){ ?>
                      <a href="admin.php?url=Order/DangGiaodonhang/<?php echo $idmem; ?>/<?php echo $id; ?>" class="mui-btn mui-btn--raised mui-btn mui-btn--small" id="btngh" title="Giao hàng"><i class="fas fa-truck"></i></a>
                      <a href="admin.php?url=Order/Huydonhang/<?php echo $idmem; ?>/<?php echo $id; ?>" class="mui-btn mui-btn--raised mui-btn--danger mui-btn mui-btn--small" id="btndel" title="Hủy"><i class="fas fa-times-circle"></i></a>
                    <?php  } else if($tinhtrang=="Đang giao"){ ?>
                      <a href="admin.php?url=Order/DaGiaodonhang/<?php echo $idmem; ?>/<?php echo $id; ?>" class="mui-btn mui-btn--raised mui-btn--accent mui-btn mui-btn--small" id="btntc" title="Giao thành công"><i class="fas fa-clipboard-check"></i></a>
                      <a href="admin.php?url=Order/Huydonhang/<?php echo $idmem; ?>/<?php echo $id; ?>" class="mui-btn mui-btn--raised mui-btn--danger mui-btn mui-btn--small" id="btndel" title="Hủy"><i class="fas fa-times-circle"></i></a>
                    <?php  } ?>
                      
                    </td>
                  </tr>
                <?php } ?>
                </tbody>
              </table>
              <div class="pagination">
                  <ul id="myPager"></ul>
              </div> 
            </div>
            <div class="mui-tabs__pane" id="pane-api-2">
              <table class="mui-table tbdh">
                <thead>
                  <tr>
                    <th>STT</th>
                    <th id="td1">Mã đơn</th>
                    <th id="td1">Ngày đặt</th>
                    <th id="td1">Người mua</th>
                    <th id="td6">Tổng tiền</th>
                    <th id="td6"style="padding-right:30px;">Xử lý</th>
                  </tr>
                </thead>
                <tbody id="myTable">
                <?php 
                $stt=0;
                $row= json_decode($data["DSDHXL"],true);
				        foreach ($row as list("id"=>$id,"ngay"=>$ngay,"fullname"=>$name,"tongtien"=>$tongtien,"member_id"=>$idmem)){
                    $stt++;
                ?>
                  <tr id="trhorver" class="onRow">
                    <td><span><?php echo $stt; ?></td>
                    <td id="td1"><span><?php echo $id; ?></span></td>
                    <td id="td1"><span><?php echo $ngay; ?></span></td>
                    <td id="td1"><span><?php echo $name; ?></span></td>
                    <td id="td6"><span><?php echo number_format($tongtien); ?>đ</span></td>
                    <td id="td6">
                      <a href="admin.php?url=Order/Xulydonhang/<?php echo $idmem; ?>/<?php echo $id; ?>" class="mui-btn mui-btn--raised mui-btn mui-btn--small" id="btnxn" title="Xác nhận"><i class="fas fa-check"></i></a>
                      <a href="admin.php?url=Order/Huydonhang/<?php echo $idmem; ?>/<?php echo $id; ?>" class="mui-btn mui-btn--raised mui-btn--danger mui-btn mui-btn--small" id="btndel" title="Hủy"><i class="fas fa-times-circle"></i></a>
                    </td>
                  </tr>
                <?php } ?>
                </tbody>
              </table>
            </div>
            <div class="mui-tabs__pane" id="pane-api-3">
              <table class="mui-table tbdh">
                <thead>
                  <tr>
                    <th>STT</th>
                    <th id="td1">Mã đơn</th>
                    <th id="td1">Ngày đặt</th>
                    <th id="td1">Người mua</th>
                    <th id="td6">Tổng tiền</th>
                    <th id="td6"style="padding-right:30px;">Xử lý</th>
                  </tr>
                </thead>
                <tbody id="myTable">
                <?php 
                $stt=0;
                $row= json_decode($data["DSDHXN"],true);
				        foreach ($row as list("id"=>$id,"ngay"=>$ngay,"fullname"=>$name,"tongtien"=>$tongtien,"member_id"=>$idmem)){
                    $stt++;
                ?>
                  <tr id="trhorver" class="onRow">
                    <td><span><?php echo $stt; ?></td>
                    <td id="td1"><span><?php echo $id; ?></span></td>
                    <td id="td1"><span><?php echo $ngay; ?></span></td>
                    <td id="td1"><span><?php echo $name; ?></span></td>
                    <td id="td6"><span><?php echo number_format($tongtien); ?>đ</span></td>
                    <td id="td6">
                      <a href="admin.php?url=Order/DangGiaodonhang/<?php echo $idmem; ?>/<?php echo $id; ?>" class="mui-btn mui-btn--raised mui-btn mui-btn--small" id="btngh" title="Giao hàng"><i class="fas fa-truck"></i></a>
                      <a href="admin.php?url=Order/Huydonhang/<?php echo $idmem; ?>/<?php echo $id; ?>" class="mui-btn mui-btn--raised mui-btn--danger mui-btn mui-btn--small" id="btndel" title="Hủy"><i class="fas fa-times-circle"></i></a>
                    </td>
                  </tr>
                <?php } ?>
                </tbody>
              </table>
            </div>
            <div class="mui-tabs__pane" id="pane-api-4">
              <table class="mui-table tbdh">
                <thead>
                  <tr>
                    <th>STT</th>
                    <th id="td1">Mã đơn</th>
                    <th id="td1">Ngày đặt</th>
                    <th id="td1">Người mua</th>
                    <th id="td6">Tổng tiền</th>
                    <th id="td6"style="padding-right:30px;">Xử lý</th>
                  </tr>
                </thead>
                <tbody id="myTable">
                <?php 
                $stt=0;
                $row= json_decode($data["DSDHDG"],true);
				        foreach ($row as list("id"=>$id,"ngay"=>$ngay,"fullname"=>$name,"tongtien"=>$tongtien,"member_id"=>$idmem)){
                    $stt++;
                ?>
                  <tr id="trhorver" class="onRow">
                    <td><span><?php echo $stt; ?></td>
                    <td id="td1"><span><?php echo $id; ?></span></td>
                    <td id="td1"><span><?php echo $ngay; ?></span></td>
                    <td id="td1"><span><?php echo $name; ?></span></td>
                    <td id="td6"><span><?php echo number_format($tongtien); ?>đ</span></td>
                    <td id="td6">
                      <a href="admin.php?url=Order/DaGiaodonhang/<?php echo $idmem; ?>/<?php echo $id; ?>" class="mui-btn mui-btn--raised mui-btn--accent mui-btn mui-btn--small" id="btntc" title="Giao thành công"><i class="fas fa-clipboard-check"></i></a>
                      <a href="admin.php?url=Order/Huydonhang/<?php echo $idmem; ?>/<?php echo $id; ?>" class="mui-btn mui-btn--raised mui-btn--danger mui-btn mui-btn--small" id="btndel" title="Hủy"><i class="fas fa-times-circle"></i></a>
                    </td>
                  </tr>
                <?php } ?>
                </tbody>
              </table>
            </div>
            <div class="mui-tabs__pane" id="pane-api-5">
              <table class="mui-table tbdh">
                <thead>
                  <tr>
                    <th>STT</th>
                    <th id="td1">Mã đơn</th>
                    <th id="td1">Ngày đặt</th>
                    <th id="td1">Người mua</th>
                    <th id="td6">Tổng tiền</th>
                    
                  </tr>
                </thead>
                <tbody id="myTable">
                <?php 
                $stt=0;
                $row= json_decode($data["DSDHTT"],true);
				        foreach ($row as list("id"=>$id,"ngay"=>$ngay,"fullname"=>$name,"tongtien"=>$tongtien,"member_id"=>$idmem)){
                    $stt++;
                ?>
                  <tr id="trhorver" class="onRow">
                    <td><span><?php echo $stt; ?></td>
                    <td id="td1" class="customerIDCell"><span><?php echo $id; ?></span></td>
                    <td id="td1"><span><?php echo $ngay; ?></span></td>
                    <td id="td1"><span><?php echo $name; ?></span></td>
                    <td id="td6"><span><?php echo number_format($tongtien); ?>đ</span></td>
                  </tr>
                <?php } ?>
                </tbody>
              </table>
            </div>
            <div class="mui-tabs__pane" id="pane-api-6">
              <table class="mui-table tbdh">
                <thead>
                  <tr>
                    <th>STT</th>
                    <th id="td1">Mã đơn</th>
                    <th id="td1">Ngày đặt</th>
                    <th id="td1">Người mua</th>
                    <th id="td6">Tổng tiền</th>
                    
                  </tr>
                </thead>
                <tbody id="myTable">
                <?php 
                $stt=0;
                $row= json_decode($data["DSDHHUY"],true);
				        foreach ($row as list("id"=>$id,"ngay"=>$ngay,"fullname"=>$name,"tongtien"=>$tongtien,"member_id"=>$idmem)){
                    $stt++;
                ?>
                  <tr id="trhorver" class="onRow">
                    <td><span><?php echo $stt; ?></td>
                    <td id="td1" class="customerIDCell"><span><?php echo $id; ?></span></td>
                    <td id="td1"><span><?php echo $ngay; ?></span></td>
                    <td id="td1"><span><?php echo $name; ?></span></td>
                    <td id="td6"><span><?php echo number_format($tongtien); ?>đ</span></td>
                  </tr>
                <?php } ?>
                </tbody>
              </table>
            </div>
            <button class="mui-btn mui-btn--primary" onclick="activateNext();">Next</button>
            <script>
              var paneIds = ['pane-api-1', 'pane-api-2', 'pane-api-3', 'pane-api-4', 'pane-api-5','pane-api-6'],
                  currPos = 0;

              function activateNext() {
                // increment id
                currPos = (currPos + 1) % paneIds.length;

                // activate tab
                mui.tabs.activate(paneIds[currPos]);
              }
            </script>
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
      $(function () {
          $('#myTable tr').dblclick(function (e) {
              var idsp = $(this).closest('.onRow').find('td:nth-child(2)').text();
                  window.location="./admin.php?url=Order/DetailExport/"+idsp;
          });
      });
      $('#myTable').pageMe({pagerSelector:'#myPager',showPrevNext:true,hidePageNumbers:false,perPage:6});
      </script>
</div>
