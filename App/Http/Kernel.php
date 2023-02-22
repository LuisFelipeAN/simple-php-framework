<?php
namespace App\Http;
use App\Http\Middlewares\TesteMiddleware;
use App\Http\Middlewares\TesteMiddleware2;

class Kernel
{
    private static $routeMiddlewares = [
        'teste' => TesteMiddleware::class,
        'teste2' => TesteMiddleware2::class,
    ];

    public static function makeMiddleware($middleware)
    {
        return new self::$routeMiddlewares[$middleware];
    }
}