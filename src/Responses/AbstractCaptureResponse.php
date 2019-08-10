<?php

namespace litvinjuan\LaravelPayments\Responses;

use litvinjuan\LaravelPayments\Payments\PaymentState;
use Money\Money;

abstract class AbstractCaptureResponse extends AbstractResponse
{

    /**
     * @return string|null
     */
    public abstract function getGatewayId();

    /**
     * @return PaymentState
     */
    public abstract function getState();

    /**
     * @return Money
     */
    public abstract function getCapturedMoney();

}