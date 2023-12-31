<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\DestinationController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [AuthController::class, 'index'])->name('login');
Route::post('/', [AuthController::class, 'postLogin'])->name('post.login');
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::resource('cities', CityController::class);
Route::resource('customers', CustomerController::class);
Route::resource('booking', BookingController::class);
Route::resource('destination', DestinationController::class);
