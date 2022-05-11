<?php
    $meses = ['ENERO',
                'FEBRERO',
                'MARZO',
                'ABRIL',
                'MAYO',
                'JUNIO',
                'JULIO',
                'AGOSTO',
                'SEPTIEMBRE',
                'OCTUBRE',
                'NOVIEMBRE',
                'DICIEMBRE'];

    $fecha_anterior = '';
    $aux = 0;
    $total_acumulado = 0;
    $total_acumulado_mensual = 0;
    $total_kilos = 0;
    $total_kilos_mensual = 0;

    for ($i=0; $i < count($data); $i++) { 
        $fecha = (explode(' ',$data[$i]['Fecha']))[0];
        if ($aux > 0 && $fecha_anterior != (explode('-',$fecha)[0].'-'.explode('-',$fecha)[1]) && (explode('-',$fecha)[0].'-'.explode('-',$fecha)[1]) != '0000-00') {
            echo '<tr>'.
                    '<td class="txt-right th-estado">Kilos mensuales: </td>'.
                    '<td class="txt-right th-estado">'.number_format($total_kilos_mensual, 2, '.', '').'</td>'.
                    '<td colspan="11" class="txt-right th-estado">Acumulado mensual:</td>'.
                    '<td class="txt-right th-estado">$ '.number_format($total_acumulado_mensual, 2, '.', '').'</td>'.
                    '<td colspan="2" class="th-estado"></td>'.
                '</tr>';
                $total_acumulado_mensual = 0;
                $total_kilos_mensual = 0;
                $total_acumulado_mensual += floatval($data[$i]['TOTAL']);
                $total_kilos_mensual += (floatval($data[$i]['factor'])*floatval($data[$i]['cantidad_elaborar']));
        } else {
            $total_acumulado_mensual += floatval($data[$i]['TOTAL']);
            $total_kilos_mensual += (floatval($data[$i]['factor'])*floatval($data[$i]['cantidad_elaborar']));
        }

        if ($aux == 0 || $fecha_anterior != (explode('-',$fecha)[0].'-'.explode('-',$fecha)[1])  && (explode('-',$fecha)[0].'-'.explode('-',$fecha)[1]) != '0000-00') {
            echo '<tr><td class="txt-center th-estado" colspan="16">'.$meses[explode('-',$fecha)[1]-1].' '.explode('-',$fecha)[0].'</td></tr>';
            $fecha_anterior = explode('-',$fecha)[0].'-'.explode('-',$fecha)[1];
            $aux++;
        }

        $total_acumulado += floatval($data[$i]['TOTAL']);
        $total_kilos += floatval($data[$i]['factor'])*floatval($data[$i]['cantidad_elaborar']);

        echo '<tr>'.
                '<td>'.$data[$i]['calibre'].'</td>'.
                '<td class="txt-right">'.number_format(floatval($data[$i]['factor'])*floatval($data[$i]['cantidad_elaborar']), 2, '.', '').'</td>'.
                '<td class="txt-right">'.number_format(floatval($data[$i]['factor']), 2, '.', '').'</td>'.
                '<td>'.$data[$i]['Id_Folio'].'</td>'.
                '<td>'.(explode(' ',$data[$i]['Fecha']))[0].'</td>'.
                '<td>'.$data[$i]['Clientes'].'</td>'.
                '<td>'.$data[$i]['medida'].'</td>'.
                '<td>'.$data[$i]['descripcion'].'</td>'.
                '<td>'.$data[$i]['tratamiento'].'</td>'.
                '<td>'.$data[$i]['material'].'</td>'.
                '<td>'.$data[$i]['acabados'].'</td>'.
                '<td class="txt-right">'.$data[$i]['cantidad_elaborar'].'</td>'.
                '<td class="txt-right">'.$data[$i]['precio_millar'].'</td>'.
                '<td class="txt-right">'.number_format($data[$i]['TOTAL'], 2, '.', '').'</td>'.
                '<td class="txt-right">$ '.number_format($total_acumulado, 2, '.', '').'</td>'.
                '<td>'.$data[$i]['estado_general'].'</td>'.
            '</tr>';
    }

    echo '<tr>'.
                    '<td class="txt-right th-estado">Kilos mensuales: </td>'.
                    '<td class="txt-right th-estado">'.number_format($total_kilos_mensual, 2, '.', '').'</td>'.
                    '<td colspan="11" class="txt-right th-estado">Acumulado mensual:</td>'.
                    '<td class="txt-right th-estado">$ '.number_format($total_acumulado_mensual, 2, '.', '').'</td>'.
                    '<td colspan="2" class="th-estado"></td>'.
                '</tr>';

    echo '<tr>'.
            '<td class="txt-right th-estado">Total kilos: </td>'.
            '<td class="txt-right th-estado">'.number_format($total_kilos, 2, '.', '').'</td>'.
            '<td colspan="12" class="txt-right th-estado">Total acumulado</td>'.
            '<td class="txt-right th-estado">$ '.$total_acumulado.'</td>'.
            '<td class="th-estado"></td>'.
    '</tr>';
?>