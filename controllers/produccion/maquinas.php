<?php 

    require_once 'models/produccion/t_maquinas.php';
    require_once 'routes/web.php';

    class Maquinas {
        public $model_maquinas;
        public $web;

        public function __construct() {
            $this->model_maquinas = new t_maquinas();
            $this->web = new Web();
        }

        public function obtener_reporte () {
            if (isset($_GET['inicio']) && isset($_GET['fin']) && isset($_GET['concepto']) && isset($_GET['vista'])) {
                $this->model_maquinas->setFechaInicio($_GET['inicio']);
                $this->model_maquinas->setFechaFin($_GET['fin']);
                $this->model_maquinas->setConcepto($_GET['concepto']);
                $id_vista = $_GET['vista'];
                $vista = '';
                if ($id_vista == 1) {
                    $vista = 'forjado';
                } else if ($id_vista == 2) {
                    $vista = 'ranurado';
                } else if ($id_vista == 3) {
                    $vista = 'rolado';
                } else if ($id_vista == 4) {
                    $vista = 'shank';
                } else if ($id_vista == 6) {
                    $vista = 'acabado';
                }
                $this->model_maquinas->setVista($vista);
                $result = $this->model_maquinas->obtener_reporte_maquinas();
                echo json_encode($result);
            } else {
                echo 0;
            }
        }

        public function pdf_maquinas () {
            if (isset($_GET['fecha_reporte']) && isset($_GET['kilos_pzas']) && isset($_GET['estado'])) {
                $this->model_maquinas->setFechaInicio($_GET['fecha_reporte']);
                $this->model_maquinas->setConcepto($_GET['kilos_pzas']);
                $vista = '';
                if ($_GET['estado'] == 1) {
                    $vista = 'forjado';
                } else if ($_GET['estado'] == 2) {
                    $vista = 'ranurado';
                } else if ($_GET['estado'] == 3) {
                    $vista = 'rolado';
                } else if ($_GET['estado'] == 4) {
                    $vista = 'shank';
                } else if ($_GET['estado'] == 6) {
                    $vista = 'acabado';
                }
                $this->model_maquinas->setVista($vista);
                $data = $this->model_maquinas->obtener_informacion_PDF();
                $this->web->PDF('produccion/maquinas',$data);
            } else {
                echo 0;
            }
        }
    }

?>