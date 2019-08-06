<?php

namespace litvinjuan\LaravelPayments;

use Illuminate\Contracts\Routing\UrlRoutable;
use Money\Money;

interface Payable extends UrlRoutable
{

    public function getPayablePrice(): Money;

    public function getPayableDescription(): string;

    public function payer(): Payer;

}
