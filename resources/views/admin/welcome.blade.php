@extends('layout')

@section('title', 'healthy skin')

@section('content')
    <div class="flex flex-col items-center justify-center h-96 bg-pink-light  shadow-md">
        <h1 class="text-4xl font-bold text-pink-dark mb-4">Pure Ingredients, Pure You</h1>
        <div class="text-lg text-pink-dark">
            <p>Сервис поможет вам легко и быстро проверить состав косметики на комедогенность</p>
            <p>Также пользователи делятся мнениями о косметике, которую попробовали на себе</p>
        </div>

    </div>

    <section class="posts-section my-12">
        <div class="container mx-auto grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @if($posts->count() > 0)
                @foreach($posts as $post)
                    <article class="post-card bg-white rounded-lg shadow-md overflow-hidden">
                        <div class="post-image">

                            <img src="{{ asset($post->image) }}" class="w-full h-48 object-cover">
                        </div>
                        <div class="post-content p-6">
                            <h2 class="text-xl font-bold text-pink-dark mb-4">{{ $post->title }}</h2>
                            <div class="post-text text-gray-700 mb-4">
                                {!! Str::limit($post->content, 150) !!}
                            </div>
                            <div class="post-meta">
                                <a href="{{ route('admin.post', $post->id) }}" class="text-pink-dark font-medium hover:underline">Читать далее</a>
                            </div>
                        </div>
                    </article>
                @endforeach
            @else
                <p class="col-span-3 text-center text-gray-500">Пока нет опубликованных постов</p>
            @endif
        </div>
        <div class="container mx-auto my-12">
            <div class="bg-white rounded-lg shadow-md p-8">
                <h1 class="text-3xl font-bold text-pink-dark mb-4">Создать новый пост</h1>
                <form action="{{route('save.post')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-4">
                        <label for="title" class="block text-gray-700 font-medium mb-2">Заголовок</label>
                        <input type="text" id="title" name="title" class="w-full border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring focus:ring-pink-300" required>
                    </div>
                    <div class="mb-4">
                    </div>
                    <label for="category" class="block text-gray-700 font-medium mb-2">Категория</label>
                    <select name="category" id="category"  class="form-control" required>
                        <option value="">Выберите категорию</option>
                        <option value="уход за кожей" {{ old('category', $post->category ?? '') == 'уход за кожей' ? 'selected' : '' }}>Уход за кожей</option>
                        <option value="макияж" {{ old('category', $post->category ?? '') == 'макияж' ? 'selected' : '' }}>Макияж</option>
                        <option value="уход за волосами" {{ old('category', $post->category ?? '') == 'уход за волосамм' ? 'selected' : '' }}>Уход за волосами</option>
                    </select>
                    <div class="mb-4">
                        <label for="content" class="block text-gray-700 font-medium mb-2">Содержание</label>
                        <textarea id="content" name="content" rows="6" class="w-full border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring focus:ring-pink-300" required></textarea>
                    </div>
                    <div class="mb-4">
                        <label for="image" class="block text-gray-700 font-medium mb-2">Изображение</label>
                        <input type="file" id="image" name="image" class="w-full">
                    </div>
                    <button type="submit" class="bg-pink-500 hover:bg-pink-600 text-white font-medium py-2 px-4 rounded-md">Опубликовать</button>
                </form>
            </div>
        </div>
    </section>
@endsection
