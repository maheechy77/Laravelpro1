<?php

namespace App\Http\Middleware;

use Closure;

class firstMiddleware
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
        if($request->login>=1){
            return redirect('welcome');
        }
        return $next($request);
    }
}
