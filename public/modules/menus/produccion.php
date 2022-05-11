<div class="titulo_categoria_menu">
    <p>Producción</p>
</div>
<nav class="opciones">
    <a class="<?php if ($this->item_menu[1] == 'programa') { echo 'active'; } else { echo ''; }; ?>" href="<?php echo $this->url_server; ?>/usuario/programa">
        <i class="material-icons-round">format_list_bulleted</i>
        Programa de Forjado
    </a>
    <a class="<?php if ($this->item_menu[1] == 'explosion') { echo 'active'; } else { echo ''; }; ?>" href="<?php echo $this->url_server; ?>/usuario/explosion">
        <i class="material-icons-round">scale</i>
        Explosión de Alambre
    </a>
    <a class="<?php if ($this->item_menu[1] == 'ordenes') { echo 'active'; } else { echo ''; }; ?>" href="<?php echo $this->url_server; ?>/usuario/ordenes">
        <i class="material-icons-round">engineering</i>
        Ordenes de Producción
    </a>
    <a class="<?php if ($this->item_menu[1] == 'control') { echo 'active'; } else { echo ''; }; ?>" href="<?php echo $this->url_server; ?>/usuario/control">
        <i class="material-icons-round">supervisor_account</i>
        Control de Producción
    </a>
    <a class="<?php if ($this->item_menu[1] == 'diario') { echo 'active'; } else { echo ''; }; ?>" href="<?php echo $this->url_server; ?>/usuario/diario">
        <i class="material-icons-round">today</i>
        Registro Diario de Producción
    </a>
    <a class="<?php if ($this->item_menu[1] == 'maquinas') { echo 'active'; } else { echo ''; }; ?>" href="<?php echo $this->url_server; ?>/usuario/maquinas">
        <i class="material-icons-round">precision_manufacturing</i>
        Máquinas de Producción
    </a>
    <a class="<?php if ($this->item_menu[1] == 'estado') { echo 'active'; } else { echo ''; }; ?>" href="<?php echo $this->url_server; ?>/usuario/estados">
        <i class="material-icons-round">new_releases</i>
        Estado de las Ordenes de Producción
    </a>
</nav>