<style>
  #bb{color:red;}.anh{width: 110px;height: 100px;margin-right:15px;}
  .btn-reset{background-color:green;color:white;padding:2px;cursor: pointer;}
</style>
<div id="content-wrapper">
      <div class="mui--appbar-height"></div>
      <div class="mui-container-fluid">
        <br> 
        <div class="row">
            <div class="mui-col-md-8 mui-col-md-offset-2"style="border:2px solid gray; border-radius:5px;">
                <?php  
                    $row = json_decode($data["SPID"],true);
                    foreach($row as list("id"=>$id,"tensp"=>$tensp)){
                ?> 
                <form class="mui-form" action="admin.php?url=Product/EditProduct/<?php echo $id; ?>/<?php echo $tensp; ?>" enctype="multipart/form-data" method="POST">
                <?php } ?>
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
                    <legend>Cập nhật sản phẩm</legend>
                    <?php  
                        $row = json_decode($data["SPID"],true);
                        $row2 = json_decode($data["CTSPID"],true);
                        foreach($row as list("id"=>$id,"hinhanh"=>$hinhanh,"tensp"=>$tensp,"soluong"=>$slg,"giagoc"=>$giagoc,
                        "giaban"=>$giaban,"luotmua"=>$luotmua,"luotxem"=>$luotxem,"ttban"=>$trangthai,"mota"=>$mota,"tendm"=>$tendm,"iddm"=>$iddm)){
                    ?> 
                    <div class="mui-textfield mui-textfield--float-label">
                        <input type="text" name="tensp" value="<?php echo $tensp; ?>" required>
                        <label>Tên sản phẩm<label id="bb">*</label></label>
                    </div>
                    <div class="mui-select">
                      <select name="danhmuc">
                        <option value="<?php echo $iddm; ?>"><?php echo $tendm; ?></option>
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
                        <input type="text" name="giagoc" id="giagoc" value="<?php echo $giagoc; ?>" required>
                        <label>Giá gốc<label id="bb">*</label></label>
                        <div id="messageun" style="font-size:12px; text-align: left; margin-left:3px;"></div>
                    </div>
                    <div class="mui-textfield mui-textfield--float-label">
                        <input type="text" name="giaban" id="giaban" value="<?php echo $giaban; ?>" required>
                        <label>Giá bán<label id="bb">*</label></label>
                        <div id="messageem" style="font-size:12px; text-align: left; margin-left:3px;"></div>
                    </div>
                    <div class="mui-textfield mui-textfield--float-label">
                        <input type="text" name="soluong" id="soluong" value="<?php echo $slg; ?>" required>
                        <label>Số lượng<label id="bb">*</label></label>
                        <div id="messageem" style="font-size:12px; text-align: left; margin-left:3px;"></div>
                    </div>
                    <div class="mui-textfield ">
                        <textarea name="mota" id="mota" ><?php echo $mota; ?></textarea>
                        <label>Mô tả</label>
                        <div id="messageem" style="font-size:12px; text-align: left; margin-left:3px;"></div>
                    </div>
                    <div class="mui-select">
                      <select name="loai1">
                      <?php 
                        $rowm1= json_decode($data["DM1"],true);
                        $row3= json_decode($data["tenDM1"],true);
                        if(count($row3)==0){ ?>
                            <option value="">Chọn</option>
                            <?php 
                                foreach ($rowm1 as list("id"=>$id,"tenloai"=>$tenloai)){
                                ?>
                                <option value="<?php echo $id; ?>"><?php echo $tenloai; ?></option>
                            <?php } ?>
                       <?php  } else {
                            foreach ($row3 as list("id"=>$id,"tenloai"=>$tenloai)){
                            ?>
                            <?php foreach ($rowm1 as list("id"=>$idm1,"tenloai"=>$tenloaim1)){ 
                                if($id!=$idm3){ ?>
                                <option value="<?php echo $idm1; ?>"><?php echo $tenloaim1; ?></option>
                            <?php } } } }?>
                      </select>
                      <label style="text-align:left;">Loại handmade</label>
                    </div>
                    <div class="mui-select">
                      <select name="loai3">
                      <?php 
                        $rowm3= json_decode($data["DM3"],true);
                        $row4= json_decode($data["tenDM3"],true);
                        if(count($row4)==0){ ?>
                            <option value="">Chọn</option>
                            <?php 
                                foreach ($rowm3 as list("id"=>$id,"tenloai"=>$tenloai)){
                                ?>
                                <option value="<?php echo $id; ?>"><?php echo $tenloai; ?></option>
                            <?php } ?>
                       <?php  } else {
                            foreach ($row4 as list("id"=>$id,"tenloai"=>$tenloai)){
                            ?>
                                <option value="<?php echo $id; ?>">--<?php echo $tenloai; ?>--</option>
                            <?php foreach ($rowm3 as list("id"=>$idm3,"tenloai"=>$tenloaim3)){ 
                                if($id!=$idm3){ ?>
                                <option value="<?php echo $idm3; ?>"><?php echo $tenloaim3; ?></option>
                            <?php } } } }?>
                      </select>
                      <label style="text-align:left;">Loại GiftSet</label>
                    </div>
                    <?php } ?>
                    <?php  foreach($row2 as list("thuonghieu"=>$thuonghieu,"xuatxu"=>$xuatxu,
                    "chatlieu"=>$chatlieu,"kieudang"=>$kieudang,"baohanh"=>$baohanh)){ ?>
                    <div class="mui-textfield mui-textfield--float-label">
                        <input type="text" name="thuonghieu" value="<?php echo $thuonghieu; ?>">
                        <label>Thương hiệu</label>
                    </div>
                    <div class="mui-textfield mui-textfield--float-label">
                        <input type="text" name="xuatxu" value="<?php echo $xuatxu; ?>">
                        <label>Xuất xứ</label>
                    </div>
                    <div class="mui-textfield mui-textfield--float-label">
                        <input type="text" name="chatlieu" value="<?php echo $chatlieu; ?>" >
                        <label>Chất liệu</label>
                    </div>
                    <div class="mui-textfield mui-textfield--float-label">
                        <input type="text" name="kieudang" value="<?php echo $kieudang; ?>" >
                        <label>Kiểu dáng</label>
                    </div>
                    <div class="mui-textfield mui-textfield--float-label">
                        <input type="text" name="baohanh" value="<?php echo $baohanh; ?>" >
                        <label>Bảo hành</label>
                    </div>
                    <?php } ?>
                    <?php if(count($row2)==0){ ?>
                        <input type="text" name="addmoi" value="moi" style="display:none;">
                    <div class="mui-textfield mui-textfield--float-label">
                        <input type="text" name="thuonghieu">
                        <label>Thương hiệu</label>
                    </div>
                    <div class="mui-textfield mui-textfield--float-label">
                        <input type="text" name="xuatxu">
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
                    <?php } ?>
                        <?php  
                            $row = json_decode($data["SPID"],true);
                            foreach($row as list("hinhanh"=>$hinhanh)){
                            ?> 
                        <div>
                            <img src="<?php echo $hinhanh; ?>" alt="" style="width:120px;height:125px;" id="image">
                        </div>
                         <input type="text" name="anhtrc" value="<?php echo $hinhanh ?>" style="display:none;"><br> 
                         <?php } ?>
                         Chọn file ảnh: <input type="file" name="uploadFile" id="upload"><br> <br>
                        <div class="box-preview-img-an">
                            <?php  
                                $rowhh = json_decode($data["listanh"],true);
                                if(count($rowhh)>0){
                                foreach($rowhh as list("img"=>$hinhanh)){
                                ?> 
                            <img src="<?php echo $hinhanh ?>" alt="" class="anh">
                            <?php } } ?> 
                        </div>
                        <div class="box-preview-img"></div> <br>
                        Chọn list ảnh phụ: <input type="file" name="img_file[]" multiple="true" onchange="previewImg(event);" id="img_file" accept="image/*">
                        <button type="reset" class="btn-reset">Làm mới</button>
                        <br>
                    <button type="submit" name="btnEditsp" class="mui-btn mui-btn--raised mui-btn--primary">Cập nhật</button>
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
            document.getElementById("image").src = e.target.result;
        };

        reader.readAsDataURL(this.files[0]);
    };
    function previewImg(event) {
        var files = document.getElementById('img_file').files; 
        $('.box-preview-img-an').hide();
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
        $('.box-preview-img-an').show();
        <?php  
            $row = json_decode($data["SPID"],true);
            if(count($row)>0){
                foreach($row as list("hinhanh"=>$hinhanh)){ ?>
                    $('#image').attr('src', "<?php echo $hinhanh; ?>");
            <?php } } ?> 
    });
</script>