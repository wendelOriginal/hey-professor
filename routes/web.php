<?php

use App\Http\Controllers\{DashboardController, ProfileController, Question, QuestionController};
use Illuminate\Support\Facades\{Route};

Route::get('/', function () {
    if (app()->isLocal()) {

        auth()->guard()->loginUsingId(1);

        return to_route('dashboard');
    }

    return view('welcome');
});

Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', DashboardController::class)->name('dashboard');

    Route::post('question/store', [QuestionController::class, 'store'])->name('question.store');

    Route::post('question/like/{question}', Question\LikeQUestionController::class)->name('question.like');
    Route::post('question/unlike/{question}', Question\UnlikeController::class)->name('question.unlike');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
