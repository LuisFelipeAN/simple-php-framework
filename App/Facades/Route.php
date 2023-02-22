<?php
namespace App\Facades;
use App\Adapters\GroupAdapter;
use App\Adapters\RouteAdapter;
use App\Facades\Middleware;

class Route{
    private $uri;
    private $callback;
    private $routeName;
    private $method;
    private $middlewares = [];

    private $request;


    private function __construct($method,$uri, $callback){
        $uri = substr($uri, 1);
        if(substr($uri,-1) == '/'){
            $uri = substr($uri,0,-1);
        }
        $this->uri = $uri;
        $this->callback = $callback;
        $this->method = $method;
    }

    public function execute($request = null){
        $this->setRequest($request);
        for($i = sizeof($this->middlewares) - 1; $i>=0 ; $i--){
            $this->middlewares[$i]->handle($this->getRequest(), fn($request) => $this->setRequest($request),[]);
        }
        echo $this->getRequest()->getTest();
        $callback = $this->callback;
        return  $callback();
    }

    public function getUri(){
        return $this->uri;
    }

    public function setName($value){
        $this->routeName = $value;
    }
    public function getName(){
        return $this->routeName;
    }

    public function getMethod(){
        return $this->method;
    }

    private function getRequest(){
        return $this->request;
    }
    private function setRequest(Request $request){
        return $this->request = $request;
    }

    public function addMiddleware(Middleware $middleware){
        $this->middlewares[] = $middleware;
    }

    private static $routes = [];

    private static function addRoute($method, $uri, $call){
        $route =  new Route($method, $uri, $call);
        self::$routes[] = $route;
        $route_adapter = new RouteAdapter($route);
        if(isset(self::$group)){
            self::$group->addRoute($route_adapter);
        }
        return $route_adapter;
    }

    public static function getRoutes(){
       return self::$routes;
    }

    public static function get($uri, $call){
        return self::addRoute('GET', $uri, $call);
    }

    private static $group;
    public static function group($callback){
        $parent = self::$group;
        $group = new GroupAdapter($parent);
        self::$group = $group;
        $callback();
        self::$group = $parent;
        return $group;
    }
}