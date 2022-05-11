<?php
if ($_SESSION['cm9s'] == 'Administrativo') {
?>
    <div id="modal-ingresar" class="modal modal-derecha width-04">
        <div class="titulo_modal d-flex justify-between align-content-center" style="padding: 0px 0px 15px 0px;">
            <h2>Nueva Cotización</h2>
            <button style="margin: 0px;" class="btn btn-icon-self btn-transparent material-icons" id="close_modal" data-modal="modal-ingresar">close</button>
        </div>
        <div class="contenido_modal">
            <form id="form_reg_cotizacion" style="padding: 0px 5px;">
                <div class="d-grid g-2">
                    <span style="margin: 0;" data-pegar="pegar-todo" class="btn btn-icon d-flex justify-center" title="Pegar información del portapapeles">
                        <i data-pegar="pegar-todo" class="material-icons-round">content_paste_go</i>
                        Pegar Pedido
                    </span>
                    <span title="Selecciona el Factor" class="btn btn-transparent btn-icon d-flex justify-center" data-modal="modal-factor">
                        <i data-modal="modal-factor" class="material-icons">grid_on</i>
                        Factor
                    </span>
                </div>
                <p style="padding: 15px 0px 30px 0px;" class="txt-right">Información general:</p>
                <div class="d-grid g-2">
                    <div class="d-grid g-1 grid-gap-0">
                        <p>Fecha:</p>
                        <input class="input" type="date" name="Fecha" id="Fecha">
                    </div>
                    <div class="d-grid g-1 grid-gap-0">
                        <p>Cliente:</p>
                        <select class="input" name="Id_Clientes_2" id="Id_Clientes_2">
                            <option value="">Selecciona un cliente</option>
                        </select>
                    </div>
                    <input class="input" type="number" name="Cantidad_Tornillos" id="Cantidad_Tornillos" value="1" hidden>
                </div>
                <div class="d-grid g-2">
                    <div class="d-grid g-1">
                        <p style="padding: 15px 0px 30px 0px;" class="txt-left" id="cantidad_tornillos_pedidos">Información del tornillo (1):</p>
                    </div>
                    <div class="d-flex justify-right align-content-center">
                        <span data-tornillo="mas" class="btn btn-transparent btn-icon-self material-icons" title="Un tornillo más">add</span>
                        <span data-tornillo="menos" class="btn btn-transparent btn-icon-self material-icons" title="Un tornillo menos">remove</span>
                    </div>
                </div>
                <div id="tornillos">
                    <div class="tornillo" id="tornillo-1">
                        <div class="d-grid g-2">
                            <div class="d-grid g-1">
                                <p style="padding: 15px 0px 30px 0px;" class="txt-left">TORNILLO 1:</p>
                            </div>
                            <div class="d-flex justify-right align-content-center">
                                <label title="Pegar información del tornillo 1" data-p="1" class="btn btn-icon-self material-icons">content_paste_go</label>
                            </div>
                        </div>
                        <div class="d-grid g-1">
                            <div class="d-grid g-1 grid-gap-0">
                                <p>Fecha de entrega :</p>
                                <input class="input" type="date" name="Fecha_entrega_1" id="Fecha_entrega_1">
                            </div>
                        </div>
                        <div class="d-grid g-3">
                            <div class="d-grid g-1 grid-gap-0">
                                <p>No. Parte cliente:</p>
                                <input class="input" type="text" name="Codigo_1" id="Codigo_1" placeholder="Ingrese el codigo">
                            </div>
                            <div class="d-grid g-1 grid-gap-0">
                                <p>Pedido Cliente:</p>
                                <input class="input" type="text" name="Pedido_pza_1" id="Pedido_pza_1">
                            </div>
                            <div class="d-grid g-1 grid-gap-0">
                                <p>Cantidad (millares):</p>
                                <input class="input" type="text" name="Cantidad_millares_1" id="Cantidad_millares_1">
                            </div>
                        </div>
                        <div class="d-grid g-3">
                            <div class="d-grid g-1 grid-gap-0">
                                <p>Descripcion:</p>
                                <input type="text" class="input" name="Descripcion_1" id="Descripcion_1">
                            </div>
                            <div class="d-grid g-1 grid-gap-0">
                                <p>Medida:</p>
                                <input class="input" type="text" name="Medida_1" id="Medida_1">
                            </div>
                            <div class="d-grid g-1 grid-gap-0">
                                <p>Factor:</p>
                                <input class="input" type="text" name="factor_1" id="factor_1">
                            </div>
                        </div>
                        <div class="d-grid g-1">
                            <div class="d-grid g-1 grid-gap-0">
                                <p>Acabado:</p>
                                <select class="input" name="Acabado_1" id="Acabado_1">
                                    <option value="">Selecciona un acabado</option>
                                    <option value="TROPICALIZADO">TROPICALIZADO</option>
                                    <option value="GALVANIZADO BLANCO">GALVANIZADO Blanco</option>
                                    <option value="GALVANIZADO AZUL">GALVANIZADO Azul/GALVANIZADO Electrolitico Azul</option>
                                    <option value="ZINCADO NEGRO">ZINCADO NEGRO</option>
                                    <option value="NÍQUEL">NÍQUEL</option>
                                    <option value="PULIDO">PULIDO</option>
                                    <option value="PAVONADO">PAVONADO</option>
                                    <option value="LATÓNADO">LATÓNADO</option>
                                    <option value="COBRE">COBRE</option>
                                    <option value="VERDE VIEJO">VERDE VIEJO</option>
                                    <option value="VERDE OLIVO">VERDE OLIVO</option>
                                </select>
                            </div>
                            <!-- <div class="d-grid g-1 grid-gap-0">
                                <p>Material:</p>
                                <input class="input" type="text" name="Material_1" id="Material_1">
                            </div> -->
                        </div>
                        <div class="d-grid g-2">
                            <div class="d-flex justify-center align-content-center">
                                <div class="d-grid g-1 grid-gap-0">
                                    <input type="checkbox" data-radio="checkbox" name="tratamiento_1" id="tratamiento_1">
                                    <label class="lbl-checkbox" id="lbl_checkbox_salida" for="tratamiento_1">T / Termico</label>
                                </div>
                            </div>
                            <div class="d-flex justify-center align-content-center">
                                <div class="d-grid g-1 grid-gap-0">
                                    <p>Costo:</p>
                                    <input class="input" type="text" name="Precio_millar_1" id="Precio_millar_1" value="0.0">
                                </div>
                                <label data-calcular="1" class="btn btn-icon-self material-icons" title="Obtener Costo" style="margin: 0px 0px 0px 5px;">attach_money</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-grid g-1">
                    <button data-btn="insertar" class="btn" id="btn-form-control-registrar">Registrar</button>
                </div>
                <div class="d-grid g-2">
                    <label class="btn btn-transparent txt-center" id="btn-limpiar">Limpiar</label>
                    <label class="btn btn-transparent txt-center" id="btn-form-control-cancel" data-modal="modal-ingresar">Cancelar</label>
                </div>
            </form>
        </div>
    </div>

    <div id="modal-actualizar" class="modal modal-derecha">
        <div class="titulo_modal d-flex justify-between align-content-center">
            <h2>Actualizar</h2>
            <button style="margin: 0px;" class="btn btn-icon-self btn-transparent material-icons" id="close_modal" data-modal="modal-actualizar">close</button>
        </div>
        <div class="contenido_modal">
            <form id="form_act_cotizacion" style="padding: 0px 5px;">
                <input class="input" type="text" name="Pedido_p" id="Pedido_p" hidden>
                <p style="padding: 0px 0px 10px 0px;" class="txt-right">Información general:</p>
                <div class="d-grid g-1">
                    <div class="d-grid g-1 grid-gap-0">
                        <p>Fecha de entrega :</p>
                        <input class="input" type="date" name="Fecha_entrega_p" id="Fecha_entrega_p">
                    </div>
                </div>
                <div class="d-grid g-2">
                    <div class="d-grid g-1 grid-gap-0">
                        <p>No. Parte cliente:</p>
                        <input class="input" type="text" name="Codigo_p" id="Codigo_p" placeholder="Ingrese el codigo">
                    </div>
                    <div class="d-grid g-1 grid-gap-0">
                        <p>Pedido Cliente:</p>
                        <input class="input" type="text" name="Pedido_pza_p" id="Pedido_pza_p">
                    </div>
                </div>
                <p style="padding: 15px 0px 30px 0px;" class="txt-right" id="cantidad_tornillos_pedidos">Información del tornillo:</p>
                <div id="tornillos">
                    <div id="tornillo-1">
                        <div class="d-grid g-2">
                            <div class="d-grid g-1 grid-gap-0">
                                <p>Cantidad (millares):</p>
                                <input class="input" type="text" name="Cantidad_millares_p" id="Cantidad_millares_p">
                            </div>
                            <div class="d-grid g-1 grid-gap-0">
                                <p>Descripcion:</p>
                                <input type="text" class="input" name="Descripcion_p" id="Descripcion_p">
                            </div>
                        </div>
                        <div class="d-grid g-2">
                            <div class="d-grid g-1 grid-gap-0">
                                <p>Medida:</p>
                                <input class="input" type="text" name="Medida_p" id="Medida_p">
                            </div>
                            <div class="d-grid g-1 grid-gap-0">
                                <p>Factor:</p>
                                <input class="input" type="text" name="factor_p" id="factor_p">
                            </div>
                        </div>
                        <div class="d-grid g-2">
                            <div class="d-grid g-1 grid-gap-0">
                                <p>Acabado:</p>
                                <select class="input" name="Acabado_p" id="Acabado_p">
                                    <option value="">Selecciona un acabado</option>
                                    <option value="TROPICALIZADO">TROPICALIZADO</option>
                                    <option value="GALVANIZADO">GALVANIZADO Blanco</option>
                                    <option value="GALVANIZADO">GALVANIZADO Azul/GALVANIZADO Electrolitico Azul</option>
                                    <option value="ZINCADO NEGRO">ZINCADO NEGRO</option>
                                    <option value="NÍQUEL">NÍQUEL</option>
                                    <option value="PULIDO">PULIDO</option>
                                    <option value="PAVONADO">PAVONADO</option>
                                    <option value="LATÓNADO">LATÓNADO</option>
                                    <option value="COBRE">COBRE</option>
                                    <option value="VERDE VIEJO">VERDE VIEJO</option>
                                    <option value="VERDE OLIVO">VERDE OLIVO</option>
                                </select>
                            </div>
                            <div class="d-grid g-1 grid-gap-0">
                                <p>Material:</p>
                                <input class="input" type="text" name="Material_p" id="Material_p">
                            </div>
                        </div>
                        <div class="d-grid g-2">
                            <div class="d-grid g-1 grid-gap-0">
                                <p>Costo:</p>
                                <input class="input" type="text" name="Precio_millar_p" id="Precio_millar_p">
                            </div>
                        </div>
                        <!-- <p style="padding: 15px 0px 30px 0px;" class="txt-right">Orden de Producción:</p>
                        <div class="d-grid g-1">
                            <input type="checkbox" name="sin_op_p" id="sin_op_p">
                            <label class="lbl-checkbox" id="lbl_checkbox_salida" for="sin_op_p" style="margin: 0 0 15px 0;">Sin
                                O.P.:</label>
                        </div>
                        <div class="d-grid g-2">
                            <div class="d-grid g-1 grid-gap-0">
                                <p>No. de Dibujo:</p>
                                <input class="input" type="text" name="Dibujo_p" id="Dibujo_p" placeholder="Ingrese el numero de plano">
                            </div>
                            <div class="d-grid g-1 grid-gap-0">
                                <p>Cantidad a Producir (millares):</p>
                                <input class="input" type="number" name="cantidad_producir_p" id="cantidad_producir_p">
                            </div>
                        </div>
                        <div class="d-grid g-2">
                            <div class="d-flex align-content-bottom justify-left">
                                <input type="checkbox" name="tratamiento_p" id="tratamiento_p">
                                <label class="lbl-checkbox" for="tratamiento_p" style="margin: 0px 0px 30px 0px;">T/TERMICO</label>
                            </div>
                        </div>
                        <div class="d-grid g-2">
                            <div class="d-grid g-1 grid-gap-0">
                                <input type="checkbox" name="op_cancelar" id="op_cancelar">
                                <label class="lbl-checkbox" id="lbl_checkbox_salida" for="op_cancelar" style="margin: 0 0 15px 0;">Cancelar
                                    O.P.:</label>
                            </div>
                        </div> -->
                    </div>
                </div>
                <div class="opciones d-flex flex-column">
                    <button data-btn="actualizar" class="btn" id="btn-form-control-actualizar">Actualizar</button>
                    <label class="btn btn-transparent txt-center" id="btn-form-control-cancel" data-modal="modal-actualizar">Cancelar</label>
                </div>
            </form>
        </div>
    </div>
    <div id="modal-pedido" class="modal modal-derecha">
        <div class="titulo_modal d-flex justify-between align-content-center">
            <h2>Registrar nuevo tornillo</h2>
            <button style="margin: 0px;" class="btn btn-icon-self btn-transparent material-icons" id="close_modal" data-modal="modal-pedido">close</button>
        </div>
        <div class="contenido_modal">
            <form id="form_act_cotizacion" style="padding: 0px 5px;">
                <p style="padding: 0px 0px 10px 0px;" class="txt-right">Información general:</p>
                <div class="d-grid g-1">
                    <div class="d-grid g-1 grid-gap-0">
                        <p>Fecha de entrega :</p>
                        <input class="input" type="date" name="Fecha_entrega_p" id="Fecha_entrega_p">
                    </div>
                </div>
                <div class="d-grid g-2">
                    <div class="d-grid g-1 grid-gap-0">
                        <p>No. Parte cliente:</p>
                        <input class="input" type="text" name="Codigo_p" id="Codigo_p" placeholder="Ingrese el codigo">
                    </div>
                    <div class="d-grid g-1 grid-gap-0">
                        <p>Pedido Cliente:</p>
                        <input class="input" type="text" name="Pedido_pza_p" id="Pedido_pza_p">
                    </div>
                </div>
                <p style="padding: 15px 0px 30px 0px;" class="txt-right" id="cantidad_tornillos_pedidos">Información del tornillo:</p>
                <div id="tornillos">
                    <div id="tornillo-1">
                        <div class="d-grid g-2">
                            <div class="d-grid g-1 grid-gap-0">
                                <p>Cantidad (millares):</p>
                                <input class="input" type="text" name="Cantidad_millares_p" id="Cantidad_millares_p">
                            </div>
                            <div class="d-grid g-1 grid-gap-0">
                                <p>Descripcion:</p>
                                <input type="text" class="input" name="Descripcion_p" id="Descripcion_p">
                            </div>
                        </div>
                        <div class="d-grid g-2">
                            <div class="d-grid g-1 grid-gap-0">
                                <p>Medida:</p>
                                <input class="input" type="text" name="Medida_p" id="Medida_p">
                            </div>
                            <div class="d-grid g-1 grid-gap-0">
                                <p>Factor:</p>
                                <input class="input" type="text" name="factor_p" id="factor_p">
                            </div>
                        </div>
                        <div class="d-grid g-2">
                            <div class="d-grid g-1 grid-gap-0">
                                <p>Acabado:</p>
                                <select class="input" name="Acabado_p" id="Acabado_p">
                                    <option value="">Selecciona un acabado</option>
                                    <option value="TROPICALIZADO">TROPICALIZADO</option>
                                    <option value="GALVANIZADO">GALVANIZADO Blanco</option>
                                    <option value="GALVANIZADO">GALVANIZADO Azul/GALVANIZADO Electrolitico Azul</option>
                                    <option value="ZINCADO NEGRO">ZINCADO NEGRO</option>
                                    <option value="NÍQUEL">NÍQUEL</option>
                                    <option value="PULIDO">PULIDO</option>
                                    <option value="PAVONADO">PAVONADO</option>
                                    <option value="LATÓNADO">LATÓNADO</option>
                                    <option value="COBRE">COBRE</option>
                                    <option value="VERDE VIEJO">VERDE VIEJO</option>
                                    <option value="VERDE OLIVO">VERDE OLIVO</option>
                                </select>
                            </div>
                            <div class="d-grid g-1 grid-gap-0">
                                <p>Material:</p>
                                <input class="input" type="text" name="Material_p" id="Material_p">
                            </div>
                        </div>
                        <div class="d-grid g-2">
                            <div class="d-grid g-1 grid-gap-0">
                                <p>Costo:</p>
                                <input class="input" type="text" name="Precio_millar_p" id="Precio_millar_p">
                            </div>
                        </div>
                        <!-- <p style="padding: 15px 0px 30px 0px;" class="txt-right">Orden de Producción:</p>
                        <div class="d-grid g-1">
                            <input type="checkbox" name="sin_op_p" id="sin_op_p">
                            <label class="lbl-checkbox" id="lbl_checkbox_salida" for="sin_op_p" style="margin: 0 0 15px 0;">Sin
                                O.P.:</label>
                        </div>
                        <div class="d-grid g-2">
                            <div class="d-grid g-1 grid-gap-0">
                                <p>No. de Dibujo:</p>
                                <input class="input" type="text" name="Dibujo_p" id="Dibujo_p" placeholder="Ingrese el numero de plano">
                            </div>
                            <div class="d-grid g-1 grid-gap-0">
                                <p>Cantidad a Producir (millares):</p>
                                <input class="input" type="number" name="cantidad_producir_p" id="cantidad_producir_p">
                            </div>
                        </div>
                        <div class="d-grid g-2">
                            <div class="d-flex align-content-bottom justify-left">
                                <input type="checkbox" name="tratamiento_p" id="tratamiento_p">
                                <label class="lbl-checkbox" for="tratamiento_p" style="margin: 0px 0px 30px 0px;">T/TERMICO</label>
                            </div>
                        </div>
                        <div class="d-grid g-2">
                            <div class="d-grid g-1 grid-gap-0">
                                <input type="checkbox" name="op_cancelar" id="op_cancelar">
                                <label class="lbl-checkbox" id="lbl_checkbox_salida" for="op_cancelar" style="margin: 0 0 15px 0;">Cancelar
                                    O.P.:</label>
                            </div>
                        </div> -->
                    </div>
                </div>
                <div class="opciones d-flex flex-column">
                    <button data-btn="actualizar" class="btn" id="btn-form-control-actualizar">Registrar</button>
                    <label class="btn btn-transparent txt-center" id="btn-form-control-cancel" data-modal="modal-pedido">Cancelar</label>
                </div>
            </form>
        </div>
    </div>

    <div id="modal-actualizar-cotizacion" class="modal modal-derecha">
        <div class="titulo_modal d-flex justify-between align-content-center">
            <h2>Actualizar Cotización</h2>
            <button style="margin: 0px;" class="btn btn-icon-self btn-transparent material-icons" id="close_modal" data-modal="modal-actualizar-cotizacion">close</button>
        </div>
        <div class="contenido_modal">
            <form id="form_act_solo_cotizacion" style="padding: 0px 5px;">
                <input class="input" type="text" name="Cotizacion_e" id="Cotizacion_e" hidden>
                <p style="padding: 0px 0px 30px 0px;" class="txt-right">Información general:</p>
                <div class="d-grid g-2">
                    <div class="d-grid g-1 grid-gap-0">
                        <p>Fecha:</p>
                        <input class="input" type="date" name="Fecha_e" id="Fecha_e">
                    </div>
                    <div class="d-grid g-1 grid-gap-0">
                        <p>Cliente:</p>
                        <select name="Id_Clientes_2_e" id="Id_Clientes_2_e">
                            <option value="">Selecciona un cliente</option>
                        </select>
                    </div>
                </div>
                <div class="opciones d-flex flex-column">
                    <button data-btn="actualizar" class="btn" id="btn-form-control-actualizar">Actualizar</button>
                    <label class="btn btn-transparent txt-center" id="btn-form-control-cancel" data-modal="modal-actualizar-cotizacion">Cancelar</label>
                </div>
            </form>
        </div>
    </div>

    <div id="modal-costos" class="modal modal-derecha">
        <div class="titulo_modal d-flex justify-between align-content-center">
            <h2>Actualizar costos</h2>
            <button class="btn btn-icon-self btn-transparent material-icons" id="close_modal" data-modal="modal-costos">close</button>
        </div>
        <div class="contenido_modal">
            <form id="form_costos">
                <input type="number" name="id_folio_edit" id="id_folio_edit" hidden>
                <div class="d-grid g-2" style="padding: 0px 5px;">
                    <div class="d-grid g-1 grid-gap-0">
                        <p>Acabado:</p>
                        <input style="margin-bottom: 0px;" class="input" type="text" name="costo_acabado" id="costo_acabado" placeholder="Ingresa el costo del acabado">
                    </div>
                    <div class="d-grid g-1 grid-gap-0">
                        <p>Acero:</p>
                        <input style="margin-bottom: 0px;" class="input" type="text" name="costo_acero" id="costo_acero" placeholder="Ingresa el costo del acero">
                    </div>
                    <div class="d-grid g-1 grid-gap-0">
                        <p>IVA:</p>
                        <input style="margin-bottom: 0px;" class="input" type="text" name="costo_iva" id="costo_iva" placeholder="Ingresa el costo del IVA">
                    </div>
                    <div class="d-grid g-1 grid-gap-0">
                        <p>Laton:</p>
                        <input style="margin-bottom: 0px;" class="input" type="text" name="costo_laton" id="costo_laton" placeholder="Ingresa el costo del laton">
                    </div>
                    <div class="d-grid g-1 grid-gap-0">
                        <p>Tratamiento:</p>
                        <input class="input" type="text" name="costo_tratamiento" id="costo_tratamiento" placeholder="Ingresa el costo del Tratamiento">
                    </div>
                </div>
                <div class="opciones d-flex flex-column">
                    <button data-btn="actualizar" class="btn" id="btn-form-control-actualizar">Actualizar costos</button>
                    <label class="btn btn-transparent txt-center" id="btn-form-control-cancel" data-modal="modal-costos">Cancelar</label>
                </div>
            </form>
        </div>
    </div>
<?php } ?>

