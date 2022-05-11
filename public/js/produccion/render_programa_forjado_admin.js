/* A JavaScript code. */
const form_ingresar = document.getElementById('op_programa')
const form_editar = document.getElementById('op_programa_editar')
const opciones = {dato: ''}
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
 * It takes an id, makes a fetch request to a url, and then sets the value of some inputs to the
 * response.
 * @param id - id of the record to be updated
 */
const obtener_registro = (id) => {
    const respuesta = fetchAPI('',url+'/produccion/op/obtener_registro?id='+id,'')
    respuesta.then(json => {
        document.getElementById('op_a').value = json[0].Id_Produccion
        document.getElementById('fecha_entrega_a').value = json[0].Fecha_entrega
        document.getElementById('herramental_a').value = json[0].Herramental
        document.getElementById('no_maquina_a').value = json[0].no_maquina
    })
}

/**
 * It sends a POST request to a PHP script, which returns a 1 or 0.
 */
const editar_programa = () => {
    const respuesta = fetchAPI(form_editar,url+'/produccion/op/editar_programa','POST')
    respuesta.then(json => {
        if (json == 1) {
            limpiar_tablas()
            obtener_programa()
            open_alert('Actualización realizada correctamente','verde')
        } else {
            open_alert('Ocurrio un error al editar este registro','rojo')
        }
    })
}

/* A function that is executed when the form is submitted. It prevents the default action of the form,
which is to reload the page. Then it gets all the inputs of the form and checks if they are empty.
If they are, it adds a class to them, and if they are not, it calls the function
`editar_programa()`. */
form_editar.addEventListener('submit', (evt) => {
    evt.preventDefault();
    const inputs = form_editar.getElementsByClassName('input')
    let aux = true
    for (let i = 0; i < inputs.length; i++) {
        inputs[i].classList.remove('input-error');
    }
    for (let i = 0; i < inputs.length; i++) {
        if (inputs[i].value == '') {
            inputs[i].classList.add('input-error');
            aux = false;
        }
    }

    if(aux) {
        editar_programa();
    } else {
        open_alert('Debes llenar todos los campos','rojo')
    }
})

/**
 * It takes the data from a form, sends it to a PHP file, and then returns a response.
 */
const insertar_programa = () => {
    const respuesta = fetchAPI(form_ingresar,url+'/produccion/op/insertar_programa','POST')
    respuesta.then(json => {
        if (json == 1) {
            limpiar_tablas()
            obtener_programa()
            open_alert('Asignación correcta','verde')
        } else {
            open_alert('Ocurrio un error al asignar la O.P.','rojo')
        }
    })
}

/* A function that is executed when the form is submitted. It prevents the default action of the form,
which is to reload the page. Then it gets all the inputs of the form and checks if they are empty.
If they are, it adds a class to them, and if they are not, it calls the function
`insertar_programa()`. */
form_ingresar.addEventListener('submit', (evt) => {
    evt.preventDefault();
    const inputs = form_ingresar.getElementsByClassName('input')
    let aux = true
    for (let i = 0; i < inputs.length; i++) {
        inputs[i].classList.remove('input-error');
    }
    for (let i = 0; i < inputs.length; i++) {
        if (inputs[i].value == '') {
            inputs[i].classList.add('input-error');
            aux = false;
        }
    }

    if(aux) {
        insertar_programa();
    } else {
        open_alert('Debes llenar todos los campos','rojo')
    }
})

/**
 * It takes an object and a number, and appends a table row to the table body with the id of
 * "body_maquina_" + the number.
 * @param registros - is an object that contains the data to be displayed in the table.
 * @param maquina - is the machine number
 */
