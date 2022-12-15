<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\BlogRequest;
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

    public function store(BlogRequest $request)
    {

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
            'min_to_read'   => ceil(strlen( $request->body ) / 600),
            'is_published'  => ( $request->status === 'published' ) ? 1 : 0,
            'user_id'       => $user->id
        ]);

        return redirect('/blog')->with('success', 'Post Has been created successfully');
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
     * @param BlogRequest $request
     * @return void
     */
    public function update( BlogRequest $request, int $id )
    {    

        // check if request has images 
        if ( $request->has('image') && $request->file('image') !== null )
        {
            $imageFullPath = Storage::putFile("/public/images", $request->file('image'));
            Post::where('id', $id)->update([
                'image_path' => $imageFullPath
            ]);
        }
        
        // update all request 
        Post::where('id', $request->id)
            ->update([
                'title'         => $request->title,
                'slug'          => $request->slug,
                'status'        => $request->status,
                'excerpt'       => $request->excerpt,
                'body'          => $request->body,
                'min_to_read'   => ceil(strlen( $request->body ) / 600),
                'is_published'  => ( $request->status === 'published' ) ? 1 : 0,
            ]);

        
        return back()->with('success', 'Article has been updated successfully');
               
    }


    /**
     * Delete Posts / Article
     *
     * @param integer $id
     * @return void
     */
    public function destroy(int $id)
    {
        Post::destroy($id);

        return redirect('/blog')->with('error', 'Article/Post has been deleted');
    }
}
