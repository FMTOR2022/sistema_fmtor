<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prueba</title>
    <link rel="stylesheet" href="../public/css/default.css">
</head>
<body>
    <div class="contenido">

    </div>
    <script src="../public/js/fmtor_libreria.js?1.2"></script>
    <script>
        const funcion = () => {
            const respuesta = fetchAPI('','http://localhost/sistema_fmtor/main/op','')
            respuesta.then(json => {
                console.log(json);
                json.forEach(el => {
                    console.log(el.calibre);
                });
            })
        }

        (() => {
            funcion()
        })()
    </script>
</body>
</html>