<div id="modal-filtrar" class="modal modal-derecha">
    <div class="titulo_modal d-flex justify-between align-content-center">
        <h2>Filtros</h2>
        <button class="btn btn-icon-self btn-transparent material-icons" id="close_modal" data-modal="modal-filtrar">close</button>
    </div>
    <div class="contenido_modal" style="padding: 0px 5px;">
        <form id="form-filtros">
            <div class="contenedor_filtros">
                <h3>Filtrar Cotizaciones</h3>
                <input type="text" name="tabla" id="tabla" value="v_salidas_almacen" hidden>
                <div class="filtro fecha">
                    <input type="radio" data-radio="radio" name="buscar_por" id="salida" value="salida">
                    <label class="lbl-radio" id="lbl_radio_salida" for="salida">Buscar Cotización:</label>
                    <input class="input" type="number" name="f_salida" id="f_salida" disabled>
                    <input type="radio" data-radio="radio" name="buscar_por" id="rango_salidas" value="rango_salida">
                    <label class="lbl-radio" id="lbl_radio_rango_salida" for="rango_salidas">Filtrar por rango de Salidas de Almacen: </label>
                    <div class="d-grid g-2">
                        <input class="input" type="number" name="f_r_salida_m" id="f_r_salida_m" disabled>

                        <input class="input" type="number" name="f_r_salida_M" id="f_r_salida_M" disabled>
                    </div>
                </div>
                <h3>Filtrar por fecha:</h3>
                <div class="filtro fecha">
                    <input type="radio" data-radio="radio" name="buscar_por" id="fecha" value="fecha">
                    <label class="lbl-radio" id="lbl_radio_fecha" for="fecha" value="fecha">Filtrar por fecha especifica:</label>
                    <input class="input" type="date" name="f_fecha" id="f_fecha" disabled>
                    <input type="radio" data-radio="radio" name="buscar_por" id="fecha_mes" value="fecha_mes" checked>
                    <label class="lbl-radio" id="lbl_radio_fecha_mes" for="fecha_mes">Filtrar por mes: </label>
                    <input class="input" type="month" name="f_fecha_mes" id="f_fecha_mes" disabled>
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
                </div>
                <div class="d-grid g-1">
                    <button class="btn">Buscar</button>
                </div>
                <div class="d-grid g-2">
                    <label class="btn btn-transparent txt-center" data-limpiar="limpiar">Limpiar Filtros</label>
                    <label class="btn btn-transparent txt-center" data-modal="modal-filtrar">Cancelar</label>
                </div>
            </div>
        </form>
    </div>
