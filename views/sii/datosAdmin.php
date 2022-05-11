<!DOCTYPE html>
<html lang="en">
<head>
<?php require_once 'public/modules/head.php' ?>
<title>Datos RH</title>
</head>
<body>
    <div class="contenedor">
        <a href="#top" class="btn btn-icon btn-flotante" id="btn-subir">
            <i class="material-icons">expand_less</i> 
            Subir
        </a>
        <?php require_once 'public/modules/menus/sii.php'; ?>
        <div class="contenido hidde_menu" id="contenido">
            <?php require_once 'public/modules/header.php'; ?>
            <div class="informacion">
                <h1>Recursos Humanos - Datos Personales</h1>
                <div class="d-grid g2-9-1">
                    <input type="search" name="" id="buscadorSII" class="">
                    <div class="opciones d-flex align-content-center justify-right">
                        <button class="btn btn-icon-self btn_filtrar material-icons" id="filtro_nombre"data-modal="modal-1" >filter_alt</button>
                    </div>
                </div>
                
                <div class="tarjeta">
                <table>
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Apellido Paterno</th>
                            <th>Apellido Materno</th>
                            <th>Fecha de Nacimiento</th>
                            <th>Telefono</th>
                            <th>Correo</th>
                            <th>CURP</th>
                            <th>RFC</th>
                            <th>NSS</th>
                            <th>Estado</th>
                            <th>Fecha de Ingreso</th>
                            <th>Nombre del Puesto</th>
                        </tr>
                    </thead>
                    <tbody class="t_body">
                        <!-- <tr>
                            <td><h5 id="nombre"></h5></td>
                            <td><h5 id="apellidoP"></h5></td>
                            <td><h5 id="apellidoM"></h5></td>
                            <td><h5 id="fechaNacimiento"></h5></td>
                            <td><h5 id="telefono"></h5></td>
                            <td><h5 id="correo"></h5></td>
                            <td><h5 id="CURP"></h5></td>
                            <td><h5 id="RFC"></h5></td>
                            <td><h5 id="NSS"></h5></td>
                            <td><h5 id="estado"></h5></td>
                            <td><h5 id="fechaIngreso"></h5></td>
                        </tr> -->
                    </tbody>
                </table>
                <div id="modal-1" class="modal modal-derecha">
                <div class="titulo_modal d-flex justify-between align-content-center">
                    <h2>Filtros</h2>
                    <button class="btn btn-icon-self btn-transparent material-icons" id="close_modal" data-modal="modal-1">close</button>
                </div>
                <div class="contenido_modal">
                    <div class="filtro-puesto"></div>
                    <div class="filtros"></div>
                </div>
            </div>
                </div>
            </div>
        </div>
    </div>
    <script src="../../public/js/fmtor_libreria.js"></script>
    <script src="../../public/js/sii/datosPersonales.js?1.9"></script>
</body>
</html>