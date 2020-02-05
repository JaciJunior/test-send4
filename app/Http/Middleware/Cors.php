<?php

namespace App\Http\Middleware;

use Closure;

class Cors
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
//        header("Access-Control-Allow-Origin: *");
//        return $next($request)
//            ->header('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS, HEAD')
//            ->header('Access-Control-Allow-Headers', 'api_key, Authorization,Origin, X-Requested-With, Content-Type, Accept');
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET, POST, PATCH, PUT, DELETE, OPTIONS');
        header('Access-Control-Allow-Headers: Content-Type, Accept, Authorization, X-Requested-With, Application, api_key');
        return $next($request);
    }
}
