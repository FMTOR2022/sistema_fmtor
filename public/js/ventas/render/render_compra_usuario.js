/**
 * It takes a JSON object, loops through it, and creates a table row for each object in the JSON
 * object.
 * @param json - is the data that I get from the server.
 */
const render_ordenes = (json) => {
    const body = document.getElementById('body')
    body.innerHTML = ''
    json.forEach(el => {
        body.innerHTML += "<tr>" + 
                            '<td style="padding: 5px;">'+
                                '<div id="'+el.Id_Compra+'" class="mas_opciones_tablas">'+
                                    '<div class="opcion">'+
                                        '<button data-opciones="'+el.Id_Compra+'"  class="mas btn btn-icon-self material-icons">more_vert</button>'+
                                    '</div>'+
                                    '<div class="opciones" id="opciones-'+el.Id_Compra+'">'+
                                        "<button style='margin: 0px 5px 0px 0px;' data-modal='modal-historial' data-compra='"+el.Id_Compra+"' style='margin: 0px;' class='btn btn-icon-self btn-transparent material-icons-outlined'>toc</button>"+
                                        "<button style='margin: 0px 0px 0px 5px;' style='margin: 0px;' class='btn btn-icon-self btn- material-icons-outlined' data-imprimir='"+el.Id_Compra+"' data-empresa='"+el.FK_Empresa+"'>print</button>"+
                                    '</div>'+
                                '</div>'+
                            '</td>'+
                            "<td>"+el.Id_Compra+"</td>"+
                            "<td>"+el.Fecha+"</td>"+
                            "<td>"+el.Empresa+"</td>"+
                            "<td>"+el.Solicitado+"</td>"+
                            "<td>"+el.Proveedor+"</td>"+
                        "</tr>";
    })
}

/**
 * It takes a JSON object, clears the table body, and then iterates over the JSON object, adding a row
 * to the table for each element in the JSON object.
 * @param json - the JSON data you want to render
 */
const render_pedidos = (json) => {
    const body = document.getElementById("body_historial");
    body.innerHTML = ''
    json.forEach(el => {
        body.innerHTML += "<tr>" + 
                            "<td>"+el.Codigo+"</td>"+
                            "<td>"+el.Producto+"</td>"+
                            "<td class='txt-right'>"+new Intl.NumberFormat('es-MX').format(el.Cantidad)+"</td>"+
                            "<td class='txt-right'>$ "+new Intl.NumberFormat('es-MX').format(el.Precio)+"</td>"+
                        "</tr>";
    })
}

/**
 * It takes a JSON object and adds it to a select element.
 * @param json - the JSON object that you want to iterate over.
 */
const colocar_empresas = (json) => {
    const select_b = document.getElementById('f_empresa_b')
    json.forEach(el => {
        select_b.innerHTML += '<option value="'+el.Id_Empresa+'">'+el.Empresa+'</option>'
    });
}

/**
 * It takes a JSON object and adds it to a select element.
 * @param json - the JSON object that you want to iterate over.
 */
const colocar_proveedores = (json) => {
    const select_b = document.getElementById('f_proveedor_b')
    json.forEach(el => {
        select_b.innerHTML += '<option value="'+el.Id_Proveedor+'">'+el.Proveedor+'</option>';
    })
}