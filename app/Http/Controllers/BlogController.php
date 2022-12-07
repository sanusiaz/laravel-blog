<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BlogController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy('updated_at', 'desc')->paginate(20);

        // dd(Post::chunk(1000, function ($posts){
        //     foreach( $posts as $post )
        //     {
        //         echo $post->title . '<br>';
        //     }
        // }));

        return view('blog.index', [
            'posts' => $posts
        ]);
    }


    public function show(Post $post)
    {
        
        $nextBlog = Post::where('id', $post->id+1)->value('id');
        $prevBlog = Post::where('id', $post->id-1)->value('id');
        return view('blog.show', [
            'post' => $post,
            'nextBlog' => $nextBlog,
            'prevBlog' => $prevBlog
        ]);
    }

    public function store(Request $request)
    {
        // validate request
        $this->validate($request, [
            'title' => 'required|max:255|string|unique:posts,title',
            'slug' => 'required|max:255',
            'image' => 'required|image',
            'body'  => 'required|text',
            'excerpt' => 'required|text',
            'status' => 'required|max:255'
        ]);

        dd($request);
    }


    public function create()
    {
        return view('blog.create');
    }

    /**
     * Update Blog
     *
     * @param Request $request
     * @return void
     */
    public function update( Request $request )
    {
        if ( request()->method() === 'PUT' )
        {

        }
        else
        {
            // handle patch method
        }
    }
}
