<style>
  #bb{color:red;}
</style>
<div id="content-wrapper">
      <div class="mui--appbar-height"></div>
      <div class="mui-container-fluid">
        <br> 
        <div class="row">
            <div class="mui-col-md-8 mui-col-md-offset-2">
                <form class="mui-form" action="admin.php?url=Product/AddProduct" enctype="multipart/form-data" method="POST">
                <?php if(isset($data["relust"]) && isset($data["tb"])){ if ($data["relust"]=="yes"){ ?>
                    <div class="tbloi success" id="tbloi">
                        <i class="far fa-check-circle"></i> <span ><?php echo $data["tb"]; ?></span>
                        <a class="close" onclick="var hidden = document.getElementById('tbloi');hidden.style.display = 'none';"><i class="fas fa-times"></i></a>
                    </div>
                    <?php  } else { ?>
                    <div class="tbloi" id="tbloi">
                        <i class="fas fa-exclamation-circle"></i> <span ><?php echo $data["tb"]; ?></span>
                        <a class="close" onclick="var hidden = document.getElementById('tbloi');hidden.style.display = 'none';"><i class="fas fa-times"></i></a>
                    </div>  
                    <?php } } ?>
                    <legend>Thêm sản phẩm</legend>
                    <div class="mui-textfield mui-textfield--float-label">
                        <input type="text" name="tensp" required>
                        <label>Tên sản phẩm<label id="bb">*</label></label>
                    </div>
                    <div class="mui-select">
                      <select name="danhmuc">
                        <option value="">Chọn danh mục</option>
                        <?php 
                        $row= json_decode($data["DM"],true);
                        foreach ($row as list("id"=>$id,"tendm"=>$tendm)){
                        ?>
                        <option value="<?php echo $id; ?>"><?php echo $tendm; ?></option>
                        <?php } ?>
                      </select>
                      <label style="text-align:left;">Danh mục<label id="bb">*</label></label>
                    </div>
                    <div class="mui-textfield mui-textfield--float-label">
                        <input type="text" name="giagoc" id="giagoc" required>
                        <label>Giá gốc<label id="bb">*</label></label>
                        <div id="messageun" style="font-size:12px; text-align: left; margin-left:3px;"></div>
                    </div>
                    <div class="mui-textfield mui-textfield--float-label">
                        <input type="text" name="giaban" id="giaban" required>
                        <label>Giá bán<label id="bb">*</label></label>
                        <div id="messageem" style="font-size:12px; text-align: left; margin-left:3px;"></div>
                    </div>
                    <div class="mui-textfield mui-textfield--float-label">
                        <input type="text" name="soluong" id="soluong" required>
                        <label>Số lượng<label id="bb">*</label></label>
                        <div id="messageem" style="font-size:12px; text-align: left; margin-left:3px;"></div>
                    </div>
                    <div class="mui-textfield mui-textfield--float-label">
                        <textarea name="mota" id="mota" ></textarea>
                        <label>Mô tả</label>
                        <div id="messageem" style="font-size:12px; text-align: left; margin-left:3px;"></div>
                    </div>
                    <div class="mui-select">
                      <select name="loai1">
                        <option value="">Chọn</option>
                      <?php 
                        $row= json_decode($data["DM1"],true);
                        foreach ($row as list("id"=>$id,"tenloai"=>$tenloai)){
                        ?>
                        <option value="<?php echo $id; ?>"><?php echo $tenloai; ?></option>
                        <?php } ?>
                      </select>
                      <label style="text-align:left;">Loại handmade</label>
                    </div>
                    <div class="mui-select">
                      <select name="loai3">
                        <option value="">Chọn</option>
                      <?php 
                        $row= json_decode($data["DM3"],true);
                        foreach ($row as list("id"=>$id,"tenloai"=>$tenloai)){
                        ?>
                        <option value="<?php echo $id; ?>"><?php echo $tenloai; ?></option>
                        <?php } ?>
                      </select>
                      <label style="text-align:left;">Loại GiftSet</label>
                    </div>
                    <div class="mui-textfield mui-textfield--float-label">
                        <input type="text" name="thuonghieu" >
                        <label>Thương hiệu</label>
                    </div>
                    <div class="mui-textfield mui-textfield--float-label">
                        <input type="text" name="xuatxu" >
                        <label>Xuất xứ</label>
                    </div>
                    <div class="mui-textfield mui-textfield--float-label">
                        <input type="text" name="chatlieu" >
                        <label>Chất liệu</label>
                    </div>
                    <div class="mui-textfield mui-textfield--float-label">
                        <input type="text" name="kieudang" >
                        <label>Kiểu dáng</label>
                    </div>
                    <div class="mui-textfield mui-textfield--float-label">
                        <input type="text" name="baohanh" >
                        <label>Bảo hành</label>
                    </div>
                         Chọn file ảnh<span id="bb">*</span>: <input type="file" name="uploadFile"><br>  
                    <button type="submit" name="btnAddsp" class="mui-btn mui-btn--raised mui-btn--primary">Thêm mới</button>
                </form>
            </div>
        </div>
      </div>
</div>