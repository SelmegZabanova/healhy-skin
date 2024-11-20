<?php


use App\Http\Controllers\CommentController;
use App\Http\Controllers\IngredientController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReviewCommentController;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\Admin\AdminPostController;
use App\Http\Controllers\ReviewController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;


Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/', [AdminPostController::class, 'index'])->name('admin.welcome');
    Route::post('/post', [AdminPostController::class, 'save'])->name('save.post');
    Route::put('/posts/{post}', [AdminPostController::class, 'update'])->name('update.post');
    Route::delete('/posts/{post}', [AdminPostController::class, 'delete'])->name('delete.post');
    Route::get('/post/{id}', [AdminPostController::class, 'about'])->name('admin.post');
});
Route::get('/', [MainController::class, 'index'])->name('welcome');


Route::get('/register', [RegistrationController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegistrationController::class, 'register'])->name('register');


Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');



Route::get('/post/{id}', [MainController::class, 'about'])->name('post');


Route::get('/reviews',[ReviewController::class,'index'])->name('reviews');
Route::get('/review/{id}',[ReviewController::class,'show'])->name('reviews.show');
Route::get('reviews/create',[ReviewController::class,'create'])->name('reviews.create');
Route::post('reviews',[ReviewController::class,'store'])->name('reviews.store');
Route::get('reviews/edit/{id}',[ReviewController::class,'edit'])->name('reviews.edit');
Route::put('reviews/update/{id}',[ReviewController::class,'update'])->name('reviews.update');
Route::delete('reviews/destroy/{id}',[ReviewController::class,'destroy'])->name('reviews.destroy');
Route::get('/my-reviews', [ReviewController::class, 'myReviews'])
    ->name('reviews.my')
    ->middleware('auth');


Route::get('/ingredients', [IngredientController::class, 'index'])->name('ingredients');
Route::post('/ingredients/check', [IngredientController::class, 'check'])->name('ingredients.check');

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

// Обработка перехода по ссылке верификации
Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect('/')->with('success', 'Email подтверждён!');
})->middleware(['auth', 'signed'])->name('verification.verify');

// Повторная отправка письма
Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
    return back()->with('message', 'Письмо для подтверждения отправлено!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
});


Route::post('/posts/{post}/comments', [CommentController::class, 'store'])->name('comments.store');
Route::delete('/comments/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy');

Route::post('/reviews/{review}/comments', [ReviewCommentController::class, 'store'])->name('review.comments.store');
Route::delete('/review-comments/{comment}', [ReviewCommentController::class, 'destroy'])->name('review.comments.destroy');



