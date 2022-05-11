/* Declaring two variables. */
let proveedores = '';
let empresas = '';

/**
 * It takes a JSON object, and renders it to the DOM.
 * @param json - the json object that is returned from the server
 */
const render_salida = (json) => {
    const body = document.getElementById('table')
    body.innerHTML = ''
    if (json.salidas.length > 0) {
        json.salidas.forEach((el) => {
            let estado = ''
            if (el.estado == 1) {
                estado = 'CANCELADO'
            } else {
                estado = ''
            }
            body.innerHTML += '<tr>'+
                                    '<td style="padding: 5px;">'+
                                        '<div id="'+el.id_folio+'" class="mas_opciones_tablas">'+
                                            '<div class="opcion">'+
                                                '<button data-opciones="'+el.id_folio+'"  class="mas btn btn-icon-self material-icons">more_vert</button>'+
                                            '</div>'+
                                            '<div class="opciones" id="opciones-'+el.id_folio+'">'+
                                                '<button style="margin: 0px 5px 0px 0px;" class="btn btn-amarillo btn-icon-self material-icons-outlined" data-modal="modal-actualizar-salida" data-editar="'+el.id_folio+'">edit</button>'+
                                                '<button style="margin: 0px 5px;" data-salida="'+el.id_folio+'" data-historial="' +el.id_cotizacion +'" class="btn btn-transparent btn-icon-self material-icons" data-modal="modal-historial">toc</button>'+
                                                '<button style="margin: 0px 5px;" class="btn btn-icon-self material-icons-outlined" data-impresion="'+el.id_folio+'">warehouse</button>'+  
                                                '<button style="margin: 0px 0px 0px 5px;" title="Cancelar Salida de Almacen: '+el.id_folio+'" data-cancelar="'+el.id_folio+'" class="btn btn-icon-self material-icons-outlined btn-rojo">do_not_disturb_on</button>'+  
                                            '</div>'+
                                        '</div>'+
                                    '</td>'+
                                    '<td>'+el.id_folio+'</td>'+
                                    '<td>'+el.razon_social+'</td>'+
                                    '<td>'+el.fecha+'</td>'+
                                    '<td>'+estado+'</td>'+
                            '</tr>'
        })
    } else {
        body.innerHTML += '<tr><td colspan="5">No hay salidas de almacen registradas.</td></tr>'
    }
}

/* Getting the form element by its id. */
const form = document.getElementById('form_reg_salida')
const form_act = document.getElementById("form_act_solo_salida");
const form_facura = document.getElementById("form_act_factura");

/* Adding an event listener to the form. When the form is submitted, it will prevent the default action
and call the open_confirm function. */
form.addEventListener('submit', (evt) => {
    evt.preventDefault()
    open_confirm('¿Estas seguro de registrar la salida de almacen?',registrar_salida)
})

/* Adding an event listener to the form_act element. */
form_act.addEventListener('submit', (evt) => {
    evt.preventDefault()
    open_confirm('¿Esta seguro de registrar los cambios?',actualizar_salida)
})

/* Listening for a submit event on the form_facura element. When the event is triggered, it prevents
the default action and calls the open_confirm function. */
form_facura.addEventListener('submit', (evt) => {
    evt.preventDefault()
    open_confirm('¿Estas seguro de registrar esta factura?',registrar_factura)
})

/**
 * It sends a POST request to the server, and if the server responds with a 1, it will clear the form
 * and display a success message.
 */
const registrar_salida = () => {
    const respuesta = fetchAPI(form,url+'/ventas/salida/NuevaSalida','POST')
    respuesta.then(json => {
        if (json == 1) {
            generar_form(0)
            document.getElementById('cotizacion').value=''
            open_alert('Registro exitoso','verde')
            buscar_mes_actual();
            ocultar_compra_general();
        } else {
            open_alert('La salida de almacen no pudo ser registrada','rojo')
        }
    })
}

/**
 * It takes the form data, sends it to the server, and then displays a message based on the response.
 */
const actualizar_salida = () => {
    const respuesta = fetchAPI(form_act,url+'/ventas/salida/actualizar_solo_salida','POST')
    respuesta.then(json => {
        if (json == 1) {
            open_alert('La información fue modificada correctamente','verde')
            buscar_mes_actual();
        } else {
            open_alert('No se pudo modificar la información','rojo')
        }
    })
}

