<?php

use App\Http\Controllers\MoviesController;
use App\Http\Controllers\SubscriptionController;
use Illuminate\Support\Facades\Route;

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


Route::get('/', [MoviesController::class, 'index'])->name('index');

Route::get('/single/{id}', [MoviesController::class, 'show'])->name('show')->middleware('check-subscription');


Route::get('/plans', [SubscriptionController::class, 'plans'])->name('plans');
Route::get('/payment', [SubscriptionController::class, 'payment'])->name('payment');
Route::post('/subscribe', [SubscriptionController::class, 'subscribe'])->name('subscribe');


Route::get('/test', [SubscriptionController::class, 'test'])->name('test');



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
