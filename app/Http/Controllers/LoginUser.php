<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginUser extends Controller
{
  private $authClient;

  public function __construct(FusionAuthClient $authClient)
  {
    $this->authClient = $authClient;
  }

  public function __invoke(Request $request)
  {
    $clientRequest = [
      'applicationId' => env('FUSIONAUTH_APP_ID'),
      'ipAddress' => $request->ip(),
      'loginId' => $request->get('email'),
      'password' => $request->get('password'),
    ];

    $clientResponse = $this->authClient->login($clientRequest);

    if (!$clientResponse->wasSuccessful()) {
      return redirect()->back();
    }

    session(['user' => (array) $clientResponse->successResponse->user]);
    return redirect('profile');
  }
}