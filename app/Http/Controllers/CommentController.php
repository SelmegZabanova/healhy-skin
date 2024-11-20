<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class CommentController extends BaseController
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request, $postId)
    {
        $validated = $request->validate([
            'content' => 'required|min:3|max:1000'
        ]);

        $comment = new Comment();
        $comment->content = $validated['content'];
        $comment->user_id = auth()->id();
        $comment->post_id = $postId;
        $comment->save();

        return back()->with('success', 'Комментарий добавлен');
    }

    public function destroy(Comment $comment)
    {
        if (auth()->id() === $comment->user_id || auth()->user()->isAdmin()) {
            $comment->delete();
            return back()->with('success', 'Комментарий удален');
        }
        return back()->with('error', 'У вас нет прав на удаление этого комментария');
    }
}
