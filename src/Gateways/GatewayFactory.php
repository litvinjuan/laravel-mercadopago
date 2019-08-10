<?php

namespace litvinjuan\LaravelPayments\Gateways;

use litvinjuan\LaravelPayments\Exceptions\InvalidGatewayException;
use litvinjuan\LaravelPayments\Payments\Payment;

class GatewayFactory
{

    /**
     * Returns an instance of a GatewayInterface corresponding to the given payment
     *
     * @param Payment|null $payment
     * @return AbstractGateway
     * @throws InvalidGatewayException
     */
    public static function make(Payment $payment = null): AbstractGateway
    {
        // Get the Gateway Class from the config file using the payment's gateway_name attribute, or the default gateway if none was set.
        $gateway = optional($payment)->gateway_name ?? config('laravel-payments.default_gateway');
        $gatewayClass = config('laravel-payments.gateways')[$gateway]['gateway'];

        // Check the Gateway Class exists
        if (! class_exists($gatewayClass)) {
            throw InvalidGatewayException::notFound();
        }

        // Create and return a new instance of the Gateway Class
        return new $gatewayClass();
    }

}
