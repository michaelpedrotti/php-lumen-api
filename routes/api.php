<?php
use Illuminate\Support\Facades\Route;
use Laravel\Lumen\Routing\Router;

route_resource('profile', 'ProfileController');
route_resource('user', 'UserController');

// /profile/[id]/permission
Route::group(['prefix' => '/profile/{profile_id:[\d]+}'], function(Router $router){
    
    route_resource('permission', 'PermissionController');
});

Route::group(['prefix' => '/auth'], function(Router $router) {

    $router->post('/login', ['uses' => 'AuthController@login', 'as' => 'auth.login']);
});