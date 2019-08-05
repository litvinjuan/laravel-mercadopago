<?php

namespace litvinjuan\LaravelMercadoPago;

use Money\Money;

trait Payable
{

    abstract public function getPayablePrice(): Money;

    abstract public function getPayableDescription(): string;

}
