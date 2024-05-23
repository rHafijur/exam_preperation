<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChapterController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SubjectController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::prefix('catalogue')->group(function () {
        Route::resource('subject', SubjectController::class);
        Route::resource('chapter', ChapterController::class);
        Route::resource('topic', SubjectController::class);
    });
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
