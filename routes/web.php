<?php

    class Web {
        public $url_server;

        public function __construct() {
           $this->url_server = 'http://localhost/sistema_fmtor';
        }

        public function View ($view,$data) {
            if (file_exists('views/'.$view.'.php')) {
                require_once 'views/'.$view.'.php';
            } else { 
                require_once 'controllers/error.php';
                $error = new Errores();
            }
        } 
        
        public function PDF ($view,$data) {
            if (file_exists('public/pdf/'.$view.'.php')) {
                require_once 'public/pdf/'.$view.'.php';
            } else {    
                require_once 'controllers/error.php';
                $error = new Errores();
            }
        }
        
        public function DOC_PDF ($view,$data) {
            if (file_exists('public/pdf/'.$view.'.pdf')) {
                require_once 'public/pdf/'.$view.'.pdf';
            } else {    
                require_once 'controllers/error.php';
                $error = new Errores();
            }
        }
    }

?>