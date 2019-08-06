<?php

namespace litvinjuan\LaravelPayments;

trait CanPay
{

    public function payments()
    {
        return $this->morphMany(Payment::class, 'payer');
    }

}
