<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'category',
        'content',
        'images',
        'rating'
    ];

    protected $casts = [
        'images' => 'array',
         'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];

    // Связь с пользователем
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Категории отзывов
    public static function categories()
    {
        return [
            'уход за кожей',
            'макияж',
            'уход за волосами',
        ];
    }
    public function comments()
    {
        return $this->hasMany(ReviewComment::class)->orderBy('created_at', 'desc');
    }
}
