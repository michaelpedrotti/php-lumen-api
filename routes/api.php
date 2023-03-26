<?php
use Illuminate\Support\Facades\Route;
use Laravel\Lumen\Routing\Router;

route_resource('profile', 'ProfileController');
route_resource('user', 'UserController');

Route::group(['prefix' => '/auth'], function(Router $router) {

    $router->post('/login', ['uses' => 'AuthController@login', 'as' => 'auth.login']);
});
