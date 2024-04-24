<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\WeatherController;
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

Route::get('/register', function () {return view('auth.signup');});
Route::get('/login', function () {return view('auth.login');})->name('login');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::middleware('auth')->group(function () {
    Route::get('/', function () {return view('weather');})->name('home');
    Route::get('/result', [WeatherController::class,'result'])->name('result');
    Route::post('/get-weather', [WeatherController::class, 'getWeather'])->name('getWeather');
});