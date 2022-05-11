/**
 * It fetches data from a server and then renders it to the page.
 */
const obtener_proveedores = () => {
    const respuesta = fetchAPI('',url+'/ventas/proveedores/obtener_proveedores','')
    respuesta.then(json => {
        render_proveedores(json)
    })
}

/* Waiting for the DOM to be loaded before it runs the function. */
document.addEventListener('DOMContentLoaded', () => {
    obtener_proveedores()
})