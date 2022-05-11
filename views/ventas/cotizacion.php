<?php
if ($_SESSION['ZGVwdG8='] != 'Ventas' && $_SESSION['cm9s'] != 'SuperUsuario') {
    header('Location: ' . $this->url_server . '/usuario/principal');
}
?>
<style>
    .th {
        cursor: pointer;
        background-color: transparent;
    }

    .th:hover {
        background-color: var(--background-button);
    }

    .contenido_modal table tbody .tr {
        background-color: var(--background-body);
    }

    .contenido_modal table tbody .tr:hover {
        background-color: rgba(100, 100, 100, 0.02) !important;
    }
</style>
<div class="tarjeta-transparente d-grid g-2" style="padding: 0;">
    <div class="d-grid g-1">
        <h1>Cotizaciones</h1>
    </div>
    <div class="d-flex justify-right align-content-center">
        <?php if ($_SESSION['cm9s'] == 'Administrativo') { ?>
            <button title="Nueva Salida de Almacen" class="material-icons btn btn-icon-self" data-modal="modal-ingresar">add</button>
            <button title="Actualizar Costos" class="material-icons-outlined btn btn-icon-self btn-transparent" data-modal="modal-costos">attach_money</button>
        <?php } ?>
        <button title="Recargar" class="material-icons btn btn-icon-self btn-transparent" data-recarga="true">loop</button>
        <button title="Filtrar Información" class="material-icons btn btn-icon-self btn-transparent" data-modal="modal-filtrar">filter_alt</button>
    </div>
</div>
<div class="tabla tarjeta" style="padding: 0;">
    <table class="table table_salida lista_salida">
        <thead>
            <th style="max-width: 80px;"></th>
            <th style="max-width: 80px;">N° de cotización </th>
            <th style="min-width: 150px;">Cliente</th>
            <th style="min-width: 100px;">Fecha</th>
        </thead>
        <tbody id="table" class="body body_salida"></tbody>
        <tfoot class="tfoot"></tfoot>
    </table>
</div>
<?php require_once 'public/modules/ventas/cotizacion_modal.php'; ?>
<script src="../public/js/ventas/filtros_cotizacion.js"></script>
<script src="../public/js/ventas/functions_cotizacion.js"></script>
<script src="../public/js/ventas/costos.js"></script>
<script src="../public/js/ventas/render/render_factor.js"></script>
<?php if ($_SESSION['cm9s'] == 'Administrativo') { ?>
    <script src="../public/js/ventas/no_tornillos.js"></script>
    <script src="../public/js/ventas/render/render_cotizacion_admin.js"></script>
<?php } else { ?>
    <script src="../public/js/ventas/render/render_cotizacion_usuario.js"></script>
<?php } ?>