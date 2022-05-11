<?php 

    require_once 'routes/web.php';
    require_once 'models/produccion/t_diario.php';

    class Diario {
        public $web;
        public $model;

        public function __construct() {
            $this->web = new Web();
            $this->model = new t_diario();
        }

        public function obtener_registros_diarios () {
            if (isset($_GET['estado']) && isset($_GET['fecha'])) {
                $this->model->setFecha($_GET['fecha']);
                $this->model->setEstado($_GET['estado']);
                $result = $this->model->obtener_registros();
                echo json_encode($result);
            } else {
                echo 0;
            }
        }
    }

?>