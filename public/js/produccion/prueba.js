const btn_alert = document.getElementById('btn-alert')
const btn_confirm = document.getElementById('btn-confirm')

// Ejemplo de alertas

btn_alert.addEventListener('click', () => {
    open_alert('Título de prueba','rojo')
})

// Ejemplo de confirmaciones

function hola () {
    alert('Hola Mundo')
}

btn_confirm.addEventListener('click', () => {
    const titulo = '¿Estas seguro de realizar esta acción?'
    open_confirm(titulo, hola)
})