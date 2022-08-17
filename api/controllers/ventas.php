<?php


class Ventas{
    private $conexion;
    private $consulta;
    public function __construct(){
        $this -> conexion = Database::Connect();
        $this -> consultaById = 'SELECT * FROM vista_product_ventas WHERE Id =';
        $this -> consulta = 'SELECT * FROM vista_product_ventas';
    }
    public function get($idventa = null){
        $items = [];
        $tipoConsulta = $this -> consulta;
        if(isset($idventa)){
            $tipoConsulta = $this -> consultaById . $idventa;
        }
        if($resultado = mysqli_query($this -> conexion, $tipoConsulta)){
            while($row = mysqli_fetch_assoc($resultado)){
                $id = $row['Id'];
                $nombre = $row['Producto'];
                $fecha = $row['Fecha de compra'];
                $total = $row['Total'];
                $arr = ['id'=> $id,'producto' => $nombre ,'fecha' => $fecha, 'total'=>$total];
                array_push($items, $arr);
            }
        }
        mysqli_free_result($resultado);
        return json_encode($items);
    }
}