<?php

namespace litvinjuan\LaravelPayments\Requests;

use Exception;
use litvinjuan\LaravelPayments\Exceptions\InvalidRequestException;
use litvinjuan\LaravelPayments\Payments\Payment;
use litvinjuan\LaravelPayments\Responses\AbstractCaptureResponse;

abstract class AbstractCaptureRequest extends AbstractRequest
{

    /**
     * @return void
     */
    protected abstract function init();

    /**
     * @return AbstractCaptureResponse
     * @throws Exception
     */
    protected abstract function execute();

    /**
     * @param Payment $payment
     * @return AbstractCaptureRequest
     */
    public function payment(Payment $payment)
    {
        /** @var AbstractCaptureRequest $response */
        $response = parent::payment($payment);
        return $response;
    }

    /**
     * @param array $params
     * @return AbstractCaptureRequest
     */
    public function withParameters(array $params)
    {
        /** @var AbstractCaptureRequest $response */
        $response = parent::withParameters($params);
        return $response;
    }

    /**
     * @return AbstractCaptureResponse
     * @throws InvalidRequestException
     */
    public final function send()
    {
        /** @var AbstractCaptureResponse $response */
        $response = parent::send();
        return $response;
    }
}