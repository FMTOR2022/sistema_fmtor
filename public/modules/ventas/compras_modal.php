<?php
if ($_SESSION['cm9s'] == 'Administrativo') {
?>

    <div id="modal-ingresar" class="modal modal-derecha">
        <div class="titulo_modal d-flex justify-between align-content-center">
            <h2>Nueva Orden de Compra</h2>
            <button class="btn btn-icon-self btn-transparent material-icons" id="close_modal" data-modal="modal-ingresar">close</button>
        </div>
        <div class="contenido_modal">
            <form id="form_reg_orden" style="padding: 0px 5px;">
                <!-- <div class="d-grid g-2">
                    <span style="margin: 0;" data-pegar="pegar-cliente" class="btn btn-icon d-flex justify-center" title="Pegar información del portapapeles">
                        <i data-pegar="pegar-cliente" class="material-icons-round">content_paste_go</i>
                        Pegar inf. O. C.
                    </span>
                    <span style="margin: 0;" data-pegar="pegar-todo" class="btn btn-transparent btn-icon d-flex justify-center" title="Pegar información del portapapeles">
                        <i data-pegar="pegar-todo" class="material-icons-round">content_paste_go</i>
                        Pegar todo el pedido
                    </span>
                </div> -->
                <p style="padding: 15px 0px 30px 0px;" class="txt-right">Información general:</p>
                <div class="d-grid g-2">
                    <div class="d-grid g-1 grid-gap-0">
                        <p>Fecha:</p>
                        <input class="input" type="date" name="Fecha" id="Fecha">
                    </div>
                    <div class="d-grid g-1 grid-gap-0">
                        <p>Empresa:</p>
                        <select class="input" name="empresas" id="empresas">
                            <option value="">Selecciona la empresa</option>
                        </select>
                    </div>
                </div>
                <div class="d-grid g-1">
                    <div class="d-grid g-1 grid-gap-0">
                        <p>Proveedor:</p>
                        <select class="input" name="proveedores" id="proveedores">
                            <option value="">Selecciona un proveedor</option>
                        </select>
                    </div>
                </div>
                <div class="d-grid g-2">
                    <div class="d-grid g-1 grid-gap-0">
                        <p>Solicitado por:</p>
                        <input class="input" type="text" name="solicitado" id="solicitado">
                    </div>
                    <div class="d-grid g-1 grid-gap-0">
                        <p>Terminos de pago:</p>
                        <input class="input" type="text" name="terminos" id="terminos">
                    </div>
                </div>
                <div class="d-grid g-1 grid-gap-0">
                    <p>Contacto:</p>
                    <input class="input" type="text" name="contacto" id="contacto">
                    <input class="input" type="number" name="Cantidad_Tornillos" id="Cantidad_Tornillos" value="1" hidden>
                </div>
                <div class="d-grid g-2">
                    <div class="d-grid g-1">
                        <input type="radio" name="radio" id="pedido" value="pedido" checked>
                        <label class="lbl-radio" id="lbl_checkbox_salida" for="pedido" style="margin: 0 0 15px 0;">Salida de Almacen</label>
                    </div>
                    <div class="d-flex justify-right align-content-center">
                        <input type="radio" name="radio" id="material" value="material">
                        <label class="lbl-radio" id="lbl_checkbox_salida" for="material" style="margin: 0 0 15px 0;">Material</label>
                    </div>
                </div>
                <div id="mas_menos" class="d-grid g-2 grid-gap-0" style="display: none;">
                    <div class="d-grid g-1">
                        <p style="padding: 15px 0px 30px 0px;" class="txt-left" id="cantidad_tornillos_pedidos">Información del producto (1):</p>
                    </div>
                    <div class="d-flex justify-right align-content-center">
                        <span data-tornillo="mas" class="btn btn-transparent btn-icon-self material-icons">add</span>
                        <span data-tornillo="menos" class="btn btn-transparent btn-icon-self material-icons">remove</span>
                    </div>
                </div>
                <div id="pedido_compra" style="display: none;">
                    <div id="pedido_1" class="pedido">
                        <div class="d-grid g-1">
                            <div class="d-grid g-1">
                                <p style="padding: 15px 0px 30px 0px;" class="txt-left">TORNILLO 1:</p>
                            </div>
                            <!-- <div class="d-flex justify-right align-content-center">
                                <label title="Pegar información del tornillo 1" data-p="1" class="btn btn-icon-self material-icons">content_paste_go</label>
                            </div> -->
                        </div>
                        <div class="d-grid g-2">
                            <div class="d-grid g-1 grid-gap-0">
                                <p>Código:</p>
                                <input class="input" type="number" name="codigo_1" id="codigo_1" disabled hidden>
                            </div>
                            <div class="d-grid g-1 grid-gap-0">
                                <p>Producto:</p>
                                <input class="input" type="text" name="producto_1" id="producto_1" disabled hidden>
                            </div>
                        </div>
                        <div class="d-grid g-2">
                            <div class="d-grid g-1 grid-gap-0">
                                <p>Cantidad:</p>
                                <input class="input" type="text" name="cantidad_1" id="cantidad_1" disabled hidden>
                            </div>
                            <div class="d-grid g-1 grid-gap-0">
                                <p>Precio Unitario:</p>
                                <input class="input" type="text" name="precio_1" id="precio_1" disabled hidden>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="pedido_salida">
                    <div class="d-grid g-1 grid-gap-0">
                        <!-- <label for="salida_compra" style="margin: 0px;">Salida de Almacen:</label> -->
                        <select name="salida_compra" id="salida_compra" style="margin-top: 0px;">
                            <option value="">Seleccione una salida de almacen</option>
                        </select>
                    </div>
                    <div id="contenedor_salidas">

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
            <h2>Actualizar Orden de Compra</h2>
            <button class="btn btn-icon-self btn-transparent material-icons" id="close_modal" data-modal="modal-actualizar">close</button>
        </div>
        <div class="contenido_modal">
            <form id="form_act_orden" style="padding: 0px 5px;">
                <!-- <p style="padding: 15px 0px 30px 0px;" class="txt-right">Información general:</p> -->
                <input class="input" type="number" name="Id_Compra_p" id="Id_Compra_p" hidden>
                <div class="d-grid g-2">
                    <div class="d-grid g-1 grid-gap-0">
                        <p>Fecha:</p>
                        <input type="date" name="Fecha_p" id="Fecha_p">
                    </div>
                    <div class="d-grid g-1 grid-gap-0">
                        <p>Empresa:</p>
                        <select name="empresas_p" id="empresas_p">
                            <option value="">Selecciona la empresa</option>
                        </select>
                    </div>
                </div>
                <div class="d-grid g-1">
                    <div class="d-grid g-1 grid-gap-0">
                        <p>Proveedor:</p>
                        <select name="proveedores_p" id="proveedores_p">
                            <option value="">Selecciona un proveedor</option>
                        </select>
                    </div>
                </div>
                <div class="d-grid g-2">
                    <div class="d-grid g-1 grid-gap-0">
                        <p>Solicitado por:</p>
                        <input type="text" name="solicitado_p" id="solicitado_p">
                    </div>
                    <div class="d-grid g-1 grid-gap-0">
                        <p>Terminos de pago:</p>
                        <input type="text" name="terminos_p" id="terminos_p">
                    </div>
                </div>
                <div class="d-grid g-1 grid-gap-0">
                    <p>Contacto:</p>
                    <input type="text" name="contacto_p" id="contacto_p">
                </div>
                <div class="d-grid g-1 grid-gap-0">
                    <button data-btn="insertar" class="btn" id="btn-form-control-registrar">Registrar</button>
                    <label class="btn btn-transparent txt-center" id="btn-form-control-cancel" data-modal="modal-actualizar">Cancelar</label>
                </div>
            </form>
        </div>
    </div>
    <div id="modal-actualizar-tornillo" class="modal modal-derecha">
        <div class="titulo_modal d-flex justify-between align-content-center">
            <h2>Modificar producto</h2>
            <button class="btn btn-icon-self btn-transparent material-icons" id="close_modal" data-modal="modal-actualizar-tornillo">close</button>
        </div>
        <div class="contenido_modal">
            <form id="form_act_orden_pedido" style="padding: 0px 5px;">
                <div id="pedido_compra">
                    <div id="pedido_E">
                        <input type="number" name="id_pedido" id="id_pedido" hidden>
                        <div class="d-grid g-2">
                            <div class="d-grid g-1 grid-gap-0">
                                <p>Código:</p>
                                <input type="number" name="codigo_p" id="codigo_p">
                            </div>
                            <div class="d-grid g-1 grid-gap-0">
                                <p>Producto:</p>
                                <input type="text" name="producto_p" id="producto_p">
                            </div>
                        </div>
                        <div class="d-grid g-2">
                            <div class="d-grid g-1 grid-gap-0">
                                <p>Cantidad:</p>
                                <input type="text" name="cantidad_p" id="cantidad_p">
                            </div>
                            <div class="d-grid g-1 grid-gap-0">
                                <p>Precio Unitario:</p>
                                <input type="text" name="precio_p" id="precio_p">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-grid g-1 grid-gap-0">
                    <button data-btn="insertar" class="btn" id="btn-form-control-registrar">Registrar</button>
                    <label class="btn btn-transparent txt-center" id="btn-form-control-cancel" data-modal="modal-actualizar-tornillo">Cancelar</label>
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
                <div class="d-grid g-1" style="padding: 0px 5px;">
                    <div class="d-grid g-1 grid-gap-0">
                        <p>IVA:</p>
                        <input class="input" type="text" name="costo_iva" id="costo_iva" placeholder="Ingresa el costo del IVA">
                    </div>
                </div>
                <div class="opciones d-flex flex-column">
                    <button data-btn="actualizar" class="btn" id="btn-form-control-actualizar">Actualizar costos</button>
                    <label class="btn btn-transparent txt-center" id="btn-form-control-cancel" data-modal="modal-costos">Cancelar</label>
                </div>
            </form>
        </div>
    </div>
<?php
}
?>

