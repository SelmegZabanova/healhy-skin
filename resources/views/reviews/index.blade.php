@extends('layout')

@section('title', 'Отзывы на косметику')

@section('content')
    <div class="container mx-auto py-8">
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-3xl font-bold text-pink-dark">Отзывы на косметику</h1>
            @auth
                <div class="flex gap-4">
                    <a href="{{ route('reviews.my') }}"
                       class="bg-pink-light hover:bg-pink-dark text-pink-dark hover:text-white font-medium py-2 px-4 rounded transition-colors">
                        Мои отзывы
                    </a>
                    <a href="{{ route('reviews.create') }}"
                       class="bg-pink-light hover:bg-pink-dark text-pink-dark hover:text-white font-medium py-2 px-4 rounded transition-colors">
                        Написать отзыв
                    </a>
                </div>
            @endauth
        </div>

        <!-- Фильтры -->
        <div class="mb-8 bg-pink-light p-4 rounded-lg">
            <form action="{{ route('reviews') }}" method="GET" class="flex gap-4">
                <select name="category" class="rounded border-pink-200 focus:border-pink-300 focus:ring focus:ring-pink-200">
                    <option value="">Все категории</option>
                    @foreach(App\Models\Review::categories() as $category)
                        <option value="{{ $category }}" {{ request('category') == $category ? 'selected' : '' }}>
                            {{ $category }}
                        </option>
                    @endforeach
                </select>
                <select name="rating" class="rounded border-pink-200 focus:border-pink-300 focus:ring focus:ring-pink-200">
                    <option value="">Любой рейтинг</option>
                    @foreach(range(5, 1) as $rating)
                        <option value="{{ $rating }}" {{ request('rating') == $rating ? 'selected' : '' }}>
                            {{ $rating }} ⭐
                        </option>
                    @endforeach
                </select>
                <button type="submit"
                        class="bg-pink-light hover:bg-pink-dark text-pink-dark hover:text-white font-medium py-2 px-4 rounded transition-colors">
                    Применить фильтры
                </button>
            </form>
        </div>

        <!-- Список отзывов -->
        <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
            @foreach($reviews as $review)
                <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow">
                    @if($review->images && count($review->images) > 0)
                        <img src="{{ asset('storage/' . $review->images[0]) }}"
                             alt="{{ $review->title }}"
                             class="w-full h-48 object-cover">
                    @else
                        <div class="w-full h-48 bg-pink-100 flex items-center justify-center">
                            <span class="text-pink-dark">Нет изображения</span>
                        </div>
                    @endif
                    <div class="p-6">
                        <div class="flex justify-between items-start mb-2">
                            <h2 class="text-xl font-bold text-pink-dark">{{ $review->title }}</h2>
                            <div class="text-yellow-400">
                                @for($i = 0; $i < $review->rating; $i++)
                                    ⭐
                                @endfor
                            </div>
                        </div>
                        <p class="text-sm text-gray-600 mb-2">Категория: {{ $review->category }}</p>
                        <p class="text-gray-700 mb-4">{{ Str::limit($review->content, 150) }}</p>
                        <div class="flex justify-between items-center">
                        <span class="text-sm text-gray-500">
                            {{ $review->user->name }} · {{ $review->created_at->diffForHumans() }}
                        </span>
                            <a href="{{ route('reviews.show', $review->id) }}"
                               class="text-pink-dark hover:text-pink-600 font-medium">
                                Читать полностью →
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Пагинация -->
        <div class="mt-8">
            {{ $reviews->links() }}
        </div>
    </div>
@endsection
