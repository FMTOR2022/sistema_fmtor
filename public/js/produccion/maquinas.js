/* Creating an object called dias and assigning it a property called nombre. The property nombre is an
array of strings. */
const dias = {
    nombre: ["Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sabado"]
}

/* Creating an object called maquinas. */
const maquinas = {
    forjado: 9,
    ranurado: 4,
    rolado: 7,
    shank: 3
}

/* Getting the elements from the HTML page. */
const input = document.getElementById('fecha_reporte')
const select = document.getElementById('pzas_kilos')
const estado = document.getElementById('estado')
        
/**
 * It removes the element with the id of 'acordeon' from the second element with the class of
 * 'informacion' if the element with the id of 'acordeon' exists.
 */
const quitar_semanas = () => {
    if (document.getElementById('acordeon')) {
        const acordeon = document.getElementById('acordeon')

        document.getElementsByClassName('informacion')[1].removeChild(acordeon)
    }
}

/**
 * It takes a JSON array and a string, and then it renders a table with the data from the JSON array.
 * @param json - the data you're working with
 * @param semana - week number
 */
const render_semana = (json,semana) => {
    const turnos = []

    let totales_semanales = [0,0,0,0,0,0,0,0,0,0,0,0]
    let observaciones = []
    let acumulado = 0
    let aux = [0,0,0,0,0,0,0,0,0]
    let aux_observaciones = [0,0,0,0,0,0,0,0,0]
    let a = ''

    let turno_anterior = ''
    let fecha_anterior = ''

    if (json.length > 0) {
        json.forEach(el => {
            if ((turno_anterior == '' || turno_anterior == el.turno) && (fecha_anterior == '' || fecha_anterior == el.fecha)) {
                if (select.value == 'kilos') {
                    aux[el.no_maquina-1] += parseInt(el.kilos)
                } else if (select.value == 'pzas') {
                    aux[el.no_maquina-1] += parseInt(el.pzas)
                }
                a = el.observaciones.replace(/\s+/g, '_')
                aux_observaciones[el.no_maquina-1] = a
                turno_anterior = el.turno
                fecha_anterior = el.fecha
            } else if ((turno_anterior != el.turno) || (fecha_anterior != el.fecha)) {
                aux.push(fecha_anterior)
                aux.push(turno_anterior)
                turnos.push(aux)
                observaciones.push(aux_observaciones)

                turno_anterior = el.turno
                fecha_anterior = el.fecha
                aux = [0,0,0,0,0,0,0,0,0]
                aux_observaciones = [0,0,0,0,0,0,0,0,0]
                if (select.value == 'kilos') {
                    aux[el.no_maquina-1] = parseInt(el.kilos)
                } else if (select.value == 'pzas') {
                    aux[el.no_maquina-1] = parseInt(el.pzas)
                }
                a = el.observaciones.replace(/\s+/g, '_')
                aux_observaciones[el.no_maquina-1] = a
            }
        });

        observaciones.push(aux_observaciones)

        aux.push(fecha_anterior)
        aux.push(turno_anterior)
        
        turnos.push(aux)

        aux = []
        contador = 0;
    
        for (let i = 0; i < turnos.length; i++) {
            for (let j = 0; j < 10; j++) {
                aux.push(turnos[i][j])
            }
            aux = []
    
            const fecha = turnos[i][9].split(' ')
            const total_semana = parseInt(turnos[i][0])+parseInt(turnos[i][1])+parseInt(turnos[i][2])+parseInt(turnos[i][3])+parseInt(turnos[i][4])+parseInt(turnos[i][5])+parseInt(turnos[i][6])+parseInt(turnos[i][7])+parseInt(turnos[i][8])
            
            if (i == 0) {
                acumulado = total_semana
            } else {
                acumulado += total_semana
            }

            document.getElementById('body_'+semana).innerHTML += '<tr>'+
                                                                    '<td>'+fecha[0]+'</td>' +
                                                                    '<td class="txt-center '+observaciones[i][0]+'">'+turnos[i][0]+'</td>' +
                                                                    '<td class="txt-center '+observaciones[i][1]+'">'+turnos[i][1]+'</td>' +
                                                                    '<td class="txt-center '+observaciones[i][2]+'">'+turnos[i][2]+'</td>' +
                                                                    '<td class="txt-center '+observaciones[i][3]+'">'+turnos[i][3]+'</td>' +
                                                                    '<td class="txt-center '+observaciones[i][4]+'">'+turnos[i][4]+'</td>' +
                                                                    '<td class="txt-center '+observaciones[i][5]+'">'+turnos[i][5]+'</td>' +
                                                                    '<td class="txt-center '+observaciones[i][6]+'">'+turnos[i][6]+'</td>' +
                                                                    '<td class="txt-center '+observaciones[i][7]+'">'+turnos[i][7]+'</td>' +
                                                                    '<td class="txt-center '+observaciones[i][8]+'">'+turnos[i][8]+'</td>' +
                                                                    '<td class="txt-center"></td>' +
                                                                    '<td class="txt-center">'+total_semana+'</td>' +
                                                                    '<td class="txt-center">'+new Intl.NumberFormat('es-MX').format(acumulado)+'</td>' +
                                                                '</tr>';
            totales_semanales[0] += parseInt(turnos[i][0],10)
            totales_semanales[1] += parseInt(turnos[i][1],10)
            totales_semanales[2] += parseInt(turnos[i][2],10)
            totales_semanales[3] += parseInt(turnos[i][3],10)
            totales_semanales[4] += parseInt(turnos[i][4],10)
            totales_semanales[5] += parseInt(turnos[i][5],10)
            totales_semanales[6] += parseInt(turnos[i][6],10)
            totales_semanales[7] += parseInt(turnos[i][7],10)
            totales_semanales[8] += parseInt(turnos[i][8],10)
            totales_semanales[10] += parseInt(total_semana)
            totales_semanales[11] += parseInt(acumulado)
            contador+=9
        }

        const tfoot = document.createElement('tfoot')
        const tr = document.createElement('tr')
        tr.innerHTML += '<td>Total:</td>'
        for (let i = 0; i < totales_semanales.length; i++) {
            if (i > 9 || i < 9) {
                tr.innerHTML += '<td class="txt-center">'+ new Intl.NumberFormat('es-MX').format(totales_semanales[i])+'</td>'
            } else {
                tr.innerHTML += '<td></td>';
            }
        }
        tfoot.appendChild(tr)
        document.getElementById('tabla_'+semana).appendChild(tfoot)
    } else {
        document.getElementById('body_'+semana).innerHTML += '<tr>'+
                                                                '<td colspan="25" class="txt-center">No existe ningún registro</td>' +
                                                            '</tr>';
    }
}

