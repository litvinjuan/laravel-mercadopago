<?php

namespace litvinjuan\MPPayments;

class CompletePaymentHandler
{

    public function handle(Payment $payment): Payment
    {
        $payment->state = PaymentState::COMPLETED;

        return $payment;
    }

}
