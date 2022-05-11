<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="style=devmin-width:ice;max-width:30%-style, inmin-width:iti;max-width:30%al-scale=1.0">
    <title>.</title>
    <link rel="stylesheet" href="<?php echo $this->url_server; ?>/public/css/formato.css?1.3">
</head>

<body>

    <table class="formato">
        <thead>
            <tr>
                <th class="th"></th>
            </tr>
            <!-- <tr>
                <th colspan="11" style="background-color: rgb(144, 202, 249);">
                    <h2>SALIDA DE ALMACÉN DE PRODUCTO TERMINADO</h2>
                </th>
            </tr> -->
            <tr>
                <th colspan="3" style="border: none; padding: 10px 0px;">No. Salida: <?php echo  $data['salida'][0]['id_folio']; ?></th>
                <th colspan="4" style="border: none; padding: 10px 0px;">Fecha: <?php echo  $data['salida'][0]['fecha']; ?></th>
                <th colspan="4" style="border: none; padding: 10px 0px;">Cliente: <?php echo $data['salida'][0]['Id_Clientes'] . ' ' . $data['salida'][0]['razon_social']; ?></th>
            </tr>
            <tr style="background-color: rgb(144, 202, 249);">
                <th>CANTIDAD</th>
                <th>PARTE</th>
                <th>PEDIDO</th>
                <th>MEDIDA</th>
                <th>DESCRIPCIÓN</th>
                <th>ACABADO</th>
                <th>COSTO</th>
                <th>FACTURA</th>
                <th>EMPAQUE</th>
                <th>NO. PLANO</th>
            </tr>
        </thead>
        <tbody>
            <?php require_once 'salida/tablasalida.php' ?>
            <tr>
                <td class="txt-center" colspan="3" style="border:none"><br><br></td>
                <td class="txt-center" colspan="4" style="border:none"><br><br></td>
                <td class="txt-center" colspan="4" style="border:none"><br><br></td>
            </tr>
            <tr>
                <td class="txt-center" colspan="3" style="border:none"><br><br>
                    <hr><br>AUTORIZADO POR
                </td>
                <td class="txt-center" colspan="4" style="border:none"><br><br>
                    <hr><br>DESPACHADO POR
                </td>
                <td class="txt-center" colspan="4" style="border:none"><br><br>
                    <hr><br>RECIBIDO POR
                </td>
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
                    <p>SALIDA DE ALMACÉN DE PRODUCTO TERMINADO</p>
                </div>
            </div>
        </div>
    </div>
    <div class="footer">
        <div class="d-grid g-3">
            <div class="d-flex align-content-bottom">
                <p>CLAVE: FOR-VEN-</p>
            </div>
            <div class="d-flex align-content-bottom">
                <p>VERSIÓN: 2</p>
            </div>
            <div class="d-flex align-content-bottom">
                <p>FECHA DE VALIDACIÓN: </p>
            </div>
        </div>
    </div>
</body>

</html>