/**
 * It takes a JSON object and a string, and then it does some stuff
 * @param json - the data that I'm getting from the server
 * @param semana - is the week number
 */
const render_semana_ranurado = (json,semana) => {
    const turnos = []

    let totales_semanales = [0,0,0,0,0,0,0]
    let observaciones = []
    let acumulado = 0
    let aux = [0,0,0,0]
    let aux_observaciones = [0,0,0,0]
    let a = ''

    let turno_anterior = ''
    let fecha_anterior = ''

    if (json.length > 0) {
        json.forEach(el => {
            if ((turno_anterior == '' || turno_anterior == el.turno) && (fecha_anterior == '' || fecha_anterior == el.fecha)) {
                if (select.value == 'kilos') {
                    aux[el.no_maquina-1] += parseInt(el.kilos)
                } else if (select.value == 'pzas') {
                    aux[el.no_maquina-1] += parseInt(el.pzas)
                }
                a = el.observaciones.replace(/\s+/g, '_')
                aux_observaciones[el.no_maquina-1] = a
                turno_anterior = el.turno
                fecha_anterior = el.fecha
            } else if ((turno_anterior != el.turno) || (fecha_anterior != el.fecha)) {
                aux.push(fecha_anterior)
                aux.push(turno_anterior)
                turnos.push(aux)
                observaciones.push(aux_observaciones)

                turno_anterior = el.turno
                fecha_anterior = el.fecha
                aux = [0,0,0,0]
                aux_observaciones = [0,0,0,0]
                if (select.value == 'kilos') {
                    aux[el.no_maquina-1] = parseInt(el.kilos)
                } else if (select.value == 'pzas') {
                    aux[el.no_maquina-1] = parseInt(el.pzas)
                }
                a = el.observaciones.replace(/\s+/g, '_')
                aux_observaciones[el.no_maquina-1] = a
            }
        });

        observaciones.push(aux_observaciones)

        aux.push(fecha_anterior)
        aux.push(turno_anterior)
        
        turnos.push(aux)

        aux = []
        contador = 0;
    
        for (let i = 0; i < turnos.length; i++) {
            for (let j = 0; j < 4; j++) {
                aux.push(turnos[i][j])
            }
            aux = []
    
            const fecha = turnos[i][4].split(' ')
            const total_semana = parseInt(turnos[i][0])+parseInt(turnos[i][1])+parseInt(turnos[i][2])+parseInt(turnos[i][3])
    
            if (i == 0) {
                acumulado = total_semana
            } else {
                acumulado += total_semana
            }

            document.getElementById('body_'+semana).innerHTML += '<tr>'+
                                                                    '<td>'+fecha[0]+'</td>' +
                                                                    '<td class="txt-center '+observaciones[i][0]+'">'+turnos[i][0]+'</td>' +
                                                                    '<td class="txt-center '+observaciones[i][1]+'">'+turnos[i][1]+'</td>' +
                                                                    '<td class="txt-center '+observaciones[i][2]+'">'+turnos[i][2]+'</td>' +
                                                                    '<td class="txt-center '+observaciones[i][3]+'">'+turnos[i][3]+'</td>' +
                                                                    '<td class="txt-center"></td>' +
                                                                    '<td class="txt-center">'+total_semana+'</td>' +
                                                                    '<td class="txt-center">'+new Intl.NumberFormat('es-MX').format(acumulado)+'</td>' +
                                                                '</tr>';
            totales_semanales[0] += parseInt(turnos[i][0],10)
            totales_semanales[1] += parseInt(turnos[i][1],10)
            totales_semanales[2] += parseInt(turnos[i][2],10)
            totales_semanales[3] += parseInt(turnos[i][3],10)
            totales_semanales[4] += parseInt(turnos[i][4],10)
            totales_semanales[5] += parseInt(total_semana)
            totales_semanales[6] += parseInt(acumulado)
        }

        const tfoot = document.createElement('tfoot')
        const tr = document.createElement('tr')
        tr.innerHTML += '<td>Total:</td>'
        for (let i = 0; i < totales_semanales.length; i++) {
            if (i > 4 || i < 4) {
                tr.innerHTML += '<td class="txt-center">'+ new Intl.NumberFormat('es-MX').format(totales_semanales[i])+'</td>'
            } else {
                tr.innerHTML += '<td></td>';
            }
        }
        tfoot.appendChild(tr)
        document.getElementById('tabla_'+semana).appendChild(tfoot)
    } else {
        document.getElementById('body_'+semana).innerHTML += '<tr>'+
                                                                '<td colspan="25" class="txt-center">No existe ningún registro</td>' +
                                                            '</tr>';
    }
}

