<?php 

    require_once 'models/Model.php';

    class t_diario extends Model {
        public $fecha;
        public $id_estado;
        public $id_folio;

        public function setFecha ($fecha) : void {
            $this->fecha = $fecha;
        }

        public function setEstado ($id_estado) : void {
            $this->id_estado = $id_estado;
        }

        public function setFolio ($id_folio) : void {
            $this->id_folio = $id_folio;
        }

        public function obtener_registros () {
            $condicion = "estado_general = '$this->id_estado' AND fecha = '$this->fecha' ORDER BY id_registro_diario ASC";
            $result = Model::buscar_personalizado('v_reportediario','*',$condicion);
            return $result;
        }
    }

?>