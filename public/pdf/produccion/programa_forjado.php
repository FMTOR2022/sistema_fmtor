<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>.</title>
    <link rel="stylesheet" href="<?php echo $this->url_server; ?>/public/css/formato.css?1.4">
</head>
<style>
    .herramental {
        background: #F20505;
        color: white;
    }

    .herramental td {
        color: white;
    }

    .mantenimiento {
        background: #F20505;
        color: white;
    }

    .mantenimiento td {
        color: white;
    }

    .linea {
        background: #FFFF00;
        color: black;
    }

    .linea td {
        color: black;
    }

    .maquina {
        background: #AA9BBF;
        color: white;
    }

    .maquina td {
        color: black;
    }
</style>

<body>
    <table class="formato">
        <thead>
            <tr>
                <th class="th"></th>
            </tr>
            <tr>
                <th rowspan="2" class="th-estado" style="padding: 5px 0px; ">CAL.</th>
                <th rowspan="2" class="th-estado" style="padding: 5px 0px; ">KIL.</th>
                <th rowspan="2" class="th-estado" style="padding: 5px 0px; ">FACTOR</th>
                <th rowspan="2" class="th-estado" style="padding: 5px 0px; ">N° O.P.</th>
                <th colspan="2" class="th-estado" style="padding: 5px 0px; min-width: 80px;">Fecha</th>
                <th rowspan="2" class="th-estado" style="padding: 5px 0px; min-width: 60px;">Cliente</th>
                <th rowspan="2" class="th-estado" style="padding: 5px 0px;  min-width: 150px;">Descripción</th>
                <th rowspan="2" class="th-estado" style="padding: 5px 0px; min-width: 80px;">Acabado</th>
                <th rowspan="2" class="th-estado" style="padding: 5px 0px; ">Cant.</th>
                <th rowspan="2" class="th-estado" style="padding: 5px 0px; min-width: 60px;">Precio</th>
                <th rowspan="2" class="th-estado" style="padding: 5px 0px; ">Herramental</th>
                <!-- <th rowspan="2" class="th-estado" style="padding: 10px 0px; min-width: 120px;">Tratamiento</th> -->
                <!-- <th rowspan="2" class="th-estado" style="padding: 10px 0px; "></th> -->
            </tr>
            <tr>
                <th class="th-estado">OP</th>
                <th class="th-estado">ENTREGA</th>
            </tr>
        </thead>
        <tbody>
            <?php require_once 'modules_pdf/tabla_programa_forjado.php';  ?>
        </tbody>
        <tfoot>
            <tr>
                <td class="td"></td>
            </tr>
        </tfoot>
    </table>
    <div class="header">
        <div class="d-grid g-2">
            <div class="logo-formato">
                <img src="<?php echo $this->url_server; ?>/public/img/logo_formato.png" alt="">
            </div>
            <div class="d-flex flex-wrap justify-right">
                <div class="titulo txt-right">
                    <p>FORJADORA MEXICANA DE TORNILLOS</p>
                    <span>S.A. DE C.V.</span>
                </div>
                <div class="nombre txt-right">
                    <p>PROGRAMA DE FORJADO</p>
                </div>
            </div>
        </div>
    </div>
    <div class="footer">
        <div class="d-grid g-3">
            <div class="d-flex align-content-bottom">
                <p>CLAVE: PRO-F-000</p>
            </div>
            <div class="d-flex align-content-bottom">
                <p>VERSIÓN: 2</p>
            </div>
            <div class="d-flex align-content-bottom">
                <p>FECHA DE APROBACIÓN: </p>
            </div>
        </div>
    </div>
</body>

</html>