<?php 
    for ($i=0; $i < count($data); $i++) { 
        echo '<tr>'.
                '<td>'.$data[$i]['Id_Folio'].'</td>'.
                '<td>'.$data[$i]['Clientes'].'</td>'.
                '<td class="txt-right">'.$data[$i]['kilos'].'</td>'.
                '<td class="txt-right">'.$data[$i]['pzas'].'</td>'.
                '<td>'.$data[$i]['Maquina'].'</td>'.
                '<td>'.$data[$i]['descripcion'].'</td>'.
                '<td>'.$data[$i]['observaciones'].'</td>'.
            '</tr>';
    }
?>