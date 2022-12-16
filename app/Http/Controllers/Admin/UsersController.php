<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\StoreUserRequest;

class UsersController extends Controller
{
    public function __construct()
    {   
        $this->middleware(['auth']);
    }


    public function index()
    {
        return view('admin.users', [
            'users' => User::orderBy('id', 'desc')->paginate(20)
        ]);
    }

    public function destroy( $id)
    {
        User::where('id', $id)->delete();

        return back()->with('error', 'User has been deleted successfully');
    }

    public function create()
    {
        return view('admin.users.create', [
            'user' => new User
        ]);
    }

    public function store(StoreUserRequest $request)
    {
        User::create([
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'name' => $request->name
        ]);


        return redirect()->route('admin.users')->with('success', $request->name . ' Has Been Created Successfully');
    }
}
