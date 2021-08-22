<?php

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

Route::get('/', [\App\Http\Controllers\OrderController::class,'index']);
Route::get('/order/{order_id}', [\App\Http\Controllers\OrderController::class,'show']);
Route::post('token', [App\Http\Controllers\PaymentController::class,'token'])->name('token');
Route::get('/create-payment', [App\Http\Controllers\PaymentController::class,'createPayment'])->name('createPayment');
Route::get('/execute-payment', [App\Http\Controllers\PaymentController::class,'executePayment'])->name('executePayment');
