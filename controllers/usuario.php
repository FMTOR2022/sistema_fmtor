<?php 
    require_once "routes/web.php";
    require_once "routes/web_layout.php";

    class usuario {
        public $web;
        public $web_layout;

        public function __construct(){
            $this->web = new Web();
            $this->web_layout = new Web_Layout();
        }

        public function principal () {
            $this->web->View('user','');
        }
        
        public function control () {
            $this->web_layout->View('produccion/control','');
        }
        
        public function diario () {
            $this->web_layout->View('produccion/diario','');
        }
        
        public function ordenes () {
            $this->web_layout->View('produccion/ordenes','');
        }

        public function estados () {
            $this->web_layout->View('produccion/estado','');
        }
        
        public function maquinas () {
            $this->web_layout->View('produccion/maquinas','');
        }        
        
        public function programa () {
            $this->web_layout->View('produccion/programa','');
        }        
        
        public function explosion () {
            $this->web_layout->View('produccion/explosion','');
        }        
        
        public function personal () {
            if (isset($_SESSION['ZW1wbGVhZG8='])) {
                $this->web->View('sii/personal','');
            }
        }

        public function clientes () {
            $this->web_layout->View('ventas/clientes','');
        }

        public function cotizacion () {
            $this->web_layout->View('ventas/cotizacion','');
        }

        public function salidas () {
            $this->web_layout->View('ventas/salidas','');
        }
        
        public function orden () {
            $this->web_layout->View('ventas/orden','');
        }
        
        public function reportes () {
            $this->web_layout->View('ventas/reportes','');
        }

        public function compra () {
            $this->web_layout->View('compras/compra','');
        }

        public function proveedores () {
            $this->web_layout->View('compras/proveedores','');
        }
    }
?>