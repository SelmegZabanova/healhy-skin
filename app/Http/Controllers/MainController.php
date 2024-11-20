<?php

namespace App\Http\Controllers;

use App\Enums\PostCategory;
use App\Models\Post;
use Illuminate\Http\Request;

class MainController
{
    public function index()
    {

        $posts = Post::all();
        $categories = PostCategory::cases();
        return view('welcome', ['posts' => $posts], ['categories' => $categories]);
    }

    public function about(int $id)
    {
        $post = Post::with(['comments.user'])->findOrFail($id);
        return view('post', ['post' => $post]);
    }
}
