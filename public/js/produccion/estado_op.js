/* Creating a variable called contador_aux and assigning it a value of 0. It is also creating a
variable called retraso and assigning it a value of false. It is also creating a variable called
retrasos and assigning it a value of an empty array. It is also creating a variable called meses and
assigning it a value of an array of strings. */
let contador_aux = 0
let retraso = false
let retrasos = []
const meses = [
    'ENE',
    'FEB',
    'MAR',
    'ABR',
    'MAY',
    'JUN',
    'JUL',
    'AGO',
    'SEP',
    'OCT',
    'NOV',
    'DIC'
]

/**
 * It takes an array of objects, creates a table, and then appends the objects to the table.
 * @param ops - Array of objects
 */
const render_retrasos = (ops) => {
    const contenedor = document.getElementById('estados')

    contenedor.innerHTML += '<div class="tarjeta" style="padding: 0px;">'+
                                '<table>'+
                                    '<thead>'+
                                        '<tr>'+
                                            '<th colspan="9">RETRASOS</th>'+
                                        '</tr>'+
                                        '<tr>'+
                                            '<th>O.P.</th>'+
                                            '<th>Cliente</th>'+
                                            '<th style="min-width: 170px;">Descripción</th>'+
                                            '<th>Tratamiento</th>'+
                                            '<th>Material</th>'+
                                            '<th>Cantidad</th>'+
                                            '<th>Precio</th>'+
                                            '<th style="min-width: 120px;">Total</th>'+
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
                                '<td>'+el.tratamiento+'</td>'+
                                '<td>'+el.material+'</td>'+
                                '<td class="txt-right">'+new Intl.NumberFormat('es-MX').format(el.cantidad_elaborar)+'</td>'+
                                '<td class="txt-right">$ '+new Intl.NumberFormat('es-MX').format(el.precio_millar)+'</td>'+
                                '<td class="txt-right">$ '+new Intl.NumberFormat('es-MX').format(el.cantidad_elaborar * el.precio_millar)+'</td>'+
                                '<td>'+el.estado_general+'</td>'+
                            '</tr>'
    })
}

/**
 * It takes an array of dates, and an array of objects, and renders a table with the dates as headers,
 * and the objects as rows.
 * 
 * The dates are formatted as "DD / MMM / YYYY"
 * 
 * The objects are formatted as "Id_Folio, Clientes, descripcion, tratamiento, material,
 * cantidad_elaborar, precio_millar, cantidad_elaborar * precio_millar, estado_general"
 * 
 * The function is called like this:
 * 
 * render_estado(semana_1,semana_3,semana_5,ops)
 * 
 * Where semana_1, semana_3, and semana_5 are arrays of dates, and ops is an array of objects.
 * 
 * I'm trying to make it so
 * @param semana_1 - ["2020-01-06", "2020-01-12"]
 * @param semana_3 - ["2020-01-06", "2020-01-12"]
 * @param semana_5 - ["2020-01-06", "2020-01-12"]
 * @param ops - Array of objects
 */
const render_estado = (semana_1,semana_3,semana_5,ops) => {
    const contenedor = document.getElementById('estados')
    let mes_sem1_a = semana_1[0].split('-')[0]+' / '+meses[parseInt(semana_1[0].split('-')[1])-1]+' / '+semana_1[0].split('-')[2]
    let mes_sem1_b = semana_1[1].split('-')[0]+' / '+meses[parseInt(semana_1[1].split('-')[1])-1]+' / '+semana_1[1].split('-')[2]
    let mes_sem3_a = semana_3[0].split('-')[0]+' / '+meses[parseInt(semana_3[0].split('-')[1])-1]+' / '+semana_3[0].split('-')[2]
    let mes_sem3_b = semana_3[1].split('-')[0]+' / '+meses[parseInt(semana_3[1].split('-')[1])-1]+' / '+semana_3[1].split('-')[2]
    let mes_sem5_a = semana_5[0].split('-')[0]+' / '+meses[parseInt(semana_5[0].split('-')[1])-1]+' / '+semana_5[0].split('-')[2]
    let mes_sem5_b = semana_5[1].split('-')[0]+' / '+meses[parseInt(semana_5[1].split('-')[1])-1]+' / '+semana_5[1].split('-')[2]
    // let mes_sem1_b = meses[parseInt(semana_1[1].split("-")) - 1];

    contenedor.innerHTML += '<div class="tarjeta" style="padding: 0px;">'+
                                '<table>'+
                                    '<thead>'+
                                        '<tr>'+
                                            '<th>1 SEM.</th>'+
                                            '<th colspan="8"> '+mes_sem1_a+'  -  ' +mes_sem1_b+'</th>'+
                                        '</tr>'+
                                        '<tr>'+
                                            '<th>3 SEM.</th>'+
                                            '<th colspan="8"> '+mes_sem3_a+'  -  '+mes_sem3_b+'</th>'+
                                        '</tr>'+
                                        '<tr>'+
                                            '<th>5 SEM.</th>'+
                                            '<th colspan="8"> '+mes_sem5_a+'  -  '+mes_sem5_b+'</th>'+
                                        '</tr>'+
                                        '<tr>'+
                                            '<th>O.P.</th>'+
                                            '<th>Cliente</th>'+
                                            '<th style="min-width: 170px;">Descripción</th>'+
                                            '<th>Tratamiento</th>'+
                                            '<th>Material</th>'+
                                            '<th>Cantidad</th>'+
                                            '<th>Precio</th>'+
                                            '<th style="min-width: 120px;">Total</th>'+
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
                                '<td>'+el.tratamiento+'</td>'+
                                '<td>'+el.material+'</td>'+
                                '<td class="txt-right">'+new Intl.NumberFormat('es-MX').format(el.cantidad_elaborar)+'</td>'+
                                '<td class="txt-right">$ '+new Intl.NumberFormat('es-MX').format(el.precio_millar)+'</td>'+
                                '<td class="txt-right">$ '+new Intl.NumberFormat('es-MX').format(el.cantidad_elaborar * el.precio_millar)+'</td>'+
                                '<td>'+el.estado_general+'</td>'+
                            '</tr>'
    })
    contador_aux++;
}

