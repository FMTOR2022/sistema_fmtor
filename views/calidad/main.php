<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once 'public/modules/head.php' ?>
    <title>Calidad</title>
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
                <h2>Calidad</h2>
                <main>
                    <nav class="d-grid g-2">
                        <a href="http://localhost:8080/sistema_fmtor/calidad/main/catalogo"
                            class="tarjeta d-flex align-content-center">
                            <i class="material-icons icon">description</i>
                            CATALOGO
                        </a>
                        <a href="http://localhost:8080/sistema_fmtor/calidad/main/certificados"
                        class="tarjeta d-flex align-content-center">
                            <i class="material-icons icon">verified</i>
                            CERTIFICADOS
                        </a>
                        <a href="http://localhost:8080/sistema_fmtor/calidad/main/rechazos"
                        class="tarjeta d-flex align-content-center">
                            <i class="material-icons icon">report_problem</i>
                            RECHAZOS
                        </a>
                        <a href="http://localhost:8080/sistema_fmtor/calidad/main/iso"
                        class="tarjeta d-flex align-content-center">
                            <i class="material-icons icon">event</i>
                            FORMULARIO MENSUAL ISO
                        </a>
                    </nav>
                </main>
            </div>
        </div>
    </div>
    <script src="../../public/js/fmtor_libreria.js"></script>
</body>
</html>