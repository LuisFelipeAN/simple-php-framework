<?php

$this->get('/', function(){
    echo 'home';
});

$this->get('/home', function(){
    echo 'Estou na home';
});

$this->get('/about/test', function(){
    echo 'Estou no teste';
});
