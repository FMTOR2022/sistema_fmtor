const form = document.getElementById('form_reg_horario');
const form_actualizar = document.getElementById('form_actualizar');
const data_aux = {
  dato: ""
}

const quitar_clase = (form) => {
    const inputs = form.getElementsByClassName('input-error');
    for (let i = 0; i < inputs.length; i++) {
        inputs[i].classList.remove('input-error');
    }
}

const render_horario = (json) => {
    const body = document.getElementsByClassName('body');
    body[0].innerHTML = '';  
    json.forEach(element => {
        body[0].innerHTML += '<tr>'+
                               '<td>'+element.usuario+'</td>'+
                                '<td>'+element.entrada+'</td>'+
                                '<td>'+element.almuerzoS+'</td>'+
                                '<td>'+element.almuerzoR+'</td>'+
                                '<td>'+element.salida+'</td>'+
                                '<td><button class= "material-icons btn btn-icon-self"  data-modal="modal-actualizar" data-edit="'+element.id_horario+'"> mode_edit</button></td>'+
                                '<td><button class= "material-icons btn btn-icon-self" onclick="eliminarRegistro('+element.id_horario+')">delete</button></td>'
                              +'</tr>';
      });
  }

  const obtener = ( ) =>{
    const respuesta = fetchAPI('',url+'/checador/horarioController/obtener','')
    respuesta.then(json => {
        render_horario(json);
        })
    };

  const obtenerHorario = ( ) =>{
    const respuesta = fetchAPI('',url+'/checador/horarioController/obtenerhorario','')
    respuesta.then(json => {
        render_horario(json);
        })
    };

const render_usuario = (json) => {
  const select = document.getElementById('usuario');
  select.innerHTML = '';
  json.forEach(element => {
    select.innerHTML += '<option value="' +element.usuario+'">'+element.usuario+ '</option>'
  })
};
 
const  buscarUsuario = () => {
  const respuesta = fetchAPI('',url+'/checador/horarioController/buscarUsuario','')
  respuesta.then(json => {
    render_usuario(json)
  })
};

  form.addEventListener('submit', (evt) => {
      evt.preventDefault();
      insertarHorario();
  })
  
  const insertarHorario = () => {
    const respuesta = fetchAPI(form,url+'/checador/horarioController/NuevoHorario','POST')
    respuesta.then(json => {
        obtenerHorario();
        console.log(json);
    })
  } ;

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
            actualizar();
        } else {
            open_alert('Debes llenar los campos correctamente','rojo')
        }
    } catch (error) {
        console.log(error);
        open_alert('Debes seleccionar alguna etapa antes de enviar el formulario','rojo')
    }
})

/*const actualizar = () => {
    const respuesta = fetchAPI(form_actualizar, url+'/checador/horarioController/actualizar','POST')
    respuesta.then(json => {
        console.log(json);
        if (json == 1) {
            open_alert('El registro ha sido actualizado correctamente', 'verde')
            obtenerHorario();
        } else {
            open_alert('Error al actualizar el registro','rojo')
        }
    })
} */

const eliminarRegistro = (id) => {
  const respuesta = fetchAPI(form,url+'/checador/horarioController/eliminar?id='+id,'POST')
  respuesta.then(json => {
    //  obtenerHorario();
      //console.log(json);
      if (json == 1) {
        const estado = document.getElementsByClassName('active')
        obtenerHorario();
        open_alert('Registro eliminado correctamente','verde')
    } else {
        open_alert('Ocurrio un error al intentar realizar la consulta','rojo')
    }
  })
} ;

const cargar_registro = (json) => {
  const usuario = document.getElementById('usuario')
  const entrada = document.getElementById('entrada')
  const almuerzoS = document.getElementById('almuerzoS')
  const almuerzoR = document.getElementById('almuerzoR')
  
  json.forEach(el => {
      usuario.value = el.usuario
      entrada.value = el.entrada
      almuerzoS.value = el.almuerzoS
      almuerzoR.value = el.almuersoR

      const obs = document.getElementById('incapacidad')
      for (let i = 0; i < obs.length; i++) {
          if (obs[i].value == el.document) {
              obs[i].setAttribute('selected','')
          }
      }
  })
}

const obtener_registro = (id) => {
  const respuesta = fetchAPI('',url+'/checador/horarioController/buscar_h?horario='+id, '')
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
          obtenerHorario();
      } else {
          open_alert('Error al actualizar el registro','rojo')
      }
  })
  
}

const generar_PDF = (valor) => {
  if (valor != '') {
      printPage(url+'/checador/horarioController/pdf_listas?vista='+valor);
  } else {
      open_alert('No ha introducido la orden de producción','naranja')
  }
}


document.addEventListener('DOMContentLoaded', () => {
    obtener();
    obtenerHorario();
    buscarUsuario();
}); 

document.addEventListener('click', (evt) => {
    if (evt.target.dataset.opcion) {
        if (evt.target.dataset.eliminar) {
            data_aux.dato = evt.target.dataset.eliminar
            eliminar_registro()
        } else if (evt.target.dataset.edit) {
            obtener_registro(evt.target.dataset.edit)
        }
    } else if (evt.target.dataset.impresion) {
        generar_PDF(document.getElementById('op_control').value)
    }
}) 