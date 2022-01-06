let contador_aux = 0
let retraso = false
let retrasos = []

const render_retrasos = (ops) => {
    const contenedor = document.getElementById('estados')

    contenedor.innerHTML += '<div class="tarjeta">'+
                                '<table>'+
                                    '<thead>'+
                                        '<tr>'+
                                            '<th colspan="7">RETRASOS</th>'+
                                        '</tr>'+
                                        '<tr>'+
                                            '<th>O.P.</th>'+
                                            '<th>Cliente</th>'+
                                            '<th style="min-width: 170px;">Descripción</th>'+
                                            '<th>Cantidad</th>'+
                                            '<th>Precio</th>'+
                                            '<th>Total</th>'+
                                            '<th>Estado</th>'+
                                        '</tr>'+
                                    '</thead>'+
                                    '<tbody id="body_retrasos">'+
                                    '</tbody>'+
                                '</table>'

    const t_body = document.getElementById('body_retrasos') 
    ops.forEach(el => {
        t_body.innerHTML += '<tr>'+
                                '<td>'+el.Id_Folio+'</td>'+
                                '<td>'+el.Clientes+'</td>'+
                                '<td>'+el.descripcion+'</td>'+
                                '<td>'+el.cantidad_elaborar+'</td>'+
                                '<td>'+el.precio_millar+'</td>'+
                                '<td>'+new Intl.NumberFormat('es-MX').format(el.cantidad_elaborar * el.precio_millar)+'</td>'+
                                '<td>'+el.estado_general+'</td>'+
                            '</tr>'
    })
}

const render_estado = (semana_1,semana_3,semana_5,ops) => {
    const contenedor = document.getElementById('estados')

    contenedor.innerHTML += '<div class="tarjeta">'+
                                '<table>'+
                                    '<thead>'+
                                        '<tr>'+
                                            '<th>1 SEM.</th>'+
                                            '<th colspan="6">DEL '+semana_1[0]+' AL ' +semana_1[1]+'</th>'+
                                        '</tr>'+
                                        '<tr>'+
                                            '<th>3 SEM.</th>'+
                                            '<th colspan="6">DEL '+semana_3[0]+' AL '+semana_3[1]+'</th>'+
                                        '</tr>'+
                                        '<tr>'+
                                            '<th>5 SEM.</th>'+
                                            '<th colspan="6">DEL '+semana_5[0]+' AL '+semana_5[1]+'</th>'+
                                        '</tr>'+
                                        '<tr>'+
                                            '<th>O.P.</th>'+
                                            '<th>Cliente</th>'+
                                            '<th style="min-width: 170px;">Descripción</th>'+
                                            '<th>Cantidad</th>'+
                                            '<th>Precio</th>'+
                                            '<th>Total</th>'+
                                            '<th>Estado</th>'+
                                        '</tr>'+
                                    '</thead>'+
                                    '<tbody id="body_'+contador_aux+'">'+
                                    '</tbody>'+
                                '</table>'

    const t_body = document.getElementById('body_'+contador_aux) 
    ops.forEach(el => {
        t_body.innerHTML += '<tr>'+
                                '<td>'+el.Id_Folio+'</td>'+
                                '<td>'+el.Clientes+'</td>'+
                                '<td>'+el.descripcion+'</td>'+
                                '<td>'+el.cantidad_elaborar+'</td>'+
                                '<td>'+el.precio_millar+'</td>'+
                                '<td>'+new Intl.NumberFormat('es-MX').format(el.cantidad_elaborar * el.precio_millar)+'</td>'+
                                '<td>'+el.estado_general+'</td>'+
                            '</tr>'
    })
    contador_aux++;
}

const crear_tabla = (semanas,rango, ops) => {
    let semana_3 = []
    let semana_5 = []
    let contador_semana = 1
    let fecha_actual = new Date()
    
    for (let i = 0; i < semanas.length; i++) {
        if (semanas[i][1] == rango[1] || contador_semana > 1) {
            if (contador_semana == 3) {
                semana_3 = [semanas[i][0],semanas[i][1]]
            }
            
            if (contador_semana == 5) {
                semana_5 = [semanas[i][0],semanas[i][1]]
                contador_semana = 1
            } else {
                contador_semana++
            }
        }
    }

    const sem_5 = new Date(semana_5[1].split('-')[0],semana_5[1].split('-')[1]-1,semana_5[1].split('-')[2]);

    if (sem_5.getTime() <= fecha_actual.getTime()) {
        retraso = true
        ops.forEach(op => {
            retrasos.push(op)
        })
    } else {
        if (retraso) {
            render_retrasos(retrasos)
            retraso = false
        }
        render_estado(rango,semana_3,semana_5,ops)
    }
}

