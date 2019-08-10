<?php

namespace litvinjuan\LaravelPayments\Requests;

use Exception;
use litvinjuan\LaravelPayments\Exceptions\InvalidRequestException;
use litvinjuan\LaravelPayments\Payments\Payment;
use litvinjuan\LaravelPayments\Responses\AbstractValidatePaymentResponse;

abstract class AbstractValidatePaymentRequest extends AbstractRequest
{

    /**
     * @return void
     */
    protected abstract function init();

    /**
     * @return AbstractValidatePaymentResponse
     * @throws Exception
     */
    protected abstract function execute();

    /**
     * @param Payment $payment
     * @return AbstractValidatePaymentRequest
     */
    public function payment(Payment $payment)
    {
        /** @var AbstractValidatePaymentRequest $response */
        $response = parent::payment($payment);
        return $response;
    }

    /**
     * @param array $params
     * @return AbstractValidatePaymentRequest
     */
    public function withParameters(array $params)
    {
        /** @var AbstractValidatePaymentRequest $response */
        $response = parent::withParameters($params);
        return $response;
    }

    /**
     * @return AbstractValidatePaymentResponse
     * @throws InvalidRequestException
     */
    public final function send()
    {
        /** @var AbstractValidatePaymentResponse $response */
        $response = parent::send();
        return $response;
    }
}