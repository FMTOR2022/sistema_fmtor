<?php 

    require_once "models/Model.php";
    require_once "models/produccion/t_estado.php";
    require_once "routes/web.php";

    class Estado {
        public $model;
        public $model_estado;
        public $web;
    
        public function __construct(){
            $this->model = new Model();
            $this->model_estado = new t_estado();
            $this->web = new Web();
        }

        public function obtener() {
            $this->model_estado->setVista('v_estado_op');
            $data = $this->model_estado->obtener_informacion();
            echo json_encode($data);
        }

        public function pdf_estado () {
            $this->model_estado->setVista('v_estado_op');
            $data = $this->model_estado->obtener_informacion();
            $this->web->PDF('produccion/estado',$data);
        }
    }

?>