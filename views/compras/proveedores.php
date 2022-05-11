<?php
if ($_SESSION['ZGVwdG8='] != 'Compras' && $_SESSION['cm9s'] != 'SuperUsuario') {
    header('Location: ' . $this->url_server . '/usuario/principal');
}
?>
<div class="tarjeta-transparente d-grid g-2" style="padding: 0;">
    <div class="d-grid g-1">
        <h1>Lista de Proveedores</h1>
    </div>
    <!-- boton de buscar e imprimir -->
    <div class="d-flex justify-right align-content-center">
        <?php if ($_SESSION['cm9s'] == 'Administrativo') { ?>
            <button class="material-icons btn btn-icon-self" id="btn-form-control" data-modal="modal-ingresar">local_shipping</button>
        <?php } ?>
    </div>
</div>
<!-- Tabla -->
<div class="tabla tarjeta" style="padding: 0;">
    <table class="table table_clientes lista_clientes" id="listaClientes">
        <thead>
            <?php if ($_SESSION['cm9s'] == 'Administrativo') { ?>
                <th style="max-width: 60px;"></th>
            <?php } ?>
            <th style="min-width: 200px;">Proveedor</th>
            <th style="min-width: 400px;">Direccion</th>
            <th>Ciudad</th>
            <th style="min-width: 150px;">Telefono</th>
            <th>Correo</th>
        </thead>
        <tbody id="body_proveedores" class="body body_clientes"></tbody>
    </table>
</div>
<?php
if ($_SESSION['cm9s'] == 'Administrativo') {
    require_once 'public/modules/ventas/proveedores_modal.php';
}
?>
<script src="../public/js/ventas/functions_proveedor.js"></script>
<?php if ($_SESSION['cm9s'] == 'Administrativo') { ?>
    <script src="../public/js/ventas/render/render_proveedores_admin.js"></script>
<?php } else { ?>
    <script src="../public/js/ventas/render/render_proveedores_usuario.js"></script>
<?php } ?>