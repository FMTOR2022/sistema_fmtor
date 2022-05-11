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
                    <button class="btn btn-icon-self btn_filtrar_open material-icons" data-modal="modal-filtrar">filter_alt</button>
                    <button class="btn btn-icon-self material-icons">print</button>    
                
                </div>


                <div class="tarjeta">
                    <div class="main">
                        <div class="row-con">
                            <div class="tabla">
                            <form id="form_reg_incidencias">
                                <div class="contenedor_filtros">
                                       <!--Registra Incidencias-->
                                       <h2>Registrar Incidencias</h2>
                                      
                                <table>
                                    <input type="checkbox" data-check="f_nombreApellidos" data-rango="true" class="checkbox" name="check_nombre_apellidos" id="check_nombre_apellidos">
                                    <label class="lbl-checkbox" id="lbl_check_nombre_Apellidos" for="check_nombre_apellidos">Filtrar por Nombre </label>
                                    <th>  
                                        <h4>Nombre </h4>
                                        <input class="input" type="text" name="nombre" id="nombre" >
                                    </th>
                                    <th>  <br> | </th>
                                    <th>
                                        <h4>Apellido Paterno</h4>
                                        <input class="input" type="text" name="apellidoP" id="apellidoP" >             
                                    </th>
                                    <th>  <br> | </th>
                                    <th>
                                        <h4>Apellido Materno</h4>
                                        <input class="input" type="text" name="apellidoM" id="apellidoM" >             
                                    </th>
                                </table>
                            </div>
                        </div>      
                    </div>
                </div>
                <br><br>
                                <table>
                                    <div class="filtro fecha">
                                        <th>
                                            <input type="checkbox" data-check="f_r_fecha" data-rango="true" class="checkbox" name="check_rango_fecha" id="check_rango_fecha">
                                            <label class="lbl-checkbox" id="lbl_check_rango_fecha" for="check_rango_fecha">Rango de fecha: </label>
                                            <div class="d-flex justify-between align-content-center">
                                                <input class="input" type="date" name="f_r_fecha_m" id="f_r_fecha_m">
                                                <p>-</p>
                                                <input class="input" type="date" name="f_r_fecha_M" id="f_r_fecha_M">
                                            </div>
                                        </th>
                                        <th>
                                            <input type="checkbox" data-check="f_fecha" class="checkbox" name="check_fecha" id="check_fecha">
                                            <label class="lbl-checkbox" id="lbl_check_fecha" for="check_fecha">Filtrar por fecha especifica:</label>
                                            <input class="input" type="date" name="f_fecha" id="f_fecha">
                                        </th>
                                    </div>
                                </table>
                    <br><br>
                <div class="tarjeta">
                    <div class="main">
                        <div class="row-con">
                            <div class="tabla">
                            <table>
                                <div class="filtro incapacidades">
                                    <th>
                                        <h4>Incapacidades</h4>
                                            <select name="incapacidad" id="incapacidad">
                                                <option value="0">Enfermedad General</option>
                                                <option value="1">Riesgo de trabajo</option>
                                                <option value="2">Finamiento</option>
                                            </select>
                                    </th>
                                    <th>
                                        <h4>Permisos</h4>
                                            <select name="permisos" id="permisos">
                                                <option value="0">Emergencia Familiar</option>
                                                <option value="1">Falta dia completo</option>
                                                <option value="2">Descanso por permiso</option>
                                            </select>
                                    </th>
                                    <th>
                                        <h4>Vacaciones</h4>
                                        <select name="vacaciones" id="vacasiones">
                                            <option value="0">Vacaciones</option>
                                        </select>
                                    </th>
                                </div>
                            </table>
                            <button  type="submit" data-btn="insertar" class="btn-registrar" id="btn-form-control-registrar">Registrar</button>
                            </form>
                        </div>

                               </div>
                            </div>      
                        </div>
                    </div>   
                       <!--Muestra tabla incapacidades-->

                   <br>   <br>   <br>
                <div class="tarjeta">
                    <div class="main">
                        <div class="row-con">
                            <div class="tabla">
                            <h2>Mostrar Incapacidades</h2>
                            <br><br>
                                <h4>Nombre</h4>
                                <input class="input" type="text" name="" id="" >
                                <table class="table table_incidencia lista_incidencias" id="listaincidencias">
                                    <thead>
                                    <th>Nombre</th>
                                    <th>Apellido Paterno</th>
                                    <th>Apellido Materno</th>
                                    <th>Tipo de Incidencia</th>
                                    <th>Dias</th>
                                    </thead>
                                    <tbody class="body body_incidencia"></tbody>
                                </table>
                        </div>
                    </div>
                </div>    
                    <!--fin Muestra-->    

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
   
    <script src="../../public/js/fmtor_libreria.js"></script>
    <script src="../../public/js/checador/incidencias.js"></script>
</body>
</html>