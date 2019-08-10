<?php

namespace litvinjuan\LaravelPayments\Requests;

use Exception;
use litvinjuan\LaravelPayments\Exceptions\InvalidRequestException;
use litvinjuan\LaravelPayments\Payments\Payment;
use litvinjuan\LaravelPayments\Responses\AbstractAuthorizeResponse;

abstract class AbstractAuthorizeRequest extends AbstractRequest
{

    /**
     * @return void
     */
    protected abstract function init();

    /**
     * @return AbstractAuthorizeResponse
     * @throws Exception
     */
    protected abstract function execute();

    /**
     * @param Payment $payment
     * @return AbstractAuthorizeRequest
     */
    public function payment(Payment $payment)
    {
        /** @var AbstractAuthorizeRequest $response */
        $response = parent::payment($payment);
        return $response;
    }

    /**
     * @param array $params
     * @return AbstractAuthorizeRequest
     */
    public function withParameters(array $params)
    {
        /** @var AbstractAuthorizeRequest $response */
        $response = parent::withParameters($params);
        return $response;
    }

    /**
     * @return AbstractAuthorizeResponse
     * @throws InvalidRequestException
     */
    public final function send()
    {
        /** @var AbstractAuthorizeResponse $response */
        $response = parent::send();
        return $response;
    }
}