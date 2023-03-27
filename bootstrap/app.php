<?php

require_once __DIR__.'/../vendor/autoload.php';

(new Laravel\Lumen\Bootstrap\LoadEnvironmentVariables(dirname(__DIR__)))->bootstrap();

date_default_timezone_set(env('APP_TIMEZONE', 'UTC'));

//--------------------------------------------------------------------------
// Create The Application
//--------------------------------------------------------------------------
$app = new Laravel\Lumen\Application( dirname(__DIR__) );

$app->withFacades();
$app->withEloquent();
//--------------------------------------------------------------------------
// Register Container Bindings
//--------------------------------------------------------------------------
$app->singleton(Illuminate\Contracts\Debug\ExceptionHandler::class, App\Exceptions\Handler::class);

$app->singleton(Illuminate\Contracts\Console\Kernel::class, App\Console\Kernel::class);

//--------------------------------------------------------------------------
// Register Config Files
//--------------------------------------------------------------------------
$app->configure('database');
$app->configure('jwt');
$app->configure('app');

//--------------------------------------------------------------------------
// Register Middleware
//--------------------------------------------------------------------------
 $app->routeMiddleware([
     'is_authenticated' => App\Http\Middleware\Authentication::class,
     'is_authorized' => App\Http\Middleware\Authorization::class,
 ]);

//--------------------------------------------------------------------------
// Register Service Providers
//--------------------------------------------------------------------------
$app->register(App\Providers\AuthServiceProvider::class);
$app->register(Tymon\JWTAuth\Providers\LumenServiceProvider::class);

//--------------------------------------------------------------------------
// Load The Application Routes
//--------------------------------------------------------------------------

$app->router->group(['namespace' => 'App\Http\Controllers'], function($router) {
    
    require __DIR__.'/../routes/api.php';
});

return $app;
