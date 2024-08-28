<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::prefix('/task')->name('task.')->group(function () {
        Route::get('/view', [TaskController::class, 'view'])->name('view');
        Route::get('/add', [TaskController::class, 'add'])->name('add');
        Route::post('/store', [TaskController::class, 'store'])->name('store');
        Route::get('/edit/{task}', [TaskController::class, 'edit'])->name('edit');
        Route::post('/update/{task}', [TaskController::class, 'update'])->name('update');
        Route::get('/delete/{task}', [TaskController::class, 'delete'])->name('delete');
        Route::get('/filter', [TaskController::class, 'filter'])->name('filter');
    });
});
Route::post('/logout', function () {
    Auth::logout();
    return redirect('/login');
})->name('logout');

require __DIR__.'/auth.php';

