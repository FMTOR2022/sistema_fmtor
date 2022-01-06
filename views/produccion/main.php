<?php require_once 'public/modules/sesion_depto.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once 'public/modules/head.php' ?>
    <title>Producción</title>
</head>
<body>
    <div class="contenedor principal">
        <a href="#top" class="btn btn-icon btn-flotante" id="btn-subir">
            <i class="material-icons">expand_less</i> 
            Subir
        </a>
        <div class="contenido hidde_menu" id="contenido">
            <?php require_once 'public/modules/depto.php'; ?>
            <div class="informacion">
                <div class="tarjeta-transparente menu-principal">
                    <h2>General</h2>
                    <div class="d-grid g-3">
                        <a class="btn btn-transparent" href="http://localhost/sistema_fmtor/sii/main/">
                            <div class="d-grid g-1">
                                <i class="material-icons-outlined icon">people</i>
                                <span class="material-icons-outlined">people</span>
                                <p>INFORMACIÓN PERSONAL</p>
                            </div>
                        </a>
                        <a class="btn btn-transparent" href="http://localhost/sistema_fmtor/sii/main/">
                            <div class="d-grid g-1">
                                <i class="material-icons-outlined icon">people</i>
                                <span class="material-icons-outlined icon">people</span>
                                <p>CAJA DE AHORRO</p>
                            </div>
                        </a>
                        <a class="btn btn-transparent" href="http://localhost/sistema_fmtor/sii/main/">
                            <div class="d-grid g-1">
                                <i class="material-icons-outlined icon">people</i>
                                <span class="material-icons-outlined icon">people</span>
                                <p>PRESTAMOS</p>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="tarjeta-transparente menu-principal">
                    <h2>Producción</h2>
                    <div class="d-grid g-3">
                        <a class="btn btn-transparent" href="http://localhost/sistema_fmtor/produccion/main/ordenes">
                            <div class="d-grid g-1">
                                <i class="material-icons-outlined icon">engineering</i>
                                <span class="material-icons-outlined icon">engineering</span>
                                <p>ORDENES DE PRODUCCIÓN</p>
                            </div>
                        </a>
                        <a class="btn btn-transparent" href="http://localhost/sistema_fmtor/produccion/main/control">
                            <div class="d-grid g-1">
                                <i class="material-icons-outlined icon">supervisor_account</i>
                                <span class="material-icons-outlined icon">supervisor_account</span>
                                <p>REGISTRO DIARIO DE PRODUCCIÓN</p>
                            </div>
                        </a>
                        <a class="btn btn-transparent" href="http://localhost/sistema_fmtor/produccion/main/maquinas">
                            <div class="d-grid g-1">
                                <i class="material-icons-outlined icon">precision_manufacturing</i>
                                <span class="material-icons-outlined icon">precision_manufacturing</span>
                                <p>MÁQUINAS DE PRODUCCIÓN</p>
                            </div>
                        </a>
                        <a class="btn btn-transparent" href="http://localhost/sistema_fmtor/produccion/main/estados">
                            <div class="d-grid g-1">
                                <i class="material-icons-outlined icon">new_releases</i>
                                <span class="material-icons-outlined icon">new_releases</span>
                                <p>ESTADO DE LAS ORDENES DE PRODUCCIÓN</p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="../../public/js/fmtor_libreria.js"></script>
</body>
</html>