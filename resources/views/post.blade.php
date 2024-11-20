@extends('layout')

@section('title', $post->title)

@section('content')
    <div class="container mx-auto my-12 px-4">
        <article class="post-container bg-white rounded-lg shadow-md overflow-hidden">
            <div class="post-header">
                @if($post->image)
                    <div class="aspect-video relative overflow-hidden">
                        <img
                            src="{{ asset($post->image) }}"
                            alt="{{ $post->title }}"
                            class="w-full h-full object-contain"
                        >
                    </div>
                @else
                    <div class="aspect-video bg-gray-200"></div>
                @endif
            </div>
            <div class="post-content p-8">
                <h1 class="text-3xl font-bold text-pink-dark mb-4">{{ $post->title }}</h1>

                <div class="category mb-6">
                <span class="inline-block bg-pink-light text-pink-dark px-4 py-2 rounded-full text-sm font-medium">
                    {{ $post->category }}
                </span>
                </div>
                <div class="post-text prose prose-pink max-w-none">
                    @foreach(explode("\n", $post->content) as $paragraph)
                        @if(trim($paragraph))
                            <p class="text-gray-700 leading-relaxed mb-6 text-lg">{{ $paragraph }}</p>
                        @endif
                    @endforeach
                </div>


            </div>
        </article>
    </div>
    <!-- Секция комментариев -->
    <div class="bg-white rounded-lg shadow-md p-6">
        <h2 class="text-2xl font-bold text-pink-dark mb-6">Комментарии</h2>

        @auth
            <form action="{{ route('comments.store', $post->id) }}" method="POST" class="mb-8">
                @csrf
                <div class="mb-4">
                    <textarea
                        name="content"
                        rows="3"
                        class="w-full border-2 border-pink-light rounded p-2 focus:border-pink-dark focus:outline-none"
                        placeholder="Оставьте свой комментарий..."
                    >{{ old('content') }}</textarea>
                    @error('content')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <button type="submit" class="bg-pink-light text-pink-dark py-2 px-4 rounded hover:bg-pink-dark hover:text-white transition duration-200">
                    Отправить комментарий
                </button>
            </form>
        @else
            <div class="bg-pink-50 text-pink-dark p-4 rounded mb-8">
                Чтобы оставить комментарий, пожалуйста, <a href="{{ route('login') }}" class="underline">войдите</a> или <a href="{{ route('register') }}" class="underline">зарегистрируйтесь</a>.
            </div>
        @endauth

        <div class="space-y-6">
            @forelse($post->comments as $comment)
                <div class="bg-pink-50 rounded p-4">
                    <div class="flex justify-between items-start mb-2">
                        <div class="flex items-center">
                            @if($comment->user->avatar)
                                <img src="{{ asset('storage/avatars/' . $comment->user->avatar) }}"
                                     alt="{{ $comment->user->name }}"
                                     class="w-8 h-8 rounded-full mr-2">
                            @else
                                <div class="w-8 h-8 rounded-full bg-pink-light flex items-center justify-center text-pink-dark mr-2">
                                    {{ strtoupper(substr($comment->user->name, 0, 2)) }}
                                </div>
                            @endif
                            <span class="font-medium text-pink-dark">{{ $comment->user->name }}</span>
                        </div>
                        <span class="text-sm text-gray-500">
                            {{ $comment->created_at->diffForHumans() }}
                        </span>
                    </div>
                    <p class="text-gray-700">{{ $comment->content }}</p>

                    @if(auth()->check() && (auth()->id() === $comment->user_id || auth()->user()->isAdmin()))
                        <form action="{{ route('comments.destroy', $comment) }}" method="POST" class="mt-2">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-sm text-red-500 hover:underline">
                                Удалить
                            </button>
                        </form>
                    @endif
                </div>
            @empty
                <p class="text-gray-500 text-center">Пока нет комментариев. Будьте первым!</p>
            @endforelse
        </div>
    </div>



@endsection
<style>
    .post-text p {
        margin-bottom: 2rem;
        line-height: 1.8;
        color: #4a5568;
    }

    .post-text p:last-child {
        margin-bottom: 0;
    }

    /* Добавляем стили для prose */
    .prose {
        max-width: 65ch;
        margin: 0 auto;
    }

    .prose p {
        margin-top: 1.25em;
        margin-bottom: 1.25em;
    }

    .prose-pink a {
        color: #CD6090;
    }

    .prose-pink a:hover {
        color: #FFE4E1;
    }

    /* Добавляем анимацию при наведении на категорию */
    .category span {
        transition: all 0.3s ease;
    }

    .category span:hover {
        background-color: #CD6090;
        color: white;
        transform: translateY(-1px);
    }
</style>
