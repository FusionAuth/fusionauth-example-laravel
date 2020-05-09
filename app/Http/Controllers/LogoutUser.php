<?php

namespace App\Http\Controllers;

class LogoutUser extends Controller
{
    public function __invoke()
    {
        session()->flush();
        session()->flash('You have been logged out.');

        return redirect('/');
    }
}
