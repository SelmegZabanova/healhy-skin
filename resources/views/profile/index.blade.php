@extends('layout')

@section('title', 'Профиль')

@section('content')
    <div class="container mx-auto px-4">
        <div class="bg-white shadow rounded-lg p-6 max-w-2xl mx-auto">
            @if(session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4">
                    {{ session('success') }}
                </div>
            @endif

            <h2 class="text-2xl font-bold text-pink-dark mb-6">Профиль пользователя</h2>

                <div class="mb-6">
                    <div class="flex justify-center">
                        @if($user->avatar)
                            <img src="{{ asset('storage/avatars/' . $user->avatar) }}"
                                 alt="Avatar"
                                 class="rounded-full w-32 h-32 object-cover border-4 border-pink-light">
                        @else
                            <div class="rounded-full w-32 h-32 bg-pink-light flex items-center justify-center text-pink-dark border-4 border-pink-light">
                                {{ strtoupper(substr($user->name, 0, 2)) }}
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Добавим предпросмотр загружаемого изображения -->
                <script>
                    document.querySelector('input[name="avatar"]').addEventListener('change', function(e) {
                        if (this.files && this.files[0]) {
                            const reader = new FileReader();
                            reader.onload = function(e) {
                                const preview = document.querySelector('img') || document.createElement('img');
                                preview.src = e.target.result;
                                preview.alt = 'Avatar Preview';
                                preview.className = 'rounded-full w-32 h-32 object-cover border-4 border-pink-light';

                                const container = document.querySelector('.flex.justify-center');
                                if (!container.contains(preview)) {
                                    container.innerHTML = '';
                                    container.appendChild(preview);
                                }
                            }
                            reader.readAsDataURL(this.files[0]);
                        }
                    });
                </script>

            <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label class="block text-pink-dark mb-2">Фото профиля</label>
                    <input type="file"
                           name="avatar"
                           class="w-full border-2 border-pink-light rounded p-2">
                </div>

                <div class="mb-4">
                    <label class="block text-pink-dark mb-2">Имя</label>
                    <input type="text"
                           name="name"
                           value="{{ old('name', $user->name) }}"
                           class="w-full border-2 border-pink-light rounded p-2">
                    @error('name')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="block text-pink-dark mb-2">Email</label>
                    <input type="email"
                           name="email"
                           value="{{ old('email', $user->email) }}"
                           class="w-full border-2 border-pink-light rounded p-2">
                    @error('email')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="block text-pink-dark mb-2">Текущий пароль</label>
                    <input type="password"
                           name="current_password"
                           class="w-full border-2 border-pink-light rounded p-2">
                    @error('current_password')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="block text-pink-dark mb-2">Новый пароль</label>
                    <input type="password"
                           name="new_password"
                           class="w-full border-2 border-pink-light rounded p-2">
                    @error('new_password')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label class="block text-pink-dark mb-2">Подтверждение нового пароля</label>
                    <input type="password"
                           name="new_password_confirmation"
                           class="w-full border-2 border-pink-light rounded p-2">
                </div>

                <button type="submit"
                        class="w-full bg-pink-light text-pink-dark py-2 px-4 rounded hover:bg-pink-dark hover:text-white transition duration-200">
                    Обновить профиль
                </button>
            </form>
        </div>
    </div>
@endsection
