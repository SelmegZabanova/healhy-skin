<?php

namespace App\Http\Controllers;

use App\Models\Ingredient;
use App\Models\IngredientAlias;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class IngredientController extends BaseController
{
    public function index()
    {
        $ingredients = Ingredient::orderBy('comedogenicity', 'desc')->paginate(20);
        return view('ingredients.index', compact('ingredients'));
    }

    public function check(Request $request)
    {
        $request->validate([
            'composition' => 'required|string|min:3',
        ], [
            'composition.required' => 'Пожалуйста, введите состав косметического средства',
            'composition.min' => 'Состав слишком короткий',
        ]);

        // Разбиваем введенный текст на отдельные ингредиенты и очищаем их
        $inputIngredients = collect(explode(',', $request->composition))
            ->map(function($item) {
                // Удаляем пробелы
                $item = trim($item);

                // Удаляем процентное содержание в скобках
                $item = preg_replace('/\s*\([^)]*%[^)]*\)/', '', $item);

                // Удаляем любые другие скобки с содержимым
                $item = preg_replace('/\s*\([^)]*\)/', '', $item);

                // Удаляем проценты без скобок
                $item = preg_replace('/\s*\d+(\.\d+)?%/', '', $item);

                // Удаляем множественные пробелы
                $item = preg_replace('/\s+/', ' ', $item);

                return trim($item);
            })
            ->filter(fn($item) => !empty($item))
            ->unique()
            ->values();

        // Проверяем, что есть хотя бы один ингредиент после очистки
        if ($inputIngredients->isEmpty()) {
            return back()
                ->withInput()
                ->withErrors(['composition' => 'Пожалуйста, введите корректный состав через запятую']);
        }

        // Ищем совпадения в базе по основным названиям и алиасам
        $foundIngredients = Ingredient::where(function($query) use ($inputIngredients) {
            $query->whereIn('name', $inputIngredients)
                ->orWhereHas('aliases', function($query) use ($inputIngredients) {
                    $query->whereIn('name', $inputIngredients);
                });
        })->get();

        // Получаем все возможные названия (основные + алиасы) для найденных ингредиентов
        $allNames = $foundIngredients->flatMap(function($ingredient) {
            return collect([$ingredient->name])
                ->concat($ingredient->aliases->pluck('name'));
        });

        // Находим ингредиенты, которых нет в базе
        $notFoundIngredients = $inputIngredients->diff($allNames);

        // Добавляем информацию о процентном содержании для отображения
        $inputIngredientsWithPercent = collect(explode(',', $request->composition))
            ->map(fn($item) => trim($item))
            ->filter(fn($item) => !empty($item))
            ->values();

        // Вычисляем общий уровень комедогенности
        $totalComedogenicity = $foundIngredients->average('comedogenicity') ?? 0;

        // Группируем ингредиенты по уровню комедогенности
        $groupedIngredients = $foundIngredients->groupBy(function($ingredient) {
            if ($ingredient->comedogenicity >= 4) return 'high';
            if ($ingredient->comedogenicity >= 2) return 'medium';
            return 'low';
        });

        // Собираем все алиасы для каждого найденного ингредиента
        $ingredientAliases = $foundIngredients->mapWithKeys(function($ingredient) {
            $aliases = $ingredient->aliases->pluck('name')->toArray();
            return [$ingredient->id => $aliases];
        });

        // Создаем карту соответствия оригинальных названий и очищенных
        $originalNames = collect(explode(',', $request->composition))
            ->map(fn($item) => trim($item))
            ->filter(fn($item) => !empty($item))
            ->values();

        return view('ingredients.results', compact(
            'foundIngredients',
            'inputIngredients',
            'notFoundIngredients',
            'totalComedogenicity',
            'groupedIngredients',
            'ingredientAliases',
            'originalNames'
        ));
    }
}
