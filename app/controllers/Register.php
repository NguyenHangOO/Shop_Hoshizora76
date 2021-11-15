<?php
    class Register extends Controller{
        public $UserModel;
        public function __construct(){
            $this->UserModel = $this->model("UserModel");
        }
        function  Show(){
            $this->view("Signup",[    
            ]);
            //view
         }
        function Khachhangdk(){
            if(isset($_POST["btnSignup"])){
                $epass=true;
                $fullname = $_POST["fullname"];
                $username = $_POST["username"];
                $password = $_POST["password"];
                $cfpassword = $_POST["cfpassword"];
                $email = $_POST["email"];
                if($password==$cfpassword){
                    $password = password_hash($password,PASSWORD_DEFAULT);
                    $kq = $this->UserModel->InsertMember($fullname,$username,$password,$email);
                    $this->view("Signup",[
                        "result" => $kq
                    ]);
                }
                else { 
                    $this->view("Signup",[
                        "epass" => $epass
                    ]);
                }
            }
        } 
        function Sigin(){
            $this->view("Sigin",[    
            ]);
        }
        function Khachhangdn(){
            if(isset($_POST["btnSigin"])){
                $username = $_POST["username"];
                $password = $_POST["password"];
                //$password = password_hash($password, PASSWORD_DEFAULT);
                $kq = $this->UserModel->GetMember($username);
                $row= json_decode($kq,true);
                if(count($row)>0){
                    foreach ($row as list("id"=>$iduss,"password"=>$pass,"trangthai"=>$trangthai)){
                        if(password_verify($password,$pass)){
                            if($trangthai==1){
                                $_SESSION['username'] = $username;
                                $_SESSION['iduss'] = $iduss;
                                header("Location:/CodeApp/Shop_Hoshizora76/");
                            }
                            else{ $result = "lock";}
                        }
                        else {
                            $result = "no"; 
                        }
                    } 
                }else{
                    $kq2 = $this->UserModel->GetMemberEmail($username);
                    $row2= json_decode($kq2,true);
                    if(count($row2)>0){
                        foreach ($row2 as list("id"=>$iduss,"username"=>$user,"password"=>$pass,"trangthai"=>$trangthai)){
                            if(password_verify($password,$pass)){
                                if($trangthai==1){
                                    $_SESSION['username'] = $user;
                                    $_SESSION['iduss'] = $iduss;
                                    header("Location:/CodeApp/Shop_Hoshizora76/");
                                }
                                else{ $result = "lock";}
                            }
                            else {
                                $result = "no"; 
                            }
                        } 
                    }else{ $result = "nouser";}
                   
                }
				$this->view("Sigin",[
                // "result" => $kq,
                    "user"=> $username,
                    "result"=>$result   
                ]);
            }
        }
    }
?>