/**
 * It takes a JSON object and a string, and then it renders a table.
 * @param json - the data that I'm getting from the server
 * @param semana - is the week number
 */
const render_semana_shank = (json,semana) => {
    let turnos = []
    let totales_semanales = [0,0,0,0,0,0]
    let observaciones = []
    let acumulado = 0
    let aux = [0,0,0]
    let aux_observaciones = [0,0,0]
    let a = ''

    let turno_anterior = ''
    let fecha_anterior = ''

    if (json.length > 0) {
        json.forEach(el => {
            if ((turno_anterior == '' || turno_anterior == el.turno) && (fecha_anterior == '' || fecha_anterior == el.fecha)) {
                if (select.value == 'kilos') {
                    aux[el.no_maquina-1] += parseInt(el.kilos)
                } else if (select.value == 'pzas') {
                    aux[el.no_maquina-1] += parseInt(el.pzas)
                }
                a = el.observaciones.replace(/\s+/g, '_')
                aux_observaciones[el.no_maquina-1] = a
                turno_anterior = el.turno
                fecha_anterior = el.fecha
            } else if ((turno_anterior != el.turno) || (fecha_anterior != el.fecha)) {
                aux.push(fecha_anterior)
                aux.push(turno_anterior)
                turnos.push(aux)
                observaciones.push(aux_observaciones)

                turno_anterior = el.turno
                fecha_anterior = el.fecha
                aux = [0,0,0]
                aux_observaciones = [0,0,0]
                if (select.value == 'kilos') {
                    aux[el.no_maquina-1] = parseInt(el.kilos)
                } else if (select.value == 'pzas') {
                    aux[el.no_maquina-1] = parseInt(el.pzas)
                }
                a = el.observaciones.replace(/\s+/g, '_')
                aux_observaciones[el.no_maquina-1] = a
            }
        });

        observaciones.push(aux_observaciones)

        aux.push(fecha_anterior)
        aux.push(turno_anterior)
        
        turnos.push(aux)
    
        aux = []
        contador = 0;
    
        for (let i = 0; i < turnos.length; i++) {
            for (let j = 0; j < 10; j++) {
                aux.push(turnos[i][j])
            }
            aux = []
    
            const fecha = turnos[i][3].split(' ')
            const total_semana = parseInt(turnos[i][0])+parseInt(turnos[i][1])+parseInt(turnos[i][2])
    
            if (i == 0) {
                acumulado = total_semana
            } else {
                acumulado += total_semana
            }

            document.getElementById('body_'+semana).innerHTML += '<tr>'+
                                                                    '<td>'+fecha[0]+'</td>' +
                                                                    '<td class="txt-center '+observaciones[contador]+'">'+turnos[i][0]+'</td>' +
                                                                    '<td class="txt-center '+observaciones[contador+1]+'">'+turnos[i][1]+'</td>' +
                                                                    '<td class="txt-center '+observaciones[contador+2]+'">'+turnos[i][2]+'</td>' +
                                                                    '<td class="txt-center"></td>' +
                                                                    '<td class="txt-center">'+total_semana+'</td>' +
                                                                    '<td class="txt-center">'+new Intl.NumberFormat('es-MX').format(acumulado)+'</td>' +
                                                                '</tr>';
            totales_semanales[0] += parseInt(turnos[i][0],10)
            totales_semanales[1] += parseInt(turnos[i][1],10)
            totales_semanales[2] += parseInt(turnos[i][2],10)
            totales_semanales[4] += parseInt(total_semana)
            totales_semanales[5] += parseInt(acumulado)
            contador+=3
        }

        const tfoot = document.createElement('tfoot')
        const tr = document.createElement('tr')
        tr.innerHTML += '<td>Total:</td>'
        for (let i = 0; i < totales_semanales.length; i++) {
            if (i > 3 || i < 3) {
                tr.innerHTML += '<td class="txt-center">'+ new Intl.NumberFormat('es-MX').format(totales_semanales[i])+'</td>'
            } else {
                tr.innerHTML += '<td></td>';
            }
        }
        tfoot.appendChild(tr)
        document.getElementById('tabla_'+semana).appendChild(tfoot)
    } else {
        document.getElementById('body_'+semana).innerHTML += '<tr>'+
                                                                '<td colspan="25" class="txt-center">No existe ningún registro</td>' +
                                                            '</tr>';
    }
}

