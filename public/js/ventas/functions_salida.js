/* It's an array that contains the months of the year. */
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
/* It's a global variable that is used to store the id of the sale. */
let auxiliar = 0;

//posible copia de busqueda
/**
 * It takes a string as an argument, and returns a promise that resolves to a JSON object.
 * @param clave - is the key of the report
 */

const obtener_clave_reporte = (clave) => {
    const respuesta = fetchAPI("",url + "/ventas/salida/buscar?clave=" + clave,"");
    respuesta.then((json) => {
        render_salida(json);
    });
};

/**
 * Const obtener = () => {
 *     const respuesta = fetchAPI("", url + "/ventas/salida/obtener", "");
 *     respuesta.then((json) => {
 *         render_salida(json);
 *     });
 * };
 */
const obtener = () => {
    const respuesta = fetchAPI("", url + "/ventas/salida/obtener", "");
    respuesta.then((json) => {
        render_salida(json);
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
 * It fetches data from an API and then renders it to the page.
 * @param salida - is the id of the sale
 */
const buscar_historial_compra = (salida) => {
    const respuesta = fetchAPI("",url + "/ventas/salida/historial_compra?id=" + salida,"");
    respuesta.then((json) => {
        render_historial_compra(json);
    });
};


/**
 * It takes an id, and then it calls a function called printPage, passing it a url and the id.
 * @param id - the id of the document
 */
const obtener_pdf = (id) => {
    printPage(url + "/ventas/salida/generarpdf?atributo=id_folio&value=" + id);
};

/**
 * It takes an id, and then it prints a page.
 * @param id - the id of the record you want to print
 */
const obtener_cotizacion_pdf = (id) => {
    printPage(url + "/ventas/cotizacion/generarpdf?id=" + id);
};

/**
 * It takes a JSON object and renders it to a table.
 * @param json - is the data that I'm getting from the server.
 */
const render_historial = (json) => {
    const body = document.getElementById("body_historial");
    body.innerHTML = "";
    json.forEach((el) => {
        body.innerHTML +=
        "<tr>" +
            '<td><button style="margin: 0px 5px;" data-cantidad="'+el.cantidad+'" data-factor="'+el.factor+'" data-factura="' +el.Id_Pedido +'" class="btn btn-transparent btn-icon-self material-icons-outlined" data-modal="modal-actualizar-factura">receipt</button></td>'+
            "<td>" +el.no_parte +"</td>" +
            "<td>" +el.pedido_cliente +"</td>" +
            "<td>" +el.descripcion +"</td>" +
            "<td>" +el.medida +"</td>" +
            "<td>" +el.tratamiento +"</td>" +
            "<td class='txt-right'>" +el.factor +"</td>" +
            "<td>" +el.acabado +"</td>" +
            "<td>" +el.material +"</td>" +
            "<td class='txt-right'>" + new Intl.NumberFormat("es-MX").format(el.cantidad) +"</td>" +
            "<td class='txt-right'>$ " +new Intl.NumberFormat("es-MX").format(el.costo) +"</td>" +
            "<td>" +el.fecha_entrega +"</td>" +
            // '<td style="padding: 5px 0px 5px 5px;" ><button data-copiar="' +el.id_cotizacion +'" data-pedido="' +el.Id_Pedido +'" id="' +el.id_cotizacion +'" class="material-icons btn btn-icon-self btn-transparent" title="Copiar información">copy_all</button></td>' +
            // '<td style="padding: 5px 0px 5px 0px;" ><button data-pedidoact="' +el.Id_Pedido +'" id="' +el.Id_Pedido +'" data-modal="modal-actualizar" class="material-icons-outlined btn-amarillo btn btn-icon-self btn-transparent" title="Copiar información">edit</button></td>' +
            // '<td style="padding: 5px 0px;" ><button data-eliminar="'+el.Id_Pedido+'" class="material-icons-outlined btn btn-icon-self btn-rojo">delete</button></td>' +
        "</tr>";
    });
};

/**
 * It takes a JSON object and renders it as a table.
 * @param json - the data that is being passed to the function
 */
const render_historial_compra = (json) => {
    const body = document.getElementById("body_historial_compra");
    body.innerHTML = "";
    json.forEach((el) => {
        body.innerHTML +=
        "<tr>" +
            "<td>" +el.codigo +"</td>" +
            "<td>" +el.producto +"</td>" +
            "<td class='txt-right'>" + new Intl.NumberFormat("es-MX").format(el.cantidad) +"</td>" +
            "<td class='txt-right'>$ " +new Intl.NumberFormat("es-MX").format(el.precio) +"</td>" +
            '<td class="txt-right">$ '+ new Intl.NumberFormat("es-MX").format(el.cantidad * el.precio) +'</td>'
            // '<td style="padding: 5px 0px 5px 5px;" ><button data-copiar="' +el.id_cotizacion +'" data-pedido="' +el.Id_Pedido +'" id="' +el.id_cotizacion +'" class="material-icons btn btn-icon-self btn-transparent" title="Copiar información">copy_all</button></td>' +
            // '<td style="padding: 5px 0px 5px 0px;" ><button data-pedidoact="' +el.Id_Pedido +'" id="' +el.Id_Pedido +'" data-modal="modal-actualizar" class="material-icons-outlined btn-amarillo btn btn-icon-self btn-transparent" title="Copiar información">edit</button></td>' +
            // '<td style="padding: 5px 0px;" ><button data-eliminar="'+el.Id_Pedido+'" class="material-icons-outlined btn btn-icon-self btn-rojo">delete</button></td>' +
        "</tr>";
    });
};

/**
 * It disables all the inputs in the form.
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

    const inputs = form_filtros.getElementsByClassName("input");
    for (let i = 0; i < inputs.length; i++) {
        inputs[i].value = "";
        inputs[i].setAttribute("disabled", "");
    }
};

/* It's an event listener that listens for a click event, and then it checks if the target of the event
has a dataset called historial, if it does, then it assigns the value of the dataset to a variable
called auxiliar, and then it calls a function called buscar_historial, passing it the value of the
dataset. */
document.addEventListener("click", (evt) => {
    if (evt.target.dataset.historial) {
        auxiliar = evt.target.dataset.historial;
        document.getElementById("numero_salida_almacen").innerHTML = "Salida de Almacen: " + evt.target.dataset.salida;
        buscar_historial(evt.target.dataset.historial);
    } else if (evt.target.dataset.historial_compra) {
        auxiliar = evt.target.dataset.historial_compra;
        document.getElementById("numero_salida_almacen_compra").innerHTML = "Salida de Almacen: " + evt.target.dataset.salida;
        buscar_historial_compra(evt.target.dataset.historial_compra);
    } else if (evt.target.dataset.recarga) {
        restaurar_formulario();
        buscar_mes_actual();
    } else if (evt.target.dataset.impresion) {
        obtener_pdf(evt.target.dataset.impresion);
    } else if (evt.target.dataset.cotizacion) {
        obtener_cotizacion_pdf(evt.target.dataset.cotizacion);
    } 
});

/**
 * It takes the current date, splits it into an array, and then uses the month and year to create a
 * string in the format YYYY-MM. 
 * 
 * The function then sets the value of an input element to this string, and then calls another
 * function. 
 * 
 * The function is called when the page loads. 
 * 
 * The problem is that the function is not working in IE11. 
 * 
 * I've tried using the following code to get the current date: 
 * 
 * const fecha_actual = new Date();
 * const fecha = fecha_actual.toLocaleDateString().split("/");
 * 
 * But this doesn't work either. 
 * 
 * I've also tried using the following code to get the current date: 
 * 
 * const fecha_actual = new Date();
 * const fecha = fecha_
 */
const buscar_mes_actual = () => {
    const fecha_actual = new Date().toLocaleDateString();
    const fecha = fecha_actual.split("/");

    if (parseInt(fecha[1]) < 10) {
        aux = fecha[2] + "-0" + fecha[1];
    } else {
        aux = fecha[2] + '-' +fecha[1];
    }
    document.getElementById("f_fecha_mes").value = aux;
    document.getElementById("f_fecha_mes").removeAttribute('disabled','');
    document.getElementById("fecha_mes").checked = true;
    buscar_dato("buscar_mes");
}

/* It's an event listener that listens for the DOMContentLoaded event, and then it calls a function
called buscar_mes_actual. */
document.addEventListener("DOMContentLoaded", () => {
    buscar_mes_actual()
});