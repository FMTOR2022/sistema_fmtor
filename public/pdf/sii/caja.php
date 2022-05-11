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

    $fecha_inicio = '2021-11-02';
    $fecha_cierre = '2022-11-02';
    $fecha_prueba = '2022-02-15';

    // if (count($data) > 0) {
        $fecha = explode('-',$fecha_inicio);
        if (($fecha[1]-1) < 1) {
            $meses[] = [$fecha[0]-1,12];
            $cantidad_de_dias[] = date('t', strtotime(($fecha[0]-1).'-'.'12-1'));
        } else {
            $meses[] = [$fecha[0],($fecha[1])];
            $cantidad_de_dias[] = date('t', strtotime(($fecha[0]).'-'.($fecha[1]).'-1'));
        }
    // }
    
    $fecha_aux = $fecha_inicio;
    $anio_aux = explode('-',$fecha_inicio)[0]; 
    $mes_aux = explode('-',$fecha_inicio)[1]+1;
    echo date('t', strtotime($anio_aux.'-'.$mes_aux.'-01'));

    for ($i=0; $i < 11; $i++) {
        if ($mes_aux > 12) {
            $anio_aux++;
            $mes_aux = 1;
            $meses[] = [$anio_aux,$mes_aux];
            $fecha_aux = $anio_aux.'-'.$mes_aux.'-01';
            $cantidad_de_dias[] = date('t', strtotime($fecha_aux));
            $mes_aux++;
        } else {
            $meses[] = [$anio_aux,$mes_aux];
            $fecha_aux = $anio_aux.'-'.$mes_aux.'-01';
            $cantidad_de_dias[] = date('t', strtotime($fecha_aux));
            $mes_aux++;
        }
    }

    echo '<pre>';
        var_dump($meses);
        // var_dump($cantidad_de_dias);
    echo '</pre>';
    
    // if (count($data) > 0) {
        // $fecha_hora = explode(' ',$data[count($data)-1]['Fecha']);
        $fecha = explode('-',$fecha_cierre);
        if (($fecha[1]+1) > 12) {
            $meses[] = [$fecha[0]+1,1];
            $cantidad_de_dias[] = date('t', strtotime(($fecha[0]+1).'-'.'1-1'));
        } else {
            $meses[] = [$fecha[0],$fecha[1]];
            $cantidad_de_dias[] = date('t', strtotime(($fecha[0]).'-'.($fecha[1]).'-1'));
        }
    // }

    for ($i=0; $i < count($cantidad_de_dias); $i++) {
        for ($j=1; $j <= $cantidad_de_dias[$i]; $j++) { 
            $dia = date('l', strtotime($meses[$i][0].'-'.$meses[$i][1].'-'.$j));
            if (($i == 0 && $j == 1) || $dia == 'Saturday') {
                $aux_semanas[] = $meses[$i][0].'-'.$meses[$i][1].'-'.$j;
            }
            
            if ($dia == 'Sunday' && count($aux_semanas) > 1) {
                $rango_semanas[] = $aux_semanas;
                $aux_semanas = array();
                $aux_semanas[] = $meses[$i][0].'-'.$meses[$i][1].'-'.$j;
            }
        }
    }

    echo '<pre>';
        var_dump($rango_semanas);
    echo '</pre>';

    // for ($i=0; $i < count($data); $i++) { 
    //     for ($j=0; $j < count($rango_semanas); $j++) { 
    //         $fecha_hora = explode(' ',$data[$i]['Fecha']);
    //         $fecha = explode('-',$fecha_hora[0]);
    //         if ($fecha[2] < 10) {
    //             $fecha[2] = intval($fecha[2]);
    //         } 

    //         $fecha_reg = $fecha[0].'-'.$fecha[1].'-'.$fecha[2];

    //         if ((strtotime($fecha_reg) >= strtotime($rango_semanas[$j][0])) && (strtotime($fecha_reg) <= strtotime($rango_semanas[$j][1]))) {
    //             $actual = date('Y-m-d');
    //             if (strtotime($actual) <= strtotime($rango_semanas[$j+4][1])) {
    //                 if ($rango_anterior == '' ||  $rango_anterior == $rango_semanas[$j][0]) {
    //                     $aux_tablas[] = $data[$i];
    //                     $rango_anterior = $rango_semanas[$j][0];
    //                     if ($aux_contador == 0) {
    //                         $rango_tablas[] = [[$rango_semanas[$j][0],$rango_semanas[$j][1]],[$rango_semanas[$j+2][0],$rango_semanas[$j+2][1]],[$rango_semanas[$j+4][0],$rango_semanas[$j+4][1]]];
    //                         $aux_contador++;
    //                     }
    //                 } else {
    //                     $rango_tablas[] = [[$rango_semanas[$j][0],$rango_semanas[$j][1]],[$rango_semanas[$j+2][0],$rango_semanas[$j+2][1]],[$rango_semanas[$j+4][0],$rango_semanas[$j+4][1]]];
    //                     $rango_anterior = $rango_semanas[$j][0];
    //                     $tablas[] = $aux_tablas;
    //                     $aux_tablas = array();
    //                     $aux_tablas[] = $data[$i];
    //                 }
    //             } else {
    //                 $retrasos[] = $data[$i];
    //             }

    //             $j = count($rango_semanas);
    //         }
    //     }
    // }
?>