/**
 * It takes an array of objects, and returns an array of objects, where each object is the sum of the
 * values of the original objects, grouped by the value of the property "turno".
 * @param json - the data you're working with
 * @param semana - week number
 */
const render_semana_acabo = (json,semana) => {
    const turnos = []
    let turno = 0;
    let fecha = '';
    let kilos = 0;
    let pzas = 0;
    let fechas = [];

    let acumulado = 0

    if (json.length > 0) {
        json.forEach(el => {
            if ((turno == 0 || turno == el.turno) && (fecha == '' || fecha == el.fecha)) {
                if (select.value == 'kilos') {
                    kilos += parseInt(el.kilos)
                } else if (select.value == 'pzas') {
                    pzas += parseInt(el.pzas)
                }
                turno = el.turno
                fecha = el.fecha
            } else if ((turno != el.turno) || (fecha != el.fecha)){
                if (select.value == 'kilos') {
                    turnos.push(kilos)
                } else if (select.value == 'pzas') {
                    turnos.push(pzas)
                }
                kilos = 0;
                pzas = 0;
                turno = 0;
                fechas.push(fecha)
                fecha = '';
                turno = el.turno
                fecha = el.fecha
                kilos += parseInt(el.kilos)
                pzas += parseInt(el.pzas)
            }
        });

        if (select.value == 'kilos') {
            turnos.push(kilos)
        } else if (select.value == 'pzas') {
            turnos.push(pzas)
        }
        fechas.push(fecha)

        for (let r = 0; r < turnos.length; r++) {
            document.getElementById('body_'+semana).innerHTML += '<tr>'+
                                                                    '<td>'+fechas[r]+'</td>' +
                                                                    '<td class="txt-center">'+turnos[r]+'</td>' +
                                                                    // '<td class="txt-center">'+new Intl.NumberFormat('es-MX').format(acumulado)+'</td>' +
                                                                '</tr>';
            acumulado+=turnos[r];
        }
        
        const tfoot = document.createElement('tfoot')
        const tr = document.createElement('tr')
        tr.innerHTML += '<td>Total acumulado:</td>'
        tr.innerHTML += '<td class="txt-center">'+acumulado+'</td>'
        tfoot.appendChild(tr)
        document.getElementById('tabla_'+semana).appendChild(tfoot)
    } else {
        document.getElementById('body_'+semana).innerHTML += '<tr>'+
                                                                '<td colspan="7" class="txt-center">No existe ningún registro</td>' +
                                                            '</tr>';
    }
}

/**
 * It takes a JSON object and a string, and then it renders a table with the data from the JSON object
 * @param json - is the data that I'm getting from the server
 * @param semana - is the week number
 */
const render_semana_rolado = (json,semana) => {
    const turnos = []

    let totales_semanales = [0,0,0,0,0,0,0,0,0,0]
    let observaciones = []
    let acumulado = 0
    let aux = [0,0,0,0,0,0,0]
    let aux_observaciones = [0,0,0,0,0,0,0]
    let a = ''

    let turno_anterior = ''
    let fecha_anterior = ''

    if (json.length > 0) {
        json.forEach(el => {
            if ((turno_anterior == '' || turno_anterior == el.turno) && (fecha_anterior == '' || fecha_anterior == el.fecha)) {
                if (select.value == 'kilos') {
                    aux[el.no_maquina-1] += parseInt(el.kilos)
                } else if (select.value == 'pzas') {
                    aux[el.no_maquina-1] += parseInt(el.pzas)
                }
                a = el.observaciones.replace(/\s+/g, '_')
                aux_observaciones[el.no_maquina-1] = a
                turno_anterior = el.turno
                fecha_anterior = el.fecha
            } else if ((turno_anterior != el.turno) || (fecha_anterior != el.fecha)) {
                aux.push(fecha_anterior)
                aux.push(turno_anterior)
                turnos.push(aux)
                observaciones.push(aux_observaciones)

                turno_anterior = el.turno
                fecha_anterior = el.fecha
                aux = [0,0,0,0,0,0,0]
                aux_observaciones = [0,0,0,0,0,0,0]
                if (select.value == 'kilos') {
                    aux[el.no_maquina-1] = parseInt(el.kilos)
                } else if (select.value == 'pzas') {
                    aux[el.no_maquina-1] = parseInt(el.pzas)
                }
                a = el.observaciones.replace(/\s+/g, '_')
                aux_observaciones[el.no_maquina-1] = a
            }
        });

        observaciones.push(aux_observaciones)

        aux.push(fecha_anterior)
        aux.push(turno_anterior)
        
        turnos.push(aux)

        aux = []
        contador = 0;
    
        for (let i = 0; i < turnos.length; i++) {
            for (let j = 0; j < 11; j++) {
                aux.push(turnos[i][j])
            }
            aux = []
    
            const fecha = turnos[i][7].split(' ')
            const total_semana = parseInt(turnos[i][0])+parseInt(turnos[i][1])+parseInt(turnos[i][2])+parseInt(turnos[i][3])+parseInt(turnos[i][4])+parseInt(turnos[i][5])+parseInt(turnos[i][6])
            
            if (i == 0) {
                acumulado = total_semana
            } else {
                acumulado += total_semana
            }
            
            document.getElementById('body_'+semana).innerHTML += '<tr>'+
                                                                    '<td>'+fecha[0]+'</td>' +
                                                                    '<td class="txt-center '+observaciones[i][0]+'">'+turnos[i][0]+'</td>' +
                                                                    '<td class="txt-center '+observaciones[i][1]+'">'+turnos[i][1]+'</td>' +
                                                                    '<td class="txt-center '+observaciones[i][2]+'">'+turnos[i][2]+'</td>' +
                                                                    '<td class="txt-center '+observaciones[i][3]+'">'+turnos[i][3]+'</td>' +
                                                                    '<td class="txt-center '+observaciones[i][4]+'">'+turnos[i][4]+'</td>' +
                                                                    '<td class="txt-center '+observaciones[i][5]+'">'+turnos[i][5]+'</td>' +
                                                                    '<td class="txt-center '+observaciones[i][6]+'">'+turnos[i][6]+'</td>' +
                                                                    '<td class="txt-center"></td>' +
                                                                    '<td class="txt-center">'+total_semana+'</td>' +
                                                                    '<td class="txt-center">'+new Intl.NumberFormat('es-MX').format(acumulado)+'</td>' +
                                                                '</tr>';
            totales_semanales[0] += parseInt(turnos[i][0],10)
            totales_semanales[1] += parseInt(turnos[i][1],10)
            totales_semanales[2] += parseInt(turnos[i][2],10)
            totales_semanales[3] += parseInt(turnos[i][3],10)
            totales_semanales[4] += parseInt(turnos[i][4],10)
            totales_semanales[5] += parseInt(turnos[i][5],10)
            totales_semanales[6] += parseInt(turnos[i][6],10)
            totales_semanales[8] += parseInt(total_semana)
            totales_semanales[9] += parseInt(acumulado)
        }

        const tfoot = document.createElement('tfoot')
        const tr = document.createElement('tr')
        tr.innerHTML += '<td>Total:</td>'
        for (let i = 0; i < totales_semanales.length; i++) {
            if (i > 7 || i < 7) {
                tr.innerHTML += '<td class="txt-center">'+ new Intl.NumberFormat('es-MX').format(totales_semanales[i])+'</td>'
            } else {
                tr.innerHTML += '<td></td>';
            }
        }
        tfoot.appendChild(tr)
        document.getElementById('tabla_'+semana).appendChild(tfoot)
    } else {
        document.getElementById('body_'+semana).innerHTML += '<tr>'+
                                                                '<td colspan="25" class="txt-center">No existe ningún registro</td>' +
                                                            '</tr>';
    }
}

