<?php 

    require_once 'models/Model.php';

    class facturaModel extends Model {
        public $Id_Factura;
        public $Factura;
        public $Empaque;
        public $Cantidad_entregar;
        public $Kilos_entregados;
        public $Concepto;
        public $Id_Pedido_FK;
        public $Id_Empresa_FK;

        public function __construct() {
            parent::__construct();
        }

        public function setId_Factura ($Id_Factura) : void {
            $this->Id_Factura = $Id_Factura;
        }

        public function setFactura ($Factura) : void {
            $this->Factura = $Factura;
        }   

        public function setEmpaque ($Empaque) : void {
            $this->Empaque = $Empaque;
        }

        public function setCantidad_Entregar ($Cantidad_entregar) : void {
            $this->Cantidad_entregar = $Cantidad_entregar;
        }
        
        public function setKilos_entregados ($Kilos_entregados) : void {
            $this->Kilos_entregados = $Kilos_entregados;
        }

        public function setConcepto ($Concepto) : void {
            $this->Concepto = $Concepto;
        }

        public function setId_Pedido ($Id_Pedido_FK) : void {
            $this->Id_Pedido_FK = $Id_Pedido_FK;
        }

        public function setId_Empresa ($Id_Empresa_FK) : void {
            $this->Id_Empresa_FK = $Id_Empresa_FK;
        }

        public function insertar_factura () {
            $tabla = 't_facturacion';
            $campos = 'Factura,Empaque,Cantidad_entregada,Kilos_Entregados,Concepto,Id_Pedido_FK,Id_Empresa_FK';
            $values = "'$this->Factura','$this->Empaque','$this->Cantidad_entregar','$this->Kilos_entregados','$this->Concepto','$this->Id_Pedido_FK','$this->Id_Empresa_FK'";
            $result = Model::insertar($tabla,$campos,$values);
            return $result;
        }
    }

?>