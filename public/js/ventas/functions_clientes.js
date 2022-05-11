/**
 * It fetches data from a server, then renders it to the page.
 */
const obtener = () =>{
    const respuesta = fetchAPI('',url+'/ventas/clientes/obtener','')
    respuesta.then(json => {
        render_clientes(json);
    })  
};

/* Listening for the DOM to be loaded, then it calls the function obtener() */
document.addEventListener('DOMContentLoaded', () => {
    obtener();
})