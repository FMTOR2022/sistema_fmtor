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
            <tr>
                <th style="width: 100px; border:none; color: #042348;" class="txt-left">Dirección: </th>
                <th style="border:none; color: #042348;" class="txt-left"><?php echo $data['empresa'][0]['Direccion'] ?></th>
                <th style="border:none; color: #042348;" class="txt-right">FECHA:</th>
                <th style="color: #042348;"><?php echo $data['orden'][0]['Fecha'] ?></th>
            </tr>
            <tr>
                <th style="width: 100px; border:none; color: #042348;" class="txt-left">Ciudad:</th>
                <th style="border:none; color: #042348;" class="txt-left"><?php echo $data['empresa'][0]['Ciudad'] ?></th>
                <th style="border:none; color: #042348;" class="txt-right">#O.C.:</th>
                <th style="color: #042348;"><?php echo $data['orden'][0]['Id_Compra']; ?></th>
            </tr>
            <tr>
                <th style="width: 100px; border:none; color: #042348;" class="txt-left">E-mail:</th>
                <th style="border:none; color: #042348;" colspan="3" class="txt-left"><?php echo $data['empresa'][0]['Correo'] ?></th>
            </tr>
            <tr>
                <th style="width: 100px; border:none; color: #042348;" class="txt-left">Código Postal:</th>
                <th style="border:none; color: #042348;" colspan="3" class="txt-left"><?php echo $data['empresa'][0]['Codigo_Postal'] ?></th>
            </tr>
            <tr>
                <th style="width: 100px; border:none; color: #042348;" class="txt-left">Teléfono:</th>
                <th style="border:none; color: #042348;" colspan="3" class="txt-left"><?php echo $data['empresa'][0]['Telefono'] ?></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td colspan="2" width="50%" style="border: none;">
                    <table>
                        <thead>
                            <tr>
                                <th style="background: #042348; color: white;" colspan="2">PROVEEDOR</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td style="color: #042348; font-size: 0.9em;">Empresa:</td>
                                <td style="color: #042348; font-size: 0.9em;"><?php echo $data['proveedor'][0]['Proveedor'] ?></td>
                            </tr>
                            <tr>
                                <td style="color: #042348; font-size: 0.9em;">Dirección:</td>
                                <td style="color: #042348; font-size: 0.9em;"><?php echo $data['proveedor'][0]['Direccion'] ?></td>
                            </tr>
                            <tr>
                                <td style="color: #042348; font-size: 0.9em;">Ciudad:</td>
                                <td style="color: #042348; font-size: 0.9em;"><?php echo $data['proveedor'][0]['Ciudad'] ?></td>
                            </tr>
                            <tr>
                                <td style="color: #042348; font-size: 0.9em;">Teléfono:</td>
                                <td style="color: #042348; font-size: 0.9em;"><?php echo $data['proveedor'][0]['Telefono'] ?></td>
                            </tr>
                            <tr>
                                <td style="color: #042348; font-size: 0.9em;">Email:</td>
                                <td style="color: #042348; font-size: 0.9em;"><?php echo $data['proveedor'][0]['Correo'] ?></td>
                            </tr>
                        </tbody>
                    </table>
                </td>
                <td colspan="2" width="50%" style="border: none;">
                    <table>
                        <thead>
                            <tr>
                                <th style="background: #042348; color: white;" colspan="2">ENVIAR A</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td style="color: #042348; font-size: 0.9em;">Empresa:</td>
                                <td style="color: #042348; font-size: 0.9em;"><?php echo $data['empresa'][0]['Empresa'] ?></td>
                            </tr>
                            <tr>
                                <td style="color: #042348; font-size: 0.9em;">Dirección:</td>
                                <td style="color: #042348; font-size: 0.9em;"><?php echo $data['empresa'][0]['Direccion'] ?></td>
                            </tr>
                            <tr>
                                <td style="color: #042348; font-size: 0.9em;">Ciudad:</td>
                                <td style="color: #042348; font-size: 0.9em;"><?php echo $data['empresa'][0]['Ciudad'] ?></td>
                            </tr>
                            <tr>
                                <td style="color: #042348; font-size: 0.9em;">Teléfono:</td>
                                <td style="color: #042348; font-size: 0.9em;"><?php echo $data['empresa'][0]['Telefono'] ?></td>
                            </tr>
                            <tr>
                                <td style="color: #042348; font-size: 0.9em;">Email:</td>
                                <td style="color: #042348; font-size: 0.9em;"><?php echo $data['empresa'][0]['Correo'] ?></td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
            <tr>
                <td colspan="4" style="border: none;">
                    <table>
                        <thead>
                            <tr>
                                <th style="width: 30%; border:none; background: #042348; color: white;">SOLICITADO POR</th>
                                <th style="width: 30%; border:none; background: #042348; color: white;">TERMINOS DE PAGO</th>
                                <th style="width: 30%; border:none; background: #042348; color: white;">CONTACTO</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>GERARDO FLORES</td>
                                <td></td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
            <tr>
                <td colspan="4" style="border: none;">
                    <table>
                        <thead>
                            <tr>
                                <th style="background: #042348; color: white;">CODIGO</th>
                                <th style="background: #042348; color: white;">PRODUCTO</th>
                                <th style="background: #042348; color: white;">CANTIDAD</th>
                                <th style="background: #042348; color: white;">PRECIO UNIT</th>
                                <th style="background: #042348; color: white;">%</th>
                                <th style="background: #042348; color: white;">TOTAL</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            $subtotal = 0;
                            $total = 0;

                            for ($i = 0; $i < count($data['pedidos']); $i++) {
                                echo '<tr>';
                                echo '<td>' . $data['pedidos'][$i]['Codigo'] . '</td>';
                                echo '<td>' . $data['pedidos'][$i]['Producto'] . '</td>';
                                echo '<td>' . $data['pedidos'][$i]['Cantidad'] . '</td>';
                                echo '<td class="txt-right">$ ' . number_format($data['pedidos'][$i]['Precio'], 2) . '</td>';
                                echo '<td>' . '</td>';
                                echo '<td class="txt-right">$ ' . number_format($data['pedidos'][$i]['Cantidad'] * $data['pedidos'][$i]['Precio'], 2) . '</td>';
                                echo '</tr>';
                                $subtotal += $data['pedidos'][$i]['Cantidad'] * $data['pedidos'][$i]['Precio'];
                            }

                            $iva = ($subtotal * 0.16);
                            $total = $subtotal + $iva;
                            ?>
                            <!-- <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>$</td>
                                <td></td>
                                <td></td>
                            </tr> -->
                            <tr>
                                <td style="border:none;" colspan="5" class="txt-right">SUBTOTAL</td>
                                <td class="txt-right">$ <?php echo number_format($subtotal, 2); ?></td>
                            </tr>
                            <tr>
                                <td style="border:none;" colspan="5" class="txt-right">IVA</td>
                                <td class="txt-right">$ <?php echo number_format($iva, 2); ?></td>
                            </tr>
                            <tr>
                                <td style="border:none;" colspan="5" class="txt-right">TOTAL USD</td>
                                <td class="txt-right">$ <?php echo number_format($total, 2); ?></td>
                            </tr>
                            <tr>
                                <td style="background: #042348; color: white; font-weight: bold;" class="txt-center" colspan="6">COMENTARIOS E INTRUCCIONES DE ENVIO</td>
                            </tr>
                            <tr>
                                <td style="background: #F2F205;" class="txt-justify" colspan=" 6">
                                    <h2>FAVOR DE PRESENTAR ORIGINAL Y 2 COPIAS DE LA FACTURA Y ORDEN DE COMPRA PARA ENTREGAR MATERIAL</h2>
                                </td>
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
            <tr>
                <td colspan="2" style="border: none;">
                    <hr>
                </td>
                <td colspan="2" style="border: none;">
                    <hr>
                </td>
            </tr>
            <tr>
                <td colspan="2" class="txt-center" style="border: none; font-weight: bold;">Hecho por: PATSY TORRES</td>
                <td colspan="2" class="txt-center" style="border: none; font-weight: bold;">Autorizado por: ING. GERARDO FLORES</td>
            </tr>
            <tr>
                <td colspan="4" style="border: none;"></td>
            </tr>
            <tr>
                <td colspan="4" style="border: none; font-weight: bold;">Búsquenos en:</td>
            </tr>
            <tr>
                <td colspan="4" style="border: none; font-weight: bold;">Facebook: FORJADORA MEX TORNILLOS</td>
            </tr>
            <tr>
                <td colspan="4" style="border: none; font-weight: bold;">WhatsApp: 729-556-4009</td>
            </tr>
            <tr>
                <td colspan="4" style="border: none; font-weight: bold;">
                    <hr>
                </td>
            </tr>
            <tr>
                <td colspan="4" class="txt-center" style="border: none; font-weight: bold;">Cualquier consulta sobre este pedido puede comunicarse con nosotros.</td>
            </tr>
            <tr>
                <td colspan="4" class="txt-center" style="border: none; font-weight: bold;">TEL. 55-56-07-37-09 VENTAS1@FMTOR.MX</td>
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
                    <p>ORDEN DE COMPRA</p>
                </div>
            </div>
        </div>
    </div>
    <div class="footer">
        <div class="d-grid g-3">
            <div class="d-flex align-content-bottom">
                <p>CLAVE: VEN-F-</p>
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