<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;


class sellermiddleware
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
            if(auth()->user()->user_role == 2  && auth()->user()->status == 1){
                return $next($request);
            }
            else{
                return redirect('seller/login');
            }
        }
        else{
            return redirect('seller/login');
        }
    }
}

