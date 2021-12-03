<?php
    class Account extends Controller{
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
        function Infomation(){
            if (isset($_SESSION['username'])){
                $username= $_SESSION['username'];
                $this->view("Main",[
                    "Page"=>"Account",
                    "giaodien"=>$this->UserModel->Giaodien(),
                    "dmsp1"=>$this->Category->GetDM1(),
                    "dmsp3"=> $this->Category->GetDM3(),
                    "spcart"=>$this->ProductModel->GetSpCart(),
                    "tbuser"=>$this->UserModel->GetThongBao(),
                    "ttuser"=>$this->UserModel->GetMember($username)
                ]); 
            }
            else{
                $this->view("404",[
                ]);
            }
        }
        function Notification(){
            if (isset($_SESSION['username'])){
                $username= $_SESSION['username'];
                $this->view("Main",[
                    "Page"=>"Notification",
                    "giaodien"=>$this->UserModel->Giaodien(),
                    "dmsp1"=>$this->Category->GetDM1(),
                    "dmsp3"=> $this->Category->GetDM3(),
                    "spcart"=>$this->ProductModel->GetSpCart(),
                    "ttuser"=>$this->UserModel->GetMember($username),
                    "tbuser"=>$this->UserModel->GetThongBao(),
                    "tbnd"=>$this->UserModel->GetTB()
                ]);
            }
            else{
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
        function Notifi($id){
            if (isset($_SESSION['username'])){
                $username= $_SESSION['username'];
                $iduss=$_SESSION['iduss'];
                $this->UserModel->DOCTB($id,$iduss);
                header("Location:/Account/Notification");
            }
            else{
                $this->view("404",[
                ]);
            }
        }
        
        function NotifiDel($id){
            if (isset($_SESSION['username'])){
                $username= $_SESSION['username'];
                $iduss=$_SESSION['iduss'];
                $this->UserModel->DELTB($id, $iduss);
                header("Location:/Account/Notification");
            }
            else{
                $this->view("404",[
                ]);
            }
        }
        function DelAllNotifi(){
            if (isset($_SESSION['username'])){
                $username= $_SESSION['username'];
                $iduss=$_SESSION['iduss'];
                $this->UserModel->DELTBALL($iduss);
                header("Location:/Account/Notification");
            }
            else{
                $this->view("404",[
                ]);
            }
        }
        function Avartar(){
            if (isset($_SESSION['username'])){
                $username = $_SESSION['username'];
                if(isset($_POST["btnUpload"])){
                    $filename=$_POST["anhtrc"];
                    if ($_FILES['uploadFile']['name'] != NULL) {
                        if ($_FILES['uploadFile']['type'] == "image/jpeg" || $_FILES['uploadFile']['type'] == "image/png" || $_FILES['uploadFile']['type'] == "image/gif") {
                            
                            $path = "./public/images/account/"; // Ảnh sẽ lưu vào thư mục images
                            $tmp_name = $_FILES['uploadFile']['tmp_name'];
                            //$name = $_FILES['uploadFile']['name'];
                            $temp = explode(".", $_FILES["uploadFile"]["name"]);
                            $newfilename = round(microtime(true)) .$username. '.' . end($temp);
                            move_uploaded_file($tmp_name, $path.$newfilename);
                            $image_url = $path . $newfilename; 
                            $kq = $this->UserModel->InsertImg($image_url,$username);
                            if($kq="true"){
                                if($filename!=$image_url && $filename !=""){
                                    if(file_exists($filename)) {
                                        unlink($filename);
                                    }
                                }     
                            }
                        } else {
                            $kq="kieufile";
                        }
                    } else {
                        $kq="kofile";
                    }
                    $this->view("Main",[
                        "Page"=>"Avartar",
                        "giaodien"=>$this->UserModel->Giaodien(),
                        "dmsp1"=>$this->Category->GetDM1(),
                        "dmsp3"=> $this->Category->GetDM3(),
                        "spcart"=>$this->ProductModel->GetSpCart(),
                        "ttuser"=>$this->UserModel->GetMember($username),
                        "tbuser"=>$this->UserModel->GetThongBao(),
                        "result" => $kq
                    ]);  
                }
                else { 
                    $this->view("Main",[
                        "Page"=>"Avartar",
                        "giaodien"=>$this->UserModel->Giaodien(),
                        "dmsp1"=>$this->Category->GetDM1(),
                        "dmsp3"=> $this->Category->GetDM3(),
                        "spcart"=>$this->ProductModel->GetSpCart(),
                        "ttuser"=>$this->UserModel->GetMember($username),
                        "tbuser"=>$this->UserModel->GetThongBao()
                    ]);
                }
            }
            else{
                $this->view("404",[
                ]);
            }
        }
        function Infor_oder(){
            if (isset($_SESSION['username'])){
                $username= $_SESSION['username'];
                $iduss = $_SESSION['iduss'];
                $this->view("Main",[
                    "Page"=>"Info_oder",
                    "giaodien"=>$this->UserModel->Giaodien(),
                    "dmsp1"=>$this->Category->GetDM1(),
                    "dmsp3"=> $this->Category->GetDM3(),
                    "spcart"=>$this->ProductModel->GetSpCart(),
                    "ttuser"=>$this->UserModel->GetMember($username),
                    "tbuser"=>$this->UserModel->GetThongBao(),
                    "dsdonhang"=>$this->OrderModel->GetDonHang($iduss),
                    "dsdonhanghuy"=>$this->OrderModel->GetDonHangHuy($iduss),
                    "dsdonhangxn"=>$this->OrderModel->GetDonHangXN($iduss),
                    "dsdonhangdag"=>$this->OrderModel->GetDonHangDagGiao($iduss),
                    "dsdonhangdg"=>$this->OrderModel->GetDonHangDa($iduss),
                    "dsdonhangcxn"=>$this->OrderModel->GetDonHangCXN($iduss)
                ]);
            }
            else{
                $this->view("404",[
                ]);
            }
        }
        function ShowAddress(){
            if (isset($_SESSION['username'])){
                $username= $_SESSION['username'];
                $this->view("Main",[
                    "Page"=>"Address",
                    "giaodien"=>$this->UserModel->Giaodien(),
                    "dmsp1"=>$this->Category->GetDM1(),
                    "dmsp3"=> $this->Category->GetDM3(),
                    "spcart"=>$this->ProductModel->GetSpCart(),
                    "ttuser"=>$this->UserModel->GetMember($username),
                    "tbuser"=>$this->UserModel->GetThongBao(),
                    "diachi"=>$this->UserModel->GetDiaChi($username),
                ]);
            }
            else{
                $this->view("404",[
                ]);
            }
        }
        function Address($create){
            if (isset($_SESSION['username'])){
                $username= $_SESSION['username'];
                if(isset($_POST["btnAddDC"])){
                    $hoten = $_POST["hoten"];
                    $sdt = $_POST["sdt"];
                    $diachi = $_POST["diachi"];
                    $xa = $_POST["xa"];
                    $huyen = $_POST["huyen"];
                    $tinh = $_POST["tinh"];
                    if(isset($_POST["macdinh"]))
                    {
                        $macdinh=1;
                        $chon=1;
                        $this->UserModel->UpMDAddress($create);
                    }
                    else { $macdinh = 0; $chon=0;}
                    $kq = $this->UserModel->InsertAddress($hoten,$sdt,$diachi,$macdinh,$create,$xa,$huyen,$tinh,$chon);
                    if($kq==true){
                        header("Location:/Account/ShowAddress");
                    }else{
                        $this->view("Main",[
                            "Page"=>"Create_Address",
                            "giaodien"=>$this->UserModel->Giaodien(),
                            "dmsp1"=>$this->Category->GetDM1(),
                            "dmsp3"=> $this->Category->GetDM3(),
                            "spcart"=>$this->ProductModel->GetSpCart(),
                            "ttuser"=>$this->UserModel->GetMember($username),
                            "tbuser"=>$this->UserModel->GetThongBao(),
                            "result"=>$kq
                        ]);
                    }  
                }
                else{
                    $this->view("Main",[
                        "Page"=>"Create_Address",
                        "giaodien"=>$this->UserModel->Giaodien(),
                        "dmsp1"=>$this->Category->GetDM1(),
                        "dmsp3"=> $this->Category->GetDM3(),
                        "spcart"=>$this->ProductModel->GetSpCart(),
                        "ttuser"=>$this->UserModel->GetMember($username),
                        "tbuser"=>$this->UserModel->GetThongBao()
                    ]);
                }
                
            }
            else{
                $this->view("404",[
                ]);
            }
        }
        function ChonAddress($create,$idcdc){
            if (isset($_SESSION['username'])){
                $iduss = $_SESSION['iduss'];
                $up = $this->UserModel->UpChonAddress($iduss);
                if($up=='true'){
                    $chn = $this->UserModel->ChonAddress($iduss,$idcdc);
                    if($chn=='true'){
                        if(isset($_SESSION['strDS'])){
                            $_SESSION['strDS1'] = $_SESSION['strDS'];
                            $_SESSION['arr1'] = $_SESSION['arr'];
                            $_SESSION['slpds1'] = $_SESSION['slpds'];
                            $_SESSION['btnMuaHang1'] = $_SESSION['btnMuaHang'];
                        }
                        header('Location: ' . $_SERVER['HTTP_REFERER']);
                    }
                }else{
                    echo 'Lỗi';
                }
                
            }
            else{
                $this->view("404",[
                ]);
            }
        }
        function EditAddress($create,$id){
            if (isset($_SESSION['username'])){
                $username= $_SESSION['username'];
                $iduss=$_SESSION['iduss'];
                if(isset($_POST["btnUpDC"])){
                    $result="kosdt";
                    $hoten = $_POST["hoten"];
                    $sdt = $_POST["sdt"];
                    $diachi = $_POST["diachi"];
                    $xa = $_POST["xa"];
                    $huyen = $_POST["huyen"];
                    $tinh = $_POST["tinh"];
                    if(isset($_POST["macdinh"]))
                    {
                        $macdinh=1;
                        $chon=1;
                        $this->UserModel->UpMDAddress($create);
                    }
                    else { $macdinh = 0; $chon=0;}
                    if((strlen($sdt)==11 || strlen($sdt)==10)){
                        $kq = $this->UserModel->UpAddress($hoten,$sdt,$diachi,$macdinh,$xa,$huyen,$tinh,$id,$chon);
                        if($kq=='true'){
                            header("Location:/Account/ShowAddress");
                        }else{
                            $result="false";
                        }
                    }
                    else{
                        $this->view("Main",[
                            "Page"=>"Create_Address",
                            "giaodien"=>$this->UserModel->Giaodien(),
                            "dmsp1"=>$this->Category->GetDM1(),
                            "dmsp3"=> $this->Category->GetDM3(),
                            "spcart"=>$this->ProductModel->GetSpCart(),
                            "ttuser"=>$this->UserModel->GetMember($username),
                            "tbuser"=>$this->UserModel->GetThongBao(),
                            "dchi"=>$this->UserModel->GetDChi($id,$iduss),
                            "updc"=>$result
                        ]);
                    }
                } 
                else{
                    $this->view("Main",[
                        "Page"=>"Create_Address",
                        "giaodien"=>$this->UserModel->Giaodien(),
                        "dmsp1"=>$this->Category->GetDM1(),
                        "dmsp3"=> $this->Category->GetDM3(),
                        "spcart"=>$this->ProductModel->GetSpCart(),
                        "ttuser"=>$this->UserModel->GetMember($username),
                        "tbuser"=>$this->UserModel->GetThongBao(),
                        "dchi"=>$this->UserModel->GetDChi($id,$iduss)
                    ]);
                }    
            }
            else{
                $this->view("404",[
                ]);
            }

        }
        function DelAddress($id){
            if (isset($_SESSION['username'])){
                $username= $_SESSION['username'];
                $this->UserModel->DELAddress($id);
                header("Location:/Account/ShowAddress");
            }
            else{
                $this->view("404",[
                ]);
            }
        }
        function UpInfo(){
            if (isset($_SESSION['username'])){
                $username= $_SESSION['username'];
                $result = "";
                if(isset($_POST["btnCapnhat"])){
                    $hoten = $_POST["hoten"];
                    $email = $_POST["email"];
                    $ngaysinh = $_POST["ngaysinh"];
                    $gioitinh=$_POST["exampleRadios"];
                    $mkcu = $_POST["mkcu"];
                    $mkmoi = $_POST["mkmoi"];
                    $mknl = $_POST["nhaplai"]; 
                    $kq = false;
                    if($mkcu ==""){
                        $kq = $this->UserModel->UpInfo($hoten,$email,$ngaysinh,$gioitinh,$username);
                    }else{
                        if($mkmoi==$mknl){
                            ///capnhatjmk
                            if(strlen($mkmoi)>=6 && strlen($mkmoi)<=32 ){
                                $user = $this->UserModel->GetMember($username);
                                $row= json_decode($user,true);
                                foreach ($row as list("password"=>$pass)){
                                    if(password_verify($mkcu,$pass)){
                                        $mkmoi = password_hash($mkmoi,PASSWORD_DEFAULT);
                                        $kq = $this->UserModel->UpInfoPass($hoten,$email,$ngaysinh,$gioitinh,$username,$mkmoi);
                                    }
                                    else {
                                        $result = "Mật khẩu hiện tại không đúng"; 
                                    }
                                }
                            }else {
                                $result="Mật khẩu phải từ 6 đến 32 ký tự";
                            }
                            
                        }else{
                            $result="Mật khẩu không khớp";
                        }
                    }
                    if($kq==true){
                        $result="Cập nhật thành công"; 
                    }
                    $this->view("Main",[
                        "Page"=>"Account",
                        "giaodien"=>$this->UserModel->Giaodien(),
                        "dmsp1"=>$this->Category->GetDM1(),
                        "dmsp3"=> $this->Category->GetDM3(),
                        "spcart"=>$this->ProductModel->GetSpCart(),
                        "ttuser"=>$this->UserModel->GetMember($username),
                        "tbuser"=>$this->UserModel->GetThongBao(),
                        "tb"=>$result
                    ]);
                } 
                else{
                    $this->view("404",[
                    ]);
                }    
            }
            else{
                $this->view("404",[
                ]);
            }

        }
        function AddressNow(){
            if (isset($_SESSION['username'])){
                $username= $_SESSION['username'];
                $create = $_SESSION['iduss'];
                if(isset($_POST["btnAddDC"])){
                    $hoten = $_POST["hoten"];
                    $sdt = $_POST["sdt"];
                    $diachi = $_POST["diachi"];
                    $xa = $_POST["xa"];
                    $huyen = $_POST["huyen"];
                    $tinh = $_POST["tinh"];
                    $macdinh=1;
                    $chon=1;
                    $kq = $this->UserModel->InsertAddress($hoten,$sdt,$diachi,$macdinh,$create,$xa,$huyen,$tinh,$chon);
                    if($kq==true){
                        header('Location: ' . $_SERVER['HTTP_REFERER']);
                    }else{
                        $this->view("Main",[
                            "Page"=>"Create_Address",
                            "giaodien"=>$this->UserModel->Giaodien(),
                            "dmsp1"=>$this->Category->GetDM1(),
                            "dmsp3"=> $this->Category->GetDM3(),
                            "spcart"=>$this->ProductModel->GetSpCart(),
                            "ttuser"=>$this->UserModel->GetMember($username),
                            "tbuser"=>$this->UserModel->GetThongBao(),
                            "result"=>$kq
                        ]);
                    }
                }  
            }
            else{
                $this->view("404",[
                ]);
            }
        }
        function Sigout(){
            if (isset($_SESSION['username'])){
                unset($_SESSION['username']);
                unset($_SESSION['iduss']);
                unset($_SESSION['nameuss']);
                // xóa session login
            }
            if (isset($_SESSION['idadmin'])){
                unset($_SESSION['idadmin']);
                unset($_SESSION['useradmin']);
                unset($_SESSION['nameadmin']);// xóa session login
            }
            header("Location:/");
         }
    }
?>