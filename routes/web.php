<?php

//use Illuminate\Support\Str;

$router->get('/', function () use ($router) {
    //return Str::random(32);
    return  $router->app->version();
});

$router->get('artikel/get', 'ArtikelController@get');
