<?php

namespace App\Http\Middleware;

use Illuminate\Auth\AuthenticationException;

class Authenticate
{
  public function handle($request, \Closure $next)
  {
    $user = session()->get('user');

    if (!$user) {
      throw new AuthenticationException('You must login to access this page.', [], '/');
    }

    return $next($request);
  }
}