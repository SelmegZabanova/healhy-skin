<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    protected $fillable = [
        'name',
        'comedogenicity',
        'description'
    ];
    public function aliases()
    {
        return $this->hasMany(IngredientAlias::class);
    }


    /**
     * Получить уровень комедогенности в текстовом формате
     */
    public function getComedogenicityLevelText()
    {
        return match ($this->comedogenicity) {
            0 => 'Не комедогенный',
            1 => 'Низкий уровень',
            2 => 'Умеренно низкий',
            3 => 'Умеренный',
            4 => 'Умеренно высокий',
            5 => 'Высокий уровень',
            default => 'Неизвестно',
        };
    }
}
