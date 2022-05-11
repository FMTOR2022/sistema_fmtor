/* Getting the form elements from the HTML. */
const form_control = document.getElementById('form-control');
const form_actualizar = document.getElementById('form-control-actualizar');

form_control.addEventListener('submit', (evt)=> {
    evt.preventDefault();
    let aux = true;
    quitar_clase(form_control);
    const inputs = form_control.getElementsByClassName('input')
    try {
        for (let i = 0; i < inputs.length; i++) {
            if (inputs[i].value == '') {
                inputs[i].classList.add('input-error');
                aux = false;
            } 
        }
        if (aux) {
            registrar_control()
            for (let i = 0; i < inputs.length; i++) {
                inputs[i].classList.remove('input-error');
            }
        } else {
            open_alert('Debes llenar los campos correctamente','rojo')
        }
    } catch (error) {
        open_alert('Debes seleccionar alguna etapa antes de enviar el formulario','rojo')
    }
});

form_actualizar.addEventListener('submit', (evt) => {
    evt.preventDefault()
    let aux = true;
    quitar_clase(form_actualizar);
    const inputs = form_actualizar.getElementsByClassName('input')
    try {
        for (let i = 0; i < inputs.length; i++) {
            if (inputs[i].value == '') {
                inputs[i].classList.add('input-error');
                aux = false;
            } 
        }
        if (aux) {
            actualizar_registro()
            for (let i = 0; i < inputs.length; i++) {
                inputs[i].classList.remove('input-error');
            }
        } else {
            open_alert('Debes llenar los campos correctamente','rojo')
        }
    } catch (error) {
        open_alert('Debes seleccionar alguna etapa antes de enviar el formulario','rojo')
    }
})

/**
 * The function obtener_registro takes an id as an argument, and then calls the function fetchAPI with
 * the arguments '', url+'/produccion/control/obtener_registro?registro='+id, '' and then calls the
 * function cargar_registro with the argument json.
 * @param id - the id of the record to be retrieved
 */
const obtener_registro = (id) => {
    const respuesta = fetchAPI('',url+'/produccion/control/obtener_registro?registro='+id, '')
    respuesta.then(json => {
        cargar_registro(json)
    })
}

/**
 * It takes the data from a form, sends it to a PHP file, and then returns a response.
 */
const actualizar_registro = () => {
    const respuesta = fetchAPI(form_actualizar, url+'/produccion/control/actualizar','POST')
    respuesta.then(json => {
        if (json == 1) {
            const estado = document.getElementsByClassName('active_estado')
            open_alert('El registro ha sido actualizado correctamente', 'verde')
            obtener_control(estado[0].dataset.estado)
        } else {
            open_alert('Error al actualizar el registro','rojo')
        }
    })
}

/**
 * It makes a fetch request to a url, and if the response is true, it opens an alert with the text
 * "Orden de Producción terminada" and the color green, otherwise it opens an alert with the text "No
 * se pudo terminar la Orden de Producción" and the color orange.
 */
const terminar_orden = () => {
    const respuesta = fetchAPI('',url+'/produccion/op/terminar?orden='+data_aux.dato,'')
    respuesta.then(json => {
        if (json) {
            open_alert('Orden de Producción terminada','verde');
        } else {
            open_alert('No se pudo terminar la Orden de Producción', 'naranja')
        }
    })
}


/**
 * It sends a POST request to the server, and if the server returns 1, it displays a success message,
 * otherwise it displays an error message.
 */
const registrar_control = () => {
    const respuesta = fetchAPI(form_control,url+'/produccion/control/insertar','POST')
    respuesta.then(json => {
        if (json == 1) {
            open_alert('Registro añadido correctamente', 'verde')
            const estado = document.getElementsByClassName('active_estado')
            if (estado.length > 0) {
                obtener_control(estado[0].dataset.estado)
            }
        } else {
            open_alert('El registro no pudo ser realizado','rojo')
        }
    })
}

/**
 * It takes the form data, sends it to the server, and then displays a message based on the response.
 */
const registrar_sin_op = () => {
    const respuesta = fetchAPI(form_control,url+'/produccion/control/insertar_sin_op', 'POST')
    respuesta.then(json => {
        if (json == 1) {
            open_alert('Registro añadido correctamente','verde')
        } else {
            open_alert('El registro no pudo ser realizado','rojo')
        }
    })
}

/**
 * It's a function that sends a request to a server, and then, if the response is 1, it sends another
 * request to the server.
 */
function eliminar () {
    const respuesta = fetchAPI('',url+'/produccion/control/eliminar?dato='+data_aux.dato,'')
    respuesta.then(json => {
        if (json == 1) {
            const estado = document.getElementsByClassName('active_estado')
            obtener_control(estado[0].dataset.estado)
            open_alert('Registro eliminado correctamente','verde')
        } else {
            open_alert('Ocurrio un error al intentar realizar la consulta','rojo')
        }
    })
}

/**
 * It opens a confirmation box and if the user clicks "OK" it calls the function "eliminar"
 */
const eliminar_registro = () => {
    open_confirm('¿Estas seguro de eliminar este registro?', eliminar)
}

/**
 * It takes a JSON object and populates a form with the data.
 * @param json - [{id_registro_diario: "1", no_maquina: "1", fecha: "2019-07-01 00:00:00", bote: "1",
 * pzas: "1", kilos: "1", turno:
 */