/**
 * It creates a table for each week of the month.
 * @param limite_semana - [1,8,15,22,29]
 * @param anio - 2020
 * @param mes - month
 */
const render_encabezado_forjado = (limite_semana,anio, mes) => {

    let inicio = 1
    let fin = 0

    const informacion = document.getElementsByClassName('informacion')
    const acordeon_div = document.createElement('div')

    acordeon_div.classList.add('acordeon')
    acordeon_div.classList.add('tarjeta_transparente')
    acordeon_div.setAttribute('id','acordeon')
    informacion[1].appendChild(acordeon_div)

    const acordeon = document.getElementsByClassName('acordeon')

    for (let i = 0; i < limite_semana.length; i++) {
        if (i == 0) {
            inicio = '01'
        } else {
            if ((limite_semana[i-1]+1) < 10) {
                inicio = '0'+(limite_semana[i-1]+1)
            } else {
                inicio = limite_semana[i-1]+1
            }
        }

        if (limite_semana[i] < 10) {
            fin = '0'+(limite_semana[i])
        } else {
            fin = (limite_semana[i])
        }
        const div = document.createElement('div')
        div.innerHTML += '<div class="acordeon_opcion">'+
                                        '<div class="titulo_acordeon">'+
                                            '<h3 data-acordeon="semana_'+i+'">Semana '+(i+1)+' ('+inicio + ' - ' + fin +')</h3>'+
                                        '</div>'+
                                        '<div id="semana_'+i+'" class="contenido_acordeon mostrar_contenido">'+
                                            '<table id="tabla_'+(i+1)+'">'+
                                                '<thead>'+
                                                    '<tr>'+
                                                        '<th style="min-width:100px;" rowspan="2">Día</th>'+
                                                        '<th colspan="9">REPORTE DIARIO POR MAQUINA</th>'+
                                                        '<th></th>'+
                                                        '<th colspan="2">REGISTRO DIARIO DE PRODUCCIÓN</th>'+
                                                    '</tr>'+
                                                    '<tr>'+
                                                        '<th>1</th>'+
                                                        '<th>2</th>'+
                                                        '<th>3</th>'+
                                                        '<th>4</th>'+
                                                        '<th>5</th>'+
                                                        '<th>6</th>'+
                                                        '<th>7</th>'+
                                                        '<th>8</th>'+
                                                        '<th>9</th>'+
                                                        '<th></th>'+
                                                        '<th colspan="2">FORJADO</th>'+
                                                    '</tr>'+
                                                '</thead>'+
                                                '<tbody id="body_'+(i+1)+'">'+
                                                '</tbody>'+
                                            '</table>'+
                                        '</div>'+
                                    '</div>'
        acordeon[0].appendChild(div)

        obtener_dias(estado.value, select.value,anio+'-'+mes+'-'+inicio,anio+'-'+mes+'-'+fin, (i+1))
    }
}

