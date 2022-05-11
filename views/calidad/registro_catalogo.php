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
            <div class="tarjeta">
                <body>

<section id="container"> 

<div class="form_register"></div>
 <h1> Registro Catalogo</h1>
 <hr>
 <div class="alert">
     <?php echo isset ($alert)? $alert : ''; ?>
 </div>

 <form action="" method="post">

<label for="Catalogo"> ID_Catalogo </label>
<input type= "number" name="Catalogo" id="Catalogo  " placeholder="ID_Catalogo">

<label for="Descripcion"> Descripcion </label>
<input type= "text" name="Descripcion" id="Catalogo  " placeholder="Descripcion">

<label for="Medida"> Medida </label>
<input type= "text" name="Medida" id="Catalogo  " placeholder="Medida">

<label for="Acabados"> Acabados </label>
<input type= "text" name="Acabados" id="Catalogo  " placeholder="Acabados">

<label for="PDF"> PDF </label>
<input type= "file" name="PDF" id="Catalogo  " placeholder="PDF">
<input type="hidden" name="MAX_FILE_SIZE" value="4194304" />

<input type="submit" value="Guardar " class="btn btn-icon btn_save">
</form>
</div>
</section>
</div>
</div>
        </div>
    </div>

    <script src="../../public/js/fmtor_libreria.js"></script>
</body>
</html>