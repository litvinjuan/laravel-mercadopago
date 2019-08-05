<?php

namespace litvinjuan\MPPayments;

class CreatePaymentHandler
{

    public function handle(PaymentPayload $payload): Payment
    {
        $payment = new Payment();
        $payment->state = PaymentState::defaultValue();
        $payment->payment_method_id = $payload->paymentMethodId();
        $payment->card_token = $payload->cardToken();
        $payment->price = $payload->payable()->getPayablePrice();
        $payment->description = $payload->payable()->getPayableDescription();

        $payment->payable()->associate($payload->payable());
        $payment->payer()->associate($payload->payable()->payer());

        $payment->save();

        return $payment;
    }

}
