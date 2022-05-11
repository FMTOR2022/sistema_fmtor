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

/* Adding an event listener to the form. */
form_filtros.addEventListener("submit", (evt) => {
  evt.preventDefault();
  enviar_datos();
});

/**
 * If the checkbox with the id of "op" is checked, then call the function buscar_dato with the argument
 * "buscar_op".
 */
const enviar_datos = () => {
//   const salida = document.getElementById("salida");
  const op = document.getElementById("op");
  const fecha = document.getElementById("fecha");
  const cliente = document.getElementById("cliente");
  const estado = document.getElementById("estado");
  const mes = document.getElementById("fecha_mes");
  const anio = document.getElementById("fecha_anio");
  const r_op = document.getElementById("rango_op");
//   const r_salida = document.getElementById("rango_salidas");
  const r_fecha = document.getElementById("rango_fecha");

  if (op.checked) {
    buscar_dato("buscar_op");
  } else if (r_op.checked) {
    buscar_dato("buscar_rango_op");
  } else if (r_fecha.checked) {
    buscar_dato("buscar_rango_fecha");
  } else if (fecha.checked) {
    buscar_dato("buscar_fecha");
  } else if (cliente.checked) {
    buscar_dato("buscar_cliente");
  } else if (mes.checked) {
    buscar_dato("buscar_mes");
  } else if (anio.checked) {
    buscar_dato("buscar_anio");
  } else if (estado.checked) {
    buscar_dato("buscar_estado");
  }
};

/**
 * It takes a parameter, and then it makes a fetch request to a url, and then it renders the response.
 * @param metodo - is the method that I want to call from the API
 */
const buscar_dato = (metodo) => {
  const respuesta = fetchAPI(form_filtros,url + "/ventas/orden/" + metodo,  "POST");
  respuesta.then((json) => {
    limpiar_tabla();
    render_orden(json);
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

/* Adding an event listener to the document, and then it is checking if the event target has a dataset
with the name of "radio", and then it is calling the function deshabilitar_inputs, and then it is
checking if the element with the id of "f_" + evt.target.value exists, and then it is removing the
attribute "disabled" from the element with the id of "f_" + evt.target.value, and then it is
checking if the value of evt.target.value.split("_")[0] is equal to "rango", and then it is removing
the attribute "disabled" from the element with the id of "f_r_" + evt.target.value.split("_")[1] +
"_m", and then it is removing the attribute "disabled" from the element with the id of "f_r_" +
evt.target.value.split("_")[1] + "_M". */
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
