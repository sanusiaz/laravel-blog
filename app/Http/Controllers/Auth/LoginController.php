<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\AuthRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\StoreUserRequest;
use Illuminate\Support\Str;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function login(AuthRequest $request)
    {

        $user = User::where('email', $request->email)->first();
        if ( $user !== null )
        {
            if ( Hash::check($request->password, $user->password) )
            {
                auth()->attempt([
                    $request->only('email', 'password')
                ], $request->remember_me);
                dd('users is logged in now');
                return redirect('/blog');
            }
        }

        return back()->with('error', 'Invalid Credentials');
    }

    public function register()
    {
        return view('auth.register');
    }

    public function store(StoreUserRequest $request)
    {
        User::create([
            'name'      => $request->name,
            'email'     => $request->email,
            'password'  => Hash::make($request->password),
            'vkey'      => Str::random(20)
        ]);

        return back()->with('success', 'Account has been registered sucessfully');
    }

    public function forget_password()
    {
        return view('auth.forget_password');
    }


    public function change_password( Request $request )
    {
        dd($request);
    }
}
