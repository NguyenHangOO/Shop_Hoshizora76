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
                    "Admin"=>$this->UserModel->GetAdmin($useradmin),
                    "DSDHXL"=>$this->OrderModel->GetDSDHXL(),
                    "DSSP"=>$this->ProductModel->GetDSSP()
                ]);
            }else{
                header("Location:/CodeApp/Shop_Hoshizora76/admin.php");
            }
        }
        function dailProduct($id){
            if(isset($_SESSION['useradmin'])){
                $useradmin=$_SESSION['useradmin']; 
                $this->view("Main",[
                    "Page"=>"DetailProduct",
                    "Admin"=>$this->UserModel->GetAdmin($useradmin),
                    "DSDHXL"=>$this->OrderModel->GetDSDHXL(),
                    "DSSP"=>$this->ProductModel->GetDSSP(),
                    "SPID"=>$this->ProductModel->GetSPid($id),
                    "CTSPID"=>$this->ProductModel->GetCTSPid($id),
                    "DGSP"=>$this->ProductModel->GetDGSP($id)
                ]);
            }else{
                header("Location:/CodeApp/Shop_Hoshizora76/admin.php");
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
                        "Admin"=>$this->UserModel->GetAdmin($useradmin),
                        "DSDHXL"=>$this->OrderModel->GetDSDHXL(),
                        "DSSP"=>$this->ProductModel->GetDSSP(),
                        "relust"=>$relust,
                        "tb"=>$tb
                    ]);
                }
            }else{
                header("Location:/CodeApp/Shop_Hoshizora76/admin.php");
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
                        "Admin"=>$this->UserModel->GetAdmin($useradmin),
                        "DSDHXL"=>$this->OrderModel->GetDSDHXL(),
                        "DSSP"=>$this->ProductModel->GetDSSP(),
                        "relust"=>$relust,
                        "tb"=>$tb
                    ]);
                }
            }else{
                header("Location:/CodeApp/Shop_Hoshizora76/admin.php");
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
                            $name = $_FILES['uploadFile']['name']; 
                            move_uploaded_file($tmp_name, $path . $name);
                            $image_url = $path . $name;
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
                        "Admin"=>$this->UserModel->GetAdmin($useradmin),
                        "DSDHXL"=>$this->OrderModel->GetDSDHXL(),
                        "DSSP"=>$this->ProductModel->GetDSSP(),
                        "DM1"=>$this->CategoryModel->GetDM1(),
                        "DM3"=>$this->CategoryModel->GetDM3(),
                        "DM"=>$this->CategoryModel->GetDM()
                    ]);
                }
                
            }else{
                header("Location:/CodeApp/Shop_Hoshizora76/admin.php");
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
                            $name = $_FILES['uploadFile']['name']; 
                            move_uploaded_file($tmp_name, $path . $name);
                            $image_url = $path . $name;
                            ///goi model
                            $kq = $this->ProductModel->UpSP($tensp,$giagoc,$giaban,$soluong,$image_url,$mota,$danhmuc,$loai1,$loai3,$id);
                            if($kq=='true'){
                                if(isset($_POST["addmoi"])){
                                    if($thuonghieu!=""|| $xuatxu!="" || $chatlieu!="" || $kieudang!="" || $baohanh!=""){
                                        $themtt = $this->ProductModel->InsertTTSP($id,$thuonghieu,$xuatxu,$chatlieu,$kieudang,$baohanh);
                                    } 
                                }else {
                                    $uptt = $this->ProductModel->UpTTSP($id,$thuonghieu,$xuatxu,$chatlieu,$kieudang,$baohanh);
                                }
                                if($themtt=="true" || $uptt=="true"){
                                    if($anhcu!=""){
                                        if($anhcu!=$image_url){
                                            unlink($anhcu);
                                        }  
                                    }
                                    $relust="yes";
                                    $tb = "Cập nhật sản phẩm thành công";
                                }else {
                                    $relust="no";
                                    $tb = "Cập nhật chi tiết sản phẩm thất bại";
                                }
                                
                            }
                            else {
                                $relust="no";
                                $tb = "Cập nhật sản phẩm thất bại";
                            }
                        } else {
                            // Không phải file ảnh
                            $relust="no";
                            $tb = "Không phải file ảnh";
                        }
                    } else {
                            $kq = $this->ProductModel->UpSPKOANH($tensp,$giagoc,$giaban,$soluong,$mota,$danhmuc,$loai1,$loai3,$id);
                            if($kq=='true'){
                                if(isset($_POST["addmoi"])){
                                    if($thuonghieu!=""|| $xuatxu!="" || $chatlieu!="" || $kieudang!="" || $baohanh!=""){
                                        $themtt = $this->ProductModel->InsertTTSP($id,$thuonghieu,$xuatxu,$chatlieu,$kieudang,$baohanh);
                                    } 
                                }else {
                                    $uptt = $this->ProductModel->UpTTSP($id,$thuonghieu,$xuatxu,$chatlieu,$kieudang,$baohanh);
                                }
                                if($themtt=="true" || $uptt=="true"){
                                    $relust="yes";
                                    $tb = "Cập nhật sản phẩm thành công";
                                }else {
                                    $relust="no";
                                    $tb = "Cập nhật chi tiết sản phẩm thất bại";
                                }
                                
                            }
                            else {
                                $relust="no";
                                $tb = "Cập nhật sản phẩm thất bại";
                            }
                        }
                   $this->view("Main",[
                    "Page"=>"EditProduct",
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
                    "relust"=>$relust,
                    "tb"=>$tb
                ]);
                }else {
                    $this->view("Main",[
                        "Page"=>"EditProduct",
                        "Admin"=>$this->UserModel->GetAdmin($useradmin),
                        "DSDHXL"=>$this->OrderModel->GetDSDHXL(),
                        "DSSP"=>$this->ProductModel->GetDSSP(),
                        "DM1"=>$this->CategoryModel->GetDM1(),
                        "DM3"=>$this->CategoryModel->GetDM3(),
                        "DM"=>$this->CategoryModel->GetDM(),
                        "SPID"=>$this->ProductModel->GetSPid($id),
                        "CTSPID"=>$this->ProductModel->GetCTSPid($id),
                        "tenDM1"=>$this->CategoryModel->GetDM1id($id),
                        "tenDM3"=>$this->CategoryModel->GetDM3id($id)

                    ]);
                }
                
            }else{
                header("Location:/CodeApp/Shop_Hoshizora76/admin.php");
            }
        }
    }
?>