
/**
 * It creates a table row element, sets the innerHTML of the row to the values of the current element
 * in the array, and then appends the row to the table body.
 * @param json - the JSON object that you want to render
 */
const render_registros_diarios = (json) => {
    const body = document.getElementById('body')
    json.forEach(el => {
        const tr = document.createElement('tr')
        if (el.Id_Folio != 1) {
            tr.innerHTML = '<td>'+el.turno+'</td>'+
                            '<td>'+el.Id_Folio+'</td>'+
                            '<td>'+el.Clientes+'</td>'+
                            '<td>'+el.kilos+'</td>'+
                            '<td>'+el.pzas+'</td>'+
                            '<td>'+el.Maquina+'</td>'+
                            '<td>'+el.descripcion+'</td>'+
                            '<td>'+el.observaciones+'</td>'
            body.appendChild(tr);
        } else {
            tr.innerHTML = '<td>'+el.turno+'</td>'+
                            '<td>SIN O.P.</td>'+
                            '<td></td>'+
                            '<td>'+el.kilos+'</td>'+
                            '<td>'+el.pzas+'</td>'+
                            '<td>'+el.Maquina+'</td>'+
                            '<td></td>'+
                            '<td>'+el.observaciones+'</td>'
            body.appendChild(tr);
        }
    });
}