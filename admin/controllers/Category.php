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
                    "Admin"=>$this->UserModel->GetAdmin($useradmin),
                    "DSDHXL"=>$this->OrderModel->GetDSDHXL(),
                    "DM1"=>$this->CategoryModel->GetDM1()
                ]);
            }else{
                header("Location:/CodeApp/Shop_Hoshizora76/admin.php");
            }
        }
        function editHandmade($id){
            if(isset($_SESSION['useradmin'])){
                $useradmin=$_SESSION['useradmin']; 
                $this->view("Main",[
                    "Page"=>"Handmade",
                    "Admin"=>$this->UserModel->GetAdmin($useradmin),
                    "DSDHXL"=>$this->OrderModel->GetDSDHXL(),
                    "DM1"=>$this->CategoryModel->GetDM1(),
                    "idsua"=>$id
                ]);
            }else{
                header("Location:/CodeApp/Shop_Hoshizora76/admin.php");
            }
        }
        function GiftSet(){
            if(isset($_SESSION['useradmin'])){
                $useradmin=$_SESSION['useradmin']; 
                $this->view("Main",[
                    "Page"=>"GiftSet",
                    "Admin"=>$this->UserModel->GetAdmin($useradmin),
                    "DSDHXL"=>$this->OrderModel->GetDSDHXL(),
                    "DM3"=>$this->CategoryModel->GetDM3()
                ]);
            }else{
                header("Location:/CodeApp/Shop_Hoshizora76/admin.php");
            }
        }
        function editGiftSet($id){
            if(isset($_SESSION['useradmin'])){
                $useradmin=$_SESSION['useradmin']; 
                $this->view("Main",[
                    "Page"=>"GiftSet",
                    "Admin"=>$this->UserModel->GetAdmin($useradmin),
                    "DSDHXL"=>$this->OrderModel->GetDSDHXL(),
                    "DM3"=>$this->CategoryModel->GetDM3(),
                    "idsua"=>$id
                ]);
            }else{
                header("Location:/CodeApp/Shop_Hoshizora76/admin.php");
            }
        }
    }
?>