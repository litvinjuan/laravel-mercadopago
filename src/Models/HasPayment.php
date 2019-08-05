<?php

namespace litvinjuan\MPPayments;

trait HasPayment
{

    public function payment()
    {
        return $this->morphOne(Payment::class, 'payable');
    }

    public function redirectToPayment()
    {
        return redirect()->route('mppayments.form', $this);
    }

}
