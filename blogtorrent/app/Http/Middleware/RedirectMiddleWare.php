<?php

namespace App\Http\Middleware;

use Closure;

class RedirectMiddleWare
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
        $value = $request->cookie('isRegister');
        
        if(empty($value)){
            return redirect('/redirect/404');
        }
        else{
            return $next($request);
        }
    }
}
