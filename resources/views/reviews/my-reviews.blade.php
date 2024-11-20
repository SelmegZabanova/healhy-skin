@extends('layout')

@section('title', 'Мои отзывы')

@section('content')
    <div class="container mx-auto py-8">
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-3xl font-bold text-pink-dark">Мои отзывы</h1>
            <a href="{{ route('reviews.create') }}"
               class="bg-pink-light hover:bg-pink-dark text-pink-dark hover:text-white font-medium py-2 px-4 rounded transition-colors">
                Написать отзыв
            </a>
        </div>

        @if($reviews->isEmpty())
            <div class="bg-pink-50 rounded-lg p-8 text-center">
                <p class="text-pink-dark text-lg mb-4">У вас пока нет отзывов</p>
                <a href="{{ route('reviews.create') }}"
                   class="inline-block bg-pink-light hover:bg-pink-dark text-pink-dark hover:text-white font-medium py-2 px-4 rounded transition-colors">
                    Написать первый отзыв
                </a>
            </div>
        @else
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
                                    {{ $review->created_at->format('d.m.Y') }}
                                </span>
                                <div class="flex gap-2">
                                    <a href="{{ route('reviews.show', $review->id) }}"
                                       class="text-pink-dark hover:text-pink-600 font-medium">
                                        Просмотр
                                    </a>
                                    <span class="text-gray-300">|</span>
                                    <a href="{{ route('reviews.edit', $review->id) }}"
                                       class="text-pink-dark hover:text-pink-600 font-medium">
                                        Редактировать
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Пагинация -->
            <div class="mt-8">
                {{ $reviews->links() }}
            </div>
        @endif
    </div>
@endsection
