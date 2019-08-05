<?php

use Illuminate\Support\Facades\Route;
use litvinjuan\MPPayments\Http\Controllers\PaymentController;

Route::prefix('/pay/{payable}')->middleware(['web'])->name('mppayments.')->group(function () {
    Route::get('/', [PaymentController::class, 'form'])->name('form');
    Route::post('/', [PaymentController::class, 'pay'])->name('pay');
});
