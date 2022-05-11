const meses = 
[
    'ENERO',
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
    'DICIEMBRE'
]
let total_mes_costo = 0
let total_mes_impuestos = 0
let total_mes_total = 0
let totales = []

/**
 * It adds a row to the table with the totals of the previous rows.
 */
const render_totales = () => {
    const body = document.getElementsByClassName("body_reporte");
    body[0].innerHTML += '<tr><td colspan="9"></td></tr>'+
                            '<tr style="background: var(--background-aux);">'+
                                '<td class="txt-right" colspan="5">Total:</td>'+
                                '<td class="txt-right">$ '+ new Intl.NumberFormat('es-MX').format(total_mes_costo) + '</td>'+
                                '<td class="txt-right">$ '+ new Intl.NumberFormat('es-MX').format(total_mes_impuestos) + '</td>'+
                                '<td class="txt-right">$ '+ new Intl.NumberFormat('es-MX').format(total_mes_total) + '</td>'+
                            '</tr>';

}

/**
 * It takes an array of arrays, and renders a table row for each array in the array.
 * @param body - the table body
 * @param array - [{fecha: "2019-01-01", razon_social: "Cliente 1", id_folio: "1", costo: "100",
 * impuestos: "6.25", total: "106.25"}, {fecha: "2019
 */
const render_filas = (body,array) => {
    let total_concepto_costo = 0
    let total_concepto_impuestos = 0
    let total_concepto_total = 0
    array.forEach(el => {
        total_concepto_costo += el[1]
        total_concepto_impuestos += (el[1] / 100) * 6.25;
        total_concepto_total += (el[1] / 100) * 6.25 + el[1];
        body[0].innerHTML += '<tr>'+
                                // '<td style="padding: 5px;"><button title="Mover" class="material-icons btn btn-icon-self">low_priority</button></td>'+
                                '<td>'+el[0].fecha+'</td>'+
                                '<td>'+el[0].razon_social+'</td>'+
                                '<td>'+el[0].id_folio+'</td>'+
                                '<td class="txt-right">' + new Intl.NumberFormat('es-MX').format(el[3]) + '</td>'+
                                '<td class="txt-right">' + new Intl.NumberFormat('es-MX').format(el[2]) + '</td>'+
                                '<td class="txt-right">$ '+ new Intl.NumberFormat('es-MX').format(el[1]) + '</td>'+
                                '<td class="txt-right">$ '+ new Intl.NumberFormat('es-MX').format((el[1] / 100) * 6.25) + '</td>'+
                                '<td class="txt-right">$ '+ new Intl.NumberFormat('es-MX').format(((el[1] / 100) * 6.25) + el[1]) + '</td>'+
                            '</tr>';
    })

    total_mes_costo += total_concepto_costo;
    total_mes_impuestos += total_concepto_impuestos;
    total_mes_total += total_concepto_total;

    body[0].innerHTML += '<tr style="background: var(--background-aux);">'+
                                '<td colspan="3"></td>'+
                                '<td class="txt-right"></td>'+
                                '<td class="txt-right"></td>'+
                                '<td class="txt-right">$ '+ new Intl.NumberFormat('es-MX').format(total_concepto_costo) + '</td>'+
                                '<td class="txt-right">$ '+ new Intl.NumberFormat('es-MX').format(total_concepto_impuestos) + '</td>'+
                                '<td class="txt-right">$ '+ new Intl.NumberFormat('es-MX').format(total_concepto_total) + '</td>'+
                            '</tr>';

    totales.push(total_concepto_costo);

}

/**
 * It takes a JSON object and a table body element and renders the table body with the JSON data.
 * @param json - is the array of objects that I'm using to render the table.
 * @param body - is the table body
 */
const render_salidas = (json,body) => {
    let aux = 0;
    let array = []
    let anterior = 0;
    let salida_anterior = {};
    let total_salida_costo = 0;
    let total_salida_cantidad = 0;
    let total_salida_kilos = 0;

    json.forEach((element) => {
        if (aux == 0) {
            anterior = element.id_folio
        } 
        
        if (anterior == element.id_folio) {
            total_salida_costo += parseFloat(element.costo);
            total_salida_cantidad += parseFloat(element.cantidad);
            total_salida_kilos += (parseFloat(element.Factor) * parseFloat(element.cantidad))
            anterior = element.id_folio;
            salida_anterior = element;
        } else {
            array.push([salida_anterior,total_salida_costo,total_salida_cantidad,total_salida_kilos])
            anterior = element.id_folio;
            salida_anterior = element
            total_salida_costo = 0;
            total_salida_cantidad = 0;
            total_salida_kilos = 0;
            total_salida_costo += parseFloat(element.costo);
            total_salida_cantidad += parseFloat(element.cantidad);
            total_salida_kilos += (parseFloat(element.Factor) * parseFloat(element.cantidad))
        }
        aux++;
    });
    array.push([salida_anterior,total_salida_costo,total_salida_cantidad,total_salida_kilos])
    render_filas(body,array)
}

