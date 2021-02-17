<?php

namespace App\Http\Middleware;

use Closure;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Contracts\Auth\Factory as Auth;

class AuthRoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    protected $auth;

    public function __construct(Auth $auth)
    {
        $this->auth = $auth;
    }


    public function handle($request, Closure $next, $guard = null)
    {
        if ($this->auth->guard($guard)->guest()) {
            # code...
            return response('Unauthorized.', 401);
        }
        $role = auth()->user()->role;
        if ($role != "Admin") {
            # code...
            return response('Unauthorized.', 401);
        }
        return $next($request);
    }
}
