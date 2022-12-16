<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UsersController extends Controller
{
    public function __construct()
    {   
        $this->middleware(['auth']);
    }


    public function index()
    {
        return view('admin.users', [
            'users' => User::paginate(20)
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
}
