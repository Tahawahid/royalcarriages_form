<?php

use App\Http\Controllers\BestLimoQuoteController;
use App\Http\Controllers\BestLimoReservationController;
use App\Http\Controllers\HoustonQuoteController;
use App\Http\Controllers\HoustonReservationController;
use App\Http\Controllers\QuoteController;
use App\Http\Controllers\ReservationController;
use Illuminate\Support\Facades\Route;

// ROYAL CARRIAGES ROUTES (Default/Main)
Route::get('/', function () {
    return view('royal-quote');
})->name('royal.quote');

Route::post('/', QuoteController::class)
    ->middleware('throttle:10,1')
    ->name('royal.quote.store');

Route::view('/reservations', 'royal-reservations')->name('royal.reservations');

Route::post('/reservations', ReservationController::class)
    ->middleware('throttle:10,1')
    ->name('royal.reservations.store');

// BEST LIMOUSINES ROUTES
Route::get('/best-limo', function () {
    return view('quote');
})->name('best-limo.quote');

Route::post('/best-limo', BestLimoQuoteController::class)
    ->middleware('throttle:10,1')
    ->name('best-limo.quote.store');

Route::view('/best-limo/reservations', 'reservations')->name('best-limo.reservations');

Route::post('/best-limo/reservations', BestLimoReservationController::class)
    ->middleware('throttle:10,1')
    ->name('best-limo.reservations.store');

// LIMO SERVICE IN HOUSTON ROUTES
Route::get('/houston', function () {
    return view('houston-quote');
})->name('houston.quote');

Route::post('/houston', HoustonQuoteController::class)
    ->middleware('throttle:10,1')
    ->name('houston.quote.store');

Route::view('/houston/reservations', 'houston-reservations')->name('houston.reservations');

Route::post('/houston/reservations', HoustonReservationController::class)
    ->middleware('throttle:10,1')
    ->name('houston.reservations.store');

// LEGACY/DEBUG ROUTES
Route::get('/debug-reservations', function () {
    try {
        return view('reservations');
    } catch (Exception $e) {
        return response()->json([
            'error' => $e->getMessage(),
            'file'  => $e->getFile(),
            'line'  => $e->getLine(),
            'trace' => $e->getTraceAsString(),
        ]);
    }
});
