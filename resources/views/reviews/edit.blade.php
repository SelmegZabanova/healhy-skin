@extends('layout')

@section('title', 'Редактировать отзыв')

@section('content')
<div class="container mx-auto py-8 max-w-2xl">
    <div class="bg-pink-light rounded-lg shadow-md p-8">
        <h1 class="text-3xl font-bold text-pink-dark mb-6">Редактировать отзыв</h1>

        <form action="{{ route('reviews.update', $review->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')

            <div>
                <label for="title" class="block text-pink-dark font-medium mb-2">Заголовок</label>
                <input type="text"
                       id="title"
                       name="title"
                       value="{{ old('title', $review->title) }}"
                       class="w-full px-4 py-2 border border-pink-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-300"
                       required>
                @error('title')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="category" class="block text-pink-dark font-medium mb-2">Категория</label>
                <select id="category"
                        name="category"
                        class="w-full px-4 py-2 border border-pink-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-300"
                        required>
                    @foreach(App\Models\Review::categories() as $category)
                        <option value="{{ $category }}" {{ old('category', $review->category) == $category ? 'selected' : '' }}>
                            {{ $category }}
                        </option>
                    @endforeach
                </select>
                @error('category')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-pink-dark font-medium mb-2">Рейтинг</label>
                <div class="flex gap-4">
                    @for($i = 1; $i <= 5; $i++)
                        <label class="flex items-center">
                            <input type="radio"
                                   name="rating"
                                   value="{{ $i }}"
                                   {{ old('rating', $review->rating) == $i ? 'checked' : '' }}
                                   class="text-pink-500 focus:ring-pink-300"
                                   required>
                            <span class="ml-2 text-gray-700">{{ $i }} ⭐</span>
                        </label>
                    @endfor
                </div>
                @error('rating')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="content" class="block text-pink-dark font-medium mb-2">Текст отзыва</label>
                <textarea id="content"
                          name="content"
                          rows="6"
                          class="w-full px-4 py-2 border border-pink-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-300"
                          required>{{ old('content', $review->content) }}</textarea>
                @error('content')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Текущие изображения -->
            @if($review->images && count($review->images) > 0)
                <div>
                    <label class="block text-pink-dark font-medium mb-2">Текущие изображения</label>
                    <div class="grid grid-cols-2 md:grid-cols-3 gap-4 mb-4">
                        @foreach($review->images as $index => $image)
                            <div class="relative group">
                                <img src="{{ asset('storage/' . $image) }}"
                                     alt="Изображение {{ $index + 1 }}"
                                     class="w-full h-32 object-cover rounded">
                                <input type="checkbox"
                                       name="remove_images[]"
                                       value="{{ $index }}"
                                       class="absolute top-2 right-2 h-4 w-4">
                                <label class="text-xs text-gray-500 mt-1 block">Удалить</label>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif

            <!-- Новые изображения -->
            <div>
                <label class="block text-pink-dark font-medium mb-2">
                    Добавить новые изображения
                    (можно добавить ещё {{ 5 - ($review->images ? count($review->images) : 0) }} шт.)
                </label>
                <div class="space-y-2">
                    @for($i = 0; $i < (5 - ($review->images ? count($review->images) : 0)); $i++)
                        <input type="file"
                               name="images[]"
                               accept="image/*"
                               class="w-full text-gray-700 border border-pink-200 rounded-lg">
                    @endfor
                </div>
                <p class="text-gray-600 text-sm mt-1">Поддерживаются форматы: JPG, PNG, GIF. Максимальный размер: 2MB</p>
                @error('images.*')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex justify-end space-x-4 pt-4">
                <a href="{{ route('reviews.show', $review) }}"
                   class="px-6 py-2 border border-pink-300 text-pink-dark rounded-lg hover:bg-pink-50 transition-colors">
                    Отмена
                </a>
                <button type="submit"
                        class="px-6 py-2 bg-pink-500 text-white rounded-lg hover:bg-pink-600 transition-colors">
                    Сохранить изменения
                </button>
            </div>
        </form>
    </div>
</div>

@if ($errors->any())
    <div class="fixed bottom-4 right-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
        <strong class="font-bold">Ошибка!</strong>
        <ul class="list-disc list-inside">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if (session('success'))
    <div class="fixed bottom-4 right-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded">
        {{ session('success') }}
    </div>
@endif
@endsection
