<?php

    require_once "routes/web.php";

    class Main {
        public $web;

        public function __construct(){
            $this->web = new Web();
        }

        public function mostrar () {
            header('Location: http://localhost/sistema_fmtor/usuario/principal');
        }
        
        public function control () {
            header('Location: http://localhost/sistema_fmtor/usuario/control');
        }
        
        public function diario () {
            header('Location: http://localhost/sistema_fmtor/usuario/diario');
        }
        
        public function ordenes () {
            header('Location: http://localhost/sistema_fmtor/usuario/ordenes');
        }

        public function estados () {
            header('Location: http://localhost/sistema_fmtor/usuario/estados');
        }
        
        public function maquinas () {
            header('Location: http://localhost/sistema_fmtor/usuario/maquinas');
        }
    }
?>