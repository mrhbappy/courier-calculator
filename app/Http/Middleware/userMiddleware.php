<?php

namespace App\Http\Middleware;
use Auth;
use App\Models\User;
use Closure;
use Illuminate\Http\Request;

class userMiddleware
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
         if(Auth::check() && Auth::user()->is_active == '1' && Auth::user()->role == '3'){
            return $next($request);
        }
        else{
            return redirect()->back();
        }
    }
}