/**
 * It takes the form data from the form_factura form, sends it to the server, and then displays a
 * message based on the response from the server.
 */
const registrar_factura = () => {
    const respuesta = fetchAPI(form_facura,url+'/ventas/salida/registrar_factura','POST')
    respuesta.then(json => {
        if (json == 1) {
            open_alert('La factura fue registrada correctamente','verde')
            buscar_mes_actual();
        } else {
            open_alert('La factura no pudo ser registrada','rojo')
        }
    })
}

/* Getting the element by ID. */
const select_filtros = document.getElementById("f_cliente");
const select_cotizaciones = document.getElementById("cotizacion");
const select_cotizaciones_2 = document.getElementById("Id_Clientes_2_e");

/* Adding an event listener to the select_cotizaciones element. When the value of the
select_cotizaciones element changes, the obtener_pedidos function is called with the value of the
select_cotizaciones element as the argument. */
select_cotizaciones.addEventListener('change', () => {
    obtener_pedidos(select_cotizaciones.value);
})

/**
 * It creates a form with a number of inputs equal to the number passed as an argument.
 * @param cantidad - number of forms to generate
 */
const generar_form = (cantidad) => {
    const contenedor = document.getElementById('tornillos')
    contenedor.innerHTML = ''
    for (let i = 1; i <= cantidad; i++) {
        contenedor.innerHTML += '<div class="tornillo" id="tornillo-'+i+'">'+
                                    '<div class="d-grid g-1">'+
                                        '<div class="d-grid">'+
                                            '<p style="padding: 15px 0px 5px 0px;" id="pedido-'+i+'">Descripción y Medida</p>'+
                                        '</div>'+
                                        '<div class="d-grid g-3">'+
                                            '<input type="radio" name="radio_0'+i+'" id="stock_'+i+'" value="stock_'+i+'" checked>'+
                                            '<label class="lbl-radio" data-pedido="'+i+'" data-stock="true" id="lbl_checkbox_salida" for="stock_'+i+'" style="margin: 0 0 15px 0;">Stock</label>'+
                                            '<input type="radio" name="radio_0'+i+'" id="op_'+i+'" value="op_'+i+'">'+
                                            '<label class="lbl-radio" data-pedido="'+i+'" data-op="true" id="lbl_checkbox_salida" for="op_'+i+'" style="margin: 0 0 15px 0;">O.P.</label>'+
                                            '<input type="radio" name="radio_0'+i+'" id="compra_'+i+'" value="compra_'+i+'">'+
                                            '<label class="lbl-radio" data-pedido="'+i+'" data-compra="true" id="lbl_checkbox_salida" for="compra_'+i+'" style="margin: 0 0 15px 0;">Compra</label>'+
                                        '</div>'+
                                    '</div>'+
                                    '<div class="d-grid g-1 grid-gap-0">'+
                                        '<input class="input" type="text" name="pedido_'+i+'" id="pedido_'+i+'"  hidden>'+
                                        '<div class="d-grid g-1 grid-gap-0" id="contenedor_op_'+i+'">'+
                                            '<p id="t_kardex_'+i+'">Kardex:</p>'+
                                            '<input class="input" type="text" name="Kardex_'+i+'" id="Kardex_'+i+'" placeholder="Ingrese el kardex">'+
                                        '</div>'+
                                        '<div class="d-grid g-2" id="contenedor_op_'+i+'">'+
                                            '<div class="d-grid g-1 grid-gap-0">'+
                                                '<p id="t_plano_'+i+'" hidden>No. de Dibujo:</p>'+
                                                '<input class="input" type="text" name="Dibujo_'+i+'" id="Dibujo_'+i+'" placeholder="Ingrese el numero de plano" hidden disabled>'+
                                            '</div>'+
                                            '<div class="d-grid g-1 grid-gap-0">'+
                                                '<p id="t_cantidad_'+i+'" hidden>Cantidad a Producir (millares):</p>'+
                                                '<input class="input" type="number" name="cantidad_producir_'+i+'" id="cantidad_producir_'+i+'" hidden disabled>'+
                                            '</div>'+
                                        '</div>'+
                                        '<div class="d-grid g-1 grid-gap-0">'+
                                            '<input type="checkbox" name="general_00[]" id="compra_general_00'+i+'" disabled checked>'+
                                            '<label class="lbl-checkbox"data-general="'+i+'" data-pedido="'+i+'" id="t_compra_general_00'+i+'" for="compra_general_00'+i+'" style="margin: 0 0 15px 0; display: none; grid-column: 1 / 3;">Orden de Compra General</label>'+
                                        '</div>'+
                                        '<div class="d-grid g-2" id="contenedor_compra_'+i+'" style="display: none;">'+
                                            '<div class="d-grid g-1 grid-gap-0">'+
                                                '<p id="t_proveedor_'+i+'" hidden>Proveedor:</p>'+
                                                '<select class="input" name="Proveedor_'+i+'" id="Proveedor_'+i+'" style="margin: 15px 0px 0px 0px;" hidden disabled>'+
                                                    '<option value="">Seleccione el proveedor</option>'+
                                                '</select>'+
                                            '</div>'+
                                            '<div class="d-grid g-1 grid-gap-0">'+
                                                '<p id="t_empresa_'+i+'" hidden>Empresa:</p>'+
                                                '<select class="input" name="empresa_'+i+'" id="empresa_'+i+'" style="margin: 15px 0px 0px 0px;" hidden disabled>'+
                                                    '<option value="">Seleccione la empresa</option>'+
                                                '</select>'+
                                            '</div>'+
                                            '<div class="d-grid g-1 grid-gap-0">'+
                                                '<p id="t_solicitado_'+i+'" hidden>Solicitado por:</p>'+
                                                '<input class="input" type="text" name="solicitado_'+i+'" id="solicitado_'+i+'" style="margin: 15px 0px 0px 0px;" hidden disabled>'+
                                            '</div>'+
                                            '<div class="d-grid g-1 grid-gap-0">'+
                                                '<p id="t_terminos_'+i+'" hidden>Terminos de pago:</p>'+
                                                '<input class="input" type="text" name="terminos_'+i+'" id="terminos_'+i+'" style="margin: 15px 0px 0px 0px;" hidden disabled>'+
                                            '</div>'+
                                            '<div class="d-grid g-1 grid-gap-0">'+
                                                '<p id="t_contacto_'+i+'" hidden>Contacto:</p>'+
                                                '<input class="input" type="text" name="contacto_'+i+'" id="contacto_'+i+'" hidden disabled>'+
                                            '</div>'+
                                        '</div>'+
                                        '<div class="d-grid g-2 grid-gap-0" id="contenedor_pedido_'+i+'">'+
                                            '<div class="d-grid g-1 grid-gap-0">'+
                                                '<p id="t_codigo_'+i+'" hidden>Código:</p>'+
                                                '<input class="input" type="text" name="codigo_'+i+'" id="codigo_'+i+'" style="margin: 15px 0px 0px 0px;" hidden disabled>'+
                                            '</div>'+
                                            '<div class="d-grid g-1 grid-gap-0">'+
                                                '<p id="t_producto_'+i+'" hidden>Producto:</p>'+
                                                '<input class="input" type="text" name="producto_'+i+'" id="producto_'+i+'" style="margin: 15px 0px 0px 0px;" hidden disabled>'+
                                            '</div>'+
                                            '<div class="d-grid g-1 grid-gap-0">'+
                                                '<p id="t_cantidad_c_'+i+'" hidden>Cantidad:</p>'+
                                                '<input class="input" type="text" name="cantidad_'+i+'" id="cantidad_'+i+'" hidden disabled>'+
                                            '</div>'+
                                            '<div class="d-grid g-1 grid-gap-0">'+
                                                '<p id="t_precio_'+i+'" hidden>Precio:</p>'+
                                                '<input class="input" type="text" name="precio_'+i+'" id="precio_'+i+'" hidden disabled>'+
                                            '</div>'+
                                        '</div>'+
                                    '</div>'+
                                '</div>'
    }
} 

