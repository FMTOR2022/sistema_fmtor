/* Getting the element with the id of Cantidad_Tornillos and the element with the id of tornillos. */
const cantidad = document.getElementById('Cantidad_Tornillos');
const contenedor_tornillos = document.getElementById('tornillos');

/**
 * It creates a new div element, adds some HTML to it, and then appends it to the DOM.
 * @param cantidad_t - the number of screws that are already created
 */
const render_nuevo_tornillo = (cantidad_t) => {
    let t = cantidad_t + 1;
    cantidad.value = cantidad_t
    const tornillo = document.createElement('div');
    tornillo.classList.add('tornillo');
    tornillo.setAttribute('id','tornillo-'+t);
    document.getElementById("cantidad_tornillos_pedidos").innerText = 'Información del tornillo ('+t+'):';
    tornillo.innerHTML +=   '<div class="d-grid g-2">'+
                                                '<div class="d-grid g-1">'+
                                                    '<p style="padding: 15px 0px 30px 0px;" class="txt-left">TORNILLO '+t+':</p>'+
                                                '</div>'+
                                                '<div class="d-flex justify-right align-content-center">'+
                                                    '<label title="Pegar información del tornillo '+t+'" data-p="'+t+'" class="btn btn-icon-self material-icons">content_paste_go</label>'+
                                                '</div>'+
                                            '</div>'+
                                            '<div class="d-grid g-1">'+
                                                '<div class="d-grid g-1 grid-gap-0">'+
                                                    '<p>Fecha de entrega :</p>'+
                                                    '<input class="input" type="date" name="Fecha_entrega_'+t+'" id="Fecha_entrega_'+t+'">'+
                                                '</div>'+
                                            '</div>'+
                                            '<div class="d-grid g-3">'+
                                                '<div class="d-grid g-1 grid-gap-0">'+
                                                    '<p>No. Parte cliente:</p>'+
                                                    '<input class="input" type="text" name="Codigo_'+t+'" id="Codigo_'+t+'" placeholder="Ingrese el codigo">'+
                                                '</div>'+
                                                '<div class="d-grid g-1 grid-gap-0">'+
                                                    '<p>Pedido Cliente:</p>'+
                                                    '<input class="input" type="text" name="Pedido_pza_'+t+'" id="Pedido_pza_'+t+'">'+
                                                '</div>'+
                                                '<div class="d-grid g-1 grid-gap-0">'+
                                                    '<p>Cantidad (millares):</p>'+
                                                    '<input class="input" type="text" name="Cantidad_millares_'+t+'" id="Cantidad_millares_'+t+'">'+
                                                '</div>'+
                                            '</div>'+
                                            '<div class="d-grid g-3">'+
                                                '<div class="d-grid g-1 grid-gap-0">'+
                                                    '<p>Descripcion:</p>'+
                                                    '<input type="text" class="input" name="Descripcion_'+t+'" id="Descripcion_'+t+'">'+
                                                '</div>'+
                                                '<div class="d-grid g-1 grid-gap-0">'+
                                                    '<p>Medida:</p>'+
                                                    '<input class="input" type="text" name="Medida_'+t+'" id="Medida_'+t+'">'+
                                                '</div>'+
                                                '<div class="d-grid g-1 grid-gap-0">'+
                                                    '<p>Factor:</p>'+
                                                    '<input class="input" type="text" name="factor_'+t+'" id="factor_'+t+'">'+
                                                '</div>'+
                                            '</div>'+
                                            '<div class="d-grid g-1">'+
                                                '<div class="d-grid g-1 grid-gap-0">'+
                                                    '<p>Acabado:</p>'+
                                                    '<select class="input" name="Acabado_'+t+'" id="Acabado_'+t+'">'+
                                                        '<option value="">Selecciona un acabado</option>'+
                                                        '<option value="TROPICALIZADO">TROPICALIZADO</option>'+
                                                        '<option value="GALVANIZADO BLANCO">GALVANIZADO Blanco</option>'+
                                                        '<option value="GALVANIZADO AZUL">GALVANIZADO Azul/GALVANIZADO Electrolitico Azul</option>'+
                                                        '<option value="ZINCADO NEGRO">ZINCADO NEGRO</option>'+
                                                        '<option value="NÍQUEL">NÍQUEL</option>'+
                                                        '<option value="PULIDO">PULIDO</option>'+
                                                        '<option value="PAVONADO">PAVONADO</option>'+
                                                        '<option value="LATÓNADO">LATÓNADO</option>'+
                                                        '<option value="COBRE">COBRE</option>'+
                                                        '<option value="VERDE VIEJO">VERDE VIEJO</option>'+
                                                        '<option value="VERDE OLIVO">VERDE OLIVO</option>'+
                                                    '</select>'+
                                                '</div>'+
                                                // '<div class="d-grid g-1 grid-gap-0">'+
                                                //     '<p>Material:</p>'+
                                                //     '<input class="input" type="text" name="Material_'+t+'" id="Material_'+t+'">'+
                                                // '</div>'+
                                            '</div>'+
                                            '<div class="d-grid g-2">'+
                                                '<div class="d-flex justify-center align-content-center">'+
                                                    '<div class="d-grid g-1 grid-gap-0">'+
                                                        '<input type="checkbox" name="tratamiento_'+t+'" id="tratamiento_'+t+'" >'+
                                                        '<label class="lbl-checkbox"  for="tratamiento_'+t+'">T / Termico</label>'+
                                                    '</div>'+
                                                '</div>'+
                                                '<div class="d-flex justify-center align-content-center">'+
                                                    '<div class="d-grid g-1 grid-gap-0">'+
                                                        '<p>Costo:</p>'+
                                                        '<input class="input" type="text" name="Precio_millar_'+t+'" id="Precio_millar_'+t+'" value="0.0">'+
                                                    '</div>'+
                                                    '<label data-calcular="'+t+'" class="btn btn-icon-self material-icons" title="Obtener Costo" style="margin: 0px 0px 0px 5px;">attach_money</label>'+
                                                '</div>'+
                                            '</div>';
    contenedor_tornillos.appendChild(tornillo)
}

