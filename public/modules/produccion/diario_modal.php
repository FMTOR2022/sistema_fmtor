<div id="modal-filtrar-diario" class="modal modal-derecha">
    <div class="titulo_modal d-flex justify-between align-content-center">
        <h2>Registro Diario</h2>
        <button class="btn btn-icon-self btn-transparent material-icons" id="close_modal" data-modal="modal-filtrar-diario">close</button>
    </div>
    <div class="contenido_modal">
        <form id="form-reporte-diario" style="padding: 0px 5px;">
            <div class="contenedor_filtros">
                <input type="text" name="tabla" id="tabla" value="v_ordenes" hidden>
                <div class="d-grid g-2">
                    <div class="d-grid g-1 grid-gap-0">
                        <label style="margin-top: 0;" for="lbl_diario_fecha">Fecha:</label>
                        <input class="input" type="date" name="diario_fecha" id="diario_fecha">
                    </div>
                    <div class="d-grid g-1 grid-gap-0">
                        <label style="margin-top: 0;" for="lbl_diario_turno">Turno:</label>
                        <input class="input" type="number" name="diario_turno" id="diario_turno">
                    </div>
                </div>
                <div class="d-grid g-1 grid-gap-0">
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
<div id="modal-ingresar-diario" class="modal modal-derecha">
    <div class="titulo_modal d-flex justify-between align-content-center">
        <h2>Nuevo Registro</h2>
        <button class="btn btn-icon-self btn-transparent material-icons" id="close_modal" data-modal="modal-ingresar-diario">close</button>
    </div>
    <div class="contenido_modal">
        <form id="form-control-diario" style="padding: 0px 5px;">
            <div class="d-grid g-2">
                <div class="d-grid g-1 grid-gap-0">
                    <p>Fecha:</p>
                    <input class="input" type="date" name="fecha" id="fecha" placeholder="Ingresa la fecha de entrega">
                </div>
                <div class="d-grid g-1 grid-gap-0">
                    <p>Turno:</p>
                    <input class="input " type="number" name="turno" id="turno" placeholder="Ingresa el turno" value="1">
                </div>
            </div>
            <div class="d-grid g-2">
                <div class="d-grid g-1 grid-gap-0">
                    <p>Estados de Producción:</p>
                    <select class="input select-estado" name="estado" id="estado">
                        <option value="">Selecciona un estado de producción:</option>
                        <option value="1">FORJADO</option>
                        <option value="2">RANURADO</option>
                        <option value="3">ROLADO</option>
                        <option value="4">SHANK</option>
                        <option value="5">CEMENTADO</option>
                        <option value="6">ACABADO</option>
                    </select>
                </div>
                <div class="d-grid g-1 grid-gap-0">
                    <p>Número de máquina:</p>
                    <input class="input no_maquina_sp" type="number" name="no_maquina" id="no_maquina">
                </div>
            </div>
            <div class="d-grid g-2">
                <div class="d-grid g-1 grid-gap-0">
                    <p>Orden de Producción:</p>
                    <input class="input" type="text" name="op" id="op" placeholder="00000">
                </div>
                <div class="d-grid g-1 grid-gap-0">
                    <p>Número de bote:</p>
                    <input class="input" type="number" name="no_botes" id="no_botes" placeholder="0">
                </div>
            </div>
            <div class="d-grid g-2">
                <div class="d-grid g-1 grid-gap-0">
                    <p>Kg. entregados:</p>
                    <input class="input" type="text" name="kg" id="kg" placeholder="00.00" value="0">
                </div>
                <div class="d-grid g-1 grid-gap-0">
                    <p>Pzas. entregadas:</p>
                    <input class="input" type="number" name="pzas" id="pzas" placeholder="0" value="0">
                </div>
            </div>
            <p>Observaciones:</p>
            <select class="input" name="observaciones" id="observaciones">
                <option value="Sin Observaciones">Sin Observaciones</option>
                <option value="Mantenimiento">Mantenimiento</option>
                <option value="Falta de Alambre">Falta de Alambre</option>
                <option value="Ajuste">Ajuste</option>
                <option value="Herramental">Herramental</option>
                <option value="Festivo">Festivo</option>
                <option value="Falto Operador">Falto Operador</option>
                <option value="No se libero Tornillo Laton">No se libero Tornillo Laton</option>
                <option value="No hubo punch">No hubo punch</option>
                <option value="Sin OP">Sin OP</option>
                <option value="Ajuste OTM">Ajuste OTM</option>
                <option value="H-Quebrado">H-Quebrado</option>
            </select>
            <!-- <textarea class="input" name="observaciones" id="observaciones" cols="30" rows="10" placeholder="Ingresa las observaciones"></textarea> -->
            <div class="opciones d-flex flex-column">
                <button data-btn="insertar" class="btn" id="btn-form-control-registrar">Registrar</button>
                <label class="btn btn-transparent txt-center" id="btn-form-control-cancel" data-modal="modal-ingresar-diario">Cancelar</label>
            </div>
        </form>
    </div>
