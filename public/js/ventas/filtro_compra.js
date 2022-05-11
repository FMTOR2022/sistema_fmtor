/**
 * It removes all the children of the first element with the class name "body" from the DOM.
 */
const limpiar_tabla = () => {
  const tbody = document.getElementsByClassName("body");
  const table = document.getElementById("table");
  const tfoot = document.getElementsByClassName("tfoot");
  while (tbody[0].firstChild) {
    tbody[0].removeChild(tbody[0].firstChild);
  }

  // table.removeChild(tfoot[0]);
  // console.log(tfoot);
};

/* Adding an event listener to the form. */
const form_filtros = document.getElementById("form-filtros");
form_filtros.addEventListener("submit", (evt) => {
  evt.preventDefault();
  enviar_datos();
});

/**
 * If the checkbox with the id of "salida" is checked, then call the function buscar_dato with the
 * parameter "buscar_salida".
 */
const enviar_datos = () => {
    const salida = document.getElementById("salida");
    // const op = document.getElementById("op");
    const fecha = document.getElementById("fecha");
    const cliente = document.getElementById("proveedor_b");
    const empresa = document.getElementById("empresa_b");
    // const estado = document.getElementById("estado");
    const mes = document.getElementById("fecha_mes");
    const anio = document.getElementById("fecha_anio");
    // const r_op = document.getElementById("rango_op");
    const r_salida = document.getElementById("rango_salidas");
    const r_fecha = document.getElementById("rango_fecha");

  if (salida.checked) {
    buscar_dato("buscar_salida");
  } else if (r_salida.checked) {
    buscar_dato("buscar_rango_salidas");
  } else if (fecha.checked) {
    buscar_dato("buscar_fecha");
  } else if (r_fecha.checked) {
    buscar_dato("buscar_rango_fecha");
  } else if (cliente.checked) {
    buscar_dato("buscar_cliente");
  } else if (mes.checked) {
    buscar_dato("buscar_mes");
  } else if (anio.checked) {
    buscar_dato("buscar_anio");
  } else if (empresa.checked) {
    buscar_dato("buscar_empresa");
  }
//    else if (estado.checked) {
//     buscar_dato("buscar_estado");
//   }
};

/**
 * It takes a parameter, then it makes a fetch request, then it renders the data.
 * @param metodo - is the method that I want to call from the API
 */
const buscar_dato = (metodo) => {
  const respuesta = fetchAPI(
    form_filtros,
    url + "/ventas/compras/" + metodo,
    "POST"
  );
  respuesta.then((json) => {
    limpiar_tabla();
    render_ordenes(json);
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

/* Disabling all the inputs in the form. */
document.addEventListener("click", (evt) => {
  if (evt.target.dataset.radio) {
    deshabilitar_inputs();

    if (document.getElementById("f_" + evt.target.value)) {
      const $f_input = document.getElementById("f_" + evt.target.value);
      $f_input.removeAttribute("disabled", "");
    }

    if (
      evt.target.value.split("_").length > 1 &&
      evt.target.value.split("_")[0] == "rango"
    ) {
      const $f_input_m = document.getElementById(
        "f_r_" + evt.target.value.split("_")[1] + "_m"
      );
      $f_input_m.removeAttribute("disabled", "");
      const $f_input_M = document.getElementById(
        "f_r_" + evt.target.value.split("_")[1] + "_M"
      );
      $f_input_M.removeAttribute("disabled", "");
    }
  }
});
