<?php

namespace App\Facades;

abstract class Middleware
{
    abstract function handle($request, $next, ...$guards);
}