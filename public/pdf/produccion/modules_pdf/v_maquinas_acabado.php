<?php 

    $turnos = array();
    $fechas = array();
    $turno = 0;
    $fecha = '';
    $kilos = 0;
    $pzas = 0;
    $acumulado = 0;

    if (count($data) > 0) {
        for ($i=0; $i < count($data); $i++) { 
            if (($turno == 0 || $turno == $data[$i]['turno']) && ($fecha == '' || $fecha == $data[$i]['fecha'])) {
                if ($_GET['kilos_pzas'] == 'kilos') {
                    $kilos += $data[$i]['kilos']; 
                } else if ($_GET['kilos_pzas'] == 'pzas') {
                    $pzas += $data[$i]['pzas']; 
                }
                $turno = $data[$i]['turno'];
                $fecha = $data[$i]['fecha'];
            } else if (($turno != $data[$i]['turno']) || ($fecha != $data[$i]['fecha'])) {
                if ($_GET['kilos_pzas'] == 'kilos') {
                    $turnos[] = $kilos; 
                } else if ($_GET['kilos_pzas'] == 'pzas') {
                    $turnos[] = $pzas; 
                }
                
                $kilos = 0;
                $pzas = 0;
                $turno = 0;
                $fechas[] = $fecha;
                $fecha = '';
                $turno = $data[$i]['turno'];
                $fecha = $data[$i]['fecha'];

                if ($_GET['kilos_pzas'] == 'kilos') {
                    $kilos += $data[$i]['kilos'];
                } else if ($_GET['kilos_pzas'] == 'pzas') {
                    $pzas += $data[$i]['pzas'];
                }
            }
        }

        if ($_GET['kilos_pzas'] == 'kilos') {
            $turnos[] = $kilos; 
        } else if ($_GET['kilos_pzas'] == 'pzas') {
            $turnos[] = $pzas; 
        }
        $fechas[] = $fecha;

        for ($i=0; $i < count($turnos); $i++) { 
            echo '<tr>'.
                    '<td>'.$fechas[$i].'</td>'.
                    '<td class="txt-center">'.$turnos[$i].'</td>'.
                '</tr>';
            $acumulado+=$turnos[$i];
        }

        echo '<tr>'.
                '<td>Total acumulado: </td>'.
                '<td class="txt-center">'.$acumulado.'</td>'.
            '</tr>';
    } else {
        echo '<tr>'.
                    '<td colspan="7" class="txt-center">No existe ningún registro</td>'.
                '</tr>';
    }
?>