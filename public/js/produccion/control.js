/* A global variable. */
const data_aux = {
    dato: ""
}

/**
 * It removes the class 'input-error' from all elements with the class 'input-error' that are children
 * of the element passed to the function.
 * @param form - The form that you want to validate.
 */
const quitar_clase = (form) => {
    const inputs = form.getElementsByClassName('input-error');
    for (let i = 0; i < inputs.length; i++) {
        inputs[i].classList.remove('input-error');
    }
}

/**
 * It takes a value, if the value is not empty, it calls a function that opens a new window with a url
 * that has the value appended to it.
 * @param valor - the value of the input
 */
const generar_control_produccion = (valor) => {
    if (valor != '') {
        printPage(url+'/produccion/control/pdf_control?valor='+valor);
        op_control.classList.remove('input-error')
    } else {
        open_alert('No ha introducido la Orden de Producción','naranja')
        op_control.classList.add('input-error')
    }
}

/**
 * It takes a value, checks if it's not empty, and if it's not empty, it calls a function called
 * printPage with a URL and the value as parameters.
 * 
 * If the value is empty, it calls a function called open_alert with two parameters.
 * 
 * If the value is not empty, it removes a class called input-error from an element with the id
 * op_control.
 * 
 * If the value is empty, it adds a class called input-error to an element with the id op_control.
 * @param valor - the value of the input field
 */
const generar_control_vacio = (valor) => {
    if (valor != '') {
        printPage(url+'/produccion/control/pdf_control_vacio?valor='+valor);
        op_control.classList.remove('input-error')
    } else {
        open_alert('No ha introducido la Orden de Producción','naranja')
        op_control.classList.add('input-error')
    }
}

/**
 * The function obtener_estados() makes a fetch request to the url+'/produccion/control/estados'
 * endpoint, and then renders the response to the page.
 */
const obtener_estados = () => {
    const respuesta = fetchAPI('',url+'/produccion/control/estados','')
    respuesta.then(json => {
        render_botones_estados(json)
    })
}

/**
 * It opens a new window, sets the url of the new window to the url of the report, and then calls the
 * printPage function.
 * @param fecha - date
 * @param turno - 1,2,3
 * @param estado - 1 =&gt; 'Pendiente'
 */
const generar_reporte_diario = (fecha,turno,estado) => {
    printPage(url+'/produccion/control/pdf_reporte_diario?fecha='+fecha+'&turno='+turno+'&estado='+estado);
}

/* It's getting the element with the id 'fecha' and assigning it to the variable fecha_insert. */
const fecha_insert = document.getElementById('fecha')

/**
 * It takes the current date, formats it to a string, splits it into an array, and then reassembles it
 * into a string in the format YYYY-MM-DD.
 */
const colocar_fecha = () => {
    const fecha_actual = new Date();
    const local = fecha_actual.toLocaleDateString();
    let aux = local.split("/")[2]

    if (parseInt(local.split("/")[1]) < 10){
        aux += "-0" + parseInt(local.split("/")[1]) + '-';
    } else{
        aux += parseInt(local.split("/")[1]) + '-';
    }

    if (parseInt(local.split("/")[0]) < 10) {
        aux += "0" + parseInt(local.split("/")[0]);
    } else {
        aux += parseInt(local.split("/")[0]);
    }
    fecha_insert.value = aux;
}

/* It's listening for the DOMContentLoaded event, and when it's triggered, it calls the
obtener_estados() and colocar_fecha() functions. */
document.addEventListener('DOMContentLoaded', () => {
    obtener_estados()
    colocar_fecha()
})

/* It's listening for a click event on the document, and when it's triggered, it checks if the
target of the event has a dataset called opcion. If it does, it checks if the target of the event
has
a dataset called eliminar. If it does, it assigns the value of the dataset to the dato property of
the
data_aux object, and then calls the eliminar_registro() function. If the target of the event doesn't

have a dataset called eliminar, it checks if it has a dataset called edit. If it does, it calls the
obtener_registro() function with the value of the dataset as a parameter.

If the target of the event doesn't have a dataset called opcion, it checks if it has a dataset
called
impresion. If it does, it checks if the value of the dataset is equal to 'control'. If it is, it
calls
the generar_control_produccion() function with the value of the input field with the id 'op_control'

as a parameter */
document.addEventListener('click', (evt) => {
    if (evt.target.dataset.opcion) {
        if (evt.target.dataset.eliminar) {
            data_aux.dato = evt.target.dataset.eliminar
            eliminar_registro()
        } else if (evt.target.dataset.edit) {
            obtener_registro(evt.target.dataset.edit)
        }
    } else if (evt.target.dataset.impresion) {
        if (evt.target.dataset.impresion == 'control') {
            generar_control_produccion(document.getElementById('op_control').value)
        } else if (evt.target.dataset.impresion == 'control_vacio') {
            generar_control_vacio(document.getElementById('op_control').value)
        }
    } else if (evt.target.dataset.terminar) {
        const input = document.getElementById('op_control');
        if (input.value != '') {
            data_aux.dato = input.value
            open_confirm('¿Esta seguro de cambiar el estado de la Orden de Producción ' + input.value + ' a terminado?',terminar_orden)
            // terminar_orden();
            op_control.classList.remove('input-error')
        } else {
            open_alert('No ha introducido la Orden de Producción','rojo')
            op_control.classList.add('input-error')
        }
    }
})