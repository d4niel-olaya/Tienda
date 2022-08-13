<?php

require_once 'models/conexion.php';
class Productos{
    private $conexion;
    private $consulta;
    public function __construct(){
        $this -> conexion = Database::Connect();
        $this -> consulta = 'SELECT * FROM vista_productos;';
        $this -> consultaId = 'SELECT * FROM vista_productos WHERE id =';
    }

    public function get(){
        $items = [
        ];
        if($resultado = mysqli_query($this-> conexion, $this-> consulta)){
            while($row = mysqli_fetch_assoc($resultado)){
                $id = $row['Id'];
                $nombre = $row['Nombre'];
                $precio = $row['Precio'];
                $uso = $row['Uso'];
                $cantidad = $row['Cantidad'];
                $img = $row['Imagen'];
                $arr = ['Id'=> $id,'Nombre' => $nombre ,'Precio' => $precio, 'Uso'=>$uso , 'Cantidad' => $cantidad, 'Img'=> $img];
                array_push($items, $arr);
            }
            mysqli_free_result($resultado);
            return json_encode($items);
        }
    }

    public function getById($id){
        $items = [];
        if($resultado = mysqli_query($this -> conexion, $this -> consultaId.$id)){
            while($row = mysqli_fetch_assoc($resultado)){
                $id = $row['Id'];
                $nombre = $row['Nombre'];
                $precio = $row['Precio'];
                $uso = $row['Uso'];
                $cantidad = $row['Cantidad'];
                $img = $row['Imagen'];
                $arr = ['Id'=> $id,'Nombre' => $nombre ,'Precio' => $precio, 'Uso'=>$uso , 'Cantidad' => $cantidad, 'Img'=> $img];
                array_push($items, $arr);
            }
        }
        mysqli_free_result($resultado);
        return json_encode($items);
    }

}