const cargar_registro = (json) => {
    const op = document.getElementById('a_op')
    const no_maquina = document.getElementById('a_no_maquina')
    const no_botes = document.getElementById('a_no_botes')
    const fecha = document.getElementById('a_fecha')
    const pzas = document.getElementById('a_pzas')
    const kg = document.getElementById('a_kg')
    const turno = document.getElementById('a_turno')
    const observaciones = document.getElementById('a_observaciones')

    json.forEach(el => {
        op.value = el.id_registro_diario
        no_maquina.value = el.no_maquina
        fecha.value = el.fecha.split(' ')[0]
        no_botes.value = el.bote
        pzas.value = el.pzas
        kg.value = el.kilos
        turno.value = el.turno

        const obs = observaciones.getElementsByTagName('option')
        for (let i = 0; i < obs.length; i++) {
            if (obs[i].value == el.observaciones) {
                obs[i].setAttribute('selected','')
            }
        }
    })
}

/**
 * It takes a json object and renders it to a table.
 * @param vista - is the table where the data is going to be displayed
 * @param json - is the data that is being passed to the function
 */
const render_control = (vista,json) => {
    totales.total_kg = 0.0;
    totales.total_pzas = 0;
    const body = document.getElementsByClassName('body')

    quitar_filas(vista)

    if (json.length == 0) {
        body[0].innerHTML += '<tr>'+
                                '<td colspan="7">No existe ningún registro</td>'+
                            '</tr>';
    } else {
        json.forEach(el => {
            body[0].innerHTML += '<tr>'+
                                    '<td>'+
                                        '<div id="'+el.id_registro_diario+'" class="mas_opciones_tablas">'+
                                            '<div class="opcion">'+
                                                '<button data-opciones="'+el.id_registro_diario+'"  class="mas btn btn-icon-self material-icons">more_vert</button>'+
                                            '</div>'+
                                            '<div class="opciones" id="opciones-'+el.id_registro_diario+'">'+
                                                '<button style="margin: 0px 5px 0px 0px;" class="btn btn-icon-self btn-rojo material-icons" data-opcion="cerrar" data-eliminar='+el.id_registro_diario+'>delete</button>'+
                                                '<button style="margin: 0px 0px 0px 5px;" class="btn btn-icon-self btn-amarillo material-icons" data-modal="modal-actualizar" data-opcion="actualizar"  data-edit="'+el.id_registro_diario+'">edit</button>'+
                                            '</div>'+
                                        '</div>'+
                                    '</td>'+
                                    '<td>'+el.bote+'</td>'+
                                    '<td>'+el.fecha+'</td>'+
                                    '<td>'+el.observaciones+'</td>'+
                                    '<td class="txt-right">'+new Intl.NumberFormat('es-MX').format(el.pzas)+'</td>'+
                                    '<td class="txt-right">'+new Intl.NumberFormat('es-MX').format(el.kilos)+'</td>'+
                                    '<td class="txt-right">'+el.no_maquina+'</td>'+
                                '</tr>';
            totales.total_kg += parseFloat(el.kilos)
            totales.total_pzas  += parseInt(el.pzas)
        });
    }


    const total_kilogramos = document.getElementsByClassName('total_kg')
    const total_acumuladas = document.getElementsByClassName('total_acumuladas')

    total_kilogramos[0].innerHTML = 'Total k.g.: <br>' + new Intl.NumberFormat('es-MX').format(totales.total_kg)
    total_acumuladas[0].innerHTML = 'Pzas. Acumuladas: <br>' + new Intl.NumberFormat('es-MX').format(totales.total_pzas)
}

/* Adding an event listener to the button with the id of btn-form-control. When the button is clicked,
it is getting the element with the class of active_estado and the element with the id of op_control.
It is then getting the elements with the id of op and estado. It is then setting the value of op to
the value of op_control and the value of estado to the value of active_estado. */
const btn_form_control = document.getElementById('btn-form-control');

btn_form_control.addEventListener('click', () => {
    const estado = document.getElementsByClassName('active_estado')
    const op_control = document.getElementById('op_control')
    
    const op = document.getElementById('op')
    const input = document.getElementById('estado')
    
    op.value = op_control.value
    input.value = estado[0].dataset.id
});
/**
 * It takes a JSON object and creates a button for each element in the object.
 * @param json - is the data that I get from the database
 */

const render_botones_estados = (json) => {
    const botones = document.getElementsByClassName("botones")
    json.forEach(el => {
        if (el.estados != 'CANCELADO' && el.estados != 'TERMINADO') {
            botones[0].innerHTML += '<button class="btn btn-transparent boton_estado" data-estado="v_'+el.estados.toLowerCase()+'" data-titulo="'+el.estados+'" data-id="'+el.id_estados+'">'+el.estados+'</button>'
        }
        
        if (el.estados == 'TERMINADO') {
            botones[0].innerHTML += '<button class="btn" data-terminar="terminar">'+el.estados+'</button>'
        }
    })
}

/* Getting the element with the id of form-reporte-diario */
const form_diario = document.getElementById('form-reporte-diario')

/* A form that is being submitted. */
form_diario.addEventListener('submit', (evt) => {
    evt.preventDefault();
    
    const fecha = document.getElementById('diario_fecha')
    const turno = document.getElementById('diario_turno')
    const estado = document.getElementById('diario_estado')
    
    fecha.classList.remove('input-error')
    turno.classList.remove('input-error')
    estado.classList.remove('input-error')
    
    if (fecha.value != '') {
        if (turno.value != '') {
            if (estado.value != '') {
                fecha.classList.remove('input-error')
                turno.classList.remove('input-error')
                estado.classList.remove('input-error')
                generar_reporte_diario(fecha.value,turno.value,estado.value)
            } else {
                estado.classList.add('input-error')
                open_alert('No ha seleccionado el estado de producción','rojo')
            }
        } else {
            turno.classList.add('input-error')
            open_alert('No ha introducido el turno de producción','rojo')
        }
    } else {
        fecha.classList.add('input-error')
        open_alert('No ha seleccionado la fecha','rojo')
    }
})