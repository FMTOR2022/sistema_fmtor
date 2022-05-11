<!DOCTYPE html>
<html lang="es">

<head>
    <?php require_once 'public/modules/head.php' ?>
    <title>Incidencias</title>
    <link rel="icon" type="image/x-icon" href="../../public/img/checador/LOGO2.png" />
</head>

<body>
    <div class="contenedor">
        <a href="#top" class="btn btn-icon btn-flotante" id="btn-subir">
            <i class="material-icons">expand_less</i> 
            Subir
        </a>
        <?php require_once 'public/modules/menus/checador.php'; ?>
        <div class="contenido hidde_menu" id="contenido">
            <?php require_once 'public/modules/header.php'; ?>
            <div class="informacion">
                <h1>Incidencias</h1>

                <div class="tarjeta-transparente d-flex justify-right">
                    <!-- boton de agregar -->
                    <button class="material-icons btn btn-icon-self" id="btn-form-control" data-modal="modal-ingresar">group_add</button> 
                    <!-- boton de buscar e imprimir -->
                    <button class="btn btn-icon-self btn_filtra_open material-icons" data-modal="modal-filtrar">filter_alt</button>
                    <button class="btn btn-icon-self material-icons" data-impresion="documento" id="incidencia">picture_as_pdf</button>    
                   <a href="http://localhost/sistema_fmtor/checador/main/excel_incidencias" class="btn btn-icon-self  material-icons">article</article> </a>
                   </div>
                       
                <!-- Tabla -->
                <div class="tabla tarjeta">
                    <table>
                        <thead class="cabecera">
                            <th>Id incidencia</th>
                            <th>Tipo de Incidencia</th>
                            <th>Inicio indicencia</th>
                            <th>Fin incidencia</th>
                            <th>Editar</th>
                            <th>Borrar</th>
                        </thead>
                        <tbody class="body body_incidencia"></tbody>
                    </table  class="tabla tarjeta">
                </div>

 <!-- Modal registro Incidencia-->
<div id="modal-ingresar" class="modal modal-izquierda">
    <div class="titulo_modal d-flex justify-between align-content-center">
        <h2>Crear Incidencia</h2>
        <button class="btn btn-icon-self btn-transparent material-icons" id="close_modal" data-modal="modal-ingresar">close</button>
    </div>
    <div class="contenido_modal"> 
        <form id="form_reg_incidencias">
            <p>Empleado:</p>
                <select name="id_empleado" id="id_empleado"> </select>
            <p>Incapacidad:</p>
                <select name="tipo_incidencia" id="tipo_incidencia">
                    <option value="Enfermedad General">Enfermedad General</option>
                    <option value="Riesgo de trabajo">Riesgo de trabajo</option>
                    <option value="Emergencia Familiar">Emergencia Familiar</option>
                    <option value="Falta dia completo">Falta dia completo</option>
                    <option value="Descanso por permiso">Descanso por permiso</option>
                    <option value="Vacaciones">Vacaciones</option>
                    <option value="Finamiento">Finamiento</option>
                </select>
            <p>Inicio Incapacidad:</p>
            <input class="input" type="date" name="inicio_in" id="inicio_in" placeholder="Ingrese fecha inicio Incidencia">
            <p>Fin Incapacidad:</p>
            <input class="input" type="date" name="fin_in" id="fin_in" placeholder="Ingrese fecha fin Incidencia">
            
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
       
    <?php require_once 'public/modules/checador/incidencias_modal.php'; ?>
  
    <script src="../../public/js/fmtor_libreria.js"></script>
    <script src="../../public/js/checador/filtroIncidencias.js"></script>
    <script src="../../public/js/checador/incidencias.js"></script>
</body>
</html>