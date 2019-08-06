<?php

use Illuminate\Support\Facades\Route;
use litvinjuan\LaravelPayments\Http\Controllers\PaymentController;

Route::prefix('/payments/{payable}')->name('laravel-payments.')->group(function () {
    Route::post('/begin', [PaymentController::class, 'begin'])->name('begin');
    Route::post('/pay', [PaymentController::class, 'pay'])->name('pay');
});