/**
 * It takes a JSON object and assigns the values to the corresponding HTML elements.
 * @param json - is the array of objects that I'm getting from the database.
 */
const asignar_valores = (json) => {
    let i = 1;
    json.forEach(el => {
        document.getElementById('pedido_'+i).value = el.Id_Pedido;
        document.getElementById('pedido-'+i).innerText = '( ' + el.cantidad + ' ) ' + el.descripcion + ' ' + el.medida;
        document.getElementById('compra_general_00'+i).value = el.Id_Pedido
        i++;
    })
}

/**
 * It removes the hidden attribute from the elements with the id's of proveedor_general,
 * empresa_general, solicitado_general, terminos_general, and contacto_general.
 * 
 * It also removes the disabled attribute from the elements with the id's of proveedor_general,
 * empresa_general, solicitado_general, terminos_general, and contacto_general.
 * 
 * The function is called when the user clicks on the button with the id of mostrar_compra_general.
 * 
 * The button with the id of mostrar_compra_general is inside of a div with the id of
 * contenedor_compra_general.
 * 
 * The div with the id of contenedor_compra_general is inside of a div with the id of
 * contenedor_compra_general_padre.
 * 
 * The div with
 */
const mostrar_compra_general = () => {
    const contenedor = document.getElementById("contenedor_compra_general");
    contenedor.style.display = 'grid';

    const proveedor_general = document.getElementById('proveedor_general')
    const empresa_general = document.getElementById('empresa_general')
    const solicitado_general = document.getElementById('solicitado_general')
    const terminos_general = document.getElementById('terminos_general')
    const contacto_general = document.getElementById('contacto_general')

    proveedor_general.removeAttribute('hidden');
    empresa_general.removeAttribute('hidden');
    solicitado_general.removeAttribute('hidden');
    terminos_general.removeAttribute('hidden');
    contacto_general.removeAttribute('hidden');

    proveedor_general.removeAttribute('disabled');
    empresa_general.removeAttribute('disabled');
    solicitado_general.removeAttribute('disabled');
    terminos_general.removeAttribute('disabled');
    contacto_general.removeAttribute('disabled');
}

