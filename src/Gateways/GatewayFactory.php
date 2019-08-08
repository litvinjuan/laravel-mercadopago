<?php

namespace litvinjuan\LaravelPayments\Gateways;

use litvinjuan\LaravelPayments\Exceptions\InvalidGatewayException;
use litvinjuan\LaravelPayments\Payments\Payment;

class GatewayFactory
{

    /**
     * @param Payment $payment
     * @return AbstractGateway
     * @throws InvalidGatewayException
     */
    public static function make(Payment $payment = null): AbstractGateway
    {
        $gatewayClass = config('laravel-payments.gateways')[optional($payment)->data['provider'] ?? config('laravel-payments.default_gateway')];

        if (! isset($gatewayClass)) {
            throw InvalidGatewayException::notFound();
        }

        return new $gatewayClass();
    }

}
