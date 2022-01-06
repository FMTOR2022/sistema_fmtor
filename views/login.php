<?php require_once 'public/modules/sesion_login.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <link rel="stylesheet" href="../public/css/default.css">
    <link rel="stylesheet" href="../public/css/tema_automatico.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="shortcut icon" type="image/png" href="../fmtor_64.png">
    <link rel="apple-touch-startup-image" href="../fmtor_64.png">
    <link rel="apple-touch-icon" href="../fmtor_64.png">

    <link rel="manifest" href="http://localhost/sistema_fmtor/manifest.json">
</head>
<body>
    <div class="d-grid g2-6-4 grid-gap-0 height-100 login">
        <div class="tarjeta-transparente d-flex align-content-center width-100 empresa ">
            <div class="width-100 d-flex align-content-center flex-wrap">
                <video src="../public/img/planta4.mp4" autoplay muted loop></video>
                <h1>Forjadora Mexicana de Tornillos</h1>
                <h2>S.A. de C.V.</h2>
                <button id="iniciar" class="btn width-100">Iniciar</button>
            </div>
        </div>
        <div class="tarjeta-transparente d-flex form-login">
                <h1>Iniciar Sesión</h1>
                <form id="form-login" class="d-grid g-1  grid-gap-0">
                    <div class="d-flex flex-column">
                        <label for="nombre">Nombre de usuario:</label>
                        <input type="text" name="nombre" id="nombre" placeholder="Ingresa el nombre de usuario">
                        <label for="password">Contraseña: </label>
                        <input type="password" name="password" id="password" placeholder="Ingresa la contraseña del usuario">
                    </div>
                    <div class="options d-grid g-1 grid-gap-0">
                        <!-- <input type="checkbox" name="remember" id="remember">
                        <label for="remember" class="lbl-checkbox">Recordar contraseña</label> -->
                        <button class="btn">Ingresar</button>
                        <a class="btn btn-transparent-0 txt-center" href="">¿Olvidaste tu contraseña?</a>
                    </div>
                </form>
            </div>
    </div>
    <script src="../public/js/fmtor_libreria.js?2.3"></script>
    <script src="http://localhost/sistema_fmtor/script.js"></script> 
    <script src="../public/js/login.js?2.1"></script>
</body>
</html>