/**
 * It takes an array of dates, a range of dates, and an array of objects, and returns a table with the
 * dates and objects.
 * @param semanas - Array of arrays, each array has two elements, the first one is the week number and
 * the second one is the date of the last day of the week.
 * @param rango - [2019-10-28, 2019-11-03]
 * @param ops - [{op: 'op1', semana: '2019-01-01'}, {op: 'op2', semana: '2019-01-01'}, {op: 'op3',
 * semana: '2019-01-01'}, {op: 'op
 */
const crear_tabla = (semanas,rango, ops) => {
    let semana_3 = []
    let semana_5 = []
    let contador_semana = 1
    let fecha_actual = new Date()
    
    for (let i = 0; i < semanas.length; i++) {
        let semana = ''
        if (parseInt(semanas[i][1].split('-')[1]) < 10){ 
            semana = semanas[i][1].split('-')[0]+'-0'+parseInt(semanas[i][1].split('-')[1]);
        } else {
            semana = semanas[i][1].split('-')[0]+'-'+semanas[i][1].split('-')[1];
        }

        if (parseInt(semanas[i][1].split('-')[2]) < 10){ 
            semana += '-0'+parseInt(semanas[i][1].split('-')[2]);
        } else {
            semana += '-'+semanas[i][1].split('-')[2];
        }

        // console.log(semana == rango[1], rango);

        if (semanas[i][1] == rango[1] || contador_semana > 1) {
            // console.log(contador_semana);
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

/**
 * It takes an array of arrays of objects, and an array of arrays of dates, and creates a table for
 * each array of dates.
 * @param registros - Array of arrays of objects.
 * @param semanas -
 * [["2019-01-01","2019-01-07"],["2019-01-08","2019-01-14"],["2019-01-15","2019-01-21"],["2019-01-22","2019-01-28"],["2019-01-29","
 */
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
                    const f_op = fecha_op.split('-')
                    let aux = rango_minimo.getFullYear()
                    if ((parseInt(rango_minimo.getMonth())+1) < 10) {
                        aux = aux + '-0' + parseInt(rango_minimo.getMonth()+1)
                    } else {
                        aux = aux + '-' + rango_minimo.getMonth()+1;
                    }

                    if (parseInt(rango_minimo.getDate()) < 10) {
                        aux = aux + '-0' + parseInt(rango_minimo.getDate())
                    } else {
                        aux = aux + '-' + rango_minimo.getDate()
                    }
                    
                    rango_minimo.setDate(parseInt(rango_minimo.getDate()) + 1);
                    // console.log(semanas, aux, f_op[0] + '-' + f_op[1] + '-' + f_op[2], aux == (f_op[0] + '-' + f_op[1] + '-' + f_op[2]));
                    if (aux == (f_op[0] + '-' + f_op[1] + '-' + f_op[2])) {
                        rango_min = rango_min.toLocaleDateString()
                        rango_max = rango_max.toLocaleDateString()
                        let rango_anterior_min = ''
                        let rango_anterior_max = ''
                        if (parseInt(rango_min.split('/')[1]) < 10){ 
                            rango_anterior_min = rango_min.split('/')[2]+'-0'+parseInt(rango_min.split('/')[1])+'-'+rango_min.split('/')[0];
                        } else {
                            rango_anterior_min = rango_min.split('/')[2]+'-'+rango_min.split('/')[1]+'-'+rango_min.split('/')[0];
                        }

                        if (parseInt(rango_anterior_min.split('-')[2]) < 10){ 
                            rango_anterior_min = rango_anterior_min.split('-')[0]+'-'+rango_anterior_min.split('-')[1]+'-0'+parseInt(rango_anterior_min.split('-')[2]);
                        } 

                        if (parseInt(rango_max.split('/')[1]) < 10){ 
                            rango_anterior_max = rango_max.split('/')[2]+'-0'+parseInt(rango_max.split('/')[1])+'-'+rango_max.split('/')[0];
                        } else {
                            rango_anterior_max = rango_max.split('/')[2]+'-'+rango_max.split('/')[1]+'-'+rango_max.split('/')[0];
                        }

                        if (parseInt(rango_anterior_max.split('-')[2]) < 10){ 
                            rango_anterior_max = rango_anterior_max.split('-')[0]+'-'+rango_anterior_max.split('-')[1]+'-0'+parseInt(rango_anterior_max.split('-')[2]);
                        }

                        const rangos = [rango_anterior_min,rango_anterior_max]
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

                        // console.log(rango_anterior);
                        
                        rango_anterior = rangos
                        fecha_anterior = rangos[1]
                    }
                }
            })
        })
    })
    // console.log(rango_anterior);
    // console.log(rango_anterior);
    crear_tabla(semanas,rango_anterior,ops)
}

