<?php
$Id_Folio= " ";
$Codigo = " "; 
$Tratamiento = " ";
$Descripcion  = " ";
$Medida = " ";
$Bote = " ";
$Acabado = " ";
$Dibujo  = " ";
$Id_Clientes_2 = " ";
$Salida = " "; 
$Fecha  = " ";
$Cantidad_millares= " ";


    for ($i=0; $i < count($data); $i++) { 
         
        $Id_Folio = $data[$i]['Id_Folio'];
        $Codigo = $data[$i]['codigo'];
        $Tratamiento    = $data[$i]['tratamiento'];
        $Descripcion    = $data[$i]['descripcion'];
        $Medida         = $data[$i]['medida'];
        $Acabado = $data[$i]['acabados'];
        $Dibujo         = $data[$i]['Id_Catalogo'];
        $Id_Clientes_2  = $data[$i]['Clientes'].' '.explode(' ', $data[$i]['razon_social'])[0];
        $Salida         = $data[$i]['Id_Salida_FK'];  
        $Fecha          = explode('-',$data[$i]['Fecha']);
        $Cantidad_millares = $data[$i]['cantidad_elaborar'];
    }
?>