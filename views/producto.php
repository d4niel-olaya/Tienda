<?php


class Producto{
    public static function Template($id, $nombre, $precio, $img,$uso, $cantidad){
        echo "<div>
            <p>$id</p>
            <p>Nombre: $nombre</p>
            <p>Precio : $precio</p>
            <p>$img</p>
            <p>Unidades : $cantidad</p>
            <p>Tipo de uso : $uso</p>
            <img src='../img/$img'>
        </div>";
    }
}