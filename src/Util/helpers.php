<?php

namespace litvinjuan\LaravelPayments;

use Money\Currency;
use Money\Money;

if (! function_exists('money')) {
    function money(int $amount, $currency = null)
    {
        if (! $currency) {
            $currency = config('app.currency', 'ARS');
        }

        return new Money($amount, new Currency($currency));
    }
}


if (! function_exists('moneyFormat')) {
    function moneyFormat(Money $money)
    {
        return (new MoneyFormatter())->format($money);
    }
}
