<?php

namespace App\Adapters;
use App\Facades\Route;
use App\Http\Kernel;
class RouteAdapter extends RouteEntry
{
    private Route $route;

    public function __construct(Route $route){
        $this->route = $route;
    }

    public function name($value){
        $this->route->setName($value);
        return $this;
    }

    public function middleware($middlewares){
        foreach($middlewares as $middleware){
            $this->route->addMiddleware(Kernel::makeMiddleware($middleware));
        }
        return $this;
    }

}