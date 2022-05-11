/**
 * It removes all the children of the first element with the class name 'body' and removes the first
 * element with the class name 'tfoot' from the element with the id 'table'.
 */
const limpiar_tabla = () => {
    const tbody = document.getElementsByClassName('body');
    const table = document.getElementById('table')
    const tfoot = document.getElementsByClassName('tfoot')
    while (tbody[0].firstChild) {
        tbody[0].removeChild(tbody[0].firstChild);
    }

    table.removeChild(tfoot[0])
}

/* Getting the form element with the id 'form-filtros' and assigning it to the variable form_filtros. */
const form_filtros = document.getElementById('form-filtros');

/* Preventing the default action of the form, which is to reload the page. */
form_filtros.addEventListener('submit', (evt) => {
    evt.preventDefault();
    enviar_datos()
});

/**
 * If the checkbox with the id of "op" is checked, then call the function "buscar_dato" with the
 * argument "buscar_op".
 */
const enviar_datos = () => {
    const op = document.getElementById('op')
    const fecha = document.getElementById('fecha')
    const cliente = document.getElementById('cliente')
    const estado = document.getElementById('estado')
    const mes = document.getElementById('fecha_mes')
    const anio = document.getElementById('fecha_anio')
    const r_op = document.getElementById('rango_op')
    const r_fecha = document.getElementById('rango_fecha')
    
    if (op.checked) {
        buscar_dato('buscar_op')
    } else if(r_op.checked){
        buscar_dato('buscar_rango_op')
    } else if(r_fecha.checked){
        buscar_dato('buscar_rango_fecha')
    } else if(fecha.checked){
        buscar_dato('buscar_fecha')
    } else if(cliente.checked){
        buscar_dato('buscar_cliente')
    } else if(estado.checked){
        buscar_dato('buscar_estado')
    } else if(mes.checked){
        buscar_dato('buscar_mes')
    } else if(anio.checked){
        buscar_dato('buscar_anio')
    }
}

/**
 * It takes a string as an argument, and then it makes a POST request to a URL, and then it renders the
 * response to a table.
 * @param metodo - is the method that I want to call from the API
 */
const buscar_dato = (metodo) => {
    const respuesta = fetchAPI(form_filtros, url+'/produccion/op/'+metodo, 'POST');
    respuesta.then(json => {
        limpiar_tabla()
        render_ordenes(json)
    })
}

/**
 * For each input in the form, disable it.
 */
const deshabilitar_inputs = () => {
    const f_inputs = form_filtros.getElementsByClassName("input");
    for (let i = 0; i < f_inputs.length; i++) {
        f_inputs[i].setAttribute('disabled','')
    }
}

/* A function that is called when the user clicks on the page. It checks if the element that was
clicked has the attribute `data-radio`. If it does, then it calls the function `deshabilitar_inputs`
and then it checks if the element that was clicked has the id `f_` plus the value of the element
that was clicked. If it does, then it removes the attribute `disabled` from the element. Then it
checks if the element that was clicked has the value `rango_` plus something. If it does, then it
removes the attribute `disabled` from the elements with the ids `f_r_` plus the value of the element
that was clicked plus `_m` and `f_r_` plus the value of the element that was clicked plus `_M`. */
document.addEventListener('click', (evt) => {
    if (evt.target.dataset.radio) {
        deshabilitar_inputs();

        if (document.getElementById('f_'+evt.target.value)) {
            const $f_input = document.getElementById('f_'+evt.target.value);
            $f_input.removeAttribute('disabled','')
        } 
        
        if (evt.target.value.split('_').length > 1 && evt.target.value.split('_')[0] == 'rango') {
            const $f_input_m = document.getElementById('f_r_'+evt.target.value.split('_')[1]+'_m');
            $f_input_m.removeAttribute('disabled','')
            const $f_input_M = document.getElementById('f_r_'+evt.target.value.split('_')[1]+'_M');
            $f_input_M.removeAttribute('disabled','')
        }
        
    }
});