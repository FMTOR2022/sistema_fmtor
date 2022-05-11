const checkbox= ['check_incidenciasMostrar','check_incidenciasEdit'];
let cabeceras = [['Id_incidencia','Tipo Incidencia','Inicio Incidencia','Fin Incidencia','Editar','Eliminar'],['Nombre','Apellido Paterno','Apellido Materno','Tipo Incidencia','Inicio Incidencia','Fin Incidencia']];

const limpiar_cabecera = () => {
    const thead = document.getElementsByClassName('cabecera');
    while(thead[0].firstChild){
        thead[0].removeChild(thead[0].firstChild);
    }
}
const limpiar_tabla = () => {
    const tbody = document.getElementsByClassName('body');
    while (tbody[0].firstChild) {
        tbody[0].removeChild(tbody[0].firstChild);
    }
}

const cabecera_lis = (titulos) =>{
    limpiar_cabecera();
    const fragmento = document.createDocumentFragment();
    const thead = document.getElementsByClassName('cabecera');
    const tr = document.createElement('tr');
    
    for (let i = 0; i < titulos.length; i++) {
        const th = document.createElement('th');
        th.innerHTML = titulos[i];
        tr.appendChild(th);
    }
    fragmento.appendChild(tr);
    thead[0].appendChild(fragmento);
}


//

const render_incidencias = (json) => {
    const t_body= document.getElementsByClassName('body_incidencia')
    json.forEach(element => {
        const tr = document.createElement('tr')
        tr.classList.add('tr')

        tr.innerHTML += '<td>'+element.nombre+'</td>'+
                        '<td>'+element.apellidoP+'</td>'+
                        '<td>'+element.apellidoM+'</td>'+
                        '<td>'+element.tipo_incidencia+'</td>'+
                        '<td>'+element.inicio_in+'</td>'+
                        '<td>'+element.fin_in+'</td>';
            t_body[0].appendChild(tr)
        });
      }
    
//
const obtener = () =>{
    const respuesta = fetchAPI('',url+'/checador/incidenciasController/obtener','')
    respuesta.then(json =>{
        render_incidencias(json);
    })
};

// const form_filtros = document.getElementById('form-filtros');
// form_filtros.addEventListener('submit', (evt) => {
//     evt.preventDefault();
//     envia_datos();
// });

const envia_datos = () =>{
    const incidencia_mostrar = document.getElementsByClassName('check_incidenciasEdit')
    const incidencias_edit = document.getElementsByClassName('check_incidenciasMostrar')

    if(incidencias_edit.checked){
        buscar_dato('buscar_incidencias_edit')
    }else if(incidencia_mostrar.checked){
        buscar_dato('buscar_incidencia_mostrar')
    }
}

const buscar_dato = (metodo) => {
    const respuesta = fetchAPI(form_filtros, url+'/checador/incidenciasController/'+metodo, 'POST');
    respuesta.then(json => {
        console.log(json);
        limpiar_tabla()
        const input_tabla = document.getElementsByName('tabla')
        if(input_tabla.value == 't_incidencias'){
            render_incidenciasEdit(json)
        }else if(input_tabla.value == 'v_incidencias'){
            render_incidencias(json)
        }
    })
}

//cambia el formato de la lista
const form_formatos = document.getElementById('form-formatos');
form_formatos.addEventListener('submit', (evt) => {
    evt.preventDefault();
    const select = document.getElementById('seleccion_formato')
    const input_tabla = document.getElementById('tabla')
    cabecera_lis(cabeceras[select.value]);
    limpiar_tabla();
    if(select.value == 0) {
        input_tabla.value = 'incidencias_edit'
        obtenerIn()
    }else if (select.value == 1) {
        input_tabla.value = 'incidencia_mostrar'
        obtener()
    }
});

const select_formatos = document.getElementById('seleccion_formato')
select_formatos.addEventListener('change', () => {
    cabecera_lis(cabeceras[select_formatos.value]);
    const input_tabla = document.getElementById('tabla')
    input_tabla.removeAttribute('value')
    limpiar_tabla();
    if (select_formatos.value == 0) {
        input_tabla.value = ('value','t_incidencias')
        obtenerIn()
    }else if (select_formatos.value == 1) {
        input_tabla.value = ('value','v_incidencias')
        obtener()
    } 
})

