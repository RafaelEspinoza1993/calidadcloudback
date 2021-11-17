<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckHeader
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
        
        if($request->header("x-ccloud-auth") !== "prueba"){
            return response()->json(['message' => 'Unauthorized action.', 'status' => 403]);
        }else{
            return $next($request);
        }
        
    }
}
