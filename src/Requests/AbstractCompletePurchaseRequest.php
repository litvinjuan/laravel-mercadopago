<?php

namespace litvinjuan\LaravelPayments\Requests;

use Exception;
use litvinjuan\LaravelPayments\Exceptions\InvalidRequestException;
use litvinjuan\LaravelPayments\Payments\Payment;
use litvinjuan\LaravelPayments\Responses\AbstractCompletePurchaseResponse;

abstract class AbstractCompletePurchaseRequest extends AbstractRequest
{

    /**
     * @return void
     */
    protected abstract function init();

    /**
     * @return AbstractCompletePurchaseResponse
     * @throws Exception
     */
    protected abstract function execute();

    /**
     * @param Payment $payment
     * @return AbstractCompletePurchaseRequest
     */
    public function payment(Payment $payment)
    {
        /** @var AbstractCompletePurchaseRequest $response */
        $response = parent::payment($payment);
        return $response;
    }

    /**
     * @param array $params
     * @return AbstractCompletePurchaseRequest
     */
    public function withParameters(array $params)
    {
        /** @var AbstractCompletePurchaseRequest $response */
        $response = parent::withParameters($params);
        return $response;
    }

    /**
     * @return AbstractCompletePurchaseResponse
     * @throws InvalidRequestException
     */
    public final function send()
    {
        /** @var AbstractCompletePurchaseResponse $response */
        $response = parent::send();
        return $response;
    }
}