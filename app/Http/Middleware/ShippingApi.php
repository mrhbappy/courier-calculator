<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\User;

class ShippingApi
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
       $headers = getallheaders();
       if(array_key_exists("Authorization",$headers)){
           $token = explode(" ",$headers["Authorization"])[1];
           $result =  User::where("token", $token)->first();
           if($result){
                return $next($request);
           }
           return response()->json(["message" =>"API Key Not Found","status" => 400]);
       }
       return response()->json(["message" =>"Bad Request","status" => 400]);

    }
}
