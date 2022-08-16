<?php

class Route{
    public function __construct(){
        $url = $_GET['url'];
        $url = rtrim($url, '/');
        $url = explode('/', $url);
        $this -> url = $url;
        $this -> SetRoute();
        // $this -> SetNormarRoute();
    }

    private function ValidUrlApi(){
        if($this -> url[0] == 'api'){
            return true;
        }
        else{
            return false;
        }
    }

    private function ValidUrl(){
        if($this -> url[0] == 'productos' || $this -> url[0] == 'ventas' || $this -> url[0] == 'api'){
            return true;
        }else{
            return false;
        }
    }
    public function SetRoute(){
        $state = $this -> ValidUrl();
        if($state){
            if($this -> url[0] == 'api'){
                $controller = $this -> url[1];
                $file = 'controllers/'.$controller.'.php';
                if(file_exists($file)){
                    require_once $file;
                    $instance = new $controller;
                    if($_SERVER['REQUEST_METHOD'] == 'GET'){
                        if(isset($this-> url[2]) == false){
                            echo '<pre>';
                            print_r($instance -> get());
                            echo '</pre>';
                            // var_dump($_SERVER['REQUEST_METHOD']);
                        }
                        else{
                            print_r($instance->get($this->url[2]));
                        }
                    }
                }
            }
            if($this -> url[0] == 'productos'){
                require_once 'views/productos.php';
            }
            if($this -> url[0] == 'ventas'){
                require_once 'views/ventas.php';
            }
        }
    }
    // public function SetNormarRoute(){
    //     $state = $this -> ValidUrl();
    //     if($state){
    //         echo 'Ruta correcta';
    //     }
    //     else{
    //         echo 'Esta en una ruta equivocada';
    //     }
    // }
}
