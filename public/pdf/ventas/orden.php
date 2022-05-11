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
        </thead>

        <body>
        </body>
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
                    <p>ORDEN DE PRODUCCION</p>
                </div>
            </div>
        </div>
        <div class="d-grid g-1">
            <table style="font-size: 0.7em; border-collapse: collapse;">
                <thead>
                    <tr>
                        <th style="padding: 5px;border: none;" class="txt-left" colspan="3">Cliente: <?php echo $data[0]['Clientes'] . ' ' . explode(' ', $data[0]['razon_social'])[0]; ?></th>
                        <th style="padding: 5px;border: none; color:#A93D38; font-size: 1.3em;" class="txt-right" colspan="2">N° <?php echo $data[0]['Id_Folio']; ?></th>
                    </tr>
                    <tr>
                        <th style="padding: 5px;border: none;" class="txt-left" colspan="2">Pedido no.: <?php echo $data[0]['codigo']; ?></th>
                        <th style="padding: 5px;border: none;" class="txt-left">Precio: $ <?php echo number_format($data[0]['precio_millar'], 2); ?></th>
                        <th style="padding: 5px;border: none;" class="txt-left" colspan="2">Fecha: <?php echo $data[0]['Fecha']; ?></th>
                    </tr>
                    <tr>
                        <th style="padding: 5px;border: none;"></th>
                    </tr>
                    <tr>
                        <th style="padding: 5px;border: none;"></th>
                    </tr>
                    <tr>
                        <th style="padding: 5px;border: none;"></th>
                    </tr>
                    <tr>
                        <th style="padding: 5px;">DESCRIPCIÓN</th>
                        <th style="padding: 5px;">MEDIDA</th>
                        <th style="padding: 5px;">CANTIDAD</th>
                        <th style="padding: 5px;">ACABADO</th>
                        <th style="padding: 5px;">CODIGO</th>
                    </tr>
                </thead>

                <body>
                    <?php require_once 'orden/tablaorden.php'; ?>
                </body>
            </table>
        </div>
    </div>
    <div class="header" style="top: 50%; ">
        <hr style="border-top: 2px dotted black;">
        <div class="d-grid g-2" style="padding-top: 5%; ">
            <div class="logo-formato">
                <img src="https://www.fmtor.com/public/img/logo_formato.png" alt="">
            </div>
            <div class="d-flex flex-wrap justify-right">
                <div class="titulo txt-right">
                    <p>FORJADORA MEXICANA DE TORNILLOS</p>
                    <span>S.A. DE C.V.</span>
                </div>
                <div class="nombre txt-right">
                    <p>ORDEN DE PRODUCCION</p>
                </div>
            </div>
        </div>
        <div class="d-grid g-1">
            <table style="font-size: 0.7em; border-collapse: collapse;">
                <thead>
                    <tr>
                        <th style="padding: 5px;border: none;" class="txt-left" colspan="3">Cliente: <?php echo $data[0]['Clientes'] . ' ' . explode(' ', $data[0]['razon_social'])[0]; ?></th>
                        <th style="padding: 5px;border: none; color:#A93D38; font-size: 1.3em;" class="txt-right" colspan="2">N° <?php echo $data[0]['Id_Folio']; ?></th>
                    </tr>
                    <tr>
                        <th style="padding: 5px;border: none;" class="txt-left" colspan="2">Pedido no.: <?php echo $data[0]['codigo']; ?></th>
                        <th style="padding: 5px;border: none;" class="txt-left">Precio: <?php echo number_format($data[0]['precio_millar'], 2); ?></th>
                        <th style="padding: 5px;border: none;" class="txt-left" colspan="2">Fecha: <?php echo $data[0]['Fecha']; ?></th>
                    </tr>
                    <tr>
                        <th style="padding: 5px;border: none;"></th>
                    </tr>
                    <tr>
                        <th style="padding: 5px;border: none;"></th>
                    </tr>
                    <tr>
                        <th style="padding: 5px;border: none;"></th>
                    </tr>
                    <tr>
                        <th style="padding: 5px;">DESCRIPCIÓN</th>
                        <th style="padding: 5px;">MEDIDA</th>
                        <th style="padding: 5px;">CANTIDAD</th>
                        <th style="padding: 5px;">ACABADO</th>
                        <th style="padding: 5px;">CODIGO</th>
                    </tr>
                </thead>

                <body>
                    <?php require_once 'orden/tablaOrden_2.php'; ?>
                </body>
            </table>
        </div>
    </div>
    <div class="footer">
        <div class="d-grid g-3">
            <div class="d-flex align-content-bottom">
                <p>Clave: VEN-F-05</p>
            </div>
            <div class="d-flex align-content-bottom">
                <p>Versión: 2</p>
            </div>
            <div class="d-flex align-content-bottom">
                <p>Fecha de validación: </p>
            </div>
        </div>
    </div>
    <div class="footer" style="top: 44%;">
        <div class="d-grid g-3">
            <div class="d-flex align-content-bottom">
                <p>Clave: VEN-F-05</p>
            </div>
            <div class="d-flex align-content-bottom">
                <p>Versión: 2</p>
            </div>
            <div class="d-flex align-content-bottom">
                <p>Fecha de validación: </p>
            </div>
        </div>
    </div>
</body>

</html>