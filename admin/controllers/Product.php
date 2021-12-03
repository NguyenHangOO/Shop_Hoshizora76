<?php 
    class Product extends Controller{
        public $UserModel;
        public $ProductModel;
        public $OrderModel;
        public $CategoryModel;
        public function __construct(){
            $this->UserModel = $this->model("UserModel");
            $this->ProductModel = $this->model("ProductModel");
            $this->OrderModel = $this->model("OrderModel");
            $this->CategoryModel = $this->model("CategoryModel");
        }
        function Show(){
            if(isset($_SESSION['useradmin'])){
                $useradmin=$_SESSION['useradmin']; 
                $this->view("Main",[
                    "Page"=>"Product",
                    "banner"=>$this->UserModel->Banner(),
                    "giaodien"=>$this->UserModel->Giaodien(),
                    "Admin"=>$this->UserModel->GetAdmin($useradmin),
                    "DSDHXL"=>$this->OrderModel->GetDSDHXL(),
                    "DSSP"=>$this->ProductModel->GetDSSP()
                ]);
            }else{
                header("Location:/Register/Sigin");
            }
        }
        function dailProduct($id){
            if(isset($_SESSION['useradmin'])){
                $useradmin=$_SESSION['useradmin']; 
                $this->view("Main",[
                    "Page"=>"DetailProduct",
                    "banner"=>$this->UserModel->Banner(),
                    "giaodien"=>$this->UserModel->Giaodien(),
                    "Admin"=>$this->UserModel->GetAdmin($useradmin),
                    "DSDHXL"=>$this->OrderModel->GetDSDHXL(),
                    "DSSP"=>$this->ProductModel->GetDSSP(),
                    "SPID"=>$this->ProductModel->GetSPid($id),
                    "CTSPID"=>$this->ProductModel->GetCTSPid($id),
                    "DGSP"=>$this->ProductModel->GetDGSP($id),
                    "tenDM1"=>$this->CategoryModel->GetDM1id($id),
                    "tenDM3"=>$this->CategoryModel->GetDM3id($id),
                    "listanh"=>$this->ProductModel->ImagesSP($id)
                ]);
            }else{
                header("Location:/Register/Sigin");
            }
        }
        function Stop($id,$tensp){
            if(isset($_SESSION['useradmin'])){
                $useradmin=$_SESSION['useradmin']; 
                $stop = $this->ProductModel->StopSP($id);
                if($stop=='true'){
                    $relust = "yes";
                    $tb = "Đã ngừng kinh doanh sản phẩm ".$tensp." thành công";
                    $this->view("Main",[
                        "Page"=>"Product",
                        "banner"=>$this->UserModel->Banner(),
                        "giaodien"=>$this->UserModel->Giaodien(),
                        "Admin"=>$this->UserModel->GetAdmin($useradmin),
                        "DSDHXL"=>$this->OrderModel->GetDSDHXL(),
                        "DSSP"=>$this->ProductModel->GetDSSP(),
                        "relust"=>$relust,
                        "tb"=>$tb
                    ]);
                }
                else {
                    $relust = "no";
                    $tb = "Ngừng kinh doanh sản phẩm ".$tensp." thất bại";
                    $this->view("Main",[
                        "Page"=>"Product",
                        "banner"=>$this->UserModel->Banner(),
                        "giaodien"=>$this->UserModel->Giaodien(),
                        "Admin"=>$this->UserModel->GetAdmin($useradmin),
                        "DSDHXL"=>$this->OrderModel->GetDSDHXL(),
                        "DSSP"=>$this->ProductModel->GetDSSP(),
                        "relust"=>$relust,
                        "tb"=>$tb
                    ]);
                }
            }else{
                header("Location:/Register/Sigin");
            }
        }
        function Start($id,$tensp){
            if(isset($_SESSION['useradmin'])){
                $useradmin=$_SESSION['useradmin']; 
                $stop = $this->ProductModel->StartSP($id);
                if($stop=='true'){
                    $relust = "yes";
                    $tb = "Đã kinh doanh lại sản phẩm ".$tensp." thành công";
                    $this->view("Main",[
                        "Page"=>"Product",
                        "banner"=>$this->UserModel->Banner(),
                        "giaodien"=>$this->UserModel->Giaodien(),
                        "Admin"=>$this->UserModel->GetAdmin($useradmin),
                        "DSDHXL"=>$this->OrderModel->GetDSDHXL(),
                        "DSSP"=>$this->ProductModel->GetDSSP(),
                        "relust"=>$relust,
                        "tb"=>$tb
                    ]);
                }
                else {
                    $relust = "no";
                    $tb = "Kinh doanh lại sản phẩm ".$tensp." thất bại";
                    $this->view("Main",[
                        "Page"=>"Product",
                        "banner"=>$this->UserModel->Banner(),
                        "giaodien"=>$this->UserModel->Giaodien(),
                        "Admin"=>$this->UserModel->GetAdmin($useradmin),
                        "DSDHXL"=>$this->OrderModel->GetDSDHXL(),
                        "DSSP"=>$this->ProductModel->GetDSSP(),
                        "relust"=>$relust,
                        "tb"=>$tb
                    ]);
                }
            }else{
                header("Location:/Register/Sigin");
            }
        }
        function AddProduct(){
            if(isset($_SESSION['useradmin'])){
                $useradmin=$_SESSION['useradmin']; 
                if(isset($_POST["btnAddsp"])){
                   $tensp =  $_POST["tensp"];
                   $danhmuc =  $_POST["danhmuc"];
                   $giagoc =  $_POST["giagoc"];
                   $giaban =  $_POST["giaban"];
                   $soluong =  $_POST["soluong"];
                   $mota =  $_POST["mota"];
                   $loai1 =  $_POST["loai1"];
                   $loai3 =  $_POST["loai3"];
                   $thuonghieu =  $_POST["thuonghieu"];
                   $xuatxu =  $_POST["xuatxu"];
                   $chatlieu =  $_POST["chatlieu"];
                   $kieudang =  $_POST["kieudang"];
                   $baohanh =  $_POST["baohanh"];
                   if ($_FILES['uploadFile']['name'] != NULL) {
                        if ($_FILES['uploadFile']['type'] == "image/jpeg" || $_FILES['uploadFile']['type'] == "image/png" || $_FILES['uploadFile']['type'] == "image/gif") {
                            $path = "./public/images/product/"; 
                            $tmp_name = $_FILES['uploadFile']['tmp_name'];
                            //$name = $_FILES['uploadFile']['name']; 
                            $temp = explode(".", $_FILES["uploadFile"]["name"]);
                            $newfilename = round(microtime(true)) .$useradmin. '.' . end($temp);
                            move_uploaded_file($tmp_name, $path . $newfilename);
                            $image_url = $path . $newfilename;
                            ///goi model
                            $kq = $this->ProductModel->InsertSP($tensp,$giagoc,$giaban,$soluong,$image_url,$mota,$danhmuc,$loai1,$loai3);
                            if($kq=='true'){
                                $kqid = $this->ProductModel->GetidSP($tensp);
                                $row= json_decode($kqid,true);
                                foreach ($row as list("id"=>$idsp)){
                                    if($thuonghieu!=""|| $xuatxu!="" || $chatlieu!="" || $kieudang!="" || $baohanh!=""){
                                        $this->ProductModel->InsertTTSP($idsp,$thuonghieu,$xuatxu,$chatlieu,$kieudang,$baohanh);
                                    } 
                                     $this->ProductModel->autosp($idsp);
                                    $ktanh = $_FILES['img_file']['name'];
                                    if (!empty($ktanh[0])) {
                                        $stt = 0;
                                        foreach($_FILES['img_file']['name'] as $name => $value)
                                        {
                                            $stt++;
                                            //$name_img = stripslashes($_FILES['img_file']['name'][$name]);
                                            $temp = explode(".", $_FILES['img_file']['name'][$name]);
                                            $name_img = round(microtime(true)) .$useradmin.$stt. '.' . end($temp);
                                            $source_img = $_FILES['img_file']['tmp_name'][$name];
                                            $path_img = "./public/images/listproduct/" . $name_img;
                                            move_uploaded_file($source_img, $path_img);
                                            $this->ProductModel->InsertImagesSP($idsp,$path_img);
                                        }  
                                    }   
                                }
                                $relust="yes";
                                $tb = "Thêm sản phẩm thành công";
                            }
                            else {
                                $relust="no";
                                $tb = "Thêm sản phẩm thất bại";
                            }
                        } else {
                            // Không phải file ảnh
                            $relust="no";
                            $tb = "Không phải file ảnh";
                        }
                    } else {
                        $relust="no";
                        $tb = "Bạn chưa chọn ảnh";
                   }
                   $this->view("Main",[
                    "Page"=>"AddProduct",
                    "banner"=>$this->UserModel->Banner(),
                    "giaodien"=>$this->UserModel->Giaodien(),
                    "Admin"=>$this->UserModel->GetAdmin($useradmin),
                    "DSDHXL"=>$this->OrderModel->GetDSDHXL(),
                    "DSSP"=>$this->ProductModel->GetDSSP(),
                    "DM1"=>$this->CategoryModel->GetDM1(),
                    "DM3"=>$this->CategoryModel->GetDM3(),
                    "DM"=>$this->CategoryModel->GetDM(),
                    "relust"=>$relust,
                    "tb"=>$tb
                ]);
                }else {
                    $this->view("Main",[
                        "Page"=>"AddProduct",
                        "banner"=>$this->UserModel->Banner(),
                        "giaodien"=>$this->UserModel->Giaodien(),
                        "Admin"=>$this->UserModel->GetAdmin($useradmin),
                        "DSDHXL"=>$this->OrderModel->GetDSDHXL(),
                        "DSSP"=>$this->ProductModel->GetDSSP(),
                        "DM1"=>$this->CategoryModel->GetDM1(),
                        "DM3"=>$this->CategoryModel->GetDM3(),
                        "DM"=>$this->CategoryModel->GetDM()
                    ]);
                }
                
            }else{
                header("Location:/Register/Sigin");
            }
        }
        function EditProduct($id,$ten){
            if(isset($_SESSION['useradmin'])){
                $useradmin=$_SESSION['useradmin'];
                if(isset($_POST["btnEditsp"])){
                   $tensp =  $_POST["tensp"];
                   $danhmuc =  $_POST["danhmuc"];
                   $giagoc =  $_POST["giagoc"];
                   $giaban =  $_POST["giaban"];
                   $soluong =  $_POST["soluong"];
                   $mota =  $_POST["mota"];
                   $loai1 =  $_POST["loai1"];
                   $loai3 =  $_POST["loai3"];
                   $thuonghieu =  $_POST["thuonghieu"];
                   $xuatxu =  $_POST["xuatxu"];
                   $chatlieu =  $_POST["chatlieu"];
                   $kieudang =  $_POST["kieudang"];
                   $baohanh =  $_POST["baohanh"];
                   $anhcu = $_POST["anhtrc"];
                   if ($_FILES['uploadFile']['name'] != NULL) {
                        if ($_FILES['uploadFile']['type'] == "image/jpeg" || $_FILES['uploadFile']['type'] == "image/png" || $_FILES['uploadFile']['type'] == "image/gif") {
                            $path = "./public/images/product/"; 
                            $tmp_name = $_FILES['uploadFile']['tmp_name'];
                            //$name = $_FILES['uploadFile']['name']; 
                            $temp = explode(".", $_FILES["uploadFile"]["name"]);
                            $newfilename = round(microtime(true)) .$useradmin. '.' . end($temp);
                            move_uploaded_file($tmp_name, $path . $newfilename);
                            $image_url = $path . $newfilename;
                            ///goi model
                            $kq = $this->ProductModel->UpSP($tensp,$giagoc,$giaban,$soluong,$image_url,$mota,$danhmuc,$loai1,$loai3,$id);
                            if($kq = "true"){
                                if($anhcu!=""){
                                    if($anhcu!=$image_url){
                                        if(file_exists($anhcu)) {
                                            unlink($anhcu);
                                        }
                                    }  
                                }
                            }
                            if(isset($_POST["addmoi"])){
                                if($thuonghieu!=""|| $xuatxu!="" || $chatlieu!="" || $kieudang!="" || $baohanh!=""){
                                    $themtt = $this->ProductModel->InsertTTSP($id,$thuonghieu,$xuatxu,$chatlieu,$kieudang,$baohanh);
                                }else{
                                    $relust="yes";
                                    $tb = "Cập nhật sản phẩm thành công";
                                }
                            }else {
                                $uptt = $this->ProductModel->UpTTSP($id,$thuonghieu,$xuatxu,$chatlieu,$kieudang,$baohanh);
                                $relust="yes";
                                $tb = "Cập nhật sản phẩm thành công";
                            }
                            if(isset($themtt)){
                                if($themtt=="true"){
                                    $relust="yes";
                                    $tb = "Cập nhật sản phẩm thành công";
                                }else {
                                    $relust="no";
                                    $tb = "Cập nhật chi tiết sản phẩm thất bại";
                                }
                            }
                                
                        } else {
                            // Không phải file ảnh
                            $relust="no";
                            $tb = "Không phải file ảnh";
                        }
                    } else {
                            $kq = $this->ProductModel->UpSPKOANH($tensp,$giagoc,$giaban,$soluong,$mota,$danhmuc,$loai1,$loai3,$id);
                            if(isset($_POST["addmoi"])){
                                if($thuonghieu!=""|| $xuatxu!="" || $chatlieu!="" || $kieudang!="" || $baohanh!=""){
                                    $themtt = $this->ProductModel->InsertTTSP($id,$thuonghieu,$xuatxu,$chatlieu,$kieudang,$baohanh);
                                }else{
                                    $relust="yes";
                                    $tb = "Cập nhật sản phẩm thành công";
                                } 
                            }else {
                                $uptt = $this->ProductModel->UpTTSP($id,$thuonghieu,$xuatxu,$chatlieu,$kieudang,$baohanh);
                                $relust="yes";
                                $tb = "Cập nhật sản phẩm thành công";
                            }
                            if(isset($themtt)){
                                if($themtt=="true"){
                                    $relust="yes";
                                    $tb = "Cập nhật sản phẩm thành công";
                                }else {
                                    $relust="no";
                                    $tb = "Cập nhật chi tiết sản phẩm thất bại";
                                }
                            }
                        }
                        $ktanh = $_FILES['img_file']['name'];
                        if (!empty($ktanh[0])) {
                            $stt = 0;
                            $list = $this->ProductModel->ImagesSP($id); 
                            $del = $this->ProductModel->DelImagesSP($id);
                            if($del=="true"){
                                $rowh = json_decode($list,true);
                                if(count($rowh)> 0){
                                    foreach($rowh as list("img"=>$hinhanh)){
                                        if(file_exists($hinhanh)) {
                                            unlink($hinhanh);
                                        }  
                                    }
                                } 
                                foreach($_FILES['img_file']['name'] as $name => $value)
                                {
                                    $stt++;
                                    //$name_img = stripslashes($_FILES['img_file']['name'][$name]);
                                    $temp = explode(".", $_FILES['img_file']['name'][$name]);
                                    $name_img = round(microtime(true)) .$useradmin.$stt. '.' . end($temp);
                                    $source_img = $_FILES['img_file']['tmp_name'][$name];
                                    $path_img = "./public/images/listproduct/" . $name_img;
                                    move_uploaded_file($source_img, $path_img);
                                    $this->ProductModel->InsertImagesSP($id,$path_img);
                                } 
                            }else { $relust="no";
                                $tb = "Cập nhật ảnh phụ sản phẩm thất bại";
                            }
                             
                        }
                        $this->view("Main",[
                            "Page"=>"EditProduct",
                            "banner"=>$this->UserModel->Banner(),
                            "giaodien"=>$this->UserModel->Giaodien(),
                            "Admin"=>$this->UserModel->GetAdmin($useradmin),
                            "DSDHXL"=>$this->OrderModel->GetDSDHXL(),
                            "DSSP"=>$this->ProductModel->GetDSSP(),
                            "DM1"=>$this->CategoryModel->GetDM1(),
                            "DM3"=>$this->CategoryModel->GetDM3(),
                            "DM"=>$this->CategoryModel->GetDM(),
                            "SPID"=>$this->ProductModel->GetSPid($id),
                            "CTSPID"=>$this->ProductModel->GetCTSPid($id),
                            "tenDM1"=>$this->CategoryModel->GetDM1id($id),
                            "tenDM3"=>$this->CategoryModel->GetDM3id($id),
                            "listanh"=>$this->ProductModel->ImagesSP($id),
                            "relust"=>$relust,
                            "tb"=>$tb
                        ]);
                }else {
                    $this->view("Main",[
                        "Page"=>"EditProduct",
                        "banner"=>$this->UserModel->Banner(),
                        "giaodien"=>$this->UserModel->Giaodien(),
                        "Admin"=>$this->UserModel->GetAdmin($useradmin),
                        "DSDHXL"=>$this->OrderModel->GetDSDHXL(),
                        "DSSP"=>$this->ProductModel->GetDSSP(),
                        "DM1"=>$this->CategoryModel->GetDM1(),
                        "DM3"=>$this->CategoryModel->GetDM3(),
                        "DM"=>$this->CategoryModel->GetDM(),
                        "SPID"=>$this->ProductModel->GetSPid($id),
                        "CTSPID"=>$this->ProductModel->GetCTSPid($id),
                        "tenDM1"=>$this->CategoryModel->GetDM1id($id),
                        "tenDM3"=>$this->CategoryModel->GetDM3id($id),
                        "listanh"=>$this->ProductModel->ImagesSP($id)
                    ]);
                }
                
            }else{
                header("Location:/Register/Sigin");
            }
        }
    }
?>