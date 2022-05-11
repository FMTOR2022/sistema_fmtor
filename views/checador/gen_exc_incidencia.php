<?php 
    include "config/conexion";
    $t_incidencias = "SELECT *FROM v_incidencias";
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
        $resultado = mysqli_query($conexion,$t_incidencias);
        while($row=mysqli_fetch_assoc($resultado)){ ?>
            <tr>
                <td><?php echo $row["nombre"]; ?></td>
                <td><?php echo $row["apellidoP"]; ?></td>
                <td><?php echo $row["apellidoM"]; ?></td>
                <td><?php echo $row["tipo_incidencia"]; ?></td>
                <td><?php echo $row["inicio_in"]; ?></td>
                <td><?php echo $row["fin_in"]; ?></td>
            </tr>
    <?php   } mysqli_free_result($resultado);?>
</table>