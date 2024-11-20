<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::check()) {
            return redirect()->route('login')
                ->with('error', 'Необходимо войти в систему.');
        }

        if (!Auth::user()->isAdmin()) {  // Используем метод isAdmin()
            return redirect()->route('welcome')
                ->with('error', 'Доступ запрещен. Требуются права администратора.');
        }

        return $next($request);
    }
}
