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
use App\Http\Controllers\Api\AuthController;



Route::get('/films', [FilmController::class, 'index'])->name('api.films.index');
Route::get('/films/{id}', [FilmController::class, 'show'])->name('api.films.show');
Route::get('/categories', [CategoryController::class, 'index'])->name('api.categories.index');
Route::get('/categories/{id}', [CategoryController::class, 'show'])->name('api.categories.show');
Route::get("/genders", [GenderController::class, "index"]);
Route::get("/countries", [CountryController::class, "index"]);
Route::post('/auth/signup', [AuthController::class, 'signup'])->name('api.auth.signup');
Route::post('/auth/signin', [AuthController::class, 'signin'])->name('api.auth.signin');
Route::middleware('auth:api')->group(function () {
    Route::get("/users", [UserController::class, "index"]);
    Route::get("/users/{userId}", [UserController::class, "show"]);

    Route::post('/auth/signout', [AuthController::class, 'signout'])->name('api.auth.signout');

    Route::post('/users/{userId}/reviews', [ReviewController::class, 'store'])->name('api.reviews.store');
    Route::get('/users/{userId}/reviews', [ReviewController::class, 'index'])->name('api.reviews.index');
    Route::delete('/users/{userId}/reviews/{reviewId}', [ReviewController::class, 'destroy'])->name('api.reviews.destroy');

    Route::get('/users/{userId}/ratings', [RatingController::class, 'index'])->name('api.ratings.index');
    Route::post('/users/{userId}/ratings', [RatingController::class, 'store'])->name('api.ratings.store');

    Route::get('/users/{userId}/ratings/{ratingId}', [RatingController::class, 'show'])->name('api.ratings.show');
});






