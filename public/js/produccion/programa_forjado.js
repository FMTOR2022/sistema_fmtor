/**
 * It removes all the children of the element with the id 'body_maquina_'+cuerpos[i]
 */
const limpiar_tablas = () => {
    const cuerpos = [1,2,3,4,5,6,7,8,9]
    for (let i = 0; i < cuerpos.length; i++) {
        const body = document.getElementById('body_maquina_'+cuerpos[i])
        while (body.firstChild) {
            body.removeChild(body.firstChild)
        }
    }
}

/**
 * It loops through an array of numbers, and for each number, it loops through an array of objects, and
 * for each object, it checks if the number is equal to a property of the object, and if it is, it
 * calls a function that renders the object.
 * 
 * If the array of objects is empty, it renders a message.
 * 
 * If the number is the last number in the array of numbers, it renders a total.
 * @param json - is the data that I'm getting from the server
 */
const agrupar_por_maquina = (json) => {
    let kilos = 0 
    let acumulado = 0
    const maquinas = [1,2,3,4,5,6,7,8,9]
    for (let i = 0; i < maquinas.length; i++) {
        if (json.length == 0) {
             const body = document.getElementById("body_maquina_" + maquinas[i]);
             body.innerHTML = '<tr><td class="txt-center" style="background: var(--background-aux);" colspan="17">No hay ningún registro</td></tr>';
        } else {
            json.forEach(el => {
                if (maquinas[i] == el.no_maquina) {
                    render_programa(el,maquinas[i]);
                    kilos += (el.factor*el.cantidad_elaborar);
                    acumulado += parseFloat(el.TOTAL);
                }
    
                if ((i+1) == maquinas.length) {
                    const total_kilos = document.getElementById('total_kilos')
                    const total_acumulado = document.getElementById('total_semana')
                    total_kilos.innerHTML = new Intl.NumberFormat('es-MX').format(kilos)
                    total_acumulado.innerHTML = '$ '+new Intl.NumberFormat('es-MX').format(acumulado)
                }
            });
        }
    }
}

/**
 * It fetches data from a server, then calls another function to process the data.
 */
const obtener_programa = () => {
    const respuesta = fetchAPI('',url+'/produccion/op/obtener_programa','')
    respuesta.then(json => {
        agrupar_por_maquina(json)
    })
}

/* Listening for the DOM to be loaded, and when it is, it calls the function `obtener_programa()` */
document.addEventListener('DOMContentLoaded', () => {
    obtener_programa()
});

/* Listening for a click event, and when it happens, it checks if the target of the event has a data
attribute called `impresion`, and if it does, it calls a function called `printPage()` and passes it
a URL. */
document.addEventListener('click', (evt) => {
    if (evt.target.dataset.impresion) {
        printPage(url+'/produccion/op/pdf_programa_forjado')
    }
})