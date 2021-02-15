<?php

use \Illuminate\Http\Request;
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

$router->group(['namespace' => 'V1', 'prefix' => 'categories'], function () use ($router) {
    $router->get('/', 'CategoryController@index');
    $router->get('/{id}', 'CategoryController@detail');
    $router->post('/', 'CategoryController@create');
    $router->put('/{id}', 'CategoryController@update');
    $router->delete('/{id}', 'CategoryController@delete');

    $router->get('/{category_id}/books/', 'BookController@showBookCat');
    $router->get('/{category_id}/books/{id}', 'BookController@showIdCat');
    $router->post('/{category_id}/books/', 'BookController@create');
    $router->put('/{category_id}/books/{id}', 'BookController@update');
});

$router->group(['namespace' => 'V1', 'prefix' => 'books'], function () use ($router) {

    $router->get('/{id}', 'BookController@showId');
    $router->get('/', 'BookController@index');
    // $router->post('/{category_id}', 'BookController@create');
    $router->delete('/{id}', 'BookController@delete');
});


$router->group(['namespace' => 'V1', 'prefix' => 'user'], function () use ($router) {
    $router->post('/auth', 'AuthController@auth');
    $router->post('/register', 'UserController@register');
    $router->put('/update/{id}', 'UserController@update');
    $router->delete('/delete/{id}', 'UserController@delete');
});

// $router->get('/login', function (Request $request) {
//     $token = app('auth')->attempt($request->only('email', 'password'));

//     return response()->json(compact('token'));
// });
// $router->group([

//     'middleware' => 'api',
//     'prefix' => 'auth'

// ], function ($router) {

//     $router->post('login', 'AuthController@login');
//     $router->post('logout', 'AuthController@logout');
//     $router->post('refresh', 'AuthController@refresh');
//     $router->post('me', 'AuthController@me');
// });
