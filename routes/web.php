<?php

use App\Http\Controllers\QuoteController;
use App\Http\Controllers\ReservationController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/quote', function () {
    return view('quote');
})->name('quote');

Route::post('/quote', QuoteController::class)
    ->middleware('throttle:10,1')
    ->name('quote.store');

Route::view('/reservations', 'reservations')->name('reservations');

Route::post('/reservations', ReservationController::class)
    ->middleware('throttle:10,1')
    ->name('reservations.store');
