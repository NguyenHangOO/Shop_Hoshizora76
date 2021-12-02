<?php 
    class Member extends Controller{
        public $UserModel;
        public $OrderModel;
        public function __construct(){
            $this->UserModel = $this->model("UserModel");
            $this->OrderModel = $this->model("OrderModel");
        }
        function Show(){
            $this->view("404",[
            ]);
        }
        function Manage(){
            if(isset($_SESSION['useradmin'])){
                $useradmin=$_SESSION['useradmin']; 
                $this->view("Main",[
                    "Page"=>"Manage",
                    "DSAdmin"=>$this->UserModel->GetDSAdmin(),
                    "Admin"=>$this->UserModel->GetAdmin($useradmin),
                    "DSDHXL"=>$this->OrderModel->GetDSDHXL()
                ]);
            }else{
                header("Location:/Register/Sigin");
            }
        }
        function InsertManage(){
            if(isset($_SESSION['useradmin'])){
                $useradmin=$_SESSION['useradmin'];
                $relust = "";
                if(isset($_POST["btnAddNV"])){
                    $fullname = $_POST["hoten"];
                    $email = $_POST["email"];
                    $username = $_POST["username"];
                    $pass=$username."123456";
                    $pass = password_hash($pass,PASSWORD_DEFAULT);
                    $kq = $this->UserModel->Thennhanvien($fullname,$email,$username,$pass);
                    if($kq=="true"){
                        $relust="Thêm thành công";
                    }else { $relust="Thêm không thành công";}
                    $this->view("Main",[
                        "Page"=>"AddManage",
                        "DSDHXL"=>$this->OrderModel->GetDSDHXL(),
                        "Admin"=>$this->UserModel->GetAdmin($useradmin),
                        "tbc2"=>$relust
                    ]);
                }
                else {
                    $this->view("Main",[
                        "Page"=>"AddManage",
                        "DSDHXL"=>$this->OrderModel->GetDSDHXL(),
                        "Admin"=>$this->UserModel->GetAdmin($useradmin)
                    ]);
                } 
                
            }else{
                $this->view("404",[
                ]);
            }
        }
        function UserMH(){
            if(isset($_SESSION['useradmin'])){
                $useradmin = $_SESSION['useradmin'];
                $this->view("Main",[
                    "Page"=>"Member_User",
                    "Admin"=>$this->UserModel->GetAdmin($useradmin),
                    "DSMember"=>$this->UserModel->GetDSMember(),
                    "DSDHXL"=>$this->OrderModel->GetDSDHXL()
                ]);
            }else{
                header("Location:/Register/Sigin");
            }
        }
        function Hosocanhan(){
            if(isset($_SESSION['useradmin'])){
                $useradmin = $_SESSION['useradmin'];
                $relust = "";
                if(isset($_POST["btnUpload"])){
                    $fullname = $_POST["hoten"];
                    $email = $_POST["email"];
                    $anhcu = $_POST["anhtrc"];
                    if ($_FILES['uploadFile']['name'] != NULL) {
                        if ($_FILES['uploadFile']['type'] == "image/jpeg" || $_FILES['uploadFile']['type'] == "image/png" || $_FILES['uploadFile']['type'] == "image/gif") {
                            // Nếu là ảnh tiến hành code upload
                            $path = "./public/images/account/"; 
                            $tmp_name = $_FILES['uploadFile']['tmp_name'];
                            $name = $_FILES['uploadFile']['name']; 
                            move_uploaded_file($tmp_name, $path . $name);
                            $image_url = $path . $name;
                            ///goi model
                            $kq = $this->UserModel->Capnhathoso($fullname,$email,$image_url,$useradmin);
                            if($kq=="true"){
                                if($anhcu!=""){
                                    if($anhcu!=$image_url){
                                        unlink($anhcu);
                                    }  
                                }
                                $relust="Cập nhật thành công";
                            }
                        } else {
                            // Không phải file ảnh
                            $relust="Không phải file ảnh";
                        }
                    } else {
                         $kq = $this->UserModel->Capnhathosokoanh($fullname,$email,$useradmin);
                         if($kq=="true"){
                            $relust="Cập nhật thành công";
                        }
                    }
                    $this->view("Main",[
                        "Page"=>"Hosocanhan",
                        "Admin"=>$this->UserModel->GetAdmin($useradmin),
                        "DSDHXL"=>$this->OrderModel->GetDSDHXL(),
                        "Account"=>"Hoso",
                        "tbc"=>$relust
                    ]);
                }
                else {
                    $this->view("Main",[
                        "Page"=>"Hosocanhan",
                        "Admin"=>$this->UserModel->GetAdmin($useradmin),
                        "DSDHXL"=>$this->OrderModel->GetDSDHXL(),
                        "Account"=>"Hoso"
                    ]);
                }
                
            }else{
                header("Location:/Register/Sigin");
            }
        }
        function Capnhatmatkhau(){
            if(isset($_SESSION['useradmin'])){
                $useradmin = $_SESSION['useradmin'];
                $relust = "";
                if(isset($_POST["btnMatkhau"])){
                    $mkcu = $_POST["matkhaucu"];
                    $mkmoi = $_POST["matkhaumoi"];
                    $nhaplai = $_POST["nhaplai"];
                    if($mkmoi==$nhaplai){
                        if(strlen($mkmoi)>=6 && strlen($mkmoi)<=32 ){
                            $ktpass = $this->UserModel->GetAdmin($useradmin);
                            $row= json_decode($ktpass,true);
                            foreach ($row as list("password"=>$pass)){
                                if(password_verify($mkcu,$pass)){
                                    $mkmoi = password_hash($mkmoi,PASSWORD_DEFAULT);
                                    $kq = $this->UserModel->Capnhatmatkhau($mkmoi,$useradmin);
                                    if($kq=='true'){
                                        $relust="Cập nhật thành công"; 
                                    }
                                }
                                else {
                                    $relust = "Mật khẩu hiện tại không đúng";
                                }
                            }
                        }else {
                            $relust="Mật khẩu phải từ 6 đến 32 ký tự";
                        }
                    }
                    else{
                        $relust = "Mật khẩu không khớp";
                    }
                    $this->view("Main",[
                        "Page"=>"Hosocanhan",
                        "Admin"=>$this->UserModel->GetAdmin($useradmin),
                        "DSDHXL"=>$this->OrderModel->GetDSDHXL(),
                        "Account"=>"Matkhau",
                        "tb"=>$relust
                    ]);
                } else {
                    $this->view("Main",[
                        "Page"=>"Hosocanhan",
                        "Admin"=>$this->UserModel->GetAdmin($useradmin),
                        "DSDHXL"=>$this->OrderModel->GetDSDHXL(),
                        "Account"=>"Matkhau"
                    ]);
                }
                
            }else{
                header("Location:/Register/Sigin");
            }
        }
        function LockStaff($id){
            if(isset($_SESSION['useradmin'])){
               $kq = $this->UserModel->LockStaff($id);
               if($kq=="true"){
                header("Location:/admin.php?url=Member/Manage");
                }else{echo 'Xử lý thất bại';}
            }else{
                header("Location:/Register/Sigin");
            }
        }
        function UnlockStaff($id){
            if(isset($_SESSION['useradmin'])){
               $kq = $this->UserModel->UnlockStaff($id);
               if($kq=="true"){
                header("Location:/admin.php?url=Member/Manage");
                }else{echo 'Xử lý thất bại';}
            }else{
                header("Location:/Register/Sigin");
            }
        }
        function LockUser($id){
            if(isset($_SESSION['useradmin'])){
               $kq = $this->UserModel->LockUser($id);
               if($kq=="true"){
                header("Location:/admin.php?url=Member/UserMH");
                }else{echo 'Xử lý thất bại';}
            }else{
                header("Location:/Register/Sigin");
            }
        }
        function UnlockUser($id){
            if(isset($_SESSION['useradmin'])){
               $kq = $this->UserModel->UnlockUser($id);
               if($kq=="true"){
                header("Location:/admin.php?url=Member/UserMH");
                }else{echo 'Xử lý thất bại';}
            }else{
                header("Location:/Register/Sigin");
            }
        }
        
        function GrantPermission($id){
            if(isset($_SESSION['useradmin'])){
               $kq = $this->UserModel->GrantPermission($id);
               if($kq=="true"){
                header("Location:/admin.php?url=Member/Manage");
                }else{echo 'Xử lý thất bại';}
            }else{
                header("Location:/Register/Sigin");
            }
        }
        function Sigout(){
            if (isset($_SESSION['useradmin'])){
                unset($_SESSION['useradmin']);
                unset($_SESSION['idadmin']);
                unset($_SESSION['nameadmin']); // xóa session login
            }
            if(isset($_SESSION["iddh"])){
                unset($_SESSION["ngay"]);
                unset($_SESSION["iddh"]);
            }
            header("Location:/CodeApp/Shop_Hoshizora76");
         }
         function SigoutBack(){
            if (isset($_SESSION['useradmin'])){
                unset($_SESSION['useradmin']);
                unset($_SESSION['idadmin']);
                unset($_SESSION['nameadmin']); // xóa session login
            }
            if(isset($_SESSION["iddh"])){
                unset($_SESSION["ngay"]);
                unset($_SESSION["iddh"]);
            }
            header("Location:/Register/Sigin");
         }
    }