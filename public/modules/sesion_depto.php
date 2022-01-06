<?php

    if (!isset($_SESSION['empleado'])) {
        header('Location: http://localhost/sistema_fmtor/main/login');
    }

?>