<?php

use Illuminate\Support\Facades\Route;

Route::get('/pay/{payable}', [PaymentController::class, 'form'])->name('form');
Route::post('/pay/{payable}', [PaymentController::class, 'pay'])->name('pay');
