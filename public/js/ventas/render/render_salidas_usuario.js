/**
 * It takes a JSON object, and renders it to the DOM.
 * @param json - the json object that is returned from the server
 */
const render_salida = (json) => {
    const body = document.getElementById('table')
    body.innerHTML = ''
    json.salidas.forEach((el) => {
        body.innerHTML += '<tr>'+
                                '<td style="padding: 5px;">'+
                                    '<div id="'+el.id_folio+'" class="mas_opciones_tablas">'+
                                        '<div class="opcion">'+
                                            '<button data-opciones="'+el.id_folio+'"  class="mas btn btn-icon-self material-icons">more_vert</button>'+
                                        '</div>'+
                                        '<div class="opciones" id="opciones-'+el.id_folio+'">'+
                                            '<button style="margin: 0px" data-salida="'+el.id_folio+'" data-historial="' +el.id_cotizacion +'" class="btn btn-transparent btn-icon-self material-icons" data-modal="modal-historial">toc</button>'+
                                        '</div>'+
                                    '</div>'+
                                '</td>'+
                                '<td>'+el.id_folio+'</td>'+
                                '<td>'+el.razon_social+'</td>'+
                                '<td>'+el.fecha+'</td>'+
                        '</tr>'
    })
    // render_externo(json.externo)
}

/**
 * It gets a list of clients from a database and adds them to a select element.
 */
const obtener_clientes = () => {
    const respuesta = fetchAPI("", url + "/ventas/salida/obtener_clientes", "");
    respuesta.then((json) => {
        json.forEach((el) => {
            document.getElementById("f_cliente").innerHTML +='<option value="' +el.Razon_social +'">' +el.Razon_social +"</option>";
        });
    });
};

/* Listening for the DOM to be loaded, and then it is calling the function `obtener_clientes()` */
document.addEventListener("DOMContentLoaded", () => {
    obtener_clientes();
});