<?php

    require_once "routes/web.php";

    class Main {
        public $web;

        public function __construct(){
            $this->web = new Web();
        }

        public function mostrar () {
            $this->web->View('produccion/main','');
        }
        
        public function control () {
            $this->web->View('produccion/control','');
        }
        
        public function ordenes () {
            $this->web->View('produccion/ordenes','');
        }

        public function estados () {
            $this->web->View('produccion/estado','');
        }
        
        public function maquinas () {
            $this->web->View('produccion/maquinas','');
        }
    }
?>