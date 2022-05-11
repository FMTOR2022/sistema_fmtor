<?php require_once 'public/modules/sesion_depto.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="theme-color" content="#FFFFFF">
    <?php require_once 'public/modules/head.php' ?>
    <title>Menú Principal</title>
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
                        <a class="btn btn-transparent" href="http://localhost/sistema_fmtor/usuario/personal">
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
                <?php
                    if ($_SESSION['ZGVwdG8='] == 'Ventas' || $_SESSION['ZGVwdG8='] == 'ventas'  || $_SESSION['cm9s'] == 'SuperUsuario') {
                        require_once 'public/modules/menus/menu_principal_ventas.php';
                    }
                    if ($_SESSION['ZGVwdG8='] == 'Compras' || $_SESSION['ZGVwdG8='] == 'compras'  || $_SESSION['cm9s'] == 'SuperUsuario') {
                        require_once 'public/modules/menus/menu_principal_compras.php';
                    }
                    
                    if ($_SESSION['ZGVwdG8='] == 'Produccion' || $_SESSION['ZGVwdG8='] == 'Producción'  || $_SESSION['cm9s'] == 'SuperUsuario') {
                        require_once 'public/modules/menus/menu_principal_produccion.php';
                    }
                ?>
            </div>
        </div>
    </div>
    <script src="<?php echo $this->url_server;?>/public/js/fmtor_libreria.js"></script>
    <script src="<?php echo $this->url_server;?>/public/js/worker/script.js"></script>
</body>

</html>