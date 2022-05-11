<?php

$maquinas = [1, 2, 3, 4, 5, 6, 7, 8, 9];
$maquina_1 = [];
$maquina_2 = [];
$maquina_3 = [];
$maquina_4 = [];
$maquina_5 = [];
$maquina_6 = [];
$maquina_7 = [];
$maquina_8 = [];
$maquina_9 = [];
$total_kilos = 0;
$total_acumulado = 0;

for ($j = 0; $j < count($data); $j++) {
    if ($data[$j]['no_maquina'] == 1) {
        $maquina_1[] = $data[$j];
    } else if ($data[$j]['no_maquina'] == 2) {
        $maquina_2[] = $data[$j];
    } else if ($data[$j]['no_maquina'] == 3) {
        $maquina_3[] = $data[$j];
    } else if ($data[$j]['no_maquina'] == 4) {
        $maquina_4[] = $data[$j];
    } else if ($data[$j]['no_maquina'] == 5) {
        $maquina_5[] = $data[$j];
    } else if ($data[$j]['no_maquina'] == 6) {
        $maquina_6[] = $data[$j];
    } else if ($data[$j]['no_maquina'] == 7) {
        $maquina_7[] = $data[$j];
    } else if ($data[$j]['no_maquina'] == 8) {
        $maquina_8[] = $data[$j];
    } else if ($data[$j]['no_maquina'] == 9) {
        $maquina_9[] = $data[$j];
    }
}
?>
<tr>
    <td colspan="15" class="txt-center" style="background: #DEA166;">
        Máquina 1
    </td>
</tr>
<?php
for ($i = 0; $i < count($maquina_1); $i++) {
    $total_kilos += ($maquina_1[$i]['factor'] * $maquina_1[$i]['cantidad_elaborar']);
    $total_acumulado += $maquina_1[$i]['TOTAL'];
    echo '<tr class="' . $maquina_1[$i]['producto_desc'] . '">';
    echo '<td style="border: none;">' . $maquina_1[$i]['Calibre'] . '</td>';
    echo '<td style="border: none;" class="txt-right">' . number_format($maquina_1[$i]['factor'] * $maquina_1[$i]['cantidad_elaborar']) . '</td>';
    echo '<td style="border: none;">' . $maquina_1[$i]['factor'] . '</td>';
    echo '<td style="border: none;">' . $maquina_1[$i]['Id_Produccion'] . '</td>';
    echo '<td style="border: none;">' . $maquina_1[$i]['Fecha'] . '</td>';
    echo '<td style="border: none;">' . $maquina_1[$i]['Fecha_entrega'] . '</td>';
    echo '<td style="border: none;">' . $maquina_1[$i]['Clientes'] . '</td>';
    echo '<td style="border: none;">' . $maquina_1[$i]['medida'] . ' ' . $maquina_1[$i]['descripcion'] . '</td>';
    echo '<td style="border: none;">' . $maquina_1[$i]['acabados'] . '</td>';
    echo '<td style="border: none;">' . $maquina_1[$i]['cantidad_elaborar'] . '</td>';
    echo '<td style="border: none;" class="txt-right">$ ' . $maquina_1[$i]['precio_millar'] . '</td>';
    echo '<td style="border: none;">' . $maquina_1[$i]['Herramental'] . '</td>';
    // echo '<td style="border: none;">'.$maquina_1[$i]['tratamiento'].'</td>';
    // echo '<td class="txt-right">$ '.$maquina_1[$i]['TOTAL'].'</td>';
    echo '</tr>';
}
?>
<tr>
    <td colspan="15" style="border: none;"></td>
</tr>
<td colspan="15" class="txt-center" style="background: #DEA166;">
    Máquina 2
