<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Principal</title>
    <link rel="stylesheet" href="../../public/css/default.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>
    <div class="contenedor">
        <a href="#top" class="btn btn-icon btn-flotante" id="btn-subir">
            <i class="material-icons">expand_less</i> 
            Subir
        </a>
        <?php require_once 'public/modules/menus/calidad.php'; ?>
        <div class="contenido hidde_menu" id="contenido">
            <?php require_once 'public/modules/header.php'; ?>
            <div class="informacion">
                <h1>Catálogos</h1>
                <div class="tarjeta">
    <table class =" table table-light ">
        <thead class ="thead-dark">

        <a href="registro_catalogo." class= "btn_icon btn">Registrar Nuevo</a><p>
        <form action="buscar_nuevo.php" method="get" class="form_search"> 

	<input type="text" name="busqueda" id="busqueda" placeholder="Buscar">
	<input type="submit" value="Buscar" class="btn btn-icon btn_search"><p>

</form>
            <tr>
                <th>ID_Catalogo </th>
                <th>Descripcion</th>
                <th>Medida </th>
                <th>Acabados</th>
                <th>PDF</th>
               
             </tr>
             
         </thead>
        </table>
        </div>
</div>
        </div>
    </div>

    <script src="../../public/js/fmtor_libreria.js"></script>
</body>
</html>