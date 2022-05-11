<div id="modal-tarjetas" class="modal modal-derecha">
    <div class="titulo_modal d-flex justify-between align-content-center">
        <h2>Tarjeta de Flujo</h2>
        <button class="btn btn-icon-self btn-transparent material-icons" id="close_modal" data-modal="modal-tarjetas">close</button>
    </div>
    <div class="contenido_modal">
        <form id="form_act_orden" style="padding: 0px 5px;">
            <div class="d-grid g-1 grid-gap-0">
                <div class="d-flex justify-between align-content-center">
                    <div class="d-grid g-1 grid-gap-0">
                        <p>No. de Bote:</p>
                        <input class="input" type="text" name="bote" id="bote" placeholder="Ingrese el numero de bote">
                    </div>
                    <label data-t1="true" class="btn btn-icon-self material-icons">description</label>
                </div>
            </div>
            <div class="opciones d-flex flex-column">
                <label class="btn btn-transparent txt-center" id="btn-form-control-cancel" data-modal="modal-tarjetas">Cancelar</label>
            </div>
        </form>
    </div>
</div>
<div id="modal-filtrar" class="modal modal-derecha">
    <div class="titulo_modal d-flex justify-between align-content-center">
        <h2>Filtros</h2>
        <button class="btn btn-icon-self btn-transparent material-icons" id="close_modal" data-modal="modal-filtrar">close</button>
    </div>
    <div class="contenido_modal">
        <form id="form-filtros" style="padding: 0px 5px;">
            <div class="contenedor_filtros">
                <input type="text" name="tabla" id="tabla" value="v_ordenes" hidden>
                <h3>Filtrar Ordenes de Producción</h3>
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
                </div>
                <h3>Filtrar por fecha:</h3>
                <div class="filtro fecha">
                    <input type="radio" data-radio="radio" name="buscar_por" id="fecha" value="fecha">
                    <label class="lbl-radio" id="lbl_radio_fecha" for="fecha" value="fecha">Filtrar por fecha especifica:</label>
                    <input class="input" type="date" name="f_fecha" id="f_fecha" disabled>
                    <input type="radio" data-radio="radio" name="buscar_por" id="fecha_mes" checked value="fecha_mes">
                    <label class="lbl-radio" id="lbl_radio_fecha_mes" for="fecha_mes">Filtrar por mes: </label>
                    <input type="month" name="f_fecha_mes" id="f_fecha_mes" class="input">
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
                    <input class="input" type="text" name="f_cliente" id="f_cliente" disabled>
                </div>
                <h3>Filtrar por estado:</h3>
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
                </div>
                <div class="d-flex flex-column">
                    <button class="btn">Buscar</button>
                    <label class="btn btn-transparent txt-center" data-modal="modal-filtrar">Cancelar</label>
                </div>
            </div>
        </form>
    </div>
</div>