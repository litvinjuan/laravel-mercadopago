<?php

use Illuminate\Support\Facades\Route;
use litvinjuan\MPPayments\Http\Controllers\PaymentController;

Route::get('/pay/{payable}', [PaymentController::class, 'form'])->name('form');
Route::post('/pay/{payable}', [PaymentController::class, 'pay'])->name('pay');
