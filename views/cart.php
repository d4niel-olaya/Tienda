

<?php
require_once '../api/controllers/request.php';
require_once '../components/producto.php';
session_start();
$compras = $_SESSION['compras'];
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="../style.css" rel="stylesheet">
</head>
<body>
    <div class="app">
    <?php
        // var_dump($compras);
        $req = new Request('productos');
        foreach($compras as $item){
            $listado = $req -> getAll($item[0]);
            $listado = json_decode($listado, true);
            foreach($listado as $compra){
                $precio = $compra['precio'];
                $nombre = $compra['nombre'];
                $cantidad = $compra['cantidad'];
                $img = $compra['img'];
                $cant = $item[1];
                $subt = $precio * $cant;
                Producto::Compra($nombre, $precio, $cant,$img,$subt);
            }
        }
    ?>
    <a href="#">Comprar ahora</a>
    </div>
</body>
</html>