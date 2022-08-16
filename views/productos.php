<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        // $url = "http://localhost/tienda/api/productos";
        // // Los datos de formulario
        
        // // Crear opciones de la petición HTTP
        // $opciones = array(
        //     "http" => array(
        //         "header" => "Content-type: application/x-www-form-urlencoded\r\n",
        //         "method" => "GET" # Agregar el contenido definido antes
        //     ),
        // );
        // # Preparar petición
        // $contexto = stream_context_create($opciones);
        // # Hacerla
        // $resultado = file_get_contents($url, false, $contexto);
        // if ($resultado === false) {
        //     echo "Error haciendo petición";
        //     exit;
        // }
        
        // # si no salimos allá arriba, todo va bien
        // echo($resultado);

        require_once 'controllers/request.php';
        $req = new Request('productos');
        echo($req -> getResult());

    ?>
</body>
</html>