/**
 * It creates a table for each week of the month.
 * @param limite_semana - [1,7,14,21,28]
 * @param anio - year
 * @param mes - month
 */
const render_encabezado_ranurado = (limite_semana,anio, mes) => {
    let inicio = 1
    let fin = 0

    const informacion = document.getElementsByClassName('informacion')
    const acordeon_div = document.createElement('div')

    acordeon_div.classList.add('acordeon')
    acordeon_div.classList.add('tarjeta_transparente')
    acordeon_div.setAttribute('id','acordeon')
    informacion[1].appendChild(acordeon_div)

    const acordeon = document.getElementsByClassName('acordeon')

    for (let i = 0; i < limite_semana.length; i++) {
        if (i == 0) {
            inicio = '01'
        } else {
            if (limite_semana[i-1] < 10) {
                inicio = '0'+(limite_semana[i-1]+1)
            } else {
                inicio = limite_semana[i-1]+1
            }
        }

        if (limite_semana[i] < 10) {
            fin = '0'+(limite_semana[i])
        } else {
            fin = (limite_semana[i])
        }
        const div = document.createElement('div')
        div.innerHTML += '<div class="acordeon_opcion">'+
                                        '<div class="titulo_acordeon">'+
                                            '<h3 data-acordeon="semana_'+i+'">Semana '+(i+1)+' ('+inicio + ' - ' + fin +')</h3>'+
                                        '</div>'+
                                        '<div id="semana_'+i+'" class="contenido_acordeon mostrar_contenido">'+
                                            '<table id="tabla_'+(i+1)+'">'+
                                                '<thead>'+
                                                    '<tr>'+
                                                        '<th style="min-width:100px;" rowspan="2">Día</th>'+
                                                        '<th colspan="4">REPORTE DIARIO POR MAQUINA</th>'+
                                                        '<th></th>'+
                                                        '<th colspan="2">REGISTRO DIARIO DE PRODUCCIÓN</th>'+
                                                    '</tr>'+
                                                    '<tr>'+
                                                        '<th>1</th>'+
                                                        '<th>2</th>'+
                                                        '<th>3</th>'+
                                                        '<th>4</th>'+
                                                        '<th></th>'+
                                                        '<th colspan="2">RANURADO</th>'+
                                                    '</tr>'+
                                                '</thead>'+
                                                '<tbody id="body_'+(i+1)+'">'+
                                                '</tbody>'+
                                            '</table>'+
                                        '</div>'+
                                    '</div>'
        acordeon[0].appendChild(div)
        obtener_dias(estado.value, select.value,anio+'-'+mes+'-'+inicio,anio+'-'+mes+'-'+fin, (i+1))
    }
}

/**
 * It creates a table for each week of the month.
 * @param limite_semana - [1,7,14,21,28]
 * @param anio - year
 * @param mes - month
 */
const render_encabezado_shank = (limite_semana,anio, mes) => {
    let inicio = 1
    let fin = 0

    const informacion = document.getElementsByClassName('informacion')
    const acordeon_div = document.createElement('div')

    acordeon_div.classList.add('acordeon')
    acordeon_div.classList.add('tarjeta_transparente')
    acordeon_div.setAttribute('id','acordeon')
    informacion[1].appendChild(acordeon_div)

    const acordeon = document.getElementsByClassName('acordeon')

    for (let i = 0; i < limite_semana.length; i++) {
        if (i == 0) {
            inicio = '01'
        } else {
            if (limite_semana[i-1] < 10) {
                inicio = '0'+(limite_semana[i-1]+1)
            } else {
                inicio = limite_semana[i-1]+1
            }
        }

        if (limite_semana[i] < 10) {
            fin = '0'+(limite_semana[i])
        } else {
            fin = (limite_semana[i])
        }
        const div = document.createElement('div')
        div.innerHTML += '<div class="acordeon_opcion">'+
                                        '<div class="titulo_acordeon">'+
                                            '<h3 data-acordeon="semana_'+i+'">Semana '+(i+1)+' ('+inicio + ' - ' + fin +')</h3>'+
                                        '</div>'+
                                        '<div id="semana_'+i+'" class="contenido_acordeon mostrar_contenido">'+
                                            '<table id="tabla_'+(i+1)+'">'+
                                                '<thead>'+
                                                    '<tr>'+
                                                        '<th style="min-width:100px;" rowspan="2">Día</th>'+
                                                        '<th colspan="3">REPORTE DIARIO POR MAQUINA</th>'+
                                                        '<th></th>'+
                                                        '<th colspan="2">REGISTRO DIARIO DE PRODUCCIÓN</th>'+
                                                    '</tr>'+
                                                    '<tr>'+
                                                        '<th>1</th>'+
                                                        '<th>2</th>'+
                                                        '<th>3</th>'+
                                                        '<th></th>'+
                                                        '<th colspan="2">SHANK</th>'+
                                                    '</tr>'+
                                                '</thead>'+
                                                '<tbody id="body_'+(i+1)+'">'+
                                                '</tbody>'+
                                            '</table>'+
                                        '</div>'+
                                    '</div>'
        acordeon[0].appendChild(div)
        obtener_dias(estado.value, select.value,anio+'-'+mes+'-'+inicio,anio+'-'+mes+'-'+fin, (i+1))
    }
}

