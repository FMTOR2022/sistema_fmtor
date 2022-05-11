/* Creating an object with a property called dato and a value of 0. */
const auxiliar = {dato : 0}

/* Creating an array of months. */
const meses = ['ENERO',
                'FEBRERO',
                'MARZO',
                'ABRIL',
                'MAYO',
                'JUNIO',
                'JULIO',
                'AGOSTO',
                'SEPTIEMBRE',
                'OCTUBRE',
                'NOVIEMBRE',
                'DICIEMBRE']

/**
 * It creates a table row for each element in the json array, and then creates a table footer with the
 * totals.
 * @param json - the data you want to render
 */
const render_ordenes = (json) => {
    const t_body= document.getElementsByClassName('body')
    let total_acumulado = 0
    let total_acumulado_mensual = 0
    let total_kilos = 0
    let total_kilos_mensual = 0
    let aux = 0
    let mes = ''
    
    json.forEach(el => {
        if (el.Id_Folio != 1) {

            const tr_mes = document.createElement('tr')
            const tr_totales = document.createElement('tr')
            const tr = document.createElement('tr')
        
            tr.classList.add('tr')
    
            if (el.estado == 'TERMINADO') {
                tr.classList.add('terminado')
            } else if (el.estado == 'CANCELADO') {
                tr.classList.add('cancelado')
            }
    
            let fecha = el.Fecha.split(' ')[0].split('-')
    
            if (aux > 0 && mes != (fecha[0]+'-'+fecha[1]) && (fecha[0]+'-'+fecha[1]) != '0000-00') {
                tr_totales.innerHTML = '<tr>'+
                                            '<td colspan="2" class="txt-right">Kilos mensuales: </td>'+
                                            '<td class="txt-right">'+ new Intl.NumberFormat('es-MX').format(total_kilos_mensual)+'</td>'+
                                            '<td colspan="11" class="txt-right">Acumulado mensual:</td>'+
                                            '<td class="txt-right">$ ' + new Intl.NumberFormat('es-MX').format(total_acumulado_mensual) + '</td>'+
                                            '<td></td>'+
                                            '<td></td>'+
                                        '</tr>';
                t_body[0].appendChild(tr_totales)
                total_acumulado_mensual = 0
                total_kilos_mensual = 0
                total_acumulado_mensual += parseFloat(el.TOTAL)
                total_kilos_mensual += (el.factor*el.cantidad_elaborar)
            } else {
                total_acumulado_mensual += parseFloat(el.TOTAL)
                total_kilos_mensual += (el.factor*el.cantidad_elaborar)
            }
    
            if (aux == 0 || mes != (fecha[0]+'-'+fecha[1]) && (fecha[0]+'-'+fecha[1]) != '0000-00') {
                tr_mes.innerHTML = '<tr><td class="txt-center" colspan="19">'+meses[fecha[1]-1]+' '+fecha[0]+'</td></tr>'
                mes = (fecha[0]+'-'+fecha[1])
                aux++;
                t_body[0].appendChild(tr_mes)
            }
    
            total_acumulado += parseFloat(el.TOTAL)
            total_kilos += (el.factor*el.cantidad_elaborar)
    
            tr.innerHTML += '<td style="padding: 5px 10px;">'+
                                '<div id="'+el.Id_Folio+'" class="mas_opciones_tablas">'+
                                    '<div class="opcion">'+
                                        '<button data-opciones="'+el.Id_Folio+'"  class="mas btn btn-icon-self material-icons">more_vert</button>'+
                                    '</div>'+
                                    '<div class="opciones" id="opciones-'+el.Id_Folio+'">'+
                                        '<button style="margin: 0px 5px 0px 0px;" data-modal="modal-tarjetas" title="Tarjeta de Flujo ('+el.Id_Folio+')" data-tarjeta="'+el.Id_Folio+'" data-t1="'+el.Id_Folio+'" class="material-icons-outlined btn btn-icon-self btn-impresion">note_alt</button>'+
                                        '<button style="margin: 0px 5px;" title="Orden de Producción ('+el.Id_Folio+')" data-impresion="orden_produccion" data-orden="'+el.Id_Folio+'" class="material-icons btn btn-icon-self btn-verde btn-impresion">splitscreen</button>'+
                                        '<button style="margin: 0px 0px 0px 5px;" title="Control de Producción('+el.Id_Folio+')" data-impresion="control_vacio" data-control="'+el.Id_Folio+'" class="material-icons btn btn-icon-self btn-amarillo btn-impresion">calendar_view_month</button>'+
                                    '</div>'+
                                '</div>'+
                            '</td>'+
                            '<td data-op="'+el.Id_Folio+'" data-calibre="'+el.calibre+'" data-modal="modal-calibre">'+el.calibre+'</td>'+
                            '<td class="txt-right">'+new Intl.NumberFormat('es-MX').format(el.factor*el.cantidad_elaborar)+'</td>'+
                            '<td>'+el.factor+'</td>'+
                            '<td>'+el.Id_Folio+'</td>'+
                            '<td>'+el.Fecha.split(' ')[0]+'</td>'+
                            '<td>'+(el.Clientes + ' ' + el.razon_social.split(' ')[0].trim())+'</td>'+
                            '<td>'+el.medida+'</td>'+
                            '<td>'+el.descripcion+'</td>'+
                            '<td>'+el.tratamiento+'</td>'+
                            '<td>'+el.material+'</td>'+
                            '<td>'+el.acabados+'</td>'+
                            '<td class="txt-right number">'+new Intl.NumberFormat('es-MX').format(el.cantidad_elaborar)+'</td>'+
                            '<td class="txt-right number">$ ' + new Intl.NumberFormat('es-MX').format(el.precio_millar)+'</td>'+
                            '<td class="txt-right number">$ ' + new Intl.NumberFormat('es-MX').format(el.TOTAL)+'</td>'+
                            '<td class="txt-right number">$ ' + new Intl.NumberFormat('es-MX').format(total_acumulado) + '</td>'+
                            '<td>' + el.estado_general+'</td>'
            t_body[0].appendChild(tr)
        }
    })
    const tr_totales = document.createElement('tr')
    tr_totales.innerHTML = '<tr>'+
                                '<td colspan="2" class="txt-right">Kilos mensuales: </td>'+
                                '<td class="txt-right">'+new Intl.NumberFormat('es-MX').format(total_kilos_mensual)+'</td>'+
                                '<td colspan="11" class="txt-right">Acumulado mensual:</td>'+
                                '<td class="txt-right">$ ' + new Intl.NumberFormat('es-MX').format(total_acumulado_mensual) + '</td>'+
                                '<td></td>'+
                                '<td></td>'+
                            '</tr>';
    t_body[0].appendChild(tr_totales)
    total_acumulado_mensual = 0
    
    const table = document.getElementById('table')
    const tfoot = document.createElement('tfoot');
    tfoot.classList.add('tfoot')
    tfoot.innerHTML = '<tr>'+
                            '<td colspan="2" class="txt-right">Total kilos: </td>'+
                            '<td class="txt-right">'+new Intl.NumberFormat('es-MX').format(total_kilos)+'</td>'+
                            '<td colspan="12" class="txt-right">Total acumulado</td>'+
                            '<td class="txt-right">$ ' + new Intl.NumberFormat('es-MX').format(total_acumulado) + '</td>'+
                            '<td></td>'+
                    '</tr>';
    table.appendChild(tfoot)
}

