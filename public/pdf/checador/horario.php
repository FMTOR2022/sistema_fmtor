<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HORARIO</title>
    <link rel="stylesheet" href="http://localhost/sistema_fmtor/public/css/formato.css?1.3">
</head>
<body>
    <div class="header">
        <div class="d-grid g-2">
            <div class="logo-formato">
                <img src="http://localhost/sistema_fmtor/public/img/logo_formato.png" alt="">
            </div>
            <div class="d-flex flex-wrap justify-right">
                <div class="titulo txt-right">
                    <p>FORJADORA MEXICANA DE TORNILLOS</p>
                    <span>S.A. DE C.V.</span>
                </div>
                <div class="nombre txt-right">
                    <p>HORARIO</p>
                </div>
            </div>
        </div>
    </div>


    <table class="formato">
        <thead>
            <tr>
                <th class="th"></th>
            </tr>
            <tr>
                <th>Dibujo: 035-10-32</th>
                <th>Cantidad: 40,000</th>
                <th class="OP">Orden de Producción: OP10863</th>
            </tr>
            <tr>
                <th>Fecha: 04/08/2021</th>
                <th>Cliente: 296 MULTIELECTRICA</th>
                <th>Descripción: C/FIJ PH 10-32X1</th>
            </tr>
            <tr>
                <th colspan="3">TROPICALIZADO   0</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="td-sn-pd"><?php require_once 'modules_pdf/v_horario.php'; ?></td>
            </tr>
        </tbody>
        <tfoot>
            <tr>
                <td class="td"></td>
            </tr>
        </tfoot>
    </table>

    <div class="footer">
        <div class="d-grid g-4">
            <div class="d-flex align-content-bottom">
                <p>Clave: </p>
            </div>
            <div class="d-flex align-content-bottom">
                <p>Versión: </p>
            </div>
            <div class="d-flex align-content-bottom">
                <p>Fecha de validación: </p>
            </div>
            <div class="d-flex align-content-bottom">
                <p>Página: </p>
            </div>
        </div>
    </div>
</body>
</html>