const agrupar_registros = (registros,semanas) => {
    let fecha_anterior = ''
    let rango_anterior = []
    let ops = []
    let fechas = []
    registros.forEach(reg => {
        reg.forEach(op => {
            const fecha_op = op.Fecha.split(' ')[0]
            semanas.forEach(rango => {
                let rango_minimo = new Date(rango[0].split('-')[0],rango[0].split('-')[1]-1,rango[0].split('-')[2]);
                let rango_maximo = new Date(rango[1].split('-')[0],rango[1].split('-')[1]-1,rango[1].split('-')[2]);
                let rango_min = new Date(rango[0].split('-')[0],rango[0].split('-')[1]-1,rango[0].split('-')[2]);
                let rango_max = new Date(rango[1].split('-')[0],rango[1].split('-')[1]-1,rango[1].split('-')[2]);

                while(rango_maximo.getTime() >= rango_minimo.getTime()){
                    const aux = rango_minimo.getFullYear() + '-' + (rango_minimo.getMonth() +1) + '-' + rango_minimo.getDate()
                    const f_op = fecha_op.split('-')
                    
                    rango_minimo.setDate(rango_minimo.getDate() + 1);
                    
                    if (aux == (f_op[0] + '-' + f_op[1] + '-' + parseInt(f_op[2]))) {
                        rango_min = rango_min.toLocaleDateString()
                        rango_max = rango_max.toLocaleDateString()
                        const rangos = [rango_min.split('/')[2]+'-'+rango_min.split('/')[1]+'-'+rango_min.split('/')[0],rango_max.split('/')[2]+'-'+rango_max.split('/')[1]+'-'+rango_max.split('/')[0]]

                        if (fecha_anterior == rangos[1] || fecha_anterior == '') {
                            fechas.push(f_op[0] + '-' + f_op[1] + '-' + parseInt(f_op[2]))
                            ops.push(op)
                        } else {
                            crear_tabla(semanas,rango_anterior,ops)
                            fechas = []
                            ops = []
                            rango_anterior = rangos
                            fechas.push(f_op[0] + '-' + f_op[1] + '-' + parseInt(f_op[2]))
                            ops.push(op)
                        }
                        
                        rango_anterior = rangos
                        fecha_anterior = rangos[1]
                    }
                }
            })
        })
    })
    crear_tabla(semanas,rango_anterior,ops)
}

const obtener_semanas = (meses) => {
    let dias = []
    let semanas = []
    let semana = []

    for (let i = 0; i < meses.length; i++) {
        const c_dias = new Date(meses[i].split('-')[0],meses[i].split('-')[1],0)
        dias.push(c_dias.getDate())
    } 

    for (let i = 0; i < meses.length; i++) {
        for (let j = 1; j <= dias[i]; j++) {
            const dia_semana = new Date(meses[i].split('-')[0],(meses[i].split('-')[1]-1),j)
            const dia = dia_semana.getDay()

            if (dia == 6 && semana.length > 0) {
                semana.push(meses[i]+'-'+dia_semana.getDate())
                semanas.push(semana)
                semana = []
            }

            if (dia == 0) {
                semana.push(meses[i]+'-'+dia_semana.getDate())
            }
        }
    }

    return semanas;
}

const dividir_registros = (json,meses) => {
    let registros = []
    let aux = []
    let contador = 0
    let semanas = []

    json.forEach(el => {
        const fecha = el.Fecha.split(' ')
        if (fecha[0].split('-')[0]+'-'+fecha[0].split('-')[1] == meses[contador]) {
            aux.push(el)
        } else {
            registros.push(aux)
            aux = []
            aux.push(el)
            contador++;
        }
    });

    registros.push(aux)
    semanas = obtener_semanas(meses)

    agrupar_registros(registros,semanas)
}

const extraer_meses = (json) => {
    const meses = [];
    let aux = '';
    let contador = 0;

    json.forEach(el => {
        const fecha = el.Fecha.split(' ')
        if (contador == 0) {
            if ((fecha[0].split('-')[1]-1) >= 1) {
                meses.push(fecha[0].split('-')[0]+'-'+(fecha[0].split('-')[1]-1))
            } else {
                meses.push((fecha[0].split('-')[0]-1)+'-'+12)
            }
        } 

        if (fecha[0].split('-')[1] != aux) {
            meses.push(fecha[0].split('-')[0]+'-'+fecha[0].split('-')[1]);
            aux = fecha[0].split('-')[1];
        }
        contador++;
    });

    if ((meses[meses.length-1].split('-')[1]+1) > 12) {
        meses.push((parseInt(meses[meses.length-1].split('-')[0])+1)+'-'+1);
    } else {
        meses.push((meses[meses.length-1].split('-')[0])+'-'+(meses[meses.length-1].split('-')[1]+1));
    }

    dividir_registros(json,meses)
}

const obtener_ordenes = () => {
    const respuesta = fetchAPI('',url+'/produccion/estado/obtener','')
    respuesta.then(json => {
        extraer_meses(json);
    })
};

document.addEventListener('click', (evt) => {
    if (evt.target.dataset.impresion) {
        printPage(url+'/produccion/estado/pdf_estado');
    }
})

document.addEventListener('DOMContentLoaded', () => {
    obtener_ordenes()
})