</div>
<div id="modal-historial" class="modal modal-izquierda width-05">
    <div class="titulo_modal d-flex justify-between align-content-center" style="padding: 0;">
        <h2 id="numero_salida_almacen">Cotización: </h2>
        <button style="margin: 0px;" class="btn btn-icon-self btn-transparent material-icons" id="close_modal" data-modal="modal-historial">close</button>
    </div>
    <div class="d-flex justify-right align-content-center">
        <?php if ($_SESSION['cm9s'] == 'Administrativo') { ?>
            <!-- <button style="margin: 0px;" class="btn btn-icon-self material-icons" data-modal="modal-pedido">add</button> -->
        <?php } ?>
    </div>
    <div class="contenido_modal">
        <div class="d-grid g-1">
            <table class="table table_salida lista_salida" id="table">
                <thead>
                    <?php if ($_SESSION['cm9s'] == 'Administrativo') { ?>
                        <th style="min-width: 60px;"></th>
                    <?php } ?>
                    <th style="min-width: 150px;">N° parte de cliente </th>
                    <th style="min-width: 100px;">Pedido Cliente</th>
                    <th style="min-width: 150px;">Descripcion </th>
                    <th style="min-width: 100px;">Medida</th>
                    <th style="min-width: 100px;">Tratamiento</th>
                    <th style="min-width: 100px;">Factor</th>
                    <th>Acabado</th>
                    <th>Material </th>
                    <th>Cantidad</th>
                    <th style="min-width: 100px;">Costo</th>
                    <th style="min-width: 100px;">Fecha de entrega</th>
                </thead>
                <tbody id="body_historial"></tbody>
            </table>
        </div>
    </div>
</div>
<div id="modal-factor" class="modal modal-izquierda width-05">
    <div class="titulo_modal d-flex justify-between align-content-center">
        <h2 id="numero_salida_almacen">Factor </h2>
        <button class="btn btn-icon-self btn-transparent material-icons" id="close_modal" data-modal="modal-factor">close</button>
    </div>
    <div class="contenido_modal">
        <div class="d-grid g-1">
            <table class="table table_salida lista_salida">
                <tbody id="factores"></tbody>
            </table>
        </div>
    </div>
</div>