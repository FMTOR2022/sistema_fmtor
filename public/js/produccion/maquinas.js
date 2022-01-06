const dias = {
    nombre: ["Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sabado"]
}

const input = document.getElementById('fecha_reporte')
const select = document.getElementById('pzas_kilos')
const estado = document.getElementById('estado')
        
const quitar_semanas = () => {
    if (document.getElementById('acordeon')) {
        const acordeon = document.getElementById('acordeon')

        document.getElementsByClassName('informacion')[1].removeChild(acordeon)
    }
}

const render_semana = (json,semana) => {
    const turnos = []

    let totales_semanales = [0,0,0,0,0,0,0,0,0,0,0,0]
    let acumulado = 0
    let aux = []
    let observaciones = []
    let contador = 1
    let a = ''

    if (json.length > 0) {
        json.forEach(el => {
            if (contador == 9) {
                if (select.value == 'kilos') {
                    aux.push(el.kilos)
                } else if (select.value == 'pzas') {
                    aux.push(el.pzas)
                }
                aux.push(el.fecha)
                aux.push(el.turno)
                turnos.push(aux)
                a = el.observaciones.replace(/\s+/g, '_')
                observaciones.push(a)
                aux = []
                contador = 1;
            } else {
                if (select.value == 'kilos') {
                    aux.push(el.kilos)
                } else if (select.value == 'pzas') {
                    aux.push(el.pzas)
                }
                a = el.observaciones.replace(/\s+/g, '_')
                observaciones.push(a)
                contador++
            }
        });
    
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
                                                                    '<td class="txt-center '+observaciones[contador]+'">'+turnos[i][0]+'</td>' +
                                                                    '<td class="txt-center '+observaciones[contador+1]+'">'+turnos[i][1]+'</td>' +
                                                                    '<td class="txt-center '+observaciones[contador+2]+'">'+turnos[i][2]+'</td>' +
                                                                    '<td class="txt-center '+observaciones[contador+3]+'">'+turnos[i][3]+'</td>' +
                                                                    '<td class="txt-center '+observaciones[contador+4]+'">'+turnos[i][4]+'</td>' +
                                                                    '<td class="txt-center '+observaciones[contador+5]+'">'+turnos[i][5]+'</td>' +
                                                                    '<td class="txt-center '+observaciones[contador+6]+'">'+turnos[i][6]+'</td>' +
                                                                    '<td class="txt-center '+observaciones[contador+7]+'">'+turnos[i][7]+'</td>' +
                                                                    '<td class="txt-center '+observaciones[contador+8]+'">'+turnos[i][8]+'</td>' +
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

const render_semana_ranurado_shank = (json,semana) => {
    const turnos = []

    let totales_semanales = [0,0,0,0,0,0]
    let acumulado = 0
    let aux = []
    let observaciones = []
    let contador = 1
    let a = ''

    if (json.length > 0) {
        json.forEach(el => {
            if (contador == 3) {
                if (select.value == 'kilos') {
                    aux.push(el.kilos)
                } else if (select.value == 'pzas') {
                    aux.push(el.pzas)
                }
                aux.push(el.fecha)
                aux.push(el.turno)
                turnos.push(aux)
                a = el.observaciones.replace(/\s+/g, '_')
                observaciones.push(a)
                aux = []
                contador = 1;
            } else {
                if (select.value == 'kilos') {
                    aux.push(el.kilos)
                } else if (select.value == 'pzas') {
                    aux.push(el.pzas)
                }
                a = el.observaciones.replace(/\s+/g, '_')
                observaciones.push(a)
                contador++
            }
        });
    
        aux = []
        contador = 0;
        console.log(turnos);
    
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

const render_semana_acabo = (json,semana) => {
    const turnos = []

    let totales_semanales = [0,0,0,0,0,0]
    let acumulado = 0
    let aux = []
    let observaciones = []
    let contador = 1
    let a = ''

    if (json.length > 0) {
        json.forEach(el => {
            if (contador == 3) {
                if (select.value == 'kilos') {
                    aux.push(el.kilos)
                } else if (select.value == 'pzas') {
                    aux.push(el.pzas)
                }
                aux.push(el.fecha)
                aux.push(el.turno)
                turnos.push(aux)
                a = el.observaciones.replace(/\s+/g, '_')
                observaciones.push(a)
                aux = []
                contador = 1;
            } else {
                if (select.value == 'kilos') {
                    aux.push(el.kilos)
                } else if (select.value == 'pzas') {
                    aux.push(el.pzas)
                }
                a = el.observaciones.replace(/\s+/g, '_')
                observaciones.push(a)
                contador++
            }
        });
    
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

const render_semana_rolado = (json,semana) => {
    const turnos = []

    let totales_semanales = [0,0,0,0,0,0,0,0,0]
    let acumulado = 0
    let aux = []
    let observaciones = []
    let contador = 1
    let a = ''

    if (json.length > 0) {
        json.forEach(el => {
            if (contador == 6) {
                if (select.value == 'kilos') {
                    aux.push(el.kilos)
                } else if (select.value == 'pzas') {
                    aux.push(el.pzas)
                }
                aux.push(el.fecha)
                aux.push(el.turno)
                turnos.push(aux)
                a = el.observaciones.replace(/\s+/g, '_')
                observaciones.push(a)
                aux = []
                contador = 1;
            } else {
                if (select.value == 'kilos') {
                    aux.push(el.kilos)
                } else if (select.value == 'pzas') {
                    aux.push(el.pzas)
                }
                a = el.observaciones.replace(/\s+/g, '_')
                observaciones.push(a)
                contador++
            }
        });
    
        aux = []
        contador = 0;
    
        for (let i = 0; i < turnos.length; i++) {
            for (let j = 0; j < 10; j++) {
                aux.push(turnos[i][j])
            }
            aux = []
    
            const fecha = turnos[i][6].split(' ')
            const total_semana = parseInt(turnos[i][0])+parseInt(turnos[i][2])+parseInt(turnos[i][3])+parseInt(turnos[i][4])+parseInt(turnos[i][5])
            
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
                                                                    '<td class="txt-center '+observaciones[contador+3]+'">'+turnos[i][3]+'</td>' +
                                                                    '<td class="txt-center '+observaciones[contador+4]+'">'+turnos[i][4]+'</td>' +
                                                                    '<td class="txt-center '+observaciones[contador+5]+'">'+turnos[i][5]+'</td>' +
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
            totales_semanales[7] += parseInt(total_semana)
            totales_semanales[8] += parseInt(acumulado)
            contador+=6
        }

        const tfoot = document.createElement('tfoot')
        const tr = document.createElement('tr')
        tr.innerHTML += '<td>Total:</td>'
        for (let i = 0; i < totales_semanales.length; i++) {
            if (i > 6 || i < 6) {
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
        const div = document.createElement('div')
        div.innerHTML += '<div class="acordeon_opcion">'+
                                        '<div class="titulo_acordeon">'+
                                            '<h3 data-acordeon="semana_'+i+'">Semana '+(i+1)+'</h3>'+
                                        '</div>'+
                                        '<div id="semana_'+i+'" class="contenido_acordeon mostrar_contenido">'+
                                            '<table id="tabla_'+(i+1)+'">'+
                                                '<thead>'+
                                                    '<tr>'+
                                                        '<th rowspan="2">Día</th>'+
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

        obtener_dias(estado.value, select.value,anio+'-'+mes+'-'+inicio,anio+'-'+mes+'-'+fin, (i+1))
    }
}

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
        const div = document.createElement('div')
        div.innerHTML += '<div class="acordeon_opcion">'+
                                        '<div class="titulo_acordeon">'+
                                            '<h3 data-acordeon="semana_'+i+'">Semana '+(i+1)+'</h3>'+
                                        '</div>'+
                                        '<div id="semana_'+i+'" class="contenido_acordeon mostrar_contenido">'+
                                            '<table id="tabla_'+(i+1)+'">'+
                                                '<thead>'+
                                                    '<tr>'+
                                                        '<th rowspan="2">Día</th>'+
                                                        '<th colspan="3">REPORTE DIARIO POR MAQUINA</th>'+
                                                        '<th></th>'+
                                                        '<th colspan="2">REGISTRO DIARIO DE PRODUCCIÓN</th>'+
                                                    '</tr>'+
                                                    '<tr>'+
                                                        '<th>1</th>'+
                                                        '<th>2</th>'+
                                                        '<th>3</th>'+
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
        obtener_dias(estado.value, select.value,anio+'-'+mes+'-'+inicio,anio+'-'+mes+'-'+fin, (i+1))
    }
}

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
        const div = document.createElement('div')
        div.innerHTML += '<div class="acordeon_opcion">'+
                                        '<div class="titulo_acordeon">'+
                                            '<h3 data-acordeon="semana_'+i+'">Semana '+(i+1)+'</h3>'+
                                        '</div>'+
                                        '<div id="semana_'+i+'" class="contenido_acordeon mostrar_contenido">'+
                                            '<table id="tabla_'+(i+1)+'">'+
                                                '<thead>'+
                                                    '<tr>'+
                                                        '<th rowspan="2">Día</th>'+
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
        obtener_dias(estado.value, select.value,anio+'-'+mes+'-'+inicio,anio+'-'+mes+'-'+fin, (i+1))
    }
}

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
        const div = document.createElement('div')
        div.innerHTML += '<div class="acordeon_opcion">'+
                                        '<div class="titulo_acordeon">'+
                                            '<h3 data-acordeon="semana_'+i+'">Semana '+(i+1)+'</h3>'+
                                        '</div>'+
                                        '<div id="semana_'+i+'" class="contenido_acordeon mostrar_contenido">'+
                                            '<table id="tabla_'+(i+1)+'">'+
                                                '<thead>'+
                                                    '<tr>'+
                                                        '<th rowspan="2">Día</th>'+
                                                        '<th colspan="6">REPORTE DIARIO POR MAQUINA</th>'+
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

        obtener_dias(estado.value, select.value,anio+'-'+mes+'-'+inicio,anio+'-'+mes+'-'+fin, (i+1))
    }
}

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
        const div = document.createElement('div')
        div.innerHTML += '<div class="acordeon_opcion">'+
                                        '<div class="titulo_acordeon">'+
                                            '<h3 data-acordeon="semana_'+i+'">Semana '+(i+1)+'</h3>'+
                                        '</div>'+
                                        '<div id="semana_'+i+'" class="contenido_acordeon mostrar_contenido">'+
                                            '<table id="tabla_'+(i+1)+'">'+
                                                '<thead>'+
                                                    '<tr>'+
                                                        '<th rowspan="2">Día</th>'+
                                                        '<th colspan="3">REPORTE DIARIO POR TINA</th>'+
                                                        '<th></th>'+
                                                        '<th colspan="2">REGISTRO DIARIO DE PRODUCCIÓN</th>'+
                                                    '</tr>'+
                                                    '<tr>'+
                                                        '<th>1</th>'+
                                                        '<th>2</th>'+
                                                        '<th>3</th>'+
                                                        '<th></th>'+
                                                        '<th colspan="2">ACABADO</th>'+
                                                    '</tr>'+
                                                '</thead>'+
                                                '<tbody id="body_'+(i+1)+'">'+
                                                '</tbody>'+
                                            '</table>'+
                                        '</div>'+
                                    '</div>'
        acordeon[0].appendChild(div)
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

        obtener_dias(estado.value, select.value,anio+'-'+mes+'-'+inicio,anio+'-'+mes+'-'+fin, (i+1))
    }
}

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

