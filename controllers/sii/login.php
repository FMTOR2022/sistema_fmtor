<?php
    require_once 'models/sii/login.php';
    require_once "routes/web.php";
    class datos
    {
        public $web;
        public $model; 
        public function __construct(){
            //$this->model= new TcontrolOp();
            $this->web = new Web();
            $this->model = new personal();
        }

    }
    

?>