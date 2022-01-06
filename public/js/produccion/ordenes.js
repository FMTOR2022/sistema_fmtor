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

const render_ordenes = (json) => {
    const t_body= document.getElementsByClassName('body')
    let total_acumulado = 0
    let total_acumulado_mensual = 0
    let total_kilos = 0
    let total_kilos_mensual = 0
    let aux = 0
    let mes = ''
    
    json.forEach(el => {
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

        if (aux > 0 && mes != (fecha[0]+'-'+fecha[1])) {
            tr_totales.innerHTML = '<tr>'+
                                        '<td class="txt-right">Kilos mensuales: </td>'+
                                        '<td class="txt-right">'+new Intl.NumberFormat('es-MX').format(total_kilos_mensual)+'</td>'+
                                        '<td colspan="10" class="txt-right">Acumulado mensual:</td>'+
                                        '<td class="txt-right">$ ' + new Intl.NumberFormat('es-MX').format(total_acumulado_mensual) + '</td>'+
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

        if (aux == 0 || mes != (fecha[0]+'-'+fecha[1])) {
            tr_mes.innerHTML = '<tr><td class="txt-center" colspan="14">'+meses[fecha[1]-1]+' '+fecha[0]+'</td></tr>'
            mes = (fecha[0]+'-'+fecha[1])
            aux++;
            t_body[0].appendChild(tr_mes)
        }

        total_acumulado += parseFloat(el.TOTAL)
        total_kilos += (el.factor*el.cantidad_elaborar)

        tr.innerHTML += '<td data-plano="'+el.Id_Catalogo+'" data-modal="modal-plano">'+el.calibre+'</td>'+
                        '<td class="txt-right" data-plano="'+el.Id_Catalogo+'" data-modal="modal-plano">'+new Intl.NumberFormat('es-MX').format(el.factor*el.cantidad_elaborar)+'</td>'+
                        '<td data-plano="'+el.Id_Catalogo+'" data-modal="modal-plano">'+el.factor+'</td>'+
                        '<td data-plano="'+el.Id_Catalogo+'" data-modal="modal-plano">'+el.Id_Folio+'</td>'+
                        '<td data-plano="'+el.Id_Catalogo+'" data-modal="modal-plano">'+el.Fecha.split(' ')[0]+'</td>'+
                        '<td data-plano="'+el.Id_Catalogo+'" data-modal="modal-plano">'+el.Clientes+'</td>'+
                        '<td data-plano="'+el.Id_Catalogo+'" data-modal="modal-plano">'+el.medida+'</td>'+
                        '<td data-plano="'+el.Id_Catalogo+'" data-modal="modal-plano">'+el.descripcion+'</td>'+
                        '<td data-plano="'+el.Id_Catalogo+'" data-modal="modal-plano">'+el.acabados+'</td>'+
                        '<td data-plano="'+el.Id_Catalogo+'" data-modal="modal-plano" class="number">'+el.cantidad_elaborar+'</td>'+
                        '<td class="txt-right" data-plano="'+el.Id_Catalogo+'" data-modal="modal-plano" class="number">$ ' + new Intl.NumberFormat('es-MX').format(el.precio_millar)+'</td>'+
                        '<td class="txt-right" data-plano="'+el.Id_Catalogo+'" data-modal="modal-plano" class="number">$ ' + new Intl.NumberFormat('es-MX').format(el.TOTAL)+'</td>'+
                        '<td data-plano="'+el.Id_Catalogo+'" data-modal="modal-plano" class="number txt-right">$ ' + new Intl.NumberFormat('es-MX').format(total_acumulado) + '</td>'+
                        '<td>' + el.estado_general+'</td>'
        t_body[0].appendChild(tr)
    })
    const tr_totales = document.createElement('tr')
    tr_totales.innerHTML = '<tr>'+
                                '<td class="txt-right">Kilos mensuales: </td>'+
                                '<td class="txt-right">'+new Intl.NumberFormat('es-MX').format(total_kilos_mensual)+'</td>'+
                                '<td colspan="10" class="txt-right">Acumulado mensual:</td>'+
                                '<td class="txt-right">$ ' + new Intl.NumberFormat('es-MX').format(total_acumulado_mensual) + '</td>'+
                                '<td></td>'+
                            '</tr>';
    t_body[0].appendChild(tr_totales)
    total_acumulado_mensual = 0
    const table = document.getElementById('table')
    const tfoot = document.createElement('tfoot');
    tfoot.classList.add('tfoot')
    tfoot.innerHTML = '<tr>'+
                            '<td class="txt-right">Total kilos: </td>'+
                            '<td class="txt-right">'+new Intl.NumberFormat('es-MX').format(total_kilos)+'</td>'+
                            '<td colspan="10" class="txt-right">Total acumulado</td>'+
                            '<td class="txt-right">$ ' + new Intl.NumberFormat('es-MX').format(total_acumulado) + '</td>'+
                            '<td></td>'+
                    '</tr>';
    table.appendChild(tfoot)
}

const obtener_ordenes = () => {
    const respuesta = fetchAPI('',url+'/produccion/op/obtener_ordenes','')
    respuesta.then(json => {
        render_ordenes(json)
    })
}

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

const consulta_PDF = () => {
    tipo_consulta(url+'/produccion/op/pdf_ordenes?formato=v_ordenes')
}

const generar_PDF = () => {
    consulta_PDF()
}

const restaurar_formulario = () => {
    const inputs_radio = document.getElementsByName('buscar_por');
    for (let i = 0; i < inputs_radio.length; i++) {
        inputs_radio[i].checked = false;
    }

    const inputs = document.getElementsByClassName('input');
    for (let i = 0; i < inputs.length; i++) {
        inputs_radio.value = '';
    }
}

const btn_reset = document.getElementById('btn_resetear');

btn_reset.addEventListener('click', () => {
    limpiar_tabla()
    obtener_ordenes()
    restaurar_formulario()
})

document.addEventListener('DOMContentLoaded', () => {
    obtener_ordenes()
});

document.addEventListener('click', (evt) => {
    if (evt.target.dataset.plano) {
        obtener_plano(evt.target.dataset.plano)
    } else if (evt.target.dataset.impresion) {
        generar_PDF()
    }
})