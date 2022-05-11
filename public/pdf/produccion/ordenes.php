<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>.</title>
    <link rel="stylesheet" href="<?php echo $this->url_server; ?>/public/css/formato.css?1.3">
</head>

<body>
    <table class="formato">
        <thead>
            <tr>
                <th class="th"></th>
            </tr>
            <tr>
                <th class="th-estado">CAL.</th>
                <th class="th-estado">Kg.</th>
                <th class="th-estado">Factor</th>
                <th class="th-estado">N° O.P.</th>
                <th class="th-estado" style="min-width: 80px;">Fecha de O.P.</th>
                <th class="th-estado">Cliente</th>
                <th class="th-estado">Medida</th>
                <th class="th-estado">Descripción</th>
                <th class="th-estado">Tratamiento</th>
                <th class="th-estado">Material</th>
                <th class="th-estado">Acabado</th>
                <th class="th-estado">Cant</th>
                <th class="th-estado">Precio</th>
                <th class="th-estado">Total</th>
                <th class="th-estado">Acumulado</th>
                <th class="th-estado">Estado</th>
            </tr>
        </thead>
        <tbody>
            <?php require_once 'modules_pdf/tabla_ordenes.php'; ?>

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
                    <p>ORDENES DE PRODUCCIÓN</p>
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