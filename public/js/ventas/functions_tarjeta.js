/**
 * It takes a JSON object and renders it to the DOM.
 * @param json - is the data that comes from the server
 */
const render_tarjeta = (json) => {
    const body = document.getElementsByClassName('body_tarjeta');
    body[0].innerHTML = '';  
    json.forEach(element => {
        body[0].innerHTML += '<tr>'+
                                '<td>'+element.Id_Folio+'</td>'+
                                '<td>'+element.Codigo+'</td>'+
                                '<td>'+element.Tratamiento+'</td>'+
                                '<td>'+element.Bote+'</td>'+
                                '<td>'+element.Descripcion+'</td>'+
                                '<td>'+element.Medida+'</td>'+
                                '<td>'+element.Acabado+'</td>'+
                                '<td>'+element.Dibujo+'</td>'+
                                '<td>'+element.Razon_social+'</td>'+
                                '<td>'+element.Salida+'</td>'+
                                '<td>'+element.Fecha+'</td>'+
                                '<td>'+element.Material+'</td>'+
                                '<td><button class= "material-icons btn btn-icon-self" data-modal="modal-actualizar" data-edit="'+element.Id_Folio+'"> app_registration</button></td>'+
                                '<td><button class= "material-icons btn btn-icon-self" data-imprime="'+element.Id_Folio+'">account_tree</button>'
                                +'<tr>';
  
    });
  }

/**
 * It fetches data from a server and then displays it in a modal.
 * @param id - id of the row
 */
  const mostrarModal = (id) =>{
    const respues = fetchAPI('',url+'/ventas/tarjeta/obtener_per?aux='+id+'','');
    respues.then(json => {
        pintarModal(json);
    });
  }
  
/* Getting the values from the form and then it is assigning them to the variables. */
  const Bote             = document.getElementById('Bote_edit');
  const Id_Folio= document.getElementById('id_folio_edit');

/**
 * It takes a JSON object as an argument, and then it loops through the object and assigns the values
 * of the object to the value of the input fields.
 * @param json - is the data that I get from the server
 */
   const pintarModal = (json) => {
    json.forEach(element => {
      Bote.value             = element.Bote;
      Id_Folio.value= element.Id_Folio;
    })
  }

//
 /**
  * It fetches data from an API and then renders it to the page.
  */
  const obtener = () =>{
    const respuesta = fetchAPI('',url+'/ventas/tarjeta/obtener','')
    respuesta.then(json => {
        render_tarjeta(json);
    })
};
  //pdf tarjeta
 /**
  * It takes an id as a parameter and then calls a function that prints a page.
  * @param id - is the id of the record
  */
  const pdfs = (id) => {
    printPage(url+'/ventas/tarjeta/pdftarjeta?atributo=Id_Folio&value='+id)
  }
  
/* Listening for a click event and then it is calling a function that prints a page. */
  document.addEventListener('click',(evt)=>{
    
    if (evt.target.dataset.imprime){
      pdfs(evt.target.dataset.imprime)
    } 
  });

/* Listening for a click event and then it is calling a function that prints a page. */
  document.addEventListener('click',evt =>{
    if(evt.target.dataset.edit){
        mostrarModal(evt.target.dataset.edit);
    }else{
        if(evt.target.dataset.delete){
            
        }
    }
    
  })

/* Listening for a click event and then it is calling a function that fetches data from an API and then
renders it to the page. */
  const btn_buscar=document.getElementById('clave')
btn_buscar.addEventListener('click',()=>{
    const input=document.getElementById('id_tarjeta');
    if(input.value==''){
        obtener();
    }
    else{
      obtener_clave_tarjeta(input.value)
    }
    
})

/**
 * It takes a string, makes a fetch request to a url, and then renders the response to the page.
 * @param clave - is the card number
 */
const obtener_clave_tarjeta = (clave) => {
    const respuesta = fetchAPI('',url+'/ventas/tarjeta/buscar?clave='+clave,'');
    respuesta.then(json => {
        render_tarjeta(json)
    })
}

  /* Getting the form from the DOM. */
  const formactualizar = document.getElementById('form_act_tarjeta');

/* Listening for a submit event and then it is calling a function that updates a record. */
  formactualizar.addEventListener('submit', (evt) => {
    evt.preventDefault();
    actualizar_tarjeta();
  })
  
/**
 * It takes the data from a form, sends it to a PHP file, and then displays a message based on the
 * response from the PHP file.
 * 
 * The PHP file is called 'actualizarTarjeta.php' and it's located in the 'ventas' folder.
 * 
 * Here's the code for that file:
 * 
 * &lt;?php
 * 
 * require_once '../../conexion.php';
 * 
 *  = ['id'];
 *  = ['nombre'];
 *  = ['descripcion'];
 * 
 *  = "UPDATE tarjeta SET nombre = '', descripcion = '' WHERE id = ''";
 * 
 *  = mysq
 */
  const actualizar_tarjeta = () => {
    const respuesta = fetchAPI(formactualizar, url+'/ventas/tarjeta/actualizarTarjeta','POST')
    respuesta.then(json => {
        console.log(json);
        if (json == 1) {
            open_alert('El registro ha sido actualizado correctamente', 'verde')
            obtener();
        } else {
            open_alert('Error al actualizar el registro','rojo')
        }
    })
  }

  
  
    /* It's calling the `obtener()` function. */
    (function (){
      obtener(); 
      
  })()
  