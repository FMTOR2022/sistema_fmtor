<?php
    require_once "models/Model.php";
    
    class t_op extends Model {
        public $op;
        public $calibre;
        public $op_fin;
        public $fecha;
        public $fecha_fin;
        public $plano;
        public $cliente;
        public $estado;
        public $vista;
        public $campo;
        public $valor_buscar;

        public function __construct(){
            parent::__construct();
        }

        public function setOp($op) : void {
            $this->op = $op;
        }

        public function setCalibre($calibre) : void {
            $this->calibre = $calibre;
        }
        
        public function setOpFin($op_fin) : void {
            $this->op_fin = $op_fin;
        }

        public function setFecha($fecha) : void {
            $this->fecha = $fecha;
        }

        public function setFechaFin($fecha_fin) : void {
            $this->fecha_fin = $fecha_fin;
        }

        public function setPlano($plano) : void {
            $this->plano = $plano;
        }

        public function setCliente($cliente) : void {
            $this->cliente = $cliente;
        }

        public function setEstado($estado) : void {
            $this->estado = $estado;
        }

        public function setVista($vista) : void {
            $this->vista = $vista;
        }

        public function setCampo($campo) : void {
            $this->campo = $campo;
        }

        public function setValorBuscar($valor_buscar) : void {
            $this->valor_buscar = $valor_buscar;
        }

        public function obtener_informacion () {
            $result = Model::mostrar($this->vista);
            return $result;
        }

        public function calibre () {
            $result = Model::actualizar('t_orden_produccion',"calibre = '$this->calibre'","Id_Produccion = '$this->op'");
            return $result;
        }

        public function buscar_informacion () {
            $result = Model::buscar($this->vista,$this->campo,$this->valor_buscar);
            return $result;
        }
        
        public function filtrar_informacion () {
            $result = Model::filtrar($this->vista,$this->campo,$this->valor_buscar);
            return $result;
        }

        public function rango_op () {
            $result = Model::filtrar_rango($this->vista,$this->campo,$this->op,$this->op_fin);
            return $result;
        }

        public function rango_fecha () {
            $result = Model::filtrar_rango($this->vista,$this->campo,$this->fecha,$this->fecha_fin);
            return $result;
        }
    }
?>