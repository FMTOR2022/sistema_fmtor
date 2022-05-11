<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="style=devmin-width:ice;max-width:30%-style, inmin-width:iti;max-width:30%al-scale=1.0">
    <title>.</title>
    <link rel="stylesheet" href="<?php echo $this->url_server; ?>/public/css/formato.css?1.3">
    <link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp" rel="stylesheet">

</head>

<body>
    <table class="formato">
        <thead>
            <tr>
                <th class="th"></th>
            </tr>
            <tr>
                <th style="border: none;" class="txt-left">DIRECCIÓN:</th>
                <th style="border: none;" class="txt-left" colspan="2">SAN LUIS N° 10 COL. LOMAS ESTRELLA ALCALDÍA IZTAPALAPA<br>
                    <hr>
                </th>
                <th style="border: none;" class="txt-left">N° DE COTIZACIÓN:</th>
                <th><?php echo $data[0]['id_cotizacion'] ?></th>
            </tr>
            <tr>
                <th style="border: none;" class="txt-left">TELÉFONOS:</th>
                <th style="border: none;" class="txt-left">
                    <div class="d-flex align-content-center">
                        <i class="material-icons" style="font-size:1.2em;padding: 0px 15px 0px 0px;">phone_in_talk</i>
                        <p> 55 8954 0576 (77)(78) EXT 105</p>
                    </div>
                    <hr>
                </th>
                <th style="border: none;" class="txt-left">
                    <div class="d-flex align-content-center">
                        <i class="material-icons" style="font-size:1.2em;padding: 0px 15px 0px 0px;">whatsapp</i>
                        <p> CEL: 55 8094 7494</p>
                    </div>
                    <hr>
                </th>
                <th style="border: none;" class="txt-left">FECHA:</th>
                <th><?php echo date("l, F j, Y"); ?></th>
            </tr>
            <tr>
                <th style="border: none;" class="txt-left">CORREO:</th>
                <th style="border: none;" class="txt-left" colspan="2">
                    ventas3@fmtor.mx<br>
                    <hr>
                </th>
                <th style="border: none;" class="txt-left">VÁLIDO HASTA:</th>
                <th style="background: yellow;">15 DÍAS</th>
            </tr>
            <tr>
                <th style="border: none;" class="txt-left">SITIO WEB:</th>
                <th style="border: none;" class="txt-left">
                    <div class="d-flex align-content-center">
                        <i class="material-icons" style="font-size:1.2em;padding: 0px 15px 0px 0px;">language</i>
                        www.fmtor.com.mx
                    </div>
                    <hr>
                </th>
                <th style="border: none;" class="txt-left">Forjadora Mex De Tornillos<br>
                    <hr>
                </th>
            </tr>
            <tr>
                <th style="border: none;" class="txt-left">RESP. VENTAS:</th>
                <th style="border: none;" class="txt-left">ARACELI GONZALES</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td style="border:none"></td>
            </tr>
            <tr>
                <td style="border:none"></td>
            </tr>
            <tr>
                <td colspan="5" style="padding: 0; border: none;">
                    <table>
                        <thead>
                            <tr>
                                <th style="background: #3B4E87; border-color: #3B4E87; color: white;" colspan="2">DATOS DE LA EMPRESA</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td width="80px" style="font-weight: bold; color: #3B4E87;" class="txt-right">CLIENTE:</td>
                                <td><?php echo $data[0]['nombre'] ?></td>
                            </tr>
                            <tr>
                                <td width="80px" style="font-weight: bold; color: #3B4E87;" class="txt-right">EMPRESA</td>
                                <td><?php echo $data[0]['razon_social'] ?></td>
                            </tr>
                            <tr>
                                <td width="80px" style="font-weight: bold; color: #3B4E87;" class="txt-right">CORREO:</td>
                                <td><?php echo $data[0]['correo'] ?></td>
                            </tr>
                            <tr>
                                <td width="80px" style="font-weight: bold; color: #3B4E87;" class="txt-right">TELÉFONOS:</td>
                                <td><?php echo $data[0]['telefono'] ?></td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
            <tr>
                <td style="border:none"></td>
            </tr>
            <tr>
                <td style="border:none"></td>
            </tr>
            <tr>
                <td colspan="5" style="padding: 0; border: none;">
                    <table>
                        <thead>
                            <tr>
                                <th style="background: #3B4E87; border-color: #3B4E87; color: white;">CODIGO</th>
                                <th style="background: #3B4E87; border-color: #3B4E87; color: white;">CANT.</th>
                                <th style="background: #3B4E87; border-color: #3B4E87; color: white;">DESCRIPCIÓN</th>
                                <th style="background: #3B4E87; border-color: #3B4E87; color: white;">P. MILLAR</th>
                                <th style="background: #3B4E87; border-color: #3B4E87; color: white;">TOTAL</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            $subtotal = 0;
                            $iva = 0;
                            $total = 0;

                            for ($i = 0; $i < count($data); $i++) {
                                echo '<tr>';
                                echo '<td>' . $data[$i]['no_parte'] . '</td>';
                                echo '<td class="txt-right">' . $data[$i]['cantidad'] . '</td>';
                                echo '<td>' . $data[$i]['descripcion'] . '</td>';
                                echo '<td class="txt-right">$ ' . number_format($data[$i]['costo'], 2) . '</td>';
                                echo '<td class="txt-right">$ ' . number_format(floatval(($data[$i]['cantidad'] * $data[$i]['costo'])), 2) . '</td>';
                                echo '</tr>';
                                $subtotal += $data[$i]['cantidad'] * $data[$i]['costo'];
                            }

                            $iva = ($subtotal * 0.16);
                            $total = $iva + $subtotal;
                            ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td style="border: none;" colspan="3"></td>
                                <td>SUBTOTAL</td>
                                <td class="txt-right">$ <?php echo number_format($subtotal, 2); ?></td>
                            </tr>
                            <tr>
                                <td style="border: none;" colspan="3"></td>
                                <td>IVA</td>
                                <td class="txt-right">$ <?php echo number_format($iva, 2); ?></td>
                            </tr>
                            <tr>
                                <td style="border: none;" colspan="3"></td>
                                <td>TOTAL</td>
                                <td class="txt-right">$ <?php echo number_format($total, 2); ?></td>
                            </tr>
                            <tr>
                                <td style="border:none"></td>
                            </tr>
                            <tr>
                                <td style="border:none"></td>
                            </tr>
                            <tr>
                                <td colspan="5" style="background: #3B4E87; border-color: #3B4E87; color: white; text-align: center; font-weight: bold;">
                                    TERMINOS Y CONDICIONES
                                </td>
                            </tr>
                            <tr>
                                <td colspan="5">
                                    <p>
                                        Esta cotización está sujeta a los términos y condiciones que se anuncian a continuación:
                                    </p>
                                    <br>
                                    <p>
                                    <ul>
                                        <li class="txt-justify"><i> * Estos precios son en moneda nacional y no incluyen IVA con entrega en CDMX y/o fuera de su preferencia.</i></li>
                                        <li class="txt-justify"><i> * Método de pago: 50% DE ANTICIPO 50% CONTRA ENTREGA.</i></li>
                                        <li class="txt-justify"><i> * Tiempo de entrega: 5 A 6 SEMANAS.</i></li>
                                        <li class="txt-justify"><i> * Previa OC.</i></li>
                                        <li class="txt-justify"><i> * En caso de que se genere cualquier cambio en los precios, ya sea por motivo de una repentina alza o caída de precios en los insumos que se utilizan para la fabricación "el proveedor" está de acuerdo en revisar conjuntamente dichos precios con "el cliente" para llegar a un acuerdo entre ambos.</i></li>
                                        <li class="txt-justify"><i> * Solo se cuenta con 2 Meses de garantía para revisar que el producto haya cumplido con los requerimientos solicitados.</i></li>
                                        <li class="txt-justify"><i> * Se empacará en caja de 20-25Kg.</i></li>
                                        <li class="txt-justify"><i> * El precio estará sujeto a revisión en el caso que el volumen de consumo sea modificado una vez que sea emitida.</i></li>
                                        <li class="txt-justify"><i> +/- 10% por cada Orden de compra.</i></li>
                                        <li class="txt-justify"><i> * En caso de requerir PPAB nivel 3 tiene un costo adicional de $ 550 USD nuestro laboratorio y $650USD laboratorio certificado.</i></li>
                                        <li class="txt-justify"><i> * Si usted tiene alguna pregunta sobre esta cotización, por favor, póngase en contacto con nosotros.</i></li>
                                    </ul>
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <td style="border:none"></td>
                            </tr>
                            <tr>
                                <td style="border:none"></td>
                            </tr>
                            <tr>
                                <td colspan="5" class="txt-center" style="border: none;">
                                    <i class="material-icons" style="font-size:1.5em;padding: 0px 15px 0px 0px;">whatsapp</i>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="5" class="txt-center" style="border: none;">
                                    GRACIAS POR SU PREFERENCIA!
                                </td>
                            </tr>
                        </tfoot>
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
        window.print()
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
                    <p>COTIZACIÓN</p>
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