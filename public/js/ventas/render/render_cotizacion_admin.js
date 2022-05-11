/* Declaring some variables. */
const dato = {aux: 0}
const form = document.getElementById("form_reg_cotizacion");
const form_act_cot = document.getElementById("form_act_solo_cotizacion");
const form_act_pedido = document.getElementById("form_act_cotizacion");
let costos_obtenidos = null;

/* Listening for a submit event on the form. When the form is submitted, it prevents the default action
(which is to submit the form to the server). It then creates an object from the form data. It then
calls a function called validar, which I assume is validating the form data. If the form data is
valid, it calls a function called open_confirm, which I assume is opening a confirmation dialog. If
the user confirms, it calls a function called insertar_cotizacion. */
form.addEventListener('submit', (evt) => {
    evt.preventDefault();
    const data = Object.fromEntries(new FormData(evt.target))
    const validacion = validar(data)
    if (validacion) {
        open_confirm("¿Esta seguro de guardar la Cotización?", insertar_cotizacion);
    }
})

/* A form that is being submitted. */
form_act_cot.addEventListener('submit', (evt) => {
    evt.preventDefault()
    open_confirm("¿Esta seguro de modificar la Cotización?", actualizar_solo_salida)
})

/* Adding an event listener to the form_act_pedido form. */
form_act_pedido.addEventListener('submit', (evt) => {
    evt.preventDefault()
    open_confirm("¿Esta seguro de modificar el pedido?", actualizar_pedido);
})

/**
 * It clears the form.
 * @param form - The form that is being submitted.
 */
const limpiar_formulario = (form) => {
    const inputs = form.getElementsByClassName("input");
    for (let i = 1; i < inputs.length; i++) {
        inputs[i].value = "";
    }
    render_form_tornillo(1);
    document.getElementById("Cantidad_Tornillos").value = 1;
};

/**
 * It takes the form data, sends it to the server, and then if the server returns true, it clears the
 * form and displays a success message.
 */
const insertar_cotizacion = () => {
    const respuesta = fetchAPI(form,url+'/ventas/cotizacion/insertar','POST')
    respuesta.then(json => {
        if (json) {
            limpiar_formulario(form);
            open_alert('El registro fue realizado exitosamente', 'verde')
            buscar_mes_actual();
        } else {
            open_alert('Ocurrio un error al realizar el registro', 'rojo')
        }
    })
}

/**
 * It takes the form data from the form_act_cot form, sends it to the server, and then if the server
 * returns 1, it calls the buscar_mes_actual function.
 */
const actualizar_solo_salida = () => {
    const respuesta = fetchAPI(form_act_cot,url+'/ventas/cotizacion/actualizar_solo_cotizacion','POST')
    respuesta.then(json => {
        if (json == 1) {
            open_alert('El registro ha sido actualizado correctamente','verde')
            buscar_mes_actual();
        } else {
            open_alert('El registro no ha sido actualizado','rojo')
        }
    })
}

/**
 * It sends a POST request to the server with the data from the form_act_pedido form, and then it does
 * something with the response.
 */
const actualizar_pedido = () => {
    const respuesta = fetchAPI(form_act_pedido, url+'/ventas/cotizacion/actualizar_pedido','POST')
    respuesta.then(json => {
        if (json == 1) {
            open_alert('El pedido fue actualizado correctamente','verde')
            buscar_historial(auxiliar)
        } else {
            open_alert('El pedido no pudo ser actualizado', 'rojo')
        }
    })
}

/**
 * It takes an id, makes a fetch request to a url, and then renders the response.
 * @param id - the id of the quote
 */
const obtener_cotizacion = (id) => {
    const respuesta = fetchAPI('',url+'/ventas/cotizacion/obtener_cotizacion?id='+id, '')
    respuesta.then(json => {
        render_cotizacion(json)
    })
}

/**
 * It fetches data from a server, then renders it to the page.
 * @param id - the id of the order to be retrieved
 */
