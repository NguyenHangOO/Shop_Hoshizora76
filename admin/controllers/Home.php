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
                    "DSDH"=>$this->OrderModel->GetDSDHhome(),
                    "DSTTDH"=>$this->OrderModel->GetDTDH($m),
                    "DSDHXL"=>$this->OrderModel->GetDSDHXL()
                ]);
            }else {
                header("Location:/CodeApp/Shop_Hoshizora76/Register/Sigin");
            }
        }
        function Xulydonhang($id,$idmem){
            if(isset($_SESSION['useradmin'])){
                $kq = $this->OrderModel->Xylydonhang($id);
                if($kq=="true"){
                    date_default_timezone_set('Asia/Ho_Chi_Minh');
                    $ngay = date('Y-m-d H:i:s');
                    $nd="Đơn hàng ".$id." của bạn đã được chấp nhận";
                    $this->UserModel->ThongBao($idmem,$ngay,$nd);
                    header("Location:/CodeApp/Shop_Hoshizora76/admin.php?url=Home/");
                }else{echo 'Xử lý thất bại';}
            }else {
                header("Location:/CodeApp/Shop_Hoshizora76/Register/Sigin");
            }
        }
        function Huydonhang($id,$idmem){
            if(isset($_SESSION['useradmin'])){
                $kq = $this->OrderModel->Huydonhang($id);
                if($kq=="true"){
                    date_default_timezone_set('Asia/Ho_Chi_Minh');
                    $ngay = date('Y-m-d H:i:s');
                    $nd="Đơn hàng ".$id." của bạn đã được hủy từ người bán";
                    $this->UserModel->ThongBao($idmem,$ngay,$nd);
                    $ct = $this->OrderModel->GetDONCTid($id);
                    $row= json_decode($ct,true);
                        foreach ($row as list("sanpham_id"=>$idsp,"soluong"=>$slgdat)){
                            $upslgsp = $this->ProductModel->UpSlgSp($idsp,$slgdat);
                            $this->ProductModel->GiamLuotMua($idsp,$slgdat);
                        }
                    header("Location:/CodeApp/Shop_Hoshizora76/admin.php?url=Home/");
                }else{echo 'Xử lý thất bại';}
            }else {
                header("Location:/CodeApp/Shop_Hoshizora76/Register/Sigin");
            }
        }
    }
?>