/**
 * It takes an array of months and returns an array of weeks.
 * @param meses - ['2019-01', '2019-02', '2019-03', '2019-04', '2019-05', '2019-06', '2019-07',
 * '2019-08', '2019-09', '2019-10', '2019-11', '2019-12']
 * @returns An array of arrays. Each array contains the dates of a week.
 */
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
            const dia_semana = new Date(meses[i].split('-')[0],(parseInt(meses[i].split('-')[1])-1),j)
            const dia = dia_semana.getDay()

            if (dia == 6 && semana.length > 0) {
                if (dia_semana.getDate() < 10) {
                    semana.push(meses[i]+'-0'+dia_semana.getDate())
                } else {
                    semana.push(meses[i]+'-'+dia_semana.getDate())
                }
                semanas.push(semana)
                semana = []
            }
            
            if (dia == 0) {
                if (dia_semana.getDate() < 10) {
                    semana.push(meses[i]+'-0'+dia_semana.getDate())
                } else {
                    semana.push(meses[i]+'-'+dia_semana.getDate())
                }
            }
        }
    }

    return semanas;
}

/**
 * It takes an array of objects and an array of months, and returns an array of arrays of objects,
 * grouped by month.
 * @param json - is the data that I'm working with
 * @param meses -
 * ['2019-01','2019-02','2019-03','2019-04','2019-05','2019-06','2019-07','2019-08','2019-09','2019-10','2019-11','2019-12']
 */
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
        }
        contador++;
    });

    registros.push(aux)
    semanas = obtener_semanas(meses)

    agrupar_registros(registros,semanas)
}

/**
 * It takes a JSON array and returns an array of strings that represent the months in which the JSON
 * array has data.
 * @param json - is the data that I'm working with
 */
const extraer_meses = (json) => {
    const meses = [];
    let aux = '';
    let contador = 0;

    json.forEach(el => {
        const fecha = el.Fecha.split(' ')
        if (contador == 0) {
            if ((parseInt(fecha[0].split('-')[1])-1) >= 1) {
                if (parseInt(fecha[0].split('-')[1]) < 10) {
                    meses.push(fecha[0].split('-')[0]+'-0'+(parseInt(fecha[0].split('-')[1])-1))
                } else {
                    meses.push(fecha[0].split('-')[0]+'-'+(parseInt(fecha[0].split('-')[1])-1))
                }
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
    
    if ((parseInt(meses[meses.length-1].split('-')[1])+1) > 12) {
        meses.push((parseInt(meses[meses.length-1].split('-')[0])+1)+'-01');
    } else {
        if (parseInt(meses[meses.length-1].split('-')[1]) < 10) {
            meses.push((meses[meses.length-1].split('-')[0])+'-0'+(parseInt(meses[meses.length-1].split('-')[1])+1));
        } else {
            meses.push((meses[meses.length-1].split('-')[0])+'-'+(parseInt(meses[meses.length-1].split('-')[1])+1));
        }
    }

    dividir_registros(json,meses)
}

/**
 * It makes a fetch request to a url, and if the response is not empty, it calls another function.
 */
const obtener_ordenes = () => {
    const respuesta = fetchAPI('',url+'/produccion/estado/obtener','')
    respuesta.then(json => {
        if (json.length > 0) {
            extraer_meses(json);
        }
    })
};

/* Listening for a click event on the document. If the click event is on an element with the
data-impresion attribute, it will call the printPage function with the
url+'/produccion/estado/pdf_estado' as the argument. */
document.addEventListener('click', (evt) => {
    if (evt.target.dataset.impresion) {
        printPage(url+'/produccion/estado/pdf_estado');
    }
})

/* Listening for the DOMContentLoaded event, and when it is fired, it calls the obtener_ordenes()
function. */
document.addEventListener('DOMContentLoaded', () => {
    obtener_ordenes()
})