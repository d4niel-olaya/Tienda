<?php

class Request{
    public function __construct($collecion, $method = 'GET'){
        $this -> url = 'http://localhost/tienda/api/';
        $this -> colleccion = $collecion;
    }

    public function getAll($id=null){
        $this -> opciones =  array(
            "http" => array(
                "header" => "Content-Type: text",
                "method" => $method, # Agregar el contenido definido antes
            ),
        );
        $contexto = stream_context_create($this -> opciones);
        $resultado = file_get_contents($this->url.$this -> colleccion, false, $contexto);
        if(isset($id)){
            $resultado = file_get_contents($this->url.$this -> colleccion.'/'.$id, false, $contexto);
        }
        if ($resultado === false) {
            return false;
            exit;
        }
        
        # si no salimos allá arriba, todo va bien
        return $resultado;
    }

    public function Insert($datos){
        $this -> opciones =  array(
            "http" => array(
                "header" => "Content-Type: text",
                "method" => $method, 
                "content" => $datos# Agregar el contenido definido antes
            ),
        );
        $contexto = stream_context_create($this -> opciones);
        $resultado = file_get_contents($this->url.$this -> colleccion, false, $contexto);
        if(isset($id)){
            $resultado = file_get_contents($this->url.$this -> colleccion.'/'.$id, false, $contexto);
        }
        if ($resultado === false) {
            return false;
            exit;
        }
    }
}

?>