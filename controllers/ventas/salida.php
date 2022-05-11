<?php
    require_once "models/Model.php";
    require_once "models/ventas/salidaModel.php";
    require_once "models/ventas/facturaModel.php";
    require_once "models/ventas/compraModel.php";
    require_once "models/produccion/t_op.php";
    require_once "routes/web.php";

    class salida
    {
        public $model;
        public $model_op;
        public $compra;
        public $web;
        public $salida;
        public $factura;

        public function __construct()
        {
            $this->salida = new salidaModel();
            $this->web = new Web();
            $this->model = new Model();
            $this->model_op = new t_op();
            $this->compra = new compraModel();
            $this->factura = new facturaModel();
        }

        public function buscar()
        {
            $id_folio = $_GET['clave'];

            $result = $this->model->buscar('v_busqueda_salida', 'Salida', $id_folio);
            echo json_encode($result);
        }

        public function historial () {
            $salida = $this->model->buscar('v_historial_salidas_almacen', 'Id_Folio', $_GET['salida']);
            $this->model = new Model();
            $ordenes = $this->model->mostrar('v_ordenes');

            $data = [
                'salida' => $salida,
                'ordenes' => $ordenes
            ];

             echo json_encode($data);
        }

        public function historial_compra () {
            $data = $this->model->buscar('v_historial_compra', 'id_compra', $_GET['id']);
            echo json_encode($data);
        }
        
        public function generarpdf()
        {
            $salida = $this->model->buscar('v_historial_salidas_almacen', $_GET['atributo'], $_GET['value']);
            $this->model = new Model();
            $ordenes = $this->model->mostrar('v_ordenes'); 
            $this->model = new Model();
            $facturas = $this->model->mostrar('t_facturacion'); 
            $this->model = new Model();
            $compras = $this->model->mostrar('v_historial_compra'); 

            $data = [
                'salida' => $salida,
                'ordenes' => $ordenes,
                'facturas' => $facturas,
                'compras' => $compras
            ];

            $this->web->PDF('ventas/salida', $data);
        }

        public function obtener()
        {
            $interno = $this->model->mostrar('v_salidas_almacen');
            $this->model = new Model();
            $externo = $this->model->mostrar('v_salidas_almacen_externo');
            $this->model = new Model();
            $ordenes = $this->model->mostrar('v_ordenes');
            $data = [
                'salidas' => $interno,
                'externo' => $externo,
                'ordenes' => $ordenes
            ];
            echo json_encode($data);
        }

        public function obtener_pedido () {
            $pedido = $this->model->buscar_personalizado('v_historial_salidas_almacen', '*', 'Id_Pedido =' . $_GET['pedido'] . '');
            $obj = new Model();
            $orden = $obj->buscar('v_ordenes','Id_Pedido', $_GET['pedido']);
            $data = [
                'pedido' => $pedido,
                'orden' => $orden
            ];
            echo json_encode($data);
        }

        public function obtener_per()
        {
            $salidas = $this->model->buscar_personalizado('v_historial_salidas_almacen', '*', 'Id_Folio =' . $_GET['aux'] . '');
            $this->model = new Model();
            $ordenes = $this->model->mostrar('v_ordenes');
            if (isset($_GET['pedido']) && $_GET['pedido'] != 'undefined') {
                $this->model = new Model();
                $pedido = $this->model->buscar_personalizado('v_historial_salidas_almacen', '*', 'Id_Pedido =' . $_GET['pedido'] . '');
                $data = [
                    'salida' => $salidas,
                    'ordenes' => $ordenes,
                    'pedido' => $pedido
                ];
            } else{ 
                $data = [
                    'salida' => $salidas,
                    'ordenes' => $ordenes
                ];
            }
            echo json_encode($data);
        }

        public function obtener_salida () {
            $salida = $this->model->buscar_personalizado('t_salida_almacen', '*', 'Id_Folio =' . $_GET['aux'] . '');
            echo json_encode($salida);
        }
        
        public function cancelar_salida () {
            $this->salida->setSalida($_GET['id']);
            $result = $this->salida->cancelar();
            if ($result) {
                echo 1;
            } else {
                echo 0;
            }
        }

        public function obtener_clientes () {
            $result = $this->model->mostrar('v_clientes');
            echo json_encode($result);
        }

        public function obtener_salidas_disponibles () {
            $result = $this->model->mostrar('v_salidas_disponibles');
            echo json_encode($result);
        }

        public function NuevaSalida() { 
            $aux = 1;
            if (isset($_POST['cotizacion']) && $_POST['cotizacion'] != '') {
                $this->salida->setId_Clientes_2($_POST['cotizacion']);
                $this->salida->setFecha($_POST['Fecha']);

                $result = $this->salida->insertarSalida();
                if ($result) {
                    if (!isset($_POST['general_00'])) {
                        for ($i = 1; $i <= $_POST['cantidad_tornillos']; $i++) {
                            if (isset($_POST['radio_0'.$i]) && $_POST['radio_0'.$i] == 'op_'.$i) {
                                if (isset($_POST['Kardex_'.$i])) {
                                    $this->salida->setKardex($_POST['Kardex_'.$i]);
                                } else {
                                    $this->salida->setKardex(0);
                                }

                                $this->salida->setDibujo($_POST['Dibujo_'.$i]);
                                $this->salida->setCantidad_producir($_POST['cantidad_producir_'.$i]);
                                $this->salida->setNo_Pedido($_POST['pedido_'.$i]);
                                $orden = json_encode($this->salida->insertarOrden());
                                if ($orden) {
                                    $aux = true;
                                } else {
                                    $aux = false;
                                }
                            } else if (isset($_POST['radio_0' . $i]) && $_POST['radio_0' . $i] == 'stock_' . $i) {
                                $this->salida->setKardex($_POST['Kardex_'.$i]);
                                $this->salida->setNo_Pedido($_POST['pedido_' . $i]);
                                $orden = $this->salida->insertarKardex();
                                if ($orden) {
                                    $aux = true;
                                } else {
                                    $aux = false;
                                }
                            }
                        }
                    } else if (count($_POST['general_00']) == $_POST['cantidad_tornillos']) { 
                        $this->compra->setFecha($_POST['Fecha']);
                        $this->compra->setSolicitado($_POST['solicitado_general']);
                        $this->compra->setTerminos($_POST['terminos_general']);
                        $this->compra->setContacto($_POST['contacto_general']);
                        $this->compra->setId_Empresa($_POST['empresa_general']);
                        $this->compra->setId_Proveedor($_POST['proveedor_general']);

                        $result = $this->compra->ingresar_orden();
                        if ($result) {
                            for ($i=1; $i <= $_POST['cantidad_tornillos']; $i++) {
                                if (isset($_POST['Kardex_' . $i]) && $_POST['Kardex_' . $i] != '') {
                                    $this->salida->setKardex($_POST['Kardex_' . $i]);
                                    $this->salida->setNo_Pedido($_POST['pedido_' . $i]);
                                    $res2 = $this->salida->insertarKardex();
                                } 
                                $this->compra->setCodigo($_POST['codigo_'.$i]);
                                $this->compra->setProducto($_POST['producto_'.$i]);
                                $this->compra->setCantidad($_POST['cantidad_'.$i]);
                                $this->compra->setPrecio($_POST['precio_'.$i]);
                                $this->compra->setId_Pedido($_POST['pedido_'.$i]);

                                $result = $this->compra->ingresar_pedido();
                                if ($result) {
                                    $aux = true;
                                } else {
                                    $aux = false;
                                }
                            }
                        } else {
                            $aux = false;
                        }
                    } else if (isset($_POST['general_00']) && count($_POST['general_00']) != $_POST['cantidad_tornillos']) {
                        $arr = array();
                        $contador = 0;
                        for ($i=0; $i <= $_POST['cantidad_tornillos']; $i++) { 
                            if (isset($_POST['radio_0' . $i]) && $_POST['radio_0' . $i] == 'op_' . $i) {
                                $arr[] = $_POST['pedido_'.$i].' Orden de producción';
                                $this->salida->setDibujo($_POST['Dibujo_'.$i]);
                                $this->salida->setCantidad_producir($_POST['cantidad_producir_'.$i]);
                                $this->salida->setNo_Pedido($_POST['pedido_'.$i]);
                                $orden = $this->salida->insertarOrden();
                                if ($orden) {
                                    $aux = true;
                                } else {
                                    $aux = false;
                                }
                            } else if (isset($_POST['radio_0' . $i]) && $_POST['radio_0' . $i] == 'compra_' . $i) {
                                $arr[] = $_POST['pedido_'.$i].' Orden de Compra General';
                                if (isset($_POST['general_00']) && $contador < count($_POST['general_00'])) {
                                    if ($_POST['general_00'][$contador] == $_POST['pedido_'.$i]) {
                                        if (isset($_POST['Kardex_' . $i]) && $_POST['Kardex_' . $i] != '') {
                                            $this->salida->setKardex($_POST['Kardex_' . $i]);
                                            $this->salida->setNo_Pedido($_POST['pedido_' . $i]);
                                            $orden = $this->salida->insertarKardex();
                                        }
                                        $this->compra->setFecha($_POST['Fecha']);
                                        $this->compra->setSolicitado($_POST['solicitado_general']);
                                        $this->compra->setTerminos($_POST['terminos_general']);
                                        $this->compra->setContacto($_POST['contacto_general']);
                                        $this->compra->setId_Empresa($_POST['empresa_general']);
                                        $this->compra->setId_Proveedor($_POST['proveedor_general']);

                                        $result = $this->compra->ingresar_orden();
                                        if ($result) {
                                            $this->compra->setCodigo($_POST['codigo_' . ($i)]);
                                            $this->compra->setProducto($_POST['producto_' . ($i)]);
                                            $this->compra->setCantidad($_POST['cantidad_' . ($i)]);
                                            $this->compra->setPrecio($_POST['precio_' . ($i)]);
                                            $this->compra->setId_Pedido($_POST['pedido_' . ($i)]);

                                            $result = $this->compra->ingresar_pedido();
                                            if ($result) {
                                                $aux = true;
                                            } else {
                                                $aux = false;
                                            }
                                        } else {
                                            $aux = false;
                                        }
                                    }
                                    $contador++;
                                } else {
                                    $arr[] = $_POST['pedido_'.$i].' Orden independiente';
                                    $this->compra->setFecha($_POST['Fecha']);
                                    $this->compra->setSolicitado($_POST['solicitado_'.$i]);
                                    $this->compra->setTerminos($_POST['terminos_'.$i]);
                                    $this->compra->setContacto($_POST['contacto_'.$i]);
                                    $this->compra->setId_Empresa($_POST['empresa_'.$i]);
                                    $this->compra->setId_Proveedor($_POST['Proveedor_'.$i]);

                                    $result = $this->compra->ingresar_orden();
                                    if ($result) {
                                        if (isset($_POST['Kardex_' . $i]) && $_POST['Kardex_' . $i] != '') {
                                            $this->salida->setKardex($_POST['Kardex_' . $i]);
                                            $this->salida->setNo_Pedido($_POST['pedido_' . $i]);
                                            $orden = $this->salida->insertarKardex();
                                        }
                                            $this->compra->setCodigo($_POST['codigo_' . ($i)]);
                                            $this->compra->setProducto($_POST['producto_' . ($i)]);
                                            $this->compra->setCantidad($_POST['cantidad_' . ($i)]);
                                            $this->compra->setPrecio($_POST['precio_' . ($i)]);
                                            $this->compra->setId_Pedido($_POST['pedido_' . ($i)]);

                                            $result = $this->compra->ingresar_pedido();
                                            if ($result) {
                                                $aux = true;
                                            } else {
                                                $aux = false;
                                            }
                                    } else {
                                        $aux = false;
                                    }
                                }
                            } 
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

        public function registrar_factura () {
            if (isset($_POST['cantidad_factura']) && isset($_POST['kilos_factura']) && isset($_POST['Factura']) && isset($_POST['Empaque']) && isset($_POST['empresa_factura'])) {
                $this->factura->setId_Pedido($_POST['pedido_factura']);
                $this->factura->setFactura($_POST['Factura']);
                $this->factura->setEmpaque($_POST['Empaque']);
                $this->factura->setCantidad_Entregar($_POST['cantidad_factura']);
                $this->factura->setKilos_entregados($_POST['kilos_factura']);
                if (isset($_POST['concepto_factura'])) {
                    $this->factura->setConcepto($_POST['concepto_factura']);
                } else {
                    $this->factura->setConcepto(0);
                }
                $this->factura->setId_Empresa($_POST['empresa_factura']);

                $result = $this->factura->insertar_factura();

                if ($result) {
                    echo 1;
                } else {
                    echo 2;
                }
            } else {
                echo 0;
            }
        }

        public function actualizar_solo_salida () {
            if (isset($_POST['Salida_e']) && $_POST['Salida_e'] != '') {
                $this->salida->setSalida($_POST['Salida_e']);
                $this->salida->setFecha($_POST['Fecha_e']);
                $result = $this->salida->actualizarSoloSalida();

                if ($result) {
                    echo $result;
                } else {
                    echo 2;
                }
            }
        }

        public function actualizarSalida()
        {
            if (isset($_POST['Pedido_p']) && $_POST['Pedido_p'] != '') {
                $this->salida->setSalida(($_POST['Pedido_p']));
                $this->salida->setCantidad_millares($_POST['Cantidad_millares_p']);
                $this->salida->setCodigo($_POST['Codigo_p']);
                $this->salida->setPedido_pza($_POST['Pedido_pza_p']);
                $this->salida->setMedida($_POST['Medida_p']);
                $this->salida->setDescripcion($_POST['Descripcion_p']);
                $this->salida->setAcabado($_POST['Acabado_p']);
                $this->salida->setPrecio_millar($_POST['Precio_millar_p']);
                $this->salida->setFactor($_POST['factor_p']);
                $this->salida->setFecha_entrega($_POST['Fecha_entrega_p']);
                $this->salida->setMaterial($_POST['Material_p']);

                if (!isset($_POST['sin_op_p'])) {
                    $this->salida->setDibujo($_POST['Dibujo_p']);
                    $this->salida->setCantidad_producir($_POST['cantidad_producir_p']);

                   $this->salida->actualizarOrden();
                }

                if (isset($_POST['op_cancelar']) && $_POST['op_cancelar'] == 'on') {
                    $this->salida->cancelarOrden();
                }

                if (isset($_POST['tratamiento_p']) && $_POST['tratamiento_p'] == 'on') {
                    $this->salida->setTratamiento('T/TERMICO'); 
                } else {
                    $this->salida->setTratamiento('0'); 
                }

                $result = $this->salida->actualizarSalida();
                
                if ($result) {
                    echo 1;
                } else {
                    echo 2;
                }
            } else {
                echo 0;
            }
        }

        public function eliminarSalida()
        {
            if (isset($_GET['dato'])) {
                $id = $_GET['dato'];
                $result = $this->model->eliminar('t_salida_almacen', "Id_Folio = '$id'");
                echo $result;
            }
        }

        public function buscar_salida()
        {
            if (isset($_POST['buscar_por'])) {
                if (isset($_POST['f_salida'])) {
                    $this->model_op->setVista('v_salidas_almacen');
                    $this->model_op->setCampo('Id_Folio');
                    $this->model_op->setValorBuscar($_POST['f_salida']);
                    $op = $this->model_op->buscar_informacion();
                    $ordenes = $this->model->mostrar('v_ordenes');
                    $data = [
                        'salidas' => $op,
                        'ordenes' => $ordenes
                    ];
                    echo json_encode($data);
                } else {
                    echo 2;
                }
            } else {
                echo 1;
            }
        }

        public function buscar_rango_salidas()
        {
            if (isset($_POST['buscar_por'])) {
                if (isset($_POST['f_r_salida_m']) && isset($_POST['f_r_salida_M'])) {
                    $this->model_op->setVista('v_salidas_almacen');
                    $this->model_op->setCampo('Id_Folio');
                    $this->model_op->setOp($_POST['f_r_salida_m']);
                    $this->model_op->setOpFin($_POST['f_r_salida_M']);
                    $result = $this->model_op->rango_op();
                    $ordenes = $this->model->mostrar('v_ordenes');
                    $data = [
                        'salidas' => $result,
                        'ordenes' => $ordenes
                    ];
                    echo json_encode($data);
                }
            }
        }

        public function buscar_op()
        {
            if (isset($_POST['buscar_por'])) {
                if (isset($_POST['f_op'])) {
                    $this->model_op->setVista('v_salidas_almacen');
                    $this->model_op->setCampo('Id_Folio');
                    $this->model_op->setValorBuscar($_POST['f_op']);
                    $op = $this->model_op->buscar_informacion();
                    $ordenes = $this->model->mostrar('v_ordenes');
                    $data = [
                        'salidas' => $op,
                        'ordenes' => $ordenes
                    ];
                    echo json_encode($data);
                } else {
                    echo 2;
                }
            } else {
                echo 1;
            }
        }

        public function buscar_rango_op()
        {
            if (isset($_POST['buscar_por'])) {
                if (isset($_POST['f_r_op_m']) && isset($_POST['f_r_op_M'])) {
                    $this->model_op->setVista('v_salidas_almacen');
                    $this->model_op->setCampo('Id_Folio');
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
                    $this->model_op->setVista('v_salidas_almacen');
                    $this->model_op->setCampo('fecha');
                    $this->model_op->setFecha($_POST['f_r_fecha_m']);
                    $this->model_op->setFechaFin($_POST['f_r_fecha_M']);
                    $result = $this->model_op->rango_fecha();
                    $ordenes = $this->model->mostrar('v_ordenes');
                    $data = [
                        'salidas' => $result,
                        'ordenes' => $ordenes
                    ];
                    echo json_encode($data);
                }
            }
        }

        public function buscar_fecha()
        {
            if (isset($_POST['buscar_por'])) {
                if (isset($_POST['f_fecha'])) {
                    $this->model_op->setVista('v_salidas_almacen');
                    $this->model_op->setCampo('fecha');
                    $this->model_op->setValorBuscar($_POST['f_fecha']);
                    $result = $this->model_op->buscar_informacion();
                    $ordenes = $this->model->mostrar('v_ordenes');
                    $data = [
                        'salidas' => $result,
                        'ordenes' => $ordenes
                    ];
                    echo json_encode($data);
                }
            }
        }

        public function buscar_mes()
        {
            if (isset($_POST['buscar_por'])) {
                if (isset($_POST['f_fecha_mes'])) {
                    $value = $_POST['f_fecha_mes'] . '-';

                    $this->model_op->setVista('v_salidas_almacen');
                    $this->model_op->setCampo('fecha');
                    $this->model_op->setValorBuscar($value);
                    $result = $this->model_op->filtrar_informacion();
                    $ordenes = $this->model->mostrar('v_ordenes');
                    $data = [
                        'salidas' => $result,
                        'ordenes' => $ordenes
                    ];
                    echo json_encode($data);
                }
            }
        }

        public function buscar_anio()
        {
            if (isset($_POST['buscar_por'])) {
                if (isset($_POST['f_fecha_anio'])) {
                    $value = $_POST['f_fecha_anio'] . '-';

                    $this->model_op->setVista('v_salidas_almacen');
                    $this->model_op->setCampo('fecha');
                    $this->model_op->setValorBuscar($value);
                    $result = $this->model_op->filtrar_informacion();
                    $ordenes = $this->model->mostrar('v_ordenes');
                    $data = [
                        'salidas' => $result,
                        'ordenes' => $ordenes
                    ];
                    echo json_encode($data);
                }
            }
        }

        public function buscar_cliente()
        {
            if (isset($_POST['buscar_por'])) {
                if (isset($_POST['f_cliente'])) {
                    $this->model_op->setVista('v_salidas_almacen');
                    $this->model_op->setCampo('razon_social');
                    $this->model_op->setValorBuscar($_POST['f_cliente']);
                    $result = $this->model_op->buscar_informacion();
                    $ordenes = $this->model->mostrar('v_ordenes');
                    $data = [
                        'salidas' => $result,
                        'ordenes' => $ordenes
                    ];
                    echo json_encode($data);
                }
            }
        }
    }
?>