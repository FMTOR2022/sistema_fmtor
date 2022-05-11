<table>
    <thead>
        <tr>
            <th colspan="5" class="th-estado">HORARIO</th>
        </tr>
        <tr>
            <th>NOMBRE</th>
            <th>APELLIDO PATERNO</th>
            <th>APELLIDO MATERNO</th>
            <th>ENTRADA</th>
            <th>ALMUERZO SALIDA</th>
            <th>ALMUERZO REGRESO</th>
            <th>SALIDA</th>
        </tr>
    </thead>
    <tbody id="v_horario">
        <?php
        $nombre = array();
        $apellidoP = array();
        $apellidoM = array();
        $entrada = array();
        $almuerzoS = array();
        $almuerzoR = array();
        $salida = array();

        $nombre = '';
        $apellidoP = '';
        $apellidoM = '';
        $entrada = 0;
        $almuerzoS = 0;
        $almuerzoR = 0;
        $salida = 0;

        for ($i=0 ; $i < count($data['horario']) ; $i++ ) { 
            if ($data['horario'][$i]['nombre'] != $nombre && $nombre != '') {
                $nombres[] = $nombre;
                $apellidoPs[] = $apellidoP;
                $apellidoMs[] = $apellidoM;
                $entradas[]=  $entrada;
                $almuerzoSs[] = $almuerzoS; 
                $almuerzoRs[] = $almuerzoR;
                $salidas[] = $salida;

                $entrada = 0;
                $almuerzoS = 0;
                $almuerzoR = 0;
                $salida = 0;

                $entrada += $data['horario'][$i]['entrada'];
                $almuerzoS += $data['horario'][$i]['almuerzoS'];
                $almuerzoR += $data['horario'][$i]['almuerzoR'];
                $salida += $data['horario'][$i]['salida'];
            }else{
                $nombre = $data['horario'][$i]['nombre'];
                $apellidoP = $data['horario'][$i]['apellidoP'];
                $apellidoM = $data['horario'][$i]['apellidoM'];

                $entrada = $data['horario'][$i]['entrada'];
                $almuerzoS = $data['horario'][$i]['almuerzoS'];
                $almuerzoR = $data['horario'][$i]['almuerzoS'];
                $salida = $data['horario'][$i]['salida'];
            }
        }

        for ($i=0; $i< count($nombre); $i++) { 
            $fila = '<tr>'.
                            '<td class="txt-right">'.$nombre[$i].'</td>'. 
                            '<td class="txt-right">'.$apellidoP[$i].'</td>'. 
                            '<td class="txt-right">'.$apellidoM[$i].'</td>'. 
                            '<td class="txt-right">'.$entrada[$i].'</td>'.
                            '<td class="txt-right">'.$almuerzoS[$i].'</td>'. 
                            '<td class="txt-right">'.$almuerzoR[$i].'</td>'. 
                            '<td class="txt-right">'.$salida[$i].'</td>'.  
                    '</tr>';
                    echo $fila;  
                }
        ?>
    </tbody>
</table>