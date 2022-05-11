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
                <th class="txt-right" style="border:none;">Ciudad de México, a <?php echo date('d'); ?> de <?php echo date('m'); ?> de <?php echo date('Y'); ?>.</th>
                <td></td>
            </tr>
            <tr>
                <th class="txt-left" style="border:none; height: 10vh;">Forjadora Mexicana de Tornillos S.A de C.V</th>
            </tr>
            <tr>
                <th class="txt-left" style="border:none;">P R E S E N T E</th>
            </tr>
    </thead>
        <tbody>
            <tr>
                <td style="border:none;">
                    <ol style="padding: 0px 0px 0px 20px">

                    <tr>
                        <td class="txt-justify" style="border:none; height: 5vh;">
                            Estimados Señores:
                        </td> 
                    </tr>

                    <tr>
                        <td class="txt-justify" style="border:none;">
                            Por medio de la presente hago de su conocimiento que por así convenir a los intereses de ambas partes,
                            patron y trabajador en esta fecha y con el carácter de irrevocable, se da por terminada la relación de
                            trabajo que hasta el día de hoy tenia.
                        </td>
                    </tr>  

                    <tr>
                        <td class="txt-justify" style="border:none;">
                            Aprovechando la ocasión, como trabajador hago constar que siempre fueron cubiertos con toda oportunidad
                            mi salario y prestaciones a las que pudiera haber tenido derecho, conforme a la relación contractual de 
                            trabajo que se ha dado por terminada con fecha de hoy, y a la Ley Federal de Trabajo, asi como que durante 
                            todo el tiempo que presté mis servicios a esta empresa, no sufrí ningún accidente laboral, ni enfermedad de 
                            trabajo o profesional, por lo que me reservo acción y derecho alguno que ejercitar con posterioridad en contra
                            de esta institución o de quién represente sus intereses otorgándole por tanto la líquidación o finiquito que
                            en derecho proceda.
                        </td>      
                    </tr>

                    <tr>
                        <td class="txt-center" style="border:none; height: 20vh;">
                            A t e n t a m e n t e
                            <br>
                            <br>
                            <?php echo $_SESSION['bm9tYnJlX3VzdWFyaW8=']; ?>
                        </td>
                    </tr>

                    </ol>
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
                    <p>CARTA RENUNCIA</p>
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
                <p>VERSIÓN: 1</p>
            </div>
            <div class="d-flex align-content-bottom">
                <p>FECHA DE APROBACIÓN: </p>
            </div>
        </div>
    </div>
</body>
</html>