<?php
if ($_SESSION['ZGVwdG8='] != 'Ventas' && $_SESSION['cm9s'] != 'SuperUsuario') {
    header('Location: ' . $this->url_server . '/usuario/principal');
}
?>
<div class="tarjeta-transparente d-grid g-2" style="padding: 0;">
    <div class="d-grid g-1">
        <h1>Lista de Clientes</h1>
    </div>
    <!-- boton de buscar e imprimir -->
    <div class="d-flex justify-right align-content-center">
        <?php if ($_SESSION['cm9s'] == 'Administrativo') { ?>
            <button class="material-icons btn btn-icon-self" id="btn-form-control" data-modal="modal-ingresar">group_add</button>
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
            <th>Numero de identificacion</th>
            <th>Razon Social</th>
            <th>Nombre del Cliente</th>
            <th>Telefono</th>
            <th>Correo</th>
            <th>Direccion</th>
        </thead>
        <tbody class="body body_clientes"></tbody>
    </table>
</div>
<?php require_once 'public/modules/ventas/clientes_modal.php'; ?>
<script src="../public/js/ventas/functions_clientes.js?1.3"></script>
<?php if ($_SESSION['cm9s'] == 'Administrativo') { ?>
    <script src="../public/js/ventas/render/render_clientes_admin.js"></script>
<?php } else { ?>
    <script src="../public/js/ventas/render/render_clientes_usuario.js"></script>
<?php } ?>