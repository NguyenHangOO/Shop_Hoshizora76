<?php
    class Home extends Controller{
        public $Category;
        public $ProductModel;
        public $UserModel;
        
        public function __construct(){
            $this->Category = $this->model("Category");
            $this->ProductModel = $this->model("ProductModel");
            $this->UserModel = $this->model("UserModel");
        }
        function  Show(){
            if(isset($_SESSION['username'])){
                $username= $_SESSION['username'];
            }else { $username="";}
            $this->view("Main",[
                "Page"=>"Home",
                "banner"=>$this->UserModel->Banner(),
                "giaodien"=>$this->UserModel->Giaodien(),
                "dmsp1"=>$this->Category->GetDM1(),
                "dmsp3"=> $this->Category->GetDM3(),
                "spcart"=>$this->ProductModel->GetSpCart(),
                "tbuser"=>$this->UserModel->GetThongBao(),
                "ds5sp"=>$this->ProductModel->Get5SP(),
                "ds20sp"=>$this->ProductModel->Get20SP(),
                "ttuser"=>$this->UserModel->GetMember($username)
            ]);
         }
         function All_SP($trang){
            if(isset($_SESSION['username'])){
                $username= $_SESSION['username'];
            }else { $username="";}
            $this->view("Main",[
                "Page"=>"All_sp",
                "giaodien"=>$this->UserModel->Giaodien(),
                "dssppt"=>$this->ProductModel->GetSPPT($trang),
                "dssp"=>$this->ProductModel->GetSP(),
                "dmsp1"=>$this->Category->GetDM1(),
                "dmsp3"=> $this->Category->GetDM3(),
                "trang"=>$trang,
                "spcart"=>$this->ProductModel->GetSpCart(),
                "tbuser"=>$this->UserModel->GetThongBao(),
                "ttuser"=>$this->UserModel->GetMember($username)
            ]);  
        }    
    }
?>