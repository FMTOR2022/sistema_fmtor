<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../public/css/default.css?1.1">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>Registro</title>
</head>
<body>
    <div class="contenedor">
    <a href="#top" class="btn btn-icon btn-flotante" id="btn-subir">
            <i class="material-icons">expand_less</i> 
            Subir
        </a>
        <?php require_once 'public/modules/menus/sii.php'; ?>
        <div class="contenido hidde_menu" id="contenido">
            <?php require_once 'public/modules/header.php'; ?>
            <div class="informacion">
                <h1>Recursos Humanos - Registro de Empleados</h1>
                <div class="d-grid g2-9-1">
                    <input type="search" name="" id="buscadorSII" class="">
                    <div class="opciones d-flex align-content-center justify-right">
                        <button class="btn btn-icon-self btn_filtrar material-icons" id="filtro_nombre"data-modal="modal-1" >filter_alt</button>
                    </div>
                </div>
                
    <form id="form_reg_user">
        <div class="d-grid g-3 tarjeta">
            <div class="d-grid g-1">
                <label for="">Nombre</label>
                <input type="text" name="nombre" id="nombre">
            </div>
        <div class="d-grid g-1">
        <label for="">Apellido Paterno</label>
            <input type="text" name="apellidoP" id="apellidoP">
            </div>
                <div class="d-grid g-1">
        <label for="">Apellido Materno</label>
            <input type="text" name="apellidoM" id="apellidoM">
            </div>
        <div class="d-grid g-1">
        <label for="">Fecha de Nacimiento</label>
            <input type="date" name="fechaNacimiento" id="fechaNacimiento">
            </div>
        <div class="d-grid g-1">
        <label for="">Telefono</label>
            <input type="text" name="telefono" id="telefono">
            </div>
        <div class="d-grid g-1">
        <label for="">Correo Electronico</label>
            <input type="text" name="correo" id="correo">
            </div>
        <div class="d-grid g-1">
        <label for="">Fecha de Ingreso</label>
            <input type="date" name="fechaIngreso" id="fechaIngreso">
            </div>
        <div class="d-grid g-1">
        <label for="">CURP</label>
            <input type="text" name="curp" id="curp">
            </div>
        <div class="d-grid g-1">
        <label for="">RFC</label>
            <input type="text" name="rfc" id="rfc">
            </div>
        <div class="d-grid g-1">
        <label for="">NSS</label>
            <input type="text" name="nss" id="nss">
            </div>
        <div class="d-grid g-1">
        <label for="">Estado</label>
            <input type="text" name="estado" id="estado">
            </div>
        <div class="d-grid g-1">
        <label for="">Usuario</label>
            <input type="text" name="usuario" id="usuario">
            </div>
        <div class="d-grid g-1">
        <label for="">Contraseña</label>
            <input type="password" name="contrasena" id="contrasena">
            </div>
        <div class="opciones align-content-center">
            <select name="nombrePuesto" id="nombrePuesto"></select>
        </div>
        <div class="d-grid g-1">
            <label for="">Foto</label>
            <input type="file" name="foto" id="foto">
        </div>
        <div class="opciones"><select name="nombreRol" id="nombreRol"></select></div>
        <div class="opciones"><select name="nombreDepartamento" id="nombreDepartamento"></select></div>
        <button>ingresar</button>
        </div>
        
    </form>
    <br>
    <form id="only_user_register">
        <div class="tarjeta d-grid g-3">
            <div class="d-grid g-1"><label for="usuario_only">Usuario</label><input type="text" name="usuario" id="usuario"></div>
            <div class="d-grid g-1"><label for="password">Contraseña</label><input type="password" name="password" id="password"></div>
            <div class="opciones"><select name="nombreRol2" id="nombreRol2"></select></div>
            <div class="d-grid g-1"><label for="curp_empleado">CURP</label><input type="text" name="curp_empleado" id="curp_empleado"></div>
        <button>ingresar</button>    
    </div>
       
    </form>
    </div>
    <script src="../../public/js/fmtor_libreria.js?1.2"></script>
    <script src="../../public/js/sii/register.js?1.3"></script>
</body>
</html>