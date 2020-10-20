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

// Kelas
$router->get('/kelas', 'KelasController@index');
$router->get('/kelas/{id}', 'KelasController@show');

// Judul
$router->get('/judul/page/{page}', 'JudulController@index');
$router->get('/judul/{id}', 'JudulController@show');

// Instruktur
$router->get('/instruktur/page/{page}', 'InstrukturController@index');
$router->get('/instruktur/{id}', 'InstrukturController@show');

// Materi
$router->get('/materi/page/{page}', 'MateriController@index');
$router->get('/materi/{id}', 'MateriController@show');

