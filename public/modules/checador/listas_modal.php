
                <div id="modal-filtrar" class="modal modal-derecha">
                    <div class="titulo_modal d-flex justify-between align-content-center">
                    <h2>Listas de Empleados</h2>
                        <button class="btn btn-icon-self btn-transparent material-icons" id="close_modal" data-modal="modal-filtrar">close</button>
                    </div>
                    <div class="contenido_modal">
                        <form id="form-formatos">
                            <div class="contenedor_filtros">
                                <h2></h2>
                                <select name="seleccion_formato" id="seleccion_formato">
                                    <option value="0">Horario</option>
                                    <option value="1">Lista Entradas</option>
                                    <option value="2">Lista Almuerzos</option>
                                    <option value="3">Lista Salidas</option>
                                    <option value="4">Lista Salida Extra</option>
                                    <option value="5">Reporte Semanal</option>
                                </select>
                            </div>
                        </form>
                        <form id="form-filtros">
                            <div class="contenedor_filtros">
                                <input type="text" name="tabla" id="tabla" value="listas" hidden>
                                    <br>
                                <h3>Filtrar por fecha:</h3>
                                <div class="filtro fecha">
                                    <input type="checkbox" data-check="f_fecha" class="checkbox" name="check_fecha" id="check_fecha">
                                    <label class="lbl-checkbox" id="lbl_check_fecha" for="check_fecha">Filtrar por fecha especifica:</label>
                                    <input class="input" type="date" name="f_fecha" id="f_fecha" disabled>
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
                                    <input type="checkbox" data-check="f_anio" class="checkbox" name="check_fecha_anio" id="check_fecha_anio">
                                    <label class="lbl-checkbox" id="lbl_check_fecha_anio" for="check_fecha_anio">Filtrar por año: </label>
                                    <input class="input" type="number" name="f_anio" id="f_anio" disabled>
                                    <input type="checkbox" data-check="f_r_fecha" data-rango="true" class="checkbox" name="check_rango_fecha" id="check_rango_fecha">
                                    <label class="lbl-checkbox" id="lbl_check_rango_fecha" for="check_rango_fecha">Filtrar por rango de fecha: </label>
                                    <div class="d-flex justify-between align-content-center">
                                        <input class="input" type="date" name="f_r_fecha_m" id="f_r_fecha_m">
                                        <p>-</p>
                                        <input class="input" type="date" name="f_r_fecha_M" id="f_r_fecha_M">
                                    </div>
                                </div>
                                <h3>Filtrar por empleado:</h3>
                                <div class="filtro fecha">
                                    <input type="checkbox" data-check="f_cliente" class="checkbox" name="check_empleado" id="check_empleado">
                                    <label class="lbl-checkbox" id="lbl_check_empleado" for="check_cliente">Buscar empledado:</label>
                                    <input class="input" type="text" name="f_empleado" id="f_empleado" >
                                </div>
                                <div class="d-flex flex-column">
                                    <button class="btn">Buscar</button>
                                    <label class="btn btn-transparent txt-center" data-modal="modal-filtrar">Cancelar</label>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>