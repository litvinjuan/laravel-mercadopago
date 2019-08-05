<?php

namespace litvinjuan\MPPayments;

trait CanPay
{

    public function payments()
    {
        return $this->morphMany(Payment::class, 'payer');
    }

}
