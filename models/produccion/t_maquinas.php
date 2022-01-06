<?php 
    require_once "models/Model.php";

    class t_maquinas extends Model {
        public $fecha_inicio;
        public $fecha_fin;
        public $concepto;
        public $vista;

        public function __construct () {
            parent::__construct();
        }

        public function setFechaInicio ($fecha_inicio) : void {
            $this->fecha_inicio = $fecha_inicio;
        }

        public function setFechaFin ($fecha_fin) : void {
            $this->fecha_fin = $fecha_fin;
        }

        public function setConcepto ($concepto) : void {
            $this->concepto = $concepto;
        }

        public function setVista ($vista) : void {
            $this->vista = $vista;
        }

        public function obtener_reporte_maquinas () {
            $result = Model::filtrar_rango('v_reporte_'.$this->vista.'_'.$this->concepto,'fecha',$this->fecha_inicio,$this->fecha_fin);
            return $result;
        }
        
        public function obtener_informacion_PDF () {
            $result = Model::filtrar('v_reporte_'.$this->vista.'_'.$this->concepto,'fecha',$this->fecha_inicio.'-');
            return $result;
        }
    }

?>