/**
 * It takes the data from the promises and renders it to the DOM.
 */
const render_info_compra = () => {
    empresas.then(json => {
        empresa_general.innerHTML = '<option value="">Selecciona una empresa</option>'
        json.forEach(el => {
            empresa_general.innerHTML += '<option value="'+el.Id_Empresa+'">'+el.Empresa+'</option>';
        })
    })

    proveedores.then(json => {
        proveedor_general.innerHTML = '<option value="">Selecciona una empresa</option>'
        json.forEach(el => {
            proveedor_general.innerHTML += '<option value="'+el.Id_Proveedor+'">'+el.Proveedor+'</option>';
        })
    })
}

/**
 * It hides the div with id "contenedor_compra_general" and disables the inputs with the ids
 * "proveedor_general", "empresa_general", "solicitado_general", "terminos_general", and
 * "contacto_general".
 */
const ocultar_compra_general = () => {
    const contenedor = document.getElementById("contenedor_compra_general");
    contenedor.style.display = 'none';

    const proveedor_general = document.getElementById('proveedor_general')
    const empresa_general = document.getElementById('empresa_general')
    const solicitado_general = document.getElementById('solicitado_general')
    const terminos_general = document.getElementById('terminos_general')
    const contacto_general = document.getElementById('contacto_general')

    proveedor_general.setAttribute("hidden", "");
    empresa_general.setAttribute("hidden", "");
    solicitado_general.setAttribute("hidden", "");
    terminos_general.setAttribute("hidden", "");
    contacto_general.setAttribute("hidden", "");
    proveedor_general.setAttribute("disabled", "");
    empresa_general.setAttribute("disabled", "");
    solicitado_general.setAttribute("disabled", "");
    terminos_general.setAttribute("disabled", "");
    contacto_general.setAttribute("disabled", "");  
}

/**
 * If the checkbox is checked, show the div and populate the select elements with the data from the
 * promises. If the checkbox is unchecked, hide the div and clear the select elements.
 * @param id - the id of the element that is being checked.
 */
