<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CeckGlobal
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(!$request->has("token")){
            return response()->json(["message"=>"api token is required"]);
        }elseif($request->token !== "gbl"){
            return response()->json(["message"=>"api token is invalid"]);
        }
        return $next($request);
    }
}
