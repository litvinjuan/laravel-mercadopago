<?php

namespace litvinjuan\LaravelPayments\Gateways;

use litvinjuan\LaravelPayments\Payments\Payment;

class GatewayFactory
{

    /**
     * @param Payment $payment
     * @return GatewayInterface
     */
    public static function make(Payment $payment): GatewayInterface
    {
        $gatewayClass = config('laravel-payments.gateways')[$payment->provider];

        return new $gatewayClass($payment->config);
    }

    /**
     * @param $gateway
     * @return bool
     */
    public static function validate(string $gateway): bool
    {
        $gatewayClass = config('laravel-payments.gateways')[$gateway];

        if (! $gatewayClass) {
            return false;
        }

        if (! class_exists($gateway)) {
            return false;
        }

        return true;
    }


}
