<?php

class RouterApi{
    public function __construct(){
        $url = $_GET['url'];
        $url = rtrim($url, '/');
        $url = explode('/', $url);
        $this -> url = $url;
        $this -> SetRoute();
        // $this -> SetNormalRoute();
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
        if($this -> url[0] == 'productos' || $this -> url[0] == 'ventas'){
            return true;
        }else{
            return false;
        }
    }
    public function SetRoute(){
        $state = $this -> ValidUrl();
        if($state){
            header("Content-Type: application/json");
            $controller = $this -> url[0];
            $file = 'controllers/'.$controller.'.php';
            if(file_exists($file)){
                require_once $file;
                $instance = new $controller;
                // $obj = json_decode
                switch($_SERVER['REQUEST_METHOD']){
                    case 'GET':
                        if(isset($this-> url[1]) == false){
                        
                            print_r($instance -> get());
                        }
                        else{
                            print_r($instance->get($this->url[1]));
                        }
                }
            }
        }
    }
    public function SetNormalRoute(){
        $state = $this -> ValidUrl();
        if($state){
            
        }
        else{
            echo 'Esta en una ruta equivocada';
        }
    }
}
