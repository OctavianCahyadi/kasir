<?php

namespace App\Http\Middleware;

use Closure;

class IsAdmin
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
        if(auth()->user()->role == 1){
            return $next($request);
        }
        if(auth()->user()->role == 2){
            return redirect('/dashboard-kasir');
        }    
   
        return redirect('/home')->with("session","You don't have admin access.");
    }
}
