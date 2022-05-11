<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>.</title>
    <link rel="stylesheet" href="http://localhost/sistema_fmtor/public/css/formato.css?1.3">
</head>
<body>
    <?php date_default_timezone_set('America/Mexico_City'); ?>
    <table class="formato">
        <thead>
            <tr>
                <th class="th" style="border:none;"></th>
            </tr>
            <tr>
                <th style="border: none; font-size: 1.2em;">Cálculo de obligaciones al término de la relación laboral</th>
            </tr>
            <tr>
                <th style="border: none; font-size: 1.2em;">FINIQUITO <br><br></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td style="border:none;">
                    <?php require_once 'modules_pdf/finiquito.php'; ?>
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
                <img src="http://localhost/sistema_fmtor/public/img/logo_formato.png" alt="">
            </div>
            <div class="d-flex flex-wrap justify-right">
                <div class="titulo txt-right">
                    <p>FORJADORA MEXICANA DE TORNILLOS</p>
                    <span>S.A. DE C.V.</span>
                </div>
                <div class="nombre txt-right">
                    <p></p>
                </div>
            </div>
        </div>
    </div>
    <div class="footer">
        <div class="d-grid g-3">
            <div class="d-flex align-content-bottom">
                <p>CLAVE: RHS-F-000</p>
            </div>
            <div class="d-flex align-content-bottom">
                <p>VERSIÓN: 2</p>
            </div>
            <div class="d-flex align-content-bottom">
                <p>FECHA DE APROBACIÓN: </p>
            </div>
        </div>
    </div>
    <script>
        window.print();
    </script>
</body>
</html>