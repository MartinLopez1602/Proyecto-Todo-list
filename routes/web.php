<?php

use App\Models\TodoItem;
use App\Http\Controllers\TodoItemController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/' , function () {
    return view('welcome');
})->name('home');

Route::middleware(['auth', 'verified'])->group( function () {

    Route::get('/dashboard', [TodoItemController::class, 'index'])->name('dashboard');

    Route::resource('TodoItem', TodoItemController::class);
    
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
