<?php
    for ($i=0; $i < count($data); $i++) { 
        echo '<tr>'.
                '<td>'.$data[$i]['Descripcion'].'</td>'.
                '<td>'.$data[$i]['Medida'].'</td>'.
                '<td>'.$data[$i]['Acabado'].'</td>'.
                '<td>'.$data[$i]['Cantidad_millares'].'</td>'.
                '<td>'.$data[$i]['Precio_millar'].'</td>'.
                '<td>'.$data[$i]['Total'].'</td>'. 
              
            '</tr>';
    }
?>