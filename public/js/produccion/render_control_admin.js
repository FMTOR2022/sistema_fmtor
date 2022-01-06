const render_control = (vista,json) => {
    totales.total_kg = 0.0;
    totales.total_pzas = 0;
    const body = document.getElementsByClassName('body')

    quitar_filas(vista)

    json.forEach(el => {
        body[0].innerHTML += '<tr>'+
                                '<td>'+el.botes+'</td>'+
                                '<td>'+el.fecha+'</td>'+
                                '<td>'+el.observaciones+'</td>'+
                                '<td class="txt-right">'+new Intl.NumberFormat('es-MX').format(el.pzas)+'</td>'+
                                '<td class="txt-right">'+new Intl.NumberFormat('es-MX').format(el.kilos)+'</td>'+
                                '<td class="txt-right">'+el.no_maquina+'</td>'+
                                '<td><button class="btn btn-icon-self btn-rojo material-icons" data-opcion="cerrar" data-eliminar='+el.id_registro_diario+'>delete</button></td>'+
                                '<td><button class="btn btn-icon-self btn-amarillo material-icons" data-modal="modal-actualizar" data-opcion="actualizar"  data-edit="'+el.id_registro_diario+'">edit</button></td>'+
                                '</tr>';
        totales.total_kg += parseFloat(el.kilos)
        totales.total_pzas  += parseInt(el.pzas)
    });

    const total_kilogramos = document.getElementsByClassName('total_kg')
    const total_acumuladas = document.getElementsByClassName('total_acumuladas')

    total_kilogramos[0].innerHTML = 'Total k.g.: <br>' + new Intl.NumberFormat('es-MX').format(totales.total_kg)
    total_acumuladas[0].innerHTML = 'Pzas. Acumuladas: <br>' + new Intl.NumberFormat('es-MX').format(totales.total_pzas)
}

const btn_form_control = document.getElementById('btn-form-control');

btn_form_control.addEventListener('click', () => {
    const estado = document.getElementsByClassName('active')
    const op_control = document.getElementById('op_control')
    
    const op = document.getElementById('op')
    const input = document.getElementById('estado')
    
    op.value = op_control.value
    input.value = estado[0].dataset.id
});

const render_botones_estados = (json) => {
    const botones = document.getElementsByClassName("botones")
    json.forEach(el => {
        if (el.estados != 'CANCELADO' && el.estados != 'TERMINADO') {
            botones[0].innerHTML += '<button class="btn btn-transparent boton_estado" data-estado="v_'+el.estados.toLowerCase()+'" data-titulo="'+el.estados+'" data-id="'+el.id_estados+'">'+el.estados+'</button>'
        }
        
        if (el.estados == 'TERMINADO') {
            botones[0].innerHTML += '<button class="btn" data-terminar="terminar">'+el.estados+'</button>'
        }
    })
}