<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(Auth()->user()){
            if(Auth()->user()->IsAdmin){
                return $next($request);
            }
        }

        session()->flash('invalido','Você não tem permissão para essa página!');
        return redirect()->back();


    }
}
