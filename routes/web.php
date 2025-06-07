<?php

use App\Http\Controllers\OrderController;
use App\Http\Controllers\LeadController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RetoController;

Route::get('/', function () {
    return view('index');
})->name('home');

Route::get('/reto-30dias', [RetoController::class, 'show'])->name('reto-30dias');
Route::post('/submit-reto', [RetoController::class, 'submitForm'])->name('submit-reto');

Route::resource('orders', OrderController::class);
Route::resource('leads', LeadController::class);
Route::patch('/leads/{lead}/status', [LeadController::class, 'updateStatus'])->name('leads.updateStatus');
