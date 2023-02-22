<?php
namespace App\Http\Middlewares;

use App\Facades\Middleware;
class TesteMiddleware extends Middleware
{
    function handle($request, $next, ...$guards){
        echo "TesteMiddleware";
        $request->setTest("TesteMiddleware");
        $next($request);
    }
}