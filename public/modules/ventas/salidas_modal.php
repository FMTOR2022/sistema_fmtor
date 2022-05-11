<?php
if ($_SESSION['cm9s'] == 'Administrativo') {
?>
    <div id="modal-ingresar" class="modal modal-derecha width-04">
        <div class="titulo_modal d-flex justify-between align-content-center" style="padding: 0px 0px 15px 0px;">
            <h2>Nueva Salida</h2>
            <button class="btn btn-icon-self btn-transparent material-icons" id="close_modal" data-modal="modal-ingresar">close</button>
        </div>
        <div class="contenido_modal">
            <form id="form_reg_salida" style="padding: 0px 5px;">
                <p style="padding: 0px 0px 15px 0px;" class="txt-right">Información general:</p>
                <div class="d-grid g-2">
                    <div class="d-grid g-1 grid-gap-0">
                        <p>Fecha:</p>
                        <input class="input" type="date" name="Fecha" id="Fecha">
                        <input type="text" name="cantidad_tornillos" id="cantidad_tornillos" hidden>
                    </div>
                    <div class="d-grid g-1 grid-gap-0">
                        <label for="concepto" style="margin: 0px;">Cotización</label>
                        <select class="input" name="cotizacion" id="cotizacion">
                            <option id="concepto-opcion" value="">Selecciona una cotización</option>
                        </select>
                    </div>
                </div>
                <div class="d-grid g-2" id="contenedor_compra_general" style="display: none;">
                    <p style="padding: 0px 0px 0px 0px; grid-column: 1 / 3;" class="txt-right">Orden de compra:</p>
                    <div class="d-grid g-1 grid-gap-0">
                        <label for="proveedor_general" style="margin: 0px;">Proveedor:</label>
                        <select style="margin: 15px 0px 0px 0px;" class="input" name="proveedor_general" id="proveedor_general" disabled>
                            <option value="">Selecciona un proveedor</option>
                        </select>
                    </div>
                    <div class="d-grid g-1 grid-gap-0">
                        <label for="empresa_general" style="margin: 0px;">Empresa:</label>
                        <select style="margin: 15px 0px 0px 0px;" class="input" name="empresa_general" id="empresa_general" disabled>
                            <option value="">Selecciona una empresa</option>
                        </select>
                    </div>
                    <div class="d-grid g-1 grid-gap-0">
                        <label for="solicitado_general" style="margin: 0px;">Solicitado por:</label>
                        <input style="margin: 15px 0px 0px 0px;" type="text" name="solicitado_general" id="solicitado_general" disabled>
                    </div>
                    <div class="d-grid g-1 grid-gap-0">
                        <label for="terminos_general" style="margin: 0px;">Terminos de pago:</label>
                        <input style="margin: 15px 0px 0px 0px;" type="text" name="terminos_general" id="terminos_general" disabled>
                    </div>
                    <div class="d-grid g-1 grid-gap-0">
                        <label for="contacto_general" style="margin: 0px;">Contacto:</label>
                        <input type="text" name="contacto_general" id="contacto_general" disabled>
                    </div>
                </div>
                <div id="tornillos">
                </div>
                <div class="d-grid g-1 grid-gap-0">
                    <button data-btn="insertar" class="btn" id="btn-form-control-registrar">Registrar</button>
                    <label class="btn btn-transparent txt-center" id="btn-form-control-cancel" data-modal="modal-ingresar">Cancelar</label>
                </div>
            </form>
        </div>
    </div>

    <div id="modal-actualizar" class="modal modal-derecha">
        <div class="titulo_modal d-flex justify-between align-content-center">
            <h2>Actualizar </h2>
            <button class="btn btn-icon-self btn-transparent material-icons" id="close_modal" data-modal="modal-actualizar">close</button>
        </div>
        <div class="contenido_modal">
            <form id="form_act_salida" style="padding: 0px 5px;">
                <!-- <p>Salida De Almacen:</p> -->
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
                    <div class="tornillo" id="tornillo-1">
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
                        <p style="padding: 15px 0px 30px 0px;" class="txt-right">Orden de Producción:</p>
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
                        </div>
                    </div>
                </div>
                <div class="opciones d-flex flex-column">
                    <button data-btn="actualizar" class="btn" id="btn-form-control-actualizar">Actualizar</button>
                    <label class="btn btn-transparent txt-center" id="btn-form-control-cancel" data-modal="modal-actualizar">Cancelar</label>
                </div>
            </form>
        </div>
    </div>

    <div id="modal-actualizar-salida" class="modal modal-derecha">
        <div class="titulo_modal d-flex justify-between align-content-center">
            <h2>Actualizar Salida</h2>
            <button class="btn btn-icon-self btn-transparent material-icons" id="close_modal" data-modal="modal-actualizar-salida">close</button>
        </div>
        <div class="contenido_modal">
            <form id="form_act_solo_salida" style="padding: 0px 5px;">
                <input class="input" type="text" name="Salida_e" id="Salida_e" hidden>
                <p style="padding: 0px 0px 30px 0px;" class="txt-right">Información general:</p>
                <div class="d-grid g-1 grid-gap-0">
                    <p>Fecha:</p>
                    <input class="input" type="date" name="Fecha_e" id="Fecha_e">
                </div>
                <div class="opciones d-flex flex-column">
                    <button data-btn="actualizar" class="btn" id="btn-form-control-actualizar">Actualizar</button>
                    <label class="btn btn-transparent txt-center" id="btn-form-control-cancel" data-modal="modal-actualizar-salida">Cancelar</label>
                </div>
            </form>
        </div>
    </div>
    <div id="modal-actualizar-factura" class="modal modal-derecha">
        <div class="titulo_modal d-flex justify-between align-content-center">
            <h2>Registrar Factura</h2>
            <button class="btn btn-icon-self btn-transparent material-icons" id="close_modal" data-modal="modal-actualizar-factura">close</button>
        </div>
        <div class="contenido_modal">
            <form id="form_act_factura" style="padding: 0px 5px;">
                <input class="input" type="text" name="pedido_factura" id="pedido_factura" hidden>
                <p style="padding: 0px 0px 15px 0px;" class="txt-right">Facturación:</p>
                <div class="d-grid g-2">
                    <div class="d-grid g-1 grid-gap-0">
                        <p>Cantidad:</p>
                        <input class="input" type="text" name="cantidad_factura" id="cantidad_factura">
                    </div>
                    <div class="d-grid g-1 grid-gap-0">
                        <p>Kilos:</p>
                        <input class="input" type="text" name="kilos_factura" id="kilos_factura">
                    </div>
                </div>
                <div class="d-grid g-2">
                    <div class="d-grid g-1 grid-gap-0">
                        <p>Factura:</p>
                        <input class="input" type="text" name="Factura" id="Factura">
                    </div>
                    <div class="d-grid g-1 grid-gap-0">
                        <p>Empaque:</p>
                        <input class="input" type="text" name="Empaque" id="Empaque">
                    </div>
                </div>
                <div class="d-grid g-1 grid-gap-0">
                    <p>Empresa:</p>
                    <select type="text" name="empresa_factura" id="empresa_factura">
                        <option value="">Selecciona la empresa</option>
                        <select>
                </div>
                <div class="d-grid g-1 grid-gap-0">
                    <p>Concepto:</p>
                    <div class="d-grid g-2 grid-gap-0">
                        <input type="radio" name="concepto_factura" id="concepto_terminada" value="0">
                        <label style="margin: 5px 0px 5px 0px;" for="concepto_terminada" class="lbl-radio">Terminada</label>
                        <input type="radio" name="concepto_factura" id="concepto_nota" value="1">
                        <label style="margin: 0px 0px 5px 0px;" for="concepto_nota" class="lbl-radio">Nota de crédito</label>
                        <input type="radio" name="concepto_factura" id="concepto_sin_comision" value="2">
                        <label style="margin: 0px 0px 5px 0px;" for="concepto_sin_comision" class="lbl-radio">Sin comisión</label>
                        <input type="radio" name="concepto_factura" id="concepto_compra" value="3">
                        <label style="margin: 0px 0px 5px 0px;" for="concepto_compra" class="lbl-radio">Compra</label>
                    </div>
                </div>
                <div class="opciones d-flex flex-column">
                    <button data-btn="actualizar" class="btn" id="btn-form-control-actualizar">Registrar</button>
                    <label class="btn btn-transparent txt-center" id="btn-form-control-cancel" data-modal="modal-actualizar-factura">Cancelar</label>
                </div>
            </form>
        </div>
    </div>
<?php
}
?>

