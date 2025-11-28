<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\FilmController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\GenderController;
use App\Http\Controllers\Api\CountryController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\ReviewController;
use App\Http\Controllers\Api\RatingController;


Route::get('/films', [FilmController::class, 'index'])->name('api.films.index');
Route::get('/films/{id}', [FilmController::class, 'show'])->name('api.films.show');
Route::get('/categories', [CategoryController::class, 'index'])->name('api.categories.index');
Route::get('/categories/{id}', [CategoryController::class, 'show'])->name('api.categories.show');
Route::get("/genders", [GenderController::class, "index"]);
Route::get("/countries", [CountryController::class, "index"]);
Route::get("/users", [UserController::class, "index"]);
Route::get("/users/{userId}", [UserController::class, "show"]);
Route::get("/users/{userId}/reviews", [ReviewController::class, "index"]);
Route::get("/users/{userId}/reviews/{reviewId}", [ReviewController::class, "show"]);
Route::get("/users/{userId}/ratings", [RatingController::class, "index"]);
Route::get("/users/{userId}/ratings/{ratingId}", [RatingController::class, "show"]);







