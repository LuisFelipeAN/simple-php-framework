<?php
namespace App\Core;

use App\Facades\Request;
use App\Facades\Route;
class RouterCore{
    private $uri;
    private $method;
    public function __construct(){
        $this->initialize();
        $this->execute();
    }

    private function initialize(){
        $this->method = $_SERVER['REQUEST_METHOD'];
        $uri =  $_SERVER['REQUEST_URI'];
        $params = explode('/',$uri);
        $this->uri = implode('/',$this->normalizeURI($params));
    }

    private function execute(){
        foreach(Route::getRoutes() as $route){
            if($route->getMethod() == $this->method && $route->getUri() == $this->uri){
                return $route->execute(new Request());
            }
        }
    }

    private function normalizeURI($arr){
        return array_values(array_filter($arr));
    }
}
