<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
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
            'body'  => 'required',
            'excerpt' => 'required',
            'status' => 'required|max:255'
        ]);

        if ( $request->has('image') && $request->file('image') !== null )
        {
            // store images in storage/app/images folder
            $imageFullPath = Storage::putFile('/public/images', $request->file('image'));
        }

        // select random user
        $user = User::inrandomOrder()->first();

        Post::create([
            'title'         => $request->title,
            'slug'          => $request->slug,
            'status'        => $request->status,
            'excerpt'       => $request->excerpt,
            'body'          => $request->body,
            'image_path'    => $imageFullPath,
            'min_to_read'   => rand(10, 100),
            'is_published'  => ( $request->status === 'published' ) ? 1 : 0,
            'user_id'       => $user->id
        ]);

        return back()->with('success', 'Post Has been created successfully');
    }


    public function create()
    {
        return view('blog.create', [
            'post' => new Post()
        ]);
    }


    /**
     * Edit each of the post
     *
     * @param Post $post
     * @return void
     */
    public function edit($id)
    {   
        $post = Post::where('id', $id)->firstOrFail();
        return view('blog.edit', [
            'post' => $post
        ]);
    }

    /**
     * Update Blog
     *
     * @param Request $request
     * @return void
     */
    public function update( Request $request, int $id )
    {

        $this->validate($request, [
            'title' => 'sometimes|max:255|string|unique:posts,title',
            'slug' => 'sometimes|max:255|unique:posts,slug',
            'image' => 'sometimes|mimes:png,jpeg,jpg,gif,svg',
            'body'  => 'sometimes',
            'excerpt' => 'sometimes',
            'status' => 'sometimes|max:255'
        ]);

        if ( request()->method() === 'PUT' )
        {
            if ( $request->has('image_path') && $request->file('image_path') !==  null )
            {
                // update all request 
                Post::where('id', $request->id)
                    ->update([
                        'title'         => $request->title,
                        'slug'          => $request->slug,
                        'status'        => $request->status,
                        'excerpt'       => $request->excerpt,
                        'body'          => $request->body,
                        'image_path'    => Storage::putFile('/public/images', $request->file('image_path')),
                        'min_to_read'   => strlen( $request->body ) / 600,
                        'is_published'  => $request->is_published,
                        'user_id'       => auth()->user()->id
                    ]);
            }
        }
        else
        {
            // handle patch method
            foreach( $request->all() as $data )
            {
                dd($data);
                // Post::where('id', $id)->update([

                // ]);
            }
        }
    }
}
