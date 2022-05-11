/* Getting the elements with the id of "Cantidad_Tornillos" and "pedido_compra" and then storing them
in the variables of "cantidad" and "contenedor_tornillos". */
const cantidad = document.getElementById('Cantidad_Tornillos');
const contenedor_tornillos = document.getElementById("pedido_compra");

/**
 * It creates a new div element, sets its id attribute, adds a class to it, and then adds some HTML to
 * it.
 * @param cantidad - the number of the current screw
 */
const render_nuevo_tornillo = (cantidad) => {
    let t = cantidad + 1;
    const tornillo = document.createElement('div');
    tornillo.setAttribute("id", "pedido_" + t);
    tornillo.classList.add('pedido');
    document.getElementById("cantidad_tornillos_pedidos").innerText = 'Información del producto ('+t+'):';
    tornillo.innerHTML +=   '<div class="d-grid g-2">'+
                                '<div class="d-grid g-1">'+
                                    '<p style="padding: 15px 0px 30px 0px;" class="txt-left">TORNILLO '+t+':</p>'+
                                '</div>'+
                                '<div class="d-flex justify-right align-content-center">'+
                                    '<label title="Pegar información del tornillo '+t+'" data-p="'+t+'" class="btn btn-icon-self material-icons">content_paste_go</label>'+
                                '</div>'+
                            '</div>'+
                            '<div class="d-grid g-2">'+
                                '<div class="d-grid g-1 grid-gap-0">'+
                                    '<p>Código:</p>'+
                                    '<input type="number" name="codigo_'+t+'" id="codigo_'+t+'">'+
                                '</div>'+
                                '<div class="d-grid g-1 grid-gap-0">'+
                                    '<p>Producto:</p>'+
                                    '<input type="text" name="producto_'+t+'" id="producto_'+t+'">'+
                                '</div>'+
                            '</div>'+
                            '<div class="d-grid g-2">'+
                                '<div class="d-grid g-1 grid-gap-0">'+
                                    '<p>Cantidad:</p>'+
                                    '<input type="text" name="cantidad_'+t+'" id="cantidad_'+t+'">'+
                                '</div>'+
                                '<div class="d-grid g-1 grid-gap-0">'+
                                    '<p>Precio Unitario:</p>'+
                                    '<input type="text" name="precio_'+t+'" id="precio_'+t+'">'+
                                '</div>'+
                            '</div>';
    contenedor_tornillos.appendChild(tornillo)
}

/* Getting the number of elements with the class of "pedido". */
const cantidad_tornillos = document.getElementsByClassName("pedido");

/**
 * It adds a new screw to the list of screws.
 */
const tornillo_mas = () => {
    render_nuevo_tornillo(cantidad_tornillos.length)
    cantidad.value = cantidad_tornillos.length;
} 

/**
 * It removes the last child of the div with the id of "contenedor_tornillos" and then updates the text
 * of the element with the id of "cantidad_tornillos_pedidos" to reflect the new number of tornillos.
 */
const tornillo_menos = () => {
    let tornillos = cantidad_tornillos.length
    if ((tornillos - 1) >= 1) {
        contenedor_tornillos.removeChild(contenedor_tornillos.lastChild)
        document.getElementById("cantidad_tornillos_pedidos").innerHTML = 'Información del producto ('+(tornillos-1)+'):';
        cantidad.value = (tornillos-1)
    } else {
        open_alert('Una orden de compra requiere por lo menos de un tornillo','naranja')
    }
}

/**
 * This function empties the contents of the container that holds the screws.
 */
const vaciar_tornillos = () => {
    contenedor_tornillos.innerHTML = "";
}

/**
 * It creates a form with a number of inputs equal to the number passed as an argument.
 * @param c - is the number of products that the user wants to add.
 */
const render_form_tornillo = (c) => {
    vaciar_tornillos()
    cantidad.value = c
    document.getElementById("cantidad_tornillos_pedidos").innerText = 'Información del producto ('+c+'):';
    for (let t = 1; t <= c; t++) {
        contenedor_tornillos.innerHTML += '<div id="pedido_'+t+'"  class="pedido">'+
                                            '<div class="d-grid g-1">'+
                                                '<div class="d-grid g-1">'+
                                                    '<p style="padding: 15px 0px 30px 0px;" class="txt-left">TORNILLO '+t+':</p>'+
                                                '</div>'+
                                                // '<div class="d-flex justify-right align-content-center">'+
                                                //     '<label title="Pegar información del tornillo '+t+'" data-p="'+t+'" class="btn btn-icon-self material-icons">content_paste_go</label>'+
                                                // '</div>'+
                                            '</div>'+
                                            '<div class="d-grid g-2">'+
                                                '<div class="d-grid g-1 grid-gap-0">'+
                                                    '<p>Código:</p>'+
                                                    '<input type="number" name="codigo_'+t+'" id="codigo_'+t+'">'+
                                                '</div>'+
                                                '<div class="d-grid g-1 grid-gap-0">'+
                                                    '<p>Producto:</p>'+
                                                    '<input type="text" name="producto_'+t+'" id="producto_'+t+'">'+
                                                '</div>'+
                                            '</div>'+
                                            '<div class="d-grid g-2">'+
                                                '<div class="d-grid g-1 grid-gap-0">'+
                                                    '<p>Cantidad:</p>'+
                                                    '<input type="text" name="cantidad_'+t+'" id="cantidad_'+t+'">'+
                                                '</div>'+
                                                '<div class="d-grid g-1 grid-gap-0">'+
                                                    '<p>Precio Unitario:</p>'+
                                                    '<input type="text" name="precio_'+t+'" id="precio_'+t+'">'+
                                                '</div>'+
                                            '</div>'+
                                        '</div>';
    }
}

/* Listening for a keyup event on the cantidad input. */
cantidad.addEventListener('keyup', () => {
    if (cantidad.value <= 0) {
        open_alert('Es necesario incluir por lo menos un tornillo','naranja')
        cantidad.value = 1
        render_form_tornillo(cantidad.value);
    } else {
        render_form_tornillo(cantidad.value)
    }
})