</td>
<?php
for ($i = 0; $i < count($maquina_2); $i++) {
    $total_kilos += ($maquina_2[$i]['factor'] * $maquina_2[$i]['cantidad_elaborar']);
    $total_acumulado += $maquina_2[$i]['TOTAL'];
    echo '<tr class="' . $maquina_2[$i]['producto_desc'] . '">';
    echo '<td style="border: none;">' . $maquina_2[$i]['Calibre'] . '</td>';
    echo '<td style="border: none;" class="txt-right">' . number_format($maquina_2[$i]['factor'] * $maquina_2[$i]['cantidad_elaborar']) . '</td>';
    echo '<td style="border: none;">' . $maquina_2[$i]['factor'] . '</td>';
    echo '<td style="border: none;">' . $maquina_2[$i]['Id_Produccion'] . '</td>';
    echo '<td style="border: none;">' . $maquina_2[$i]['Fecha'] . '</td>';
    echo '<td style="border: none;">' . $maquina_2[$i]['Fecha_entrega'] . '</td>';
    echo '<td style="border: none;">' . $maquina_2[$i]['Clientes'] . '</td>';
    echo '<td style="border: none;">' . $maquina_2[$i]['medida'] . ' ' . $maquina_2[$i]['descripcion'] . '</td>';
    echo '<td style="border: none;">' . $maquina_2[$i]['acabados'] . '</td>';
    echo '<td style="border: none;">' . $maquina_2[$i]['cantidad_elaborar'] . '</td>';
    echo '<td style="border: none;" class="txt-right">$ ' . $maquina_2[$i]['precio_millar'] . '</td>';
    echo '<td style="border: none;">' . $maquina_2[$i]['Herramental'] . '</td>';
    // echo '<td style="border: none;">'.$maquina_1[$i]['tratamiento'].'</td>';
    // echo '<td class="txt-right">$ '.$maquina_1[$i]['TOTAL'].'</td>';
    echo '</tr>';
}
?>
<tr>
    <td colspan="15" style="border: none;"></td>
</tr>
<tr>
    <td colspan="15" class="txt-center" style="background: #DEA166;">
        Máquina 3
    </td>
</tr>
<?php
for ($i = 0; $i < count($maquina_3); $i++) {
    $total_kilos += ($maquina_3[$i]['factor'] * $maquina_3[$i]['cantidad_elaborar']);
    $total_acumulado += $maquina_3[$i]['TOTAL'];
    echo '<tr class="' . $maquina_3[$i]['producto_desc'] . '">';
    echo '<td style="border: none;">' . $maquina_3[$i]['Calibre'] . '</td>';
    echo '<td style="border: none;" class="txt-right">' . number_format($maquina_3[$i]['factor'] * $maquina_3[$i]['cantidad_elaborar']) . '</td>';
    echo '<td style="border: none;">' . $maquina_3[$i]['factor'] . '</td>';
    echo '<td style="border: none;">' . $maquina_3[$i]['Id_Produccion'] . '</td>';
    echo '<td style="border: none;">' . $maquina_3[$i]['Fecha'] . '</td>';
    echo '<td style="border: none;">' . $maquina_3[$i]['Fecha_entrega'] . '</td>';
    echo '<td style="border: none;">' . $maquina_3[$i]['Clientes'] . '</td>';
    echo '<td style="border: none;">' . $maquina_3[$i]['medida'] . ' ' . $maquina_3[$i]['descripcion'] . '</td>';
    echo '<td style="border: none;">' . $maquina_3[$i]['acabados'] . '</td>';
    echo '<td style="border: none;">' . $maquina_3[$i]['cantidad_elaborar'] . '</td>';
    echo '<td style="border: none;" class="txt-right">$ ' . $maquina_3[$i]['precio_millar'] . '</td>';
    echo '<td style="border: none;">' . $maquina_3[$i]['Herramental'] . '</td>';
    // echo '<td style="border: none;">'.$maquina_1[$i]['tratamiento'].'</td>';
    // echo '<td class="txt-right">$ '.$maquina_1[$i]['TOTAL'].'</td>';
    echo '</tr>';
}
?>
<tr>
    <td colspan="15" style="border: none;"></td>
</tr>
<tr>
    <td colspan="15" class="txt-center" style="background: #DEA166;">
        Máquina 4
    </td>
