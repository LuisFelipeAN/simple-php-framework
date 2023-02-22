<?php
use App\Facades\Route;
function dd($params = [], $die = true){
    echo '<pre>';
    print_r($params);
    echo '</pre>';
    if($die) die();
}

function route($name, $params = []){
    foreach(Route::getRoutes() as $route){
        if($route ->getName() == $name){
            return $route->getUri();
        }
    }
}