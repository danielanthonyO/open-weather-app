<?php

use App\Http\Controllers\WeatherController;
use Illuminate\Support\Facades\Route;

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/', [WeatherController::class, 'index'])->name('weather');




// php artisan make:controller WeatherController
// localhost:8000/