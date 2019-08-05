<?php

namespace litvinjuan\MPPayments;

use Money\Money;

trait Payable
{

    abstract public function getPayablePrice(): Money;

    abstract public function getPayableDescription(): string;

}
