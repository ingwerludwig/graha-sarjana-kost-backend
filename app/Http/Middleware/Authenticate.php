<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    public function handle($request, Closure $next, ...$guards)
    {
        if(Auth::guest())
        {
            return response()->json([
                'success' => false,
                'message' => ['Unauthenticated']
            ], 401);
        }

        if(empty($request->bearerToken()))
        {
            return response()->json([
                'success' => false,
                'message' => ['Unauthenticated']
                ], 401);
        }

        if(!Auth::check())
        {
            return response()->json([
                'success' => false,
                'message' => ['Unauthenticated']
                ], 401);
        }
        
        return parent::handle($request, $next, ...$guards);
    }
}
