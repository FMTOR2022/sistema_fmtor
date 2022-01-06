<?php require_once 'public/modules/sesion_depto.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once 'public/modules/head.php' ?>
    <title>Registro Diario de Producción</title>
</head>
<body>
    <div class="contenedor">
        <a href="#top" class="btn btn-icon btn-flotante btn-icon-self material-icons" id="btn-subir">expand_less
        </a>
        <?php require_once 'public/modules/menus/produccion.php'; ?>
        <div class="contenido hidde_menu" id="contenido">
            <?php require_once 'public/modules/header.php'; ?>
            <div class="informacion">
                <h1>Registro Diario de Producción</h1>
                <div class="d-grid g2-6-4 tarjeta-transparente">
                    <div>
                        <input type="number" name="op_control" id="op_control" data-control="" placeholder="Orden de Producción">
                    </div>
                    <div class="d-flex align-content-center justify-right" >
                        <button class="btn btn-icon" data-impresion="control">
                            <i class="material-icons" data-impresion="control">description</i>
                            Control de Producción
                        </button>
                        <button class="btn btn-icon" data-modal="modal-filtrar-diario">
                            <i class="material-icons-outlined" data-modal="modal-filtrar-diario">description</i>
                            Reporte Diario
                        </button>
                    </div>
                </div>
                <div class="d-grid g2-2-8">
                    <div class="position-relative">
                        <div class="acordeon tarjeta-transparente position-sticky">
                            <div class="acordeon_opcion">
                                <div class="titulo_acordeon">
                                    <h3 data-acordeon="informacion">Información de la O.P.</h3>
                                </div>
                                <div id="informacion" class="contenido_acordeon info mostrar_contenido">
                                    <label>Código Del Dibujo:</label>
                                    <label>Cliente:</label>
                                    <label>Fecha:</label>
                                    <label>Cantidad:</label>
                                    <label>Descripción:</label>
                                    <label>Factor:</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="info_control ov_x_auto">
                        <div class="tarjeta-transparente estados">
                            <div class="botones ov_x_auto d-flex">
                            </div>
                        </div>
                        <div class="estado_tabla tarjeta d-grid g2-6-4">
                            <div class="titulo d-flex align-content-center">
                                <?php if ($_SESSION['rol'] == 'Administrativo') { ?>
                                    <button class="material-icons btn btn-icon-self" id="btn-form-control" data-modal="modal-ingresar">add</button>
                                <?php } ?>
                                <h2 class="titulo_estado">No seleccionado</h2>
                            </div>
                            <div class="info_total d-flex align-content-center justify-between">
                                <p class="total_acumuladas">Pzas. Acumuladas: <br> 0000</p>
                                <p class="total_kg">Total Kg: <br> 000.00</p>
                            </div>
                        </div>
                        <div class="tarjeta ov_hidden">
                            <div class="tabla d-flex nowrap">
                                <!-- Cambiar todo a una sola tabla -->
                                <table class="table table-control">
                                    <thead>
                                        <th width="100px">Botes</th>
                                        <th>Fecha</th>
                                        <th>Observaciones</th>
                                        <th>Pzas. Producidas</th>
                                        <th>Kg.</th>
                                        <th width="100px">Máquina</th>
                                        <?php if ($_SESSION['rol'] == 'Administrativo') { ?>
                                            <th width="80px"></th>
                                            <th width="80px"></th>
                                        <?php } ?>
                                    </thead>
                                    <tbody class="body"></tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <?php require_once 'public/modules/produccion/control_modal.php'; ?>
                <?php require_once 'public/modules/produccion/diario_modal.php'; ?>
            </div>
        </div>
    </div>
    <script src="../../public/js/fmtor_libreria.js"></script>
    <script src="../../public/js/produccion/control.js"></script>
    <?php if ($_SESSION['rol'] == 'Administrativo') { ?>
        <script src="../../public/js/produccion/render_control_admin.js"></script>
    <?php } else { ?>
        <script src="../../public/js/produccion/render_control_usuario.js"></script>
    <?php } ?>
    <script src="../../public/js/produccion/estados.js"></script>
</body>
</html>