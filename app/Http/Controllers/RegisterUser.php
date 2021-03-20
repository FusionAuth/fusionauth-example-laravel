<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegisterUser extends Controller
{
  private $authClient;

  public function __construct(FusionAuthClient $authClient)
  {
    $this->authClient = $authClient;
  }

  public function __invoke(Request $request)
  {
    $clientRequest = [
      'registration' => ['applicationId' => env('FUSIONAUTH_APP_ID')],
      'sendSetPasswordEmail' => false,
      'user' => [
        'password' => $request->get('password'),
        'email' => $request->get('email'),
        'passwordChangeRequired' => false,
        'twoFactorEnabled' => false,
      ],
    ];

    $clientResponse = $this->authClient->register(null, $clientRequest);

    if (!$clientResponse->wasSuccessful()) {
      return redirect()->back();
    }

    return redirect('/');
  }
}
