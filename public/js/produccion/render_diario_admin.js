/* Getting the form elements from the HTML. */
const form_control = document.getElementById('form-control-diario');
const form_actualizar = document.getElementById("form-control-diario-editar");

/**
 * It takes the form data, sends it to the server, and then if the server returns a 1, it calls a
 * function to get the data from the server and display it.
 */
const registrar_sin_op = () => {
    const respuesta = fetchAPI(form_control,url+'/produccion/control/insertar_sin_op', 'POST')
    respuesta.then(json => {
        if (json == 1) {
            open_alert('Registro añadido correctamente','verde')
            obtener_registros_diarios();
        } else {
            open_alert('El registro no pudo ser realizado','rojo')
        }
    })
}

/* A function that is called when the form is submitted. It prevents the default action of the form,
which is to reload the page. Then it checks if all the inputs are filled, if they are, it calls the
function to register the data. If not, it shows an alert. */
form_control.addEventListener('submit', (evt)=> {
    evt.preventDefault();
    let aux = true;
    const inputs = form_control.getElementsByClassName('input')
    for (let i = 0; i < inputs.length; i++) {
        if (inputs[i].value == '' && i != 4) {
            inputs[i].classList.add('input-error');
            aux = false;
        } 
    }
    if (aux) {
        if (inputs[4].value == '') {
            open_confirm('¿Desea registrar esta información sin una O.P.?',registrar_sin_op)
        } else {
            registrar_control()
        }
        for (let i = 0; i < inputs.length; i++) {
            inputs[i].classList.remove('input-error');
        }
    } else {
        open_alert('Debes llenar los campos correctamente','rojo')
    }
});

/* A function that is called when the form is submitted. It prevents the default action of the form,
which is to reload the page. Then it checks if all the inputs are filled, if they are, it calls the
function to register the data. If not, it shows an alert. */
form_actualizar.addEventListener('submit', (evt) => {
    evt.preventDefault()
    let aux = true;
    const inputs = form_actualizar.getElementsByClassName('input')
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
})

/* Getting the element with the class `select-estado` and storing it in the variable `select_estado`. */
const select_estado = document.getElementsByClassName('select-estado')
/* Adding an event listener to the select element with the class `select-estado`. When the value of the
select element changes, it gets the element with the class `no_maquina_sp` and if the value of the
select element is 6, it disables the element and sets its value to 0. If the value of the select
element is not 6, it removes the disabled attribute from the element. */
select_estado[0].addEventListener('change', () => {
    const maquina = document.getElementsByClassName('no_maquina_sp')
    if (select_estado[0].value == 6) {
        maquina[0].setAttribute('disabled','')
        maquina[0].value = 0
    } else {
        maquina[0].removeAttribute('disabled','')
    }
})

/**
 * It takes the form data from the form_actualizar form and sends it to the server via a POST request. 
 * 
 * If the server returns a 1, it calls the obtener_registros_diarios() function and displays a success
 * message. 
 * If the server returns anything else, it displays an error message.
 */
const actualizar_registro = () => {
    const respuesta = fetchAPI(form_actualizar, url+'/produccion/control/actualizar_e','POST')
    respuesta.then(json => {
        if (json == 1) {
            obtener_registros_diarios()
            open_alert('El registro ha sido actualizado correctamente', 'verde')
        } else {
            open_alert('Error al actualizar el registro','rojo')
        }
    })
}

/**
 * It takes the form data, sends it to the server, and then if the server returns a 1, it calls another
 * function to update the page.
 */
const registrar_control = () => {
    const respuesta = fetchAPI(form_control,url+'/produccion/control/insertar','POST')
    respuesta.then(json => {
        if (json == 1) {
            obtener_registros_diarios()
            open_alert('Registro añadido correctamente', 'verde')
        } else {
            open_alert('El registro no pudo ser realizado','rojo')
        }
    })
}

/**
 * It creates a table row for each element in the json array, and if the element has an Id_Folio
 * property that is not equal to 1, it creates a table row with 10 columns, otherwise it creates a
 * table row with 9 columns.
 * @param json - the data you want to render
 */
