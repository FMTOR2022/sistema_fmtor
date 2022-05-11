/* A global variable. */
const auxiliar = {dato : 0}

/**
 * It takes an id, makes a fetch request to a url, and then calls a function to paint a modal.
 * @param id - is the id of the order that I want to show in the modal.
 */
const mostrarModal = (id) => {
    const respues = fetchAPI("",url + "/ventas/orden/obtener_per?aux=" + id + "","");
    respues.then((json) => {
        pintarModal(json);
    });
};

/* Getting the values of the inputs that I want to show in the modal. */
const Id_Folio = document.getElementById("op_e");
const dibujo = document.getElementById("Dibujo_e");
const cantidad_elaborar = document.getElementById("cantidad_producir_e");

/**
 * It takes a JSON object as an argument, and then it loops through the object and assigns the values
 * of the object to the value of the input fields.
 * @param json - is an array of objects
 */
const pintarModal = (json) => {
    json.forEach((element) => {
        Id_Folio.value = element.Id_Folio;
        dibujo.value = element.Id_Catalogo;
        cantidad_elaborar.value = element.cantidad_elaborar;
    });
};

/**
 * It takes a string as an argument, makes a fetch request to a url, and then renders the response to
 * the page.
 * @param clave - is the order number
 */
const obtener_clave_orden = (clave) => {
    const respuesta = fetchAPI("",url + "/ventas/orden/buscar?clave=" + clave,"");
    respuesta.then((json) => {
        render_orden(json);
    });
};

//
/**
 * The function obtener() is a function that calls the function fetchAPI() which is a function that
 * returns a promise that is then resolved by the function render_orden() which is a function that
 * takes a json object as an argument.
 */
const obtener = () => {
    const respuesta = fetchAPI("", url + "/ventas/orden/obtener", "");
    respuesta.then((json) => {
        render_orden(json);
    });
};

//pdfb
/**
 * It takes an id, and then it prints a page.
 * @param id - The id of the order
 */
const pdf = (id) => {
    printPage(url + "/ventas/orden/pdforden?atributo=Id_Folio&value=" + id);
};

/**
 * It takes a value, appends it to a URL, and then calls a function called printPage with the URL as a
 * parameter.
 * @param valor - is the id of the record
 */
const generar_control_vacio = (valor) => {
    printPage(url + "/produccion/control/pdf_control_vacio?valor=" + valor);
};

/**
 * It takes a parameter, and then it calls another function with two parameters
 * @param bote - is the amount of money
 */
const generar_tarjeta = (bote) => {
    printPage(url+'/ventas/tarjeta/pdftarjeta?value='+auxiliar.dato+"&bote="+bote)
}

/**
 * It loops through a range of numbers, and for each number, it calls a function that prints a page.
 */
const generar_tarjetas = () => {
    for (let bote = 1; bote <= 5; bote++) {
        printPage(url+'/ventas/tarjeta/pdftarjeta?value='+auxiliar.dato+"&bote="+bote)
    }
}

/* Listening for a click event on the page, and if the click event is on an element with the attribute
`data-imprimir`, then it calls the function `pdf()` with the value of the attribute `data-imprimir`
as a parameter. */
document.addEventListener("click", (evt) => {
    if (evt.target.dataset.imprimir) {
        pdf(evt.target.dataset.imprimir);
    }
});

/**
 * It disables all the inputs and unchecks all the radio buttons.
 */
const restaurar_formulario = () => {
    const inputs_radio = document.getElementsByName("buscar_por");
    const inputs_radio_fecha = document.getElementsByName("buscar_por_fecha");
    for (let i = 0; i < inputs_radio.length; i++) {
        inputs_radio[i].checked = false;
    }

    for (let i = 0; i < inputs_radio_fecha.length; i++) {
        inputs_radio_fecha[i].checked = false;
    }

    const inputs = document.getElementsByClassName("input");
    for (let i = 0; i < inputs.length; i++) {
        inputs[i].value = "";
        inputs[i].setAttribute("disabled", "");
    }
};

/**
 * It sends a request to the server to cancel an order.
 */
const cancelar = () => {
    const respuesta = fetchAPI('',url+'/ventas/orden/cancelar?op='+auxiliar.dato,'')
    respuesta.then(json => {
        if (json == 1) {
            open_alert('Orden de Producción No. '+auxiliar.dato+' cancelada','naranja')
            // obtener()
            buscar_mes_actual()
        } else {
            open_alert('Ocurrio un error al cancelar la O.P.','rojo')
        }
    })
}

/**
 * It sets the value of the input element with id "f_fecha_mes" to the current month and year.
 */
const buscar_mes_actual = () => {
    document.getElementById('fecha_mes').checked = true
    document.getElementById("f_fecha_mes").removeAttribute('disabled')
    const fecha_actual = new Date().toLocaleDateString();
    const fecha = fecha_actual.split("/");

    if (parseInt(fecha[1]) < 10) {
        aux = fecha[2] + "-0" + fecha[1];
    } else {
        aux = fecha[2] + '-' +fecha[1];
    }
    document.getElementById("f_fecha_mes").value = aux;
    buscar_dato("buscar_mes");
}


/* Listening for a click event on the page, and if the click event is on an element with the attribute
`data-imprimir`, then it calls the function `pdf()` with the value of the attribute `data-imprimir`
as a parameter. */
document.addEventListener("click", (evt) => {
    if (evt.target.dataset.editar) {
        mostrarModal(evt.target.dataset.editar);
    } else if (evt.target.dataset.cancelar) {
        auxiliar.dato = evt.target.dataset.cancelar;
        open_confirm('¿Desea cancelar la Orden de Producción '+evt.target.dataset.cancelar+'?',cancelar)
    } else if (evt.target.dataset.control) {
        generar_control_vacio(evt.target.dataset.control);
    } else if (evt.target.dataset.tarjeta) {
        auxiliar.dato = evt.target.dataset.tarjeta;
    } else if (evt.target.dataset.t5) {
        generar_tarjetas();
    } else if (evt.target.dataset.t1) {
        if (document.getElementById("bote").value != "") {
            generar_tarjeta(document.getElementById("bote").value);
        }
    } else if (evt.target.dataset.recarga) {
        // obtener();
        restaurar_formulario();
        buscar_mes_actual()
    } else if (evt.target.dataset.limpiar) {
        // obtener();
        restaurar_formulario();
        buscar_mes_actual()
    }
});

/* Getting the form element with the id "form_act_orden". */
const formactualizar = document.getElementById("form_act_orden");

/* Listening for a submit event on the form with the id "form_act_orden", and if the event is
triggered, then it calls the function `actualizar_orden()`. */
formactualizar.addEventListener("submit", (evt) => {
    evt.preventDefault();
    open_confirm('¿Desea guardar los cambios realizados?', actualizar_orden)
});

/**
 * It sends a POST request to the server, and if the server returns 1, it calls the obtener() function.
 */
const actualizar_orden = () => {
    const respuesta = fetchAPI(formactualizar,url + "/ventas/orden/actualizarorden","POST");
    respuesta.then((json) => {
        if (json == 1) {
            open_alert("El registro ha sido actualizado correctamente", "verde");
            obtener();
        } else {
            open_alert("Error al actualizar el registro", "rojo");
        }
    });
};

/* Listening for the event `DOMContentLoaded` and when the event is triggered, it calls the function
`buscar_mes_actual()`. */
document.addEventListener('DOMContentLoaded', () => {
    buscar_mes_actual();
})