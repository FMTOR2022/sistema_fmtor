const contenedor = document.getElementsByClassName('form-login');
const form = document.getElementById('form-login');
const usu = document.getElementById('nombre');
const pass = document.getElementById('password');
const btn_iniciar = document.getElementById('iniciar');
const auxiliar = {
    intentos: 0
}

btn_iniciar.addEventListener('click', () => {
    contenedor[0].classList.add('mostrar')
})

const iniciar_sesion = () => {
    if (auxiliar.intentos < 3) {
        const respuesta = fetchAPI(form,url+'/main/iniciar','POST');
        respuesta.then(json => {
            if (json.depto) {
                window.location.href = url+'/usuario/principal'
            } else {
                auxiliar.intentos++
                if (json == 0) {
                    usu.classList.add('input-error')
                    pass.classList.add('input-error')
                    open_alert('El usuario o contraseña introducidos son incorrectos','rojo');
                } else if (json == 2) {
                    usu.classList.add('input-error')
                    open_alert('El usuario introducido es incorrecto','rojo');
                } else if (json == 3) {
                    pass.classList.add('input-error')
                    open_alert('La contraseña introducida es incorrecta','rojo');
                } else if (json == 4) {
                    open_alert('Este usuario ya inicio sesión en otro dispositivo','amarillo');
                } else if (json == 5) {
                    usu.classList.add('input-error')
                    open_alert('El usuario "'+usu.value+'" no existe','rojo');
                }
            }
        })
    } else {
        open_alert('Excediste el número de intentos para poder iniciar sesión','rojo');
    }
}

form.addEventListener('submit', (evt) => {
    evt.preventDefault();
    usu.classList.remove('input-error')
    pass.classList.remove('input-error')
    if (usu.value == '' && pass.value == '') {
        usu.classList.add('input-error')
        pass.classList.add('input-error')
        open_alert('No ha introducido el nombre de usuario y contraseña','rojo');
    } else if (pass.value == '') {
        pass.classList.add('input-error')
        open_alert('No ha introducido la contraseña','rojo');
    } else if (usu.value == '') {
        usu.classList.add('input-error')
        open_alert('No ha introducido el nombre de usuario','rojo');
    } else {
        iniciar_sesion()
    }
})

const error_inicio_sesion = () => {
    usu.classList.add('input-error')
    pass.classList.add('input-error')
    open_alert('El usuario o contraseña introducidos son incorrectos','rojo');
}
