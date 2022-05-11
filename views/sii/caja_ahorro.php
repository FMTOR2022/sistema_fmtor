<!DOCTYPE html>
<html lang="es">
<head> 
    <?php require_once 'public/modules/head.php' ?>
    <title>Caja de Ahorro</title>
</head>
<body>
    <div class="contenedor">
        <a href="#top" class="btn btn-icon-self btn-flotante material-icons" id="btn-subir">expand_less
        </a>
        <?php require_once 'public/modules/menus/sii.php'; ?>
        <div class="contenido hidde_menu" id="contenido">
            <?php require_once 'public/modules/header.php'; ?>
            <div class="informacion">
                <div class="tarjeta-transparente d-flex justify-between align-content-center " >
                    <h1>Caja de Ahorro</h1>
                    <a href="http://localhost/sistema_fmtor/public/pdf/REGLAMENTO_FMT.pdf" class="btn btn-icon-self material-icons" target="blank">
                        print 
                    </a>
                    <button class="btn btn-icon-self material-icons" data-modal="modal-filtrar">filter_alt</button>
                </div>
                <div id="modal-filtrar" class="modal modal-derecha">
                    <div class="titulo_modal d-flex justify-between align-content-center">
                        <h2>Filtros</h2>
                        <button class="btn btn-icon-self btn-transparent material-icons" id="close_modal" data-modal="modal-filtrar">close</button>
                    </div>
                    <div class="contenido_modal">
                        <form id="form-formatos">
                            <div class="contenedor_filtros">
                                <div class="periodo d-flex justify-left flex-wrap">
                                    <h3>Filtrar por periodo</h3>
                                    <div class="flex-column">
                                        <label for="fecha_inicio">Fecha inicio:</label>
                                        <input type="date" name="fecha_inicio" id="fecha_inicio">
                                    </div>
                                    <div class="flex-column">
                                        <label for="fecha_termino">Fecha termino:</label>
                                        <input type="date" name="fecha_termino" id="fecha_termino">
                                    </div>
                            </div>
                    </div>
                        </form>
                        <form id="form-filtros">
                            <div class="contenedor_filtros">
                                <input type="text" name="tabla" id="tabla" value="v_ordenes" hidden>                               
                                <h3>Filtrar por empleado:</h3>
                            <div class="filtro fecha">
                                    <input type="checkbox" data-check="f_empleado" class="checkbox" name="check_empleado" id="check_empleado">
                                    <label class="lbl-checkbox" id="lbl_check_empleado" for="check_empleado">Buscar empleado:</label>
                                    <input class="input" type="text" name="f_cliente" id="f_empleado" disabled>

                                    <h3>Filtrar por status</h3>
                                <div>
                                    <input type="checkbox" data-check="activo" class="checkbox" name="check_activo" id="check_activo">
                                    <label class="lbl-checkbox" id="lbl_check_activo" for="check_activo">Activo</label> 
                                    
                                    <input type="checkbox" data-check="inactivo" class="checkbox" name="check_inactivo" id="check_inactivo">
                                    <label class="lbl-checkbox" id="lbl_check_inactivo" for="check_inactivo">Inactivo</label>           
                                    
                                    <input type="checkbox" data-check="ambos" class="checkbox" name="check_ambos" id="check_ambos">
                                    <label class="lbl-checkbox" id="lbl_check_ambos" for="check_ambos">Ambos</label>                                  
                                </div>

                                <h3>Filtrar por puesto:</h3>
                                    <input type="checkbox" data-check="area" class="checkbox" name="check_area" id="check_area">
                                    <label class="lbl-checkbox" id="lbl_check_area" for="check_area">Buscar puesto:</label>
                                    <input class="input" type="text" name="area" id="area" disabled>
                            </div>
                                <div class="d-flex flex-column">
                                    <button class="btn">Buscar</button>
                                    <label class="btn btn-transparent txt-center" data-modal="modal-filtrar">Cancelar</label>
                                </div>
                        </div>
                    </form>
                </div>
            </div>
                <div class="tarjeta">
                    <h2>Datos</h2>
                    <div class="filtros d-flex justify-left flex-wrap">
                        <form id="filtros" class="d-flex justify-left">
                            <div class="periodo d-grid g2-9-1">
                                <div class="d-flex justify-between">
                                        <div class="flex-column justu">
                                            <label for="empleado">Empleado:</label>
                                            <input type="search" name="empleado" id="empleado">
                                            <input type="text" name="f_empleado" id="f_empleado">
                                        </div>
                                        <div class="flex-column justu">
                                            <label for="fecha_solicitud">Fecha de Apertura:</label>
                                            <input type="date" name="fecha_solicitud" id="fecha_solicitud">
                                        </div>
                                        <div class="flex-column justu">
                                            <label for="f_monto">Monto:</label>
                                            <input type="number" name="f_monto" id="f_monto">
                                        </div>
                                </div>
                                    <div class="d-flex flex-wrap flex-column">
                                        <button style="margin: 0px 0px 5px 0px" class="btn">Guardar</button> 
                                        <button style="margin: 0px 0px 5px 0px" class="btn"> Editar</button>
                                        <button style="margin: 0px 0px 5px 0px" class="btn">Eliminar</button>
                                        <button style="margin: 0px 0px 5px 0px" class="btn">Cancelar</button>       
                                    </div>
                                </div>                               
                        </form>
                    </div>
                </div>
                <div class="tarjeta">
                    <h2>Contenido</h2>
                    <table>
                        <thead>
                            <th>Nombre</th>
                            <th>Fecha de Apertura</th>
                            <th>Monto</th>
                            <th>Semana</th>
                            <th>Abonar</th>
                            <th>Eliminar</th>
                        </thead>
                        <tbody id="body">
                            <tr>
                                <td>1-item</td>
                                <td>2-item</td>
                                <td>3-item</td>
                                <td>4-item</td>
                                <td>5-item</td>
                            </tr>
                            <tr>
                                <td>1-item</td>
                                <td>2-item</td>
                                <td>3-item</td>
                                <td>4-item</td>
                                <td>5-item</td>
                            </tr>
                            <tr>
                                <td>1-item</td>
                                <td>2-item</td>
                                <td>3-item</td>
                                <td>4-item</td>
                                <td>5-item</td>
                            </tr>
                            <tr>
                                <td>1-item</td>
                                <td>2-item</td>
                                <td>3-item</td>
                                <td>4-item</td>
                                <td>5-item</td>
                            </tr>
                            <tr>
                                <td>1-item</td>
                                <td>2-item</td>
                                <td>3-item</td>
                                <td>4-item</td>
                                <td>5-item</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                 <!-- <div class="tarjeta-transparente" height="500">
                    <object data="http://localhost/sistema_fmtor/public/pdf/REGLAMENTO_FMT.pdf" type="application/pdf" width="100%" height="500">
                        <iframe src="http://localhost/sistema_fmtor/public/pdf/REGLAMENTO_FMT.pdf" width="100%"> </iframe>
                    </object>
                 </div> -->
            </div>
        </div>
    </div>
    <script src="../../public/js/fmtor_libreria.js?1.4"></script>
    <script src="../../public/js/produccion/filtros.js?1.1"></script>
    <script src="../../public/js/produccion/ordenes.js?1.6"></script>
</body>
</html>
