<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Arr;
use App\Services\AuthorizationService as Service;
use Symfony\Component\HttpKernel\Exception\HttpException;


class Authorization {

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next) {
        
        
        [, $current, ] = $request->route();
        
        if(Service::newInstance()->hasPermission(Arr::get($current, '_resource', ''), Arr::get($current, '_action', ''), auth()->user()->getAuthIdentifier()) === false) {
            
            throw new HttpException(403, 'Forbidden');
        }
        
        return $next($request);
    }
}
