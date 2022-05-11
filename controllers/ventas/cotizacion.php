<?php
    require_once "models/Model.php";
    require_once "routes/web.php";
    require_once "models/ventas/cotizacionModel.php";
    require_once "models/ventas/pedidoModel.php";
    require_once "models/produccion/t_op.php";

    class cotizacion {
        public $model;
        public $web;
        public $cotizacion;
        public $pedido;
        public $model_op;

        public function __construct () {
            $this->model = new Model();
            $this->web = new Web();
            $this->cotizacion = new cotizacionModel();
            $this->pedido = new pedidoModel();
            $this->model_op = new t_op();
        }

        public function obtener_cotizaciones () {
            $result = $this->model->mostrar('v_cotizacion');
            echo json_encode($result);
        }

        public function obtener_cotizacion () {
            if (isset($_GET['id'])) {
                $result = $this->model->buscar_personalizado('t_cotizacion','*',"id_cotizacion = '".$_GET['id']."'");
                echo json_encode($result);
            } else {
                echo 0;
            }
        }
        
        public function obtener_pedido () {
            if (isset($_GET['id'])) {
                $result = $this->model->buscar_personalizado('t_pedido','*',"Id_Pedido = '".$_GET['id']."'");
                echo json_encode($result);
            } else {
                echo 0;
            }
        }

        public function historial () {
            $cotizacion = $this->model->buscar('v_cotizaciones', 'id_cotizacion', $_GET['id']);

            echo json_encode($cotizacion);
        }
        

        public function insertar () {
            $aux = 1;
            if (isset($_POST['Fecha']) && $_POST['Fecha'] != '' && isset($_POST['Id_Clientes_2']) && $_POST['Id_Clientes_2'] != '') {
                $this->cotizacion->setFecha($_POST['Fecha']);
                $this->cotizacion->setId_Clientes_1($_POST['Id_Clientes_2']);
                $result = $this->cotizacion->insertar_cotizacion();

                if ($result) {
                    for ($i=1; $i <= $_POST['Cantidad_Tornillos']; $i++) { 
                        $this->pedido->setDescripcion($_POST['Descripcion_'.$i]);
                        $this->pedido->setMedida($_POST['Medida_'.$i]);
                        $this->pedido->setAcabado($_POST['Acabado_'.$i]);
                        $this->pedido->setFactor($_POST['factor_'.$i]);
                        $this->pedido->setMaterial($_POST['Material_'.$i]);
                        $this->pedido->setCantidad_millares($_POST['Cantidad_millares_'.$i]);
                        $this->pedido->setPedido_pza($_POST['Pedido_pza_'.$i]);
                        $this->pedido->setFecha_entrega($_POST['Fecha_entrega_'.$i]);
                        $this->pedido->setPrecio_millar($_POST['Precio_millar_'.$i]);
                        $this->pedido->setCodigo($_POST['Codigo_'.$i]);
                        if (isset($_POST['tratamiento_' . $i]) && $_POST['tratamiento_' . $i] == 'on') {
                            $this->pedido->setTratamiento('T/TERMICO');
                        } else {
                            $this->pedido->setTratamiento('0');
                        }
                        $result_2 = $this->pedido->insertarPedido();
                        if (!$result_2) {
                            $aux = 2;
                        }
                    }
                    echo $aux;
                } else {
                    echo 2;
                }
            } else {
                echo 0;
            }
        }

        public function actualizar_solo_cotizacion () {
            if (isset($_POST['Cotizacion_e']) && $_POST['Cotizacion_e'] != '') {
                $this->cotizacion->setId_Cotizacion($_POST['Cotizacion_e']);
                $this->cotizacion->setFecha($_POST['Fecha_e']);
                $this->cotizacion->setId_Clientes_1($_POST['Id_Clientes_2_e']);

                $result = $this->cotizacion->solo_cotizacion();

                if ($result) {
                    echo 1;
                } else {
                    echo 2;
                }
            } else {
                echo 0;
            }
        }

        public function actualizar_pedido () {
            if (isset($_POST['Pedido_p'])) {
                $this->pedido->setId_Pedido($_POST['Pedido_p']);
                $this->pedido->setDescripcion($_POST['Descripcion_p']);
                $this->pedido->setMedida($_POST['Medida_p']);
                $this->pedido->setAcabado($_POST['Acabado_p']);
                $this->pedido->setFactor($_POST['factor_p']);
                $this->pedido->setMaterial($_POST['Material_p']);
                $this->pedido->setCantidad_millares($_POST['Cantidad_millares_p']);
                $this->pedido->setPedido_pza($_POST['Pedido_pza_p']);
                $this->pedido->setFecha_entrega($_POST['Fecha_entrega_p']);
                $this->pedido->setPrecio_millar($_POST['Precio_millar_p']);
                $this->pedido->setCodigo($_POST['Codigo_p']);

                $result = $this->pedido->actualizarPedido();

                if ($result) {
                    echo 1;
                } else {
                    echo 0;
                }
            } else {
                echo 0;
            }
        }

        public function eliminar_pedido () {
            if (isset($_GET['id']) && $_GET['id'] != '') {
                $result = $this->model->eliminar('t_pedido',"Id_Pedido = '". $_GET['id']."'");
                if ($result)  {
                    echo 1;
                } else {
                    echo 2;
                }
            } else {
                echo 0;
            }
        }

        public function copiar_informacion() {
            $cotizacion = $this->model->buscar_personalizado('v_cotizacion', '*', "id_cotizacion ='" . $_GET['aux'] . "'");
            if (isset($_GET['pedido']) && $_GET['pedido'] != 'undefined') {
                $this->model = new Model();
                $pedido = $this->model->buscar_personalizado('v_cotizaciones', '*', "Id_Pedido ='" . $_GET['pedido'] . "'");
                $data = [
                    'cotizacion' => $cotizacion,
                    'pedido' => $pedido
                ];
            } else{ 
                $this->model = new Model();
                $pedido = $this->model->buscar_personalizado('v_cotizaciones', '*', "id_cotizacion = '" . $_GET['aux'] . "'");
                $data = [
                    'cotizacion' => $cotizacion,
                    'pedido' => $pedido
                ];
            }
            echo json_encode($data);
        }

        public function generarpdf () {
            $data = $this->model->buscar('v_cotizaciones', 'id_cotizacion', $_GET['id']);
            $this->web->PDF('ventas/cotizacion', $data);
        }

        public function buscar_cotizacion()
        {
            if (isset($_POST['buscar_por'])) {
                if (isset($_POST['f_salida'])) {
                    $this->model_op->setVista('v_cotizacion');
                    $this->model_op->setCampo('id_cotizacion');
                    $this->model_op->setValorBuscar($_POST['f_salida']);
                    $result = $this->model_op->buscar_informacion();
                    echo json_encode($result);
                } else {
                    echo 2;
                }
            } else {
                echo 1;
            }
        }

        public function buscar_rango_cotizaciones()
        {
            if (isset($_POST['buscar_por'])) {
                if (isset($_POST['f_r_salida_m']) && isset($_POST['f_r_salida_M'])) {
                    $this->model_op->setVista('v_cotizacion');
                    $this->model_op->setCampo('id_cotizacion');
                    $this->model_op->setOp($_POST['f_r_salida_m']);
                    $this->model_op->setOpFin($_POST['f_r_salida_M']);
                    $result = $this->model_op->rango_op();
                    echo json_encode($result);
                }
            }
        }

        public function buscar_rango_op()
        {
            if (isset($_POST['buscar_por'])) {
                if (isset($_POST['f_r_op_m']) && isset($_POST['f_r_op_M'])) {
                    $this->model_op->setVista('v_cotizacion');
                    $this->model_op->setCampo('id_cotizacion');
                    $this->model_op->setOp($_POST['f_r_op_m']);
                    $this->model_op->setOpFin($_POST['f_r_op_M']);
                    $result = $this->model_op->rango_op();
                    $json = json_encode($result);
                    echo $json;
                }
            }
        }

        public function buscar_rango_fecha()
        {
            if (isset($_POST['buscar_por'])) {
                if (isset($_POST['f_r_fecha_m']) && isset($_POST['f_r_fecha_M'])) {
                    $this->model_op->setVista('v_cotizacion');
                    $this->model_op->setCampo('fecha');
                    $this->model_op->setFecha($_POST['f_r_fecha_m']);
                    $this->model_op->setFechaFin($_POST['f_r_fecha_M']);
                    $result = $this->model_op->rango_fecha();
                    echo json_encode($result);
                }
            }
        }

        public function buscar_fecha()
        {
            if (isset($_POST['buscar_por'])) {
                if (isset($_POST['f_fecha'])) {
                    $this->model_op->setVista('v_cotizacion');
                    $this->model_op->setCampo('fecha');
                    $this->model_op->setValorBuscar($_POST['f_fecha']);
                    $result = $this->model_op->buscar_informacion();
                    echo json_encode($result);
                }
            }
        }

        public function buscar_mes()
        {
            if (isset($_POST['buscar_por'])) {
                if (isset($_POST['f_fecha_mes'])) {
                    $value = $_POST['f_fecha_mes'] . '-';

                    $this->model_op->setVista('v_cotizacion');
                    $this->model_op->setCampo('fecha');
                    $this->model_op->setValorBuscar($value);
                    $result = $this->model_op->filtrar_informacion();
                    echo json_encode($result);
                }
            }
        }

        public function buscar_anio()
        {
            if (isset($_POST['buscar_por'])) {
                if (isset($_POST['f_fecha_anio'])) {
                    $value = $_POST['f_fecha_anio'] . '-';

                    $this->model_op->setVista('v_cotizacion');
                    $this->model_op->setCampo('fecha');
                    $this->model_op->setValorBuscar($value);
                    $result = $this->model_op->filtrar_informacion();
                    echo json_encode($result);
                }
            }
        }

        public function buscar_cliente()
        {
            if (isset($_POST['buscar_por'])) {
                if (isset($_POST['f_cliente'])) {
                    $this->model_op->setVista('v_cotizacion');
                    $this->model_op->setCampo('id_clientes');
                    $this->model_op->setValorBuscar($_POST['f_cliente']);
                    $result = $this->model_op->buscar_informacion();
                    echo json_encode($result);
                }
            }
        }

        public function actualizar_costos () {
            if (isset($_POST['costo_acabado'])) {
                $url = "config/auxiliar_doc_ventas.json";
                $data = file_get_contents($url);
                $json = json_decode($data, true);

                $json['cotizacion']['costo']['acero'] = $_POST['costo_acero'];
                $json['cotizacion']['costo']['acabado'] = $_POST['costo_acabado'];
                $json['cotizacion']['costo']['laton'] = $_POST['costo_laton'];
                $json['cotizacion']['costo']['iva'] = $_POST['costo_iva'];
                $json['cotizacion']['costo']['tratamiento'] = $_POST['costo_tratamiento'];
                
                $newJsonString = json_encode($json);
                file_put_contents($url, $newJsonString);

                echo 1;
            } else {
                echo 0;
            }
        }
    }
