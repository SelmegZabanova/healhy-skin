<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;


class ReviewController extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function __construct()
    {
        // Применяем middleware auth ко всем методам, кроме index и show
        $this->middleware('auth')->except(['index', 'show']);
    }
    public function index(Request $request)
    {
        $query = Review::query()->with('user')->latest();

        // Фильтр по категории
        if ($request->filled('category')) {
            $query->where('category', $request->category);
        }

        // Фильтр по рейтингу
        if ($request->filled('rating')) {
            $query->where('rating', $request->rating);
        }

        $reviews = $query->paginate(9)->withQueryString();

        return view('reviews.index', compact('reviews'));
    }

    public function create()
    {
        $categories = Review::categories();
        return view('reviews.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'category' => 'required|string',
            'content' => 'required',
            'rating' => 'required|integer|min:1|max:5',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $images = [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('reviews', 'public');
                $images[] = $path;
            }
        }

        $review = Review::create([
            'user_id' => auth()->id(),
            'user_name' => auth()->user()->name,
            'title' => $validated['title'],
            'category' => $validated['category'],
            'content' => $validated['content'],
            'rating' => $validated['rating'],
            'images' => $images
        ]);

        return redirect()->route('reviews.show', $review)
            ->with('success', 'Отзыв успешно опубликован!');
    }
    public function show($id)
    {
        $review = Review::with(['user', 'comments.user'])->findOrFail($id);
        return view('reviews.show', compact('review'));
    }


    public function edit($id)
    {
       $review = Review::query()->findOrFail($id);
        $categories = Review::categories();
        return view('reviews.edit', compact('review', 'categories'));
    }




    public function update(Request $request, $id)
    {
        $review = Review::query()->findOrFail($id);
        if (auth()->id() !== $review->user_id) {
            return redirect()->route('reviews.show', $review)
                ->with('error', 'У вас нет прав на редактирование этого отзыва');
        }

        $validated = $request->validate([
            'title' => 'required|max:255',
            'category' => 'required|string',
            'content' => 'required',
            'rating' => 'required|integer|min:1|max:5',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $images = $review->images ?? [];
        if ($request->has('remove_images')) {
            foreach ($request->remove_images as $index) {
                if (isset($images[$index])) {
                    Storage::disk('public')->delete($images[$index]);
                    unset($images[$index]);
                }
            }
            $images = array_values($images);
        }
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                if (count($images) >= 5) break;
                $path = $image->store('reviews', 'public');
                $images[] = $path;
            }
        }

        $review->update([
            'title' => $validated['title'],
            'category' => $validated['category'],
            'content' => $validated['content'],
            'rating' => $validated['rating'],
            'images' => $images
        ]);


        return redirect()->route('reviews.show',  $review )
            ->with('success', 'Отзыв успешно обновлен!');
    }

    public function destroy(Review $review)
    {
        $this->authorize('delete', $review);

        // Удаляем изображения
        if (!empty($review->images)) {
            foreach ($review->images as $image) {
                Storage::disk('public')->delete($image);
            }
        }

        $review->delete();

        return redirect()->route('reviews.index')
            ->with('success', 'Отзыв успешно удален!');
    }
    public function myReviews()
    {
        $reviews = Review::where('user_id', auth()->id())
            ->latest()
            ->paginate(9);

        return view('reviews.my-reviews', compact('reviews'));
    }
}
