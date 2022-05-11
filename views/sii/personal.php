<?php require_once 'public/modules/sesion_depto.php'; ?>
<!DOCTYPE html>
<html lang="es">
<head> 
    <?php require_once 'public/modules/head.php' ?>
    <title>Información personal</title>
</head>
<body>
    <div class="contenedor">
        <a href="#top" class="btn btn-icon-self btn-flotante material-icons" id="btn-subir">expand_less
        </a>
        <?php require_once 'public/modules/menus/menu_usuario.php'; ?>
        <div class="contenido hidde_menu" id="contenido">
            <?php require_once 'public/modules/header.php'; ?>
            <div class="informacion">
                <div style="padding: 0;" class="tarjeta-transparente d-grid g-2">
                    <div class="d-grid g-1">
                        <h1>Información General</h1>
                    </div>
                    <div class="d-flex justify-right">
                        <button class="btn btn-print" id="generar_renuncia">Generar Renuncia</button>
                    </div>
                </div>
                <div class="tarjeta">
                    <div class="d-grid g-5">
                        <div class="d-grid g-1 grid-gap-0">
                            <p style="padding: 0;">Nombre:</p>
                            <p style="padding: 0;" id="nombre"></p>
                        </div>
                        <div class="d-grid g-1 grid-gap-0">
                            <p style="padding: 0;">Apellido Paterno:</p>
                            <p style="padding: 0;" id="apellido_p"></p>
                        </div>
                        <div class="d-grid g-1 grid-gap-0">
                            <p style="padding: 0;">Apellido Materno:</p>
                            <p style="padding: 0;" id="apellido_m"></p>
                        </div>
                        <div class="d-grid g-1 grid-gap-0">
                            <p style="padding: 0;">Fecha de Nacimiento:</p>
                            <p style="padding: 0;" id="fecha_nacimiento"></p>
                        </div>
                        <div class="d-grid g-1 grid-gap-0">
                            <p style="padding: 0;">Fecha de Ingreso:</p>
                            <p style="padding: 0;" id="fecha_ingreso"></p>
                        </div>
                        <div class="d-grid g-1 grid-gap-0">
                            <p style="padding: 0;">CURP:</p>
                            <p style="padding: 0;" id="curp"></p>
                        </div>
                        <div class="d-grid g-1 grid-gap-0">
                            <p style="padding: 0;">RFC:</p>
                            <p style="padding: 0;" id="rfc"></p>
                        </div>
                        <div class="d-grid g-1 grid-gap-0">
                            <p style="padding: 0;">NSS:</p>
                            <p style="padding: 0;" id="nss"></p>
                        </div>
                        <div class="d-grid g-1 grid-gap-0">
                            <p style="padding: 0;">Puesto:</p>
                            <p style="padding: 0;" id="puesto"></p>
                        </div>
                        <div class="d-grid g-1 grid-gap-0">
                            <p style="padding: 0;">Estado:</p>
                            <p style="padding: 0;" id="estado"></p>
                        </div>
                    </div>
                </div>
                <div class="tarjeta-transparente">
                    <h1>Información de Contacto</h1>
                </div>
                <div class="tarjeta">
                    <div class="d-grid g-2">
                        <div class="d-grid g-1 grid-gap-0">
                            <p style="padding: 0;">Dirección:</p>
                            <p style="padding: 0;" id="dir"></p>
                        </div>
                        <div class="d-grid g-1 grid-gap-0">
                            <p style="padding: 0;">Correo:</p>
                            <p style="padding: 0;" id="correo"></p>
                        </div>
                        <div class="d-grid g-1 grid-gap-0">
                            <p style="padding: 0;">Teléfono:</p>
                            <p style="padding: 0;" id="telefono"></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="../public/js/fmtor_libreria.js"></script>
    <script>
        const buscar_info = () => {
            const respuesta = fetchAPI('',url+'/sii/personal/info_personal_usuario','')
            respuesta.then(json => {
                const nombre = document.getElementById('nombre')
                nombre.innerText = json[0].nombre
                const apellido_p = document.getElementById('apellido_p')
                apellido_p.innerText = json[0].apellidoP
                const apellido_m = document.getElementById('apellido_m')
                apellido_m.innerText = json[0].apellidoM
                const fecha_nacimiento = document.getElementById('fecha_nacimiento')
                fecha_nacimiento.innerText = json[0].fechaNacimiento
                const fecha_ingreso = document.getElementById('fecha_ingreso')
                fecha_ingreso.innerText = json[0].fechaIngreso
                const curp = document.getElementById('curp')
                curp.innerText = json[0].curp
                const rfc = document.getElementById('rfc')
                rfc.innerText = json[0].rfc
                const nss = document.getElementById('nss')
                nss.innerText = json[0].nss
                const puesto = document.getElementById('puesto')
                puesto.innerText = json[0].nombrePuesto
                const estado = document.getElementById('estado')
                estado.innerText = json[0].estado
                const dir = document.getElementById('dir')
                dir.innerText = json[0].direccion
                const correo = document.getElementById('correo')
                correo.innerText = json[0].correo
                const telefono = document.getElementById('telefono')
                telefono.innerText = json[0].telefono
            })
        }

        const btn_renuncia = document.getElementById('generar_renuncia');

        btn_renuncia.addEventListener('click', () => {
            printPage(url+'/sii/personal/generar_pdf_renuncia');
        });

        document.addEventListener('DOMContentLoaded', () => {
            buscar_info();
        });
    </script>
</body>
</html>