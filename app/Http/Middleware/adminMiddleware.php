<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;

class adminMiddleware
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
        if(Auth::check() && Auth::user()->is_active == '1' && Auth::user()->role == 'Admin'){
            return $next($request);
        }
        else{
            return redirect()->back();
        }




    }
}
