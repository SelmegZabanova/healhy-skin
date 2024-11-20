<?php

namespace App\Http\Controllers;

use App\Models\ReviewComment;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class ReviewCommentController extends BaseController
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request, Review $review)
    {
        $validated = $request->validate([
            'content' => 'required|min:3|max:1000'
        ]);

        $comment = new ReviewComment();
        $comment->content = $validated['content'];
        $comment->user_id = auth()->id();
        $comment->review_id = $review->id;
        $comment->save();

        return back()->with('success', 'Комментарий добавлен');
    }

    public function destroy(ReviewComment $comment)
    {
        if (auth()->id() === $comment->user_id || auth()->user()->isAdmin()) {
            $comment->delete();
            return back()->with('success', 'Комментарий удален');
        }
        return back()->with('error', 'У вас нет прав на удаление этого комментария');
    }
}
