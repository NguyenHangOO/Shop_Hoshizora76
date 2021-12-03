<?php
    class Product extends Controller{
        public $Category;
        public $ProductModel;
        public $UserModel;

        public function __construct(){
            $this->Category = $this->model("Category");
            $this->ProductModel = $this->model("ProductModel");
            $this->UserModel = $this->model("UserModel");
        }
        function  Show($id=1){
            if(isset($_SESSION['username'])){
                $username= $_SESSION['username'];
            }else { $username="";}
            $this->view("Main",[
                "Page"=>"Group",
                "giaodien"=>$this->UserModel->Giaodien(),
                "dsspdm"=>$this->ProductModel->GetSpTheoDM($id),
                "ds20sp"=>$this->ProductModel->Get20SP(),
                "tendm"=>$this->Category->GetDM($id),
                "dmsp1"=>$this->Category->GetDM1(),
                "dmsp3"=>$this->Category->GetDM3(),
                "tbuser"=>$this->UserModel->GetThongBao(),
                "spcart"=>$this->ProductModel->GetSpCart(),
                "ttuser"=>$this->UserModel->GetMember($username)
            ]);
         }
         function GroupCategory($id){
            if(isset($_SESSION['username'])){
                $username= $_SESSION['username'];
            }else { $username="";}
            $this->view("Main",[
                "Page"=>"Group",
                "giaodien"=>$this->UserModel->Giaodien(),
                "dsspdm"=>$this->ProductModel->GetSpTheoDM($id),
                "ds20sp"=>$this->ProductModel->Get20SP2($id),
                "tendm"=>$this->Category->GetDM($id),
                "dmsp1"=>$this->Category->GetDM1(),
                "dmsp3"=>$this->Category->GetDM3(),
                "tbuser"=>$this->UserModel->GetThongBao(),
                "spcart"=>$this->ProductModel->GetSpCart(),
                "ttuser"=>$this->UserModel->GetMember($username)
            ]);
         }
         function Grouptype($id,$lid){
            if(isset($_SESSION['username'])){
                $username= $_SESSION['username'];
            }else { $username="";}
            $this->view("Main",[
                "Page"=>"Group2",
                "giaodien"=>$this->UserModel->Giaodien(),
                "dmlid"=>$this->ProductModel->GetSpTheoDM1id($id,$lid),
                "dsspdm"=>$this->ProductModel->GetSpTheoDM2($id,$lid),
                "tendm"=>$this->Category->GetDM($id),
                "tenlid"=>$this->Category->GetDM1id($id,$lid),
                "dmsp1"=>$this->Category->GetDM1(),
                "dmsp3"=>$this->Category->GetDM3(),
                "tbuser"=>$this->UserModel->GetThongBao(),
                "spcart"=>$this->ProductModel->GetSpCart(),
                "ttuser"=>$this->UserModel->GetMember($username)
            ]);
         }
         function Detail($id,$trang){
            if(isset($_SESSION['username'])){
                $username= $_SESSION['username'];
            }else { $username="";}
            $this->ProductModel->TangLuotXem($id);
            if($trang==""){$trang=1;}
            $this->view("Main",[
                "Page"=>"Detail",
                "giaodien"=>$this->UserModel->Giaodien(),
                "dmsp1"=>$this->Category->GetDM1(),
                "dmsp3"=>$this->Category->GetDM3(),
                "tbuser"=>$this->UserModel->GetThongBao(),
                "ttuser"=>$this->UserModel->GetMember($username),
                "ds5sp"=>$this->ProductModel->Get5SPBC(),
                "ds20sp"=>$this->ProductModel->Get20SPID($id),
                "ctsp"=>$this->ProductModel->GetCTSPid($id),
                "ttctsp"=>$this->ProductModel->GetTTCTSP($id),
                "tendm"=>$this->ProductModel->GetTenDM($id),
                "danhgiapt"=>$this->ProductModel->GetDGPT($id,$trang),
                "danhgia"=>$this->ProductModel->GetDanhgia($id),
                "spcart"=>$this->ProductModel->GetSpCart(),
                "listanh"=>$this->ProductModel->ImagesSP($id),
                "trang"=>$trang,
                "idpt"=>$id
            ]);
         }
    }
?>