/**
 * It fetches data from a server and then renders it to the page.
 */
const obtener_ordenes = () => {
    const respuesta = fetchAPI('',url+'/produccion/op/obtener_ordenes','')
    respuesta.then(json => {
        render_ordenes(json)
    })
}

/**
 * It fetches a blob from a url, then creates an embed element and appends it to a div.
 * @param id_catalogo - the id of the file
 */
const obtener_plano = (id_catalogo) => {
    const plano = fetchBlob(url+'/produccion/op/obtener_plano?id_plano='+id_catalogo)
    plano.then(blob => {
        const div_plano = document.getElementById('plano')
        const embed = document.createElement('embed')

        div_plano.innerHTML='';
        
        embed.classList.add('height-100');
        embed.setAttribute('type','application/pdf')
        embed.setAttribute('src','data:application/pdf;base64,'+encodeURI(blob))
        
        div_plano.appendChild(embed)
    })
}

/**
 * It takes a url and adds a query string to it.
 * @param url_pdf - the url of the page to be printed
 */
const tipo_consulta = (url_pdf) => {
    const op = document.getElementById('op')
    const fecha = document.getElementById('fecha')
    const cliente = document.getElementById('cliente')
    const estado = document.getElementById('estado')
    const mes = document.getElementById('fecha_mes')
    const anio = document.getElementById('fecha_anio')
    const r_op = document.getElementById('rango_op')
    const r_fecha = document.getElementById('rango_fecha')

    if (op.checked) {
        url_pdf += '&filtro=op&f_op='+document.getElementById('f_op').value
    } else if(r_op.checked){
        url_pdf += '&filtro=r_op&f_r_op_m='+document.getElementById('f_r_op_m').value+'&f_r_op_M='+document.getElementById('f_r_op_M').value
    } else if(r_fecha.checked){
        url_pdf += '&filtro=r_fecha&f_r_fecha_m='+document.getElementById('f_r_fecha_m').value+'&f_r_fecha_M='+document.getElementById('f_r_fecha_M').value
    } else if(fecha.checked){
        url_pdf += '&filtro=fecha&f_fecha='+document.getElementById('f_fecha').value
    } else if(cliente.checked){
        url_pdf += '&filtro=cliente&f_cliente='+document.getElementById('f_cliente').value
    } else if(estado.checked){
        url_pdf += '&filtro=estado&f_estado='+document.getElementById('f_estado').value
    } else if(mes.checked){
        url_pdf += '&filtro=mes&f_mes='+document.getElementById('f_fecha_mes').value
    } else if(anio.checked){
        url_pdf += '&filtro=anio&f_anio='+document.getElementById('f_fecha_anio').value
    } else {
        url_pdf += '&filtro=todo'
    }

    printPage(url_pdf);
}

