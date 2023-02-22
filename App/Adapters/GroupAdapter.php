<?php
namespace App\Adapters;
use App\Facades\Middleware;
use App\Http\Kernel;

class GroupAdapter extends RouteEntry
{
    private $parent;
    
    private $routeAdapters = [];
    
    public function __construct($parent){
        $this->parent = $parent;
    }

    public function addRoute(RouteAdapter $route){
       $this->routeAdapters[] = $route;
       if(isset($this->parent)){
            $this->parent->addRoute($route);
       }    
    }
    public function middleware($middlewares){
        foreach($this->routeAdapters as $routeAdapter){
            $routeAdapter->middleware($middlewares);     
        }
    }
}