<?php
    require_once "models/Model.php";
    require_once "models/ventas/tarjetaModel.php";
    require_once "routes/web.php";

    class tarjeta
    {
        public $model;
        public $web;
        public $tarjeta;

        public function __construct()
        {
            $this->tarjeta = new tarjetaModel();
            $this->web = new Web();
            $this->model = new Model();
        }

        public function pdftarjeta()
        {
            $data = $this->model->buscar('v_ordenes', 'Id_Folio', $_GET['value']);

            $this->web->PDF('ventas/tarjeta', $data);
        }

        public function tablaCliente()
        {
            $tabla = $this->model->mostrar('t_clientes');
            echo json_encode($tabla);
        }

        public function buscar()
        {
            $id_tarjeta = $_GET['clave'];

            $result = $this->model->buscar('v_busqueda_tarjeta', 'Id_Folio', $id_tarjeta);
            echo json_encode($result);
        }


        public function obtener()
        {
            $result = $this->model->buscar_personalizado(
                't_salida_almacen, t_clientes',
                'Id_Folio,Codigo,Tratamiento,Bote,Descripcion,Medida,Acabado,Dibujo,Razon_social,Salida,Fecha,Material',
                't_salida_almacen.Id_Clientes_2 = t_clientes.Id_Clientes'
            );
            echo json_encode($result);
        }

        public function obtener_per()
        {
            $result = $this->model->buscar_personalizado('t_salida_almacen', 'Bote, Id_Folio', 'Id_Folio =' . $_GET['aux'] . '');
            echo json_encode($result);
        }

        public function actualizarTarjeta()
        {
            if (isset($_POST['id_folio_edit'])) {
                $Bote = $_POST['Bote_edit'];

                $Id_Folio = $_POST['id_folio_edit'];

                $valores = "Bote = '$Bote'";

                $condicion = "Id_Folio = '$Id_Folio'";
                $result = $this->model->actualizar('t_salida_almacen', $valores, $condicion);
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