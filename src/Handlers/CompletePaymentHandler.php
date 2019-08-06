<?php

namespace litvinjuan\LaravelPayments\Handlers;

use litvinjuan\LaravelPayments\Payments\Payment;
use litvinjuan\LaravelPayments\Payments\PaymentState;

class CompletePaymentHandler
{

    public function handle(Payment $payment): Payment
    {
        $payment->state = PaymentState::COMPLETED;
        $payment->save();

        return $payment;
    }

}
