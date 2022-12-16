<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index() 
    {
        $posts = Post::orderBy('id', 'desc')->limit(30)->paginate(10);
        return view('admin.index', [
            'posts' => $posts,
            'users' => User::paginate(10)
        ]);
    }
}
