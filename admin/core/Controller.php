<?php
     class Controller {
        public function model($model){
            require_once "./admin/models/".$model.".php";
            return new $model;
        }
        public function view($view,$data=[]){
            require_once "./admin/views/".$view.".php";
           // return new $view;
        }
    }  
?>