const render_programa = (registros,maquina) => {
    const body = document.getElementById('body_maquina_'+maquina);
    body.innerHTML += '<tr>'+
                            '<td>'+
                                '<div id="'+registros.Id_Programa_Forjado+'" class="mas_opciones_tablas">'+
                                    '<div class="opcion">'+
                                        '<button data-opciones="'+registros.Id_Programa_Forjado+'"  class="mas btn btn-icon-self material-icons">more_vert</button>'+
                                    '</div>'+
                                    '<div class="opciones" id="opciones-'+registros.Id_Programa_Forjado+'">'+
                                        '<button style="margin: 0px 5px 0px 0px;" class="btn btn-icon-self btn-amarillo material-icons" data-modal="modal-programa_editar" data-editar="'+registros.Id_Programa_Forjado+'">edit</button>'+
                                        '<button style="margin: 0px 0px 0px 5px;" class="btn btn-icon-self btn-rojo material-icons" data-eliminar="'+registros.Id_Programa_Forjado+'">delete</button>'+
                                    '</div>'+
                                '</div>'+
                            '</td>'+
                            '<td class="'+registros.producto_desc+'">'+registros.Calibre+'</td>'+
                            '<td class="txt-right '+registros.producto_desc+'">'+new Intl.NumberFormat('es-MX').format((registros.factor*registros.cantidad_elaborar))+'</td>'+
                            '<td class="txt-right '+registros.producto_desc+'">'+registros.factor+'</td>'+
                            '<td class="'+registros.producto_desc+'">'+registros.Id_Produccion+'</td>'+
                            '<td class="'+registros.producto_desc+'">'+registros.Fecha.split('-')[2] + '-' + (meses[parseInt(registros.Fecha.split('-')[1])]) +'</td>'+
                            '<td class="'+registros.producto_desc+'">'+registros.Fecha_entrega.split('-')[2] + '-' + (meses[parseInt(registros.Fecha_entrega.split('-')[1])])+'</td>'+
                            '<td class="'+registros.producto_desc+'">'+registros.Clientes+'</td>'+
                            '<td class="'+registros.producto_desc+'">'+registros.medida + ' '+ registros.descripcion+'</td>'+
                            '<td class="'+registros.producto_desc+'">'+registros.acabados+'</td>'+
                            '<td class="txt-right '+registros.producto_desc+'">'+new Intl.NumberFormat('es-MX').format(registros.cantidad_elaborar)+'</td>'+
                            '<td class="'+registros.producto_desc+'"></td>'+
                            '<td class="txt-right '+registros.producto_desc+'">$ '+new Intl.NumberFormat('es-MX').format(registros.precio_millar)+'</td>'+
                            '<td class="'+registros.producto_desc+'">'+registros.Herramental+'</td>'+
                            // '<td class="'+registros.producto_desc+'">'+registros.tratamiento+'</td>'+
                            // '<td class="txt-right '+registros.producto_desc+'">$ '+new Intl.NumberFormat('es-MX').format(registros.TOTAL)+'</td>'+
                        '</tr>'
}

/**
 * It sends a request to the server to delete a record from the database, and if the server responds
 * with a 1, it clears the table and reloads the data.
 */
function eliminar_registro () {
    const respuesta = fetchAPI('',url+'/produccion/op/eliminar_programa?id='+opciones.dato,'')
    respuesta.then(json => {
        if (json == 1) {
            limpiar_tablas()
            obtener_programa()
            open_alert('Registro eliminado correctamente','verde')
        } else {
            open_alert('El registro no pudo eliminarse','rojo')
        }
    })
}

/* An event listener that listens for a click event. If the target of the click event has a data
attribute called "editar", it gets the element with the id "registro" and sets its value to the
value of the data attribute "editar". Then it calls the function `obtener_registro()` with the value
of the data attribute "editar" as an argument. If the target of the click event has a data attribute
called "eliminar", it sets the value of the property "dato" of the object "opciones" to the value of
the data attribute "eliminar", and then calls the function `open_confirm()` with the arguments
'¿Desea eliminar este registro?', and `eliminar_registro()`. */
document.addEventListener('click', (evt) => {
    if (evt.target.dataset.editar) {
        const input = document.getElementById('registro')
        input.value = evt.target.dataset.editar
        obtener_registro(evt.target.dataset.editar)
    } else if (evt.target.dataset.eliminar) {
        opciones.dato = evt.target.dataset.eliminar
        open_confirm('¿Desea eliminar este registro?',eliminar_registro)
    }
})