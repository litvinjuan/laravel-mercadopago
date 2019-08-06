<?php

namespace litvinjuan\LaravelPayments;

interface PaymentPayload
{

    public function paymentMethodId(): string;

    public function cardToken(): string;

    public function payable(): Payable;

}
