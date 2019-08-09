<?php

namespace litvinjuan\LaravelPayments\Responses;

use litvinjuan\LaravelPayments\Payments\PaymentState;
use litvinjuan\LaravelPayments\Requests\RequestInterface;
use Money\Money;

interface ResponseInterface
{

    /**
     * @return RequestInterface
     */
    public function getRequest();

    /**
     * @return bool
     */
    public function isSuccessful();

    /**
     * @return bool
     */
    public function isRedirect();

    /**
     * @return string|null
     */
    public function getMessage();

    /**
     * @return int|null
     */
    public function getCode();

    /**
     * @return string|null
     */
    public function getGatewayId();

    /**
     * @return array
     */
    public function getData();

    /**
     * @return PaymentState
     */
    public function getState();

    /**
     * @return Money
     */
    public function getPaidMoney();

    /**
     * @return bool
     */
    public function validated();

}
