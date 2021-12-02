<?php 
    class Revenues extends Controller{
        public $UserModel;
        public $OrderModel;
        public $ProductModel;
        public function __construct(){
            $this->UserModel = $this->model("UserModel");
            $this->OrderModel = $this->model("OrderModel");
            $this->ProductModel = $this->model("ProductModel");
        }
        function Show(){
            if(isset($_SESSION['useradmin'])){
                $useradmin=$_SESSION['useradmin'];
                if(isset($_POST["btnLoc"])) {
                    $bd=$_POST["bdngay"];
                    $kt=$_POST["endngay"];
                    $this->view("Main",[
                        "Page"=>"Revenues",
                        "Admin"=>$this->UserModel->GetAdmin($useradmin),
                        "DSDHXL"=>$this->OrderModel->GetDSDHXL(),
                        "DSSP"=>$this->ProductModel->GetDSSP(),
                        "thongke"=>$this->OrderModel->GetFilterThongKe($bd,$kt),
                        "bd"=>$bd,
                        "kt"=>$kt
                    ]);
                }else {
                    $this->view("Main",[
                        "Page"=>"Revenues",
                        "Admin"=>$this->UserModel->GetAdmin($useradmin),
                        "DSDHXL"=>$this->OrderModel->GetDSDHXL(),
                        "DSSP"=>$this->ProductModel->GetDSSP(),
                        "thongke"=>$this->OrderModel->GetThongKe()
                    ]);
                }
                
            }else{
                header("Location:/Register/Sigin");
            }
        }
    }
?>