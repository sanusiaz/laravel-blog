<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostsController extends Controller
{
    public function index()
    {
        // $insertIntoDB = DB::insert("INSERT INTO posts(title, slug, excerpt, body, image_path, is_published, min_to_read, status) VALUE(?, ?, ?, ?, ?, ?, ?, ?)", [
        //     'text', 'test', 'test', 'test', 'text.jpg', true, 1, 'published'
        // ]);

        // $updatePosts = DB::update("UPDATE posts SET body = ? where id = ?", [
        //     'changed body',
        //     '11'
        // ]);

        // dd(DB::table('posts')
        //     ->where('id', '>', 5)
        //     ->whereNotBetween('min_to_read', [0,6])
        //     ->get());
        dd(DB::table('posts')
            ->select('min_to_read')
            ->orderBy('min_to_read')
            ->distinct()
            ->get());
        $deleteRow = DB::delete("DELETE FROM posts WHERE id = ?", [
            11
        ]);

        dd($deleteRow);


        $posts = DB::select('SELECT * FROM posts WHERE id = :id', [
            'id' => 1
        ]);
        dd($posts);
        return view("posts.index");
    }

    public function show($name) 
    {
        echo sprintf("This is your name %s", $name);
    }
}
