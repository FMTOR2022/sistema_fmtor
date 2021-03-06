<?php
    require_once "models/Model.php";
    require_once "models/produccion/t_control_op.php";
    require_once "routes/web.php";

    class control {
        public $model;
        public $model_control;
        public $web;

        public function __construct(){
            $this->model = new Model();
            $this->model_control = new TcontrolOp();
            $this->web = new Web();
        }

        public function obtener_control() {
            if (isset($_GET['control']) && $_GET['control'] != '') {
                $control = json_decode($_GET['control']);

                $this->model_control->setOp($control->op);
                $this->model_control->setVista($control->vista);
                
                $result = $this->model_control->obtener_control();
                $json = json_encode($result);
                echo $json;
            } else {
                echo 0;
            }
        }

        public function pdf_control () {
            if (isset($_GET['valor'])) {
                $control = $this->model->buscar('v_control','Orden_Produccion',$_GET['valor']);
                $this->model= new Model();
                $forjado = $this->model->buscar('v_forjado','Id_Produccion_FK_1',$_GET['valor']);
                $this->model= new Model();
                $ranurado = $this->model->buscar('v_ranurado','Id_Produccion_FK_1',$_GET['valor']);
                $this->model= new Model();
                $rolado = $this->model->buscar('v_rolado','Id_Produccion_FK_1',$_GET['valor']);
                $this->model= new Model();
                $shank = $this->model->buscar('v_shank','Id_Produccion_FK_1',$_GET['valor']);
                $this->model= new Model();
                $cementado = $this->model->buscar('v_cementado','Id_Produccion_FK_1',$_GET['valor']);
                $this->model= new Model();
                $acabado = $this->model->buscar('v_acabado','Id_Produccion_FK_1',$_GET['valor']);
                $this->model= new Model();
                $condicion = "Id_Produccion_FK_1 = '".$_GET['valor']."'";
                $factores = $this->model->buscar_personalizado('t_control_produccion','factor',$condicion);

                $data = [
                    "control" => $control,
                    "forjado" => $forjado,
                    "ranurado" => $ranurado,
                    "rolado" => $rolado,
                    "shank" => $shank,
                    "cementado" => $cementado,
                    "acabado" => $acabado,
                    "factores" => $factores
                ];

                $this->web->PDF('produccion/control',$data);
            } else {
                echo 0;
            }
        }

        public function pdf_control_vacio () {
            if (isset($_GET['valor'])) {
                $control = $this->model->buscar('v_control','Orden_Produccion',$_GET['valor']);

                $data = [
                    "control" => $control
                ];

                $this->web->PDF('produccion/control_vacio',$data);
            } else {
                echo 0;
            }
        }

        public function pdf_reporte_diario () {
            if (isset($_GET['fecha']) && isset($_GET['estado']) && isset($_GET['turno'])) {
                $fecha = $_GET['fecha'];
                $turno = $_GET['turno'];
                $estado = $_GET['estado'];

                $campos = '*';
                $tabla = 'v_reportediario';
                $condicion = "fecha = '".$fecha."' AND turno = '".$turno."' AND estado_general = '".$estado."'";
                
                $data = $this->model->buscar_personalizado($tabla,$campos,$condicion);
                $this->web->PDF('produccion/diario',$data);
            }
        }

        public function obtener_info_op () {
            if (isset($_GET['op']) && $_GET['op'] != '') {
                $this->model_control->setOp($_GET['op']);
                $result = $this->model_control->obtener_informacion_op();
                echo json_encode($result);
            }
        }

        public function insertar() {
            if (isset($_POST['estado']) && isset($_POST['op'])) {
                if (isset($_POST['no_maquina'])) {
                    $this->model_control->setNoMaquina($_POST['no_maquina']);
                } else {
                    $this->model_control->setNoMaquina(0);
                }
                $this->model_control->setFechaEntrega($_POST['fecha']);
                $this->model_control->setBote($_POST['no_botes']);
                $this->model_control->setPzas($_POST['pzas']);
                $this->model_control->setKilos($_POST['kg']);
                $this->model_control->setTurno($_POST['turno']);
                $this->model_control->setObservaciones($_POST['observaciones']);

                $this->model_control->setOp($_POST['op']);
                $this->model_control->setIdEstado($_POST['estado']);

                $result = $this->model_control->insertar_registro();
                if ($result) {
                    echo 1;
                } else {
                    echo 2;
                }
            } else {
                echo 0;
            }
        }

        public function insertar_sin_op () {
            if (isset($_POST['estado']) && $_POST['estado'] != '') {
                if (isset($_POST['no_maquina'])) {
                    $this->model_control->setNoMaquina($_POST['no_maquina']);
                } else {
                    $this->model_control->setNoMaquina(0);
                }
                $this->model_control->setFechaEntrega($_POST['fecha']);
                $this->model_control->setBote($_POST['no_botes']);
                $this->model_control->setPzas($_POST['pzas']);
                $this->model_control->setKilos($_POST['kg']);
                $this->model_control->setTurno($_POST['turno']);
                $this->model_control->setObservaciones($_POST['observaciones']);

                $this->model_control->setIdEstado($_POST['estado']);

                $result = $this->model_control->insertar_registro_sin_op();
                if ($result) {
                    echo 1;
                } else {
                    echo 2;
                }
            } else {
                echo 0;
            }
        }

        public function obtener_registro () {
            if (isset($_GET['registro'])) {
                $this->model_control->setId($_GET['registro']);
                $result = $this->model_control->obtener_registro_diario();
                echo json_encode($result);
            }
        }

        public function obtener_registro_diario () {
            if (isset($_GET['registro'])) {
                $this->model_control->setId($_GET['registro']);
                $result = $this->model_control->obtener_registro_diario_e();
                echo json_encode($result);
            }
        }

        public function actualizar(){
            if (isset($_POST['a_op'])) {
                $this->model_control->setNoMaquina($_POST['a_no_maquina']);
                $this->model_control->setFechaEntrega($_POST['a_fecha']);
                $this->model_control->setBote($_POST['a_no_botes']);
                $this->model_control->setPzas($_POST['a_pzas']);
                $this->model_control->setKilos($_POST['a_kg']);
                $this->model_control->setTurno($_POST['a_turno']);
                $this->model_control->setObservaciones($_POST['a_observaciones']);

                $this->model_control->setOp($_POST['a_op']);

                $result = $this->model_control->actualizar_registro();

                if ($result) {
                    echo 1;
                } else {
                    echo 2;
                }
            } else {
                echo 0;
            }
        }

        public function actualizar_e(){
            if (isset($_POST['op_d'])) {
                $this->model_control->setId($_POST['registro']);
                $this->model_control->setNoMaquina($_POST['no_maquina_d']);
                $this->model_control->setFechaEntrega($_POST['fecha_d']);
                $this->model_control->setBote($_POST['no_botes_d']);
                $this->model_control->setPzas($_POST['pzas_d']);
                $this->model_control->setKilos($_POST['kg_d']);
                $this->model_control->setTurno($_POST['turno_d']);
                $this->model_control->setObservaciones($_POST['observaciones_d']);

                $this->model_control->setOp($_POST['op_d']);
                $this->model_control->setIdEstado($_POST['estado_d']);

                $result = $this->model_control->actualizar_registro_e();

                if ($result) {
                    echo 1;
                } else {
                    echo $result;
                }
            } else {
                echo 0;
            }
        }

        public function eliminar(){
           if (isset($_GET['dato']) && $_GET['dato'] != '') {
               $this->model_control->setId($_GET['dato']);
               $result = $this->model_control->eliminar_registro();
               echo $result;
           }
        }

        public function obtener_factor () {
            if (isset($_GET['estado']) && isset($_GET['op'])){
                if ($_GET['estado'] != '' && $_GET['op'] != '') {
                    $this->model_control->setOp($_GET['op']);
                    $this->model_control->setIdEstado($_GET['estado']);
                    $result = $this->model_control->factor();

                    echo json_encode($result[0]);
                } else {
                    echo 2; 
                }
            } else {
                echo 0;
            }
        }

        public function actualizar_factor () {
            if (isset($_GET['estado']) && isset($_GET['op']) && isset($_GET['factor'])){
                if ($_GET['estado'] != '' && $_GET['op'] != '' && $_GET['factor'] != '') {
                    $this->model_control->setOp($_GET['op']);
                    $this->model_control->setIdEstado($_GET['estado']);
                    $this->model_control->setFactor($_GET['factor']);
                    $result = $this->model_control->nuevo_factor();

                    echo json_encode($result);
                } else {
                    echo 2;
                }
            } else {
                echo 0;
            }
        }

        public function estados () {
            $this->model_control->setVista('t_estados');
            $result = $this->model_control->obtener_registros();
            echo json_encode($result);
        }
    }