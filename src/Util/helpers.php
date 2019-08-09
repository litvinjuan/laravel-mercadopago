<?php

use Money\Currency;
use Money\Money;

if (! function_exists('money')) {
    function money(?int $amount, $currency = null)
    {
        if (! $amount) {
            $amount = 0;
        }

        if (! $currency) {
            $currency = config('laravel-payments.currency', 'ARS');
        }

        return new Money($amount, new Currency($currency));
    }
}