<div id="modal-historial" class="modal modal-izquierda width-05">
    <div class="titulo_modal d-flex justify-between align-content-center">
        <h2 id="numero_salida_almacen">Salida de Almacen: </h2>
        <button style="margin: 0px;" class="btn btn-icon-self btn-transparent material-icons" id="close_modal" data-modal="modal-historial">close</button>
    </div>
    <div class="contenido_modal">
        <div class="d-grid g-1" style="padding: 0px 5px;">
            <table class="table table_salida lista_salida" id="table">
                <thead>
                    <th></th>
                    <th style="min-width: 150px;">N° parte de cliente </th>
                    <th style="min-width: 100px;">Pedido Cliente</th>
                    <th style="min-width: 150px;">Descripcion </th>
                    <th style="min-width: 100px;">Medida</th>
                    <th>Tratamiento</th>
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

<div id="modal-historial-compra" class="modal modal-izquierda width-05">
    <div class="titulo_modal d-flex justify-between align-content-center">
        <h2 id="numero_salida_almacen_compra">Salida de Almacen: </h2>
        <button style="margin: 0px;" class="btn btn-icon-self btn-transparent material-icons" id="close_modal" data-modal="modal-historial-compra">close</button>
    </div>
    <!-- <div class="d-flex justify-right align-content-center">
            <button style="margin: 0px;" class="btn btn-icon-self material-icons" data-modal="modal-pedido">add</button>
        </div> -->
    <div class="contenido_modal">
        <div class="d-grid g-1" style="padding: 0px 5px;">
            <table class="table table_salida lista_salida" id="table_compra">
                <thead>
                    <th style="min-width: 80px;">Codigo</th>
                    <th style="min-width: 120px;">Producto</th>
                    <th style="min-width: 150px;">Cantidad</th>
                    <th style="min-width: 100px;">Precio</th>
                    <th style="min-width: 120px;">Total</th>
                    <?php if ($_SESSION['cm9s'] == 'Administrativo') { ?>
                        <!-- <th style="min-width: 60px;"></th> -->
                        <!-- <th style="min-width: 60px;"></th> -->
                        <!-- <th style="min-width: 60px;"></th> -->
                    <?php } ?>
                </thead>
                <tbody id="body_historial_compra"></tbody>
            </table>
        </div>
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
                <h3>Filtrar por fecha:</h3>
                <div class="filtro fecha">
                    <input type="radio" data-radio="radio" name="buscar_por" id="fecha" value="fecha">
                    <label class="lbl-radio" id="lbl_radio_fecha" for="fecha" value="fecha">Filtrar por fecha especifica:</label>
                    <input class="input" type="date" name="f_fecha" id="f_fecha" disabled>
                    <input type="radio" data-radio="radio" name="buscar_por" id="fecha_mes" value="fecha_mes" checked>
                    <label class="lbl-radio" id="lbl_radio_fecha_mes" for="fecha_mes">Filtrar por mes: </label>
                    <input type="month" name="f_fecha_mes" id="f_fecha_mes">
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
                <div class="d-flex flex-column">
                    <button class="btn">Buscar</button>
                    <label class="btn btn-transparent txt-center" data-modal="modal-filtrar">Cancelar</label>
                </div>
            </div>
        </form>
    </div>
</div>