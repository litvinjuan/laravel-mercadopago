<?php

namespace litvinjuan\LaravelPayments\Requests;

use Exception;
use litvinjuan\LaravelPayments\Exceptions\InvalidRequestException;
use litvinjuan\LaravelPayments\Payments\Payment;
use litvinjuan\LaravelPayments\Responses\AbstractCompleteAuthorizeResponse;

abstract class AbstractCompleteAuthorizeRequest extends AbstractRequest
{

    /**
     * @return void
     */
    protected abstract function init();

    /**
     * @return AbstractCompleteAuthorizeResponse
     * @throws Exception
     */
    protected abstract function execute();

    /**
     * @param Payment $payment
     * @return AbstractCompleteAuthorizeRequest
     */
    public function payment(Payment $payment)
    {
        /** @var AbstractCompleteAuthorizeRequest $response */
        $response = parent::payment($payment);
        return $response;
    }

    /**
     * @param array $params
     * @return AbstractCompleteAuthorizeRequest
     */
    public function withParameters(array $params)
    {
        /** @var AbstractCompleteAuthorizeRequest $response */
        $response = parent::withParameters($params);
        return $response;
    }

    /**
     * @return AbstractCompleteAuthorizeResponse
     * @throws InvalidRequestException
     */
    public final function send()
    {
        /** @var AbstractCompleteAuthorizeResponse $response */
        $response = parent::send();
        return $response;
    }
}