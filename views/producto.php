<?php


class Producto{
    public static function Template($id,$nombre, $precio, $img,$uso, $cantidad){
        echo "
            <div class='producto'>
                <a href='productos.php?id=$id'><p>Nombre: $nombre</p></a>
                <p>Precio : $precio</p>
                <p>Unidades : $cantidad</p>
                <p>Tipo de uso : $uso</p>
                <img src='../img/$img' class='img'>
                <a href='productos.php?id=$id'>Añadir al carro</a>
            </div>";
    }
}