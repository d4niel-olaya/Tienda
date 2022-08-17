<?php
require_once '../api/controllers/request.php';
require_once 'producto.php';
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../style.css" rel="stylesheet">
    <title>Document</title>
</head>
<body>
    <div class="app">
        
    <?php
        include_once 'navbar.php';
        $_SESSION['compras'] = [];
        if(isset($_GET['id'])){
            $reqByid = new Request('productos');
            $result= json_decode($reqByid -> getAll($_GET['id']),true);
            array_push($_SESSION['compras'], $_GET['id']);
        }
        else{
        // var_dump($_GET['id']);
            $req = new Request('productos');
            $result = json_decode($req->getAll(),true);
        }
        var_dump($_SESSION['compras']);
        foreach($result as $producto){
            $id = $producto['id'];
            $nombre = $producto['nombre'];
            $precio = $producto['precio'];
            $cantidad = $producto['cantidad'];
            $uso = $producto['uso'];
            $img = $producto['img'];
            Producto::Template($id,$nombre, $precio, $img,$uso,$cantidad);
        }


    ?>
    </div>
</body>
</html>
