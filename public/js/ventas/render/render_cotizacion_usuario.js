/**
 * It takes a JSON array and renders it as a table.
 * @param json - the data that is being passed to the function
 */
const render_historial = (json) => {
    const body = document.getElementById("body_historial");
    body.innerHTML = "";
    json.forEach((el) => {
        body.innerHTML +=
        "<tr>" +
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
        "</tr>";
    });
};
/**
 * It takes a JSON object and renders it as a table.
 * @param json - is the data that I get from the server.
 */
const render_cotizaciones = (json) => {
    let aux = 0;
    const body = document.getElementsByClassName('body')[0]
    body.innerHTML = ''
    if (json.length == 0) {
        body.innerHTML += '<tr><td colspan="7">No existe ningún registro</td></tr>'
    } else {
        json.forEach(el => {
            let fecha = el.fecha.split("-");
            if (aux == 0 ||(mes != fecha[0] + "-" + fecha[1] &&fecha[0] + "-" + fecha[1] != "0000-00")) {
                body.innerHTML += '<tr><td class="txt-center" colspan="7">' +meses[fecha[1] - 1] +" " +fecha[0] +"</td></tr>";
                mes = fecha[0] + "-" + fecha[1];
                aux++;
            }
            body.innerHTML += '<tr>'+
                                '<td style="padding: 5px;">'+
                                    '<div id="'+el.id_cotizacion+'" class="mas_opciones_tablas">'+
                                        '<div class="opcion">'+
                                            '<button data-opciones="'+el.id_cotizacion+'"  class="mas btn btn-icon-self material-icons">more_vert</button>'+
                                        '</div>'+
                                        '<div class="opciones" id="opciones-'+el.id_cotizacion+'">'+
                                            '<button style="margin: 0px;" data-historial="' +el.id_cotizacion +'" data-modal="modal-historial" id="' +el.id_cotizacion +'" class="material-icons-outlined btn btn-icon-self btn-transparent" title="Copiar información">toc</button>' +
                                        '</div>'+
                                    '</div>'+
                                '</td>'+
                                '<td>'+el.id_cotizacion+'</td>'+
                                '<td>'+el.razon_social+'</td>'+
                                '<td>'+el.fecha+'</td>'+
                            '</tr>'
        })
    }
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

/* Waiting for the DOM to be loaded and then it calls the function `obtener_clientes()` */
document.addEventListener("DOMContentLoaded", () => {
    obtener_clientes();
});