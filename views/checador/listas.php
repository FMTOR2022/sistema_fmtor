<!DOCTYPE html>
<html lang="es">
<head>
    <?php require_once 'public/modules/head.php' ?> 
    <title>Listas</title>
    <link rel="icon" type="image/x-icon" href="../../public/img/checador/LOGO2.png" />
</head>

<body>
    <div class="contenedor">
    <a href="#top" class="btn btn-icon-self btn-flotante material-icons" id="btn-subir">expand_less
        </a>
        <?php require_once 'public/modules/menus/checador.php'; ?>
        <div class="contenido hidde_menu" id="contenido">
            <?php require_once 'public/modules/header.php'; ?>
            <div class="informacion">
                <h1>Listas</h1>
                <div class="tarjeta-transparente d-flex justify-right align-content-center">
                    <input type="date" name="rango_minimo" id="rango_minimo">
                    <input type="date" name="rango_maximo" id="rango_maximo">
                     <!-- boton de agregar -->
                    <button class="material-icons btn btn-icon-self" id="btn-form-control" data-modal="modal-ingresar">group_add</button>
                    <button class="btn btn-icon-self btn_filtra_open material-icons" data-modal="modal-filtrar">filter_alt</button>
                    <button class="btn btn-icon-self btn_gen_exc material-icons" id="btn-gen-excel" data-modal="modal-excel">picture_as_pdf</button>
                    <a href="http://localhost/sistema_fmtor/checador/main/excel_incide" class="btn btn-icon-self  material-icons">article</article> </a>
                </div>
                <div class="tabla tarjeta">
                    <table> 
                        <thead class="cabecera">
                            <th>Usuario</th>
                            <th>Horario Entrada</th>
                            <th>Horario Almuerzo Salida</th>
                            <th>Horario Almuerzo Termino</th>
                            <th>Horario Salida</th>
                            <th>Editar</th>
                            <th>Eliminar</th>
                        </thead>
                        <tbody class="body"></tbody>             
                    </table class="tabla tarjeta">
                </div>

<!-- Modal registro Incidencia-->
<div id="modal-ingresar" class="modal modal-izquierda">
    <div class="titulo_modal d-flex justify-between align-content-center">
        <h2>Agregar Horario</h2>
        <button class="btn btn-icon-self btn-transparent material-icons" id="close_modal" data-modal="modal-ingresar">close</button>
    </div>
    <div class="contenido_modal">
        <form id="form_reg_horario">
           <p>Usuario:</p>
                <select name="usuario" id="usuario"> </select> 
            <p>Entrada:</p>
            <input class="input" type="time" name="entrada" id="entrada">
            <p>Almuerzo Salida:</p>
            <input class="input" type="time" name="almuerzoS" id="almuerzoS">
            <p>Almuerzo Regreso:</p>
            <input class="input " type="time" name="almuerzoR" id="almuerzoR">
            <p>Salida:</p>
            <input class="input " type="time" name="salida" id="salida">
            
            <div class="opciones d-flex flex-column">
                <button data-btn="insertar" class="btn" id="btn-form-control-registrar">Registrar</button>
                <label class="btn btn-transparent txt-center" id="btn-form-control-cancel" data-modal="modal-ingresar">Cancelar</label>
            </div>
        </form>
    </div>
</div>


            </div>
        </div>
    </div>
    <?php require_once 'public/modules/checador/listas_modal.php'; 
          require_once 'public/modules/checador/horario_modal.php'; ?>
    
    <script src="../../public/js/fmtor_libreria.js"></script>
    <script src="../../public/js/checador/filtro.js"></script>
    <script src="../../public/js/checador/listas.js"></script>
    <script src="../../public/js/checador/horario.js"></script>
</body>
</html>