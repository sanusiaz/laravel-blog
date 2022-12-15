<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        // validate request
        $this->validate($request, [
            'email' => ['required', 'max:255', 'email'],
            'password' => ['required', 'max:255']
        ]); 

        $user = User::where('email', $request->email)->first();
        if ( $user !== null )
        {
            if ( Hash::check($request->password, $user->password) )
            {
                auth()->attempt($request->only('email', 'password'));
                return redirect('/blog');
            }
        }

        return back()->with('error', 'Invalid Credentials');
    }

    public function register()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        dd($request);
    }
}