/**
 * It creates a table for each week of the month.
 * @param limite_semana - [1,7,14,21,28]
 * @param anio - year
 * @param mes - month
 */
const render_encabezado_rolado = (limite_semana,anio,mes) => {
    let inicio = 1
    let fin = 0

    const informacion = document.getElementsByClassName('informacion')
    const acordeon_div = document.createElement('div')

    acordeon_div.classList.add('acordeon')
    acordeon_div.classList.add('tarjeta_transparente')
    acordeon_div.setAttribute('id','acordeon')
    informacion[1].appendChild(acordeon_div)

    const acordeon = document.getElementsByClassName('acordeon')

    for (let i = 0; i < limite_semana.length; i++) {
        if (i == 0) {
            inicio = '01'
        } else {
            if (limite_semana[i-1] < 10) {
                inicio = '0'+(limite_semana[i-1]+1)
            } else {
                inicio = limite_semana[i-1]+1
            }
        }

        if (limite_semana[i] < 10) {
            fin = '0'+(limite_semana[i])
        } else {
            fin = (limite_semana[i])
        }

        const div = document.createElement('div')
        div.innerHTML += '<div class="acordeon_opcion">'+
                                        '<div class="titulo_acordeon">'+
                                            '<h3 data-acordeon="semana_'+i+'">Semana '+(i+1)+' ('+inicio + ' - ' + fin +')</h3>'+
                                        '</div>'+
                                        '<div id="semana_'+i+'" class="contenido_acordeon mostrar_contenido">'+
                                            '<table id="tabla_'+(i+1)+'">'+
                                                '<thead>'+
                                                    '<tr>'+
                                                        '<th style="min-width:100px;" rowspan="2">Día</th>'+
                                                        '<th colspan="7">REPORTE DIARIO POR MAQUINA</th>'+
                                                        '<th></th>'+
                                                        '<th colspan="2">REGISTRO DIARIO DE PRODUCCIÓN</th>'+
                                                    '</tr>'+
                                                    '<tr>'+
                                                        '<th>1</th>'+
                                                        '<th>2</th>'+
                                                        '<th>3</th>'+
                                                        '<th>4</th>'+
                                                        '<th>5</th>'+
                                                        '<th>6</th>'+
                                                        '<th>7</th>'+
                                                        '<th></th>'+
                                                        '<th colspan="2">ROLADO</th>'+
                                                    '</tr>'+
                                                '</thead>'+
                                                '<tbody id="body_'+(i+1)+'">'+
                                                '</tbody>'+
                                            '</table>'+
                                        '</div>'+
                                    '</div>'
        acordeon[0].appendChild(div)
        obtener_dias(estado.value, select.value,anio+'-'+mes+'-'+inicio,anio+'-'+mes+'-'+fin, (i+1))
    }
}

/**
 * It creates a table for each week of the month.
 * @param limite_semana - [1,7,14,21,28]
 * @param anio - year
 * @param mes - month
 */
const render_encabezado_acabado = (limite_semana,anio,mes) => {
    let inicio = 1
    let fin = 0

    const informacion = document.getElementsByClassName('informacion')
    const acordeon_div = document.createElement('div')

    acordeon_div.classList.add('acordeon')
    acordeon_div.classList.add('tarjeta_transparente')
    acordeon_div.setAttribute('id','acordeon')
    informacion[1].appendChild(acordeon_div)

    const acordeon = document.getElementsByClassName('acordeon')

    for (let i = 0; i < limite_semana.length; i++) {
        if (i == 0) {
            inicio = '01'
        } else {
            if (limite_semana[i-1] < 10) {
                inicio = '0'+(limite_semana[i-1]+1)
            } else {
                inicio = limite_semana[i-1]+1
            }
        }

        if (limite_semana[i] < 10) {
            fin = '0'+(limite_semana[i])
        } else {
            fin = (limite_semana[i])
        }
        const div = document.createElement('div')
        div.innerHTML += '<div class="acordeon_opcion">'+
                                        '<div class="titulo_acordeon">'+
                                            '<h3 data-acordeon="semana_'+i+'">Semana '+(i+1)+' ('+inicio + ' - ' + fin +')</h3>'+
                                        '</div>'+
                                        '<div id="semana_'+i+'" class="contenido_acordeon mostrar_contenido">'+
                                            '<table id="tabla_'+(i+1)+'">'+
                                                '<thead>'+
                                                    '<tr>'+
                                                        '<th style="min-width:100px;" rowspan="2">Día</th>'+
                                                        '<th colspan="1">REGISTRO DIARIO DE PRODUCCIÓN</th>'+
                                                    '</tr>'+
                                                    '<tr>'+
                                                        '<th colspan="1">ACABADO</th>'+
                                                    '</tr>'+
                                                '</thead>'+
                                                '<tbody id="body_'+(i+1)+'">'+
                                                '</tbody>'+
                                            '</table>'+
                                        '</div>'+
                                    '</div>'
        acordeon[0].appendChild(div)

        obtener_dias(estado.value, select.value,anio+'-'+mes+'-'+inicio,anio+'-'+mes+'-'+fin, (i+1))
    }
}