const obtener_pedido = (id) => {
    const respuesta = fetchAPI('',url+'/ventas/cotizacion/obtener_pedido?id='+id,'')
    respuesta.then(json => {
        render_pedido(json);
    })
}

/**
 * It gets a list of clients from a database and adds them to a select element.
 */
const obtener_clientes = () => {
    const respuesta = fetchAPI("", url + "/ventas/salida/obtener_clientes", "");
    respuesta.then((json) => {
        json.forEach((el) => {
            if(el.Razon_social != null) {
                document.getElementById("Id_Clientes_2").innerHTML +='<option value="' +el.Id_Clientes +'">' +el.Razon_social.trim() +"</option>";
                document.getElementById("Id_Clientes_2_e").innerHTML +='<option value="' +el.Id_Clientes +'">' +el.Razon_social.trim() +"</option>";
                document.getElementById("f_cliente").innerHTML +='<option value="' +el.Id_Clientes+'">' +el.Razon_social +"</option>";
            }
        });
    });
};

/**
 * It fetches a JSON file from a server, and then it fills some input fields with the data from the
 * JSON file.
 */
const obtener_valores_cotizacion = () => {
    const respuesta = fetchAPI('', url + "/config/auxiliar_doc_ventas.json","")
    costos_obtenidos = respuesta
    costos_obtenidos.then(json => {
        console.log(json.cotizacion.costo);
            document.getElementById('costo_acabado').value = json.cotizacion.costo.acabado
            document.getElementById('costo_acero').value = json.cotizacion.costo.acero
            document.getElementById('costo_iva').value = json.cotizacion.costo.iva
            document.getElementById('costo_laton').value = json.cotizacion.costo.laton
            document.getElementById('costo_tratamiento').value = json.cotizacion.costo.tratamiento
    })
}

/**
 * It makes a fetch request to a url, and if the response is 1, it calls a function called open_alert,
 * otherwise it calls another function called open_alert.
 */
const eliminarPedido = () => {
    const respuesta = fetchAPI('',url+'/ventas/cotizacion/eliminar_pedido?id='+dato.aux,'')
    respuesta.then(json => {
        if (json == 1) {
            open_alert('El registro fue eliminado con exito','verde')
            buscar_historial(auxiliar);
        } else {
            open_alert('El registro no pudo ser eliminado','rojo')
        }
    })    
}

/**
 * It removes the selected attribute from all options, then adds it to the option that matches the
 * cliente parameter.
 * @param cliente - The name of the client to be selected.
 */
const colocar_cliente = (cliente) => {
    const select = document.getElementById("Id_Clientes_2");
    const options = select.getElementsByTagName("option");
    for (let i = 0; i < options.length; i++) {
        options[i].removeAttribute("selected");
    }
    for (let i = 0; i < options.length; i++) {
        if (options[i].textContent.trim() == cliente.trim()) {
            options[i].setAttribute("selected", "");
        }
    }
};

/**
 * It takes an acabado and a j, and then it finds the select element with the id Acabado_j, and then it
 * finds all the options in that select element, and then it loops through all the options, and then it
 * checks if the value of the option is equal to the acabado, and if it is, then it sets the selected
 * attribute of that option to an empty string.
 * @param acabado - the value of the option to be selected
 * @param j - the index of the row
 */
const colocar_acabado = (acabado, j) => {
    const select = document.getElementById("Acabado_" + j);
    const options = select.getElementsByTagName("option");
    for (let i = 0; i < options.length; i++) {
        if (options[i].value == acabado) {
            options[i].setAttribute("selected", "");
        }
    }
};

/**
 * It takes an array of objects and a number, and then sets the value of two elements on the page to
 * the values of the first object in the array.
 * @param op - [{cantidad_elaborar: "1", Id_Catalogo: "1"}]
 * @param contador - is the number of the row in the table
 */
const colocar_informacion_op = (op, contador) => {
    document.getElementById("cantidad_producir_" + contador).value =
        op[0].cantidad_elaborar;
    document.getElementById("Dibujo_" + contador).value = op[0].Id_Catalogo;
};

