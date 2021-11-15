<style>
  #ac6{background-color: #afabab;} #ac6 a{color:white;}
  #tbdh{border-radius: 3px;margin-top:20px;}
  #td6{ text-align: right;} #btnxn{border-radius:5px;padding:0 10px;background-color:green;color:white;}
  #btngh{border-radius:5px;padding:0 9px;background-color:#FFD700;color:white;}#btntc{border-radius:5px;padding:0 12px;}#btndel{border-radius:5px;padding:0 10px;}
  #myInput {
   font-size: 15px; 
   padding-bottom: 12px ;padding-top: 8px ;padding-left:20px;padding-right:20px;
   border: 1px solid #ddd;
   margin-top: 12px;
   border-radius:5px;
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
            </ul>
            <div class="mui-tabs__pane mui--is-active" id="pane-api-1">
              <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names..">
              <table class="mui-table" id="tbdh">
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
				        foreach ($row as list("id"=>$id,"ngay"=>$ngay,"fullname"=>$name,"tongtien"=>$tongtien,"tinhtrang"=>$tinhtrang)){
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
                      <a href="" class="mui-btn mui-btn--raised mui-btn mui-btn--small" id="btnxn" title="Xác nhận"><i class="fas fa-check"></i></a>
                      <a href="" class="mui-btn mui-btn--raised mui-btn--danger mui-btn mui-btn--small" id="btndel" title="Hủy"><i class="fas fa-times-circle"></i></a>
                     <?php } else if($tinhtrang=="Đã xác nhận"){ ?>
                      <a href="" class="mui-btn mui-btn--raised mui-btn mui-btn--small" id="btngh" title="Giao hàng"><i class="fas fa-truck"></i></a>
                      <a href="" class="mui-btn mui-btn--raised mui-btn--danger mui-btn mui-btn--small" id="btndel" title="Hủy"><i class="fas fa-times-circle"></i></a>
                    <?php  } else if($tinhtrang=="Đang giao"){ ?>
                      <a href="" class="mui-btn mui-btn--raised mui-btn--accent mui-btn mui-btn--small" id="btntc" title="Giao thành công"><i class="fas fa-clipboard-check"></i></a>
                      <a href="" class="mui-btn mui-btn--raised mui-btn--danger mui-btn mui-btn--small" id="btndel" title="Hủy"><i class="fas fa-times-circle"></i></a>
                    <?php  } ?>
                      
                    </td>
                  </tr>
                <?php } ?>
                </tbody>
              </table>
            </div>
            <div class="mui-tabs__pane" id="pane-api-2">
              <table class="mui-table" id="tbdh">
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
				        foreach ($row as list("id"=>$id,"ngay"=>$ngay,"fullname"=>$name,"tongtien"=>$tongtien)){
                    $stt++;
                ?>
                  <tr id="trhorver" class="onRow">
                    <td><span><?php echo $stt; ?></td>
                    <td id="td1"><span><?php echo $id; ?></span></td>
                    <td id="td1"><span><?php echo $ngay; ?></span></td>
                    <td id="td1"><span><?php echo $name; ?></span></td>
                    <td id="td6"><span><?php echo number_format($tongtien); ?>đ</span></td>
                    <td id="td6">
                      <a href="" class="mui-btn mui-btn--raised mui-btn mui-btn--small" id="btnxn" title="Xác nhận"><i class="fas fa-check"></i></a>
                      <a href="" class="mui-btn mui-btn--raised mui-btn--danger mui-btn mui-btn--small" id="btndel" title="Hủy"><i class="fas fa-times-circle"></i></a>
                    </td>
                  </tr>
                <?php } ?>
                </tbody>
              </table>
            </div>
            <div class="mui-tabs__pane" id="pane-api-3">
              <table class="mui-table" id="tbdh">
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
				        foreach ($row as list("id"=>$id,"ngay"=>$ngay,"fullname"=>$name,"tongtien"=>$tongtien)){
                    $stt++;
                ?>
                  <tr id="trhorver" class="onRow">
                    <td><span><?php echo $stt; ?></td>
                    <td id="td1"><span><?php echo $id; ?></span></td>
                    <td id="td1"><span><?php echo $ngay; ?></span></td>
                    <td id="td1"><span><?php echo $name; ?></span></td>
                    <td id="td6"><span><?php echo number_format($tongtien); ?>đ</span></td>
                    <td id="td6">
                      <a href="" class="mui-btn mui-btn--raised mui-btn mui-btn--small" id="btngh" title="Giao hàng"><i class="fas fa-truck"></i></a>
                      <a href="" class="mui-btn mui-btn--raised mui-btn--danger mui-btn mui-btn--small" id="btndel" title="Hủy"><i class="fas fa-times-circle"></i></a>
                    </td>
                  </tr>
                <?php } ?>
                </tbody>
              </table>
            </div>
            <div class="mui-tabs__pane" id="pane-api-4">
              <table class="mui-table" id="tbdh">
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
				        foreach ($row as list("id"=>$id,"ngay"=>$ngay,"fullname"=>$name,"tongtien"=>$tongtien)){
                    $stt++;
                ?>
                  <tr id="trhorver" class="onRow">
                    <td><span><?php echo $stt; ?></td>
                    <td id="td1"><span><?php echo $id; ?></span></td>
                    <td id="td1"><span><?php echo $ngay; ?></span></td>
                    <td id="td1"><span><?php echo $name; ?></span></td>
                    <td id="td6"><span><?php echo number_format($tongtien); ?>đ</span></td>
                    <td id="td6">
                      <a href="" class="mui-btn mui-btn--raised mui-btn--accent mui-btn mui-btn--small" id="btntc" title="Giao thành công"><i class="fas fa-clipboard-check"></i></a>
                      <a href="" class="mui-btn mui-btn--raised mui-btn--danger mui-btn mui-btn--small" id="btndel" title="Hủy"><i class="fas fa-times-circle"></i></a>
                    </td>
                  </tr>
                <?php } ?>
                </tbody>
              </table>
            </div>
            <div class="mui-tabs__pane" id="pane-api-5">
              <table class="mui-table" id="tbdh">
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
				        foreach ($row as list("id"=>$id,"ngay"=>$ngay,"fullname"=>$name,"tongtien"=>$tongtien)){
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
              var paneIds = ['pane-api-1', 'pane-api-2', 'pane-api-3', 'pane-api-4', 'pane-api-5'],
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
                  window.location="./admin.php?url=Order/dailExport/"+idsp;
          });
      });
      </script>
</div>