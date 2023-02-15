<?php
require '../vendor/autoload.php';
require '../App/Functions/functions.php';

use App\Controllers\TesteController;

$controller = new TesteController();
(new \App\Core\RouterCore());
dd($controller->seta());