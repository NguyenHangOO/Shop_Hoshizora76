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
                    "giaodien"=>$this->UserModel->Giaodien(),
                    "banner"=>$this->UserModel->Banner(),
                    "Admin"=>$this->UserModel->GetAdmin($useradmin),
                    "DSMember"=>$this->UserModel->GetDSMember(),
                    "DSSP"=>$this->ProductModel->GetDSSP(),
                    "DSDH"=>$this->OrderModel->GetDSDHhome(),
                    "DSTTDH"=>$this->OrderModel->GetDTDH($m),
                    "DSDHXL"=>$this->OrderModel->GetDSDHXL()
                ]);
            }else {
                header("Location:/Register/Sigin");
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
                    header("Location:/admin.php?url=Home/");
                }else{echo 'Xử lý thất bại';}
            }else {
                header("Location:/Register/Sigin");
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
                    header("Location:/admin.php?url=Home/");
                }else{echo 'Xử lý thất bại';}
            }else {
                header("Location:/Register/Sigin");
            }
        }
        function ConfigDisplay(){
            if(isset($_SESSION['useradmin'])){
                $useradmin = $_SESSION['useradmin'];
                if(isset($_POST["btncapnhat"])){
                    $footer =  $_POST["footer"];
                    $anhtrctop =  $_POST["anhtrctop"];
                    $anhtrcbottom =  $_POST["anhtrcbottom"];
                    if ($_FILES['uploadtop']['name'] != NULL) {
                        if ($_FILES['uploadtop']['type'] == "image/jpeg" || $_FILES['uploadtop']['type'] == "image/png" || $_FILES['uploadtop']['type'] == "image/gif") {
                            $path = "./public/images/display/"; 
                            $tmp_name = $_FILES['uploadtop']['tmp_name'];
                            //$name = $_FILES['uploadtop']['name']; 
                            $temp = explode(".", $_FILES["uploadtop"]["name"]);
                            $newfilename = round(microtime(true)) .$useradmin. 'top.' . end($temp);
                            move_uploaded_file($tmp_name, $path . $newfilename);
                            $image_top = $path . $newfilename;
                            if ($_FILES['uploadbottom']['name'] != NULL) {
                                if ($_FILES['uploadbottom']['type'] == "image/jpeg" || $_FILES['uploadbottom']['type'] == "image/png" || $_FILES['uploadbottom']['type'] == "image/gif") {
                                    $path = "./public/images/display/"; 
                                    $tmp_name = $_FILES['uploadbottom']['tmp_name'];
                                    //$name = $_FILES['uploadbottom']['name']; 
                                    $temp = explode(".", $_FILES["uploadbottom"]["name"]);
                                    $newfilenameb = round(microtime(true)) .$useradmin. 'bottom.' . end($temp);
                                    move_uploaded_file($tmp_name, $path . $newfilenameb);
                                    $image_bottom = $path . $newfilenameb;
                                } else {
                                    $relust="Right-bottom không phải ảnh";
                                }
                            } else {
                                $image_bottom = $anhtrcbottom;
                            }
                        } else {
                            $relust="Right-top không phải ảnh";
                        }
                    } else {
                        $image_top = $anhtrctop;
                        if ($_FILES['uploadbottom']['name'] != NULL) {
                            if ($_FILES['uploadbottom']['type'] == "image/jpeg" || $_FILES['uploadbottom']['type'] == "image/png" || $_FILES['uploadbottom']['type'] == "image/gif") {
                                $path = "./public/images/display/"; 
                                $tmp_name = $_FILES['uploadbottom']['tmp_name'];
                                //$name = $_FILES['uploadbottom']['name']; 
                                $temp = explode(".", $_FILES["uploadbottom"]["name"]);
                                $newfilenameb = round(microtime(true)) .$useradmin. 'bottom.' . end($temp);
                                move_uploaded_file($tmp_name, $path . $newfilenameb);
                                $image_bottom = $path . $newfilenameb;
                            } else {
                                $relust="Right-bottom không phải ảnh";
                            }
                        } else {
                            $image_bottom = $anhtrcbottom;
                        }
                    }
                    $up = $this->UserModel->UPGiaodien($image_top,$image_bottom,$footer);
                    if($up=="true"){
                        if($anhtrctop!=""){
                            if($anhtrctop!=$image_top){
                                if(file_exists($anhtrctop)) {
                                    unlink($anhtrctop);
                                }
                            }  
                        }
                        if($anhtrcbottom!=""){
                            if($anhtrcbottom!=$image_bottom){
                                if(file_exists($anhtrcbottom)) {
                                    unlink($anhtrcbottom);
                                }
                            }  
                        }
                        $relust="Cập nhật thành công";
                    }
                    $ktanh = $_FILES['img_file']['name'];
                    if (!empty($ktanh[0])) {
                        $stt = 0;
                        $list = $this->UserModel->Banner(); 
                        $del = $this->UserModel->delBanner();
                        if($del=="true"){
                            $rowh = json_decode($list,true);
                            if(count($rowh)> 0){
                                foreach($rowh as list("img"=>$hinhanh)){
                                    if(file_exists($hinhanh)) {
                                        unlink($hinhanh);
                                    }  
                                }
                            }
                            foreach($_FILES['img_file']['name'] as $name => $value)
                            {
                                $stt++;
                                $temp = explode(".", $_FILES['img_file']['name'][$name]);
                                $name_img = 'banner'.$stt. '.' . end($temp);
                                $source_img = $_FILES['img_file']['tmp_name'][$name];
                                $path_img = "./public/images/banner/" . $name_img;
                                move_uploaded_file($source_img, $path_img);
                                $this->UserModel->inBanner($path_img);
                            } 
                        }else { $relust="no";
                            $tb = "Cập nhật ảnh banner thất bại";
                        }   
                    }
                    header('Location: ' . $_SERVER['HTTP_REFERER']);
                }else {
                    $this->view("404",[
                    ]);
                }
            }else {
                header("Location:/Register/Sigin");
            }
        }
    }
?>