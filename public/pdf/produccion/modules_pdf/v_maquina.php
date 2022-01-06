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
                $limite_semanas[] = $aux;
                $aux = array();
            }
    
            if ($dia_semana == 'Sunday' || $i == 1) {
                $aux[] = $i;
            }
        }
    
        for ($j=0; $j < count($data); $j++) { 
            if ($contador_maquinas < $cantidad_de_maquinas) {
                if (array_key_exists('kilos', $data[$j])) {
                    $aux[] = $data[$j]['kilos'];
                } else if (array_key_exists('pzas', $data[$j])) {
                    $aux[] = $data[$j]['pzas'];
                }
                $observaciones[] = str_replace (' ' , '_', $data[$j]['observaciones']);
                $contador_maquinas++;
            } else if ($contador_maquinas == $cantidad_de_maquinas) {
                if (array_key_exists('kilos', $data[$j])) {
                    $aux[] = $data[$j]['kilos'];
                } else if (array_key_exists('pzas', $data[$j])) {
                    $aux[] = $data[$j]['pzas'];
                }
                $observaciones[] = str_replace (' ' , '_', $data[$j]['observaciones']);
                $aux[] = $data[$j]['fecha'];
                $semanas[] = $aux;
                $aux = array();
                $contador_maquinas=1;
            }
        }
        
        for ($i=0; $i < count($limite_semanas); $i++) { 
            echo '<tr><td class="txt-center" colspan="14">SEMANA '.($i+1).'</td></tr>';
            for ($k=0; $k < count($semanas); $k++) {
                $dia_registro = explode('-',$semanas[$k][count($semanas[$k])-1]);
                if ($dia_registro[2] >= $limite_semanas[$i][0] && $dia_registro[2] <= $limite_semanas[$i][1]) {
                    echo '<tr><td>'.$semanas[$k][count($semanas[$k])-1].'</td>';
                    for ($j=0; $j < (count($semanas[$k])-1); $j++) { 
                        echo '<td class="'.$observaciones[$contador_observaciones].' txt-center">'.$semanas[$k][$j].'</td>';
                        $total_dia += $semanas[$k][$j];
                        $total_anterior += $semanas[$k][$j];
                        $total_maquina[$j] += $semanas[$k][$j];
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


?>