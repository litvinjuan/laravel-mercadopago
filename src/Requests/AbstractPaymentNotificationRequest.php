<?php

namespace litvinjuan\LaravelPayments\Requests;

use Exception;
use litvinjuan\LaravelPayments\Exceptions\InvalidRequestException;
use litvinjuan\LaravelPayments\Payments\Payment;
use litvinjuan\LaravelPayments\Responses\AbstractPaymentNotificationResponse;

abstract class AbstractPaymentNotificationRequest extends AbstractRequest
{

    /**
     * @return void
     */
    protected abstract function init();

    /**
     * @return AbstractPaymentNotificationResponse
     * @throws Exception
     */
    protected abstract function execute();

    /**
     * @param Payment $payment
     * @return AbstractPaymentNotificationRequest
     */
    public function payment(Payment $payment)
    {
        /** @var AbstractPaymentNotificationRequest $response */
        $response = parent::payment($payment);
        return $response;
    }

    /**
     * @param array $params
     * @return AbstractPaymentNotificationRequest
     */
    public function withParameters(array $params)
    {
        /** @var AbstractPaymentNotificationRequest $response */
        $response = parent::withParameters($params);
        return $response;
    }

    /**
     * @return AbstractPaymentNotificationResponse
     * @throws InvalidRequestException
     */
    public final function send()
    {
        /** @var AbstractPaymentNotificationResponse $response */
        $response = parent::send();
        return $response;
    }
}