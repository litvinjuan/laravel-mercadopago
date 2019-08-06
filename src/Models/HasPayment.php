<?php

namespace litvinjuan\LaravelPayments;

trait HasPayment
{

    public function payment()
    {
        return $this->morphOne(Payment::class, 'payable');
    }

    public function redirectToPayment()
    {
        return redirect()->route('laravel-payments.form', $this);
    }

    public function createPayment()
    {
        (new CreatePaymentHandler())->handle($this);
        return $this->morphOne(Payment::class, 'payable');
    }

}