</tr>
<?php
for ($i = 0; $i < count($maquina_4); $i++) {
    $total_kilos += ($maquina_4[$i]['factor'] * $maquina_4[$i]['cantidad_elaborar']);
    $total_acumulado += $maquina_4[$i]['TOTAL'];
    echo '<tr class="' . $maquina_4[$i]['producto_desc'] . '">';
    echo '<td style="border: none;">' . $maquina_4[$i]['Calibre'] . '</td>';
    echo '<td style="border: none;" class="txt-right">' . number_format($maquina_4[$i]['factor'] * $maquina_4[$i]['cantidad_elaborar']) . '</td>';
    echo '<td style="border: none;">' . $maquina_4[$i]['factor'] . '</td>';
    echo '<td style="border: none;">' . $maquina_4[$i]['Id_Produccion'] . '</td>';
    echo '<td style="border: none;">' . $maquina_4[$i]['Fecha'] . '</td>';
    echo '<td style="border: none;">' . $maquina_4[$i]['Fecha_entrega'] . '</td>';
    echo '<td style="border: none;">' . $maquina_4[$i]['Clientes'] . '</td>';
    echo '<td style="border: none;">' . $maquina_4[$i]['medida'] . ' ' . $maquina_4[$i]['descripcion'] . '</td>';
    echo '<td style="border: none;">' . $maquina_4[$i]['acabados'] . '</td>';
    echo '<td style="border: none;">' . $maquina_4[$i]['cantidad_elaborar'] . '</td>';
    echo '<td style="border: none;" class="txt-right">$ ' . $maquina_4[$i]['precio_millar'] . '</td>';
    echo '<td style="border: none;">' . $maquina_4[$i]['Herramental'] . '</td>';
    // echo '<td style="border: none;">'.$maquina_1[$i]['tratamiento'].'</td>';
    // echo '<td class="txt-right">$ '.$maquina_1[$i]['TOTAL'].'</td>';
    echo '</tr>';
}
?>
<tr>
    <td colspan="15" style="border: none;"></td>
</tr>
<tr>
    <td colspan="15" class="txt-center" style="background: #DEA166;">
        Máquina 5
    </td>
</tr>
<?php
for ($i = 0; $i < count($maquina_5); $i++) {
    $total_kilos += ($maquina_5[$i]['factor'] * $maquina_5[$i]['cantidad_elaborar']);
    $total_acumulado += $maquina_5[$i]['TOTAL'];
    echo '<tr class="' . $maquina_5[$i]['producto_desc'] . '">';
    echo '<td style="border: none;">' . $maquina_5[$i]['Calibre'] . '</td>';
    echo '<td style="border: none;" class="txt-right">' . number_format($maquina_5[$i]['factor'] * $maquina_5[$i]['cantidad_elaborar']) . '</td>';
    echo '<td style="border: none;">' . $maquina_5[$i]['factor'] . '</td>';
    echo '<td style="border: none;">' . $maquina_5[$i]['Id_Produccion'] . '</td>';
    echo '<td style="border: none;">' . $maquina_5[$i]['Fecha'] . '</td>';
    echo '<td style="border: none;">' . $maquina_5[$i]['Fecha_entrega'] . '</td>';
    echo '<td style="border: none;">' . $maquina_5[$i]['Clientes'] . '</td>';
    echo '<td style="border: none;">' . $maquina_5[$i]['medida'] . ' ' . $maquina_5[$i]['descripcion'] . '</td>';
    echo '<td style="border: none;">' . $maquina_5[$i]['acabados'] . '</td>';
    echo '<td style="border: none;">' . $maquina_5[$i]['cantidad_elaborar'] . '</td>';
    echo '<td style="border: none;" class="txt-right">$ ' . $maquina_5[$i]['precio_millar'] . '</td>';
    echo '<td style="border: none;">' . $maquina_5[$i]['Herramental'] . '</td>';
    // echo '<td style="border: none;">'.$maquina_1[$i]['tratamiento'].'</td>';
    // echo '<td class="txt-right">$ '.$maquina_1[$i]['TOTAL'].'</td>';
    echo '</tr>';
}
?>
<tr>
    <td colspan="15" style="border: none;"></td>
</tr>
<tr>
    <td colspan="15" class="txt-center" style="background: #DEA166;">
        Máquina 6
    </td>
