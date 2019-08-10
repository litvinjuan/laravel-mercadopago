<?php

namespace litvinjuan\LaravelPayments\Responses;

use litvinjuan\LaravelPayments\Payments\PaymentState;

abstract class AbstractVoidResponse extends AbstractResponse
{

    /**
     * @return string|null
     */
    public abstract function getGatewayId();

    /**
     * @return PaymentState
     */
    public abstract function getState();

}