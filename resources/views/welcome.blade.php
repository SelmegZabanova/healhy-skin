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
                                <a href="{{ route('post', $post->id) }}" class="text-pink-dark font-medium hover:underline">Читать далее</a>
                            </div>
                        </div>
                    </article>
                @endforeach
            @else
                <p class="col-span-3 text-center text-gray-500">Пока нет опубликованных постов</p>
            @endif
        </div>

    </section>
@endsection
