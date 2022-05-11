<?php
    /* Including the files. */
    require_once "models/Model.php";
    require_once "models/ventas/clientesModel.php";
    require_once "routes/web.php";

    class clientes {
        /* Declaring the variables. */
        public $model;
        public $web;
        public $clientes;

        /**
         * It creates a new instance of the clientesModel class, the Web class, and the Model class.
         */
        public function __construct() {
            $this->clientes = new clientesModel();
            $this->web = new Web();
            $this->model = new Model();
        }

        /**
         * It returns a JSON object containing all the rows from the table t_clientes.
         */
        public function obtener() {
            $result = $this->model->buscar_personalizado('t_clientes', '*', '1 ORDER BY Id_Clientes ASC');
            echo json_encode($result);
        }

        /**
         * It gets the data from the database and returns it as a JSON object
         */
        public function obtener_per() {
            $result = $this->model->buscar_personalizado('t_clientes', '*', 'Id_Clientes =' . $_GET['aux'] . '');
            echo json_encode($result);
        }

        /**
         * It returns a JSON object with the results of a query to a view called v_historial_cliente.
         */
        public function historial_cliente () {
            $result = $this->model->buscar_personalizado('v_historial_cliente', '*', 'Id_Clientes =' . $_GET['id'] . '');
            echo json_encode($result);
        }

        /**
         * If the user has entered a value for the field, then check if the user has entered a value
         * for the next field, and so on. If the user has not entered a value for a field, then echo
         * the corresponding error code
         */
        public function NuevoCliente() {
            if (isset($_POST['Id_Clientes']) && $_POST['Id_Clientes'] != '') {
                $this->clientes->setId_Clientes($_POST['Id_Clientes']);

                if (isset($_POST['Razon_social']) && $_POST['Razon_social'] != '') {
                    $this->clientes->setRazon_social($_POST['Razon_social']);

                    if (isset($_POST['Nombre']) && $_POST['Nombre'] != '') {
                        $this->clientes->setNombre($_POST['Nombre']);

                        if (isset($_POST['Telefono']) && $_POST['Telefono'] != '') {
                            $this->clientes->setTelefono($_POST['Telefono']);

                            if (isset($_POST['Correo']) && $_POST['Correo'] != '') {
                                $this->clientes->setCorreo($_POST['Correo']);

                                if (isset($_POST['Direccion']) && $_POST['Direccion'] != '') {
                                    $this->clientes->setDireccion($_POST['Direccion']);

                                    $result = $this->clientes->insertarCliente();
                                    if ($result) {
                                        echo 1;
                                    } else {
                                        echo 6;
                                    }
                                } else {
                                    echo 5;
                                }
                            } else {
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

        /**
         * If the post data is set, then set the variables to the post data, then set the values to the
         * variables, then set the condition to the id, then run the update function, then if the
         * result is true, echo 1, else echo 2, else echo 0.
         */
        public function actualizarCliente() {
            if (isset($_POST['Id_Clientes_edit'])) {
                $Razon_social = $_POST['Razon_social_edit'];
                $Nombre = $_POST['Nombre_edit'];
                $Telefono = $_POST['Telefono_edit'];
                $Correo = $_POST['Correo_edit'];
                $Direccion = $_POST['Direccion_edit'];

                $Id_Clientes = $_POST['Id_Clientes_edit'];

                $valores = "Razon_social = '$Razon_social', Nombre = '$Nombre', Telefono = '$Telefono', Correo= '$Correo' , Direccion= ' $Direccion'";
                $condicion = "Id_Clientes = '$Id_Clientes'";
                $result = $this->model->actualizar('t_clientes', $valores, $condicion);
                if ($result) {
                    echo 1;
                } else {
                    echo 2;
                }
            } else {
                echo 0;
            }
        }

        /**
         * It deletes a row from the table t_clientes where the Id_Clientes column is equal to the
         * value of the variable .
         */
        public function eliminarCliente() {
            if (isset($_GET['dato'])) {
                $id = $_GET['dato'];
                $result = $this->model->eliminar('t_clientes', "Id_Clientes = '$id'");
                echo $result;
            }
        }
    }
