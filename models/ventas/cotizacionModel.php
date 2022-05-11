<?php
    require_once "models/Model.php";

    class cotizacionModel extends Model {
        public $Id_Cotizacion;
        public $Fecha;
        public $Id_Clientes_1;

        public $Importe;
        public $Notas;
        public $Empleado;

        public function __construct() {
            parent::__construct();
        }

        public function setId_Cotizacion($Id_Cotizacion) : void {
            $this->Id_Cotizacion = $Id_Cotizacion;
        }

        public function setFecha($Fecha) : void {
            $this->Fecha = $Fecha;
        }

        public function setId_Clientes_1($Id_Clientes_1) : void {
            $this->Id_Clientes_1 = $Id_Clientes_1;
        }

        public function setImporte($Importe) : void {
            $this->Importe = $Importe;
        }

        public function setNotas($Notas) : void {
            $this->Notas = $Notas;
        }

        public function setEmpleado($Empleado) : void {
            $this->Empleado = $Empleado;
        }

        public function insertar_cotizacion() {
            $tabla = 't_cotizacion';
            $parametros = 'Fecha,Id_Clientes_FK';
            $values = "'$this->Fecha','$this->Id_Clientes_1'";
            $validacion = Model::insertar($tabla, $parametros, $values);
            return $validacion;
        }

        public function solo_cotizacion() {
            $tabla = 't_cotizacion';
            $valores = "Fecha = '$this->Fecha',Id_Clientes_FK = '$this->Id_Clientes_1'";
            $condicion = "Id_Cotizacion = '$this->Id_Cotizacion'";
            $validacion = Model::actualizar($tabla, $valores, $condicion);
            return $validacion;
        }
    }
?>