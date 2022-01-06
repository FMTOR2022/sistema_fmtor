<?php 
    require_once 'routes/web.php';

    class Errores {
        public $web;

        public function __construct() {
            $this->web = new Web();
        }

        public function error_404 ($error) {
            $this->web->View('404','"'.$error.'" no existe');
        }
    }

?>