<?php
    include("../config/conexion.php");
    $t_horario = "SELECT * FROM t_horario"; 
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title></title>
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <link rel="icon" type="image/x-icon" href="../../public/img/checador/LOGO2.png" />
    </head>

    <body>
    <div class="contenedor">
    <a href="#top" class="btn btn-icon-self btn-flotante material-icons" id="btn-subir">expand_less
        </a>
        <?php require_once 'public/modules/menus/checador.php'; ?>
        <div class="contenido hidde_menu" id="contenido">
            <?php require_once 'public/modules/header.php'; ?>
            <div class="informacion">
                <h1>Generar Excel</h1>
                <div class="tarjeta-transparente d-flex justify-right">
                    

            </div>
        </div>
    </div>
   
</body>
</html>