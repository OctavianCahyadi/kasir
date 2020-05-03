<?php

namespace App\Http\Middleware;

use Closure;

class IsKasir
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
        if(auth()->user()->role == 2){
            return $next($request);
        }       
   
        return redirect('/home')->with('session',"You don't have admin access.");
    }
}
