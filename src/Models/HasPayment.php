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

    public function createPayment(): Payment
    {
        return (new CreatePaymentHandler())->handle($this);
    }

}
