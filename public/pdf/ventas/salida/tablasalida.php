<?php

    $total_pzas = 0;
    $total_costo = 0;
    $plano = '-';
    $op = '-';
    $compra = '-';
    $factura = [];

    for ($i=0; $i < count($data['salida']); $i++) { 
        $factura[] = ['-','-'];

        for ($j=0; $j < count($data['ordenes']); $j++) { 
            if ($data['ordenes'][$j]['Id_Pedido'] == $data['salida'][$i]['Id_Pedido']) {
                $plano = $data['ordenes'][$j]['Id_Catalogo'];
                $op = $data['ordenes'][$j]['Id_Folio'];
            }
        }

        for ($k=0; $k < count($data['facturas']); $k++) { 
            if ($data['facturas'][$k]['Id_Pedido_FK'] == $data['salida'][$i]['Id_Pedido']) {
                $factura = [];
                $factura[] = [$data['facturas'][$k]['Factura'], $data['facturas'][$k]['Empaque']];
            }
        }

        for ($k=0; $k < count($data['compras']); $k++) { 
            if ($data['compras'][$k]['id_pedido'] == $data['salida'][$i]['Id_Pedido']) {
                $compra = 'Compra '.explode(' ',$data['compras'][$k]['proveedor'])[0];
            }
        }

        echo '<tr>'.
                '<td class="txt-right">'.$data['salida'][$i]['cantidad'].'</td>'.
                '<td>'.$data['salida'][$i]['no_parte'].'</td>'.
                '<td>'.$data['salida'][$i]['pedido_cliente'].'</td>'.
                '<td>'.$data['salida'][$i]['medida'].'</td>'.
                '<td>'.$data['salida'][$i]['descripcion'].'</td>'.
                '<td>'.$data['salida'][$i]['acabados'].'</td>'.
                '<td class="txt-right">$ '.$data['salida'][$i]['costo'].'</td>'.
                '<td>'.$factura[0][0].'</td>'. 
                '<td>'.$factura[0][1].'</td>'.
                '<td>'.$plano.'</td>'.
            '</tr>';

        if ($op != '-') {
            $kardex = $data['salida'][$i]['kardex'];
            if ($kardex != 0) {
                echo '<tr>'.
                       '<td colspan="3" style="border: none;"></td>' .
                       '<td colspan="2" class="th-estado">Kardex: '.$kardex.'</td>'.
                       '<td colspan="4" style="border: none;"></td>' .
                       '<td class="th-estado">OP: '.$op.'</td>'.
                   '</tr>';
            } else {
                echo '<tr>'.
                       '<td colspan="9" style="border: none;"></td>' .
                       '<td class="th-estado">OP: '.$op.'</td>'.
                   '</tr>';

            }
        } else if ($compra != '-') {
            $kardex = $data['salida'][$i]['kardex'];
            if ($kardex != 0) {
                echo '<tr>' .
                    '<td colspan="3" style="border: none;"></td>' .
                    '<td colspan="2" class="th-estado">' . $compra . '</td>' .
                    '<td colspan="5" style="border: none;"></td>' .
                    '</tr>';
                echo '<tr>' .
                    '<td colspan="3" style="border: none;"></td>' .
                    '<td colspan="2" class="th-estado">Kardex ' . $kardex . '</td>' .
                    '<td colspan="5" style="border: none;"></td>' .
                    '</tr>';
            } else {
                echo '<tr>' .
                    '<td colspan="3" style="border: none;"></td>' .
                    '<td colspan="2" class="th-estado">' . $compra . '</td>' .
                    '<td colspan="5" style="border: none;"></td>' .
                    '</tr>';
            }
        } else if ($data['salida'][$i]['kardex'] != '0') {
             echo '<tr>'. 
                '<td colspan="3" style="border: none;"></td>'.
                '<td colspan="2" class="th-estado">Kardex '. $data['salida'][$i]['kardex'].'</td>'.
                '<td colspan="5" style="border: none;"></td>'.
            '</tr>';
        }

        echo '<tr>'.
                '<td style="border: none;" colspan="10"></td>'.
            '</tr>';

        $total_pzas += $data['salida'][$i]['cantidad'];
        $total_costo += $data['salida'][$i]['costo'];
        $plano = '-';
        $op = '-';
        $compra = '-';
    }

    echo '<tr>' .
            '<td class="txt-right" style="border: none;"><br></td>'.
        '</tr>';
    echo '<tr>' .
            '<td class="txt-right">TOTAL PZAS:</td>' .
            '<td colspan="5"></td>' .
            '<td class="txt-right">COSTO TOTAL</td>' .
            '<td colspan="3"></td>' .
        '</tr>';
    echo '<tr>' .
            '<td class="txt-right">'.$total_pzas.'</td>' .
            '<td colspan="5"></td>' .
            '<td class="txt-right">$ '. $total_costo.'</td>' .
            '<td colspan="3"></td>' .
        '</tr>';
?>