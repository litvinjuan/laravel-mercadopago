<?php

use Illuminate\Support\Facades\Route;
use litvinjuan\MPPayments\PaymentController;

Route::get('/pay/{payable}', [PaymentController::class, 'form'])->name('form');
Route::post('/pay/{payable}', [PaymentController::class, 'pay'])->name('pay');
