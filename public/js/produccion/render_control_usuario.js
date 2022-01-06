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
                            '</tr>';
        totales.total_kg += parseFloat(el.kilos)
        totales.total_pzas  += parseInt(el.pzas)
    });

    const total_kilogramos = document.getElementsByClassName('total_kg')
    const total_acumuladas = document.getElementsByClassName('total_acumuladas')

    total_kilogramos[0].innerHTML = 'Total k.g.: <br>' + new Intl.NumberFormat('es-MX').format(totales.total_kg)
    total_acumuladas[0].innerHTML = 'Pzas. Acumuladas: <br>' + new Intl.NumberFormat('es-MX').format(totales.total_pzas)
}

const render_botones_estados = (json) => {
    const botones = document.getElementsByClassName("botones")
    json.forEach(el => {
        if (el.estados != 'CANCELADO' && el.estados != 'TERMINADO') {
            botones[0].innerHTML += '<button class="btn btn-transparent boton_estado" data-estado="v_'+el.estados.toLowerCase()+'" data-titulo="'+el.estados+'" data-id="'+el.id_estados+'">'+el.estados+'</button>'
        }
    })
}