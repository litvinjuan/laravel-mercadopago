<?php

namespace litvinjuan\LaravelPayments\Handlers;

use Carbon\Carbon;
use litvinjuan\LaravelPayments\Payments\Payment;
use litvinjuan\LaravelPayments\Payments\PaymentState;

class CompletePaymentHandler
{

    public function handle(Payment $payment): Payment
    {
        // @TODO: Make payment

        $payment->paid = $payment->price;
        $payment->state = PaymentState::COMPLETED;
        $payment->completed_at = Carbon::now();
        $payment->save();

        return $payment;
    }

}
