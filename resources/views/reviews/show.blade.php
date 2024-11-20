@extends('layout')

@section('title', $review->title)

@section('content')
    <div class="container mx-auto py-8 max-w-4xl">
        <article class="bg-pink-light rounded-lg shadow-md overflow-hidden">
            <!-- Галерея изображений -->
            <div class="container mx-auto py-8 max-w-4xl">
                <article class="bg-white rounded-lg shadow-md overflow-hidden">
                    <!-- Галерея изображений -->
                    <div class="container mx-auto py-8 max-w-4xl">
                        <article class="bg-white rounded-lg shadow-md overflow-hidden">
                            <!-- Галерея изображений -->
                            @if($review->images && count($review->images) > 0)
                                <div class="relative">
                                    @if(count($review->images) === 1)
                                        <!-- Одно изображение -->
                                        <div class="aspect-video relative overflow-hidden cursor-pointer"
                                             onclick="openImageModal(0)">
                                            <img src="{{ asset('storage/' . $review->images[0]) }}"
                                                 alt="Изображение"
                                                 class="w-full h-full object-contain">
                                        </div>
                                    @elseif(count($review->images) === 2)
                                        <!-- Два изображения -->
                                        <div class="grid grid-cols-2 gap-1">
                                            @foreach($review->images as $index => $image)
                                                <div class="aspect-square relative overflow-hidden cursor-pointer"
                                                     onclick="openImageModal({{ $index }})">
                                                    <img src="{{ asset('storage/' . $image) }}"
                                                         alt="Изображение {{ $loop->iteration }}"
                                                         class="w-full h-full object-cover hover:opacity-90 transition-opacity">
                                                </div>
                                            @endforeach
                                        </div>
                                    @elseif(count($review->images) === 3)
                                        <!-- Три изображения -->
                                        <div class="grid grid-cols-2 gap-1">
                                            <div class="aspect-square relative overflow-hidden cursor-pointer"
                                                 onclick="openImageModal(0)">
                                                <img src="{{ asset('storage/' . $review->images[0]) }}"
                                                     alt="Изображение 1"
                                                     class="w-full h-full object-cover hover:opacity-90 transition-opacity">
                                            </div>
                                            <div class="grid grid-rows-2 gap-1">
                                                @foreach($review->images->slice(1) as $index => $image)
                                                    <div class="aspect-square relative overflow-hidden cursor-pointer"
                                                         onclick="openImageModal({{ $index + 1 }})">
                                                        <img src="{{ asset('storage/' . $image) }}"
                                                             alt="Изображение {{ $index + 2 }}"
                                                             class="w-full h-full object-cover hover:opacity-90 transition-opacity">
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    @elseif(count($review->images) === 4)
                                        <!-- Четыре изображения -->
                                        <div class="grid grid-cols-2 gap-1">
                                            @foreach($review->images as $index => $image)
                                                <div class="aspect-square relative overflow-hidden cursor-pointer"
                                                     onclick="openImageModal({{ $index }})">
                                                    <img src="{{ asset('storage/' . $image) }}"
                                                         alt="Изображение {{ $loop->iteration }}"
                                                         class="w-full h-full object-cover hover:opacity-90 transition-opacity">
                                                </div>
                                            @endforeach
                                        </div>
                                    @else
                                        <!-- Пять изображений -->
                                        <div class="grid grid-cols-2 gap-1">
                                            <div class="aspect-square relative overflow-hidden cursor-pointer"
                                                 onclick="openImageModal(0)">
                                                <img src="{{ asset('storage/' . $review->images[0]) }}"
                                                     alt="Изображение 1"
                                                     class="w-full h-full object-cover hover:opacity-90 transition-opacity">
                                            </div>
                                            <div class="grid grid-cols-2 grid-rows-2 gap-1">
                                                @foreach($review->images->slice(1) as $index => $image)
                                                    <div class="aspect-square relative overflow-hidden cursor-pointer"
                                                         onclick="openImageModal({{ $index + 1 }})">
                                                        <img src="{{ asset('storage/' . $image) }}"
                                                             alt="Изображение {{ $index + 2 }}"
                                                             class="w-full h-full object-cover hover:opacity-90 transition-opacity">
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            @endif

                            <!-- Навигационные точки -->
                            @if(count($review->images) > 1)
                                <div class="absolute bottom-4 left-1/2 transform -translate-x-1/2 flex space-x-2">
                                    @foreach($review->images as $index => $image)
                                        <button
                                            class="w-2.5 h-2.5 rounded-full bg-white opacity-75 hover:opacity-100 transition-opacity duration-200
                                       {{ $loop->first ? 'opacity-100' : '' }}"
                                            aria-label="Перейти к изображению {{ $loop->iteration }}">
                                        </button>
                                    @endforeach
                                </div>
                            @endif

            <div class="p-8">
                <div class="flex justify-between items-start mb-6">
                    <h1 class="text-3xl font-bold text-pink-dark">{{ $review->title }}</h1>
                    <div class="text-yellow-400 text-xl">
                        @for($i = 0; $i < $review->rating; $i++)
                            ⭐
                        @endfor
                    </div>
                </div>


                <div class="mb-6">
                    <span class="text-pink-dark font-medium">Категория:</span>
                    <span class="inline-block bg-pink-light text-pink-dark px-4 py-2 rounded-full text-sm font-medium">
                    {{ $review->category }}
                </span>
                </div>

                <div class="prose max-w-none mb-8">
                    {!! nl2br(e($review->content)) !!}
                </div>

                <div class="flex justify-between items-center pt-6 border-t">
                    <div class="flex items-center space-x-4">
                        <div class="font-medium text-gray-700">
                            {{ optional($review->user)->name ?? 'Пользователь удален' }}
                        </div>
                        <div class="text-gray-500">
                            {{ $review->created_at ? $review->created_at->format('d.m.Y H:i') : 'Дата не указана' }}
                        </div>
                    </div>


                        @can('update', $review)
                            <div class="flex space-x-4">
                                <a href="{{ route('reviews.edit', $review) }}"
                                   class="bg-pink-light hover:bg-pink-dark text-pink-dark hover:text-white font-medium py-2 px-4 rounded transition-colors">
                                    Редактировать
                                </a>
                                @endcan
                                @can('delete', $review)
                                <form action="{{ route('reviews.destroy', $review) }}"
                                      method="POST"
                                      onsubmit="return confirm('Вы уверены, что хотите удалить этот отзыв?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            class="bg-red-400 hover:bg-red-500 text-white font-medium py-2 px-4 rounded transition-colors">
                                        Удалить
                                    </button>
                                </form>
                                @endcan
                            </div>


                </div>
            </div>
        </article>

        <div class="mt-12 bg-white rounded-lg shadow-md p-6">
            <h2 class="text-2xl font-bold text-pink-dark mb-6">Комментарии</h2>

            @auth
                <form action="{{ route('review.comments.store', $review) }}" method="POST" class="mb-8">
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
                @forelse($review->comments as $comment)
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
                            <form action="{{ route('review.comments.destroy', $comment) }}" method="POST" class="mt-2">
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

        <div class="mt-8">
            <a href="{{ route('reviews') }}"
               class="text-pink-dark hover:text-pink-600 font-medium">
                ← Вернуться к списку отзывов
            </a>
        </div>
    </div>
                </article>

                <!-- Модальное окно для просмотра изображений -->
                <div id="imageModal" class="fixed inset-0 z-50 hidden bg-black bg-opacity-90 flex items-center justify-center">
                    <button onclick="closeImageModal()" class="absolute top-4 right-4 text-white text-4xl hover:text-gray-300 focus:outline-none">
                        ×
                    </button>

                    <button id="prevButton" onclick="changeImage(-1)" class="absolute left-4 text-white text-4xl hover:text-gray-300 focus:outline-none">
                        ‹
                    </button>

                    <button id="nextButton" onclick="changeImage(1)" class="absolute right-4 text-white text-4xl hover:text-gray-300 focus:outline-none">
                        ›
                    </button>

                    <div class="max-w-screen-xl max-h-screen p-4">
                        <img id="modalImage" src="" alt="Увеличенное изображение" class="max-h-[90vh] max-w-full object-contain">
                    </div>
                </div>
            </div>
