<?php

namespace App\Http\Middleware;

use Closure;

class IsSv
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
        if( !empty(auth()->user()->role) &&  auth()->user()->role=='admin' || auth()->user()->role=='sv' ){
            return $next($request);

        }
        elseif(auth()->user()->role=='gestionnaire')
        {
            return redirect()->route('go.menu',['projet_id'=>auth()->user()->projet_id])->with('error','Vous n\'êtes pas autorisé');
        }
        return redirect()->back()->withErrors(['error' => "Vous n'avez l'autorisation d'acceder à cette page"]);

    }
}
