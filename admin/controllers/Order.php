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
                if(isset($_POST["btnLoc"])) {
                    $bd=$_POST["bdngay"];
                    $kt=$_POST["endngay"];
                    $this->view("Main",[
                        "Page"=>"Export",
                        "Admin"=>$this->UserModel->GetAdmin($useradmin),
                        "DSDHXL"=>$this->OrderModel->GetDSDHXL(),
                        "DSAll"=>$this->OrderModel->GetAllFilter($bd,$kt),
                        "DSDHXN"=>$this->OrderModel->GetDSDHXN(),
                        "DSDHDG"=>$this->OrderModel->GetDSDHDG(),
                        "DSDHTT"=>$this->OrderModel->GetDSDH(),
                        "DSDHHUY"=>$this->OrderModel->GetDSDHHUY(),
                        "bd"=>$bd,
                        "kt"=>$kt
                    ]);
                }else {
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
                }
               
            }else{
                header("Location:/CodeApp/Shop_Hoshizora76/Register/Sigin");
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
                header("Location:/CodeApp/Shop_Hoshizora76/Register/Sigin");
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
                header("Location:/CodeApp/Shop_Hoshizora76/Register/Sigin");
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
                            $this->ProductModel->GiamLuotMua($idsp,$slgdat);
                        }
                    header("Location:/CodeApp/Shop_Hoshizora76/admin.php?url=Order/orExport");
                }else{echo 'Xử lý thất bại';}
            }else {
                header("Location:/CodeApp/Shop_Hoshizora76/Register/Sigin");
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
                header("Location:/CodeApp/Shop_Hoshizora76/Register/Sigin");
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
                header("Location:/CodeApp/Shop_Hoshizora76/Register/Sigin");
            }
        }
        function orImport(){
            if(isset($_SESSION['useradmin'])){
                $useradmin=$_SESSION['useradmin'];
                if(isset($_POST["btnLoc"])) {
                    $bd=$_POST["bdngay"];
                    $kt=$_POST["endngay"];
                    $this->view("Main",[
                        "Page"=>"Import",
                        "Admin"=>$this->UserModel->GetAdmin($useradmin),
                        "DSDHXL"=>$this->OrderModel->GetDSDHXL(),
                        "donhang"=>$this->OrderModel->GetDNFilter($bd,$kt),
                        "bd"=>$bd,
                        "kt"=>$kt
                    ]);
                }else{
                    $this->view("Main",[
                        "Page"=>"Import",
                        "Admin"=>$this->UserModel->GetAdmin($useradmin),
                        "DSDHXL"=>$this->OrderModel->GetDSDHXL(),
                        "donhang"=>$this->OrderModel->GetDNDESC()
                    ]);
                }
            }else {
                header("Location:/CodeApp/Shop_Hoshizora76/Register/Sigin");
            }
        }
        function AddImport(){
            if(isset($_SESSION['useradmin'])){
                $useradmin=$_SESSION['useradmin'];
                date_default_timezone_set('Asia/Ho_Chi_Minh');
                if(isset($_SESSION["ngay"])|| isset($_SESSION["iddh"])){
                }else{
                    $_SESSION["ngay"] = date('Y-m-d H:i:s');
                    $_SESSION["iddh"] = $timestamp = time()+rand(25,898989);
                }
                $this->view("Main",[
                    "Page"=>"AddImport",
                    "Admin"=>$this->UserModel->GetAdmin($useradmin),
                    "DSDHXL"=>$this->OrderModel->GetDSDHXL(),
                    "CTDH"=>$this->OrderModel->DonNhapCTId($_SESSION["iddh"]),
                    "DSSP"=>$this->ProductModel->GetDSSP()
                ]);
            }else {
                header("Location:/CodeApp/Shop_Hoshizora76/Register/Sigin");
            }
        }
        function AddSPDonHang(){
            if(isset($_SESSION['useradmin'])){
                $useradmin=$_SESSION['useradmin'];
                if(isset($_POST["btnaddsp"])){
                    $idsp =  $_POST["idsp"];
                    $soluong = $_POST["soluong"];
                    $arr = explode(",",$idsp);
                    $thanhtien = $arr[1] * $soluong;
                    $dh = $this->OrderModel->GetDonNhap($_SESSION["iddh"]);
                    $row= json_decode($dh,true);
                    if($idsp==""){
                        header("Location:/CodeApp/Shop_Hoshizora76/admin.php?url=Order/AddImport");
                    }else {
                        if(count($row)==0){
                            $this->OrderModel->InsertDonNhap($_SESSION["iddh"],$_SESSION["idadmin"],$_SESSION["ngay"]);
                        }
                        $ktct = $this->OrderModel->KTCTId($_SESSION["iddh"],$arr[0]);
                        $row2= json_decode($ktct,true);
                        if(count($row2)==0){
                            $addct = $this->OrderModel->AddChiTiet($_SESSION["iddh"],$arr[0],$arr[1],$soluong,$thanhtien);
                            if($addct=="true"){
                                header("Location:/CodeApp/Shop_Hoshizora76/admin.php?url=Order/AddImport");
                            }else {
                                $this->view("Main",[
                                    "Page"=>"AddImport",
                                    "Admin"=>$this->UserModel->GetAdmin($useradmin),
                                    "DSDHXL"=>$this->OrderModel->GetDSDHXL(),
                                    "CTDH"=>$this->OrderModel->DonNhapCTId($_SESSION["iddh"]),
                                    "DSSP"=>$this->ProductModel->GetDSSP(),
                                    "tontai"=>"tontai"
                                ]);
                            }
                        }else {
                            $this->view("Main",[
                                "Page"=>"AddImport",
                                "Admin"=>$this->UserModel->GetAdmin($useradmin),
                                "DSDHXL"=>$this->OrderModel->GetDSDHXL(),
                                "CTDH"=>$this->OrderModel->DonNhapCTId($_SESSION["iddh"]),
                                "DSSP"=>$this->ProductModel->GetDSSP(),
                                "tontai"=>"tontai"
                            ]);
                        } 
                    }
                }else {
                    $this->view("Main",[
                        "Page"=>"404"
                    ]);
                }
            }else {
                header("Location:/CodeApp/Shop_Hoshizora76/Register/Sigin");
            }
        }
        function SaveImport($idma,$tongtien){
            if(isset($_SESSION['useradmin'])){
                $useradmin=$_SESSION['useradmin'];
                $kq = $this->OrderModel->UpDonNhap($idma,$tongtien);
                if($kq=="true"){
                    if(isset($_SESSION["iddh"])){
                        unset($_SESSION["ngay"]);
                        unset($_SESSION["iddh"]);
                    }
                    $ctdh = $this->OrderModel->DonNhapCTId($idma);
                    $row= json_decode($ctdh,true);
                    foreach ($row as list("sanpham_id"=>$idsp,"soluong"=>$soluong)){
                        $upslgsp = $this->ProductModel->UpSlgSp($idsp,$soluong);
                    }
                    header("Location:/CodeApp/Shop_Hoshizora76/admin.php?url=Order/DetailImport/$idma");
                }else {
                    echo "Lỗi không thể lưu đơn hàng";
                }
            }else {
                header("Location:/CodeApp/Shop_Hoshizora76/Register/Sigin");
            }
        }
        function DetailImport($idma){
            if(isset($_SESSION['useradmin'])){
                $useradmin=$_SESSION['useradmin'];
                $this->view("Main",[
                    "Page"=>"DetailImport",
                    "Admin"=>$this->UserModel->GetAdmin($useradmin),
                    "DSDHXL"=>$this->OrderModel->GetDSDHXL(),
                    "CTDH"=>$this->OrderModel->DonNhapCTId($idma),
                    "DSSP"=>$this->ProductModel->GetDSSP(),
                    "donhang"=>$this->OrderModel->GetDN($idma)
                ]);
            }else {
                header("Location:/CodeApp/Shop_Hoshizora76/Register/Sigin");
            }
        }
        function DelImport($idma){
            if(isset($_SESSION['useradmin'])){
                $useradmin=$_SESSION['useradmin'];
                $kq= $this->OrderModel->DelDonNhap($idma);
                if($kq=="true"){
                    $kq2 = $this->OrderModel->DelDonNhapCT($idma);
                    if($kq2=="true"){
                        if(isset($_SESSION["iddh"])){
                            unset($_SESSION["ngay"]);
                            unset($_SESSION["iddh"]);
                        }
                        header("Location:/CodeApp/Shop_Hoshizora76/admin.php?url=Order/orImport");
                    }
                }
            }else {
                header("Location:/CodeApp/Shop_Hoshizora76/Register/Sigin");
            }
        }
        function DelDetailIm($idsp,$idma){
            if(isset($_SESSION['useradmin'])){
                $useradmin=$_SESSION['useradmin'];
                $kq= $this->OrderModel->DelDetailIm($idsp,$idma);
                if($kq=="true"){
                    
                    header("Location:/CodeApp/Shop_Hoshizora76/admin.php?url=Order/AddImport");
                }
            }else {
                header("Location:/CodeApp/Shop_Hoshizora76/Register/Sigin");
            }
        }
    }
?>