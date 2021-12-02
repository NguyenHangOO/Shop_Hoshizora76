<?php
    class RestPassword extends Controller{
        public $UserModel;

        public function __construct(){
            $this->UserModel = $this->model("UserModel");
        }
        function Show(){
            if(isset($_POST["btnReset"])){
                require "./public/PHPMailer/src/PHPMailer.php";
                require "./public/PHPMailer/src/SMTP.php";
                require './public/PHPMailer/src/Exception.php';
                $email = $_POST["email"];
                $kq = $this->UserModel->KiemTraMail($email);
                $row= json_decode($kq,true);
                if(count($row)>0){
                    $token = substr(MD5(rand(0,10000)),0,16);
                    $k =$this->UserModel->Token($token,$email);
                    if($k=="true"){
                        $mail = new PHPMailer\PHPMailer\PHPMailer(true);
                        try {
                            $mail->SMTPDebug = 2;
                            $mail->isSMTP();  
                            $mail->CharSet  = "utf-8";
                            $mail->Host = 'smtp.gmail.com';
                            $mail->SMTPAuth = true;
                            $nguoigui = 'hoshizorah76@gmail.com';
                            $matkhau = 'tkphu312568947';
                            $tennguoigui = 'Hoshizora76_Shop';
                            $mail->Username = $nguoigui; // SMTP username
                            $mail->Password = $matkhau;   // SMTP password
                            $mail->SMTPSecure = 'ssl';  // encryption TLS/SSL 
                            $mail->Port = 465;  // port to connect to                
                            $mail->setFrom($nguoigui, $tennguoigui ); 
                            $to = "$email";
                            $to_name = "ForgotPassword";
                            
                            $mail->addAddress($to, $to_name);
                            $mail->isHTML(true);  // Set email format to HTML
                            $mail->Subject = 'Cập nhật lại mật khẩu của bạn';      
                            $noidungthu = "<b>Chào bạn!</b><br>Đây là link cập nhật mật khẩu! Nhấn vào đây http://hoshizora76.tw/RestPassword/UpdatePass/$email/$token   <br> 
                            Không chia sẽ link cho bất kỳ ai." ;
                            $mail->Body = $noidungthu;
                            $mail->smtpConnect( array(
                                "ssl" => array(
                                    "verify_peer" => false,
                                    "verify_peer_name" => false,
                                    "allow_self_signed" => true
                                )
                            ));
                            $mail->send();
                            header("Location:/RestPassword/Messmage"); 
                        } catch (Exception $e) {
                            $relust = "Không thể gửi link xác nhận";
                        }
                        
                    }else {
                        $relust = "Lỗi không mong muốn đã xảy ra hãy truy cập lại";
                    }
                }else {
                    $kq = $this->UserModel->KiemTraMailAdmin($email);
                    $row2= json_decode($kq,true);
                    if(count($row2)>0){
                        $token = substr(MD5(rand(0,10000)),0,16);
                        $k =$this->UserModel->TokenAdmin($token,$email);
                        if($k=="true"){
                            $mail = new PHPMailer\PHPMailer\PHPMailer(true);
                            try {
                                $mail->SMTPDebug = 2;
                                $mail->isSMTP();  
                                $mail->CharSet  = "utf-8";
                                $mail->Host = 'smtp.gmail.com';
                                $mail->SMTPAuth = true;
                                $nguoigui = 'hoshizorah76@gmail.com';
                                $matkhau = 'tkphu312568947';
                                $tennguoigui = 'Hoshizora76_Shop';
                                $mail->Username = $nguoigui; // SMTP username
                                $mail->Password = $matkhau;   // SMTP password
                                $mail->SMTPSecure = 'ssl';  // encryption TLS/SSL 
                                $mail->Port = 465;  // port to connect to                
                                $mail->setFrom($nguoigui, $tennguoigui ); 
                                $to = "$email";
                                $to_name = "ForgotPassword";
                                
                                $mail->addAddress($to, $to_name);
                                $mail->isHTML(true);  // Set email format to HTML
                                $mail->Subject = 'Cập nhật lại mật khẩu của bạn';      
                                $noidungthu = "<b>Chào bạn!</b><br>Đây là link cập nhật mật khẩu! Nhấn vào đây http://hoshizora76.tw/RestPassword/UpdatePass/$email/$token   <br> 
                                Không chia sẽ link cho bất kỳ ai." ;
                                $mail->Body = $noidungthu;
                                $mail->smtpConnect( array(
                                    "ssl" => array(
                                        "verify_peer" => false,
                                        "verify_peer_name" => false,
                                        "allow_self_signed" => true
                                    )
                                ));
                                $mail->send();
                                header("Location:/RestPassword/Messmage"); 
                            } catch (Exception $e) {
                                $relust = "Không thể gửi link xác nhận";
                            }
                            
                        }else {
                            $relust = "Lỗi không mong muốn đã xảy ra hãy truy cập lại";
                        }
                    }else {
                        $relust = "Email chưa đăng ký tài khoản";
                    }
                }
                $this->view("RestPass",[
                    "relust"=>$relust
                ]);

            }else {
                $this->view("RestPass",[
                ]);
            }
        }
        function UpdatePass($email,$token){
            if(isset($_POST["btnUpReset"])){
                $password = $_POST["password"];
                $cfpassword = $_POST["cfpassword"];
                $loai = $_POST["loai"]; 
                if($password==$cfpassword){
                    $password = password_hash($password,PASSWORD_DEFAULT);
                    if($loai=="member"){
                        $this->UserModel->UpPassFo($password,$email);
                        $relust ="yes";
                        $token = substr(MD5(rand(0,10000)),0,16);
                        $this->UserModel->Token($token,$email);
                    }else {
                        if($loai=="admin"){
                            $kq = $this->UserModel->UpPassFoAdmin($password,$email);
                            $relust ="yes";
                            $token = substr(MD5(rand(0,10000)),0,16);
                            $k =$this->UserModel->TokenAdmin($token,$email);
                        }else{$relust ="no";}
                    }
                }
                else { 
                    $relust ="no";
                }
                $this->view("TestPassForgot",[
                    "relust" =>$relust
                ]);

            }else {
                $kq = $this->UserModel->KiemTraMailToken($email,$token);
                $row= json_decode($kq,true);
                if(count($row)>0){
                    $relust ="not";
                    $this->view("TestPassForgot",[
                        "relust" =>$relust,
                        "loai"=>"member"
                    ]);
                }else {
                    $kq = $this->UserModel->KiemTraMailTokenAdmin($email,$token);
                    $row2= json_decode($kq,true);
                    if(count($row2)>0){
                        $relust ="not";
                        $this->view("TestPassForgot",[
                            "relust" =>$relust,
                            "loai"=>"admin"
                        ]);
                    }else {
                        $this->view("404",[
                        ]);
                    }
                }
            }
            
        }
        function Messmage(){
            $this->view("Messmage",[
            ]);
        }
    }
?>