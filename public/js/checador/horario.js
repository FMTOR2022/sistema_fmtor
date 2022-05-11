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
  
  const form = document.getElementById('form_reg_horario');

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

const form_actualizar = document.getElementById('form_actualizar');

form_actualizar.addEventListener('submit', (evt) => {
    evt.preventDefault();
    actualizar();
})

const actualizar = () => {
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
} 

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
/*
document.addEventListener('click', (evt) => {
    if (evt.target.dataset.opcion) {
        if (evt.target.dataset.eliminar) {
            data_aux.dato = evt.target.dataset.eliminar
            eliminar_registro()
        } else if (evt.target.dataset.edit) {
            obtenerHorario(evt.target.dataset.edit)
        }
    } else if (evt.target.dataset.impresion) {
        generar_PDF(document.getElementById('op_control').value)
    }
}) */