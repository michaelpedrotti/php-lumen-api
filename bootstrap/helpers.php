<?php

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
    function route_resource(string $path = '', string $controller  = 'UserController'): void {

        \Illuminate\Support\Facades\Route::group(['prefix' => '/' . $path], function(\Laravel\Lumen\Routing\Router $router) use($path, $controller) {
    
            $router->get('/', ['uses' => $controller .'@index', 'as' => $path.'.index']);
            $router->get('/new', ['uses' => $controller .'@create', 'as' => $path.'.create']);
            $router->post('/', ['uses' => $controller .'@store', 'as' => $path.'.store']);
            $router->get('/{id:[\d]+}', ['uses' => $controller .'@show', 'as' => $path.'.show']);
            $router->get('/{id:[\d]+}/edit', ['uses' => $controller .'@edit', 'as' => $path.'.edit']);
            $router->put('/{id:[\d]+}', ['uses' => $controller .'@update', 'as' => $path.'.update']);
            $router->delete('/{id:[\d]+}', ['uses' => $controller .'@destroy', 'as' => $path.'.destroy']);
        });
    }
}