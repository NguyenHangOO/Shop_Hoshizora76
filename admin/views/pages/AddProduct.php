<style>
  #bb{color:red;}.anh{width: 110px;height: 100px;margin-right:15px;}
  .btn-reset{background-color:green;color:white;padding:2px;cursor: pointer;}
</style>
<div id="content-wrapper">
      <div class="mui--appbar-height"></div>
      <div class="mui-container-fluid">
        <br> 
        <div class="row">
            <div class="mui-col-md-8 mui-col-md-offset-2" style="border:2px solid gray; border-radius:5px;">
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
                    <div class="mui-textfield">
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
                    <div>
                        <img id="image" style="width:120px;height:125px;">
                    </div>
                         Chọn ảnh chính: <span id="bb">*</span>: <input type="file" name="uploadFile" id="upload"><br><br>       
                    <div class="box-preview-img"></div> <br>
                    Chọn list ảnh phụ: <input type="file" name="img_file[]" multiple="true" onchange="previewImg(event);" id="img_file" accept="image/*">
                    <button type="reset" class="btn-reset">Làm mới</button>
                    <br>
                    <button type="submit" name="btnAddsp" class="mui-btn mui-btn--raised mui-btn--primary">Thêm mới</button>
                </form>
            </div>
        </div>
      </div>
</div>
<script>
    ClassicEditor
        .create( document.querySelector( '#mota' ) )
        .catch( error => {
            console.error( error );
        } );
    document.getElementById("upload").onchange = function () {
        var reader = new FileReader();
        
        reader.onload = function (e) {
            // get loaded data and render thumbnail.
            document.getElementById("image").src = e.target.result;
        };

        // read the image file as a data URL.
        reader.readAsDataURL(this.files[0]);
    };
  function previewImg(event) {
      var files = document.getElementById('img_file').files; 
      $('.box-preview-img').show();
      for (i = 0; i < files.length; i++)
      {
          $('.box-preview-img').append('<img class="anh" src="" id="' + i +'">');
          $('.box-preview-img img:eq('+i+')').attr('src', URL.createObjectURL(event.target.files[i]));
      }   
  }
    $('.btn-reset').on('click', function() {
      $('.box-preview-img').html('');
      $('.box-preview-img').hide();
      $('.output').hide();
      $('#image').attr('src', "");
  });
</script>