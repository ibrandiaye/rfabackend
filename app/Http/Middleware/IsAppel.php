<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class IsAppel
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
         if(  auth()->user()->role=='admin' || auth()->user()->role=='appel' ){
            return $next($request);

        }
        return redirect()->back()->withErrors( ['error' => "Vous n'avez l'autorisation d'acceder à cette page"]);
    }
}