/* Getting the elements with the class name 'tornillo' */
const cantidad_tornillos = document.getElementsByClassName('tornillo')

/**
 * It adds a new screw to the list of screws.
 */
const tornillo_mas = () => {
    render_nuevo_tornillo(cantidad_tornillos.length)
    cantidad.value = cantidad_tornillos.length
} 

/**
 * It removes the last child of the div with the id "contenedor_tornillos" and updates the text of the
 * element with the id "cantidad_tornillos_pedidos" to reflect the new number of children.
 */
const tornillo_menos = () => {
    let tornillos = cantidad_tornillos.length
    if ((tornillos - 1) >= 1) {
        contenedor_tornillos.removeChild(contenedor_tornillos.lastChild)
        tornillos = cantidad_tornillos.length;
        document.getElementById("cantidad_tornillos_pedidos").innerHTML = 'Información del tornillo ('+(tornillos)+'):';
        cantidad.value = (tornillos)
    } else {
        open_alert('Una salida de almacen requiere por lo menos de un tornillo','naranja')
    }
}

/**
 * This function empties the contents of the container that holds the screws.
 */
const vaciar_tornillos = () => {
    contenedor_tornillos.innerHTML = "";
}

/**
 * It creates a form with the number of inputs that the user has selected.
 * @param c - is the number of screws that the user wants to add.
 */
