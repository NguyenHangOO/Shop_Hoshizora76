<style>
  #ac5{background-color: #afabab;}#ac5 a{color:white;}
  #tbdh{border-radius: 3px;}#img-u{width: 40px;height:40px;}
  #td6{ text-align: right;}
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
            <h2>Quản lý sản phẩm</h2>
          <div class="mui-col-sm-12  mui-col-lg-10 mui-col-lg-offset-1">
            <a class="mui-btn mui-btn--raised mui-btn--primary" ><i class="fas fa-plus"></i> &nbsp;Thêm mới</a><br>
            <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names..">
            <table class="mui-table" id="tbdh">
            <thead>
                <tr>
                  <th>STT</th>
                  <th >Tên sản phẩm</th>
                  <th id="td1">Hình ảnh</th>
                  <th id="td1">Số lượng tồn</th>
                  <th id="td6">Giá gốc</th>
                  <th id="td6">Giá bán</th>
                  <th id="td6">Thao tác</th>
                </tr>
              </thead>
              <tbody id="myTable">
              <?php 
                $stt=0;
                $row= json_decode($data["DSSP"],true);
				        foreach ($row as list("id"=>$id,"tensp"=>$tensp,"hinhanh"=>$img,"soluong"=>$soluong,"giaban"=>$giaban,"giagoc"=>$giagoc)){
                    $stt++;
                ?>
                <tr id="trhorver" class="onRow">
                  <td><span><?php echo $stt; ?></span></td>
                  <td style="display:none"><span><?php echo $id; ?></span></td>
                  <td ><span><?php echo $tensp;?></span></td>
                  <td id="td1"><img src="<?php echo $img;?>" alt="" id="img-u"></td>
                  <td id="td1"><span><?php echo $soluong;?></span></td>
                  <td id="td6"><span><?php echo number_format($giagoc);?>đ</span></td>
                  <td id="td6"><span><?php echo number_format($giaban);?>đ</span></td>
                  <td id="td6">
                    <a href="" title="Sửa"><i class="fas fa-edit"></i></a> | <a href="" title="Ngừng kinh doanh" style="color:red"><i class="fas fa-ban"></i></a>
                  </td>
                </tr>
                <?php } ?>
              </tbody>
            </table>
              <!--$timestamp = time();
              echo(rand(0,99).$timestamp.rand(1,999));-->
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
              var tensp = $(this).closest('.onRow').find('td:nth-child(3)').text();
                window.location="./admin.php?url=Order/dailProduct/"+idsp;
          });
      });
      </script>
</div>