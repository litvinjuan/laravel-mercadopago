<?php

namespace litvinjuan\LaravelPayments\Responses;

use litvinjuan\LaravelPayments\Payments\PaymentState;
use Money\Money;

abstract class AbstractPurchaseResponse extends AbstractResponse
{

    /**
     * @return bool
     */
    public abstract function isRedirect();

    /**
     * @return bool
     */
    public abstract function requiresCompletePurchase();

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

}