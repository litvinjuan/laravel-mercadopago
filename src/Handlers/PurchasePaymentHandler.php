<?php

namespace litvinjuan\LaravelPayments\Handlers;

use litvinjuan\LaravelPayments\Payments\Payment;
use litvinjuan\LaravelPayments\Payments\PaymentState;

class PurchasePaymentHandler
{

    public function handle(Payment $payment): Payment
    {
        $payment->state = PaymentState::PURCHASED;
        $payment->save();

        return $payment;
    }

}