/**
 * It takes a year, a month, and a state, and then it renders a header for a table.
 * @param anio - year
 * @param mes - month
 * @param estado_seleccionado - is the value of the select option.
 */
const obtener_semanas = (anio, mes, estado_seleccionado) => {    
    let limite_semana = []

    const dias_mes = new Date(anio, mes, 0).getDate()

    for (let i = 1; i <= dias_mes; i++) {
        const dia = new Date(anio, mes-1, i)
        if (dia.getDay() == 6 || i == dias_mes) {
            limite_semana.push(dia.getDate())
        }
    }

    if (estado_seleccionado == 1) {
        render_encabezado_forjado(limite_semana,anio, mes)
    } else if (estado_seleccionado == 2) {
        render_encabezado_ranurado(limite_semana,anio,mes)
    } else if (estado_seleccionado == 3) {
        render_encabezado_rolado(limite_semana,anio,mes)
    } else if (estado_seleccionado == 4) {
        render_encabezado_shank(limite_semana,anio,mes)
    }else if (estado_seleccionado == 6) {
        render_encabezado_acabado(limite_semana,anio,mes)
    }
}

/**
 * It takes in 5 parameters, and then makes a fetch request to a url, and then depending on the value
 * of the first parameter, it will call a different function to render the data.
 * @param vista - 1,2,3,4,6
 * @param concepto - 1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,
 * @param inicio - 2019-01-01
 * @param fin - "2019-12-31"
 * @param semana - is the week number
 */
const obtener_dias = (vista, concepto, inicio, fin, semana) => {
    const respuesta = fetchAPI('',url+'/produccion/maquinas/obtener_reporte?vista='+vista+'&concepto='+concepto+'&inicio='+inicio+'&fin='+fin,'')
    respuesta.then(json => {
        if (vista == 1) {
            render_semana(json,semana)
        } else if (vista == 2) {
            render_semana_ranurado(json,semana)
        } else if (vista == 3) {
            render_semana_rolado(json,semana)
        } else if (vista == 4) {
            render_semana_shank(json,semana)
        } else if (vista == 6) {
            render_semana_acabo(json,semana)
        }
    })
}

/**
 * It takes three arguments, and if all three are not empty, it splits the first argument into an
 * array, calls a function to remove some elements from the DOM, and then calls a function to add some
 * elements to the DOM.
 * @param input - the date input value
 * @param select - is the select element
 * @param estado - is the state of the country
 */
const generar_reporte = (input,select,estado) => {
    if (input != '' && select != '' && estado != '') {
        const fecha = input.split('-')
        quitar_semanas()
        obtener_semanas(fecha[0],fecha[1],estado)
    }
}

/**
 * It takes three parameters, and then it calls the printPage function with a URL that contains the
 * three parameters.
 * @param fecha - is a date input
 * @param kilos_pzas - is a select option with the values of "kilos" and "piezas"
 * @param estado - is a select option
 */
const generar_PDF = (fecha,kilos_pzas,estado) => {
    printPage(url+'/produccion/maquinas/pdf_maquinas?fecha_reporte='+fecha.value+'&kilos_pzas='+kilos_pzas.value+'&estado='+estado.value);
}

/* Listening for a change in the input field and then calling the function generar_reporte() with the
input value, select value, and estado value. */
input.addEventListener('change', () => {
    generar_reporte(input.value,select.value,estado.value)
}) 

/* Adding an event listener to the select element. When the select element changes, it calls the
generar_reporte function. */
select.addEventListener('change', () => {
    generar_reporte(input.value,select.value,estado.value)
})

/* Adding an event listener to the select element. */
estado.addEventListener('change', () => {
    generar_reporte(input.value,select.value,estado.value)
})

/* Listening for a click event on the button with the data-impresion attribute. */
document.addEventListener('click', (evt) => {
    if (evt.target.dataset.impresion) {
        const fecha = document.getElementById('fecha_reporte')
        const kilos_pzas = document.getElementById('pzas_kilos')
        const estado = document.getElementById('estado')
        if (fecha.value != '' && kilos_pzas.value != '' && estado.value != '') {
            generar_PDF(fecha,kilos_pzas,estado)
        } else {
            if (fecha.value == '') {
                open_alert('No ha seleccionado el mes','naranja')
            } else if (kilos_pzas.value == '') {
                open_alert('No ha seleccionado el tipo de reporte','naranja')
            } else if (estado.value == '') {
                open_alert('No ha seleccionado el departamento.','naranja')
            } else {
                open_alert('No ha seleccionado ningún campo', 'naranja')
            }
        }
    }
})

/**
 * If the month is less than 10, then the value of the input will be the year plus a zero plus the
 * month plus one. 
 * 
 * If the month is greater than 10, then the value of the input will be the year plus the month plus
 * one.
 */
const auto = () => {
    const hoy = new Date()
    const year = hoy.getFullYear();
    const month = hoy.getMonth();

    if (month < 10) {
        input.value = year+'-0'+(month+1)
    } else {
        input.value = year+'-'+(month+1)
    }
}

/* Adding an event listener to the DOMContentLoaded event. When the DOMContentLoaded event fires, the
auto() function is called. */
document.addEventListener('DOMContentLoaded', () => {
    auto()
})