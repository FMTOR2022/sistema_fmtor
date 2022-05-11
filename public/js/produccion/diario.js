/* A global variable that is used to store the id of the row that is going to be deleted. */
const data_aux = {
    dato: ""
}

/**
 * It removes all the rows from the table.
 */
const limpiar_tabla = () => {
    const body = document.getElementById('body')
    while (body.firstChild) {
        body.removeChild(body.firstChild)
    }
}

/**
 * It fetches data from an API, then renders it to a table.
 */
const obtener_registros_diarios = () => {
    limpiar_tabla()
    const respuesta = fetchAPI('',url+'/produccion/diario/obtener_registros_diarios?fecha='+fecha.value+'&estado='+select.value,'')
    respuesta.then(json => {
        render_registros_diarios(json)
    })
}

/* Getting the elements from the HTML. */
const select = document.getElementById('select_estado')
const fecha = document.getElementById('fecha_reporte')
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
    fecha.value = aux;
}

/* An event listener that is listening for a change in the select element. When the select element
changes, it checks if the value of the select element and the value of the fecha element are not
empty. If they are not empty, it calls the obtener_registros_diarios function. */
select.addEventListener('change', () => {
    if (select.value != '' && fecha.value != '') {
        obtener_registros_diarios()
    }
})

/* Listening for a change in the fecha element. When the fecha element changes, it checks if the value
of the select element and the value of the fecha element are not empty. If they are not empty, it
calls the obtener_registros_diarios function. */
fecha.addEventListener('change', () => {
    if (select.value != '' && fecha.value != '') {
        obtener_registros_diarios()
    }
})

/**
 * It loops through the JSON array, and if the value of the "estados" key is not "CANCELADO" or
 * "TERMINADO", it adds an option to the select element with the value of the "estados" key and the
 * text of the "estados" key.
 * @param json - the json data that you want to render
 */
const render_estados = (json) => {
    json.forEach(el => {
        if (el.estados != 'CANCELADO' && el.estados != 'TERMINADO') {
            select.innerHTML += '<option value="'+el.estados+'">'+el.estados+'</option>'
        }
    })
}

/**
 * It fetches data from a url, then renders it.
 */
const obtener_estados = () => {
    const respuesta = fetchAPI('',url+'/produccion/control/estados','')
    respuesta.then(json => {
        render_estados(json)
    })
}

/**
 * It opens a confirmation box and if the user clicks "OK" it calls the function "eliminar"
 */
const eliminar_registro = () => {
    open_confirm('¿Estas seguro de eliminar este registro?', eliminar)
}

/* Listening for the DOM to be loaded, and when it is loaded, it calls the obtener_estados function and
the colocar_fecha function. */
document.addEventListener('DOMContentLoaded', () => {
    obtener_estados()
    colocar_fecha()
})