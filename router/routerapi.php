<?php

class Route{
    public function __construct(){
        $url = $_GET['url'];
        $url = rtrim($url, '/');
        $url = explode('/', $url);
        $this -> url = $url;
        $this -> SetRoute();
    }

    private function ValidUrl(){
        if($this -> url[0] == 'api'){
            return true;
        }
        else{
            return false;
        }
    }

    public function SetRoute(){
        $state = $this -> ValidUrl();
        if($state){
            if(empty($this-> url[1])){
                echo 'Esta en al vista main';
            }
            else{
                $controller = $this -> url[1];
                $file = 'controllers/'.$controller.'.php';
                if(file_exists($file)){
                    require_once $file;
                    $instance = new $controller;
                    if(isset($this-> url[2]) == false){
                        print_r($instance -> get());
                    }
                    else{
                        print_r($instance->get($this->url[2]));
                    }
                }
            }
        }
        else{
            echo 'NO hay nada';
        }
    }
}