const compra_independiente = (id) => {
    const compra_general_00 = document.getElementById("compra_general_00" + id);
    const proveedor = document.getElementById("Proveedor_" + id);
    const empresa = document.getElementById("empresa_" + id);
    const solicitado = document.getElementById("solicitado_" + id);
    const terminos = document.getElementById("terminos_" + id);
    const contacto = document.getElementById("contacto_" + id);
    const t_proveedor = document.getElementById("t_proveedor_" + id);
    const t_empresa = document.getElementById("t_empresa_" + id);
    const t_solicitado = document.getElementById("t_solicitado_" + id);
    const t_terminos = document.getElementById("t_terminos_" + id);
    const t_contacto = document.getElementById("t_contacto_" + id);

    if (compra_general_00.checked) {
        document.getElementById("contenedor_compra_"+id).style.display = 'grid';
        document.getElementById("contenedor_compra_"+id).classList.remove('grid-gap-0')
        document.getElementById("contenedor_compra_"+id).classList.remove('aux')

        t_proveedor.removeAttribute("hidden");
        proveedor.removeAttribute("hidden");
        proveedor.removeAttribute("disabled");
    
        t_empresa.removeAttribute("hidden");
        empresa.removeAttribute("hidden");
        empresa.removeAttribute("disabled");
    
        t_solicitado.removeAttribute("hidden");
        solicitado.removeAttribute("hidden");
        solicitado.removeAttribute("disabled");
    
        t_terminos.removeAttribute("hidden");
        terminos.removeAttribute("hidden");
        terminos.removeAttribute("disabled");
    
        t_contacto.removeAttribute("hidden");
        contacto.removeAttribute("hidden");
        contacto.removeAttribute("disabled");

        empresas.then(json => {
            empresa.innerHTML = '<option value="">Selecciona una empresa</option>'
            json.forEach(el => {
                empresa.innerHTML += '<option value="'+el.Id_Empresa+'">'+el.Empresa+'</option>';
            })
        })

        proveedores.then(json => {
            proveedor.innerHTML = '<option value="">Selecciona una empresa</option>'
            json.forEach(el => {
                proveedor.innerHTML += '<option value="'+el.Id_Proveedor+'">'+el.Proveedor+'</option>';
            })
        })
    } else {
        document.getElementById("contenedor_compra_"+id).style.display = 'none';
        document.getElementById("contenedor_compra_"+id).classList.add('grid-gap-0')
        document.getElementById("contenedor_compra_"+id).classList.add('aux')
        t_proveedor.setAttribute("hidden", "");
        proveedor.setAttribute("hidden", "");
        proveedor.setAttribute("disabled", "");

        t_empresa.setAttribute("hidden", "");
        empresa.setAttribute("hidden", "");
        empresa.setAttribute("disabled", "");

        t_solicitado.setAttribute("hidden", "");
        solicitado.setAttribute("hidden", "");
        solicitado.setAttribute("disabled", "");

        t_terminos.setAttribute("hidden", "");
        terminos.setAttribute("hidden", "");
        terminos.setAttribute("disabled", "");

        t_contacto.setAttribute("hidden", "");
        contacto.setAttribute("hidden", "");
        contacto.setAttribute("disabled", "");
    }
}

/**
 * It removes the hidden attribute from the elements with the id's that are passed to it.
 * @param id - the id of the row
 */
const mostrar_compra = (id) => {
    const contenedor = document.getElementById('contenedor_compra_'+id)
    const contenedor_pedido = document.getElementById("contenedor_pedido_" + id);
    const compra_general_00 = document.getElementById("compra_general_00" + id);
    const t_compra_general_00 = document.getElementById("t_compra_general_00" + id);
    const codigo = document.getElementById("codigo_" + id);
    const producto = document.getElementById("producto_" + id);
    const cantidad = document.getElementById("cantidad_" + id);
    const precio = document.getElementById("precio_" + id);
    const t_codigo = document.getElementById("t_codigo_" + id);
    const t_producto = document.getElementById("t_producto_" + id);
    const t_cantidad = document.getElementById("t_cantidad_c_" + id);
    const t_precio = document.getElementById("t_precio_" + id);
    
    contenedor.classList.remove('grid-gap-0');
    contenedor_pedido.classList.remove("grid-gap-0");

    compra_general_00.removeAttribute("disabled");
    t_compra_general_00.removeAttribute("hidden");
    t_compra_general_00.style.display = "block";

    t_codigo.removeAttribute("hidden");
    codigo.removeAttribute("hidden");
    codigo.removeAttribute("disabled");

    t_producto.removeAttribute("hidden");
    producto.removeAttribute("hidden");
    producto.removeAttribute("disabled");

    t_cantidad.removeAttribute("hidden");
    cantidad.removeAttribute("hidden");
    cantidad.removeAttribute("disabled");

    t_precio.removeAttribute("hidden");
    precio.removeAttribute("hidden");
    precio.removeAttribute("disabled");
}

/**
 * It hides a bunch of elements.
 * @param id - the id of the row
 */
