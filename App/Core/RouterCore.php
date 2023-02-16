<?php
namespace App\Core;
class RouterCore{
    private $uri;
    private $method;
    private $getArr = [];
    public function __construct(){
        $this->initialize();
        require_once __DIR__.'/../../routes/router.php';
        $this->execute();
    }

    private function initialize(){
        $this->method = $_SERVER['REQUEST_METHOD'];
        $uri =  $_SERVER['REQUEST_URI'];
        $params = explode('/',$uri);
        $this->uri = implode('/',$this->normalizeURI($params));
    }

    private function get($router, $call){
        $this->getArr[] = [
            'router' => $router,
            'call' => $call,
        ];
    }

    private function execute(){
        switch($this->method){
            case 'GET':
                $this->executeGet();
                break;
            case 'POST':

                break;
        }
    }

    private function executeGet(){
        foreach($this->getArr as $get){
            $router = substr($get['router'], 1);
            if(substr($router,-1) == '/'){
                $router = substr($router,0,-1);
            }
            if($router == $this->uri){
                if(is_callable($get['call'])){
                    $get['call']();
                    break;
                }
            }
        }
    }
    private function normalizeURI($arr){
        return array_values(array_filter($arr));
    }
}