/**
 * It takes the values of the array totales and adds them up, then it adds the total to the HTML
 * elements with the IDs forjadora, rdg, notas, canceladas, sin, total, total-porcentaje, and
 * total-total.
 */
const suma_total = () => {
    if (totales.length == 0) {
        totales = [0,0,0,0,0,0]
    }

    document.getElementById('forjadora').innerText = '$ ' + new Intl.NumberFormat('es-MX').format(totales[0]+totales[1])
    document.getElementById('rdg').innerText = '$ ' + new Intl.NumberFormat('es-MX').format(totales[2])
    document.getElementById('notas').innerText = '$ ' + new Intl.NumberFormat('es-MX').format(totales[3])
    document.getElementById('canceladas').innerText = '$ ' + new Intl.NumberFormat('es-MX').format(totales[4])
    document.getElementById('sin').innerText = '$ ' + new Intl.NumberFormat('es-MX').format(totales[5])
}

/**
 * It sets the innerText of all the elements with the id's listed to '$ 0.00'
 */
const limpio_total = () => {
    totales = []
    document.getElementById('forjadora').innerText = '$ 0.00'
    document.getElementById('rdg').innerText = '$ 0.00'
    document.getElementById('notas').innerText = '$ 0.00'
    document.getElementById('canceladas').innerText = '$ 0.00'
    document.getElementById('sin').innerText = '$ 0.00'
    document.getElementById('total').innerText = '$ 0.00' 
    document.getElementById('total-porcentaje').innerText = '$ 0.00'
    document.getElementById('total-total').innerText = '$ 0.00'
}

/**
 * It takes a JSON object, and renders it to the DOM.
 * @param json - the data that is being passed to the function
 */
const render_reporte = (json) => {
    let aux = 0;
    const body = document.getElementsByClassName("body_reporte");
    
    limpio_total();
    body[0].innerHTML = "";
    body[0].innerHTML = '<tr><td class="txt-center" colspan="9">FACTURACIÓN</td></tr>'

    
    if (json.terminadas.length == 0) {
        body[0].innerHTML += '<tr><td class="txt-center" colspan="9">No existe ningún registro</td></tr>';
    } else {
        render_salidas(json.terminadas,body)
    }

    body[0].innerHTML += '<tr><td colspan="9"></td></tr>'+
                            '<tr><td class="txt-center" colspan="9">COMPRA</td></tr>';

    if (json.compras.length == 0) {
        body[0].innerHTML += '<tr style="background: var(--background-aux);"><td class="txt-center" colspan="9">No existe ningún registro</td></tr>';
    } else {
        render_salidas(json.compras,body)
    }

    body[0].innerHTML += '<tr><td colspan="9"></td></tr>'+
                        '<tr><td class="txt-center" colspan="9">RDG</td></tr>';

    if (json.rdg.length == 0) {
        body[0].innerHTML += '<tr style="background: var(--background-aux);"><td class="txt-center" colspan="9">No existe ningún registro</td></tr>';
    } else {
        render_salidas(json.rdg,body)
    }

    body[0].innerHTML += '<tr><td colspan="9"></td></tr>'+
                            '<tr><td class="txt-center" colspan="9">CANCELADAS</td></tr>';
                            
    if (json.canceladas.length == 0) {
        body[0].innerHTML += '<tr style="background: var(--background-aux);"><td class="txt-center" colspan="9">No existe ningún registro</td></tr>';
    } else {
        render_salidas(json.canceladas,body)
    }
    
    body[0].innerHTML += '<tr><td colspan="9"></td></tr>'+
                            '<tr><td class="txt-center" colspan="9">NOTAS DE CREDITO</td></tr>';
    if (json.notas.length == 0) {
        body[0].innerHTML += '<tr style="background: var(--background-aux);"><td class="txt-center" colspan="9">No existe ningún registro</td></tr>';
    } else {
        render_salidas(json.notas,body)
    }

    body[0].innerHTML += '<tr><td colspan="9"></td></tr>'+
                            '<tr><td class="txt-center" colspan="9">FACTURAS SIN COMISIÓN</td></tr>';
    if (json.comision.length == 0) {
        body[0].innerHTML += '<tr style="background: var(--background-aux);"><td class="txt-center" colspan="9">No existe ningún registro</td></tr>';
    } else {
        render_salidas(json.comision,body)
    }

    suma_total()
};

/**
 * It fetches data from a server and then displays it in a modal.
 * @param id - id of the row that was clicked
 */
const mostrarModal = (id) => {
    const respues = fetchAPI('', url+'/ventas/reportes/obtener_per?aux=' + id + '', '');
    respues.then(json => {
        pintarModal(json);
    });
}


/**
 * It gets the value of the select element, then it makes a fetch request to the server, then it
 * renders the data in the table.
 */
const obtener = () => {
    const mes = document.getElementById('mes')
    const respuesta = fetchAPI('',url+'/ventas/reportes/obtener?mes='+mes.value, '')
    respuesta.then(json => {
        total_mes_costo = 0;
        total_mes_impuestos = 0;
        total_mes_total = 0;
        render_reporte(json);
        render_totales();
    })
};