const render_form_tornillo = (c) => {
   vaciar_tornillos()
    cantidad.value = c
    document.getElementById("cantidad_tornillos_pedidos").innerText = 'Información del tornillo ('+c+'):';
    for (let t = 1; t <= c; t++) {
        contenedor_tornillos.innerHTML += '<div class="tornillo" id="tornillo-'+t+'">'+
                                            '<div class="d-grid g-2">'+
                                                '<div class="d-grid g-1">'+
                                                    '<p style="padding: 15px 0px 30px 0px;" class="txt-left">TORNILLO '+t+':</p>'+
                                                '</div>'+
                                                '<div class="d-flex justify-right align-content-center">'+
                                                    '<label title="Pegar información del tornillo '+t+'" data-p="'+t+'" class="btn btn-icon-self material-icons">content_paste_go</label>'+
                                                '</div>'+
                                            '</div>'+
                                            '<div class="d-grid g-1">'+
                                                '<div class="d-grid g-1 grid-gap-0">'+
                                                    '<p>Fecha de entrega :</p>'+
                                                    '<input class="input" type="date" name="Fecha_entrega_'+t+'" id="Fecha_entrega_'+t+'">'+
                                                '</div>'+
                                            '</div>'+
                                            '<div class="d-grid g-3">'+
                                                '<div class="d-grid g-1 grid-gap-0">'+
                                                    '<p>No. Parte cliente:</p>'+
                                                    '<input class="input" type="text" name="Codigo_'+t+'" id="Codigo_'+t+'" placeholder="Ingrese el codigo">'+
                                                '</div>'+
                                                '<div class="d-grid g-1 grid-gap-0">'+
                                                    '<p>Pedido Cliente:</p>'+
                                                    '<input class="input" type="text" name="Pedido_pza_'+t+'" id="Pedido_pza_'+t+'">'+
                                                '</div>'+
                                                '<div class="d-grid g-1 grid-gap-0">'+
                                                    '<p>Cantidad (millares):</p>'+
                                                    '<input class="input" type="text" name="Cantidad_millares_'+t+'" id="Cantidad_millares_'+t+'">'+
                                                '</div>'+
                                            '</div>'+
                                            '<div class="d-grid g-3">'+
                                                '<div class="d-grid g-1 grid-gap-0">'+
                                                    '<p>Descripcion:</p>'+
                                                    '<input type="text" class="input" name="Descripcion_'+t+'" id="Descripcion_'+t+'">'+
                                                '</div>'+
                                                '<div class="d-grid g-1 grid-gap-0">'+
                                                    '<p>Medida:</p>'+
                                                    '<input class="input" type="text" name="Medida_'+t+'" id="Medida_'+t+'">'+
                                                '</div>'+
                                                '<div class="d-grid g-1 grid-gap-0">'+
                                                    '<p>Factor:</p>'+
                                                    '<input class="input" type="text" name="factor_'+t+'" id="factor_'+t+'">'+
                                                '</div>'+
                                            '</div>'+
                                            '<div class="d-grid g-2">'+
                                                '<div class="d-grid g-1 grid-gap-0">'+
                                                    '<p>Acabado:</p>'+
                                                    '<select class="input" name="Acabado_'+t+'" id="Acabado_'+t+'">'+
                                                        '<option value="">Selecciona un acabado</option>'+
                                                        '<option value="TROPICALIZADO">TROPICALIZADO</option>'+
                                                        '<option value="GALVANIZADO BLANCO">GALVANIZADO Blanco</option>'+
                                                        '<option value="GALVANIZADO AZUL">GALVANIZADO Azul/GALVANIZADO Electrolitico Azul</option>'+
                                                        '<option value="ZINCADO NEGRO">ZINCADO NEGRO</option>'+
                                                        '<option value="NÍQUEL">NÍQUEL</option>'+
                                                        '<option value="PULIDO">PULIDO</option>'+
                                                        '<option value="PAVONADO">PAVONADO</option>'+
                                                        '<option value="LATÓNADO">LATÓNADO</option>'+
                                                        '<option value="COBRE">COBRE</option>'+
                                                        '<option value="VERDE VIEJO">VERDE VIEJO</option>'+
                                                        '<option value="VERDE OLIVO">VERDE OLIVO</option>'+
                                                    '</select>'+
                                                '</div>'+
                                                '<div class="d-grid g-1 grid-gap-0">'+
                                                    '<p>Material:</p>'+
                                                    '<input class="input" type="text" name="Material_'+t+'" id="Material_'+t+'">'+
                                                '</div>'+
                                            '</div>'+
                                            '<div class="d-grid g-2">'+
                                                '<div class="d-flex justify-center align-content-center">'+
                                                    '<div class="d-grid g-1 grid-gap-0">'+
                                                        '<input type="checkbox" name="tratamiento_'+t+'" id="tratamiento_'+t+'" >'+
                                                        '<label class="lbl-checkbox" for="tratamiento_'+t+'">T / Termico</label>'+
                                                    '</div>'+
                                                '</div>'+
                                                '<div class="d-flex justify-center align-content-center">'+
                                                    '<div class="d-grid g-1 grid-gap-0">'+
                                                        '<p>Costo:</p>'+
                                                        '<input class="input" type="text" name="Precio_millar_'+t+'" id="Precio_millar_'+t+'" value="0.0">'+
                                                    '</div>'+
                                                    '<label data-calcular="'+t+'" class="btn btn-icon-self material-icons" title="Obtener Costo" style="margin: 0px 0px 0px 5px;">attach_money</label>'+
                                                '</div>'+
                                            '</div>'+
                                        '</div>';
    }
}

/**
 * It takes the current date, splits it into an array, and then reassembles it into a string in the
 * format YYYY-MM-DD.
 */
const generar_fecha = () => {
    const fecha_actual = new Date().toLocaleDateString();
    const fecha = fecha_actual.split("/");
    let aux = fecha[2] + "-";

    if (parseInt(fecha[1]) < 10) {
        aux += "0" + fecha[1] + "-";
    } else {
        aux += fecha[1] + "-";
    }

    if (parseInt(fecha[0]) < 10) {
        aux += "0" + fecha[0];
    } else {
        aux += fecha[0];
    }

    document.getElementById("Fecha").value = aux;
};

/* Listening for a keyup event on the cantidad input. If the value is less than or equal to 0, it will
call the open_alert function and pass in two arguments. If the value is greater than 0, it will call
the render_form_tornillo function and pass in the value of the cantidad input. */
cantidad.addEventListener('keyup', () => {
    if (cantidad.value <= 0) {
        open_alert('Es necesario incluir por lo menos un tornillo','naranja')
        cantidad.value = 1
        render_form_tornillo(cantidad.value);
    } else {
        render_form_tornillo(cantidad.value)
    }
})

/* Adding an event listener to the DOMContentLoaded event. When the DOMContentLoaded event is fired,
the function generar_fecha() is called. */
document.addEventListener('DOMContentLoaded', () => {
    generar_fecha();
})