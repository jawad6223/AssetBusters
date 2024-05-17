<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class clientmiddleware
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
        if(auth()->check()){
            if(auth()->user()->user_role == 3  && auth()->user()->status == 1){
                return $next($request);
            }
            else{
                return redirect('/');
            }
        }
        else{
            return redirect('/');
        }
    }
}
