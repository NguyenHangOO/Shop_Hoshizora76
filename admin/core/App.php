<?php
    class App{
        protected $controller="Sigin";
        protected $action="Show";
        protected $params=[];
        function __construct(){
            $arr = $this->UrlProcess();
            //print_r($arr); 
            //Xu ly controller
            
                if(file_exists("./admin/controllers/".$arr[0].".php")){
                    $this->controller = $arr[0];
                    unset($arr[0]);
                }
                require_once "./admin/controllers/".$this->controller.".php";
                $this->controller = new $this->controller;
                // Xu ly Action
                if(isset($arr[1])){
                    if(method_exists($this->controller,$arr[1])){
                        $this->action=$arr[1];
                    }
                    unset($arr[1]);
                }
                //Xu ly params
                $this->params = $arr?array_values($arr):[];
                call_user_func_array([$this->controller,$this->action],$this->params);   
        }
        function UrlProcess(){
            if(isset($_GET["url"])){
               return explode("/",filter_var(trim($_GET["url"], "/")) );    
            }
            return explode("/","Sigin");   
        }
    } 
?>