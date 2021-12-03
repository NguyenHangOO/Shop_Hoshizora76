<?php 
    class Category extends Controller{
        public $UserModel;
        public $CategoryModel;
        public $OrderModel;
        public function __construct(){
            $this->UserModel = $this->model("UserModel");
            $this->CategoryModel = $this->model("CategoryModel");
            $this->OrderModel = $this->model("OrderModel");
        }
        function Show(){
            $this->view("404",[
            ]);
        }
        function Handmade(){
            if(isset($_SESSION['useradmin'])){
                $useradmin=$_SESSION['useradmin']; 
                $this->view("Main",[
                    "Page"=>"Handmade",
                    "banner"=>$this->UserModel->Banner(),
                    "giaodien"=>$this->UserModel->Giaodien(),
                    "Admin"=>$this->UserModel->GetAdmin($useradmin),
                    "DSDHXL"=>$this->OrderModel->GetDSDHXL(),
                    "DM1"=>$this->CategoryModel->GetDM1()
                ]);
            }else{
                header("Location:/Register/Sigin");
            }
        }
        function editHandmade($id){
            if(isset($_SESSION['useradmin'])){
                $useradmin=$_SESSION['useradmin'];
                if(isset($_POST['btnEditHand'])){
                    $relust = "";
                    $icon = $_POST['icon'];
                    $ten =  $_POST['tendmhand'];
                    $kq = $this->CategoryModel->UpLoai1($id,$ten,$icon);
                    if($kq=='true'){
                        $relust = 'yes';
                        $tb = "Cập nhật thành công";
                    } else {
                        $relust = 'no';
                        $tb = "Cập nhật thất bại";
                    }
                    $this->view("Main",[
                        "Page"=>"Handmade",
                        "banner"=>$this->UserModel->Banner(),
                        "giaodien"=>$this->UserModel->Giaodien(),
                        "Admin"=>$this->UserModel->GetAdmin($useradmin),
                        "DSDHXL"=>$this->OrderModel->GetDSDHXL(),
                        "DM1"=>$this->CategoryModel->GetDM1(),
                        "relust"=>$relust,
                        "tb"=>$tb
                    ]);
                } else {
                    $this->view("Main",[
                        "Page"=>"Handmade",
                        "banner"=>$this->UserModel->Banner(),
                        "giaodien"=>$this->UserModel->Giaodien(),
                        "Admin"=>$this->UserModel->GetAdmin($useradmin),
                        "DSDHXL"=>$this->OrderModel->GetDSDHXL(),
                        "DM1"=>$this->CategoryModel->GetDM1(),
                        "idsua"=>$id
                    ]);
                } 
            }else{
                header("Location:/Register/Sigin");
            }
        }
        function GiftSet(){
            if(isset($_SESSION['useradmin'])){
                $useradmin=$_SESSION['useradmin']; 
                $this->view("Main",[
                    "Page"=>"GiftSet",
                    "banner"=>$this->UserModel->Banner(),
                    "giaodien"=>$this->UserModel->Giaodien(),
                    "Admin"=>$this->UserModel->GetAdmin($useradmin),
                    "DSDHXL"=>$this->OrderModel->GetDSDHXL(),
                    "DM3"=>$this->CategoryModel->GetDM3()
                ]);
            }else{
                header("Location:/Register/Sigin");
            }
        }
        function editGiftSet($id){
            if(isset($_SESSION['useradmin'])){
                $useradmin=$_SESSION['useradmin']; 
                if(isset($_POST['btnEditGift'])){
                    $relust = "";
                    $icon = $_POST['icon'];
                    $ten =  $_POST['tendmhand'];
                    $kq = $this->CategoryModel->UpLoai3($id,$ten,$icon);
                    if($kq=='true'){
                        $relust = 'yes';
                        $tb = "Cập nhật thành công";
                    } else {
                        $relust = 'no';
                        $tb = "Cập nhật thất bại";
                    }
                    $this->view("Main",[
                        "Page"=>"GiftSet",
                        "banner"=>$this->UserModel->Banner(),
                        "giaodien"=>$this->UserModel->Giaodien(),
                        "Admin"=>$this->UserModel->GetAdmin($useradmin),
                        "DSDHXL"=>$this->OrderModel->GetDSDHXL(),
                        "DM3"=>$this->CategoryModel->GetDM3(),
                        "relust"=>$relust,
                        "tb"=>$tb
                    ]);
                } else {
                    $this->view("Main",[
                        "Page"=>"GiftSet",
                        "banner"=>$this->UserModel->Banner(),
                        "giaodien"=>$this->UserModel->Giaodien(),
                        "Admin"=>$this->UserModel->GetAdmin($useradmin),
                        "DSDHXL"=>$this->OrderModel->GetDSDHXL(),
                        "DM3"=>$this->CategoryModel->GetDM3(),
                        "idsua"=>$id
                    ]);
                }
            }else{
                header("Location:/Register/Sigin");
            }
        }
        function AddGiftSet(){
            if(isset($_SESSION['useradmin'])){
                $useradmin=$_SESSION['useradmin']; 
               if(isset($_POST['btnAddHand'])){
                   $icon = $_POST['icon'];
                   $ten =  $_POST['tendmhand'];
                   $kq = $this->CategoryModel->IntLoai3($ten,$icon);
                   if($kq=='true'){
                    $relust = 'yes';
                    $tb = "Thêm thành công";
                    } else {
                        $relust = 'no';
                        $tb = "Thêm thất bại";
                    }
                    $this->view("Main",[
                        "Page"=>"GiftSet",
                        "banner"=>$this->UserModel->Banner(),
                        "giaodien"=>$this->UserModel->Giaodien(),
                        "Admin"=>$this->UserModel->GetAdmin($useradmin),
                        "DSDHXL"=>$this->OrderModel->GetDSDHXL(),
                        "DM3"=>$this->CategoryModel->GetDM3(),
                        "relust"=>$relust,
                        "tb"=>$tb
                    ]);
               }
            }else{
                header("Location:/Register/Sigin");
            }
        }
        function DelGiftSet($id){
            if(isset($_SESSION['useradmin'])){
                $useradmin=$_SESSION['useradmin']; 
                $kq = $this->CategoryModel->DelLoai3($id);
                if($kq=='true'){
                    $relust = 'yes';
                    $tb = "Xóa thành công";
                 } else {
                     $relust = 'no';
                     $tb = "Xóa thất bại do phân loại đã tồn tại sản phẩm";
                 }
                 $this->view("Main",[
                     "Page"=>"GiftSet",
                     "banner"=>$this->UserModel->Banner(),
                     "giaodien"=>$this->UserModel->Giaodien(),
                     "Admin"=>$this->UserModel->GetAdmin($useradmin),
                     "DSDHXL"=>$this->OrderModel->GetDSDHXL(),
                     "DM3"=>$this->CategoryModel->GetDM3(),
                     "relust"=>$relust,
                     "tb"=>$tb
                 ]);
            }else{
                header("Location:/Register/Sigin");
            }
        }
        function AddHand(){
            if(isset($_SESSION['useradmin'])){
                $useradmin=$_SESSION['useradmin']; 
               if(isset($_POST['btnAddHand'])){
                   $icon = $_POST['icon'];
                   $ten =  $_POST['tendmhand'];
                   $kq = $this->CategoryModel->IntLoai1($ten,$icon);
                   if($kq=='true'){
                    $relust = 'yes';
                    $tb = "Thêm thành công";
                    } else {
                        $relust = 'no';
                        $tb = "Thêm thất bại";
                    }
                    $this->view("Main",[
                        "Page"=>"Handmade",
                        "banner"=>$this->UserModel->Banner(),
                        "giaodien"=>$this->UserModel->Giaodien(),
                        "Admin"=>$this->UserModel->GetAdmin($useradmin),
                        "DSDHXL"=>$this->OrderModel->GetDSDHXL(),
                        "DM1"=>$this->CategoryModel->GetDM1(),
                        "relust"=>$relust,
                        "tb"=>$tb
                    ]);
               }
            }else{
                header("Location:/Register/Sigin");
            }
        }
        function DelHandmade($id){
            if(isset($_SESSION['useradmin'])){
                $useradmin=$_SESSION['useradmin']; 
                $kq = $this->CategoryModel->DelLoai1($id);
                if($kq=='true'){
                    $relust = 'yes';
                    $tb = "Xóa thành công";
                 } else {
                     $relust = 'no';
                     $tb = "Xóa thất bại do phân loại đã tồn tại sản phẩm";
                 }
                 $this->view("Main",[
                    "Page"=>"Handmade",
                    "banner"=>$this->UserModel->Banner(),
                    "giaodien"=>$this->UserModel->Giaodien(),
                    "Admin"=>$this->UserModel->GetAdmin($useradmin),
                    "DSDHXL"=>$this->OrderModel->GetDSDHXL(),
                    "DM1"=>$this->CategoryModel->GetDM1(),
                     "relust"=>$relust,
                     "tb"=>$tb
                 ]);
            }else{
                header("Location:/Register/Sigin");
            }
        }
    }
?>