<?php

namespace litvinjuan\LaravelMercadoPago;

use Money\Money;

interface Payable
{

    public function getPayablePrice(): Money;

    public function getPayableDescription(): string;

}
