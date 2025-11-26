<?php

namespace App\Http\Middleware;

use Illuminate\Auth\AuthenticationException;
use Illuminate\Contracts\Auth\Factory as AuthFactory;
use Closure;

class Authenticate
{
    public function __construct(protected AuthFactory $auth) {}

    public function handle($request, Closure $next, ...$guards)
    {
        if (!$this->auth->guard()->check()) {
            throw new AuthenticationException('Unauthenticated.', $guards);
        }

        return $next($request);
    }
}
