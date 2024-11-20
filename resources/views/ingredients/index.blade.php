@extends('layout')
@section('title', 'Проверка состава')
@section('content')
    <div class="container mx-auto py-8 max-w-4xl">
        <div class="text-center mb-8">
            <h1 class="text-3xl font-bold text-pink-dark mb-4">Проверка состава на комедогенность</h1>
            <p class="text-gray-600">Введите состав косметического средства для анализа комедогенности ингредиентов</p>
        </div>

        <div class="bg-pink-light rounded-lg shadow-md p-6 mb-8">
            <form action="{{ route('ingredients.check') }}" method="POST">
                @csrf
                <div class="mb-6">
                    <label for="composition" class="block text-pink-dark font-medium mb-2">
                        Состав косметического средства
                    </label>
                    <p class="text-sm text-gray-600 mb-2">
                        Введите каждый ингредиент через запятую, например: "Aqua, Glycerin, Niacinamide"
                    </p>
                    <textarea
                        name="composition"  {{-- Имя поля совпадает с валидацией в контроллере --}}
                    id="composition"
                        rows="6"
                        class="w-full px-4 py-2 border border-pink-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-300"
                        placeholder="Введите состав..."
                        required>{{ old('composition') }}</textarea>
                    @error('composition')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex justify-center">
                    <button type="submit"
                            class="bg-pink-500 hover:bg-pink-600 text-white font-medium py-3 px-6 rounded-lg transition-colors">
                        Проверить состав
                    </button>
                </div>
            </form>
        </div>

        <div class="bg-white rounded-lg shadow-md p-6">
            <h2 class="text-xl font-bold text-pink-dark mb-4">Как это работает?</h2>
            <div class="space-y-4 text-gray-600">
                <p>✨ Система анализирует каждый ингредиент из состава на комедогенность</p>
                <p>✨ Комедогенность оценивается по шкале от 0 до 5:</p>
                <ul class="list-disc list-inside ml-4 space-y-2">
                    <li><span class="text-green-600 font-medium">0-1:</span> Безопасно для проблемной кожи</li>
                    <li><span class="text-yellow-600 font-medium">2-3:</span> Умеренно комедогенно</li>
                    <li><span class="text-red-600 font-medium">4-5:</span> Сильно комедогенно</li>
                </ul>
                <p>✨ Вы получите подробный анализ состава и рекомендации по использованию</p>
            </div>
        </div>
    </div>
@endsection
