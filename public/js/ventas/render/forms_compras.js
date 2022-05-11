/**
 * It shows the form for the purchase order.
 */
const mostrar_form_pedido = () => {
    document.getElementById("pedido_salida").style.display = "block";
    document.getElementById("pedido_compra").style.display = "none";
    document.getElementById("mas_menos").style.display = "none";
    cambiar_atributos();
}

/**
 * When the user clicks on the button, the function will hide the first form, show the second form, and
 * then call the function cambiar_atributos()
 */
const mostrar_form_material = () => {
    document.getElementById("pedido_salida").style.display = "none";
    document.getElementById("pedido_compra").style.display = "block";
    document.getElementById("mas_menos").style.display = "grid";
    cambiar_atributos();
}

/**
 * It toggles the hidden and disabled attributes of the elements with the ids codigo_1, producto_1,
 * cantidad_1, precio_1, and salida_compra.
 * @param form - the form that contains the fields
 */
const cambiar_atributos = (form) => {
    document.getElementById("codigo_1").toggleAttribute("hidden");
    document.getElementById("producto_1").toggleAttribute("hidden");
    document.getElementById("cantidad_1").toggleAttribute("hidden");
    document.getElementById("precio_1").toggleAttribute("hidden");

    document.getElementById("codigo_1").toggleAttribute("disabled");
    document.getElementById("producto_1").toggleAttribute("disabled");
    document.getElementById("cantidad_1").toggleAttribute("disabled");
    document.getElementById("precio_1").toggleAttribute("disabled");

    document.getElementById("salida_compra").toggleAttribute("disabled");
    document.getElementById("salida_compra").toggleAttribute("hidden");
}

/**
 * It takes the element with the id "contenedor_salidas" and sets its innerHTML to an empty string.
 */
const vaciar_contenedor = () => {
    const contenedor = document.getElementById("contenedor_salidas");
    contenedor.innerHTML = ''
}

/**
 * It creates a form with a checkbox and some inputs.
 * @param json - is the data that comes from the server, it is an array of objects.
 */
const render_form_tornillo_salida = (json) => {
    const contenedor = document.getElementById('contenedor_salidas')
    cantidad.value = json.length;
    let t = 1;
    json.forEach(el => {
        contenedor.innerHTML += '<div id="pedido_'+t+'"  class="pedido">'+
                                            '<div class="d-grid g-2">'+
                                                '<div class="d-grid g-1">'+
                                                    '<p style="padding: 15px 0px 30px 0px; line-height: 1.2em;" class="txt-left">Descripción: <b>' +el.descripcion + '</b><br>Medida: <b>' + el.medida + '</b><br>Cantidad: <b>' + new Intl.NumberFormat('es-MX').format(el.cantidad) + '</b><br>Acabado: <b>' +el.acabados+ '</b></p>'+
                                                '</div>'+
                                                '<div class="d-flex justify-right align-content-center">'+
                                                    '<input type="checkbox" name="sin_sa_'+t+'" id="sin_sa_'+t+'" value="sin_sa_'+t+'" checked>'+
                                                    '<label class="lbl-checkbox" id="checkbox_'+t+'" for="sin_sa_'+t+'" data-activar="'+t+'" style="margin: 0 0 15px 0;">Con O.C.</label>'+
                                                '</div>'+
                                            '</div>'+
                                            '<div class="d-grid g-2">'+
                                                '<input type="text" name="id_pedido_'+t+'" id="id_pedido_'+t+'" value="'+el.Id_Pedido+'" hidden>'+
                                                '<div class="d-grid g-1 grid-gap-0">'+
                                                    '<p id="t_c_0'+t+'">Código:</p>'+
                                                    '<input type="number" name="codigo_0'+t+'" id="codigo_0'+t+'">'+
                                                '</div>'+
                                                '<div class="d-grid g-1 grid-gap-0">'+
                                                    '<p id="t_po_0'+t+'">Producto:</p>'+
                                                    '<input type="text" name="producto_0'+t+'" id="producto_0'+t+'">'+
                                                '</div>'+
                                            '</div>'+
                                            '<div class="d-grid g-2">'+
                                                '<div class="d-grid g-1 grid-gap-0">'+
                                                    '<p id="t_ca_0'+t+'">Cantidad:</p>'+
                                                    '<input type="text" name="cantidad_0'+t+'" id="cantidad_0'+t+'">'+
                                                '</div>'+
                                                '<div class="d-grid g-1 grid-gap-0">'+
                                                    '<p id="t_pe_0'+t+'">Precio Unitario:</p>'+
                                                    '<input type="text" name="precio_0'+t+'" id="precio_0'+t+'">'+
                                                '</div>'+
                                            '</div>'+
                                        '</div>';
        t++;
    })
}

/**
 * It fetches data from an API, then renders a form with the data.
 * @param id - the id of the sale
 */
const obtener_pedidos_salidas = (id) => {
    const respuesta = fetchAPI('',url+'/ventas/salida/historial?salida='+id,'')
    respuesta.then(json => {
        vaciar_contenedor()
        render_form_tornillo_salida(json.salida)
    })
}

/**
 * It toggles the attribute of the element with the id passed to it.
 * @param id - the id of the row
 */
const activar_desactivar = (id) => {
    document.getElementById('codigo_0'+id).toggleAttribute('disabled')
    document.getElementById('codigo_0'+id).toggleAttribute('hidden')
    document.getElementById('producto_0'+id).toggleAttribute('disabled')
    document.getElementById('producto_0'+id).toggleAttribute('hidden')
    document.getElementById('cantidad_0'+id).toggleAttribute('disabled')
    document.getElementById('cantidad_0'+id).toggleAttribute('hidden')
    document.getElementById('precio_0'+id).toggleAttribute('disabled')
    document.getElementById('precio_0'+id).toggleAttribute('hidden')

    document.getElementById('t_c_0'+id).toggleAttribute('hidden')
    document.getElementById('t_po_0'+id).toggleAttribute('hidden')
    document.getElementById('t_ca_0'+id).toggleAttribute('hidden')
    document.getElementById('t_pe_0'+id).toggleAttribute('hidden')
}

/* Getting the element with the id "salida_compra" and assigning it to the variable select_salidas. */
const select_salidas = document.getElementById("salida_compra");

/* Listening for a change in the select element with the id "salida_compra". When the user changes the
value of the select element, the function obtener_pedidos_salidas() is called. */
select_salidas.addEventListener('change', () => {
    obtener_pedidos_salidas(select_salidas.value)
})