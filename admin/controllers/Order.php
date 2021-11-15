<?php 
    class Order extends Controller{
        public $UserModel;
        public $ProductModel;
        public $OrderModel;
        public function __construct(){
            $this->UserModel = $this->model("UserModel");
            $this->ProductModel = $this->model("ProductModel");
            $this->OrderModel = $this->model("OrderModel");
        }
        function Show(){
            $this->view("404",[
            ]);
        }
        function orExport(){
            if(isset($_SESSION['useradmin'])){
                $useradmin=$_SESSION['useradmin']; 
                $this->view("Main",[
                    "Page"=>"Export",
                    "Admin"=>$this->UserModel->GetAdmin($useradmin),
                    "DSDHXL"=>$this->OrderModel->GetDSDHXL(),
                    "DSAll"=>$this->OrderModel->GetAll(),
                    "DSDHXN"=>$this->OrderModel->GetDSDHXN(),
                    "DSDHDG"=>$this->OrderModel->GetDSDHDG(),
                    "DSDHTT"=>$this->OrderModel->GetDSDH()

                ]);
            }else{
                header("Location:/CodeApp/Shop_Hoshizora76/admin.php");
            }
        }
    }
?>