const ocultar_compra = (id) => {
    const contenedor = document.getElementById("contenedor_compra_" + id);
    const contenedor_pedido = document.getElementById("contenedor_pedido_" + id);
    const compra_general_00 = document.getElementById("compra_general_00" + id);
    const t_compra_general_00 = document.getElementById("t_compra_general_00" + id);
    const proveedor = document.getElementById("Proveedor_" + id);
    const empresa = document.getElementById("empresa_" + id);
    const solicitado = document.getElementById("solicitado_" + id);
    const terminos = document.getElementById("terminos_" + id);
    const contacto = document.getElementById("contacto_" + id);
    const codigo = document.getElementById("codigo_" + id);
    const producto = document.getElementById("producto_" + id);
    const cantidad = document.getElementById("cantidad_" + id);
    const precio = document.getElementById("precio_" + id);
    const t_proveedor = document.getElementById("t_proveedor_" + id);
    const t_empresa = document.getElementById("t_empresa_" + id);
    const t_solicitado = document.getElementById("t_solicitado_" + id);
    const t_terminos = document.getElementById("t_terminos_" + id);
    const t_contacto = document.getElementById("t_contacto_" + id);
    const t_codigo = document.getElementById("t_codigo_" + id);
    const t_producto = document.getElementById("t_producto_" + id);
    const t_cantidad = document.getElementById("t_cantidad_c_" + id);
    const t_precio = document.getElementById("t_precio_" + id);

    contenedor.classList.add("grid-gap-0");
    contenedor_pedido.classList.add("grid-gap-0");

    compra_general_00.setAttribute("disabled",'');
    t_compra_general_00.setAttribute("hidden",'');
    t_compra_general_00.style.display = 'none';

    t_proveedor.setAttribute("hidden",'');
    proveedor.setAttribute("hidden",'');
    proveedor.setAttribute("disabled",'');

    t_empresa.setAttribute("hidden",'');
    empresa.setAttribute("hidden",'');
    empresa.setAttribute("disabled",'');

    t_solicitado.setAttribute("hidden",'');
    solicitado.setAttribute("hidden",'');
    solicitado.setAttribute("disabled",'');

    t_terminos.setAttribute("hidden",'');
    terminos.setAttribute("hidden",'');
    terminos.setAttribute("disabled",'');

    t_contacto.setAttribute("hidden",'');
    contacto.setAttribute("hidden",'');
    contacto.setAttribute("disabled",'');

    t_codigo.setAttribute("hidden",'');
    codigo.setAttribute("hidden",'');
    codigo.setAttribute("disabled",'');

    t_producto.setAttribute("hidden",'');
    producto.setAttribute("hidden",'');
    producto.setAttribute("disabled",'');

    t_cantidad.setAttribute("hidden",'');
    cantidad.setAttribute("hidden",'');
    cantidad.setAttribute("disabled",'');

    t_precio.setAttribute("hidden",'');
    precio.setAttribute("hidden",'');
    precio.setAttribute("disabled",'');
}

/**
 * When the user clicks on the button, the table and the button will be displayed.
 * @param id - the id of the row in the table
 */
const mostrar_kardex = (id) => {
    const kardex = document.getElementById("Kardex_" + id);
    const t_kardex = document.getElementById("t_kardex_" + id);

    t_kardex.removeAttribute("hidden");
    kardex.removeAttribute("hidden");
    kardex.removeAttribute("disabled");
}

/**
 * It takes an id as a parameter, finds the element with that id, and sets the hidden and disabled
 * attributes on it.
 * @param id - the id of the row
 */
const ocultar_kardex = (id) => {
    const kardex = document.getElementById("Kardex_" + id);
    const t_kardex = document.getElementById("t_kardex_" + id);

    t_kardex.setAttribute("hidden", "");
    kardex.setAttribute("hidden", "");
    kardex.setAttribute("disabled", "");
}

/**
 * It removes the hidden attribute from the elements with the IDs t_plano_id and t_cantidad_id, and
 * removes the hidden and disabled attributes from the elements with the IDs Dibujo_id and
 * cantidad_producir_id.
 * @param id - the id of the row
 */
const mostrar_op = (id) => {
    const plano = document.getElementById("Dibujo_" + id);
    const cantidad = document.getElementById("cantidad_producir_" + id);
    const t_plano = document.getElementById("t_plano_" + id);
    const t_cantidad = document.getElementById("t_cantidad_" + id);

    t_plano.removeAttribute("hidden");
    plano.removeAttribute("hidden");
    plano.removeAttribute("disabled");
    
    t_cantidad.removeAttribute("hidden");
    cantidad.removeAttribute("hidden");
    cantidad.removeAttribute("disabled");
}

