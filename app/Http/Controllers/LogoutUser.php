<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use FusionAuth\FusionAuthClient;

class LogoutUser extends Controller
{
  private $authClient;

  public function __construct(FusionAuthClient $authClient)
  {
    $this->authClient = $authClient;
  }

  public function __invoke()
  {
    $this->authClient->logout(false);
    session()->flush();

    return redirect('/');
  }
}