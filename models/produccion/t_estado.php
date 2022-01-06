<?php 

    require_once 'models/Model.php';

    class t_estado extends Model {
        public $vista;

        public function __construct () {
            parent::__construct();
        }

        public function setVista ($vista) : void {
            $this->vista = $vista;
        }

        public function obtener_informacion () {
            $result = Model::mostrar($this->vista);
            return $result;
        }
    }

?>