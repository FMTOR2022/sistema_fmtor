<?php                                             
    if (count($data) > 0) {

        $cantidad_de_maquinas = $cantidad_de_m;
        $contador_maquinas = 1;
        $contador_observaciones = 0;
        $date = '';
        $dia = '';
        $turno = '';
        $contador_semana = 1;
        $limite_semanas = array();
        $contador_limite = 0;
        $aux = array();
        $semanas = array(); 
        $observaciones = array();
        $total_dias = date('t', strtotime($data[0]['fecha']));
        $total_dia = 0;
        $total_anterior = 0;
        $total_maquina = array();
    
        for ($i=0; $i < ($cantidad_de_maquinas+2); $i++) { 
            $total_maquina[] = 0;
        }
    
        for ($i=1; $i <= $total_dias; $i++) { 
            $fecha = explode('-',$data[0]['fecha'])[0].'-'.explode('-',$data[0]['fecha'])[1].'-'.$i;
            $dia_semana = date('l', strtotime($fecha));
            if ($dia_semana == 'Saturday' || $i == $total_dias) {
                $aux[] = $i;
                if (count($aux) == 1) {
                    $aux[] = $i;
                }
                $limite_semanas[] = $aux;
                $aux = array();
            } else if ($dia_semana == 'Sunday' || $i == 1) {
                $aux[] = $i;
            }
        }
    
        $turno_anterior = '';
        $fecha_anterior = '';
        $aux = array();
        $aux_observaciones = array();
        for ($c_aux=0; $c_aux < $cantidad_de_maquinas; $c_aux++) { 
            $aux[] = 0;
            $aux_observaciones[] = 0;
        }
        $turnos = array();
        
        for ($j=0; $j < count($data); $j++) { 
            if (($turno_anterior == '' || $turno_anterior == $data[$j]['turno']) && ($fecha_anterior == '' || $fecha_anterior == $data[$j]['fecha'])) {
                if (array_key_exists('kilos',$data[$j])) {
                    $aux[$data[$j]['no_maquina']-1] = $data[$j]['kilos'];
                } else if (array_key_exists('pzas',$data[$j])) {
                    $aux[$data[$j]['no_maquina']-1] = $data[$j]['pzas'];
                }
                
                $turno_anterior = $data[$j]['turno'];
                $fecha_anterior = $data[$j]['fecha'];
                $a = str_replace (' ' , '_', $data[$j]['observaciones']);
                $aux_observaciones[$data[$j]['no_maquina']-1] = $a;
            } else if (($turno_anterior != $data[$j]['turno']) || ($fecha_anterior != $data[$j]['fecha'])) {
                $aux[] = $fecha_anterior;
                $aux[] = $turno_anterior;
                $turnos[] = $aux;
                $observaciones[] = $aux_observaciones;

                $turno_anterior = $data[$j]['turno'];
                $fecha_anterior = $data[$j]['fecha'];
                $aux = array();
                $aux_observaciones = array();
                for ($c_aux=0; $c_aux < $cantidad_de_maquinas; $c_aux++) { 
                    $aux[] = 0;
                    $aux_observaciones[] = 0;
                }

                if (array_key_exists('kilos',$data[$j])) {
                    $aux[$data[$j]['no_maquina']-1] = $data[$j]['kilos'];
                } else if (array_key_exists('pzas',$data[$j])) {
                    $aux[$data[$j]['no_maquina']-1] = $data[$j]['pzas'];
                }
                $a = str_replace (' ' , '_', $data[$j]['observaciones']);
                $aux_observaciones[$data[$j]['no_maquina']-1] = $a;
            }
        }
        $observaciones[] = $aux_observaciones;
        $aux[] = $fecha_anterior;
        $aux[] = $turno_anterior;
        $turnos[] = $aux;
        
        for ($i=0; $i < count($limite_semanas); $i++) { 
            echo '<tr><td class="txt-center" colspan="14">SEMANA '.($i+1).'</td></tr>';
            for ($k=0; $k < count($turnos); $k++) {
                $dia_registro = explode('-',$turnos[$k][count($turnos[$k])-2]);
                if ($dia_registro[2] >= $limite_semanas[$i][0] && $dia_registro[2] <= $limite_semanas[$i][1]) {
                    echo '<tr><td>'.$turnos[$k][count($turnos[$k])-2].'</td>';
                    for ($j=0; $j < (count($turnos[$k])-2); $j++) { 
                        echo '<td class="'.$observaciones[$k][$j].' txt-center">'.$turnos[$k][$j].'</td>';
                        $total_dia += $turnos[$k][$j];
                        $total_anterior += $turnos[$k][$j];
                        $total_maquina[$j] += $turnos[$k][$j];
                        $contador_observaciones++;
                    }
                    $total_maquina[count($total_maquina)-2] += $total_dia;
                    $total_maquina[count($total_maquina)-1] += $total_anterior;
                    echo '<td></td>'.
                            '<td class="txt-center">'.$total_dia.'</td>'. 
                            '<td class="txt-center">'.$total_anterior.'</td>'. 
                        '</tr>';
                }
                $total_dia = 0;
            }
            echo '<tr><td class="txt-right">TOTAL:</td>';
                for ($t=0; $t < $cantidad_de_maquinas; $t++) { 
                    echo '<td class="txt-center">'.$total_maquina[$t].'</td>';
                }
            echo '<td></td>';
                echo '<td class="txt-center">'.$total_maquina[count($total_maquina)-2].'</td>';
                echo '<td class="txt-center">'.$total_maquina[count($total_maquina)-1].'</td>';
            echo '</tr>';
            
            $total_maquina = array();
    
            for ($c=0; $c < ($cantidad_de_maquinas+2); $c++) { 
                $total_maquina[] = 0;
            }
            $total_dia = 0;
            $total_anterior = 0;
        }
    } else {
        echo '<td class="txt-center" colspan="'.($cant_th+5).'">Sin registros</td>';
    }
