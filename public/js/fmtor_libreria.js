let resJSON = ''
let resBLOB 
const url = 'http://localhost/sistema_fmtor'
const btn_menu_toggle = document.getElementById('btn-menu-toggle')
const menu = document.getElementById('menu')

const show_btn = () => {
    if (document.getElementById("btn-subir")) {
        const btn_subir = document.getElementById('btn-subir')
        btn_subir.classList.add('mostrar');
    }
}

const hidde_btn = () => {
    if (document.getElementById("btn-subir")) {
        const btn_subir = document.getElementById('btn-subir')
        btn_subir.classList.remove('mostrar');
    }
}

const quitar_mas_opciones = () => {
    const mas_opciones = document.getElementsByClassName('mas_opciones')
    if (mas_opciones.length > 0) {
        setTimeout(() => { 
            mas_opciones[0].classList.remove('mostrar')
        }, 100);
        setTimeout(() => { 
            document.body.removeChild(mas_opciones[0])
        }, 400);
    }
}

const render_mas_opciones = (texto, registro) => {
    quitar_mas_opciones()
    const mas_opciones = document.createElement('div')
    const titulo = document.createElement('titulo')
    const opciones = document.createElement('opciones')

    mas_opciones.classList.add('mas_opciones')
    
    if(document.getElementsByClassName('hidde_menu').length > 0) {
        mas_opciones.classList.add('w-100')
    } else {
        mas_opciones.classList.add('w-80')
    }

    titulo.innerHTML = '<div class="titulo">'+
                                '<i class="material-icons" data-quitar="opciones">close</i>'+
                                '<h3>'+texto+'</h3>'+
                            '</div>'
                            
    opciones.innerHTML = '<div class="opciones">'+
                                '<button class="btn btn-icon-self btn-transparent material-icons" data-id="'+registro+'" data-opcion="borrar">'+
                                    'delete'+
                                '</button>'+
                                '<button class="btn btn-icon-self btn-transparent material-icons" data-id="'+registro+'" data-opcion="editar">'+
                                    'edit'+
                                '</button>'+
                            '</div>'
                                    
    mas_opciones.appendChild(titulo)                        
    mas_opciones.appendChild(opciones)                        
    document.body.appendChild(mas_opciones)

    window.setTimeout(() => { 
        mas_opciones.classList.add('mostrar')
    }, 300);
}

const abrir_cerrar_menu = () => {
    contenido.classList.toggle('hidde_menu')
    menu.classList.toggle('hidde_menu')
}

// Peticiones

const fetchBlob = async (ruta) => {
    preloader()
    await fetch(ruta)
    .then(res => (res.ok ? res.text() : Promise.reject(res)))
    .then(blob => {
        resBLOB = blob;
    })
    .catch(err => {
        resBLOB = err;
    })
    .finally(() => {
        ocultarPreloader() 
    })
    return resBLOB
}

const fetchAPI = async (form,ruta,metodo) => {
    preloader()
    if (metodo != '') {
        const data = new FormData(form)
        const opciones = {
            method: metodo,
            body: data
        }

        await fetch(ruta,opciones)
        .then(res => (res.ok ? res.json() : Promise.reject(res)))
        .then(json => {
            resJSON = json;
        })
        .catch(err => {
            resJSON = err;
        })
        .finally(() => {
            ocultarPreloader() 
        })
    } else if (metodo == '') {
        await fetch(ruta)
        .then(res => (res.ok ? res.json() : Promise.reject(res)))
        .then(json => {
            resJSON = json;
        })
        .catch(err => {
            resJSON = err;
        })
        .finally(() => {
            ocultarPreloader() 
        })
    }

    return resJSON
}

// Alertas

const time_notification = (div,not) => {
    window.setTimeout(() => {
        not.classList.add('show-alert');
    },300);
    window.setTimeout(() => {
        not.classList.remove('show-alert');
    },5000);
    window.setTimeout(() => {
        div.removeChild(not);
        const cantidad = div.getElementsByClassName('contenido')
        if (cantidad.length == 0) {
            div.classList.remove('show-alert')
            document.body.removeChild(div)
        }
    },5800);
}

const open_alert = (titulo,color) => {  
    if (document.getElementById('contenedor_alert')) {
        const contenedor = document.getElementById('contenedor_alert')
        const contenido = document.createElement('div')
        let icono = 'info'
    
        if (color == 'rojo') {
            icono = 'warning';
        } else if (color == 'verde') {
            icono = 'check';
        } else if (color == 'azul') {
            icono = 'info';
        } else if (color == 'naranja') {
            icono = 'feedback';
        } else {
            icono = 'info';
        }
    
        contenido.classList.add('contenido')
        contenido.classList.add('d-flex')
        contenido.classList.add('align-content-center')
        contenido.innerHTML += '<i class="material-icons">'+icono+'</i>'+
                                '<p class="txt-left">'+titulo+'</p>'
    
        contenedor.appendChild(contenido)
        document.body.appendChild(contenedor);

        time_notification(contenedor,contenido)
    } else {
        const div = document.createElement('div')
        const contenido = document.createElement('div')
        let icono = 'info'

        div.setAttribute('id','contenedor_alert')
        div.classList.add('alert')
        div.classList.add('show-alert')
        div.classList.add('d-flex')
        div.classList.add('justify-right')
        div.classList.add('flex-column')
        div.classList.add('align-content-top')
        div.classList.add('flex-nowrap')
        div.classList.add('alert-'+color)

        if (color == 'rojo') {
            icono = 'warning';
        } else if (color == 'verde') {
            icono = 'check';
        } else if (color == 'azul') {
            icono = 'info';
        } else if (color == 'naranja') {
            icono = 'feedback';
        } else {
            icono = 'info';
        }
    
        contenido.classList.add('contenido');
        contenido.classList.add('d-flex');
        contenido.classList.add('align-content-center');
        contenido.innerHTML = '<i class="material-icons">'+icono+'</i>'+
                                '<p class="txt-left">'+titulo+'</p>';
                                
        div.appendChild(contenido)
        document.body.appendChild(div);

        time_notification(div,contenido)
    }

}

