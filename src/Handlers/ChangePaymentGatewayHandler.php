<?php

namespace litvinjuan\LaravelPayments\Handlers;

use litvinjuan\LaravelPayments\Payments\Payment;

class ChangePaymentGatewayHandler
{

    /**
     * Change the payment's gateway
     *
     * @param Payment $payment
     * @param string $gateway
     * @return Payment
     */
    public function handle(Payment $payment, string $gateway): Payment
    {
        $payment->setGateway($gateway);
        return $payment;
    }

}
