<div id="modal-registrar" class="modal modal-center">
    <div class="titulo_modal d-flex justify-between align-content-center">
        <h2>Registrar Nuevo Reporte</h2>
        <button class="btn btn-icon-self btn-transparent material-icons" id="close_modal" data-modal="modal-registrar">close</button>
    </div>
    <div class="contenido_modal">
        <form id="form_reg_reporte" enctype="multipart/form-data">

            <p>Mes de creacion:</p>
            <input class="input" type="text" name="Mes_de_creacion" id="Mes_de_creacion" placeholder="Ingresa el Mes de creacion">
            <p>Reporte PDF:</p>
            <input class="input" type="file" name="ReportePDF" id="ReportePDF" placeholder="Ingrese el Reporte PDF">

            <div class="opciones d-flex flex-column">
                <button data-btn="insertar" class="btn" id="btn-form-control-registrar">Registrar</button>

                <label class="btn btn-transparent txt-center" id="btn-form-control-cancel" data-modal="modal-registrar">Cancelar</label>
            </div>
        </form>
    </div>
</div>
<div id="modal-actualizar" class="modal modal-derecha">
    <div class="titulo_modal d-flex justify-between align-content-center">
        <h2>Actualizar Reporte</h2>
        <button class="btn btn-icon-self btn-transparent material-icons" id="close_modal" data-modal="modal-actualizar">close</button>
    </div>
    <div class="contenido_modal">
        <form id="form_act_reporte" enctype="multipart/form-data">
            <input class="input" hidden type="text" name="Id_reporte_edit" id="Id_reporte_edit" placeholder="Ingresa el Id_Iso">
            <p>Mes de creacion:</p>
            <input class="input" type="text" name="Mes_de_creacion_edit" id="Mes_de_creacion_edit" placeholder="Ingresa el Mes de creacion">
            <p>Reporte PDF:</p>
            <input class="input" type="file" name="ReportePDF_edit" id="ReportePDF_edit" placeholder="Ingrese el Reporte PDF">
            <div class="opciones d-flex flex-column">
                <button data-btn="actualizar" class="btn" id="btn-form-control-actualizar">Actualizar</button>
                <label class="btn btn-transparent txt-center" id="btn-form-control-cancel" data-modal="modal-actualizar">Cancelar</label>
            </div>
        </form>
    </div>
</div>
<div id="modal-comisiones" class="modal modal-derecha width-05">
    <div class="titulo_modal d-flex justify-between align-content-center" style="padding: 0px 0px 10px 0px;">
        <h2>TABLA DE COMISIONES DEL MES</h2>
        <button class="btn btn-icon-self btn-transparent material-icons" id="close_modal" data-modal="modal-comisiones">close</button>
    </div>
    <div class="d-flex justify-right align-content-center" style="padding: 0px 0px 15px 0px;">
        <button class="btn btn-icon-self material-icons btn-amarillo" data-modal="modal-precios">edit</button>
    </div>
    <div class="contenido_modal">
        <table id="table" class="table table_salida lista_salida">
            <thead>
                <tr style="background-color: var(--background-body);">
                    <th style="background-color: var(--background-body);"></th>
                    <th style="background-color: var(--background-body);">IMPORTES</th>
                    <th style="background-color: var(--background-body);"></th>
                    <th style="background-color: var(--background-body);"></th>
                </tr>
            </thead>
            <tbody class="body">
                <tr>
                    <td>FORJADORA</td>
                    <td class="txt-right" id="forjadora"></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>RDG</td>
                    <td class="txt-right" id="rdg"></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>NOTAS DE CREDITO</td>
                    <td class="txt-right" id="notas"></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>CANCELADAS DEL MES</td>
                    <td class="txt-right" id="canceladas"></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>FACTURAS SIN COMISIÓN</td>
                    <td class="txt-right" id="sin"></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>COMISIÓN PENDIENTE DE PAGO</td>
                    <td class="txt-right" id="pendiente"></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr style="background-color: var(--background-body);">
                    <td style="background-color: var(--background-body);">TOTAL VENTAS</td>
                    <td style="background-color: var(--background-body);" class="txt-right" id="total"></td>
                    <td style="background-color: var(--background-body);" class="txt-right" id="total-porcentaje"></td>
                    <td style="background-color: var(--background-body);" class="txt-right" id="total-total"></td>
                </tr>
                <tr>
                    <td>COM. SOLA BASIC</td>
                    <td class="txt-right" id="sola_basic"></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>TOTAL VENTAS</td>
                    <td class="txt-right" id="total_Ventas_comision"></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>2% COMISIÓN</td>
                    <td class="txt-right" id="porcentaje_comision"></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>NOMINA DE AGOSTO</td>
                    <td class="txt-right" id="nomina"></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>VICTOR 8%</td>
                    <td class="txt-right" id="victor"></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr style="background-color: var(--background-body);">
                    <td style="background-color: var(--background-body);">TOTAL A PAGAR</td>
                    <td style="background-color: var(--background-body);" class="txt-right" id="total_comision_mes"></td>
                    <td style="background-color: var(--background-body);"></td>
                    <td style="background-color: var(--background-body);"></td>
                </tr>
            </tbody>
            <tfoot class="tfoot"></tfoot>
        </table>
    </div>
</div>

<div id="modal-precios" class="modal modal-izquierda">
    <div class="titulo_modal d-flex justify-between align-content-center">
        <h2>Listas de precios</h2>
        <button class="btn btn-icon-self btn-transparent material-icons" id="close_modal" data-modal="modal-precios">close</button>
    </div>
    <div class="contenido_modal">
        <form id="form-precios" enctype="multipart/form-data" style="padding: 0px 5px;">
            <div class="d-grid g-2">
                <div class="d-grid g-1 grid-gap-0">
                    <p>Comisión pendiente:</p>
                    <input class="input" type="text" name="comision_1" id="comision_1">
                </div>
                <div class="d-grid g-1 grid-gap-0">
                    <p>Com. Sola Basic:</p>
                    <input class="input" type="text" name="sola_1" id="sola_1">
                </div>
            </div>
            <div class="d-grid g-2">
                <div class="d-grid g-1 grid-gap-0">
                    <p>Nomina:</p>
                    <input class="input" type="text" name="nomina_1" id="nomina_1">
                </div>
            </div>
            <div class="opciones d-flex flex-column">
                <button data-btn="actualizar" class="btn" id="btn-form-control-precios">Actualizar</button>
                <label class="btn btn-transparent txt-center" id="btn-form-control-cancel" data-modal="modal-precios">Cancelar</label>
            </div>
        </form>
    </div>
</div>