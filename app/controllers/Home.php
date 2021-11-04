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
            $this->view("Main",[
                "Page"=>"Home",
                "dmsp1"=>$this->Category->GetDM1(),
                "dmsp3"=> $this->Category->GetDM3(),
                "spcart"=>$this->ProductModel->GetSpCart(),
                "tbuser"=>$this->UserModel->GetThongBao(),
                "ds5sp"=>$this->ProductModel->Get5SP(),
                "ds20sp"=>$this->ProductModel->Get20SP()
            ]);
         }
         function All_SP($trang){
            $this->view("Main",[
                "Page"=>"All_sp",
                "dssppt"=>$this->ProductModel->GetSPPT($trang),
                "dssp"=>$this->ProductModel->GetSP(),
                "dmsp1"=>$this->Category->GetDM1(),
                "dmsp3"=> $this->Category->GetDM3(),
                "trang"=>$trang,
                "spcart"=>$this->ProductModel->GetSpCart(),
                "tbuser"=>$this->UserModel->GetThongBao()
            ]);  
        }    
    }
?>