const open_confirm = (title,callback) => {
    const div = document.createElement('div')
    div.classList.add('confirm')
    div.classList.add('d-flex')
    div.classList.add('justify-center')
    div.classList.add('align-content-top')

    div.innerHTML = '<div class="confirm show-alert d-flex justify-center align-content-center">'+
                        '<div class="contenido d-flex justify-center align-content-center flex-wrap btn-confirm-sm-cancel">'+
                            '<div class="titulo">'+
                                '<h3 class="txt-center">'+title+'</h3>'+
                            '</div>'+
                            '<div class="opciones d-flex justify-center">'+
                                '<button class="btn btn-icon btn-azul btn-confirm-sm-accept">'+
                                    '<i class="material-icons-round">done</i>'+
                                    'Confirmar'+
                                '</button>'+
                                '<button class=" btn btn-icon btn-rojo btn-confirm-sm-cancel">'+
                                    '<i class="material-icons-round">close</i>'+
                                    'Cancelar'+
                                '</button>'+
                            '</div>'+
                        '</div>'+
                    '</div>'

    document.body.appendChild(div)
    
    window.setTimeout(() => {
        div.classList.add('show-alert');
    },300);

    sharedFunction = callback;
}

// Acordeon

const acordeon = (id) => {
    const div = document.getElementById(id)
    div.classList.toggle('mostrar_contenido')
}

if (document.getElementById('contenido')) {
    const contenido = document.getElementById('contenido')
    contenido.addEventListener('scroll', () => {
        if (contenido.scrollTop > 150) {
            show_btn()
        } else {
            hidde_btn()
        }
    });
}

document.addEventListener('click', (evt) => {
    if (evt.target.dataset.registro) {
        render_mas_opciones(evt.target.textContent,evt.target.dataset.registro)
    } else if (evt.target.dataset.quitar) {
        quitar_mas_opciones(evt.target)
    } else if (evt.target.dataset.menu) {
        abrir_cerrar_menu()
    } else if (evt.target.matches('.btn-confirm-sm-accept')) {
        const not = document.getElementsByClassName('confirm')
        console.log('l');
        sharedFunction();
        window.setTimeout(() => {
            not[0].classList.remove('show-alert')
        },100)
        window.setTimeout(() => {
            document.body.removeChild(not[0])
        },500)
    } else if (evt.target.matches('.btn-confirm-sm-cancel')) {
        const not = document.getElementsByClassName('confirm')

        window.setTimeout(() => {
            not[0].classList.remove('show-alert')
        },100)
        window.setTimeout(() => {
            document.body.removeChild(not[0])
        },500)
    } else if (evt.target.dataset.modal) {
        abrir_modal(evt.target.dataset.modal)
    } else if (evt.target.dataset.acordeon) {
        acordeon(evt.target.dataset.acordeon)
    }
});

// Preloader

const preloader = () => {
    const div_content = document.createElement('div')
    const div_preloader = document.createElement('div')
    const div_progress = document.createElement('div')

    div_content.classList.add('content_preloader')
    div_preloader.classList.add('preloader')
    div_progress.classList.add('progress')

    div_preloader.appendChild(div_progress)
    div_content.appendChild(div_preloader)
    document.body.appendChild(div_content)
}

const ocultarPreloader = () => {
    const preloader = document.getElementsByClassName('content_preloader')
    document.body.removeChild(preloader[0])
}

// Ventanas modales

const abrir_modal = (id) => {
    const modal = document.getElementById(id)
    modal.classList.toggle('abrir_modal')
}

// Script para poder generar reportes

function closePrint () {
    document.body.removeChild(this.__container__);
}

function setPrint () {
    this.contentWindow.__container__ = this;
    this.contentWindow.onbeforeunload = closePrint;
    this.contentWindow.onafterprint = closePrint;
    this.contentWindow.focus(); // Required for IE
    this.contentWindow.print();
}

function printPage (sURL) {
    const oHideFrame = document.createElement("iframe");
    oHideFrame.onload = setPrint;
    oHideFrame.style.position = "fixed";
    oHideFrame.style.right = "0";
    oHideFrame.style.bottom = "0";
    oHideFrame.style.width = "0";
    oHideFrame.style.height = "0";
    oHideFrame.style.border = "0";
    oHideFrame.src = sURL
    document.body.appendChild(oHideFrame);
}

// cerrar sesión

if (document.getElementById('cerrar-sesion')) {
    const btn_close_session = document.getElementById('cerrar-sesion');
    btn_close_session.addEventListener('click', () => {
        const respuesta = fetchAPI('',url+'/main/cerrar_sesion','')
        respuesta.then(json => {
            if (json == 1) {
                window.location.href = url+'/main/login';
            }
        })
    });
}

if (document.getElementById('btn-toggle-iniciar')) {
    const btn_abrir_form = document.getElementById('btn-toggle-iniciar');
    btn_abrir_form.addEventListener('click', () => {
        alert('Clickeado')
        const empresa = document.getElementsByClassName('empresa')
        empresa[0].classList.add('quitar_empresa')
        const form_login = document.getElementsByClassName('f-login')
        form_login[0].classList.add('aparecer')
    });
}