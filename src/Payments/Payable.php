<?php

namespace litvinjuan\LaravelPayments\Payments;

use Illuminate\Database\Eloquent\Relations\MorphOne;
use Money\Money;

interface Payable
{

    public function getPayablePrice(): Money;

    public function getPayableDescription(): string;

    public function payer(): Payer;

    public function payment(): MorphOne;

    public function createPayment(): Payment;

}
