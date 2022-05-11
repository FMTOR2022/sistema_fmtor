<?php
if ($_SESSION['ZGVwdG8='] != 'Produccion' && $_SESSION['cm9s'] != 'SuperUsuario') {
    header('Location: ' . $this->url_server . '/usuario/principal');
}
?>
<div class="d-grid g2-5-5">
    <div style="padding-top: 0px;" class="tarjeta-transparente">
        <h1>Registro Diario de Producción</h1>
    </div>
    <div style="padding-top: 0px;" class="tarjeta-transparente d-flex justify-right align-content-center flex-wrap">
        <?php if ($_SESSION['cm9s'] == 'Administrativo') { ?>
            <button data-modal="modal-ingresar-diario" title="Nuevo registro diario" class="material-icons btn btn-icon-self" id="btn-form-control">add</button>
        <?php } ?>
    </div>
</div>
<div class="tarjeta-transparente">
    <div class="d-grid g-2">
        <div class="d-grid g-1 grid-gap-0">
            <label for="fecha_reporte">Selecciona una fecha:</label>
            <input type="date" name="fecha_reporte" id="fecha_reporte">
        </div>
        <div class="d-grid g-1 grid-gap-0">
            <label for="select_estado">Estados de producción</label>
            <select name="select_estado" id="select_estado">
                <option value="">Selecciona un estado de producción:</option>
            </select>
        </div>
    </div>
</div>
<div class="tarjeta" style="padding: 0px;">
    <table>
        <thead>
            <tr>
                <?php
                if ($_SESSION['cm9s'] == 'Administrativo') {
                ?>
                    <th width="60px"></th>
                <?php
                }
                ?>
                <th>Turno</th>
                <th>Id_Folio</th>
                <th>Cliente</th>
                <th>Kilos</th>
                <th>Pzas</th>
                <th>Maquina</th>
                <th style="min-width: 120px;">Descripción</th>
                <th style="min-width: 120px;">Observaciones</th>
            </tr>
        </thead>
        <tbody id="body">
            <tr>
                <td colspan="10" class="txt-center">Seleccione la fecha y un estado de producción</td>
            </tr>
        </tbody>
    </table>
</div>
<?php
if ($_SESSION['cm9s'] == 'Administrativo') {
    require_once 'public/modules/produccion/diario_modal.php';
}
?>
<?php if ($_SESSION['cm9s'] == 'Administrativo') { ?>
    <script src="../public/js/produccion/render_diario_admin.js"></script>
<?php } else { ?>
    <script src="../public/js/produccion/render_diario_usuario.js"></script>
<?php } ?>
<script src="../public/js/produccion/diario.js?1.1"></script>