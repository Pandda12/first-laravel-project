<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use JetBrains\PhpStorm\NoReturn;

class PostController extends Controller
{
    public function index()
    {
         $posts = Post::where('publish', 1)->get();

         foreach ( $posts as $post) {

             //echo $post->title . '<br>';

         }

         return view('posts', ['posts' => $posts] );

         //dd($posts);
    }

    public function create(): void
    {
        $postsArr = [
            [
                'title' => 'New Post',
                'content' => 'That\'s my first created post',
                'img' => '',
                'publish' => 1
            ],
            [
                'title' => 'New Created Post',
                'content' => 'That\'s my second created post',
                'img' => '',
                'publish' => 1
            ],
        ];

        foreach ( $postsArr as $post ) {
            Post::create( $post );
        }
    }

    public function update()
    {
        $post = Post::find(6);

        $post->update([
            'title' => 'New Created Post Updated',
            'content' => 'That\'s my second created post Updated',
            'img' => 'Updated',
            'publish' => 0
        ]);
        dd('updated');
    }

    public function delete()
    {
        $post = Post::find(2);
        $post->delete();
        dd('deleted');
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
        ],[
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
        ],[
            'title' => 'Update or create Post 2',
            'content' => 'Update or create Post content',
            'img' => '',
            'publish' => 1
        ]);
    }
}
