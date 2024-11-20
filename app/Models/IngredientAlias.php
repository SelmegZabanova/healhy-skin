<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IngredientAlias extends Model
{
    protected $fillable = ['ingredient_id', 'name'];

    public function ingredient()
    {
        return $this->belongsTo(Ingredient::class);
    }
}
