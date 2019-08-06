<?php

namespace litvinjuan\LaravelPayments\Payments;

use Illuminate\Database\Eloquent\Relations\MorphMany;

interface Payer
{

    public function getPayerEmail(): string;

    public function payments(): MorphMany;

}
