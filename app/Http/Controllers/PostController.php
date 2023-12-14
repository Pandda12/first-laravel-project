<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

//use JetBrains\PhpStorm\NoReturn;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();

        return view('post.index', compact('posts') );

    }

    public function create()
    {
        $categories = Category::all();

        return view('post.create', compact('categories'));
    }

    public function store()
    {
        $data = request()->validate([
            'title' => 'string',
            'content' => 'string',
            'img' => 'string',
            'category_id' => ''
        ]);
        Post::create($data);
        return redirect()->route('post.index');
    }

    public function show(Post $post)
    {
        return view('post.show', compact('post'));
    }

    public function edit(Post $post)
    {
        $categories = Category::all();

        return view('post.edit', compact('post', 'categories'));
    }

    public function update(Post $post)
    {
        $data = request()->validate([
            'title' => 'string',
            'content' => 'string',
            'img' => 'string',
            'category_id' => ''
        ]);
        $post->update($data);
        return redirect()->route('post.show', $post->id);
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('post.index');
    }

    public function restore()
    {
        $post = Post::withTrashed()->find(2);
        $post->restore();
        dd('deleted');
    }

    public function firstOrCreate()
    {
        $post = Post::firstOrCreate([
            'title' => 'New Post 3'
        ], [
            'title' => 'New Post 3',
            'content' => 'That\'s my third created post',
            'img' => '',
            'publish' => 1
        ]);
    }


    public function updateOrCreate(): void
    {
        $post = Post::updateOrCreate([
            'title' => 'Update or create Post 2'
        ], [
            'title' => 'Update or create Post 2',
            'content' => 'Update or create Post content',
            'img' => '',
            'publish' => 1
        ]);
    }
}
