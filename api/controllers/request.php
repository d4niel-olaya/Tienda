<?php

class Request{
    public function __construct($collecion){
        $this -> url = 'http://localhost/tienda/api/';
        $this -> colleccion = $collecion;
        $this -> opciones =  array(
            "http" => array(
                "header" => "Content-Type: text",
                "method" => "GET" # Agregar el contenido definido antes
            ),
        );
    }

    public function getAll(){
        $contexto = stream_context_create($this -> opciones);
        # Hacerla
        $resultado = file_get_contents($this->url.$this -> colleccion, false, $contexto);
        if ($resultado === false) {
            return false;
            exit;
        }
        
        # si no salimos allá arriba, todo va bien
        return $resultado;
    }
}

?>