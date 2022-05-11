const form = document.getElementById('form_reg_incidencias');
const form_actualizar = document.getElementById('form_actualizar');
const data_aux = {
    dato: ""
}

const quitar_filas = (t_body) => {
    while(t_body.firstChild){
        t_body.removefirstChild(t_body.firstChild)
    }
}

const quitar_clase = (form) => {
    const inputs = form.getElementsByClassName('input-error');
    for (let i = 0; i < inputs.length; i++) {
        inputs[i].classList.remove('input-error');
    }
}

const render_incidenciasEdit = (json) => {
    const t_body= document.getElementsByClassName('body_incidencia')
    json.forEach(element => {
        const tr = document.createElement('tr')
        tr.classList.add('tr')
        tr.innerHTML += '<td>'+element.id_incidencias+'</td>'+
                        '<td>'+element.tipo_incidencia+'</td>'+
                        '<td>'+element.inicio_in+'</td>'+
                        '<td>'+element.fin_in+'</td>'+
                        '<td><button class= "material-icons btn btn-icon-self" data-opcion="editar"  data-modal="modal-actualizar" data-edit="'+element.id_incidencias+'"> mode_edit</button></td>'+
                        '<td><button class= "material-icons btn btn-icon-self" data-opcion="eliminar" data-eliminar="'+element.id_incidencias+'">delete</button></td>';

        t_body[0].appendChild(tr)
    });
}


  const obtenerIn = ( ) =>{
    const respuesta = fetchAPI('',url+'/checador/incidenciasController/obtenerIn','')
    respuesta.then(json => {
        render_incidenciasEdit(json);
        })
};  

  const render_empleados = (json) => {
      const select = document.getElementById('id_empleado');
      select.innerHTML = '';
      json.forEach(element => {
          select.innerHTML += '<option value="' +element.id_empleados+'">'+ element.nombre+ ' '+element.apellidoP+ ' '+element.apellidoM +'</option>'

      })
  };

  const buscarEmpleado = () =>{
    const respuesta = fetchAPI('',url+'/checador/incidenciasController/buscarEmpleado','')
    respuesta.then(json => {
        render_empleados(json)
        })
    };


form.addEventListener('submit', (evt) => {
    evt.preventDefault();
    insertarIncidencias();
   // nuevoRegistro();
}) 

const insertarIncidencias = () => {
  const respuesta = fetchAPI(form,url+'/checador/incidenciasController/NuevaIncidencia','POST')
  respuesta.then(json => {
    limpiar_tabla()
      obtenerIn()
      console.log(json);
  })
}  

form_actualizar.addEventListener('submit', (evt) => {
    evt.preventDefault();
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
            actualizarIncidencia();
        } else {
            open_alert('Debes llenar los campos correctamente','rojo')
        }
    } catch (error) {
        console.log(error);
        open_alert('Debes seleccionar alguna etapa antes de enviar el formulario','rojo')
    }
})

const eliminar = () => {
    const respuesta = fetchAPI(form,url+'/checador/incidenciasController/eliminar?id='+data_aux.dato,'POST')
    respuesta.then(json => {
        if(json == 1){
            limpiar_tabla()
            obtenerIn();
            open_alert('Registro eliminado correctamente','verde')
            console.log(json);
        } else {
            open_alert('Ocurrio un error al intentar realizar la consulta','rojo')
        }
    })  
}

const eliminar_registro = () => {
    open_confirm('¿Estas seguro de realizar esta opción?', eliminar)
}

const cargar_registro = (json) => {
    const id_incidencias = document.getElementById('id_incidencias')
    const tipo_incidencia = document.getElementById('tipo_incidencia')
    const inicio_in = document.getElementById('inicio_in')
    const fin_in = document.getElementById('fin_in')
    
    json.forEach(el => {
        id_incidencias.value = el.id_incidencias
        tipo_incidencia.value = el.tipo_incidencia
        inicio_in.value = el.inicio_in
        fin_in.value = el.fin_in
 
        const obs = document.getElementById('incapacidad')
        for (let i = 0; i < obs.length; i++) {
            if (obs[i].value == el.document) {
                obs[i].setAttribute('selected','')
            }
        }
    })
}

const obtener_registro = (id) => {
    const respuesta = fetchAPI('',url+'/checador/incidenciasController/buscar_incidencia?registro='+id, '')
    respuesta.then(json => {
        cargar_registro(json)
    })
}

const actualizarIncidencia = () => {
    const respuesta = fetchAPI(form_actualizar, url+'/checador/incidenciasController/actualizarIncidencia','POST')
    respuesta.then(json => {
        console.log(json);
        if (json == 1) {
            open_alert('El registro ha sido actualizado correctamente', 'verde')
            limpiar_tabla()
            obtenerIn();
        } else {
            open_alert('Error al actualizar el registro','rojo')
        }
    })
    
}

const generar_PDF = (valor) => {
    if(valor != ''){
        printPage(url+'/checador/incidenciasController/pdf_listas?valor='+valor);

    }else{
        open_alert('No ha introducido la orden de producción','naranja')
    }
}


  document.addEventListener('DOMContentLoaded', () => {
    obtenerIn();
    buscarEmpleado();
})



   document.addEventListener('click', (evt) => {
        if (evt.target.dataset.opcion) {
            if (evt.target.dataset.eliminar) {
                data_aux.dato = evt.target.dataset.eliminar
                eliminar_registro()
            } else if (evt.target.dataset.edit) {
                buscarEmpleado()
                obtener_registro(evt.target.dataset.edit)
            }
        } else if (evt.target.dataset.impresion) {
            generar_PDF(document.getElementById('incidencia').value)
        }
    })