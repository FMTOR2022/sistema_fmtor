const checkbox = ['check_horario','check_lis_d','check_lis_almuerzo','check_lis_salida','check_lis_salidaExtra','check_lis_s','check_fecha','check_fecha_mes','check_fecha_anio','check_rango_fecha','check_empleado'];
let cabeceras = [['Nombre','Apellido Paterno','Apellido Materno','Horario Entrada','Horario Almuerzo Salida','Horario Almuerzo Regreso','Horario Salida'],['Nombre','Apellido Paterno','Apellido Materno','Horario','Entrada'],['Nombre','Apellido Paterno','Apellido Materno','Horario','Almuerzo'],['Nombre','Apellido Paterno','Apellido Materno','Horario','Salida'],['Nombre','Apellido Paterno','Apellido Materno','Horario','Salida Extra'],['Nombre','Horario','Martes','Miercoles','Jueves','Viernes','Sabado','Lunes','Descuento','Nota']];
 
const limpiar_cabecera = () => {
    const thead = document.getElementsByClassName('cabecera');
    while(thead[0].firstChild){
        thead[0].removeChild(thead[0].firstChild);
    }
}

const limpiar_tabla = () => {
    const tbody = document.getElementsByClassName('body');
    while (tbody[0].firstChild) {
        tbody[0].removeChild(tbody[0].firstChild);
    }
}

const cabecera_lis = (titulos) =>{
    limpiar_cabecera();
    const fragmento = document.createDocumentFragment();
    const thead = document.getElementsByClassName('cabecera');
    const tr = document.createElement('tr');
    
    for (let i = 0; i < titulos.length; i++) {
        const th = document.createElement('th');
        th.innerHTML = titulos[i];
        tr.appendChild(th);
    }
    fragmento.appendChild(tr);
    thead[0].appendChild(fragmento);
}    

/*if (document.getElementsByClassName('btn_filtrar_open')) {
    const btn_filtros_lis = document.getElementsByClassName('btn_filtrar_open');
    btn_filtros_lis[0].addEventListener('click', () => {
        const filtros = document.getElementsByClassName('filtrar');
        // filtros[0].classList.toggle('open');
    });
} */

//Este boton filtra la lista 
const form_filtros = document.getElementById('form-filtros');
    form_filtros.addEventListener('submit', (evt) => {
    evt.preventDefault();
    envia_datos();
});

const envia_datos = () => {
    const Horario = document.getElementsByClassName('check_horario')
    const lista_diaria = document.getElementsByClassName('check_lis_d')
    const lista_almuerzo = document.getElementsByClassName('check_lis_almuerzo')
    const lista_salida = document.getElementById('check_lis_salida')
    const lista_extra = document.getElementsByTagName('check_lis_salidaExtra')
    const lista_semanal = document.getElementById('check_lis_s')
    const fecha = document.getElementById('check_fecha')
    const empleado = document.getElementById('check_empleado')
    const mes = document.getElementById('check_fecha_mes')
    const anio = document.getElementById('check_fecha_anio')
    const r_fecha= document.getElementById('check_rango_fecha')

    if(Horario.checked){
        buscar_dato('buscar_horario')
    }else if(lista_diaria.checked){
        buscar_dato('buscar_lista_diaria')
    }else if(lista_almuerzo.checked){
        buscar_dato('buscar_lista_almuerzo')
    }else if(lista_salida.checked){
        buscar_dato('buscar_lista_salida')
    }else if(lista_extra.checked){
        buscar_dato('buscar_lista_salidaExtra')
    }else if(lista_semanal.checked){
        buscar_dato('buscar_lista_semanal')
    }else if(r_fecha.checked){
        buscar_dato('buscar_rango_fecha')
    }else if(fecha.checked){
        buscar_dato('buscar_fecha')
    }else if (empleado.checked) {
        buscar_dato('buscar_empleado')
    }else if(mes.checked){
        buscar_dato('buscar_mes')
    }else if(anio.checked){
        buscar_dato('buscar_anio')
    }
}

const buscar_dato = (metodo) => {
    const respuesta = fetchAPI(form_filtros, url+'/checador/horarioController/'+metodo, 'POST');
    respuesta.then(json => {
        console.log(json);
        limpiar_tabla()
        const input_tabla = document.getElementById('tabla')
        if(input_tabla.value == 'v_horario'){
            render_horarioV(json)
        }else if(input_tabla.value == 'v_listaentrada'){
            render_lista_diaria(json)
        }else if(input_tabla.value == 'v_listaa'){
            render_lista_almuerzo(json)
        }else if(input_tabla.value == 'v_listas'){
            render_lista_salida(json)
        }else if(input_tabla.value == 'v_listaExtra'){
            render_lista_salidaExtra(json)
        }else if (input_tabla.value == 'v_lista') {
            render_lista_semanal(json)
        }
    })
}

