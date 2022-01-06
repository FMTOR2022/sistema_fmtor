<div class="menu hidde_menu" id="menu">
    <div class="informacion">
        <div class="foto">
            <img src="data:image/jpg;base64,<?php echo base64_encode($_SESSION['foto'])?>" alt="">
        </div>
        <div class="nombre">
            <p>
                <?php echo $_SESSION['nombre_usuario']; ?>
            </p>
            <p>
                <?php echo $_SESSION['puesto']; ?>
            </p>
        </div>
    </div>
    <div class="categoria_menu">
        <nav class="opciones">
            <a href="http://localhost/sistema_fmtor/produccion/main/mostrar">
                <i class="material-icons">apps</i>
                Menú pricipal
            </a>
        </nav>
        <div class="titulo_categoria_menu">
            <p>General</p>
        </div>
        <nav class="opciones">
            <a href="http://localhost/sistema_fmtor/produccion/main/ordenes">
                <i class="material-icons-round">person</i>
                Información Personal
            </a>
            <a href="http://localhost/sistema_fmtor/produccion/main/ordenes">
                <i class="material-icons-round">person</i>
                Caja de Ahorro
            </a>
            <a href="http://localhost/sistema_fmtor/produccion/main/ordenes">
                <i class="material-icons-round">person</i>
                Prestamos
            </a>
        </nav>
        <div class="titulo_categoria_menu">
            <p>Producción</p>
        </div>
        <nav class="opciones">
            <a href="http://localhost/sistema_fmtor/produccion/main/ordenes">
                <i class="material-icons-round">engineering</i>
                Ordenes de Producción
            </a>
            <a href="http://localhost/sistema_fmtor/produccion/main/control">
                <i class="material-icons-round">supervisor_account</i>
                Registro Diario de Producción
            </a>
            <a href="http://localhost/sistema_fmtor/produccion/main/maquinas">
                <i class="material-icons-round">precision_manufacturing</i>
                Máquinas de Producción
            </a>
            <a href="http://localhost/sistema_fmtor/produccion/main/estados">
                <i class="material-icons-round">new_releases</i>
                Estado de las Ordenes de Producción
            </a>
        </nav>
        <div class="titulo_categoria_menu">
            <p>Ayuda</p>
        </div>
        <nav>
            <a href="">
                <i class="material-icons-round">help</i>
                Ayuda
            </a>
            <a  id="cerrar-sesion">
                <i class="material-icons-round">logout</i>
                Cerrar Sesión
            </a>
        </nav>
    </div>
</div>