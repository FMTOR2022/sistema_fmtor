/* Creating a global variable. */
const dato = {aux: 0}
/**
 * It takes a JSON object, clears the HTML of the element with the class "body_clientes", then loops
 * through the JSON object and adds HTML to the element with the class "body_clientes".
 * @param json - is the data that I get from the server.
 */
const render_clientes = (json) => {
    const body = document.getElementsByClassName('body_clientes');
    body[0].innerHTML = '';  
    json.forEach(element => {
        if (element.Id_Clientes != 1) {
            body[0].innerHTML += '<tr>'+
                                    '<td style="padding: 5px;">'+
                                        '<div id="'+element.Id_Clientes+'" class="mas_opciones_tablas">'+
                                            '<div class="opcion">'+
                                                '<button data-opciones="'+element.Id_Clientes+'" class="mas btn btn-icon-self material-icons">more_vert</button>'+
                                            '</div>'+
                                            '<div class="opciones" id="opciones-'+element.Id_Clientes+'">'+
                                                '<button style="margin: 0px 5px 0px 0px;" class= "material-icons-outlined btn btn-icon-self btn-amarillo"  data-modal="modal-actualizar" data-edit="'+element.Id_Clientes+'"> mode_edit</button>'+
                                                '<button style="margin: 0px 5px;" class= "material-icons-outlined btn btn-icon-self btn-transparent" data-modal="modal-historial-cliente" data-historial="'+element.Id_Clientes+'">history</button>'+
                                                '<button style="margin: 0px 0px 0px 5px;" class= "material-icons-outlined btn btn-icon-self btn-rojo" data-eliminar="'+element.Id_Clientes+'">delete</button>'+
                                            '</div>'+
                                        '</div>'+
                                    '</td>'+
                                    '<td>'+element.Id_Clientes+'</td>'+
                                    '<td>'+element.Razon_social+'</td>'+
                                    '<td>'+element.Nombre+'</td>'+
                                    '<td>'+element.Telefono+'</td>'+
                                    '<td>'+element.Correo+'</td>'+
                                    '<td>'+element.Direccion+'</td>'+
                                  '</tr>';
        }
    });
}
  
/**
 * It fetches data from a server and then displays it in a modal.
 * @param id - id of the client
 */
const mostrarModal = (id) =>{
    const respues = fetchAPI('',url+'/ventas/clientes/obtener_per?aux='+id+'','');
    respues.then(json => {
        pintarModal(json);
    });
}

/* Getting the input elements from the modal and assigning them to variables. */
const Id_Clientes = document.getElementById('Id_Clientes_edit');
const Razon_social = document.getElementById('Razon_social_edit');
const Nombre = document.getElementById('Nombre_edit');
const Telefono  = document.getElementById('Telefono_edit');
const Correo  = document.getElementById('Correo_edit');
const Direccion  = document.getElementById('Direccion_edit');

/**
 * It takes a JSON object and assigns the values of the object to the values of the input fields in the
 * modal.
 * @param json - is the data that is returned from the server.
 */
const pintarModal = (json) => {
    json.forEach(element =>{
        Id_Clientes.value = element.Id_Clientes.trim();
        Razon_social.value = element.Razon_social.trim();
        Nombre.value = element.Nombre.trim();
        Telefono.value = element.Telefono.trim();
        Correo.value = element.Correo.trim();
        Direccion.value = element.Direccion.trim();
    })
}

/**
 * It takes a string, sends it to a server, and then calls another function.
 */
const eliminarRegistro =()=>{
    const respuesta = fetchAPI('',url+'/ventas/clientes/eliminarCliente?dato='+dato.aux,'')
    respuesta.then(json => {
        obtener();
    })
};
  
/* Getting the form element with the id of `form_reg_cliente` and assigning it to the `form` variable. */
const form = document.getElementById('form_reg_cliente');

/* Listening for a submit event on the form element. When the event is triggered, it
prevents the default action of the event, creates a data object from the form data, validates the
data, and if the data is valid, it calls the open_confirm function with two arguments. */
form.addEventListener('submit', (evt) => {
    evt.preventDefault();
    const data = Object.fromEntries(
        new FormData(evt.target)
    )

    const validacion = validar(data)

    if (validacion) {
        open_confirm('¿Desea registrar a este cliente?',insertarCliente);
    }
})
  
