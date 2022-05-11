<?php
    header("Content-Type: application/vns.ms-excel; charset=iso-8859-1");
    header("Content-Disposition: attachment; filename=datos-incidencias.xls");
?>
<table>
<caption>Registro Incidencias</caption>
    <tr>
        <th>Nombre</th>
        <th>Apellido Paterno</th>
        <th>Apellido Materno</th>
        <th>Tipo de Incidencia</th>
        <th>Inicio indicencia</th>
        <th>Fin incidencia</th>
    </tr>
    <?php
        for ($i=0; $i < count($data); $i++) { 
            echo '<tr>'.
                    '<td>'.$data[$i]["nombre"].'</td>'.
                    '<td>'.$data[$i]["apellidoP"].'</td>'.
                    '<td>'.$data[$i]["apellidoM"].'</td>'.
                    '<td>'.$data[$i]["tipo_incidencia"].'</td>'.
                    '<td>'.$data[$i]["inicio_in"].'</td>'.
                    '<td>'.$data[$i]["fin_in"].'</td>'.
                '</tr>';
        }
    ?>
</table>