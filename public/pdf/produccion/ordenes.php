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
    <table class="formato">
        <thead>
            <tr>
                <th class="th"></th>
            </tr>
            <tr>
                <th>CAL.</th>
                <th>Kg.</th>
                <th>Factor</th>
                <th>N° O.P.</th>
                <th>Fecha de O.P.</th>
                <th>Cliente</th>
                <th>Descripción</th>
                <th>Acabado</th>
                <th>Cant</th>
                <th>Precio</th>
                <th>Total</th>
                <th>Acumulado<br>(Acabado)</th>
                <th>Estado</th>
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
                <img src="http://localhost/sistema_fmtor/public/img/logo_formato.png" alt="">
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
                <p>VERSIÓN: 1</p>
            </div>
            <div class="d-flex align-content-bottom">
                <p>FECHA DE APROBACIÓN: </p>
            </div>
        </div>
    </div>
    <script>
        const totalPages = document.querySelectorAll('.page').length;
        document.documentElement.style.setProperty('--total-pages', totalPages);
        console.log(totalPages);
    </script>
</body>
</html>