<?php

namespace litvinjuan\LaravelPayments\Responses;

use Carbon\Carbon;
use litvinjuan\LaravelPayments\Payments\PaymentState;
use Money\Money;

abstract class AbstractGetPaymentResponse extends AbstractResponse
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
    public abstract function getPurchasedMoney();

    /**
     * @return Carbon
     */
    public abstract function getPurchasedAt();

    /**
     * @return Money
     */
    public abstract function getRefundedMoney();

    /**
     * @return Money
     */
    public abstract function isAuthorized();

    /**
     * @return Money
     */
    public abstract function isCaptured();

}