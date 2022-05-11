/* A global variable that is used to store the total kg and total pieces of the table. */
const totales = {
    total_kg: 0.0,
    total_pzas: 0
}

/* Adding an event listener to the document. */
document.addEventListener('click', (evt) => {
    if (evt.target.dataset.estado) {
        if (document.getElementById('op_control').value != '') {
            quit_class()
            evt.target.classList.add('active_estado')
            const titulo_estado = document.getElementsByClassName('titulo_estado');
        
            titulo_estado[0].innerHTML = evt.target.dataset.titulo;

            if (document.getElementById('nuevo_factor')) {
                document.getElementById('nuevo_factor').dataset.est = evt.target.dataset.id
            }

            obtener_control(evt.target.dataset.estado)
            obtener_op_control(op_control.value);
            obtener_factor(evt.target.dataset.id)
            document.getElementById('op_control').classList.remove('input-error')
        } else {
            open_alert('No ha introducido la Orden de Producción', 'naranja')
            op_control.classList.add('input-error')
        }
    } 
});

/* Checking if the element with the id `nuevo_factor` exists. If it does, it is adding an event
listener to the element. */
if (document.getElementById('nuevo_factor')) {
    const btn_nuevo_factor = document.getElementById('nuevo_factor')
    btn_nuevo_factor.addEventListener('click', () => {
        /* Calling the function `actualizar_factor` and passing the value of the `data-est` attribute
        of the element with the id `nuevo_factor` as the argument. */
        actualizar_factor(btn_nuevo_factor.dataset.est);
    })
}

/**
 * It takes a parameter, then it checks if the value of two inputs are not empty, then it removes a
 * class from one of the inputs, then it makes a fetch request, then it calls another function, then it
 * removes a class from the two inputs, then it checks if the response from the fetch request is true,
 * then it calls another function.
 * @param estado - is the state of the order, it can be 'Pendiente' or 'En proceso'
 */
const actualizar_factor = (estado) => {
    const op_control = document.getElementById('op_control')
    const factor_control = document.getElementById('factor_control')
    if (factor_control.value != '') {
        if (op_control.value != '') {
            factor_control.classList.remove('input-error')
            const respuesta =fetchAPI('',url+'/produccion/control/actualizar_factor?estado='+estado+'&op='+op_control.value+'&factor='+factor_control.value,'')
            respuesta.then(json => {
                obtener_factor(estado)
                op_control.classList.remove('input-error')
                factor_control.classList.remove('input-error')
                if (json) {
                    open_alert('Factor actualizado correctamente','verde')
                }
            })
        } else {
            open_alert('No ha introducido la Orden de Producción','naranja')
            op_control.classList.add('input-error')
        }
    } else {
        open_alert('No ha introducido el factor','naranja')
        factor_control.classList.add('input-error')
    }
}

/**
 * It takes an argument, and then uses that argument to make a fetch request to a url, and then sets
 * the value of an input to the response of the fetch request.
 * 
 * I'm trying to test this function using Jest. I've tried a few different things, but I'm not sure how
 * to test this. I've tried mocking the fetch request, but I'm not sure how to do that. I've also tried
 * mocking the input, but I'm not sure how to do that either.
 * 
 * Here's what I've tried so far:
 * @param estado - is the state of the operation, it can be "Pendiente" or "Terminado"
 */
const obtener_factor = (estado) => {
    const op_control = document.getElementById('op_control')
    const factor_control = document.getElementById('factor_control')
    const respuesta = fetchAPI('',url+'/produccion/control/obtener_factor?estado='+estado+'&op='+op_control.value,'')
    respuesta.then(json => {
        factor_control.value = json.factor;
    })
}

/**
 * It removes the class 'active' from all elements with the class 'boton_estado' and removes the class
 * 'show' from all elements with the class 'table-control'.
 */
const quit_class = () => {
    const botones = document.getElementsByClassName('boton_estado');
    for (let i = 0; i < botones.length; i++) {
        botones[i].classList.remove('active')
    }
    const estado = document.getElementsByClassName('table-control');
    for (let i = 0; i < estado.length; i++) {
        estado[i].classList.remove('show')
    }
}

/**
 * It takes a string as an argument, and returns a promise that resolves to a JSON object.
 * @param vista - is the view that I'm using to render the data.
 */
const obtener_control = (vista) => {
    const op_control = document.getElementById('op_control')
    const data = {
        vista: vista,
        op: op_control.value
    }
    const control = JSON.stringify(data);
    const respuesta = fetchAPI('',url+'/produccion/control/obtener_control?control='+control,'');
    respuesta.then(json => {
        render_control(vista,json)
    })
}

/**
 * It takes an argument, makes a fetch request, and then renders the response to the DOM.
 * @param op - is the operation number
 */
const obtener_op_control = (op) => {
    const info = document.getElementsByClassName('info')
    const respuesta = fetchAPI('',url+'/produccion/control/obtener_info_op?op='+op,'');
    respuesta.then(json => {
        quitar_info(info[0])
        render_info(json)
    })
}

/**
 * It removes all the children of the element with the id "info"
 * @param info - The element that will be emptied
 */
const quitar_info = (info) => {
    while (info.firstChild) {
        info.removeChild(info.firstChild)
    }
}

/**
 * It takes a JSON object and renders it to the DOM.
 * @param json - is the data that I get from the server
 */
const render_info = (json) => {
    const info = document.getElementsByClassName('info')

    json.forEach(el => {
        info[0].innerHTML = '<label>Código Del Dibujo: <br> '+el.plano+'</label>'+
                            '<label>Cliente: <br> '+el.Cliente+'</label>'+
                            '<label>Fecha: <br> '+el.Fecha.split(' ')[0]+'</label>'+
                            '<label>Cantidad: <br> '+el.cantidad_elaborar+'</label>'+
                            '<label>Descripción: <br> '+el.descripcion+'</label>'+
                            '<label>Tratamiento: <br> '+el.tratamiento+'</label>'+
                            '<label>Material: <br> '+el.material+'</label>'+
                            '<label>Factor: <br> '+el.Factor+'</label>';
    })
}

/**
 * It removes all the rows from the table.
 */
const quitar_filas = () => {
    const body = document.getElementsByClassName('body')
    while (body[0].firstChild) {
        body[0].removeChild(body[0].firstChild)
    }
}

/* It's getting the element with the id 'informacion_op' and storing it in a variable. */
const btn_informacion = document.getElementById('informacion_op')

/* It's adding an event listener to the element with the id 'informacion_op'. When the event is
triggered, it's checking if the value of the input with the id 'op_control' is empty. If it is, it's
calling the function 'open_alert' and passing two arguments to it. If the value of the input is not
empty, it's calling the function 'obtener_op_control' and passing the value of the input as the
argument. */
btn_informacion.addEventListener('click', () => {
    const op_control = document.getElementById('op_control')
    if (op_control.value == '') {
        open_alert('No ha introducido la Orden de Producción','naranja')
        op_control.classList.add('input-error')
    } else {
        obtener_op_control(op_control.value);
        op_control.classList.remove('input-error')
    }
})