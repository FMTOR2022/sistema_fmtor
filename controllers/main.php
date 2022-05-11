<?php 

    require_once 'routes/web.php';
    require_once 'models/Model.php';

    class Main {
        public $web;

        public function __construct() {
            $this->web = new Web();
            $this->model = new Model();
        }
        
        public function login () {
            $this->web->View('login','');
        }

        public function cerrar_sesion () {
            $result = $this->model->cerrar_sesion();
            if ($result == 1) {
                header("Location: http://localhost/sistema_fmtor/");
            } else {
                return 0;
            }
        }

        public function iniciar () {
            if (isset($_POST['nombre']) && isset($_POST['password'])) {
                if ($_POST['nombre' ] != '' && $_POST['password'] != '') {
                    $nombre = $_POST['nombre'];
                    $password = $_POST['password'];
                    
                    $validar_existencia_usuario = self::usuario_existe($nombre);
                    if ($validar_existencia_usuario == 1) {
                        $valiacion_contrasena = self::validar_contrasena($nombre,$password);
                        if ($valiacion_contrasena > 0) {
                            $this->model = new Model();
                            $informacion = $this->model->buscar('v_login','usuario',$nombre);
                            
                            $sesiones = self::generar_sesiones($informacion[0]['id_empleados'],$informacion[0]['nombre_completo'],$informacion[0]['nombreRol'],$informacion[0]['nombre_departamento'],$informacion[0]['foto'],$informacion[0]['nombrePuesto']);
                            echo json_encode($sesiones);
                        } else {
                            echo 3;
                        }
                    } else {
                        echo 2;
                    }
                } else {
                    echo 0;
                }
            } 
        }

        public function usuario_existe ($nombre) {
            $this->model = new Model();
            $existe = $this->model->buscar_personalizado('v_login','count(usuario) AS total',"usuario = '".$nombre."'");
            if ($existe[0]['total'] > 0) {
                return 1;
            } else {
                return 0;
            }
        }

        public function validar_contrasena ($nombre,$password) {
            $this->model = new Model();
            $resultado = $this->model->validar_password("usuario = '$nombre'");
            if (password_verify($password,$resultado[0]['contrasena'])) {
                return 1;
            } else  {
                return 0;
            }
        }

        public function generar_sesiones ($empleado,$nombre,$rol,$depto,$foto,$puesto) {
            $result = $this->model->sesiones($empleado,$nombre,$rol,$depto,$foto,$puesto);
            return $result;
        }
    }

?>