<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Principal</title>
    <link rel="stylesheet" href="../../public/css/default.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
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
                <h1>Datos Personales</h1>
                <div class="d-grid g-2">
                </div>
                    <div class="d-grid tarjeta d-4" id="">
                        <select name="idUsuario" id="idUsuario"></select>
                    </div>
               
                <div class="d-grid tarjeta g-4">
                    <div class="">
                        <h3>nombre</h3>
                        <h4 id="nombre"></h4>
                    </div>
                    <div class="">
                        <h3>Apellido Paterno</h3>
                        <h4 id="apellidoP"></h4>
                    </div>
                    <div  class="">
                        <h3>Apellido Materno</h3>
                        <h4 id="apellidoM"></h4>
                    </div>
                    <div  class="">
                        <h3>Fecha de Nacimiento</h3>
                        <h4 id="fechaNacimiento"></h4>
                    </div>
                    <div class="">
                        <h3>Telefono</h3>
                        <h4 id="telefono"></h4>
                    </div>
                    <div  class="">
                        <h3>Correo Electronico</h3>
                        <h4 id="correo"></h4>
                    </div>
                    <div  class="">
                        <h3>CURP</h3>
                        <h4 id="CURP"></h4>
                    </div>
                    <div  class="">
                        <h3>RFC</h3>
                        <h4 id="RFC"></h4>
                    </div>
                    <div class="">
                        <h3>NSS</h3>
                        <h4 id="NSS"></h4>
                    </div>
                    <div  class="">
                        <h3>Estado</h3>
                        <h4 id="estado"></h4>
                    </div>
                    <div class="">
                        <h3>Fecha de Ingreso</h3>
                        <h4 id="fechaIngreso"></h4>
                    </div>
                    <div class="">
                        <h3>Direccion</h3>
                        <h4 id="direccion"></h4>
                    </div>
                    <div class="">
                        <h3>Puesto</h3>
                        <h4 id="nombrePuesto"></h4>
                    </div>
                    <div class="">
                        <h3>Departamento</h3>
                        <h4 id="nombreDepto"></h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="../../public/js/fmtor_libreria.js"></script>
    <script src="../../public/js/sii/datosPersonales.js?1.8"></script>
</body>
</html>