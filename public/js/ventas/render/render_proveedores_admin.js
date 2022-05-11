/* This is a variable declaration. */
const form_proveedor_ingresar = document.getElementById("form_reg_proveedor");
const form_proveedor_actualizar = document.getElementById("form_act_proveedor");
const auxiliar = {dato: 0}

/* A function that is called when the form is submitted. */
form_proveedor_ingresar.addEventListener('submit', (evt) => {
    evt.preventDefault()
    const data = Object.fromEntries(
        new FormData(evt.target)
    )

    const validacion = validar(data)

    if (validacion) {
        open_confirm('¿Desea registrar a este proveedor?',insertar)
    }
})

/* A function that is called when the form is submitted. */
form_proveedor_actualizar.addEventListener('submit', (evt) => {
    evt.preventDefault()
    const data = Object.fromEntries(
        new FormData(evt.target)
    )

    const validacion = validar(data)

    if (validacion) {
        open_confirm('¿Desea modificar a este proveedor?',actualizar)
    }
})

/**
 * It sends a POST request to the server, and if the server responds with a 1, it calls the function
 * obtener_proveedores() and then calls the function open_alert() with the arguments 'El registro fue
 * realizado con exito' and 'verde'.
 */
const insertar = () => {
    const respuesta = fetchAPI(form_proveedor_ingresar,url+'/ventas/proveedores/insertar','POST')
    respuesta.then(json => {
        if (json == 1) {
            obtener_proveedores()
            limpiar_form(form_proveedor_ingresar);
            open_alert('El registro fue realizado con exito','verde')
        } else {
            open_alert('El registro no pudo ser realizado', 'rojo')
        }
    })
}

/**
 * It takes the data from a form, sends it to a PHP file, and then displays a message based on the
 * response from the PHP file.
 */
const actualizar = () => {
    const respuesta = fetchAPI(form_proveedor_actualizar,url+'/ventas/proveedores/actualizar','POST')
    respuesta.then(json => {
        if (json == 1) {
            obtener_proveedores();
            open_alert('Registro modificado correctamente','verde')
        } else {
            open_alert('El registro no pudo ser modificado','rojo')
        }
    })
}

/**
 * It takes a string, a url, and another string, and returns a promise that resolves to a json object.
 */
const eliminar_proveedor = () => {
    const respuesta = fetchAPI('',url+'/ventas/proveedores/eliminar?id='+auxiliar.dato,'')
    respuesta.then(json => {
        if (json == 1) {
            obtener_proveedores();
            open_alert('Registro eliminado correctamente','verde')
        } else {
            open_alert('El registro no pudo ser eliminado','naranja')
        }
    })
}

/**
 * It takes a JSON object, and renders it to the DOM.
 * @param json - the data you want to render
 */
const render_proveedores = (json) => {
    const body = document.getElementById('body_proveedores')
    body.innerHTML = ''
    json.forEach(el => {
        body.innerHTML += '<tr>'+
                            '<td style="padding: 5px;">'+
                                '<div id="'+el.Proveedor+'" class="mas_opciones_tablas">'+
                                    '<div class="opcion">'+
                                        '<button data-opciones="'+el.Proveedor+'"  class="mas btn btn-icon-self material-icons">more_vert</button>'+
                                    '</div>'+
                                    '<div class="opciones" id="opciones-'+el.Proveedor+'">'+
                                        '<button style="margin: 0px 5px 0px 0px;" data-modal="modal-actualizar" data-editar="'+el.Id_Proveedor+'" class="btn btn-icon-self btn-amarillo material-icons-outlined">edit</button>'+    
                                        '<button style="margin: 0px 0px 0px 5px;" data-eliminar="'+el.Id_Proveedor+'" class="btn btn-icon-self btn-rojo material-icons-outlined">delete</button>'+    
                                    '</div>'+
                                '</div>'+
                            '</td>'+
                            // '<td>'+el.Id_Proveedor +'</td>'+    
                            '<td>'+el.Proveedor +'</td>'+    
                            '<td>'+el.Direccion +'</td>'+    
                            '<td>'+el.Ciudad +'</td>'+    
                            '<td>'+el.Telefono +'</td>'+    
                            '<td>'+el.Correo +'</td>'+    
                        '</tr>';
    });
}

/**
 * It takes a JSON object and populates the form with the values from the JSON object.
 * @param json - [{Id_Proveedor: "1", Proveedor: "Proveedor 1", Direccion: "Direccion 1", Ciudad:
 * "Ciudad 1", Telefono: "Telefono 1", Correo:
 */
const colocar_proveedor = (json) => {
    json.forEach(el => {
        document.getElementById('Id_Proveedor').value = el.Id_Proveedor
        document.getElementById('Proveedor_m').value = el.Proveedor
        document.getElementById('Direccion_m').value = el.Direccion
        document.getElementById('Ciudad_m').value = el.Ciudad
        document.getElementById('Telefono_m').value = el.Telefono
        document.getElementById("Correo_m").value = el.Correo;
    })
}

/**
 * It takes an id, makes a fetch request to a url, and then calls another function with the response.
 * @param id - the id of the supplier
 */
const buscar_proveedor = (id) => {
    const respuesta = fetchAPI('',url+'/ventas/proveedores/obtener_proveedor?id='+id,'')
    respuesta.then(json => {
        colocar_proveedor(json)
    })
}

/* Listening for a click event, and if the event target has a data-eliminar attribute, it sets the
value of the auxiliar.dato property to the value of the data-eliminar attribute, and then calls the
open_confirm() function with the arguments '¿Desea eliminar este registro?' and eliminar_proveedor.
If the event target has a data-editar attribute, it calls the buscar_proveedor() function with the
value of the data-editar attribute as the argument. */
document.addEventListener('click', (evt) => {
    if (evt.target.dataset.eliminar) {
        auxiliar.dato = evt.target.dataset.eliminar
        open_confirm('¿Desea eliminar este registro?', eliminar_proveedor)
    } else if (evt.target.dataset.editar) {
        buscar_proveedor(evt.target.dataset.editar);
    }
})