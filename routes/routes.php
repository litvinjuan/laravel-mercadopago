<?php

use Illuminate\Support\Facades\Route;

Route::get('testing-payment-route', function () {
    return view('mppayments::form');
});
