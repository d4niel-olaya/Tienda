<?php

class Routes{
    public function __construct(){
        $url = $_GET['url'];
        $url = rtrim($url, '/');
        $url = explode('/', $url);
        $this -> url = $url;
        $this -> SetRoute();
        
    }
    public function SetRoute(){
        $state = $this -> Valid();
        if($state){
            require_once 'views/productos.php';
        }
    }
    private function Valid(){
        if($this -> url[0] == 'productos'){
            return true;
        }
        else{
            return false;
        }
    }
}