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
                    "giaodien"=>$this->UserModel->Giaodien(),
                    "dmsp1"=>$this->Category->GetDM1(),
                    "dmsp3"=> $this->Category->GetDM3(),
                    "tbuser"=>$this->UserModel->GetThongBao(),
                    "spcart"=>$this->ProductModel->GetSpCart()
                ]);
            }
        }
        function CartKhachHang(){
            if (isset($_SESSION['username'])){
                $username = $_SESSION['username'];
                if(isset($_SESSION['btnMuaHang'])){
                    unset($_SESSION['btnMuaHang']);
                    if(isset($_SESSION['chckall'])){
                        unset($_SESSION['chckall']);
                        if(isset($_SESSION['strDS'])){
                            unset($_SESSION['strDS']);
                            if(isset($_SESSION['arr'])){
                                unset($_SESSION['arr']);
                                unset($_SESSION['slpds']);
                            }
                            if(isset($_SESSION['strDS1'])){
                                unset($_SESSION['strDS1']);
                                unset($_SESSION['arr1']);
                                unset($_SESSION['slpds1']);
                                unset($_SESSION['btnMuaHang1']);
                            } 
                        }
                    }
                }
                $this->view("Main",[
                    "Page"=>"Cart",
                    "giaodien"=>$this->UserModel->Giaodien(),
                    "dmsp1"=>$this->Category->GetDM1(),
                    "dmsp3"=> $this->Category->GetDM3(),
                    "tbuser"=>$this->UserModel->GetThongBao(),
                    "spcart"=>$this->ProductModel->GetSpCart(),
                    "ttuser"=>$this->UserModel->GetMember($username)
                ]);
            }
            else {
                $this->view("Main",[
                    "Page"=>"Check",
                    "giaodien"=>$this->UserModel->Giaodien(),
                    "dmsp1"=>$this->Category->GetDM1(),
                    "dmsp3"=> $this->Category->GetDM3(),
                    "tbuser"=>$this->UserModel->GetThongBao(),
                    "spcart"=>$this->ProductModel->GetSpCart()   
                ]);
            }
        }
        function UpTangCartId($id,$idgh){
            if (isset($_SESSION['username'])){
                $username = $_SESSION['username'];
                $kq = $this->OrderModel->UpTCart($id,$idgh);
                if($kq=true){
                    header("Location:/Order/CartKhachHang");
                }else echo 'Lỗi xảy ra'; 
            }
            else {
                $this->view("Main",[
                    "Page"=>"Check",
                    "giaodien"=>$this->UserModel->Giaodien(),
                    "dmsp1"=>$this->Category->GetDM1(),
                    "dmsp3"=> $this->Category->GetDM3(),
                    "tbuser"=>$this->UserModel->GetThongBao(),
                    "spcart"=>$this->ProductModel->GetSpCart()
                ]);
            }
        }
        function UpGiamCartId($id,$idgh){
            if (isset($_SESSION['username'])){
                $username = $_SESSION['username'];
                $kq = $this->OrderModel->UpGCart($id,$idgh);
                if($kq=true){
                    header("Location:/Order/CartKhachHang");
                }else echo 'Lỗi xảy ra';
                
            }
            else {
                $this->view("Main",[
                    "Page"=>"Check",
                    "giaodien"=>$this->UserModel->Giaodien(),
                    "dmsp1"=>$this->Category->GetDM1(),
                    "dmsp3"=> $this->Category->GetDM3(),
                    "tbuser"=>$this->UserModel->GetThongBao(),
                    "spcart"=>$this->ProductModel->GetSpCart()
                ]);
            }
        }
        function BuyNow($id){
            if (isset($_SESSION['username'])){
                $username=$_SESSION['username'];
                $this->view("Main",[
                    "Page"=>"BuyNow",
                    "giaodien"=>$this->UserModel->Giaodien(),
                    "dmsp1"=>$this->Category->GetDM1(),
                    "dmsp3"=> $this->Category->GetDM3(),
                    "ttuser"=>$this->UserModel->GetMember($username),
                    "tbuser"=>$this->UserModel->GetThongBao(),
                    "spcart"=>$this->ProductModel->GetSpCart(),
                    "spbuynow"=>$this->ProductModel->GetCTSPid($id),
                    "diachi"=>$this->UserModel->GetDiaChi($username),
                    "ctsp"=>$this->ProductModel->GetCTSPid($id)
                ]);
            }
            else {
                $this->view("Main",[
                    "Page"=>"Check",
                    "giaodien"=>$this->UserModel->Giaodien(),
                    "dmsp1"=>$this->Category->GetDM1(),
                    "dmsp3"=> $this->Category->GetDM3(),
                    "tbuser"=>$this->UserModel->GetThongBao(),
                    "spcart"=>$this->ProductModel->GetSpCart()
                ]);
            }
        }
        function DelProductKH($id){
            if (isset($_SESSION['username'])){
                $iduss = $_SESSION['iduss'];
                $username = $_SESSION['username'];
                $kq = $this->OrderModel->DelCart($id,$iduss);
                if($kq=true){
                    header("Location:/Order/CartKhachHang");
                }else echo 'Lỗi xảy ra';
            }
            else {
                $this->view("Main",[
                    "Page"=>"Check",
                    "giaodien"=>$this->UserModel->Giaodien(),
                    "dmsp1"=>$this->Category->GetDM1(),
                    "dmsp3"=> $this->Category->GetDM3(),
                    "tbuser"=>$this->UserModel->GetThongBao(),
                    "spcart"=>$this->ProductModel->GetSpCart()
                ]);
            }
        }
        function DelAllProductKH(){
            if (isset($_SESSION['username'])){
                $iduss = $_SESSION['iduss'];
                $username = $_SESSION['username'];
                $kq = $this->OrderModel->DelAllCart($iduss);
                if($kq=true){
                    header("Location:/Order/CartKhachHang");
                }else echo 'Lỗi xảy ra';
            }
            else {
                $this->view("Main",[
                    "Page"=>"Check",
                    "giaodien"=>$this->UserModel->Giaodien(),
                    "dmsp1"=>$this->Category->GetDM1(),
                    "dmsp3"=> $this->Category->GetDM3(),
                    "tbuser"=>$this->UserModel->GetThongBao(),
                    "spcart"=>$this->ProductModel->GetSpCart()
                ]);
            }
        }
        function ThanhToan(){
            if (isset($_SESSION['username'])){
                $iduss = $_SESSION['iduss'];
                $username = $_SESSION['username'];
                if(isset($_POST["btnMua"])){
                    $iddc = $_POST['idDiaChi'];
                    $slgdat = $_POST['soluongdat'];
                    $idsp = $_POST['idSP'];
                    $giasp = $_POST['GiaSP'];
                    $thanhtien = $slgdat*$giasp;
                    date_default_timezone_set('Asia/Ho_Chi_Minh');
                    $ngay = date('Y-m-d H:i:s');
                    $iddh = $timestamp = time()+rand(1,9999);
                    //$iddh = (rand(0,99).$timestamp.rand(1,999));
                    $indh=$this->OrderModel->InDonHang($iddh,$iddc,$iduss,$ngay,$thanhtien);
                    if($indh=='true'){
                        $inctdh=$this->OrderModel->InCTDonHang($iddh,$idsp,$giasp,$slgdat,$thanhtien);
                        if($inctdh=='true'){
                            $diem = -1;
                            $upslgsp = $this->ProductModel->UpSlgSp($idsp,$slgdat);
                            $uplmsp = $this->ProductModel->TangLuotMua($idsp,$slgdat);
                            $kqdg = $this->OrderModel->DanhFrist($diem,$iduss,$idsp,$ngay,$iddh);
                            if($upslgsp=='true'){
                                header("Location:/Order/DetailOrder/$iddh");
                            }
                        }
                    }
                }else{
                    if(isset($_POST["btnMuaAll"])){
                        date_default_timezone_set('Asia/Ho_Chi_Minh');
                        $ngay = date('Y-m-d H:i:s');
                        $iddh = $timestamp = time()+rand(1,9999);
                        $dscart = $this->ProductModel->GetSpCart();
                        $row= json_decode($dscart,true);
                        $tongtien=0;
                        $iddc = $_POST['idDiaChi'];
                        foreach ($row as list("id"=>$id,"slgton"=>$slton,"slg"=>$slg,"ttban"=>$ttban,"giaban"=>$giaban)){
                            if($slton<1 || $ttban==0){}
                            else{
                                $tongtien=$tongtien + ($slg*$giaban);
                            }
                        }
                        $indh=$this->OrderModel->InDonHang($iddh,$iddc,$iduss,$ngay,$tongtien);
                        if($indh=='true'){
                            foreach ($row as list("id"=>$idsp,"tensp"=>$tensp,"hinhanh"=>$img,"giaban"=>$giasp,"slg"=>$slgdat,"slgton"=>$slton,"ttban"=>$ttban)){
                                if($slton<1 || $ttban==0){}
                                else{
                                    $inctdh=$this->OrderModel->InCTDonHang($iddh,$idsp,$giasp,$slgdat,$thanhtien=$giasp*$slgdat);
                                }
                            }
                            if($inctdh=='true'){
                                $diem = -1;
                                foreach ($row as list("id"=>$idsp,"tensp"=>$tensp,"hinhanh"=>$img,"giaban"=>$giasp,"slg"=>$slgdat,"slgton"=>$slton,"ttban"=>$ttban)){
                                    if($slton<1 || $ttban==0){}
                                    else{
                                        $upslgsp = $this->ProductModel->UpSlgSp($idsp,$slgdat);
                                        $uplmsp = $this->ProductModel->TangLuotMua($idsp,$slgdat);
                                        $kqdg = $this->OrderModel->DanhFrist($diem,$iduss,$idsp,$ngay,$iddh);
                                        $delcart = $this->OrderModel->DelCart($idsp,$iduss);
                                    }
                                }
                                if($upslgsp=='true'){
                                    unset($_SESSION['chckall']);
                                    unset($_SESSION['btnMuaHang']);
                                    header("Location:/Order/DetailOrder/$iddh");
                                }
                            }
                        }

                    }else {
                        if(isset($_POST["btnMuaNA"])){
                            date_default_timezone_set('Asia/Ho_Chi_Minh');
                            $ngay = date('Y-m-d H:i:s');
                            $iddh = $timestamp = time()+rand(1,9999);
                            $dscart = $this->ProductModel->GetSpCart();
                            $row= json_decode($dscart,true);
                            $tongtien=0;
                            $iddc = $_POST['idDiaChi'];
                            $mang = $_SESSION['arr'];
                            $slgmang = $_SESSION['slpds'];
                            foreach ($row as list("id"=>$id,"slgton"=>$slton,"slg"=>$slg,"ttban"=>$ttban,"giaban"=>$giaban)){
                                for($i=0;$i<$slgmang-1;$i++){
                                    if($id==$mang["$i"]){
                                        $tongtien=$tongtien + ($slg*$giaban);
                                    } 
                                }
                            }
                            $indh=$this->OrderModel->InDonHang($iddh,$iddc,$iduss,$ngay,$tongtien);
                            if($indh=='true'){
                                foreach ($row as list("id"=>$idsp,"tensp"=>$tensp,"hinhanh"=>$img,"giaban"=>$giasp,"slg"=>$slgdat,"slgton"=>$slton,"ttban"=>$ttban)){
                                    for($i=0;$i<$slgmang-1;$i++){
                                        if($idsp==$mang["$i"]){
                                            $inctdh=$this->OrderModel->InCTDonHang($iddh,$idsp,$giasp,$slgdat,$thanhtien=$giasp*$slgdat);
                                        }
                                    }
                                }
                                if($inctdh=='true'){
                                    $diem = -1;
                                    foreach ($row as list("id"=>$idsp,"tensp"=>$tensp,"hinhanh"=>$img,"giaban"=>$giasp,"slg"=>$slgdat,"slgton"=>$slton,"ttban"=>$ttban)){
                                        for($i=0;$i<$slgmang-1;$i++){
                                            if($idsp==$mang["$i"]){
                                                $upslgsp = $this->ProductModel->UpSlgSp($idsp,$slgdat);
                                                $uplmsp = $this->ProductModel->TangLuotMua($idsp,$slgdat);
                                                $kqdg = $this->OrderModel->DanhFrist($diem,$iduss,$idsp,$ngay,$iddh);
                                                $delcart = $this->OrderModel->DelCart($idsp,$iduss);
                                            }
                                        }
                                    }
                                    if($upslgsp=='true'){
                                        unset($_SESSION['strDS']);
                                        unset($_SESSION['arr']);
                                        unset($_SESSION['slpds']);
                                        unset($_SESSION['btnMuaHang']);
                                        if(isset($_SESSION['strDS1'])){
                                            unset($_SESSION['strDS1']);
                                            unset($_SESSION['arr1']);
                                            unset($_SESSION['slpds1']);
                                            unset($_SESSION['btnMuaHang1']);
                                        }
                                        header("Location:/Order/DetailOrder/$iddh");
                                    }
                                }
                            }
                        }else {
                            $this->view("404",[
                            ]);
                        }
                    } 
                }
            }
            else {
                $this->view("Main",[
                    "Page"=>"Check",
                    "giaodien"=>$this->UserModel->Giaodien(),
                    "dmsp1"=>$this->Category->GetDM1(),
                    "dmsp3"=> $this->Category->GetDM3(),
                    "tbuser"=>$this->UserModel->GetThongBao(),
                    "spcart"=>$this->ProductModel->GetSpCart()
                ]);
            }
        }
        function DetailOrder($idma){
            if (isset($_SESSION['username'])){
                $iduss = $_SESSION['iduss'];
                $username = $_SESSION['username'];
                $this->view("Main",[
                    "Page"=>"DetailOrder",
                    "giaodien"=>$this->UserModel->Giaodien(),
                    "dmsp1"=>$this->Category->GetDM1(),
                    "dmsp3"=> $this->Category->GetDM3(),
                    "tbuser"=>$this->UserModel->GetThongBao(),
                    "spcart"=>$this->ProductModel->GetSpCart(),
                    "donhang"=>$this->OrderModel->DonHang($iduss,$idma),
                    "donhangct"=>$this->OrderModel->DonHangChiTiet($idma),
                    "dgct"=>$this->OrderModel->DGDonHang($idma),
                    "ttuser"=>$this->UserModel->GetMember($username)
                ]);
            }
            else {
                $this->view("Main",[
                    "Page"=>"Check",
                    "giaodien"=>$this->UserModel->Giaodien(),
                    "dmsp1"=>$this->Category->GetDM1(),
                    "dmsp3"=> $this->Category->GetDM3(),
                    "tbuser"=>$this->UserModel->GetThongBao(),
                    "spcart"=>$this->ProductModel->GetSpCart()
                ]);
            }
        }
        function DanhGia($idma,$idcsp){
            if (isset($_SESSION['username'])){
                $iduss = $_SESSION['iduss'];
                $username = $_SESSION['username'];
                if(isset($_POST["btndanhgia"])){
                    $idsp = $_POST['idSP'];
                    date_default_timezone_set('Asia/Ho_Chi_Minh');
                    $ngay = date('Y-m-d H:i:s');
                    $bl = $_POST['binhluan'];
                   if(isset($_POST["star5"])){
                       $diem=5;
                   }else  if(isset($_POST["star4"])){
                            $diem=4;
                    }else if(isset($_POST["star3"])){
                                $diem=3;
                        }else if(isset($_POST["star2"])){
                                    $diem=2;
                            }else { $diem=1;}
                            $kqdg = $this->OrderModel->DanhGiaDiem($diem,$iduss,$idsp,$bl,$ngay,$idma);
                            if($kqdg=='true'){
                                $this->OrderModel->ResetDiem($idsp);
                                $this->view("Main",[
                                    "Page"=>"DetailOrder",
                                    "giaodien"=>$this->UserModel->Giaodien(),
                                    "dmsp1"=>$this->Category->GetDM1(),
                                    "dmsp3"=> $this->Category->GetDM3(),
                                    "tbuser"=>$this->UserModel->GetThongBao(),
                                    "spcart"=>$this->ProductModel->GetSpCart(),
                                    "donhang"=>$this->OrderModel->DonHang($iduss,$idma),
                                    "donhangct"=>$this->OrderModel->DonHangChiTiet($idma),
                                    "dgct"=>$this->OrderModel->DGDonHang($idma),
                                    "ttuser"=>$this->UserModel->GetMember($username)
                                ]);
                            }else {echo 'Lỗi đánh giá';}
                }else{
                    $this->view("Main",[
                        "Page"=>"DanhGia",
                        "giaodien"=>$this->UserModel->Giaodien(),
                        "dmsp1"=>$this->Category->GetDM1(),
                        "dmsp3"=> $this->Category->GetDM3(),
                        "tbuser"=>$this->UserModel->GetThongBao(),
                        "spcart"=>$this->ProductModel->GetSpCart(),
                        "ttuser"=>$this->UserModel->GetMember($username),
                        "donhangct"=>$this->OrderModel->DonHangChiTiet($idma),
                        "dgct"=>$this->OrderModel->DGDonHang($idma),
                        "idcsp"=>$idcsp
                    ]);
                }
            }
            else {
                $this->view("Main",[
                    "Page"=>"Check",
                    "giaodien"=>$this->UserModel->Giaodien(),
                    "dmsp1"=>$this->Category->GetDM1(),
                    "dmsp3"=> $this->Category->GetDM3(),
                    "tbuser"=>$this->UserModel->GetThongBao(),
                    "spcart"=>$this->ProductModel->GetSpCart()
                ]);
            }
        }
        function HuyDonMua($idma){
            if (isset($_SESSION['username'])){
                $iduss = $_SESSION['iduss'];
                $username = $_SESSION['username'];
                $kt = $this->OrderModel->DonHang($iduss,$idma);
                $rowkt = json_decode($kt,true);
                foreach ($rowkt as list("tinhtrang"=>$trangthai)){
                    if($trangthai !="Đã hủy"){
                        $huy= $this->OrderModel->HuyDon($idma,$iduss);
                        date_default_timezone_set('Asia/Ho_Chi_Minh');
                        $ngay = date('Y-m-d H:i:s');
                        $nd="Đơn hàng ".$idma." của bạn đã được hủy thành công";
                        if($huy=='true'){
                            $tthuy=$this->OrderModel->DonHangChiTiet($idma);
                            $rowtt = json_decode($tthuy,true);
                            foreach ($rowtt as list("sanpham_id"=>$idsp,"soluong"=>$slgdat)){
                                $this->ProductModel->UpSlgHuySp($idsp,$slgdat);
                                $this->ProductModel->GiamLuotMua($idsp,$slgdat);
                            } 
                            $this->UserModel->ThongBao($iduss,$ngay,$nd);
                            $this->view("Main",[
                                "Page"=>"DetailOrder",
                                "giaodien"=>$this->UserModel->Giaodien(),
                                "dmsp1"=>$this->Category->GetDM1(),
                                "dmsp3"=> $this->Category->GetDM3(),
                                "tbuser"=>$this->UserModel->GetThongBao(),
                                "spcart"=>$this->ProductModel->GetSpCart(),
                                "ttuser"=>$this->UserModel->GetMember($username),
                                "donhang"=>$this->OrderModel->DonHang($iduss,$idma),
                                "donhangct"=>$this->OrderModel->DonHangChiTiet($idma),
                                "dgct"=>$this->OrderModel->DGDonHang($idma),
                                "huy"=>'yes'
                            ]);
                        }else{echo 'Lỗi hủy đơn';}
                    }else {
                        header("Location:/Order/DetailOrder/$idma"); 
                    }
                } 
                
            }
            else {
                $this->view("Main",[
                    "Page"=>"Check",
                    "giaodien"=>$this->UserModel->Giaodien(),
                    "dmsp1"=>$this->Category->GetDM1(),
                    "dmsp3"=> $this->Category->GetDM3(),
                    "tbuser"=>$this->UserModel->GetThongBao(),
                    "spcart"=>$this->ProductModel->GetSpCart()
                ]);
            }
        }
        function ShoppingCartPayment(){
            if (isset($_SESSION['username'])){
                $username=$_SESSION['username'];
                $iduss = $_SESSION['iduss'];
                if(isset($_POST["btnMuaHang"]) || isset($_SESSION['btnMuaHang'])){
                    if(isset($_POST['chckall']) || isset($_SESSION['chckall'])){
                        if(isset($_SESSION['chckall']) || isset($_SESSION['btnMuaHang'])){}
                        else {
                            $_SESSION['chckall'] = $_POST['chckall'];
                            $_SESSION['btnMuaHang'] = $_POST["btnMuaHang"];
                        }
                        $this->view("Main",[
                            "Page"=>"CartPayment",
                            "giaodien"=>$this->UserModel->Giaodien(),
                            "dmsp1"=>$this->Category->GetDM1(),
                            "dmsp3"=> $this->Category->GetDM3(),
                            "tbuser"=>$this->UserModel->GetThongBao(),
                            "spcart"=>$this->ProductModel->GetSpCart(),
                            "ttuser"=>$this->UserModel->GetMember($username),
                            "diachi"=>$this->UserModel->GetDiaChi($username)
                        ]);
                    }else{
                        if(isset($_SESSION['strDS1'])){
                            $_SESSION['btnMuaHang'] = $_SESSION['btnMuaHang1'];
                            $_SESSION['strDS'] = $_SESSION['strDS1'];
                            $_SESSION['arr'] = $_SESSION['arr1'];
                            $_SESSION['slpds'] = $_SESSION['slpds1'];
                            unset($_SESSION['btnMuaHang1']);
                            unset($_SESSION['strDS1']);
                            unset($_SESSION['arr1']);
                            unset($_SESSION['slpds1']);
                        }else {
                            $_SESSION['btnMuaHang'] = $_POST["btnMuaHang"];
                            $_SESSION['strDS'] = $_POST['dsidsp'];
                            $_SESSION['arr'] = explode(" ",$_SESSION['strDS']);
                            $_SESSION['slpds'] = count($_SESSION['arr']);
                        }
                        $this->view("Main",[
                            "Page"=>"CartNAPayment",
                            "giaodien"=>$this->UserModel->Giaodien(),
                            "dmsp1"=>$this->Category->GetDM1(),
                            "dmsp3"=> $this->Category->GetDM3(),
                            "tbuser"=>$this->UserModel->GetThongBao(),
                            "spcart"=>$this->ProductModel->GetSpCart(),
                            "diachi"=>$this->UserModel->GetDiaChi($username),
                            "ttuser"=>$this->UserModel->GetMember($username),
                            "slgmang"=>$_SESSION['slpds'],
                            "mang"=>$_SESSION['arr']
                        ]);
                    }
                }else{
                    $this->view("404",[
                    ]);
                }
            }
            else {
                $this->view("Main",[
                    "Page"=>"Check",
                    "giaodien"=>$this->UserModel->Giaodien(),
                    "dmsp1"=>$this->Category->GetDM1(),
                    "dmsp3"=> $this->Category->GetDM3(),
                    "tbuser"=>$this->UserModel->GetThongBao(),
                    "spcart"=>$this->ProductModel->GetSpCart()
                ]);
            }
        }
    }
?>