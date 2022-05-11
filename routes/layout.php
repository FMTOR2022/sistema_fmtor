<?php 

    class Layout {
        public function StartLayout () {
            require_once 'public/modules/sesion_depto.php';
            echo '<!DOCTYPE html>';
            echo '<html lang="en">';
            echo '<head>';
                require_once 'public/modules/head.php';
                echo '<title>'. $_SESSION['ZGVwdG8='] .'</title>';
            echo '</head>';
            echo '<body>';
                echo '<div class="contenedor">';
                    echo '<a href="#top" class="btn btn-icon btn-flotante btn-icon-self material-icons" id="btn-subir">expand_less</a>';
                    self::Menu();
                    echo '<div class="contenido hidde_menu" id="contenido">';
                        self::Header();
                        echo '<div class="informacion">';
        }

        public function Menu () {
            require_once 'public/modules/menus/menu_usuario.php';
        }

        public function Header () {
            require_once 'public/modules/header.php';
        }

        public function EndLayout () {
                            echo '</div>';
                        echo '</div>';
                    echo '</div>';
                echo '<script src="'.$this->url_server.'/public/js/fmtor_libreria.js?1.1"></script>';
                // echo '<script src="'.$this->url_server.'/public/js/worker/script.js"></script>';
            echo '</body>';
            echo '</html>';
        }
    }

?>