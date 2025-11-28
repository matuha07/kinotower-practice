<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\FilmController;

Route::get('/films', [FilmController::class, 'index'])->name('api.films.index');
Route::get('/films/{id}', [FilmController::class, 'show'])->name('api.films.show');
