<?php 
    class Home extends Controller{
        public $UserModel;
        public $ProductModel;
        public $OrderModel;
        public function __construct(){
            $this->UserModel = $this->model("UserModel");
            $this->ProductModel = $this->model("ProductModel");
            $this->OrderModel = $this->model("OrderModel");
        }
        function Show(){
            if(isset($_SESSION['useradmin'])){
                $useradmin = $_SESSION['useradmin'];
                $m = date("m");
                $this->view("Main",[
                    "Page"=>"Home",
                    "Admin"=>$this->UserModel->GetAdmin($useradmin),
                    "DSMember"=>$this->UserModel->GetDSMember(),
                    "DSSP"=>$this->ProductModel->GetDSSP(),
                    "DSDH"=>$this->OrderModel->GetDSDH(),
                    "DSTTDH"=>$this->OrderModel->GetDTDH($m),
                    "DSDHXL"=>$this->OrderModel->GetDSDHXL()
                ]);
            }else {
                header("Location:/CodeApp/Shop_Hoshizora76/admin.php");
            }
        }
        function Xulydonhang($id){
            if(isset($_SESSION['useradmin'])){
                $kq = $this->OrderModel->Xylydonhang($id);
                if($kq=="true"){
                    header("Location:/CodeApp/Shop_Hoshizora76/admin.php?url=Home/");
                }else{echo 'Xử lý thất bại';}
            }else {
                header("Location:/CodeApp/Shop_Hoshizora76/admin.php");
            }
        }
    }
?>