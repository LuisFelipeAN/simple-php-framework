<?php
use App\Facades\Route;
Route::group(function(){
    Route::get('/', function(){
        echo 'home';
    });
    
    Route::get('/home', function(){
        echo 'Estou na home';
    });
    
    Route::get('/about/test', function(){
        echo 'Estou no teste';
    })->name('teste')
      ->middleware(['teste2']);
})
->middleware(['teste']);
