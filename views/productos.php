<?php
require_once '../api/controllers/request.php';
require_once 'producto.php';
$req = new Request('productos');
$productos = json_decode($req->getAll(),true);

foreach($productos as $producto){
    $id = $producto['id'];
    $nombre = $producto['nombre'];
    $precio = $producto['precio'];
    $cantidad = $producto['cantidad'];
    $uso = $producto['uso'];
    $img = $producto['img'];
    Producto::Template($id,$nombre, $precio, $img,$uso,$cantidad);
}


?>