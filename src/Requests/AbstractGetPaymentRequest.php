<?php

namespace litvinjuan\LaravelPayments\Requests;

use Exception;
use litvinjuan\LaravelPayments\Exceptions\InvalidRequestException;
use litvinjuan\LaravelPayments\Payments\Payment;
use litvinjuan\LaravelPayments\Responses\AbstractGetPaymentResponse;

abstract class AbstractGetPaymentRequest extends AbstractRequest
{

    /**
     * @return void
     */
    protected abstract function init();

    /**
     * @return AbstractGetPaymentResponse
     * @throws Exception
     */
    protected abstract function execute();

    /**
     * @param Payment $payment
     * @return AbstractGetPaymentRequest
     */
    public function payment(Payment $payment)
    {
        /** @var AbstractGetPaymentRequest $response */
        $response = parent::payment($payment);
        return $response;
    }

    /**
     * @param array $params
     * @return AbstractGetPaymentRequest
     */
    public function withParameters(array $params)
    {
        /** @var AbstractGetPaymentRequest $response */
        $response = parent::withParameters($params);
        return $response;
    }

    /**
     * @return AbstractGetPaymentResponse
     * @throws InvalidRequestException
     */
    public final function send()
    {
        /** @var AbstractGetPaymentResponse $response */
        $response = parent::send();
        return $response;
    }
}