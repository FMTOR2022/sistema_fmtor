
const tablaEmpleados = () =>{
    const tabla = fetchAPI('','http://localhost/sistema_fmtor/sii/main/mostrarDatos','');
    tabla.then(json => {
     mostrarEmpleados(json);
    })
}

const buscarPuesto = () => {
    const tabla = fetchAPI('','http://localhost/sistema_fmtor/sii/main/mostrarDatos','');
    tabla.then(json => {
        puestoEncontrado(json);
    })

}

const informacionEmpleados2 = () =>{
    const tabla = fetchAPI('','http://localhost/sistema_fmtor/sii/main/mostrarDatos','');
    tabla.then(json => {
        mostrarusuario(json);
        console.log(json);
    })
}

const informacionEmpleado = (id) => {
        const tabla = fetchAPI('','http://localhost/sistema_fmtor/sii/main/informacionEmpleado?aux='+id,'');
        tabla.then(json =>{
            mostrarInformacionEmpleado(json);
    })
    
}

const nombreJ = document.getElementById('nombre');
const apellidoPJ = document.getElementById('apellidoP');
const apellidoM = document.getElementById('apellidoM');
const fechaNacimientoJ = document.getElementById('fechaNacimiento');
const telefono = document.getElementById('telefono');
const correo = document.getElementById('correo');
const CURP = document.getElementById('CURP');
const RFC = document.getElementById('RFC');
const NSS = document.getElementById('NSS');
const estado = document.getElementById('estado');
const fechaIngreso = document.getElementById('fechaIngreso');
const direccion = document.getElementById('direccion');
const nombrePuesto = document.getElementById('nombrePuesto');
const NombreDepto = document.getElementById('nombreDepto');

const mostrarInformacionEmpleado = (json) =>{

    json.forEach(element => {
        nombreJ.innerText = element.nombre
        apellidoPJ.innerHTML = element.apellidoP
        apellidoM.innerHTML = element.apellidoM
        fechaNacimientoJ.innerHTML = element.fechaNacimiento
        telefono.innerHTML = element.telefono
        correo.innerHTML = element.correo
        CURP.innerHTML = element.curp
        RFC.innerHTML = element.rfc
        NSS.innerHTML = element.nss
        estado.innerHTML = element.estado
        fechaIngreso.innerHTML = element.fechaIngreso
        direccion.innerHTML = element.direccion
        nombrePuesto.innerHTML = element.nombrePuesto
    })
    
    
}





const limpiar_tabla = () => {
    const tbody = document.getElementsByClassName('t_body');
    while (tbody[0].firstChild) {
        tbody[0].removeChild(tbody[0].firstChild);
    }
}

const Filtro1 = document.getElementsByClassName('contenido_modal');
const t_body = document.getElementsByClassName("t_body");  
const mostrarEmpleados = (json) =>{
    limpiar_tabla(); 
    json.forEach(element => {
       
        const tr = document.createElement('tr')

        tr.classList.add('tr')

        tr.innerHTML += 
        '<td><p>'+element.nombre+'</p></td>'+
        '<td><p>'+element.apellidoP+'</p></td>'+
        '<td><p>'+element.apellidoM+'</p></td>'+
        '<td><p>'+element.fechaNacimiento+'</p></td>'+
        '<td><p>'+element.telefono+'</p></td>'+
        '<td><p>'+element.correo+'</p></td>'+
        '<td><p>'+element.curp+'</p></td>'+
        '<td><p>'+element.rfc+'</p></td>'+
        '<td><p>'+element.nss+'</p></td>'+
        '<td><p>'+element.estado+'</p></td>'+
        '<td><p>'+element.fechaIngreso+'</p></td>'+
        '<td><p>'+element.nombrePuesto+'</p></td>'
        t_body[0].appendChild(tr);

    });
}

const puestoEncontrado = (json) => {
    const select = document.createElement('select');
    const p = document.createElement('h3');
    p.innerText = 'Filtro por Puesto';
    Filtro1[0].appendChild(p);
    json.forEach(element => {
        
        select.classList.add('select_puesto');
        select.innerHTML += '<option value = "'+element.nombrePuesto+'">'+element.nombrePuesto+'</option>'
        Filtro1[0].appendChild(select);
    });
}



const buscadorSII = document.getElementById('buscadorSII');

const peticion = (nombre) =>{
    const tabla = fetchAPI('','http://localhost/sistema_fmtor/sii/main/encontrarEmpleado?nombre='+nombre,'');
    tabla.then(json => {
        mostrarEmpleados(json);
    })
}

const peticion_2 = (nombrePuesto) => {
    const busqueda = fetchAPI('','http://localhost/sistema_fmtor/sii/main/encontrarEmpleado?nombrePuesto='+nombrePuesto,'');
    busqueda.then(json => {
        puestoEncontrado(json);
    })
}

// Filtro1.addEventListener('click',(evt) =>{
//     evt.preventDefault();
//     peticion_2()
// })


// buscadorSII.addEventListener('keyup',(evt) => {
//     evt.preventDefault();
//     peticion(buscadorSII.value);
// });


// selectEmpleado.addEventListener('change',(evt) => {
//     peticion(selectEmpleado.value);
// });
const usuario = document.getElementById('idUsuario');
const mostrarusuario = (json) => {
    const a2 = document.createElement('option');
    a2.innerHTML = 'selecciona';
    usuario.appendChild(a2); 
    json.forEach(element => {
        const a = document.createElement('option');
        a.setAttribute('value','http://localhost/sistema_fmtor/sii/main/datosEmpleados?aux='+element.id_empleados);
        a.innerHTML = element.nombre;
        usuario.appendChild(a);
    });
}

usuario.addEventListener('change',(evt) => {
    
        evt.preventDefault();
        console.log(usuario.value);
        $url = usuario.value;
        $newurl = $url.replace('http://localhost/sistema_fmtor/sii/main/datosEmpleados?aux=', '');
        $traer = window.location.toString();
        //console.log(window.location.toString());
        informacionEmpleado($newurl);
    });






(() =>{
    informacionEmpleados2();
    buscarPuesto();
    tablaEmpleados();
})()
