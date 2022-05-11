<?php
if ($_SESSION['ZGVwdG8='] != 'Produccion' && $_SESSION['cm9s'] != 'SuperUsuario') {
    header('Location: ' . $this->url_server . '/usuario/principal');
}
?>
<div class="d-grid g2-5-5">
    <div style="padding-top: 0px;" class="tarjeta-transparente">
        <h1>Control de Producción</h1>
    </div>
    <div style="padding-top: 0px;" class="tarjeta-transparente d-flex justify-right align-content-center flex-wrap">
        <button title="Generar Control de Producción" class="btn-impresion btn btn-icon btn-transparent" data-impresion="control">
            <i class="material-icons" data-impresion="control">calendar_view_month</i>
            Control de Producción
        </button>
        <button title="Generar Control de Producción" class="btn-impresion btn btn-icon btn-transparent" data-impresion="control_vacio">
            <i class="material-icons" data-impresion="control_vacio">calendar_view_month</i>
            Control (Vacio)
        </button>
    </div>
</div>
<div class="tarjeta-transparente">
    <div class="d-flex align-content-center">
        <input type="number" name="op_control" id="op_control" data-control="" placeholder="Orden de Producción">
        <button title="Buscar información" id="informacion_op" class="btn btn-icon-self material-icons">search</button>
        <?php if ($_SESSION['cm9s'] == 'Administrativo') { ?>
            <button data-modal="modal-ingresar" title="Nuevo registro diario" class="material-icons btn btn-icon-self" id="btn-form-control">add</button>
        <?php } ?>
    </div>
</div>
<div class="d-grid g2-2-8">
    <div class="position-relative">
        <div class="acordeon tarjeta-transparente position-sticky" >
            <div class="acordeon_opcion">
                <div class="titulo_acordeon">
                    <h3 data-acordeon="informacion">Información de la O.P.</h3>
                </div>
                <div id="informacion" style="padding: 5px;" class="contenido_acordeon info mostrar_contenido">
                    <label>Código Del Dibujo:</label>
                    <label>Cliente:</label>
                    <label>Fecha:</label>
                    <label>Cantidad:</label>
                    <label>Descripción:</label>
                    <label>Tratamiento:</label>
                    <label>Material:</label>
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
        <div class="estado_tabla tarjeta d-grid g2-4-6">
            <div class="titulo d-flex align-content-center">
                <h2 class="titulo_estado">No seleccionado</h2>
            </div>
            <div class="d-grid g-3 grid-gap-0">
                <div  class="d-flex align-content-center">
                    <input type="text" name="factor_control" id="factor_control" placeholder="Factor: 0.0">
                    <?php if ($_SESSION['cm9s'] == 'Administrativo') { ?>
                        <button title="Actualizar el factor" id="nuevo_factor" class="btn btn-icon-self material-icons">update</button>
                    <?php } ?>
                </div>
                <div class="d-flex justify-right align-content-center">
                    <p style="padding: 0px;" class="total_acumuladas">Pzas. Acumuladas: <br> 0000</p>
                </div>
                <div class="d-flex justify-right align-content-center">
                    <p style="padding: 0px;" class="total_kg">Total Kg: <br> 000.00</p>
                </div>
            </div>
        </div>
        <div class="tarjeta ov_hidden" style="padding: 0;">
            <div class="tabla d-flex nowrap">
                <!-- Cambiar todo a una sola tabla -->
                <table class="table table-control">
                    <thead>
                        <?php
                        if ($_SESSION['cm9s'] == 'Administrativo') {
                        ?>
                            <th width="80px"></th>
                        <?php
                        }
                        ?>
                        <th width="100px">Botes</th>
                        <th width="100px" style="min-width: 100px;">Fecha</th>
                        <th width="150px" style="min-width: 150px;">Observaciones</th>
                        <th>Pzas. Producidas</th>
                        <th>Kg.</th>
                        <th width="100px">Máquina</th>
                    </thead>
                    <tbody class="body"></tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php
if ($_SESSION['cm9s'] == 'Administrativo') {
    require_once 'public/modules/produccion/control_modal.php';
    require_once 'public/modules/produccion/diario_modal.php';
}
?>
<script src="../public/js/produccion/control.js"></script>
<?php if ($_SESSION['cm9s'] == 'Administrativo') { ?>
    <script src="../public/js/produccion/render_control_admin.js"></script>
<?php } else { ?>
    <script src="../public/js/produccion/render_control_usuario.js"></script>
<?php } ?>
<script src="../public/js/produccion/estados.js"></script>