/**
 * It takes an array of objects, and for each object, it sets the value of a bunch of inputs.
 * @param pedidos - is an array of objects that contains the data that I want to put in the inputs.
 */
const colocar_informacion_tornillos = (pedidos) => {
    let i = 1;
    pedidos.forEach((el) => {
        document.getElementById("Fecha_entrega_" + i).value = el.fecha_entrega;
        document.getElementById("Codigo_" + i).value = el.no_parte;
        document.getElementById("Pedido_pza_" + i).value = el.pedido_cliente;
        document.getElementById("Cantidad_millares_" + i).value = el.cantidad;
        document.getElementById("Precio_millar_" + i).value = el.costo;
        document.getElementById("Medida_" + i).value = el.medida;
        document.getElementById("Descripcion_" + i).value = el.descripcion;
        document.getElementById("factor_" + i).value = el.factor;
        colocar_acabado(el.acabado, i);
        document.getElementById("Material_" + i).value = el.material;
        if (el.tratamiento == 'T/TERMICO') {
            document.getElementById("tratamiento_" + i).checked = true;
        }
        i++;
    });
};

/**
 * It takes a form number as an argument, reads the clipboard, parses the JSON, and then fills in the
 * form with the data.
 * @param form - the form number
 */
const portapapeles_pegar_tornillo = (form) => {
    navigator.clipboard.readText().then((clipText) => {
        const json = JSON.parse(clipText);
        const pedido = json.pedido;

        pedido.forEach((el) => {
            document.getElementById("Fecha_entrega_" + form).value = el.fecha_entrega;
            document.getElementById("Codigo_" + form).value = el.no_parte;
            document.getElementById("Pedido_pza_" + form).value = el.pedido_cliente;
            document.getElementById("Cantidad_millares_" + form).value = el.cantidad;
            document.getElementById("Precio_millar_" + form).value = el.costo;
            document.getElementById("Medida_" + form).value = el.medida;
            document.getElementById("Descripcion_" + form).value = el.descripcion;
            document.getElementById("factor_" + form).value = el.factor;
            colocar_acabado(el.acabado, form);
            document.getElementById("Material_" + form).value = el.material;
        });
    });
}

/**
 * It reads the clipboard, parses the JSON, and then calls a bunch of other functions to fill in the
 * form.
 */
const portapapeles_pegar = () => {
    navigator.clipboard.readText().then((clipText) => {
        const json = JSON.parse(clipText);
        const cotizacion = json.cotizacion;
        const pedidos = json.pedido;

        colocar_cliente(cotizacion[0].razon_social.trim());
        vaciar_tornillos();
        render_form_tornillo(pedidos.length);
        colocar_informacion_tornillos(pedidos);
    });
};

/**
 * It takes a string as an argument, and then it tries to copy that string to the clipboard. If it
 * succeeds, it opens an alert with the text "Factor copiado: " and the string that was passed to the
 * function. If it fails, it opens an alert with the text "Contenido no copiado".
 * @param factor - the number that I want to copy to the clipboard
 */
const portapapeles_copiar_factor = (factor) => {
    navigator.clipboard.writeText(factor).then(
        function () {
            open_alert("Factor copiado: "+factor, "azul");
        },
        function () {
            open_alert("Contenido no copiado", "naranja");
        }
    );
}

/**
 * It takes two parameters, one is a string and the other is a number. It then makes a fetch request to
 * a url and passes the two parameters as part of the url. It then returns a json object.
 * @param el - is the id of the element that is clicked
 * @param pedido - is the id of the order
 */
const portapapeles_copiar = (el, pedido) => {
    const respuesta = fetchAPI("",url + "/ventas/cotizacion/copiar_informacion?aux=" + el + "&pedido=" + pedido,"");
    respuesta.then((json) => {
        let string = JSON.stringify(json);
        navigator.clipboard.writeText(string).then(
            function () {
                open_alert("Información copiada", "azul");
            },
            function () {
                open_alert("Contenido no copiado", "naranja");
            }
        );
    });
};

/**
 * It takes a JSON object and renders it to a table.
 * @param json - is the data that I'm getting from the server.
 */
