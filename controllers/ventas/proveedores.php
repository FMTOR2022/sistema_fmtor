<?php 

    require_once 'models/Model.php';
    require_once 'models/ventas/proveedorModel.php';
    require_once 'routes/web.php';

    class Proveedores {
        public $model;
        public $model_proveedor;
        public $web;

        public function __construct() {
            $this->model = new Model();
            $this->model_proveedor = new proveedorModel();
            $this->web = new Web();
        }

        public function obtener_proveedores () {
            $result = $this->model->buscar_personalizado('t_proveedores', '*', '1 ORDER BY Id_Proveedor ASC');
            echo json_encode($result);
        }

        public function obtener_proveedor () {
            if (isset($_GET['id']) && $_GET['id']) {
                $result = $this->model->buscar_personalizado('t_proveedores','*',"Id_Proveedor = '".$_GET['id']."'");
                echo json_encode($result);
            }   
        }

        public function insertar () {
            if (isset($_POST['Proveedor']) && $_POST['Proveedor']) {
                $this->model_proveedor->setProveedor($_POST['Proveedor']);
                $this->model_proveedor->setDireccion($_POST['Direccion']);
                $this->model_proveedor->setCiudad($_POST['Ciudad']);
                $this->model_proveedor->setTelefono($_POST['Telefono']);
                $this->model_proveedor->setCorreo($_POST['Correo']);

                $result = $this->model_proveedor->ingresar();
                
                if ($result) {
                    echo 1;
                } else {
                    echo 2;
                }
            } else {
                echo 0;
            }
        }

        public function actualizar () {
            if (isset($_POST['Id_Proveedor']) && $_POST['Id_Proveedor']) {
                $this->model_proveedor->setIdProveedor($_POST['Id_Proveedor']);
                $this->model_proveedor->setProveedor($_POST['Proveedor_m']);
                $this->model_proveedor->setDireccion($_POST['Direccion_m']);
                $this->model_proveedor->setCiudad($_POST['Ciudad_m']);
                $this->model_proveedor->setTelefono($_POST['Telefono_m']);
                $this->model_proveedor->setCorreo($_POST['Correo_m']);

                $result = $this->model_proveedor->modificar();
                
                if ($result) {
                    echo 1;
                } else {
                    echo 2;
                }
            } else {
                echo 0;
            }
        }

        public function eliminar () {
            if (isset($_GET['id']) && $_GET['id']) {
                $result = $this->model->eliminar('t_proveedores',"Id_Proveedor = '".$_GET['id']."'");
                
                if ($result) {
                    echo 1;
                } else {
                    echo 2;
                }
            } else {
                echo 0;
            }
        }
    }

?>