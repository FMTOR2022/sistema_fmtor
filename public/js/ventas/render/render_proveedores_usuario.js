/**
 * It takes a JSON object, clears the HTML table body, and then loops through the JSON object, adding a
 * new row to the table for each object in the JSON object.
 * @param json - The JSON data you want to render
 */
const render_proveedores = (json) => {
    const body = document.getElementById('body_proveedores')
    body.innerHTML = ''
    json.forEach(el => {
        body.innerHTML += '<tr>'+
                            // '<td>'+el.Id_Proveedor +'</td>'+    
                            '<td>'+el.Proveedor +'</td>'+    
                            '<td>'+el.Direccion +'</td>'+    
                            '<td>'+el.Ciudad +'</td>'+    
                            '<td>'+el.Telefono +'</td>'+    
                            '<td>'+el.Correo +'</td>'+    
                        '</tr>';
    });
}