const render_historial = (json) => {
    const body = document.getElementById("body_historial");
    body.innerHTML = "";
    json.forEach((el) => {
        body.innerHTML +=
        "<tr>" +
            '<td style="padding: 5px;">'+
                '<div id="0'+el.Id_Pedido+'" class="mas_opciones_tablas">'+
                    '<div class="opcion">'+
                        '<button data-opciones="0'+el.Id_Pedido+'"  class="mas btn btn-icon-self material-icons">more_vert</button>'+
                    '</div>'+
                    '<div class="opciones" id="opciones-0'+el.Id_Pedido+'">'+
                        '<button style="margin: 0px 5px 0px 0px;" data-copiar="' +el.Id_Pedido +'" data-pedido="' +el.Id_Pedido +'" id="' +el.id_cotizacion +'" class="material-icons btn btn-icon-self btn-transparent" title="Copiar información">copy_all</button>' +
                        '<button style="margin: 0px 5px" data-pedidoact="' +el.Id_Pedido +'" id="' +el.Id_Pedido +'" data-modal="modal-actualizar" class="material-icons-outlined btn-amarillo btn btn-icon-self btn-transparent" title="Copiar información">edit</button>' +
                        '<button style="margin: 0px 0px 0px 5px;" data-eliminar="'+el.Id_Pedido+'" class="material-icons-outlined btn btn-icon-self btn-rojo">delete</button>' +
                    '</div>'+
                '</div>'+
            '</td>'+
            "<td>" +el.no_parte +"</td>" +
            "<td>" +el.pedido_cliente +"</td>" +
            "<td>" +el.descripcion +"</td>" +
            "<td>" +el.medida +"</td>" +
            "<td>" +el.tratamiento +"</td>" +
            "<td class='txt-right'>" +el.factor +"</td>" +
            "<td>" +el.acabado +"</td>" +
            "<td>" +el.material +"</td>" +
            "<td class='txt-right'>" + new Intl.NumberFormat("es-MX").format(el.cantidad) +"</td>" +
            "<td class='txt-right'>$ " +new Intl.NumberFormat("es-MX").format(el.costo) +"</td>" +
            "<td>" +el.fecha_entrega +"</td>" +
        "</tr>";
    });
};

/**
 * It takes a JSON object and renders it to the DOM.
 * @param json - is the data that I get from the server
 */
const render_cotizaciones = (json) => {
    let aux = 0;
    const body = document.getElementsByClassName('body')[0]
    body.innerHTML = ''
    if (json.length == 0) {
        body.innerHTML += '<tr><td colspan="7">No existe ningún registro</td></tr>'
    } else {
        json.forEach(el => {
            let fecha = el.fecha.split("-");
            if (aux == 0 ||(mes != fecha[0] + "-" + fecha[1] &&fecha[0] + "-" + fecha[1] != "0000-00")) {
                body.innerHTML += '<tr><td class="txt-center" colspan="7">' +meses[fecha[1] - 1] +" " +fecha[0] +"</td></tr>";
                mes = fecha[0] + "-" + fecha[1];
                aux++;
            }
            body.innerHTML += '<tr>'+
                                '<td style="padding: 5px;">'+
                                    '<div id="'+el.id_cotizacion+'" class="mas_opciones_tablas">'+
                                        '<div class="opcion">'+
                                            '<button data-opciones="'+el.id_cotizacion+'"  class="mas btn btn-icon-self material-icons">more_vert</button>'+
                                        '</div>'+
                                        '<div class="opciones" id="opciones-'+el.id_cotizacion+'">'+
                                            '<button style="margin: 0px 5px 0px 0px;" title="Editar Salida de Almacen" class="material-icons-outlined btn btn-amarillo btn-icon-self" data-modal="modal-actualizar-cotizacion" data-cotizacion="' +el.id_cotizacion +'">mode_edit</button>'+
                                            '<button data-copiar="'+el.id_cotizacion+'" id="'+el.id_cotizacion+'" class="material-icons btn btn-icon-self btn-transparent" title="Copiar información">copy_all</button>' +
                                            '<button data-historial="' +el.id_cotizacion +'" data-modal="modal-historial" id="' +el.id_cotizacion +'" class="material-icons-outlined btn btn-icon-self btn-transparent" title="Copiar información">toc</button>' +
                                            '<button title="Generar Cotización" class= "material-icons-outlined btn btn-icon-self" data-documento="' +el.id_cotizacion +'">request_quote</button>' +
                                        '</div>'+
                                    '</div>'+
                                '</td>'+
                                '<td>'+el.id_cotizacion+'</td>'+
                                '<td>'+el.razon_social+'</td>'+
                                '<td>'+el.fecha+'</td>'+
                            '</tr>'
        })
    }
}

