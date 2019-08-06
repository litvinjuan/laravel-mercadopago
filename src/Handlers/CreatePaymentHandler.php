<?php

namespace litvinjuan\LaravelPayments;

class CreatePaymentHandler
{

    public function handle(Payable $payable): Payment
    {
        $payment = new Payment();
        $payment->state = PaymentState::defaultValue();
        $payment->price = $payable->getPayablePrice();
        $payment->description = $payable->getPayableDescription();

        $payment->payable()->associate($payable);
        $payment->payer()->associate($payable->payer());

        $payment->save();

        return $payment;
    }

}
