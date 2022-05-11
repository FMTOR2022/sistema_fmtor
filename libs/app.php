<?php 
    session_set_cookie_params(60*60*24*15);
    session_start();
    
    class App {
        public function __construct() {
            require_once 'controllers/error.php';
            $error = new Errores();

            if (isset($_GET['url'])) {
                $url = $_GET['url'];
                $url = rtrim($url,'/');
                $url_div = rtrim($url,'/');
                $url = explode('/', $url);
    
                if (count($url) == 2) {
                    $archivoController = 'controllers/'.$url[0].'.php';
                    if (file_exists($archivoController)) {
                        require_once $archivoController;
                        $controller = new $url[0]();
                        if (isset($url[1]) && method_exists($controller,$url[1])) {
                            $controller->{$url[1]}();
                        } else {
                            $error->error_404($url_div);
                        }
                    } else {
                        $error->error_404($url_div);
                    }
                } else if (count($url) == 3) {
                    $archivoController = 'controllers/'.$url[0].'/'.$url[1].'.php';
                    if (file_exists($archivoController)) {
                        require_once $archivoController;
                        $controller = new $url[1]();
                        if (isset($url[2]) && method_exists($controller,$url[2])) {
                            $controller->{$url[2]}();
                        } else {
                            $error->error_404($url_div);
                        }
                    } else {
                        $error->error_404($url_div);
                    }
                } else if (count($url) < 2) {
                    $error->error_404($url_div);
                } else {
                    $error->error_404($url_div);
                }
            } else {
                header("Location: http://localhost/sistema_fmtor/main/login");
            }
        }
    }

?>