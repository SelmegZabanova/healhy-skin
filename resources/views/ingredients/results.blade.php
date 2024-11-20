@extends('layout')

@section('title', 'Результаты проверки состава')

@section('content')
    <div class="container mx-auto py-8 max-w-4xl">
        <h1 class="text-3xl font-bold text-pink-dark mb-8">Результаты анализа состава</h1>

        @if($notFoundIngredients->isNotEmpty())
            <div class="bg-yellow-50 border border-yellow-200 rounded-lg p-6 mb-8">
                <h2 class="text-lg font-medium text-yellow-800 mb-4">Ингредиенты не найденные в базе данных:</h2>
                <ul class="list-disc list-inside text-yellow-700 space-y-1">
                    @foreach($notFoundIngredients as $ingredient)
                        <li>{{ $ingredient }}</li>
                    @endforeach
                </ul>
                <p class="mt-4 text-sm text-yellow-600">
                    * Для этих ингредиентов у нас пока нет данных о комедогенности.
                    Общая оценка комедогенности рассчитана только для найденных ингредиентов.
                </p>
            </div>
        @endif

        <!-- Общая оценка -->
        <div class="bg-white rounded-lg shadow-md p-6 mb-8">
            <h2 class="text-xl font-bold text-pink-dark mb-4">Общая оценка комедогенности</h2>
            <div class="flex items-center justify-center mb-4">
                <div class="text-center">
                    @if($foundIngredients->isEmpty())
                        <div class="text-2xl text-gray-500 mb-2">
                            Нет данных
                        </div>
                        <div class="text-gray-600">
                            Не найдено известных комедогенных ингредиентов
                        </div>
                    @else
                        <div class="text-4xl font-bold mb-2
                        {{ $totalComedogenicity >= 4 ? 'text-red-500' :
                          ($totalComedogenicity >= 2 ? 'text-yellow-500' : 'text-green-500') }}">
                            {{ number_format($totalComedogenicity, 1) }}
                        </div>
                        <div class="text-gray-600">
                            {{ $totalComedogenicity >= 1 ? 'Высокая комедогенность' :
                               ($totalComedogenicity >= 0.5 ? 'Средняя комедогенность' : 'Низкая комедогенность') }}
                        </div>
                    @endif
                </div>
            </div>
            <div class="text-gray-600 text-center">
                @if($foundIngredients->isNotEmpty())
                    @if($totalComedogenicity >= 1)
                        Не рекомендуется для проблемной и склонной к акне кожи
                    @elseif($totalComedogenicity >= 0.2)
                        Использовать с осторожностью при проблемной коже
                    @else
                        Безопасно для большинства типов кожи
                    @endif
                @endif
            </div>
        </div>

        <!-- Найденные ингредиенты -->
        <div class="bg-white rounded-lg shadow-md p-6 mb-8">
            <h2 class="text-xl font-bold text-pink-dark mb-4">Обнаруженные комедогенные ингредиенты</h2>

            @if($groupedIngredients->isEmpty())
                <div class="text-center text-gray-500 py-4">
                    Комедогенных ингредиентов не обнаружено
                </div>
            @else
                @if($groupedIngredients->has('high'))
                    <div class="mb-6">
                        <h3 class="font-medium text-red-600 mb-2">Высокая комедогенность (4-5)</h3>
                        <div class="bg-red-50 rounded-lg p-4">
                            @foreach($groupedIngredients['high'] as $ingredient)
                                <div class="mb-2 last:mb-0">
                                    <div class="font-medium">
                                        @php
                                            $originalName = $originalNames->first(function($name) use ($ingredient) {
                                                return str_contains(
                                                    preg_replace('/\s*\([^)]*\)/', '', trim($name)),
                                                    $ingredient->name
                                                );
                                            }) ?? $ingredient->name;
                                        @endphp
                                        {{ $originalName }}
                                    </div>
                                    <div class="text-sm text-gray-600">
                                        Уровень комедогенности: {{ $ingredient->comedogenicity }}/5
                                    </div>
                                    @if($ingredient->description)
                                        <div class="text-sm text-gray-600">{{ $ingredient->description }}</div>
                                    @endif
                                    @if(isset($ingredientAliases[$ingredient->id]) && count($ingredientAliases[$ingredient->id]) > 0)
                                        <div class="text-sm text-gray-500 mt-1">
                                            Также известен как: {{ implode(', ', $ingredientAliases[$ingredient->id]) }}
                                        </div>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif

                @if($groupedIngredients->has('medium'))
                    <div class="mb-6">
                        <h3 class="font-medium text-yellow-600 mb-2">Средняя комедогенность (2-3)</h3>
                        <div class="bg-yellow-50 rounded-lg p-4">
                            @foreach($groupedIngredients['medium'] as $ingredient)
                                <div class="mb-2 last:mb-0">
                                    <div class="font-medium">
                                        @php
                                            $originalName = $originalNames->first(function($name) use ($ingredient) {
                                                return str_contains(
                                                    preg_replace('/\s*\([^)]*\)/', '', trim($name)),
                                                    $ingredient->name
                                                );
                                            }) ?? $ingredient->name;
                                        @endphp
                                        {{ $originalName }}
                                    </div>
                                    <div class="text-sm text-gray-600">
                                        Уровень комедогенности: {{ $ingredient->comedogenicity }}/5
                                    </div>
                                    @if($ingredient->description)
                                        <div class="text-sm text-gray-600">{{ $ingredient->description }}</div>
                                    @endif
                                    @if(isset($ingredientAliases[$ingredient->id]) && count($ingredientAliases[$ingredient->id]) > 0)
                                        <div class="text-sm text-gray-500 mt-1">
                                            Также известен как: {{ implode(', ', $ingredientAliases[$ingredient->id]) }}
                                        </div>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif

                @if($groupedIngredients->has('low'))
                    <div>
                        <h3 class="font-medium text-green-600 mb-2">Низкая комедогенность (0-1)</h3>
                        <div class="bg-green-50 rounded-lg p-4">
                            @foreach($groupedIngredients['low'] as $ingredient)
                                <div class="mb-2 last:mb-0">
                                    <div class="font-medium">
                                        @php
                                            $originalName = $originalNames->first(function($name) use ($ingredient) {
                                                return str_contains(
                                                    preg_replace('/\s*\([^)]*\)/', '', trim($name)),
                                                    $ingredient->name
                                                );
                                            }) ?? $ingredient->name;
                                        @endphp
                                        {{ $originalName }}
                                    </div>
                                    <div class="text-sm text-gray-600">
                                        Уровень комедогенности: {{ $ingredient->comedogenicity }}/5
                                    </div>
                                    @if($ingredient->description)
                                        <div class="text-sm text-gray-600">{{ $ingredient->description }}</div>
                                    @endif
                                    @if(isset($ingredientAliases[$ingredient->id]) && count($ingredientAliases[$ingredient->id]) > 0)
                                        <div class="text-sm text-gray-500 mt-1">
                                            Также известен как: {{ implode(', ', $ingredientAliases[$ingredient->id]) }}
                                        </div>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif
            @endif
        </div>

        <div class="flex justify-center space-x-4">
            <button onclick="window.print()"
                    class="bg-gray-500 hover:bg-gray-600 text-white font-medium py-2 px-6 rounded-lg transition-colors">
                Распечатать результаты
            </button>
            <a href="{{ route('ingredients') }}"
               class="bg-pink-500 hover:bg-pink-600 text-white font-medium py-2 px-6 rounded-lg transition-colors">
                Проверить другой состав
            </a>
        </div>
    </div>
@endsection
