<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    //return view('welcome');
    //abort(404);
    return redirect('/admin');
});

$router->group(['prefix' => 'test'], function () use ($router) {
    $router->get('upload', 'Tests\UploadController@form');
    $router->post('upload', 'Tests\UploadController@post');
});