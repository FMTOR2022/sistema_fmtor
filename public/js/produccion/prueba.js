/* Getting the elements from the HTML file. */
const btn_alert = document.getElementById('btn-alert')
const btn_confirm = document.getElementById('btn-confirm')

// Ejemplo de alertas

/* Adding an event listener to the button with the id of btn-alert. When the button is clicked, it will
call the function open_alert. */
btn_alert.addEventListener('click', () => {
    open_alert('Título de prueba demasiado largo para un dispositivo movil','rojo')
})

// Ejemplo de confirmaciones

/**
 * &gt;&gt;&gt; hola()
 * &lt;&lt;&lt; Hola Mundo</code>
 * 
 * 
 * 
 * I'm not sure if this is the best way to do it, but it works.
 */
function hola () {
    alert('Hola Mundo')
}

/* It's adding an event listener to the button with the id of btn-confirm. When the button is clicked,
it will call the function open_confirm. */
btn_confirm.addEventListener('click', () => {
    const titulo = '¿Estas seguro de realizar esta acción?'
    open_confirm(titulo, hola)
})