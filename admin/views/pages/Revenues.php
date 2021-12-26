<style>
     #ac2{background-color: #afabab;}#ac2 a{color:white;}
    .select{padding:5px 7px;}
    #thead{background-color:red;color:white;border-color:red;}#td6{text-align:right;}
    #table{border-bottom: 2px solid gray; border-spacing: 0px;}
    #myfirstchart{padding-left:30px;padding-right:30px;}.thongkeds{text-align:center;font-size:20px;}
</style>
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
<div id="content-wrapper">
      <div class="mui--appbar-height"></div>
      <div class="mui-container-fluid">
          <br>
            <div class="mui-row">
                <p class="thongkeds">Thống kê bán hàng</p>
                <div class="mui-col-sm-10 mui-col-xs-offset-1">
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
                        <!-- <div class="mui-select">
                            <select >
                            <option>--Chọn--</option>
                            <option>Tuần</option>
                            <option>Tháng</option>
                            </select>
                            <label>Lọc theo</label>
                        </div>  -->
                        <button class="mui-btn mui-btn--small mui-btn--primary" name="btnLoc" type="submit">Lọc</button>
                    </form>
                </div>
                <div class="mui-row">
                    <div class="mui-col-sm-10 mui-col-xs-offset-1" id="chart" style="height: 250px;"></div>
                </div>
            </div>
            <div class="mui-row"style="height: 20px;"></div>
            <!--Bảng-->
            <div class="mui-row" style="display:none;">
                <div class="mui-col-md-10 mui-col-md-offset-1">
                    <table class="mui-table" id="table">
                        <thead>
                            <tr id="thead">
                                <th>STT</th>
                                <th id="td1">Ngày</th>
                                <th id="td1">Đơn hàng</th>
                                <th id="td1">Số lượng bán</th>
                                <th id="td6">Doanh thu</th>
                            </tr>
                        </thead>
                        <tbody id="myTable">
                        <?php 
                            $stt=0;
                            $row= json_decode($data["thongke"],true);
                                    foreach ($row as list("donhang"=>$donhang,"ngay"=>$ngay,"doanhthu"=>$doanhthu,"slg"=>$soluongban)){
                                $stt++;
                            ?>
                            <tr id="trhorver">
                                <td><span><?php echo $stt; ?></span></td>
                                <td id="td1"><span><?php echo $ngay; ?></span></td>
                                <td id="td1"><span><?php echo $donhang; ?></span></td>
                                <td id="td1"><span><?php echo $soluongban; ?></span></td>
                                <td id="td6"><span><?php echo number_format($doanhthu); ?></span></td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <!--Bảng-->
            <div class="mui-row"style="height: 30px;"></div>
            <div class="mui-row">
                <p class="thongkeds">Thống kê sản phẩm bán</p>
                <div class="mui-col-sm-10 mui-col-xs-offset-1">
                    <div id="chartsp" style="height: 250px;"></div>
                </div>
            </div>
      </div> 
</div>
<script>
    $(document).ready(function(){
        new Morris.Area({
        element: 'chart',
        data: [
            <?php  $row= json_decode($data["thongke"],true);
                foreach ($row as list("donhang"=>$donhang,"ngay"=>$ngay,"doanhthu"=>$doanhthu,"slg"=>$soluongban)){ ?>
                    { ngay: '<?php echo $ngay; ?>',donhang:'<?php echo $donhang; ?>',doanhthu:'<?php echo $doanhthu; ?>',soluongban:'<?php echo $soluongban; ?>' },
               <?php } ?>
        ],
        xkey: 'ngay',
        ykeys: ['donhang','doanhthu','soluongban'],
        labels: ['Đơn hàng','Doanh thu','Số lượng bán ra']
        });
        new Morris.Bar({
        element: 'chartsp',
        data: [
            <?php $rowsp= json_decode($data["DSSP"],true);
                foreach($rowsp as list("tensp"=>$tensp,"luotmua"=>$luotmua,"luotxem"=>$luotxem)){ ?>
                        { tensp: '<?php echo $tensp; ?>', luotmua:'<?php echo $luotmua; ?>',luotxem:'<?php echo $luotxem; ?>' },
            <?php  } ?>
        ],
        xkey: 'tensp',
        ykeys: ['luotmua','luotxem'],
        labels: ['Đã bán','Lượt xem']
        });
    });
</script>