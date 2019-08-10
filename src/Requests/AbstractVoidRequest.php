<?php

namespace litvinjuan\LaravelPayments\Requests;

use Exception;
use litvinjuan\LaravelPayments\Exceptions\InvalidRequestException;
use litvinjuan\LaravelPayments\Payments\Payment;
use litvinjuan\LaravelPayments\Responses\AbstractVoidResponse;

abstract class AbstractVoidRequest extends AbstractRequest
{

    /**
     * @return void
     */
    protected abstract function init();

    /**
     * @return AbstractVoidResponse
     * @throws Exception
     */
    protected abstract function execute();

    /**
     * @param Payment $payment
     * @return AbstractVoidRequest
     */
    public function payment(Payment $payment)
    {
        /** @var AbstractVoidRequest $response */
        $response = parent::payment($payment);
        return $response;
    }

    /**
     * @param array $params
     * @return AbstractVoidRequest
     */
    public function withParameters(array $params)
    {
        /** @var AbstractVoidRequest $response */
        $response = parent::withParameters($params);
        return $response;
    }

    /**
     * @return AbstractVoidResponse
     * @throws InvalidRequestException
     */
    public final function send()
    {
        /** @var AbstractVoidResponse $response */
        $response = parent::send();
        return $response;
    }
}