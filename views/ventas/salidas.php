<?php
if ($_SESSION['ZGVwdG8='] != 'Ventas' && $_SESSION['cm9s'] != 'SuperUsuario') {
    header('Location: ' . $this->url_server . '/usuario/principal');
}
?>
<div class="tarjeta-transparente d-grid g-2" style="padding: 0;">
    <div class="d-grid g-1">
        <h1>Salida de Almacen </h1>
    </div>
    <div class="d-flex justify-right align-content-center">
        <?php if ($_SESSION['cm9s'] == 'Administrativo') { ?>
            <button title="Nueva Salida de Almacen" class="material-icons btn btn-icon-self" data-modal="modal-ingresar">add</button>
        <?php } ?>
        <button title="Recargar" class="material-icons btn btn-icon-self btn-transparent" data-recarga="true">loop</button>
        <button title="Filtrar Información" class="material-icons btn btn-icon-self btn-transparent" data-modal="modal-filtrar">filter_alt</button>
    </div>
</div>
<div class="tabla tarjeta" style="padding: 0;">
    <table class="table table_salida lista_salida">
        <thead>
            <th style="max-width: 80px;"></th>
            <th style="min-width: 80px;">N° de salida </th>
            <th style="min-width: 150px;">Cliente</th>
            <th style="min-width: 100px;">Fecha</th>
            <th style="min-width: 50px;"></th>
        </thead>
        <tbody id="table" class="body body_salida"></tbody>
        <tfoot class="tfoot"></tfoot>
    </table>
</div>
<?php
require_once 'public/modules/ventas/salidas_modal.php';
?>
<script src="../public/js/ventas/functions_salida.js?1.3"></script>
<script src="../public/js/ventas/filtros.js"></script>
<?php if ($_SESSION['cm9s'] == 'Administrativo') { ?>
    <!-- <script src="../public/js/ventas/no_tornillos.js"></script> -->
    <script src="../public/js/ventas/render/render_salidas_admin.js"></script>
<?php } else { ?>
    <script src="../public/js/ventas/render/render_salidas_usuario.js"></script>
<?php } ?>