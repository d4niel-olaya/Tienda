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
                <form action='add.php' method='get'>
                    <input type='text' name='id' value='$id'> 
                    <input type='number' min='1' max=$cantidad name='cantidad' class='cantidad'>
                    <button>Agregar al carrito</buttton>
                </form>
            </div>";
    }
}