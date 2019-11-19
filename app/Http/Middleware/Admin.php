<?php

namespace App\Http\Middleware;
use App\Helpers\Token;
use Firebase\JWT\JWT;

use Closure;

class Admin
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
        $token = $request->header('Authorization');
        
        return $next($request);
    }
}