</tr>
<?php
for ($i = 0; $i < count($maquina_6); $i++) {
    $total_kilos += ($maquina_6[$i]['factor'] * $maquina_6[$i]['cantidad_elaborar']);
    $total_acumulado += $maquina_6[$i]['TOTAL'];
    echo '<tr class="' . $maquina_6[$i]['producto_desc'] . '">';
    echo '<td style="border: none;">' . $maquina_6[$i]['Calibre'] . '</td>';
    echo '<td style="border: none;" class="txt-right">' . number_format($maquina_6[$i]['factor'] * $maquina_6[$i]['cantidad_elaborar']) . '</td>';
    echo '<td style="border: none;">' . $maquina_6[$i]['factor'] . '</td>';
    echo '<td style="border: none;">' . $maquina_6[$i]['Id_Produccion'] . '</td>';
    echo '<td style="border: none;">' . $maquina_6[$i]['Fecha'] . '</td>';
    echo '<td style="border: none;">' . $maquina_6[$i]['Fecha_entrega'] . '</td>';
    echo '<td style="border: none;">' . $maquina_6[$i]['Clientes'] . '</td>';
    echo '<td style="border: none;">' . $maquina_6[$i]['medida'] . ' ' . $maquina_6[$i]['descripcion'] . '</td>';
    echo '<td style="border: none;">' . $maquina_6[$i]['acabados'] . '</td>';
    echo '<td style="border: none;">' . $maquina_6[$i]['cantidad_elaborar'] . '</td>';
    echo '<td style="border: none;" class="txt-right">$ ' . $maquina_6[$i]['precio_millar'] . '</td>';
    echo '<td style="border: none;">' . $maquina_6[$i]['Herramental'] . '</td>';
    // echo '<td style="border: none;">'.$maquina_1[$i]['tratamiento'].'</td>';
    // echo '<td class="txt-right">$ '.$maquina_1[$i]['TOTAL'].'</td>';
    echo '</tr>';
}
?>
<tr>
    <td colspan="15" style="border: none;"></td>
</tr>
<tr>
    <td colspan="15" class="txt-center" style="background: #DEA166;">
        Máquina 7
    </td>
</tr>
<?php
for ($i = 0; $i < count($maquina_7); $i++) {
    $total_kilos += ($maquina_7[$i]['factor'] * $maquina_7[$i]['cantidad_elaborar']);
    $total_acumulado += $maquina_7[$i]['TOTAL'];
    echo '<tr class="' . $maquina_7[$i]['producto_desc'] . '">';
    echo '<td style="border: none;">' . $maquina_7[$i]['Calibre'] . '</td>';
    echo '<td style="border: none;" class="txt-right">' . number_format($maquina_7[$i]['factor'] * $maquina_7[$i]['cantidad_elaborar']) . '</td>';
    echo '<td style="border: none;">' . $maquina_7[$i]['factor'] . '</td>';
    echo '<td style="border: none;">' . $maquina_7[$i]['Id_Produccion'] . '</td>';
    echo '<td style="border: none;">' . $maquina_7[$i]['Fecha'] . '</td>';
    echo '<td style="border: none;">' . $maquina_7[$i]['Fecha_entrega'] . '</td>';
    echo '<td style="border: none;">' . $maquina_7[$i]['Clientes'] . '</td>';
    echo '<td style="border: none;">' . $maquina_7[$i]['medida'] . ' ' . $maquina_7[$i]['descripcion'] . '</td>';
    echo '<td style="border: none;">' . $maquina_7[$i]['acabados'] . '</td>';
    echo '<td style="border: none;">' . $maquina_7[$i]['cantidad_elaborar'] . '</td>';
    echo '<td style="border: none;" class="txt-right">$ ' . $maquina_7[$i]['precio_millar'] . '</td>';
    echo '<td style="border: none;">' . $maquina_7[$i]['Herramental'] . '</td>';
    // echo '<td style="border: none;">'.$maquina_1[$i]['tratamiento'].'</td>';
    // echo '<td class="txt-right">$ '.$maquina_1[$i]['TOTAL'].'</td>';
    echo '</tr>';
}
?>
<tr>
    <td colspan="15" style="border: none;"></td>
</tr>
<tr>
    <td colspan="15" class="txt-center" style="background: #DEA166;">
        Máquina 8
    </td>
