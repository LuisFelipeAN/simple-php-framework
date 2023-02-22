<?php
namespace App\Http\Middlewares;

use App\Facades\Middleware;
class TesteMiddleware2 extends Middleware
{
    function handle($request, $next, ...$guards){
        echo "TesteMiddleware2";
        $request->setTest(" RequestChangedByTesteMiddleware2 ");
        $next($request);
    }
}