@endsection
            <style>
                /* Стили для плавных переходов */
                .modal-fade-enter-active, .modal-fade-leave-active {
                    transition: opacity 0.3s ease;
                }

                .modal-fade-enter-from, .modal-fade-leave-to {
                    opacity: 0;
                }

                /* Улучшенный курсор для кликабельных изображений */
                [onclick] {
                    cursor: zoom-in;
                }

                /* Анимация для кнопок навигации */
                #prevButton, #nextButton {
                    transition: transform 0.2s ease;
                }

                #prevButton:hover, #nextButton:hover {
                    transform: scale(1.2);
                }

                /* Стили для модального окна */
                #imageModal {
                    backdrop-filter: blur(5px);
                }

                #modalImage {
                    box-shadow: 0 0 20px rgba(0, 0, 0, 0.3);
                }
                .prose {
                    font-size: 1.125rem;
                    line-height: 1.8;
                }

                .prose p {
                    margin-bottom: 1.5em;
                }

                .prose p:last-child {
                    margin-bottom: 0;
                }

                /* Анимация для навигационных точек */
                .rounded-full {
                    transition: transform 0.2s ease-in-out;
                }

                .rounded-full:hover {
                    transform: scale(1.2);
                }

                /* Плавные переходы для изображений */
                img {
                    transition: transform 0.3s ease-in-out;
                }

                .aspect-square:hover img {
                    transform: scale(1.05);
                }
            </style>
                    <script>
                        let currentImageIndex = 0;
                        const images = @json(array_map(function($image) {
        return asset('storage/' . $image);
    }, $review->images));

                        function openImageModal(index) {
                            currentImageIndex = index;
                            updateModalImage();
                            document.getElementById('imageModal').classList.remove('hidden');
                            document.body.style.overflow = 'hidden';
                            updateNavigationButtons();
                        }

                        function closeImageModal() {
                            document.getElementById('imageModal').classList.add('hidden');
                            document.body.style.overflow = 'auto';
                        }

                        function updateModalImage() {
                            const modalImage = document.getElementById('modalImage');
                            modalImage.src = images[currentImageIndex];
                        }

                        function changeImage(direction) {
                            currentImageIndex = (currentImageIndex + direction + images.length) % images.length;
                            updateModalImage();
                            updateNavigationButtons();
                        }

                        function updateNavigationButtons() {
                            const prevButton = document.getElementById('prevButton');
                            const nextButton = document.getElementById('nextButton');

                            // Показываем/скрываем кнопки навигации только если есть больше одного изображения
                            if (images.length <= 1) {
                                prevButton.classList.add('hidden');
                                nextButton.classList.add('hidden');
                            } else {
                                prevButton.classList.remove('hidden');
                                nextButton.classList.remove('hidden');
                            }
                        }

                        // Обработка клавиш клавиатуры
                        document.addEventListener('keydown', function(event) {
                            if (document.getElementById('imageModal').classList.contains('hidden')) return;

                            switch(event.key) {
                                case 'ArrowLeft':
                                    changeImage(-1);
                                    break;
                                case 'ArrowRight':
                                    changeImage(1);
                                    break;
                                case 'Escape':
                                    closeImageModal();
                                    break;
                            }
                        });

                        // Закрытие по клику вне изображения
                        document.getElementById('imageModal').addEventListener('click', function(event) {
                            if (event.target === this) {
                                closeImageModal();
                            }
                        });
                    </script>

