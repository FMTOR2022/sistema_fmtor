/**
 * While the first child of the first element with the class name 'body' exists, remove it from the
 * DOM.
 */
const limpiar_tabla = () => {
    const tbody = document.getElementsByClassName("body");
    const table = document.getElementById("table");
    const tfoot = document.getElementsByClassName("tfoot");
    while (tbody[0].firstChild) {
        tbody[0].removeChild(tbody[0].firstChild);
    }
};

/* Adding an event listener to the form. */
const form_filtros = document.getElementById("form-filtros");
form_filtros.addEventListener("submit", (evt) => {
    evt.preventDefault();
    enviar_datos();
});

/**
 * If the radio button is checked, then call the function buscar_dato with the value of the radio
 * button as the argument.
 */
const enviar_datos = () => {
    const salida = document.getElementById("salida");
    const fecha = document.getElementById("fecha");
    const cliente = document.getElementById("cliente");
    const mes = document.getElementById("fecha_mes");
    const anio = document.getElementById("fecha_anio");
    const r_salida = document.getElementById("rango_salidas");
    const r_fecha = document.getElementById("rango_fecha");

    if (salida.checked) {
        buscar_dato("buscar_cotizacion");
    } else if (r_fecha.checked) {
        buscar_dato("buscar_rango_fecha");
    } else if (r_salida.checked) {
        buscar_dato("buscar_rango_cotizaciones");
    } else if (fecha.checked) {
        buscar_dato("buscar_fecha");
    } else if (cliente.checked) {
        buscar_dato("buscar_cliente");
    } else if (mes.checked) {
        buscar_dato("buscar_mes");
    } else if (anio.checked) {
        buscar_dato("buscar_anio");
    }
};

/**
 * It takes a parameter, and then it makes a fetch request to an API, and then it renders the response
 * to a table.
 * @param metodo - is the method that I want to call from the API
 */
const buscar_dato = (metodo) => {
  const respuesta = fetchAPI(form_filtros,url + "/ventas/cotizacion/" + metodo,"POST");
  respuesta.then((json) => {
    limpiar_tabla();
    render_cotizaciones(json);
  });
};

/**
 * It disables all the inputs in the form.
 */
const deshabilitar_inputs = () => {
  const f_inputs = form_filtros.getElementsByClassName("input");
  for (let i = 0; i < f_inputs.length; i++) {
    f_inputs[i].setAttribute("disabled", "");
  }
};

/* An event listener that listens to the click event, and then it checks if the target of the event has
the attribute data-radio, and if it does, then it disables all the inputs in the form, and then it
checks if the target of the event has the value of the id of an input, and if it does, then it
removes the attribute disabled from the input. */
document.addEventListener("click", (evt) => {
  if (evt.target.dataset.radio) {
    deshabilitar_inputs();

    if (document.getElementById("f_" + evt.target.value)) {
        const $f_input = document.getElementById("f_" + evt.target.value);
        $f_input.removeAttribute("disabled", "");
    }

    if (evt.target.value.split("_").length > 1 &&evt.target.value.split("_")[0] == "rango") {
      const $f_input_m = document.getElementById("f_r_" + evt.target.value.split("_")[1] + "_m");
      $f_input_m.removeAttribute("disabled", "");
      const $f_input_M = document.getElementById("f_r_" + evt.target.value.split("_")[1] + "_M");
      $f_input_M.removeAttribute("disabled", "");
    }
  }
});
