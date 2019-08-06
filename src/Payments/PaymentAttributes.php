<?php

namespace litvinjuan\LaravelPayments\Payments;

use Illuminate\Database\Eloquent\Relations\MorphTo;
use Money\Money;

trait PaymentAttributes
{

    public function payable(): MorphTo
    {
        return $this->morphTo();
    }

    public function payer(): MorphTo
    {
        return $this->morphTo();
    }

    public function getPriceAttribute(): Money
    {
        return money($this->attributes['price']);
    }

    public function setPriceAttribute(Money $money)
    {
        $this->attributes['price'] = $money->getAmount();
    }

    public function getPaidAttribute(): Money
    {
        return money($this->attributes['paid']);
    }

    public function setPaidAttribute(Money $money)
    {
        $this->attributes['paid'] = $money->getAmount();
    }

}
