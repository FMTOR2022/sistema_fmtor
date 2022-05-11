<div class="menu hidde_menu" id="menu">
    <div class="informacion">
        <div class="foto">
            <img src="data:image/jpg;base64,<?php echo base64_encode($_SESSION['Zm90bw==']) ?>" alt="">
        </div>
        <div class="nombre">
            <p>
                <?php echo $_SESSION['bm9tYnJlX3VzdWFyaW8=']; ?>
            </p>
            <p>
                <?php echo $_SESSION['cHVlc3Rv']; ?>
            </p>
        </div>
    </div>
    <div class="categoria_menu">
        <nav class="opciones">
            <a href="http://localhost/sistema_fmtor/usuario/principal">
                <i class="material-icons">apps</i>
                Menú pricipal
            </a>
        </nav>
        <div class="titulo_categoria_menu">
            <p>General</p>
        </div>
        <nav class="opciones">
            <a href="http://localhost/sistema_fmtor/usuario/personal">
                <i class="material-icons-round">person</i>
                Información Personal
            </a>
            <a href="<?php echo  $this->url_server; ?>/produccion/main/ordenes">
                <i class="material-icons-round">person</i>
                Caja de Ahorro
            </a>
            <a href="<?php echo  $this->url_server; ?>/produccion/main/ordenes">
                <i class="material-icons-round">person</i>
                Prestamos
            </a>
        </nav>
        <?php
        if ($_SESSION['ZGVwdG8='] == 'Ventas' || $_SESSION['cm9s'] == 'SuperUsuario') {
            require_once 'ventas.php';
        }
        ?>
        <?php
        if ($_SESSION['ZGVwdG8='] == 'Compras' || $_SESSION['cm9s'] == 'SuperUsuario') {
            require_once 'compras.php';
        }
        ?>
        <?php
        if ($_SESSION['ZGVwdG8='] == 'Produccion' || $_SESSION['cm9s'] == 'SuperUsuario') {
            require_once 'produccion.php';
        }
        ?>
        <div class="titulo_categoria_menu">
            <p>Ayuda</p>
        </div>
        <nav>
            <a href="">
                <i class="material-icons-round">help</i>
                Ayuda
            </a>
            <a href="<?php echo  $this->url_server; ?>/main/cerrar_sesion">
                <i class=" material-icons-round">logout</i>
                Cerrar Sesión
            </a>
        </nav>
    </div>
</div>