<?php

namespace App\Policies;

use App\Models\Review;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ReviewPolicy
{
    use HandlesAuthorization;

    /**
     * Определяет, может ли пользователь обновлять отзыв
     */
    public function update(User $user, Review $review)
    {
        return $user->id === $review->user_id;
    }

    /**
     * Определяет, может ли пользователь удалять отзыв
     */
    public function delete(User $user, Review $review)
    {
        return $user->id === $review->user_id;
    }

    /**
     * Определяет, может ли пользователь создавать отзывы
     */
    public function create(User $user)
    {
        return true; // Все авторизованные пользователи могут создавать отзывы
    }

    /**
     * Определяет, может ли пользователь просматривать отзыв
     */
    public function view(User $user, Review $review)
    {
        return true; // Все пользователи могут просматривать отзывы
    }
}
