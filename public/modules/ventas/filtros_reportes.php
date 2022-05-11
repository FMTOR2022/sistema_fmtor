<div id="modal-filtrar" class="modal modal-derecha">
    <div class="titulo_modal d-flex justify-between align-content-center">
        <h2>Filtros</h2>
        <button class="btn btn-icon-self btn-transparent material-icons" id="close_modal" data-modal="modal-filtrar">close</button>
    </div>
    <div class="contenido_modal">
        <form id="form-filtros">
            <div class="contenedor_filtros">
                <h3>Filtrar Salidas de Almacen</h3>
                <input type="text" name="tabla" id="tabla" value="v_salidas_almacen" hidden>
                <div class="filtro fecha">
                    <input type="radio" data-radio="radio" name="buscar_por" id="salida" value="salida">
                    <label class="lbl-radio" id="lbl_radio_salida" for="salida">Buscar Salida de Almacen:</label>
                    <input class="input" type="number" name="f_salida" id="f_salida" disabled>
                    <input type="radio" data-radio="radio" name="buscar_por" id="rango_salidas" value="rango_salida">
                    <label class="lbl-radio" id="lbl_radio_rango_salida" for="rango_salidas">Filtrar por rango de Salidas de Almacen: </label>
                    <div class="d-grid g-2">
                        <input class="input" type="number" name="f_r_salida_m" id="f_r_salida_m" disabled>

                        <input class="input" type="number" name="f_r_salida_M" id="f_r_salida_M" disabled>
                    </div>
                </div>
                <!-- <h3>Filtrar Ordenes de Producción</h3>
                <div class="filtro fecha">
                    <input type="radio" data-radio="radio" name="buscar_por" id="op" value="op">
                    <label class="lbl-radio" id="lbl_radio_op" for="op">Buscar O.P.:</label>
                    <input class="input" type="number" name="f_op" id="f_op" disabled>
                    <input type="radio" data-radio="radio" name="buscar_por" id="rango_op" value="rango_op">
                    <label class="lbl-radio" id="lbl_radio_rango_op" for="rango_op">Filtrar por rango de O.P.: </label>
                    <div class="d-grid g-2">
                        <input class="input" type="number" name="f_r_op_m" id="f_r_op_m" disabled>

                        <input class="input" type="number" name="f_r_op_M" id="f_r_op_M" disabled>
                    </div>
                </div> -->
                <h3>Filtrar por fecha:</h3>
                <div class="filtro fecha">
                    <input type="radio" data-radio="radio" name="buscar_por" id="fecha" value="fecha">
                    <label class="lbl-radio" id="lbl_radio_fecha" for="fecha" value="fecha">Filtrar por fecha especifica:</label>
                    <input class="input" type="date" name="f_fecha" id="f_fecha" disabled>
                    <input type="radio" data-radio="radio" name="buscar_por" id="fecha_mes" value="fecha_mes">
                    <label class="lbl-radio" id="lbl_radio_fecha_mes" for="fecha_mes">Filtrar por mes: </label>
                    <select class="input" name="f_fecha_mes" id="f_fecha_mes" disabled>
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
                    <input type="radio" data-radio="radio" name="buscar_por" id="fecha_anio" value="fecha_anio">
                    <label class="lbl-radio" id="lbl_radio_fecha_anio" for="fecha_anio">Filtrar por año: </label>
                    <input class="input" type="number" name="f_fecha_anio" id="f_fecha_anio" disabled>
                    <input type="radio" data-radio="radio" name="buscar_por" id="rango_fecha" value="rango_fecha">
                    <label class="lbl-radio" id="lbl_radio_rango_fecha" for="rango_fecha">Filtrar por rango de fecha: </label>
                    <div class="d-grid g-2">
                        <input class="input" type="date" name="f_r_fecha_m" id="f_r_fecha_m" disabled>
                        <input class="input" type="date" name="f_r_fecha_M" id="f_r_fecha_M" disabled>
                    </div>
                </div>
                <h3>Filtrar por cliente:</h3>
                <div class="filtro fecha">
                    <input type="radio" data-radio="radio" name="buscar_por" id="cliente" value="cliente">
                    <label class="lbl-radio" id="lbl_radio_cliente" for="cliente">Buscar cliente:</label>
                    <select name="f_cliente" id="f_cliente" class="input" disabled></select>
                    <!-- <input class="input" type="text" name="f_cliente" id="f_cliente" disabled> -->
                </div>
                <!-- <h3>Filtrar por estado:</h3>
                <div class="filtro fecha">
                    <input type="radio" data-radio="radio" name="buscar_por" id="estado" value="estado">
                    <label class="lbl-radio" id="lbl_radio_estado" for="estado">Selecciona el estado de las O.P.:</label>
                    <select class="input" name="f_estado" id="f_estado" disabled>
                        <option value="FORJADO">FORJADO</option>
                        <option value="RANURADO">RANURADO</option>
                        <option value="ROLADO">ROLADO</option>
                        <option value="SHANK">SHANK</option>
                        <option value="CEMENTADO">CEMENTADO</option>
                        <option value="ACABADO">ACABADO</option>
                        <option value="PENDIENTE">PENDIENTE</option>
                        <option value="TERMINADO">TERMINADO</option>
                        <option value="CANCELADO">CANCELADO</option>
                    </select>
                </div> -->
                <div class="d-flex flex-column">
                    <button class="btn">Buscar</button>
                    <label class="btn btn-transparent txt-center" data-modal="modal-filtrar">Cancelar</label>
                </div>
            </div>
        </form>
    </div>
</div>