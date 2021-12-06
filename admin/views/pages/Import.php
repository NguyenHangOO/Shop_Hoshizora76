<style>
  #ac6{background-color: #afabab;} #ac6 a{color:white;}
  .h5{background-color: #afabab;}
  #tbdh{margin-top:20px;}
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
            <h2>Quản lý đơn hàng nhập kho</h2>
          <div class="mui-col-sm-12  mui-col-lg-10 mui-col-lg-offset-1">
          <a href="admin.php?url=Order/AddImport" class="mui-btn mui-btn--raised mui-btn--primary" ><i class="fas fa-plus"></i> &nbsp;Thêm mới</a><br>
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
              <table class="mui-table" id="tbdh">
              <thead>
                  <tr>
                    <th>STT</th>
                    <th id="td1">Mã đơn</th>
                    <th id="td1">Ngày nhập</th>
                    <th id="td1">Người nhập</th>
                    <th id="td1">Số lượng nhập</th>
                    <th id="td6">Tổng tiền</th>
                  </tr>
                </thead>
                <tbody id="myTableBody">
                <?php 
                    $row = json_decode($data["donhang"],true);
                    $stt=0;
                    foreach ($row as list("id"=>$iddh,"ngaynhap"=>$ngay,"tongtien"=>$tongtien,"fullname"=>$name,"soluongnhap"=>$soluongnhap)){ $stt++; ?>
                  <tr id="trhorver" class="onRow">
                    <td><span><?php echo $stt; ?></span></td>
                    <td id="td1"><span><?php echo $iddh; ?></span></td>
                    <td id="td1"><span><?php echo $ngay; ?></span></td>
                    <td id="td1"><span><?php echo $name; ?></span></td>
                    <td id="td1"><span><?php echo $soluongnhap; ?></span></td>
                    <td id="td6"><span><?php echo number_format($tongtien); ?>đ</span></td>
                  </tr>
                  <?php } ?>
                </tbody>
            </table>
            <div class="pagination">
                <ul id="myPager"></ul>
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
            $('#myTableBody tr').filter(function() {
              $(this).toggle($(this).text().toLowerCase().indexOf(tukhoa)>-1);
            });
        });
      });
      $(function () {
          $('#myTableBody tr').dblclick(function (e) {
              var iddh = $(this).closest('.onRow').find('td:nth-child(2)').text();
                  window.location="./admin.php?url=Order/DetailImport/"+iddh;
          });
      });
      $('#myTableBody').pageMe({pagerSelector:'#myPager',showPrevNext:true,hidePageNumbers:false,perPage:6});
      </script>
</div>