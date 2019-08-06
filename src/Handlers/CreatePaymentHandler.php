<?php

namespace litvinjuan\LaravelPayments\Handlers;

use litvinjuan\LaravelPayments\Payments\Payable;
use litvinjuan\LaravelPayments\Payments\Payment;
use litvinjuan\LaravelPayments\Payments\PaymentState;

class CreatePaymentHandler
{

    public function handle(Payable $payable): Payment
    {
        $payment = new Payment();
        $payment->state = PaymentState::defaultValue();
        $payment->price = $payable->getPayablePrice();
        $payment->description = $payable->getPayableDescription();
        $payment->provider = $payable->getPaymentProvider();

        $payment->payable()->associate($payable);
        $payment->payer()->associate($payable->payer());

        $payment->save();

        return $payment;
    }

}
