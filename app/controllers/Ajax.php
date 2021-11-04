<?php
    class Ajax extends Controller{

        public $UserModel;
        public function __construct(){
            $this->UserModel = $this->model("UserModel");
        }

        public function checkUsername(){
            $un = $_POST["un"];
            echo  $this->UserModel->checkUsername($un);
        }
    }
?>