/**
 * It takes the form data, sends it to the server, and then if the server returns a 1, it clears the
 * form and displays a success message.
 */
const insertarCliente = () => {
    const respuesta = fetchAPI(form,url+'/ventas/clientes/NuevoCliente','POST')
    respuesta.then(json => {
        if (json == 1) {
            limpiar_form(form);
            open_alert('El registro ha sido actualizado correctamente', 'verde')
            obtener();
        } else {
            open_alert('Error al actualizar el registro','rojo')
        }
    })
} 
  
/* Getting the form element with the id of `form_act_cliente` and assigning it to the `formactualizar`
variable. */
const formactualizar = document.getElementById('form_act_cliente');

/* Listening for a submit event on the formactualizar form. When the event is triggered, it
prevents the default action of the event, creates a data object from the form data, validates the
data,
and if the data is valid, it calls the open_confirm function with two arguments. */
formactualizar.addEventListener('submit', (evt) => {
    evt.preventDefault();
    const data = Object.fromEntries(
        new FormData(evt.target)
    )

    const validacion = validar(data)

    if (validacion) {
        open_confirm("¿Desea modificar a este cliente?", actualizar_Cliente);
    }
})

/**
 * It takes the form data from the formactualizar form, sends it to the server, and then if the server
 * returns a 1, it displays a green alert, and if the server returns anything else, it displays a red
 * alert.
 */
const actualizar_Cliente = () => {
    const respuesta = fetchAPI(formactualizar, url+'/ventas/clientes/actualizarCliente','POST')
    respuesta.then(json => {
        if (json == 1) {
            open_alert('El registro ha sido actualizado correctamente', 'verde')
            obtener();
        } else {
            open_alert('Error al actualizar el registro','rojo')
        }
    })
}

/**
 * It takes an array of objects, and for each object in the array, it replaces the innerHTML of the
 * body element with a string that contains a table row.
 * @param json - [{fecha: "2019-01-01", descripcion: "descripcion", medida: "medida", acabados:
 * "acabados", cantidad: "cantidad", costo: "costo"}]
 */
const render_historial_cliente = (json) => {
    const body = document.getElementById('body-historial')

    if (json.length == 0) {
        body.innerHTML = '<tr><td colspan="6">No existe ningún registro.</td></tr>'
    } else {
        json.forEach(el => {
            body.innerHTML = '<tr>'+
                                '<td>'+el.fecha+'</td>'+
                                '<td>'+el.descripcion+'</td>'+
                                '<td>'+el.medida+'</td>'+
                                '<td>'+el.acabados+'</td>'+
                                '<td>'+el.cantidad+'</td>'+
                                '<td>'+el.costo+'</td>'+
                            '</tr>'
        })
    }
}

/**
 * It fetches data from an API and then renders it to the page.
 * @param id - the id of the client
 */
const consultar_historial = (id) => {
    const respuesta = fetchAPI('', url+'/ventas/clientes/historial_cliente?id='+id,'')
    respuesta.then(json => {
        render_historial_cliente(json)
    })
}

/* An event listener that listens for a click event. When the event is triggered, it checks the
`dataset` property of the event target. If the `dataset` property has a `edit` property, it calls
the `mostrarModal` function with the value of the `edit` property as the argument. If the `dataset`
property has an `eliminar` property, it sets the `aux` property of the `dato` object to the value of
the `eliminar` property and calls the `open_confirm` function with two arguments. If the `dataset`
property has a `historial` property, it calls the `consultar_historial` function with the value of
the `historial` property as the argument. */
document.addEventListener('click',evt =>{
    if (evt.target.dataset.edit){
        mostrarModal(evt.target.dataset.edit);
    } else if (evt.target.dataset.eliminar) {
        dato.aux = evt.target.dataset.eliminar;
        open_confirm('¿Estas seguro de eliminar este registro?',eliminarRegistro)
    } else if (evt.target.dataset.historial) {
        consultar_historial(evt.target.dataset.historial);
    }
})