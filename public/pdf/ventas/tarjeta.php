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
        <?php require_once 'tarjeta/tablatarjeta.php' ?>
        <thead>
            <tr>
                <th class="th"></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td colspan="7" style="border: none;">
                    <table>
                        <tbody>
                            <tr>
                                <td class="txt-center" width="100px" style="font-size: 7pt;">ALAMBRE OCUPADO</td>
                                <td rowspan="2" colspan="2" class="txt-center" style="background-color: rgb(204, 209, 209 ); font-size: 16pt;">
                                    <i><b><?php echo  $Id_Folio; ?></b></i>
                                </td>
                                <td class="txt-center" style="font-size: 7pt;">FACT MP </th>
                                <td class="txt-center" style="font-size: 7pt;">No.Parte <br> </th>
                                <td colspan="2" class="txt-center" style="font-size: 7pt;">T/Termico:</th>
                                <td class="txt-center" style="font-size: 7pt;">Bote</th>
                            </tr>
                            <tr>
                                <td class="txt-center" style="font-size: 6pt;">CALIBRE<br><br></td>
                                <td class="txt-center" style="font-size: 7pt;"></td>
                                <td class="txt-center" style="font-size: 7pt;"><?php echo  $Codigo; ?></td>
                                <td colspan="2" class="txt-center" style="font-size: 7pt; background-color: #C4D79B;"><?php echo  $Tratamiento; ?></td>
                                <td class="txt-center" style="font-size: 12pt;">
                                    <b><?php echo  $_GET['bote']; ?></b>
                                </td>
                            </tr>
                            <tr>
                                <td class="txt-center" rowspan="2" style="font-size: 6pt;">KG<br><br></td>
                                <td class="txt-right" style=" font-size: 7pt;">DESCRIPCION</td>
                                <td style="font-size: 7pt;"><?php echo $Descripcion; ?></td>
                                <td class="txt-center" style="font-size: 7pt;"><?php echo $Medida ?></td>
                                <td class="txt-center" style="font-size: 7pt;"><?php echo $Acabado; ?></td>
                                <td colspan="2" class="txt-center" style="font-size: 7pt;">DIBUJO</td>
                                <td class="txt-center" style="font-size: 7pt; background: yellow;"><?php echo $Dibujo; ?></td>
                            </tr>
                            <tr>
                                <td class="txt-right" style="font-size: 7pt;">CLIENTE</td>
                                <td style="font-size: 7pt;"><?php echo $Id_Clientes_2; ?></td>
                                <td class="txt-right" style="font-size: 7pt;">SALIDA</td>
                                <td class="txt-center" style="font-size: 7pt;"><?php echo $Salida; ?></td>
                                <td colspan="2" class="txt-right" style="font-size: 7pt;">FECHA</td>
                                <td class="txt-center" style="font-size: 7pt;"><?php echo $Fecha[2].'/'. $Fecha[1].'/'. $Fecha[0]; ?></td>
                            </tr>
                            <tr>
                                <td class="txt-center" style="font-size: 7pt;">PZAS</td>
                                <td style="font-size: 7pt;"><b>FORJADO</b></td>
                                <td style="font-size: 7pt;">TURNO</td>
                                <td class="txt-center" style="font-size: 7pt;">KG</td>
                                <td class="txt-center" style="font-size: 7pt;">PZAS</td>
                                <td style="font-size: 7pt;"><b>CEMENTADO</b></td>
                                <td style="font-size: 7pt;">TURNO</td>
                                <td class="txt-center" style="font-size: 7pt;">KG</td>
                            </tr>
                            <tr>
                                <td rowspan="2"></td>
                                <td style="font-size: 7pt; background: #EBF1DE;">FECHA:<br><br></td>
                                <td style="font-size: 7pt; background: #EBF1DE;">FACTOR:<br><br></td>
                                <td rowspan="2" style="font-size: 7pt;"></td>
                                <td rowspan="2" style="font-size: 7pt;"></td>
                                <td style="font-size: 7pt; background: #EBF1DE;">FECHA:<br><br></td>
                                <td style="font-size: 7pt; background: #EBF1DE;">FACTOR:<br><br></td>
                                <td rowspan="2"></td>
                            </tr>
                            <tr>
                                <td style="font-size: 7pt; background: #EBF1DE;">MAQUINA<br><br></td>
                                <td style="font-size: 7pt; background: #EBF1DE;">AUTORIZO<br><br></td>
                                <td style="font-size: 7pt; background: #EBF1DE;">MAQUINA<br><br></td>
                                <td style="font-size: 7pt; background: #EBF1DE;">AUTORIZO<br><br></td>
                            </tr>
                            <tr>
                                <td class="txt-center" style="font-size: 7pt;">PZAS</td>
                                <td style="font-size: 7pt;"><b>RANURADO</b></td>
                                <td style="font-size: 7pt;">TURNO</td>
                                <td class="txt-center" style="font-size: 7pt;">KG</td>
                                <td class="txt-center" style="font-size: 7pt;">PZAS</td>
                                <td style="font-size: 7pt;"><b>ACABADO</b></td>
                                <td style="font-size: 7pt;">TURNO</td>
                                <td class="txt-center" style="font-size: 7pt;">KG</td>
                            </tr>
                            <tr>
                                <td rowspan="2"></td>
                                <td style="font-size: 7pt; background: #EBF1DE;">FECHA:<br><br></td>
                                <td style="font-size: 7pt; background: #EBF1DE;">FACTOR:<br><br></td>
                                <td rowspan="2" style="font-size: 7pt;"></td>
                                <td rowspan="2" style="font-size: 7pt;"></td>
                                <td style="font-size: 7pt; background: #EBF1DE;">FECHA:<br><br></td>
                                <td style="font-size: 7pt; background: #EBF1DE;">FACTOR:<br><br></td>
                                <td rowspan="2"></td>
                            </tr>
                            <tr>
                                <td style="font-size: 7pt; background: #EBF1DE;">MAQUINA<br><br></td>
                                <td style="font-size: 7pt; background: #EBF1DE;">AUTORIZO<br><br></td>
                                <td style="font-size: 7pt; background: #EBF1DE;">MAQUINA<br><br></td>
                                <td style="font-size: 7pt; background: #EBF1DE;">AUTORIZO<br><br></td>
                            </tr>
                            <tr>
                                <td class="txt-center" style="font-size: 7pt;">PZAS</td>
                                <td style="font-size: 7pt;"><b>ROLADO</b></td>
                                <td style="font-size: 7pt;">TURNO</td>
                                <td class="txt-center" style="font-size: 7pt;">KG</td>
                                <td class="txt-center" style="font-size: 7pt;">PZAS</td>
                                <td colspan="2" style="font-size: 7pt;"><b>ALMACEN</b></td>
                                <td class="txt-center" style="font-size: 7pt;">KG</td>
                            </tr>
                            <tr>
                                <td rowspan="2"></td>
                                <td style="font-size: 7pt; background: #EBF1DE;">FECHA:<br><br></td>
                                <td style="font-size: 7pt; background: #EBF1DE;">FACTOR:<br><br></td>
                                <td rowspan="2" style="font-size: 7pt;"></td>
                                <td rowspan="2" style="font-size: 7pt;"></td>
                                <td colspan="2" style="font-size: 7pt; background: #EBF1DE;">FECHA:<br><br></td>
                                <td rowspan="2"></td>
                            </tr>
                            <tr>
                                <td style="font-size: 7pt; background: #EBF1DE;">MAQUINA<br><br></td>
                                <td style="font-size: 7pt; background: #EBF1DE;">AUTORIZO<br><br></td>
                                <td colspan="2" style="font-size: 7pt; background: #EBF1DE;">FACTOR<br><br></td>
                            </tr>
                            <tr>
                                <td class="txt-center" style="font-size: 7pt;">PZAS</td>
                                <td style="font-size: 7pt;"><b>SHANK</b></td>
                                <td style="font-size: 7pt;">TURNO</td>
                                <td class="txt-center" style="font-size: 7pt;">KG</td>
                                <td colspan="3" class="txt-center" style="font-size: 7pt;">CONTROL DE CALIDAD</td>
                                <td class="txt-center" style="font-size: 7pt;">TOTAL A PRODUCIR</td>
                            </tr>
                            <tr>
                                <td rowspan="2"></td>
                                <td style="font-size: 7pt; background: #EBF1DE;">FECHA:<br><br></td>
                                <td style="font-size: 7pt; background: #EBF1DE;">FACTOR:<br><br></td>
                                <td rowspan="2" style="font-size: 7pt;"></td>
                                <td colspan="3" rowspan="2" style="font-size: 7pt;"><br><br></td>
                                <td style="background: #538DD5; font-size: 12pt;" class="txt-center">
                                    <i><b><?php echo number_format($Cantidad_millares * 1000); ?></b></i>
                                </td>
                            </tr>
                            <tr>
                                <td style="font-size: 7pt; background: #EBF1DE;">MAQUINA<br><br></td>
                                <td style="font-size: 7pt; background: #EBF1DE;">AUTORIZO<br><br></td>
                                <td style="background: #B8CCE4;"></td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
            <tr>
                <td colspan="7" style="border: none;">
                    <table>
                        <tbody>
                            <tr>
                                <td style="font-size: 7pt;" width="110px" rowspan="2">HORA</td>
                                <td colspan="4" class="txt-center" style="font-size: 7pt; background-color: rgb(204, 209, 209 );"><i><b>FORJADO</b></i></td>
                                <td colspan="2" class="txt-center" style="font-size: 7pt; background-color: rgb(204, 209, 209 );"><i><b>ROLADO</b></i></td>
                                <td colspan="2" class="txt-center" style="font-size: 7pt; background-color: rgb(204, 209, 209 );"><i><b>RANURADO</b></i></td>
                            </tr>
                            <tr>
                                <td style="font-size: 6pt;">LONG DE VASTAGO</td>
                                <td style="font-size: 6pt;">DIAM VASTAGO</td>
                                <td style="font-size: 6pt;">ALTURA DE CABEZA</td>
                                <td style="font-size: 6pt;">DIAMETRO DE CABEZA</td>
                                <td style="font-size: 6pt;">LONG CUERDA</td>
                                <td style="font-size: 6pt;">CUERDA</td>
                                <td style="font-size: 6pt;">RANURA</td>
                                <td style="font-size: 6pt;">ANCHO DE RANURA</td>
                            </tr>

                            <tr>
                                <td style="font-size: 7pt;">7:00AM-7:30AM <br></td>
                                <td style="font-size: 7pt;">1°</td>
                                <td style="font-size: 7pt;">1°</td>
                                <td style="font-size: 7pt;">1°</td>
                                <td style="font-size: 7pt;">1°</td>
                                <td style="font-size: 7pt;">1°</td>
                                <td style="font-size: 7pt;">1°</td>
                                <td style="font-size: 7pt;">1°</td>
                                <td style="font-size: 7pt;">1°</td>
                            </tr>
                            <tr>
                                <td style="font-size: 7pt;">7:30AM-8:00AM</td>
                                <td style="font-size: 7pt;">2°</td>
                                <td style="font-size: 7pt;">2°</td>
                                <td style="font-size: 7pt;">2°</td>
                                <td style="font-size: 7pt;">2°</td>
                                <td style="font-size: 7pt;">2°</td>
                                <td style="font-size: 7pt;">2°</td>
                                <td style="font-size: 7pt;">2°</td>
                                <td style="font-size: 7pt;">2°</td>
                            </tr>
                            <tr>
                                <td style="font-size: 7pt;">8:00AM-8:30AM</td>
                                <td style="font-size: 7pt;">1°</td>
                                <td style="font-size: 7pt;">1°</td>
                                <td style="font-size: 7pt;">1°</td>
                                <td style="font-size: 7pt;">1°</td>
                                <td style="font-size: 7pt;">1°</td>
                                <td style="font-size: 7pt;">1°</td>
                                <td style="font-size: 7pt;">1°</td>
                                <td style="font-size: 7pt;">1°</td>
                            </tr>
                            <tr>
                                <td style="font-size: 7pt;">8:30AM-9:00AM</td>
                                <td style="font-size: 7pt;">2°</td>
                                <td style="font-size: 7pt;">2°</td>
                                <td style="font-size: 7pt;">2°</td>
                                <td style="font-size: 7pt;">2°</td>
                                <td style="font-size: 7pt;">2°</td>
                                <td style="font-size: 7pt;">2°</td>
                                <td style="font-size: 7pt;">2°</td>
                                <td style="font-size: 7pt;">2°</td>
                            </tr>
                            <tr>
                                <td style="font-size: 7pt;">9:00AM-9:30AM</td>
                                <td style="font-size: 7pt;">1°</td>
                                <td style="font-size: 7pt;">1°</td>
                                <td style="font-size: 7pt;">1°</td>
                                <td style="font-size: 7pt;">1°</td>
                                <td style="font-size: 7pt;">1°</td>
                                <td style="font-size: 7pt;">1°</td>
                                <td style="font-size: 7pt;">1°</td>
                                <td style="font-size: 7pt;">1°</td>
                            </tr>
                            <tr>
                                <td style="font-size: 7pt;">9:30AM-10:00AM</td>
                                <td style="font-size: 7pt;">2°</td>
                                <td style="font-size: 7pt;">2°</td>
                                <td style="font-size: 7pt;">2°</td>
                                <td style="font-size: 7pt;">2°</td>
                                <td style="font-size: 7pt;">2°</td>
                                <td style="font-size: 7pt;">2°</td>
                                <td style="font-size: 7pt;">2°</td>
                                <td style="font-size: 7pt;">2°</td>
                            </tr>
                            <tr>
                                <td style="font-size: 7pt;">10:00AM-10:30AM</td>
                                <td style="font-size: 7pt;">1°</td>
                                <td style="font-size: 7pt;">1°</td>
                                <td style="font-size: 7pt;">1°</td>
                                <td style="font-size: 7pt;">1°</td>
                                <td style="font-size: 7pt;">1°</td>
                                <td style="font-size: 7pt;">1°</td>
                                <td style="font-size: 7pt;">1°</td>
                                <td style="font-size: 7pt;">1°</td>
                            </tr>
                            <tr>
                                <td style="font-size: 7pt;">10:30AM-11:00AM</td>
                                <td style="font-size: 7pt;">2°</td>
                                <td style="font-size: 7pt;">2°</td>
                                <td style="font-size: 7pt;">2°</td>
                                <td style="font-size: 7pt;">2°</td>
                                <td style="font-size: 7pt;">2°</td>
                                <td style="font-size: 7pt;">2°</td>
                                <td style="font-size: 7pt;">2°</td>
                                <td style="font-size: 7pt;">2°</td>
                            </tr>
                            <tr>
                                <td style="font-size: 7pt;">11:00AM-11:30AM</td>
                                <td style="font-size: 7pt;">1°</td>
                                <td style="font-size: 7pt;">1°</td>
                                <td style="font-size: 7pt;">1°</td>
                                <td style="font-size: 7pt;">1°</td>
                                <td style="font-size: 7pt;">1°</td>
                                <td style="font-size: 7pt;">1°</td>
                                <td style="font-size: 7pt;">1°</td>
                                <td style="font-size: 7pt;">1°</td>
                            </tr>
                            <tr>
                                <td style="font-size: 7pt;">11:30AM-12:00PM</td>
                                <td style="font-size: 7pt;">2°</td>
                                <td style="font-size: 7pt;">2°</td>
                                <td style="font-size: 7pt;">2°</td>
                                <td style="font-size: 7pt;">2°</td>
                                <td style="font-size: 7pt;">2°</td>
                                <td style="font-size: 7pt;">2°</td>
                                <td style="font-size: 7pt;">2°</td>
                                <td style="font-size: 7pt;">2°</td>
                            </tr>
                            <tr>
                                <td style="font-size: 7pt;">12:00PM-12:30PM</td>
                                <td style="font-size: 7pt;">1°</td>
                                <td style="font-size: 7pt;">1°</td>
                                <td style="font-size: 7pt;">1°</td>
                                <td style="font-size: 7pt;">1°</td>
                                <td style="font-size: 7pt;">1°</td>
                                <td style="font-size: 7pt;">1°</td>
                                <td style="font-size: 7pt;">1°</td>
                                <td style="font-size: 7pt;">1°</td>
                            </tr>
                            <tr>
                                <td style="font-size: 7pt;">12:30PM-1:00PM</td>
                                <td style="font-size: 7pt;">2°</td>
                                <td style="font-size: 7pt;">2°</td>
                                <td style="font-size: 7pt;">2°</td>
                                <td style="font-size: 7pt;">2°</td>
                                <td style="font-size: 7pt;">2°</td>
                                <td style="font-size: 7pt;">2°</td>
                                <td style="font-size: 7pt;">2°</td>
                                <td style="font-size: 7pt;">2°</td>
                            </tr>
                            <tr>
                                <td style="font-size: 7pt;">1:00PM-1:30PM</td>
                                <td style="font-size: 7pt;">1°</td>
                                <td style="font-size: 7pt;">1°</td>
                                <td style="font-size: 7pt;">1°</td>
                                <td style="font-size: 7pt;">1°</td>
                                <td style="font-size: 7pt;">1°</td>
                                <td style="font-size: 7pt;">1°</td>
                                <td style="font-size: 7pt;">1°</td>
                                <td style="font-size: 7pt;">1°</td>
                            </tr>
                            <tr>
                                <td style="font-size: 7pt;">>1:30PM-2:00PM</td>
                                <td style="font-size: 7pt;">2°</td>
                                <td style="font-size: 7pt;">2°</td>
                                <td style="font-size: 7pt;">2°</td>
                                <td style="font-size: 7pt;">2°</td>
                                <td style="font-size: 7pt;">2°</td>
                                <td style="font-size: 7pt;">2°</td>
                                <td style="font-size: 7pt;">2°</td>
                                <td style="font-size: 7pt;">2°</td>
                            </tr>
                            <tr>
                                <td style="font-size: 7pt;">2:30PM-3:00PM</td>
                                <td style="font-size: 7pt;">1°</td>
                                <td style="font-size: 7pt;">1°</td>
                                <td style="font-size: 7pt;">1°</td>
                                <td style="font-size: 7pt;">1°</td>
                                <td style="font-size: 7pt;">1°</td>
                                <td style="font-size: 7pt;">1°</td>
                                <td style="font-size: 7pt;">1°</td>
                                <td style="font-size: 7pt;">1°</td>
                            </tr>
                            <tr>
                                <td style="font-size: 7pt;">2:30PM-3:00PM</td>
                                <td style="font-size: 7pt;">2°</td>
                                <td style="font-size: 7pt;">2°</td>
                                <td style="font-size: 7pt;">2°</td>
                                <td style="font-size: 7pt;">2°</td>
                                <td style="font-size: 7pt;">2°</td>
                                <td style="font-size: 7pt;">2°</td>
                                <td style="font-size: 7pt;">2°</td>
                                <td style="font-size: 7pt;">2°</td>
                            </tr>

                            <tr>
                                <td style="font-size: 7pt;">3:00PM-3:30PM</td>
                                <td style="font-size: 7pt;">1°</td>
                                <td style="font-size: 7pt;">1°</td>
                                <td style="font-size: 7pt;">1°</td>
                                <td style="font-size: 7pt;">1°</td>
                                <td style="font-size: 7pt;">1°</td>
                                <td style="font-size: 7pt;">1°</td>
                                <td style="font-size: 7pt;">1°</td>
                                <td style="font-size: 7pt;">1°</td>
                            </tr>
                            <tr>
                                <td style="font-size: 7pt;">:30PM-4:00PM</td>
                                <td style="font-size: 7pt;">2°</td>
                                <td style="font-size: 7pt;">2°</td>
                                <td style="font-size: 7pt;">2°</td>
                                <td style="font-size: 7pt;">2°</td>
                                <td style="font-size: 7pt;">2°</td>
                                <td style="font-size: 7pt;">2°</td>
                                <td style="font-size: 7pt;">2°</td>
                                <td style="font-size: 7pt;">2°</td>
                            </tr>
                            <tr>
                                <td style="font-size: 7pt;">4:00PM-4:30PM</td>
                                <td style="font-size: 7pt;">1°</td>
                                <td style="font-size: 7pt;">1°</td>
                                <td style="font-size: 7pt;">1°</td>
                                <td style="font-size: 7pt;">1°</td>
                                <td style="font-size: 7pt;">1°</td>
                                <td style="font-size: 7pt;">1°</td>
                                <td style="font-size: 7pt;">1°</td>
                                <td style="font-size: 7pt;">1°</td>
                            </tr>

                            <tr>
                                <td style="font-size: 7pt;">4:30PM-5:00PM</td>
                                <td style="font-size: 7pt;">2°</td>
                                <td style="font-size: 7pt;">2°</td>
                                <td style="font-size: 7pt;">2°</td>
                                <td style="font-size: 7pt;">2°</td>
                                <td style="font-size: 7pt;">2°</td>
                                <td style="font-size: 7pt;">2°</td>
                                <td style="font-size: 7pt;">2°</td>
                                <td style="font-size: 7pt;">2°</td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
        </tbody>
        <tfoot>
            <tr>
                <td class="td"></td>
            </tr>
        </tfoot>
    </table>

    <script>
        // window.print();
    </script>
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
                    <p>TARJETA DE FLUJO</p>
                </div>

            </div>
        </div>
    </div>
    <div class="footer">
        <div class="d-grid g-3">
            <div class="d-flex align-content-bottom">
                <p>Clave: FOR-VEN-06 </p>
            </div>
            <div class="d-flex align-content-bottom">
                <p>Versión: 2 </p>
            </div>
            <div class="d-flex align-content-bottom">
                <p>Fecha de validación: </p>
            </div>
        </div>
    </div>
</body>

</html>