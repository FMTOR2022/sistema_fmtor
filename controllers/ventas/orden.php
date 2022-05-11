<?php
    require_once "models/Model.php";
    require_once "models/ventas/ordenModel.php";
    require_once "routes/web.php";
    require_once "models/produccion/t_op.php";

    class orden
    {
        public $model;
        public $web;
        public $orden;
        public $model_op;

        public function __construct()
        {
            $this->orden = new ordenModel();
            $this->web = new Web();
            $this->model = new Model();
            $this->model_op = new t_op();
        }

        public function buscar()
        {
            $id_folio = $_GET['clave'];
            $result = $this->model->buscar('v_busqueda_orden', 'Id_Folio', $id_folio);
            echo json_encode($result);
        }

        public function pdforden()
        {
            $data = $this->model->buscar('v_ordenes', 'Id_Folio', $_GET['value']);

            $this->web->PDF('ventas/orden', $data);
        }

        public function obtener()
        {
            $result = $this->model->mostrar('v_ordenes');
            echo json_encode($result);
        }

        public function obtener_per()
        {
            $data = $this->model->buscar_personalizado('v_ordenes', '*', 'Id_Folio =' . $_GET['aux'] . '');
            echo json_encode($data);
        }

        public function actualizarorden () {
            $this->orden->setId_Folio($_POST['op_e']);
            $this->orden->setCantidad_millares($_POST['cantidad_producir_e']);
            $this->orden->setDibujo($_POST['Dibujo_e']);
            $result = $this->orden->actualizarorden();
            if ($result) {
                echo 1;
            } else {
                echo 2;
            }
        }

        public function cancelar () {
            if (isset($_GET['op'])) {
                $this->orden->setId_Folio($_GET['op']);
                $result = $this->orden->cancelarorden();
                if ($result) {
                    echo 1;
                } else {
                    echo 2;
                }
            } else {
                echo 0;
            }
        }

        public function buscar_op () { 
            if (isset($_POST['buscar_por_fecha'])) {
                if (isset($_POST['f_op'])) {
                    $this->model_op->setVista('v_ordenes');
                    $this->model_op->setCampo('Id_Folio');
                    $this->model_op->setValorBuscar($_POST['f_op']);
                    $op = $this->model_op->buscar_informacion();

                    $json = json_encode($op);
                    echo $json;
                } else {
                    echo 2;
                }
            } else {
                echo 1;
            }
        }

        public function buscar_rango_op () {
            if(isset($_POST['buscar_por_fecha'])){
                if(isset($_POST['f_r_op_m'])&& isset($_POST['f_r_op_M'])){
                    $this->model_op->setVista('v_ordenes');
                    $this->model_op->setCampo('Id_Folio');
                    $this->model_op->setOp($_POST['f_r_op_m']);
                    $this->model_op->setOpFin($_POST['f_r_op_M']);
                    $result = $this->model_op->rango_op();
                    
                    $json=json_encode($result);
                    echo $json;
                }
            }  
        }  

        public function buscar_rango_fecha(){
            if(isset($_POST['buscar_por_fecha'])){
                if(isset($_POST['f_r_fecha_m'])&& isset($_POST['f_r_fecha_M'])){
                    $this->model_op->setVista('v_ordenes');
                    $this->model_op->setCampo('fecha');
                    $this->model_op->setFecha($_POST['f_r_fecha_m']);
                    $this->model_op->setFechaFin($_POST['f_r_fecha_M']);
                    $result = $this->model_op->rango_fecha();
                    
                    $json=json_encode($result);
                    echo $json;
                }
            }  
        }  

        public function buscar_fecha(){
            if(isset($_POST['buscar_por_fecha'])){
                if(isset($_POST['f_fecha'])){
                    $this->model_op->setVista('v_ordenes');
                    $this->model_op->setCampo('fecha');
                    $this->model_op->setValorBuscar($_POST['f_fecha']);
                    $result = $this->model_op->buscar_informacion();

                    $json=json_encode($result);
                    echo $json;
                }
            }
        }

        public function buscar_mes(){
            if(isset($_POST['buscar_por_fecha'])){
                if(isset($_POST['f_fecha_mes'])){
                    $value =$_POST['f_fecha_mes'].'-';
                    
                    $this->model_op->setVista('v_ordenes');
                    $this->model_op->setCampo('fecha');
                    $this->model_op->setValorBuscar($value);
                    $result = $this->model_op->filtrar_informacion();

                    $json=json_encode($result);
                    echo $json;
                }
            }
        }

        public function buscar_anio(){
            if(isset($_POST['buscar_por_fecha'])){
                if(isset($_POST['f_fecha_anio'])){
                    $value=$_POST['f_fecha_anio'].'-';
                    
                    $this->model_op->setVista('v_ordenes');
                    $this->model_op->setCampo('fecha');
                    $this->model_op->setValorBuscar($value);
                    $result = $this->model_op->filtrar_informacion();

                    $json=json_encode($result);
                    echo $json;

                }
            }
        }

        public function buscar_cliente(){
            if(isset($_POST['buscar_por'])){
                if(isset($_POST['f_cliente'])){
                    $this->model_op->setVista('v_ordenes');
                    $this->model_op->setCampo('Clientes');
                    $this->model_op->setValorBuscar($_POST['f_cliente']);
                    $result = $this->model_op->buscar_informacion();
                    
                    $json=json_encode($result);
                    echo $json;
                }
            }
        }

        public function buscar_estado(){
            if(isset($_POST['buscar_por'])){
                if(isset($_POST['f_estado'])){
                    $this->model_op->setVista('v_ordenes');
                    $this->model_op->setCampo('estado_general');
                    $this->model_op->setValorBuscar($_POST['f_estado']);
                    $result = $this->model_op->buscar_informacion();

                    $json=json_encode($result);
                    echo $json;
                }
            }
        }
    }
