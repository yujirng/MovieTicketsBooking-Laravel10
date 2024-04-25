<?php

use App\Http\Controllers\AppController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::prefix('admin')->name('admin.')->group(function () {
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
});

Route::get('/', [MovieController::class, 'indexMovie'])->name('app.index');
Route::get('/details/{id}', [MovieController::class, 'detailMovie'])->name('movie.details');
Route::get('/allmovies', [MovieController::class, 'allMovies'])->name('app.movies.all');
Route::get('/about', [AppController::class, 'about'])->name('app.about');
Route::get('/contacts', [AppController::class, 'contacts'])->name('app.contacts');
Route::get('/feedback', [AppController::class, 'feedback'])->name('app.feedback');
Route::get('/movies/fetch', [MovieController::class, 'fetch'])->name('movies.fetch');
Route::get('/showtimes/fetch', [ShowtimeController::class, 'getShowtimes'])->name('showtimes.fetch');

Route::get('/seatbooking', [AppController::class, 'seatbooking'])->name('seatbooking');
Route::post('/payment/process', [AppController::class, 'showBookingSummary'])->name('payment');
Route::post('/ticket_show', [AppController::class, 'paymentForm'])->name('paymentForm');

Route::get('/login', [AppController::class, 'seatbooking'])->name('login');
