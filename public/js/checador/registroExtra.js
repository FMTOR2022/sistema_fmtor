//En este script se valida el QR, al inicio se busca alguna camara y se lee el contenido
let scanner = new Instascan.Scanner({ video: document.getElementById('preview') });
scanner.addListener('scan', function (content) {
    //Cacha el contenido en y lo imprime en la consola
    if (content != null) {

        let horario = new Date();
        horario = horario.toLocaleString();
        var sonido = document.querySelector('#sonido_qr'); 
        
        horario = horario.replace("/", "-");
        while (horario.includes("/")) {
            horario = horario.replace("/", "-");
        }
        horario = horario.split(" ");
        horario[0] = horario[0].split("-");

        horario[0] = horario[0][2] + '-' + horario[0][1] + '-' + horario[0][0];


        horario = horario[0] + " " + horario[1];

        console.log(horario);

        content = content.replace('https://www.fmtor.com/sii/main/datosEmpleados?aux=', '');
        content = atob(content);
        console.log(content);

        const data = {
            id: content,
            entrada: horario,
            tipo: "Salida Extra"
        }

        const json = JSON.stringify(data);

       /* const res = fetchAPI('',url+'/checador/registroController/consultarh?json='+ json, '')
        res.then(json=> {
            console.log(json[0]);
            json.forEach(element => {
                console.log(element.entrada);
            });
        })*/

        const respuesta = fetchAPI('', url+'/checador/registroController/insertarh?json=' + json, '')
        respuesta.then(json => {
            console.log(json);
               //sonidoQr
               sonido.setAttribute("autoplay", true);
               sonido.setAttribute("playsinline", true); 
               sonido.play();
               sonido.play();

               open_alert('Registro realizado con exito','verde');
               window.setTimeout(() => {
                window.location.href = "http://localhost/sistema_fmtor/checador/main/registrar"; 
            },3000);
            
        })
    }
});
//manda a buscar alguna camara 
Instascan.Camera.getCameras().then(function (cameras) {
    if (cameras.length > 0) {
        //si encuentra alguna camara inicializala    
        scanner.start(cameras[0]);
    } else {
        //si no encuentra nada en la camara manda un mensaje en consola
        console.error('No encuentra ninguna camara en tu dispositivo');
        open_alert('No se encuentra ninguna camara en tu dispositivo');
    }
}).catch(function (e) {
    console.error(e);
});


const buscar = () => {
    const valor_empleado = document.getSelection(content)
}
//function  validaUsuario = ({}) => {
// const valida = fetchAPI()
//valida.then(json => {
//valida el content 
//content

//})
//}  

const guarda_empleado = () => {

}