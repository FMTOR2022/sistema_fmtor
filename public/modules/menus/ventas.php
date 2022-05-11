<div class="titulo_categoria_menu">
    <p>Ventas</p>
</div>
<nav class="opciones">
    <a class="<?php if ($this->item_menu[1] == 'clientes') { echo 'active'; } else { echo ''; }; ?>" title="Lista de Clientes" href="<?php echo $this->url_server; ?>/usuario/clientes">
        <i class="material-icons icon">face</i>
        Lista de clientes
    </a>
    <a class="<?php if ($this->item_menu[1] == 'cotizacion') { echo 'active'; } else { echo ''; }; ?>" title="Cotizaciones" href="<?php echo $this->url_server; ?>/usuario/cotizacion">
        <i class="material-icons icon">request_quote</i>
        Cotizaciones
    </a>
    <a class="<?php if ($this->item_menu[1] == 'salidas') { echo 'active'; } else { echo ''; }; ?>" title="Salidas de Almacen" href="<?php echo $this->url_server; ?>/usuario/salidas">
        <i class="material-icons icon">open_in_browser</i>
        Salidas de Almacen
    </a>
    <a class="<?php if ($this->item_menu[1] == 'orden') { echo 'active'; } else { echo ''; }; ?>" title="Ordenes de Producción" href="<?php echo $this->url_server; ?>/usuario/orden">
        <i class="material-icons icon">engineering</i>
        Ordenes de Producción
    </a>
    <a class="<?php if ($this->item_menu[1] == 'reportes') { echo 'active'; } else { echo ''; }; ?>" title="Reportes" href="<?php echo $this->url_server; ?>/usuario/reportes">
        <i class="material-icons icon">summarize</i>
        Reportes
    </a>
</nav>