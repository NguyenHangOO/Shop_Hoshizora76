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
                    "DSDHTT"=>$this->OrderModel->GetDSDH(),
                    "DSDHHUY"=>$this->OrderModel->GetDSDHHUY()

                ]);
            }else{
                header("Location:/CodeApp/Shop_Hoshizora76/admin.php");
            }
        }
        function DetailExport($idma){
            if(isset($_SESSION['useradmin'])){
                $useradmin=$_SESSION['useradmin']; 
                $this->view("Main",[
                    "Page"=>"DetailExport",
                    "Admin"=>$this->UserModel->GetAdmin($useradmin),
                    "DSDHXL"=>$this->OrderModel->GetDSDHXL(),
                    "DSSP"=>$this->ProductModel->GetDSSP(),
                    "donhang"=>$this->OrderModel->DonHang($idma),
                    "donhangct"=>$this->OrderModel->DonHangChiTiet($idma),
                    "dgct"=>$this->OrderModel->DGDonHang($idma)
                ]);
            }else{
                header("Location:/CodeApp/Shop_Hoshizora76/admin.php");
            }
        }
        function Xulydonhang($idmem,$id){
            if(isset($_SESSION['useradmin'])){
                $kq = $this->OrderModel->Xylydonhang($id);
                if($kq=="true"){
                    date_default_timezone_set('Asia/Ho_Chi_Minh');
                    $ngay = date('Y-m-d H:i:s');
                    $nd="Đơn hàng ".$id." của bạn đã được chấp nhận";
                    $this->UserModel->ThongBao($idmem,$ngay,$nd);
                    header("Location:/CodeApp/Shop_Hoshizora76/admin.php?url=Order/orExport");
                }else{echo 'Xử lý thất bại';}
            }else {
                header("Location:/CodeApp/Shop_Hoshizora76/admin.php");
            }
        }
        function Huydonhang($idmem,$id){
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
                        }
                    header("Location:/CodeApp/Shop_Hoshizora76/admin.php?url=Order/orExport");
                }else{echo 'Xử lý thất bại';}
            }else {
                header("Location:/CodeApp/Shop_Hoshizora76/admin.php");
            }
        }
        function DangGiaodonhang($idmem,$id){
            if(isset($_SESSION['useradmin'])){
                $kq = $this->OrderModel->DangGiaodonhang($id);
                if($kq=="true"){
                    date_default_timezone_set('Asia/Ho_Chi_Minh');
                    $ngay = date('Y-m-d H:i:s');
                    $nd="Đơn hàng ".$id." của bạn đang được giao đến bạn";
                    $this->UserModel->ThongBao($idmem,$ngay,$nd);
                    header("Location:/CodeApp/Shop_Hoshizora76/admin.php?url=Order/orExport");
                }else{echo 'Xử lý thất bại';}
            }else {
                header("Location:/CodeApp/Shop_Hoshizora76/admin.php");
            }
        }
        function DaGiaodonhang($idmem,$id){
            if(isset($_SESSION['useradmin'])){
                $kq = $this->OrderModel->DaGiaodonhang($id);
                if($kq=="true"){
                    date_default_timezone_set('Asia/Ho_Chi_Minh');
                    $ngay = date('Y-m-d H:i:s');
                    $nd="Đơn hàng ".$id." của bạn đã được giao thành công";
                    $this->UserModel->ThongBao($idmem,$ngay,$nd);
                    header("Location:/CodeApp/Shop_Hoshizora76/admin.php?url=Order/orExport");
                }else{echo 'Xử lý thất bại';}
            }else {
                header("Location:/CodeApp/Shop_Hoshizora76/admin.php");
            }
        }
    }
?>