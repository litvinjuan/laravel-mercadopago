<?php

namespace litvinjuan\LaravelPayments\Gateways;

use litvinjuan\LaravelPayments\Payments\PaymentState;

class PurchaseResponse extends AbstractResponse
{

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    /**
     * @returns PaymentState
     */
    public function getState()
    {
        return $this->data['state'];
    }

}
