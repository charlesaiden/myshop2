<?php

namespace App\Http\Middleware;

use Closure;

class Level
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
         if(session('level') == 0)
        {
            return $next($request);
           
        }
             return redirect('welcome');
        
    }
}
