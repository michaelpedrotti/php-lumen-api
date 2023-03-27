<?php

use Illuminate\Support\Facades\Route;
use Laravel\Lumen\Routing\Router;

/**
 * Replace Illuminate\Routing\Router::resource()
 * 
 * GET        /photos               index       photos.index
 * GET	      /photos/create        create      photos.create
 * POST	      /photos	            store       photos.store
 * GET	      /photos/{photo}       show        photos.show
 * GET	      /photos/{photo}/edit  edit        photos.edit
 * PUT/PATCH  /photos/{photo}       update      photos.update
 * DELETE     /photos/{photo}       destroy     photos.destroy
 * 
 * @link https://laravel.com/docs/10.x/controllers#resource-controllers
 * 
 */
if(!function_exists('route_resource')){
    
    function route_resource(string $resource = '', string $controller  = 'UserController'): void {
        
        $attributes = [
            'prefix' => '/' . $resource, 
            'middleware' => ['is_authenticated', 'is_authorized']
        ];
        
         
        Route::group($attributes, function(Router $router) use($resource, $controller) {
 
            $concat = ['_resource' => $resource];
            
            $router->get('/', [
                'uses' => $controller .'@index', 
                'as' => $resource.'.index', 
                ...$concat, 
                '_action' => 'read'
            ])
            ->get('/new', [
                'uses' => $controller .'@create', 
                'as' => $resource.'.create',
                ...$concat, 
                '_action' => 'create'
            ])
            ->post('/', [
                'uses' => $controller .'@store', 
                'as' => $resource.'.store',
                ...$concat, 
                '_action' => 'create'
            ])
            ->get('/{id:[\d]+}', [
                'uses' => $controller .'@show', 
                'as' => $resource.'.show',
                ...$concat, 
                '_action' => 'read'
            ])
            ->get('/{id:[\d]+}/edit', [
                'uses' => $controller .'@edit', 
                'as' => $resource.'.edit',
                ...$concat,
                '_action' => 'update'
            ])
            ->put('/{id:[\d]+}', [
                'uses' => $controller .'@update', 
                'as' => $resource.'.update',
                ...$concat, 
                '_action' => 'update'
            ])
            ->delete('/{id:[\d]+}', [
                'uses' => $controller .'@destroy', 
                'as' => $resource.'.destroy',
                ...$concat, 
                '_action' => 'delete'
            ]);
        });
    }
}