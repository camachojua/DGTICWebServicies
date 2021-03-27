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
    return $router->app->version();
});

$router->get('/hello/world',  function () {return "¡Saludos de a la banda!";});

// Enrutadores de los web services
// List
$router->get('/projectmanagers','ProjectManagersController@index');
// Read
$router->get('/projectmanagers/{id:[\d]+}','ProjectManagersController@read');
// Create
$router->post('/projectmanagers', 'ProjectManagersController@create');
// $router->post('/projectmanagers', ['as' => 'projectmanagers.read',
//                                    'uses' => 'ProjectManagersController@create']);
// Update
$router->put('/projectmanagers', 'ProjectManagersController@update');
// Delete
$router->delete('/projectmanagers/{id:[\d]+}', 'ProjectManagersController@delete');

///////////////////////
// Inicia practica 2 //
///////////////////////
$router->get('/projects', 'ProjectsController@index');
$router->get('/projects/{id:[\d]+}', 'ProjectsController@read');
$router->post('/projects', 'ProjectsController@create');
$router->put('/projects', 'ProjectsController@update');
$router->delete('/projects/{id:[\d]+}', 'ProjectsController@delete');