/**
 * It hides the elements with the given id.
 * @param id - the id of the row
 */
const ocultar_op = (id) => {
    const plano = document.getElementById("Dibujo_" + id);
    const cantidad = document.getElementById("cantidad_producir_" + id);
    const t_plano = document.getElementById("t_plano_" + id);
    const t_cantidad = document.getElementById("t_cantidad_" + id);

    t_plano.setAttribute("hidden", "");
    plano.setAttribute("hidden", "");
    plano.setAttribute("disabled", "");
    t_cantidad.setAttribute("hidden", "");
    cantidad.setAttribute("hidden", "");
    cantidad.setAttribute("disabled", "");
}


const cancelar_salida = (id) => {
    auxiliar = id
    open_confirm('¿Desea cancelar esta salida de almacen?',cancelar)
}

/**
 * It sends a request to the server to cancel a sale, and if the server responds with a 1, it displays
 * a message to the user.
 */
const cancelar = () => {
    const respuesta = fetchAPI('', url+'/ventas/salida/cancelar_salida?id='+auxiliar, '')
    respuesta.then(json =>{ 
        if (json == 1) {
            open_alert('Salida de almacen '+auxiliar+' ha sido cancelada correctamente','naranja')
            buscar_mes_actual();
        } else{
            open_alert('No se pudo cancelar esta salida de almacen','rojo')
        }
    })
}

/**
 * It takes a JSON object, and then it sets the value of an input field to the length of the JSON
 * object, then it calls a function to generate a form, and then it calls a function to assign values
 * to the form.
 * @param json - is the data that I'm getting from the server
 */
const render_pedidos = (json) => {
    document.getElementById('cantidad_tornillos').value = json.length
    generar_form(json.length)
    asignar_valores(json)
}

/**
 * It takes a JSON object and renders it as HTML.
 * @param json - is the data that I'm getting from the server.
 */
const render_cotizaciones = (json) => {
    select_cotizaciones.innerHTML = '<option id="concepto-opcion" value="">Selecciona una cotización</option>';
    json.forEach(el => {
        select_cotizaciones.innerHTML += '<option value="'+el.id_cotizacion+'">'+ el.id_cotizacion + ' - '+el.razon_social+'</option>'
    });
}

/**
 * It's a function that makes a fetch request to a server, and then adds the response to a select
 * element.
 */
const obtener_clientes = () => {
    const respuesta = fetchAPI("", url + "/ventas/salida/obtener_clientes", "");
    respuesta.then((json) => {
        json.forEach((el) => {
            select_filtros.innerHTML +='<option value="' +el.Razon_social+'">' +el.Razon_social +"</option>";
        });
    });
};

/**
 * It takes a JSON object and renders it as an HTML select element.
 * @param json - is the data that I'm getting from the server.
 */
const render_ordenes_compra = (json) => {
    select_cotizaciones.innerHTML = '<option id="concepto-opcion" value="">Selecciona una orden de compra</option>';
    json.forEach(el => {
        select_cotizaciones.innerHTML += '<option value="'+el.Id_Compra+'">'+ el.Id_Compra + ' - '+el.Empresa+'</option>'
    });
}

/**
 * It fetches data from an API and then renders it to the page.
 * @param id - the id of the client
 */
const obtener_pedidos = (id) => {
    const respuesta = fetchAPI('',url+'/ventas/cotizacion/historial?id='+id,'')
    respuesta.then(json => {
        render_pedidos(json)
    })
}

/**
 * It takes an id, makes a fetch request, and then sets the value of two inputs to the values of two
 * properties of the response.
 * @param id - id of the row that was clicked
 */
const obtener_salida = (id) => {
    const respuesta = fetchAPI('',url+'/ventas/salida/obtener_salida?aux='+id,'')
    respuesta.then(json => {
        json.forEach(el => {
            document.getElementById("Salida_e").value = el.Id_Folio;
            document.getElementById('Fecha_e').value = el.Fecha
        })
    })
}

/**
 * It fetches data from a server and then renders it to the page.
 */
const obtener_cotizaciones = () => {
    const respuesta = fetchAPI('',url+'/ventas/cotizacion/obtener_cotizaciones','')
    respuesta.then(json => {
        render_cotizaciones(json)
    })
}

