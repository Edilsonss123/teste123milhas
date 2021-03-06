<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FlightController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::prefix('flight')->group(function () {
    Route::prefix('search')->group(function () {
        Route::get('/', [FlightController::class, 'searchFlight'])->name('flight.search');
        Route::get('/group', [FlightController::class, 'searchFlightsGrouped'])->name('flight.search.group');
    });
});