//cambia el formato de la lista
const form_formatos = document.getElementById('form-formatos');
form_formatos.addEventListener('submit', (evt) => {
    evt.preventDefault();
    const select = document.getElementById('seleccion_formato')
    const input_tabla = document.getElementById('tabla')
    cabecera_lis(cabeceras[select.value]);
    limpiar_tabla();
    if(select.value == 0) {
        input_tabla.value = 'horario'
        obtener_horario()
    }else if (select.value == 1) {
        input_tabla.value = 'lista_diaria'
        obtener_lista_diaria()
    }else if(select.value == 2){
        input_tabla.value = 'lista_almuerzo'
        obtener_lista_almuerzo()
    }else if(select.value == 3){
        input_tabla.value = 'lista_salida'
        obtener_lista_salida()
    }else if(select.value == 4){
        input_tabla.value = 'lista_salidaExtra'
        obtener_lista_salidaExtra()
    }else if (select.value == 5) {
        input_tabla.value = 'lista_semanal'
        // obtener_lista_semanal()
    }
});

const select_formatos = document.getElementById('seleccion_formato')
select_formatos.addEventListener('change', () => {
    cabecera_lis(cabeceras[select_formatos.value]);
    const input_tabla = document.getElementById('tabla')
    input_tabla.removeAttribute('value')
    limpiar_tabla();
    if (select_formatos.value == 0) {
        input_tabla.value = ('value','v_horario')
        obtener_horario()
    }else if (select_formatos.value == 1) {
        input_tabla.value = ('value','v_listaentrada')
        obtener_lista_diaria()
    } else if (select_formatos.value == 2) {
        input_tabla.value = ('value','v_listaa')
        obtener_lista_almuerzo()
    }else if (select_formatos.value == 3){
        input_tabla.value = ('value','v_listas')
        obtener_lista_salida()
    }else if(select_formatos.value == 4){
        input_tabla.value = ('value','v_listaExtra')
        obtener_lista_salidaExtra()
    }else if (select_formatos.value == 5){
        input_tabla.value = ('value','v_lista')
        // obtener_lista_semanal()
        // generar_lista_semanal()
    }
})

const filtros_personalizados = (check, filtro) => {
    if(check && (filtro == 'f_fecha')){
        const inputs = document.getElementsByClassName('input')
        if (filtro == 'f_fecha') {
            for (let i = 0; i < checkbox.length; i++) {
                if (checkbox[i] != 'check_fecha') {
                    document.getElementById('lbl_'+checkbox[i]).setAttribute('disabled','')
                    document.getElementById(checkbox[i]).setAttribute('disabled','')
                    document.getElementById(checkbox[i]).checked = false;
                }
            }
        }
    }else if (!check && (filtro == 'f_op' || filtro == 'f_fecha')) {
        if (filtro == 'f_op') {
            for (let i = 1; i < checkbox.length; i++) {
                document.getElementById('lbl_'+checkbox[i]).removeAttribute('disabled')
                document.getElementById(checkbox[i]).removeAttribute('disabled')
            }
        } else if (filtro == 'f_fecha') {
            for (let j = 0; j < checkbox.length; j++) {
                if (checkbox[j] != 'check_fecha') {
                    document.getElementById('lbl_'+checkbox[j]).removeAttribute('disabled')
                    document.getElementById(checkbox[j]).removeAttribute('disabled')
                }
            }
        }
    }else if(!check && (filtro == 'f_op' || filtro == 'f_fecha')){
        if(filtro == 'f_op'){
            for (let i = 1; i < checkbox.length; i++) {
                document.getElementById('lbl_'+checkbox[i]).removeAttribute('disabled')
                document.getElementById(checkbox[i]).removeAttribute('disabled')
            }
        }else if(filtro == 'f_fecha'){
            for (let j = 0; j < checkbox.length; j++) {
                if (checkbox[j] != 'check_fecha') {
                    document.getElementById('lbl_'+checkbox[j]).removeAttribute('disabled')
                    document.getElementById(checkbox[j]).removeAttribute('disabled')
                }
            }
        }
    }
}

document.addEventListener('click', (evt) => {
    if (evt.target.dataset.check) {
        if (!evt.target.dataset.rango) {
            filtros_personalizados(evt.target.checked, evt.target.dataset.check)
            const input = document.getElementById(evt.target.dataset.check);
            if (evt.target.checked) {
                input.removeAttribute('disabled')
            } else if (!evt.target.checked) {
                input.setAttribute('disabled','')
            }
        } else {
            const inputm = document.getElementById(evt.target.dataset.check+'_m');
            const inputM = document.getElementById(evt.target.dataset.check+'_M');
            if (evt.target.checked) {
                inputm.removeAttribute('disabled')
                inputM.removeAttribute('disabled')
            } else if (!evt.target.checked) {
                inputm.setAttribute('disabled','')
                inputM.setAttribute('disabled','')
            }
        }
    } 
}); 

