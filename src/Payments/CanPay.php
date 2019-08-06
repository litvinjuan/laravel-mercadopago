<?php

namespace litvinjuan\LaravelPayments\Payments;

use Illuminate\Database\Eloquent\Relations\MorphMany;

trait CanPay
{

    public function payments(): MorphMany
    {
        return $this->morphMany(Payment::class, 'payer');
    }

}