</tr>
<?php
for ($i = 0; $i < count($maquina_8); $i++) {
    $total_kilos += ($maquina_8[$i]['factor'] * $maquina_8[$i]['cantidad_elaborar']);
    $total_acumulado += $maquina_8[$i]['TOTAL'];
    echo '<tr class="' . $maquina_8[$i]['producto_desc'] . '">';
    echo '<td style="border: none;">' . $maquina_8[$i]['Calibre'] . '</td>';
    echo '<td style="border: none;" class="txt-right">' . number_format($maquina_8[$i]['factor'] * $maquina_8[$i]['cantidad_elaborar']) . '</td>';
    echo '<td style="border: none;">' . $maquina_8[$i]['factor'] . '</td>';
    echo '<td style="border: none;">' . $maquina_8[$i]['Id_Produccion'] . '</td>';
    echo '<td style="border: none;">' . $maquina_8[$i]['Fecha'] . '</td>';
    echo '<td style="border: none;">' . $maquina_8[$i]['Fecha_entrega'] . '</td>';
    echo '<td style="border: none;">' . $maquina_8[$i]['Clientes'] . '</td>';
    echo '<td style="border: none;">' . $maquina_8[$i]['medida'] . ' ' . $maquina_8[$i]['descripcion'] . '</td>';
    echo '<td style="border: none;">' . $maquina_8[$i]['acabados'] . '</td>';
    echo '<td style="border: none;">' . $maquina_8[$i]['cantidad_elaborar'] . '</td>';
    echo '<td style="border: none;" class="txt-right">$ ' . $maquina_8[$i]['precio_millar'] . '</td>';
    echo '<td style="border: none;">' . $maquina_8[$i]['Herramental'] . '</td>';
    // echo '<td style="border: none;">'.$maquina_1[$i]['tratamiento'].'</td>';
    // echo '<td class="txt-right">$ '.$maquina_1[$i]['TOTAL'].'</td>';
    echo '</tr>';
}
?>maquina_8
<tr>
    <td colspan="15" style="border: none;"></td>
</tr>
<tr>
    <td colspan="15" class="txt-center" style="background: #DEA166;">
        Máquina 9
    </td>
</tr>
<?php
    for ($i = 0; $i < count($maquina_9); $i++) {
        $total_kilos += ($maquina_9[$i]['factor'] * $maquina_9[$i]['cantidad_elaborar']);
        $total_acumulado += $maquina_9[$i]['TOTAL'];
        echo '<tr class="' . $maquina_9[$i]['producto_desc'] . '">';
        echo '<td style="border: none;">' . $maquina_9[$i]['Calibre'] . '</td>';
        echo '<td style="border: none;" class="txt-right">' . number_format($maquina_9[$i]['factor'] * $maquina_9[$i]['cantidad_elaborar']) . '</td>';
        echo '<td style="border: none;">' . $maquina_9[$i]['factor'] . '</td>';
        echo '<td style="border: none;">' . $maquina_9[$i]['Id_Produccion'] . '</td>';
        echo '<td style="border: none;">' . $maquina_9[$i]['Fecha'] . '</td>';
        echo '<td style="border: none;">' . $maquina_9[$i]['Fecha_entrega'] . '</td>';
        echo '<td style="border: none;">' . $maquina_9[$i]['Clientes'] . '</td>';
        echo '<td style="border: none;">' . $maquina_9[$i]['medida'] . ' ' . $maquina_9[$i]['descripcion'] . '</td>';
        echo '<td style="border: none;">' . $maquina_9[$i]['acabados'] . '</td>';
        echo '<td style="border: none;">' . $maquina_9[$i]['cantidad_elaborar'] . '</td>';
        echo '<td style="border: none;" class="txt-right">$ ' . $maquina_9[$i]['precio_millar'] . '</td>';
        echo '<td style="border: none;">' . $maquina_9[$i]['Herramental'] . '</td>';
        // echo '<td style="border: none;">'.$maquina_1[$i]['tratamiento'].'</td>';
        // echo '<td class="txt-right">$ '.$maquina_1[$i]['TOTAL'].'</td>';
        echo '</tr>';
    }

// echo '<tr>'.
    // '<td colspan="15"></td>'.
    // '</tr>';

// echo '<tr>';
    // echo '<td>Kilos acumulados:</td>';
    // echo '<td>'.$total_kilos.'</td>';
    // echo '<td></td>';
    // echo '<td></td>';
    // echo '<td></td>';
    // echo '<td></td>';
    // echo '<td></td>';
    // echo '<td></td>';
    // echo '<td></td>';
    // echo '<td></td>';
    // echo '<td></td>';
    // echo '<td></td>';
    // echo '<td class="txt-right" colspan="2">Total acumulado:</td>';
    // echo '<td>$ '.$total_acumulado.'</td>';
    // echo '</tr>';
?>