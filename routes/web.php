<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\ScreenController;
use App\Http\Controllers\ShowtimeController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\TheaterController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::resource('genres', GenreController::class);
Route::get('genres/{genre}/delete', [GenreController::class, 'delete'])->name('genres.delete');

Route::resource('movies', MovieController::class);
Route::resource('theaters', TheaterController::class);
Route::resource('screens', ScreenController::class);
Route::resource('showtimes', controller: ShowtimeController::class);
Route::resource('bookings', controller: BookingController::class);
Route::resource('users', controller: UserController::class);

Route::prefix('feedbacks')->group(function () {
    Route::get('/', [FeedbackController::class, 'index'])->name('feedbacks.index');
    Route::delete('{feedback}', [FeedbackController::class, 'destroy'])->name('feedbacks.destroy');
});


Route::resource('test', TestController::class);
