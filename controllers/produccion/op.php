<?php
    require_once "models/Model.php";
    require_once "models/produccion/t_op.php";
    require_once "routes/web.php";

    class op {
        public $model;
        public $model_op;
        public $web;
    
        public function __construct(){
            $this->model = new Model();
            $this->model_op = new t_op();
            $this->web = new Web();
        }
        
        public function pdf_ordenes () {
            if (isset($_GET['formato'])) {
                if ($_GET['filtro'] == 'op') {
                    $data = $this->model->buscar($_GET['formato'],'Id_Folio',$_GET['f_op']);
                } else if($_GET['filtro'] == 'r_op'){
                    $data = $this->model->filtrar_rango($_GET['formato'],'Id_Folio',$_GET['f_r_op_m'],$_GET['f_r_op_M']);
                } else if($_GET['filtro'] == 'r_fecha'){
                    $data = $this->model->filtrar_rango($_GET['formato'],'fecha',$_GET['f_r_fecha_m'],$_GET['f_r_fecha_M']);
                } else if($_GET['filtro'] == 'fecha'){
                    $data = $this->model->buscar($_GET['formato'],'fecha',$_GET['f_fecha']);
                } else if($_GET['filtro'] == 'cliente'){
                    $data = $this->model->buscar($_GET['formato'],'Clientes',$_GET['f_cliente']);
                } else if($_GET['filtro'] == 'estado'){
                    $data = $this->model->buscar($_GET['formato'],'estado_general',$_GET['f_estado']);
                } else if($_GET['filtro'] == 'mes'){
                    $value ='-'.$_GET['f_mes'].'-';
                    $data = $this->model->filtrar($_GET['formato'],'fecha',$value);
                } else if($_GET['filtro'] == 'anio'){
                    $value = $_GET['f_anio'].'-';
                    $data = $this->model->filtrar($_GET['formato'],'fecha',$value);
                } else {
                    $data = $this->model->mostrar($_GET['formato']);
                }

                if ($_GET['formato'] == 'v_ordenes') {
                    $this->web->PDF('produccion/ordenes',$data);
                } else {
                    $this->web->PDF('produccion/diario',$data);
                }
            }
        }

        public function acumulado () {
            if (isset($_GET['Id_Folio'])) {
                $pzas = $this->model->buscar_personalizado('t_registro_diario','SUM(pzas) AS acumulado', "Id_control_produccion_1 = '".$_GET['Id_Folio']."'");
                $json = json_encode($pzas);
                echo $json;
            } else {
                echo 0;
            }
        }

        public function terminar () {
            if (isset($_GET['orden']) && $_GET['orden'] != '') {
                $orden = $_GET['orden'];
                $actualizar = $this->model->actualizar('t_orden_produccion',"estado_general = 'TERMINADO'", "Id_Produccion = '".$orden."'");
                echo json_encode($actualizar);
            } else {
                echo 0;
            }
        }

        public function actualizar_calibre () {
            if (isset($_POST['calibre']) && isset($_POST['calibre_op'])) {
                $this->model_op->setOp($_POST['calibre_op']);
                $this->model_op->setCalibre($_POST['calibre']);

                $result = $this->model_op->calibre();
                echo json_encode($result);
            } else {
                echo 0;
            }
        }

        public function obtener_ordenes () {
            $this->model_op->setVista('v_ordenes');
            $ops = $this->model_op->obtener_informacion();
            
            $json = json_encode($ops);
            echo $json;
        }

        public function obtener_reporte_diario () {
            $this->model_op->setVista('v_reportediario');
            $ops = $this->model_op->obtener_informacion();

            $json = json_encode($ops);
            echo $json;
        }

        public function obtener_plano () {
            if (isset($_GET['id_plano'])) {
                $plano = $this->model->buscar('v_planos','Id_Catalogo',$_GET['id_plano']);
                echo base64_encode($plano[0]['PDF']);
            } else {
                echo 2;
            }
        }

        public function buscar_op () { 
            if (isset($_POST['buscar_por'])) {
                if (isset($_POST['f_op'])) {
                    $this->model_op->setVista($_POST['tabla']);
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
            if(isset($_POST['buscar_por'])){
                if(isset($_POST['f_r_op_m'])&& isset($_POST['f_r_op_M'])){
                    $this->model_op->setVista($_POST['tabla']);
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
            if(isset($_POST['buscar_por'])){
                if(isset($_POST['f_r_fecha_m'])&& isset($_POST['f_r_fecha_M'])){
                    $this->model_op->setVista($_POST['tabla']);
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
            if(isset($_POST['buscar_por'])){
                if(isset($_POST['f_fecha'])){
                    $this->model_op->setVista($_POST['tabla']);
                    $this->model_op->setCampo('fecha');
                    $this->model_op->setValorBuscar($_POST['f_fecha']);
                    $result = $this->model_op->buscar_informacion();

                    $json=json_encode($result);
                    echo $json;
                }
            }
        }

        public function buscar_mes(){
            if(isset($_POST['buscar_por'])){
                if(isset($_POST['f_fecha_mes'])){
                    $value = $_POST['f_fecha_mes'].'-';
                    
                    $this->model_op->setVista($_POST['tabla']);
                    $this->model_op->setCampo('fecha');
                    $this->model_op->setValorBuscar($value);
                    $result = $this->model_op->filtrar_informacion();

                    $json=json_encode($result);
                    echo $json;
                }
            }
        }

        public function buscar_anio(){
            if(isset($_POST['buscar_por'])){
                if(isset($_POST['f_fecha_anio'])){
                    $value=$_POST['f_fecha_anio'].'-';
                    
                    $this->model_op->setVista($_POST['tabla']);
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
                    $this->model_op->setVista($_POST['tabla']);
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
                    $this->model_op->setVista($_POST['tabla']);
                    $this->model_op->setCampo('estado_general');
                    $this->model_op->setValorBuscar($_POST['f_estado']);
                    $result = $this->model_op->buscar_informacion();

                    $json=json_encode($result);
                    echo $json;
                }
            }
        }

        public function obtener_programa () {
            $result = $this->model->mostrar('v_programa_forjado');
            echo json_encode($result);
        }

        public function insertar_programa () {
            if (isset($_POST['op']) && isset($_POST['fecha_entrega']) && isset($_POST['herramental']) && isset($_POST['no_maquina'])) {
                $tabla = 't_programa_forjado';
                $campos = 'Id_Produccion_FK,Fecha_entrega,herramental,no_maquina,producto_desc';
                $valores = "'".$_POST['op']."','".$_POST['fecha_entrega']."','".$_POST['herramental']."','".$_POST['no_maquina']."','".$_POST['estado_produccion']."'";
                $result = $this->model->insertar($tabla,$campos,$valores);
                echo json_encode($result);
            } else {
                echo 0;
            }
        }

        public function editar_programa () {
            if (isset($_POST['op_a']) && isset($_POST['fecha_entrega_a']) && isset($_POST['herramental_a']) && isset($_POST['no_maquina_a'])) {
                $tabla = 't_programa_forjado';
                $valores = "Id_Produccion_FK='".$_POST['op_a']."',Fecha_entrega='".$_POST['fecha_entrega_a']."',herramental='".$_POST['herramental_a']."', no_maquina='".$_POST['no_maquina_a']."',producto_desc='".$_POST['estado_produccion_a']."'";
                $condicion = "Id_Programa_Forjado = '".$_POST['registro']."'";
                $result = $this->model->actualizar($tabla,$valores,$condicion);
                echo json_encode($result);
            } else {
                echo 0;
            }
        }

        public function obtener_registro () {
            if (isset($_GET['id'])) {
                $result = $this->model->buscar('v_programa_forjado','Id_Programa_Forjado',$_GET['id']);
                echo json_encode($result);
            } else { 
                echo 0;
            }   
        }

        public function eliminar_programa () {
            if (isset($_GET['id'])) {
                $result = $this->model->eliminar('t_programa_forjado',"Id_Programa_Forjado = '".$_GET['id']."'");
                echo json_encode($result);
            } else {
                echo 0;
            }
        }

        public function pdf_programa_forjado () {
            $data = $this->model->mostrar('v_programa_forjado');
            $this->web->PDF('produccion/programa_forjado',$data);
        }
   }