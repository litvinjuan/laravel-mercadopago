<?php

namespace litvinjuan\LaravelPayments\Payments;

use Illuminate\Database\Eloquent\Relations\MorphOne;
use litvinjuan\LaravelPayments\Handlers\CreatePaymentHandler;

trait HasPayment
{

    public function payment(): MorphOne
    {
        return $this->morphOne(Payment::class, 'payable');
    }

    public function createPayment(): Payment
    {
        return (new CreatePaymentHandler())->handle($this);
    }

}
