<?php

namespace litvinjuan\LaravelPayments\Handlers;

use litvinjuan\LaravelPayments\Payments\Payment;
use litvinjuan\LaravelPayments\Payments\PaymentState;

class CheckPaymentHandler
{

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

        return true;
    }

}
