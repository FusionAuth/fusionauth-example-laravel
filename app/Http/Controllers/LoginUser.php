<?php

namespace App\Http\Controllers;

use FusionAuth\FusionAuthClient;
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
            session()->flash('error-message', json_encode($clientResponse->errorResponse));

            return redirect()->back();
        }

        session()->flash('success-message', 'Welcome to our application.');
        session(['user' => (array) $clientResponse->successResponse->user]);

        return redirect('profile');
    }
}
