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
                <th style="background: #FFFF00;">Dibujo: <?php echo $data['control'][0]['plano']; ?></th>
                <th>Cantidad: <?php echo $data['control'][0]['cantidad_elaborar']; ?></th>
                <th class="OP" style="background: #D9D9D9;">Orden de Producción: <?php echo $data['control'][0]['Orden_Produccion']; ?></th>
            </tr>
            <tr>
                <th>Fecha: <?php echo explode(' ', $data['control'][0]['Fecha'])[0]; ?></th>
                <th>Cliente: <?php echo $data['control'][0]['Cliente'] . ' ' . $data['control'][0]['razon_social']; ?></th>
                <th>Descripción: <?php echo $data['control'][0]['descripcion']; ?></th>
            </tr>
            <tr>
                <th style="background: #C4D79B;" colspan="3">Tratamiento: <?php echo $data['control'][0]['tratamiento']; ?></th>
                <!-- <th>Material: <?php //echo $data['control'][0]['material']; ?></th> -->
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="td-sn-pd"><?php require_once 'modules_pdf/v_forjado.php'; ?></td>
                <td class="td-sn-pd"><?php require_once 'modules_pdf/v_ranurado.php';  ?></td>
                <td class="td-sn-pd"><?php require_once 'modules_pdf/v_rolado.php';  ?></td>
            </tr>
            <tr>
                <td class="td-sn-pd"><?php require_once 'modules_pdf/v_shank.php'; ?></td>
                <td class="td-sn-pd"><?php require_once 'modules_pdf/v_cementado.php'; ?></td>
                <td class="td-sn-pd"><?php require_once 'modules_pdf/v_acabado.php';  ?></td>
            </tr>
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
                    <p>CONTROL DE PRODUCCIÓN</p>
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
                <p>VERSIÓN: 1</p>
            </div>
            <div class="d-flex align-content-bottom">
                <p>FECHA DE APROBACIÓN: </p>
            </div>
        </div>
    </div>
</body>

</html>