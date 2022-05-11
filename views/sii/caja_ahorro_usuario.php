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
                                <!-- <select name="seleccion_formato" id="seleccion_formato">
                                    <option value="0">Ordenes de Producción</option>
                                    <option value="1">Reporte Diario</option>
                                </select> -->
                            </div>
                        </form>
                        <form id="form-filtros">
                            <div class="contenedor_filtros">                                
                                <h3>Filtrar por fecha:</h3>
                                <div class="filtro fecha">
                                    <input type="checkbox" data-check="f_fecha" class="checkbox" name="check_fecha" id="check_fecha">
                                    <label class="lbl-checkbox" id="lbl_check_fecha" for="check_fecha">Filtrar por fecha especifica:</label>
                                    <input class="input" type="date" name="f_fecha" id="f_fecha" disabled>

                                    <input type="checkbox" data-check="f_semana" class="checkbox" name="check_fecha_semana" id="check_fecha_semana">
                                    <label class="lbl-checkbox" id="lbl_check_fecha_semana" for="check_fecha_semana">Filtrar por semana: </label>
                                    <input class="input" type="number" name="f_semana" id="f_semana" disabled>

                                    <input type="checkbox" data-check="f_mes" class="checkbox" name="check_fecha_mes" id="check_fecha_mes">
                                    <label class="lbl-checkbox" id="lbl_check_fecha_mes" for="check_fecha_mes">Filtrar por mes: </label>
                                    <select class="input" name="f_mes" id="f_mes" disabled>
                                        <option value="01">Enero</option>
                                        <option value="02">Febrero</option>
                                        <option value="03">Marzo</option>
                                        <option value="04">Abril</option>
                                        <option value="05">Mayo</option>
                                        <option value="06">Junio</option>
                                        <option value="07">Julio</option>
                                        <option value="08">Agosto</option>
                                        <option value="09">Septiembre</option>
                                        <option value="10">Octubre</option>
                                        <option value="11">Noviembre</option>
                                        <option value="12">Diciembre</option>
                                    </select>
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
                    <h2>Contenido</h2>
                    <table>
                        <thead>
                            <th>Fecha de Apertura</th>
                            <th>Monto</th>
                            <th>Semana</th>
                            <th>Total Acumulado</th>
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
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script src="../../public/js/fmtor_libreria.js?1.4"></script>
    <script src="../../public/js/produccion/filtros.js?1.1"></script>
    <script src="../../public/js/produccion/ordenes.js?1.6"></script>
</body>
</html>