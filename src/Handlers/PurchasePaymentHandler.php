<?php

namespace litvinjuan\LaravelPayments\Handlers;

use litvinjuan\LaravelPayments\Exceptions\InvalidGatewayException;
use litvinjuan\LaravelPayments\Exceptions\InvalidRequestException;
use litvinjuan\LaravelPayments\Gateways\GatewayFactory;
use litvinjuan\LaravelPayments\Gateways\PurchaseResponse;
use litvinjuan\LaravelPayments\Payments\Payment;

class PurchasePaymentHandler
{

    /**
     * @param Payment $payment
     * @return Payment
     * @throws InvalidRequestException
     * @throws InvalidGatewayException
     */
    public function handle(Payment $payment): Payment
    {
        $gateway = GatewayFactory::make($payment);

        if (! $gateway->supportsPurchase()) {
            throw InvalidRequestException::notSupported();
        }

        /** @var PurchaseResponse $response */
        $response = $gateway->purchase()->payment($payment)->send();

        $payment->state = $response->getState();
        $payment->save();

        return $payment;
    }

}
