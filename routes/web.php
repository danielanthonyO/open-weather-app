<?php

use App\Http\Controllers\WeatherController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/weather', function () {
//     return view('weather');
// })->name('weather');

Route::get('/weather', [WeatherController::class, 'index'])->name('weather');




// php artisan make:controller WeatherController
// localhost:8000/