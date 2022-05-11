<?php 

    require_once 'models/Model.php';

    class compraModel extends Model {
        public $id_orden_compra;
        public $id_pedido_compra;
        public $fecha;
        public $solicitado;
        public $terminos;
        public $contacto;
        public $codigo;
        public $producto;
        public $cantidad;
        public $precio;
        public $id_empresa;
        public $id_proveedor;
        public $id_salida;
        public $id_pedido_fk;

        public function __construct(){
            parent::__construct();
        }

        public function setSalida ($id_salida) : void {
            $this->id_salida = $id_salida;
        }
        
        public function setId_Compra ($id_orden_compra) : void {
            $this->id_orden_compra = $id_orden_compra;
        }

        public function setId_Pedido_Compra ($id_pedido_compra) : void {
            $this->id_pedido_compra = $id_pedido_compra;
        }

        public function setFecha ($fecha) : void {
            $this->fecha = $fecha;
        }

        public function setSolicitado ($solicitado) : void {
            $this->solicitado = $solicitado;
        }

        public function setTerminos ($terminos) : void {
            $this->terminos = $terminos;
        }

        public function setContacto ($contacto) : void {
            $this->contacto = $contacto;
        }

        public function setCodigo ($codigo) : void {
            $this->codigo = $codigo;
        }

        public function setProducto ($producto) : void {
            $this->producto = $producto;
        }

        public function setCantidad ($cantidad) : void {
            $this->cantidad = $cantidad;
        }

        public function setPrecio ($precio) : void {
            $this->precio = $precio;
        }

        public function setId_Empresa ($id_empresa) : void {
            $this->id_empresa = $id_empresa;
        }

        public function setId_Proveedor ($id_proveedor) : void {
            $this->id_proveedor = $id_proveedor;
        }

        public function setId_Pedido ($id_pedido_fk) : void {
            $this->id_pedido_fk = $id_pedido_fk;
        }

        public function ingresar_orden () {
            $obj = new Model();
            $tabla = 't_orden_compra';
            $columnas = 'Fecha,Solicitado,Terminos,Contacto,FK_Proveedor,FK_Empresa';
            $valores = "'$this->fecha','$this->solicitado','$this->terminos','$this->contacto','$this->id_proveedor','$this->id_empresa'";
            $result = $obj->insertar($tabla,$columnas,$valores);
            return $result;
        }

        public function ingresar_pedido () {
            $obj_2 = new Model();
            $id_pedido = $obj_2->buscar_personalizado('t_orden_compra', 'Id_Compra', '1 ORDER BY Id_Compra DESC LIMIT 1');

            $obj = new Model();
            $tabla = 't_pedido_compra';
            
            if ($this->id_pedido_fk != '') {
                $columnas = 'Codigo,Producto,Cantidad,Precio,FK_Orden_Compra,Id_Pedido_FK';
                $valores = "'$this->codigo','$this->producto','$this->cantidad','$this->precio','".$id_pedido[0]['Id_Compra']."','$this->id_pedido_fk'";
            } else {
                $columnas = 'Codigo,Producto,Cantidad,Precio,FK_Orden_Compra';
                $valores = "'$this->codigo','$this->producto','$this->cantidad','$this->precio','".$id_pedido[0]['Id_Compra']."'";
            }

            $result = $obj->insertar($tabla,$columnas,$valores);
            return $result;
        }

        public function ultima_orden () {
            $obj_2 = new Model();
            $orden = $obj_2->buscar_personalizado('t_orden_compra', 'Id_Compra', '1 ORDER BY Id_Compra DESC LIMIT 1');
            return $orden;
        }

        public function actualizar_compra () {
            $tabla = 't_orden_compra';
            $columnas = "Fecha = '$this->fecha',Contacto = '$this->contacto',Solicitado = '$this->solicitado',Terminos = '$this->terminos',FK_Empresa = '$this->id_empresa',FK_Proveedor = '$this->id_proveedor'";
            $valores = "Id_Compra = '$this->id_orden_compra'";
            $result = Model::actualizar($tabla,$columnas,$valores);
            return $result;
        }

        public function actualizar_pedido () {
            $tabla = 't_pedido_compra';
            $columnas = "Codigo = '$this->codigo',Producto = '$this->producto',Cantidad = '$this->cantidad',Precio = '$this->precio'";
            $valores = "Id_Pedido_Compra = '$this->id_pedido_compra'";
            $result = Model::actualizar($tabla,$columnas,$valores);
            return $result;
        }
    }

?>