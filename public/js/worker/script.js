if('serviceWorker' in navigator) {
    navigator.serviceWorker.register(url+'/public/js/worker/service_depto.js')
    .then(reg => console.log('Registro exitoso', reg))
    .catch(err => console.warn('Error de registro', err))
}