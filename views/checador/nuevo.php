<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once 'public/modules/head.php' ?>
    <title>Página Principal</title>
</head>

<body>
    <div class="contenedor">
        <a href="#top" class="btn btn-icon btn-flotante btn-icon-self material-icons" id="btn-subir">expand_less
        </a>
        <?php require_once 'public/modules/menus/checador.php'; ?>
        <div class="contenido hidde_menu" id="contenido">
            <?php require_once 'public/modules/header.php'; ?>
            <div class="informacion">
                <h1>Lista de Clientes </h1>


                <!-- boton de buscar e imprimir -->
                <div class="options d-flex align-content-center">
                    <input type="number" name="Id_Clientes" id="Id_Clientes" data-control="" placeholder="Numero de cliente">
                  
                <!-- boton de agregar -->
                <button class="material-icons btn btn-icon-self" id="btn-form-control" data-modal="modal-ingresar">group_add</button>


                </div>
               <!-- Tabla -->
               <div class="tabla tarjeta">
                    <table>
                        <thead>
                            <th>Id incidencia</th>
                            <th>Usuario</th>
                            <th>Tipo de Incidencia</th>
                            <th>Inicio indicencia</th>
                            <th>Fin incidencia</th>
                        </thead>
                        <tbody class="body body_incidencia"></tbody>
                    </table>
                </div>


            </div>
        </div>
    </div>

    <?php require_once 'public/modules/checador/incidencias_modal.php'; ?>

    <script src="../../public/js/fmtor_libreria.js?1.2"></script>
    <script src="../../public/js/checador/nuevo.js"></script>
</body>

</html>