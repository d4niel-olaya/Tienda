<?php

require_once 'models/conexion.php';
class Productos{
    private $conexion;
    private $consulta;
    private $consultaId;
    public function __construct(){
        $this -> conexion = Database::Connect();
        $this -> consulta = 'SELECT * FROM vista_productos';
        $this -> consultaId = 'SELECT * FROM vista_productos WHERE id =';
    }

    public function get($Id = null){
        $items = [];
        $tipoConsulta = $this -> consulta;
        if(isset($Id)){
            $tipoConsulta = $this -> consultaId. $Id;
        }
        if($resultado = mysqli_query($this-> conexion, $tipoConsulta)){
            while($row = mysqli_fetch_assoc($resultado)){
                $id = $row['Id'];
                $nombre = $row['Nombre'];
                $precio = $row['Precio'];
                $uso = $row['Uso'];
                $cantidad = $row['Cantidad'];
                $img = $row['Imagen'];
                $arr = ['id'=> $id,'nombre' => $nombre ,'precio' => $precio, 'uso'=>$uso , 'cantidad' => $cantidad, 'img'=> $img];
                array_push($items, $arr);
            }
            mysqli_free_result($resultado);
            return json_encode($items,true);
        }
    }



}