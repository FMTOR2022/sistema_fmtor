<?php 

    require_once 'models/Model.php';
    require_once 'models/ventas/compraModel.php';
    require_once 'routes/web.php';

    class Compras {
        public $model;
        public $model_compra;
        public $web;

        public function __construct() {
            $this->model = new Model();
            $this->model_compra = new compraModel();
            $this->web = new Web();
        }

        public function generar_pdf () {
            if (isset($_GET['empresa']) && $_GET['empresa'] == 1) {
                $this->model = new Model();
                $empresa = $this->model->buscar_personalizado('t_informacion_empresa','*', "Id_Empresa = '".$_GET['empresa']."'");
                $this->model = new Model();
                $orden = $this->model->buscar_personalizado('t_orden_compra','*', "Id_Compra  = '".$_GET['id']. "' AND FK_Empresa = '".$_GET['empresa']."'");
                $this->model = new Model();
                $pedidos = $this->model->buscar_personalizado('t_pedido_compra', '*', "FK_Orden_Compra  = '" . $_GET['id'] . "'");
                $this->model = new Model();
                $proveedor = $this->model->buscar_personalizado('t_proveedores', '*', "Id_Proveedor  = '" . $orden[0]['FK_Proveedor'] . "'");
                $data = [
                    'empresa' => $empresa,
                    'orden' => $orden,
                    'pedidos' => $pedidos,
                    'proveedor' => $proveedor
                ];

                $this->web->PDF('ventas/compra_fmtor',$data);
            } else if (isset($_GET['empresa']) && $_GET['empresa'] == 2) {
                $this->model = new Model();
                $empresa = $this->model->buscar_personalizado('t_informacion_empresa', '*', "Id_Empresa = '" . $_GET['empresa'] . "'");
                $this->model = new Model();
                $orden = $this->model->buscar_personalizado('t_orden_compra', '*', "Id_Compra  = '" . $_GET['id'] . "' AND FK_Empresa = '" . $_GET['empresa'] . "'");
                $this->model = new Model();
                $pedidos = $this->model->buscar_personalizado('t_pedido_compra', '*', "FK_Orden_Compra  = '" . $_GET['id'] . "'");
                $this->model = new Model();
                $proveedor = $this->model->buscar_personalizado('t_proveedores', '*', "Id_Proveedor  = '" . $orden[0]['FK_Proveedor'] . "'");
                $data = [
                    'empresa' => $empresa,
                    'orden' => $orden,
                    'pedidos' => $pedidos,
                    'proveedor' => $proveedor
                ];
                $this->web->PDF('ventas/compra_rdg',$data);
            }
        }

        public function obtener() {
            echo json_encode($this->model->mostrar('v_orden_compra'));
        }

        public function obtener_orden () {
            if (isset($_GET['id'])) {
                echo json_encode($this->model->buscar_personalizado('t_orden_compra','*',"Id_Compra = '".$_GET['id']."'"));
            } else {
                echo 0;
            }
        }

        public function obtener_empresas() {
            echo json_encode($this->model->mostrar('v_empresa'));
        }

        public function obtener_proveedores () {
            echo json_encode($this->model->mostrar('v_proveedor'));
        }

        public function obtener_informacion_pedidos () {
            if (isset($_GET['id'])) {
                $pedidos = $this->model->buscar_personalizado('t_pedido_compra', '*', "FK_Orden_Compra  = '" . $_GET['id'] . "'");
                echo json_encode($pedidos);
            } else {
                echo 0;
            }
        }

        public function obtener_informacion_pedido () {
            if (isset($_GET['id'])) {
                $pedidos = $this->model->buscar_personalizado('t_pedido_compra', '*', "Id_Pedido_Compra  = '" . $_GET['id'] . "'");
                echo json_encode($pedidos);
            } else {
                echo 0;
            }
        }

        public function insertar () {
            if (isset($_POST['solicitado']) && $_POST['solicitado'] != '') {
                // $this->model_compra->setSalida($_POST['salida_compra']);
                $this->model_compra->setFecha($_POST['Fecha']);
                $this->model_compra->setSolicitado($_POST['solicitado']);
                $this->model_compra->setTerminos($_POST['terminos']);
                $this->model_compra->setContacto($_POST['contacto']);
                $this->model_compra->setId_Empresa($_POST['empresas']);
                $this->model_compra->setId_Proveedor($_POST['proveedores']);

                $result = $this->model_compra->ingresar_orden();
                
                if ($result) {
                    if (isset($_POST['radio']) && $_POST['radio'] == 'material'){
                        for ($i=1; $i <= $_POST['Cantidad_Tornillos']; $i++) { 
                            $this->model_compra->setCodigo($_POST['codigo_'.$i]);
                            $this->model_compra->setProducto($_POST['producto_'.$i]);
                            $this->model_compra->setCantidad($_POST['cantidad_'.$i]);
                            $this->model_compra->setPrecio($_POST['precio_'.$i]);
    
                            $result = $this->model_compra->ingresar_pedido();
                        }

                        echo 1;
                    } else if (isset($_POST['radio']) && $_POST['radio'] == 'pedido') {
                        for ($i=1; $i <= $_POST['Cantidad_Tornillos']; $i++) { 
                            if (isset($_POST['sin_sa_'.$i])) {
                                $this->model_compra->setCodigo($_POST['codigo_0'.$i]);
                                $this->model_compra->setProducto($_POST['producto_0'.$i]);
                                $this->model_compra->setCantidad($_POST['cantidad_0'.$i]);
                                $this->model_compra->setPrecio($_POST['precio_0'.$i]);
                                $this->model_compra->setId_Pedido($_POST['id_pedido_'.$i]);
        
                                $result = $this->model_compra->ingresar_pedido();
                            }
                        }
                        echo 1;
                    }
                } else {
                    echo 0;
                }
            } else {
                echo 0;
            }
        }

        public function actualizar () {
            if (isset($_POST['Id_Compra_p']) && $_POST['Id_Compra_p'] != '') {
                $this->model_compra->setId_Compra($_POST['Id_Compra_p']);
                $this->model_compra->setFecha($_POST['Fecha_p']);
                $this->model_compra->setId_Empresa($_POST['empresas_p']);
                $this->model_compra->setId_Proveedor($_POST['proveedores_p']);
                $this->model_compra->setSolicitado($_POST['solicitado_p']);
                $this->model_compra->setTerminos($_POST['terminos_p']);
                $this->model_compra->setContacto($_POST['contacto_p']);

                $result = $this->model_compra->actualizar_compra();
                
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
            if (isset($_POST['id_pedido']) && $_POST['id_pedido'] != '') {
                $this->model_compra->setId_Pedido_Compra($_POST['id_pedido']);
                $this->model_compra->setCodigo($_POST['codigo_p']);
                $this->model_compra->setProducto($_POST['producto_p']);
                $this->model_compra->setCantidad($_POST['cantidad_p']);
                $this->model_compra->setPrecio($_POST['precio_p']);

                $result = $this->model_compra->actualizar_pedido();
                
                if ($result) {
                    echo 1;
                } else {
                    echo 2;
                }
            } else {
                echo 0;
            }
        }

        public function buscar_salida() {
            if (isset($_POST['buscar_por'])) {
                if (isset($_POST['f_salida'])) {
                    $data = $this->model->buscar_personalizado('v_orden_compra','*', "Id_Compra = '".$_POST['f_salida']."'");
                    echo json_encode($data);
                } else {
                    echo 2;
                }
            } else {
                echo 1;
            }
        }

        public function buscar_rango_salidas() {
            if (isset($_POST['buscar_por'])) {
                if (isset($_POST['f_r_salida_m']) && isset($_POST['f_r_salida_M'])) {
                    $data = $this->model->buscar_personalizado('v_orden_compra', '*', "Id_Compra BETWEEN '" . $_POST['f_r_salida_m'] . "' AND '" . $_POST['f_r_salida_M'] . "'");
                    echo json_encode($data);
                }
            }
        }

        public function buscar_rango_fecha() {
            if (isset($_POST['buscar_por'])) {
                if (isset($_POST['f_r_fecha_m']) && isset($_POST['f_r_fecha_M'])) {
                    $data = $this->model->buscar_personalizado('v_orden_compra', '*', "Fecha BETWEEN '" . $_POST['f_r_fecha_m'] . "' AND '" . $_POST['f_r_fecha_M'] . "'");
                    echo json_encode($data);
                }
            }
        }

        public function buscar_fecha() {
            if (isset($_POST['buscar_por'])) {
                if (isset($_POST['f_fecha'])) {
                    $data = $this->model->buscar_personalizado('v_orden_compra', '*', "Fecha = '" . $_POST['f_fecha'] . "'");
                    echo json_encode($data);
                }
            }
        }

        public function buscar_mes() {
            if (isset($_POST['buscar_por'])) {
                if (isset($_POST['f_fecha_mes'])) {
                    $value = $_POST['f_fecha_mes'] . '-';
                    $data = $this->model->buscar_personalizado('v_orden_compra', '*', "Fecha LIKE '%" . $value . "%'");
                    echo json_encode($data);
                }
            }
        }

        public function buscar_anio() {
            if (isset($_POST['buscar_por'])) {
                if (isset($_POST['f_fecha_anio'])) {
                    $value = $_POST['f_fecha_anio'] . '-';
                    $data = $this->model->buscar_personalizado('v_orden_compra', '*', "Fecha LIKE '" . $value . "%'");
                    echo json_encode($data);
                }
            }
        }

        public function buscar_cliente() {
            if (isset($_POST['buscar_por'])) {
                if (isset($_POST['f_proveedor_b'])) {
                    $data = $this->model->buscar_personalizado('v_orden_compra', '*', "FK_Proveedor = '" . $_POST['f_proveedor_b'] . "'");
                    echo json_encode($data);
                }
            }
        }

        public function buscar_empresa() {
            if (isset($_POST['buscar_por'])) {
                if (isset($_POST['f_empresa_b'])) {
                    $data = $this->model->buscar_personalizado('v_orden_compra', '*', "FK_Empresa = '" . $_POST['f_empresa_b'] . "'");
                    echo json_encode($data);
                }
            }
        }

        public function buscar_informacion () {
            if (isset($_GET['id']) && $_GET['id'] != '') {
                $orden = $this->model->buscar_personalizado('v_orden_compra', '*', "Id_Compra = '" . $_GET['id'] . "'");
                $this->model = new Model();
                $pedidos = $this->model->buscar_personalizado('t_pedido_compra', '*', "FK_Orden_Compra = '" . $_GET['id'] . "'");
                $data = [
                    'orden' => $orden,
                    'pedidos' => $pedidos
                ];

                echo json_encode($data);
            } else {
                echo 0;
            }
        }

        public function buscar_pedido () {
            if (isset($_GET['id']) && $_GET['id'] != '') {
                $pedidos = $this->model->buscar_personalizado('t_pedido_compra', '*', "Id_Pedido_Compra = '" . $_GET['id'] . "'");

                echo json_encode($pedidos);
            } else {
                echo 0;
            }
        }

        public function actualizar_costos () {
            if (isset($_POST['costo_iva'])) {
                $url = "config/auxiliar_doc_ventas.json";
                $data = file_get_contents($url);
                $json = json_decode($data, true);
                
                $json['orden_de_compra']['costo']['iva'] = $_POST['costo_iva'];
                
                $newJsonString = json_encode($json);
                file_put_contents($url, $newJsonString);

                echo 1;
            } else {
                echo 0;
            }
        }
    }

?>