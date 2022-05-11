/* An array of months in Spanish. */
const meses = [
    "ENERO",
    "FEBRERO",
    "MARZO",
    "ABRIL",
    "MAYO",
    "JUNIO",
    "JULIO",
    "AGOSTO",
    "SEPTIEMBRE",
    "OCTUBRE",
    "NOVIEMBRE",
    "DICIEMBRE",
];
/* A global variable that is used to store the value of the `data-historial` attribute of the clicked
button. */
let auxiliar = 0;

/**
 * It fetches data from a server and then renders it to the page.
 */
const obtener = () => {
    const respuesta = fetchAPI("", url + "/ventas/cotizacion/obtener_cotizaciones", "");
    respuesta.then((json) => {
        render_cotizaciones(json);
    });
};

/**
 * It takes a parameter, salida, and uses it to make a fetch request to a url, then renders the
 * response to the page.
 * @param salida - is the id of the sale
 */
const buscar_historial = (salida) => {
    const respuesta = fetchAPI("",url + "/ventas/cotizacion/historial?id=" + salida,"");
    respuesta.then((json) => {
        render_historial(json);
    });
};

/**
 * It opens a new window, loads the url, and then calls the printPage function.
 * @param id - The id of the quote
 */
const obtener_cotizacion_pdf = (id) => {
    printPage(url + "/ventas/cotizacion/generarpdf?id=" + id);
};

/**
 * It takes the current date, splits it into an array, and then uses the month and year to create a
 * string in the format YYYY-MM.
 */
const buscar_mes_actual = () => {
    const fecha_actual = new Date().toLocaleDateString();
    const fecha = fecha_actual.split("/");

    if (parseInt(fecha[1]) < 10) {
        aux = fecha[2] + "-0" + fecha[1];
    } else {
        aux = fecha[2] + '-' +fecha[1];
    }

    document.getElementById("f_fecha_mes").removeAttribute('disabled');
    document.getElementById("f_fecha_mes").value = aux;
    buscar_dato("buscar_mes");
}

/**
 * It disables all the inputs in the form, and then enables the one that is checked by default.
 */
const restaurar_formulario = () => {
    const form_filtros = document.getElementsByClassName("contenedor_filtros");
    const inputs_radio = document.getElementsByName("buscar_por");
    const inputs_radio_fecha = document.getElementsByName("buscar_por_fecha");
    for (let i = 0; i < inputs_radio.length; i++) {
        inputs_radio[i].checked = false;
    }
    for (let i = 0; i < inputs_radio_fecha.length; i++) {
        inputs_radio_fecha[i].checked = false;
    }

    const inputs = form_filtros[0].getElementsByClassName("input");
    for (let i = 0; i < inputs.length; i++) {
        inputs[i].value = "";
        inputs[i].setAttribute("disabled", "");
    }
    document.getElementById("f_fecha_mes").removeAttribute('disabled');
    document.getElementById("fecha_mes").checked = true;
};

/* An event listener that listens for a click event. If the click event is on an element that has a
`data-historial` attribute, then it will set the value of the `auxiliar` variable to the value of
the `data-historial` attribute. It will then set the innerHTML of the element with the id
`numero_salida_almacen` to the string "Cotización: " and the value of the `data-historial`
attribute. It will then call the `buscar_historial` function and pass it the value of the
`data-historial` attribute. If the click event is on an element that has a `data-recarga` attribute,
then it will call the `restaurar_formulario` function and then call the `buscar_mes_actual`
function. If the click event is on an element that has a `data-limpiar` attribute, then it will call
the `restaurar_formulario` function and then call the `buscar_mes_actual` function. If the click
event is on an element that */
document.addEventListener("click", (evt) => {
    if (evt.target.dataset.historial) {
        auxiliar = evt.target.dataset.historial;
        document.getElementById("numero_salida_almacen").innerHTML = "Cotización: " + evt.target.dataset.historial;
        buscar_historial(evt.target.dataset.historial);
    } else if (evt.target.dataset.recarga) {
        restaurar_formulario();
        buscar_mes_actual()
    } else if (evt.target.dataset.limpiar) {
        restaurar_formulario();
        buscar_mes_actual();
    } else if (evt.target.dataset.documento) {
        obtener_cotizacion_pdf(evt.target.dataset.documento);
    } 
});

/* Listening for the DOMContentLoaded event, and when it occurs, it calls the
`buscar_mes_actual` function and the `render_factor` function. */
document.addEventListener("DOMContentLoaded", () => {
    buscar_mes_actual()
    render_factor();
});