</div>
<div id="modal-editar-diario" class="modal modal-derecha">
    <div class="titulo_modal d-flex justify-between align-content-center">
        <h2>Nuevo Registro</h2>
        <button class="btn btn-icon-self btn-transparent material-icons" id="close_modal" data-modal="modal-editar-diario">close</button>
    </div>
    <div class="contenido_modal">
        <form id="form-control-diario-editar" style="padding: 0px 5px;">
            <input type="number" name="registro" id="registro" hidden>
            <div class="d-grid g-2">
                <div class="d-grid g-1 grid-gap-0">
                    <p>Fecha:</p>
                    <input class="input" type="date" name="fecha_d" id="fecha_d" placeholder="Ingresa la fecha de entrega">
                </div>
                <div class="d-grid g-1 grid-gap-0">
                    <p>Turno:</p>
                    <input class="input " type="text" name="turno_d" id="turno_d" placeholder="Ingresa el turno">
                </div>
            </div>
            <div class="d-grid g-2">
                <div class="d-grid g-1 grid-gap-0">
                    <p>Estados de Producción:</p>
                    <select class="input select-estado" name="estado_d" id="estado_d">
                        <option value="">Selecciona un estado de producción:</option>
                        <option value="1">FORJADO</option>
                        <option value="2">RANURADO</option>
                        <option value="3">ROLADO</option>
                        <option value="4">SHANK</option>
                        <option value="5">CEMENTADO</option>
                        <option value="6">ACABADO</option>
                    </select>
                </div>
                <div class="d-grid g-1 grid-gap-0">
                    <p>Número de máquina:</p>
                    <input class="input no_maquina_sp" type="number" name="no_maquina_d" id="no_maquina_d">
                </div>
            </div>
            <div class="d-grid g-2">
                <div class="d-grid g-1 grid-gap-0">
                    <p>Orden de Producción:</p>
                    <input class="input" type="text" name="op_d" id="op_d" placeholder="00000">
                </div>
                <div class="d-grid g-1 grid-gap-0">
                    <p>Número de bote:</p>
                    <input class="input" type="number" name="no_botes_d" id="no_botes_d" placeholder="0">
                </div>
            </div>
            <div class="d-grid g-2">
                <div class="d-grid g-1 grid-gap-0">
                    <p>Kg. entregados:</p>
                    <input class="input" type="text" name="kg_d" id="kg_d" placeholder="00.00">
                </div>
                <div class="d-grid g-1 grid-gap-0">
                    <p>Pzas. entregadas:</p>
                    <input class="input" type="number" name="pzas_d" id="pzas_d" placeholder="0">
                </div>
            </div>
            <p>Observaciones:</p>
            <select class="input" name="observaciones_d" id="observaciones_d">
                <option value="Sin Observaciones">Sin Observaciones</option>
                <option value="Mantenimiento">Mantenimiento</option>
                <option value="Falta de Alambre">Falta de Alambre</option>
                <option value="Ajuste">Ajuste</option>
                <option value="Herramental">Herramental</option>
                <option value="Festivo">Festivo</option>
                <option value="Falto Operador">Falto Operador</option>
                <option value="No se libero Tornillo Laton">No se libero Tornillo Laton</option>
                <option value="No hubo punch">No hubo punch</option>
                <option value="Sin OP">Sin OP</option>
                <option value="Ajuste OTM">Ajuste OTM</option>
                <option value="H-Quebrado">H-Quebrado</option>
            </select>
            <!-- <textarea class="input" name="observaciones" id="observaciones" cols="30" rows="10" placeholder="Ingresa las observaciones"></textarea> -->
            <div class="opciones d-flex flex-column">
                <button data-btn="insertar" class="btn" id="btn-form-control-registrar">Registrar</button>
                <label class="btn btn-transparent txt-center" id="btn-form-control-cancel" data-modal="modal-editar-diario">Cancelar</label>
            </div>
        </form>
    </div>
</div>