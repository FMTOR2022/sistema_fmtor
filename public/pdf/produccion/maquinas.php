<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>.</title>
    <link rel="stylesheet" href="http://localhost/sistema_fmtor/public/css/formato.css?1.3">
        <style>

        .Mantenimiento {
            color: white;
            background-color: #FF0000;
            text-align: center;
        }
    
        .Falta_de_Alambre {
            background-color: #0000FF;
            text-align: center;
        }
    
        .Ajuste {
            background-color: #CC0099;
            text-align: center;
        }
    
        .Herramental {
            background-color: #00FF00;
            color: black;
            font-weight: 500;
            text-align: center;
        }
    
        .Festivo {
            background-color: #00FFCC;
            color: black;
            font-weight: 500;
            text-align: center;
        }
    
        .Falto_Operador {
            background-color: #666699;
            text-align: center;
        }
    
        .No_se_libero_Tornillo_Laton {
            background-color: #FFC000;
            text-align: center;
        }
    
        .No_hubo_punch {
            background-color: #6B16AA;
            text-align: center;
        }
    
        .Sin_OP {
            background-color: gray;
            text-align: center;
        }
    
        .Ajuste_OTM {
            background-color: #548235;
            text-align: center;
        }
    
        .H_Quebrado {
            background-color: #F4B084;
            text-align: center;
        }
    </style>
</head>
<body>
    <table class="formato">
        <thead>
            <tr>
                <th class="th"></th>
            </tr>
            <tr>
                <?php 
                    if ($_GET['estado'] == 1) {
                        $cant_th = 9;
                    } else if ($_GET['estado'] == 2) {
                        $cant_th = 3;
                    } else if ($_GET['estado'] == 3) {
                        $cant_th = 6;
                    } else if ($_GET['estado'] == 4) {
                        $cant_th = 3;
                    } else if ($_GET['estado'] == 6) {
                        $cant_th = 3;
                    }
                    echo '<th colspan="'.($cant_th+5).'">TIPO DE REPORTE: '.strtoupper($_GET['kilos_pzas']).'</th>';
                ?>
            </tr>
            <tr>
                <th class="th-estado" rowspan="2">Día</th>
                <th class="th-estado" colspan="<?php echo $cant_th;?>">REPORTE DIARIO POR MAQUINA</th>
                <th class="th-estado" ></th>
                <th class="th-estado" colspan="2">REGISTRO DIARIO DE PRODUCCIÓN</th>
            </tr>
            <tr>
                <?php 
                
                    if ($_GET['estado'] == 1) {
                        $cantidad_de_m = 9;
                        for ($i=1; $i <= $cant_th; $i++) { 
                            echo '<th class="th-estado">'.$i.'</th>';
                        }
                        echo '<th></th>';
                        echo '<th class="th-estado" colspan="2">FORJADO</th>';
                    } else if ($_GET['estado'] == 2) {
                        $cantidad_de_m = 3;
                        for ($i=1; $i <= $cant_th; $i++) { 
                            echo '<th class="th-estado">'.$i.'</th>';
                        }
                        echo '<th></th>';
                        echo '<th class="th-estado" colspan="2">RANURADO</th>';
                    } else if ($_GET['estado'] == 3) {
                        $cantidad_de_m = 6;
                        for ($i=1; $i <= $cant_th; $i++) { 
                            echo '<th class="th-estado">'.$i.'</th>';
                        }
                        echo '<th></th>';
                        echo '<th class="th-estado" colspan="2">ROLADO</th>';
                    } else if ($_GET['estado'] == 4) {
                        $cantidad_de_m = 3;
                        for ($i=1; $i <= $cant_th; $i++) { 
                            echo '<th class="th-estado">'.$i.'</th>';
                        }
                        echo '<th></th>';
                        echo '<th class="th-estado" colspan="2">SHANK</th>';
                    } else if ($_GET['estado'] == 6) {
                        $cantidad_de_m = 3;
                        for ($i=1; $i <= $cant_th; $i++) { 
                            echo '<th class="th-estado">'.$i.'</th>';
                        }
                        echo '<th></th>';
                        echo '<th class="th-estado" colspan="2">ACABADO</th>';
                    }
                    
                ?>
            </tr>
        </thead>
        <tbody>
            <?php require_once 'modules_pdf/tabla_maquinas.php';  ?>
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
                    <p>REPORTE DIARIO DE PRODUCCIÓN POR MÁQUINA</p>
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