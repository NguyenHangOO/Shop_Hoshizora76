<style>
  #ac4{background-color: #afabab;}#ac4 a{color:white;}
  .h4{background-color: #afabab;}
</style>
<div id="content-wrapper">
      <div class="mui--appbar-height"></div>
      <div class="mui-container-fluid">
        <br> 
        <div class="mui-row">
            <h2>Quản lý danh mục ngày lễ</h2>
          <div class="mui-col-sm-12  mui-col-lg-5 mui-col-lg-offset-1">
          <?php if(isset($data["relust"]) && isset($data["tb"]) ){ if ($data["relust"]=="yes"){ ?>
            <div class="tbloi success" id="tbloi">
                <i class="far fa-check-circle"></i> <span ><?php echo $data["tb"] ?></span>
                <a class="close" onclick="var hidden = document.getElementById('tbloi');hidden.style.display = 'none';"><i class="fas fa-times"></i></a>
            </div>
            <?php  } else{ ?>
            <div class="tbloi" id="tbloi">
                <i class="fas fa-exclamation-circle"></i> <span ><?php echo $data["tb"] ?></span>
                <a class="close" onclick="var hidden = document.getElementById('tbloi');hidden.style.display = 'none';"><i class="fas fa-times"></i></a>
            </div>  
            <?php } } ?>
          <?php  
              if(isset($data["idsua"])){}else{ ?>
              <a id="buttonthem" class="mui-btn mui-btn--raised mui-btn--primary"><i class="fas fa-plus"></i> &nbsp;Thêm mới</a>
            <?php  } ?>
            <table class="mui-table" id="tbdh">
            <thead>
                <tr>
                  <th>STT</th>
                  <th>Tên danh mục</th>
                  <th id="td1">Icon</th>
                  <th id="td5">Thao tác</th>
                </tr>
              </thead>
              <tbody>
              <?php 
                $stt=0;
                $row= json_decode($data["DM3"],true);
				        foreach ($row as list("id"=>$id,"tenloai"=>$tenloai,"icon"=>$icon)){
                    $stt++;
                ?>
                <tr id="trhorver">
                  <td><span><?php echo $stt; ?></span></td>
                  <td ><span><?php echo $tenloai; ?></span></td>
                  <td id="td1"><span><i class="<?php echo $icon; ?>"></i></span></td>
                  <td id="td5">
                       <a href="admin.php?url=Category/editGiftSet/<?php echo $id; ?>" title="Sửa"><i class="fas fa-edit"></i></a> | <a href="admin.php?url=Category/DelGiftSet/<?php echo $id; ?>" title="Xóa" style="color:red"onclick="return confirm('Bạn có chắc xóa không?')"><i class="fas fa-trash"></i></a>
                  </td>
                </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
          <div class="mui-col-sm-12  mui-col-lg-5 mui-col-lg-offset-1">
            <div id="formthem">
              <form class="mui-form--inline" action="admin.php?url=Category/AddGiftSet/" method="POST">
                  <div class="mui-textfield mui-textfield--float-label">
                      <input type="text" name="tendmhand" required>
                      <label>Nhập tên danh mục</label>
                  </div>
                  <div class="mui-select">
                    <select name="icon">
                      <option value="">Chọn</option>
                      <option value="fas fa-fire-alt" >🔥</option>
                      <option value="fas fa-cannabis">🍁</option>
                      <option value="fas fa-bread-slice">🍞</option>
                    </select>
                    <label>icon</label>
                  </div>
                  <button type="submit" name="btnAddHand" class="mui-btn mui-btn--raised mui-btn--primary">Cập nhật</button>
              </form>
            </div>
            <?php  
              if(isset($data["idsua"])){
                $row= json_decode($data["DM3"],true);
				        foreach ($row as list("id"=>$id,"tenloai"=>$tenloai,"icon"=>$icon)){
                  if($id==$data["idsua"]){ ?>
                      <form class="mui-form--inline" action="admin.php?url=Category/editGiftSet/<?php echo $id ;?>" method="POST">
                        <div class="mui-textfield mui-textfield--float-label">
                            <input type="text" name="tendmhand" required value="<?php echo $tenloai; ?>">
                        </div>
                        <div class="mui-select">
                          <select name="icon">
                            <option value="<?php echo $icon; ?>">ow</option>
                            <option value="fas fa-fire-alt">🔥</option>
                            <option value="fas fa-cannabis">🍁</option>
                            <option value="fas fa-bread-slice">🍞</option>
                          </select>
                          <label>icon</label>
                        </div>
                        <button type="submit" name="btnEditGift" class="mui-btn mui-btn--raised mui-btn--primary">Cập nhật</button>
                    </form>
                <?php  }  } } ?>
          </div>
        </div>
      </div>
      <script>
        $(document).ready(function(){
          //mặc định ẩn form
          $("#formthem").hide();
          //hiển thị form khi nhấn nút thêm mới
          $("#buttonthem").click(function(){
            $("#formthem").toggle(500);
            $("#buttonthem").toggle(500);
          });
        });
      </script>
</div>