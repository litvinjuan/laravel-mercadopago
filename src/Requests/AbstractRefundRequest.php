<?php

namespace litvinjuan\LaravelPayments\Requests;

use Exception;
use litvinjuan\LaravelPayments\Exceptions\InvalidRequestException;
use litvinjuan\LaravelPayments\Payments\Payment;
use litvinjuan\LaravelPayments\Responses\AbstractRefundResponse;

abstract class AbstractRefundRequest extends AbstractRequest
{

    /**
     * @return void
     */
    protected abstract function init();

    /**
     * @return AbstractRefundResponse
     * @throws Exception
     */
    protected abstract function execute();

    /**
     * @param Payment $payment
     * @return AbstractRefundRequest
     */
    public function payment(Payment $payment)
    {
        /** @var AbstractRefundRequest $response */
        $response = parent::payment($payment);
        return $response;
    }

    /**
     * @param array $params
     * @return AbstractRefundRequest
     */
    public function withParameters(array $params)
    {
        /** @var AbstractRefundRequest $response */
        $response = parent::withParameters($params);
        return $response;
    }

    /**
     * @return AbstractRefundResponse
     * @throws InvalidRequestException
     */
    public final function send()
    {
        /** @var AbstractRefundResponse $response */
        $response = parent::send();
        return $response;
    }
}