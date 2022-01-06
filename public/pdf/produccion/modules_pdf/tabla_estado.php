<?php

    $meses = array();
    $cantidad_de_dias = array();
    $rango_semanas = array();
    $aux_semanas = array();
    $tablas = array();
    $rango_tablas = array();
    $aux_tablas = array();
    $retrasos = array();
    $rango_anterior = '';
    $aux_contador = 0;
    $mes = '';
    $fecha = '';

    if (count($data) > 0) {
        $fecha_hora = explode(' ',$data[0]['Fecha']);
        $fecha = explode('-',$fecha_hora[0]);
        if (($fecha[1]-1) < 1) {
            $meses[] = [$fecha[0]-1,12];
            $cantidad_de_dias[] = date('t', strtotime(($fecha[0]-1).'-'.'12-1'));
        } else {
            $meses[] = [$fecha[0],($fecha[1]-1)];
            $cantidad_de_dias[] = date('t', strtotime(($fecha[0]).'-'.($fecha[1]-1).'-1'));
        }
    }
    
    for ($i=0; $i < count($data); $i++) {
        $fecha = explode(' ',$data[$i]['Fecha']);
        if (explode('-',$fecha[0])[1] != $mes) {
            $meses[] = [explode('-',$fecha[0])[0],explode('-',$fecha[0])[1]];
            $cantidad_de_dias[] = date('t', strtotime($fecha[0]));
            $mes = explode('-',$fecha[0])[1];
        }
    }
    
    if (count($data) > 0) {
        $fecha_hora = explode(' ',$data[count($data)-1]['Fecha']);
        $fecha = explode('-',$fecha_hora[0]);
        if (($fecha[1]+1) > 12) {
            $meses[] = [$fecha[0]+1,1];
            $cantidad_de_dias[] = date('t', strtotime(($fecha[0]+1).'-'.'1-1'));
        } else {
            $meses[] = [$fecha[0],$fecha[1]+1];
            $cantidad_de_dias[] = date('t', strtotime(($fecha[0]).'-'.($fecha[1]+1).'-1'));
        }
    }
    
    for ($i=0; $i < count($cantidad_de_dias); $i++) {
        for ($j=1; $j <= $cantidad_de_dias[$i]; $j++) { 
            $dia = date('l', strtotime($meses[$i][0].'-'.$meses[$i][1].'-'.$j));
            if (($i == 0 && $j == 1) || $dia == 'Saturday') {
                $aux_semanas[] = $meses[$i][0].'-'.$meses[$i][1].'-'.$j;
            }
            
            if ($dia == 'Sunday') {
                $rango_semanas[] = $aux_semanas;
                $aux_semanas = array();
                $aux_semanas[] = $meses[$i][0].'-'.$meses[$i][1].'-'.$j;
            }
        }
    }

    for ($i=0; $i < count($data); $i++) { 
        for ($j=0; $j < count($rango_semanas); $j++) { 
            $fecha_hora = explode(' ',$data[$i]['Fecha']);
            $fecha = explode('-',$fecha_hora[0]);
            if ($fecha[2] < 10) {
                $fecha[2] = intval($fecha[2]);
            } 

            $fecha_reg = $fecha[0].'-'.$fecha[1].'-'.$fecha[2];

            if ((strtotime($fecha_reg) >= strtotime($rango_semanas[$j][0])) && (strtotime($fecha_reg) <= strtotime($rango_semanas[$j][1]))) {
                $actual = date('Y-m-d');
                if (strtotime($actual) <= strtotime($rango_semanas[$j+4][1])) {
                    if ($rango_anterior == '' ||  $rango_anterior == $rango_semanas[$j][0]) {
                        $aux_tablas[] = $data[$i];
                        $rango_anterior = $rango_semanas[$j][0];
                        if ($aux_contador == 0) {
                            $rango_tablas[] = [[$rango_semanas[$j][0],$rango_semanas[$j][1]],[$rango_semanas[$j+2][0],$rango_semanas[$j+2][1]],[$rango_semanas[$j+4][0],$rango_semanas[$j+4][1]]];
                            $aux_contador++;
                        }
                    } else {
                        $rango_tablas[] = [[$rango_semanas[$j][0],$rango_semanas[$j][1]],[$rango_semanas[$j+2][0],$rango_semanas[$j+2][1]],[$rango_semanas[$j+4][0],$rango_semanas[$j+4][1]]];
                        $rango_anterior = $rango_semanas[$j][0];
                        $tablas[] = $aux_tablas;
                        $aux_tablas = array();
                        $aux_tablas[] = $data[$i];
                    }
                } else {
                    $retrasos[] = $data[$i];
                }

                $j = count($rango_semanas);
            }
        }
    }

    $tablas[] = $aux_tablas;

    echo '<tr><td class="txt-center th-estado" colspan="7">RETRASOS</td></tr>';
    echo '<tr>';
    for ($i=0; $i < count($retrasos); $i++) {
            echo '<td>'.$retrasos[$i]['Id_Folio'].'</td>';
            echo '<td>'.$retrasos[$i]['Clientes'].'</td>';
            echo '<td>'.$retrasos[$i]['descripcion'].'</td>';
            echo '<td>'.$retrasos[$i]['cantidad_elaborar'].'</td>';
            echo '<td>'.$retrasos[$i]['precio_millar'].'</td>';
            echo '<td class="txt-right">'.number_format($retrasos[$i]['TOTAL'],2).'</td>';
            echo '<td>'.$retrasos[$i]['estado_general'].'</td>';
        echo '</tr>';
    }

    for ($i=0; $i < count($tablas); $i++) {
        echo '<tr><td class="txt-center" colspan="7"></td></tr>';
        for ($l=0; $l < count($rango_tablas[$i]); $l++) {
            echo '<tr><td class="txt-center th-estado" colspan="7">'.$rango_tablas[$i][$l][0].'  -  '.$rango_tablas[$i][$l][1].'</td></tr>';
        }
        echo '<tr><td class="txt-center" colspan="7"></td></tr>';
        for ($j=0; $j < count($tablas[$i]); $j++) { 
            echo '<tr>';
                echo '<td>'.$tablas[$i][$j]['Id_Folio'].'</td>';
                echo '<td>'.$tablas[$i][$j]['Clientes'].'</td>';
                echo '<td>'.$tablas[$i][$j]['descripcion'].'</td>';
                echo '<td>'.$tablas[$i][$j]['cantidad_elaborar'].'</td>';
                echo '<td>'.$tablas[$i][$j]['precio_millar'].'</td>';
                echo '<td class="txt-right">'.number_format($tablas[$i][$j]['TOTAL'],2).'</td>';
                echo '<td>'.$tablas[$i][$j]['estado_general'].'</td>';
            echo '</tr>';
        }
    }
?>