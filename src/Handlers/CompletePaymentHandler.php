<?php

namespace litvinjuan\LaravelPayments;

class CompletePaymentHandler
{

    public function handle(Payment $payment): Payment
    {
        $payment->state = PaymentState::COMPLETED;

        return $payment;
    }

}
