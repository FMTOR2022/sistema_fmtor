/**
 * It fetches data from an API and then renders it to the DOM.
 */
const obtener_ordenes = () => {
    const respuesta = fetchAPI('',url+'/ventas/compras/obtener','')
    respuesta.then(json => {
        render_ordenes(json)
    })
}

/**
 * It makes a fetch request to the server, and then it calls another function to do something with the
 * response.
 */
const obtener_empresas = () => {
    const respuesta = fetchAPI("", url + "/ventas/compras/obtener_empresas", "");
    respuesta.then((json) => {
        colocar_empresas(json);
    });
};

/**
 * It fetches data from a server and then calls another function to do something with the data.
 */
const obtener_proveedores = () => {
    const respuesta = fetchAPI("", url + "/ventas/compras/obtener_proveedores", "");
    respuesta.then((json) => {
        colocar_proveedores(json)
    });
}

/**
 * It takes an id, makes a fetch request to a url, and then renders the response.
 * @param id - the id of the order
 */
const obtener_pedidos = (id) => {
    const respuesta = fetchAPI('', url+'/ventas/compras/obtener_informacion_pedidos?id='+id,'')
    respuesta.then(json => {
        render_pedidos(json)
    })
}

/**
 * It takes the current date, splits it into an array of strings, and then concatenates the strings
 * into a string in the format YYYY-MM-DD.
 */
const colocar_fecha = () => {
    const fecha = new Date().toLocaleDateString()
    const input = document.getElementById('Fecha')
    let resultado = '';
    
    if (fecha.split("/")[1] < 10) {
        resultado = fecha.split("/")[2] + "-0" + fecha.split("/")[1];
    } else {
        resultado = fecha.split("/")[2] + "-" + fecha.split("/")[1];
    }

    if (fecha.split("/")[0] < 10) {
        resultado += "-0" + fecha.split("/")[0];
    } else {
        resultado += "-" + fecha.split("/")[0];
    }

    input.value = resultado;
}

/**
 * It opens a new window, loads the url, and then calls the printPage function.
 * @param id - the id of the document
 * @param empresa - is the company name
 */
const generar_documento = (id,empresa) => {
    printPage(url+'/ventas/compras/generar_pdf?id='+id+'&empresa='+empresa);
}

/* Getting the element with the id 'limpiar-filtros' and assigning it to the variable
btn_limpiar_filtros. */
const btn_limpiar_filtros = document.getElementById('limpiar-filtros')

/* Adding an event listener to the button with the id 'limpiar-filtros'. When the button is clicked,
the function `restaurar_formulario()` is called, and then the function `obtener_ordenes()` is
called. */
btn_limpiar_filtros.addEventListener('click',() => {
    restaurar_formulario();
    obtener_ordenes();
})

/**
 * It takes a form element as an argument and clears all the input fields in that form
 * @param form - the form element
 */
const limpiar_formulario = (form) => {
    const inputs = form.getElementsByClassName("input");
    for (let i = 1; i < inputs.length; i++) {
        inputs[i].value = "";
    }
};

/**
 * It disables all the inputs in the form and clears their values.
 */
const restaurar_formulario = () => {
    const form_filtros = document.getElementById("form-filtros");
    const inputs_radio = document.getElementsByName("buscar_por");
    for (let i = 0; i < inputs_radio.length; i++) {
        inputs_radio[i].checked = false;
    }

    const inputs = form_filtros.getElementsByClassName("input");
    for (let i = 0; i < inputs.length; i++) {
        inputs[i].value = "";
        inputs[i].setAttribute("disabled", "");
    }
};

/* Adding an event listener to the document. When the user clicks on an element, the function checks if
the element has a data attribute called 'imprimir'. If it does, then it calls the function
`generar_documento()` and passes the value of the data attribute 'imprimir' and the value of the
data attribute 'empresa' as arguments. If the element does not have a data attribute called
'imprimir', then it checks if the element has a data attribute called 'compra'. If it does, then it
calls the function `obtener_pedidos()` and passes the value of the data attribute 'compra' as an
argument. If the element does not have a data attribute called 'compra', then it checks if the
element has a data attribute called 'recarga'. If it does, then it calls the functions
`obtener_ordenes()` and `restaurar_formulario()`. */
document.addEventListener('click',  (evt) => {
    if (evt.target.dataset.imprimir) {
        generar_documento(evt.target.dataset.imprimir,evt.target.dataset.empresa);
    } else  if (evt.target.dataset.compra) {
        document.getElementById("orden_de_compra").innerHTML = 'Orden de Compra: '+evt.target.dataset.compra;
        obtener_pedidos(evt.target.dataset.compra);
    } else if (evt.target.dataset.recarga) {
        obtener_ordenes()
        restaurar_formulario();
    }
})

/* Adding an event listener to the document. When the DOM is loaded, the functions `obtener_ordenes()`,
`obtener_empresas()`, `obtener_proveedores()`, and `colocar_fecha()` are called. */
document.addEventListener('DOMContentLoaded', () => {
    obtener_ordenes()
    obtener_empresas()
    obtener_proveedores()
    colocar_fecha()
})