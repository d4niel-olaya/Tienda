<?php

class Request{
    public function __construct($collecion, $id=null){
        $this -> url = 'http://localhost/tienda/api/';
        $this -> colleccion = $collecion;
        $this -> id = $id;
        $this -> opciones =  array(
            "http" => array(
                "header" => "Content-type: application/x-www-form-urlencoded\r\n",
                "method" => "GET" # Agregar el contenido definido antes
            ),
        );
    }

    public function getResult(){
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