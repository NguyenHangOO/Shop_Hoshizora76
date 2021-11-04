<?php
    class Order extends Controller{
        public $Category;
        public $ProductModel;
        public $UserModel;
        public $OrderModel;
        
        public function __construct(){
            $this->Category = $this->model("Category");
            $this->ProductModel = $this->model("ProductModel");
            $this->UserModel = $this->model("UserModel");
            $this->OrderModel = $this->model("OrderModel");
        }
        function  Show(){
            $this->view("404",[
            ]);
        }
        function  CartID($id){
            if (isset($_SESSION['username'])){
                $username = $_SESSION['username'];
                $slg=1;
                if(isset($_POST["btnGioHang"])){
                    $slg=$_POST["soluongdat"];
                }
                $relust="";
                $kq = $this->UserModel->GetMember($username);
                $row= json_decode($kq,true);
                foreach ($row as list("id"=>$idus)){
                    $inkq=$this->OrderModel->AddCart($id,$idus,$slg);
                    if($inkq==true)
                    {
                       $relust="Thêm thành công";
                       $this->view("Directional",[
                         "relust"=>$relust
                        ]);
                    } 
                }
            }
            else {
                $this->view("Main",[
                    "Page"=>"Check",
                    "dmsp1"=>$this->Category->GetDM1(),
                    "dmsp3"=> $this->Category->GetDM3(),
                    "tbuser"=>$this->UserModel->GetThongBao(),
                    "spcart"=>$this->ProductModel->GetSpCart()
                ]);
            }
        }
        function CartKhachHang(){
            if (isset($_SESSION['username'])){
                $this->view("Main",[
                    "Page"=>"Cart",
                    "dmsp1"=>$this->Category->GetDM1(),
                    "dmsp3"=> $this->Category->GetDM3(),
                    "tbuser"=>$this->UserModel->GetThongBao(),
                    "spcart"=>$this->ProductModel->GetSpCart()
                ]);
            }
            else {
                $this->view("Main",[
                    "Page"=>"Check",
                    "dmsp1"=>$this->Category->GetDM1(),
                    "dmsp3"=> $this->Category->GetDM3(),
                    "tbuser"=>$this->UserModel->GetThongBao(),
                    "spcart"=>$this->ProductModel->GetSpCart()
                ]);
            }
        }
        function UpTangCartId($id,$idgh){
            if (isset($_SESSION['username'])){
                $kq = $this->OrderModel->UpTCart($id,$idgh);
                if($kq=true){
                    header("Location:/CodeApp/Shop_Hoshizora76/Order/CartKhachHang");
                }else echo 'Lỗi xảy ra';
                
            }
            else {
                $this->view("Main",[
                    "Page"=>"Check",
                    "dmsp1"=>$this->Category->GetDM1(),
                    "dmsp3"=> $this->Category->GetDM3(),
                    "tbuser"=>$this->UserModel->GetThongBao(),
                    "spcart"=>$this->ProductModel->GetSpCart()
                ]);
            }
        }
        function UpGiamCartId($id,$idgh){
            if (isset($_SESSION['username'])){
                $kq = $this->OrderModel->UpGCart($id,$idgh);
                if($kq=true){
                    header("Location:/CodeApp/Shop_Hoshizora76/Order/CartKhachHang");
                }else echo 'Lỗi xảy ra';
                
            }
            else {
                $this->view("Main",[
                    "Page"=>"Check",
                    "dmsp1"=>$this->Category->GetDM1(),
                    "dmsp3"=> $this->Category->GetDM3(),
                    "tbuser"=>$this->UserModel->GetThongBao(),
                    "spcart"=>$this->ProductModel->GetSpCart()
                ]);
            }
        }
        function BuyNow($id){
            if (isset($_SESSION['username'])){
                $this->view("Main",[
                    "Page"=>"BuyNow",
                    "dmsp1"=>$this->Category->GetDM1(),
                    "dmsp3"=> $this->Category->GetDM3(),
                    "tbuser"=>$this->UserModel->GetThongBao(),
                    "spcart"=>$this->ProductModel->GetSpCart()
                ]);
            }
            else {
                $this->view("Main",[
                    "Page"=>"Check",
                    "dmsp1"=>$this->Category->GetDM1(),
                    "dmsp3"=> $this->Category->GetDM3(),
                    "tbuser"=>$this->UserModel->GetThongBao(),
                    "spcart"=>$this->ProductModel->GetSpCart()
                ]);
            }
        }
    }
?>