/**
 * It takes a JSON object and uses it to populate the values of some form fields.
 * @param json - is the data that is returned from the server
 */
const render_cotizacion = (json) => {
    json.forEach(el => {
        document.getElementById("Cotizacion_e").value = el.Id_Cotizacion;
        document.getElementById("Fecha_e").value = el.Fecha
        document.getElementById('Id_Clientes_2_e').value = el.Id_Clientes_FK
    })
}

/**
 * It takes a JSON object and uses it to populate the values of a form.
 * @param json - [{Id_Pedido: "1", Fecha_entrega: "2020-01-01", Codigo: "1", Pedido_pza: "1",
 * Cantidad_millares: "1", Descripcion: "1", Medida:
 */
const render_pedido = (json) => {
    json.forEach(el => {
        document.getElementById('Pedido_p').value = el.Id_Pedido
        document.getElementById('Fecha_entrega_p').value = el.Fecha_entrega
        document.getElementById('Codigo_p').value = el.Codigo
        document.getElementById('Pedido_pza_p').value = el.Pedido_pza
        document.getElementById('Cantidad_millares_p').value = el.Cantidad_millares
        document.getElementById('Descripcion_p').value = el.Descripcion
        document.getElementById('Medida_p').value = el.Medida
        document.getElementById('factor_p').value = el.Factor
        document.getElementById('Acabado_p').value = el.Acabado
        document.getElementById('Material_p').value = el.Material
        document.getElementById('Precio_millar_p').value = el.Precio_millar
    })
}

/* Adding an event listener to the document. */
document.addEventListener('click', (evt) => {
    if (evt.target.dataset.tornillo) {
        if (evt.target.dataset.tornillo == "mas") {
            tornillo_mas();
        } else if (evt.target.dataset.tornillo == "menos") {
            tornillo_menos();
        }
    } else if (evt.target.dataset.cotizacion) {
        obtener_cotizacion(evt.target.dataset.cotizacion);
    } else if (evt.target.dataset.pedidoact) {
        obtener_pedido(evt.target.dataset.pedidoact);
    } else if (evt.target.dataset.eliminar) {
        dato.aux = evt.target.dataset.eliminar;
        open_confirm('¿Esta seguro de querer eliminar este registro?', eliminarPedido)
    } else if (evt.target.dataset.copiar) {
        portapapeles_copiar(evt.target.dataset.copiar, evt.target.dataset.pedido);
    } else if (evt.target.dataset.pegar) {
        if (evt.target.dataset.pegar == "pegar-todo") {
            portapapeles_pegar();
        } else if (evt.target.dataset.pegar == "pegar-cliente") {
            portapapeles_pegar_cliente();
        }
    } else if (evt.target.dataset.p) {
        portapapeles_pegar_tornillo(evt.target.dataset.p);
    } else if (evt.target.dataset.factor) {
        if (!evt.target.dataset.factor.includes('/')) {
            portapapeles_copiar_factor(evt.target.dataset.factor);
        }
    } else if (evt.target.dataset.calcular) {
        calcular(evt.target.dataset.calcular);
    }
})

/* Adding an event listener to the DOMContentLoaded event. */
document.addEventListener('DOMContentLoaded', () => {
    obtener_clientes();
    obtener_valores_cotizacion();
})