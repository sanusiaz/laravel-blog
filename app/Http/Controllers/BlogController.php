<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy('updated_at', 'desc')->paginate(20);

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
            'slug' => 'required|max:255|unique:posts,slug',
            'image' => 'required|mimes:png,jpeg,jpg,gif,svg',
            'body'  => 'required|text',
            'excerpt' => 'required|text',
            'status' => 'required|max:255'
        ]);

        if ( $request->has('image') && $request->file('image') !== null )
        {
            $imageFullPath = Storage::putFile(storage_path() . '/images', $request->file('image'));
        }

        dd($imageFullPath);


        Post::create([
            'title' => $request->title,
            'slug' => $request->slug,
            'status' => $request->status,
            'excerpt' => $request->excerpt,
            'body' => $request->body,
            'image_path' => $imageFullPath,
            'min_to_read' => rand(10, 100),
            'is_published' => ( $request->status === 'published' ) ? 1 : 0
        ]);

        return back()->with('success');

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
