<?php

namespace App\Http\Controllers\Admin;

use App\Enums\PostCategory;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;


class AdminPostController
{
    public function index()
    {

        $posts = Post::all();
        $categories = PostCategory::cases();
        return view('admin.welcome', ['posts' => $posts], ['categories' => $categories]);
    }


    public function save(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string',
            'content' => 'required|string',
            'image' => '|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            $validatedData['image'] = 'images/' . $imageName;
        }

        $post = Post::create($validatedData);

        return redirect()->route('admin.welcome')->with('success', 'Пост успешно создан!');
    }

//    public function edit(Post $post)
//    {
//        return view('posts.edit', compact('post'));
//    }


    public function update(Request $request, Post $post)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string|in:уход за кожей,макияж,уход за волосами',
            'content' => 'required|string',
            'image' => 'nullable|image|max:2048',
        ]);

        $post->title = $validatedData['title'];
        $post->category = $validatedData['category'];
        $post->content = $validatedData['content'];

        if ($request->hasFile('image')) {
            if ($post->image) {
                Storage::disk('public')->delete($post->image);
            }
            $image = $request->file('image');
            $imagePath = $image->store('images', 'public');
            $post->image = $imagePath;
        }

        $post->save();

        return redirect()->route('admin.welcome')->with('success', 'Пост успешно обновлен!');
    }

    public function delete(Post $post)
    {
        if ($post->image) {
            Storage::disk('public')->delete($post->image);
        }
        $post->delete();

        return redirect()->route('admin.welcome')->with('success', 'Пост успешно удален!');
    }
    public function about(int $id)
    {
        $post = Post::all()->find($id);

        return view('admin.post', ['post' => $post]);
    }


}
