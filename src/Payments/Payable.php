<?php

namespace litvinjuan\LaravelPayments\Payments;

use Illuminate\Contracts\Routing\UrlRoutable;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Money\Money;

interface Payable extends UrlRoutable
{

    public function getPayablePrice(): Money;

    public function getPayableDescription(): string;

    public function payer(): Payer;

    public function payment(): MorphOne;

    public function createPayment(): Payment;

}
