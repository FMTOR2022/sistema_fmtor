<?php require_once 'public/modules/sesion_depto.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once 'public/modules/head.php' ?>
    <title>Estado de las O.P.</title>
</head>
<body>
    <div class="contenedor">
        <a href="#top" class="btn btn-icon-self btn-flotante material-icons" id="btn-subir">
            expand_less
        </a>
        <?php require_once 'public/modules/menus/produccion.php'; ?>
        <div class="contenido hidde_menu" id="contenido">
            <?php require_once 'public/modules/header.php'; ?>
            <div class="informacion">
                <h1>Estado de las Ordenes de Producción</h1>
                <div class="tarjeta-transparente d-flex justify-right">
                    <button class="btn btn-icon" data-impresion="documento">
                        <i class="material-icons">description</i>
                        Generar Documento 
                    </button>
                </div>
                <div class="tarjeta-transparente d-grid g-2" id="estados">
                </div>
            </div>
        </div>
    </div>
    <script src="../../public/js/fmtor_libreria.js"></script>
    <script src="../../public/js/produccion/estado_op.js"></script>
</body>
</html>