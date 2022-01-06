<table>
    <thead>
        <tr>
            <th colspan="5"  class="th-estado">RANURADO</th>
        </tr>
        <tr>
            <th>Botes</th>
            <th>Fecha</th>
            <th>Pzas.</th>
            <th>Pzas. Acumuladas</th>
            <th>K.g.</th>
        </tr>
    </thead>
    <tbody id="v_ranurado">
        <?php
        $fechas = array();
        $kilos = array();
        $pzas = array();
        $botes = array();
        $total_pzas = array();

        $kilo = 0;
        $total_kilos = 0;
        $pza = 0;
        $sum_pzas = 0;
        $bote = 0;
        $fecha = '';

        for ($i = 0; $i < count($data['ranurado']); $i++) {
            if ($data['ranurado'][$i]['fecha'] != $fecha && $fecha != '') {
                $kilos[] = $kilo;
                $pzas[] = $pza;
                $botes[] = $bote;
                $fechas[] = $fecha;
                $total_kilos += $kilo;
                $sum_pzas += $pza;
                $total_pzas[] = $sum_pzas;

                $kilo = 0;
                $pza = 0;
                $bote = 0;

                $kilo += $data['ranurado'][$i]['kilos'];
                $pza += $data['ranurado'][$i]['pzas'];
                $bote += $data['ranurado'][$i]['botes'];


                $fecha = $data['ranurado'][$i]['fecha'];
            } else {

                $fecha = $data['ranurado'][$i]['fecha'];
                $kilo += $data['ranurado'][$i]['kilos'];
                $pza += $data['ranurado'][$i]['pzas'];
                $bote += $data['ranurado'][$i]['botes'];

                  if (($i + 1) == count($data['ranurado'])) {
                        $kilos[] = $kilo;
                        $pzas[] = $pza;
                        $botes[] = $bote;
                        $fechas[] = $fecha;
                        $total_kilos += $kilo;
                        $sum_pzas += $pza;
                        $total_pzas[] = $sum_pzas;
                }
            }
        }


        for ($i = 0; $i < count($fechas); $i++) {
            $fila = '<tr>' .
                        '<td class="txt-right">'.$botes[$i].'</td>'.
                        '<td>'.$fechas[$i].'</td>'.
                        '<td class="txt-right">'.$pzas[$i].'</td>'.
                        '<td class="txt-right">'.$total_pzas[$i].'</td>'.
                        '<td class="txt-right">'.$kilos[$i].'</td>'.
                    '</tr>';
            echo $fila;
        }
        ?>
    </tbody>
    <tfoot>
        <tr>
            <td colspan="4">Total:</td>
            <td><?php echo $total_kilos; ?></td>
        </tr>
        </tfood>
</table>
