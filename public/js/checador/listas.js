//librerias

let i = 0

const quitar_filas = (t_body) => {
    while(t_body.firstChild){
        t_body.removefirstChild(t_body.firstChild)
    }
}
const render_horarioV = (json) => {
    const t_body= document.getElementsByClassName('body')
    json.forEach(lis => {
        const tr = document.createElement('tr')
        tr.classList.add('tr')

        tr.innerHTML += '<td>'+lis.nombre+'</td>'+
                        '<td>'+lis.apellidoP+'</td>'+
                        '<td>'+lis.apellidoM+'</td>'+
                        '<td>'+lis.entrada+'</td>'+
                        '<td>'+lis.almuerzoS+'</td>'+
                        '<td>'+lis.almuerzoR+'</td>'+
                        '<td>'+lis.salida+'</td>';

        t_body[0].appendChild(tr)
    });
}

const render_lista_diaria = (json) => {
    const t_body= document.getElementsByClassName('body')
    json.forEach(lis => {
        const tr = document.createElement('tr')
        tr.classList.add('tr')

        tr.innerHTML += '<td>'+lis.nombre+'</td>'+
                        '<td>'+lis.apellidoP+'</td>'+
                        '<td>'+lis.apellidoM+'</td>'+
                        '<td>'+lis.entrada+'</td>'+
                        '<td>'+lis.fecha+'</td>';

        t_body[0].appendChild(tr)
    });
}

const render_lista_almuerzo = (json) => {
    const t_body= document.getElementsByClassName('body')
    json.forEach(lis => {
        const tr = document.createElement('tr')
        tr.classList.add('tr')

        tr.innerHTML += '<td>'+lis.nombre+'</td>'+
                        '<td>'+lis.apellidoP+'</td>'+
                        '<td>'+lis.apellidoM+'</td>'+
                        '<td>'+lis.almuerzoS+'</td>'+
                        '<td>'+lis.fecha+'</td>';

        t_body[0].appendChild(tr)
    });
}

const render_lista_salida = (json) => {
    const t_body= document.getElementsByClassName('body')
    json.forEach(lis => {
        const tr = document.createElement('tr')
        tr.classList.add('tr')

        tr.innerHTML += '<td>'+lis.nombre+'</td>'+
                        '<td>'+lis.apellidoP+'</td>'+
                        '<td>'+lis.apellidoM+'</td>'+
                        '<td>'+lis.salida+'</td>'+
                        '<td>'+lis.fecha+'</td>';

        t_body[0].appendChild(tr)
    });
}

const render_lista_salidaExtra = (json) => {
    const t_body= document.getElementsByClassName('body')
    json.forEach(lis => {
        const tr = document.createElement('tr')
        tr.classList.add('tr')

        tr.innerHTML += '<td>'+lis.nombre+'</td>'+
                        '<td>'+lis.apellidoP+'</td>'+
                        '<td>'+lis.apellidoM+'</td>'+
                        '<td>'+lis.salida+'</td>'+
                        '<td>'+lis.fecha+'</td>';

        t_body[0].appendChild(tr)
    });
}

const obtener_horario = () => {
    const respuesta = fetchAPI('',url+'/checador/horarioController/obtener_horario','')
    respuesta.then(json => {
        render_horarioV(json)
    })
};
const obtener_lista_diaria = () => {
    const respuesta = fetchAPI('',url+'/checador/horarioController/obtener_lista_diaria','')
    respuesta.then(json => {
        render_lista_diaria(json)
    }) 
};
const obtener_lista_almuerzo = () => {
    const respuesta = fetchAPI('',url+'/checador/horarioController/obtener_lista_almuerzo','')
    respuesta.then(json => {
        render_lista_almuerzo(json)
    })
};
const obtener_lista_salida = () => {
    const respuesta = fetchAPI('',url+'/checador/horarioController/obtener_lista_salida','')
    respuesta.then(json => {
        render_lista_salida(json)
    })
};
const obtener_lista_salidaExtra = () => {
    const respuesta = fetchAPI('',url+'/checador/horarioController/obtener_lista_salidaExtra','')
    respuesta.then(json => {
        render_lista_salidaExtra(json)
    })
};

