<div class="titulo_categoria_menu">
    <p>Compras</p>
</div>
<nav class="opciones">
    <a class="<?php if ($this->item_menu[1] == 'proveedores') { echo 'active'; } else { echo ''; }; ?>" title="Lista de Proveedores" href="<?php echo $this->url_server; ?>/usuario/proveedores">
        <i class="material-icons icon">local_shipping</i>
        Lista de Proveedores
    </a>
    <a class="<?php if ($this->item_menu[1] == 'compra') { echo 'active'; } else { echo ''; }; ?>" title="Ordenes de Compra" href="<?php echo $this->url_server; ?>/usuario/compra">
        <i class="material-icons icon">local_mall</i>
        Ordenes de Compra
    </a>
</nav>