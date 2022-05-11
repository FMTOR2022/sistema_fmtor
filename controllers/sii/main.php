<?php

    require_once "models/sii/usuario.php";
    require_once "routes/web.php";

    class Main {
        public $model;
        public $web;

        public function __construct(){
            // $this->model= new TcontrolOp();
            $this->web = new Web();
            $this->model = new usuario();
        }

        public function mostrar() {
            $this->web->View('sii/main','');
        }

        public function Registro()
        {
            $this->web->View('sii/register','');
        }

        public function buscarPuesto(){
            $data = $this->model->mostrar('t_puesto');
            echo json_encode($data);
        }

        public function buscarRol(){
            $data = $this->model->mostrar('t_rol');
            echo json_encode($data);
        }

        public function buscarDepto()
        {
            $data = $this->model->mostrar('t_departamento');
            echo json_encode($data);
        }

        public function datosAdmin()
        {
            $this->web->View('sii/datosAdmin','');
        }

        public function reglamento(){
            $this->web->View('sii/reglamento','');
        }

        public function caja_ahorro(){
            $this->web->View('sii/caja_ahorro','');
        }

        public function caja_ahorro_usuario(){
            $this->web->View('sii/caja_ahorro_usuario','');
        }
        
        public function prestamos(){
            $this->web->view('sii/prestamos','');
        }

        public function prestamos_usuario(){
            $this->web->view('sii/prestamos_usuario','');
        }

        public function datosEmpleados()
        {
            $this->web->View('sii/datosEmpleados','');
        }

        public function informacionEmpleado()
        {
            $data = $this->model->buscar_personalizado('informacionempleados','*','id_empleados = '.$_GET['aux']);
            echo json_encode($data);
            
            
        }

        public function EjemploPDF()
        {
            $this->web->View('sii/EjemploPDF');
        }

        public function cajaAhorro()
        {
            $this->web->View('sii/cajaAhorro');
        }

        public function inicio()
        {
            $this->web->View('sii/inicio');
        }

        public function buscarEmpleados()
        {
            $data = $this->model->mostrar('nombre_empleado');
            echo json_encode($data);
        }

        public function mostrarDatos()
        {
           $data =  $this->model->mostrar('informacionempleados');
           echo json_encode($data);
        }

        public function encontrarEmpleado() {
            $data = $this->model->buscar_personalizado('datos_personales','*','nombre LIKE '."'%".$_GET['nombre']."%'");
            echo json_encode($data);
        }
 

        function newUser()
        {
            if (isset($_POST['nombre']) && $_POST['nombre'] != '') {
                $this->model->setNombre($_POST['nombre']);
                if (isset($_POST['apellidoP']) && $_POST['apellidoP'] != '') {
                    $this->model->setApellidoP($_POST['apellidoP']);
                    if(isset($_POST['apellidoM']) && $_POST['apellidoM'] != ''){
                        $this->model->setApellidoM($_POST['apellidoM']);
                        if(isset($_POST['fechaNacimiento']) && $_POST['fechaNacimiento'] != ''){
                            $this->model->setFechaNacimiento($_POST['fechaNacimiento']);
                            if (isset($_POST['telefono']) && $_POST['telefono'] != '') {
                                $this->model->setTelefono($_POST['telefono']);
                                if (isset($_POST['correo']) && $_POST['correo'] != '') {
                                    $this->model->setCorreo($_POST['correo']);
                                    if (isset($_POST['fechaIngreso']) && $_POST['fechaIngreso'] != '') {
                                        $this->model->setFechaIngreso($_POST['fechaIngreso']);
                                        if (isset($_POST['curp']) && $_POST['curp'] != '') {
                                            $this->model->setCurp($_POST['curp']);
                                            if (isset($_POST['rfc']) && $_POST['rfc'] != '') {
                                                $this->model->setRfc($_POST['rfc']);
                                                if (isset($_POST['nss']) && $_POST['nss'] != '') {
                                                    $this->model->setNss($_POST['nss']);
                                                    if (isset($_POST['estado']) && $_POST['estado'] != '') {
                                                        $this->model->setEstado($_POST['estado']);
                                                        if (isset($_POST['usuario']) && $_POST['usuario'] != '') {
                                                            $this->model->setUsuario($_POST['usuario']);
                                                            if (isset($_POST['contrasena']) && $_POST['contrasena'] != '') {
                                                                $this->model->setContrasena($_POST['contrasena']);
                                                                if (isset($_POST['nombrePuesto']) && $_POST['nombrePuesto'] != '') {
                                                                    $this->model->setNombrePuesto($_POST['nombrePuesto']);  
                                                                            if (isset($_POST['nombreDepartamento']) && $_POST['nombreDepartamento'] != '') {
                                                                                $this->model->setNombreDepartamento($_POST['nombreDepartamento']);
                                                                                if (isset($_POST['nombreRol']) && $_POST['nombreRol'] != '') {
                                                                                    $this->model->setNombreRol($_POST['nombreRol']);
                                                                                        if(isset($_FILES['foto']) && !empty($_FILES['foto'])){
                                                                                            $this->model->setFoto($_FILES['foto']);
                                                                                            echo $this->model->insertarEmpleado();
                                                                                        }else {
                                                                                            echo 16;
                                                                                        }
                                                                            }else {
                                                                                echo 15;
                                                                            }
                                                                    }else {
                                                                        echo 14;
                                                                }
                                                                }else{
                                                                    echo 13;
                                                                } 
                                                            }else{
                                                                echo 12;
                                                            }
                                                        }else{
                                                        echo 11;}
                                                        
                                                    }else{
                                                       echo 10;
                                                    }
                                                }else{
                                                    echo 9;
                                                }
                                            }else{
                                                echo 8;
                                            }
                                        }else{
                                            echo 7;
                                        }
                                    } else{
                                        echo 6;
                                    }
                                }else {
                                    echo 5;
                                }
                            }else{
                                echo 4;
                            }
                        }else{
                            echo 3;
                        }
                    }else{
                        echo 2;
                    }   
                } else {
                    echo 1;
                }
            }else{
                echo 'No hay registro';
            }
            
        }
        function new_only_user() {
            if(isset($_POST['usuario']) && $_POST['usuario'] != ''){
                $this->model->setUsuario($_POST['usuario']);
                if(isset($_POST['password']) && $_POST['password'] != ''){
                    $this->model->setContrasena($_POST['password']);
                    if (isset($_POST['nombreRol2']) && $_POST['nombreRol2'] != '') {
                        $this->model->setNombreRol($_POST['nombreRol2']);
                        if(isset($_POST['curp_empleado']) && $_POST['curp_empleado'] != ''){
                            $this->model->setCurp($_POST['curp_empleado']);
                            echo $this->model->insertar_soloUsuario();
                    }else {
                        echo 3;
                    }
                    }else {
                        echo 2;
                    }
                }else{
                    echo 1;
                }
            }else{
                echo 0;
            }
        }


    }
?>