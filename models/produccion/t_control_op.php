<?php 
    require_once "models/Model.php";

    class TcontrolOp extends Model {
        public $id;
        public $no_maquina;
        public $bote;
        public $fecha_entrega;
        public $pzas;
        public $kilos;
        public $turno;
        public $observaciones;
        public $op;
        public $id_estado;
        public $vista;
        
        public function __construct() {
            parent::__construct();
        }

        public function setId($id):void {
            $this->id = $id;
        }

        public function setNoMaquina($no_maquina):void {
            $this->no_maquina = $no_maquina;
        }

        public function setBote($bote):void {
            $this->bote = $bote;
        }

        public function setFechaEntrega($fecha_entrega):void {
            $this->fecha_entrega = $fecha_entrega;
        }

        public function setPzas($pzas):void {
            $this->pzas = $pzas;
        }

        public function setKilos($kilos):void {
            $this->kilos = $kilos;
        }

        public function setTurno($turno):void {
            $this->turno = $turno;
        }

        public function setObservaciones($observaciones):void {
            $this->observaciones = $observaciones;
        }

        public function setOp($op):void{
            $this->op = $op;
        }

        public function setIdEstado($id_estado):void {
            $this->id_estado = $id_estado;
        }

        public function setVista ($vista):void {
            $this->vista = $vista;
        }

        public function obtener_registros () {
            $result = Model::mostrar($this->vista);
            return $result;
        }

        public function insertar_registro () {
            $campos = 'no_maquina,fecha,botes,pzas,kilos,turno,observaciones,id_estados_1,Id_control_produccion_1';
            $values = "'$this->no_maquina','$this->fecha_entrega','$this->bote','$this->pzas','$this->kilos','$this->turno','$this->observaciones','$this->id_estado','$this->op'";
            $result = Model::insertar('t_registro_diario',$campos,$values);
            return $result;
        }

        public function actualizar_registro () {
            $valores = "no_maquina = '$this->no_maquina', fecha = '$this->fecha_entrega', botes = '$this->bote', pzas = '$this->pzas', kilos = '$this->kilos', turno = '$this->turno', observaciones = '$this->observaciones', id_estados_1 = '$this->id_estado'";
            $condicion = "id_registro_diario = '$this->op'";
            $result = Model::actualizar('t_registro_diario',$valores,$condicion);
            return $result;
        }

        public function eliminar_registro () {
            $result = Model::eliminar('t_registro_diario',"id_registro_diario = '$this->id'");
            return $result;
        }

        public function obtener_control () {
            $result = Model::buscar($this->vista,'Id_Folio_1',$this->op);
            return $result;
        }

        public function obtener_registro_diario () {
            $result = Model::buscar('t_registro_diario','id_registro_diario',$this->id);
            return $result;
        }
        
        public function obtener_informacion_op () {
            $result = Model::buscar('v_control','Orden_Produccion',$this->op);
            return $result;
        }
    }