<div id="modal-filtrar" class="modal modal-derecha">
    <div class="titulo_modal d-flex justify-between align-content-center">
        <h2>Filtros</h2>
        <button class="btn btn-icon-self btn-transparent material-icons" id="close_modal" data-modal="modal-filtrar">close</button>
    </div>
    <div class="contenido_modal">
        <form id="form-filtros" style="padding: 0px 5px;">
            <div class="contenedor_filtros">
                <h3>Filtrar Orden de Compra</h3>
                <input type="text" name="tabla" id="tabla" value="v_salidas_almacen" hidden>
                <div class="filtro fecha">
                    <input type="radio" data-radio="radio" name="buscar_por" id="salida" value="salida">
                    <label class="lbl-radio" id="lbl_radio_salida" for="salida">Buscar Orden de Compra:</label>
                    <input class="input" type="number" name="f_salida" id="f_salida" disabled>
                    <input type="radio" data-radio="radio" name="buscar_por" id="rango_salidas" value="rango_salida">
                    <label class="lbl-radio" id="lbl_radio_rango_salida" for="rango_salidas">Filtrar por rango de Orden de Compra: </label>
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
                <h3>Filtrar por proveedor:</h3>
                <div class="filtro fecha">
                    <input type="radio" data-radio="radio" name="buscar_por" id="proveedor_b" value="proveedor_b">
                    <label class="lbl-radio" id="lbl_radio_proveedor_b" for="proveedor_b">Buscar proveedor:</label>
                    <select name="f_proveedor_b" id="f_proveedor_b" class="input" disabled>
                        <option value="">Selecciona un proveedor</option>
                    </select>
                </div>
                <h3>Filtrar por empresa:</h3>
                <div class="filtro fecha">
                    <input type="radio" data-radio="radio" name="buscar_por" id="empresa_b" value="empresa_b">
                    <label class="lbl-radio" id="lbl_radio_empresa_b" for="empresa_b">Buscar empresa:</label>
                    <select name="f_empresa_b" id="f_empresa_b" class="input" disabled>
                        <option value="">Selecciona una empresa</option>
                    </select>
                </div>
                <div class="d-flex flex-column">
                    <button class="btn">Buscar</button>
                </div>
                <div class="d-grid g-2">
                    <label class="btn btn-transparent txt-center" id="limpiar-filtros">Limpiar filtros</label>
                    <label class="btn btn-transparent txt-center" data-modal="modal-filtrar">Cancelar</label>
                </div>
            </div>
        </form>
    </div>
</div>
<div id="modal-historial" class="modal modal-izquierda width-05">
    <div class="titulo_modal d-flex justify-between align-content-center">
        <h2 id="orden_de_compra">Orden de Compra: </h2>
        <button class="btn btn-icon-self btn-transparent material-icons" id="close_modal" data-modal="modal-historial">close</button>
    </div>
    <div class="contenido_modal" style="padding: 0px 5px;">
        <table class="table table_salida lista_salida" id="table">
            <thead>
                <?php if ($_SESSION['cm9s'] == 'Administrativo') { ?>
                    <th style="min-width: 60px;"></th>
                <?php } ?>
                <th style="min-width: 100px;">Codigo</th>
                <th style="min-width: 160px;">Producto</th>
                <th style="min-width: 100px;">Cantidad</th>
                <th style="min-width: 100px;">Precio</th>
            </thead>
            <tbody id="body_historial"></tbody>
        </table>
    </div>
</div>