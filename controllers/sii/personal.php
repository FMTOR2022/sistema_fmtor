<?php
    require_once 'models/Model.php';
    require_once "routes/web.php";
    
    class personal {
        public $web;
        public $model; 

        public function __construct(){
            $this->model= new Model();
            $this->web = new Web();
        }

        public function info_personal_usuario () {
            if (isset($_SESSION['ZW1wbGVhZG8='])) {
                $result = $this->model->buscar('informacionempleados','id_empleados',$_SESSION['ZW1wbGVhZG8=']);
                echo json_encode($result);
            }
        }

        public function generar_pdf_renuncia () {
            $this->web->PDF('sii/cartaRenunciaPDF','');
        }

        public function generar_pdf_finiquito () {
            $this->web->PDF('sii/doc_finiquito','');
        }
    }
?>