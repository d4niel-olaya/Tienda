

<?php
require_once '../api/controllers/request.php';
session_start();
$compras = $_SESSION['compras'];
var_dump($compras);
$req = new Request('productos');
foreach($compras as $item){
    $listado = $req -> getAll($item[0]);
    $listado = json_decode($listado, true);
    foreach($listado as $compra){
        $cant = $item[1];
        var_dump($compra['precio'] * $cant);
        echo '<br>';
    }
}