const render_registros_diarios = (json) => {
    const body = document.getElementById('body')
    if (json.length == 0) {
        const tr = document.createElement("tr");
        tr.innerHTML =
              "<td colspan='10' class='txt-center'>No hay ningún registro</td>";
            body.appendChild(tr);
    } else {
        json.forEach(el => {
            const tr = document.createElement('tr')
            if (el.Id_Folio != 1) {
                tr.innerHTML =
                    '<td>'+
                        '<div id="'+el.id_registro_diario+'" class="mas_opciones_tablas">'+
                            '<div class="opcion">'+
                                '<button data-opciones="'+el.id_registro_diario+'"  class="mas btn btn-icon-self material-icons">more_vert</button>'+
                            '</div>'+
                            '<div class="opciones" id="opciones-'+el.id_registro_diario+'">'+
                                '<button style="margin: 0px 5px 0px 0px;" data-modal="modal-editar-diario" data-editar="' +el.id_registro_diario +'" class="material-icons btn btn-icon-self btn-amarillo">edit</button>' +
                                '<button style="margin: 0px 0px 0px 5px;" data-eliminar="' +el.id_registro_diario +'" class="material-icons btn btn-icon-self btn-rojo">delete</button>'+
                            '</div>'+
                        '</div>'+
                    '</td>'+
                    "<td>" +el.turno +"</td>" +
                    "<td>" +el.Id_Folio +"</td>" +
                    "<td>" +el.Clientes +"</td>" +
                    "<td>" +el.kilos +"</td>" +
                    "<td>" +el.pzas +"</td>" +
                    "<td>" +el.Maquina +"</td>" +
                    "<td>" +el.descripcion +"</td>" +
                    "<td>" +el.observaciones +"</td>";
                body.appendChild(tr);
            } else {
                tr.innerHTML = '<td>'+
                                    '<div id="'+el.id_registro_diario+'" class="mas_opciones_tablas">'+
                                        '<div class="opcion">'+
                                            '<button data-opciones="'+el.id_registro_diario+'"  class="mas btn btn-transparent btn-icon-self material-icons">more_vert</button>'+
                                        '</div>'+
                                        '<div class="opciones" id="opciones-'+el.id_registro_diario+'">'+
                                            '<button style="margin: 0px 5px 0px 0px;" data-modal="modal-editar-diario" data-editar="'+el.id_registro_diario+'" class="material-icons btn btn-icon-self btn-amarillo">edit</button>'+
                                            '<button style="margin: 0px 0px 0px 5px;" data-eliminar="'+el.id_registro_diario+'" class="material-icons btn btn-icon-self btn-rojo">delete</button>'+
                                        '</div>'+
                                    '</div>'+
                                '</td>'+
                                '<td>'+el.turno+'</td>'+
                                '<td>SIN O.P.</td>'+
                                '<td></td>'+
                                '<td>'+el.kilos+'</td>'+
                                '<td>'+el.pzas+'</td>'+
                                '<td>'+el.Maquina+'</td>'+
                                '<td></td>'+
                                '<td>'+el.observaciones+'</td>'
                body.appendChild(tr);
            }
        });
    }
}

/**
 * It takes a JSON object and populates a form with the data.
 * @param json - [{id_registro_diario: "1", Id_Produccion_FK_1: "1", no_maquina: "1", fecha:
 * "2020-01-01 00:00:00", bote: "1", pzas
 */
const cargar_registro = (json) => {
    const registro = document.getElementById('registro')
    const op = document.getElementById('op_d')
    const no_maquina = document.getElementById('no_maquina_d')
    const no_botes = document.getElementById('no_botes_d')
    const fecha = document.getElementById('fecha_d')
    const pzas = document.getElementById('pzas_d')
    const kg = document.getElementById('kg_d')
    const turno = document.getElementById('turno_d')
    const observaciones = document.getElementById('observaciones_d')

    json.forEach(el => {
        registro.value = el.id_registro_diario
        op.value = el.Id_Produccion_FK_1
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
        const estado = document
          .getElementById("estado_d")
          .getElementsByTagName("option");
        for (let i = 0; i < estado.length; i++) {
            if (estado[i].value == el.Id_estado_1) {
                estado[i].setAttribute("selected", "");
            }
        }
    })
}

/**
 * It takes an id, makes a fetch request to a url, and then calls another function with the response.
 * @param id - the id of the record to be retrieved
 */
const obtener_registro = (id) => {
    const respuesta = fetchAPI('',url+'/produccion/control/obtener_registro_diario?registro='+id, '')
    respuesta.then(json => {
        cargar_registro(json)
    })
}

/**
 * It's a function that sends a request to a server, and then, if the response is 1, it calls another
 * function, and if the response is not 1, it calls another function.
 */
function eliminar () {
    const respuesta = fetchAPI('',url+'/produccion/control/eliminar?dato='+data_aux.dato,'')
    respuesta.then(json => {
        if (json == 1) {
            obtener_registros_diarios()
            open_alert('Registro eliminado correctamente','verde')
        } else {
            open_alert('Ocurrio un error al intentar realizar la consulta','rojo')
        }
    })
}

document.addEventListener('click', (evt) => {
    if (evt.target.dataset.eliminar) {
        data_aux.dato = evt.target.dataset.eliminar
        eliminar_registro()
    } else if (evt.target.dataset.editar) {
        obtener_registro(evt.target.dataset.editar)
    }
})