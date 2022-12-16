<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LogoutController extends Controller
{
    public function logout()
    {
        if ( auth()->user() !== null )
        {
            auth()->logout();
        }

        return redirect()->route('auth.index')->with('error', 'You have been logged out');
    }
}