/**
 * It's a function that takes a URL and appends it to the end of another URL.
 */
const consulta_PDF = () => {
    tipo_consulta(url+'/produccion/op/pdf_ordenes?formato=v_ordenes')
}

/**
 * It's a function that calls another function.
 */
const generar_PDF = () => {
    consulta_PDF()
}

/**
 * It loops through all the radio buttons, unchecks them, then loops through all the inputs, clears
 * them, and disables them.
 */
const restaurar_formulario = () => {
    const inputs_radio = document.getElementsByName("buscar_por");
    for (let i = 0; i < inputs_radio.length; i++) {
        inputs_radio[i].checked = false;
    }

    const inputs = form_filtros.getElementsByClassName("input");
    for (let i = 0; i < inputs.length; i++) {
        inputs[i].value = '';
        inputs[i].setAttribute('disabled','')
    }
}

/* Getting the element with the id of btn_resetear. */
const btn_reset = document.getElementById('btn_resetear');

/* Adding an event listener to the button. */
btn_reset.addEventListener('click', () => {
    // limpiar_tabla()
    restaurar_formulario()
    buscar_mes_actual();
})

/* Getting the element with the id of op_calibre and assigning it to the variable form_calibre. */
const form_calibre = document.getElementById('op_calibre')

/**
 * It sends a POST request to a PHP file, which returns a 1 or 0. 
 * If the PHP file returns a 1, the function will call another function to update a table. 
 * If the PHP file returns a 0, the function will display an error message.
 */
const actualizar_calibre = () => {
    const respuesta = fetchAPI(form_calibre,url+'/produccion/op/actualizar_calibre','POST')
    respuesta.then(json => {
        if (json==1) {
            limpiar_tabla()
            obtener_ordenes()
            open_alert('Calibre actualizado correctamente','verde')
        } else {
            open_alert('El calibre no pudo ser actualizado','rojo')
        }
    })
}

/* Preventing the default action of the form. */
form_calibre.addEventListener('submit', (evt) => {
    evt.preventDefault()
    actualizar_calibre()
})

/**
 * "When the user clicks on a button, the value of the button is assigned to the value of the input
 * field."
 * 
 * The function is called when the user clicks on a button. The function takes two arguments: the value
 * of the button that was clicked, and the value of the input field.
 * 
 * The function then assigns the value of the button to the value of the input field.
 * 
 * The function is called when the user clicks on a button. The function takes two arguments: the value
 * of the button that was clicked, and the value of the input field.
 * 
 * The function then assigns the value of the button to the value of the input field.
 * 
 * The function is called when the user clicks on a button. The function takes two arguments: the value
 * of the button that was clicked, and the value of the input field.
 * 
 * The function then assigns the value of the
 * @param click_op - The value of the option selected in the first select box
 * @param click_calibre - The value of the clicked button
 */
const obtener_calibre = (click_op,click_calibre) => {
    const op = document.getElementById('calibre_op')
    const calibre = document.getElementById('calibre')

    op.value = click_op
    calibre.value = click_calibre
}

/**
 * It takes a value, appends it to a URL, and then calls a function called printPage with the URL as a
 * parameter.
 * @param valor - is the id of the record
 */
const generar_control_vacio = (valor) => {
    printPage(url + "/produccion/control/pdf_control_vacio?valor=" + valor);
};

/**
 * It takes an id, and then it prints a page.
 * @param id - The id of the order
 */
const generar_orden_produccion = (id) => {
    printPage(url + "/ventas/orden/pdforden?atributo=Id_Folio&value=" + id);
};

/**
 * It takes a parameter, and then it calls another function with two parameters
 * @param bote - is the amount of money
 */
const generar_tarjeta = (bote) => {
    printPage(url+'/ventas/tarjeta/pdftarjeta?value='+auxiliar.dato+"&bote="+bote)
}

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

/* Adding an event listener to the DOMContentLoaded event. */
document.addEventListener('DOMContentLoaded', () => {
    // obtener_ordenes()
    buscar_mes_actual()
});

/* Adding an event listener to the document. */
document.addEventListener('click', (evt) => {
    if (evt.target.dataset.plano) {
        obtener_plano(evt.target.dataset.plano);
    } else if (evt.target.dataset.impresion == "documento") {
        generar_PDF();
    } else if (evt.target.dataset.calibre) {
        obtener_calibre(evt.target.dataset.op, evt.target.dataset.calibre);
    } else if (evt.target.dataset.impresion == "control_vacio") {
        generar_control_vacio(evt.target.dataset.control);
    } else if (evt.target.dataset.impresion == "orden_produccion") {
        generar_orden_produccion(evt.target.dataset.orden);
    } else if (evt.target.dataset.tarjeta) {
        auxiliar.dato = evt.target.dataset.tarjeta;
    } else if (evt.target.dataset.t1) {
        if (document.getElementById("bote").value != '') {
            generar_tarjeta(document.getElementById("bote").value);
        }
    }
})