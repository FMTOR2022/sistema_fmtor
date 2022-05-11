<?php 

    if ($_GET['estado'] == 1) {
        $cantidad_de_m = 9;
        require_once 'v_maquina.php';
    } else if ($_GET['estado'] == 2) {
        $cantidad_de_m = 4;
        require_once 'v_maquina.php';
    } else if ($_GET['estado'] == 3) {
        $cantidad_de_m = 7;
        require_once 'v_maquina.php';
    } else if ($_GET['estado'] == 4) {
        $cantidad_de_m = 3;
        require_once 'v_maquina.php';
    } else if ($_GET['estado'] == 6) {
        $cantidad_de_m = 3;
        require_once 'v_maquinas_acabado.php';
    }

?>