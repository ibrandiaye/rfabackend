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
        if(auth()->user()->role=='admin' ){
            return $next($request);

        }
        return redirect()->route('go.menu',['projet_id'=>auth()->user()->projet_id])->with('error','Vous n\'êtes pas autorisé');
    }
}
