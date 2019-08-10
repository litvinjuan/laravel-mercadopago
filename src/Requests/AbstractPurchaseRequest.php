<?php

namespace litvinjuan\LaravelPayments\Requests;

use Exception;
use litvinjuan\LaravelPayments\Exceptions\InvalidRequestException;
use litvinjuan\LaravelPayments\Payments\Payment;
use litvinjuan\LaravelPayments\Responses\AbstractPurchaseResponse;

abstract class AbstractPurchaseRequest extends AbstractRequest
{

    /**
     * @return void
     */
    protected abstract function init();

    /**
     * @return AbstractPurchaseResponse
     * @throws Exception
     */
    protected abstract function execute();

    /**
     * @param Payment $payment
     * @return AbstractPurchaseRequest
     */
    public function payment(Payment $payment)
    {
        /** @var AbstractPurchaseRequest $response */
        $response = parent::payment($payment);
        return $response;
    }

    /**
     * @param array $params
     * @return AbstractPurchaseRequest
     */
    public function withParameters(array $params)
    {
        /** @var AbstractPurchaseRequest $response */
        $response = parent::withParameters($params);
        return $response;
    }

    /**
     * @return AbstractPurchaseResponse
     * @throws InvalidRequestException
     */
    public final function send()
    {
        /** @var AbstractPurchaseResponse $response */
        $response = parent::send();
        return $response;
    }
}