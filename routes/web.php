<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

Route::get('/', [TaskController::class, 'index'])->name('tasks.index');
Route::post('/task', [TaskController::class, 'store'])->name('tasks.store');
Route::put('/task/{id}', [TaskController::class, 'toggle'])->name('tasks.toggle');
Route::delete('/task/{id}', [TaskController::class, 'destroy'])->name('tasks.destroy');
