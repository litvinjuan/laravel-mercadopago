<?php

namespace litvinjuan\MPPayments;

interface PaymentPayload
{

    public function paymentMethodId(): string;

    public function cardToken(): string;

    public function payable(): Payable;

    public function payer(): Payer;

}
