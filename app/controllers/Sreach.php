<?php
    class Sreach extends Controller{
        public $Category;
        public $ProductModel;
        public $UserModel;
        
        public function __construct(){
            $this->Category = $this->model("Category");
            $this->ProductModel = $this->model("ProductModel");
            $this->UserModel = $this->model("UserModel");
        }
        function  Show(){
            $this->view("404",[
            ]);
         }
        function ProductOne(){
            if(isset($_POST["btnSreach"])){
                $srch = $_POST["dulieu"];
                $this->view("Main",[
                    "Page"=>"Sreach",
                    "dmsp1"=>$this->Category->GetDM1(),
                    "dmsp3"=> $this->Category->GetDM3(),
                    "spcart"=>$this->ProductModel->GetSpCart(),
                    "tbuser"=>$this->UserModel->GetThongBao(),
                    "sptk"=>$this->ProductModel->SreachPro($srch),
                    "ds20sp"=>$this->ProductModel->Get20SP(),
                    "dulieu"=>$srch

                ]);
            }else {
                $this->view("404",[
                ]);
            }
        }
    }
?>