const rango_minimo = document.getElementById('rango_minimo')
const rango_maximo = document.getElementById('rango_maximo')

const obtener_registro = (id_empleados,empleados) => {
    for (let w = 0; w < id_empleados.length; w++) {
        const respuesta = fetchAPI('',url+'/checador/horarioController/obtener_registro?id='+id_empleados[w]+'&fecha_in='+rango_minimo.value+'&fecha_fin='+rango_maximo.value,'')
        respuesta.then(json => {
            let aux = []
            let horario = []
            let horarios = []

            if (json.length > 0) {
                aux.push(json[0].id_empleados)
                json.forEach(el => {
                    aux.push(el.fecha)
                })
            }

            console.log(aux);
            
            if ((aux.length < 7)) {
                for (let t = aux.length; t < 7; t++) {
                    aux.push('')
                }
            } else if (json.length == 0) {
                for (let r = 0; r < 7; r++) {
                    aux.push('')
                }
            }
    
            horario.push(aux)
            horarios.push(horario)
            aux = []

            render_lista_semanal(horarios,empleados)
        })
    }
    i = 0
}


const render_lista_semanal = (horario,empleados) => {
    const t_body= document.getElementsByClassName('body')
    const tr = document.createElement('tr')
    const semana = ['','','','','','']

    if (horario.length > 0) {
        for (let j = 0; j < semana.length; j++) {
            if (horario[0][0][0] == empleados[i][0]) {
                console.log(true,horario[0][0][0],empleados[i][0]);
                if (horario[0][0][j+1].split(' ').length >= 2) {
                    const fecha = horario[0][0][j+1].split(' ')[0]
                    const dia_semana = new Date(fecha.split('-')[0],parseInt(fecha.split('-')[1])-1,fecha.split('-')[2])
                    if (dia_semana.getDay() == 2) {
                        semana[0] = horario[0][0][j+1].split(' ')[1]
                    } else if (dia_semana.getDay() == 3) {
                        semana[1] = horario[0][0][j+1].split(' ')[1]
                    } else if (dia_semana.getDay() == 4) {
                        semana[2] = horario[0][0][j+1].split(' ')[1]
                    } else if (dia_semana.getDay() == 5) {
                        semana[3] = horario[0][0][j+1].split(' ')[1]
                    } else if (dia_semana.getDay() == 6) {
                        semana[4] = horario[0][0][j+1].split(' ')[1]
                    } else if (dia_semana.getDay() == 1) {
                        semana[5] = horario[0][0][j+1].split(' ')[1]
                    }
                }
            }
        }
    }

    console.log(semana);

    tr.classList.add('tr')
    tr.innerHTML += '<td>'+empleados[i][1]+'</td>'+
                    '<td>'+empleados[i][2]+'</td>'+
                    '<td>'+semana[0]+'</td>'+   //Martes
                    '<td>'+semana[1]+'</td>'+   //Miercoles
                    '<td>'+semana[2]+'</td>'+   //Jueves
                    '<td>'+semana[3]+'</td>'+   //Viernes
                    '<td>'+semana[4]+'</td>'+   //Sabado
                    '<td>'+semana[5]+'</td>'+   //Lunes
                    '<td>'+'</td>'+  //Descuento
                    '<td>'+'</td>'; //Nota
    t_body[0].appendChild(tr)
    i++;
}

const generar_lista_semanal = () => {
    const id_empleados = []
    let empleados = []
    limpiar_tabla()
    const respuesta = fetchAPI('',url+'/checador/horarioController/obtener_empleados','')
    respuesta.then(json => {
        json.forEach(el => {
            empleados.push([el.id_empleados,el.nombre+' '+el.apellidoP+' '+el.apellidoM,el.entrada])
            id_empleados.push(el.id_empleados)
        })
        obtener_registro(id_empleados,empleados)
    })
}

rango_minimo.addEventListener('change', () => {
    if (rango_minimo.value != '' && rango_maximo.value != '') {
        cabecera_lis(cabeceras[5]);
        generar_lista_semanal()
    }
})

rango_maximo.addEventListener('change', () => {
    if (rango_minimo.value != '' && rango_maximo.value != '') {
        cabecera_lis(cabeceras[5]);
        generar_lista_semanal()
    }
})