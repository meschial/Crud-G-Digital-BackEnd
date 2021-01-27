<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return 'Primeira API REST com Lumen...' . $router->app->version();
});

//ROTAS PARA MARCAS
$router->group(['prefix' => 'marcas'], function() use($router){
    $router->get('/', 'MarcasController@index');
    $router->get('/show', 'MarcasController@show');
    $router->get('/all/{id}', 'MarcasController@all');
    $router->get('/teste', 'MarcasController@teste');

    $router->post('/', 'MarcasController@store');
    $router->put('/{id}', 'MarcasController@update');
    $router->delete('/{id}', 'MarcasController@destroy');
});

//ROTAS PARA MODELOS
$router->group(['prefix' => 'modelos'], function() use($router){
    $router->get('/', 'ModelosController@index');
    $router->get('/{id}', 'ModelosController@show');

    $router->post('/', 'ModelosController@store');
    $router->put('/{id}', 'ModelosController@update');
    $router->delete('/{id}', 'ModelosController@destroy');
});