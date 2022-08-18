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
                    <input type='number' min='1' max=$cantidad name='cantidad' class='cantidad' value='1'>
                    <button>Agregar al carrito</buttton>
                </form>
            </div>";
    }

    public static function Compra($nombre, $precio, $cantidad, $img, $subtotal){
        echo "
            <div class='producto'><p>Producto : $nombre</p>
                <p>Precio : $precio</p>
                <p>Cantidad : $cantidad</p>
                <img src='../img/$img' class='img'>
                <p>Subtotal: $subtotal</p></div>";
    }
}