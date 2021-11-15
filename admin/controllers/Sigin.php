<?php 
    class Sigin extends Controller{
        public $UserModel;
        public function __construct(){
            $this->UserModel = $this->model("UserModel");
        }
        function Show(){
            $this->view("Sigin",[
            ]);
        }
        function CheckSigin(){
            if(isset($_POST["btnsigin"])){
                $username = $_POST["username"];
                $password = $_POST["password"];
                //$password = password_hash($password, PASSWORD_DEFAULT);
                $result = "";
                $kq = $this->UserModel->GetAdmin($username);
                $row= json_decode($kq,true);
                if(count($row)>0){
                    foreach ($row as list("password"=>$pass,"trangthai"=>$trangthai)){
                        if(password_verify($password,$pass)){
                            if($trangthai==1){
                                $_SESSION['useradmin'] = $username;
                                header("Location:/CodeApp/Shop_Hoshizora76/admin.php?url=Home/");
                            }
                            else{ $result = "lock";}
                        }
                        else {
                            $result = "no"; 
                        }
                    } 
                }else {
                    $kq2 = $this->UserModel->GetAdminEmail($username); 
                    $row2= json_decode($kq2,true);
                    if(count($row2)>0){
                        foreach ($row2 as list("username"=>$usa,"password"=>$pass,"trangthai"=>$trangthai)){
                            if(password_verify($password,$pass)){
                                if($trangthai==1){
                                    $_SESSION['useradmin'] = $usa;
                                    header("Location:/CodeApp/Shop_Hoshizora76/admin.php?url=Home/");
                                }
                                else{ $result = "lock";}
                            }
                            else {
                                $result = "no"; 
                            }
                        } 
                    }else {
                        $result = "NoAdmin";
                    }
                }
				$this->view("Sigin",[
                    // "result" => $kq,
                     "result"=>$result  
                 ]);
            }
        }
    }
?>