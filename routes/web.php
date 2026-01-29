<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BoardController;
use App\Http\Controllers\TasksController;


Route::get('/', function () {
    return view('tasks.index');
})->name('tasks.index');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/statistics', function () {
    return view('statistics');
})->middleware('auth')->name('statistics');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/board', [BoardController::class, 'index'])->name('tasks.index');
    Route::get('/tasks', [TasksController::class, 'index'])->name('tasks.index');

});

require __DIR__.'/auth.php';
