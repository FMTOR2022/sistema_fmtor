<?php
if ($_SESSION['ZGVwdG8='] != 'Compras' && $_SESSION['cm9s'] != 'SuperUsuario') {
    header('Location: ' . $this->url_server . '/usuario/principal');
}
?>
<div class="tarjeta-transparente d-grid g-2" style="padding: 0;">
    <div class="d-grid g-1">
        <h1>Ordenes de Compra</h1>
    </div>
    <div class="d-flex justify-right align-content-center">
        <?php if ($_SESSION['cm9s'] == 'Administrativo') { ?>
            <button title="Nueva Orden de Compra" class="material-icons btn btn-icon-self" data-modal="modal-ingresar">add</button>
            <button title="Actualizar Costos" class="material-icons-outlined btn btn-icon-self btn-transparent" data-modal="modal-costos">attach_money</button>
        <?php } ?>
        <button title="Recargar" class="material-icons btn btn-icon-self btn-transparent" data-recarga="true">loop</button>
        <button title="Filtrar Información" class="material-icons btn btn-icon-self btn-transparent" data-modal="modal-filtrar">filter_alt</button>
    </div>
</div>
<div class="tabla tarjeta" style="padding: 0;">
    <table class="table table_salida lista_salida">
        <thead>
            <th style="max-width: 60px;"></th>
            <th style="min-width: 80px;"># O.C. </th>
            <th style="min-width: 100px;">Fecha</th>
            <th style="min-width: 350px;">Empresa</th>
            <th style="min-width: 200px;">Solicitado por:</th>
            <th style="min-width: 200px;">Proveedor:</th>
        </thead>
        <tbody id="body" class="body body_salida"></tbody>
        <tfoot class="tfoot"></tfoot>
    </table>
</div>
<?php
require_once 'public/modules/ventas/compras_modal.php';
?>
<script src="../public/js/ventas/functions_compra.js"></script>
<script src="../public/js/ventas/filtro_compra.js"></script>
<?php if ($_SESSION['cm9s'] == 'Administrativo') { ?>
    <script src="../public/js/ventas/compra_pedidos.js"></script>
    <script src="../public/js/ventas/render/render_compra_admin.js"></script>
    <script src="../public/js/ventas/render/forms_compras.js"></script>
<?php } else { ?>
    <script src="../public/js/ventas/render/render_compra_usuario.js"></script>
<?php } ?>