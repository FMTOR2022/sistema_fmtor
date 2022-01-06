<div id="modal-filtrar-diario" class="modal modal-derecha">
    <div class="titulo_modal d-flex justify-between align-content-center">
        <h2>Registro Diario</h2>
        <button class="btn btn-icon-self btn-transparent material-icons" id="close_modal" data-modal="modal-filtrar-diario">close</button>
    </div>
    <div class="contenido_modal">
        <form id="form-reporte-diario">
            <div class="contenedor_filtros">
                <input type="text" name="tabla" id="tabla" value="v_ordenes" hidden>
                <div class="filtro fecha">
                    <div class="d-grid g-2">
                        <div class="d-grid g-1">
                            <label for="lbl_diario_fecha">Fecha:</label>
                            <input class="input" type="date" name="diario_fecha" id="diario_fecha" >
                        </div>
                        <div class="d-grid g-1">
                            <label for="lbl_diario_turno">Turno:</label>
                            <input class="input" type="number" name="diario_turno" id="diario_turno" >
                        </div>
                    </div>
                    <label id="lbl_diario_estado" for="diario_estado">Estado de producción:</label>
                    <select name="diario_estado" id="diario_estado">
                        <option value="">Selecciona el estado de producción</option>
                        <option value="FORJADO">FORJADO</option>
                        <option value="RANURADO">RANURADO</option>
                        <option value="ROLADO">ROLADO</option>
                        <option value="SHANK">SHANK</option>
                        <option value="CEMENTADO">CEMENTADO</option>
                        <option value="ACABADO">ACABADO</option>
                    </select>
                </div>
                <div class="d-flex flex-column">
                    <button class="btn" data-impresion="diario">Buscar</button>
                    <label class="btn btn-transparent txt-center" data-modal="modal-filtrar-diario">Cancelar</label>
                </div>
            </div>
        </form>
    </div>
</div>