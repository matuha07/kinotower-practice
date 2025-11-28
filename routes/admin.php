<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\MainController;
use App\Http\Controllers\Admin\CountryController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\FilmController;
use App\Http\Controllers\Admin\FilmCategoryController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ReviewController;


use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return 'Hello Admin';
});

Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');

Route::middleware(['auth:admin'])->group(function() {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/', [MainController::class, 'index'])->name('home');
    Route::resource('countries', CountryController::class)->except('show');
    Route::resource('categories', CategoryController::class)->except('show');
    Route::resource('films', FilmController::class);
    Route::get('/films/{filmId}/categories', [FilmCategoryController::class, 'index'])->name('films.categories');
    Route::post('/films/{filmId}/categories', [FilmCategoryController::class, 'save'])->name('films.categories.save');
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::post('/users/{id}/destroy', [UserController::class, 'destroy'])->name('users.destroy');
    Route::post('/users/{id}/restore', [UserController::class, 'restore'])->name('users.restore');
    Route::get('/reviews', [ReviewController::class, 'index'])->name('reviews.index');
    Route::post('/reviews/{id}/approve', [ReviewController::class, 'approve'])->name('reviews.approve');
    Route::post('/reviews/{id}/reject', [ReviewController::class, 'reject'])->name('reviews.reject');
    Route::delete('/reviews/{id}', [ReviewController::class, 'destroy'])->name('reviews.destroy');
});