const obtener_dias = (vista, concepto, inicio, fin, semana) => {
    const respuesta = fetchAPI('',url+'/produccion/maquinas/obtener_reporte?vista='+vista+'&concepto='+concepto+'&inicio='+inicio+'&fin='+fin,'')
    respuesta.then(json => {
        if (vista == 1) {
            render_semana(json,semana)
        } else if (vista == 2) {
            render_semana_ranurado_shank(json,semana)
        } else if (vista == 3) {
            render_semana_rolado(json,semana)
        } else if (vista == 4) {
            render_semana_ranurado_shank(json,semana)
        } else if (vista == 6) {
            render_semana_acabo(json,semana)
        }
    })
}

const generar_reporte = (input,select,estado) => {
    if (input != '' && select != '' && estado != '') {
        const fecha = input.split('-')
        quitar_semanas()
        obtener_semanas(fecha[0],fecha[1],estado)
    }
}

const generar_PDF = (fecha,kilos_pzas,estado) => {
    printPage(url+'/produccion/maquinas/pdf_maquinas?fecha_reporte='+fecha.value+'&kilos_pzas='+kilos_pzas.value+'&estado='+estado.value);
}

input.addEventListener('change', () => {
    generar_reporte(input.value,select.value,estado.value)
}) 

select.addEventListener('change', () => {
    generar_reporte(input.value,select.value,estado.value)
})

estado.addEventListener('change', () => {
    generar_reporte(input.value,select.value,estado.value)
})

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

(() => {
    auto()
})()