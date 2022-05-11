<?php

    require_once "models/calidad/model.php";
    require_once "routes/web.php";

    class Main {
        public $model;
        public $web;

        public function __construct(){
            $this->web = new Web();
        }

        public function mostrar () {
            $this->web->View('calidad/main','');
        }
        public function catalogo () {
            $this->web->View('calidad/catalogo','');
        }
        
        public function certificados () {
            $this->web->View('calidad/certificados','');
        }

        public function rechazos () {
            $this->web->View('calidad/rechazos','');
        }
        
        public function iso () {
            $this->web->View('calidad/iso','');
        }
        public function registro_catalogo () {
            $this->web->View('calidad/registro_catalogo','');
        }
    }
?>