/**
 * It fetches data from an API and then renders it to the DOM.
 */
const obtener_ordenes_compra = () => {
    const respuesta = fetchAPI('',url+'/ventas/compras/obtener','')
    respuesta.then(json => {
        render_ordenes_compra(json)
    })
}

/**
 * It fetches data from a server and stores it in a variable.
 */
const obtener_proveedores = () => {
    const respuesta = fetchAPI('', url+'/ventas/compras/obtener_proveedores','')
    proveedores = respuesta;
}

/**
 * It fetches data from a server and stores it in a variable.
 */
const obtener_empresas = () => {
    const respuesta = fetchAPI('',url+'/ventas/compras/obtener_empresas','')
    empresas = respuesta;
}

/**
 * It takes the current date, formats it to a string, splits it into an array, then adds the elements
 * of the array to a string in the format YYYY-MM-DD.
 */
const colocar_fecha = () => {
    const fecha = new Date();
    const local = fecha.toLocaleDateString();
    const arr = local.split('/')
    let aux = arr[2]

    if (parseInt(arr[1]) >= 10) {
        aux += '-' + arr[1];
    } else {
        aux += '-0' + arr[1];
    }

    if (parseInt(arr[0]) >= 10) {
        aux += '-' + arr[0];
    } else {
        aux += '-0' + arr[0];
    }
    
    document.getElementById('Fecha').value = aux
}

/* Adding an event listener to the document. */
document.addEventListener('click', (evt) => {
    let cantidad = document.getElementsByClassName("aux");
    if (evt.target.dataset.pedido) {
        if (evt.target.dataset.stock) {
            document.getElementById('contenedor_compra_'+evt.target.dataset.pedido).classList.remove('aux')
            cantidad = document.getElementsByClassName("aux");
            ocultar_compra(evt.target.dataset.pedido);
            ocultar_op(evt.target.dataset.pedido);
            mostrar_kardex(evt.target.dataset.pedido);
            if (cantidad.length == 0) {
                ocultar_compra_general()
            }
        } else if (evt.target.dataset.op) {
            document.getElementById('contenedor_compra_'+evt.target.dataset.pedido).classList.remove('aux')
            cantidad = document.getElementsByClassName("aux");
            ocultar_compra(evt.target.dataset.pedido);
            mostrar_op(evt.target.dataset.pedido);
            mostrar_kardex(evt.target.dataset.pedido);
            if (cantidad.length == 0) {
                ocultar_compra_general()
            }
        } else if (evt.target.dataset.compra) {
            ocultar_op(evt.target.dataset.pedido);
            mostrar_kardex(evt.target.dataset.pedido);
            mostrar_compra(evt.target.dataset.pedido);
            cantidad = document.getElementsByClassName("aux");
            if (cantidad.length == 0) {
                mostrar_compra_general(evt.target.dataset.pedido);
            } 
        } else if (evt.target.dataset.general) {
            compra_independiente(evt.target.dataset.general);
            cantidad = document.getElementsByClassName("aux");
            if (cantidad.length > 0) {
                mostrar_compra_general();
            } else {
                ocultar_compra_general()
            }
        }
    } else if (evt.target.dataset.editar) {
        obtener_salida(evt.target.dataset.editar);
    } else if (evt.target.dataset.cancelar) {
        cancelar_salida(evt.target.dataset.cancelar)
    } else if (evt.target.dataset.factura) {
        document.getElementById('pedido_factura').value = evt.target.dataset.factura;
        document.getElementById('cantidad_factura').value = new Intl.NumberFormat("es-MX").format(evt.target.dataset.cantidad);
        document.getElementById('kilos_factura').value = parseFloat(evt.target.dataset.cantidad * evt.target.dataset.factor);
        empresas.then(json => {
            document.getElementById('empresa_factura').innerHTML = '<option value="">Selecciona una empresa</option>'
            json.forEach(el => {
                document.getElementById('empresa_factura').innerHTML += '<option value="'+el.Id_Empresa+'">'+el.Empresa+'</option>';
            })
        })
    }
})

/* Adding an event listener to the DOMContentLoaded event. */
document.addEventListener('DOMContentLoaded', () => {
    obtener_cotizaciones()
    obtener_clientes();
    colocar_fecha();
    obtener_proveedores();
    obtener_empresas();
    render_info_compra();
})