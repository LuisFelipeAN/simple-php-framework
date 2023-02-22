<?php

namespace App\Adapters;
use App\Facades\Route;
use App\Http\Kernel;
abstract class RouteEntry
{
    public abstract function middleware($middlewares);
}