<?php

namespace App\Facades;

class Request
{
    private static $request;

    private $uri;
    private $method;

    private $test = '';

    public function getTest()
    {
        return $this->test;
    }
    public function setTest($value)
    {
        return $this->test = $value;
    }

    public function __construct(){
        $this->method = $_SERVER['REQUEST_METHOD'];
        $this->uri =  $_SERVER['REQUEST_URI'];
    }   
}