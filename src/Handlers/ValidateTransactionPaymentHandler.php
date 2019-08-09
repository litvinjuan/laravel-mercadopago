<?php

namespace litvinjuan\LaravelPayments\Handlers;

use litvinjuan\LaravelPayments\Exceptions\InvalidGatewayException;
use litvinjuan\LaravelPayments\Exceptions\InvalidRequestException;
use litvinjuan\LaravelPayments\Gateways\GatewayFactory;
use litvinjuan\LaravelPayments\Payments\Payment;
use litvinjuan\LaravelPayments\Payments\PaymentState;

class ValidateTransactionPaymentHandler
{

    /**
     * @param Payment $payment
     * @return bool
     * @throws InvalidGatewayException
     * @throws InvalidRequestException
     */
    public function handle(Payment $payment): bool
    {
        if (! $payment->state->is(PaymentState::COMPLETED)) {
            return false;
        }

        if (! $payment->paid) {
            return false;
        }

        if (! $payment->paid->equals($payment->price)) {
            return false;
        }

        // Create Gateway from Factory
        $gateway = GatewayFactory::make($payment);

        // Verify the gateway supports this method
        if (! $gateway->supportsValidateTransaction()) {
            throw InvalidRequestException::notSupported();
        }

        // Create and send the request
        $response = $gateway->validateTransaction()->payment($payment)->send();

        return $response->validated();
    }

}
