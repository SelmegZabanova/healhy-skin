@extends('layout')

@section('title', $post->title)

@section('content')
    <div class="container mx-auto my-12">
        <article class="post-container bg-pink-light rounded-lg shadow-md overflow-hidden">
            <div class="post-header">
                @if($post->image)
                    <img src="{{ asset($post->image) }}" alt="{{ $post->title }}" class="w-full h-64 object-cover">
                @else
                    <div class="w-full h-64 bg-pink-100"></div>
                @endif
            </div>
            <div class="post-content p-8">
                <h1 class="text-3xl font-bold text-pink-dark mb-4">{{ $post->title }}</h1>
                <div class="category mb-4">
                    <span class="text-pink-dark font-medium">Категория:</span> {{ $post->category }}
                </div>
                <div class="post-text text-gray-700 leading-relaxed mb-8">
                    @foreach(explode("\n", $post->content) as $paragraph)
                        @if(trim($paragraph))
                            <p class="mb-4">{{ $paragraph }}</p>
                        @endif
                    @endforeach
                </div>
                <div class="post-meta flex justify-between items-center">
                    <div class="flex space-x-4">
                        <a href="{{ route('admin.welcome') }}" class="text-pink-dark font-medium hover:bg-pink-dark hover:text-white py-2 px-4 rounded">
                            Назад на главную
                        </a>
                    </div>
                    <div class="flex space-x-4">
                        <button onclick="toggleEditForm()" class="bg-pink-light hover:bg-pink-dark text-pink-dark hover:text-white font-medium py-2 px-4 rounded">
                            Редактировать
                        </button>
                        <form action="{{ route('delete.post', $post->id) }}" method="POST" class="inline" onsubmit="return confirm('Вы уверены, что хотите удалить этот пост?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-400 hover:bg-red-500 text-white font-medium py-2 px-4 rounded">
                                Удалить
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </article>

        <div id="editForm" class="hidden mt-8 bg-pink-light rounded-lg shadow-md p-8">
            <h2 class="text-2xl font-bold text-pink-dark mb-4">Редактировать пост</h2>
            <form action="{{ route('update.post', $post->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label for="title" class="block text-pink-dark font-medium mb-2">Заголовок</label>
                    <input type="text" id="title" name="title" value="{{ $post->title }}"
                           class="w-full border border-pink-200 rounded px-4 py-2 focus:outline-none focus:ring focus:ring-pink-200" required>
                </div>
                <div class="mb-4">
                    <label for="category" class="block text-pink-dark font-medium mb-2">Категория</label>
                    <select name="category" id="category"
                            class="w-full border border-pink-200 rounded px-4 py-2 focus:outline-none focus:ring focus:ring-pink-200" required>
                        <option value="уход за кожей" {{ $post->category == 'уход за кожей' ? 'selected' : '' }}>Уход за кожей</option>
                        <option value="макияж" {{ $post->category == 'макияж' ? 'selected' : '' }}>Макияж</option>
                        <option value="уход за волосами" {{ $post->category == 'уход за волосами' ? 'selected' : '' }}>Уход за волосами</option>
                    </select>
                </div>
                <div class="mb-4">
                    <label for="content" class="block text-pink-dark font-medium mb-2">Содержание</label>
                    <textarea id="content" name="content" rows="6"
                              class="w-full border border-pink-200 rounded px-4 py-2 focus:outline-none focus:ring focus:ring-pink-200" required>{{ $post->content }}</textarea>
                </div>
                <div class="mb-4">
                    <label for="image" class="block text-pink-dark font-medium mb-2">Новое изображение (оставьте пустым, чтобы сохранить текущее)</label>
                    <input type="file" id="image" name="image" class="w-full">
                </div>
                <div class="flex justify-end space-x-4">
                    <button type="button" onclick="toggleEditForm()"
                            class="bg-gray-400 hover:bg-gray-500 text-white font-medium py-2 px-4 rounded">
                        Отмена
                    </button>
                    <button type="submit"
                            class="bg-pink-light hover:bg-pink-dark text-pink-dark hover:text-white font-medium py-2 px-4 rounded">
                        Сохранить изменения
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function toggleEditForm() {
            const editForm = document.getElementById('editForm');
            editForm.classList.toggle('hidden');
        }
    </script>

    <style>
        .post-text p {
            margin-bottom: 1.5em;
            line-height: 1.8;
            color: #4a5568;
        }

        .post-text p:last-child {
            margin-bottom: 0;
        }
    </style>
@endsection
