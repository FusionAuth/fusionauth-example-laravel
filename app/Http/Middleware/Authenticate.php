<?php

namespace App\Http\Middleware;

use Illuminate\Auth\AuthenticationException;

class Authenticate
{
    public function handle($request, \Closure $next)
    {
        $this->authenticate($request);

        return $next($request);
    }

    protected function authenticate($request)
    {
        $user = session()->get('user');

        if (!$user) {
            throw new AuthenticationException('You must login to access this page.', [], '/');
        }
    }
}
