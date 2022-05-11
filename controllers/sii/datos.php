<?php
    require_once 'models/sii/personal.php';
    require_once "routes/web.php";
    class datos
    {
        public $web;
        public $model; 
        public function __construct(){
            // $this->model= new TcontrolOp();
            $this->web = new Web();
            $this->model = new personal();
        }

        public function datos()
        {
            $this->web->View('sii/datos','');
        }

        public function mostarDatos()
        {
           $data =  $this->model->mostrar('t_empleados');
           echo json_encode($data);

        }
    }
    

?>