/**
 * It takes the current date, splits it into an array, and then checks if the month is less than 10. If
 * it is, it adds a 0 to the beginning of the month. Then it sets the value of the input to the year
 * and month.
 */
const colocar_mes = () => {
    let date = new Date().toLocaleDateString()
    let fecha = date.split('/')
    let aux = ''

    if (fecha[1] < 10) {
        aux = fecha[2] + '-0' + fecha[1]
    } else {
        aux = fecha[2] + '-' + fecha[1]
    }

    document.getElementById('mes').value = aux
}

/* The above code is creating a variable called input_mes and assigning it to the HTML element with the
id of mes. */
const input_mes = document.getElementById('mes')

/* Adding an event listener to the input_mes element. When the input_mes element changes, the obtener()
function is called. */
input_mes.addEventListener('change', () => {
    obtener()
})

const form_precios = document.getElementById('form-precios')

form_precios.addEventListener('submit', (evt) => {
    evt.preventDefault()
    actualizar_precios()
})

const actualizar_precios = () => {
    const respuesta = fetchAPI(form_precios,url+'/ventas/reportes/actualizar_precios','POST')
    respuesta.then(json => {
        console.log(json);
        if (json == 1) {
            open_alert('Actualización correcta','verde')
            obtener_comisiones();
            abrir_modal("modal-precios");
        } else {
            open_alert('Error al actualizar las comisiones','rojo')
        }
    })
}

const obtener_comisiones = () => {
    const respuesta = fetchAPI("", url + "/config/auxiliar_doc_ventas.json", "");
    respuesta.then(json => {
        console.log(json);
        let comision = json.comisiones.pendiente
        let total_comsion = (totales[0]+totales[1]+totales[2]-totales[3]-totales[4]-totales[5]+parseFloat(json.comisiones.pendiente)) - json.comisiones.sola_basic
        let porcentaje_com =(totales[0] +totales[1] +totales[2] -totales[3] -totales[4] -totales[5] +parseFloat(json.comisiones.pendiente) -json.comisiones.sola_basic) *0.02;
        let victor = ((totales[0] +totales[1] +totales[2] -totales[3] -totales[4] -totales[5] +parseFloat(json.comisiones.pendiente) -json.comisiones.sola_basic) * 0.02) * 0.08;
        let total_comsion_mes = porcentaje_com - json.comisiones.nomina_agosto - victor;

        document.getElementById("comision_1").value = json.comisiones.pendiente;
        document.getElementById("sola_1").value = json.comisiones.sola_basic;
        document.getElementById('nomina_1').value = json.comisiones.nomina_agosto
        document.getElementById('pendiente').innerText = '$ ' + new Intl.NumberFormat('es-MX').format(comision);
        document.getElementById('total').innerText = '$ ' + new Intl.NumberFormat('es-MX').format(
            totales[0]+
            totales[1]+
            totales[2]-
            totales[3]-
            totales[4]-
            totales[5]+
            parseFloat(json.comisiones.pendiente))
        document.getElementById('total-porcentaje').innerText = '$ ' + new Intl.NumberFormat('es-MX').format(
            ((totales[0]+
            totales[1]+
            totales[2]-
            totales[3]-
            totales[4]-
            totales[5]+
            parseFloat(json.comisiones.pendiente)) * 0.16))
        document.getElementById('total-total').innerText = '$ ' + new Intl.NumberFormat('es-MX').format(
            ((totales[0]+
            totales[1]+
            totales[2]-
            totales[3]-
            totales[4]-
            totales[5]+
            parseFloat(json.comisiones.pendiente)) * 0.16) + totales[0]+
            totales[1]+
            totales[2]-
            totales[3]-
            totales[4]-
            totales[5]+
            parseFloat(json.comisiones.pendiente))
        document.getElementById('sola_basic').innerText = '$ ' + new Intl.NumberFormat('es-MX').format(json.comisiones.sola_basic);
        document.getElementById('total_Ventas_comision').innerText = '$ ' + new Intl.NumberFormat('es-MX').format(total_comsion)
        document.getElementById('porcentaje_comision').innerText = '$ ' + new Intl.NumberFormat('es-MX').format(porcentaje_com);
        document.getElementById('nomina').innerText = '$ ' + new Intl.NumberFormat('es-MX').format(json.comisiones.nomina_agosto);
        document.getElementById('victor').innerText = '$ ' + new Intl.NumberFormat('es-MX').format(victor);
        document.getElementById('total_comision_mes').innerText = '$ ' + new Intl.NumberFormat('es-MX').format(total_comsion_mes);
    })
}

//posible copia de busqueda 
document.addEventListener('click', evt => {
    if (evt.target.dataset.recarga) {
        obtener();
        restaurar_formulario();
    } else if (evt.target.dataset.limpiar) {
        obtener();
        restaurar_formulario();
    } else if (evt.target.dataset.comisiones) {
        obtener_comisiones()
        abrir_modal('modal-comisiones')
    }
})

/* Adding an event listener to the DOMContentLoaded event. */
document.addEventListener('DOMContentLoaded', () => {
    colocar_mes()
    obtener();
})