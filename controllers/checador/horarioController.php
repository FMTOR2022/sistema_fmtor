<?php
    require_once "models/Model.php";
    require_once "models/checador/horarioModel.php";
    require_once "routes/web.php";

    class horarioController{
        public $model; 
        public $web;
        public $horarioModel;
 
        public function __construct(){
            $this->horarioModel = new horarioModel();
            $this->model= new Model();
            $this->web = new Web();
        }
        
        public function obtener()
        {
           $result = $this->model->mostrar('v_horario');
            echo json_encode($result);
        }
        public function obtenerhorario(){
            $result = $this->model->mostrar('t_horario');
             echo json_encode($result);
         }
        
        public function mostrar(){
            $this->web->View('listas',''); //como funciona de donde saca esto
        }

        public function obtener_horario () {
            $lis = $this->model->mostrar('v_horario');
            $json = json_encode($lis);
            echo $json;
        }
        public function obtener_lista_diaria () {
            $lis = $this->model->mostrar('v_listaentrada');
            $json = json_encode($lis);
            echo $json;
        }
        public function obtener_lista_almuerzo () {
            $lis = $this->model->mostrar('v_listaa');
            $json = json_encode($lis);
            echo $json;
        }
        public function obtener_lista_salida () {
            $lis = $this->model->mostrar('v_listas');
            $json = json_encode($lis);
            echo $json;
        }
        public function obtener_lista_semanal(){
            $lis = $this->model->mostrar('v_lista');
            $json = json_encode($lis);
            echo $json;
        }

        public function obtener_lista_salidaExtra(){
            $lis = $this->model->mostrar('v_listaExtra');
            $json = json_encode($lis);
            echo $json;
        }

        public function obtener_empleados() {
            $data = $this->model->mostrar('v_lista');
            echo json_encode($data);
        }

        public function obtener_registro() {
            if (isset($_GET['fecha_in'])) {
                $condicion = "id_empleados = '".$_GET['id']."' AND fecha BETWEEN '".$_GET['fecha_in']."' AND '".$_GET['fecha_fin']."'";
                $data = $this->model->buscar_personalizado('v_horario_personal','*',$condicion);
                echo json_encode($data);
            } else {
                echo 0;
            }
        }

        public function buscar_horario(){
            if (isset($_POST['check_horario'])) {
                if (isset($_POST['horario'])) {
                    $lisd = $this->model->buscar($_POST['tabla'],'lisd',$_POST['horario']); 
                    $json = json_encode($lisd);
                    echo $json;
                } else {
                    echo 2;
                }
            } else {
                echo 1;
            }
        }

      public function buscar_lista_diaria(){
            if (isset($_POST['check_lis_d'])) {
                if (isset($_POST['lista_diaria'])) {
                    $lisd = $this->model->buscar($_POST['tabla'],'lisd',$_POST['lista_diaria']); //verificar lisd que va ahi=?
                    $json = json_encode($lisd);
                    echo $json;
                } else {
                    echo 2;
                }
            } else {
                echo 1;
            }
        }
        public function buscar_lista_almuerzo(){
            if (isset($_POST['check_lis_almuerzo'])) {
                if (isset($_POST['lista_almuerzo'])) {
                    $lisd = $this->model->buscar($_POST['tabla'],'lisalmuerzo',$_POST['lista_almuerzo']); //verificar lisd que va ahi=?
                    $json = json_encode($lisd);
                    echo $json;
                } else {
                    echo 2;
                }
            } else {
                echo 1;
            }
        }
        public function buscar_lista_salida(){
            if (isset($_POST['check_lis_salida'])) {
                if (isset($_POST['lista_salida'])) {
                    $lisd = $this->model->buscar($_POST['tabla'],'lisalida',$_POST['lista_salida']); //verificar lisd que va ahi=?
                    $json = json_encode($lisd);
                    echo $json;
                } else {
                    echo 2;
                }
            } else {
                echo 1;
            }
        }

        public function buscar_lista_salidaExtra(){
            if (isset($_POST['check_lis_salidaExtra'])) {
                if (isset($_POST['lista_salidaExtra'])) {
                    $lisd = $this->model->buscar($_POST['tabla'],'lisalida',$_POST['lista_salidaExtra']); //verificar lisd que va ahi=?
                    $json = json_encode($lisd);
                    echo $json;
                } else {
                    echo 2;
                }
            } else {
                echo 1;
            }
        }
        public function buscar_lista_semanal() { 
            if (isset($_POST['check_lis_s'])) {
                if (isset($_POST['lista_semanal'])) {
                    $lisem = $this->model->buscar($_POST['tabla'],'lisem',$_POST['lista_semanal']);
                    $json = json_encode($lisem);
                    echo $json;
                } else {
                    echo 2;
                }
            } else {
                echo 1;
            }
        }

        public function buscar_rango_fecha(){
            if(isset($_POST['check_rango_fecha'])){
                if(isset($_POST['f_r_fecha_m'])&& isset($_POST['f_r_fecha_M'])){
                    $r_lis=$this->model->filtrar_rango($_POST['tabla'],'fecha',$_POST['f_r_fecha_m'],$_POST['f_r_fecha_M']);
                    $json=json_encode($r_lis);
                    echo $json;
                }
            }  
        }  

        public function buscar_fecha(){
            if(isset($_POST['check_fecha'])){
                if(isset($_POST['f_fecha'])){
                    $fecha=$this->model->buscar($_POST['tabla'],'fecha',$_POST['f_fecha']);
                    $json=json_encode($fecha);
                    echo $json;
                }
            }
        }

        public function buscar_mes(){
            if(isset($_POST['check_fecha_mes'])){
                if(isset($_POST['f_mes'])){
                    $value ='-'.$_POST['f_mes'].'-';
                    $mes = $this->model->filtrar($_POST['tabla'],'fecha',$value);
                    $json=json_encode($mes);
                    echo $json;
                }
            }
        }

        public function buscar_anio(){
            if(isset($_POST['check_fecha_anio'])){
                if(isset($_POST['f_anio'])){
                    $value=$_POST['f_anio'].'-';
                    $anio=$this->model->filtrar($_POST['tabla'],'fecha',$value);
                    $json=json_encode($anio);
                    echo $json;

                }
            }
        }
 //buscar empleado filtro
        public function buscar_empleado(){
            if(isset($_POST['check_empleado'])){
                if(isset($_POST['f_empleado'])){
                    $empleado=$this->model->buscar($_POST['tabla'],'usuario',$_POST['f_empleado']);
                    $json=json_encode($empleado);
                    echo $json;
                }
            }
        }
//buscar buscar_personalizado
        public function buscarEmpleado(){
            $result = $this->model->buscar_personalizado('t_empleados','id_empleados,nombre,apellidoP,apellidoM','1');
            echo json_encode($result);
        }

        public function buscarUsuario(){
            $result = $this->model->buscar_personalizado('t_usuario','usuario','1');
            echo json_encode($result);
        }

        public function buscar_h(){
            if(isset($_GET['horario'])){
                $lisd = $this->model->buscar('t_horario','usuario',$_GET['horario']);
                $json = json_encode($lisd);
                echo $json;
            }else{
                echo 1;
            }
        }

        public function NuevoHorario()
        { //datos de formulario 
            if (isset($_POST['usuario']) && $_POST['usuario'] != '') {
                $this->horarioModel->setUsuario($_POST['usuario']);
    
                if (isset($_POST['entrada']) && $_POST['entrada'] != '') {
                    $this->horarioModel-> setEntrada($_POST['entrada']);
    
                    if (isset($_POST['almuerzoS']) && $_POST['almuerzoS'] != '') {
                        $this->horarioModel->setAlmuerzoS($_POST['almuerzoS']);
    
                        if (isset($_POST['almuerzoR']) && $_POST['almuerzoR'] != '') {
                            $this->horarioModel->setAlmuerzoR($_POST['almuerzoR']);

                            if (isset($_POST['salida'])&& $_POST['salida'] != ''){
                                $this->horarioModel->setSalida($_POST['salida']);
                                 
                                echo json_encode($this->horarioModel->insertarHorario());

                            }else{
                                echo 4; 
                            }
                        } else {
                            echo 3;
                        }
                    } else {
                        echo 2;
                    }
                } else {
                    echo 1;
                }
            } else {
                echo 0;
            }
        }

        public function actualizar(){
            if(isset($_POST['id_horario'])){
                $usuario = $_POST['usuario'];
                $entrada = $_POST['entrada'];
                $almuerzoS = $_POST['almuerzoS']; 
                $almuerzoR = $_POST['almuerzoR'];
                $salida = $_POST['salida'];

                $this->horarioModel->setIdHorario($id_horario);
                $this->horarioModel->setUsuario($usuario);
                $this->horarioModel->setEntrada($entrada);
                $this->horarioModel->setAlmuerzoS($almuerzoS);
                $this->horarioModel->setAlmuerzoR($almuerzoR);
                $this->horarioModel->setSalida($salida);

                $result = $this->horarioModel->actualizarHorario();
    
                if ($result) {
                    echo 1;
                } else {
                    echo 2;
                }
            }else {
                echo 0;
            }
        }

        public function eliminar(){
            if (isset($_GET['id'])) {
                $id_horario = $_GET['id'];
                $result = $this->model->eliminar('t_horario',"id_horario = '$id_horario'");
                echo $result;
            }
        }

       public function pdf_listas(){
            if(isset($_GET['vista'])){
                if('vista' == 0){

                }
                $lista_diaria = $this->model->mostrar('v_listaentrada');
                $this->model = new Model();
                $lista_almuerzo = $this->model->buscar('v_listaa');
                $this->model = new Model();
                $lista_salida = $this->model->buscar('v_listas','',$_GET['valor']);
                $this->model = new Model();
                $lista_semanal = $this->model->buscar('v_lista','',$_GET['valor']);
                $this->model = new Model();
                $horario = $this->model->buscar('v_horario','',$_GET['valor']);
                
                $data = [
                    "lista_diaria" => $lista_diaria,
                    "lista_almuerzo" => $lista_almuerzo,
                    "lista_salida" => $lista_salida,
                    "lista_semanal" => $lista_semanal,
                    "horario" => $horario
                ];

                $this->web->PDF('checador/horarioController ',$data);
            } else {
                echo 0; 
            }
        } 


    }

